@extends("template.master")

@section("title", "home")

@section("content")
  <section class="pt-70 h-screen overflow-hidden">
    <div class="absolute inset-0 brightness-70 -z-20">
      <img src="{{ asset("images/hero-bali.jpg") }}" alt="hero-bali" class="w-full object-cover h-full" />
    </div>
    <div class="max-w-4xl mx-auto flex flex-col gap-6 px-4 z-10 text-center text-white">
      <h1 class="text-5xl font-bold md:text-7xl">Eksplor Keindahan Bali</h1>
      <p class="text-xl md:text-2xl text-white/90">
        Temukan pesona destinasi wisata, kelezatan kuliner khas, dan
        <br />
        keindahan pulau dewata
      </p>
      <div class="flex gap-6 mt-8 md:mt-0 md:gap-4 justify-center flex-col md:flex-row items-center">
        <x-button><a href="/destinasi">Jelajahi Destinasi →</a></x-button>
        <x-button><a href="/kuliner">Cicipi Kuliner →</a></x-button>
      </div>
    </div>
  </section>

  <section class="bg-[#FAFAF8] flex items-center py-26">
    <div class="max-w-7xl mx-auto px-4 text-center">
      <!-- Judul -->
      <h2 class="text-3xl md:text-5xl font-bold text-gray-900">Nikmati Pengalaman Lengkap</h2>
      <p class="text-gray-600 text-lg mt-5">Panduan wisata terlengkap untuk petualangan tak terlupakan di Bali</p>

      <!-- Kartu -->
      <div class="grid grid-cols-1 sm:grid-cols-2 md:grid-cols-3 gap-6 mt-12">
        <!-- Kartu 1 -->
        <div class="bg-white p-8 rounded-2xl shadow-sm hover:shadow-md transition">
          <div class="w-16 h-16 mx-auto flex items-center justify-center rounded-full bg-teal-500/10 mb-4">
            <i class="ri-map-pin-2-line text-3xl text-teal-400"></i>
          </div>
          <h3 class="font-semibold text-lg text-gray-800">Destinasi Wisata</h3>
          <p class="text-gray-600 mt-2">Jelajahi tempat-tempat menakjubkan dari pura ikonik hingga pantai eksotis</p>
          <a
            href="/destinasi"
            class="inline-flex justify-center items-center mt-4 font-semibold text-teal-700 hover:text-teal-800"
          >
            Lihat Destinasi
            <i class="ri-arrow-right-s-line mt-1"></i>
          </a>
        </div>

        <!-- Kartu 2 -->
        <div class="bg-white p-8 rounded-2xl shadow-sm hover:shadow-md transition">
          <div class="w-16 h-16 mx-auto flex items-center justify-center rounded-full bg-amber-500/10 mb-4">
            <i class="ri-restaurant-2-line text-3xl text-amber-500"></i>
          </div>
          <h3 class="font-semibold text-lg text-gray-800">Kuliner Khas</h3>
          <p class="text-gray-600 mt-2">Rasakan cita rasa autentik Bali dari makanan tradisional hingga modern</p>
          <a href="/kuliner" class="inline-flex items-center mt-4 font-semibold text-amber-600 hover:text-amber-700">
            Cicipi Kuliner
            <i class="ri-arrow-right-s-line mt-1"></i>
          </a>
        </div>

        <!-- Kartu 3 -->
        <div class="bg-white p-8 rounded-2xl shadow-sm hover:shadow-md transition">
          <div class="w-16 h-16 mx-auto flex items-center justify-center rounded-full bg-amber-500/10 mb-4">
            <i class="ri-image-line text-3xl text-yellow-400"></i>
          </div>
          <h3 class="font-semibold text-lg text-gray-800">Galeri Foto</h3>
          <p class="text-gray-600 mt-2">Lihat koleksi foto memukau yang menampilkan keindahan Bali</p>
          <a href="/galeri" class="inline-flex items-center mt-4 font-semibold text-amber-600 hover:text-amber-700">
            Lihat Galeri
            <i class="ri-arrow-right-s-line mt-1"></i>
          </a>
        </div>
      </div>
    </div>
  </section>

  <section
    class="py-24 bg-linear-to-r px-4 text-center text-white flex flex-col gap-6 justify-center items-center from-teal-600 to-teal-400"
  >
    <h1 class="text-4xl md:text-5xl font-bold">Siap Memulai Petualangan?</h1>
    <p class="text-xl md:text-2xl text-white/90">Hubungi kami untuk informasi lebih lanjut tentang wisata Bali</p>
    <x-button><a href="/kontak">Hubungi Kami</a></x-button>
  </section>
@endsection
