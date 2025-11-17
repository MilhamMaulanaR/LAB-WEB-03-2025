@extends('layouts.master')

@section('title', 'Kontak Kami')

@section('content')
    <div class="w-full bg-c-main-bg border-t border-c-secondary">
        <div class="px-4 sm:px-6 lg:px-8 py-16">

            <div class="text-center mb-12" data-aos="fade-up">
                <h2 class="text-3xl md:text-4xl font-bold text-c-primary">Hubungi Kami</h2>
                <p class="text-lg text-slate-700 mt-2">Punya pertanyaan, masukan, atau kritik? Silakan isi form di bawah ini.</p>
            </div>

            <div class="grid grid-cols-1 md:grid-cols-2 gap-12 max-w-7xl mx-auto">
                
                <div class="bg-white p-8 rounded-lg shadow-md" data-aos="fade-right">

                    <div id="successMessage" class="hidden mb-4 p-4 rounded-md bg-green-50 text-green-700">
                        <h4 class="font-bold">Terima kasih!</h4>
                        <p>Masukan Anda telah kami simpan.</p>
                    </div>

                    <form id="kritikForm">
                        <div class="space-y-6">
                            
                            <div>
                                <label for="nama" class="block text-sm font-medium text-slate-700">Nama Lengkap</label>
                                <input type="text" name="nama" id="nama" placeholder="Masukkan nama Anda"
                                       class="mt-1 block w-full px-3 py-2 border border-slate-300 rounded-md shadow-sm 
                                              focus:outline-none focus:ring-c-primary focus:border-c-primary" required>
                            </div>

                            <div>
                                <label for="email" class="block text-sm font-medium text-slate-700">Alamat Email</label>
                                <input type="email" name="email" id="email" placeholder="email@contoh.com"
                                       class="mt-1 block w-full px-3 py-2 border border-slate-300 rounded-md shadow-sm
                                              focus:outline-none focus:ring-c-primary focus:border-c-primary" required>
                            </div>
                            
                            <div>
                                <label for="jenis_pesan" class="block text-sm font-medium text-slate-700">Jenis Pesan</label>
                                <select id="jenis_pesan" name="jenis_pesan"
                                        class="mt-1 block w-full px-3 py-2 border border-slate-300 rounded-md shadow-sm 
                                               focus:outline-none focus:ring-c-primary focus:border-c-primary" required>
                                    <option value="">-- Pilih Jenis Pesan --</option>
                                    <option value="Kritik">Kritik</option>
                                    <option value="Masukan">Masukan</option>
                                    <option value="Pertanyaan">Pertanyaan</option>
                                </select>
                            </div>

                            <div>
                                <label for="pesan" class="block text-sm font-medium text-slate-700">Pesan</label>
                                <textarea name="pesan" id="pesan" rows="4" placeholder="Tuliskan pesan Anda di sini..."
                                          class="mt-1 block w-full px-3 py-2 border border-slate-300 rounded-md shadow-sm
                                                 focus:outline-none focus:ring-c-primary focus:border-c-primary" required></textarea>
                            </div>

                            <div>
                                <button type="submit"
                                        class="w-full flex justify-center py-2 px-4 border border-transparent rounded-md shadow-sm 
                                               text-sm font-medium text-c-main-bg bg-c-primary hover:bg-c-secondary
                                               focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-c-primary
                                               transition duration-300">
                                    Kirim Pesan
                                </button>
                            </div>
                        </div>
                    </form>
                </div>

                <div class="bg-white p-8 rounded-lg shadow-md" data-aos="fade-left">
                    <h3 class="text-2xl font-semibold text-gray-900 mb-4">Informasi Kontak</h3>
                    <p class="text-slate-700 leading-relaxed mb-4">
                        Hubungi kami melalui kanal di bawah ini...
                    </p>
                    <div class="space-y-4">
                        <div class="bg-white p-8 rounded-lg shadow-md" data-aos="fade-left">
                            <h3 class="text-2xl font-semibold text-gray-900 mb-4">Informasi Kontak</h3>
                            <p class="text-slate-700 leading-relaxed mb-4">
                                Hubungi kami melalui kanal di bawah ini...
                            </p>
                            <div class="space-y-4">
                                <p class="te    xt-slate-700">
                                    <span>Jl. Dummy Pariwisata No. 123, Kendari</span>
                                </p>
                                <p class="text-slate-700">
                                    <span>info.pariwisata@dummykendari.go.id</span>
                                </p>
                                <p class="text-slate-700">
                                    <span>(0401) 123-456 (Dummy)</span>
                                </p>
                            </div>
                        </div>
                        </p>
                    </div>
                </div>
            </div>
            
        </div>
    </div>
    
    <script>
        document.addEventListener('DOMContentLoaded', function() {
            
            const kritikForm = document.getElementById('kritikForm');
            const successMessage = document.getElementById('successMessage');

            if(kritikForm) {
                kritikForm.addEventListener('submit', function(event) {
                    event.preventDefault();

                    const formData = {
                        nama: document.getElementById('nama').value,
                        email: document.getElementById('email').value,
                        jenis_pesan: document.getElementById('jenis_pesan').value,
                        pesan: document.getElementById('pesan').value,
                        tanggal: new Date().toISOString()
                    };

                    let daftarMasukan = JSON.parse(localStorage.getItem('daftarMasukan')) || [];
                    daftarMasukan.push(formData);
                    localStorage.setItem('daftarMasukan', JSON.stringify(daftarMasukan));

                    kritikForm.reset();
                    successMessage.classList.remove('hidden');
                    
                    setTimeout(() => {
                        successMessage.classList.add('hidden');
                    }, 5000);
                });
            }
        });
    </script>
@endsection