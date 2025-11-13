<?php

namespace App\Http\Controllers;

use App\Models\Product;
use App\Models\Warehouse;
use App\Http\Requests\StockTransferRequest;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class StockController extends Controller
{
    // Rekap stok dengan filter gudang (opsional) :contentReference[oaicite:6]{index=6}
 public function index(Request $request)
{
    $warehouses = Warehouse::orderBy('name')->get();
    $warehouseId = $request->get('warehouse_id');


    $sumSub = DB::table('product_warehouse')
        ->select('product_id', DB::raw('SUM(quantity) as qty_total'))
        ->when($warehouseId, fn($q) => $q->where('warehouse_id', (int) $warehouseId))
        ->groupBy('product_id');


    $products = Product::leftJoinSub($sumSub, 's', 's.product_id', '=', 'products.id')
        ->select('products.*', DB::raw('COALESCE(s.qty_total, 0) as qty_total'))
        ->with('category')
        ->orderBy('products.name')
        ->paginate(15);

    return view('stocks.index', compact('products', 'warehouses', 'warehouseId'));
}

    
    public function createTransfer() {
        $warehouses = Warehouse::orderBy('name')->get();
        $products   = Product::orderBy('name')->get();
        return view('stocks.transfer', compact('warehouses','products'));
    }

    // Transfer stok: delta bisa +N (masuk) / -N (keluar) dengan aturan "tak boleh minus" :contentReference[oaicite:7]{index=7}
    public function storeTransfer(StockTransferRequest $request) {
        $data = $request->validated();

        DB::transaction(function() use ($data) {
            $productId   = (int)$data['product_id'];
            $warehouseId = (int)$data['warehouse_id'];
            $delta       = (int)$data['delta'];

            // Ambil baris pivot (kalau belum ada dan delta<0 → tolak; kalau delta>0 → buat)
            $pivot = DB::table('product_warehouse')
                ->where('product_id', $productId)
                ->where('warehouse_id', $warehouseId)
                ->lockForUpdate() // cegah race condition
                ->first();

            if (!$pivot) {
                if ($delta < 0) {
                    abort(422, 'Stok tidak boleh minus dan belum ada stok di gudang ini.');
                }
                DB::table('product_warehouse')->insert([
                    'product_id' => $productId,
                    'warehouse_id' => $warehouseId,
                    'quantity' => $delta,
                    'created_at' => now(),
                    'updated_at' => now(),
                ]);
                return;
            }

            $newQty = $pivot->quantity + $delta;
            if ($newQty < 0) {
                abort(422, 'Stok tidak boleh minus di gudang ini.');
            }

            DB::table('product_warehouse')
                ->where('id', $pivot->id)
                ->update(['quantity' => $newQty, 'updated_at' => now()]);
        });

        return redirect()->route('stocks.index')->with('ok','Transfer stok berhasil');
    }
}
