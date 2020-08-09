-- phpMyAdmin SQL Dump
-- version 4.9.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1:3308
-- Generation Time: Jun 08, 2020 at 02:02 PM
-- Server version: 8.0.18
-- PHP Version: 7.3.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `db_carsapi`
--

-- --------------------------------------------------------

--
-- Table structure for table `tbl_cars`
--

DROP TABLE IF EXISTS `tbl_cars`;
CREATE TABLE IF NOT EXISTS `tbl_cars` (
  `id` bigint(20) NOT NULL AUTO_INCREMENT,
  `make` varchar(255) NOT NULL,
  `model` varchar(255) NOT NULL,
  `description` mediumtext CHARACTER SET utf8 COLLATE utf8_general_ci,
  `colour` varchar(255) NOT NULL,
  `registration` varchar(255) NOT NULL,
  `price` int(20) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=7 DEFAULT CHARSET=utf8;

--
-- Dumping data for table `tbl_cars`
--

INSERT INTO `tbl_cars` (`id`, `make`, `model`, `description`, `colour`, `registration`, `price`) VALUES
(1, 'Reliant', 'Robin', 'The Reliant Robin is a small three-wheeled car produced by the Reliant Motor Company in Tamworth, England. It was offered in several versions over a period of 30 years. It is the second-most popular fibreglass car in history, with Reliant being the second-biggest UK-owned car manufacturer for a time.', 'Red', 'RE56 NVR', 25000),
(2, 'Ford', 'Ranger', 'Ford Ranger is a nameplate that has been used on three distinct model lines of vehicles sold by Ford. The name originated in 1958 when the Edsel Ranger was introduced as the base trim level of the Edsel model range. From 1965 to 1981, Ranger denoted various trim packages of the Ford F-Series (and Ford Bronco), serving as a mid- to top-level trim.', 'Orange', 'TV59 LMT', 50000),
(3, 'Nash', 'Metropolitan', ' not amazing', 'rusty', 're12 34y', 1),
(4, 'Nash', 'Metropolitan', ' not amazing', 'rusty', 're12 34y', 1),
(5, 'Reliant', 'Sabre Four', 'The only cool thing about this car is the name', 'Red', 'T21 TJ12', 100);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
