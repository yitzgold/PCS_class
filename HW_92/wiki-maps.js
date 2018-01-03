/* global $, google */

(function () {
    "use strict";
    var map;
    var markers = [];
    var list = $('#sidebar ul');

    function removeMarkers() {
        for (var i = 0; i < markers.length; i++) {
            markers[i].setMap(null);
        }
        markers = [];
    }

    map = new google.maps.Map(document.getElementById('map'), {
        zoom: 2,
        center: { lat: 20, lng: 150 }
    });

    var drawingManager = new google.maps.drawing.DrawingManager({
        drawingMode: google.maps.drawing.OverlayType.NULL,
        drawingControl: true,
        drawingControlOptions: {
            position: google.maps.ControlPosition.TOP_CENTER,
            drawingModes: ['marker', 'circle', 'polygon', 'polyline', 'rectangle']
        },
        markerOptions: { icon: 'https://developers.google.com/maps/documentation/javascript/examples/full/images/beachflag.png' },
        circleOptions: {
            fillColor: '#ffff00',
            fillOpacity: 1,
            strokeWeight: 5,
            clickable: false,
            editable: true,
            zIndex: 1
        }
    });
    drawingManager.setMap(map);

    $("#fetch").click(function () {
        var search = $("#search").val();
        var numOfResults = $("#numOfResults").val();
        map.setCenter({ lat: 20, lng: 150 });
        map.setZoom(2);

        $.getJSON("http://api.geonames.org/wikipediaSearch?&callback=?",
            {
                q: search,
                maxRows: numOfResults,
                username: "yitzigoldman",
                type: "json"
            },
            function (data) {
                console.log(data);
                data.geonames.forEach(function (elem) {
                    var location = { lat: elem.lat, lng: elem.lng };
                    var marker = new google.maps.Marker({
                        position: location,
                        title: elem.title,
                        map: map
                    });
                    markers.push(marker);

                    $('<li><img src="' + (elem.thumbnailImg || 'imageIcon.png') + '" >' + elem.title + '</li>').appendTo(list).click(function () {
                        map.panTo(location);
                        map.setZoom(18);
                    });
                });
            });
    });

    $("#clear").click(function () {
        removeMarkers();
        list.empty();
        map.setCenter({ lat: 20, lng: 150 });
        map.setZoom(2);
    });
}());

