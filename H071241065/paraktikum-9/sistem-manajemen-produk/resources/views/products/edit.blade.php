@extends('layouts.app')

@section('title', 'Edit Produk')

@section('content')
  <form action="{{ route('products.update', $product->id) }}" method="POST">
    @csrf
    @method('PUT')

    <h3 class="text-xl font-semibold mb-4">Informasi Produk Utama</h3>
    <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
      <div class="mb-4">
        <label for="name" class="block text-gray-700 text-sm font-bold mb-2">Nama Produk</label>
        <input type="text" id="name" name="name" value="{{ old('name', $product->name) }}"
          class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700" required>
      </div>

      <div class="mb-4">
        <label for="category_id" class="block text-gray-700 text-sm font-bold mb-2">Kategori</label>
        <select id="category_id" name="category_id"
          class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700">
          <option value="">Pilih Kategori (Opsional)</option>
          @foreach ($categories as $category)
            <option value="{{ $category->id }}"
              {{ old('category_id', $product->category_id) == $category->id ? 'selected' : '' }}>
              {{ $category->name }}
            </option>
          @endforeach
        </select>
      </div>

      <div class="mb-4">
        <label for="price" class="block text-gray-700 text-sm font-bold mb-2">Harga</label>
        <input type="number" id="price" name="price" value="{{ old('price', $product->price) }}"
          class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700" required step="0.01">
      </div>
    </div>

    <hr class="my-6">
    <h3 class="text-xl font-semibold mb-4">Informasi Detail Produk</h3>

    <div class="mb-4">
      <label for="description" class="block text-gray-700 text-sm font-bold mb-2">Deskripsi Lengkap</label>
      <textarea id="description" name="description" rows="4"
        class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700">{{ old('description', optional($product->productDetail)->description) }}</textarea>
    </div>

    <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
      <div class="mb-4">
        <label for="weight" class="block text-gray-700 text-sm font-bold mb-2">Berat (kg)</label>
        <input type="number" id="weight" name="weight"
          value="{{ old('weight', optional($product->productDetail)->weight) }}"
          class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700" required step="0.01">
      </div>
      <div class="mb-4">
        <label for="size" class="block text-gray-700 text-sm font-bold mb-2">Ukuran (contoh: 15 inch)</label>
        <input type="text" id="size" name="size"
          value="{{ old('size', optional($product->productDetail)->size) }}"
          class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700">
      </div>
    </div>

    <div class="flex items-center gap-2 mt-6">
      <button type="submit" class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded">Update</button>
      <a href="{{ route('products.index') }}"
        class="bg-gray-500 hover:bg-gray-700 text-white font-bold py-2 px-4 rounded">Batal</a>
    </div>
  </form>
@endsection
