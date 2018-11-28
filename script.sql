-- MySQL Workbench Forward Engineering

SET @OLD_UNIQUE_CHECKS=@@UNIQUE_CHECKS, UNIQUE_CHECKS=0;
SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0;
SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='TRADITIONAL,ALLOW_INVALID_DATES';

-- -----------------------------------------------------
-- Schema turma
-- -----------------------------------------------------

-- -----------------------------------------------------
-- Schema turma
-- -----------------------------------------------------
CREATE SCHEMA IF NOT EXISTS `turma` DEFAULT CHARACTER SET utf8 ;
USE `turma` ;

-- -----------------------------------------------------
-- Table `turma`.`aluno`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `turma`.`aluno` (
  `id_aluno` INT(10) UNSIGNED NOT NULL AUTO_INCREMENT,
  `nome_aluno` VARCHAR(255) NULL DEFAULT NULL,
  `idcurso` INT(11) NOT NULL,
  PRIMARY KEY (`id_aluno`))
ENGINE = InnoDB
AUTO_INCREMENT = 4
DEFAULT CHARACTER SET = utf8;

CREATE INDEX `fk_aluno_curso1_idx` ON `turma`.`aluno` (`idcurso` ASC);


-- -----------------------------------------------------
-- Table `turma`.`professor`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `turma`.`professor` (
  `idprofessor` INT(11) NOT NULL AUTO_INCREMENT,
  `nome` VARCHAR(255) NULL DEFAULT NULL,
  PRIMARY KEY (`idprofessor`))
ENGINE = InnoDB
AUTO_INCREMENT = 3
DEFAULT CHARACTER SET = utf8;


-- -----------------------------------------------------
-- Table `turma`.`curso`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `turma`.`curso` (
  `idcurso` INT(11) NOT NULL AUTO_INCREMENT,
  `nome` VARCHAR(45) NULL DEFAULT NULL,
  `idprofessor` INT(11) NOT NULL,
  PRIMARY KEY (`idcurso`))
ENGINE = InnoDB
AUTO_INCREMENT = 2
DEFAULT CHARACTER SET = utf8;

CREATE INDEX `fk_curso_professor_idx1` ON `turma`.`curso` (`idprofessor` ASC);


SET SQL_MODE=@OLD_SQL_MODE;
SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS;
SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS;
