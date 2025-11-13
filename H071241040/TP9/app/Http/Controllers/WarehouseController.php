<?php

namespace App\Http\Controllers;

use App\Models\Warehouse;
use App\Http\Requests\WarehouseRequest;

class WarehouseController extends Controller
{
    public function index() {
        $warehouses = Warehouse::latest()->paginate(10);
        return view('warehouses.index', compact('warehouses'));
    }

    public function create() { return view('warehouses.create'); }

    public function store(WarehouseRequest $request) {
        Warehouse::create($request->validated());
        return redirect()->route('warehouses.index')->with('ok','Warehouse created');
    }

    public function edit(Warehouse $warehouse) {
        return view('warehouses.edit', compact('warehouse'));
    }

    public function update(WarehouseRequest $request, Warehouse $warehouse) {
        $warehouse->update($request->validated());
        return redirect()->route('warehouses.index')->with('ok','Warehouse updated');
    }

    public function destroy(Warehouse $warehouse) {
        $warehouse->delete();
        return back()->with('ok','Warehouse deleted');
    }
}
