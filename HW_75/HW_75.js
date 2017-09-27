var letters = ['A', 'B', 'c'];
var upperLetters = ['A', 'B', 'A'];
var lowerLetters = ['a', 'b', 'c'];

function isUppercase(letter){
    return letter === letter.toUpperCase();
}

function isLowercase(letter){
    return letter === letter.toLowerCase();
}

function mySome(array, callback){
    for (var i = 0; i < array.length; i++) {
        if(callback(array[i])){
            return true;
        }
    }
    return false;
}

console.log('letters, isUppercase', mySome(letters, isUppercase));
console.log('letters, isUppercase', letters.some(isUppercase));
console.log('letters, isLowercase', mySome(letters, isLowercase));
console.log('letters, isLowercase', letters.some(isLowercase));
console.log('upperLetters, isUppercase', mySome(upperLetters, isUppercase));
console.log('upperLetters, isUppercase', upperLetters.some(isUppercase));
console.log('upperLetters, isLowercase', mySome(upperLetters, isLowercase));
console.log('upperLetters, isLowercase', upperLetters.some(isLowercase));
console.log('lowerLetters, isUppercase', mySome(lowerLetters, isUppercase));
console.log('lowerLetters, isUppercase', lowerLetters.some(isUppercase));
console.log('lowerLetters, isLowercase', mySome(lowerLetters, isLowercase));
console.log('lowerLetters, isLowercase', lowerLetters.some(isLowercase)); 

///////////////////////////////////////////////////////////////////////////////////////

var numbers = [10, 101, 300, 4000];

function greaterThan100(number){
    return number > 100;
}
function print(thing){
    console.log(thing);
}
function onlyIf(array, test, action){
    array.filter(test).forEach(action); 
}
onlyIf(numbers, greaterThan100, print);

