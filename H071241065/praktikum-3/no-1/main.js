function countEvenNumber(start, end) {
  const num = [];

  for (let i = start; i <= end; i++) {
    if (i % 2 == 0) {
      num.push(i);
    }
  }

  const panjang = num.length;

  console.log(panjang, num);
}

countEvenNumber(1, 7);
