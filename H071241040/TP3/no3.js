const { log } = require('console');
const readline = require('readline');

const rl = readline.createInterface({
  input: process.stdin,
  output: process.stdout
});

let harian = ["senin", "selasa", "rabu","kamis", "jumat", "sabtu", "minggu"]
function imajiner(hari, to){
    let index = harian.indexOf(hari)
    modulus = to % 7
    akhir = (index + modulus) % 7
    console.log(`Output: ${to} hari setelah ${hari} adalah ${harian[akhir]}`)
}

rl.question("Masukkan hari: ", (inputHari) => {
  let hari = inputHari.toLowerCase().trim();

  if (!harian.includes(hari)) {
    console.log("masukkan inputan yang benar");
    rl.close();
    return;
  }


  rl.question("Masukkan Hari yang akan datang: ", (inputComing) => {
    let Coming = Number(inputComing);
    if (isNaN(Coming) || Coming <= 0) {
    console.log("Angka harus berupa angka positif!");
    }
    try {
      imajiner(hari, Coming);
    } catch (error) {
      console.error("Error:", error.message);
    }
    rl.close();
  });
});