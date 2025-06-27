const db = require('../db');

module.exports = {
  getByAnimal: (id) => db.query('SELECT * FROM produccion WHERE animal_id = ?', [id]),
  create: (p) =>
    db.query('INSERT INTO produccion (animal_id, fecha, litros) VALUES (?, ?, ?)', [
      p.animal_id, p.fecha, p.litros
    ]),
  delete: (id) => db.query('DELETE FROM produccion WHERE id = ?', [id])
};
