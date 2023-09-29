DROP DATABASE IF EXISTS Tasks_RenanMartarelli;

CREATE DATABASE Tasks_RenanMartarelli;
USE Tasks_RenanMartarelli;

CREATE TABLE IF NOT EXISTS Status (
    id INT PRIMARY KEY,
    nome VARCHAR(255) NOT NULL,
    ordem VARCHAR(255) NOT NULL
);

CREATE TABLE IF NOT EXISTS Tarefas (
    id INT AUTO_INCREMENT PRIMARY KEY,
    titulo VARCHAR(255) NOT NULL,
    descricao TEXT,
    atividade TEXT,
    prioridade INT,
    dataInicio DATE,
    dataConclusao DATE,
    dataCadastro DATETIME DEFAULT CURRENT_TIMESTAMP,
    status_id INT,
    FOREIGN KEY (status_id) REFERENCES Status(id)
);