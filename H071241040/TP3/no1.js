function countEvenNumbers(a, b){
    if(typeof a === 'number' && typeof b === 'number'){
    let result = [];
    for(let i=a ; i <= b; i++){
        if (i % 2 === 0){
            result.push(i)
        }
    }
    console.log(result.length, result)
}
else{
    console.log("Inputan tidak cocok");
    
}
}

countEvenNumbers(1,10)