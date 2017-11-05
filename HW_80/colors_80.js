(function () {
    "use strict";

    var colorItervalId;
    var changingColors = false;
    var changeColorsButton = get("changeColorsButton");

    function get(id) {
        return document.getElementById(id);
    }

    changeColorsButton.addEventListener('click', function () {
        if (!changingColors) {
            colorItervalId = setInterval(changeColor, 2000);
            changingColors = true;
            changeColorsButton.innerHTML = "stop";
        } else {
            clearInterval(colorItervalId);
            changingColors = false;
            changeColorsButton.innerHTML = "start";
        }
    });

    function changeColor() {
        document.body.style.color = "rgb(" + Math.floor(Math.random() * 255) + "," +
            Math.floor(Math.random() * 255) + "," + Math.floor(Math.random() * 255) + ")";

        document.body.style.backgroundColor = "rgb(" + Math.floor(Math.random() * 255) + "," +
            Math.floor(Math.random() * 255) + "," + Math.floor(Math.random() * 255) + ")";
    }
}());