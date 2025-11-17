@extends('layouts.app')

@section('title', 'Add New Fish')

@section('content')
    <h1 class="text-3xl font-bold text-gray-800 mb-6">Add New Fish</h1>

    {{-- Form Container --}}
    <form action="{{ route('fishes.store') }}" method="POST">
        @csrf
        <div class="grid grid-cols-1 md:grid-cols-2 gap-x-8 gap-y-6">

            {{-- Kolom Kiri --}}
            <div class="space-y-6">
                <div>
                    <label for="name" class="block text-sm font-medium text-gray-700">Fish Name</label>
                    <input type="text" name="name" id="name" value="{{ old('name') }}"
                           class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-indigo-500 focus:ring-indigo-500 @error('name') border-red-500 @enderror"
                           required>
                    @error('name')
                        <p class="mt-2 text-sm text-red-600">{{ $message }}</p>
                    @enderror
                </div>

                <div>
                    <label for="rarity" class="block text-sm font-medium text-gray-700">Rarity</label>
                    <select name="rarity" id="rarity"
                            class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-indigo-500 focus:ring-indigo-500 @error('rarity') border-red-500 @enderror"
                            required>
                        <option value="">-- Select Rarity --</option>
                        @foreach ($rarities as $rarity)
                            <option value="{{ $rarity }}" {{ old('rarity') == $rarity ? 'selected' : '' }}>
                                {{ $rarity }}
                            </option>
                        @endforeach
                    </select>
                    @error('rarity')
                        <p class="mt-2 text-sm text-red-600">{{ $message }}</p>
                    @enderror
                </div>

                <div>
                    <label for="base_weight_min" class="block text-sm font-medium text-gray-700">Min Weight (kg)</label>
                    <input type="number" name="base_weight_min" id="base_weight_min" value="{{ old('base_weight_min') }}"
                           step="0.01" min="0.01" placeholder="e.g., 0.50"
                           class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-indigo-500 focus:ring-indigo-500 @error('base_weight_min') border-red-500 @enderror"
                           required>
                    @error('base_weight_min')
                        <p class="mt-2 text-sm text-red-600">{{ $message }}</p>
                    @enderror
                </div>

                <div>
                    <label for="base_weight_max" class="block text-sm font-medium text-gray-700">Max Weight (kg)</label>
                    <input type="number" name="base_weight_max" id="base_weight_max" value="{{ old('base_weight_max') }}"
                           step="0.01" min="0.01" placeholder="e.g., 2.50"
                           class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-indigo-500 focus:ring-indigo-500 @error('base_weight_max') border-red-500 @enderror"
                           required>
                    @error('base_weight_max')
                        <p class="mt-2 text-sm text-red-600">{{ $message }}</p>
                    @enderror
                </div>
            </div>

            {{-- Kolom Kanan --}}
            <div class="space-y-6">
                <div>
                    <label for="sell_price_per_kg" class="block text-sm font-medium text-gray-700">Sell Price / kg (Coins)</label>
                    <input type="number" name="sell_price_per_kg" id="sell_price_per_kg" value="{{ old('sell_price_per_kg') }}"
                           step="1" min="1" placeholder="e.g., 100"
                           class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-indigo-500 focus:ring-indigo-500 @error('sell_price_per_kg') border-red-500 @enderror"
                           required>
                    @error('sell_price_per_kg')
                        <p class="mt-2 text-sm text-red-600">{{ $message }}</p>
                    @enderror
                </div>

                <div>
                    <label for="catch_probability" class="block text-sm font-medium text-gray-700">Catch Probability (%)</label>
                    <input type="number" name="catch_probability" id="catch_probability" value="{{ old('catch_probability') }}"
                           step="0.01" min="0.01" max="100.00" placeholder="e.g., 45.50"
                           class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-indigo-500 focus:ring-indigo-500 @error('catch_probability') border-red-500 @enderror"
                           required>
                    @error('catch_probability')
                        <p class="mt-2 text-sm text-red-600">{{ $message }}</p>
                    @enderror
                </div>

                <div>
                    <label for="description" class="block text-sm font-medium text-gray-700">Description (Optional)</label>
                    <textarea name="description" id="description" rows="5"
                              class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-indigo-500 focus:ring-indigo-500 @error('description') border-red-500 @enderror"
                              placeholder="deskripsi singkat ikan">{{ old('description') }}</textarea>
                    @error('description')
                        <p class="mt-2 text-sm text-red-600">{{ $message }}</p>
                    @enderror
                </div>
            </div>
        </div>

        {{-- Tombol Aksi --}}
        <div class="flex justify-end space-x-4 mt-8 pt-6 border-t border-gray-200">
            <a href="{{ route('fishes.index') }}" class="inline-flex items-center px-4 py-2 bg-white border border-gray-300 rounded-md font-semibold text-xs text-gray-700 uppercase tracking-widest shadow-sm hover:text-gray-500 focus:outline-none focus:border-blue-300 focus:ring ring-blue-200 disabled:opacity-25 transition ease-in-out duration-150">
                Cancel
            </a>
            <button type="submit" class="inline-flex items-center px-4 py-2 bg-indigo-600 border border-transparent rounded-md font-semibold text-xs text-white uppercase tracking-widest hover:bg-indigo-700 active:bg-indigo-800 focus:outline-none focus:border-indigo-900 focus:ring ring-indigo-300 disabled:opacity-25 transition ease-in-out duration-150">
                Save Fish
            </button>
        </div>
    </form>
@endsection