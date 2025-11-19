@extends('layouts.app')

@section('title', 'Detail Warehouse')

@section('content')
  <div class="mb-4">
    <h3 class="text-lg font-bold text-gray-700">Nama Warehouse:</h3>
    <p class="text-gray-900">{{ $warehouse->name }}</p>
  </div>

  <div class="mb-4">
    <h3 class="text-lg font-bold text-gray-700">Lokasi:</h3>
    <p class="text-gray-900">{{ $warehouse->location ?? 'Tidak ada lokasi.' }}</p>
  </div>

  <div class="mb-4">
    <h3 class="text-lg font-bold text-gray-700">Waktu Dibuat:</h3>
    <p class="text-gray-900">{{ $warehouse->created_at->format('d F Y H:i:s') }}</p>
  </div>

  <div class="mb-4">
    <h3 class="text-lg font-bold text-gray-700">Waktu Diperbarui:</h3>
    <p class="text-gray-900">{{ $warehouse->updated_at->format('d F Y H:i:s') }}</p>
  </div>

  <a href="{{ route('warehouses.index') }}"
    class="bg-gray-500 hover:bg-gray-700 text-white font-bold py-2 px-4 rounded inline-block">
    Kembali ke List
  </a>
@endsection
