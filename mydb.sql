-- MySQL Script generated by MySQL Workbench
-- Thu Apr 30 12:28:46 2020
-- Model: New Model    Version: 1.0
-- MySQL Workbench Forward Engineering

SET @OLD_UNIQUE_CHECKS=@@UNIQUE_CHECKS, UNIQUE_CHECKS=0;
SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0;
SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='ONLY_FULL_GROUP_BY,STRICT_TRANS_TABLES,NO_ZERO_IN_DATE,NO_ZERO_DATE,ERROR_FOR_DIVISION_BY_ZERO,NO_ENGINE_SUBSTITUTION';

-- -----------------------------------------------------
-- Schema mydb
-- -----------------------------------------------------
DROP SCHEMA IF EXISTS `mydb` ;

-- -----------------------------------------------------
-- Schema mydb
-- -----------------------------------------------------
CREATE SCHEMA IF NOT EXISTS `mydb` DEFAULT CHARACTER SET utf8 ;
USE `mydb` ;

-- -----------------------------------------------------
-- Table `mydb`.`users`
-- -----------------------------------------------------
DROP TABLE IF EXISTS `mydb`.`users` ;

CREATE TABLE IF NOT EXISTS `mydb`.`users` (
  `id_user` INT UNSIGNED NOT NULL AUTO_INCREMENT,
  `nickname` VARCHAR(45) NOT NULL,
  `nome` VARCHAR(45) NULL,
  `apelido` VARCHAR(45) NULL,
  `email` VARCHAR(45) NOT NULL,
  `genero` ENUM('M', 'F') NULL,
  `password` VARCHAR(45) NOT NULL,
  `acesso` INT NULL DEFAULT 0,
  PRIMARY KEY (`id_user`),
  UNIQUE INDEX `id_user_UNIQUE` (`id_user` ASC) ,
  UNIQUE INDEX `email_UNIQUE` (`email` ASC) )
ENGINE = InnoDB;

-- -----------------------------------------------------
-- Table `mydb`.`scores`
-- -----------------------------------------------------
DROP TABLE IF EXISTS `mydb`.`scores` ;

CREATE TABLE IF NOT EXISTS `mydb`.`scores` (
  `id_score` INT UNSIGNED NOT NULL AUTO_INCREMENT,
  `user` INT UNSIGNED NOT NULL,
  `score` INT NOT NULL,
  `state` ENUM('Win', 'Lost') NULL,
  `data` DATETIME NOT NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`id_score`),
  UNIQUE INDEX `id_score_UNIQUE` (`id_score` ASC),
  INDEX `fk_scores_users1_idx` (`user` ASC) ,
  CONSTRAINT `fk_scores_users1`
    FOREIGN KEY (`user`)
    REFERENCES `mydb`.`users` (`id_user`)
    ON DELETE CASCADE
    ON UPDATE CASCADE)
ENGINE = InnoDB;


SET SQL_MODE=@OLD_SQL_MODE;
SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS;
SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS;