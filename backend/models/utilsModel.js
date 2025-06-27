const db = require('../db');

//con esto podemos llamar a las funciones y procedimientos de la base de datos

module.exports = {
    edadAnimal: (id) =>
        db.query('SELECT edad_animal(?) AS edad', [id]),

    promedioLeche: (id) =>
        db.query('SELECT promedio_leche(?) AS promedio', [id]),

    actualizarPeso: (id, peso) =>
        db.query('CALL actualizar_peso(?, ?)', [id, peso]),

    registrarParto: (animal_id, fecha, resultado, cria_nombre) =>
        db.query('CALL registrar_parto(?, ?, ?, ?)', [animal_id, fecha, resultado, cria_nombre]),

    resumenAnimales: () => 
        db.query(`CALL resumen_animales()`),

    resumenGeneral: () => 
        db.query(`CALL resumen_general()`),


};
