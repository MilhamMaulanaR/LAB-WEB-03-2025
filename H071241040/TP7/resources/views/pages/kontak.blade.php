@extends('layouts.master')

@section('title','Kontak — Explore Palu')

@section('content')
  <section class="max-w-5xl mx-auto mt-4">
    {{-- Heading --}}
    <div class="text-center">
      <h1 class="text-3xl sm:text-4xl font-bold">Hubungi Kami</h1>
      <p class="mt-3 text-gray-600">Ada pertanyaan, saran, atau kerja sama? Silakan tinggalkan pesan — kami senang mendengar dari Anda.</p>
    </div>

    <div class="mt-10 grid lg:grid-cols-3 gap-6">
      {{-- Info Cards --}}
      <div class="lg:col-span-1 space-y-6">
        {{-- Card: Kontak Utama --}}
        <div class="bg-white/80 backdrop-blur rounded-2xl border border-gray-200 p-6 shadow-sm">
          <div class="flex items-start gap-4">
            <div class="shrink-0 p-3 rounded-xl bg-gray-900 text-white">
              {{-- Icon Mail --}}
              <svg xmlns="http://www.w3.org/2000/svg" class="size-5" viewBox="0 0 24 24" fill="currentColor"><path d="M1.5 8.67v6.66A2.67 2.67 0 0 0 4.17 18h15.66a2.67 2.67 0 0 0 2.67-2.67V8.67l-9.5 5.7a2 2 0 0 1-2.17 0l-9.33-5.7Z"/><path d="M21.5 6H2.5l9.33 5.7a2 2 0 0 0 2.17 0L21.5 6Z"/></svg>
            </div>
            <div>
              <h3 class="font-semibold text-lg">Email</h3>
              <p class="text-gray-600">hello@explorepalu.id</p>
              <div class="mt-3 flex gap-2">
                <a href="mailto:hello@explorepalu.id" class="text-sm px-3 py-1.5 rounded-xl bg-gray-900 text-white hover:opacity-90">Kirim Email</a>
                <button data-copy="hello@explorepalu.id" class="copyBtn text-sm px-3 py-1.5 rounded-xl border border-gray-300 hover:bg-gray-100">Salin</button>
              </div>
            </div>
          </div>
        </div>

        {{-- Card: Telepon/WA --}}
        <div class="bg-white/80 backdrop-blur rounded-2xl border border-gray-200 p-6 shadow-sm">
          <div class="flex items-start gap-4">
            <div class="shrink-0 p-3 rounded-xl bg-gray-900 text-white">
              {{-- Icon Phone --}}
              <svg xmlns="http://www.w3.org/2000/svg" class="size-5" viewBox="0 0 24 24" fill="currentColor"><path d="M2 5.75C2 4.78 2.78 4 3.75 4h2.3c.7 0 1.31.45 1.5 1.12l.66 2.31c.16.56-.03 1.16-.49 1.53l-1.2.98a14.7 14.7 0 0 0 6.34 6.34l.98-1.2c.37-.46.97-.65 1.53-.49l2.31.66c.67.19 1.12.8 1.12 1.5v2.3c0 .97-.78 1.75-1.75 1.75h-.5C8.82 20.3 3.7 15.18 3.2 8.25v-.5Z"/></svg>
            </div>
            <div>
              <h3 class="font-semibold text-lg">Telepon & WhatsApp</h3>
              <p class="text-gray-600">(000) 123-456</p>
              <div class="mt-3 flex gap-2">
                <a href="tel:000123456" class="text-sm px-3 py-1.5 rounded-xl bg-gray-900 text-white hover:opacity-90">Telepon</a>
                <a href="https://wa.me/6281234567890?text=Halo%20Explore%20Palu,%20saya%20ingin%20bertanya..."
                   target="_blank"
                   class="text-sm px-3 py-1.5 rounded-xl border border-gray-300 hover:bg-gray-100">WhatsApp</a>
              </div>
            </div>
          </div>
        </div>

        {{-- Card: Alamat --}}
        <div class="bg-white/80 backdrop-blur rounded-2xl border border-gray-200 p-6 shadow-sm">
          <div class="flex items-start gap-4">
            <div class="shrink-0 p-3 rounded-xl bg-gray-900 text-white">
              {{-- Icon Map --}}
              <svg xmlns="http://www.w3.org/2000/svg" class="size-5" viewBox="0 0 24 24" fill="currentColor"><path d="M12 2C8.14 2 5 5.14 5 9c0 5.25 7 13 7 13s7-7.75 7-13c0-3.86-3.14-7-7-7Zm0 9.5A2.5 2.5 0 1 1 12 6a2.5 2.5 0 0 1 0 5.5Z"/></svg>
            </div>
            <div>
              <h3 class="font-semibold text-lg">Alamat</h3>
              <p class="text-gray-600">Teluk Palu, Kota Palu, Sulawesi Tengah</p>
              <div class="mt-3">
                <a href="https://maps.google.com/?q=Teluk+Palu+Sulawesi+Tengah"
                   target="_blank"
                   class="text-sm px-3 py-1.5 rounded-xl bg-gray-900 text-white hover:opacity-90">Buka Maps</a>
              </div>
            </div>
          </div>
        </div>
      </div>

      {{-- Form + Map --}}
      <div class="lg:col-span-2 space-y-6">
        {{-- Form (non-aktif, UI only) --}}
        <form class="bg-white/90 backdrop-blur rounded-2xl border border-gray-200 p-6 shadow-sm"
              onsubmit="event.preventDefault(); toast('Pesan terkirim (simulasi). Form ini non-aktif sesuai ketentuan tugas.');">
          <h2 class="font-semibold text-lg">Kirim Pesan</h2>
          <div class="mt-4 grid sm:grid-cols-2 gap-4">
            <label class="block">
              <span class="text-sm">Nama</span>
              <input class="mt-1 w-full rounded-xl border border-gray-300 px-3 py-2 focus:outline-none focus:ring-2 focus:ring-gray-900"
                     placeholder="Nama lengkap">
            </label>
            <label class="block">
              <span class="text-sm">Email</span>
              <input type="email"
                     class="mt-1 w-full rounded-xl border border-gray-300 px-3 py-2 focus:outline-none focus:ring-2 focus:ring-gray-900"
                     placeholder="nama@mail.com">
            </label>
          </div>
          <label class="block mt-4">
            <span class="text-sm">Subjek</span>
            <input class="mt-1 w-full rounded-xl border border-gray-300 px-3 py-2 focus:outline-none focus:ring-2 focus:ring-gray-900"
                   placeholder="Judul pesan">
          </label>
          <label class="block mt-4">
            <span class="text-sm">Pesan</span>
            <textarea rows="5"
                      class="mt-1 w-full rounded-xl border border-gray-300 px-3 py-2 focus:outline-none focus:ring-2 focus:ring-gray-900"
                      placeholder="Tulis pesanmu..."></textarea>
          </label>
          <div class="mt-5 flex items-center gap-3">
            <x-button type="submit">Kirim</x-button>
            <span class="text-xs text-gray-500">*Form tidak mengirim data (dummy untuk UI tugas).</span>
          </div>
        </form>

        {{-- Map Embed --}}
        <div class="relative h-72 sm:h-96 rounded-2xl overflow-hidden border border-gray-200 shadow-sm">
          <iframe
            src="https://www.google.com/maps?q=Teluk%20Palu%20Sulawesi%20Tengah&output=embed"
            class="absolute inset-0 w-full h-full"
            allowfullscreen=""
            loading="lazy"
            referrerpolicy="no-referrer-when-downgrade"></iframe>
        </div>
      </div>
    </div>
  </section>

  {{-- Toast --}}
  <div id="toast"
       class="fixed bottom-6 left-1/2 -translate-x-1/2 hidden px-4 py-2 rounded-xl bg-gray-900 text-white text-sm shadow">
    Tersalin.
  </div>

  {{-- Copy & Toast Script --}}
  <script>
    function toast(msg='Tersalin.') {
      const t = document.getElementById('toast');
      t.textContent = msg;
      t.classList.remove('hidden', 'opacity-0');
      t.classList.add('opacity-100');
      setTimeout(() => {
        t.classList.add('opacity-0');
        setTimeout(()=> t.classList.add('hidden'), 300);
      }, 1600);
    }

    document.querySelectorAll('.copyBtn').forEach(btn => {
      btn.addEventListener('click', async () => {
        const text = btn.getAttribute('data-copy') || '';
        try {
          await navigator.clipboard.writeText(text);
          toast('Tersalin: ' + text);
        } catch(e) {
          toast('Gagal menyalin');
        }
      });
    });
  </script>
@endsection
