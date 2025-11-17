<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB; 
use App\Models\Product;
use App\Models\Warehouse;

class StockController extends Controller
{
    public function index(Request $request)
    {
        $filterWarehouseId = $request->query('warehouse_id');

        $stockQuery = DB::table('products_warehouses')
            ->join('products', 'products_warehouses.product_id', '=', 'products.id')
            ->join('warehouses', 'products_warehouses.warehouse_id', '=', 'warehouses.id')
            ->select(
                'products.name as product_name',
                'warehouses.name as warehouse_name',
                'products_warehouses.quantity'
            );

        if ($filterWarehouseId) {
            $stockQuery->where('products_warehouses.warehouse_id', $filterWarehouseId);
        }
        
        $stockEntries = $stockQuery->paginate(10)->withQueryString(); 

        $warehouses = Warehouse::orderBy('name')->get();
        
        $products = Product::orderBy('name')->get();

        return view('stocks.index', compact(
            'stockEntries', 
            'warehouses', 
            'products',
            'filterWarehouseId' 
        ));
    }

    public function transfer(Request $request)
    {
        $request->validate([
            'product_id' => 'required|exists:products,id',
            'warehouse_id' => 'required|exists:warehouses,id',
            'quantity' => 'required|integer|not_in:0',
        ]);

        $productId = $request->product_id;
        $warehouseId = $request->warehouse_id;
        $change = (int) $request->quantity;

        DB::beginTransaction();
        try {
            $pivot = DB::table('products_warehouses')
                ->where('product_id', $productId)
                ->where('warehouse_id', $warehouseId)
                ->lockForUpdate() 
                ->first();

            $currentStock = $pivot ? $pivot->quantity : 0;
            $newStock = $currentStock + $change;

            if ($newStock < 0) {
                DB::rollBack();
                return redirect()->back()
                                 ->with('error', 'Gagal. Stok di gudang tidak mencukupi untuk dikurangi.');
            }
            DB::table('products_warehouses')->updateOrInsert(
                ['product_id' => $productId, 'warehouse_id' => $warehouseId],
                ['quantity' => $newStock]
            );

            DB::commit();

            return redirect()->route('stocks.index')
                             ->with('success', 'Stok berhasil diperbarui.');

        } catch (\Exception $e) {
            DB::rollBack();
            return redirect()->back()
                             ->with('error', 'Terjadi kesalahan: ' . $e->getMessage());
        }
    }
}