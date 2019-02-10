-- --------------------------------------------------------
-- Host:                         localhost
-- Server versie:                5.7.19 - MySQL Community Server (GPL)
-- Server OS:                    Win64
-- HeidiSQL Versie:              9.4.0.5125
-- --------------------------------------------------------

/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET NAMES utf8 */;
/*!50503 SET NAMES utf8mb4 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;


-- Databasestructuur van timetool wordt geschreven
CREATE DATABASE IF NOT EXISTS `timetool` /*!40100 DEFAULT CHARACTER SET utf8 COLLATE utf8_bin */;
USE `timetool`;

-- Structuur van  tabel timetool.besteding wordt geschreven
CREATE TABLE IF NOT EXISTS `besteding` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `datum` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `bestede-tijd` time NOT NULL,
  `user_id` int(11) NOT NULL,
  `opdrachtgever_id` int(11) NOT NULL,
  `discription` text COLLATE utf8_bin NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin;

-- Dumpen data van tabel timetool.besteding: ~0 rows (ongeveer)
/*!40000 ALTER TABLE `besteding` DISABLE KEYS */;
/*!40000 ALTER TABLE `besteding` ENABLE KEYS */;

-- Structuur van  tabel timetool.opdrachtgevers wordt geschreven
CREATE TABLE IF NOT EXISTS `opdrachtgevers` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` text COLLATE utf8_bin NOT NULL,
  `img` text COLLATE utf8_bin NOT NULL,
  `beschijfing` text COLLATE utf8_bin NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=utf8 COLLATE=utf8_bin;

-- Dumpen data van tabel timetool.opdrachtgevers: ~4 rows (ongeveer)
/*!40000 ALTER TABLE `opdrachtgevers` DISABLE KEYS */;
INSERT INTO `opdrachtgevers` (`id`, `name`, `img`, `beschijfing`) VALUES
	(1, 'genpromotion', 'genpromotion.png', 'interne dingen'),
	(2, 'velfox', 'genpromotion.png', 'interne dingen'),
	(3, 'exstra', 'genpromotion.png', 'lolwnee'),
	(4, 'kippeb', 'genpromotion.png', 'interne dingen');
/*!40000 ALTER TABLE `opdrachtgevers` ENABLE KEYS */;

-- Structuur van  tabel timetool.opdrachtgevers_users wordt geschreven
CREATE TABLE IF NOT EXISTS `opdrachtgevers_users` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `opdrachgever_id` int(11) DEFAULT NULL,
  `user_id` int(11) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8 COLLATE=utf8_bin;

-- Dumpen data van tabel timetool.opdrachtgevers_users: ~0 rows (ongeveer)
/*!40000 ALTER TABLE `opdrachtgevers_users` DISABLE KEYS */;
INSERT INTO `opdrachtgevers_users` (`id`, `opdrachgever_id`, `user_id`) VALUES
	(1, 1, 1),
	(2, 4, 1);
/*!40000 ALTER TABLE `opdrachtgevers_users` ENABLE KEYS */;

-- Structuur van  tabel timetool.users wordt geschreven
CREATE TABLE IF NOT EXISTS `users` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `username` text COLLATE utf8_bin NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8 COLLATE=utf8_bin;

-- Dumpen data van tabel timetool.users: ~0 rows (ongeveer)
/*!40000 ALTER TABLE `users` DISABLE KEYS */;
INSERT INTO `users` (`id`, `username`) VALUES
	(1, 'tim');
/*!40000 ALTER TABLE `users` ENABLE KEYS */;

/*!40101 SET SQL_MODE=IFNULL(@OLD_SQL_MODE, '') */;
/*!40014 SET FOREIGN_KEY_CHECKS=IF(@OLD_FOREIGN_KEY_CHECKS IS NULL, 1, @OLD_FOREIGN_KEY_CHECKS) */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
