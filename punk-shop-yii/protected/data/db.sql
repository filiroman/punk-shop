-- MySQL Administrator dump 1.4
--
-- ------------------------------------------------------
-- Server version	5.1.62-0ubuntu0.10.04.1


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

/*!40014 SET @OLD_UNIQUE_CHECKS=@@UNIQUE_CHECKS, UNIQUE_CHECKS=0 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;


--
-- Create schema punk_shop_test
--

CREATE DATABASE IF NOT EXISTS punk_shop_test;
USE punk_shop_test;

DROP TABLE IF EXISTS `punk_shop_test`.`tbl_categories`;
CREATE TABLE  `punk_shop_test`.`tbl_categories` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(45) NOT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `id_UNIQUE` (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=13 DEFAULT CHARSET=utf8;
INSERT INTO `punk_shop_test`.`tbl_categories` (`id`,`name`) VALUES 
 (1,'Мебель'),
 (2,'Бытовая техника'),
 (3,'Типография'),
 (4,'Транспорт'),
 (5,'Животные'),
 (6,'Одежда'),
 (7,'Отдых и развлечения'),
 (8,'Работа'),
 (9,'Компьютеры'),
 (10,'Сотовые телефоны'),
 (11,'Услуги'),
 (12,'Прочее');

DROP TABLE IF EXISTS `punk_shop_test`.`tbl_goods`;
CREATE TABLE  `punk_shop_test`.`tbl_goods` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `owner_id` int(11) NOT NULL,
  `date` datetime NOT NULL,
  `actual` tinyint(1) NOT NULL,
  `category_id` int(11) NOT NULL,
  `title` varchar(45) NOT NULL,
  `description` varchar(255) NOT NULL,
  `price` int(10) unsigned DEFAULT NULL,
  `type` int(11) NOT NULL,
  `views` int(11) NOT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `id_UNIQUE` (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=7 DEFAULT CHARSET=utf8;
INSERT INTO `punk_shop_test`.`tbl_goods` (`id`,`owner_id`,`date`,`actual`,`category_id`,`title`,`description`,`price`,`type`,`views`) VALUES 
 (1,1,'2012-05-17 22:11:46',1,1,'Стул','Хороший деревянный',300,1,0),
 (2,1,'2012-05-17 22:14:23',1,5,'Слон','Есть людей, мне надоел. Отдаю почти даром.',30000,1,0),
 (3,1,'2012-05-17 22:15:38',1,4,'Мотоцикл','Куплю мотоцикл, недорого. Можно старый.',10000,2,0),
 (4,1,'2012-05-17 22:19:41',1,3,'Книга Алгоритмы. Построение и анализ.','Алгоритмы. Построение и анализ. Издание 2-е. Авторы: Томас Кормен, Чарльз Лейзерсон, Рональд Ривест, Клиффорд Штайн. За вознаграждение.',0,3,0),
 (5,1,'2012-05-17 22:21:02',1,2,'Микроволновая печь','Хорошо греет. Отдам почти даром.',1000,1,0),
 (6,1,'2012-05-17 22:22:29',1,11,'Пирожки свежие.','Каждый день свежие. Цены не кусаются. Заходите буду только рада. 15 общежитие.',25,1,0);

DROP TABLE IF EXISTS `punk_shop_test`.`tbl_images`;
CREATE TABLE  `punk_shop_test`.`tbl_images` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `good_id` int(11) NOT NULL,
  `src` varchar(256) NOT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `id_UNIQUE` (`id`),
  KEY `fk_images_goods` (`good_id`)
) ENGINE=InnoDB AUTO_INCREMENT=7 DEFAULT CHARSET=utf8;
INSERT INTO `punk_shop_test`.`tbl_images` (`id`,`good_id`,`src`) VALUES 
 (1,1,'1_Chair.png'),
 (2,2,'2_slon_na_unitaze.jpg'),
 (3,2,'2_166.jpg'),
 (4,3,'3_ural-volk.jpg'),
 (5,5,'5_3_1.jpg'),
 (6,6,'6_48521908_9780147384db.jpg');

DROP TABLE IF EXISTS `punk_shop_test`.`tbl_profiles`;
CREATE TABLE  `punk_shop_test`.`tbl_profiles` (
  `user_id` int(11) NOT NULL,
  `lastname` varchar(50) NOT NULL DEFAULT '',
  `firstname` varchar(50) NOT NULL DEFAULT '',
  `birthday` date NOT NULL DEFAULT '2000-01-01',
  PRIMARY KEY (`user_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;
INSERT INTO `punk_shop_test`.`tbl_profiles` (`user_id`,`lastname`,`firstname`,`birthday`) VALUES 
 (1,'Admin','Administrator','1990-01-01'),
 (2,'Demo','Demo','1995-01-01');

DROP TABLE IF EXISTS `punk_shop_test`.`tbl_profiles_fields`;
CREATE TABLE  `punk_shop_test`.`tbl_profiles_fields` (
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
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8;
INSERT INTO `punk_shop_test`.`tbl_profiles_fields` (`id`,`varname`,`title`,`field_type`,`field_size`,`field_size_min`,`required`,`match`,`range`,`error_message`,`other_validator`,`default`,`widget`,`widgetparams`,`position`,`visible`) VALUES 
 (1,'lastname','Last Name','VARCHAR',50,3,1,'','','Incorrect Last Name (length between 3 and 50 characters).','','','','',1,3),
 (2,'firstname','First Name','VARCHAR',50,3,1,'','','Incorrect First Name (length between 3 and 50 characters).','','','','',0,3),
 (3,'birthday','Birthday','DATE',0,0,2,'','','','','0000-00-00','UWjuidate','{\"ui-theme\":\"redmond\"}',3,2);

DROP TABLE IF EXISTS `punk_shop_test`.`tbl_type`;
CREATE TABLE  `punk_shop_test`.`tbl_type` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` char(20) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8;
INSERT INTO `punk_shop_test`.`tbl_type` (`id`,`name`) VALUES 
 (1,'Продам'),
 (2,'Куплю'),
 (3,'Аренда');

DROP TABLE IF EXISTS `punk_shop_test`.`tbl_users`;
CREATE TABLE  `punk_shop_test`.`tbl_users` (
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
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8;
INSERT INTO `punk_shop_test`.`tbl_users` (`id`,`username`,`password`,`email`,`activkey`,`createtime`,`lastvisit`,`superuser`,`status`,`phone`,`avatar`,`about`) VALUES 
 (1,'admin','21232f297a57a5a743894a0e4a801fc3','webmaster@example.com','9a24eff8c15a6a141ece27eb6947da0f',1261146094,0,1,1,0,'',''),
 (2,'demo','fe01ce2a7fbac8fafaed7c982a04e229','demo@example.com','099f825543f7850cc038b90aaff39fac',1261146096,0,0,1,0,'','');



/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
