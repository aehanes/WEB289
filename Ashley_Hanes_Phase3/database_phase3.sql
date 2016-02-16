# ************************************************************
# Sequel Pro SQL dump
# Version 4500
#
# http://www.sequelpro.com/
# https://github.com/sequelpro/sequelpro
#
# Host: 127.0.0.1 (MySQL 5.5.42)
# Database: projectSurvey
# Generation Time: 2016-02-11 15:09:21 +0000
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



# Dump of table Origin
# ------------------------------------------------------------

DROP TABLE IF EXISTS `Origin`;

CREATE TABLE `Origin` (
  `originID` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `type` varchar(5) NOT NULL DEFAULT '',
  PRIMARY KEY (`originID`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;



# Dump of table Questions
# ------------------------------------------------------------

DROP TABLE IF EXISTS `Questions`;

CREATE TABLE `Questions` (
  `questionID` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `questionText` varchar(225) NOT NULL DEFAULT '',
  PRIMARY KEY (`questionID`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;



# Dump of table Sample
# ------------------------------------------------------------

DROP TABLE IF EXISTS `Sample`;

CREATE TABLE `Sample` (
  `sampleID` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `brandID` int(11) unsigned NOT NULL,
  `originID` int(11) unsigned NOT NULL,
  `batch` varchar(15) NOT NULL DEFAULT '',
  PRIMARY KEY (`sampleID`),
  KEY `brandID` (`brandID`),
  KEY `originID` (`originID`),
  CONSTRAINT `sample_ibfk_2` FOREIGN KEY (`originID`) REFERENCES `Origin` (`originID`),
  CONSTRAINT `sample_ibfk_1` FOREIGN KEY (`sampleID`) REFERENCES `Brands` (`brandID`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;



# Dump of table SampleQuestions
# ------------------------------------------------------------

DROP TABLE IF EXISTS `SampleQuestions`;

CREATE TABLE `SampleQuestions` (
  `sampQuestID` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `sampleID` int(10) unsigned NOT NULL,
  `questionID` int(10) unsigned DEFAULT NULL,
  PRIMARY KEY (`sampQuestID`),
  KEY `sampleID` (`sampleID`),
  KEY `questionID` (`questionID`),
  CONSTRAINT `samplequestions_ibfk_2` FOREIGN KEY (`questionID`) REFERENCES `Questions` (`questionID`),
  CONSTRAINT `samplequestions_ibfk_1` FOREIGN KEY (`sampleID`) REFERENCES `Sample` (`sampleID`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;



# Dump of table States
# ------------------------------------------------------------

DROP TABLE IF EXISTS `States`;

CREATE TABLE `States` (
  `stateID` int(2) unsigned NOT NULL AUTO_INCREMENT,
  `stateName` varchar(15) NOT NULL DEFAULT '',
  `stateAbbr` char(2) NOT NULL DEFAULT '',
  PRIMARY KEY (`stateID`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;



# Dump of table surveyResponses
# ------------------------------------------------------------

DROP TABLE IF EXISTS `surveyResponses`;

CREATE TABLE `surveyResponses` (
  `surveyID` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `userID` int(10) unsigned NOT NULL,
  `sampQuestionID` int(11) unsigned NOT NULL,
  `response` varchar(3) NOT NULL DEFAULT '',
  `notes` varchar(255) NOT NULL DEFAULT '',
  `date` date NOT NULL,
  PRIMARY KEY (`surveyID`),
  KEY `userID` (`userID`),
  KEY `sampQuestionID` (`sampQuestionID`),
  CONSTRAINT `surveyresponses_ibfk_2` FOREIGN KEY (`sampQuestionID`) REFERENCES `SampleQuestions` (`sampQuestID`),
  CONSTRAINT `surveyresponses_ibfk_1` FOREIGN KEY (`userID`) REFERENCES `Users` (`userID`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;



# Dump of table Users
# ------------------------------------------------------------

DROP TABLE IF EXISTS `Users`;

CREATE TABLE `Users` (
  `userID` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `firstName` varchar(40) NOT NULL DEFAULT '',
  `lastName` varchar(40) NOT NULL DEFAULT '',
  `city` varchar(40) NOT NULL DEFAULT '',
  `stateID` int(2) NOT NULL,
  `phone` char(10) NOT NULL DEFAULT '',
  `email` varchar(50) NOT NULL DEFAULT '',
  `userLevel` char(1) NOT NULL DEFAULT '',
  `password` char(40) NOT NULL DEFAULT '',
  PRIMARY KEY (`userID`),
  KEY `firstName` (`firstName`),
  KEY `lastName` (`lastName`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;




/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;
/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
