@extends('layouts.app')

@section('title', 'Tambah Warehouse Baru')

@section('content')
  <form action="{{ route('warehouses.store') }}" method="POST">
    @csrf
    <div class="mb-4">
      <label for="name" class="block text-gray-700 text-sm font-bold mb-2">Nama Warehouse</label>
      <input type="text" id="name" name="name" value="{{ old('name') }}"
        class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline @error('name') border-red-500 @enderror"
        required>
      @error('name')
        <p class="text-red-500 text-xs italic">{{ $message }}</p>
      @enderror
    </div>

    <div class="mb-4">
      <label for="location" class="block text-gray-700 text-sm font-bold mb-2">Lokasi</label>
      <textarea id="location" name="location" rows="4"
        class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline @error('location') border-red-500 @enderror">{{ old('location') }}</textarea>
      @error('location')
        <p class="text-red-500 text-xs italic">{{ $message }}</p>
      @enderror
    </div>

    <div class="flex items-center gap-2">
      <button type="submit"
        class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded focus:outline-none focus:shadow-outline">
        Simpan
      </button>
      <a href="{{ route('warehouses.index') }}"
        class="bg-gray-500 hover:bg-gray-700 text-white font-bold py-2 px-4 rounded focus:outline-none focus:shadow-outline">
        Batal
      </a>
    </div>
  </form>
@endsection
