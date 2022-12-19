-- phpMyAdmin SQL Dump
-- version 4.8.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Dec 19, 2022 at 07:32 PM
-- Server version: 10.1.33-MariaDB
-- PHP Version: 7.2.6

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `tabulation`
--

-- --------------------------------------------------------

--
-- Table structure for table `table_category`
--

CREATE TABLE `table_category` (
  `id` int(11) NOT NULL,
  `category_id` varchar(50) DEFAULT NULL,
  `category_name` varchar(50) DEFAULT NULL,
  `category_description` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `table_category`
--

INSERT INTO `table_category` (`id`, `category_id`, `category_name`, `category_description`) VALUES
(26, 'category-ydcz5', 'Buwan ng Wika', 'Aug Celebtation'),
(27, 'category-5wkbg', 'Intramurals', 'Intrams'),
(28, 'category-jgxvf', 'English Month', 'English Events');

-- --------------------------------------------------------

--
-- Table structure for table `table_contestant`
--

CREATE TABLE `table_contestant` (
  `contestant_id` int(11) NOT NULL,
  `first_name` varchar(50) NOT NULL,
  `middle_name` varchar(50) DEFAULT NULL,
  `last_name` varchar(50) NOT NULL,
  `gender` enum('Male','Female') NOT NULL,
  `birthday` date NOT NULL,
  `age` int(11) NOT NULL,
  `course_id` int(11) NOT NULL,
  `event_id` int(11) NOT NULL,
  `status` enum('0','1') NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `table_contestant`
--

INSERT INTO `table_contestant` (`contestant_id`, `first_name`, `middle_name`, `last_name`, `gender`, `birthday`, `age`, `course_id`, `event_id`, `status`) VALUES
(1, 'dsa', 'dasd', 'asdasd', 'Female', '2022-12-22', 20, 1, 0, '1'),
(4, 'JM', 'M', 'Libued', 'Male', '2022-12-14', 22, 1, 6, '0'),
(5, 'JM', 'M', 'Libued', 'Female', '2022-12-14', 22, 6, 3, '0');

-- --------------------------------------------------------

--
-- Table structure for table `table_course`
--

CREATE TABLE `table_course` (
  `course_id` int(11) NOT NULL,
  `course_name` varchar(50) DEFAULT NULL,
  `course_description` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `table_course`
--

INSERT INTO `table_course` (`course_id`, `course_name`, `course_description`) VALUES
(1, 'BSIT', 'bachelor of sciebce \r\n'),
(2, 'BSCS', 'dasdas'),
(6, 'dsada', 'dasdas'),
(7, NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `table_criteria`
--

CREATE TABLE `table_criteria` (
  `criteria_id` int(11) NOT NULL,
  `event_id` int(11) NOT NULL,
  `criteria_name` varchar(255) NOT NULL,
  `criteria_percent` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `table_criteria`
--

INSERT INTO `table_criteria` (`criteria_id`, `event_id`, `criteria_name`, `criteria_percent`) VALUES
(1, 8, 'sadasd', 1),
(3, 8, 'dasd', 1),
(5, 9, 'Score', 100),
(15, 12, 'Completeness', 100);

-- --------------------------------------------------------

--
-- Table structure for table `table_event`
--

CREATE TABLE `table_event` (
  `event_id` int(11) NOT NULL,
  `category_id` varchar(50) NOT NULL,
  `event_name` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `table_event`
--

INSERT INTO `table_event` (`event_id`, `category_id`, `event_name`) VALUES
(6, 'category-ydcz5', 'Slogan Making'),
(7, 'category-ydcz5', 'Tula Making'),
(8, 'category-5wkbg', 'Volleyball'),
(9, 'category-5wkbg', 'Basketball'),
(10, 'category-5wkbg', 'TableTennis'),
(11, 'category-jgxvf', 'Speech choir'),
(12, 'category-jgxvf', 'Film making'),
(13, 'category-jgxvf', 'Essay writing'),
(14, 'category-jgxvf', 'Spelling bee'),
(15, 'category-jgxvf', 'Story Telling'),
(16, 'category-jgxvf', 'Oration'),
(17, 'category-jgxvf', 'Radio Drama');

-- --------------------------------------------------------

--
-- Table structure for table `table_schedule`
--

CREATE TABLE `table_schedule` (
  `sched_id` int(11) NOT NULL,
  `event_id` int(11) DEFAULT NULL,
  `category_id` varchar(50) DEFAULT NULL,
  `event_venue` varchar(255) DEFAULT NULL,
  `event_date` date DEFAULT NULL,
  `event_time` time DEFAULT NULL,
  `end_time` time NOT NULL DEFAULT '00:00:00'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `table_schedule`
--

INSERT INTO `table_schedule` (`sched_id`, `event_id`, `category_id`, `event_venue`, `event_date`, `event_time`, `end_time`) VALUES
(1, 8, 'category-5wkbg', 'LOA', '2022-12-24', '12:26:00', '12:26:00'),
(2, 9, 'category-5wkbg', 'hello', '2022-12-23', '13:25:00', '13:25:00'),
(3, 12, 'category-jgxvf', 'LOA', '2022-12-22', '14:26:00', '14:26:00');

-- --------------------------------------------------------

--
-- Table structure for table `table_user`
--

CREATE TABLE `table_user` (
  `user_id` int(11) NOT NULL,
  `user_type` enum('0','1') NOT NULL,
  `event_id` int(11) NOT NULL,
  `first_name` varchar(50) NOT NULL DEFAULT '',
  `middle_name` varchar(50) DEFAULT '',
  `last_name` varchar(50) NOT NULL DEFAULT '',
  `achievement` varchar(255) NOT NULL DEFAULT '',
  `status` enum('0','1') NOT NULL,
  `username` varchar(50) NOT NULL DEFAULT '',
  `password` varchar(255) NOT NULL DEFAULT ''
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `table_user`
--

INSERT INTO `table_user` (`user_id`, `user_type`, `event_id`, `first_name`, `middle_name`, `last_name`, `achievement`, `status`, `username`, `password`) VALUES
(6, '0', 0, 'TABULATION', 'X', 'TABUDLO', 'backend developer', '0', 'admin', '$2y$10$3B36zb4n8NF4zEdDSNXESOnB5wwOSEGFmWy85o7jVa3yqmDkfv/2S'),
(7, '1', 3, 'ssad', 'asd', 'da', 'asdasd', '0', 'judge 1', '$2y$10$jin3xhM6s66vII/UhrDLPe.XHPZHY6gP0TiBjuZCLSS0kEpUXnKQK'),
(8, '1', 3, 'JM', 'M', 'Libued', 'dadas', '0', 'asdasdas', '$2y$10$eRnTIT3X/r8jdFwkO0T2HucAkbn/Zby9aD85XyVrgpD3jRdnK5v8S');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `table_category`
--
ALTER TABLE `table_category`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `table_contestant`
--
ALTER TABLE `table_contestant`
  ADD PRIMARY KEY (`contestant_id`);

--
-- Indexes for table `table_course`
--
ALTER TABLE `table_course`
  ADD PRIMARY KEY (`course_id`);

--
-- Indexes for table `table_criteria`
--
ALTER TABLE `table_criteria`
  ADD PRIMARY KEY (`criteria_id`);

--
-- Indexes for table `table_event`
--
ALTER TABLE `table_event`
  ADD PRIMARY KEY (`event_id`);

--
-- Indexes for table `table_schedule`
--
ALTER TABLE `table_schedule`
  ADD PRIMARY KEY (`sched_id`);

--
-- Indexes for table `table_user`
--
ALTER TABLE `table_user`
  ADD PRIMARY KEY (`user_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `table_category`
--
ALTER TABLE `table_category`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=29;

--
-- AUTO_INCREMENT for table `table_contestant`
--
ALTER TABLE `table_contestant`
  MODIFY `contestant_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `table_course`
--
ALTER TABLE `table_course`
  MODIFY `course_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `table_criteria`
--
ALTER TABLE `table_criteria`
  MODIFY `criteria_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;

--
-- AUTO_INCREMENT for table `table_event`
--
ALTER TABLE `table_event`
  MODIFY `event_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=18;

--
-- AUTO_INCREMENT for table `table_schedule`
--
ALTER TABLE `table_schedule`
  MODIFY `sched_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `table_user`
--
ALTER TABLE `table_user`
  MODIFY `user_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
