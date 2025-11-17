function countNumbers(start, end) {
  let count = 0; 
  const Numbers = []; 
  for (let i = start; i <= end; i++) {
    if (i % 2 === 0) {
      count++; 
      Numbers.push(i);
    }
  }


  console.log(`Output: ${count} [${Numbers.join(', ')}]`);
  return count;
}

countNumbers(1,10);