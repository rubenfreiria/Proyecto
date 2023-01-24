CREATE DATABASE animal_shelter;

USE animal_shelter;

-- Tabla de animales
CREATE TABLE animals (
    id INT NOT NULL AUTO_INCREMENT PRIMARY KEY,
    name VARCHAR(255) NOT NULL,
    species VARCHAR(255) NOT NULL,
    gender ENUM('male', 'female') NOT NULL,
    birthdate DATE NOT NULL,
    picture VARCHAR(255) NOT NULL
);

-- Tabla de adoptantes
CREATE TABLE adopters (
    id INT NOT NULL AUTO_INCREMENT PRIMARY KEY,
    name VARCHAR(255) NOT NULL,
    address VARCHAR(255) NOT NULL,
    phone VARCHAR(255) NOT NULL,
    email VARCHAR(255) NOT NULL
);

-- Tabla de adopciones
CREATE TABLE adoptions (
    id INT NOT NULL AUTO_INCREMENT PRIMARY KEY,
    adoption_date DATE NOT NULL,
    animal_id INT NOT NULL,
    adopter_id INT NOT NULL,
    FOREIGN KEY (animal_id) REFERENCES animals(id),
    FOREIGN KEY (adopter_id) REFERENCES adopters(id)
);

-- Tabla de voluntarios
CREATE TABLE volunteers (
    id INT NOT NULL AUTO_INCREMENT PRIMARY KEY,
    name VARCHAR(255) NOT NULL,
    phone VARCHAR(255) NOT NULL,
    email VARCHAR(255) NOT NULL
);

-- Tabla de proveedores
CREATE TABLE providers (
    id INT NOT NULL AUTO_INCREMENT PRIMARY KEY,
    company_name VARCHAR(255) NOT NULL,
    contact VARCHAR(255) NOT NULL,
    products_services VARCHAR(255) NOT NULL
);

-- Tabla de eventos
CREATE TABLE events (
    id INT NOT NULL AUTO_INCREMENT PRIMARY KEY,
    date DATE NOT NULL,
    location VARCHAR(255) NOT NULL,
    description VARCHAR(255) NOT NULL
);

-- Tabla de donaciones
CREATE TABLE donations (
    id INT NOT NULL AUTO_INCREMENT PRIMARY KEY,
    donation_date DATE NOT NULL,
    amount DECIMAL(10, 2) NOT NULL,
    payment_method VARCHAR(255) NOT NULL
);

-- Tabla de veterinarios
CREATE TABLE veterinarians (
    id INT NOT NULL AUTO_INCREMENT PRIMARY KEY,
    name VARCHAR(255) NOT NULL,
    specialty VARCHAR(255) NOT NULL,
    phone VARCHAR(255) NOT NULL
);

-- Tabla de historial médico
CREATE TABLE medical_history (
    id INT NOT NULL AUTO_INCREMENT PRIMARY KEY,
    visit_date DATE NOT NULL,
    treatment VARCHAR(255) NOT NULL,
    observations VARCHAR(255) NOT NULL,
    animal_id INT NOT NULL,
    veterinarian_id INT NOT NULL,
    FOREIGN KEY (animal_id) REFERENCES animals(id),
    FOREIGN KEY (veterinarian_id) REFERENCES veterinarians(id)
);

-- Tabla de usuarios
CREATE TABLE users (
    id INT NOT NULL AUTO_INCREMENT PRIMARY KEY,
    username VARCHAR(255) NOT NULL,
    password VARCHAR(255) NOT NULL,
    access_level ENUM('administrator', 'standard', 'read-only') NOT NULL
);