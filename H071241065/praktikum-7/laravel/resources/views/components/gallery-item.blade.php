@props([
  "src" => "default",
  "title" => "Judul Foto",
  "category" => "Kategori",
])

@php
  $srcPath = match ($src) {
    "candi-bentar" => asset("images/hero-bali.jpg"),
    "tanah-lot" => asset("images/tanah-lot.jpg"),
    "uluwatu" => asset("images/uluwatu.jpg"),
    "rice-terraces" => asset("images/rice-terraces.jpg"),
    "bebek-betutu" => asset("images/bali-food.jpg"),
    "nasi-campur" => asset("images/nasi-campur.jpg"),
    default => asset("images/default.jpg"),
  };
@endphp

<div {{ $attributes->merge(["class" => "relative group rounded-xl overflow-hidden shadow-md"]) }}>
  <img
    src="{{ $srcPath }}"
    alt="{{ $title }}"
    class="w-full h-94 object-cover transition-transform duration-500 group-hover:scale-110"
  />

  <div
    class="absolute inset-0 bg-linear-to-t from-black/80 via-black/30 to-transparent opacity-0 group-hover:opacity-100 transition-opacity duration-500 flex flex-col text-start gap-3 justify-end p-6"
  >
    @if ($category)
      <span class="text-amber-400 text-sm font-medium">{{ $category }}</span>
    @endif

    <h3 class="text-white font-semibold text-xl leading-tight">{{ $title }}</h3>
  </div>
</div>
