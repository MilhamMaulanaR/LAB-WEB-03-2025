const readline = require('readline');

function soal3() {
    const rl = readline.createInterface({
        input: process.stdin,
        output: process.stdout
    });

    const hari = ['minggu', 'senin', 'selasa', 'rabu', 'kamis', 'jumat', 'sabtu'];

    rl.question("Masukkan hari (contoh: jumat): ", (hariInput) => {
        const indexHari = hari.indexOf(hariInput.toLowerCase());
        if (indexHari === -1) {
            console.log("Hari tidak valid.");
            rl.close();
            return;
        }

        rl.question("Masukkan jumlah hari ke depan: ", (jumlahInput) => {
            const jumlah = parseInt(jumlahInput);
            if (isNaN(jumlah) || jumlah < 0) {
                console.log("Jumlah hari tidak valid.");
                rl.close();
                return;
            }

            const hasilHari = hari[(indexHari + jumlah) % 7];
            console.log(`${jumlah} hari setelah ${hariInput} adalah ${hasilHari}`);
            rl.close();
        });
    });
}

module.exports = soal3;
