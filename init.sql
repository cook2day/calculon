-- --------------------------------------------------------
-- Host:                         localhost
-- Server version:               5.7.11 - MySQL Community Server (GPL)
-- Server OS:                    Win64
-- HeidiSQL Version:             9.3.0.4984
-- --------------------------------------------------------

/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET NAMES utf8mb4 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;

-- Dumping database structure for calculon
CREATE DATABASE IF NOT EXISTS `calculon` /*!40100 DEFAULT CHARACTER SET latin1 */;
USE `calculon`;


-- Dumping structure for table calculon.ingredients
CREATE TABLE IF NOT EXISTS `ingredients` (
  `ID` int(11) NOT NULL AUTO_INCREMENT,
  `NAME` varchar(50) NOT NULL DEFAULT '0',
  `COOK_UNIT` int(11) DEFAULT '0',
  `SHOP_UNIT` int(11) DEFAULT '0',
  `QC_UNIT` float DEFAULT NULL,
  `QS_UNIT` float DEFAULT NULL,
  PRIMARY KEY (`ID`),
  KEY `COOK_UNIT` (`COOK_UNIT`),
  KEY `SHOP_UNIT` (`SHOP_UNIT`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

-- Data exporting was unselected.


-- Dumping structure for table calculon.recipes
CREATE TABLE IF NOT EXISTS `recipes` (
  `ID` int(11) NOT NULL AUTO_INCREMENT,
  `NAME` varchar(50) NOT NULL DEFAULT '0',
  `NO_SERVINGS` int(11) NOT NULL DEFAULT '2',
  `INSTRUCTIONS` longtext,
  PRIMARY KEY (`ID`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

-- Data exporting was unselected.


-- Dumping structure for table calculon.recipes_ingredients
CREATE TABLE IF NOT EXISTS `recipes_ingredients` (
  `ID` int(11) NOT NULL AUTO_INCREMENT,
  `recipes_id` int(11) NOT NULL DEFAULT '0',
  `ingredients_id` int(11) NOT NULL DEFAULT '0',
  `quantity` int(11) NOT NULL DEFAULT '0',
  PRIMARY KEY (`ID`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

-- Data exporting was unselected.


-- Dumping structure for table calculon.units
CREATE TABLE IF NOT EXISTS `units` (
  `ID` int(11) NOT NULL AUTO_INCREMENT,
  `NAME` varchar(50) NOT NULL DEFAULT '0',
  PRIMARY KEY (`ID`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

-- Data exporting was unselected.
/*!40101 SET SQL_MODE=IFNULL(@OLD_SQL_MODE, '') */;
/*!40014 SET FOREIGN_KEY_CHECKS=IF(@OLD_FOREIGN_KEY_CHECKS IS NULL, 1, @OLD_FOREIGN_KEY_CHECKS) */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
