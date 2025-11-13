@extends('layouts.app')

@php
  $pageTitle = 'Edit Ikan: '.($fish->name ?? '');
  $pageSubtitle = 'Perbarui data dengan hati-hati agar konsisten.';
@endphp

@section('content')
  <div class="rounded-xl2 bg-white border border-gray-200 p-6 shadow-soft">
    <form action="{{ route('fishes.update', $fish) }}" method="POST" class="grid grid-cols-1 sm:grid-cols-2 gap-5">
      @csrf @method('PUT')

      <div>
        <label class="text-sm text-gray-600">Nama Ikan</label>
        <input name="name" value="{{ old('name', $fish->name) }}" class="mt-1 w-full rounded-lg border-gray-300 focus:border-brand-500 focus:ring-brand-500" required>
        @error('name')<p class="text-rose-600 text-sm mt-1">{{ $message }}</p>@enderror
      </div>

      <div>
        <label class="text-sm text-gray-600">Rarity</label>
        <select name="rarity" class="mt-1 w-full rounded-lg border-gray-300 focus:border-brand-500 focus:ring-brand-500" required>
          @foreach ($rarities as $r)
            <option value="{{ $r }}" @selected(old('rarity', $fish->rarity)===$r)>{{ $r }}</option>
          @endforeach
        </select>
        @error('rarity')<p class="text-rose-600 text-sm mt-1">{{ $message }}</p>@enderror
      </div>

      <div>
        <label class="text-sm text-gray-600">Berat Minimum (kg)</label>
        <input type="number" step="0.01" min="0" name="base_weight_min" value="{{ old('base_weight_min', $fish->base_weight_min) }}"
               class="mt-1 w-full rounded-lg border-gray-300 focus:border-brand-500 focus:ring-brand-500" required>
        @error('base_weight_min')<p class="text-rose-600 text-sm mt-1">{{ $message }}</p>@enderror
      </div>

      <div>
        <label class="text-sm text-gray-600">Berat Maksimum (kg)</label>
        <input type="number" step="0.01" min="0" name="base_weight_max" value="{{ old('base_weight_max', $fish->base_weight_max) }}"
               class="mt-1 w-full rounded-lg border-gray-300 focus:border-brand-500 focus:ring-brand-500" required>
        @error('base_weight_max')<p class="text-rose-600 text-sm mt-1">{{ $message }}</p>@enderror
      </div>

      <div>
        <label class="text-sm text-gray-600">Harga Jual per kg (Coins)</label>
        <input type="number" min="0" name="sell_price_per_kg" value="{{ old('sell_price_per_kg', $fish->sell_price_per_kg) }}"
               class="mt-1 w-full rounded-lg border-gray-300 focus:border-brand-500 focus:ring-brand-500" required>
        @error('sell_price_per_kg')<p class="text-rose-600 text-sm mt-1">{{ $message }}</p>@enderror
      </div>

      <div>
        <label class="text-sm text-gray-600">Peluang Tertangkap (%)</label>
        <input type="number" step="0.01" min="0.01" max="100" name="catch_probability" value="{{ old('catch_probability', $fish->catch_probability) }}"
               class="mt-1 w-full rounded-lg border-gray-300 focus:border-brand-500 focus:ring-brand-500" required>
        @error('catch_probability')<p class="text-rose-600 text-sm mt-1">{{ $message }}</p>@enderror
      </div>

      <div class="sm:col-span-2">
        <label class="text-sm text-gray-600">Deskripsi</label>
        <textarea name="description" rows="3" class="mt-1 w-full rounded-lg border-gray-300 focus:border-brand-500 focus:ring-brand-500" placeholder="opsional">{{ old('description', $fish->description) }}</textarea>
        @error('description')<p class="text-rose-600 text-sm mt-1">{{ $message }}</p>@enderror
      </div>

      <div class="sm:col-span-2 flex justify-end gap-2">
        <a href="{{ route('fishes.show', $fish) }}" class="px-4 py-2 rounded-xl border hover:bg-gray-50">Batal</a>
        <button class="px-4 py-2 rounded-xl bg-brand-600 text-white hover:bg-brand-700 shadow-soft">Simpan Perubahan</button>
      </div>
    </form>
  </div>
@endsection
