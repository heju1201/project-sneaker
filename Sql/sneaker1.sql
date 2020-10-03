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

-- Dumping data for table sellingsneaker.admin: ~4 rows (approximately)
/*!40000 ALTER TABLE `admin` DISABLE KEYS */;
INSERT INTO `admin` (`idadmin`, `adminName`, `password`, `phone`, `email`) VALUES
	(1, 'quayqua', '123456', '0123456789', 'abcd@gmail.com'),
	(2, 'quayqua1', '123456', '0123456789', 'abcd@gmail.com'),
	(3, 'admin', '123456', '0123456789', 'abcd@gmail.com'),
	(4, 'abc', '323213213', '32321312', 'lhhieu1201@gmail.com');
/*!40000 ALTER TABLE `admin` ENABLE KEYS */;

-- Dumping structure for table sellingsneaker.brand
DROP TABLE IF EXISTS `brand`;
CREATE TABLE IF NOT EXISTS `brand` (
  `idBrand` int(11) NOT NULL AUTO_INCREMENT,
  `brandName` varchar(100) DEFAULT NULL,
  `logo` text DEFAULT NULL,
  PRIMARY KEY (`idBrand`)
) ENGINE=InnoDB AUTO_INCREMENT=7 DEFAULT CHARSET=utf8mb4;

-- Dumping data for table sellingsneaker.brand: ~5 rows (approximately)
/*!40000 ALTER TABLE `brand` DISABLE KEYS */;
INSERT INTO `brand` (`idBrand`, `brandName`, `logo`) VALUES
	(1, 'ADIDAS', 'flag_of_taliban_original.svg.png'),
	(3, 'BALENCIAGA', 'balenciaga.jpg'),
	(4, 'NIKE', 'nike.png'),
	(5, 'GUCCI', 'gucci-logo-su-hinh-thanh-va-phat-trien.jpg'),
	(6, 'CONVERSE', 'rgb_creative_logo_converse_3.jpg');
/*!40000 ALTER TABLE `brand` ENABLE KEYS */;

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

-- Dumping data for table sellingsneaker.order: ~4 rows (approximately)
/*!40000 ALTER TABLE `order` DISABLE KEYS */;
INSERT INTO `order` (`idOrder`, `date`, `iduser`, `idstatus`) VALUES
	(5, '2020-09-19', 2, 3),
	(6, '2020-09-19', 2, 3),
	(7, '2020-09-19', 3, 3),
	(8, '2020-09-19', 3, 3);
/*!40000 ALTER TABLE `order` ENABLE KEYS */;

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

-- Dumping data for table sellingsneaker.orderdetails: ~3 rows (approximately)
/*!40000 ALTER TABLE `orderdetails` DISABLE KEYS */;
INSERT INTO `orderdetails` (`amount`, `size`, `priceor`, `idsneaker`, `idOrder`) VALUES
	(8, 36, 39.03, 4, 7),
	(4, 38, 39.03, 4, 7),
	(3, 41, 47.7, 5, 8);
/*!40000 ALTER TABLE `orderdetails` ENABLE KEYS */;

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

