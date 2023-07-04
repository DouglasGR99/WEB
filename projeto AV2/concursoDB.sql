CREATE DATABASE Concurso
DEFAULT CHARACTER SET utf8
DEFAULT COLLATE utf8_general_ci;
USE Concurso;

CREATE TABLE candidato (
CPF INT NOT NULL,
nome VARCHAR(40),
RG INT,
email VARCHAR(40),
cargo VARCHAR(40),
cod_sala INT,
PRIMARY KEY (CPF),
FOREIGN KEY (cod_sala) REFERENCES sala (cod_sala)
);

CREATE TABLE fiscal (
CPF INT NOT NULL,
nome VARCHAR(40),
cod_sala INT,
PRIMARY KEY (CPF),
FOREIGN KEY (cod_sala) REFERENCES sala (cod_sala)
);

CREATE TABLE sala (
cod_sala INT NOT NULL,
cpf_cand INT,
cpf_fisc INT,
PRIMARY KEY (cod_sala)
);

ALTER TABLE sala
ADD CONSTRAINT cpf_cand
FOREIGN KEY (cpf_cand) REFERENCES candidato (CPF);

ALTER TABLE sala
ADD CONSTRAINT cpf_fisc
FOREIGN KEY (cpf_fisc) REFERENCES fiscal (CPF);

