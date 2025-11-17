<?php

namespace App\Http\Controllers;

use App\Models\Fish;
use Illuminate\Http\Request;
use App\Http\Requests\StoreFishRequest;
use App\Http\Requests\UpdateFishRequest;

class FishController extends Controller
{
    public function index(Request $request)
    {
        $rarities = ['Common', 'Uncommon', 'Rare', 'Epic', 'Legendary', 'Mythic', 'Secret'];
        
        $filters = $request->only(['search', 'rarity', 'sort_by', 'sort_dir']);

        $query = Fish::query()->filter($filters);
        if (empty($filters['sort_by'])) {
            $query->latest(); 
        }

        $fishes = $query->paginate(10)->withQueryString();

        return view('fishes.index', [
            'fishes' => $fishes,
            'rarities' => $rarities,
            'filters' => $filters 
        ]);
    }

     
    public function create()
    {
        $rarities = ['Common', 'Uncommon', 'Rare', 'Epic', 'Legendary', 'Mythic', 'Secret'];
       
        return view('fishes.create', ['rarities' => $rarities]);
    }

    public function store(StoreFishRequest $request)
    {
        Fish::create($request->validated());

        return redirect()->route('fishes.index')
                         ->with('success', 'Ikan baru (' . $request->name . ') berhasil ditambahkan!');
    }

    public function show(Fish $fish)
    {
        return view('fishes.show', ['fish' => $fish]);
    }

    public function edit(Fish $fish)
    {
        $rarities = ['Common', 'Uncommon', 'Rare', 'Epic', 'Legendary', 'Mythic', 'Secret'];
        
        return view('fishes.edit', [
            'fish' => $fish,
            'rarities' => $rarities
        ]);
    }

    public function update(UpdateFishRequest $request, Fish $fish)
    {
        $fish->update($request->validated());
        return redirect()->route('fishes.show', $fish)
                         ->with('success', 'Data ikan (' . $fish->name . ') berhasil diperbarui!');
    }

    public function destroy(Fish $fish)
    {
       $fishName = $fish->name;

        $fish->delete();
        return redirect()->route('fishes.index')
                         ->with('success', 'Ikan (' . $fishName . ') telah berhasil dihapus.');
    }
    
}