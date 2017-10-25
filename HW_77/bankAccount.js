function addInterest(rate){
    "use strict";
    return this.balance += this.balance * (rate / 100);
}

var account1 = {
    name: "Jon Doe",
    balance: 1000,
    addInterest: addInterest
};

var account2 = {
    name: "Bob Smith",
    balance: 500,
    addInterest: addInterest
};

console.log("starting balance:", account1.balance, "interest: 10%  ending balance:", addInterest.call(account1, 10));
console.log("starting balance:", account2.balance, "interest: 5%  ending balance:", addInterest.call(account2, 5));