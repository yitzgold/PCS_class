var mymodule = require('./modular.js');

mymodule(process.argv[2], process.argv[3], (err, files) => {
    if (err) {
        console.error(err)
    } else {
        files.forEach(file => {
            console.log(file);
        })
    }
});