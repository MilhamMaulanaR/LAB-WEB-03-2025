const readline = require('readline');

const rl = readline.createInterface({
  input: process.stdin,
  output: process.stdout
});

const namaHari = ['senin', 'selasa', 'rabu', 'kamis', 'jumat', 'sabtu', 'minggu'];

rl.question('Masukkan hari saat ini: ', (hariIni) => {
  const hariIniLower = hariIni.toLowerCase();
  const indeksHariIni = namaHari.indexOf(hariIniLower);

  if (indeksHariIni === -1) {
    console.log('Kesalahan: Nama hari tidak valid. Gunakan salah satu dari: Senin, Selasa, Rabu, Kamis, Jumat, Sabtu, Minggu.');
    rl.close();
    return;
  }

  rl.question('Masukkan jumlah hari yang akan datang: ', (jumlahHari) => {
    const hariKedepan = parseInt(jumlahHari, 10);

    if (isNaN(hariKedepan)) {
      console.log('Kesalahan: Jumlah hari tidak valid. Harap masukkan angka.');
      rl.close();
      return;
    }

    const indeksHariNanti = (indeksHariIni + hariKedepan) % 7;
    const namaHariNanti = namaHari[indeksHariNanti];

    const outputHariIni = hariIniLower.charAt(0).toUpperCase() + hariIniLower.slice(1);
    const outputHariNanti = namaHariNanti.charAt(0).toUpperCase() + namaHariNanti.slice(1);

    console.log(`\n${hariKedepan} hari setelah ${outputHariIni} adalah ${outputHariNanti}`);
    rl.close();
  });
});