const fs = require('fs');

const fileContents = fs.readFile(process.argv[2], 'utf8', (err, fileContents) => {
    if (err) {
        console.error('OOPS. Couldnt read file', err);
    } else {
        console.log(fileContents.split('\n').length - 1);
    }
});