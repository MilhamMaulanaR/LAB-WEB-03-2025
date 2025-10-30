const readline = require('readline');

const rl = readline.createInterface({
  input: process.stdin,
  output: process.stdout
});

const random = Math.floor(Math.random() * 100) + 1;
let jumlah = 0;

function tanya() {
  rl.question("Masukkan salah satu angka 1 sampai 100: ", (input) => {
    const tebakan = Number(input.trim());
    if (!Number.isInteger(tebakan) || tebakan < 1 || tebakan > 100) {
      console.log("Input harus berupa bilangan bulat dari 1 sampai 100!");
      return tanya(); 
    }

    jumlah++;
    if (tebakan === random) {
      console.log(`Selamat! kamu berhasil menebak angka ${tebakan} dengan benar`);
      console.log(`Sebanyak ${jumlah} percobaan`);
      rl.close();
    } else if (tebakan < random) {
      console.log("Terlalu kecil. Coba lagi.");
      tanya();
    } else {
      console.log("Terlalu besar. Coba lagi.");
      tanya();
    }
  });
}

tanya();
