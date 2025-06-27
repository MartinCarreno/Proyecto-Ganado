
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