-- phpMyAdmin SQL Dump
-- version 4.7.4
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1:3306
-- Generation Time: Sep 14, 2018 at 07:55 AM
-- Server version: 5.7.19
-- PHP Version: 7.1.9

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `rental_houses`
--

-- --------------------------------------------------------

--
-- Table structure for table `booking`
--

DROP TABLE IF EXISTS `booking`;
CREATE TABLE IF NOT EXISTS `booking` (
  `booking_id` int(11) NOT NULL AUTO_INCREMENT,
  `house_id` int(11) NOT NULL,
  `building_id` int(11) NOT NULL,
  `destination_id` int(11) NOT NULL,
  `username` varchar(30) NOT NULL,
  PRIMARY KEY (`booking_id`),
  KEY `house_id` (`house_id`),
  KEY `building_id` (`building_id`),
  KEY `destination_id` (`destination_id`)
) ENGINE=MyISAM AUTO_INCREMENT=18 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `booking`
--

INSERT INTO `booking` (`booking_id`, `house_id`, `building_id`, `destination_id`, `username`) VALUES
(16, 16, 2, 1, 'natho');

-- --------------------------------------------------------

--
-- Table structure for table `building`
--

DROP TABLE IF EXISTS `building`;
CREATE TABLE IF NOT EXISTS `building` (
  `building_id` int(11) NOT NULL AUTO_INCREMENT,
  `building_name` varchar(100) NOT NULL,
  `no_of_floors` int(11) NOT NULL,
  `completion_state` varchar(15) NOT NULL,
  `destination_id` int(11) NOT NULL,
  PRIMARY KEY (`building_id`),
  KEY `destination_id` (`destination_id`)
) ENGINE=MyISAM AUTO_INCREMENT=6 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `building`
--

INSERT INTO `building` (`building_id`, `building_name`, `no_of_floors`, `completion_state`, `destination_id`) VALUES
(1, 'Kings Building', 4, 'complete', 1),
(2, 'Dominion Flats', 5, 'complete', 2),
(3, 'Manna Apartments', 2, 'incomplete', 3),
(4, 'Baraka Apartments', 1, 'complete', 4),
(5, 'Bahati 2000 Apartments', 5, 'incomplete', 5);

-- --------------------------------------------------------

--
-- Table structure for table `destination`
--

DROP TABLE IF EXISTS `destination`;
CREATE TABLE IF NOT EXISTS `destination` (
  `destination_id` int(11) NOT NULL AUTO_INCREMENT,
  `destination_name` varchar(100) NOT NULL,
  PRIMARY KEY (`destination_id`)
) ENGINE=MyISAM AUTO_INCREMENT=6 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `destination`
--

INSERT INTO `destination` (`destination_id`, `destination_name`) VALUES
(1, 'Kayole Central Ward'),
(2, 'Kayole North Ward'),
(3, 'Kayole South Ward'),
(4, 'Komarock Ward'),
(5, 'Njiru Ward');

-- --------------------------------------------------------

--
-- Table structure for table `houses`
--

DROP TABLE IF EXISTS `houses`;
CREATE TABLE IF NOT EXISTS `houses` (
  `house_id` int(11) NOT NULL AUTO_INCREMENT,
  `house_type` varchar(50) NOT NULL,
  `amount` decimal(8,2) NOT NULL,
  `status` varchar(20) NOT NULL,
  `building_id` int(11) NOT NULL,
  `detail` text NOT NULL,
  `image` varchar(100) NOT NULL,
  `destination_id` int(11) NOT NULL,
  `house_number` int(11) NOT NULL,
  `house_position` varchar(30) NOT NULL,
  `payment_status` varchar(15) NOT NULL,
  PRIMARY KEY (`house_id`),
  KEY `building_id` (`building_id`),
  KEY `destination_id` (`destination_id`)
) ENGINE=MyISAM AUTO_INCREMENT=21 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `houses`
--

