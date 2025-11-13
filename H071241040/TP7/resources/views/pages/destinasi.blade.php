@extends('layouts.master')

@section('title','Destinasi — Explore Palu')

@section('content')

  {{-- Header + CTA --}}
  <div class="mt-4 flex flex-col sm:flex-row items-start sm:items-end justify-between gap-4" data-aos="fade-up">
    <div>
      <h1 class="text-3xl font-bold">Destinasi Unggulan</h1>
      <p class="text-gray-600 mt-1">Minimal 3 spot—silakan tambah lagi sesuai koleksi fotomu.</p>
    </div>
    <div class="flex gap-3">
      <x-button :href="route('galeri')" class="bg-black text-gray-900 border border-brand-300">Lihat Galeri</x-button>
      <x-button :href="route('home')" class="bg-black text-gray-900 border border-brand-300">Kembali</x-button>
    </div>
  </div>


  <div class="mt-6 rounded-xl border border-brand-300 bg-white p-4" data-aos="fade-up" data-aos-delay="100">
    <div class="flex flex-col lg:flex-row gap-4 items-start lg:items-center justify-between">
      <div class="flex flex-wrap gap-2">
        <button class="px-3 py-1.5 rounded-full border border-brand-300 bg-white hover:bg-brand-200 text-sm">Pantai</button>
        <button class="px-3 py-1.5 rounded-full border border-brand-300 bg-white hover:bg-brand-200 text-sm">Budaya</button>
        <button class="px-3 py-1.5 rounded-full border border-brand-300 bg-white hover:bg-brand-200 text-sm">Landmark</button>
        <button class="px-3 py-1.5 rounded-full border border-brand-300 bg-white hover:bg-brand-200 text-sm">Keluarga</button>
        <button class="px-3 py-1.5 rounded-full border border-brand-300 bg-white hover:bg-brand-200 text-sm">Sunset</button>
      </div>
      <div class="flex items-center gap-2">
        <label for="sort" class="text-sm text-gray-600">Urutkan:</label>
        <select id="sort" class="text-sm rounded-lg border border-brand-300 bg-white px-3 py-2">
          <option value="populer">Paling Populer</option>
          <option value="rating">Rating Tertinggi</option>
          <option value="murah">Biaya Paling Hemat</option>
          <option value="terdekat">Paling Dekat dari Pusat</option>
        </select>
      </div>
    </div>
  </div>

  <div class="mt-6 space-y-5">

    <article class="rounded-2xl border border-brand-300 bg-white overflow-hidden hover:shadow-md transition"
             data-aos="fade-up" data-aos-delay="0">
      <a href="#" class="flex flex-col md:flex-row">
        <div class="md:w-5/12 relative">
          <div class="aspect-4/3 md:aspect-[16/9] bg-brand-200 relative">
            <img src="/images/Tanjung-Karang.jpg" alt="Tanjung Karang"
                 class="absolute inset-0 w-full h-full object-cover" loading="lazy">
          </div>
          <span class="absolute top-3 left-3 inline-flex items-center gap-1 text-xs px-2 py-1 rounded-full bg-black/70 text-white">
            ⭐ 4.6 <span class="opacity-80">(1.2k)</span>
          </span>
          <span class="absolute bottom-3 left-3 text-xs px-2 py-1 rounded bg-white/90">Pantai</span>
        </div>
        <div class="md:w-7/12 p-4 sm:p-6 flex flex-col gap-3">
          <div class="flex items-start justify-between gap-3">
            <div>
              <h2 class="text-lg sm:text-xl font-semibold text-gray-900">Tanjung Karang</h2>
              <p class="text-sm text-gray-500">Pusat Kota Palu • ~2.1 km dari Jembatan Palu</p>
            </div>
            <div class="text-right">
              <div class="text-xs text-gray-500">Estimasi Biaya</div>
              <div class="text-base sm:text-lg font-bold text-gray-900">Rp0 – Rp25k</div>
              <div class="text-xs text-gray-500">Kuliner pinggir pantai</div>
            </div>
          </div>

          <p class="text-gray-700 leading-relaxed line-clamp-2">
            Garis pesisir yang panjang, favorit untuk joging pagi & berburu sunset. Ramai
            dengan jajanan lokal dan spot foto tepi teluk.
          </p>

          <div class="mt-1 flex flex-wrap items-center gap-2 text-xs">
            <span class="px-2 py-1 rounded bg-brand-200">Sunset</span>
            <span class="px-2 py-1 rounded bg-brand-200">Kuliner</span>
            <span class="px-2 py-1 rounded bg-brand-200">Keluarga</span>
          </div>

          <div class="mt-2 flex items-center justify-between">
            <div class="text-sm text-gray-600">Buka: 05.00–22.00 • Ramai saat sore</div>
            <x-button class="bg-amber-400 text-gray-900 hover:bg-amber-300">Lihat Detail</x-button>
          </div>
        </div>
      </a>
    </article>

    {{-- ITEM 2 --}}
    <article class="rounded-2xl border border-brand-300 bg-white overflow-hidden hover:shadow-md transition"
             data-aos="fade-up" data-aos-delay="50">
      <a href="#" class="flex flex-col md:flex-row">
        <div class="md:w-5/12 relative">
          <div class="aspect-[4/3] md:aspect-[16/9] bg-brand-200 relative">
            <img src="/images/Salena.jpg" alt="Salena"
                 class="absolute inset-0 w-full h-full object-cover" loading="lazy">
          </div>
          <span class="absolute top-3 left-3 inline-flex items-center gap-1 text-xs px-2 py-1 rounded-full bg-black/70 text-white">
            ⭐ 4.7 <span class="opacity-80">(2.3k)</span>
          </span>
          <span class="absolute bottom-3 left-3 text-xs px-2 py-1 rounded bg-white/90">Landmark</span>
        </div>
        <div class="md:w-7/12 p-4 sm:p-6 flex flex-col gap-3">
          <div class="flex items-start justify-between gap-3">
            <div>
              <h2 class="text-lg sm:text-xl font-semibold text-gray-900">Salena</h2>
              <p class="text-sm text-gray-500">Teluk Palu • ~1.3 km dari pusat</p>
            </div>
            <div class="text-right">
              <div class="text-xs text-gray-500">Estimasi Biaya</div>
              <div class="text-base sm:text-lg font-bold text-gray-900">Rp0</div>
              <div class="text-xs text-gray-500">Foto malam long-exposure</div>
            </div>
          </div>

          <p class="text-gray-700 leading-relaxed line-clamp-2">
            Ikon kebangkitan kota. Lengkung megah di atas teluk, paling memukau saat
            blue hour & malam hari.
          </p>

          <div class="mt-1 flex flex-wrap items-center gap-2 text-xs">
            <span class="px-2 py-1 rounded bg-brand-200">Fotografi</span>
            <span class="px-2 py-1 rounded bg-brand-200">Cityscape</span>
            <span class="px-2 py-1 rounded bg-brand-200">Romantis</span>
          </div>

          <div class="mt-2 flex items-center justify-between">
            <div class="text-sm text-gray-600">Waktu terbaik: 17.30–19.00</div>
            <x-button class="bg-amber-400 text-gray-900 hover:bg-amber-300">Lihat Detail</x-button>
          </div>
        </div>
      </a>
    </article>

    {{-- ITEM 3 --}}
    <article class="rounded-2xl border border-brand-300 bg-white overflow-hidden hover:shadow-md transition"
             data-aos="fade-up" data-aos-delay="100">
      <a href="#" class="flex flex-col md:flex-row">
        <div class="md:w-5/12 relative">
          <div class="aspect-[4/3] md:aspect-[16/9] bg-brand-200 relative">
            <img src="/images/G-Gawalise.jpeg" alt="Gunung Gawalise"
                 class="absolute inset-0 w-full h-full object-cover" loading="lazy">
          </div>
          <span class="absolute top-3 left-3 inline-flex items-center gap-1 text-xs px-2 py-1 rounded-full bg-black/70 text-white">
            ⭐ 4.5 <span class="opacity-80">(740)</span>
          </span>
          <span class="absolute bottom-3 left-3 text-xs px-2 py-1 rounded bg-white/90">Budaya</span>
        </div>
        <div class="md:w-7/12 p-4 sm:p-6 flex flex-col gap-3">
          <div class="flex items-start justify-between gap-3">
            <div>
              <h2 class="text-lg sm:text-xl font-semibold text-gray-900">Gunung Gawalise</h2>
              <p class="text-sm text-gray-500">Kawasan Budaya • ~4.5 km dari pusat</p>
            </div>
            <div class="text-right">
              <div class="text-xs text-gray-500">HTM</div>
              <div class="text-base sm:text-lg font-bold text-gray-900">Rp10k – Rp20k</div>
              <div class="text-xs text-gray-500">Tur budaya lokal</div>
            </div>
          </div>

          <p class="text-gray-700 leading-relaxed line-clamp-2">
            Jejak arsitektur dan identitas Kaili. Eksplorasi simbolik ruang & filosofi
            hidup masyarakat setempat.
          </p>

          <div class="mt-1 flex flex-wrap items-center gap-2 text-xs">
            <span class="px-2 py-1 rounded bg-brand-200">Heritage</span>
            <span class="px-2 py-1 rounded bg-brand-200">Edukasi</span>
            <span class="px-2 py-1 rounded bg-brand-200">Keluarga</span>
          </div>

          <div class="mt-2 flex items-center justify-between">
            <div class="text-sm text-gray-600">Jam kunjung: 08.00–17.00</div>
            <x-button class="bg-amber-400 text-gray-900 hover:bg-amber-300">Lihat Detail</x-button>
          </div>
        </div>
      </a>
    </article>

  </div>

  {{-- Info kecil --}}
  <div class="mt-8 text-xs text-gray-500 text-center" data-aos="fade-up" data-aos-delay="150">
    * Jarak & biaya bersifat estimasi. Cek detail setiap destinasi untuk info terbaru.
  </div>
@endsection
