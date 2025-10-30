@props(["type" => "button", "variant" => "primary"])

@php
  $classes = match ($variant) {
    "primary" => "text-white hover:bg-amber-700 bg-amber-600",
    "secondary" => "bg-gray-200 hover:bg-gray-300 text-gray-800",
    "danger" => "bg-red-600 hover:bg-red-700 text-white",
    default => "bg-gray-100 text-gray-800",
  };
@endphp

<button
  type="{{ $type }}"
  {{ $attributes->merge(["class" => "px-6 py-3 rounded-lg cursor-pointer font-semibold transition-all duration-200 ease-in-out $classes"]) }}
>
  {{ $slot }}
</button>
