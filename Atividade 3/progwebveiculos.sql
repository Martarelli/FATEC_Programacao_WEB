DROP DATABASE IF EXISTS progwebveiculos;
CREATE DATABASE progwebveiculos;

CREATE TABLE veiculos (
    id INT AUTO_INCREMENT PRIMARY KEY,
    marca VARCHAR(255) NOT NULL,
    modelo VARCHAR(255) NOT NULL,
    cor VARCHAR(50) NOT NULL,
    anoFabricacao INT NOT NULL,
    anoModelo INT NOT NULL,
    combustivel VARCHAR(50) NOT NULL,
    preco DECIMAL(10, 2) NOT NULL,
    detalhes TEXT,
    foto VARCHAR(255)
);

CREATE TABLE vendedores (
    id INT AUTO_INCREMENT PRIMARY KEY,
    nome VARCHAR(255) NOT NULL,
    email VARCHAR(255) NOT NULL,
    telefone VARCHAR(50) NOT NULL
);

-- Inserir carros
INSERT INTO veiculos (marca, modelo, cor, anoFabricacao, anoModelo, combustivel, preco, detalhes, foto)
VALUES ('Toyota', 'Corolla', 'Prata', 2020, 2020, 'Gasolina', 80000.00, 'Carro em ótimo estado.', 'img/corolla2020.jpg');

INSERT INTO veiculos (marca, modelo, cor, anoFabricacao, anoModelo, combustivel, preco, detalhes, foto)
VALUES ('Honda', 'Civic', 'Preto', 2021, 2021, 'Gasolina', 85000.00, 'Civic top de linha.', 'img/civic2021.jpg');

INSERT INTO veiculos (marca, modelo, cor, anoFabricacao, anoModelo, combustivel, preco, detalhes, foto)
VALUES ('Ford', 'Focus', 'Branco', 2019, 2019, 'Gasolina', 75000.00, 'Carro econômico e confortável.', 'img/focus2019.jpg');

INSERT INTO veiculos (marca, modelo, cor, anoFabricacao, anoModelo, combustivel, preco, detalhes, foto)
VALUES ('Chevrolet', 'Cruze', 'Vermelho', 2021, 2021, 'Gasolina', 88000.00, 'Cruze esportivo.', 'img/cruze2021.jpg');

INSERT INTO veiculos (marca, modelo, cor, anoFabricacao, anoModelo, combustivel, preco, detalhes, foto)
VALUES ('Volkswagen', 'Golf', 'Azul', 2016, 2017, 'Gasolina', 76000.00, 'Golf em excelente estado.', 'img/golf2016.jpg');

INSERT INTO vendedores (nome, email, telefone)
VALUES ('Renan Martarelli', 'martarelli@example.com', '999992030');

INSERT INTO vendedores (nome, email, telefone)
VALUES ('Gabriela Souza', 'souza@example.com', '997852030');

INSERT INTO vendedores (nome, email, telefone)
VALUES ('João Santos', 'santos@example.com', '999553630');

INSERT INTO vendedores (nome, email, telefone)
VALUES ('Mariazinha', 'maria@example.com', '955363030');

INSERT INTO vendedores (nome, email, telefone)
VALUES ('Pedro Henrique', 'henrique@example.com', '991257630');