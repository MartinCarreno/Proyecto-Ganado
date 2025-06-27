const express = require('express');
const cors = require('cors');
const app = express();
const animalRoutes = require('./routes/animalRoutes');
const utilsRoutes = require('./routes/utilsRoutes');
const vacunaRoutes = require('./routes/vacunaRoutes');
const produccionRoutes = require('./routes/produccionRoutes');


app.use('/api/produccion', produccionRoutes);

app.use('/api/vacunas', vacunaRoutes);

app.use('/api/utils', utilsRoutes);

app.use(cors());
app.use(express.json());

app.use('/api/animales', animalRoutes);

const PORT = 3000;
app.listen(PORT, () => {
  console.log(`Servidor backend corriendo en http://localhost:${PORT}`);
});
