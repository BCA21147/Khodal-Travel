-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Aug 21, 2023 at 03:34 PM
-- Server version: 10.4.27-MariaDB
-- PHP Version: 8.2.0

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `obbms`
--

-- --------------------------------------------------------

--
-- Table structure for table `employee`
--

CREATE TABLE `employee` (
  `id` int(11) NOT NULL,
  `first_name` text NOT NULL,
  `last_name` text NOT NULL,
  `emp_type` text NOT NULL,
  `mobile_no` text NOT NULL,
  `email` text NOT NULL,
  `blood_group` text NOT NULL,
  `id_type` text NOT NULL,
  `id_number` text NOT NULL,
  `country` text NOT NULL,
  `city` text NOT NULL,
  `zip_code` text NOT NULL,
  `address` text NOT NULL,
  `id_image` text NOT NULL,
  `profile_image` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `employee`
--

INSERT INTO `employee` (`id`, `first_name`, `last_name`, `emp_type`, `mobile_no`, `email`, `blood_group`, `id_type`, `id_number`, `country`, `city`, `zip_code`, `address`, `id_image`, `profile_image`) VALUES
(1, 'Assistant', 'C', '[2]|[Assistant]', '66666655555', 'ac@a.cm', 'A+', 'UID', 'ABC123', '[18]|[BANGLADESH]', 'Dhaka', '121314', 'lorem ipsum, lorem ipsum', '08212023065252PM-2.jpg', '08212023065252PM-1.png'),
(2, 'Assistant', 'B', '[2]|[Assistant]', '555554444', 'ab@a.cm', 'A+', 'UID', 'ABC123', '[18]|[BANGLADESH]', 'Dhaka', '121314', 'lorem ipsum, lorem ipsum', '08212023065453PM-2.jpg', '08212023065453PM-1.png'),
(3, 'Assistant', 'A', '[2]|[Assistant]', '44444433333', 'aa@a.cm', 'A+', 'UID', 'ABC123', '[18]|[BANGLADESH]', 'Dhaka', '121314', 'lorem ipsum, lorem ipsum', '08212023065856PM-2.jpg', '08212023065856PM-1.png'),
(4, 'Driver', 'C', '[1]|[Driver]', '333332222', 'dc@d.com', 'A+', 'UID', 'ABC123', '[18]|[BANGLADESH]', 'Dhaka', '121314', 'lorem ipsum, lorem ipsum', '08212023070035PM-2.jpg', '08212023070035PM-1.png'),
(5, 'Driver', 'B', '[1]|[Driver]', '222222211111', 'db@d.com', 'A+', 'UID', 'ABC123', '[18]|[BANGLADESH]', 'Dhaka', '121314', 'lorem ipsum, lorem ipsume', '08212023070226PM-2.jpg', '08212023070226PM-1.png'),
(6, 'Driver', 'A', '[1]|[Driver]', '111111100000', 'da@d.com', 'A+', 'UID', 'ABC123', '[18]|[BANGLADESH]', 'Dhaka', '121314', 'lorem ipsum, lorem inpsum', '08212023070356PM-2.jpg', '08212023070356PM-1.png');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `employee`
--
ALTER TABLE `employee`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `employee`
--
ALTER TABLE `employee`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
