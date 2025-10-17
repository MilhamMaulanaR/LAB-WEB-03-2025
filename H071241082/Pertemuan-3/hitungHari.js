// 1. readline
const readline = require("readline");
const rl = readline.createInterface({
  input: process.stdin,
  output: process.stdout,
});

const daftarHari = [
  "senin",
  "selasa",
  "rabu",
  "kamis",
  "jumat",
  "sabtu",
  "minggu",
];

rl.question("Masukkan hari saat ini: ", (hariAwalInput) => {

  const hariAwal = hariAwalInput.toLowerCase();

  const indexHariAwal = daftarHari.indexOf(hariAwal);

  if (indexHariAwal === -1) {
    console.log(
      "Nama hari tidak valid. Harap masukkan salah satu dari: Senin, Selasa, dst."
    );
    rl.close();
    return;
  }

  rl.question("Masukkan jumlah hari yang akan datang: ", (jumlahHariInput) => {
    const jumlahHari = parseInt(jumlahHariInput, 10);

    if (isNaN(jumlahHari) || jumlahHari < 0) {
      console.log(
        "Input jumlah hari tidak valid. Harap masukkan angka positif."
      );
      rl.close();
      return;
    }

    const indexHariBaru = (indexHariAwal + jumlahHari) % 7;

    const namaHariBaru = daftarHari[indexHariBaru];

    const capitalize = (s) => s.charAt(0).toUpperCase() + s.slice(1);

    console.log(
      `\n${jumlahHari} hari setelah hari ${capitalize(
        hariAwal
      )} adalah hari ${capitalize(namaHariBaru)}.`
    );
    rl.close();
  });
});