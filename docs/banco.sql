CREATE DATABASE turma;

CREATE TABLE aluno (
  id_aluno INTEGER UNSIGNED NOT NULL AUTO_INCREMENT,
  nome_aluno VARCHAR(255) NULL,
  curso_aluno VARCHAR(255) NULL,
  tel_aluno VARCHAR(25) NULL,
  PRIMARY KEY(id_aluno)
);
