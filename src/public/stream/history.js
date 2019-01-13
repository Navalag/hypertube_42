/*var fs = require("fs"),
    http = require("http"),
    url = require("url"),
    path = require("path");

http.createServer(function (req, res) {
  console.log(req.url)  
  if (req.url != "/movie.mp4") {
    res.writeHead(200, { "Content-Type": "text/html" });
    res.end('<video src="http://localhost:8080/movie.mp4" controls></video>');
  } else {
    var file = path.resolve(__dirname,"movie.mp4");
    fs.stat(file, function(err, stats) {
        if (err) {
            if (err.code === 'ENOENT') {
                res.end('404');
        }
        res.end(err);
      }
      var range = req.headers.range;
      if (!range) {
          res.end('416');
      }
      var positions = range.replace(/bytes=/, "").split("-");
      var start = parseInt(positions[0], 10);
      var total = stats.size;
      var end = positions[1] ? parseInt(positions[1], 10) : total - 1;
      var chunksize = (end - start) + 1;
      console.log(chunksize)
      res.writeHead(206, {
          "Content-Range": "bytes " + start + "-" + end + "/" + total,
          "Accept-Ranges": "bytes",
          "Content-Length": chunksize,
          "Content-Type": "video/mp4"
      });

      var stream = fs.createReadStream(file, { start: start, end: end })
        .on("open", function() {
            stream.pipe(res);
        }).on("error", function(err) {
            res.end(err);
        });
    });
  }
}).listen(8080);*/


/*var fs = require("fs"),
    http = require("http"),
    url = require("url"),
    path = require("path");

http.createServer(function (req, res) {
  if (req.url != "/movie.mp4") {
    res.writeHead(200, { "Content-Type": "text/html" });
    res.end('<video src="http://localhost:8888/movie.mp4" controls></video>');
  } else {
    var file = path.resolve(__dirname,"movie.mp4");
    fs.stat(file, function(err, stats) {
      if (err) {
        if (err.code === 'ENOENT') {
          // 404 Error if file not found
          return res.sendStatus(404);
        }
      res.end(err);
      }
      var range = req.headers.range;
      if (!range) {
       // 416 Wrong range
       return res.sendStatus(416);
      }
      var positions = range.replace(/bytes=/, "").split("-");
      var start = parseInt(positions[0], 10);
      var total = stats.size;
      var end = positions[1] ? parseInt(positions[1], 10) : total - 1;
      var chunksize = (end - start) + 1;
      let head = {
        "Content-Range": "bytes " + start + "-" + end + "/" + total,
        "Accept-Ranges": "bytes",
        "Content-Length": chunksize,
        "Content-Type": "video/mp4"
      };
      res.writeHead(206, head);
      console.log(head);
      var stream = fs.createReadStream(file, { start: start, end: end })
        .on("open", function() {
          stream.pipe(res);
        }).on("error", function(err) {
          res.end(err);
        });
    });
  }
}).listen(8888);*/

var fs = require("fs"),
    http = require("http"),
    url = require("url"),
    path = require("path");
    torrentStream = require('torrent-stream');

http.createServer(function (req, res) {
    console.log('url - ' + req.url);
    if (req.url != "/movie.mp4") {
        
        fs.readFile('./index.php', null, function (error, data) {
            if (error) {
                res.writeHead(404);
                res.write('file not found');
            } else {
                res.writeHead(200, { "Content-Type": "text/html" });
                res.write(data);
            }
            res.end();
        });
    } else {
        let opts = {tmp: './tmp'};
        let engine = torrentStream('magnet:?xt=urn:btih:08ada5a7a6183aae1e09d831df6748d566095a10&dn=Sintel&tr=udp%3A%2F%2Fexplodie.org%3A6969&tr=udp%3A%2F%2Ftracker.coppersurfer.tk%3A6969&tr=udp%3A%2F%2Ftracker.empire-js.us%3A1337&tr=udp%3A%2F%2Ftracker.leechers-paradise.org%3A6969&tr=udp%3A%2F%2Ftracker.opentrackr.org%3A1337&tr=wss%3A%2F%2Ftracker.btorrent.xyz&tr=wss%3A%2F%2Ftracker.fastcast.nz&tr=wss%3A%2F%2Ftracker.openwebtorrent.com&ws=https%3A%2F%2Fwebtorrent.io%2Ftorrents%2F&xs=https%3A%2F%2Fwebtorrent.io%2Ftorrents%2Fsintel.torrent', opts);

        engine.on('ready', function() {
            engine.files.forEach(function(file) {
                let extension = path.extname(file.name);
                console.log(file.name);
                if(extension === '.mp4' || extension === '.mkv') {
                    let movie_on_server = path.resolve(__dirname, "movie.mp4");
                    let movie_full_length = file.length;
                    let range = req.headers.range;
                    let positions = range.replace(/bytes=/, "").split("-");
                    let start = parseInt(positions[0], 10);
                    let total = movie_full_length;
                    let newEnd = parseInt(positions[1], 10);
                    console.log('newEnd = ' + newEnd);
                    if (!newEnd) {
                        end = start + 30000000 >= movie_full_length ? movie_full_length - 1 : start + 30000000;
                    }
                    else
                        end = parseInt(newEnd, 10);
                    let chunksize = (end - start) + 1;

                    let head = {
                        "Content-Range": "bytes " + start + "-" + end + "/" + total,
                        "Accept-Ranges": "bytes",
                        "Content-Length": chunksize,
                        "Content-Type": "video/mp4",
                        'Connection': 'keep-alive'
                    };
                    res.writeHead(206, head);
                    console.log(head);

                    var stream = file.createReadStream({
                        start: start,
                        end: end,
                    });
                    engine.on('download', function(index){
                        console.log(index);
                    });
                    engine.on('idle', function(){
                        console.log('idle');
                    });

                    let lp = path.resolve(__dirname, "movie" + extension);

                    fs.access(lp, fs.F_OK, (err) => {
                        if (!err && fs.statSync(lp).size === movie_full_length) {
                            res.sendFile(lp)
                        } else {
                            let file = fs.createWriteStream(lp);
                            res.writeHead(206, head);
                            stream.pipe(res);
                            stream.pipe(file);
                            //res.end();
                        }
                    });
                    //console.log(stream);
                }
            });
        });
    }
}).listen(8888);


<!DOCTYPE html>
<html lang="en">
    <head>
    <link href="https://vjs.zencdn.net/7.4.1/video-js.css" rel="stylesheet">

    <!-- If you'd like to support IE8 (for Video.js versions prior to v7) -->
    <script src="https://vjs.zencdn.net/ie8/ie8-version/videojs-ie8.min.js"></script>
    </head>

    <body>
    <video id="my-video" class="video-js" controls preload="auto" width="640" height="264"
    poster="MY_VIDEO_POSTER.jpg" data-setup="{}">
        <source src="http://localhost:8888/movie" type='video/mp4'>

        <p class="vjs-no-js">
        To view this video please enable JavaScript, and consider upgrading to a web browser that
        <a href="https://videojs.com/html5-video-support/" target="_blank">supports HTML5 video</a>
        </p>
    </video>

    <script src="https://vjs.zencdn.net/7.4.1/video.js"></script>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
    </body>
</html>