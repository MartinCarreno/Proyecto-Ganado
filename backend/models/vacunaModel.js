const db = require('../db');

module.exports = {
  getAll: () => db.query('SELECT * FROM vacunas'),
  getByAnimal: (id) => db.query('SELECT * FROM vacunas WHERE animal_id = ?', [id]),
  create: (v) =>
    db.query('INSERT INTO vacunas (animal_id, nombre_vacuna, fecha_aplicacion, veterinario) VALUES (?, ?, ?, ?)', [
      v.animal_id, v.nombre_vacuna, v.fecha_aplicacion, v.veterinario
    ]),
  delete: (id) => db.query('DELETE FROM vacunas WHERE id = ?', [id]),
};
