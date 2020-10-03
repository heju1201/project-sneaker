-- --------------------------------------------------------
-- Host:                         127.0.0.1
-- Server version:               10.4.14-MariaDB - mariadb.org binary distribution
-- Server OS:                    Win64
-- HeidiSQL Version:             11.0.0.5919
-- --------------------------------------------------------

/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET NAMES utf8 */;
/*!50503 SET NAMES utf8mb4 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;


-- Dumping database structure for sellingsneaker
DROP DATABASE IF EXISTS `sellingsneaker`;
CREATE DATABASE IF NOT EXISTS `sellingsneaker` /*!40100 DEFAULT CHARACTER SET utf8mb4 */;
USE `sellingsneaker`;

-- Dumping structure for table sellingsneaker.admin
DROP TABLE IF EXISTS `admin`;
CREATE TABLE IF NOT EXISTS `admin` (
  `idadmin` int(11) NOT NULL AUTO_INCREMENT,
  `adminName` varchar(100) DEFAULT NULL,
  `password` varchar(100) DEFAULT NULL,
  `phone` varchar(100) DEFAULT NULL,
  `email` varchar(100) DEFAULT NULL,
  PRIMARY KEY (`idadmin`)
) ENGINE=InnoDB AUTO_INCREMENT=7 DEFAULT CHARSET=utf8mb4;

-- Data exporting was unselected.

-- Dumping structure for table sellingsneaker.brand
DROP TABLE IF EXISTS `brand`;
CREATE TABLE IF NOT EXISTS `brand` (
  `idBrand` int(11) NOT NULL AUTO_INCREMENT,
  `brandName` varchar(100) DEFAULT NULL,
  `logo` text DEFAULT NULL,
  PRIMARY KEY (`idBrand`)
) ENGINE=InnoDB AUTO_INCREMENT=7 DEFAULT CHARSET=utf8mb4;

-- Data exporting was unselected.

-- Dumping structure for table sellingsneaker.order
DROP TABLE IF EXISTS `order`;
CREATE TABLE IF NOT EXISTS `order` (
  `idOrder` int(11) NOT NULL AUTO_INCREMENT,
  `date` varchar(20) DEFAULT NULL,
  `iduser` int(11) DEFAULT NULL,
  `idstatus` int(11) DEFAULT NULL,
  PRIMARY KEY (`idOrder`),
  KEY `iduser` (`iduser`),
  KEY `idstatus` (`idstatus`),
  CONSTRAINT `order_ibfk_1` FOREIGN KEY (`iduser`) REFERENCES `user` (`iduser`),
  CONSTRAINT `order_ibfk_2` FOREIGN KEY (`idstatus`) REFERENCES `status` (`idstatus`)
) ENGINE=InnoDB AUTO_INCREMENT=9 DEFAULT CHARSET=utf8mb4;

-- Data exporting was unselected.

-- Dumping structure for table sellingsneaker.orderdetails
DROP TABLE IF EXISTS `orderdetails`;
CREATE TABLE IF NOT EXISTS `orderdetails` (
  `amount` int(11) DEFAULT NULL,
  `size` int(11) NOT NULL,
  `priceor` float DEFAULT NULL,
  `idsneaker` int(11) NOT NULL,
  `idOrder` int(11) NOT NULL,
  PRIMARY KEY (`idsneaker`,`idOrder`,`size`),
  KEY `FK_Order` (`idOrder`) USING BTREE,
  KEY `FK_Product` (`idsneaker`) USING BTREE,
  CONSTRAINT `FK_Order` FOREIGN KEY (`idOrder`) REFERENCES `order` (`idOrder`) ON DELETE CASCADE ON UPDATE CASCADE,
  CONSTRAINT `FK_Product` FOREIGN KEY (`idsneaker`) REFERENCES `sneaker` (`idsneaker`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- Data exporting was unselected.

-- Dumping structure for table sellingsneaker.sneaker
DROP TABLE IF EXISTS `sneaker`;
CREATE TABLE IF NOT EXISTS `sneaker` (
  `idsneaker` int(11) NOT NULL AUTO_INCREMENT,
  `sneakerName` varchar(100) DEFAULT NULL,
  `price` float DEFAULT NULL,
  `img` text DEFAULT NULL,
  `Status` varchar(50) DEFAULT NULL,
  `idBrand` int(11) DEFAULT NULL,
  PRIMARY KEY (`idsneaker`),
  KEY `idBrand` (`idBrand`),
  CONSTRAINT `sneaker_ibfk_1` FOREIGN KEY (`idBrand`) REFERENCES `brand` (`idBrand`)
) ENGINE=InnoDB AUTO_INCREMENT=34 DEFAULT CHARSET=utf8mb4;

-- Data exporting was unselected.

-- Dumping structure for table sellingsneaker.status
DROP TABLE IF EXISTS `status`;
CREATE TABLE IF NOT EXISTS `status` (
  `idstatus` int(11) NOT NULL AUTO_INCREMENT,
  `statusor` varchar(50) DEFAULT NULL,
  PRIMARY KEY (`idstatus`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8mb4;

-- Data exporting was unselected.

-- Dumping structure for table sellingsneaker.user
DROP TABLE IF EXISTS `user`;
CREATE TABLE IF NOT EXISTS `user` (
  `iduser` int(11) NOT NULL AUTO_INCREMENT,
  `userName` varchar(100) DEFAULT NULL,
  `userpassword` varchar(100) DEFAULT NULL,
  `phonenumber` varchar(11) DEFAULT NULL,
  `email` varchar(11) DEFAULT NULL,
  `status` varchar(20) DEFAULT NULL,
  `address` varchar(100) DEFAULT NULL,
  PRIMARY KEY (`iduser`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8mb4;

-- Data exporting was unselected.

/*!40101 SET SQL_MODE=IFNULL(@OLD_SQL_MODE, '') */;
/*!40014 SET FOREIGN_KEY_CHECKS=IF(@OLD_FOREIGN_KEY_CHECKS IS NULL, 1, @OLD_FOREIGN_KEY_CHECKS) */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
