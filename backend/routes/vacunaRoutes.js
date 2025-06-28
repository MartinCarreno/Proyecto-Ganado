

const express = require('express');
const router = express.Router();
const controller = require('../controllers/vacunaController');

router.get('/', controller.getAll);
router.get('/animal/:id', controller.getByAnimal);
router.post('/', controller.create);
router.delete('/:id', controller.delete);

module.exports = router;
