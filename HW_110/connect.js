const connect = require('connect'),
    app = connect();

const queryParser = require('./queryParser');
app.use(queryParser);

app.use((req, res, next) => {
    res.setHeader('Content-Type', 'text/html');
    next();
});

const authorization = require('./authorization');
app.use(authorization);

app.use('/home', (req, res, next) => {
    res.end("<h2>The home page.</h2>");
});

app.use('/about', (req, res, next) => {
    res.end("<h2>PCS is a great place.</h2>");
});

app.use((req, res, next) => {
    const error = new Error("Page not found. 404");
    error.statusCode = 404;
    next(error);
});

app.use((err, req, res, next) => {
    res.statusCode = err.statusCode ? err.statusCode : 500;
    res.end('<h4>Something went wrong<br/>' + err.message + '</h4>');
});

app.listen(80); 