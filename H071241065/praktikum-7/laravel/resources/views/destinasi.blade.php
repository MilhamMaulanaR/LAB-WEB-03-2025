@extends("template.master")

@section("title", "destinasi")

@section("content")
  <section class="flex py-16 pt-36 bg-orange-50/60 min-h-screen items-center justify-center">
    <div class="max-w-6xl flex-col px-4 flex gap-16">
      <div class="flex flex-col text-center items-center justify-center gap-4">
        <h1 class="text-3xl md:text-5xl font-bold">Destinasi Wisata Bali</h1>
        <p class="text-lg md:text-xl text-black/90">
          Jelajahi keindahan alam dan budaya Bali melalui destinasi wisata yang menakjubkan
        </p>
      </div>
      <div class="space-y-10">
        <x-destination-card
          src="tanah-lot"
          title="Tanah Lot"
          location="Tabanan, Bali"
          duration="2–3 jam"
          rating="4.8"
          description="Pura laut ikonik di atas batu karang dengan pemandangan matahari terbenam yang spektakuler."
        />
        <x-destination-card
          src="uluwatu"
          title="Pura Uluwatu"
          location="Badung, Bali"
          duration="3-4 jam"
          rating="4.9"
          description="Pura yang bertengger di tebing tinggi dengan pemandangan Samudra Hindia dan pertunjukan Tari Kecak"
        />
        <x-destination-card
          src="rice-terraces"
          title="Tegalalang Rice Terraces"
          location="Ubud, Bali"
          duration="1-2 jam"
          rating="4.7"
          description="Sawah terasering hijau yang memukau dengan sistem irigasi subak tradisional Bali"
        />
      </div>
      <div class="p-6 bg-linear-to-r text-white from-teal-600 to-teal-500 rounded-lg">
        <h1 class="text-2xl mb-4 font-bold">Tips Berkunjung</h1>
        <ul class="list-disc list-inside pl-4 space-y-3 text-lg">
          <li>Datang saat pagi atau sore hari untuk menghindari terik matahari</li>
          <li>Kenakan pakaian sopan saat mengunjungi pura</li>
          <li>Jangan lupa membawa kamera untuk mengabadikan momen indah</li>
          <li>Siapkan uang tunai untuk tiket masuk dan parkir</li>
        </ul>
      </div>
    </div>
  </section>
@endsection
