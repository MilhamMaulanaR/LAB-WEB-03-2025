@extends('layouts.app')

@section('title', 'Laporan Stok per Gudang')

@section('content')

  <form action="{{ route('stock.index') }}" method="GET" class="mb-6">
    <label for="warehouse_id" class="block text-gray-700 text-sm font-bold mb-2">Pilih Gudang:</label>
    <div class="flex">
      <select id="warehouse_id" name="warehouse_id" class="shadow border rounded w-full md:w-1/3 py-2 px-3 text-gray-700">
        <option value="">-- Tampilkan Semua Gudang --</option>
        @foreach ($warehouses as $warehouse)
          <option value="{{ $warehouse->id }}" {{ request('warehouse_id') == $warehouse->id ? 'selected' : '' }}>
            {{ $warehouse->name }}
          </option>
        @endforeach
      </select>
      <button type="submit" class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded ml-2">
        Filter
      </button>
      <a href="{{ route('stock.transfer.form') }}"
        class="bg-green-500 hover:bg-green-700 text-white font-bold py-2 px-4 rounded ml-auto">
        + Transfer Stok
      </a>
    </div>
  </form>

  @if ($selectedWarehouse)
    <h3 class="text-xl font-semibold mb-4">Stok untuk: {{ $selectedWarehouse->name }}</h3>

    <div class="overflow-x-auto">
      <table class="min-w-full divide-y divide-gray-200">
        <thead class="bg-gray-50">
          <tr>
            <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">No</th>
            <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Nama Produk</th>
            <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Total Stok</th>
          </tr>
        </thead>
        <tbody class="bg-white divide-y divide-gray-200">
          @forelse ($stockList as $key => $product)
            <tr>
              <td class="px-6 py-4 whitespace-nowrap">{{ $key + 1 }}</td>
              <td class="px-6 py-4 whitespace-nowrap">{{ $product->name }}</td>
              <td class="px-6 py-4 whitespace-nowrap">{{ $product->pivot->quantity }} unit</td>
            </tr>
          @empty
            <tr>
              <td colspan="3" class="px-6 py-4 text-center">Tidak ada stok produk di gudang ini.</td>
            </tr>
          @endforelse
        </tbody>
      </table>
    </div>
  @else
    <p class="text-gray-600">Silakan pilih gudang untuk melihat stok.</p>
  @endif

@endsection
