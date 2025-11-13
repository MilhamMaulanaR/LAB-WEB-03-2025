<!doctype html>
<html lang="id">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width,initial-scale=1">
  <title>@yield('title','Explore Palu | Pariwisata Nusantara')</title>

  <script src="https://cdn.tailwindcss.com"></script>
  <script>
    tailwind.config = {
      theme: {
        extend: {
          colors: {
            brand: { 50:'#ffffff',100:'#fafafa',200:'#f5f5f5',300:'#f0f0f0',400:'#e7e7e7',500:'#e0e0e0' },
            accent: { DEFAULT: '#1e90ff' }
          }
        }
      }
    }
  </script>

  <!-- AOS CSS // CHANGED: taruh di master agar global -->
  <link rel="stylesheet" href="https://unpkg.com/aos@2.3.4/dist/aos.css">

  <link rel="icon" href="/images/icon-palu.png">
</head>
<body class="bg-brand-50 text-gray-800 tracking-tight">

  <!-- Header / Navbar -->
  <!-- CHANGED: z-index tinggi + gradient agar kontras di atas video -->
  <header id="siteHeader"
          class="fixed top-0 z-[200] w-full 
                 bg-gradient-to-b from-black/60 to-transparent 
                 backdrop-blur-sm border-none text-black transition-colors duration-300">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
      <div class="flex items-center justify-between h-16">
        <a href="{{ route('home') }}" class="flex items-center gap-3">
          <img src="/images/Logo.png" alt="Palu" class="h-9 w-9 rounded-xl ring-brand-300 object-cover">
          <span class="font-semibold text-lg">Explore Palu</span>
        </a>

        <nav class="hidden md:flex items-center gap-1">
          <x-nav-link :href="route('home')" :active="request()->routeIs('home')" class="text-black/90 hover:text-black transition">Home</x-nav-link>
          <x-nav-link :href="route('destinasi')" :active="request()->routeIs('destinasi')" class="text-black/90 hover:text-black transition">Destinasi</x-nav-link>
          <x-nav-link :href="route('kuliner')" :active="request()->routeIs('kuliner')" class="text-black/90 hover:text-black transition">Kuliner</x-nav-link>
          <x-nav-link :href="route('galeri')" :active="request()->routeIs('galeri')" class="text-black/90 hover:text-black transition">Galeri</x-nav-link>
          <x-nav-link :href="route('kontak')" :active="request()->routeIs('kontak')" class="text-black/90 hover:text-black transition">Kontak</x-nav-link>
        </nav>

        <button id="menuBtn" class="md:hidden inline-flex items-center justify-center p-2 rounded-xl border border-white/40 text-white">
          <span class="sr-only">Menu</span> ☰
        </button>
      </div>
    </div>

    <div id="mobileMenu" class="md:hidden hidden border-t border-white/20 bg-black/70 text-white">
      <div class="px-4 py-2 flex flex-col">
        <x-nav-link :href="route('home')" :active="request()->routeIs('home')" class="py-2 text-white/90 hover:text-black">Home</x-nav-link>
        <x-nav-link :href="route('destinasi')" :active="request()->routeIs('destinasi')" class="py-2 text-white/90 hover:text-black">Destinasi</x-nav-link>
        <x-nav-link :href="route('kuliner')" :active="request()->routeIs('kuliner')" class="py-2 text-white/90 hover:text-black">Kuliner</x-nav-link>
        <x-nav-link :href="route('galeri')" :active="request()->routeIs('galeri')" class="py-2 text-white/90 hover:text-black">Galeri</x-nav-link>
        <x-nav-link :href="route('kontak')" :active="request()->routeIs('kontak')" class="py-2 text-white/90 hover:text-black">Kontak</x-nav-link>
      </div>
    </div>
  </header>

  <!-- Hero optional per halaman -->
  @hasSection('hero')
    <section class="relative overflow-hidden">
      @yield('hero')
    </section>
  @endif

  <!-- Content -->
  <main class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 py-10">
    @yield('content')
  </main>

  <!-- Footer -->
  <footer class="mt-16 border-t border-brand-300 bg-white">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 py-8 flex flex-col sm:flex-row items-center justify-between gap-4">
      <p class="text-sm text-gray-600">© {{ date('Y') }} Explore Palu. All rights reserved.</p>
      <div class="text-sm text-gray-500">“Gerbang Sulawesi Tengah” — Teluk Palu | Nosarara Nosabatutu</div>
    </div>
  </footer>

  <!-- Scripts -->
  <script>
    const btn = document.getElementById('menuBtn');
    const menu = document.getElementById('mobileMenu');
    if (btn) btn.addEventListener('click', ()=> menu.classList.toggle('hidden'));

    // CHANGED: ubah header jadi solid saat scroll agar kontras di konten putih
    const header = document.getElementById('siteHeader');
    const onScroll = () => {
      if (window.scrollY > 8) {
        header.classList.remove('bg-gradient-to-b','from-black/60','to-transparent','text-white');
        header.classList.add('bg-white/90','backdrop-blur','shadow','text-gray-900');
        // set warna link saat header solid
        document.querySelectorAll('#siteHeader .md\\:flex x-nav-link, #siteHeader nav a')
          .forEach(el => el.classList.add('text-gray-900','hover:text-gray-700'));
      } else {
        header.classList.add('bg-gradient-to-b','from-black/60','to-transparent','text-white');
        header.classList.remove('bg-white/90','shadow','text-gray-900');
        document.querySelectorAll('#siteHeader nav a')
          .forEach(el => el.classList.remove('text-gray-900','hover:text-gray-700'));
      }
    };
    window.addEventListener('scroll', onScroll);
    onScroll();
  </script>

  <!-- AOS JS + Init // CHANGED: global -->
  <script src="https://unpkg.com/aos@2.3.4/dist/aos.js" defer></script>
  <script>
    window.addEventListener('DOMContentLoaded', () => {
      if (window.AOS) {
        AOS.init({
          duration: 700,
          easing: 'ease-out',
          offset: 120,
          once: true,
          mirror: false,
          anchorPlacement: 'top-bottom',
          disable: window.matchMedia('(prefers-reduced-motion: reduce)').matches
        });
      }
    });
  </script>

  <noscript><style>[data-aos]{opacity:1 !important; transform:none !important;}</style></noscript>
</body>
</html>
