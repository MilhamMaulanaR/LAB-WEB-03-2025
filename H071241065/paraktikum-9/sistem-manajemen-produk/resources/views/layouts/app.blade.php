<!DOCTYPE html>
<html lang="id">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Manajemen Produk</title>
  <script src="https://cdn.tailwindcss.com"></script>
</head>

<body class="bg-gray-100 text-gray-900">

  <nav class="bg-white shadow-md">
    <div class="container mx-auto p-4 md:px-8 flex justify-between items-center">
      <a href="/" class="text-xl font-bold text-blue-600">Sistem Stok</a>
      <div class="flex gap-4">
        <a href="{{ route('categories.index') }}" class="text-gray-600 hover:text-blue-500">Kategori</a>
        <a href="{{ route('warehouses.index') }}" class="text-gray-600 hover:text-blue-500">Warehouse</a>
        <a href="{{ route('products.index') }}" class="text-gray-600 hover:text-blue-500">Produk</a>
        <a href="{{ route('stock.index') }}" class="text-gray-600 hover:text-blue-500">Manajemen Stok</a>
      </div>
    </div>
  </nav>

  <div class="container mx-auto p-4 md:p-8">

    <h1 class="text-3xl font-bold mb-6">@yield('title')</h1>

    @if (session('success'))
      <div class="bg-green-100 border border-green-400 text-green-700 px-4 py-3 rounded relative mb-4" role="alert">
        <span class="block sm:inline">{{ session('success') }}</span>
      </div>
    @endif

    <div class="bg-white p-6 rounded-lg shadow-lg">
      @yield('content')
    </div>

  </div>
</body>

</html>
