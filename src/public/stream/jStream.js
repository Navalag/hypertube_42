var express = require('express');
    fs = require("fs"),
    dbHeandler = require('./dbHeandler.js'),
    upContent = require('./upContent.js'),
    schedule = require('node-schedule'),
    path = require("path"),
    torrentStream = require('torrent-stream');

var app = express();

app.get('/stream', function(req, res){
    res.sendFile(__dirname + '/index.html');
});

app.use(function (req, res, next) {
    res.setHeader('Access-Control-Allow-Origin', 'http://localhost:8888');
    res.setHeader('Access-Control-Allow-Methods', 'GET, POST, OPTIONS, PUT, PATCH, DELETE');
    res.setHeader('Access-Control-Allow-Headers', 'X-Requested-With,content-type');
    res.setHeader('Access-Control-Allow-Credentials', true);
    next();
});

app.get('/:magnet', function(req, res){

    try {
        let magnet_link = req.originalUrl.substr(1);
        let engine = torrentStream(magnet_link);
        let hash = magnet_link.split(':')[3].split('&')[0];
        let tmpPath = '/tmp/' + hash + '.mp4';
        dbHeandler.dbCheck(tmpPath);

        engine.on('ready', (err) => {
                
                engine.files.forEach(function (file) {
                    let fullPath = '/tmp/' + hash + '.mp4';
                    let extension = path.extname(file.name);
                    if(extension === '.mp4' || extension === '.mkv') {
                        fs.exists(fullPath, (exists) => {

                            if (exists) 
                            {
                                let stat = fs.statSync(fullPath);

                                let toDowload = stat.size;
                                let fileSize = file.length;

                                if (toDowload === fileSize) 
                                {

                                    const pathToVideo = '/tmp/' + hash + '.mp4';
                                    let fileSize = file.length; 
                                    upContent.nonPartial(req, res, fileSize, pathToVideo);

                                }
                                else
                                {
                                    let videoFormat = file.name.split('.').pop();
                                        if (videoFormat === 'mp4' || videoFormat === 'mkv' || videoFormat === 'ogg' || videoFormat === 'webm') {
                                            let currentStream = file.createReadStream();
                                            currentStream.pipe(fs.createWriteStream(fullPath));

                                            const pathToVideo = fullPath;
                                            let fileSize = file.length;
                                            const range = req.headers.range;
                                            let start = 0;
                                            let end = fileSize - 1;

                                            upContent.partial(req, res, start, end, fileSize, file);

                                        }
                                    }
                            }
                            else 
                            {
                                let videoFormat = file.name.split('.').pop();
                                    if (videoFormat === 'mp4' || videoFormat === 'mkv' || videoFormat === 'ogg' || videoFormat === 'webm') {
                                        let currentStream = file.createReadStream();
                                        currentStream.pipe(fs.createWriteStream(fullPath));

                                        const pathToVideo = fullPath;
                                        let fileSize = file.length;
                                        const range = req.headers.range;
                                        let start = 0;
                                        let end = fileSize - 1;
                                        upContent.partial(req, res, start, end, fileSize, file);
                                }
                            }
                        });
                    }
                });

            })
        } catch (err) {
    }
    });

schedule.scheduleJob('*/10 * * * * *', function () {
    dbHeandler.dbBupath();
});

app.listen(8888, function () {
   dbHeandler.dbInit();
  console.log('Example app listening on port 8888!');
});