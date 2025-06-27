
//Conexion a la DB 
const mysql = require('mysql2');

//Con un Pool es mas eficiente que crear una conexion cada vez que se necesite
const pool = mysql.createPool({
  host: 'localhost',
  user: 'root',
  password: 'admin',
  database: 'ganaderia'
});

module.exports = pool.promise();
