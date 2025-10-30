<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <meta http-equiv="X-UA-Compatible" content="ie=edge" />
    <!-- Favicon -->
    <link rel="icon" type="image/svg" href="{{ asset("favicon.svg") }}" />

    <title>@yield("title")</title>
    @vite(["resources/css/app.css", "resources/js/app.js"])
  </head>

  <body>
    <header
      class="fixed top-0 p-4 left-0 right-0 z-10 bg-white/95 backdrop-blur-sm border-b border border-slate-300 shadow"
    >
      <div class="flex flex-row justify-between max-w-7xl mx-auto">
        <div class="flex items-center gap-4">
          <div class="w-12 h-12 overflow-hidden bg-teal-500 rounded-full p-2">
            <img src="{{ asset("images/logo.svg") }}" alt="logo" class="w-full object-cover" />
          </div>
          <h1 class="font-bold text-2xl">Eksplor Bali</h1>
        </div>
        <button
          id="menu-toggle"
          type="button"
          class="inline-flex items-center p-2 w-10 h-10 justify-center text-sm text-gray-500 rounded-lg md:hidden hover:bg-gray-100 focus:outline-none"
        >
          <i class="ri-menu-line text-2xl"></i>
        </button>
        <nav
          id="mobile-menu"
          class="p-2 flex md:flex-row flex-col fixed md:static right-0 w-full md:w-auto transition-all duration-300 ease-in-out md:translate-y-0 -translate-y-90 md:z-20 md:bg-transparent -z-20 top-20 bg-slate-100 text-center gap-4"
        >
          <a
            href="/"
            class="py-1 px-4 transition-all duration-200 ease-in-out cursor-pointer hover:bg-teal-300/50 rounded-lg"
          >
            Home
          </a>
          <a
            href="/about"
            class="py-1 px-4 transition-all duration-200 ease-in-out cursor-pointer hover:bg-teal-300/50 rounded-lg"
          >
            About
          </a>
          <a
            href="/destinasi"
            class="py-1 px-4 transition-all duration-200 ease-in-out cursor-pointer hover:bg-teal-300/50 rounded-lg"
          >
            Destinasi
          </a>
          <a
            href="/kuliner"
            class="py-1 px-4 transition-all duration-200 ease-in-out cursor-pointer hover:bg-teal-300/50 rounded-lg"
          >
            Kuliner
          </a>
          <a
            href="/galeri"
            class="py-1 px-4 transition-all duration-200 ease-in-out cursor-pointer hover:bg-teal-300/50 rounded-lg"
          >
            Galeri
          </a>
          <a
            href="/kontak"
            class="py-1 px-4 transition-all duration-200 ease-in-out cursor-pointer hover:bg-teal-300/50 rounded-lg"
          >
            Kontak
          </a>
        </nav>
      </div>
    </header>
    <main class="min-h-screen">
      @yield("content")
    </main>
    <footer class="py-9 px-4 bg-slate-50 border-t border-slate-300">
      <div class="container mx-auto text-center text-slate-500">
        <p>&copy; 2024 Eksplor Bali. Temukan keindahan pulau dewata.</p>
      </div>
    </footer>
  </body>
</html>
