-- phpMyAdmin SQL Dump
-- version 3.5.2.2
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: Dec 18, 2013 at 01:06 PM
-- Server version: 5.5.27
-- PHP Version: 5.4.7

SET SQL_MODE="NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `simple_personnel`
--

-- --------------------------------------------------------

--
-- Table structure for table `employees`
--

CREATE TABLE IF NOT EXISTS `employees` (
  `id` bigint(20) NOT NULL AUTO_INCREMENT,
  `first_name` varchar(32) NOT NULL,
  `last_name` varchar(32) NOT NULL,
  `telephone` varchar(16) DEFAULT NULL,
  `house_name_number` varchar(32) DEFAULT NULL,
  `street` varchar(32) DEFAULT NULL,
  `town` varchar(32) DEFAULT NULL,
  `city` varchar(32) DEFAULT NULL,
  `post_code` varchar(8) DEFAULT NULL,
  `active_status` tinyint(1) NOT NULL DEFAULT '1',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=14 ;

--
-- Dumping data for table `employees`
--

INSERT INTO `employees` (`id`, `first_name`, `last_name`, `telephone`, `house_name_number`, `street`, `town`, `city`, `post_code`, `active_status`) VALUES
(1, 'Paul', 'Irish', '', '', '', '', '', '', 0),
(2, 'Joe', 'Bloggs', '', '', '', '', '', '', 1),
(3, 'Pink', 'Floyd', '', '', '', '', '', '', 1),
(4, 'Bob', 'Dylan', '', '', '', '', '', '', 1),
(5, 'Thom', 'Yorke', '01234 567891', 'Some Cool House', 'Radiohead Road', 'Karmapolice', 'Oxford', 'OX12 1NS', 1),
(6, 'Mark', 'King', '02460 956472', '56', 'Station Road', 'Devizes', 'Wiltshire', 'SN10 3DE', 1),
(7, 'Graham', 'Turner', '07456 987654', '', '', '', '', '', 1),
(8, 'David', 'Haskins', '01235 984762', '', '', '', '', '', 1),
(9, 'Claire', 'Winterbottom', '', '', '', '', '', '', 1),
(10, 'Diane', 'Weller', '', '', '', '', '', '', 1),
(11, 'Emma', 'Wellbeck', '', '', '', '', '', '', 1),
(12, 'Harry', 'Little', '', '', '', '', '', '', 1),
(13, 'Dawn', 'Husband', '', '', '', '', '', '', 1);

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
