@extends('layouts.app')

@section('title', 'Detail Produk')

@section('content')
  <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
    <div>
      <h3 class="text-xl font-semibold mb-4 border-b pb-2">Informasi Utama</h3>
      <div class="mb-4">
        <h4 class="text-gray-700 font-bold">Nama Produk:</h4>
        <p>{{ $product->name }}</p>
      </div>
      <div class="mb-4">
        <h4 class="text-gray-700 font-bold">Kategori:</h4>
        <p>{{ optional($product->category)->name ?? 'Tidak ada kategori' }}</p>
      </div>
      <div class="mb-4">
        <h4 class="text-gray-700 font-bold">Harga:</h4>
        <p>Rp {{ number_format($product->price, 2, ',', '.') }}</p>
      </div>
    </div>

    <div>
      <h3 class="text-xl font-semibold mb-4 border-b pb-2">Informasi Detail</h3>
      <div class="mb-4">
        <h4 class="text-gray-700 font-bold">Deskripsi:</h4>
        <p>{{ optional($product->productDetail)->description ?? 'N/A' }}</p>
      </div>
      <div class="mb-4">
        <h4 class="text-gray-700 font-bold">Berat:</h4>
        <p>{{ optional($product->productDetail)->weight ?? 'N/A' }} kg</p>
      </div>
      <div class="mb-4">
        <h4 class="text-gray-700 font-bold">Ukuran:</h4>
        <p>{{ optional($product->productDetail)->size ?? 'N/A' }}</p>
      </div>
    </div>
  </div>

  <hr class="my-6">
  <a href="{{ route('products.index') }}"
    class="bg-gray-500 hover:bg-gray-700 text-white font-bold py-2 px-4 rounded inline-block">
    Kembali ke List
  </a>
@endsection
