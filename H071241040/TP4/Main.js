document.addEventListener('DOMContentLoaded', () => {
  /* ============================================
   *  #1. SELECTOR RINGKAS & AMBIL ELEMEN DOM
   * ============================================ */
  const $ = id => document.getElementById(id);

  // --- Elemen utama papan/gim
  const playerHandEl   = $('player-hand');
  const botHandEl      = $('bot-hand');
  const discardPileEl  = $('discard-pile');
  const deckPileEl     = $('deck-pile');
  const unoBtn         = $('uno-btn');
  const colorPickerModal = $('color-picker-modal');
  const gameBoardEl    = $('board'); // container papan

  // --- Elemen sidebar
  const logEl             = $('log-area');
  const playerBalanceEl   = $('player-balance');
  const currentBetEl      = $('current-bet');
  const betAmountSideInput= $('bet-amount-side');
  const startRoundBtn     = $('start-round-btn');

  // --- Modal Game Over
  const gameOverScreenEl  = $('game-over-screen');
  const restartGameBtn    = $('restart-game-btn');

  /* ============================================
   *  #2. KONSTANTA, STATE, & FLAG
   * ============================================ */
  // Peran & timing
  const PLAYER = 'player', BOT = 'bot';
  const DELAY = { bot: 1000, afterDraw: 750, afterColor: 1000, chain: 800 };

  // Kartu & nilai
  const COLORS  = ['red','green','blue','yellow'];
  const VALUES  = ['0','1','2','3','4','5','6','7','8','9'];
  const ACTIONS = ['skip','reverse','plus2'];

  // State permainan
  let deck = [];           // tumpukan kartu tertutup
  let playerHand = [];     // kartu di tangan player
  let botHand = [];        // kartu di tangan bot
  let discardPile = [];    // tumpukan buangan (kartu terbuka / top card di akhir array)

  // State giliran & ekonomi
  let currentPlayer = PLAYER;
  let playerBalance = parseInt(localStorage.getItem('unoPlayerBalance') || 5000, 10);
  let currentBet = 0;

  // Timer/flag UNO & aksi ambil
  let unoCallTimer = null;   // timer batas tekan UNO (player)
  let botUnoTimer = null;    // timer kesempatan panggil UNO lawan
  let unoBtnMode = '';       // 'self' | 'callBot' | ''
  let justDrewPlayable = false; // true jika baru ambil kartu & bisa dimainkan
  let drawingLock = false;      // cegah double-klik draw


  function clearBoard() {
  deck = []; playerHand = []; botHand = []; discardPile = [];
  playerHandEl.replaceChildren();
  botHandEl.replaceChildren();
  discardPileEl.replaceChildren();

  // buang kelas indikator warna
  gameBoardEl.classList.remove(
    'active-color-red','active-color-green','active-color-blue','active-color-yellow'
  );
}

  /* ============================================
   *  #3. BLOK LOG / AKTIVITAS (UI LOG)
   *  - Semua pesan status lewat setNote/appendLog
   * ============================================ */
  function appendLog(text) {
    if (!logEl) return;
    const row = document.createElement('div');
    row.className = 'item';
    const ts = new Date().toLocaleTimeString();
    row.textContent = `[${ts}] ${text}`;
    logEl.appendChild(row);
    logEl.scrollTop = logEl.scrollHeight;
  }
  const setNote = (t) => { appendLog(t); }; 

  /* ============================================
   *  #4. BLOK UTIL KARTU (AKSES TOP, KECOKOKAN)
   * ============================================ */
  // Ambil kartu paling atas dari discard pile (kartu aktif)
  const topCard = () => discardPile[discardPile.length - 1];

  // Cek kecocokan warna/nilai sesuai aturan UNO dasar
  const matchTop = (c, tc) => c.color === tc.color || c.value === tc.value;

  // Resolusi gambar kartu → pastikan nama file sesuai folder /assets
  function getCardImageSrc(card) {
    if (card.value === 'wild')       return 'assets/wild.png';
    if (card.value === 'wild_plus4') return 'assets/plus_4.png';
    return `assets/${card.color}_${card.value}.png`;
  }

  /* ============================================
   *  #5. BLOK DECK (SHUFFLE, REFILL, CREATE)
   * ============================================ */
  // Fisher-Yates shuffle
  function shuffleDeck(a) {
    for (let i = a.length - 1; i > 0; i--) {
      const j = Math.floor(Math.random() * (i + 1));
      [a[i], a[j]] = [a[j], a[i]];
    }
  }

  // Pastikan deck tersedia: jika habis, reshuffle dari discard kecuali top
  function ensureDeck() {
    if (deck.length) return;
    if (discardPile.length <= 1) return; // tak bisa reshuffle jika cuma 1 kartu
    const keepTop = discardPile.pop();
    deck = [...discardPile];
    shuffleDeck(deck);
    discardPile = [keepTop];
  }

  // Buat deck UNO standar 108 kartu
  // function createDeck() {
  //   deck = [];
  //   // 4 warna
  //   COLORS.forEach(color => {
  //     deck.push({ color, value: '0' }); // 1x nol
  //     for (const v of ['1','2','3','4','5','6','7','8','9']) {
  //       deck.push({ color, value: v }, { color, value: v }); // 2x 1–9
  //     }
  //     for (const a of ['skip','reverse','plus2']) {
  //       deck.push({ color, value: a }, { color, value: a }); // 2x aksi
  //     }
  //   });
  //   // 4x wild & 4x wild+4
  //   for (let i = 0; i < 4; i++) {
  //     deck.push({ color: 'black', value: 'wild' });
  //     deck.push({ color: 'black', value: 'wild_plus4' });
  //   }
  // }
  function createDeck() {
  deck = [];
  // 4 warna: 1 kopi setiap angka & aksi
  COLORS.forEach(color => {
    deck.push({ color, value: '0' });
    for (const v of VALUES.filter(x => x !== '0')) {
      deck.push({ color, value: v });
    }
    for (const a of ACTIONS) {
      deck.push({ color, value: a });
    }
  });
  // Wild: 1 kopi masing-masing
  deck.push({ color:'black', value:'wild' });
  deck.push({ color:'black', value:'wild_plus4' });
}


  /* ============================================
   *  #6. BLOK DEAL & RENDER (TAMPILAN)
   * ============================================ */
  // Bagi 7 kartu ke masing-masing pemain + tarik kartu awal (bukan wild)
  function dealCards() {
    for (let i = 0; i < 7; i++) { // PATCH: 7
      playerHand.push(deck.pop());
      botHand.push(deck.pop());
    }
    let first = deck.pop();
    while (first.value === 'wild' || first.value === 'wild_plus4') {
      deck.push(first);
      shuffleDeck(deck);
      first = deck.pop();
    }
    discardPile.push(first);
  }

  // Indikator warna aktif (ubah background board)
  function updateActiveColorIndicator() {
    gameBoardEl.classList.remove(
      'active-color-red','active-color-green','active-color-blue','active-color-yellow'
    );
    const tc = topCard();
    if (tc && tc.color !== 'black') gameBoardEl.classList.add(`active-color-${tc.color}`);
  }

  // Render satu tangan (player/bot)
  function renderHand(container, hand, faceUp) {
    const frag = document.createDocumentFragment();
    hand.forEach(card => {
      const img = document.createElement('img');
      img.src = faceUp ? getCardImageSrc(card) : 'assets/card_back.png';
      img.className = 'card';
      if (faceUp) {
        img.dataset.color = card.color;
        img.dataset.value = card.value;
        if (currentPlayer === PLAYER && !isCardPlayable(card)) {
          img.classList.add('unplayable');
        }
      }
      frag.appendChild(img);
    });
    container.replaceChildren(frag);
    container.classList.toggle('too-many', hand.length > 13); // kecilkan otomatis jika banyak
  }

  // Render keseluruhan papan
  function renderGame() {
    renderHand(playerHandEl, playerHand, true);
    renderHand(botHandEl,    botHand,    false);
    const img = document.createElement('img');
    img.src = getCardImageSrc(topCard());
    img.className = 'card';
    discardPileEl.replaceChildren(img);
    updateActiveColorIndicator();
  }

  /* ============================================
   *  #7. BLOK RULES (BOLEH MAIN? AMBIL KARTU? MENANG?)
   * ============================================ */
  // Apakah kartu boleh dimainkan?
  function isCardPlayable(card) {
    const tc = topCard();
    if (card.color === 'black') {
      // Wild +4 hanya sah jika player tidak punya kartu yang match
      if (card.value === 'wild_plus4') return !playerHand.some(c => matchTop(c, tc));
      return true; // Wild biasa selalu sah
    }
    return matchTop(card, tc);
  }

  // Ambil kartu dari deck (dengan refill otomatis)
  function drawCard(player, amount = 1) {
    for (let i = 0; i < amount; i++) {
      ensureDeck();
      if (!deck.length) { setNote('Kartu di deck dan discard pile habis!'); return; }
      const d = deck.pop();
      if (player === PLAYER) playerHand.push(d); else botHand.push(d);
    }
  }

  // Cek kondisi menang (habis kartu)
  function checkWinCondition() {
    if (!playerHand.length) { endRound(PLAYER); return true; }
    if (!botHand.length)    { endRound(BOT);    return true; }
    return false;
  }

  /* ============================================
   *  #8. BLOK BOT (HEURISTIK)
   * ============================================ */
  // Pilih warna terbaik untuk bot (warna yang paling banyak di tangannya)
  function botBestColor() {
    const count = { red:0, green:0, blue:0, yellow:0 };
    for (const c of botHand) if (count[c.color] != null) count[c.color]++;
    let best = 'red', bestN = -1;
    for (const k of COLORS) if (count[k] > bestN) { bestN = count[k]; best = k; }
    return best;
  }

  // Cari indeks kartu bot yang playable (prioritaskan match, lalu wild, lalu +4 jika perlu)
  function findBotPlayable(tc) {
    let i = botHand.findIndex(c => matchTop(c, tc));
    if (i === -1) i = botHand.findIndex(c => c.color === 'black' && c.value === 'wild');
    const w4 = botHand.findIndex(c => c.value === 'wild_plus4');
    if (w4 !== -1 && !botHand.some(c => matchTop(c, tc))) i = w4;
    return i;
  }

  /* ============================================
   *  #9. BLOK ENGINE GILIRAN (EFEK KARTU, SWITCH TURN)
   * ============================================ */
  // Terapkan efek kartu yang baru dimainkan, atur giliran berikutnya
  function handleCardAction(card, player) {
    if (checkWinCondition()) return;

    // Reset status & timer tombol UNO (selalu clear saat ada aksi kartu)
    if (unoCallTimer) clearTimeout(unoCallTimer);
    if (botUnoTimer)  clearTimeout(botUnoTimer);
    unoBtn.classList.add('hidden'); 
    unoBtnMode = '';

    // Siapkan tombol UNO (player) jika tinggal 1 kartu
    if (player === PLAYER && playerHand.length === 1) {
      unoBtn.textContent = 'UNO!';
      unoBtn.classList.remove('hidden');
      unoBtnMode = 'self';
      unoCallTimer = setTimeout(() => {
        setNote('Anda lupa tekan UNO! Ambil 2 kartu.');
        drawCard(PLAYER, 2);
        unoBtn.classList.add('hidden'); 
        unoBtnMode = '';
        renderGame();
      }, 5000);
    }

    // Efek & giliran
    let switchTurns = true;
    const target = player === PLAYER ? BOT : PLAYER;

    switch (card.value) {
      case 'plus2':
        drawCard(target, 2);
        setNote('Lawan diskip.');
        switchTurns = false;
        break;
      case 'skip':
      case 'reverse':
        setNote('Lawan diskip.');
        switchTurns = false;
        break;
      case 'wild':
        if (player === PLAYER) { colorPickerModal.classList.add('active'); return; }
        card.color = botBestColor();
        setNote(`Bot memilih warna ${card.color}.`);
        break;
      case 'wild_plus4':
        drawCard(target, 4);
        if (player === PLAYER) { colorPickerModal.classList.add('active'); return; }
        card.color = botBestColor();
        setNote(`Bot memilih warna ${card.color} dan Anda ambil 4 kartu!`);
        switchTurns = false;
        break;
    }

    renderGame();

    // PATCH: Jika BOT baru saja menjadi sisa 1 kartu → beri pemain kesempatan 5 detik untuk "Panggil UNO Bot!"
    if (player === BOT && botHand.length === 1) {
      unoBtn.textContent = 'Panggil UNO Bot!';
      unoBtn.classList.remove('hidden');
      unoBtnMode = 'callBot';
      botUnoTimer = setTimeout(() => {
        // waktu habis, pemain tidak memanggil: bot lolos
        unoBtn.classList.add('hidden');
        unoBtnMode = '';
        appendLog('Bot lolos tanpa dipanggil UNO.');
      }, 5000);
    }

    if (switchTurns) {
      // Ganti giliran biasa
      switchTurn();
    } else {
      // Efek “skip/plus4/plus2” → tetap di pemain yang sama setelah delay
      setTimeout(() => {
        if (currentPlayer === PLAYER) {
          setNote('Giliran Anda lagi!');
          renderGame();
        } else {
          botTurn();
        }
      }, DELAY.chain);
    }
  }

  // Ganti giliran: player <-> bot, cetak status, trigger bot jika perlu
  function switchTurn() {
    currentPlayer = (currentPlayer === PLAYER) ? BOT : PLAYER;
    justDrewPlayable = false;
    renderGame();

    setNote(currentPlayer === PLAYER ? 'Giliran Anda!' : 'Giliran Bot...');
    if (currentPlayer === BOT) botTurn();
  }

  // Proses giliran bot (tunda sedikit → terasa "berpikir")
  function botTurn() {
    setTimeout(() => {
      const tc  = topCard();
      const idx = findBotPlayable(tc);

      if (idx !== -1) {
        const played = botHand.splice(idx, 1)[0];
        discardPile.push(played);
        appendLog(`Bot memainkan ${played.color} ${played.value}.`);
        handleCardAction(played, BOT);
      } else {
        drawCard(BOT);
        appendLog('Bot mengambil kartu.');
        setNote('Bot mengambil kartu.');
        switchTurn();
      }
    }, DELAY.bot);
  }

  /* ============================================
   *  #10. BLOK AKSI PEMAIN (CLICK KARTU & DRAW)
   * ============================================ */
  // Player klik kartu di tangan → coba mainkan
  function playerPlayCard(e) {
    if (currentPlayer !== PLAYER) return;
    const el = e.target;
    if (!el.classList.contains('card') || el.classList.contains('unplayable')) return;

    const { color, value } = el.dataset;
    const i = playerHand.findIndex(c => c.color === color && c.value === value);
    if (i < 0) return;

    justDrewPlayable = false;
    const played = playerHand.splice(i, 1)[0];
    discardPile.push(played);
    appendLog(`Anda memainkan ${played.color} ${played.value}.`);
    handleCardAction(played, PLAYER);
  }

  // Player klik deck → ambil kartu / lewati jika barusan ambil kartu layak main
  function onClickDeck() {
    if (currentPlayer !== PLAYER || drawingLock) return;

    // Jika barusan ambil & kartu bisa dimainkan, klik deck = lewati
    if (justDrewPlayable) {
      justDrewPlayable = false;
      setNote('Lewati giliran.');
      switchTurn();
      return;
    }

    drawingLock = true;
    drawCard(PLAYER);
    const last = playerHand[playerHand.length - 1];
    renderGame();

    if (last && isCardPlayable(last)) {
      justDrewPlayable = true;
      setNote('Kartu yang diambil bisa dimainkan. Klik kartunya untuk main. Klik deck lagi untuk melewati.');
      drawingLock = false;
      return;
    }

    setNote('Anda mengambil kartu.');
    setTimeout(() => { drawingLock = false; switchTurn(); }, DELAY.afterDraw);
  }

  /* ============================================
   *  #11. BLOK END ROUND & START ROUND
   * ============================================ */
  // Selesaikan ronde: update saldo, tampilkan modal jika habis
  function endRound(winner) {
    if (winner === PLAYER) {
      playerBalance += currentBet;
      appendLog(`Anda menang ronde ini (+$${currentBet}).`);
      alert(`Selamat! Anda memenangkan ronde ini dan mendapat $${currentBet}.`);
    } else {
      playerBalance -= currentBet;
      appendLog(`Anda kalah ronde ini (-$${currentBet}).`);
      alert(`Sayang sekali! Anda kalah dan kehilangan $${currentBet}.`);
    }
    localStorage.setItem('unoPlayerBalance', playerBalance);
    playerBalanceEl.textContent = `$${playerBalance}`;
    if (playerBalance <= 0) gameOverScreenEl.classList.add('active');
    if (unoCallTimer) clearTimeout(unoCallTimer);
  if (botUnoTimer)  clearTimeout(botUnoTimer);
  unoBtn.classList.add('hidden'); 
  unoBtnMode = '';

  if (playerBalance > 0) {
    clearBoard();                           // reset visual papan
    currentBet = 0; currentBetEl.textContent = '$0';
    appendLog('Ronde selesai. Klik "Mulai Ronde" untuk lanjut.');
  } else {
    gameOverScreenEl.classList.add('active');
  }
}

  // Mulai ronde baru: validasi bet, reset state, deal, render
  function startGame() {
    const betVal   = betAmountSideInput ? betAmountSideInput.value : '100';
    const betValue = parseInt(betVal, 10);
    if (isNaN(betValue) || betValue < 100 || betValue > playerBalance) {
      alert('Nilai taruhan tidak valid!');
      return;
    }

    currentBet = betValue;
    currentBetEl.textContent = `$${currentBet}`;
    appendLog(`Ronde baru dimulai. Taruhan: $${currentBet}.`);

    // Reset state
    deck = []; playerHand = []; botHand = []; discardPile = [];
    currentPlayer = PLAYER; justDrewPlayable = false; unoBtnMode = '';
    if (unoCallTimer) clearTimeout(unoCallTimer);
    if (botUnoTimer)  clearTimeout(botUnoTimer);
    unoBtn.classList.add('hidden');

    // Buat & bagi
    createDeck(); shuffleDeck(deck); dealCards(); renderGame();

    const tc = topCard();
    appendLog(`Kartu awal: ${tc.color} ${tc.value}.`);
    setNote('Giliran Anda!');
  }

  /* ============================================
   *  #12. BLOK EVENT LISTENERS (DOM)
   * ============================================ */
  // Klik kartu di tangan player
  playerHandEl.addEventListener('click', playerPlayCard);

  // Klik deck (ambil / lewati)
  deckPileEl.addEventListener('click', onClickDeck);

  // PATCH: Klik tombol UNO (mode self / callBot)
  unoBtn.addEventListener('click', () => {
    if (unoBtnMode === 'self') {
      // Pemain deklarasi UNO tepat waktu
      if (unoCallTimer) clearTimeout(unoCallTimer);
      unoBtn.classList.add('hidden');
      unoBtnMode = '';
      appendLog('Anda menekan UNO tepat waktu.');
    } else if (unoBtnMode === 'callBot') {
      // Pemain memanggil UNO pada Bot (bot kena +2)
      if (botUnoTimer) clearTimeout(botUnoTimer);
      drawCard(BOT, 2);
      unoBtn.classList.add('hidden');
      unoBtnMode = '';
      appendLog('Anda memanggil UNO pada Bot. Bot kena +2.');
      renderGame();
    }
  });

  // Pilih warna wild melalui modal
  document.querySelector('.color-options').addEventListener('click', e => {
    if (!e.target.classList.contains('color-box')) return;
    topCard().color = e.target.dataset.color;
    colorPickerModal.classList.remove('active');
    setNote(`Anda memilih warna ${topCard().color}.`);
    renderGame();

    // Wild +4: tetap giliran pemakai; Wild biasa: ganti giliran
    if (topCard().value === 'wild_plus4') {
      setTimeout(() => { setNote('Giliran Anda lagi!'); renderGame(); }, DELAY.afterColor);
    } else {
      setTimeout(switchTurn, DELAY.afterColor);
    }
  });

  // Tombol sidebar: mulai ronde
  startRoundBtn.addEventListener('click', startGame);

  // Restart setelah game over
  restartGameBtn.addEventListener('click', () => {
    playerBalance = 5000;
    localStorage.setItem('unoPlayerBalance', playerBalance);
    playerBalanceEl.textContent = `$${playerBalance}`;
    currentBet = 0; currentBetEl.textContent = '$0';
    gameOverScreenEl.classList.remove('active');
    appendLog('Saldo direset ke $5000.');
  });

  /* ============================================
   *  #13. BLOK INIT (ATUR NILAI AWAL UI)
   * ============================================ */
  playerBalanceEl.textContent = `$${playerBalance}`;
  currentBetEl.textContent    = `$${currentBet}`;
  appendLog('Selamat datang! Tekan "Mulai Ronde" untuk bermain.');
});
