const { stdin: input, stdout: output } = require("node:process");
const readline = require("node:readline");
const rl = readline.createInterface({ input, output });

const namaHari = [
  "senin",
  "selasa",
  "rabu",
  "kamis",
  "jumat",
  "sabtu",
  "minggu",
];
function hitungHari(hari, hariYangDatang) {
  const index = namaHari.indexOf(hari);

  const hasil = (index + hariYangDatang) % 7;

  console.log(
    `${hariYangDatang} hari setelah hari ${hari} adalah ${
      namaHari[hasil].charAt(0).toUpperCase() + namaHari[hasil].slice(1)
    }`
  );
}

rl.question("Masukkan hari: ", (inputHari) => {
  const hariInput = inputHari.toLowerCase();
  if (
    hariInput != "senin" &&
    hariInput != "selasa" &&
    hariInput != "rabu" &&
    hariInput != "kamis" &&
    hariInput != "jumat" &&
    hariInput != "sabtu" &&
    hariInput != "minggu"
  ) {
    console.log("Nama hari yang di masukkan tidak valid");
    rl.close();
  } else {
    rl.question(
      "Masukkan jumlah hari yang akan datang (Cth: 1000): ",
      (inputHariYangDatang) => {
        const hariDatang = parseInt(inputHariYangDatang, 10);
        if (hariDatang < 0 || isNaN(hariDatang)) {
          console.log("masukkan angka yang valid");
          rl.close();
        } else {
          hitungHari(hariInput, hariDatang);
          rl.close();
        }
      }
    );
  }
});
