DROP DATABASE IF EXISTS Tasks_RenanMartarelli;

CREATE DATABASE Tasks_RenanMartarelli;

USE Tasks_RenanMartarelli;

CREATE TABLE IF NOT EXISTS Status (
    id INT AUTO_INCREMENT PRIMARY KEY,
    nome VARCHAR(255) NOT NULL
);

CREATE TABLE IF NOT EXISTS Tarefas (
    id INT AUTO_INCREMENT PRIMARY KEY,
    titulo VARCHAR(255) NOT NULL,
    descricao TEXT,
    atividade TEXT,
    prioridade VARCHAR(255),
    dataInicio DATE,
    dataConclusao DATE,
    dataCadastro DATETIME DEFAULT CURRENT_TIMESTAMP,
    status_id INT,
    FOREIGN KEY (status_id) REFERENCES Status(id)
);

INSERT INTO Status (nome) VALUES ("Todo");
INSERT INTO Status (nome) VALUES ("Doing");
INSERT INTO Status (nome) VALUES ("Done");

INSERT INTO Tarefas (titulo, descricao, atividade, prioridade, dataInicio, dataConclusao, status_id)
VALUES 
('Tarefa 1', 'Descrição da Tarefa 1', 'Atividade da Tarefa 1', 'green', '2023-10-01', '2023-10-10', FLOOR(1 + RAND() * 3)),
('Tarefa 2', 'Descrição da Tarefa 2', 'Atividade da Tarefa 2', 'yellow', '2023-10-05', '2023-10-15', FLOOR(1 + RAND() * 3)),
('Tarefa 3', 'Descrição da Tarefa 3', 'Atividade da Tarefa 3', 'red', '2023-09-28', '2023-10-08', FLOOR(1 + RAND() * 3)),
('Tarefa 4', 'Descrição da Tarefa 4', 'Atividade da Tarefa 4', 'green', '2023-10-02', '2023-10-12', FLOOR(1 + RAND() * 3)),
('Tarefa 5', 'Descrição da Tarefa 5', 'Atividade da Tarefa 5', 'yellow', '2023-10-08', '2023-10-18', FLOOR(1 + RAND() * 3));