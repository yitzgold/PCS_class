var mapUtils = (function(){
    "use strict";

    var numbers = [2,4,6];

    function doubleIt(num){
        return num * 2;
    }

    function myMap(array, callback){
        var doubledArray = [];
        for (var i = 0; i < array.length; i++) {
            doubledArray[i] = callback(array[i]); 
        }
        return doubledArray;
    }

    function getNumsArray(){
        return numbers;
    }

    return{
        doubleIt: doubleIt,
        myMap: myMap,
        getNumsArray: getNumsArray
    };
}());

console.log("New Array:", mapUtils.myMap(mapUtils.getNumsArray(), mapUtils.doubleIt ));
console.log("Original Array:", mapUtils.getNumsArray());