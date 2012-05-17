SET @OLD_UNIQUE_CHECKS=@@UNIQUE_CHECKS, UNIQUE_CHECKS=0;
SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0;
SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='TRADITIONAL';

CREATE SCHEMA IF NOT EXISTS `punk_shop_test` DEFAULT CHARACTER SET utf8 ;
USE `punk_shop_test` ;

-- -----------------------------------------------------
-- Table `punk_shop`.`tbl_categories`
-- -----------------------------------------------------
CREATE  TABLE IF NOT EXISTS `punk_shop_test`.`tbl_categories` (
  `id` INT NOT NULL AUTO_INCREMENT ,
  `name` VARCHAR(45) NOT NULL ,
  PRIMARY KEY (`id`) ,
  UNIQUE INDEX `id_UNIQUE` (`id` ASC) )
ENGINE=InnoDB;
INSERT INTO `tbl_categories` (`id`, `name`) VALUES
(1, 'Мебель'),
(2, 'Электроника'),
(3, 'Продукты питания'),
(4, 'Сигареты'),
(5, 'Расходные материалы'),
(6, 'Техника'),
(7, 'Прочее');

-- -----------------------------------------------------
-- Table `punk_shop`.`tbl_goods`
-- -----------------------------------------------------
CREATE  TABLE IF NOT EXISTS `punk_shop_test`.`tbl_goods` (
  `id` INT NOT NULL AUTO_INCREMENT ,
  `owner_id` INT NOT NULL ,
  `date` DATETIME NOT NULL ,
  `actual` TINYINT(1)  NOT NULL ,
  `category_id` INT NOT NULL ,
  `title` VARCHAR(45) NOT NULL ,
  `description` VARCHAR(45) NOT NULL ,
  `price` INT UNSIGNED NULL ,
  `type` INT NOT NULL ,
  `views` INT NOT NULL ,
  PRIMARY KEY (`id`) ,
  UNIQUE INDEX `id_UNIQUE` (`id` ASC) )
ENGINE=InnoDB;
INSERT INTO `tbl_goods` (`id`, `owner_id`,`date`,`actual`,`category_id`,`title`,`description`,`price`,`type`,`views`) VALUES
(1, 2,'2012-05-17 18:29:37' ,1,2,'эктрогитара','обычная',4999,1,1),
(2, 2,'2012-05-17 18:29:37' ,1,2,'фен','обычная',4999,1,1),
(3, 2,'2012-05-17 18:29:37' ,1,2,'ыв','обычная',4999,1,1),
(4, 2,'2012-05-17 18:29:37' ,1,2,'эыв','обычная',4999,1,1),
(5, 2,'2012-05-17 18:29:37' ,1,2,'экывтара','обычная',4999,1,1),
(6, 2,'2012-05-17 18:29:37' ,1,2,'эктывффогитара','обычная',4999,1,1),
(7, 2,'2012-05-17 18:29:37' ,1,2,'экфывффвара','обычная',4999,1,1);

-- -----------------------------------------------------
-- Table `punk_shop`.`tbl_images`
-- -----------------------------------------------------
CREATE  TABLE IF NOT EXISTS `punk_shop_test`.`tbl_images` (
  `id` INT NOT NULL AUTO_INCREMENT ,
  `good_id` INT NOT NULL ,
  `src` VARCHAR(256) NOT NULL ,
  PRIMARY KEY (`id`) ,
  UNIQUE INDEX `id_UNIQUE` (`id` ASC) ,
  INDEX `fk_images_goods` (`good_id` ASC) )
ENGINE=InnoDB;


