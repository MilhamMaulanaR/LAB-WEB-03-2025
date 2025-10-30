@props([
  "src" => "tanah-lot",
  "title" => "Tanah Lot",
  "location" => "Tabanan, Bali",
  "duration" => "2–3 jam",
  "rating" => "4.8",
  "description" => "Pura laut ikonik yang terletak di atas batu karang dengan pemandangan matahari terbenam yang spektakuler.",
])

@php
  $srcPath = match ($src) {
    "tanah-lot" => asset("images/tanah-lot.jpg"),
    "uluwatu" => asset("images/uluwatu.jpg"),
    "rice-terraces" => asset("images/rice-terraces.jpg"),
    default => asset("images/default.jpg"),
  };
@endphp

<div
  {{ $attributes->merge(["class" => "bg-white rounded-2xl shadow-sm border border-gray-100 flex flex-col md:flex-row overflow-hidden"]) }}
>
  <!-- Gambar -->
  <div class="md:w-1/2 overflow-hidden">
    <img
      src="{{ $srcPath }}"
      alt="{{ $title }}"
      class="w-full h-64 md:h-full object-cover transition-all duration-300 ease-in-out hover:scale-110"
    />
  </div>

  <!-- Konten -->
  <div class="p-8 md:w-1/2 flex flex-col justify-center">
    <h3 class="text-3xl font-bold text-gray-900 mb-2">{{ $title }}</h3>
    <p class="text-gray-600 text-lg mb-4">{{ $description }}</p>

    <div class="space-y-2 text-gray-600">
      <!-- Lokasi -->
      <div class="flex items-center gap-2">
        <svg
          xmlns="http://www.w3.org/2000/svg"
          fill="none"
          viewBox="0 0 24 24"
          stroke-width="1.5"
          stroke="currentColor"
          class="w-5 h-5 text-emerald-500"
        >
          <path
            stroke-linecap="round"
            stroke-linejoin="round"
            d="M12 11.25c1.242 0 2.25-1.008 2.25-2.25S13.242 6.75 12 6.75 9.75 7.758 9.75 9s1.008 2.25 2.25 2.25Z"
          />
          <path
            stroke-linecap="round"
            stroke-linejoin="round"
            d="M19.5 10.5c0 7.125-7.5 10.5-7.5 10.5S4.5 17.625 4.5 10.5a7.5 7.5 0 1 1 15 0Z"
          />
        </svg>
        <span>{{ $location }}</span>
      </div>

      <!-- Durasi -->
      <div class="flex items-center gap-2">
        <svg
          xmlns="http://www.w3.org/2000/svg"
          fill="none"
          viewBox="0 0 24 24"
          stroke-width="1.5"
          stroke="currentColor"
          class="w-5 h-5 text-orange-500"
        >
          <path stroke-linecap="round" stroke-linejoin="round" d="M12 6v6l3 3m6-3a9 9 0 1 1-18 0 9 9 0 0 1 18 0Z" />
        </svg>
        <span>Durasi kunjungan: {{ $duration }}</span>
      </div>

      <!-- Rating -->
      <div class="flex items-center gap-2">
        <svg xmlns="http://www.w3.org/2000/svg" fill="currentColor" viewBox="0 0 24 24" class="w-5 h-5 text-yellow-500">
          <path d="M12 17.27 18.18 21l-1.64-7.03L22 9.24l-7.19-.61L12 2 9.19 8.63 2 9.24l5.46 4.73L5.82 21z" />
        </svg>
        <span>
          <span class="font-semibold text-gray-800">
            {{ $rating }}
          </span>
          / 5.0
        </span>
      </div>
    </div>
  </div>
</div>
