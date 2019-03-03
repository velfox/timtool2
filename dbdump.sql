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
) ENGINE=InnoDB AUTO_INCREMENT=112 DEFAULT CHARSET=utf8 COLLATE=utf8_bin;

-- Dumpen data van tabel timetool.besteding: ~15 rows (ongeveer)
/*!40000 ALTER TABLE `besteding` DISABLE KEYS */;
INSERT INTO `besteding` (`id`, `datum`, `bestede_tijd`, `user_id`, `opdrachtgever_id`, `discription`, `nameopd`) VALUES
	(72, '2019-03-02 16:40:57', '20:50:10', 1, 3, 'oki', 'zaalhetlokaal'),
	(80, '2019-03-02 16:40:57', '20:50:10', 1, 3, 'oki', 'zaalhetlokaal'),
	(81, '2019-03-02 16:40:57', '99:50:10', 1, 3, 'oki', 'zaalhetlokaal'),
	(96, '2019-03-03 19:02:24', '99:06:03', 1, 3, 'jhauj', 'zaalhetlokaal'),
	(97, '2019-03-02 16:40:57', '20:50:10', 1, 3, 'oki', 'zaalhetlokaal'),
	(98, '2019-03-02 16:40:57', '20:50:10', 1, 3, 'oki', 'zaalhetlokaal'),
	(99, '2019-03-03 19:07:23', '00:00:06', 1, 1, 'dingen doen voor website', 'genpromotion'),
	(100, '2019-03-03 19:07:27', '00:00:04', 1, 1, 'dingen doen voor website', 'genpromotion'),
	(101, '2019-03-03 19:55:27', '00:00:04', 1, 2, 'jha', 'velfox'),
	(102, '2019-03-03 19:55:41', '00:00:00', 1, 2, 'jha', 'velfox'),
	(103, '2019-03-03 19:55:41', '00:00:00', 1, 2, 'jha', 'velfox'),
	(104, '2019-03-03 19:55:41', '00:00:00', 1, 2, 'jha', 'velfox'),
	(105, '2019-03-03 19:55:41', '00:00:00', 1, 2, 'jha', 'velfox'),
	(106, '2019-03-03 19:55:41', '00:00:00', 1, 2, 'jha', 'velfox'),
	(107, '2019-03-03 19:55:42', '00:00:00', 1, 2, 'jha', 'velfox'),
	(108, '2019-03-03 20:05:33', '00:00:13', 1, 4, 'werken aan de winkel', 'livera'),
	(109, '2019-03-03 20:08:11', '00:00:56', 1, 4, 'werken aan de winkel', 'livera'),
	(110, '2019-03-03 20:24:10', '00:00:08', 1, 2, 'werken aan de website', 'velfox'),
	(111, '2019-03-03 20:37:49', '00:00:04', 1, 2, 'dingen doen', 'velfox');
/*!40000 ALTER TABLE `besteding` ENABLE KEYS */;

-- Structuur van  tabel timetool.opdrachtgevers wordt geschreven
CREATE TABLE IF NOT EXISTS `opdrachtgevers` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` text COLLATE utf8_bin NOT NULL,
  `img` text COLLATE utf8_bin NOT NULL,
  `beschijfing` text COLLATE utf8_bin NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=58 DEFAULT CHARSET=utf8 COLLATE=utf8_bin;

-- Dumpen data van tabel timetool.opdrachtgevers: ~4 rows (ongeveer)
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

-- Dumpen data van tabel timetool.opdrachtgevers_users: ~4 rows (ongeveer)
/*!40000 ALTER TABLE `opdrachtgevers_users` DISABLE KEYS */;
INSERT INTO `opdrachtgevers_users` (`id`, `opdrachgever_id`, `user_id`) VALUES
	(1, 1, 1),
	(2, 4, 1),
	(3, 3, 1),
	(4, 2, 1),
	(5, 56, 1),
	(6, 57, 1);
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
