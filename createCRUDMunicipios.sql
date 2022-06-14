-- MySQL Script generated by Cristian Camilo Vargas Morales
-- Tue Jun 13 12:38:08 2022
-- Model: New Model    Version: 1.0
-- MySQL Workbench Forward Engineering

SET @OLD_UNIQUE_CHECKS=@@UNIQUE_CHECKS, UNIQUE_CHECKS=0;
SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0;
SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='ONLY_FULL_GROUP_BY,STRICT_TRANS_TABLES,NO_ZERO_IN_DATE,NO_ZERO_DATE,ERROR_FOR_DIVISION_BY_ZERO,NO_ENGINE_SUBSTITUTION';

-- -----------------------------------------------------
-- Schema mydb
-- -----------------------------------------------------
-- -----------------------------------------------------
-- Schema ejericioclase
-- -----------------------------------------------------

-- -----------------------------------------------------
-- Schema ejericioclase
-- -----------------------------------------------------
CREATE SCHEMA IF NOT EXISTS `ejericioclase` DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci ;
USE `ejericioclase` ;

-- -----------------------------------------------------
-- Table `ejericioclase`.`familia`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `ejericioclase`.`familia` (
  `idFamilia` INT NOT NULL AUTO_INCREMENT,
  PRIMARY KEY (`idFamilia`))
ENGINE = InnoDB
AUTO_INCREMENT = 6
DEFAULT CHARACTER SET = utf8mb4
COLLATE = utf8mb4_0900_ai_ci;


-- -----------------------------------------------------
-- Table `ejericioclase`.`municipio`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `ejericioclase`.`municipio` (
  `idMunicipio` INT NOT NULL AUTO_INCREMENT,
  `nombreMunicipio` VARCHAR(30) NOT NULL,
  `areaMunicipio` INT NOT NULL,
  `presupuestoMunicipio` DOUBLE(14,0) NOT NULL,
  PRIMARY KEY (`idMunicipio`))
ENGINE = InnoDB
AUTO_INCREMENT = 5
DEFAULT CHARACTER SET = utf8mb4
COLLATE = utf8mb4_0900_ai_ci;


-- -----------------------------------------------------
-- Table `ejericioclase`.`vivienda`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `ejericioclase`.`vivienda` (
  `idVivienda` INT NOT NULL AUTO_INCREMENT,
  `direccionVivienda` VARCHAR(45) NOT NULL,
  `capacidadVivienda` INT NOT NULL,
  `nivelesVivienda` INT NOT NULL,
  `Municipio_idMunicipio` INT NOT NULL,
  PRIMARY KEY (`idVivienda`),
  INDEX `Vivienda_Municipio` (`Municipio_idMunicipio` ASC) VISIBLE,
  CONSTRAINT `Vivienda_Municipio`
    FOREIGN KEY (`Municipio_idMunicipio`)
    REFERENCES `ejericioclase`.`municipio` (`idMunicipio`))
ENGINE = InnoDB
AUTO_INCREMENT = 9
DEFAULT CHARACTER SET = utf8mb4
COLLATE = utf8mb4_0900_ai_ci;


-- -----------------------------------------------------
-- Table `ejericioclase`.`persona`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `ejericioclase`.`persona` (
  `idPersona` INT NOT NULL AUTO_INCREMENT,
  `nombrePersona` VARCHAR(25) NOT NULL,
  `apellidoPersona` VARCHAR(25) NOT NULL,
  `telefonoPersona` DECIMAL(15,0) NOT NULL,
  `edadPersona` INT NOT NULL,
  `sexoPersona` VARCHAR(18) NOT NULL,
  `Familia_idFamilia` INT NOT NULL,
  `Habita_idVivienda` INT NOT NULL,
  `Municipio_idMunicipio` INT NOT NULL,
  PRIMARY KEY (`idPersona`),
  INDEX `Habita_Vivienda` (`Habita_idVivienda` ASC) VISIBLE,
  INDEX `Persona_Familia` (`Familia_idFamilia` ASC) VISIBLE,
  INDEX `Persona_Municipio` (`Municipio_idMunicipio` ASC) VISIBLE,
  CONSTRAINT `Habita_Vivienda`
    FOREIGN KEY (`Habita_idVivienda`)
    REFERENCES `ejericioclase`.`vivienda` (`idVivienda`),
  CONSTRAINT `Persona_Familia`
    FOREIGN KEY (`Familia_idFamilia`)
    REFERENCES `ejericioclase`.`familia` (`idFamilia`),
  CONSTRAINT `Persona_Municipio`
    FOREIGN KEY (`Municipio_idMunicipio`)
    REFERENCES `ejericioclase`.`municipio` (`idMunicipio`))
ENGINE = InnoDB
AUTO_INCREMENT = 11
DEFAULT CHARACTER SET = utf8mb4
COLLATE = utf8mb4_0900_ai_ci;


-- -----------------------------------------------------
-- Table `ejericioclase`.`cabezaxfamilia`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `ejericioclase`.`cabezaxfamilia` (
  `idCabezaFamilia` INT NOT NULL AUTO_INCREMENT,
  `Persona_idPersona` INT NOT NULL,
  `Familia_idFamilia` INT NOT NULL,
  PRIMARY KEY (`idCabezaFamilia`),
  UNIQUE INDEX `Persona_idPersona_UNIQUE` (`Persona_idPersona` ASC) VISIBLE,
  UNIQUE INDEX `Familia_idFamilia_UNIQUE` (`Familia_idFamilia` ASC) VISIBLE,
  CONSTRAINT `CabezaFamilia_Familia`
    FOREIGN KEY (`Familia_idFamilia`)
    REFERENCES `ejericioclase`.`familia` (`idFamilia`),
  CONSTRAINT `CabezaFamilia_Persona`
    FOREIGN KEY (`Persona_idPersona`)
    REFERENCES `ejericioclase`.`persona` (`idPersona`))
ENGINE = InnoDB
AUTO_INCREMENT = 10
DEFAULT CHARACTER SET = utf8mb4
COLLATE = utf8mb4_0900_ai_ci;


-- -----------------------------------------------------
-- Table `ejericioclase`.`posesion`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `ejericioclase`.`posesion` (
  `idPosesion` INT NOT NULL AUTO_INCREMENT,
  `Persona_idPersona` INT NOT NULL,
  `Vivienda_idVivienda` INT NOT NULL,
  PRIMARY KEY (`idPosesion`),
  UNIQUE INDEX `Vivienda_idVivienda_UNIQUE` (`Vivienda_idVivienda` ASC) VISIBLE,
  INDEX `Posesion_Persona` (`Persona_idPersona` ASC) VISIBLE,
  CONSTRAINT `Posesion_Persona`
    FOREIGN KEY (`Persona_idPersona`)
    REFERENCES `ejericioclase`.`persona` (`idPersona`),
  CONSTRAINT `Posesion_Vivienda`
    FOREIGN KEY (`Vivienda_idVivienda`)
    REFERENCES `ejericioclase`.`vivienda` (`idVivienda`))
ENGINE = InnoDB
AUTO_INCREMENT = 12
DEFAULT CHARACTER SET = utf8mb4
COLLATE = utf8mb4_0900_ai_ci;


SET SQL_MODE=@OLD_SQL_MODE;
SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS;
SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS;
