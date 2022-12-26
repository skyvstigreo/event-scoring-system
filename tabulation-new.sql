-- --------------------------------------------------------
-- Host:                         127.0.0.1
-- Server version:               10.4.25-MariaDB - mariadb.org binary distribution
-- Server OS:                    Win64
-- HeidiSQL Version:             12.3.0.6589
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
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `category_id` varchar(50) DEFAULT NULL,
  `category_name` varchar(50) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=utf8mb4;

-- Dumping data for table tabulation.table_category: ~1 rows (approximately)
INSERT INTO `table_category` (`id`, `category_id`, `category_name`) VALUES
	(1, 'category-8r1gy', 'English Month'),
	(2, 'category-tjlua', 'Math Month'),
	(3, 'category-hzjiu', 'Science Month'),
	(4, 'category-et3fz', 'Foundation Day'),
	(5, 'category-ofdv1', 'Intramurals');

-- Dumping structure for table tabulation.table_contestant
CREATE TABLE IF NOT EXISTS `table_contestant` (
  `contestant_id` int(11) NOT NULL AUTO_INCREMENT,
  `first_name` varchar(50) NOT NULL,
  `middle_name` varchar(50) DEFAULT NULL,
  `last_name` varchar(50) NOT NULL,
  `gender` enum('Male','Female') NOT NULL,
  `course_id` int(11) NOT NULL,
  `event_id` int(11) NOT NULL,
  `status` enum('0','1') NOT NULL,
  PRIMARY KEY (`contestant_id`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8mb4;

-- Dumping data for table tabulation.table_contestant: ~1 rows (approximately)
INSERT INTO `table_contestant` (`contestant_id`, `first_name`, `middle_name`, `last_name`, `gender`, `course_id`, `event_id`, `status`) VALUES
	(1, 'John', 'P', 'Doe', 'Male', 14, 0, '0');

-- Dumping structure for table tabulation.table_course
CREATE TABLE IF NOT EXISTS `table_course` (
  `course_id` int(11) NOT NULL AUTO_INCREMENT,
  `course_name` varchar(50) DEFAULT NULL,
  `course_description` varchar(255) DEFAULT NULL,
  PRIMARY KEY (`course_id`)
) ENGINE=InnoDB AUTO_INCREMENT=23 DEFAULT CHARSET=utf8mb4;

-- Dumping data for table tabulation.table_course: ~22 rows (approximately)
INSERT INTO `table_course` (`course_id`, `course_name`, `course_description`) VALUES
	(1, 'GAS', 'General Academic Strands'),
	(2, 'STEM', 'Science & Technology Engineering & Math'),
	(3, 'HUMMS', 'Humanities & Social Science'),
	(4, 'ABM', 'Accountancy, Business & Management'),
	(5, 'ICT', 'ICT'),
	(6, 'BSCS', 'Bachelor of Science in Computer Science'),
	(7, 'BSIT', 'Bachelor of Science in Information Technology'),
	(8, 'ACT', 'Associate in Computer Technology'),
	(9, 'BSIE', 'Bachelor of Science in Industrial Engineering'),
	(10, 'BSCpE', 'Bachelor of Science in Computer Engineering'),
	(11, 'BEE', 'Bachelor of Elementary Education'),
	(12, 'BSE', 'Bachelor of Secondary Education '),
	(13, 'BSCRIM', 'Bachelor of Science in Criminology'),
	(14, 'BSTM', 'Bachelor of Science in Tourism Management'),
	(15, 'BSHM', 'Bachelor of Science in Hotel Management'),
	(16, 'BSBA', 'Bachelor of Science in Business Administration'),
	(17, 'BSCA', 'Bachelor of Science in Custom Administration'),
	(18, 'BSA', 'Bachelor of Science in Accountancy'),
	(19, 'BSPSY', 'Bachelor of Science in Psychology'),
	(20, 'BSREM', 'Bachelor of Science in Real Estate Management'),
	(21, 'DICT', 'Diploma in Information and Communication Technology'),
	(22, 'DTM', ' Diploma in Tourism Management');

-- Dumping structure for table tabulation.table_criteria
CREATE TABLE IF NOT EXISTS `table_criteria` (
  `criteria_id` int(11) NOT NULL AUTO_INCREMENT,
  `event_id` int(11) NOT NULL,
  `criteria_name` varchar(255) NOT NULL,
  `criteria_percent` int(11) NOT NULL,
  PRIMARY KEY (`criteria_id`)
) ENGINE=InnoDB AUTO_INCREMENT=35 DEFAULT CHARSET=utf8mb4;

-- Dumping data for table tabulation.table_criteria: ~0 rows (approximately)

-- Dumping structure for table tabulation.table_event
CREATE TABLE IF NOT EXISTS `table_event` (
  `event_id` int(11) NOT NULL AUTO_INCREMENT,
  `category_id` varchar(50) NOT NULL,
  `event_name` varchar(255) NOT NULL,
  PRIMARY KEY (`event_id`)
) ENGINE=InnoDB AUTO_INCREMENT=26 DEFAULT CHARSET=utf8mb4;

-- Dumping data for table tabulation.table_event: ~7 rows (approximately)
INSERT INTO `table_event` (`event_id`, `category_id`, `event_name`) VALUES
	(1, 'category-8r1gy', 'Speech Choir'),
	(2, 'category-8r1gy', 'Film Making'),
	(3, 'category-8r1gy', 'Essay Writing'),
	(4, 'category-8r1gy', 'Spelling Bee'),
	(5, 'category-8r1gy', 'Story Telling'),
	(6, 'category-8r1gy', 'Oration'),
	(7, 'category-8r1gy', 'Radio Drama'),
	(8, 'category-tjlua', 'Quiz Bee'),
	(9, 'category-tjlua', 'Rubics Cube Contest'),
	(10, 'category-hzjiu', 'Science Quiz Bee'),
	(11, 'category-hzjiu', 'Experiment Show'),
	(12, 'category-hzjiu', 'Speech Choir'),
	(13, 'category-et3fz', 'Speech Choir'),
	(14, 'category-et3fz', 'Singing Contest'),
	(15, 'category-et3fz', 'Dance Contest'),
	(16, 'category-et3fz', 'Cheer Dance'),
	(17, 'category-ofdv1', 'Basketball'),
	(18, 'category-ofdv1', 'Badminton'),
	(19, 'category-ofdv1', 'Swimming'),
	(20, 'category-ofdv1', 'Chess'),
	(21, 'category-ofdv1', 'Volleyball'),
	(22, 'category-ofdv1', 'Cheer Dance'),
	(23, 'category-ofdv1', 'Poster Making'),
	(24, 'category-ofdv1', 'Dance Competition'),
	(25, 'category-ofdv1', 'Singing Competition');

-- Dumping structure for table tabulation.table_schedule
CREATE TABLE IF NOT EXISTS `table_schedule` (
  `sched_id` int(11) NOT NULL AUTO_INCREMENT,
  `event_id` int(11) DEFAULT NULL,
  `category_id` varchar(50) DEFAULT NULL,
  `event_venue` varchar(255) DEFAULT NULL,
  `event_date` date DEFAULT NULL,
  `event_time` time DEFAULT NULL,
  `end_time` time NOT NULL DEFAULT '00:00:00',
  PRIMARY KEY (`sched_id`)
) ENGINE=InnoDB AUTO_INCREMENT=17 DEFAULT CHARSET=utf8mb4;

-- Dumping data for table tabulation.table_schedule: ~0 rows (approximately)
INSERT INTO `table_schedule` (`sched_id`, `event_id`, `category_id`, `event_venue`, `event_date`, `event_time`, `end_time`) VALUES
	(15, 18, 'category-ofdv1', 'Gym', '2022-12-24', '19:33:00', '22:35:00'),
	(16, 16, 'category-et3fz', 'Gym', '2022-12-24', '19:59:00', '22:03:00');

-- Dumping structure for table tabulation.table_user
CREATE TABLE IF NOT EXISTS `table_user` (
  `user_id` int(11) NOT NULL AUTO_INCREMENT,
  `user_type` enum('0','1') NOT NULL DEFAULT '1',
  `event_id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL DEFAULT '',
  `username` varchar(50) NOT NULL DEFAULT '',
  `password` varchar(255) NOT NULL DEFAULT '',
  PRIMARY KEY (`user_id`)
) ENGINE=InnoDB AUTO_INCREMENT=11 DEFAULT CHARSET=utf8mb4;

-- Dumping data for table tabulation.table_user: ~2 rows (approximately)
INSERT INTO `table_user` (`user_id`, `user_type`, `event_id`, `name`, `username`, `password`) VALUES
	(6, '0', 0, 'admin', 'admin', '$2y$10$MlQ4pakEHLQbC8N70.7NVOY0iHJN2S4VLhQAly1Ey27AhIJ9QSNEi'),
	(10, '1', 8, 'John Doe', 'donjohn', '$2y$10$dMc8hLA3QHuGk.4sdde/8exj1w7doNZ0QkPLyv2HnRRoQPy60p9v2');

/*!40103 SET TIME_ZONE=IFNULL(@OLD_TIME_ZONE, 'system') */;
/*!40101 SET SQL_MODE=IFNULL(@OLD_SQL_MODE, '') */;
/*!40014 SET FOREIGN_KEY_CHECKS=IFNULL(@OLD_FOREIGN_KEY_CHECKS, 1) */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40111 SET SQL_NOTES=IFNULL(@OLD_SQL_NOTES, 1) */;
