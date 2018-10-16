# ************************************************************
# Sequel Pro SQL dump
# Version 4541
#
# http://www.sequelpro.com/
# https://github.com/sequelpro/sequelpro
#
# Host: localhost (MySQL 5.7.22)
# Database: monkedia
# Generation Time: 2018-10-08 17:56:12 +0000
# ************************************************************


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;
/*!40111 SET @OLD_SQL_NOTES=@@SQL_NOTES, SQL_NOTES=0 */;


# Dump of table clients
# ------------------------------------------------------------

DROP TABLE IF EXISTS `clients`;

CREATE TABLE `clients` (
  `id` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(155) NOT NULL DEFAULT '',
  `date_created` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `last_updated` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

LOCK TABLES `clients` WRITE;
/*!40000 ALTER TABLE `clients` DISABLE KEYS */;

INSERT INTO `clients` (`id`, `name`, `date_created`, `last_updated`)
VALUES
	(1,'CeZe Darling','2018-08-23 13:25:27','2018-10-08 12:32:32'),
	(2,'Neal Host','2018-10-08 12:55:50','2018-10-08 12:55:50'),
	(3,'Celia Blough','2018-10-08 12:35:12','2018-10-08 12:48:44'),
	(4,'Tory Puterbaugh','2018-10-08 12:35:12','2018-10-08 12:48:49'),
	(5,'Mckinley Hibler','2018-10-08 12:35:12','2018-10-08 12:48:53'),
	(6,'Una Caddy','2018-10-08 12:35:12','2018-10-08 12:50:44'),
	(7,'Luvenia Collinsworth','2018-10-08 12:35:12','2018-10-08 12:51:36'),
	(8,'Masako Collazo','2018-10-08 12:35:12','2018-10-08 12:51:40'),
	(9,'Dorotha Marchetti','2018-10-08 12:35:12','2018-10-08 12:51:43'),
	(10,'Takako Waddington','2018-10-08 12:35:12','2018-10-08 12:51:46'),
	(11,'Salome Neyman','2018-10-08 12:35:12','2018-10-08 12:51:49'),
	(12,'Francoise Bermudez','2018-10-08 12:35:12','2018-10-08 12:51:52'),
	(13,'Hiedi Jeske','2018-10-08 12:35:12','2018-10-08 12:51:56'),
	(14,'Elijah Mumford','2018-10-08 12:35:12','2018-10-08 12:51:59'),
	(15,'Kieth Kivett','2018-10-08 12:35:12','2018-10-08 12:52:02'),
	(16,'Albina Greenfield','2018-10-08 12:35:12','2018-10-08 12:52:05'),
	(17,'Carman Milot','2018-10-08 12:35:12','2018-10-08 12:52:08'),
	(18,'Cole Vowels','2018-10-08 12:35:12','2018-10-08 12:52:10'),
	(19,'Oleta Benge','2018-10-08 12:35:12','2018-10-08 12:52:13'),
	(20,'Willetta Emmanuel','2018-10-08 12:35:12','2018-10-08 12:52:16'),
	(21,'Moshe Bailey','2018-10-08 12:35:12','2018-10-08 12:52:19'),
	(22,'Shanell Spivey','2018-10-08 12:35:12','2018-10-08 12:52:22'),
	(23,'Beatriz Defazio','2018-10-08 12:35:12','2018-10-08 12:52:25'),
	(24,'Reba Cantor','2018-10-08 12:35:12','2018-10-08 12:52:27'),
	(25,'Shavon Brickley','2018-10-08 12:35:12','2018-10-08 12:52:31'),
	(26,'Vivien Briggs','2018-10-08 12:35:12','2018-10-08 12:52:33'),
	(27,'Valentin Bruen','2018-10-08 12:35:12','2018-10-08 12:52:36'),
	(28,'Danae Wellons','2018-10-08 12:35:12','2018-10-08 12:52:39'),
	(29,'Stacie Marble','2018-10-08 12:35:12','2018-10-08 12:52:42'),
	(30,'Willian Paulding','2018-10-08 12:35:12','2018-10-08 12:52:45'),
	(31,'Lashay Mascia','2018-10-08 12:35:12','2018-10-08 12:52:49'),
	(32,'Antionette Croy','2018-10-08 12:35:12','2018-10-08 12:52:52'),
	(33,'Gillian Burgener','2018-10-08 12:35:12','2018-10-08 12:52:55'),
	(34,'Mina Stamp','2018-10-08 12:35:12','2018-10-08 12:53:00'),
	(35,'Chiquita Shingler','2018-10-08 12:35:12','2018-10-08 12:53:03'),
	(36,'Lloyd Salomone','2018-10-08 12:35:12','2018-10-08 12:53:05'),
	(37,'September Starck','2018-10-08 12:35:12','2018-10-08 12:53:08'),
	(38,'Edison Croskey','2018-10-08 12:35:12','2018-10-08 12:53:12'),
	(39,'Lynsey Gerner','2018-10-08 12:35:12','2018-10-08 12:53:15'),
	(40,'Craig Andrus','2018-10-08 12:35:12','2018-10-08 12:53:19'),
	(41,'Nyla Flatt','2018-10-08 12:35:12','2018-10-08 12:53:22'),
	(42,'Julene Viramontes','2018-10-08 12:35:12','2018-10-08 12:53:24'),
	(43,'Benito Mouzon','2018-10-08 12:35:12','2018-10-08 12:53:28'),
	(44,'Maura Mullan','2018-10-08 12:35:12','2018-10-08 12:53:31'),
	(45,'Josefa Doyon','2018-10-08 12:35:12','2018-10-08 12:53:34'),
	(46,'Brittni Creek','2018-10-08 12:35:12','2018-10-08 12:53:40'),
	(47,'Angelique Ang','2018-10-08 12:35:12','2018-10-08 12:53:49'),
	(48,'Faith Hynes','2018-10-08 12:35:12','2018-10-08 12:53:52'),
	(49,'Burl Platz','2018-10-08 12:35:12','2018-10-08 12:53:55'),
	(50,'Lauren Norred','2018-10-08 12:35:12','2018-10-08 12:53:58'),
	(51,'Classie Kranz','2018-10-08 12:35:12','2018-10-08 12:55:31');

/*!40000 ALTER TABLE `clients` ENABLE KEYS */;
UNLOCK TABLES;


# Dump of table users
# ------------------------------------------------------------

DROP TABLE IF EXISTS `users`;

CREATE TABLE `users` (
  `id` tinyint(3) unsigned NOT NULL AUTO_INCREMENT,
  `username` varchar(10) NOT NULL DEFAULT '',
  `password` varchar(32) NOT NULL DEFAULT '',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

LOCK TABLES `users` WRITE;
/*!40000 ALTER TABLE `users` DISABLE KEYS */;

INSERT INTO `users` (`id`, `username`, `password`)
VALUES
	(1,'test','098f6bcd4621d373cade4e832627b4f6');

/*!40000 ALTER TABLE `users` ENABLE KEYS */;
UNLOCK TABLES;



/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;
/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
