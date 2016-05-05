# ************************************************************
# Sequel Pro SQL dump
# Version 4135
#
# http://www.sequelpro.com/
# http://code.google.com/p/sequel-pro/
#
# Host: 127.0.0.1 (MySQL 5.5.42)
# Database: projectSurvey
# Generation Time: 2016-05-05 05:42:58 +0000

# Author: Ashley Hanes
# Revision Date: 05/05/2016
# FileName: database_final.sql
# Description: SQL dump of database tables and data
# Member login: fern
# Member password: fern
# Admin login: aehanes
# Admin password: pass
# ************************************************************


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;
/*!40111 SET @OLD_SQL_NOTES=@@SQL_NOTES, SQL_NOTES=0 */;


# Dump of table Brands
# ------------------------------------------------------------

DROP TABLE IF EXISTS `Brands`;

CREATE TABLE `Brands` (
  `brandID` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `brandName` varchar(30) NOT NULL DEFAULT '',
  PRIMARY KEY (`brandID`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

LOCK TABLES `Brands` WRITE;
/*!40000 ALTER TABLE `Brands` DISABLE KEYS */;

INSERT INTO `Brands` (`brandID`, `brandName`)
VALUES
	(1,'Gaelic\n'),
	(2,'St. Terese\'s'),
	(3,'Oatmeal Porter'),
	(4,'Black Mocha Stout'),
	(5,'Devil\'s Britches Red Ale'),
	(6,'Kashmir IPA'),
	(7,'Kashmir IPA'),
	(8,'Kashmir IPA'),
	(9,'Kashmir IPA');

/*!40000 ALTER TABLE `Brands` ENABLE KEYS */;
UNLOCK TABLES;


# Dump of table Notes
# ------------------------------------------------------------

DROP TABLE IF EXISTS `Notes`;

CREATE TABLE `Notes` (
  `sampleID` int(11) unsigned NOT NULL,
  `Body` varchar(255) DEFAULT '',
  `date` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  PRIMARY KEY (`sampleID`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;



# Dump of table Origin
# ------------------------------------------------------------

DROP TABLE IF EXISTS `Origin`;

CREATE TABLE `Origin` (
  `originID` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `type` varchar(5) NOT NULL DEFAULT '',
  PRIMARY KEY (`originID`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

LOCK TABLES `Origin` WRITE;
/*!40000 ALTER TABLE `Origin` DISABLE KEYS */;

INSERT INTO `Origin` (`originID`, `type`)
VALUES
	(1,'F1'),
	(2,'F2'),
	(3,'F3'),
	(4,'F4'),
	(5,'F5'),
	(6,'F6'),
	(7,'F7'),
	(8,'F9'),
	(9,'BT-1'),
	(10,'BT-2'),
	(11,'B1'),
	(12,'B2'),
	(13,'K'),
	(14,'F8');

/*!40000 ALTER TABLE `Origin` ENABLE KEYS */;
UNLOCK TABLES;


# Dump of table Questions
# ------------------------------------------------------------

DROP TABLE IF EXISTS `Questions`;

CREATE TABLE `Questions` (
  `questionID` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `questionText` varchar(225) NOT NULL DEFAULT '',
  PRIMARY KEY (`questionID`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

LOCK TABLES `Questions` WRITE;
/*!40000 ALTER TABLE `Questions` DISABLE KEYS */;

INSERT INTO `Questions` (`questionID`, `questionText`)
VALUES
	(1,'Is APPEARANCE TTT?'),
	(2,'Is AROMA TTT?'),
	(3,'Is FLAVOR TTT?'),
	(4,'Is MOUTHFEEL TTT?'),
	(5,'Is this beer TTT OVERALL?');

/*!40000 ALTER TABLE `Questions` ENABLE KEYS */;
UNLOCK TABLES;


# Dump of table Responses
# ------------------------------------------------------------

DROP TABLE IF EXISTS `Responses`;

CREATE TABLE `Responses` (
  `userID` int(10) unsigned NOT NULL,
  `questionID` int(11) unsigned NOT NULL,
  `sampleID` int(1) DEFAULT NULL,
  `response` char(1) NOT NULL DEFAULT '',
  `createDate` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  KEY `userID` (`userID`),
  KEY `sampQuestionID` (`questionID`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

LOCK TABLES `Responses` WRITE;
/*!40000 ALTER TABLE `Responses` DISABLE KEYS */;

INSERT INTO `Responses` (`userID`, `questionID`, `sampleID`, `response`, `createDate`)
VALUES
	(82,0,58,'Y','2016-05-04 22:01:13'),
	(82,1,58,'N','2016-05-04 22:01:13'),
	(82,2,58,'Y','2016-05-04 22:01:13'),
	(82,3,58,'N','2016-05-04 22:01:13'),
	(82,4,58,'N','2016-05-04 22:01:13'),
	(82,0,59,'Y','2016-05-04 22:01:19'),
	(82,1,59,'Y','2016-05-04 22:01:19'),
	(82,2,59,'Y','2016-05-04 22:01:19'),
	(82,3,59,'Y','2016-05-04 22:01:19'),
	(82,4,59,'Y','2016-05-04 22:01:19'),
	(82,0,60,'N','2016-05-04 22:01:26'),
	(82,1,60,'N','2016-05-04 22:01:26'),
	(82,2,60,'Y','2016-05-04 22:01:26'),
	(82,3,60,'Y','2016-05-04 22:01:26'),
	(82,4,60,'N','2016-05-04 22:01:26'),
	(82,0,61,'N','2016-05-04 22:01:32'),
	(82,1,61,'N','2016-05-04 22:01:32'),
	(82,2,61,'N','2016-05-04 22:01:32'),
	(82,3,61,'Y','2016-05-04 22:01:32'),
	(82,4,61,'N','2016-05-04 22:01:32'),
	(41,0,64,'Y','2016-05-05 01:18:42'),
	(41,1,64,'N','2016-05-05 01:18:42'),
	(41,2,64,'Y','2016-05-05 01:18:42'),
	(41,3,64,'N','2016-05-05 01:18:42'),
	(41,4,64,'Y','2016-05-05 01:18:42'),
	(41,0,65,'N','2016-05-05 01:18:48'),
	(41,1,65,'Y','2016-05-05 01:18:48'),
	(41,2,65,'N','2016-05-05 01:18:48'),
	(41,3,65,'Y','2016-05-05 01:18:48'),
	(41,4,65,'Y','2016-05-05 01:18:48');

/*!40000 ALTER TABLE `Responses` ENABLE KEYS */;
UNLOCK TABLES;


# Dump of table Sample
# ------------------------------------------------------------

DROP TABLE IF EXISTS `Sample`;

CREATE TABLE `Sample` (
  `sampleID` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `brandID` int(11) unsigned NOT NULL,
  `originID` int(11) unsigned NOT NULL,
  `batch` varchar(15) NOT NULL DEFAULT '',
  `createDate` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  PRIMARY KEY (`sampleID`),
  KEY `brandID` (`brandID`),
  KEY `originID` (`originID`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;



# Dump of table Users
# ------------------------------------------------------------

DROP TABLE IF EXISTS `Users`;

CREATE TABLE `Users` (
  `userID` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `firstName` varchar(40) NOT NULL DEFAULT '',
  `lastName` varchar(40) NOT NULL DEFAULT '',
  `email` varchar(50) NOT NULL DEFAULT '',
  `userName` varchar(20) NOT NULL,
  `password` varchar(80) NOT NULL DEFAULT '',
  `userLevel` char(1) NOT NULL DEFAULT 'M',
  PRIMARY KEY (`userID`),
  UNIQUE KEY `userName` (`userName`),
  KEY `firstName` (`firstName`),
  KEY `lastName` (`lastName`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

LOCK TABLES `Users` WRITE;
/*!40000 ALTER TABLE `Users` DISABLE KEYS */;

INSERT INTO `Users` (`userID`, `firstName`, `lastName`, `email`, `userName`, `password`, `userLevel`)
VALUES
	(8,'beth','girl','heygirl@test.com','heygirl','passs','A'),
	(9,'jack','Doe','jDoe@test.com','jDoe','d74ff0ee8da3b9806b18c877dbf29bbde50b5bd8e4dad7a3a725000feb82e8f1','M'),
	(10,'Jon','Doeseif','janeDoe@test.com','janeDoe','d74ff0ee8da3b9806b18c877dbf29bbde50b5bd8e4dad7a3a725000feb82e8f1','M'),
	(16,'J','J','J@j.com','J','6da43b944e494e885e69af021f93c6d9331c78aa228084711429160a5bbd15b5','M'),
	(22,'Jacob','J','J@j.com','Jacb','6da43b944e494e885e69af021f93c6d9331c78aa228084711429160a5bbd15b5','M'),
	(40,'Frank','Levitan','frank@frank.com','Frank','77646f5a4f3166637627abe998e7a1470fe72d8b430f067dafa86263f1f23f94','M'),
	(41,'fern','hanes','fern@fern.com','fern','f0a5da17e0ffa3a21c2b07c964d465799eb0deb62905ccb1b271ce7716614746','M'),
	(76,'tes','rand','aehanes@yahoo.com','randomtest','d74ff0ee8da3b9806b18c877dbf29bbde50b5bd8e4dad7a3a725000feb82e8f1','M'),
	(77,'Mabel','Hanes','Mabel@test.com','Mabel','d74ff0ee8da3b9806b18c877dbf29bbde50b5bd8e4dad7a3a725000feb82e8f1','M'),
	(79,'ashley','hanes','aehanes326@gmail.com','ahanes','cd5fd0de552e906c66d9241b6d1e745a0b9e88011db226abed68a69d6e7bc825','M'),
	(80,'charles','wallin','cwallin@test.com','cwallin','d74ff0ee8da3b9806b18c877dbf29bbde50b5bd8e4dad7a3a725000feb82e8f1','M'),
	(81,'g','g','g@test.com','g','d74ff0ee8da3b9806b18c877dbf29bbde50b5bd8e4dad7a3a725000feb82e8f1','M'),
	(82,'ashley','hanes','aehanes326@gmail.com','aehanes','d74ff0ee8da3b9806b18c877dbf29bbde50b5bd8e4dad7a3a725000feb82e8f1','A'),
	(83,'g','Hanes','ash@hehe.com','Ash','d74ff0ee8da3b9806b18c877dbf29bbde50b5bd8e4dad7a3a725000feb82e8f1','M'),
	(84,'Kevin','Levitan','kl@test.com','kl','d74ff0ee8da3b9806b18c877dbf29bbde50b5bd8e4dad7a3a725000feb82e8f1',''),
	(85,'d','dd','d@dest.com','d','d74ff0ee8da3b9806b18c877dbf29bbde50b5bd8e4dad7a3a725000feb82e8f1','M'),
	(86,'happy jacks','biscuits','','DiscoBiscuits4eve','38083c7ee9121e17401883566a148aa5c2e2d55dc53bc4a94a026517dbff3c6b','M'),
	(87,'a','h','aehanes326@gmail.com','ah','d74ff0ee8da3b9806b18c877dbf29bbde50b5bd8e4dad7a3a725000feb82e8f1','M'),
	(88,'g','f','aehanes@gmail.com','fg','d74ff0ee8da3b9806b18c877dbf29bbde50b5bd8e4dad7a3a725000feb82e8f1','M'),
	(89,'j','j','aehanes326@gmail.com','jdjfioasdj','d74ff0ee8da3b9806b18c877dbf29bbde50b5bd8e4dad7a3a725000feb82e8f1','M'),
	(90,'b','j','aehanes@gmail.com','jifdasjo;','4075c7ab02331e21a12690ebfffd56586c29ae502f1cc2059523ae1830b64ae2','M'),
	(91,'n','n','aehanes326@gmail.com','n','d74ff0ee8da3b9806b18c877dbf29bbde50b5bd8e4dad7a3a725000feb82e8f1','M');

/*!40000 ALTER TABLE `Users` ENABLE KEYS */;
UNLOCK TABLES;



/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;
/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
