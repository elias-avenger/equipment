-- phpMyAdmin SQL Dump
-- version 5.0.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1:3306
-- Generation Time: May 07, 2022 at 06:27 PM
-- Server version: 5.7.31
-- PHP Version: 7.3.21

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `inventory`
--

-- --------------------------------------------------------

--
-- Table structure for table `borrower`
--

DROP TABLE IF EXISTS `borrower`;
CREATE TABLE IF NOT EXISTS `borrower` (
  `id` int(7) UNSIGNED ZEROFILL NOT NULL AUTO_INCREMENT,
  `user` int(3) UNSIGNED ZEROFILL NOT NULL,
  `item` int(3) UNSIGNED ZEROFILL NOT NULL,
  `quantity` int(3) NOT NULL,
  `time` timestamp NULL DEFAULT CURRENT_TIMESTAMP,
  `return_time` timestamp NULL DEFAULT CURRENT_TIMESTAMP,
  `returned` timestamp NULL DEFAULT CURRENT_TIMESTAMP,
  `status` varchar(7) NOT NULL,
  PRIMARY KEY (`id`),
  KEY `fk_borrower_user` (`user`),
  KEY `fk_borrower_item` (`item`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `category`
--

DROP TABLE IF EXISTS `category`;
CREATE TABLE IF NOT EXISTS `category` (
  `id` int(3) UNSIGNED ZEROFILL NOT NULL AUTO_INCREMENT,
  `name` varchar(15) NOT NULL,
  `description` varchar(45) NOT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `name` (`name`),
  UNIQUE KEY `description` (`description`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `gadget_book`
--

DROP TABLE IF EXISTS `gadget_book`;
CREATE TABLE IF NOT EXISTS `gadget_book` (
  `id` int(4) UNSIGNED ZEROFILL NOT NULL AUTO_INCREMENT,
  `name` varchar(15) NOT NULL,
  `description` varchar(45) NOT NULL,
  `category` int(3) UNSIGNED ZEROFILL NOT NULL,
  `SN` varchar(7) NOT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `SN` (`SN`),
  KEY `fk_Gadget_Category` (`category`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `item`
--

DROP TABLE IF EXISTS `item`;
CREATE TABLE IF NOT EXISTS `item` (
  `id` int(5) UNSIGNED ZEROFILL NOT NULL AUTO_INCREMENT,
  `name` varchar(15) NOT NULL,
  `description` varchar(45) NOT NULL,
  `category` int(3) UNSIGNED ZEROFILL NOT NULL,
  `quantity` int(4) NOT NULL,
  PRIMARY KEY (`id`),
  KEY `fk_gadget_category` (`category`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

DROP TABLE IF EXISTS `user`;
CREATE TABLE IF NOT EXISTS `user` (
  `id` int(3) UNSIGNED ZEROFILL NOT NULL AUTO_INCREMENT,
  `name` varchar(30) NOT NULL,
  `phone` varchar(13) NOT NULL,
  `email` varchar(25) NOT NULL,
  `password` varchar(14) NOT NULL,
  `type` char(1) NOT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `phone` (`phone`),
  UNIQUE KEY `email` (`email`)
) ENGINE=MyISAM AUTO_INCREMENT=3 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`id`, `name`, `phone`, `email`, `password`, `type`) VALUES
(001, 'Elias Muhoozi', '0786683787', 'eli0@outlook.com', 'comm', 'A'),
(002, 'Okello Dan', '682303738', 'od@opp.com', 'od', 'N');
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
