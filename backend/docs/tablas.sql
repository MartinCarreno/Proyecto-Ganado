
-- Tablas para la base de datos del sistema de gestión de ganado

-- Usuarios
CREATE TABLE usuarios (
    id INT AUTO_INCREMENT PRIMARY KEY,
    nombre VARCHAR(100) NOT NULL,
    email VARCHAR(100) NOT NULL UNIQUE,
    contraseña VARCHAR(255) NOT NULL
);


-- Animales
CREATE TABLE animales (
    id INT AUTO_INCREMENT PRIMARY KEY,
    nombre VARCHAR(100),
    tipo ENUM('vaca', 'toro', 'cría') NOT NULL,
    raza VARCHAR(100),
    fecha_nacimiento DATE,
    peso DECIMAL(5,2),
    estado ENUM('activo', 'inactivo') DEFAULT 'activo'
);

-- Registros de salud
CREATE TABLE vacunas (
    id INT AUTO_INCREMENT PRIMARY KEY,
    animal_id INT,
    nombre_vacuna VARCHAR(100),
    fecha_aplicacion DATE,
    veterinario VARCHAR(100),
    FOREIGN KEY (animal_id) REFERENCES animales(id)
);


-- Partos
CREATE TABLE partos (
    id INT AUTO_INCREMENT PRIMARY KEY,
    animal_id INT,
    fecha DATE,
    resultado ENUM('exitoso', 'fallido'),
    cria_nombre VARCHAR(100),
    FOREIGN KEY (animal_id) REFERENCES animales(id)
);


-- Producción de leche
CREATE TABLE produccion (
    id INT AUTO_INCREMENT PRIMARY KEY,
    animal_id INT,
    fecha DATE,
    litros DECIMAL(4,2),
    FOREIGN KEY (animal_id) REFERENCES animales(id)
);