document.addEventListener('DOMContentLoaded', () => {
    const elemenTanganPemain = document.getElementById('player-hand');
    const elemenTanganBot = document.getElementById('bot-hand');
    const elemenTumpukanBuang = document.getElementById('discard-pile');
    const elemenDek = document.getElementById('deck');
    const elemenLogStatus = document.getElementById('status-log');
    
    const tombolUno = document.getElementById('uno-button');
    const tombolLewatiGiliran = document.getElementById('pass-turn-btn'); 

    const elemenSaldoPemain = document.getElementById('player-balance');
    const elemenSaldoSidebar = document.getElementById('player-balance-sidebar'); 
    const elemenTaruhanSidebar = document.getElementById('current-bet-sidebar'); 
    const elemenSaldoModal = document.getElementById('modal-balance');

    const elemenJumlahKartuBot = document.getElementById('bot-card-count');
    const elemenJumlahKartuPemain = document.getElementById('player-card-count');

    const modalTaruhan = document.getElementById('betting-modal');
    const modalPilihWarna = document.getElementById('color-picker-modal');
    const modalNotifikasi = document.getElementById('notification-modal');

    const inputJumlahTaruhan = document.getElementById('bet-amount');
    const tombolMulaiRonde = document.getElementById('start-round-btn');
    const tombolRondeBerikutnya = document.getElementById('next-round-btn');
    const tombolMulaiUlang = document.getElementById('restart-game-btn');
    const kotakWarna = document.querySelectorAll('.color-box');
    
    let dek = [];
    let tanganPemain = [];
    let tanganBot = [];
    let tumpukanBuang = [];
    let pemainSaatIni = 'pemain';
    let warnaSaatIni = '';
    let saldoPemain = 5000;
    let taruhanSaatIni = 0;
    let timerUno = null;
    let permainanBerlangsung = false;
    let kartuBaruDiambil = null; 

    function buatDek() {
        const warna = ['red', 'green', 'blue', 'yellow'];
        const nilai = ['0', '1', '2', '3', '4', '5', '6', '7', '8', '9', 'skip', 'reverse', 'draw_two'];
        let dekDibuat = [];

        warna.forEach(w => {
            nilai.forEach(n => {
                dekDibuat.push({ warna: w, nilai: n });
                if (n !== '0') {
                    dekDibuat.push({ warna: w, nilai: n });
                }
            });
        });

        for (let i = 0; i < 4; i++) {
            dekDibuat.push({ warna: 'wild', nilai: 'wild' });
            dekDibuat.push({ warna: 'wild', nilai: 'draw_four'});
        }
        
        return dekDibuat;
    }

    function kocokDek(dek) {
        for (let i = dek.length - 1; i > 0; i--) {
            const j = Math.floor(Math.random() * (i + 1));
            [dek[i], dek[j]] = [dek[j], dek[i]];
        }
    }

    function bagiKartu() {
        for (let i = 0; i < 7; i++) {
            tanganPemain.push(dek.pop());
            tanganBot.push(dek.pop());
        }
    }

    function letakkanKartuPertama() {
        let kartuPertama;
        do {
            kartuPertama = dek.pop();
        } while (kartuPertama.warna === 'wild');

        tumpukanBuang.push(kartuPertama);
        warnaSaatIni = kartuPertama.warna;
    }

    function tampilkanKartu(kartu) {
        const divKartu = document.createElement('div');
        divKartu.className = 'card';
        divKartu.style.backgroundImage = `url('assets/cards/${kartu.warna}_${kartu.nilai}.png')`;
        divKartu.dataset.color = kartu.warna;
        divKartu.dataset.value = kartu.nilai;
        return divKartu;
    }

    function tampilkanTangan() {
        elemenTanganPemain.innerHTML = '';
        tanganPemain.forEach(kartu => {
            const divKartu = tampilkanKartu(kartu);
            
            divKartu.addEventListener('click', () => {
                if (kartuBaruDiambil) {
                    if (kartu === kartuBaruDiambil) {
                        pemainMainKartu(kartu);
                        kartuBaruDiambil = null; 
                        tombolLewatiGiliran.classList.add('hidden'); 
                    } else {
                        perbaruiStatus("Anda hanya bisa memainkan kartu yang baru diambil atau Lewati Giliran.");
                    }
                } else {
                    pemainMainKartu(kartu);
                }
            });
            elemenTanganPemain.appendChild(divKartu);
        });

        elemenTanganBot.innerHTML = '';
        tanganBot.forEach(() => {
            const divKartu = document.createElement('div');
            divKartu.className = 'card card-back';
            elemenTanganBot.appendChild(divKartu);
        });

        elemenJumlahKartuPemain.textContent = tanganPemain.length;
        elemenJumlahKartuBot.textContent = tanganBot.length;
    }

    function tampilkanTumpukanBuang() {
        elemenTumpukanBuang.innerHTML = '';
        const kartuAtas = tumpukanBuang[tumpukanBuang.length - 1];
        if (kartuAtas) {
            const divKartu = tampilkanKartu(kartuAtas);
            divKartu.style.borderColor = warnaSaatIni;
            divKartu.style.borderWidth = '4px';
            divKartu.style.borderStyle = 'solid';
            elemenTumpukanBuang.appendChild(divKartu);
        }
    }
    
    function perbaruiTampilanSaldo() {
        elemenSaldoPemain.textContent = saldoPemain;
        elemenSaldoSidebar.textContent = saldoPemain; 
        elemenTaruhanSidebar.textContent = taruhanSaatIni;
        elemenSaldoModal.textContent = saldoPemain;
    }
    
    function apakahLangkahValid(kartu) {
        const kartuAtas = tumpukanBuang[tumpukanBuang.length - 1];
        
        if (kartu.warna === 'wild') {
            if (kartu.nilai === 'draw_four') {
                return !tanganPemain.some(k => k.warna === warnaSaatIni || k.nilai === kartuAtas.nilai);
            }
            return true;
        }
        
        return kartu.warna === warnaSaatIni || kartu.nilai === kartuAtas.nilai;
    }

    function ambilKartu(pemain) {
        if (dek.length === 0) {
            const kartuAtas = tumpukanBuang.pop();
            dek = [...tumpukanBuang];
            kocokDek(dek);
            tumpukanBuang = [kartuAtas];
            if(dek.length === 0){
                perbaruiStatus("Dek kosong, tidak bisa mengambil kartu!");
                return null;
            }
        }
        const kartu = dek.pop();
        if (pemain === 'pemain') {
            tanganPemain.push(kartu);
        } else {
            tanganBot.push(kartu);
        }
        return kartu;
    }

    function gantiGiliran() {
        pemainSaatIni = (pemainSaatIni === 'pemain') ? 'bot' : 'pemain';
        elemenDek.classList.toggle('active-turn', pemainSaatIni === 'pemain');
        kartuBaruDiambil = null; 
        tombolLewatiGiliran.classList.add('hidden'); 

        if (pemainSaatIni === 'bot') {
            setTimeout(giliranBot, 1500);
        } else {
            perbaruiStatus("Giliran Anda!");
        }
    }
    
    function perbaruiStatus(pesan) {
        elemenLogStatus.textContent = pesan;
    }

    function pemainMainKartu(kartu) {
        if (pemainSaatIni !== 'pemain' || !permainanBerlangsung) return;
        
        if (apakahLangkahValid(kartu)) {
            tanganPemain = tanganPemain.filter(k => k !== kartu);
            tumpukanBuang.push(kartu);
            
            perbaruiStatus(`Anda memainkan kartu ${kartu.warna} ${kartu.nilai}.`);
            
            tampilkanTangan();
            tampilkanTumpukanBuang();
            
            clearTimeout(timerUno);
            tombolUno.classList.add('hidden');
            
            if (tanganPemain.length === 0) {
                akhiriRonde('pemain');
                return;
            }
            if (tanganPemain.length === 1) {
                mulaiTimerUno();
            }

            terapkanEfekKartu(kartu, 'pemain');
        } else {
            perbaruiStatus("Langkah tidak valid! Coba kartu lain atau ambil dari dek.");
        }
    }

    elemenDek.addEventListener('click', () => {
        if (pemainSaatIni !== 'pemain' || !permainanBerlangsung) return;
        
        if (kartuBaruDiambil) {
            perbaruiStatus("Anda sudah mengambil kartu. Mainkan kartu yang baru diambil atau lewati giliran!");
            return;
        }

        kartuBaruDiambil = ambilKartu('pemain');
        perbaruiStatus(`Anda mengambil sebuah kartu.`);
        
        tampilkanTangan();

        const kartuAtas = tumpukanBuang[tumpukanBuang.length - 1];
        
        if (kartuBaruDiambil.warna === 'wild' || kartuBaruDiambil.warna === warnaSaatIni || kartuBaruDiambil.nilai === kartuAtas.nilai) {
             perbaruiStatus(`Kartu yang baru Anda ambil bisa dimainkan. Klik kartu tersebut atau tekan 'Lewati Giliran'.`);
             tombolLewatiGiliran.classList.remove('hidden');
        } else {
             perbaruiStatus(`Kartu tidak bisa dimainkan. Giliran beralih.`);
             kartuBaruDiambil = null;
             setTimeout(gantiGiliran, 1000);
        }
    });

    tombolLewatiGiliran.addEventListener('click', () => {
        if (pemainSaatIni !== 'pemain' || !permainanBerlangsung || !kartuBaruDiambil) return;
        
        perbaruiStatus("Anda memilih melewati giliran setelah mengambil kartu. Giliran beralih.");
        gantiGiliran();
    });

    function giliranBot() {
        if (!permainanBerlangsung) return;
        perbaruiStatus("Bot sedang berpikir...");

        const kartuAtas = tumpukanBuang[tumpukanBuang.length - 1];
        let kartuUntukDimainkan = null;

        kartuUntukDimainkan = tanganBot.find(kartu => {
            const isWildDrawFour = kartu.nilai === 'draw_four';
            const isWild = kartu.nilai === 'wild';
            
            return kartu.warna === warnaSaatIni || kartu.nilai === kartuAtas.nilai || isWild || isWildDrawFour;
        });
        
        if (kartuUntukDimainkan && kartuUntukDimainkan.nilai === 'draw_four') {
            const hasOtherValidCard = tanganBot.some(k => (k.warna === warnaSaatIni || k.nilai === kartuAtas.nilai) && k.nilai !== 'draw_four');
            if (hasOtherValidCard) {
                kartuUntukDimainkan = tanganBot.find(k => (k.warna === warnaSaatIni || k.nilai === kartuAtas.nilai) && k.nilai !== 'draw_four');
                if (!kartuUntukDimainkan) {
                    kartuUntukDimainkan = tanganBot.find(k => k.nilai === 'wild');
                }
            }
        }

        if (kartuUntukDimainkan) {
            setTimeout(() => {
                tanganBot = tanganBot.filter(k => k !== kartuUntukDimainkan);
                tumpukanBuang.push(kartuUntukDimainkan);
                
                perbaruiStatus(`Bot memainkan kartu ${kartuUntukDimainkan.warna} ${kartuUntukDimainkan.nilai}.`);
                
                tampilkanTangan();
                tampilkanTumpukanBuang();
                
                if (tanganBot.length === 0) {
                    akhiriRonde('bot');
                    return;
                }
                if (tanganBot.length === 1) {
                    perbaruiStatus("Bot memanggil UNO!");
                }
                
                terapkanEfekKartu(kartuUntukDimainkan, 'bot');
            }, 1000);
        } else {
            setTimeout(() => {
                const kartuDiambil = ambilKartu('bot');
                perbaruiStatus("Bot mengambil sebuah kartu.");
                tampilkanTangan();
                
                if(kartuDiambil && (kartuDiambil.warna === 'wild' || kartuDiambil.warna === warnaSaatIni || kartuDiambil.nilai === kartuAtas.nilai)) {
                    setTimeout(() => {
                        const index = tanganBot.indexOf(kartuDiambil);
                        if (index !== -1) {
                            tanganBot.splice(index, 1);
                            tumpukanBuang.push(kartuDiambil);
                            perbaruiStatus(`Bot memainkan kartu yang baru diambil!`);
                            tampilkanTangan();
                            tampilkanTumpukanBuang();
                            if (tanganBot.length === 0) {
                                akhiriRonde('bot');
                                return;
                            }
                            terapkanEfekKartu(kartuDiambil, 'bot');
                        } else {
                            gantiGiliran();
                        }
                    }, 1000);
                } else {
                    gantiGiliran();
                }
            }, 1000);
        }
    }
    
    function tentukanWarnaBot() {
        const jumlahWarna = tanganBot.reduce((acc, k) => {
            if (k.warna !== 'wild') acc[k.warna] = (acc[k.warna] || 0) + 1;
            return acc;
        }, { red: 0, green: 0, blue: 0, yellow: 0 });
        
        let warnaTerpilih = Object.keys(jumlahWarna).reduce((a, b) => jumlahWarna[a] > jumlahWarna[b] ? a : b, 'red');
        
        if (Object.values(jumlahWarna).every(count => count === jumlahWarna[warnaTerpilih])) {
            warnaTerpilih = tumpukanBuang[tumpukanBuang.length - 1].warna;
        }

        return warnaTerpilih;
    }

    function terapkanEfekKartu(kartu, pemain) {
        warnaSaatIni = kartu.warna;
        let lewatiGiliran = false;

        switch (kartu.nilai) {
            case 'skip':
            case 'reverse':
                perbaruiStatus(`Giliran ${pemain === 'pemain' ? 'Bot' : 'Anda'} dilewati!`);
                lewatiGiliran = true;
                break;
            case 'draw_two':
                perbaruiStatus(`${pemain === 'pemain' ? 'Bot' : 'Anda'} harus mengambil 2 kartu!`);
                ambilKartu(pemain === 'pemain' ? 'bot' : 'pemain');
                ambilKartu(pemain === 'pemain' ? 'bot' : 'pemain');
                lewatiGiliran = true;
                break;
            case 'wild':
                if (pemain === 'pemain') {
                    modalPilihWarna.classList.add('show');
                    return; 
                } else {
                    warnaSaatIni = tentukanWarnaBot();
                    perbaruiStatus(`Bot memilih warna ${warnaSaatIni}.`);
                    tampilkanTumpukanBuang();
                    setTimeout(gantiGiliran, 1000); 
                }
                return;
            case 'draw_four':
                perbaruiStatus(`${pemain === 'pemain' ? 'Bot' : 'Anda'} harus mengambil 4 kartu!`);
                for (let i = 0; i < 4; i++) ambilKartu(pemain === 'pemain' ? 'bot' : 'pemain');
                
                if (pemain === 'pemain') {
                    modalPilihWarna.classList.add('show');
                    return;
                } else {
                    warnaSaatIni = tentukanWarnaBot();
                    perbaruiStatus(`Bot memilih warna ${warnaSaatIni}.`);
                    tampilkanTumpukanBuang();
                    setTimeout(gantiGiliran, 1000); 
                }
                return;
        }

        tampilkanTangan();
        if (kartu.warna !== 'wild' && !lewatiGiliran) {
            gantiGiliran();
        } else if (kartu.warna !== 'wild' && lewatiGiliran) {
            if (pemain === 'pemain') {
                perbaruiStatus("Anda bermain lagi!");
            } else {
                setTimeout(giliranBot, 1500); 
            }
        }
    }

    kotakWarna.forEach(kotak => {
        kotak.addEventListener('click', () => {
            warnaSaatIni = kotak.dataset.color;
            perbaruiStatus(`Anda memilih warna ${warnaSaatIni}.`);
            modalPilihWarna.classList.remove('show');
            tampilkanTumpukanBuang();
            gantiGiliran();
        });
    });


    function mulaiTimerUno() {
        tombolUno.classList.remove('hidden');
        timerUno = setTimeout(() => {
            perbaruiStatus("Anda lupa memanggil UNO! Penalti: +2 kartu.");
            ambilKartu('pemain');
            ambilKartu('pemain');
            tampilkanTangan();
            tombolUno.classList.add('hidden');
        }, 5000);
    }
    
    tombolUno.addEventListener('click', () => {
        if (tanganPemain.length === 1) {
            clearTimeout(timerUno);
            perbaruiStatus("Anda memanggil UNO!");
            tombolUno.classList.add('hidden');
        }
    });

    function mulaiRonde(taruhan) {
        permainanBerlangsung = true;
        taruhanSaatIni = taruhan;
        saldoPemain -= taruhanSaatIni;
        perbaruiTampilanSaldo(); 

        dek = buatDek();
        kocokDek(dek);
        
        tanganPemain = [];
        tanganBot = [];
        tumpukanBuang = [];
        
        bagiKartu();
        letakkanKartuPertama();

        tampilkanTangan();
        tampilkanTumpukanBuang();
        
        modalTaruhan.classList.remove('show');
        
        const kartuPertama = tumpukanBuang[0];
        
        if (['skip', 'reverse', 'draw_two'].includes(kartuPertama.nilai)) {
            perbaruiStatus(`Kartu pertama adalah kartu aksi! Giliran pertama Bot dilewati/Bot ambil kartu.`);
            terapkanEfekKartu(kartuPertama, 'bot'); 
        } else {
            pemainSaatIni = 'pemain';
            elemenDek.classList.add('active-turn');
            perbaruiStatus("Giliran Anda untuk main!");
        }
    }

    function akhiriRonde(pemenang) {
        permainanBerlangsung = false;
        clearTimeout(timerUno);
        
        const judulNotifikasi = document.getElementById('notification-title');
        const pesanNotifikasi = document.getElementById('notification-message');

        if (pemenang === 'pemain') {
            saldoPemain += taruhanSaatIni * 2;
            judulNotifikasi.textContent = "Anda Menang!";
            pesanNotifikasi.textContent = `Anda memenangkan $${taruhanSaatIni}. Saldo baru Anda $${saldoPemain}.`;
        } else {
            judulNotifikasi.textContent = "Anda Kalah!";
            pesanNotifikasi.textContent = `Anda kehilangan $${taruhanSaatIni}. Saldo Anda $${saldoPemain}.`;
        }
        
        perbaruiTampilanSaldo();
        
        if (saldoPemain <= 0) {
            setTimeout(permainanSelesai, 2000);
        } else {
            modalNotifikasi.classList.add('show');
            tombolRondeBerikutnya.classList.remove('hidden');
            tombolMulaiUlang.classList.add('hidden');
        }
    } 
    
    function permainanSelesai() {
        const judulNotifikasi = document.getElementById('notification-title');
        const pesanNotifikasi = document.getElementById('notification-message');
        
        judulNotifikasi.textContent = "Permainan Selesai!";
        pesanNotifikasi.textContent = "Uang Anda telah habis. Mulai ulang untuk bermain lagi.";
        
        tombolRondeBerikutnya.classList.add('hidden');
        tombolMulaiUlang.classList.remove('hidden');
        modalNotifikasi.classList.add('show');
    }
    
    function aturUlangPermainan() {
        saldoPemain = 5000;
        taruhanSaatIni = 0;
        perbaruiTampilanSaldo();
        modalNotifikasi.classList.remove('show');
        modalTaruhan.classList.add('show');
    }
    
    tombolMulaiRonde.addEventListener('click', () => {
        const taruhan = parseInt(inputJumlahTaruhan.value);
        if (taruhan >= 100 && taruhan <= saldoPemain) {
            mulaiRonde(taruhan);
        } else {
            console.error('Jumlah taruhan tidak valid. Harus antara $100 dan saldo Anda saat ini.');
        }
    });

    tombolRondeBerikutnya.addEventListener('click', () => {
        modalNotifikasi.classList.remove('show');
        modalTaruhan.classList.add('show');
    });

    tombolMulaiUlang.addEventListener('click', aturUlangPermainan);
    
    perbaruiTampilanSaldo();
    tombolUno.classList.add('hidden');
    tombolLewatiGiliran.classList.add('hidden');
});