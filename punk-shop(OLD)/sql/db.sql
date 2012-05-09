SET @OLD_UNIQUE_CHECKS=@@UNIQUE_CHECKS, UNIQUE_CHECKS=0;
SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0;
SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='TRADITIONAL';

CREATE SCHEMA IF NOT EXISTS `test` DEFAULT CHARACTER SET utf8 ;
USE `test` ;

-- -----------------------------------------------------
-- Table `punk_shop`.`Users`
-- -----------------------------------------------------
CREATE  TABLE IF NOT EXISTS `punk_shop`.`Users` (
  `id` INT NOT NULL AUTO_INCREMENT  ,
  `name` VARCHAR(45) NOT NULL ,
  `pass` VARCHAR(45) NOT NULL ,
  `email` VARCHAR(45) NOT NULL ,
  `phone` INT(11) NOT NULL ,
  `user_pic` VARCHAR(45) NULL ,
  `perm_level` ENUM('USER','Moderator') NOT NULL ,
  `about` VARCHAR(45) NULL ,
  PRIMARY KEY (`id`) ,
  UNIQUE INDEX `login_UNIQUE` (`login` ASC),
  UNIQUE INDEX `id_UNIQUE` (`id` ASC) )
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `punk_shop`.`Categories`
-- -----------------------------------------------------
CREATE  TABLE IF NOT EXISTS `punk_shop`.`Categories` (
  `id` INT NOT NULL AUTO_INCREMENT ,
  `name` VARCHAR(45) NOT NULL ,
  PRIMARY KEY (`id`) ,
  UNIQUE INDEX `id_UNIQUE` (`id` ASC) )
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `punk_shop`.`Goods`
-- -----------------------------------------------------
CREATE  TABLE IF NOT EXISTS `punk_shop`.`Goods` (
  `id` INT NOT NULL AUTO_INCREMENT  ,
  `owner_id` INT NOT NULL ,
  `date` DATETIME NOT NULL ,
  `actual` TINYINT(1) NOT NULL ,
  `category_id` INT NOT NULL ,
  `title` VARCHAR(45) NOT NULL ,
  `description` VARCHAR(45) NOT NULL ,
  `price` INT UNSIGNED NULL ,
  `type` ENUM('Buy','Sale') NULL ,
  `views` INT NOT NULL ,
  PRIMARY KEY (`id`, `owner_id`, `category_id`) ,
  UNIQUE INDEX `id_UNIQUE` (`id` ASC) ,
  INDEX `owner_id` (`id` ASC) ,
  INDEX `category_id` (`id` ASC) ,
  CONSTRAINT `owner_id`
    FOREIGN KEY (`id` )
    REFERENCES `punk_shop`.`Users` (`id` )
    ON DELETE NO ACTION
    ON UPDATE NO ACTION,
  CONSTRAINT `category_id`
    FOREIGN KEY (`id` )
    REFERENCES `punk_shop`.`Categories` (`id` )
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `punk_shop`.`Images`
-- -----------------------------------------------------
CREATE  TABLE IF NOT EXISTS `punk_shop`.`Images` (
  `id` INT NOT NULL AUTO_INCREMENT ,
  `good_id` INT NOT NULL ,
  `src` VARCHAR(45) NOT NULL ,
  PRIMARY KEY (`id`, `good_id`) ,
  UNIQUE INDEX `id_UNIQUE` (`id` ASC) ,
  INDEX `good_id` (`id` ASC) ,
  CONSTRAINT `good_id`
    FOREIGN KEY (`id` )
    REFERENCES `punk_shop`.`Goods` (`id` )
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB;



SET SQL_MODE=@OLD_SQL_MODE;
SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS;
SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS;
