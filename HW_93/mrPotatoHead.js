/* global $ */
(function () {
    'use strict';

    var dragging,
        offset,
        currentY,
        currentX,
        zIndex = 0,
        moves = {};

    //localStorage.removeItem('moves');
    if (localStorage.moves) {
        $("#restore").click(function () {
            var storedMoves = JSON.parse(localStorage.moves);
            var ids = Object.getOwnPropertyNames(storedMoves);

            ids.forEach(function (id) {
                $("#" + id).css({ top: storedMoves[id].y, left: storedMoves[id].x });
            });
        });
    } else {
        $("#restore").text("No saved setups").attr("disabled", "disabled");
    }

    $(".pieces").mousedown(function (event) {
        event.preventDefault();
        $("#restore").attr("disabled", "disabled");
        dragging = $(this);
        dragging.css("zIndex", ++zIndex);
        offset = { y: event.offsetY, x: event.offsetX };
    }).mouseup(function () {
        moves[dragging[0].id] = { y: currentY, x: currentX };
        localStorage.moves = JSON.stringify(moves);
        dragging = null;
    }).mousemove(function (event) {
        if (dragging) {
            currentY = event.clientY - offset.y;
            currentX = event.clientX - offset.x;
            dragging.css({ top: currentY, left: currentX });
        }
    });
}());