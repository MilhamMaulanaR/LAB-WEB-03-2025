@extends('layouts.app')

@section('content')
<h2 class="text-2xl font-bold mb-4">Detail Ikan</h2>

<div class="bg-white shadow rounded p-6 space-y-2">
  <p><strong>Nama:</strong> {{ $fish->name }}</p>
  <p><strong>Rarity:</strong> {{ $fish->rarity }}</p>
  <p><strong>Berat:</strong> {{ $fish->base_weight_min }} - {{ $fish->base_weight_max }} kg</p>
  <p><strong>Harga/kg:</strong> {{ $fish->sell_price_per_kg }}</p>
  <p><strong>Peluang Tertangkap:</strong> {{ $fish->catch_probability }}%</p>
  <p><strong>Deskripsi:</strong> {{ $fish->description ?? '-' }}</p>
</div>

<div class="mt-4 space-x-2">
  <a href="{{ route('fishes.edit', $fish->id) }}" class="bg-yellow-500 text-white px-4 py-2 rounded hover:bg-yellow-600">Edit</a>
  <form action="{{ route('fishes.destroy', $fish->id) }}" method="POST" class="inline" onsubmit="return confirm('Yakin hapus ikan ini?')">
    @csrf
    @method('DELETE')
    <button class="bg-red-600 text-white px-4 py-2 rounded hover:bg-red-700">Hapus</button>
  </form>
  <a href="{{ route('fishes.index') }}" class="bg-gray-500 text-white px-4 py-2 rounded hover:bg-gray-600">Kembali</a>
</div>
@endsection
