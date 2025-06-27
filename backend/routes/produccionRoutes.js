const express = require('express');
const router = express.Router();
const controller = require('../controllers/produccionController');

router.get('/:id', controller.getByAnimal);
router.post('/', controller.create);
router.delete('/:id', controller.delete);

module.exports = router;
