Proyecto de Gestión de Ganado
=============================

Este sistema permite gestionar animales, partos, vacunas y producción lechera en una base de datos MySQL, con backend en Node.js y frontend en PHP.

Estructura del Proyecto
-----------------------
backend/
  - app.js                // Servidor principal Node.js
  - db.js                 // Conexión a MySQL
  - models/               // Modelos de datos (animal, vacuna, parto, producción, etc.)
  - controllers/          // Controladores para cada entidad
  - routes/               // Rutas Express para la API REST
  - docs/                 // Scripts SQL: tablas, procedimientos, triggers, funciones

frontend/
  - index.php             // Página principal con listado de animales y acciones
  - crear.php             // Formulario para registrar animales
  - editar.php            // Editar datos de un animal
  - eliminar.php          // Inactivar animal
  - crear_parto.php       // Registrar parto
  - registrar_vacuna.php  // Registrar vacuna
  - registrar_produccion.php // Registrar producción lechera
  - registro.php          // Ver historial de un animal (vacunas, partos, producción)
  - estadisticas.php      // Estadísticas generales

Instalación y Primeros Pasos
----------------------------
1. Instalaciones
   - Instalar PHP
   - Instalar Node.js y dar acceso a instalaciones por npm
   - Instala MySQL y crea la base de datos `ganaderia`.


2. Ejecuta los scripts SQL en `backend/docs/` en este orden:
   - tablas.sql
   - funciones.sql
   - procedimientos.sql
   - triggers.sql

3. Instala Node.js y dependencias:
   - En la Carpeta Raiz instalar dependencias:
    'npm install'

4. Inicia el backend:
   - Desde la carpeta `backend`:  
     `npm start`
   - El backend escuchará en `http://localhost:3000`

5. Configura el frontend:
   - Asegúrate de que el servidor web (por ejemplo, XAMPP) apunte a la carpeta `frontend`.
   - Otra opcion es con php, Al tenerlo instalado podemos ejecutar en consola: php -S localhost:8000, luego acceder al link que deja la consola
   - sino, con alguna extension para servir el proyecto desde VScode
   

API REST
--------
- `/api/animales`         [GET, POST, PUT, DELETE]
- `/api/vacunas`          [GET, POST, DELETE]
- `/api/vacunas/animal/:id` [GET] (vacunas por animal)
- `/api/produccion`       [GET, POST, DELETE]
- `/api/produccion/:id`   [GET] (producción por animal)
- `/api/partos/animal/:id` [GET] (partos por animal)
- `/api/utils/resumen`    [GET] (resumen de animales)
- `/api/utils/general`    [GET] (estadísticas generales)
- `/api/utils/parto`      [POST] (registrar parto)
- `/api/utils/top`        [GET] (top productores)
- `/api/utils/partos`     [GET] (resumen de partos)

Notas Técnicas
--------------
- El backend usa Express y MySQL2. (Node.js)
- El frontend es PHP puro y consume la API REST.
- Los procedimientos y triggers están en `backend/docs/`.
- El sistema solo permite registrar partos para vacas hembras activas.
- El campo `sexo` es `M` (macho) o `F` (hembra).
