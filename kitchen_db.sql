-- --------------------------------------------------------
-- Host:                         127.0.0.1
-- Server version:               5.7.33 - MySQL Community Server (GPL)
-- Server OS:                    Win64
-- HeidiSQL Version:             11.2.0.6213
-- --------------------------------------------------------

/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET NAMES utf8 */;
/*!50503 SET NAMES utf8mb4 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;
/*!40111 SET @OLD_SQL_NOTES=@@SQL_NOTES, SQL_NOTES=0 */;


-- Dumping database structure for kitchen
CREATE DATABASE IF NOT EXISTS `kitchen` /*!40100 DEFAULT CHARACTER SET latin1 */;
USE `kitchen`;

-- Dumping structure for table kitchen.orders
CREATE TABLE IF NOT EXISTS `orders` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `no_meja` int(11) DEFAULT NULL,
  `pesanan` varchar(255) DEFAULT NULL,
  `intruksi` varchar(255) DEFAULT NULL,
  `qty` int(11) DEFAULT NULL,
  `tot_price` int(11) DEFAULT NULL,
  `is_done` enum('Y','N') DEFAULT 'N',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=17 DEFAULT CHARSET=latin1;

-- Dumping data for table kitchen.orders: ~9 rows (approximately)
/*!40000 ALTER TABLE `orders` DISABLE KEYS */;
INSERT INTO `orders` (`id`, `no_meja`, `pesanan`, `intruksi`, `qty`, `tot_price`, `is_done`) VALUES
	(8, 10, 'Nasi goreng ', 'tidak pake cabe merah', NULL, NULL, 'Y'),
	(9, 10, 'Nasi goreng ', 'tidak pake bawang', NULL, NULL, 'Y'),
	(10, 12, 'Nasi goreng ', 'tidak pake bawang', NULL, NULL, 'Y'),
	(11, 12, 'Nasi goreng ', 'tidak pake bawang', NULL, NULL, 'Y'),
	(12, 12, 'Nasi goreng ', 'tidak pake bawang', NULL, NULL, 'Y'),
	(13, 18, 'Nasi goreng ', 'tidak pake bawang', NULL, NULL, 'Y'),
	(14, 19, 'Nasi goreng ', 'tidak pake bawang', NULL, NULL, 'Y'),
	(15, 10, 'Nasi goreng ', 'tidak pake bawang', NULL, NULL, 'N'),
	(16, 1, 'Nasi goreng ', 'tidak pake bawang', NULL, NULL, 'N');
/*!40000 ALTER TABLE `orders` ENABLE KEYS */;

/*!40101 SET SQL_MODE=IFNULL(@OLD_SQL_MODE, '') */;
/*!40014 SET FOREIGN_KEY_CHECKS=IFNULL(@OLD_FOREIGN_KEY_CHECKS, 1) */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40111 SET SQL_NOTES=IFNULL(@OLD_SQL_NOTES, 1) */;
