

-- Evita registrar ordeñas con litros negativos o cero.
CREATE TRIGGER validar_litros_produccion
BEFORE INSERT ON produccion
FOR EACH ROW
BEGIN
    IF NEW.litros <= 0 THEN
        SIGNAL SQLSTATE '45000'
        SET MESSAGE_TEXT = 'La cantidad de litros debe ser mayor a cero.';
    END IF;
END;


-- En lugar de borrar realmente, marcamos el estado como "inactivo".
CREATE TRIGGER antes_de_eliminar_animal
BEFORE DELETE ON animales
FOR EACH ROW
BEGIN
    SIGNAL SQLSTATE '45000'
    SET MESSAGE_TEXT = 'No se permite eliminar animales. Cambia el estado a inactivo.';
END;