@extends('layouts.app')

@section('content')
<h2 class="text-2xl font-bold mb-4">Tambah Ikan Baru</h2>

<form action="{{ route('fishes.store') }}" method="POST" class="bg-white p-6 shadow rounded">
  @csrf
  @include('fishes.form')
  <button class="mt-4 bg-blue-600 text-white px-4 py-2 rounded hover:bg-blue-700">Simpan</button>
  <a href="{{ route('fishes.index') }}" class="ml-2 text-gray-600 hover:underline">Batal</a>
</form>
@endsection
