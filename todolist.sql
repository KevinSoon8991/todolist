-- --------------------------------------------------------
-- Host:                         127.0.0.1
-- Server version:               10.4.21-MariaDB - mariadb.org binary distribution
-- Server OS:                    Win64
-- HeidiSQL Version:             11.3.0.6295
-- --------------------------------------------------------

/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET NAMES utf8 */;
/*!50503 SET NAMES utf8mb4 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;
/*!40111 SET @OLD_SQL_NOTES=@@SQL_NOTES, SQL_NOTES=0 */;

-- Dumping data for table todolist.todolist: ~3 rows (approximately)
DELETE FROM `todolist`;
/*!40000 ALTER TABLE `todolist` DISABLE KEYS */;
INSERT INTO `todolist` (`id`, `user_id`, `title`, `description`, `date_created`, `last_modified`, `due_date`) VALUES
	(11, 'itadmin', 'Groceries', 'buy groceries at berastagi supermarket', '2021-11-20 12:51:53', '2021-11-20 12:51:53', '2021-11-30 00:00:00'),
	(12, 'Kevin', 'bootcamp', 'Play coding bootcamp', '2021-11-20 12:59:46', '2021-11-20 12:59:46', '2021-11-30 00:00:00'),
	(14, 'itadmin', 'Bitcoin', 'play bitcoin', '2021-11-21 14:35:12', '2021-11-21 14:35:12', '2021-11-30 00:00:00');
/*!40000 ALTER TABLE `todolist` ENABLE KEYS */;

-- Dumping data for table todolist.user: ~1 rows (approximately)
DELETE FROM `user`;
/*!40000 ALTER TABLE `user` DISABLE KEYS */;
INSERT INTO `user` (`username`, `email`, `password`) VALUES
	('itadmin', 'itadmin@gmail.com', '$2y$10$l1hJaeJeTklNYhakJ3.YPO8ZPCQ9V6vJM.6QCzf6THQf8jTy/dNmW'),
	('Kevin', 'kevinsoon8991@gmail.com', '$2y$10$iAn5crM68OdbHl/aLQ6DQ.LxSyBOsGbUZT7mS3/I6udcGVF0IdlmC');
/*!40000 ALTER TABLE `user` ENABLE KEYS */;

/*!40101 SET SQL_MODE=IFNULL(@OLD_SQL_MODE, '') */;
/*!40014 SET FOREIGN_KEY_CHECKS=IFNULL(@OLD_FOREIGN_KEY_CHECKS, 1) */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40111 SET SQL_NOTES=IFNULL(@OLD_SQL_NOTES, 1) */;
