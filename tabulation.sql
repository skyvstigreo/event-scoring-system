-- --------------------------------------------------------
-- Host:                         127.0.0.1
-- Server version:               10.4.25-MariaDB - mariadb.org binary distribution
-- Server OS:                    Win64
-- HeidiSQL Version:             12.1.0.6537
-- --------------------------------------------------------

/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET NAMES utf8 */;
/*!50503 SET NAMES utf8mb4 */;
/*!40103 SET @OLD_TIME_ZONE=@@TIME_ZONE */;
/*!40103 SET TIME_ZONE='+00:00' */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;
/*!40111 SET @OLD_SQL_NOTES=@@SQL_NOTES, SQL_NOTES=0 */;


-- Dumping database structure for tabulation
CREATE DATABASE IF NOT EXISTS `tabulation` /*!40100 DEFAULT CHARACTER SET utf8mb4 */;
USE `tabulation`;

-- Dumping structure for table tabulation.table_category
CREATE TABLE IF NOT EXISTS `table_category` (
  `category_id` int(11) NOT NULL AUTO_INCREMENT,
  `category_name` varchar(50) DEFAULT NULL,
  `category_description` varchar(255) DEFAULT NULL,
  PRIMARY KEY (`category_id`)
) ENGINE=InnoDB AUTO_INCREMENT=9 DEFAULT CHARSET=utf8mb4;

-- Dumping data for table tabulation.table_category: ~3 rows (approximately)
INSERT INTO `table_category` (`category_id`, `category_name`, `category_description`) VALUES
	(2, 'Swimming ', 'AAA'),
	(3, 'Dancing', 'Interpretative'),
	(4, 'Coding', 'Hello World');

-- Dumping structure for table tabulation.table_contestant
CREATE TABLE IF NOT EXISTS `table_contestant` (
  `contestant_id` int(11) NOT NULL AUTO_INCREMENT,
  `first_name` varchar(50) DEFAULT NULL,
  `middle_name` varchar(50) DEFAULT NULL,
  `last_name` varchar(50) DEFAULT NULL,
  `gender` enum('Male','Female') DEFAULT NULL,
  `birthday` date DEFAULT NULL,
  `age` int(11) DEFAULT NULL,
  `course_id` int(11) DEFAULT NULL,
  `event_id` int(11) DEFAULT NULL,
  PRIMARY KEY (`contestant_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- Dumping data for table tabulation.table_contestant: ~0 rows (approximately)

-- Dumping structure for table tabulation.table_course
CREATE TABLE IF NOT EXISTS `table_course` (
  `course_id` int(11) NOT NULL AUTO_INCREMENT,
  `course_name` varchar(50) DEFAULT NULL,
  `course_description` varchar(255) DEFAULT NULL,
  PRIMARY KEY (`course_id`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8mb4;

-- Dumping data for table tabulation.table_course: ~3 rows (approximately)
INSERT INTO `table_course` (`course_id`, `course_name`, `course_description`) VALUES
	(1, 'BSIT', NULL),
	(2, 'BSCS', NULL),
	(3, 'BSBA', NULL);

-- Dumping structure for table tabulation.table_event
CREATE TABLE IF NOT EXISTS `table_event` (
  `event_id` int(11) NOT NULL AUTO_INCREMENT,
  `event_name` varchar(50) DEFAULT NULL,
  `event_type` varchar(50) DEFAULT NULL,
  `event_description` varchar(255) DEFAULT NULL,
  `event_venue` varchar(255) DEFAULT NULL,
  `event_organizer` varchar(255) DEFAULT NULL,
  `event_date` date DEFAULT NULL,
  `event_time` time DEFAULT NULL,
  `end_time` time NOT NULL DEFAULT '00:00:00',
  PRIMARY KEY (`event_id`)
) ENGINE=InnoDB AUTO_INCREMENT=7 DEFAULT CHARSET=utf8mb4;

-- Dumping data for table tabulation.table_event: ~2 rows (approximately)
INSERT INTO `table_event` (`event_id`, `event_name`, `event_type`, `event_description`, `event_venue`, `event_organizer`, `event_date`, `event_time`, `end_time`) VALUES
	(3, 'Beauty Contest', '3', 'hello', 'hello', 'hello', '2022-12-15', '01:42:00', '00:00:00'),
	(6, 'Dancing Contest', '3', 'Dancing Show', 'LOA', 'Paul', '2022-12-16', '17:40:00', '00:00:00');

-- Dumping structure for table tabulation.table_judge
CREATE TABLE IF NOT EXISTS `table_judge` (
  `judge_id` int(11) NOT NULL AUTO_INCREMENT,
  `first_name` varchar(50) NOT NULL DEFAULT '',
  `middle_name` varchar(50) NOT NULL DEFAULT '',
  `last_name` varchar(50) NOT NULL DEFAULT '',
  `achievement` varchar(255) NOT NULL DEFAULT '',
  `username` varchar(50) NOT NULL DEFAULT '',
  `password` varchar(255) NOT NULL DEFAULT '',
  PRIMARY KEY (`judge_id`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=utf8mb4;

-- Dumping data for table tabulation.table_judge: ~0 rows (approximately)

/*!40103 SET TIME_ZONE=IFNULL(@OLD_TIME_ZONE, 'system') */;
/*!40101 SET SQL_MODE=IFNULL(@OLD_SQL_MODE, '') */;
/*!40014 SET FOREIGN_KEY_CHECKS=IFNULL(@OLD_FOREIGN_KEY_CHECKS, 1) */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40111 SET SQL_NOTES=IFNULL(@OLD_SQL_NOTES, 1) */;
