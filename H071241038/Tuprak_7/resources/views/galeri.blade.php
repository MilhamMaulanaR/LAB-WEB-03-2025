@extends('layouts.master')

@section('title', 'Galeri Foto Kendari')

@section('content')

<div class="relative h-96 w-full flex items-center justify-center bg-cover bg-center" style="background-image: url('/images/wajah kota kendari.webp');">
    <div class="absolute inset-0 bg-black bg-opacity-60 z-10"></div>
    <div class="relative text-center px-4 z-20" data-aos="zoom-in">
        <h1 class="text-4xl md:text-5xl font-bold text-white mb-4 text-shadow">Galeri Pesona Kendari</h1>
        <p class="text-xl text-gray-200 text-shadow">Momen-momen indah yang tertangkap kamera di berbagai sudut kota.</p>
    </div>
</div>

<div class="w-full bg-c-main-bg">
    <div class="px-4 sm:px-6 lg:px-8 py-16">

        <div data-aos="fade-up" class="mb-12">
            <h3 class="text-2xl font-semibold text-gray-900 mb-4 border-b border-c-light-bg pb-2">Landmark & Wajah Kota</h3>
            <div class="grid grid-cols-2 md:grid-cols-4 gap-6">
                
                <div data-aos="fade-up" data-aos-delay="100" class="relative aspect-square bg-c-light-bg rounded-lg shadow-md overflow-hidden transition-all duration-300 hover:shadow-xl hover:scale-105 group">
                    <img src="/images/sejarah.jpg" alt="Sejarah Kota Kendari" class="w-full h-full object-cover">
                    <div class="absolute bottom-0 left-0 right-0 p-4 bg-gradient-to-t from-black/70 to-transparent">
                        <p class="text-white font-semibold text-center truncate text-xl">Sejarah Kota Kendari</p>
                    </div>
                </div>
                
                <div data-aos="fade-up" data-aos-delay="150" class="relative aspect-square bg-c-light-bg rounded-lg shadow-md overflow-hidden transition-all duration-300 hover:shadow-xl hover:scale-105 group">
                    <img src="/images/budaya kendari.jpeg" alt="Wajah Kota Kendari" class="w-full h-full object-cover">
                    <div class="absolute bottom-0 left-0 right-0 p-4 bg-gradient-to-t from-black/70 to-transparent">
                        <p class="text-white font-semibold text-center truncate text-xl">Budaya Kota Kendari</p>
                    </div>
                </div>

                <div data-aos="fade-up" data-aos-delay="200" class="relative aspect-square bg-c-light-bg rounded-lg shadow-md overflow-hidden transition-all duration-300 hover:shadow-xl hover:scale-105 group">
                    <img src="/images/wajah kota kendari 2.webp" alt="Sejarah Kendari" class="w-full h-full object-cover">
                    <div class="absolute bottom-0 left-0 right-0 p-4 bg-gradient-to-t from-black/70 to-transparent">
                        <p class="text-white font-semibold text-center truncate text-xl">Perkembangan Kota Kendari</p>
                    </div>
                </div>
                
            </div>
        </div>

        <div data-aos="fade-up" class="mb-12">
            <h3 class="text-2xl font-semibold text-gray-900 mb-4 border-b border-c-light-bg pb-2">Destinasi Alam</h3>
            <div class="grid grid-cols-2 md:grid-cols-4 gap-6">
                
                <div data-aos="fade-up" data-aos-delay="100" class="relative aspect-square bg-c-light-bg rounded-lg shadow-md overflow-hidden transition-all duration-300 hover:shadow-xl hover:scale-105 group">
                    <img src="/images/pulau bokori.jpg" alt="Pulau Bokori" class="w-full h-full object-cover">
                    <div class="absolute bottom-0 left-0 right-0 p-4 bg-gradient-to-t from-black/70 to-transparent">
                        <p class="text-white font-semibold text-center truncate text-xl">Pulau Bokori</p>
                    </div>
                </div>
                
                <div data-aos="fade-up" data-aos-delay="150" class="relative aspect-square bg-c-light-bg rounded-lg shadow-md overflow-hidden transition-all duration-300 hover:shadow-xl hover:scale-105 group">
                    <img src="/images/pantai namu.jpeg" alt="Pantai Namu" class="w-full h-full object-cover">
                    <div class="absolute bottom-0 left-0 right-0 p-4 bg-gradient-to-t from-black/70 to-transparent">
                        <p class="text-white font-semibold text-center truncate text-xl">Pantai Namu</p>
                    </div>
                </div>

                <div data-aos="fade-up" data-aos-delay="200" class="relative aspect-square bg-c-light-bg rounded-lg shadow-md overflow-hidden transition-all duration-300 hover:shadow-xl hover:scale-105 group">
                    <img src="/images/pantai taipa.jpg" alt="Pantai Taipa" class="w-full h-full object-cover">
                    <div class="absolute bottom-0 left-0 right-0 p-4 bg-gradient-to-t from-black/70 to-transparent">
                        <p class="text-white font-semibold text-center truncate text-xl">Pantai Taipa</p>
                    </div>
                </div>

                <div data-aos="fade-up" data-aos-delay="250" class="relative aspect-square bg-c-light-bg rounded-lg shadow-md overflow-hidden transition-all duration-300 hover:shadow-xl hover:scale-105 group">
                    <img src="/images/air-terjun-moramo..webp" alt="Air Terjun Moramo" class="w-full h-full object-cover">
                    <div class="absolute bottom-0 left-0 right-0 p-4 bg-gradient-to-t from-black/70 to-transparent">
                        <p class="text-white font-semibold text-center truncate text-xl">Air Terjun Moramo</p>
                    </div>
                </div>

                <div data-aos="fade-up" data-aos-delay="250" class="relative aspect-square bg-c-light-bg rounded-lg shadow-md overflow-hidden transition-all duration-300 hover:shadow-xl hover:scale-105 group">
                    <img src="/images/jembatan teluk kendari.jpg" alt="Jembatan Teluk Kendari" class="w-full h-full object-cover">
                    <div class="absolute bottom-0 left-0 right-0 p-4 bg-gradient-to-t from-black/70 to-transparent">
                        <p class="text-white font-semibold text-center truncate text-xl">Jembatan Teluk Kendari</p>
                    </div>
                </div>

            </div>
        </div>

        <div data-aos="fade-up" class="mb-12">
            <h3 class="text-2xl font-semibold text-gray-900 mb-4 border-b border-c-light-bg pb-2">Budaya & Kuliner</h3>
            <div class="grid grid-cols-2 md:grid-cols-4 gap-6">
                
                <div data-aos="fade-up" data-aos-delay="100" class="relative aspect-square bg-c-light-bg rounded-lg shadow-md overflow-hidden transition-all duration-300 hover:shadow-xl hover:scale-105 group">
                    <img src="/images/molulo.jpg" alt="Tarian Molulo" class="w-full h-full object-cover">
                    <div class="absolute bottom-0 left-0 right-0 p-4 bg-gradient-to-t from-black/70 to-transparent">
                        <p class="text-white font-semibold text-center truncate text-xl">Tarian Molulo</p>
                    </div>
                </div>

                <div data-aos="fade-up" data-aos-delay="150" class="relative aspect-square bg-c-light-bg rounded-lg shadow-md overflow-hidden transition-all duration-300 hover:shadow-xl hover:scale-105 group">
                    <img src="/images/mosonggi.webp" alt="Kuliner Sinonggi" class="w-full h-full object-cover">
                    <div class="absolute bottom-0 left-0 right-0 p-4 bg-gradient-to-t from-black/70 to-transparent">
                        <p class="text-white font-semibold text-center truncate text-xl">Sinonggi</p>
                    </div>
                </div>

                <div data-aos="fade-up" data-aos-delay="200" class="relative aspect-square bg-c-light-bg rounded-lg shadow-md overflow-hidden transition-all duration-300 hover:shadow-xl hover:scale-105 group">
                    <img src="/images/sate pokea.jpeg" alt="Kuliner Sate Pokea" class="w-full h-full object-cover">
                    <div class="absolute bottom-0 left-0 right-0 p-4 bg-gradient-to-t from-black/70 to-transparent">
                        <p class="text-white font-semibold text-center truncate text-xl">Sate Pokea</p>
                    </div>
                </div>

                <div data-aos="fade-up" data-aos-delay="300" class="relative aspect-square bg-c-light-bg rounded-lg shadow-md overflow-hidden transition-all duration-300 hover:shadow-xl hover:scale-105 group">
                    <img src="/images/Kasuami.jpg" alt="Kuliner Kasuami" class="w-full h-full object-cover">
                    <div class="absolute bottom-0 left-0 right-0 p-4 bg-gradient-to-t from-black/70 to-transparent">
                        <p class="text-white font-semibold text-center truncate text-xl">Kasuami</p>
                    </div>
                </div>

            </div>
        </div>

    </div>
</div>

<div class="w-full bg-c-light-bg" data-aos="fade-up">
    <div class="px-4 sm:px-6 lg:px-8 py-16 text-center">
        
        <h2 class="text-3xl md:text-4xl font-bold text-c-primary">Tunggu Apa Lagi?</h2>
        
        <p class="text-lg text-slate-700 mt-4 mb-8 max-w-2xl mx-auto">
            Sudah melihat keindahannya? Sekarang saatnya merasakan langsung. Kendari menunggu Anda.
        </p>
        
        <a href="{{ route('kontak') }}" 
           class="bg-c-primary text-c-main-bg font-bold text-lg px-8 py-3 rounded-lg shadow-lg 
                  hover:bg-c-secondary transition-all duration-300">
            Rencanakan Kunjungan
        </a>
    </div>
</div>
@endsection