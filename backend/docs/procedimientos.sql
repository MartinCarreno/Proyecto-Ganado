

-- Este procedimiento agrega un parto y, si es exitoso, registra una nueva cría.
DELIMITER $$

CREATE PROCEDURE registrar_parto (
    IN p_animal_id INT,
    IN p_fecha DATE,
    IN p_resultado ENUM('exitoso','fallido'),
    IN sexo ENUM('M','F'),
    IN p_cria_nombre VARCHAR(100)
)
BEGIN
    INSERT INTO partos (animal_id, fecha, resultado, cria_nombre)
    VALUES (p_animal_id, p_fecha, p_resultado, p_cria_nombre);

    IF p_resultado = 'exitoso' THEN
        INSERT INTO animales (nombre, tipo, sexo, raza, fecha_nacimiento, estado)
        SELECT p_cria_nombre, 'cría', sexo, raza, p_fecha, 'activo'
        FROM animales WHERE id = p_animal_id;
    END IF;
END$$

DELIMITER ;


-- Este procedimiento actualiza el peso de un animal dado su ID.
DELIMITER $$

CREATE PROCEDURE actualizar_peso (
    IN p_animal_id INT,
    IN nuevo_peso DECIMAL(5,2)
)
BEGIN
    UPDATE animales
    SET peso = nuevo_peso
    WHERE id = p_animal_id;
END$$

DELIMITER ;

--Los Siguentes Procedimientos son para obtener resúmenes mas eficientes.

-- Este procedimiento devuelve un resumen de los animales activos, incluyendo su edad y promedio de leche.
DELIMITER //
CREATE PROCEDURE resumen_animales()
BEGIN
  SELECT 
    a.id,
    a.nombre,
    a.tipo,
    a.sexo,
    a.raza,
    a.estado,
    edad_animal(a.id) AS edad,
    promedio_leche(a.id) AS promedio
  FROM animales a
  WHERE a.estado = 'activo';
END
//
DELIMITER ;


-- Este procedimiento devuelve un resumen general de los animales activos, incluyendo el total, edad promedio y promedio de leche.
DELIMITER //
CREATE PROCEDURE resumen_general()
BEGIN
  SELECT 
    COUNT(*) AS total_animales,
    ROUND(AVG(edad_animal(id)), 2) AS edad_promedio,
    ROUND(AVG(promedio_leche(id)), 2) AS promedio_general
  FROM animales
  WHERE estado = 'activo';
END;
//
DELIMITER ;


-- Este procedimiento devuelve los 5 productores con mayor promedio de leche.
DELIMITER //
CREATE PROCEDURE top_productores()
BEGIN
  SELECT 
    a.id, a.nombre, ROUND(promedio_leche(a.id), 2) AS promedio
  FROM animal a
  WHERE a.estado = 'activo'
  ORDER BY promedio DESC
  LIMIT 5;
END;
//
DELIMITER ;

-- Este procedimiento devuelve un resumen de los partos, agrupados por resultado (exitoso o fallido).
DELIMITER //
CREATE PROCEDURE resumen_partos()
BEGIN
  SELECT 
    resultado, COUNT(*) AS cantidad
  FROM parto
  GROUP BY resultado;
END;
//
DELIMITER ;