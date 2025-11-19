@extends('layouts.app')

@section('title', 'Detail Kategori')

@section('content')
  <div class="mb-4">
    <h3 class="text-lg font-bold text-gray-700">Nama Kategori:</h3>
    <p class="text-gray-900">{{ $category->name }}</p>
  </div>

  <div class="mb-4">
    <h3 class="text-lg font-bold text-gray-700">Deskripsi:</h3>
    <p class="text-gray-900">{{ $category->description ?? 'Tidak ada deskripsi.' }}</p>
  </div>

  <div class="mb-4">
    <h3 class="text-lg font-bold text-gray-700">Waktu Dibuat:</h3>
    <p class="text-gray-900">{{ $category->created_at->format('d F Y H:i:s') }}</p>
  </div>

  <div class="mb-4">
    <h3 class="text-lg font-bold text-gray-700">Waktu Diperbarui:</h3>
    <p class="text-gray-900">{{ $category->updated_at->format('d F Y H:i:s') }}</p>
  </div>

  <a href="{{ route('categories.index') }}"
    class="bg-gray-500 hover:bg-gray-700 text-white font-bold py-2 px-4 rounded inline-block">
    Kembali ke List
  </a>
@endsection
