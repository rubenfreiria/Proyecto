DROP DATABASE IF EXISTS protectora_teis;

CREATE DATABASE protectora_teis;

USE protectora_teis;

/* Tabla usuarios */
CREATE TABLE usuarios (
    id INT NOT NULL AUTO_INCREMENT PRIMARY KEY,
    nombre_usuario VARCHAR(20) NOT NULL,
    passwd VARCHAR(200) NOT NULL,
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

/* Insert a tabla usuarios */
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
        '$2y$10$1UYunAqyJErWotljCrgkSeE6RrH5q48ZOusvdueNK.PbKQKHpaoPa',
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
        '$2y$10$YwJZS8GYOiEx9AgsL.xoK.6cjLEBnbIfmlB5I/773tuM7KEnJMswu',
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
        '$2y$10$Xdgf46oCeyhR6RJXiDCBbe0GZALHVkycBDJ2YmSs0mbHpU1voTj26',
        'veterinario',
        '16754320O',
        'Federico',
        'García',
        'Avenida de Galicia 12',
        '60645342',
        'federico@protectorateis.com'
    );

    /* Insert tabla animales */
    INSERT INTO animales (nombre, genero, especie, raza, fecha_nacimineto, foto) VALUES
    ("Luna", "hembra", "perro", "Pastor Alemán", "2010-06-12", "luna.jpeg"),
    ("Max", "macho", "perro", "Golden Retriever", "2011-03-20", "max.jpeg"),
    ("Buddy", "macho", "perro", "Labrador Retriever", "2008-01-17", "buddy.jpeg"),
    ("Rocky", "macho", "perro", "Bulldog Francés", "2009-12-07", "rocky.jpeg"),
    ("Daisy", "hembra", "perro", "Beagle", "2010-09-13", "daisy.jpeg"),
    ("Charlie", "macho", "gato", "Siames", "2009-05-06", "charlie.jpeg"),
    ("Simba", "macho", "gato", "Persa", "2011-08-04", "simba.jpeg"),
    ("Sasha", "hembra", "gato", "Sphynx", "2008-12-01", "sasha.jpeg"),
    ("Mimi", "hembra", "gato", "Angora", "2011-01-26", "mimi.jpeg"),
    ("Tigre", "macho", "gato", "Maine Coon", "2009-04-08", "tigre.jpeg"),
    ("Nala", "hembra", "gato", "Siamés", "2008-02-23", "nala.jpeg"),
    ("Rufus", "macho", "perro", "Chihuahua", "2010-11-05", "rufus.jpeg"),
    ("Lola", "hembra", "perro", "Cocker Spaniel", "2011-07-12", "lola.jpeg"),
    ("Rock", "macho", "perro", "Doberman", "2007-12-31", "rock.jpeg"),
    ("Lulu", "hembra", "perro", "Poodle", "2008-06-06", "lulu.jpeg"),
    ("Bear", "macho", "perro", "San Bernardo", "2010-02-08", "bear.jpeg");

    /* Insert tabla adopciones */
    INSERT INTO adopciones (fecha_adopcion, id_animal, id_adoptante) VALUES 
    ("2022-12-01", 1, 1), 
    ("2022-10-12", 3, 2), 
    ("2022-09-30", 4, 2), 
    ("2022-07-15", 6, 3), 
    ("2022-05-01", 8, 3), 
    