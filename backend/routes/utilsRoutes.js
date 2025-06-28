const express = require('express');
const router = express.Router();
const utils = require('../models/utilsModel');
const db = require('../db'); 

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
  const { animal_id, fecha, resultado, sexo, cria_nombre } = req.body;

  // Validación: solo vacas hembras activas
  const [rows] = await db.query(
    'SELECT * FROM animales WHERE id = ? AND tipo = "vaca" AND sexo = "F" AND estado = "activo"',
    [animal_id]
  );
  if (rows.length === 0) {
    return res.status(400).json({ error: 'Solo se puede registrar parto para vacas hembras activas.' });
  }

  await utils.registrarParto(animal_id, fecha, resultado, sexo, cria_nombre);
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

// Procedimientos para estadística general

// Top productores
router.get('/top', async (req, res) => {
  const [result] = await utils.topProductores();
  res.json(result);
});

// Total partos
router.get('/partos', async (req, res) => {
  const [result] = await utils.resumenPartos();
  res.json(result);
});



module.exports = router;
