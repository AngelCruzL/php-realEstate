CREATE DATABASE bienes_raices;

USE bienes_raices;

CREATE TABLE sellers(
  id INT(11) PRIMARY KEY AUTO_INCREMENT,
  firstname VARCHAR(50) NOT NULL,
  lastname VARCHAR(50) NOT NULL,
  phone VARCHAR(10) NOT NULL
);

CREATE TABLE estates(
  id INT NOT NULL AUTO_INCREMENT PRIMARY KEY,
  title VARCHAR(60),
  price DECIMAL(10,2),
  image VARCHAR(200),
  description LONGTEXT,
  bedrooms INT(1),
  bathrooms INT(1),
  park INT(1),
  created_at DATE,
  seller_id INT(11) REFERENCES seller(id)
);

INSERT INTO sellers(
  firstname,
  lastname,
  phone
) VALUES(
  'John',
  'Doe',
  '1234567890'
),(
  'Luis',
  'Lara',
  '1234567890'
);
