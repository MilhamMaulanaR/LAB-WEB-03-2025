@extends('layouts.master')

@section('title', 'Kuliner Khas Kendari')

@section('content')
    <div class="relative h-96 w-full flex items-center justify-center bg-cover bg-center" style="background-image: url('/images/mosonggi.webp');">
        <div class="absolute inset-0 bg-black bg-opacity-60 z-10"></div>
        
        <div class="relative text-center px-4 z-20" data-aos="zoom-in">
            <h1 class="text-4xl md:text-5xl font-bold text-white mb-4 text-shadow">Sajian Kuliner Khas Kendari</h1>
            <p class="text-xl text-gray-200 text-shadow">Cita rasa otentik yang akan menggugah selera Anda.</p>
        </div>
    </div>

    <div class="w-full bg-c-main-bg border-t border-c-main-bg">
        <div class="px-4 sm:px-6 lg:px-8 py-16">

            <div class="space-y-16">

                <div class="flex flex-col md:flex-row-reverse gap-8 items-start" data-aos="fade-up">
                    <div class="w-full md:w-1/2">
                        <div class="aspect-video w-full rounded-lg shadow-lg overflow-hidden" data-aos="zoom-in" data-aos-delay="100">
                            <img src="/images/mosonggi.webp" alt="Sinonggi" class="w-full h-full object-cover">
                        </div>
                    </div>
                    <div class="w-full md:w-1/2">
                        <h3 class="text-3xl font-bold text-gray-900 mb-4">Sinonggi</h3>
                        <p class="text-slate-700 leading-relaxed text-lg mb-4">
                            Sinonggi adalah jiwa kuliner Suku Tolaki dan merupakan warisan budaya yang tak ternilai. Secara historis, jauh sebelum beras menjadi umum, sagu adalah sumber karbohidrat utama bagi masyarakat di tanah Sulawesi Tenggara. Proses makan Sinonggi bersama-sama, yang dikenal sebagai 'mosonggi', adalah sebuah ritual komunal yang mempererat ikatan sosial dan keluarga.
                        </p>
                        <p class="text-slate-700 leading-relaxed text-lg mb-4">
                            Bahan utamanya sangat sederhana, yaitu pati sagu murni yang disiram dengan air panas mendidih hingga mengental menjadi adonan yang lengket, kenyal, dan transparan. Secara mandiri, Sinonggi memiliki rasa yang netral dan tawar, mirip dengan papeda di Maluku, menjadikannya kanvas sempurna untuk hidangan pelengkapnya.
                        </p>
                        <p class="text-slate-700 leading-relaxed text-lg">
                            Keajaiban citarasa Sinonggi dibangkitkan oleh kuah pelengkapnya. Biasanya, ia disantap (atau 'digulung' dengan sumpit kayu) bersama kuah ikan palumara atau pindang yang kaya akan rasa asam, gurih, dan segar dari rempah-rempah. Ditambah sayuran rebus dan sambal pedas, setiap suapan adalah perpaduan sensasi kenyal dari sagu dengan ledakan rasa gurih dan pedas yang menghangatkan.
                        </p>
                    </div>
                </div>

                <div class="flex flex-col md:flex-row gap-8 items-start" data-aos="fade-up">
                    <div class="w-full md:w-1/2">
                        <div class="aspect-video w-full rounded-lg shadow-lg overflow-hidden" data-aos="zoom-in" data-aos-delay="100">
                            <img src="/images/sate pokea.jpeg" alt="Sate Gogos Pokea" class="w-full h-full object-cover">
                        </div>
                    </div>
                    <div class="w-full md:w-1/2">
                        <h3 class="text-3xl font-bold text-gray-900 mb-4">Sate Gogos Pokea</h3>
                        <p class="text-slate-700 leading-relaxed text-lg mb-4">
                            Sate Gogos Pokea adalah ikon kuliner jalanan (street food) khas Kendari yang unik dan sulit ditemukan di tempat lain. 'Pokea' adalah sebutan lokal untuk kerang air tawar yang hidup melimpah di dasar sungai-sungai di Sulawesi Tenggara. Sate ini adalah cerminan dari kekayaan alam lokal dan kreativitas masyarakat dalam mengolahnya.
                        </p>
                        <p class="text-slate-700 leading-relaxed text-lg mb-4">
                            Bahan utamanya adalah daging kerang Pokea segar yang telah direbus dan dikeluarkan dari cangkangnya. Daging kerang ini kemudian ditusuk ke lidi bambu dan dilumuri bumbu rendam yang kaya. Bumbu halusnya terdiri dari cabai, bawang, kunyit, jahe, dan sedikit gula merah untuk membantu proses karamelisasi saat dibakar.
                        </p>
                        <p class="text-slate-700 leading-relaxed text-lg">
                            Citarasanya sangat khas dan menggugah selera. Daging kerangnya sendiri memiliki tekstur yang kenyal dengan rasa sedikit manis. Saat dibakar di atas bara api, bumbu rempah yang kaya meresap sempurna, menciptakan aroma asap yang wangi. Rasanya adalah perpaduan kompleks antara gurih, manis, dan sedikit pedas, menjadikannya camilan yang sempurna.
                        </p>
                    </div>
                </div>

                <div class="flex flex-col md:flex-row-reverse gap-8 items-start" data-aos="fade-up">
                    <div class="w-full md:w-1/2">
                        <div class="aspect-video w-full rounded-lg shadow-lg overflow-hidden" data-aos="zoom-in" data-aos-delay="100">
                            <img src="/images/kasuami.jpg" alt="Kasuami" class="w-full h-full object-cover">
                        </div>
                    </div>
                    <div class="w-full md:w-1/2">
                        <h3 class="text-3xl font-bold text-gray-900 mb-4">Kasuami</h3>
                        <p class="text-slate-700 leading-relaxed text-lg mb-4">
                            Kasuami adalah makanan pokok legendaris lainnya dari Sulawesi Tenggara, dengan akar budaya yang sangat kuat dari daerah Buton dan Muna, namun telah diadopsi secara luas di Kendari. Secara historis, Kasuami adalah "roti"-nya para pelaut Buton. Teksturnya yang padat dan awet (tidak mudah basi) menjadikannya bekal ideal untuk melaut selama berhari-hari.
                        </p>
                        <p class="text-slate-700 leading-relaxed text-lg mb-4">
                            Bahan dasarnya sangat sederhana, yaitu singkong (ubi kayu) parut murni. Singkong tersebut diperas untuk menghilangkan kandungan airnya, lalu dipadatkan dan dikukus di dalam cetakan anyaman daun kelapa yang berbentuk kerucut tumpul yang sangat ikonik. Proses inilah yang memberikan bentuk dan aroma khasnya.
                        </p>
                        <p class="text-slate-700 leading-relaxed text-lg">
                            Hidangan ini memiliki cita rasa yang gurih alami khas singkong dan tekstur yang padat namun lembut. Kasuami jarang dimakan sendirian; ia adalah pendamping sempurna untuk berbagai lauk. Citarasanya yang cenderung netral berfungsi untuk menyerap bumbu dari hidangan lain, terutama ikan bakar, sup ikan (Ikan Parende), atau sambal terasi.
                        </p>
                    </div>
                </div>

            </div>
        </div>
    </div>
<div class="w-full bg-c-light-bg" data-aos="fade-up">
        <div class="px-4 sm:px-6 lg:px-8 py-16 text-center">
            
            <h2 class="text-3xl md:text-4xl font-bold text-c-primary">Tunggu Apa Lagi?</h2>
            
            <p class="text-lg text-slate-700 mt-4 mb-8 max-w-2xl mx-auto">
                Dari cita rasa kuliner yang unik hingga destinasi alam yang memukau, Kendari menunggu untuk Anda jelajahi.
            </p>
            
            <a href="{{ route('kontak') }}" 
               class="bg-c-primary text-c-main-bg font-bold text-lg px-8 py-3 rounded-lg shadow-lg 
                      hover:bg-c-secondary transition-all duration-300">
                Rencanakan Kunjungan
            </a>
        </div>
    </div>
@endsection