<!DOCTYPE html>
<html lang="id">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Fish It Simulator</title>
  <script src="https://cdn.tailwindcss.com"></script>
</head>
<body class="bg-gray-100 min-h-screen">
  <nav class="bg-blue-600 text-white py-4 mb-6">
    <div class="container mx-auto px-4 flex justify-between items-center">
      <a href="{{ route('fishes.index') }}" class="text-lg font-semibold">🐟 Fish It Simulator</a>
    </div>
  </nav>

  <main class="container mx-auto px-4">
    @if(session('success'))
      <div class="bg-green-100 border border-green-400 text-green-700 px-4 py-2 rounded mb-4">
        {{ session('success') }}
      </div>
    @endif
    @yield('content')
  </main>
</body>
</html>
