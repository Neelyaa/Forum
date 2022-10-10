-- MySQL Script generated by MySQL Workbench
-- Tue Aug 23 09:41:40 2022
-- Model: New Model    Version: 1.0
-- MySQL Workbench Forward Engineering

SET @OLD_UNIQUE_CHECKS=@@UNIQUE_CHECKS, UNIQUE_CHECKS=0;
SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0;
SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='ONLY_FULL_GROUP_BY,STRICT_TRANS_TABLES,NO_ZERO_IN_DATE,NO_ZERO_DATE,ERROR_FOR_DIVISION_BY_ZERO,NO_ENGINE_SUBSTITUTION';

-- -----------------------------------------------------
-- Schema Forum
-- -----------------------------------------------------

-- -----------------------------------------------------
-- Schema Forum
-- -----------------------------------------------------
CREATE SCHEMA IF NOT EXISTS `Forum` DEFAULT CHARACTER SET utf8 ;
USE `Forum` ;

-- -----------------------------------------------------
-- Table `Forum`.`users`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `Forum`.`users` (
  `idUser` INT NOT NULL AUTO_INCREMENT,
  `user_name` VARCHAR(255) NOT NULL,
  `email` VARCHAR(255) NOT NULL,
  `password` VARCHAR(255) NOT NULL,
  `avatar` VARCHAR(255) NULL,
  PRIMARY KEY (`idUser`))
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `Forum`.`articles`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `Forum`.`articles` (
  `idArticle` INT NOT NULL AUTO_INCREMENT,
  `article` LONGTEXT NOT NULL,
  `date_publi` DATE NOT NULL,
  `users_idUser` INT NOT NULL,
  PRIMARY KEY (`idArticle`),
  INDEX `fk_articles_users_idx` (`users_idUser` ASC) ,
  CONSTRAINT `fk_articles_users`
    FOREIGN KEY (`users_idUser`)
    REFERENCES `Forum`.`users` (`idUser`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `Forum`.`comments`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `Forum`.`comments` (
  `idCom` INT NOT NULL AUTO_INCREMENT,
  `content` LONGTEXT NOT NULL,
  `date_post` DATE NOT NULL,
  `users_idUser` INT NOT NULL,
  `articles_idArticle` INT NOT NULL,
  PRIMARY KEY (`idCom`),
  INDEX `fk_comments_users1_idx` (`users_idUser` ASC) ,
  INDEX `fk_comments_articles1_idx` (`articles_idArticle` ASC) ,
  CONSTRAINT `fk_comments_users1`
    FOREIGN KEY (`users_idUser`)
    REFERENCES `Forum`.`users` (`idUser`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION,
  CONSTRAINT `fk_comments_articles1`
    FOREIGN KEY (`articles_idArticle`)
    REFERENCES `Forum`.`articles` (`idArticle`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB;


SET SQL_MODE=@OLD_SQL_MODE;
SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS;
SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS;