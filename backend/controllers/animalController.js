const Animal = require('../models/animalModel');

exports.getAll = async (req, res) => {
  const [rows] = await Animal.getAll();
  res.json(rows);
};

exports.getById = async (req, res) => {
  const [rows] = await Animal.getById(req.params.id);
  res.json(rows[0]);
};

exports.create = async (req, res) => {
  console.log(req.body);
  await Animal.create(req.body);
  res.json({ status: 'Animal creado' });
};

exports.update = async (req, res) => {
  await Animal.update(req.params.id, req.body);
  res.json({ status: 'Animal actualizado' });
};

exports.delete = async (req, res) => {
  await Animal.softDelete(req.params.id);
  res.json({ status: 'Animal inactivado' });
};
