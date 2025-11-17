<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Warehouse;

class WarehouseController extends Controller
{
    public function index()
    {
        $warehouses = Warehouse::latest()->paginate(10);
        return view('warehouses.index', compact('warehouses'));
    }   

    public function create()
    {
        return view('warehouses.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255|unique:warehouses,name',
            'location' => 'nullable|string',
        ], [
            'name.required' => 'Nama gudang wajib diisi.',
            'name.unique' => 'Nama gudang ini sudah ada.',
        ]); 

        Warehouse::create([
            'name' => $request->name,
            'location' => $request->location,
        ]); 

        return redirect()->route('warehouses.index')
                         ->with('success', 'Gudang baru berhasil ditambahkan.');
    }

    public function show(string $id)
    {
        $request->validate([
            'name' => 'required|string|max:255|unique:warehouses,name',
            'location' => 'nullable|string',
        ], [
            'name.required' => 'Nama gudang wajib diisi.',
            'name.unique' => 'Nama gudang ini sudah ada.',
        ]);

        Warehouse::create([
            'name' => $request->name,
            'location' => $request->location,
        ]);
        return redirect()->route('warehouses.index')
                         ->with('success', 'Gudang baru berhasil ditambahkan.');
    }

    public function edit(Warehouse $warehouse)
    {
        return view('warehouses.edit', compact('warehouse'));
    }

    public function update(Request $request, Warehouse $warehouse)
    {
        $request->validate([
            'name' => 'required|string|max:255|unique:warehouses,name,' . $warehouse->id,
            'location' => 'nullable|string',
        ], [
            'name.required' => 'Nama gudang wajib diisi.',
            'name.unique' => 'Nama gudang ini sudah ada.',
        ]);
        $warehouse->update([
            'name' => $request->name,
            'location' => $request->location,
        ]);
        return redirect()->route('warehouses.index')
                         ->with('success', 'Gudang berhasil diperbarui.');
    }
    public function destroy(Warehouse $warehouse)
    {
        $warehouse->delete();
        return redirect()->route('warehouses.index')
                         ->with('success', 'Gudang berhasil dihapus.');
    
        
    }
}
