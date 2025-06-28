const db = require('../db');

//con esto podemos llamar a las funciones y procedimientos de la base de datos

module.exports = {

    //Funciones para animales
    edadAnimal: (id) =>
        db.query('SELECT edad_animal(?) AS edad', [id]),

    promedioLeche: (id) =>
        db.query('SELECT promedio_leche(?) AS promedio', [id]),

    //Procedimientos almacenados
    actualizarPeso: (id, peso) =>
        db.query('CALL actualizar_peso(?, ?)', [id, peso]),

    registrarParto: (animal_id, fecha, resultado, sexo, cria_nombre) =>
        db.query('CALL registrar_parto(?, ?, ?, ?, ?)', [animal_id, fecha, resultado, sexo, cria_nombre]),

    resumenAnimales: () => 
        db.query(`CALL resumen_animales()`),

    resumenGeneral: () => 
        db.query(`CALL resumen_general()`),

    //Procedimientos para estadistica general
    topProductores: () => 
        db.query('CALL top_productores()'),

    resumenPartos: () => 
        db.query('CALL resumen_partos()')



};
