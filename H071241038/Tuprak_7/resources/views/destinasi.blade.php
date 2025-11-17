@extends('layouts.master')

@section('title', 'Destinasi Wisata Kendari')

@section('content')

<div class="relative h-96 w-full flex items-center justify-center bg-cover bg-center" style="background-image: url('/images/pulau bokori.jpg');">
        <div class="absolute inset-0 bg-black bg-opacity-60 z-10"></div>
        <div class="relative text-center px-4 z-20" data-aos="zoom-in">
            <h1 class="text-4xl md:text-5xl font-bold text-white mb-4 text-shadow">Destinasi Wisata Unggulan</h1>
            <p class="text-xl text-gray-200 text-shadow">Tempat-tempat ikonik yang wajib Anda kunjungi di Kendari.</p>
        </div>
    </div>

    <div class="w-full bg-c-main-bg">
        <div class="px-4 sm:px-6 lg:px-8 py-16">

            <div class="space-y-16">

                <div class="flex flex-col md:flex-row gap-8 items-start" data-aos="fade-up">
                    <div class="w-full md:w-1/2">
                        <img src="/images/jembatan teluk kendari.jpg" alt="Jembatan Teluk Kendari" class="rounded-lg shadow-lg object-cover w-full h-[450px]">
                    </div>
                    <div class="w-full md:w-1/2">
                        <h3 class="text-3xl font-bold text-gray-900 mb-4">Jembatan Teluk Kendari</h3>
                        <p class="text-slate-700 leading-relaxed text-lg mb-4">
                            Ini adalah mahakarya teknik sekaligus ikon modern kebanggaan Kendari. Jembatan Teluk Kendari bukanlah sekadar infrastruktur; ia adalah simbol transformasi kota. Dibangun untuk memangkas waktu tempuh dan menghubungkan dua daratan yang terpisah oleh teluk—Kota Lama dan Kecamatan Poasia—proyek ambisius ini diresmikan pada tahun 2020.
                        </p>
                        <p class="text-slate-700 leading-relaxed text-lg mb-4">
                            Secara visual, jembatan ini memukau. Dengan desain *cable-stayed* yang anggun, pilon utamanya menjulang gagah, menciptakan siluet yang dramatis di cakrawala teluk. Keindahannya terpancar penuh saat senja, ketika langit jingga berpadu dengan struktur megahnya.
                        </p>
                        <p class="text-slate-700 leading-relaxed text-lg">
                            Pada malam hari, jembatan ini bermandi cahaya arsitektural warna-warni, menjadikannya 'landmark' paling fotogenik di kota. Jembatan ini bukan lagi sekadar penyeberangan, tapi telah menjadi ruang publik baru bagi masyarakat untuk bersantai, berolahraga, dan menikmati pemandangan teluk yang tenang.
                        </p>
                    </div>
                </div>

                <div class="flex flex-col md:flex-row-reverse gap-8 items-start" data-aos="fade-up">
                    <div class="w-full md:w-1/2">
                        <img src="/images/pulau bokori.jpg" alt="Pulau Bokori" class="rounded-lg shadow-lg object-cover w-full h-[450px]">
                    </div>
                    <div class="w-full md:w-1/2">
                        <h3 class="text-3xl font-bold text-gray-900 mb-4">Pulau Bokori</h3>
                        <p class="text-slate-700 leading-relaxed text-lg mb-4">
                            Sebuah surga tropis yang terlahir kembali. Pulau Bokori memiliki sejarah unik; dahulu, ia adalah perkampungan Suku Bajo yang ramai. Namun, akibat abrasi dan naiknya permukaan air laut, pulau ini perlahan tenggelam dan ditinggalkan. Selama bertahun-tahun, ia menjadi pulau 'hantu' yang terlupakan.
                        </p>
                        <p class="text-slate-700 leading-relaxed text-lg mb-4">
                            Pemerintah daerah kemudian melihat potensi emas ini dan melakukan reklamasi besar-besaran, mengubahnya menjadi salah satu destinasi wisata bahari paling premium di Sulawesi Tenggara. Keindahannya kini terletak pada pasir putihnya yang begitu halus dan hamparan air laut pirus sebening kristal.
                        </p>
                        <p class="text-slate-700 leading-relaxed text-lg">
                            Pulau ini dirancang sempurna untuk liburan: deretan gazebo kayu yang estetik berbaris rapi di pantai, perairan dangkal yang aman untuk berenang, dan suasana tenang yang jauh dari hiruk pikuk kota. Ini adalah definisi sempurna dari sebuah pelarian singkat yang mewah dan memanjakan mata.
                        </p>
                    </div>
                </div>
                
                <div class="flex flex-col md:flex-row gap-8 items-start" data-aos="fade-up">
                    <div class="w-full md:w-1/2">
                        <img src="/images/pantai namu.jpeg" alt="Pantai Namu" class="rounded-lg shadow-lg object-cover w-full h-[450px]">
                    </div>
                    <div class="w-full md:w-1/2">
                        <h3 class="text-3xl font-bold text-gray-900 mb-4">Pantai Namu</h3>
                      <p class="text-slate-700 leading-relaxed text-lg mb-4">
                        Pantai Namu sering disebut sebagai salah satu 'permata tersembunyi' sejati di pesisir Kendari, dan julukan itu sangat pantas. Sejarahnya bukanlah sebagai destinasi wisata massal, melainkan sebagai rahasia lokal, sebuah tempat pelarian bagi mereka yang tahu di mana menemukannya. Letaknya yang sedikit terpencil dari pusat kota menjadikannya surga bagi pencari ketenangan.
                    </p>
                    <p class="text-slate-700 leading-relaxed text-lg mb-4">
                        Keindahannya langsung membius. Anda akan disambut oleh hamparan pasir putih yang terasa seperti tepung halus di bawah kaki, berpadu sempurna dengan gradasi air laut yang tenang—dari pirus di tepi hingga biru pekat di kejauhan. Karena ombaknya yang lembut, pantai ini adalah 'kolam renang' alami yang sangat ideal dan aman untuk keluarga.
                    </p>
                     <p class="text-slate-700 leading-relaxed text-lg">
                        Namun, daya tarik utamanya adalah atmosfernya. Jauh dari kebisingan, satu-satunya suara adalah desiran ombak lembut dan nyiur yang melambai. Saat sore tiba, Pantai Namu bertransformasi menjadi panggung alam untuk salah satu pemandangan matahari terbenam paling magis di Kendari, melukis langit dengan palet warna api yang memantul di permukaan air.
                    </p>
                    </div>
                </div>

                <div class="flex flex-col md:flex-row-reverse gap-8 items-start" data-aos="fade-up">
                    <div class="w-full md:w-1/2">
                        <img src="/images/pantai taipa.jpg" alt="Pantai Taipa" class="rounded-lg shadow-lg object-cover w-full h-[450px]">
                    </div>
                    <div class="w-full md:w-1/2">
                        <h3 class="text-3xl font-bold text-gray-900 mb-4">Pantai Taipa</h3>
                       <p class="text-slate-700 leading-relaxed text-lg mb-4">
                            Pantai Taipa menawarkan sesuatu yang berbeda. Ini bukan hanya tentang pasir dan air, tapi tentang lanskap dramatis dan pahatan alam yang memukau. Ciri khas utama pantai ini adalah gugusan batu-batu karang raksasa yang kokoh berdiri, menciptakan pemandangan yang eksotis dan penuh karakter.
                        </p>
                        <p class="text-slate-700 leading-relaxed text-lg mb-4">
                            Sejarah geologisnya telah menciptakan sebuah galeri seni alami. Formasi batuan ini adalah hasil dari proses erosi selama ribuan tahun, di mana ombak tanpa henti mengukir tepian daratan. Mitos lokal sering mengaitkan batu-batu ini dengan legenda kuno, menambah aura mistisnya.
                        </p>
                        <p class="text-slate-700 leading-relaxed text-lg">
                            Pengunjung dapat menaiki salah satu bukit karang untuk menyaksikan panorama laut lepas yang tak terhalang, atau menjelajahi celah-celah batu saat air surut. Ini adalah destinasi yang memanjakan mata para fotografer dan memuaskan jiwa petualang yang mencari keindahan pantai yang 'liar' dan otentik.
                        </p>
                    </div>
                </div>

                <div class="flex flex-col md:flex-row gap-8 items-start" data-aos="fade-up">
                    <div class="w-full md:w-1/2">
                        <img src="/images/air-terjun-moramo..webp" alt="Air Terjun Moramo" class="rounded-lg shadow-lg object-cover w-full h-[450px]">
                    </div>
                    <div class="w-full md:w-1/2">
                        <h3 class="text-3xl font-bold text-gray-900 mb-4">Air Terjun Moramo</h3>
                       <p class="text-slate-700 leading-relaxed text-lg mb-4">
                            Jauh dari pesisir, di dalam lebatnya Suaka Alam Tanjung Peropa, tersimpan sebuah keajaiban geologi: Air Terjun Moramo. Sejarahnya adalah sejarah alam itu sendiri, sebuah proses ribuan tahun yang masih berlangsung. Ini bukanlah air terjun tunggal yang jatuh menjulang tinggi.
                        </p>
                        <p class="text-slate-700 leading-relaxed text-lg mb-4">
                            Keindahannya terletak pada strukturnya yang unik—sebuah simfoni air yang mengalir di atas ratusan undakan batu kapur (marmer) yang tersusun alami. Dengan total 7 tingkatan utama dan puluhan tingkatan kecil, airnya yang jernih dan sejuk mengalir tenang, menciptakan kolam-kolam alami berwarna hijau toska.
                        </p>
                        <p class="text-slate-700 leading-relaxed text-lg">
                            Dikelilingi oleh hutan tropis yang asri dan suara fauna liar, perjalanan menuju air terjun ini adalah petualangan tersendiri. Bagi pengunjung, ini adalah kesempatan langka untuk "mandi" di atas batuan marmer alami yang berkilauan, sebuah pengalaman menyegarkan yang tidak akan ditemukan di tempat lain.
                        </p>
                    </div>
                </div>
                
            </div> 
        </div>

<div class="w-full bg-c-light-bg" data-aos="fade-up">
        <div class="px-4 sm:px-6 lg:px-8 py-16 text-center">
            
            <h2 class="text-3xl md:text-4xl font-bold text-c-primary">Tunggu Apa Lagi?</h2>
            
            <p class="text-lg text-slate-700 mt-4 mb-8 max-w-2xl mx-auto">
                Dari pantai-pantai eksotis hingga air terjun yang menyejukkan, Kendari menunggu untuk Anda jelajahi.
            </p>
            
            <a href="{{ route('kontak') }}" 
               class="bg-c-primary text-c-main-bg font-bold text-lg px-8 py-3 rounded-lg shadow-lg 
                      hover:bg-c-secondary transition-all duration-300">
                Rencanakan Kunjungan
            </a>
        </div>
    </div>
@endsection