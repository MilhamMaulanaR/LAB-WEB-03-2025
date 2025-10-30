const readline = require('readline');
const countEvenNumbers = require('./soal1');
const soal2 = require('./soal2');
const soal3 = require('./soal3');
const soal4 = require('./soal4');

const rl = readline.createInterface({
    input: process.stdin,
    output: process.stdout
});

function tampilkanMenu() {
    console.log("\n=== Menu Tugas Praktikum 3 ===");
    console.log("1. Hitung jumlah bilangan genap");
    console.log("2. Program Diskon Harga Barang");
    console.log("3. Prediksi Hari ke-N");
    console.log("4. Permainan Tebak Angka");
    console.log("0. Keluar");

    rl.question("Pilih nomor soal (0-4): ", (pilih) => {
        switch (pilih) {
            case "1":
                rl.question("Masukkan angka awal: ", (start) => {
                    rl.question("Masukkan angka akhir: ", (end) => {
                        countEvenNumbers(parseInt(start), parseInt(end));
                        tampilkanMenu(); // balik ke menu setelah selesai
                    });
                });
                break;
            case "2":
                soal2(() => tampilkanMenu()); // callback kembali ke menu
                break;
            case "3":
                soal3(() => tampilkanMenu()); // callback kembali ke menu
                break;
            case "4":
                soal4(() => tampilkanMenu()); // callback kembali ke menu
                break;
            case "0":
                console.log("Terima kasih!");
                rl.close();
                break;
            default:
                console.log("Pilihan tidak valid.");
                tampilkanMenu(); // kembali ke menu lagi
        }
    });
}

tampilkanMenu(); // mulai program
