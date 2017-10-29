var staticCounter = app.counter;
var newCounter1 = app.createCounter.getNewCounter();
var newCounter2 = app.createCounter.getNewCounter();

for (var i = 0; i < 15; i++) {
    if(i < 5){
        newCounter1.incrementCurrentCount();
    }
    if(i < 10){
        staticCounter.incrementCurrentCount();
    }
    newCounter2.incrementCurrentCount();  
}

console.log("staticCounter.getCurrentCount()", staticCounter.getCurrentCount());
console.log("newCounter1.getCurrentCount()", newCounter1.getCurrentCount());
console.log("newCounter2.getCurrentCount()", newCounter2.getCurrentCount());

app.createCounter.printNumOfCountersCreated();