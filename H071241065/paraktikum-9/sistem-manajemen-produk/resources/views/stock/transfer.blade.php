@extends('layouts.app')

@section('title', 'Form Transfer Stok')

@section('content')
  <form action="{{ route('stock.transfer.process') }}" method="POST" class="max-w-lg mx-auto">
    @csrf

    @if (session('error'))
      <div class="bg-red-100 border border-red-400 text-red-700 px-4 py-3 rounded relative mb-4" role="alert">
        <span class="block sm:inline">{{ session('error') }}</span>
      </div>
    @endif

    <div class="mb-4">
      <label for="warehouse_id" class="block text-gray-700 text-sm font-bold mb-2">Gudang Tujuan</label>
      <select id="warehouse_id" name="warehouse_id"
        class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700" required>
        <option value="">Pilih Gudang</option>
        @foreach ($warehouses as $warehouse)
          <option value="{{ $warehouse->id }}" {{ old('warehouse_id') == $warehouse->id ? 'selected' : '' }}>
            {{ $warehouse->name }}
          </option>
        @endforeach
      </select>
      @error('warehouse_id')
        <p class="text-red-500 text-xs italic">{{ $message }}</p>
      @enderror
    </div>

    <div class="mb-4">
      <label for="product_id" class="block text-gray-700 text-sm font-bold mb-2">Produk</label>
      <select id="product_id" name="product_id"
        class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700" required>
        <option value="">Pilih Produk</option>
        @foreach ($products as $product)
          <option value="{{ $product->id }}" {{ old('product_id') == $product->id ? 'selected' : '' }}>
            {{ $product->name }}
          </option>
        @endforeach
      </select>
      @error('product_id')
        <p class="text-red-500 text-xs italic">{{ $message }}</p>
      @enderror
    </div>

    <div class="mb-4">
      <label for="quantity_change" class="block text-gray-700 text-sm font-bold mb-2">Jumlah Stok (Masuk/Keluar)</label>
      <input type="number" id="quantity_change" name="quantity_change" value="{{ old('quantity_change') }}"
        class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700"
        placeholder="Contoh: 10 (stok masuk) atau -5 (stok keluar)" required>
      @error('quantity_change')
        <p class="text-red-500 text-xs italic">{{ $message }}</p>
      @enderror
    </div>

    <div class="flex items-center gap-2 mt-6">
      <button type="submit" class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded">Proses
        Stok</button>
      <a href="{{ route('stock.index') }}"
        class="bg-gray-500 hover:bg-gray-700 text-white font-bold py-2 px-4 rounded">Batal</a>
    </div>
  </form>
@endsection
