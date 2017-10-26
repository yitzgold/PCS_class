function doubleIt(num){
    return num *2;
}
var numbers = [2,4,6];
var doubledArray = [];
function myMap(array, callback){
    
    for (var i = 0; i < array.length; i++) {
        doubledArray[i] = callback(array[i]); 
    }
}

myMap(numbers, doubleIt);
console.log(numbers);
console.log(doubledArray);






























