-- phpMyAdmin SQL Dump
-- version 5.0.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1:3306
-- Generation Time: May 22, 2022 at 10:44 AM
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
-- Database: `equipment`
--

-- --------------------------------------------------------

--
-- Table structure for table `assign`
--

DROP TABLE IF EXISTS `assign`;
CREATE TABLE IF NOT EXISTS `assign` (
  `id` int(4) UNSIGNED ZEROFILL NOT NULL AUTO_INCREMENT,
  `user` int(3) UNSIGNED ZEROFILL NOT NULL,
  `gadget_book` int(4) UNSIGNED ZEROFILL NOT NULL,
  `time` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `returned` datetime DEFAULT NULL,
  `status` char(1) NOT NULL DEFAULT 'A',
  PRIMARY KEY (`id`),
  KEY `fk_assign_user` (`user`),
  KEY `fk_assign_gadget_book` (`gadget_book`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `borrower`
--

DROP TABLE IF EXISTS `borrower`;
CREATE TABLE IF NOT EXISTS `borrower` (
  `id` int(7) UNSIGNED ZEROFILL NOT NULL AUTO_INCREMENT,
  `user` int(3) UNSIGNED ZEROFILL NOT NULL,
  `item` int(5) UNSIGNED ZEROFILL NOT NULL,
  `quantity` int(3) NOT NULL,
  `time` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `return_time` timestamp NULL DEFAULT NULL,
  `returned` timestamp NULL DEFAULT NULL,
  `status` char(1) NOT NULL,
  PRIMARY KEY (`id`),
  KEY `fk_borrower_user` (`user`),
  KEY `fk_borrower_item` (`item`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `category`
--

DROP TABLE IF EXISTS `category`;
CREATE TABLE IF NOT EXISTS `category` (
  `id` int(3) UNSIGNED ZEROFILL NOT NULL AUTO_INCREMENT,
  `name` varchar(15) NOT NULL,
  `description` varchar(45) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

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
  UNIQUE KEY `SN_UNIQUE` (`SN`),
  KEY `fk_gadget_book_category` (`category`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

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
  UNIQUE KEY `description_UNIQUE` (`description`),
  KEY `fk_item_category` (`category`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

DROP TABLE IF EXISTS `user`;
CREATE TABLE IF NOT EXISTS `user` (
  `id` int(3) UNSIGNED ZEROFILL NOT NULL AUTO_INCREMENT,
  `name` varchar(30) NOT NULL,
  `phone` varchar(13) NOT NULL,
  `email` varchar(40) NOT NULL,
  `password` varchar(14) NOT NULL,
  `type` char(1) NOT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `phone_UNIQUE` (`phone`),
  UNIQUE KEY `email_UNIQUE` (`email`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `assign`
--
ALTER TABLE `assign`
  ADD CONSTRAINT `fk_assign_gadget_book` FOREIGN KEY (`gadget_book`) REFERENCES `gadget_book` (`id`),
  ADD CONSTRAINT `fk_assign_user` FOREIGN KEY (`user`) REFERENCES `user` (`id`);

--
-- Constraints for table `borrower`
--
ALTER TABLE `borrower`
  ADD CONSTRAINT `fk_borrower_item` FOREIGN KEY (`item`) REFERENCES `item` (`id`),
  ADD CONSTRAINT `fk_borrower_user` FOREIGN KEY (`user`) REFERENCES `user` (`id`);

--
-- Constraints for table `gadget_book`
--
ALTER TABLE `gadget_book`
  ADD CONSTRAINT `fk_gadget_book_category` FOREIGN KEY (`category`) REFERENCES `category` (`id`);

--
-- Constraints for table `item`
--
ALTER TABLE `item`
  ADD CONSTRAINT `fk_item_category` FOREIGN KEY (`category`) REFERENCES `category` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
