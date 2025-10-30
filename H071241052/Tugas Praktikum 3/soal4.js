const readline = require('readline');

function soal4() {
    const rl = readline.createInterface({
        input: process.stdin,
        output: process.stdout
    });

    const target = Math.floor(Math.random() * 100) + 1;
    let percobaan = 0;

    console.log("Tebak angka dari 1 sampai 100");

    function tanya() {
        rl.question("Masukkan tebakan: ", (input) => {
            const tebakan = parseInt(input);
            if (isNaN(tebakan) || tebakan < 1 || tebakan > 100) {
                console.log("Tebakan tidak valid. Masukkan angka antara 1 dan 100.");
                tanya();
                return;
            }

            percobaan++;
            if (tebakan < target) {
                console.log("Terlalu rendah! Coba lagi.");
                tanya();
            } else if (tebakan > target) {
                console.log("Terlalu tinggi! Coba lagi.");
                tanya();
            } else {
                console.log(`Selamat! kamu berhasil menebak angka ${target} dengan benar.`);
                console.log(`Sebanyak ${percobaan}x percobaan.`);
                rl.close();
            }
        });
    }

    tanya();
}

module.exports = soal4;
