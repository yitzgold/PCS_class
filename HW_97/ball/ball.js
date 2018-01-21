/* global $ */
(function () {
    "use strict";

    var canvas = $("#theCanvas")[0],
        context = canvas.getContext('2d'),
        ballX = 51,
        ballY = 51,
        xIncrement = 3,
        yIncrement = 3,
        radius = 50;

    canvas.width = window.innerWidth - 10;
    canvas.height = window.innerHeight - 10;

    function getRandomNumberBetween(min, max) {
        return Math.floor(Math.random() * (max - min + 1) + min);
    }

    function checkForCollision() {
        if ((xIncrement < 0 && ballX < (radius - xIncrement)) ||
            (xIncrement > 0 && ballX > (canvas.width - xIncrement) - radius) ||
            (yIncrement < 0 && ballY < (radius - yIncrement)) ||
            (yIncrement > 0 && ballY > (canvas.height - yIncrement) - radius)) {
            while (true) {
                xIncrement = getRandomNumberBetween(xIncrement < 0 ? 1 : -6, xIncrement > 0 ? 0 : 6);
                yIncrement = getRandomNumberBetween(yIncrement < 0 ? 1 : -6, yIncrement > 0 ? 0 : 6);
                if (xIncrement !== 0 || yIncrement !== 0) {
                    break;
                }
            }
        }
    }

    setInterval(() => {
        context.beginPath();
        context.clearRect(ballX - radius - 1, ballY - radius - 1, radius * 2 + 2, radius * 2 + 2);
        context.closePath();

        ballX += xIncrement;
        ballY += yIncrement;

        context.beginPath();
        context.arc(ballX, ballY, 50, 0, Math.PI * 2);
        context.fillStyle = 'red';
        context.fill();
        //context.stroke();
        context.closePath();

        checkForCollision();
    }, 8);
}());