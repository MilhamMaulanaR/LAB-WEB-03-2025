@extends('layouts.app')

@php
  $pageTitle = 'Detail Ikan';
  $pageSubtitle = $fish->name ?? '';
@endphp

@section('content')
  <div class="grid grid-cols-1 lg:grid-cols-3 gap-6">
    <div class="lg:col-span-2 rounded-xl2 border border-gray-200 bg-white p-6 shadow-soft">
      <dl class="grid grid-cols-1 sm:grid-cols-2 gap-x-6 gap-y-4">
        <div>
          <dt class="text-gray-500 text-sm">Nama</dt>
          <dd class="text-lg font-medium">{{ $fish->name }}</dd>
        </div>
        <div>
          <dt class="text-gray-500 text-sm">Rarity</dt>
          <dd class="text-lg font-medium">{{ $fish->rarity }}</dd>
        </div>
        <div>
          <dt class="text-gray-500 text-sm">Berat Minimum</dt>
          <dd class="text-lg font-medium">{{ number_format($fish->base_weight_min,2) }} kg</dd>
        </div>
        <div>
          <dt class="text-gray-500 text-sm">Berat Maksimum</dt>
          <dd class="text-lg font-medium">{{ number_format($fish->base_weight_max,2) }} kg</dd>
        </div>
        <div>
          <dt class="text-gray-500 text-sm">Harga/kg</dt>
          <dd class="text-lg font-medium">{{ number_format($fish->sell_price_per_kg,0,',','.') }} Coins/kg</dd>
        </div>
        <div>
          <dt class="text-gray-500 text-sm">Prob. Tertangkap</dt>
          <dd class="text-lg font-medium">{{ number_format($fish->catch_probability,2) }}%</dd>
        </div>
        <div class="sm:col-span-2">
          <dt class="text-gray-500 text-sm">Deskripsi</dt>
          <dd class="text-lg">{{ $fish->description ?: '—' }}</dd>
        </div>
      </dl>
    </div>

    <aside class="rounded-xl2 border border-gray-200 bg-white p-6 shadow-soft">
      <div class="flex items-center justify-between mb-4">
        <h2 class="font-semibold text-gray-800">Aksi</h2>
        <span class="text-xs px-2 py-1 rounded-full bg-gray-100 text-gray-600">ID: {{ $fish->id }}</span>
      </div>

      <div class="space-y-2">
        <a href="{{ route('fishes.edit', $fish) }}" class="w-full inline-flex items-center justify-center px-4 py-2 rounded-xl border hover:bg-gray-50">
          Edit
        </a>

        <form id="del-{{ $fish->id }}" action="{{ route('fishes.destroy', $fish) }}" method="POST">
          @csrf @method('DELETE')
          <button type="button" onclick="swalDelete('del-{{ $fish->id }}')"
                  class="w-full inline-flex items-center justify-center px-4 py-2 rounded-xl border border-rose-300 text-rose-700 hover:bg-rose-50">
            Hapus
          </button>
        </form>

        <a href="{{ route('fishes.index') }}" class="w-full inline-flex items-center justify-center px-4 py-2 rounded-xl bg-brand-600 text-white hover:bg-brand-700 shadow-soft">
          Kembali
        </a>
      </div>
    </aside>
  </div>
@endsection
