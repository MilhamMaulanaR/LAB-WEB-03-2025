  @extends('layouts.master')

  @section('title','Galeri — Explore Palu')

  @section('content')
    <div class="flex items-end justify-between gap-4 mt-4">
      <div>
        <h1 class="text-3xl font-bold">Galeri Foto</h1>
        <p class="text-gray-600 mt-2">Kumpulan momen Palu—destinasi, ikon, budaya. Gunakan grid responsive.</p>
      </div>
      <x-button :href="route('home')" class="bg-white text-gray-900 border border-brand-300">Kembali</x-button>
    </div>

    <div class="mt-8 grid grid-cols-2 sm:grid-cols-3 lg:grid-cols-4 gap-4">
      @for($i=1;$i<=8;$i++)
        <div class="overflow-hidden rounded-2xl border border-brand-300 bg-white">
          <img src="/images/galeri/{{ $i }}.jpg" alt="Galeri Palu {{ $i }}" class="w-full h-40 object-cover hover:scale-105 transition">
        </div>
      @endfor
    </div>
  @endsection
