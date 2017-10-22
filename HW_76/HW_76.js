var theMonthUtils = (function () {
    'use strict';

    var months = ['January', 'February', 'March', 'April', 'May', 'June', 'July', 'August', 
                'September', 'October', 'November', 'December'];
    
    function getMonthName (number){
        return months[number - 1];
    }

    function getMonthNumber (name){
        for (var i = 0; i < months.length; i++) {
            if (months[i] === name) {
                return i + 1;
            }
        }
        return "No such Month";
    }

    return {
        getMonthName: getMonthName,
        getMonthNumber: getMonthNumber
    };
}());

console.log("theMonthUtils.getMonthName(12)", theMonthUtils.getMonthName(12));
console.log('theMonthUtils.getMonthNumber("May")', theMonthUtils.getMonthNumber("May"));

/////////////////////////////////////////////////////////////////////////////////////////////////

var interestCalculator = (function(){
    'use strict';
    
    var rate = '.03';
    var years = 30;

    function setRate(rateInput){
        rate = rateInput;
    }

    function setYears(yearsInput){
        years = yearsInput;
    }

    function calculateInterest(loanAmount){
        return (loanAmount * rate) * years;
    }

    return {
        setRate: setRate,
        setYears: setYears,
        calculateInterest: calculateInterest
    };

}());

interestCalculator.setRate('.035');
interestCalculator.setYears(10);

console.log("interestCalculator.setRate('.035') interestCalculator.setYears(10)", 
            "interestCalculator.calculateInterest(400000)", interestCalculator.calculateInterest(400000));


