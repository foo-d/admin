/* npm i mysql */
/* npm i express */
/* npm i path */
// const MYSQL = require('mysql');
// const DB = MYSQL.createConnection({
//     host: 'localhost',
//     user: 'root',
//     password: '',
//     database: 'food'
// });
//
// function login () {
//     DB.connect(
//         DB.query('SELECT * FROM admin WHERE email = "' +
//             document.getElementById('email') + '" AND password = "' +
//             document.getElementById('password') + '"', (err, rows) => {
//             console.log(rows);
//         })
//     );
// }
const http = require('http');
const fs = require('fs');
const express = require('express');
const path = require('path');

const app = express();

fs.readFile('./index.html', function (err, html) {
    const hostname = '127.0.0.1';
    const port = 3000;

    const server = http.createServer((req, res) => {
        res.statusCode = 200;
        res.setHeader('Content-Type', 'text/html');
        res.write(html);
        res.end();
    });

    server.listen(port, hostname, () => {
        console.log(`Server running at http://${hostname}:${port}/`);
    });
});
