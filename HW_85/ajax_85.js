/* global $, pcs */

(function () {
    "use strict";

    $("#button").click(function () {
        var file = $("#file").val();
        var spinner = $(".spinner");

        if (!file) {
            pcs.messagebox.show("please enter a file", true);
        } else {
            spinner.show();
            setTimeout(function () {
                $.get(file, function (data) {
                    //$("#loadDiv").text(data); //displays actual html
                    $("#loadDiv").html(data);  //renders the html
                }).fail(function (xhr) {
                    pcs.messagebox.show("ERROR: " + xhr.statusText);
                }).always(function () {
                    spinner.hide();
                });
            }, 1000);
        }
    });
}());