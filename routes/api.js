let express = require('express');
let router = express.Router();
const mysql = require('mysql')
const con = mysql.createPool({
  connectionLimit: 150,
  host: 'localhost',
  user: 'root',
  password: '**insert**',
  database: 'live',
  debug: false,
})

//con.connect();

//* GET LATEST DATA FROM ESP *//
router.get('/get-latest-data/esp', function(req, res, next) {
  con.query('SELECT battery_esp, height_esp, pressure, humidity, temperature, timestamp FROM data WHERE battery_esp IS NOT NULL && pressure IS NOT NULL && humidity IS NOT NULL && temperature IS NOT NULL && height_esp IS NOT NULL ORDER BY id DESC LIMIT 1', (err, rows) => {
    if(err) {
      console.error(err);
      return;
    }
    res.json(rows);
  });
});

//* GET LATEST DATA FROM MOBILE *//
router.get('/get-latest-data/mobile', function(req, res, next) {
  con.query('SELECT overload, gyroscope_x, gyroscope_y, gyroscope_z, battery, speed, timestamp FROM data WHERE overload IS NOT NULL && gyroscope_x IS NOT NULL && gyroscope_y IS NOT NULL && gyroscope_z IS NOT NULL && battery IS NOT NULL && speed IS NOT NULL ORDER BY id DESC LIMIT 1', (err, rows, fields) => {
    if(err) {
      console.error(err);
      return;
    }
    res.json(rows);
  });
});

//* GET LATEST DATA FROM GPS *//
router.get('/get-latest-data/gps', function(req, res, next) {
  con.query('SELECT gps_zd, gps_zs, height, accuracy, timestamp FROM data WHERE gps_zd IS NOT NULL && gps_zs IS NOT NULL && height IS NOT NULL && accuracy IS NOT NULL ORDER BY id DESC LIMIT 1', (err, rows, fields) => {
    if(err) {
      console.error(err);
      return;
    }
    res.json(rows);
  });
});

//* GET SELECTED DATA *//
router.get('/get-data/', function(req, res, next) {
  let type = req.query.type;
  let from = req.query.from;
  let to = req.query.to;
  con.query('SELECT timestamp, ' + type + ' FROM data WHERE timestamp >= "' + from.replace('T', ' ') + '" AND timestamp <= "' + to.replace('T', ' ') + '" AND ' + type + ' is not null GROUP BY timestamp ORDER BY id ASC', (err, rows, fields) => {
    if(err) {
      console.error(err);
      return;
    }
    res.json(rows);
  });
});

//* SAVE DATA MOBILE *//
router.post('/save/mobile', function(req, res){
  if(!req.body.key || !req.body.overload || !req.body.gps_zd || !req.body.gps_zs || !req.body.height || !req.body.gyroscope_x || !req.body.gyroscope_y || !req.body.gyroscope_z || !req.body.battery || !req.body.speed || !req.body.accuracy) {
    res.status(400);
    res.json({message: "Bad Request"});
  }
  else if(req.body.key != "ZqJc7GdM4b") {
    res.status(400);
    res.json({message: "Bad Request Key"});
  }
  else {
    con.query("INSERT INTO `data` (`id`, `timestamp`, `overload`, `gps_zd`, `gps_zs`, `height`, `gyroscope_x`, `gyroscope_y`, `gyroscope_z`, `battery`, `speed`, `accuracy`) VALUES (NULL, current_timestamp(), " + req.body.overload + ", " + req.body.gps_zd + ", " + req.body.gps_zs + ", " + req.body.height + ", " + req.body.gyroscope_x + ", " + req.body.gyroscope_y + ", " + req.body.gyroscope_z + ", " + req.body.battery + ", " + req.body.speed + ", " + req.body.accuracy +");", (err) => {
      if(err) {
        console.error(err);
        return;
      }
      res.json({message: "New data saved."})
    })
  }
});

//* SAVE DATA ESP *//
router.post('/save/esp', function(req, res){
  if(!req.body.key || !req.body.pressure || !req.body.humidity || !req.body.temperature || !req.body.battery || !req.body.height) {
    res.status(400);
    res.json({message: "Bad Request"});
  }
  else if(req.body.key != "ZqJc7GdM4b") {
    res.status(400);
    res.json({message: "Bad Request Key"});
  }
  else {
    con.query("INSERT INTO `data` (`id`, `timestamp`, `pressure`, `humidity`, `temperature`, `battery_esp`, `height_esp`) VALUES (NULL, current_timestamp(), " + req.body.pressure + ", " + req.body.humidity + ", " + req.body.temperature + ", " + req.body.battery + ", " + req.body.height +");", (err) => {
      if(err) {
        console.error(err);
        return;
      }
      res.json({message: "New data saved."})
    })
  }
});

module.exports = router;

//con.destroy();