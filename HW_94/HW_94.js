"use strict";

function Vehicle(color) {
    this.color = color;
    this.go = function (speed) {
        this.speed = speed;
        console.log("now going at speed " + this.speed);
    };
}

Vehicle.prototype.print = function () {
    console.log("color: " + this.color);
    console.log("current speed: " + this.speed);
};

function Plane(color) {
    Vehicle.call(this, color);
    this.go = function (speed) {
        this.speed = speed;
        console.log("now flying at speed " + this.speed);
    };
}

Plane.prototype = Object.create(Vehicle.prototype);

var car = new Vehicle("red");
car.go(100);
car.print();

var plane = new Plane("white");
plane.go(500);
plane.print();