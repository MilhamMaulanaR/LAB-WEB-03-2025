const { stdin: input, stdout: output } = require("node:process");
const readline = require("node:readline");
const rl = readline.createInterface({ input, output });

let angkaRandom = Math.floor(Math.random() * 100);
let percobaan = 0;

function tebak() {
  percobaan++;
  rl.question("asukkan salah satu dari angka 1 sampai 100: ", (inputAngka) => {
    const angka = parseInt(inputAngka);
    if (isNaN(angka)) {
      console.log("Masukkan angka yang valid");
      tebak();
      return;
    }

    if (angka > angkaRandom) {
      console.log("Terlalu tinggi! Coba lagi");
      tebak();
    } else if (angka < angkaRandom) {
      console.log("Terlalu rendah! Coba lagi");
      tebak();
    } else {
      console.log(
        `Selamat! kamu berhasil menebak angka ${angkaRandom} dengan benar. `
      );
      console.log(`Sebanyak ${percobaan}x percobaan`);
      rl.close();
    }
  });
}

tebak();
