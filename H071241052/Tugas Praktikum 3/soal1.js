function countEvenNumbers(start, end) {
    const evens = [];
    for (let i = start; i <= end; i++) {
        if (i % 2 === 0) {
            evens.push(i)
        }
    }
    console.log(`Output: ${evens.length} [${evens.join(", ")}]`);
    return evens.length;

}

countEvenNumbers(1, 10);
// module.exports = countEvenNumbers;


// Contoh pemanggilan manual:
// countEvenNumbers(1, 10);
// console.log(countEvenNumbers(1,10)) 