(function () {
    "use strict";

    var startMilliseconds;
    var elapsedMilliseconds;
    var intervalId;
    var stopped = false;
    var prevHour = 0;
    var prevMinute = 0;
    var prevSecond = 0;

    var div = createElement("div");
    var hourSpan = createElement("span");
    var minuteSpan = createElement("span");
    var secondSpan = createElement("span");
    var hundredthSpan = createElement("span");
    var buttonDiv = createElement("div");
    var startButton = createElement("button");
    var stopButton = createElement("button");
    var resetButton = createElement("button");

    function createElement(type) {
        return document.createElement(type);
    }

    hourSpan.innerHTML = "00:";
    minuteSpan.innerHTML = "00";
    secondSpan.innerHTML = ":00";
    hundredthSpan.innerHTML = " 00";
    div.appendChild(hourSpan);
    div.appendChild(minuteSpan);
    div.appendChild(secondSpan);
    div.appendChild(hundredthSpan);
    startButton.innerHTML = "start";
    stopButton.innerHTML = "stop";
    stopButton.disabled = true;
    resetButton.innerHTML = "reset";
    buttonDiv.appendChild(startButton);
    buttonDiv.appendChild(stopButton);
    buttonDiv.appendChild(resetButton);
    div.appendChild(buttonDiv);
    document.body.appendChild(div);

    div.style.backgroundColor = 'black';
    div.style.color = 'red ';
    div.style.padding = '20px';
    div.style.width = '400px';
    div.style.height = '150px';
    div.style.position = 'absolute';
    div.style.left = '50%';
    div.style.top = '50%';
    div.style.marginLeft = '-200px';
    div.style.marginTop = '-75px';
    div.style.boxSizing = 'border-box';
    div.style.display = 'inline-block';
    div.style.textAlign = 'center';
    div.style.borderRadius = "50%";

    hourSpan.style.fontSize = "50px";
    minuteSpan.style.fontSize = "50px";
    secondSpan.style.fontSize = "40px";
    hundredthSpan.style.fontSize = "30px";

    buttonDiv.style.position = 'absolute';
    buttonDiv.style.bottom = '6px';
    buttonDiv.style.width = '100%';
    buttonDiv.style.marginLeft = '-20px';
    buttonDiv.style.paddingBottom = '22px';

    function pad2(number) {
        return (number < 10 ? '0' : '') + number;
    }

    function displayWatch() {
        elapsedMilliseconds = new Date().getTime() - startMilliseconds;
        var oneHundredthSec = Math.trunc(elapsedMilliseconds / 10) % 100;
        var seconds = Math.trunc(elapsedMilliseconds / 1000) % 60;
        var minutes = Math.trunc(elapsedMilliseconds / 60000) % 60;
        var hours = Math.trunc(elapsedMilliseconds / 3600000);

        hundredthSpan.innerHTML = " " + pad2(oneHundredthSec);
        if (seconds !== prevSecond) {
            secondSpan.innerHTML = ":" + pad2(seconds);
            prevSecond = seconds;
        }
        if (minutes !== prevMinute) {
            minuteSpan.innerHTML = pad2(minutes);
            prevMinute = minutes;
        }
        if (hours !== prevHour) {
            hourSpan.innerHTML = pad2(hours) + ":";
            prevHour = hours;
        }
    }

    startButton.addEventListener("click", function () {
        if (!stopped) {
            startMilliseconds = new Date().getTime();
        } else {
            startMilliseconds = new Date().getTime() - elapsedMilliseconds;
            stopped = false;
        }
        intervalId = setInterval(displayWatch, 10);
        stopButton.disabled = false;
        startButton.disabled = true;
    });

    stopButton.addEventListener("click", function () {
        clearInterval(intervalId);
        stopped = true;
        startButton.disabled = false;
        stopButton.disabled = true;
    });

    resetButton.addEventListener("click", function () {
        clearInterval(intervalId);
        startButton.disabled = false;
        stopButton.disabled = true;
        stopped = false;
        hourSpan.innerHTML = "00:";
        minuteSpan.innerHTML = "00";
        secondSpan.innerHTML = ":00";
        hundredthSpan.innerHTML = " 00";
    });
}());   