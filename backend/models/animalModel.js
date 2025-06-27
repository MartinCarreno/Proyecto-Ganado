const db = require('../db');

module.exports = {
  getAll: () => db.query('SELECT * FROM animal'),
  getById: (id) => db.query('SELECT * FROM animal WHERE id = ?', [id]),
  create: (data) =>
    db.query('INSERT INTO animal (nombre, tipo, raza, fecha_nacimiento, peso) VALUES (?, ?, ?, ?, ?)', [
      data.nombre, data.tipo, data.raza, data.fecha_nacimiento, data.peso
    ]),
  update: (id, data) =>
    db.query('UPDATE animal SET nombre=?, tipo=?, raza=?, fecha_nacimiento=?, peso=?, estado=? WHERE id=?', [
      data.nombre, data.tipo, data.raza, data.fecha_nacimiento, data.peso, data.estado, id
    ]),
  softDelete: (id) => db.query('UPDATE animal SET estado="inactivo" WHERE id=?', [id]),
};
