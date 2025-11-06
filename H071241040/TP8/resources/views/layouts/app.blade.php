<!DOCTYPE html>
<html lang="id">
<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1" />
  <title>{{ $title ?? 'Fish Admin' }}</title>

  {{-- Tailwind (CDN) --}}
  <script src="https://cdn.tailwindcss.com"></script>
  <script>
    tailwind.config = {
      theme: {
        extend: {
          colors: {
            brand: {
              50:  '#f5f8ff',
              100: '#e9efff',
              200: '#cfe0ff',
              300: '#a8c6ff',
              400: '#7ea9ff',
              500: '#4d86ff',
              600: '#3068e6',
              700: '#244fba',
              800: '#1f4194',
              900: '#1e3876'
            }
          },
          boxShadow: {
            soft: '0 10px 25px -10px rgba(0,0,0,0.15)'
          },
          borderRadius: {
            xl2: '1.25rem'
          }
        }
      }
    }
  </script>

  {{-- SweetAlert2 --}}
  <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
</head>
<body class="min-h-screen bg-gradient-to-b from-gray-50 to-gray-100 text-gray-800">
  {{-- Topbar --}}
  <header class="sticky top-0 z-40 bg-white/80 backdrop-blur border-b border-gray-100">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 h-16 flex items-center justify-between">
      <a href="{{ route('fishes.index') }}" class="flex items-center gap-3">
        <div class="h-9 w-9 rounded-xl bg-brand-600 text-white grid place-content-center font-bold shadow ring-1 ring-brand-400/40">F</div>
        <div class="font-semibold text-lg tracking-tight">Fish Admin</div>
      </a>
      <nav class="flex items-center gap-2">
        <a href="{{ route('fishes.index') }}" class="px-3 py-1.5 rounded-lg hover:bg-gray-100">Dashboard</a>
        <a href="{{ route('fishes.create') }}" class="px-3 py-1.5 rounded-lg bg-brand-600 text-white hover:bg-brand-700 shadow-soft">+ Tambah</a>
      </nav>
    </div>
  </header>

  {{-- Content --}}
  <main class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 py-8">
    {{-- Page Header --}}
    <div class="mb-6 rounded-xl2 bg-gradient-to-r from-brand-600 via-brand-500 to-brand-400 p-6 text-white shadow-soft">
      <div class="flex flex-col sm:flex-row sm:items-center sm:justify-between gap-4">
        <div>
          <h1 class="text-2xl sm:text-3xl font-bold tracking-tight">{{ $pageTitle ?? 'Manajemen Ikan' }}</h1>
          <p class="mt-1 opacity-90">{{ $pageSubtitle ?? 'Kelola data ikan dengan desain modern & responsif.' }}</p>
        </div>
        <a href="{{ route('fishes.create') }}" class="inline-flex items-center gap-2 rounded-xl bg-white/10 px-4 py-2 hover:bg-white/20 backdrop-blur border border-white/30">
          <span class="font-medium">+ Tambah Ikan</span>
        </a>
      </div>
    </div>

    {{-- Slot --}}
    @yield('content')
  </main>

  {{-- Footer --}}
  <footer class="mt-10 border-t border-gray-200/60">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 py-6 text-sm text-gray-500">
      <p>© {{ now()->format('Y') }} Fish Admin — Laravel Blade UI</p>
    </div>
  </footer>

  {{-- Helpers SweetAlert2 --}}
  <script>
    // Konfirmasi Hapus
    function swalDelete(formId) {
      Swal.fire({
        title: 'Hapus data ini?',
        text: 'Tindakan ini tidak dapat dibatalkan.',
        icon: 'warning',
        showCancelButton: true,
        confirmButtonText: 'Ya, hapus',
        cancelButtonText: 'Batal',
        reverseButtons: true,
        confirmButtonColor: '#e11d48'
      }).then((r) => {
        if (r.isConfirmed) document.getElementById(formId).submit();
      });
    }

    // Toast helper
    const toast = (msg, icon = 'success') => {
      Swal.fire({
        toast: true, position: 'top-end', timer: 2400, timerProgressBar: true,
        showConfirmButton: false, icon, text: msg
      });
    };

    // Flash success => toast
    @if (session('success'))
      document.addEventListener('DOMContentLoaded', () => toast(@json(session('success')), 'success'));
    @endif

    // Error bag => toast ringkas
    @if ($errors->any())
      document.addEventListener('DOMContentLoaded', () => {
        toast('Periksa kembali input yang belum valid.', 'error');
      });
    @endif
  </script>
</body>
</html>
