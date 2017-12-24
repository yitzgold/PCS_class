/* global $ */
(function () {
    "use strict";
    var index = 0;
    var interval = 0;

    function changeImage(imageOBJ) {
        $("#image").attr("src", imageOBJ.url);
        $("#title").text(imageOBJ.title);
    }

    $.getJSON("carousel.json", function (data) {
        $("#title").html(data[index].title);
        $("#image").attr("src", data[index].url);

        $("#next").click(function () {
            index = index < (data.length - 1) ? ++index : 0;
            changeImage(data[index]);
        });

        $("#prev").click(function () {
            index = index > 0 ? --index : 0;
            changeImage(data[index]);
        });

        $("#slideshow").click(function () {
            if (!interval) {
                $("#slideshow").html("stop");
                interval = setInterval(function () {
                    index = index < (data.length - 1) ? ++index : 0;
                    changeImage(data[index]);
                }, 1000);
            } else {
                clearInterval(interval);
                interval = 0;
                $("#slideshow").html("slideshow");
            }
        });
    });
}());