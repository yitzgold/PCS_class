var app = app || {};

app.counter = (function() {
    "use strict";

    var currentCount = 0;

    return{
        getCurrentCount: function(){
            return currentCount;
        },

        incrementCurrentCount: function(){
            currentCount++;
        }
    };
}());