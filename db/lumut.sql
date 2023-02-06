-- --------------------------------------------------------
-- Host:                         127.0.0.1
-- Server version:               10.4.24-MariaDB - mariadb.org binary distribution
-- Server OS:                    Win64
-- HeidiSQL Version:             12.0.0.6468
-- --------------------------------------------------------

/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET NAMES utf8 */;
/*!50503 SET NAMES utf8mb4 */;
/*!40103 SET @OLD_TIME_ZONE=@@TIME_ZONE */;
/*!40103 SET TIME_ZONE='+00:00' */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;
/*!40111 SET @OLD_SQL_NOTES=@@SQL_NOTES, SQL_NOTES=0 */;

-- Dumping structure for table lumut.account
DROP TABLE IF EXISTS `account`;
CREATE TABLE IF NOT EXISTS `account` (
  `username` varchar(45) NOT NULL,
  `password` varchar(250) NOT NULL,
  `name` varchar(45) NOT NULL,
  `role` varchar(45) NOT NULL,
  PRIMARY KEY (`username`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- Dumping data for table lumut.account: ~3 rows (approximately)
DELETE FROM `account`;
INSERT INTO `account` (`username`, `password`, `name`, `role`) VALUES
	('admin', '$2y$10$Ql0.5slqoRJfnT1ezW5g0eCd7rTKDwrwk1yDaKEn520hRU0x4jIq2', 'admin', 'admin'),
	('author', '$2y$10$w41vwrgY9Th1rHO4S75DuesSikC1.ENM5lVt4ehbaHIlLPfgBnEdq', 'author', 'author'),
	('user', '$2y$10$mA7YTHCSAnEOzyt2wcSeRem7S8VeJngxIBvZdGpczgVd.PhsWblPO', 'useran', 'author');

-- Dumping structure for table lumut.post
DROP TABLE IF EXISTS `post`;
CREATE TABLE IF NOT EXISTS `post` (
  `idpost` int(11) NOT NULL AUTO_INCREMENT,
  `title` text NOT NULL,
  `content` text NOT NULL,
  `date` datetime NOT NULL,
  `username` varchar(45) NOT NULL,
  PRIMARY KEY (`idpost`),
  KEY `fk_post_account_idx` (`username`),
  CONSTRAINT `fk_post_account` FOREIGN KEY (`username`) REFERENCES `account` (`username`) ON DELETE NO ACTION ON UPDATE NO ACTION
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8mb4;

-- Dumping data for table lumut.post: ~3 rows (approximately)
DELETE FROM `post`;
INSERT INTO `post` (`idpost`, `title`, `content`, `date`, `username`) VALUES
	(1, 'berita bola 2022', 'lorem ipsum lorem ipsum lorem ipsum lorem ipsum lorem ipsum lorem ipsum lorem ipsum', '2023-02-06 09:02:47', 'author'),
	(2, 'tutorial crud php mysqli', 'lorem ipsum lorem ipsum lorem ipsum lorem ipsum lorem ipsum lorem ipsum', '2023-02-06 09:02:58', 'author'),
	(3, 'hujan di kanci pejagan', 'lorem ipsum   lorem ipsum lorem ipsum lorem ipsum lorem ipsum lorem ipsum', '2023-02-06 09:02:24', 'admin');

/*!40103 SET TIME_ZONE=IFNULL(@OLD_TIME_ZONE, 'system') */;
/*!40101 SET SQL_MODE=IFNULL(@OLD_SQL_MODE, '') */;
/*!40014 SET FOREIGN_KEY_CHECKS=IFNULL(@OLD_FOREIGN_KEY_CHECKS, 1) */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40111 SET SQL_NOTES=IFNULL(@OLD_SQL_NOTES, 1) */;
