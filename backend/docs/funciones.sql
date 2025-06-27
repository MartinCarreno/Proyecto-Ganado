
-- Función para calcular la edad de un animal en años
DELIMITER $$

CREATE FUNCTION edad_animal(p_id INT)
RETURNS INT
DETERMINISTIC
BEGIN
    DECLARE edad INT;
    SELECT TIMESTAMPDIFF(YEAR, fecha_nacimiento, CURDATE())
    INTO edad
    FROM animal
    WHERE id = p_id;
    RETURN edad;
END$$

DELIMITER ;



-- Función para calcular el promedio de litros de leche producidos por un animal
DELIMITER $$

CREATE FUNCTION promedio_leche(p_id INT)
RETURNS DECIMAL(5,2)
DETERMINISTIC
BEGIN
    DECLARE promedio DECIMAL(5,2);
    SELECT AVG(litros)
    INTO promedio
    FROM produccion
    WHERE animal_id = p_id;
    RETURN IFNULL(promedio, 0);
END$$

DELIMITER ;