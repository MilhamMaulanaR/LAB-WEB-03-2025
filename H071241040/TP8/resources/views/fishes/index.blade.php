@extends('layouts.app')

@section('content')
  {{-- Filter Card --}}
  <div class="rounded-xl2 bg-white border border-gray-200 p-4 shadow-soft">
    <form method="GET" action="{{ route('fishes.index') }}" class="grid grid-cols-1 sm:grid-cols-4 gap-3">
      <div>
        <label class="text-sm text-gray-600">Cari Nama</label>
        <input type="text" name="q" value="{{ $search ?? '' }}" placeholder="mis. Salmon"
               class="mt-1 w-full rounded-lg border-gray-300 focus:border-brand-500 focus:ring-brand-500" />
      </div>
      <div>
        <label class="text-sm text-gray-600">Rarity</label>
        <select name="rarity" class="mt-1 w-full rounded-lg border-gray-300 focus:border-brand-500 focus:ring-brand-500">
          <option value="">— Semua —</option>
          @foreach ($rarities as $r)
            <option value="{{ $r }}" @selected(($selectedRarity ?? '')===$r)>{{ $r }}</option>
          @endforeach
        </select>
      </div>
      <div>
        <label class="text-sm text-gray-600">Urutkan</label>
        <select name="sort" class="mt-1 w-full rounded-lg border-gray-300 focus:border-brand-500 focus:ring-brand-500">
          <option value="id" @selected(($sort ?? '')==='id')>Terbaru</option>
          <option value="name" @selected(($sort ?? '')==='name')>Nama</option>
          <option value="sell_price_per_kg" @selected(($sort ?? '')==='sell_price_per_kg')>Harga/kg</option>
          <option value="catch_probability" @selected(($sort ?? '')==='catch_probability')>Probabilitas</option>
          <option value="rarity" @selected(($sort ?? '')==='rarity')>Rarity</option>
        </select>
      </div>
      <div class="flex items-end">
        <button class="w-full sm:w-auto px-4 py-2 rounded-xl bg-brand-600 text-white hover:bg-brand-700 shadow-soft">
          Terapkan
        </button>
      </div>
    </form>
  </div>

  {{-- Table --}}
  <div class="mt-4 overflow-x-auto rounded-xl2 border border-gray-200 bg-white shadow-soft">
    @if ($fishes->count())
      <table class="w-full text-sm">
        <thead class="bg-gradient-to-r from-gray-50 to-gray-100 text-gray-700">
          <tr>
            <th class="px-3 py-3 text-left font-semibold">ID</th>
            <th class="px-3 py-3 text-left font-semibold">Nama</th>
            <th class="px-3 py-3 text-left font-semibold">Rarity</th>
            <th class="px-3 py-3 text-left font-semibold">Berat</th>
            <th class="px-3 py-3 text-left font-semibold">Harga/kg</th>
            <th class="px-3 py-3 text-left font-semibold">Prob.</th>
            <th class="px-3 py-3 text-right font-semibold">Aksi</th>
          </tr>
        </thead>
        <tbody>
          @foreach ($fishes as $fish)
            <tr class="border-t">
              <td class="px-3 py-3">{{ $fish->id }}</td>
              <td class="px-3 py-3 font-medium">{{ $fish->name }}</td>
              <td class="px-3 py-3">
                @php
                  $map = [
                    'Common' => 'bg-emerald-50 text-emerald-700 ring-emerald-200',
                    'Uncommon' => 'bg-teal-50 text-teal-700 ring-teal-200',
                    'Rare' => 'bg-blue-50 text-blue-700 ring-blue-200',
                    'Epic' => 'bg-violet-50 text-violet-700 ring-violet-200',
                    'Legendary' => 'bg-amber-50 text-amber-700 ring-amber-200',
                    'Mythic' => 'bg-rose-50 text-rose-700 ring-rose-200',
                    'Secret' => 'bg-slate-800 text-white ring-slate-700'
                  ];
                @endphp
                <span class="inline-flex items-center px-2 py-1 rounded-full text-xs font-semibold ring-1 {{ $map[$fish->rarity] ?? 'bg-gray-50 text-gray-700 ring-gray-200' }}">
                  {{ $fish->rarity }}
                </span>
              </td>
              <td class="px-3 py-3">{{  (number_format($fish->base_weight_min,2).' – '.number_format($fish->base_weight_max,2).' kg') }}</td>
              <td class="px-3 py-3">{{  (number_format($fish->sell_price_per_kg,0,',','.').' Coins/kg') }}</td>
              <td class="px-3 py-3">{{ (number_format($fish->catch_probability,2).'%') }}</td>
              <td class="px-3 py-3 text-right space-x-2">
                <a href="{{ route('fishes.show', $fish) }}" class="px-3 py-1.5 rounded-lg border hover:bg-gray-50">Lihat</a>
                <a href="{{ route('fishes.edit', $fish) }}" class="px-3 py-1.5 rounded-lg border hover:bg-gray-50">Edit</a>
                <form id="del-{{ $fish->id }}" class="inline" method="POST" action="{{ route('fishes.destroy', $fish) }}">
                  @csrf @method('DELETE')
                  <button type="button" onclick="swalDelete('del-{{ $fish->id }}')"
                          class="px-3 py-1.5 rounded-lg border border-rose-300 text-rose-700 hover:bg-rose-50">
                    Hapus
                  </button>
                </form>
              </td>
            </tr>
          @endforeach
        </tbody>
      </table>
    @else
      <div class="px-6 py-12 text-center">
        <div class="mx-auto h-14 w-14 rounded-2xl bg-gray-100 grid place-content-center text-gray-500 mb-3">🗂️</div>
        <h3 class="text-lg font-semibold">Belum ada data</h3>
        <p class="text-gray-600 mt-1">Tambahkan ikan pertama untuk memulai.</p>
      </div>
    @endif
  </div>

  <div class="mt-4">
    {{ $fishes->links() }}
  </div>
@endsection
