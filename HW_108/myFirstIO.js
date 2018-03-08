var fs = require('fs');

var buffer = fs.readFileSync(process.argv[2]);

var str = buffer.toString();

var strArray = str.split('\n');

console.log(strArray.length - 1);