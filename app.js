let express = require('express');
let path = require('path');
let cookieParser = require('cookie-parser');
let logger = require('morgan');

let indexRouter = require('./routes/index');
let apiRouter = require('./routes/api');

let app = express();

app.use(logger('dev'));
app.use(express.json());
app.use(express.urlencoded({ extended: false }));
app.use(cookieParser());
app.use(express.static(path.join(__dirname, 'public')));
//app.set('view engine', 'html');

app.get('/graphs', function(req, res) {
    res.sendFile(path.join(__dirname, 'public/graphs.html'));
});

app.get('/graph', function(req, res) {
    res.sendFile(path.join(__dirname, 'public/graph.html'));
});

app.use('/', indexRouter);
app.use('/api', apiRouter);

module.exports = app;
