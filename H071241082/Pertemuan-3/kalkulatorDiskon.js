
const readline = require("readline");

const rl = readline.createInterface({
  input: process.stdin,
  output: process.stdout,
});

rl.question("Masukkan harga barang: ", (hargaInput) => {

  const harga = parseFloat(hargaInput);


  if (isNaN(harga) || harga < 0) {
    console.log("Input harga tidak valid. Harap masukkan angka positif.");
    rl.close(); 
    return;
  }


  rl.question(
    "Masukkan jenis barang (Elektronik, Pakaian, Makanan, Lainnya): ",
    (jenisBarang) => {
      let diskon = 0;
      let namaDiskon = "0%";

      switch (jenisBarang.toLowerCase()) {
        case "elektronik":
          diskon = 0.1; // 10%
          namaDiskon = "10%";
          break;
        case "pakaian":
          diskon = 0.2; // 20%
          namaDiskon = "20%";
          break;
        case "makanan":
          diskon = 0.05; // 5%
          namaDiskon = "5%";
          break;
        default:
          diskon = 0;
          namaDiskon = "0%";
          break;
      }

      const hargaAkhir = harga - harga * diskon;


      console.log("\n--- Rincian Belanja ---");
      console.log(`Harga awal: Rp ${harga}`);
      console.log(`Diskon: ${namaDiskon}`);
      console.log(`Harga setelah diskon: Rp ${hargaAkhir}`);

      
      rl.close();
    }
  );
});
