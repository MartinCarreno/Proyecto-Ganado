const Parto = require('../models/partoModel');

exports.getByAnimal = async (req, res) => {
  const [rows] = await Parto.getByAnimal(req.params.id);
  res.json(rows);
};