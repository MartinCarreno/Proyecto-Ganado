const db = require('../db');

module.exports = {
  getAll: () => db.query('SELECT * FROM vacuna'),
  getByAnimal: (id) => db.query('SELECT * FROM vacuna WHERE animal_id = ?', [id]),
  create: (v) =>
    db.query('INSERT INTO vacuna (animal_id, nombre_vacuna, fecha_aplicacion, veterinario) VALUES (?, ?, ?, ?)', [
      v.animal_id, v.nombre_vacuna, v.fecha_aplicacion, v.veterinario
    ]),
  delete: (id) => db.query('DELETE FROM vacuna WHERE id = ?', [id]),
};
