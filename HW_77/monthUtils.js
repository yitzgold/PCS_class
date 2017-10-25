var myApp = myApp || {};

myApp.utils = (function (utils) {
    "use strict";

    var months = ['January', 'February', 'March', 'April', 'May', 'June', 'July', 'August', 
                  'September', 'October', 'November', 'December'];

    utils.getMonthName = function (number){
    return months[number - 1];
    };

    utils.getMonthNumber = function (name){    
        for (var i = 0; i < months.length; i++) {
            if (months[i] === name) {
                return i + 1;
            }
        }
        return -1;
    };

    return utils;

}(myApp.utils || {}));

//console.log(myApp.utils);
console.log("myApp.utils.getMonthName(12)", myApp.utils.getMonthName(12));
console.log('myApp.utils.getMonthNumber("May")', myApp.utils.getMonthNumber("May"));