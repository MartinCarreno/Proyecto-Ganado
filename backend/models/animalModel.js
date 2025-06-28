const db = require('../db');

module.exports = {
  getAll: () => db.query('SELECT * FROM animales'),
  getById: (id) => db.query('SELECT * FROM animales WHERE id = ?', [id]),
  create: (data) =>
    db.query('INSERT INTO animales (nombre, tipo, sexo, raza, fecha_nacimiento, peso) VALUES (?, ?, ?, ?, ?, ?)', [
      data.nombre, data.tipo, data.sexo, data.raza, data.fecha_nacimiento, data.peso
    ]),
  update: (id, data) =>
    db.query('UPDATE animales SET nombre=?, tipo=?, sexo=?, raza=?, fecha_nacimiento=?, peso=?, estado=? WHERE id=?', [
      data.nombre, data.tipo, data.sexo, data.raza, data.fecha_nacimiento, data.peso, data.estado, id
    ]),
  softDelete: (id) => db.query('UPDATE animales SET estado="inactivo" WHERE id=?', [id]),
};
