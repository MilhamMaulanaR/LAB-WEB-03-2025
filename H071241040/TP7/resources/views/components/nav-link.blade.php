@props(['active' => false, 'href' => '#'])

@php
$base = 'px-4 py-2 rounded-xl text-sm font-medium transition';
$style = $active
  ? 'bg-gray-900 text-white shadow-sm'
  : 'text-gray-700 hover:bg-brand-200';
@endphp

<a {{ $attributes->merge(['href'=>$href,'class'=>"$base $style"]) }}>
  {{ $slot }}
</a>
