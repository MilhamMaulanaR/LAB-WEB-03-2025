@extends("template.master")

@section("title", "kuliner")

@section("content")
  <section class="pt-36 min-h-screen space-y-8 bg-orange-50/60">
    <div class="flex flex-col text-center items-center justify-center gap-4">
      <h1 class="text-3xl md:text-5xl font-bold">Kuliner Khas Bali</h1>
      <p class="text-lg md:text-xl text-black/90">
        Nikmati kelezatan cita rasa autentik Bali yang kaya akan rempah dan tradisi
      </p>
    </div>
    <div class="max-w-7xl mx-auto px-6 py-12 bg-[#FAFAF8]">
      <div class="grid grid-cols-1 md:grid-cols-3 gap-8">
        <!-- Card 1 -->
        <div class="bg-white rounded-2xl group shadow-sm overflow-hidden border border-gray-100">
          <div class="overflow-hidden h-56">
            <img
              src="{{ asset("images/babi-guling.jpg") }}"
              alt="Babi Guling"
              class="w-full h-full group-hover:scale-110 transition-all duration-300 ease-in-out object-cover"
            />
          </div>

          <div class="p-5">
            <h3 class="text-lg font-bold text-gray-800 mb-2">Babi Guling</h3>

            <div class="flex items-center gap-2 mb-3">
              <span
                class="inline-flex items-center gap-1 px-2.5 py-1 text-sm rounded-full bg-orange-100 text-orange-700"
              >
                🔥 Sedang
              </span>
              <span class="inline-flex items-center gap-1 px-2.5 py-1 text-sm rounded-full bg-gray-100 text-gray-800">
                🥩 Non-Vegetarian
              </span>
            </div>

            <p class="text-gray-600 text-sm leading-relaxed mb-4">
              Babi guling adalah hidangan ikonik Bali berupa babi yang dipanggang utuh dengan bumbu rempah khas.
              Dagingnya yang renyah di luar dan juicy di dalam disajikan dengan nasi, lawar, dan sambal matah.
            </p>

            <div class="border-t pt-3 border-slate-200">
              <p class="text-sm font-semibold text-amber-700">
                Kisaran Harga:
                <span class="text-amber-600">Rp 35.000 - Rp 50.000</span>
              </p>
            </div>
          </div>
        </div>

        <!-- Card 2 -->
        <div class="bg-white rounded-2xl group shadow-sm overflow-hidden border border-gray-100">
          <div class="overflow-hidden h-56">
            <img
              src="{{ asset("images/nasi-campur.jpg") }}"
              alt="Nasi Campur Bali"
              class="w-full group-hover:scale-110 transition-all duration-300 ease-in-out h-full object-cover"
            />
          </div>

          <div class="p-5">
            <h3 class="text-lg font-bold text-gray-800 mb-2">Nasi Campur Bali</h3>

            <div class="flex items-center gap-2 mb-3">
              <span
                class="inline-flex items-center gap-1 px-2.5 py-1 text-sm rounded-full bg-orange-100 text-orange-700"
              >
                🔥 Sedang
              </span>
              <span class="inline-flex items-center gap-1 px-2.5 py-1 text-sm rounded-full bg-gray-100 text-gray-800">
                🍛 Mixed
              </span>
            </div>

            <p class="text-gray-600 text-sm leading-relaxed mb-4">
              Hidangan komplit dengan nasi putih yang disajikan bersama berbagai lauk seperti ayam suwir, sate lilit,
              lawar, telur, dan sambal. Perpaduan sempurna rasa gurih, pedas, dan segar.
            </p>

            <div class="border-t pt-3 border-slate-200">
              <p class="text-sm font-semibold text-amber-700">
                Kisaran Harga:
                <span class="text-amber-600">Rp 25.000 - Rp 40.000</span>
              </p>
            </div>
          </div>
        </div>

        <!-- Card 3 -->
        <div class="bg-white rounded-2xl shadow-sm group overflow-hidden border border-gray-100">
          <div class="overflow-hidden h-56">
            <img
              src="{{ asset("images/bali-food.jpg") }}"
              alt="Bebek Betutu"
              class="w-full group-hover:scale-110 transition-all duration-300 ease-in-out h-full object-cover"
            />
          </div>

          <div class="p-5">
            <h3 class="text-lg font-bold text-gray-800 mb-2">Bebek Betutu</h3>

            <div class="flex items-center gap-2 mb-3">
              <span class="inline-flex items-center gap-1 px-2.5 py-1 text-sm rounded-full bg-red-100 text-red-700">
                🌶️ Pedas
              </span>
              <span class="inline-flex items-center gap-1 px-2.5 py-1 text-sm rounded-full bg-gray-100 text-gray-800">
                🥩 Non-Vegetarian
              </span>
            </div>

            <p class="text-gray-600 text-sm leading-relaxed mb-4">
              Bebek yang dibumbui dengan bumbu khas Bali dan dibungkus dengan daun pisang, kemudian dipanggang perlahan
              hingga bumbu meresap sempurna. Teksturnya lembut dengan rasa yang kaya.
            </p>

            <div class="border-t pt-3 border-slate-200">
              <p class="text-sm font-semibold text-amber-700">
                Kisaran Harga:
                <span class="text-amber-600">Rp 45.000 - Rp 65.000</span>
              </p>
            </div>
          </div>
        </div>
      </div>
    </div>

    <div class="max-w-7xl mx-auto px-6 pb-16 bg-[#FAFAF8]">
      <div class="grid grid-cols-1 md:grid-cols-2 gap-8">
        <!-- Rekomendasi Warung -->
        <div class="bg-white border border-teal-100 rounded-xl p-6 shadow-sm">
          <h3 class="text-teal-700 font-semibold text-lg mb-4">Rekomendasi Warung</h3>
          <ul class="list-disc list-inside space-y-2 text-gray-600">
            <li>
              <span class="font-semibold text-gray-800">Ibu Oka</span>
              – Terkenal dengan Babi Guling terbaik di Ubud
            </li>
            <li>
              <span class="font-semibold text-gray-800">Men Tempeh</span>
              – Nasi Campur Bali yang legendaris
            </li>
            <li>
              <span class="font-semibold text-gray-800">Bebek Bengil</span>
              – Spesialis Bebek Betutu yang crispy
            </li>
          </ul>
        </div>

        <!-- Etika Makan di Bali -->
        <div class="bg-linear-to-r from-amber-500 to-orange-500 text-white rounded-xl p-6 shadow-sm">
          <h3 class="font-semibold text-lg mb-4">Etika Makan di Bali</h3>
          <ul class="list-disc list-inside space-y-2">
            <li>Gunakan tangan kanan saat makan</li>
            <li>Tunggu hingga tuan rumah memulai makan</li>
            <li>Jangan menolak makanan yang ditawarkan</li>
            <li>Habiskan makanan sebagai bentuk apresiasi</li>
          </ul>
        </div>
      </div>
    </div>
  </section>
@endsection
