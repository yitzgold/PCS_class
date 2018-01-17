/* global $ */
(function () {
    "use strict";

    var canvas = $("#theCanvas")[0],
        context = canvas.getContext('2d'),
        snakeImg = $('<img />', { src: 'images/snake.png', })[0],
        appleImg = $('<img />', { src: 'images/apple.png', })[0],
        direction = 'right',
        currentX = 0,
        currentY = 0,
        nextX = 1,
        nextY = 0,
        appleX,
        appleY,
        appleSides,
        interval,
        score = 0,
        scoreDisplay = $("#score");

    $(window).on("load", function () {

        function resizeCanvas() {
            canvas.width = window.innerWidth - 10;
            canvas.height = window.innerHeight - 10;
        }

        window.addEventListener('resize', resizeCanvas);

        resizeCanvas();

        function getRandomNumberBetween(min, max) {
            return Math.floor(Math.random() * (max - min + 1) + min);
        }
        function displayRandomApple() {
            appleX = getRandomNumberBetween(0, canvas.width - 64);
            appleY = getRandomNumberBetween(0, canvas.height - 64);
            appleSides = {
                topY: appleY,
                bottomY: appleY + 64,
                leftX: appleX,
                rightX: appleX + 64
            };
            context.drawImage(appleImg, appleX, appleY, 64, 64);
        }

        function startGame() {
            context.drawImage(snakeImg, currentX, currentY, 64, 64);
            displayRandomApple();
            interval = setInterval(() => {
                context.clearRect(currentX, currentY, 64, 64);
                checkForOutOfBounds();
                checkForAppleContact();
                context.drawImage(snakeImg, currentX += nextX, currentY += nextY, 64, 64);
            }, 5);
        }

        $(document).keydown(function (e) {
            if (e.which === 37) {
                nextX = -1;
                nextY = 0;
                direction = 'left';
            } else if (e.which === 38) {
                nextX = 0;
                nextY = -1;
                direction = 'up';
            } else if (e.which === 39) {
                nextX = 1;
                nextY = 0;
                direction = 'right';
            } else if (e.which === 40) {
                nextX = 0;
                nextY = 1;
                direction = 'down';
            }
        });

        function checkForOutOfBounds() {
            if (currentX < 0 || currentX + 64 > canvas.width || currentY < 0 || currentY + 64 > canvas.height) {
                clearInterval(interval);
                $("#gameover").show();
            }
        }

        $("#newGame").click(function () {
            console.log("clicked");
            $("#gameover").hide();
            context.clearRect(currentX, currentY, 64, 64);
            context.clearRect(appleX, appleY, 64, 64);
            direction = 'right';
            currentX = 0;
            currentY = 0;
            nextX = 1;
            nextY = 0;
            score = 0;
            scoreDisplay.text("score: 0");
            startGame();
        });

        function resetApple() {
            context.clearRect(appleX, appleY, 64, 64);
            scoreDisplay.text("score: " + (++score));
            displayRandomApple();
        }

        function checkForAppleContact() {
            switch (direction) {
                case 'left':
                    if (currentX === appleSides.rightX && currentY <= appleSides.bottomY && currentY + 64 >= appleSides.topY) {
                        resetApple();
                    }
                    break;
                case 'right':
                    if (currentX + 64 === appleSides.leftX && currentY <= appleSides.bottomY && currentY + 64 >= appleSides.topY) {
                        resetApple();
                    }
                    break;
                case 'up':
                    if (currentY === appleSides.bottomY && currentX <= appleSides.rightX && currentX + 64 >= appleSides.leftX) {
                        resetApple();
                    }
                    break;
                case 'down':
                    if (currentY + 64 === appleSides.topY && currentX <= appleSides.rightX && currentX + 64 >= appleSides.leftX) {
                        resetApple();
                    }
                    break;
            }
        }
        startGame();
        scoreDisplay.text("score: 0");
    });
}());