<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield('title', 'Fish It Management')</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <style>
        @import url('https://fonts.googleapis.com/css2?family=Inter:wght@400;500;600;700&display=swap');
        body {
            font-family: 'Inter', sans-serif;
        }
    </style>
</head>
<body class="bg-gray-100 text-gray-900">

    <nav class="bg-gray-800 shadow-md">
        <div class="container mx-auto px-4 sm:px-6 lg:px-8">
            <div class="flex justify-between items-center h-16">
                
                <div class="flex items-center space-x-8">
                    <div class="flex-shrink-0">
                         <a href="{{ route('fishes.index') }}" class="text-white text-xl font-bold">
                            Fish It Roblox - Admin
                         </a>
                    </div>
                </div>

                <div class="flex items-center">
                    <form action="{{ route('fishes.index') }}" method="GET">
                        
                        @if (request('rarity'))
                            <input type="hidden" name="rarity" value="{{ request('rarity') }}">
                        @endif
                        @if (request('sort_by'))
                            <input type="hidden" name="sort_by" value="{{ request('sort_by') }}">
                            <input type="hidden" name="sort_dir" value="{{ request('sort_dir') }}">
                        @endif

                        <div class="relative">
                            <input type="text" name="search" 
                                   class="block w-full sm:w-64 bg-gray-700 border border-transparent rounded-md py-2 pl-3 pr-10 text-sm placeholder-gray-400 text-white focus:outline-none focus:bg-white focus:border-white focus:ring-white focus:text-gray-900"
                                   placeholder="Search by name..." 
                                   value="{{ request('search') }}">
                            <span class="absolute inset-y-0 right-0 flex items-center pr-3 pointer-events-none">
                                <svg class="h-5 w-5 text-gray-400" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20" fill="currentColor">
                                  <path fill-rule="evenodd" d="M8 4a4 4 0 100 8 4 4 0 000-8zM2 8a6 6 0 1110.89 3.476l4.817 4.817a1 1 0 01-1.414 1.414l-4.816-4.816A6 6 0 012 8z" clip-rule="evenodd" />
                                </svg>
                            </span>
                        </div>
                    </form>
                </div>
                
            </div>
        </div>
    </nav>
    <main class="container mx-auto px-4 sm:px-6 lg:px-8 py-8">
        <div class="bg-white rounded-lg shadow-lg overflow-hidden">
            <div class="p-6 sm:p-8">
                 @yield('content')
            </div>
        </div>
    </main>

</body>
</html>