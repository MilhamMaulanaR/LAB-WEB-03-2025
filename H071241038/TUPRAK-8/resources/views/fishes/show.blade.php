@extends('layouts.app')

@section('title', 'Detail: ' . $fish->name)

@section('content')
    @if (session('success'))
        <div class="mb-4 rounded-md bg-green-100 p-4 shadow-sm">
            <div class="flex">
                <div class="flex-shrink-0">
                    <svg class="h-5 w-5 text-green-400" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20" fill="currentColor" aria-hidden="true">
                        <path fill-rule="evenodd" d="M10 18a8 8 0 100-16 8 8 0 000 16zm3.707-9.293a1 1 0 00-1.414-1.414L9 10.586 7.707 9.293a1 1 0 00-1.414 1.414l2 2a1 1 0 001.414 0l4-4z" clip-rule="evenodd" />
                    </svg>
                </div>
                <div class="ml-3">
                    <p class="text-sm font-medium text-green-800">{{ session('success') }}</p>
                </div>
            </div>
        </div>
    @endif
    
    <div class="flex flex-col sm:flex-row justify-between items-start sm:items-center mb-6">
        <div>
            <h1 class="text-3xl font-bold text-gray-800">{{ $fish->name }}</h1>
            <p class="mt-1 text-lg text-gray-600">Detail Ikan (ID: {{ $fish->id }})</p>
        </div>

        <div class="flex space-x-2 mt-4 sm:mt-0">
            <a href="{{ route('fishes.index') }}" class="inline-flex items-center px-4 py-2 bg-white border border-gray-300 rounded-md font-semibold text-xs text-gray-700 uppercase tracking-widest shadow-sm hover:text-gray-500 focus:outline-none focus:border-blue-300 focus:ring ring-blue-200 disabled:opacity-25 transition ease-in-out duration-150">
                &larr; Back to List
            </a>
            
            <a href="{{ route('fishes.edit', $fish) }}" class="inline-flex items-center px-4 py-2 bg-yellow-500 border border-transparent rounded-md font-semibold text-xs text-white uppercase tracking-widest hover:bg-yellow-600 active:bg-yellow-700 focus:outline-none focus:border-yellow-700 focus:ring ring-yellow-300 disabled:opacity-25 transition ease-in-out duration-150">
                Edit
            </a>
            
            <form action="{{ route('fishes.destroy', $fish) }}" method="POST" onsubmit="return confirm('Apakah Anda yakin ingin menghapus ikan ini? Ini tidak bisa dikembalikan.');">
                @csrf
                @method('DELETE')
                <button type="submit" class="inline-flex items-center px-4 py-2 bg-red-600 border border-transparent rounded-md font-semibold text-xs text-white uppercase tracking-widest hover:bg-red-700 active:bg-red-800 focus:outline-none focus:border-red-900 focus:ring ring-red-300 disabled:opacity-25 transition ease-in-out duration-150">
                    Hapus
                </button>
            </form>
        </div>
    </div>

    <div class="border-t border-gray-200 my-6"></div>

    <div class="bg-white shadow-sm sm:rounded-lg overflow-hidden">
        <dl class="divide-y divide-gray-200">
            <div class="grid grid-cols-1 md:grid-cols-3 gap-4 px-6 py-5">
                <dt class="text-sm font-medium text-gray-500">Nama Ikan</dt>
                <dd class="text-sm text-gray-900 md:col-span-2">{{ $fish->name }}</dd>
            </div>
            
            <div class="grid grid-cols-1 md:grid-cols-3 gap-4 px-6 py-5">
                <dt class="text-sm font-medium text-gray-500">Rarity</dt>
                <dd class="text-sm text-gray-900 md:col-span-2">
                    <span classs="px-2.5 py-0.5 rounded-full text-xs font-semibold"
                          style="background-color: #eee; color: #333;">
                        {{ $fish->rarity }}
                    </span>
                </dd>
            </div>

            <div class="grid grid-cols-1 md:grid-cols-3 gap-4 px-6 py-5">
                <dt class="text-sm font-medium text-gray-500">Base Weight (kg)</dt>
                <dd class="text-sm text-gray-900 md:col-span-2">{{ $fish->weight_range }}</dd>
            </div>

            <div class="grid grid-cols-1 md:grid-cols-3 gap-4 px-6 py-5">
                <dt class="text-sm font-medium text-gray-500">Sell Price per kg</dt>
                <dd class="text-sm text-gray-900 md:col-span-2">{{ $fish->formatted_price }}</dd>
            </div>
            
            <div class="grid grid-cols-1 md:grid-cols-3 gap-4 px-6 py-5">
                <dt class="text-sm font-medium text-gray-500">Catch Probability</dt>
                <dd class="text-sm text-gray-900 md:col-span-2">{{ $fish->formatted_catch_probability }}</dd>
            </div>

            <div class="grid grid-cols-1 md:grid-cols-3 gap-4 px-6 py-5">
                <dt class="text-sm font-medium text-gray-500">Description</dt>
                <dd class="text-sm text-gray-900 md:col-span-2">
                    {!! nl2br(e($fish->description ?? 'N/A')) !!}
                </dd>
            </div>
            
            <div class="grid grid-cols-1 md:grid-cols-3 gap-4 px-6 py-5 bg-gray-50">
                <dt class="text-sm font-medium text-gray-500">Data Dibuat</dt>
                <dd class="text-sm text-gray-900 md:col-span-2">{{ $fish->created_at->format('d F Y, H:i:s') }}</dd>
            </div>

            <div class="grid grid-cols-1 md:grid-cols-3 gap-4 px-6 py-5 bg-gray-50">
                <dt class="text-sm font-medium text-gray-500">Data Diupdate</dt>
                <dd class="text-sm text-gray-900 md:col-span-2">{{ $fish->updated_at->format('d F Y, H:i:s') }}</dd>
            </div>
        </dl>
    </div>
@endsection