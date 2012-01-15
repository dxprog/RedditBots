-- phpMyAdmin SQL Dump
-- version 3.4.4
-- http://www.phpmyadmin.net
--
-- Host: localhost
-- Generation Time: Jan 15, 2012 at 12:39 PM
-- Server version: 5.5.19
-- PHP Version: 5.3.8-1~dotdeb.2

SET SQL_MODE="NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `reddit_bots`
--

-- --------------------------------------------------------

--
-- Table structure for table `bot_users`
--

CREATE TABLE IF NOT EXISTS `bot_users` (
  `bot_id` int(10) NOT NULL AUTO_INCREMENT,
  `bot_name` varchar(50) NOT NULL,
  `bot_password` varchar(50) NOT NULL,
  `bot_hash` varchar(255) DEFAULT NULL,
  `bot_cookie` varchar(255) DEFAULT NULL,
  `bot_data` text,
  `bot_callback` varchar(30) NOT NULL,
  `bot_updated` int(10) NOT NULL,
  `bot_created` int(10) NOT NULL,
  `bot_enabled` tinyint(4) NOT NULL,
  PRIMARY KEY (`bot_id`),
  UNIQUE KEY `bot_name` (`bot_name`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=7 ;

--
-- Dumping data for table `bot_users`
--

INSERT INTO `bot_users` (`bot_id`, `bot_name`, `bot_password`, `bot_hash`, `bot_cookie`, `bot_data`, `bot_callback`, `bot_updated`, `bot_created`, `bot_enabled`) VALUES
(1, 'binky81', 'BINKYS_PASSWORD', '', '', '', 'runBinky81', 0, 0, 1)

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
