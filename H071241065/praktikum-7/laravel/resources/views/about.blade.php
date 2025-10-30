@extends("template.master")

@section("title", "about")

@section("content")
  <section class="pt-70 h-screen overflow-hidden">
    <div class="absolute inset-0 brightness-70 -z-20">
      <img src="{{ asset("images/hero-bali.jpg") }}" alt="hero-bali" class="w-full object-cover h-full" />
    </div>
    <div class="max-w-4xl mx-auto flex flex-col gap-6 px-4 z-10 text-center text-white">
      <h1 class="text-5xl font-bold md:text-7xl">Tentang Bali</h1>
      <p class="text-xl md:text-2xl text-white/90">Pulau Dewata yang Memukau Dunia</p>
    </div>
  </section>

  <section class="bg-orange-50/60">
    <!-- Statistik Singkat -->
    <div class="max-w-7xl mx-auto px-6 py-16">
      <div class="grid grid-cols-2 md:grid-cols-4 gap-4 mb-12 text-center">
        <div class="bg-white border border-gray-100 shadow-sm rounded-xl p-6">
          <i class="ri-map-pin-2-line text-3xl text-emerald-500 mb-2"></i>
          <h4 class="text-2xl font-semibold text-gray-800">5,780 km²</h4>
          <p class="text-sm text-gray-600">Luas Wilayah</p>
        </div>

        <div class="bg-white border border-gray-100 shadow-sm rounded-xl p-6">
          <i class="ri-group-line text-3xl text-emerald-500 mb-2"></i>
          <h4 class="text-2xl font-semibold text-gray-800">4.3 Juta</h4>
          <p class="text-sm text-gray-600">Penduduk</p>
        </div>

        <div class="bg-white border border-gray-100 shadow-sm rounded-xl p-6">
          <i class="ri-calendar-line text-3xl text-emerald-500 mb-2"></i>
          <h4 class="text-2xl font-semibold text-gray-800">1958</h4>
          <p class="text-sm text-gray-600">Tahun Berdiri</p>
        </div>

        <div class="bg-white border border-gray-100 shadow-sm rounded-xl p-6">
          <i class="ri-government-line text-3xl text-emerald-500 mb-2"></i>
          <h4 class="text-2xl font-semibold text-gray-800">Denpasar</h4>
          <p class="text-sm text-gray-600">Ibu Kota</p>
        </div>
      </div>

      <!-- Judul -->
      <div class="mb-10">
        <h2 class="text-3xl font-bold text-gray-900 mb-3">Selayang Pandang</h2>
        <p class="text-gray-700 text-lg leading-relaxed">
          Bali adalah sebuah provinsi di Indonesia yang terletak di kepulauan Nusa Tenggara. Dikenal sebagai “Pulau
          Dewata,” Bali telah menjadi salah satu destinasi wisata paling terkenal di dunia. Keindahan alamnya yang
          memukau, budaya yang kaya, dan keramahtamahan penduduknya menjadikan Bali tempat yang istimewa bagi jutaan
          wisatawan setiap tahunnya.
        </p>
      </div>

      <!-- Deskripsi 4 Kotak -->
      <div class="grid md:grid-cols-2 gap-6 mb-10">
        <!-- Sejarah & Budaya -->
        <div class="bg-white border border-gray-100 rounded-xl shadow p-6">
          <h3 class="text-2xl font-bold text-teal-500 mb-3">Sejarah & Budaya</h3>
          <p class="text-gray-700 leading-relaxed">
            Bali memiliki sejarah panjang yang dimulai sejak zaman prasejarah. Pengaruh Hindu dan budaya Jawa membentuk
            budaya Bali yang unik dan kaya akan kesenian. Mayoritas penduduk Bali menganut agama Hindu Dharma, yang
            tercermin dalam kehidupan sehari-hari, upacara adat, dan tradisi rohani yang masih lestari hingga kini.
          </p>
        </div>

        <!-- Alam & Geografi -->
        <div class="bg-white border border-gray-100 rounded-xl shadow p-6">
          <h3 class="text-2xl font-bold text-teal-500 mb-3">Alam & Geografi</h3>
          <p class="text-gray-700 leading-relaxed">
            Bali diberkahi dengan keindahan alam yang luar biasa. Dari gunung berapi megah seperti Gunung Agung dan
            Gunung Batur, hingga pantai berpasir putih yang menawan seperti di Kuta dan Nusa Dua. Sawah terasering
            hijau, air terjun alami, dan lautan biru menjadikan Bali destinasi yang tak tertandingi.
          </p>
        </div>

        <!-- Ekonomi & Pariwisata -->
        <div class="bg-white border border-gray-100 rounded-xl shadow p-6">
          <h3 class="text-2xl font-bold text-teal-500 mb-3">Ekonomi & Pariwisata</h3>
          <p class="text-gray-700 leading-relaxed">
            Pariwisata adalah tulang punggung ekonomi Bali, menyumbang sebagian besar pendapatan daerah. Selain itu,
            masyarakat Bali juga dikenal dengan kreativitasnya dalam kerajinan tangan, kesenian, dan kuliner khas.
            Produk-produk lokal dari hasil pertanian dan seni memperkuat identitas Bali di kancah nasional dan
            internasional.
          </p>
        </div>

        <!-- Kehidupan Modern -->
        <div class="bg-white border border-gray-100 rounded-xl shadow p-6">
          <h3 class="text-2xl font-bold text-teal-500 mb-3">Kehidupan Modern</h3>
          <p class="text-gray-700 leading-relaxed">
            Meskipun modern dan kosmopolitan, Bali tetap mempertahankan nilai-nilai tradisional dan spiritual. Berbagai
            pusat pendidikan, teknologi, dan gaya hidup berkembang di Pulau Dewata ini. Banyak ekspatriat dan digital
            nomad memilih Bali sebagai tempat tinggal karena keseimbangan antara kehidupan modern dan nilai-nilai
            kemanusiaan yang mendalam.
          </p>
        </div>
      </div>

      <!-- Mengapa Bali Istimewa -->
      <div class="bg-linear-to-r from-emerald-500 to-teal-500 rounded-xl p-6 text-white shadow-md">
        <h3 class="text-2xl font-semibold mb-3">Mengapa Bali Istimewa?</h3>
        <ul class="list-disc list-inside space-y-1">
          <li>Budaya Hindu yang unik dan masih lestari di tengah Indonesia yang mayoritas Muslim</li>
          <li>Keindahan alam yang beragam dari pantai hingga pegunungan</li>
          <li>Seni dan tradisi yang hidup di setiap aspek kehidupan masyarakat Bali</li>
          <li>Keramahan dan spiritualitas masyarakat yang menyambut pengunjung</li>
          <li>Kuliner khas yang lezat dengan cita rasa autentik Bali</li>
        </ul>
      </div>
    </div>
  </section>
@endsection
