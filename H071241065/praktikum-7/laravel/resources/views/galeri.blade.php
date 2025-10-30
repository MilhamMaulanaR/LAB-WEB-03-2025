@extends("template.master")

@section("title", "galery")

@section("content")
  <section class="bg-orange-50/60 px-6 py-12 text-center">
    <div class="text-center max-w-7xl mx-auto mt-32">
      <h2 class="text-5xl font-bold text-gray-900 mb-2">Galeri Foto Bali</h2>
      <p class="text-gray-600 text-lg mb-10">
        Koleksi foto memukau yang menampilkan keindahan alam, budaya, dan kuliner Bali
      </p>

      <!-- Grid Galeri -->
      <div class="grid grid-cols-1 mt-20 sm:grid-cols-2 md:grid-cols-3 gap-6">
        <x-gallery-item src="candi-bentar" title="Candi Bentar at Sunset" category="Budaya" />
        <x-gallery-item src="tanah-lot" title="Tanah Lot" />
        <x-gallery-item src="uluwatu" title="Uluwatu Temple" />
        <x-gallery-item src="rice-terraces" title="Tegallalang Rice Terrace" />
        <x-gallery-item src="bebek-betutu" title="Bebek Betutu" category="Kuliner" />
        <x-gallery-item src="nasi-campur" title="Nasi Campur Bali" category="Kuliner" />
      </div>

      <!-- Tombol -->
      <div class="mt-10">
        <div class="bg-linear-to-r from-teal-600 to-teal-500 text-white rounded-xl py-10 px-8 shadow-md">
          <h4 class="font-bold text-2xl">Bagikan Momen Anda</h4>
          <p class="text-lg text-teal-100 mt-1">
            Kunjungi Bali dan abadikan pengalaman tak terlupakan Anda. Tag kami di media sosial dengan
            <span class="text-white font-medium">#EksplorBali</span>
          </p>
        </div>
      </div>
    </div>
  </section>
@endsection
