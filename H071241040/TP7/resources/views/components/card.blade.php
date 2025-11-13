@props([
  'title' => '',
  'desc' => '',
  'img'  => '',
  'tag'  => null,
])

<article class="group bg-white rounded-2xl border border-brand-300 overflow-hidden shadow-sm hover:shadow-md transition">
  <div class="aspect-[16/10] overflow-hidden bg-brand-200">
    <img src="{{ $img }}" alt="{{ $title }}" class="w-full h-full object-cover group-hover:scale-105 transition">
  </div>
  <div class="p-5">
    @if($tag)
      <span class="inline-block text-[10px] uppercase tracking-wider bg-brand-200 text-gray-700 px-2 py-1 rounded-full mb-2">{{ $tag }}</span>
    @endif
    <h3 class="text-lg font-semibold mb-2">{{ $title }}</h3>
    <p class="text-sm text-gray-600 leading-relaxed">{{ $desc }}</p>
  </div>
</article>
