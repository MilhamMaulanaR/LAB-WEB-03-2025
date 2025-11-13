<!doctype html>
<html lang="id" data-bs-theme="dark">
<head>
  <meta charset="utf-8">
  <title>@yield('title','TP9')</title>
  <meta name="viewport" content="width=device-width, initial-scale=1">

  {{-- Optional: pakai Vite kalau sudah build --}}
  @php($hasVite = file_exists(public_path('build/manifest.json')))
  @if($hasVite)
    @vite(['resources/css/app.css','resources/js/app.js'])
  @endif

  {{-- Bootstrap 5 + Icons (CDN) --}}
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
  <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.css" rel="stylesheet">

  <style>
    .container-narrow{max-width:1100px}
    .table td, .table th{vertical-align: middle}
    .brand { letter-spacing:.5px; }
    .form-label .hint{ font-weight:400;color:#6c757d;font-size:.9rem}
    .page-header{display:flex;align-items:center;justify-content:space-between;gap:12px}
    .shadow-soft{box-shadow:0 0.25rem 1rem rgba(0,0,0,.05)}
  </style>
</head>
<body>
  <nav class="navbar navbar-expand-lg bg-body-tertiary border-bottom sticky-top">
    <div class="container container-narrow">
      <a class="navbar-brand brand fw-bold" href="{{ route('categories.index') }}">
        <i class="bi bi-box-seam"></i> TP9 Inventory
      </a>
      <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navMain">
        <span class="navbar-toggler-icon"></span>
      </button>
      <div class="collapse navbar-collapse" id="navMain">
        <ul class="navbar-nav me-auto mb-2 mb-lg-0">
          <li class="nav-item"><a class="nav-link" href="{{ route('categories.index') }}"><i class="bi bi-tags"></i> Categories</a></li>
          <li class="nav-item"><a class="nav-link" href="{{ route('warehouses.index') }}"><i class="bi bi-building"></i> Warehouses</a></li>
          <li class="nav-item"><a class="nav-link" href="{{ route('products.index') }}"><i class="bi bi-bag"></i> Products</a></li>
          <li class="nav-item"><a class="nav-link" href="{{ route('stocks.index') }}"><i class="bi bi-clipboard-data"></i> Stocks</a></li>
        </ul>
        <div class="d-flex gap-2">
          <button class="btn btn-sm btn-outline-secondary" id="toggleTheme" type="button">
            <i class="bi bi-moon-stars"></i>
          </button>
        </div>
      </div>
    </div>
  </nav>

  <div class="container container-narrow my-4">
    {{-- Alerts --}}
    @if(session('ok'))
      <div class="alert alert-success alert-dismissible fade show" role="alert">
        <i class="bi bi-check-circle"></i> {{ session('ok') }}
        <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
      </div>
    @endif
    @if($errors->any())
      <div class="alert alert-danger alert-dismissible fade show" role="alert">
        <i class="bi bi-exclamation-octagon"></i> Terjadi kesalahan. Periksa formulir Anda.
        <ul class="mt-2 mb-0">
          @foreach($errors->all() as $e)<li>{{ $e }}</li>@endforeach
        </ul>
        <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
      </div>
    @endif

    @yield('content')
  </div>

  <footer class="border-top py-3">
    <div class="container container-narrow small text-muted d-flex justify-content-between">
      <span>© {{ date('Y') }} TP9 Inventory</span>
    </div>
  </footer>

  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
  <script>
    // Dark/Light toggle
    const btn = document.getElementById('toggleTheme');
    if(btn){
      btn.addEventListener('click', () => {
        const html = document.documentElement;
        const cur = html.getAttribute('data-bs-theme') || 'dark';
        html.setAttribute('data-bs-theme', cur === 'dark' ? 'light' : 'dark');
      });
    }
  </script>
</body>
</html>
