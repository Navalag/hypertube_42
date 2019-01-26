var sqlite3 = require('sqlite3').verbose(),
	fs = require("fs");

let dbInit = () => {
	var db = new sqlite3.Database('./tmp.db');
	db.run('CREATE TABLE IF NOT EXISTS mlist(time_st INTEGER, path TEXT)');
	//console.log('DBcreated');
	db.serialize(function () {
    	db.all("select name from sqlite_master where type='table'", function (err, tables) {
        	console.log(tables);
    	});
	});
	db.close();
}

let dbCheck = (path) => {
	var db = new sqlite3.Database('./tmp.db');
	let sql = `SELECT *  FROM mlist WHERE path = "${path}"`;
    db.get(sql, (err, row) => {
 
    	let date = new Date;
    	let timestemp = date.getTime() / 1000;
    	if (!row) 
    	{
    		var insertSql = `INSERT INTO mlist (time_st, path) VALUES (${timestemp},"${path}")`;
    		db.run(insertSql);
    		console.log('INSERT');
    		db.all('SELECT * FROM mlist', (err, rows) => {
    			rows.forEach((row) => {
    				console.log(row);
    			});
    		});
    	}
    	else 
    	{
    		var insertSql2 = `UPDATE mlist SET time_st = ${timestemp} WHERE path = "${path}"`;
    		db.run(insertSql2);
    		console.log('UPDATE');
    		db.all('SELECT * FROM mlist', (err, rows) => {
    			rows.forEach((row) => {
    				console.log(row);
    			});
    		});
    	}
    });
	db.close();
}

let dbBupath = () => {
	let date = new Date;
	var db = new sqlite3.Database('./tmp.db');
	const months = 2592000;
	//const months = 10;
   	let timestemp = date.getTime() / 1000;
   	let sql = `SELECT * FROM mlist`;

   	db.all(sql, [], function(err, rows)  {

   		  rows.forEach(function(row) {
   		  	console.log("Path==  " + row.path , "Timestemp== " + row.time_st)
   		  	if ((timestemp - row.time_st) > months) {
   		  		let sd2 = `DELETE FROM mlist WHERE path = "${row.path}"`;
   		  		console.log('DELETE', row);
   		  		db.run(sd2);
   		  		fs.exists(row.path, (exists) => {
   		  			fs.unlink(row.path, (err) => {});
   		  		});
   		  	}
  		});
   	});
}

module.exports = {
    dbInit,
    dbCheck,
    dbBupath
};