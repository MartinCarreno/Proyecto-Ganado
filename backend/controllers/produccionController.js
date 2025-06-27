const Produccion = require('../models/produccionModel');

exports.getByAnimal = async (req, res) => {
  const [rows] = await Produccion.getByAnimal(req.params.id);
  res.json(rows);
};

exports.create = async (req, res) => {
  await Produccion.create(req.body);
  res.json({ status: 'Producción registrada' });
};

exports.delete = async (req, res) => {
  await Produccion.delete(req.params.id);
  res.json({ status: 'Registro eliminado' });
};
