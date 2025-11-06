<?php

namespace App\Http\Controllers;

use App\Models\Fish;
use Illuminate\Http\Request;

class FishController extends Controller
{
    private array $rarities = ['Common','Uncommon','Rare','Epic','Legendary','Mythic','Secret'];

  public function index(Request $request){
    // $fishes = Fish::all(); // hati-hati untuk data besar
    // return view('fishes.index', compact('fishes'));}

        $rarity = $request->query('rarity');
        $search = $request->query('q');
        $sort   = $request->query('sort', 'id');

        $allowedSort = ['id','name','sell_price_per_kg','catch_probability','rarity'];
        if (!in_array($sort, $allowedSort))  $sort = 'id';

        $fishes = Fish::query()
            ->when($rarity, fn($q) => $q->where('rarity', $rarity))
            ->when($search, fn($q) => $q->where('name', 'like', "%{$search}%"))
            ->orderBy($sort, 'asc')
            ->paginate(10)
            ->withQueryString();

        return view('fishes.index', [
            'fishes'         => $fishes,
            'rarities'       => $this->rarities,
            'selectedRarity' => $rarity,
            'search'         => $search,
            'sort'           => $sort,
        ]);
    }

    public function create()
    {
        return view('fishes.create', ['rarities' => $this->rarities]);
    }

    public function store(Request $request)
    {
        $data = $request->validate([
            'name'               => ['required','string','max:100'],
            'rarity'             => ['required','in:Common,Uncommon,Rare,Epic,Legendary,Mythic,Secret'],
            'base_weight_min'    => ['required','numeric','gte:0'],
            'base_weight_max'    => ['required','numeric','gt:base_weight_min'],
            'sell_price_per_kg'  => ['required','integer','gte:0'],
            'catch_probability'  => ['required','numeric','gte:0.01','lte:100'],
            'description'        => ['nullable','string'],
        ], [
            'base_weight_max.gt'   => 'Berat maksimum harus lebih besar dari berat minimum.',
            'catch_probability.gte'=> 'Peluang minimal 0.01%.',
            'catch_probability.lte'=> 'Peluang maksimal 100%.',
        ]);

        Fish::create($data);

        return redirect()->route('fishes.index')->with('success', 'Ikan berhasil ditambahkan!');
    }

    public function show(Fish $fish) // route model binding
    {
        return view('fishes.show', compact('fish'));
    }

    public function edit(Fish $fish) // route model binding
    {
        return view('fishes.edit', [
            'fish'     => $fish,
            'rarities' => $this->rarities,
        ]);
    }

    public function update(Request $request, Fish $fish) // route model binding
    {
        $data = $request->validate([
            'name'               => ['required','string','max:100'],
            'rarity'             => ['required','in:Common,Uncommon,Rare,Epic,Legendary,Mythic,Secret'],
            'base_weight_min'    => ['required','numeric','gte:0'],
            'base_weight_max'    => ['required','numeric','gt:base_weight_min'],
            'sell_price_per_kg'  => ['required','integer','gte:0'],
            'catch_probability'  => ['required','numeric','gte:0.01','lte:100'],
            'description'        => ['nullable','string'],
        ], [
            'base_weight_max.gt'   => 'Berat maksimum harus lebih besar dari berat minimum.',
            'catch_probability.gte'=> 'Peluang minimal 0.01%.',
            'catch_probability.lte'=> 'Peluang maksimal 100%.',
        ]);

        $fish->update($data);

        return redirect()->route('fishes.show', $fish)->with('success', 'Ikan berhasil diperbarui!');
    }

    public function destroy(Fish $fish) // route model binding
    {
        $fish->delete();
        return redirect()->route('fishes.index')->with('success', 'Ikan berhasil dihapus.');
    }
}
