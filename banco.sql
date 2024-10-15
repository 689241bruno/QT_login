CREATE DATABASE IF NOT EXISTS etimcontato DEFAULT CHARACTER SET utf8;
USE etimcontato;
CREATE TABLE IF NOT EXISTS usuarios(
    id INT NOT NULL AUTO_INCREMENT PRIMARY KEY,
    nome varchar(100),
    email varchar(100),
    senha varchar(32)
);

CREATE TABLE IF NOT EXISTS atividade(
    id INT NOT NULL AUTO_INCREMENT PRIMARY KEY,
    descricao VARCHAR(150),
    nome_prof VARCHAR(45) NOT NULL,
    data_venc DATE NOT NULL
);

