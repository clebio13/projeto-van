-- MySQL Script generated by MySQL Workbench
-- 08/15/14 00:59:01
-- Model: New Model    Version: 1.0
SET @OLD_UNIQUE_CHECKS=@@UNIQUE_CHECKS, UNIQUE_CHECKS=0;
SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0;
SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='TRADITIONAL,ALLOW_INVALID_DATES';

-- -----------------------------------------------------
-- Schema sistema_van
-- -----------------------------------------------------
CREATE SCHEMA IF NOT EXISTS `sistema_van` DEFAULT CHARACTER SET utf8 COLLATE utf8_general_ci ;
USE `sistema_van` ;

-- -----------------------------------------------------
-- Table `sistema_van`.`MOTORISTA`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `sistema_van`.`MOTORISTA` (
  `ID_MOTORISTA` INT NOT NULL AUTO_INCREMENT,
  `NOME_USUARIO` CHAR(12) NOT NULL,
  `SENHA` VARCHAR(45) NOT NULL,
  `EMAIL` VARCHAR(45) NOT NULL,
  `NOME_COMPLETO` VARCHAR(45) NOT NULL,
  `ENDERECO` VARCHAR(45) NOT NULL,
  `TELEFONE1` VARCHAR(45) NOT NULL,
  `TELEFONE2` VARCHAR(45) NULL,
  `CNH` CHAR(11) NOT NULL,
  PRIMARY KEY (`ID_MOTORISTA`),
  UNIQUE INDEX `CNH_UNIQUE` (`CNH` ASC),
  UNIQUE INDEX `NOME_USUARIO_UNIQUE` (`NOME_USUARIO` ASC))
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `sistema_van`.`PASSAGEIRO`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `sistema_van`.`PASSAGEIRO` (
  `ID_PASSAGEIRO` INT NOT NULL AUTO_INCREMENT,
  `NOME_USUARIO` CHAR(12) NOT NULL,
  `SENHA` CHAR(12) NOT NULL,
  `EMAIL` VARCHAR(45) NOT NULL,
  `NOME_COMPLETO` VARCHAR(45) NOT NULL,
  `ENDERECO` VARCHAR(45) NULL,
  `TELEFONE1` VARCHAR(45) NOT NULL,
  `TELEFONE2` VARCHAR(45) NULL,
  PRIMARY KEY (`ID_PASSAGEIRO`),
  UNIQUE INDEX `NOME_USUARIO_UNIQUE` (`NOME_USUARIO` ASC))
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `sistema_van`.`ADMINISTRADOR`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `sistema_van`.`ADMINISTRADOR` (
  `USUARIO` CHAR(12) NOT NULL,
  `SENHA` VARCHAR(45) NOT NULL,
  PRIMARY KEY (`ID_ADMINISTRADOR`),
  UNIQUE INDEX `USUARIO_UNIQUE` (`USUARIO` ASC),
  UNIQUE INDEX `SENHA_UNIQUE` (`SENHA` ASC))
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `sistema_van`.`ROTA`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `sistema_van`.`ROTA` (
  `ID_ROTA` INT NOT NULL,
  `ID_MOTORISTA` INT NOT NULL,
  `CIDADE_ORIGEM` VARCHAR(45) NOT NULL,
  `CIDADE_DESTINO` VARCHAR(45) NOT NULL,
  `ESTADO` VARCHAR(45) NOT NULL,
  PRIMARY KEY (`ID_ROTA`, `ID_MOTORISTA`),
  INDEX `COD_MOTORISTA_idx` (`ID_MOTORISTA` ASC),
  CONSTRAINT `COD_MOTORISTA`
    FOREIGN KEY (`ID_MOTORISTA`)
    REFERENCES `sistema_van`.`MOTORISTA` (`ID_MOTORISTA`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `sistema_van`.`LOCALIDADE`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `sistema_van`.`LOCALIDADE` (
  `ID_LOCALIDADE` INT NOT NULL AUTO_INCREMENT,
  `RUA` VARCHAR(45) NOT NULL,
  `BAIRRO` VARCHAR(45) NOT NULL,
  `NUMERO` INT(10) NOT NULL,
  PRIMARY KEY (`ID_LOCALIDADE`))
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `sistema_van`.`RESERVA`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `sistema_van`.`RESERVA` (
  `ID_RESERVA` INT NOT NULL AUTO_INCREMENT,
  `ID_PASSAGEIRO` INT NOT NULL,
  `ID_ROTA` INT NOT NULL,
  `DATA` DATE NOT NULL,
  `HORARIO` TIME NOT NULL,
  PRIMARY KEY (`ID_RESERVA`, `ID_PASSAGEIRO`, `ID_ROTA`),
  INDEX `ID_PASSAGEIRO_idx` (`ID_PASSAGEIRO` ASC),
  INDEX `ID_ROTA_idx` (`ID_ROTA` ASC),
  CONSTRAINT `ID_PASSAGEIRO`
    FOREIGN KEY (`ID_PASSAGEIRO`)
    REFERENCES `sistema_van`.`PASSAGEIRO` (`ID_PASSAGEIRO`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION,
  CONSTRAINT `ID_ROTA`
    FOREIGN KEY (`ID_ROTA`)
    REFERENCES `sistema_van`.`ROTA` (`ID_ROTA`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `sistema_van`.`AVALIA`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `sistema_van`.`AVALIA` (
  `COD_PASSAGEIRO` INT NOT NULL,
  `COD_MOTORISTA` INT NOT NULL,
  `NOTA` INT(5) NOT NULL,
  `COMENTARIO` VARCHAR(45) NULL,
  PRIMARY KEY (`COD_PASSAGEIRO`, `COD_MOTORISTA`),
  INDEX `COD_MOTORISTA_idx` (`COD_MOTORISTA` ASC),
  CONSTRAINT `COD_PASSAGEIRO1`
    FOREIGN KEY (`COD_PASSAGEIRO`)
    REFERENCES `sistema_van`.`PASSAGEIRO` (`ID_PASSAGEIRO`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION,
  CONSTRAINT `COD_MOTORISTA1`
    FOREIGN KEY (`COD_MOTORISTA`)
    REFERENCES `sistema_van`.`MOTORISTA` (`ID_MOTORISTA`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `sistema_van`.`VAN`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `sistema_van`.`VAN` (
  `ID_VAN` INT NOT NULL,
  `PLACA` CHAR(7) NOT NULL,
  `CHASSI` VARCHAR(45) NOT NULL,
  `ANO` VARCHAR(45) NOT NULL,
  `ID_MOTORISTA` INT NOT NULL,
  PRIMARY KEY (`ID_VAN`, `ID_MOTORISTA`),
  UNIQUE INDEX `PLACA_UNIQUE` (`PLACA` ASC),
  INDEX `ID_MOTORISTA_idx` (`ID_MOTORISTA` ASC),
  CONSTRAINT `ID_MOTORISTA`
    FOREIGN KEY (`ID_MOTORISTA`)
    REFERENCES `sistema_van`.`MOTORISTA` (`ID_MOTORISTA`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `sistema_van`.`TEM`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `sistema_van`.`TEM` (
  `ID_ROTA` INT NOT NULL,
  `ID_LOCALIDADE` INT NOT NULL,
  PRIMARY KEY (`ID_ROTA`, `ID_LOCALIDADE`),
  INDEX `ID_LOCALIDADE_idx` (`ID_LOCALIDADE` ASC),
  CONSTRAINT `ID_ROTA1`
    FOREIGN KEY (`ID_ROTA`)
    REFERENCES `sistema_van`.`ROTA` (`ID_ROTA`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION,
  CONSTRAINT `ID_LOCALIDADE1`
    FOREIGN KEY (`ID_LOCALIDADE`)
    REFERENCES `sistema_van`.`LOCALIDADE` (`ID_LOCALIDADE`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB;


SET SQL_MODE=@OLD_SQL_MODE;
SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS;
SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS;
