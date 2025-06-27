
//Conexion a la DB 
const mysql = require('mysql2');

//Con un Pool es mas eficiente que crear una conexion cada vez que se necesite
const pool = mysql.createPool({
  host: 'localhost',
  port: 3306,
  user: 'root',
  password: 'admin',
  database: 'ganaderia'
});

// Probar conexión al iniciar
pool.getConnection((err, connection) => {
  if (err) {
    console.error('Error al conectar a la base de datos:', err.message);
  } else {
    console.log('Conexión a la base de datos exitosa');
    connection.release();
  }
});


module.exports = pool.promise();
