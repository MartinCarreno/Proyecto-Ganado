//Con este archivo se llama en la terminal (hay que colocar: npm start en la terminal de la carpeta backend)

const express = require('express');
const cors = require('cors');
const app = express();
const port = 3000;

// Middlewares
app.use(cors());
app.use(express.json());

// Rutas
const animalRoutes = require('./routes/animalRoutes');
const vacunaRoutes = require('./routes/vacunaRoutes');
const produccionRoutes = require('./routes/produccionRoutes');
const utilsRoutes = require('./routes/utilsRoutes');

// Usar rutas con prefijo /api
app.use('/api/animales', animalRoutes);
app.use('/api/vacunas', vacunaRoutes);
app.use('/api/produccion', produccionRoutes);
app.use('/api/utils', utilsRoutes);

// Inicio del servidor
app.listen(port, () => {
  console.log(`Servidor backend escuchando en http://localhost:${port}`);
});
