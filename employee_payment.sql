-- phpMyAdmin SQL Dump
-- version 3.5.2.2
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: Sep 25, 2014 at 07:24 PM
-- Server version: 5.5.27
-- PHP Version: 5.4.7

SET SQL_MODE="NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `workgram`
--

-- --------------------------------------------------------

--
-- Table structure for table `employee_payment`
--

CREATE TABLE IF NOT EXISTS `employee_payment` (
  `pay_id` int(11) NOT NULL AUTO_INCREMENT,
  `employee_code` int(11) NOT NULL,
  `company_code` int(11) NOT NULL,
  `wages_category_id` int(11) NOT NULL,
  `year_month` date DEFAULT NULL,
  `amount` decimal(10,0) NOT NULL,
  `is_paid` enum('Y','N') CHARACTER SET utf8 DEFAULT 'N',
  PRIMARY KEY (`pay_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=2 ;

--
-- Dumping data for table `employee_payment`
--

INSERT INTO `employee_payment` (`pay_id`, `employee_code`, `company_code`, `wages_category_id`, `year_month`, `amount`, `is_paid`) VALUES
(1, 7, 1, 1, '2014-01-01', 20000, 'Y');

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
