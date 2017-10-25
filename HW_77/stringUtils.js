var myApp = myApp || {};

myApp.utils = (function (utils) {
    "use strict";

    utils.stringCaseInsensitiveEquals = function (str1, str2){
        return str1.toUpperCase() === str2.toUpperCase();
    };

    return utils;
    
}(myApp.utils || {}));

console.log('myApp.utils.stringCaseInsensitiveEquals("hi", "HI")', 
             myApp.utils.stringCaseInsensitiveEquals("hi", "HI"));