DROP DATABASE IF EXISTS animal_shelter;

CREATE DATABASE animal_shelter;

USE animal_shelter;

/* Tabla tipo de usuairos */
CREATE TABLE tipos_usuarios (
    id INT NOT NULL AUTO_INCREMENT PRIMARY KEY,
    usuario VARCHAR(255) NOT NULL
);

/* Tabla usuarios */
CREATE TABLE usuarios (
    id INT NOT NULL AUTO_INCREMENT PRIMARY KEY,
    username VARCHAR(255) NOT NULL,
    passwd VARCHAR(255) NOT NULL,
    dni VARCHAR(9) NOT NULL,
    nombre VARCHAR(255) NOT NULL,
    apellidos VARCHAR(255) NOT NULL,
    direccion VARCHAR(255) NOT NULL,
    phone VARCHAR(255) NOT NULL,
    email VARCHAR(255) NOT NULL,
    tipo INT NOT NULL,
    FOREIGN KEY (tipo) REFERENCES tipos_usuarios(id)
);

/* Tabla animales */
CREATE TABLE animals (
    id INT(11) AUTO_INCREMENT PRIMARY KEY,
    nombre VARCHAR(255) NOT NULL,
    species VARCHAR(255) NOT NULL,
    gender ENUM('male', 'female') NOT NULL,
    birthdate DATE NOT NULL,
    picture VARCHAR(255) NOT NULL
);

/* Tabla adopciones */
CREATE TABLE adoptions (
    id INT NOT NULL AUTO_INCREMENT PRIMARY KEY,
    adoption_date DATE NOT NULL,
    animal_id INT NOT NULL,
    adoptante_id INT NOT NULL,
    FOREIGN KEY (animal_id) REFERENCES animals(id),
    FOREIGN KEY (adoptante_id) REFERENCES usuarios(id)
);

-- Tabla de donaciones
CREATE TABLE donations (
    id INT NOT NULL AUTO_INCREMENT PRIMARY KEY,
    donation_date DATE NOT NULL,
    amount DECIMAL(10, 2) NOT NULL,
    donador_id INT,
    FOREIGN KEY (donador_id) REFERENCES usuarios(id)
);

-- Tabla de historial médico
CREATE TABLE medical_history (
    id INT NOT NULL AUTO_INCREMENT PRIMARY KEY,
    visit_date DATE NOT NULL,
    treatment VARCHAR(255) NOT NULL,
    observations VARCHAR(255) NOT NULL,
    animal_id INT NOT NULL,
    id_veterinario INT NOT NULL,
    FOREIGN KEY (animal_id) REFERENCES animals(id),
    FOREIGN KEY (id_veterinario) REFERENCES usuarios(id)
);