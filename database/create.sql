CREATE DATABASE IF NOT EXISTS poozoo;

USE poozoo;

CREATE TABLE IF NOT EXISTS zoo (
    id_zoo INT PRIMARY KEY AUTO_INCREMENT,
    name_zoo VARCHAR(50),
    created_at DATETIME
);

CREATE TABLE IF NOT EXISTS enclosure (
    id_enclosure INT PRIMARY KEY AUTO_INCREMENT,
    name_enclosure VARCHAR(50),
    cleanness VARCHAR(50),
    type VARCHAR(50),
    id_zoo INT REFERENCES zoo(id_zoo)
);

CREATE TABLE IF NOT EXISTS species (
    id_species INT PRIMARY KEY AUTO_INCREMENT,
    label VARCHAR(50)
);

CREATE TABLE IF NOT EXISTS animal (
    id_animal INT PRIMARY KEY AUTO_INCREMENT,
    name_animal VARCHAR(50),
    age INT,
    weight FLOAT,
    size FLOAT,
    is_hungry BOOLEAN,
    is_sleeping BOOLEAN,
    is_sick BOOLEAN,
    id_enclosure INT REFERENCES enclosure(id_enclosure),
    id_species INT REFERENCES species(id_species)
);

CREATE TABLE IF NOT EXISTS employee (
    id_employee INT PRIMARY KEY AUTO_INCREMENT,
    name_employee VARCHAR(50),
    date_of_birth DATE,
    sex_employee CHAR,
    created_at DATETIME
);

CREATE TABLE IF NOT EXISTS employee_zoo (
    id_employee INT PRIMARY KEY REFERENCES employee(id_employee),
    id_zoo INT REFERENCES zoo(id_zoo),
    since DATETIME
);