-- Dumping data for table sellingsneaker.sneaker: ~30 rows (approximately)
/*!40000 ALTER TABLE `sneaker` DISABLE KEYS */;
INSERT INTO `sneaker` (`idsneaker`, `sneakerName`, `price`, `img`, `Status`, `idBrand`) VALUES
	(1, 'ADIDAS ALPHABOUNCE INSTINCT ĐEN ĐẾ ĐỎ', 39.03, 'adidas-alphabounce-instinct-den-de-do.jpg', 'stockin', 1),
	(2, 'ADIDAS ALPHABOUNCE INSTINCT M TURQUOISE', 47.7, 'adidas-alphabounce-instinct-m-turquoise.jpg', 'stockin', 1),
	(3, 'ADIDAS ALPHABOUNCE INSTINCT M WHITE RED BLUE', 47.7, 'adidas-alphabounce-instinct-m-white-red-blue-1-1.jpg', 'stockin', 1),
	(4, 'ADIDAS ALPHABOUNCE INSTINCT TRẮNG FULL 2018 NAM NỮ', 39.03, 'adidas-alphabounce-instinct-trang-2018-nam-nu.jpg', 'stockin', 1),
	(5, 'ADIDAS PROPHERE TRẮNG ĐỎ NAM, NỮ', 34.69, 'adidas-prophere-trang-do-nam-nu.jpg', 'stockin', 1),
	(6, 'BALENCIAGA SPEED TRAINER ALL BLACK', 39.03, 'balenciaga-speed-trainer-all-black-1-1.jpg', 'stockin', 3),
	(7, 'BALENCIAGA SPEED TRAINER BLACK WHITE CHARTREUSE', 47.7, 'balenciaga-speed-trainer-black-white-chartreuse-1-1.jpg', 'stockin', 3),
	(8, 'BALENCIAGA TRACK TRẮNG CAM NAM NỮ', 47.7, 'balenciaga-track-trang-cam-nam-nu-1-1.jpg', 'stockin', 3),
	(9, 'BALENCIAGA TRACK TRIPLE WHITE NAM NỮ', 39.03, 'balenciaga-track-triple-white-nam-nu-1-1.jpg', 'stockin', 3),
	(10, 'BALENCIAGA TRIPLE S GREY CLEAR SOLE NAM NỮ 2019', 34.69, 'balenciaga-triple-s-grey-clear-sole-nam-nu-2019.jpg', 'stockin', 3),
	(11, 'BALENCIAGA SPEED TRAINER ALL BLACK', 39.03, 'balenciaga-speed-trainer-all-black-1-1.jpg', 'stockin', 3),
	(12, 'BALENCIAGA SPEED TRAINER BLACK WHITE CHARTREUSE', 47.7, 'balenciaga-speed-trainer-black-white-chartreuse-1-1.jpg', 'stockin', 3),
	(13, 'BALENCIAGA TRACK TRẮNG CAM NAM NỮ', 47.7, 'balenciaga-track-trang-cam-nam-nu-1-1.jpg', 'stockin', 3),
	(14, 'BALENCIAGA TRACK TRIPLE WHITE NAM NỮ', 39.03, 'balenciaga-track-triple-white-nam-nu-1-1.jpg', 'stockin', 3),
	(15, 'BALENCIAGA TRIPLE S GREY CLEAR SOLE NAM NỮ 2019', 34.69, 'balenciaga-triple-s-grey-clear-sole-nam-nu-2019.jpg', 'stockin', 3),
	(16, 'NIKE AIR FORCE 1 LOW IRIDESCENT REFLECTIVE NAM NỮ', 39.03, 'nike-air-force-1-low-iridescent-reflective-nam-nu.jpg', 'stockin', 4),
	(17, 'NIKE AIR FORCE 1 X G-DRAGON PARA NOISE', 47.7, 'nike-air-force-1-para-noise-x-peaceminusone.jpg', 'stockin', 4),
	(18, 'NIKE JOYRIDE RUN FLYKNIT GREY RED', 47.7, 'nike-joyride-run-flyknit-grey-red-1-1.jpg', 'stockin', 4),
	(19, 'NIKE JOYRIDE RUN FLYKNIT WHITE RED', 39.03, 'nike-joyride-run-flyknit-white-red-1-1.jpg', 'stockin', 4),
	(20, 'NIKE M2K TEKNO ĐEN TRẮNG XANH NGỌC NAM, NỮ', 34.69, 'nike-m2k-tekno-den-trang-xanh-ngoc-nam-nu.jpg', 'stockin', 4),
	(21, 'GIÀY GUCCI RHYTON', 39.03, 'giay-gucci-rhyton-1-1.jpg', 'stockin', 5),
	(22, 'GIÀY GUCCI RHYTON LOGO LEATHER', 47.7, 'giay-gucci-rhyton-logo-leather-1-1.jpg', 'stockin', 5),
	(23, 'GIÀY GUCCI RHYTON MOUTH-PRINT', 47.7, 'giay-gucci-rhyton-mouth-print-1-1.jpg', 'stockin', 5),
	(24, 'GIÀY GUCCI RHYTON NEW YORK YANKEESD', 39.03, 'giay-gucci-rhyton-new-york-yankees-1-1.jpg', 'stockin', 5),
	(25, 'GUCCI HỔ NAM, NỮ', 34.69, 'gucci-ho-nam-nu-1-1.jpg', 'stockin', 5),
	(26, 'CONVERSE CHUCK 1970 CHINATOWN MARKET UV ĐỔI MÀU NAM NỮ', 39.03, 'converse-chuck-1970-chinatown-market-uv-doi-mau.jpg', 'stockin', 6),
	(27, 'GCONVERSE CHUCK 1970 ĐEN CỔ CAO NAM, NỮ', 47.7, 'converse-den-co-cao-nam-nu.jpg', 'stockin', 6),
	(28, 'CONVERSE CHUCK 1970 TRẮNG CỔ CAO NAM, NỮ', 47.7, 'converse-chuck-1970-trang-co-cao-nam-nu.jpg', 'stockin', 6),
	(29, 'CONVERSE CHUCK 1970 TRẮNG CỔ THẤP NAM, NỮ', 39.03, 'converse-chuck-1970-trang-co-thap-nam-nu.jpg', 'stockin', 6),
	(30, 'CONVERSE CHUCK 1970 VÀNG CỔ CAO NAM, NỮ', 34.69, 'converse-vang-co-cao-nam-nu.jpg', 'stockin', 6);
/*!40000 ALTER TABLE `sneaker` ENABLE KEYS */;

-- Dumping structure for table sellingsneaker.status
DROP TABLE IF EXISTS `status`;
CREATE TABLE IF NOT EXISTS `status` (
  `idstatus` int(11) NOT NULL AUTO_INCREMENT,
  `statusor` varchar(50) DEFAULT NULL,
  PRIMARY KEY (`idstatus`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8mb4;

-- Dumping data for table sellingsneaker.status: ~3 rows (approximately)
/*!40000 ALTER TABLE `status` DISABLE KEYS */;
INSERT INTO `status` (`idstatus`, `statusor`) VALUES
	(1, 'have not bought yet'),
	(2, 'wait for confirmation'),
	(3, 'confirmed');
/*!40000 ALTER TABLE `status` ENABLE KEYS */;

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

-- Dumping data for table sellingsneaker.user: ~2 rows (approximately)
/*!40000 ALTER TABLE `user` DISABLE KEYS */;
INSERT INTO `user` (`iduser`, `userName`, `userpassword`, `phonenumber`, `email`, `status`, `address`) VALUES
	(2, 'ninh', '123456', '0388859145', 'ninhBD@gmai', 'Open', 'Thái Bình'),
	(3, 'hieu', '12345678', '0983223163', 'ninhOC@gmai', 'Open', 'Ha noi');
/*!40000 ALTER TABLE `user` ENABLE KEYS */;

/*!40101 SET SQL_MODE=IFNULL(@OLD_SQL_MODE, '') */;
/*!40014 SET FOREIGN_KEY_CHECKS=IF(@OLD_FOREIGN_KEY_CHECKS IS NULL, 1, @OLD_FOREIGN_KEY_CHECKS) */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
