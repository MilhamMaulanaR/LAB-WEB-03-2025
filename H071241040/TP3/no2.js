const readline = require('readline');

const rl = readline.createInterface({
  input: process.stdin,
  output: process.stdout
});

function hitungHargaSetelahDiskon(harga, jenisBarang) {
  let diskon;
  let jenis = jenisBarang.toLowerCase();

  if (jenis === "elektronik") {
    diskon = 0.10;
  } else if (jenis === "pakaian") {
    diskon = 0.20;
  } else if (jenis === "makanan") {
    diskon = 0.05;
  } else if (jenis === "lainnya") {
    diskon = 0;
  } else {
    throw new Error("Jenis barang tidak valid! Harus Elektronik, Pakaian, Makanan, atau Lainnya.");
  }

  let potongan = harga * diskon;
  let hargaAkhir = harga - potongan;

  console.log("\n=== Hasil Perhitungan ===");
  console.log("Harga awal: Rp " + harga);
  console.log("Diskon: " + (diskon * 100) + "%");
  console.log("Harga setelah diskon: Rp " + hargaAkhir);
}

rl.question("Masukkan harga barang: ", (inputHarga) => {
  let harga = Number(inputHarga);
  
  if (isNaN(harga) || harga <= 0) {
    console.log("Harga harus berupa angka positif!");
    rl.close();
    return;
  }

  rl.question("Masukkan jenis barang (Elektronik, Pakaian, Makanan, Lainnya): ", (jenisBarang) => {
    try {
      hitungHargaSetelahDiskon(harga, jenisBarang);
    } catch (error) {
      console.error("Error:", error.message);
    }
    rl.close();
  });
});
