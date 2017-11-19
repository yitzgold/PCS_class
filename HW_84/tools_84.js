

var pcs = (function () {
    "use strict";

    var dataObject = {};

    function get(id) {
        return document.getElementById(id);
    }

    function setCss(elem, property, value) {
        elem.style[property] = value;
    }

    return function (id) {
        var elem = get(id);
        var originalDisplay;
        //var data;

        return {
            /*setCss: function (property, value) {
                setCss(elem, property, value);
                return this;
            },
            getCss: function (property) {
                return getComputedStyle(elem).getPropertyValue(property);
            },*/
            css: function (property, value) {
                if (property && value) {
                    setCss(elem, property, value);
                    return this;
                } else {
                    return getComputedStyle(elem).getPropertyValue(property);
                }
            },
            pulsate: function () {
                var fontSize = parseInt(this.css("font-size")),
                    i = 1,
                    //that = this,
                    interval = setInterval(function () {
                        if (i <= 5 || i > 15) {
                            fontSize += 5;
                        } else {
                            fontSize -= 5;
                        }

                        //that.setCss("fontSize", fontSize + 'px');
                        setCss(elem, "fontSize", fontSize + 'px');

                        if (i++ === 20) {
                            clearInterval(interval);
                        }
                    }, 100);

                return this;
            },
            click: function (callback) {
                elem.addEventListener("click", callback);
                return this;
            },
            mouseenter: function (callback) {
                elem.addEventListener("mouseenter", callback);
                return this;
            },
            hide: function () {
                originalDisplay = this.css("display");
                setCss(elem, "display", 'none');
                return this;
            },
            show: function () {
                setCss(elem, "display", (originalDisplay || "block"));
                return this;
            },
            elemText: function (text) {
                elem.innerHTML = text;
                return this;
            },
            /*setData: function (dataInput) {
                data = dataInput;
                return this;
            },
            getData: function () {
                return data;
            }*/
            data: function (dataInput) {
                if (dataInput) {
                    dataObject[id] = dataInput;
                    console.log(dataObject);
                    //data = dataInput;
                    return this;
                } else {
                    return dataObject[id];
                    //return data;
                }
            }
        };
    };
}());