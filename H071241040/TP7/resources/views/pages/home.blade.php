@extends('layouts.master')

@section('title', 'Explore Palu — Gerbang Teluk Sulawesi Tengah')

@section('hero')
<div class="relative h-screen w-full overflow-hidden bg-black" data-aos="fade-in">
  {{-- VIDEO tampil otomatis, tidak looping --}}
  <video id="profileVideo"
         autoplay muted playsinline
         poster="/images/Home2.jpg"
         class="absolute inset-0 w-full h-full object-cover transition-all duration-700">
    <source src="/videos/Profil-palu.mp4" type="video/mp4">
    Browser kamu tidak mendukung video.
  </video>

  {{-- Overlay gradasi agar teks tetap terbaca --}}
  <div class="absolute inset-0 bg-gradient-to-t from-black/50 via-black/20 to-transparent"></div>

  {{-- TEKS HERO --}}
  <div class="absolute inset-0 flex flex-col items-center justify-center text-center px-6 sm:px-10 text-white bg-black/40 backdrop-brightness-75"
       data-aos="fade-up" data-aos-delay="100">
    <h1 class="text-3xl sm:text-6xl font-extrabold tracking-wide drop-shadow-[0_3px_6px_rgba(0,0,0,0.8)]"
        data-aos="zoom-in" data-aos-delay="200">
      Selamat Datang di <span class="text-amber-300">Palu</span>
    </h1>
    <p class="mt-4 max-w-2xl text-base sm:text-lg text-white/95 leading-relaxed drop-shadow-[0_2px_5px_rgba(0,0,0,0.7)]"
       data-aos="fade-up" data-aos-delay="300">
      Palu, kota teluk yang dikelilingi pegunungan, bernafas dalam semangat 
      <em class="text-amber-200 font-semibold">Nosarara Nosabatutu</em> — 
      <span class="italic">Bersaudara dan Bersatu</span>.  
      Nikmati panorama pantai, jembatan ikonik, dan kuliner khas yang tak terlupakan.
    </p>

    <div class="mt-8 flex flex-wrap gap-4 justify-center" data-aos="fade-up" data-aos-delay="400">
      <x-button :href="route('destinasi')" class="bg-amber-400 text-gray-900 font-semibold px-5 py-2 rounded-full shadow-md hover:bg-amber-300 transition-all duration-300">
        🌊 Jelajah Destinasi
      </x-button>
      <x-button :href="route('kuliner')" class="bg-transparent border border-amber-300 text-amber-200 font-semibold px-5 py-2 rounded-full hover:bg-amber-300 hover:text-gray-900 transition-all duration-300">
        🍴 Cicipi Kuliner
      </x-button>
    </div>
  </div>
</div>

{{-- Ganti video ke gambar setelah selesai --}}
<script>
  const video = document.getElementById('profileVideo');
  if (video) {
    video.addEventListener('ended', () => {
      video.classList.add('opacity-0');
      setTimeout(() => {
        video.insertAdjacentHTML('afterend', `
          <img src="/images/Home2.jpg"
               alt="Teluk Palu"
               class="absolute inset-0 w-full h-full object-cover transition-opacity duration-700 opacity-100">
        `);
        // Re-calc posisi elemen AOS setelah hero berubah
        if (window.AOS && typeof AOS.refresh === 'function') AOS.refresh();
      }, 700);
    });
  }
</script>
@endsection

@section('content')

{{-- Section 1: Budaya Kaili --}}
<section data-aos="fade-right" class="relative mt-16 flex flex-col md:flex-row items-center gap-10 px-6 md:px-16">
  <img data-aos="zoom-in" data-aos-delay="100"
       src="/images/Suku-kaili.jpg" alt="Suku Kaili"
       class="w-full md:w-1/2 rounded-2xl shadow-lg object-cover">
  <div class="md:w-1/2" data-aos="fade-left" data-aos-delay="150">
    <h2 class="text-3xl font-semibold text-gray-800 mb-3">Budaya Suku Kaili</h2>
    <p class="text-gray-700 leading-relaxed">
      Suku Kaili dikenal sebagai penduduk asli Kota Palu yang menjunjung tinggi nilai kebersamaan, 
      adat istiadat, serta tradisi seperti tarian <em>Modero</em> dan upacara <em>Balia</em>.
      Nilai ini menjadi fondasi filosofi <strong>Nosarara Nosabatutu</strong> yang berarti bersaudara dan bersatu.
    </p>
  </div>
</section>

{{-- Section 2: Jembatan Palu --}}
<section data-aos="fade-up" class="relative mt-20 flex flex-col-reverse md:flex-row items-center gap-10 px-6 md:px-16">
  <div class="md:w-1/2" data-aos="fade-up-right">
    <h2 class="text-3xl font-semibold text-gray-800 mb-3">Ikon Kota: Jembatan Palu</h2>
    <p class="text-gray-700 leading-relaxed">
      Jembatan Palu adalah simbol kebangkitan kota setelah bencana 2018. 
      Lengkung megahnya melintasi teluk dengan pemandangan matahari terbenam yang menakjubkan,
      menjadikannya tempat favorit wisatawan dan fotografer.
    </p>
  </div>
  <img data-aos="zoom-in" data-aos-delay="100"
       src="/images/Jembatan-palu.jpg" alt="Jembatan Palu"
       class="w-full md:w-1/2 rounded-2xl shadow-lg object-cover">
</section>

{{-- Section 3: Banua Mbaso --}}
<section data-aos="fade-right" class="relative mt-20 flex flex-col md:flex-row items-center gap-10 px-6 md:px-16">
  <img data-aos="zoom-in" data-aos-delay="100"
       src="/images/banua-mbaso.jpg" alt="Banua Mbaso"
       class="w-full md:w-1/2 rounded-2xl shadow-lg object-cover">
  <div class="md:w-1/2" data-aos="fade-left" data-aos-delay="150">
    <h2 class="text-3xl font-semibold text-gray-800 mb-3">Banua Mbaso — Rumah Adat Kaili</h2>
    <p class="text-gray-700 leading-relaxed">
      <em>Banua Mbaso</em> adalah rumah adat tradisional masyarakat Kaili yang sarat makna simbolik. 
      Arsitekturnya mencerminkan keselarasan antara manusia dan alam, 
      serta menjadi jejak sejarah yang masih bertahan di tengah modernitas Palu.
    </p>
  </div>
</section>

{{-- Section 4: Mengapa Palu --}}
<section data-aos="fade-up" class="mt-24 rounded-2xl bg-white border border-amber-200 shadow-sm p-8 mx-6 md:mx-16 text-center">
  <h2 class="text-2xl font-semibold text-gray-800">Mengapa Palu?</h2>
  <p class="mt-3 text-gray-700 leading-relaxed max-w-3xl mx-auto">
    Palu menawarkan kombinasi panorama teluk, pegunungan, dan budaya yang unik.  
    Dengan akses mudah dari Bandara Mutiara SIS Al-Jufri, Palu cocok untuk liburan singkat maupun eksplorasi budaya lebih dalam.
  </p>
  <div class="mt-5" data-aos="zoom-in" data-aos-delay="100">
    <x-button :href="route('galeri')">📸 Lihat Galeri</x-button>
  </div>
</section>

@endsection
