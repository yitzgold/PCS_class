var fs = require('fs');
var path = require('path');

module.exports = function (directory, extension, callback) {
    var ext = '.' + extension;

    fs.readdir(directory, function (err, files) {
        if (err) {
            return callback(err);
        }
        files = files.filter(f => path.extname(f) === ext);
        callback(null, files);
    })
}