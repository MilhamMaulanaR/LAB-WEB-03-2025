@extends('layouts.app')

@section('title', 'Manajemen Warehouse')

@section('content')
  <a href="{{ route('warehouses.create') }}"
    class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded mb-4 inline-block">
    Tambah Warehouse Baru
  </a>

  <div class="overflow-x-auto">
    <table class="min-w-full divide-y divide-gray-200">
      <thead class="bg-gray-50">
        <tr>
          <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">No</th>
          <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Nama
            Warehouse</th>
          <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Lokasi
          </th>
          <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Aksi
          </th>
        </tr>
      </thead>
      <tbody class="bg-white divide-y divide-gray-200">
        @forelse ($warehouses as $key => $warehouse)
          <tr>
            <td class="px-6 py-4 whitespace-nowrap">{{ $key + 1 }}</td>
            <td class="px-6 py-4 whitespace-nowrap">{{ $warehouse->name }}</td>
            <td class="px-6 py-4">{{ $warehouse->location }}</td>
            <td class="px-6 py-4 whitespace-nowrap text-sm font-medium">
              <a href="{{ route('warehouses.show', $warehouse->id) }}"
                class="bg-gray-500 hover:bg-gray-700 text-white font-bold py-2 px-4 rounded">
                Show
              </a>
              <a href="{{ route('warehouses.edit', $warehouse->id) }}"
                class="bg-yellow-500 hover:bg-yellow-700 text-white font-bold py-2 px-4 rounded">
                Edit
              </a>

              <form action="{{ route('warehouses.destroy', $warehouse->id) }}" method="POST" class="inline-block">
                @csrf
                @method('DELETE')
                <button type="submit" class="bg-red-500 hover:bg-red-700 text-white font-bold py-2 px-4 rounded"
                  onclick="return confirm('Yakin ingin menghapus?')">
                  Hapus
                </button>
              </form>
            </td>
          </tr>
        @empty
          <tr>
            <td colspan="4" class="px-6 py-4 text-center">Tidak ada data.</td>
          </tr>
        @endforelse
      </tbody>
    </table>
  </div>
@endsection
