const readline = require('readline');

const rl = readline.createInterface({
  input: process.stdin,
  output: process.stdout
});

rl.question('Masukkan harga barang: ', (harga) => {
  const hargaAwal = parseFloat(harga);

  if (isNaN(hargaAwal) || hargaAwal < 0) {
    console.log('Kesalahan: Harga yang dimasukkan tidak valid. Harap masukkan angka positif.');
    rl.close(); 
    return;     
  }

  const jenisBarang = 'Masukkan jenis barang (Elektronik, Pakaian, Makanan, Lainnya): ';
  rl.question(jenisBarang, (jenis) => {
    let diskon = 0;
    const jenisLower = jenis.toLowerCase();

    switch (jenisLower) {
      case 'elektronik':
        diskon = 0.10;
        break;
      case 'pakaian':
        diskon = 0.20;
        break;
      case 'makanan':
        diskon = 0.05;
        break;
      default:
        diskon = 0;
    }

    const jumlahDiskon = hargaAwal * diskon;
    const hargaAkhir = hargaAwal - jumlahDiskon;

    console.log(`\nHarga awal: Rp ${hargaAwal}`);
    console.log(`Diskon: ${diskon * 100}%`);
    console.log(`Harga setelah diskon: Rp ${hargaAkhir}`);

    rl.close();
  });
});