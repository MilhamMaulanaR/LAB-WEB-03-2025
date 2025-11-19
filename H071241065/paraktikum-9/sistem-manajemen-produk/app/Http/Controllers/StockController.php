<?php

namespace App\Http\Controllers;

use App\Models\Product;
use App\Models\Warehouse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class StockController extends Controller
{
    /**
     * Halaman Index: Menampilkan list stok per gudang
     */
    public function index(Request $request)
    {
        $warehouses = Warehouse::all();
        $selectedWarehouse = null;
        $stockList = [];

        // 1. Cek apakah user memilih gudang dari filter
        if ($request->has('warehouse_id') && $request->warehouse_id != '') {
            $selectedWarehouse = Warehouse::findOrFail($request->warehouse_id);

            // 2. Ambil produk yang ada di gudang tersebut
            // Kita juga ambil 'quantity' dari tabel pivot
            $stockList = $selectedWarehouse->products()->withPivot('quantity')->get();
        }

        return view('stock.index', compact('warehouses', 'selectedWarehouse', 'stockList'));
    }

    /**
     * Halaman Form: Menampilkan form transfer stok
     */
    public function showTransferForm()
    {
        $warehouses = Warehouse::all();
        $products = Product::all();

        return view('stock.transfer', compact('warehouses', 'products'));
    }

    /**
     * Proses: Menjalankan logika transfer stok
     */
    public function processTransfer(Request $request)
    {
        // 1. Validasi input
        $request->validate([
            'warehouse_id' => 'required|exists:warehouses,id',
            'product_id' => 'required|exists:products,id',
            'quantity_change' => 'required|integer|not_in:0', // Tidak boleh 0
        ]);

        $warehouseId = $request->warehouse_id;
        $productId = $request->product_id;
        $quantityChange = (int) $request->quantity_change;

        // 2. Gunakan Transaction untuk keamanan data
        try {
            DB::transaction(function () use ($warehouseId, $productId, $quantityChange) {
                $warehouse = Warehouse::findOrFail($warehouseId);

                // 3. Cek stok saat ini di pivot table
                $product = $warehouse->products()->find($productId);
                $currentQuantity = $product ? $product->pivot->quantity : 0;

                // 4. Hitung stok baru
                $newQuantity = $currentQuantity + $quantityChange;

                // 5. Validasi utama: STOK TIDAK BOLEH MINUS
                if ($newQuantity < 0) {
                    // Buat error manual
                    throw new \Exception('Stok tidak mencukupi. Stok saat ini: ' . $currentQuantity . ', Anda mencoba mengurangi: ' . abs($quantityChange));
                }

                $warehouse->products()->syncWithoutDetaching([
                    $productId => ['quantity' => $newQuantity],
                ]);
            });

            return redirect()->route('stock.transfer.form')->with('success', 'Stok berhasil diperbarui.');
        } catch (\Exception $e) {
            return back()
                ->withInput()
                ->with('error', 'Gagal: ' . $e->getMessage());
        }
    }
}