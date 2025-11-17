const readline = require('readline');

const rl = readline.createInterface({
  input: process.stdin,
  output: process.stdout
});

const angkaRahasia = Math.floor(Math.random() * 100) + 1;
let jumlahTebakan = 0;

console.log('Aku telah memilih sebuah angka antara 1 dan 100. Coba tebak!');

function tebakAngka() {
  rl.question('Masukkan tebakanmu: ', (jawaban) => {
    const tebakan = parseInt(jawaban, 10);

    if (isNaN(tebakan)) {
      console.log('Input tidak valid. Harap masukkan angka saja.');
      tebakAngka(); 
      return;
    }
  
    jumlahTebakan++; 

    if (tebakan > angkaRahasia) {
      console.log('Terlalu tinggi! Coba lagi.');
      tebakAngka(); 
    } else if (tebakan < angkaRahasia) {
      console.log('Terlalu rendah! Coba lagi.');
      tebakAngka();
    } else {
      console.log(`\nSelamat! Kamu berhasil menebak angka ${angkaRahasia} dengan benar.`);
      console.log(`Kamu butuh ${jumlahTebakan} kali percobaan.`);
      rl.close();
    }
  });
}

tebakAngka();