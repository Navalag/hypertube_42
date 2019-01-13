var express = require('express');
    fs = require("fs"),
    http = require("http"),
    url = require("url"),
    path = require("path");
    torrentStream = require('torrent-stream');
    srt2vtt = require('srt-to-vtt');

var app = express();

app.get('/stream', function(req, res){
    res.sendFile(__dirname + '/index.html');
});

app.get('/:magnet', function(req, res){
    //let opts = {tmp: './tmp'};
    //let magnet_link = 'magnet:?xt=urn:btih:B127082DEC04240FB9D617C23BFA3DF47E2DC0C7&tr=udp://glotorrents.pw:6969/announce&tr=udp://tracker.opentrackr.org:1337/announce&tr=udp://torrent.gresille.org:80/announce&tr=udp://tracker.openbittorrent.com:80&tr=udp://tracker.coppersurfer.tk:6969&tr=udp://tracker.leechers-paradise.org:6969&tr=udp://p4p.arenabg.ch:1337&tr=udp://tracker.internetwarriors.net:1337';
    let magnet_link = req.originalUrl.substr(1);
    let engine = torrentStream(magnet_link);

    engine.on('ready', function() {
        engine.files.forEach(function(file) {
            let extension = path.extname(file.name);
            console.log(file.name);

            if(extension === '.mp4' || extension === '.mkv') {
                let movie_full_length = file.length;
                let range = req.headers.range;
                let positions = range.replace(/bytes=/, "").split("-");
                let start = parseInt(positions[0], 10);
                let newEnd = parseInt(positions[1], 10);
                console.log('newEnd = ' + newEnd);
                if (!newEnd) {
                    end = start + 30000000 >= movie_full_length ? movie_full_length - 1 : start + 30000000;
                }
                else
                    end = parseInt(newEnd, 10);
                let chunksize = (end - start) + 1;

                let head = {
                    "Content-Range": "bytes " + start + "-" + end + "/" + movie_full_length,
                    "Accept-Ranges": "bytes",
                    "Content-Length": chunksize,
                    "Content-Type": "video/mp4",
                    'Connection': 'keep-alive'
                };
                console.log(head);

                var stream = file.createReadStream({
                    start: start,
                    end: end,
                });
                engine.on('download', function(index){
                    console.log(index);
                });

                let hash = magnet_link.split(':')[3].split('&')[0];
                console.log(hash);
                if (!fs.existsSync(hash)) {
                    fs.mkdirSync(hash);
                }

                let lp = path.resolve(__dirname + '/' + hash, hash + extension);

                fs.access(lp, fs.F_OK, (err) => {
                    if (!err && fs.statSync(lp).size === movie_full_length) {
                        res.sendFile(lp);
                    } else {
                        let file = fs.createWriteStream(lp);
                        res.writeHead(206, head);
                        stream.pipe(res);
                        stream.pipe(file);
                    }
                });
            }
        });
    });
});

app.listen(8888);