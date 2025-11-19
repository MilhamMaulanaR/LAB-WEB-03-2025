@extends('layouts.app')

@section('content')
  <div class="flex justify-between items-center mb-4">
    <h2 class="text-2xl font-bold">Daftar Ikan</h2>
    <a href="{{ route('fishes.create') }}" class="bg-blue-600 text-white px-4 py-2 rounded hover:bg-blue-700">+ Tambah
      Ikan</a>
  </div>

  <div class="overflow-x-auto bg-white shadow rounded">
    <table class="min-w-full text-left text-sm">
      <thead class="bg-blue-600 text-white">
        <tr>
          <th class="px-4 py-2">ID</th>
          <th class="px-4 py-2">Nama</th>
          <th class="px-4 py-2">Rarity</th>
          <th class="px-4 py-2">Harga/kg</th>
          <th class="px-4 py-2">Peluang (%)</th>
          <th class="px-4 py-2">Aksi</th>
        </tr>
      </thead>
      <tbody>
        @forelse($fishes as $fish)
          <tr class="border-b hover:bg-gray-50">
            <td class="px-4 py-2">{{ $fish->id }}</td>
            <td class="px-4 py-2 font-medium">{{ $fish->name }}</td>
            <td class="px-4 py-2">{{ $fish->rarity }}</td>
            <td class="px-4 py-2">{{ $fish->sell_price_per_kg }}</td>
            <td class="px-4 py-2">{{ $fish->catch_probability }}</td>
            <td class="px-4 py-2 space-x-1">
              <a href="{{ route('fishes.show', $fish->id) }}" class="text-blue-600 hover:underline">Detail</a>
              <a href="{{ route('fishes.edit', $fish->id) }}" class="text-yellow-600 hover:underline">Edit</a>
              <form action="{{ route('fishes.destroy', $fish->id) }}" method="POST" class="inline"
                onsubmit="return confirm('Yakin hapus ikan ini?')">
                @csrf
                @method('DELETE')
                <button class="text-red-600 hover:underline">Hapus</button>
              </form>
            </td>
          </tr>
        @empty
          <tr>
            <td colspan="6" class="text-center text-gray-500 py-4">Belum ada data ikan</td>
          </tr>
        @endforelse
      </tbody>
    </table>
  </div>

  <div class="mt-4">
    {{ $fishes->links() }}
  </div>

  <!-- Snackbar -->
  <div id="snackbar"
    class="fixed bottom-4 left-1/2 transform -translate-x-1/2 bg-green-600 text-white px-6 py-3 rounded shadow-lg transition-opacity duration-300 opacity-0 pointer-events-none">
    <span id="snackbar-message"></span>
  </div>

  @if (session('success'))
    <script>
      showSnackbar("{{ session('success') }}");
    </script>
  @endif

  <script>
    function showSnackbar(message) {
      const snackbar = document.getElementById('snackbar');
      const snackbarMessage = document.getElementById('snackbar-message');

      snackbarMessage.textContent = message;
      snackbar.classList.remove('opacity-0', 'pointer-events-none');
      snackbar.classList.add('opacity-100');

      setTimeout(() => {
        snackbar.classList.remove('opacity-100');
        snackbar.classList.add('opacity-0', 'pointer-events-none');
      }, 3000);
    }
  </script>
@endsection
