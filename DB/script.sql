DROP DATABASE IF EXISTS protectora_teis;

CREATE DATABASE protectora_teis;

USE protectora_teis;

/* Tabla usuarios */
CREATE TABLE usuarios (
    id INT NOT NULL AUTO_INCREMENT PRIMARY KEY,
    nombre_usuario VARCHAR(20) NOT NULL,
    passwd VARCHAR(36) NOT NULL,
    nivel_acceso ENUM('admin', 'veterinario', 'otro') NOT NULL,
    dni VARCHAR(9) NOT NULL UNIQUE,
    nombre VARCHAR(40) NOT NULL,
    apellidos VARCHAR(60) NOT NULL,
    direccion VARCHAR(100) NOT NULL,
    telefono VARCHAR(20) NOT NULL,
    email VARCHAR(50) NOT NULL UNIQUE
);

/* Tabla animales */
CREATE TABLE animales (
    id INT NOT NULL AUTO_INCREMENT PRIMARY KEY,
    nombre VARCHAR(40) NOT NULL,
    genero ENUM('macho', 'hembra') NOT NULL,
    especie ENUM('perro', 'gato') NOT NULL,
    raza VARCHAR(40) NOT NULL,
    fecha_nacimineto DATE NOT NULL,
    foto VARCHAR(200) NOT NULL
);

/* Tabla adopciones */
CREATE TABLE adopciones (
    id INT NOT NULL AUTO_INCREMENT PRIMARY KEY,
    fecha_adopcion DATE NOT NULL,
    id_animal INT NOT NULL,
    id_adoptante INT NOT NULL,
    FOREIGN KEY (id_animal) REFERENCES animales(id),
    FOREIGN KEY (id_adoptante) REFERENCES usuarios(id)
);

/* Tabla de donaciones */
CREATE TABLE donaciones (
    id INT NOT NULL AUTO_INCREMENT PRIMARY KEY,
    fecha_donacion DATE NOT NULL,
    cantidad DECIMAL(10, 2) NOT NULL,
    donador_id INT,
    FOREIGN KEY (donador_id) REFERENCES usuarios(id)
);

/* Tabla de historial médico */
/* Comprobar si se puede crear la clave con las dos foreing keys */
CREATE TABLE historial_medico (
    id INT NOT NULL AUTO_INCREMENT PRIMARY KEY,
    fecha_visita DATE NOT NULL,
    tratamiento VARCHAR(255) NOT NULL,
    observaciones VARCHAR(255) NOT NULL,
    id_animal INT NOT NULL,
    id_veterinario INT NOT NULL,
    FOREIGN KEY (id_animal) REFERENCES animales(id),
    FOREIGN KEY (id_veterinario) REFERENCES usuarios(id)
);

INSERT INTO
    usuarios (
        nombre_usuario,
        passwd,
        nivel_acceso,
        dni,
        nombre,
        apellidos,
        direccion,
        telefono,
        email
    )
VALUES
    (
        'admin',
        'Abcd1234.',
        'admin',
        '12345678P',
        'Pepe',
        'Perez',
        'Calle Falsa 123',
        '678123456',
        'pepe@pepe.com'
    ),
    (
        'paquito48',
        'renaido',
        'otro',
        '89347578A',
        'Paco',
        'Lopez',
        'Calle no falsa 54',
        '694527090',
        'paquito46@example.com'
    ),
    (
        'federico_01',
        'veteteis',
        'veterinario',
        '16754320O',
        'Federico',
        'García',
        'Avenida de Galicia 12',
        '60645342',
        'federico@protectorateis.com'
    );