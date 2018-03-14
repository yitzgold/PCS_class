module.exports = function (req, res, next) {
    if (req.query.magicWord && req.query.magicWord === 'please') {
        next();
    } else {
        const error = new Error("Access denied You are unauthorized");
        error.statusCode = 403;
        next(error);
    }
};