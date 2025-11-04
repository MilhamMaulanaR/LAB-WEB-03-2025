@props(['href' => null, 'type' => 'button'])

@if($href)
  <a href="{{ $href }}" {{ $attributes->merge([
    'class' => 'inline-flex items-center gap-2 px-4 py-2 rounded-xl bg-gray-900 text-white text-sm font-medium hover:opacity-90 shadow-sm'
  ]) }}>
    {{ $slot }}
  </a>
@else
  <button type="{{ $type }}" {{ $attributes->merge([
    'class' => 'inline-flex items-center gap-2 px-4 py-2 rounded-xl bg-gray-900 text-white text-sm font-medium hover:opacity-90 shadow-sm'
  ]) }}>
    {{ $slot }} 
  </button>
@endif
