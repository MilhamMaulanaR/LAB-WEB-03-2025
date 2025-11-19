@extends('layouts.app')

@section('title', 'Edit Kategori')

@section('content')
  <form action="{{ route('categories.update', $category->id) }}" method="POST">
    @csrf
    @method('PUT')

    <div class="mb-4">
      <label for="name" class="block text-gray-700 text-sm font-bold mb-2">Nama Kategori</label>
      <input type="text" id="name" name="name" value="{{ old('name', $category->name) }}"
        class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline @error('name') border-red-500 @enderror"
        required>
      @error('name')
        <p class="text-red-500 text-xs italic">{{ $message }}</p>
      @enderror
    </div>

    <div class="mb-4">
      <label for="description" class="block text-gray-700 text-sm font-bold mb-2">Deskripsi</label>
      <textarea id="description" name="description" rows="4"
        class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline @error('description') border-red-500 @enderror">{{ old('description', $category->description) }}</textarea>
      @error('description')
        <p class="text-red-500 text-xs italic">{{ $message }}</p>
      @enderror
    </div>

    <div class="flex items-center gap-2">
      <button type="submit"
        class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded focus:outline-none focus:shadow-outline">
        Update
      </button>
      <a href="{{ route('categories.index') }}"
        class="bg-gray-500 hover:bg-gray-700 text-white font-bold py-2 px-4 rounded focus:outline-none focus:shadow-outline">
        Batal
      </a>
    </div>
  </form>
@endsection
