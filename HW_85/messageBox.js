var pcs = pcs || {};

pcs.messagebox = (function () {
    "use strict";

    var numOfMessagesInUse = 0;
    var positions = [50, 40, 30, 20, 10, 60, 70, 80, 90];
    var highestZindex = 50000;

    function createElement(type) {
        return document.createElement(type);
    }

    function show(msg, modal, buttonArray, callback) {

        var div = createElement("div");
        var span = createElement("span");
        var buttonDiv = createElement("div");
        var okButton; /* = createElement("button");*/
        var modalDiv;
        var isModal = false;
        span.innerHTML = msg;
        div.appendChild(span);
        // okButton.innerHTML = "OK";
        // buttonDiv.appendChild(okButton);
        div.appendChild(buttonDiv);
        document.body.appendChild(div);
        div.id = "messageDiv";
        div.style.backgroundColor = 'lightblue';
        div.style.padding = '20px';
        div.style.width = '400px';
        div.style.height = '100px';
        div.style.border = '1px solid blue';
        div.style.position = 'absolute';
        div.style.right = positions[numOfMessagesInUse] + '%';
        div.style.top = positions[numOfMessagesInUse] + '%';
        div.style.marginRight = '-200px';
        div.style.marginTop = '-50px';
        div.style.boxSizing = 'border-box';
        div.style.display = 'inline-block';

        buttonDiv.style.position = 'absolute';
        buttonDiv.style.bottom = '6px';
        buttonDiv.style.textAlign = 'center';
        buttonDiv.style.width = '100%';
        buttonDiv.style.marginLeft = '-20px';

        numOfMessagesInUse++;

        div.addEventListener("click", function () {
            div.style.zIndex = ++highestZindex;
        });

        function okButtonListener() {
            okButton.addEventListener("click", function () {
                document.body.removeChild(div);
                if (isModal) {
                    document.body.removeChild(modalDiv);
                }
                numOfMessagesInUse--;
            });
        }

        function checkForModal() {
            if (modal === true) {
                isModal = true;
                modalDiv = document.createElement("div");
                document.body.appendChild(modalDiv);
                modalDiv.style.position = "fixed";
                modalDiv.style.top = "0";
                modalDiv.style.left = "0";
                modalDiv.style.background = "rgba(0, 0, 0, 0.6)";
                modalDiv.style.width = "100%";
                modalDiv.style.height = "100%";

                modalDiv.style.zIndex = ++highestZindex;
                div.style.zIndex = ++highestZindex;
            }
        }
        checkForModal();

        function addbutton(element) {
            var button = createElement("button");
            buttonDiv.appendChild(button);
            button.innerHTML = element;
            button.addEventListener('click', function () {
                if (callback !== undefined) {
                    callback(element);
                }
                console.log(element + " was clicked");
            });
        }

        function checkForCustomButtons() {
            if (buttonArray !== undefined) {
                buttonArray.forEach(addbutton);
            } else {
                okButton = createElement("button");
                okButton.innerHTML = "OK";
                buttonDiv.appendChild(okButton);
                okButtonListener();
            }
        }
        checkForCustomButtons();
    }

    return {
        show: show
    };
}());