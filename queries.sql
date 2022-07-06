CREATE DATABASE bienes_raices;

USE bienes_raices;

CREATE TABLE vendedores(
  id INT(11) PRIMARY KEY AUTO_INCREMENT,
  nombre VARCHAR(50) NOT NULL,
  apellido VARCHAR(50) NOT NULL,
  telefono VARCHAR(10) NOT NULL
);

CREATE TABLE propiedades(
  id INT NOT NULL AUTO_INCREMENT PRIMARY KEY,
  titulo VARCHAR(60),
  precio DECIMAL(10,2),
  imagen VARCHAR(200),
  descripcion LONGTEXT,
  habitaciones INT(1),
  wc INT(1),
  estacionamiento INT(1),
  creado DATE,
  vendedor_id INT(11) REFERENCES vendedores(id)
);
