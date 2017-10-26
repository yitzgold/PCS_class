var app = app || {};

app.counter = (function (counter) {
    "use strict";

    var currentCount = 0;
    
    counter.getCurrentCount = function(){
        return currentCount;
    };

    counter.incrementCurrentCount = function(){
        currentCount ++;
    };

    return counter;
}({}));

console.log(app.counter.getCurrentCount());
app.counter.incrementCurrentCount();
console.log(app.counter.getCurrentCount());