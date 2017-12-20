/* global $ */
(function () {
    "use strict";
    $.getJSON("videos.json", function (data) {
        data.forEach(function (element) {
            $("<div><figure><img src='" + element.poster + "'></figure><figcaption>" +
                element.title + "</figcaption></div>")
                .appendTo($("#titlesDiv")).click(function () {
                    $("#video").attr('src', element.url);
                    // $("#video")[0].play();
                    document.getElementById("video").play();
                });
        });
    });

}());