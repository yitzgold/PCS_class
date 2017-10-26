var app = app || {};

function counterObj(){
    "use strict";
    return{
        currentCount: 0,
        getCurrentCount: function(){
            return this.currentCount;
        },
        incrementCurrentCount: function(){
            this.currentCount ++;
        }
    };
}

app.createCounter = (function (createCounter) {
    "use strict";

    var currentCount = 0;
    createCounter.currentCount = currentCount;
    
    counter.getCurrentCount = function(){
        return currentCount;
    };

    counter.incrementCurrentCount = function(){
        currentCount ++;
    };

    return createCounter;
}({}));

console.log(app.counter.getCurrentCount());
app.counter.incrementCurrentCount();
console.log(app.counter.getCurrentCount());

































