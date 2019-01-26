const pump = require('pump');
const fs = require('fs');

let partial = function (req, res, start, end, fileSize, file) {
    let range = req.headers.range;
    let parts = range.replace(/bytes=/, '').split('-');
    let newStart = parts[0];
    let newEnd = parts[1];
    start = parseInt(newStart, 10);

    if (!newEnd) {
        end = start + 30000000 >= fileSize ? fileSize - 1 : start + 30000000;
    }
    else
        end = parseInt(newEnd, 10);
    let chunksize = end - start + 1;
    let head = {
        'Content-Range': 'bytes ' + start + '-' + end + '/' + fileSize,
        'Accept-Ranges': 'bytes',
        'Content-Length': chunksize,
        'Content-Type': 'video/mp4',
        'Connection': 'keep-alive'
    };
    res.writeHead(206, head);

    let stream = file.createReadStream({
        start: start,
        end: end
    });
    pump(stream, res);
};

let nonPartial = function (req, res, fileSize, file) {



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
};

module.exports = {
    partial,
    nonPartial
};