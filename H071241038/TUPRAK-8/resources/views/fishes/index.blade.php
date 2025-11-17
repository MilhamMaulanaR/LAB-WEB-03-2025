@extends('layouts.app')

@section('title', 'Fish Database')

@section('content')

    @if (session('success'))
        <div class="mb-4 rounded-md bg-green-100 p-4 shadow-sm">
            <div class="flex">
                <div class="flex-shrink-0">
                    <svg class="h-5 w-5 text-green-400" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20" fill="currentColor" aria-hidden="true"><path fill-rule="evenodd" d="M10 18a8 8 0 100-16 8 8 0 000 16zm3.707-9.293a1 1 0 00-1.414-1.414L9 10.586 7.707 9.293a1 1 0 00-1.414 1.414l2 2a1 1 0 001.414 0l4-4z" clip-rule="evenodd" /></svg>
                </div>
                <div class="ml-3"><p class="text-sm font-medium text-green-800">{{ session('success') }}</p></div>
            </div>
        </div>
    @endif

    <div class="flex flex-col sm:flex-row justify-between items-start sm:items-center mb-6">
        <h1 class="text-3xl font-bold text-gray-800 mb-4 sm:mb-0">Fish Database</h1>
        <a href="{{ route('fishes.create') }}" class="inline-flex items-center px-4 py-2 bg-indigo-600 border border-transparent rounded-md font-semibold text-xs text-white uppercase tracking-widest hover:bg-indigo-700">
            Add New Fish
        </a>
    </div>

    <form method="GET" action="{{ route('fishes.index') }}" class="mb-6">
        
        @if (request('search'))
            <input type="hidden" name="search" value="{{ request('search') }}">
        @endif
        @if (request('sort_by'))
            <input type="hidden" name="sort_by" value="{{ request('sort_by') }}">
            <input type="hidden" name="sort_dir" value="{{ request('sort_dir') }}">
        @endif

        <div class="grid grid-cols-1 sm:grid-cols-3 gap-4 items-end">
            
            <div>
                <label for="rarity" class="block text-sm font-medium text-gray-700">Filter by Rarity</label>
                <select name="rarity" id="rarity" class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50">
                    <option value="">-- All Rarity --</option>
                    @foreach ($rarities as $rarity)
                        <option value="{{ $rarity }}" {{ request('rarity') == $rarity ? 'selected' : '' }}>
                            {{ $rarity }}
                        </option>
                    @endforeach
                </select>
            </div>

            <div class="flex space-x-2">
                <button type="submit" class="inline-flex items-center px-4 py-2 bg-gray-800 border border-transparent rounded-md font-semibold text-xs text-white uppercase tracking-widest hover:bg-gray-700">
                    Filter
                </button>
                <a href="{{ route('fishes.index') }}" class="inline-flex items-center px-4 py-2 bg-white border border-gray-300 rounded-md font-semibold text-xs text-gray-700 uppercase tracking-widest shadow-sm hover:text-gray-500">
                    Reset
                </a>
            </div>
        </div>
    </form>

    <div class="overflow-x-auto">
        <div class="align-middle inline-block min-w-full">
            <div class="shadow overflow-hidden border-b border-gray-200 sm:rounded-lg">
                <table class="min-w-full divide-y divide-gray-200">
                    
                    <thead class="bg-gray-700">
                        <tr>
                            @php
                                function sortLink($column, $label) {
                                    $direction = (request('sort_by') == $column && request('sort_dir') == 'asc') ? 'desc' : 'asc';
                                    $params = array_merge(request()->query(), ['sort_by' => $column, 'sort_dir' => $direction]);
                                    
                                    $icon = '';
                                    if (request('sort_by') == $column) {
                                        $icon = (request('sort_dir') == 'asc') ? ' &uarr;' : ' &darr;';
                                    }
                                    
                                    return '<a href="'.route('fishes.index', $params).'" class="hover:underline">'.$label.$icon.'</a>';
                                }
                            @endphp
                            
                            <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-100 uppercase tracking-wider">No</th>
                            <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-100 uppercase tracking-wider">{!! sortLink('name', 'Nama Ikan') !!}</th>
                           <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-100 uppercase tracking-wider">Rarity</th>
                            <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-100 uppercase tracking-wider" colspan="2">Weight Range (Min-Max)</th>
                            <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-100 uppercase tracking-wider">{!! sortLink('sell_price_per_kg', 'Price/kg') !!}</th>
                            <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-100 uppercase tracking-wider">{!! sortLink('catch_probability', 'Catch') !!}</th>
                            <th scope="col" class="px-6 py-3 text-right text-xs font-medium text-gray-100 uppercase tracking-wider">Actions</th>
                        </tr>
                    </thead>
                    <tbody class="bg-white divide-y divide-gray-200">
                        @forelse ($fishes as $fish)
                            <tr>
                                <td class="px-6 py-4 whitespace-nowrap text-sm font-medium text-gray-900">{{ $loop->iteration + $fishes->firstItem() - 1 }}</td>
                                <td class="px-6 py-4 whitespace-nowrap text-sm font-medium text-gray-900">{{ $fish->name }}</td>
                                <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-500">{{ $fish->rarity }}</td>
                                <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-500" colspan="2">
                                    {{ $fish->weight_range }}
                                </td>
                                <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-500">
                                    {{ $fish->formatted_price }}
                                </td>
                                <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-500">
                                    {{ $fish->formatted_catch_probability }}
                                </td>
                                <td class="px-6 py-4 whitespace-nowrap text-right text-sm font-medium space-x-2">
                                    <a href="{{ route('fishes.show', $fish) }}" class="text-blue-600 hover:text-blue-900">Detail</a>
                                    <a href="{{ route('fishes.edit', $fish) }}" class="text-yellow-600 hover:text-yellow-900">Edit</a>
                                    <form action="{{ route('fishes.destroy', $fish) }}" method="POST" class="inline-block" onsubmit="return confirm('Anda yakin ingin menghapus {{ $fish->name }}?');">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" class="text-red-600 hover:text-red-900">
                                            Hapus
                                        </button>
                                    </form>
                                </td>
                            </tr>
                        @empty
                            <tr>
                                <td colspan="8" class="px-6 py-4 whitespace-nowrap text-sm text-gray-500 text-center">
                                    No fish data found. Coba reset filter Anda.
                                </td>
                            </tr>
                        @endforelse
                    </tbody>
                </table>
            </div>
        </div>
    </div>

    <div class="mt-6">
        {{ $fishes->links() }}
    </div>

@endsection