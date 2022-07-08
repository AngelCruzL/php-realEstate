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

INSERT INTO estates(
  title,
  price,
  image,
  description,
  bedrooms,
  bathrooms,
  park,
  created_at,
  seller_id
) VALUES(
  'Casa frente al lago',
  '1000000',
  'https://images.unsplash.com/photo-1518791841217-8f162f1e1131?ixlib=rb-1.2.1&ixid=eyJhcHBfaWQiOjEyMDd9&auto=format&fit=crop&w=800&q=60',
  'Casa en buen estado, contiene una gran vista panoramica para el lago.',
  2,
  2,
  1,
  '2020-01-01',
  1
);

CREATE TABLE users(
  id INT NOT NULL AUTO_INCREMENT PRIMARY KEY,
  email VARCHAR(50) UNIQUE NOT NULL,
  password CHAR(60) NOT NULL
);

INSERT INTO users(
  email,
  password
) VALUES(
  'test@test.com',
  '$2y$10$DbWpsqrLGFWoD5zyV2AqQurb66ktagn6mNYMdwUbBviiz3lu60O6S'
)
