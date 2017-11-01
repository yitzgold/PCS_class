(function(){
    "use strict";
    
    var colorButton = document.getElementById("colorButton");
    
    colorButton.addEventListener('click', function () {
        document.body.style.color = document.getElementById('textColor').value;
        document.body.style.backgroundColor = document.getElementById('backgroundColor').value;
    });
}());