INSERT INTO `houses` (`house_id`, `house_type`, `amount`, `status`, `building_id`, `detail`, `image`, `destination_id`, `house_number`, `house_position`, `payment_status`) VALUES
(16, 'Apartment/Flat', '7000.00', 'Occupied', 2, 'Serene environment\r\n    ', 'photos/flat10.jpg', 1, 10, 'Ground Floor', 'Pending'),
(17, 'Double Roomed Houses', '2000.00', 'Available', 3, ' \r\n    Spacious, secured, clean and adequate water', 'photos/flat11.jpg', 5, 17, 'First Floor', 'Pending'),
(18, 'Apartment/Flat', '7000.00', 'available', 4, ' \r\n    Well guarded, close to recreational park', 'photos/flat7.jpg', 4, 2, 'Second Floor', 'Pending'),
(19, 'Detached Houses', '10000.00', 'Available', 1, 'Clean and large compound\r\n    ', 'photos/detached1.jpg', 1, 1, 'Third Floor', 'Pending'),
(20, 'Detached Houses', '12000.00', 'Available', 2, ' Huge and spacious\r\n    ', 'photos/detached3.jpg', 2, 1, 'Ground Floor', 'Pending');

-- --------------------------------------------------------

--
-- Table structure for table `landlord`
--

DROP TABLE IF EXISTS `landlord`;
CREATE TABLE IF NOT EXISTS `landlord` (
  `landlord_id` int(11) NOT NULL AUTO_INCREMENT,
  `firstname` varchar(30) NOT NULL,
  `secondname` varchar(30) NOT NULL,
  `phonenumber` int(11) NOT NULL,
  `emailaddress` varchar(50) NOT NULL,
  `username` varchar(30) NOT NULL,
  `password` varchar(30) NOT NULL,
  `building_id` int(11) NOT NULL,
  PRIMARY KEY (`landlord_id`),
  KEY `building_id` (`building_id`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `registration`
--

DROP TABLE IF EXISTS `registration`;
CREATE TABLE IF NOT EXISTS `registration` (
  `regid` int(10) NOT NULL AUTO_INCREMENT,
  `firstname` varchar(30) NOT NULL,
  `secondname` varchar(30) NOT NULL,
  `emailaddress` varchar(50) NOT NULL,
  `phonenumber` int(11) NOT NULL,
  `username` varchar(30) NOT NULL,
  `userrole` varchar(20) NOT NULL,
  `password` varchar(40) NOT NULL,
  `confirmpassword` varchar(40) NOT NULL,
  PRIMARY KEY (`regid`)
) ENGINE=MyISAM AUTO_INCREMENT=57 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `registration`
--

INSERT INTO `registration` (`regid`, `firstname`, `secondname`, `emailaddress`, `phonenumber`, `username`, `userrole`, `password`, `confirmpassword`) VALUES
(40, 'Solomon', 'Aleka', 'solomonaleka8@gmail.com', 713787314, 'solo', 'admin', 'ba4f2a544e6d4a4130fc35bbbb55cac6', 'ba4f2a544e6d4a4130fc35bbbb55cac6'),
(41, 'Nathaniel', 'Achevi', 'nathoachevi@gmail.com', 789861717, 'natho', 'user', 'e7200775888307b1cf00886e7427d38d', 'e7200775888307b1cf00886e7427d38d'),
(52, 'Mercy', 'Mukosia', 'mercymukosia@gmail.com', 918898717, 'tinashe', 'user', '2bdd605a6c49bc59da1b0e851143e473', '2bdd605a6c49bc59da1b0e851143e473'),
(53, 'Lucy', 'Mukhavi', 'lucymukhavi@gmail.com', 713877817, 'kalucy', 'user', '4f18899af243cd6efc74ae535e491599', '4f18899af243cd6efc74ae535e491599'),
(55, 'Susan', 'Nthenya', 'susynthenya@gmail.com', 701043568, 'susy', 'user', 'a5cb7885f958b997c69ddf2840944fa5', 'a5cb7885f958b997c69ddf2840944fa5'),
(56, 'Juma', 'Kenya', 'jukakenya@gmail.com', 713787314, 'juma', 'user', '57a9b898ee07e18800a4704fa4be2ec5', '57a9b898ee07e18800a4704fa4be2ec5');
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
