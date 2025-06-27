const Vacuna = require('../models/vacunaModel');

exports.getAll = async (req, res) => {
  const [rows] = await Vacuna.getAll();
  res.json(rows);
};

exports.getByAnimal = async (req, res) => {
  const [rows] = await Vacuna.getByAnimal(req.params.id);
  res.json(rows);
};

exports.create = async (req, res) => {
  await Vacuna.create(req.body);
  res.json({ status: 'Vacuna registrada' });
};

exports.delete = async (req, res) => {
  await Vacuna.delete(req.params.id);
  res.json({ status: 'Vacuna eliminada' });
};