-- -----------------------------------------------------
-- Table `punk_shop`.`tbl_users`
-- -----------------------------------------------------
CREATE TABLE `tbl_users` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `username` varchar(20) NOT NULL,
  `password` varchar(128) NOT NULL,
  `email` varchar(128) NOT NULL,
  `activkey` varchar(128) NOT NULL DEFAULT '',
  `createtime` int(10) NOT NULL DEFAULT '0',
  `lastvisit` int(10) NOT NULL DEFAULT '0',
  `superuser` int(1) NOT NULL DEFAULT '0',
  `status` int(1) NOT NULL DEFAULT '0',
  `phone` int(11) NOT NULL DEFAULT '0',
  `avatar` varchar(128) DEFAULT '',
  `about` varchar(256) NOT NULL DEFAULT '',
  PRIMARY KEY (`id`),
  UNIQUE KEY `username` (`username`),
  UNIQUE KEY `email` (`email`),
  KEY `status` (`status`),
  KEY `superuser` (`superuser`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=3 ;

INSERT INTO `tbl_users` (`id`, `username`, `password`, `email`, `activkey`, `createtime`, `lastvisit`, `superuser`, `status`) VALUES
(1, 'admin', '21232f297a57a5a743894a0e4a801fc3', 'webmaster@example.com', '9a24eff8c15a6a141ece27eb6947da0f', 1261146094, 0, 1, 1),
(2, 'demo', 'fe01ce2a7fbac8fafaed7c982a04e229', 'demo@example.com', '099f825543f7850cc038b90aaff39fac', 1261146096, 0, 0, 1);

CREATE TABLE `tbl_profiles` (
  `user_id` int(11) NOT NULL,
  `lastname` varchar(50) NOT NULL DEFAULT '',
  `firstname` varchar(50) NOT NULL DEFAULT '',
  `birthday` date NOT NULL DEFAULT '2000-01-01',
  PRIMARY KEY (`user_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 ;

INSERT INTO `tbl_profiles` (`user_id`, `lastname`, `firstname`, `birthday`) VALUES
(1, 'Admin', 'Administrator', '1990-01-01'),
(2, 'Demo', 'Demo', '1995-01-01');

CREATE TABLE `tbl_profiles_fields` (
  `id` int(10) NOT NULL AUTO_INCREMENT,
  `varname` varchar(50) NOT NULL,
  `title` varchar(255) NOT NULL,
  `field_type` varchar(50) NOT NULL,
  `field_size` int(3) NOT NULL DEFAULT '0',
  `field_size_min` int(3) NOT NULL DEFAULT '0',
  `required` int(1) NOT NULL DEFAULT '0',
  `match` varchar(255) NOT NULL DEFAULT '',
  `range` varchar(255) NOT NULL DEFAULT '',
  `error_message` varchar(255) NOT NULL DEFAULT '',
  `other_validator` varchar(5000) NOT NULL DEFAULT '',
  `default` varchar(255) NOT NULL DEFAULT '',
  `widget` varchar(255) NOT NULL DEFAULT '',
  `widgetparams` varchar(5000) NOT NULL DEFAULT '',
  `position` int(3) NOT NULL DEFAULT '0',
  `visible` int(1) NOT NULL DEFAULT '0',
  PRIMARY KEY (`id`),
  KEY `varname` (`varname`,`widget`,`visible`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=4 ;

INSERT INTO `tbl_profiles_fields` (`id`, `varname`, `title`, `field_type`, `field_size`, `field_size_min`, `required`, `match`, `range`, `error_message`, `other_validator`, `default`, `widget`, `widgetparams`, `position`, `visible`) VALUES
(1, 'lastname', 'Last Name', 'VARCHAR', 50, 3, 1, '', '', 'Incorrect Last Name (length between 3 and 50 characters).', '', '', '', '', 1, 3),
(2, 'firstname', 'First Name', 'VARCHAR', 50, 3, 1, '', '', 'Incorrect First Name (length between 3 and 50 characters).', '', '', '', '', 0, 3),
(3, 'birthday', 'Birthday', 'DATE', 0, 0, 2, '', '', '', '', '0000-00-00', 'UWjuidate', '{"ui-theme":"redmond"}', 3, 2);

CREATE TABLE `punk_shop_test`.`tbl_type` (
  `id` INT  NOT NULL AUTO_INCREMENT,
  `name` CHAR(20)  NOT NULL,
  PRIMARY KEY (`id`)
)
ENGINE = InnoDB
DEFAULT CHARSET=utf8;

INSERT INTO `tbl_type` (`id`, `name`) VALUES
(1, 'Купить'),
(2, 'Продать'),
(3, 'Отдать'),
(4, 'Взять'),
(5, 'Арендовать');

SET SQL_MODE=@OLD_SQL_MODE;
SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS;
SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS;
