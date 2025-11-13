@extends('layouts.master')

@section('title','Kuliner — Explore Palu')

@section('content')
  <div class="flex items-end justify-between gap-4 mt-4">
    <div>
      <h1 class="text-3xl font-bold">Kuliner Khas Palu</h1>
      <p class="text-gray-600 mt-2">
        Foto disimpan di <code>public/images/kuliner/</code>. Silakan sesuaikan nama file gambarnya.
      </p>
    </div>
    <x-button :href="route('home')" class="bg-white text-gray-900 border border-brand-300">Kembali</x-button>
  </div>

  <div class="mt-8 grid sm:grid-cols-2 lg:grid-cols-3 gap-6">
    {{-- 1. Kaledo --}}
    <x-card title="Kaledo"
            img="/images/kuliner/kaledo.jpg"
            tag="Sup Sapi"
            desc="Sup kaki sapi dengan bumbu khas; kaldunya gurih dan lezat—favorit para pencinta daging." />

    {{-- 2. Uta Kelo --}}
    <x-card title="Uta Kelo"
            img="/images/kuliner/uta-Kelo.jpg"
            tag="Sayur Kelor"
            desc="Sayur daun kelor berkuah khas Palu; sederhana, segar, dan bikin ketagihan." />

    {{-- 3. Uta Dada --}}
    <x-card title="Uta Dada"
            img="/images/kuliner/uta-dada.jpg"
            tag="Kuah Santan"
            desc="‘Uta’ berarti kuah; kuah santan gurih-pedas berisi dada ayam atau ikan cakalang asap/bakar. Nikmat dengan ketupat/buras." />

    {{-- 4. Duo Sale --}}
    <x-card title="Duo Sale"
            img="/images/kuliner/duo-sale.jpeg"
            tag="Sambal Ikan Teri"
            desc="Sambal khas terbuat dari teri kering dimasak dengan cabai, bawang, dan tomat—manis gurih, cocok untuk nasi hangat/jagung." />

    {{-- 5. Lalampa --}}
    <x-card title="Lalampa"
            img="/images/kuliner/Lalampajpg.jpg"
            tag="Jajan Ikan Cakalang"
            desc="Mirip lemper tapi berisi ikan cakalang; dibakar sehingga aromanya sangat sedap." />

    {{-- 6. Labia Dange --}}
    <x-card title="Labia Dange (Sagu Dange)"
            img="/images/kuliner/Labia-dange.jpg"
            tag="Camilan Sagu"
            desc="Camilan sagu dimasak di wajan/tungku tanah liat; gurih renyah, nikmat dengan gula merah atau lauk ikan." />

    {{-- 7. Nasi Jagung --}}
    <x-card title="Nasi Jagung"
            img="/images/kuliner/Nasi-jagung.jpg"
            tag="Staple"
            desc="Dari biji jagung tua ditumbuk kasar; teksturnya pulen dan pas disantap dengan Duo Sale dan Uta Kelo." />

    {{-- 8. Saraba --}}
    <x-card title="Saraba"
            img="/images/kuliner/saraba.jpg"
            tag="Minuman Hangat"
            desc="Minuman jahe hangat khas Palu; mirip wedang jahe—pas saat hujan atau malam yang dingin." />

    {{-- 9. Palumara --}}
    <x-card title="Palumara"
            img="/images/kuliner/Palumara.jpg"
            tag="Sup Ikan"
            desc="Sup ikan laut khas Palu bercita rasa pedas-asam; wajib untuk penggemar seafood." />
  </div>
@endsection
