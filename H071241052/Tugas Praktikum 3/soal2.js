const readline = require('readline');

function soal2() {
    const rl = readline.createInterface({
        input: process.stdin,
        output: process.stdout
    });

    rl.question("Masukkan harga barang: ", (hargaInput) => {
        const harga = parseFloat(hargaInput);
        if (isNaN(harga) || harga <= 0) {
            console.log("Harga tidak valid.");
            rl.close();
            return;
        }

        rl.question("Masukkan jenis barang (Elektronik, Pakaian, Makanan, Lainnya): ", (jenisInput) => {
            const jenis = jenisInput.toLowerCase();
            let diskon = 0;

            switch (jenis) {
                case 'elektronik':
                    diskon = 0.10;
                    break;
                case 'pakaian':
                    diskon = 0.20;
                    break;
                case 'makanan':
                    diskon = 0.05;
                    break;
                case 'lainnya':
                    diskon = 0;
                    break;
                default:
                    console.log("Jenis barang tidak dikenali.");
                    rl.close();
                    return;
            }

            const potongan = harga * diskon;
            const hargaAkhir = harga - potongan;

            console.log(`\nHarga awal: Rp ${harga}`);
            console.log(`Diskon: ${diskon * 100}%`);
            console.log(`Harga setelah diskon: Rp ${hargaAkhir}`);
            rl.close();
        });
    });
}

module.exports = soal2;
