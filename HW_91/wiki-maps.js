/* global $, google */

(function () {
    "use strict";
    var map;
    var markers = [];
    var imageDiv = $("#images");
    var displayingMainMap = true;

    function removeMarkers(markersArray) {
        for (var i = 0; i < markersArray.length; i++) {
            markersArray[i].setMap(null);
        }
        markers = [];
    }

    map = new google.maps.Map(document.getElementById('map'), {
        zoom: 2,
        center: new google.maps.LatLng(-34.397, 150.644)
    });

    $("#button").click(function () {
        if (!displayingMainMap) {
            map = new google.maps.Map(document.getElementById('map'), {
                zoom: 2,
                center: new google.maps.LatLng(-34.397, 150.644)
            });
            displayingMainMap = true;
        }

        if (markers) {
            removeMarkers(markers);
        }

        var location = $("#location").val();
        imageDiv.empty();

        $.getJSON("http://api.geonames.org/wikipediaSearch?q=" + location + "&maxRows=10&username=yitzigoldman&type=json&callback=?", function (data) {
            console.log(data);
            data.geonames.forEach(function (elem) {
                var marker = new google.maps.Marker({
                    position: { lat: elem.lat, lng: elem.lng },
                    map: map
                });
                markers.push(marker);

                $('<img src="' + elem.thumbnailImg + '" >').appendTo(imageDiv).click(function () {
                    displayingMainMap = false;

                    map = new google.maps.Map(document.getElementById('map'), {
                        zoom: 18,
                        center: { lat: elem.lat, lng: elem.lng }
                    });

                    var marker = new google.maps.Marker({
                        position: { lat: elem.lat, lng: elem.lng },
                        map: map
                    });
                    markers.push(marker);
                });
            });
        });
    });
}());

