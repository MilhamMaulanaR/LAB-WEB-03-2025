@extends('layouts.master')

@section('title', 'Selamat Datang di Kendari')

@section('content')
    <div class="relative z-0 h-screen w-full flex items-center justify-center bg-cover bg-center" style="background-image: url('/images/sulawesi-tenggara-land.webp');">
        
        <div class="absolute inset-0 bg-black bg-opacity-60 z-10"></div>
        
        <div class="relative text-center px-4 z-20" data-aos="zoom-in">
            <h1 class="text-4xl md:text-6xl font-bold text-white mb-4 text-shadow">Selamat Datang di Kendari</h1>
            <p class="text-xl text-gray-200 text-shadow mb-8">Menjelajahi Pesona Ibu Kota Sulawesi Tenggara.</p>
            
            <a href="#content-start" 
               class="bg-c-primary text-c-main-bg font-bold text-lg px-8 py-3 rounded-lg shadow-lg 
                      hover:bg-c-secondary transition-all duration-300">
                Mulai Jelajah
            </a>
        </div>
    </div>

    <div id="content-start" class="w-full bg-c-main-bg">
        <div class="px-4 sm:px-6 lg:px-8 py-16" data-aos="fade-up">
            <h2 class="text-3xl font-semibold text-c-primary mb-6 border-b-2 border-c-light-bg pb-2">
                Sejarah Singkat Kendari
            </h2>
            <div class="flex flex-col md:flex-row gap-8 items-start">
                <div class="w-full md:w-1/2">
                    <p class="text-slate-700 leading-relaxed mb-4 text-lg">
                        Kendari, sebagai jantung Sulawesi Tenggara, adalah sebuah kota yang kaya akan sejarah. Terletak strategis di tepi Teluk Kendari, wilayah ini telah lama menjadi titik temu penting bagi para pelaut dan pedagang.
                    </p>
                    <p class="text-slate-700 leading-relaxed mb-4 text-lg">
                        Nama 'Kendari' sendiri diyakini berasal dari kata 'Kandai', sebuah alat dari bambu yang digunakan untuk mendorong perahu, mencerminkan warisan maritimnya yang kental. Dari sebuah permukiman kecil di era kesultanan, Kendari kini telah bertumbuh menjadi ibu kota provinsi yang dinamis, menjadi saksi bisu perjalanan waktu di tanah Anoa.
                    </p>

                </div>
                <div class="w-full md:w-1/2">
                    <img src="/images/sejarah.jpg" alt="Foto Sejarah Kendari" class="rounded-lg shadow-lg object-cover w-full h-[450px]">
                </div>
            </div>
        </div>
    </div>

    <div class="w-full bg-c-main-bg border-t border-c-main-bg">
        <div class="px-4 sm:px-6 lg:px-8 py-16" data-aos="fade-up">
            <h2 class="text-3xl font-semibold text-c-primary mb-6 border-b-2 border-c-main-bg pb-2">
                Kekayaan Budaya
            </h2>
            <div class="flex flex-col md:flex-row-reverse gap-8 items-start">
                <div class="w-full md:w-1/2">
                    <p class="text-slate-700 leading-relaxed mb-4 text-lg">
                        Kendari adalah rumah bagi Suku Tolaki, salah satu etnis terbesar dan tertua di Sulawesi Tenggara. Mereka adalah masyarakat yang memegang teguh warisan leluhur dan dikenal memiliki ikatan kuat dengan alam serta menjunjung tinggi filosofi 'Kalosara', simbol persatuan dan hukum adat.
                    </p>
                    <p class="text-slate-700 leading-relaxed mb-4 text-lg">
                        Warisan mereka tidak hanya terlihat pada tarian tradisional yang penuh kebersamaan, tetapi juga dalam sistem kekerabatan, seni bertutur (lisan), dan kearifan lokal. Tradisi kuliner otentik seperti Sinonggi, yang akan Anda temukan di halaman kuliner kami, juga merupakan bagian tak terpisahkan dari identitas Suku Tolaki yang terus dijaga.
                    </p>
                </div>
                <div class="w-full md:w-1/2">
                    <img src="/images/budaya kendari.jpeg" alt="Suku Tolaki" class="rounded-lg shadow-lg object-cover w-full h-[450px]">
                </div>
            </div>
        </div>
    </div>
    
    <div class="w-full bg-c-main-bg border-t border-c-light-bg">
        <div class="px-4 sm:px-6 lg:px-8 py-16" data-aos="fade-up">
            <h2 class="text-3xl font-semibold text-c-primary mb-6 border-b-2 border-c-light-bg pb-2">
                Perkembangan Kota
            </h2>
            <div class="flex flex-col md:flex-row gap-8 items-start">
                <div class="w-full md:w-1/2">
                   <p class="text-slate-700 leading-relaxed mb-4 text-lg">
                        Kendari hari ini adalah wajah modern Sulawesi Tenggara. Kota ini mengalami transformasi pesat, ditandai dengan hadirnya infrastruktur megah seperti Jembatan Teluk Kendari yang ikonik dan Tugu Persatuan MTQ yang Anda lihat di gambar pembuka.
                    </p>
                     <p class="text-slate-700 leading-relaxed mb-4 text-lg">
                        Pusat-pusat bisnis baru dan fasilitas publik terus bertumbuh, menandakan vitalitas ekonomi kota. Namun, di tengah kemajuan ini, Kendari tetap berkomitmen menjaga harmoni dengan alam, menawarkan kualitas hidup yang seimbang antara denyut perkotaan dan ketenangan alam.
                    </p>
                </div>
                <div class="w-full md:w-1/2">
                    <img src="/images/wajah kota kendari 2.webp" alt="Wajah Kota Kendari Modern" class="rounded-lg shadow-lg object-cover w-full h-[450px]">
                </div>
            </div>
        </div>

        <div class="w-full bg-c-light-bg" data-aos="fade-up">
        <div class="px-4 sm:px-6 lg:px-8 py-16 text-center">
            
            <h2 class="text-3xl md:text-4xl font-bold text-c-primary">Tunggu Apa Lagi?</h2>
            
            <p class="text-lg text-slate-700 mt-4 mb-8 max-w-2xl mx-auto">
                Sudah melihat tentang sejarah dan budaya Kendari? Sekarang saatnya merasakan langsung. Kendari menunggu Anda.
            </p>
            
            <a href="{{ route('kontak') }}" 
               class="bg-c-primary text-c-main-bg font-bold text-lg px-8 py-3 rounded-lg shadow-lg 
                      hover:bg-c-secondary transition-all duration-300">
                Rencanakan Kunjungan
            </a>
        </div>

    </div>
@endsection