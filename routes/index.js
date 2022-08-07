var express = require('express');
var router = express.Router();

/* GET home page. */
router.get('/', function(req, res, next) {
  res.render('index', { title: 'Express' });
});

/* GET graphs page. */
router.get('/graphs',function(req,res){
  res.render('graphs.html', { title: 'Express' });
});

module.exports = router;
