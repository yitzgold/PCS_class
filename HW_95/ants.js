(function () {
    "use strict";

    var canvas = document.getElementById("theCanvas"),
        context = canvas.getContext('2d'),
        numOfAnts = 1000,
        colorpicker = document.getElementById('antColor'),
        addedAnts = document.getElementById('addedAnts'),
        ants = [];

    canvas.width = window.innerWidth;
    canvas.height = window.innerHeight;

    function getRandomNumberBetween(min, max) {
        return Math.floor(Math.random() * (max - min + 1) + min);
    }

    class Ant {
        constructor() {
            this.color = "black";
            this.x = canvas.width / 2;
            this.y = canvas.height / 2;
            this.changeDirection = true;
        }

        move() {
            if (this.changeDirection) {
                this.changeDirection = false;
                this.numOfSameDirection = getRandomNumberBetween(5, 10);
                while (true) {
                    this.xDirection = getRandomNumberBetween(-1, 1);
                    this.yDirection = getRandomNumberBetween(-1, 1);
                    if (this.xDirection !== 0 || this.yDirection !== 0) {
                        break;
                    }
                }
            }

            if (this.x < 0 || this.x > canvas.width || this.y < 0 || this.y > canvas.height) {
                this.x = canvas.width / 2;
                this.y = canvas.height / 2;
            }

            if (--this.numOfSameDirection === 0) {
                this.changeDirection = true;
            }

            this.x += this.xDirection;
            this.y += this.yDirection;
            context.fillStyle = this.color;
            context.fillRect(this.x, this.y, 2, 2);
        }
    }

    for (var i = 0; i < numOfAnts; i++) {
        ants.push(new Ant());
    }

    document.getElementById('addAnts').addEventListener('click',
        () => {
            for (var i = 0; i < addedAnts.value; i++) {
                var ant = new Ant();
                ant.color = colorpicker.value;
                ants.push(ant);
            }
        });

    setInterval(() => {
        context.clearRect(0, 0, canvas.width, canvas.height);
        ants.forEach(ant => ant.move());
    }, 100);
}());