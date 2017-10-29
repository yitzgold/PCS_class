var app = app || {};

app.createCounter = (function () {
    "use strict";

    var numOfCountersCreated = 0;

    return{
        getNewCounter: function (){
            numOfCountersCreated++;
            var currentCount = 0;

            return{
                getCurrentCount: function(){
                    return currentCount;
                },
                incrementCurrentCount: function(){
                    currentCount++;
                }  
            };   
        },
        printNumOfCountersCreated: function (){
            console.log("Number of counters created:", numOfCountersCreated);
        }
    };
}());