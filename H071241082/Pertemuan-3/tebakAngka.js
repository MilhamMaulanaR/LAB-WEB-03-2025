const readline = require("readline");
const rl = readline.createInterface({
  input: process.stdin,
  output: process.stdout,
});

const angkaRahasia = Math.floor(Math.random() * 100) + 1;
let jumlahTebakan = 0;

console.log("Selamat datang di Game Tebak Angka!");
console.log("Aku sudah memilih sebuah angka antara 1 dan 100. Coba tebak!");

function tanyaTebakan() {
  rl.question("Masukkan tebakan Anda: ", (input) => {
    const tebakan = parseInt(input, 10);

    if (isNaN(tebakan)) {
      console.log("Input tidak valid. Harap masukkan angka.");
      tanyaTebakan();
      return;
    }

    jumlahTebakan++;

    if (tebakan > angkaRahasia) {
      console.log("Terlalu tinggi! Coba lagi.");
      tanyaTebakan();
    } else if (tebakan < angkaRahasia) {
      console.log("Terlalu rendah! Coba lagi.");
      tanyaTebakan();
    } else {
      console.log(
        `\nSelamat! Kamu berhasil menebak angka ${angkaRahasia} dengan benar.`
      );
      console.log(`Kamu memerlukan ${jumlahTebakan} kali percobaan.`);
      rl.close(); 
    }
  });
}

tanyaTebakan();
