-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Sep 09, 2023 at 12:22 PM
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
-- Table structure for table `passenger`
--

CREATE TABLE `passenger` (
  `id` int(11) NOT NULL,
  `first_name` text NOT NULL,
  `last_name` text NOT NULL,
  `mobile_no` text NOT NULL,
  `email` text NOT NULL,
  `id_type` text NOT NULL,
  `nid_number` text NOT NULL,
  `country_name` text NOT NULL,
  `city_name` text NOT NULL,
  `zip_code` text NOT NULL,
  `address` text NOT NULL,
  `password` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `passenger`
--

INSERT INTO `passenger` (`id`, `first_name`, `last_name`, `mobile_no`, `email`, `id_type`, `nid_number`, `country_name`, `city_name`, `zip_code`, `address`, `password`) VALUES
(1, 'Sutariya', 'Krishna', '8264170570', 'krishnar.sutariyarskd154@gmail.com', 'UID', '123456789101112', '[99]|[INDIA]', 'Surat', '395010', '154,Raj Mandir Soc, Savaliya Circal, Yogi Chowk, Surat. - 395010', 'Krishna@123'),
(2, 'Sutariya', 'Divyang', '9016072392', 'divyangr.sutariyarskd154@gmail.com', 'UID', '123456789101112', '[99]|[INDIA]', 'Surat', '395010', '154,Raj Mandir Soc, Savaliya Circal, Yogi Chowk, Surat. - 395010', 'Divyang@123');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `passenger`
--
ALTER TABLE `passenger`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `passenger`
--
ALTER TABLE `passenger`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
