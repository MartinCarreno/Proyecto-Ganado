const db = require('../db');

module.exports = {
  getByAnimal: (animal_id) =>
    db.query('SELECT * FROM partos WHERE animal_id = ?', [animal_id]),
};