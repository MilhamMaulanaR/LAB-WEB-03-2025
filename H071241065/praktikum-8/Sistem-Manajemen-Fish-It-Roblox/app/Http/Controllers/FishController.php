<?php

namespace App\Http\Controllers;

use App\Models\Fish;
use Illuminate\Http\Request;

class FishController extends Controller
{
    public function index()
    {
        $fishes = Fish::latest()->paginate(10);
        return view('fishes.index', compact('fishes'));
    }

    public function create()
    {
        $rarities = ['Common', 'Uncommon', 'Rare', 'Epic', 'Legendary', 'Mythic', 'Secret'];
        return view('fishes.create', compact('rarities'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:100',
            'rarity' => 'required',
            'base_weight_min' => 'required|numeric|min:0',
            'base_weight_max' => 'required|numeric|gt:base_weight_min',
            'sell_price_per_kg' => 'required|integer|min:1',
            'catch_probability' => 'required|numeric|between:0.01,100.00',
        ]);

        Fish::create($request->all());

        return redirect()->route('fishes.index')->with('success', 'Ikan berhasil ditambahkan.');
    }

    public function show(Fish $fish)
    {
        return view('fishes.show', compact('fish'));
    }

    public function edit(Fish $fish)
    {
        $rarities = ['Common', 'Uncommon', 'Rare', 'Epic', 'Legendary', 'Mythic', 'Secret'];
        return view('fishes.edit', compact('fish', 'rarities'));
    }

    public function update(Request $request, Fish $fish)
    {
        $request->validate([
            'name' => 'required|string|max:100',
            'rarity' => 'required',
            'base_weight_min' => 'required|numeric|min:0',
            'base_weight_max' => 'required|numeric|gt:base_weight_min',
            'sell_price_per_kg' => 'required|integer|min:1',
            'catch_probability' => 'required|numeric|between:0.01,100.00',
        ]);

        $fish->update($request->all());

        return redirect()->route('fishes.index')->with('success', 'Data ikan diperbarui.');
    }

    // public function destroy(Fish $fish)
    // {
    //     $fish->delete();
    //     return redirect()->route('fishes.index')->with('success', 'Ikan berhasil dihapus.');
    // }

    public function destroy($id)
{
    $fish = Fish::findOrFail($id);
    $fishName = $fish->name;
    $fish->delete();
    
    return redirect()->route('fishes.index')
        ->with('success', "Ikan '$fishName' berhasil dihapus!");
}

    
}