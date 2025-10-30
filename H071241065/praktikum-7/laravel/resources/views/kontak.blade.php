@extends("template.master")

@section("title", "kontak")

@section("content")
  <section class="bg-orange-50/60">
    <div class="max-w-7xl mx-auto pt-32 px-6 py-16">
      <!-- Judul -->
      <div class="text-center py-6 mb-12">
        <h2 class="text-5xl font-bold text-gray-900 mb-2">Hubungi Kami</h2>
        <p class="text-gray-600 max-w-2xl text-lg mx-auto">
          Ada pertanyaan tentang wisata Bali? Kami siap membantu merencanakan petualangan Anda
        </p>
      </div>

      <!-- Konten Utama -->
      <div class="grid md:grid-cols-2 gap-8">
        <!-- Form -->
        <div class="bg-white shadow-md rounded-xl p-8 border border-gray-100">
          <h3 class="text-xl font-semibold text-gray-900 mb-6">Kirim Pesan</h3>

          <form class="space-y-5">
            @csrf

            <div>
              <label class="block text-gray-700 font-medium mb-1">Nama Lengkap</label>
              <input
                type="text"
                name="name"
                placeholder="Masukkan nama Anda"
                class="w-full border bg-orange-50/30 border-gray-300 rounded-lg px-4 py-2 focus:ring-2 focus:ring-amber-400 focus:outline-none"
              />
            </div>

            <div>
              <label class="block text-gray-700 font-medium mb-1">Email</label>
              <input
                type="email"
                name="email"
                placeholder="nama@email.com"
                class="w-full border bg-orange-50/30 border-gray-300 rounded-lg px-4 py-2 focus:ring-2 focus:ring-amber-400 focus:outline-none"
              />
            </div>

            <div>
              <label class="block text-gray-700 font-medium mb-1">Nomor Telepon</label>
              <input
                type="text"
                name="phone"
                placeholder="08xx xxxx xxxx"
                class="w-full border bg-orange-50/30 border-gray-300 rounded-lg px-4 py-2 focus:ring-2 focus:ring-amber-400 focus:outline-none"
              />
            </div>

            <div>
              <label class="block text-gray-700 font-medium mb-1">Pesan</label>
              <textarea
                name="message"
                rows="4"
                placeholder="Ceritakan rencana perjalanan atau pertanyaan Anda..."
                class="w-full border bg-orange-50/30 border-gray-300 rounded-lg px-4 py-2 focus:ring-2 focus:ring-amber-400 focus:outline-none"
              ></textarea>
            </div>

            <x-button class="w-full">Kirim Pesan</x-button>
          </form>
        </div>

        <!-- Informasi Kontak -->
        <div class="space-y-8 h-full">
          <!-- Alamat -->
          <div class="bg-white border border-gray-100 rounded-xl shadow-md p-6 flex items-start gap-4">
            <div class="bg-teal-500 text-white p-3 rounded-lg">
              <i class="ri-map-pin-line text-2xl"></i>
            </div>
            <div>
              <h4 class="font-semibold text-gray-900">Alamat Kantor</h4>
              <p class="text-gray-600 text-sm mt-1">
                Jl. Sunset Road No. 123
                <br />
                Kuta, Bali 80361
                <br />
                Indonesia
              </p>
            </div>
          </div>

          <!-- Telepon -->
          <div class="bg-white border border-gray-100 rounded-xl shadow-md p-6 flex items-start gap-4">
            <div class="bg-amber-500 text-white p-3 rounded-lg">
              <i class="ri-phone-line text-2xl"></i>
            </div>
            <div>
              <h4 class="font-semibold text-gray-900">Telepon</h4>
              <p class="text-gray-600 text-sm mt-1">
                +62 361 123 4567
                <br />
                +62 812 3456 7890
              </p>
            </div>
          </div>

          <!-- Email -->
          <div class="bg-white border border-gray-100 rounded-xl shadow-md p-6 flex items-start gap-4">
            <div class="bg-amber-500 text-white p-3 rounded-lg">
              <i class="ri-mail-line text-2xl"></i>
            </div>
            <div>
              <h4 class="font-semibold text-gray-900">Email</h4>
              <p class="text-gray-600 text-sm mt-1">
                info@eksplorbali.com
                <br />
                booking@eksplorbali.com
              </p>
            </div>
          </div>

          <!-- Jam Operasional -->
          <div class="bg-white border border-gray-100 rounded-xl shadow-md p-6 flex items-start gap-4">
            <div class="bg-teal-500 text-white p-3 rounded-lg">
              <i class="ri-time-line text-2xl"></i>
            </div>
            <div>
              <h4 class="font-semibold text-gray-900">Jam Operasional</h4>
              <p class="text-gray-600 text-sm mt-1">
                Senin - Jumat: 09.00 - 18.00 WITA
                <br />
                Sabtu: 09.00 - 15.00 WITA
                <br />
                Minggu & Hari Libur: Tutup
              </p>
            </div>
          </div>
        </div>
      </div>
    </div>
  </section>
@endsection
