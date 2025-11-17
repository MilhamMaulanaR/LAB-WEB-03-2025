<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield('title', 'Eksplor Kendari')</title>
    
    <script src="https://cdn.tailwindcss.com"></script>
    <script>
        tailwind.config = {
            theme: {
                extend: {
                    colors: {
                        'c-primary': '#B9375D',
                        'c-secondary': '#D25D5D',
                        'c-light-bg': '#E7D3D3',
                        'c-main-bg': '#EEEEEE',
                        
                        gray: tailwind.colors.slate,
                    },
                    aspectRatio: {
                        'video': '16 / 9',
                    },
                }
            }
        }
    </script>
    
    <link href="https://unpkg.com/aos@2.3.1/dist/aos.css" rel="stylesheet">
    
</head>
<body class="bg-c-light-bg font-sans antialiased flex flex-col min-h-screen">

    @if(Route::is('home'))
        <header id="mainHeader" class="fixed w-full top-0 z-50 transition-all duration-300 bg-transparent">
            <nav class="flex justify-between items-center h-16 px-4 sm:px-6 lg:px-8">
                <div class="flex-shrink-0">
                    <a href="{{ route('home') }}" class="text-2xl font-bold text-white">
                        Eksplor Kendari
                    </a>
                </div>
                <div class="hidden md:flex md:items-center md:space-x-8">
                    <a href="{{ route('home') }}" class="nav-link text-white hover:text-opacity-80 px-3 py-2 rounded-md text-lg font-medium">Home</a>
                    <a href="{{ route('destinasi') }}" class="nav-link text-white hover:text-opacity-80 px-3 py-2 rounded-md text-lg font-medium">Destinasi</a>
                    <a href="{{ route('kuliner') }}" class="nav-link text-white hover:text-opacity-80 px-3 py-2 rounded-md text-lg font-medium">Kuliner</a>
                    <a href="{{ route('galeri') }}" class="nav-link text-white hover:text-opacity-80 px-3 py-2 rounded-md text-lg font-medium">Galeri</a>
                    <a href="{{ route('kontak') }}" class="nav-link text-white hover:text-opacity-80 px-3 py-2 rounded-md text-lg font-medium">Kontak</a>
                </div>
            </nav>
        </header>
    @else
        <header class="sticky w-full top-0 z-50 shadow-md bg-c-primary">
            <nav class="flex justify-between items-center h-16 px-4 sm:px-6 lg:px-8">
                <div class="flex-shrink-0">
                    <a href="{{ route('home') }}" class="text-2xl font-bold text-c-main-bg">
                        Eksplor Kendari
                    </a>
                </div>
                <div class="hidden md:flex md:items-center md:space-x-8">
                    <a href="{{ route('home') }}" class="text-c-main-bg opacity-80 hover:opacity-100 px-3 py-2 rounded-md text-lg font-medium">Home</a>
                    <a href="{{ route('destinasi') }}" class="text-c-main-bg opacity-80 hover:opacity-100 px-3 py-2 rounded-md text-lg font-medium">Destinasi</a>
                    <a href="{{ route('kuliner') }}" class="text-c-main-bg opacity-80 hover:opacity-100 px-3 py-2 rounded-md text-lg font-medium">Kuliner</a>
                    <a href="{{ route('galeri') }}" class="text-c-main-bg opacity-80 hover:opacity-100 px-3 py-2 rounded-md text-lg font-medium">Galeri</a>
                    <a href="{{ route('kontak') }}" class="text-c-main-bg opacity-80 hover:opacity-100 px-3 py-2 rounded-md text-lg font-medium">Kontak</a>
                </div>
            </nav>
        </header>
    @endif

    <main class="flex-grow relative z-10 bg-c-main-bg">
        @yield('content')
    </main>

    <footer class="bg-c-primary text-c-main-bg relative z-20">
        <div class="py-6 px-4 sm:px-6 lg:px-8 text-center">
            <p class="text-sm opacity-90">
                &copy; {{ date('Y') }} Eksplor Pariwisata Nusantara - Kendari. All Rights Reserved.
            </p>
        </div>
    </footer>

    <script src="https://unpkg.com/aos@2.3.1/dist/aos.js"></script>
    <script>
        AOS.init({
            duration: 800,
            once: true,
        });

        const header = document.getElementById('mainHeader');
        if (header) {
            window.addEventListener('scroll', function() {
                if (window.scrollY > 50) {
                    header.classList.add('bg-c-primary', 'shadow-md');
                    header.classList.remove('bg-transparent');
                } else {
                    header.classList.remove('bg-c-primary', 'shadow-md');
                    header.classList.add('bg-transparent');
                }
            });
        }
    </script>
</body>
</html>