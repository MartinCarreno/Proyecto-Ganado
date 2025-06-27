const express = require('express');
const router = express.Router();
const utils = require('../models/utilsModel');

// Función edad
router.get('/edad/:id', async (req, res) => {
  const [result] = await utils.edadAnimal(req.params.id);
  res.json(result[0]);
});

// función promedio leche
router.get('/promedio/:id', async (req, res) => {
  const [result] = await utils.promedioLeche(req.params.id);
  res.json(result[0]);
});

// Procedimiento parto
router.post('/parto', async (req, res) => {
  const { animal_id, fecha, resultado, cria_nombre } = req.body;
  await utils.registrarParto(animal_id, fecha, resultado, cria_nombre);
  res.json({ status: 'Parto registrado' });
});

// Procedimiento Actualizar peso
router.put('/peso/:id', async (req, res) => {
  await utils.actualizarPeso(req.params.id, req.body.peso);
  res.json({ status: 'Peso actualizado' });
});

// resumen de animales
router.get('/resumen', async (req, res) => {
  const [result] = await utils.resumenAnimales();
  res.json(result);
});

// resumen general
router.get('/general', async (req, res) => {
  const [result] = await utils.resumenGeneral();
  res.json(result[0]);
});


module.exports = router;
