const fs = require('fs');

fs.readdir(process.argv[2], (err, files) => {
    if (err) {
        console.error('OOPS. Couldnt read file', err);
    } else {
        files.forEach((file) => {
            if (file.includes(`.${process.argv[3]}`)) {
                console.log(file);
            }
        })
    }
});

/*var fs = require('fs')
var path = require('path')

var folder = process.argv[2]
var ext = '.' + process.argv[3]

fs.readdir(folder, function (err, files) {
  if (err) return console.error(err)
  files.forEach(function (file) {
    if (path.extname(file) === ext) {
      console.log(file)
    }
  })
})*/