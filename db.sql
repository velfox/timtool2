-- --------------------------------------------------------
-- Host:                         127.0.0.1
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
  `bestede_tijd` text COLLATE utf8_bin NOT NULL,
  `user_id` int(11) NOT NULL,
  `opdrachtgever_id` int(11) NOT NULL,
  `discription` text COLLATE utf8_bin NOT NULL,
  `nameopd` text COLLATE utf8_bin NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=128 DEFAULT CHARSET=utf8 COLLATE=utf8_bin;

-- Dumpen data van tabel timetool.besteding: ~23 rows (ongeveer)
/*!40000 ALTER TABLE `besteding` DISABLE KEYS */;
INSERT INTO `besteding` (`id`, `datum`, `bestede_tijd`, `user_id`, `opdrachtgever_id`, `discription`, `nameopd`) VALUES
	(80, '2019-03-02 16:40:57', '20:50:10', 1, 3, 'oki', 'zaalhetlokaal'),
	(119, '2019-03-06 10:19:06', '00:00:03', 3, 3, 'jhauj', 'zaalhetlokaal'),
	(120, '2019-03-06 10:28:05', '00:00:14', 3, 3, 'jha', 'zaalhetlokaal'),
	(121, '2019-03-06 10:30:14', '00:00:08', 3, 3, 'test uren ding', 'zaalhetlokaal'),
	(122, '2019-03-06 10:30:29', '00:00:15', 3, 3, 'test uren ding', 'zaalhetlokaal'),
	(123, '2019-03-06 10:30:51', '00:00:21', 3, 3, 'test uren ding', 'zaalhetlokaal'),
	(124, '2019-03-06 10:30:59', '00:00:08', 3, 3, 'test uren ding', 'zaalhetlokaal'),
	(125, '2019-03-06 10:31:13', '00:00:13', 3, 3, 'test uren ding', 'zaalhetlokaal'),
	(126, '2019-03-06 10:37:50', '00:04:15', 3, 3, 'werken aan website', 'zaalhetlokaal'),
	(127, '2019-03-06 14:55:03', '00:00:00', 3, 3, 'jup', 'zaalhetlokaal');
/*!40000 ALTER TABLE `besteding` ENABLE KEYS */;

-- Structuur van  tabel timetool.opdrachtgevers wordt geschreven
CREATE TABLE IF NOT EXISTS `opdrachtgevers` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` text COLLATE utf8_bin NOT NULL,
  `img` text COLLATE utf8_bin NOT NULL,
  `beschijfing` text COLLATE utf8_bin NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=58 DEFAULT CHARSET=utf8 COLLATE=utf8_bin;

-- Dumpen data van tabel timetool.opdrachtgevers: ~6 rows (ongeveer)
/*!40000 ALTER TABLE `opdrachtgevers` DISABLE KEYS */;
INSERT INTO `opdrachtgevers` (`id`, `name`, `img`, `beschijfing`) VALUES
	(1, 'genpromotion', 'genpromotion.png', 'interne dingen'),
	(2, 'velfox', 'velfox.png', 'interne dingen'),
	(3, 'zaalhetlokaal', 'zaal.png', 'lolwnee'),
	(4, 'livera', 'Livera.png', 'interne dingen'),
	(56, 'paardenkoper', 'paardenkoper.png', 'timenz'),
	(57, 'livera2', 'Livera.png', 'interne dingen');
/*!40000 ALTER TABLE `opdrachtgevers` ENABLE KEYS */;

-- Structuur van  tabel timetool.opdrachtgevers_users wordt geschreven
CREATE TABLE IF NOT EXISTS `opdrachtgevers_users` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `opdrachgever_id` int(11) DEFAULT NULL,
  `user_id` int(11) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=7 DEFAULT CHARSET=utf8 COLLATE=utf8_bin;

-- Dumpen data van tabel timetool.opdrachtgevers_users: ~6 rows (ongeveer)
/*!40000 ALTER TABLE `opdrachtgevers_users` DISABLE KEYS */;
INSERT INTO `opdrachtgevers_users` (`id`, `opdrachgever_id`, `user_id`) VALUES
	(1, 1, 1),
	(2, 4, 1),
	(3, 3, 1),
	(4, 2, 1),
	(5, 56, 1),
	(6, 57, 3);
/*!40000 ALTER TABLE `opdrachtgevers_users` ENABLE KEYS */;

-- Structuur van  tabel timetool.users wordt geschreven
CREATE TABLE IF NOT EXISTS `users` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `username` text COLLATE utf8_bin NOT NULL,
  `password` text COLLATE utf8_bin,
  `email` varchar(50) COLLATE utf8_bin DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8 COLLATE=utf8_bin;

-- Dumpen data van tabel timetool.users: ~0 rows (ongeveer)
/*!40000 ALTER TABLE `users` DISABLE KEYS */;
INSERT INTO `users` (`id`, `username`, `password`, `email`) VALUES
	(1, 'tim', 'ok', NULL),
	(2, 'tim', '$2y$10$kgZlQh1Tnv83R5pc3ifB9OuqU7lE6jdyP4KeIZH3c3k0I9CQVrXVS', NULL),
	(3, 'tim', '$2y$10$7paYfL3kuh.9.PeCnMe1Iux/M3RP5yshAMTISGkxJ/paJAe5usIae', NULL);
/*!40000 ALTER TABLE `users` ENABLE KEYS */;

/*!40101 SET SQL_MODE=IFNULL(@OLD_SQL_MODE, '') */;
/*!40014 SET FOREIGN_KEY_CHECKS=IF(@OLD_FOREIGN_KEY_CHECKS IS NULL, 1, @OLD_FOREIGN_KEY_CHECKS) */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
