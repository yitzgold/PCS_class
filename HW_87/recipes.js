/* global $ */

(function () {
    "use strict";

    $(":radio").each(function () {
        $(this).on("click", loadRecipe($(this).val()));
    });

    function loadRecipe(id) {
        return function () {
            $.getJSON('loadRecipe.php', { id: id }, function (data) {

                $("#recipeDisplay").show();
                $("#name").text(data[0].name);
                $("#picture").attr('src', data[0].picture);
                var ingredientsDisplay = $("#ingredients").empty();
                var ingredients = data[0].ingredients.split('~');
                ingredients.forEach(function (element) {
                    ingredientsDisplay.append(element + '<br>');
                });
            }).fail(function (jqxhr) {
                alert("Failed to load file: " + jqxhr.status + " " + jqxhr.statusText);
            });
        };
    }

    // function loadRecipe(id) {
    //     return function () {
    //         $.getJSON('loadRecipe.php', { id: id }, function (data) {
    //             var recipeDisplay = $("#recipeDisplay");
    //             recipeDisplay.empty();
    //             // $('<img />', {
    //             //     src: data[0].picture,
    //             //     width: '450px',
    //             //     height: '350px'
    //             // }).appendTo(recipeDisplay);
    //             recipeDisplay.append("<h3>Ingredients:</h3>");
    //             var ingredients = data[0].ingredients.split('~');
    //             for (var i = 0; i < ingredients.length; i++) {
    //                 recipeDisplay.append(ingredients[i] + "<br>");
    //             }
    //         }).fail(function (jqxhr) {
    //             alert("Failed to load file: " + jqxhr.status + " " + jqxhr.statusText);
    //         });
    //     };
    // }
}());