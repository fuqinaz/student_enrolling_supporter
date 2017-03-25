-- phpMyAdmin SQL Dump
-- version 4.5.1
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: Mar 25, 2017 at 10:25 AM
-- Server version: 10.1.19-MariaDB
-- PHP Version: 5.6.28

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `student_enrolling_supporter`
--

-- --------------------------------------------------------

--
-- Table structure for table `planning`
--

CREATE TABLE `planning` (
  `StudentID` varchar(13) COLLATE utf8_unicode_ci NOT NULL,
  `Year` int(2) NOT NULL,
  `Semester` int(1) NOT NULL,
  `CoursePID` int(11) NOT NULL,
  `EstimatedGrade` int(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `planning`
--

INSERT INTO `planning` (`StudentID`, `Year`, `Semester`, `CoursePID`, `EstimatedGrade`) VALUES
('5630101621', 3, 2, 709, 3),
('5630101621', 3, 2, 699, 3),
('5630101621', 3, 2, 701, 3),
('5630101621', 3, 2, 702, 3),
('5630101621', 3, 2, 703, 3),
('5630101621', 3, 2, 705, 3),
('5630101621', 3, 2, 1186, 3),
('5630101621', 3, 2, 1775, 3);

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
