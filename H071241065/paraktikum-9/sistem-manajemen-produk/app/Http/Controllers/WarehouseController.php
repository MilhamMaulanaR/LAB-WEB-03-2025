<?php

namespace App\Http\Controllers;

use App\Models\Warehouse; // <-- 1. Import model
use Illuminate\Http\Request;

class WarehouseController extends Controller
{
    /**
     * Tampilkan list warehouse (Halaman Index)
     */
    public function index()
    {
        $warehouses = Warehouse::latest()->get();
        return view('warehouses.index', compact('warehouses'));
    }

    /**
     * Tampilkan form untuk membuat warehouse baru (Halaman Create)
     */
    public function create()
    {
        return view('warehouses.create');
    }

    /**
     * Simpan data warehouse baru ke database
     */
    public function store(Request $request)
    {
        // 2. Validasi
        $request->validate([
            'name' => 'required|string|max:255',
            'location' => 'nullable|string',
        ]);

        // 3. Buat data
        Warehouse::create($request->all());

        return redirect()->route('warehouses.index')->with('success', 'Warehouse berhasil ditambahkan.');
    }

    /**
     * Tampilkan detail satu warehouse
     */
    public function show(Warehouse $warehouse)
    {
        return view('warehouses.show', compact('warehouse'));
    }

    /**
     * Tampilkan form untuk mengedit warehouse
     */
    public function edit(Warehouse $warehouse)
    {
        return view('warehouses.edit', compact('warehouse'));
    }

    /**
     * Update data warehouse di database
     */
    public function update(Request $request, Warehouse $warehouse)
    {
        // 4. Validasi
        $request->validate([
            'name' => 'required|string|max:255',
            'location' => 'nullable|string',
        ]);

        // 5. Update data
        $warehouse->update($request->all());

        return redirect()->route('warehouses.index')->with('success', 'Warehouse berhasil diperbarui.');
    }

    /**
     * Hapus data warehouse dari database
     */
    public function destroy(Warehouse $warehouse)
    {
        // 6. Hapus data
        $warehouse->delete();

        return redirect()->route('warehouses.index')->with('success', 'Warehouse berhasil dihapus.');
    }
}