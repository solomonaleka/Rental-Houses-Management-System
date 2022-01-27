-- phpMyAdmin SQL Dump
-- version 4.7.4
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1:3306
-- Generation Time: Sep 02, 2018 at 10:57 AM
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
  `house_type` varchar(50) NOT NULL,
  `amount` decimal(8,2) NOT NULL,
  `status` varchar(20) NOT NULL,
  `house_number` int(11) NOT NULL,
  `house_position` varchar(30) NOT NULL,
  `detail` text NOT NULL,
  `building_id` int(11) NOT NULL,
  `destination_id` int(11) NOT NULL,
  `firstname` varchar(30) NOT NULL,
  `secondname` varchar(30) NOT NULL,
  `username` varchar(30) NOT NULL,
  PRIMARY KEY (`booking_id`),
  KEY `house_id` (`house_id`),
  KEY `building_id` (`building_id`),
  KEY `destination_id` (`destination_id`)
) ENGINE=MyISAM AUTO_INCREMENT=11 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `booking`
--

INSERT INTO `booking` (`booking_id`, `house_id`, `house_type`, `amount`, `status`, `house_number`, `house_position`, `detail`, `building_id`, `destination_id`, `firstname`, `secondname`, `username`) VALUES
(9, 1, 'Single Roomed Houses', '2000.00', 'Available', 5, 'first floor', ' spacious, well secured neighbourhood, adequate water supply    ', 1, 1, 'Nathaniel', 'Achevi', 'natho'),
(10, 9, 'Apartment/Flat', '12000.00', 'Available', 27, 'fourth floor', '     Large balcon, spacious, well guarded', 2, 3, 'Mercy', 'Mukosia', 'Tinashe');

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
  PRIMARY KEY (`house_id`),
  KEY `building_id` (`building_id`),
  KEY `destination_id` (`destination_id`)
) ENGINE=MyISAM AUTO_INCREMENT=15 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `houses`
--

INSERT INTO `houses` (`house_id`, `house_type`, `amount`, `status`, `building_id`, `detail`, `image`, `destination_id`, `house_number`, `house_position`) VALUES
(1, 'Single Roomed Houses', '2000.00', 'Available', 1, ' spacious, well secured neighbourhood, adequate water supply\r\n    ', 'photos/home.jpg', 1, 5, 'first floor'),
(2, 'Double Roomed Houses', '3000.00', 'Available', 1, ' spacious, water storage tanks, close to public amenities\r\n    ', 'photos/nic.PNG', 2, 12, 'first floor'),
(11, 'Single Roomed Houses', '60000.00', 'Available', 5, ' \r\n    iashdiiws sdcuwsd ewsf', 'photos/Almas 20180613_101505.jpg', 5, 15, 'second floor'),
(12, 'Single Roomed Houses', '40000.00', 'Available', 3, ' \r\n    gggfggf dgwsdiu', 'photos/509ade182a2cd03d4592eea265bf71d9.jpg', 3, 25, 'third floor'),
(13, 'Single Roomed Houses', '12000.00', 'Available', 1, ' \r\n    fgwyd sdfy wsafu sfjjjf', 'photos/IMG-20171226-WA0000.jpg', 1, 5, 'first floor'),
(14, 'Single Roomed Houses', '13000.00', 'Available', 2, ' \r\n    huiwhyrfu wsaufhciws good', 'photos/IMG-20171231-WA0005.jpg', 2, 11, 'second floor'),
(7, 'Single Roomed Houses', '5000.00', 'Available', 4, '  Adequate washrooms, close to social amenities\r\n    ', 'photos/IMG-20180222-WA0001.jpg', 3, 3, 'ground floor'),
(8, 'Single Roomed Houses', '4000.00', 'Available', 2, ' shared balcon and washroom, adequate water\r\n    ', 'photos/IMG-20180204-WA0010.jpg', 1, 7, 'first floor'),
(9, 'Apartment/Flat', '12000.00', 'Available', 2, ' \r\n    Large balcon, spacious, well guarded', 'photos/IMG-20180225-WA0002.jpg', 3, 27, 'fourth floor');

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
) ENGINE=MyISAM AUTO_INCREMENT=52 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `registration`
--

INSERT INTO `registration` (`regid`, `firstname`, `secondname`, `emailaddress`, `phonenumber`, `username`, `userrole`, `password`, `confirmpassword`) VALUES
(40, 'Solomon', 'Aleka', 'solomonaleka8@gmail.com', 713787314, 'solo', 'admin', 'ba4f2a544e6d4a4130fc35bbbb55cac6', 'ba4f2a544e6d4a4130fc35bbbb55cac6'),
(41, 'Nathaniel', 'Achevi', 'nathoachevi@gmail.com', 789861717, 'natho', 'user', 'e7200775888307b1cf00886e7427d38d', 'e7200775888307b1cf00886e7427d38d'),
(42, 'Mercy', 'Mukosia', 'mercymukosia@gmail.com', 798112345, 'tinashe', 'user', '7d676d4e1e452b0ea58ed20bf1cefcbb', '7d676d4e1e452b0ea58ed20bf1cefcbb'),
(43, 'Lucy', 'Mukhavi', 'lucymukhavi@gmail.com', 818171819, 'kalucy', 'user', '6e9827b403cf24afca2e2dc4877f1bfe', '6e9827b403cf24afca2e2dc4877f1bfe'),
(51, 'Samuel', 'Victor', 'samuelvictor@gmail.com', 919181827, 'samueli', 'user', 'ed49e960d48949571638fcaf352704bd', 'ed49e960d48949571638fcaf352704bd');
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
