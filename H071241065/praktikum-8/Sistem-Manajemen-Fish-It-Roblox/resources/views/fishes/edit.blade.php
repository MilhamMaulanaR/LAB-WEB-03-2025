@extends('layouts.app')

@section('content')
<h2 class="text-2xl font-bold mb-4">Edit Ikan</h2>

<form action="{{ route('fishes.update', $fish->id) }}" method="POST" class="bg-white p-6 shadow rounded">
  @csrf
  @method('PUT')
  @include('fishes.form')
  <button class="mt-4 bg-green-600 text-white px-4 py-2 rounded hover:bg-green-700">Update</button>
  <a href="{{ route('fishes.index') }}" class="ml-2 text-gray-600 hover:underline">Batal</a>
</form>
@endsection
