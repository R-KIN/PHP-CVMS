-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1:3306
-- Generation Time: Jul 19, 2022 at 03:31 AM
-- Server version: 5.7.36
-- PHP Version: 7.4.26

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `php-cvms`
--

-- --------------------------------------------------------

--
-- Table structure for table `students`
--

DROP TABLE IF EXISTS `students`;
CREATE TABLE IF NOT EXISTS `students` (
  `student_id` int(11) NOT NULL AUTO_INCREMENT,
  `date_created` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `name` varchar(60) NOT NULL,
  `age` varchar(99) NOT NULL,
  `sex` varchar(6) DEFAULT NULL,
  `email` varchar(64) NOT NULL,
  `contact_number` varchar(12) NOT NULL,
  `facebook_link` varchar(30) NOT NULL,
  `address` varchar(80) NOT NULL,
  `region` varchar(80) NOT NULL,
  `province` varchar(80) NOT NULL,
  `city` varchar(60) NOT NULL,
  `course` varchar(10) NOT NULL,
  `year_section` varchar(4) NOT NULL,
  `vaccinated` varchar(3) DEFAULT NULL,
  `vaccine_name` varchar(30) DEFAULT NULL,
  `first_vaccine` date DEFAULT NULL,
  `second_vaccine` date DEFAULT NULL,
  `boosted` varchar(3) DEFAULT NULL,
  `booster_name` varchar(30) DEFAULT NULL,
  `first_booster` date DEFAULT NULL,
  `second_booster` date DEFAULT NULL,
  PRIMARY KEY (`student_id`)
) ENGINE=MyISAM AUTO_INCREMENT=11 DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

DROP TABLE IF EXISTS `users`;
CREATE TABLE IF NOT EXISTS `users` (
  `user_id` int(11) NOT NULL AUTO_INCREMENT,
  `username` varchar(128) NOT NULL,
  `password` varchar(128) NOT NULL,
  PRIMARY KEY (`user_id`)
) ENGINE=MyISAM AUTO_INCREMENT=4 DEFAULT CHARSET=utf8;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`user_id`, `username`, `password`) VALUES
(1, 'admin', '$2y$10$IoppKyIlP/mY5RGKLiTw1OqejN9RbE/W5/bxJwiRzjLX0PaAekZ8C');
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
