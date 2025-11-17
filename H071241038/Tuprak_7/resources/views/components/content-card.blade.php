@props(['image', 'title'])

<div data-aos="fade-up" data-aos-delay="100" class="bg-c-main-bg rounded-lg shadow-lg overflow-hidden transition-all duration-300 hover:shadow-2xl hover:-translate-y-1">
    <img class="w-full h-56 object-cover" src="{{ $image }}" alt="{{ $title }}">
    <div class="p-6">
        <h3 class="text-xl font-semibold text-gray-900 mb-2">{{ $title }}</h3>
        <p class="text-slate-700 text-base leading-relaxed">
            {{ $slot }}
        </p>
    </div>
</div>