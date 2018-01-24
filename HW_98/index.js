const $ = require('jquery');

let colorPicker = $("#color");

colorPicker.change(function () {
    $("#display").css("backgroundColor", colorPicker.val());
});