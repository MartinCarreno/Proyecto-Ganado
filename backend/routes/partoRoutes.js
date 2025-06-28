const express = require('express');
const router = express.Router();
const controller = require('../controllers/partoController');

router.get('/animal/:id', controller.getByAnimal);

module.exports = router;