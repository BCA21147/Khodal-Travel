-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Aug 18, 2023 at 06:41 PM
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
-- Table structure for table `schedule_filter`
--

CREATE TABLE `schedule_filter` (
  `id` int(11) NOT NULL,
  `start_time_12_hour` text NOT NULL,
  `end_time_12_hour` text NOT NULL,
  `start_time_24_hour` text NOT NULL,
  `end_time_24_hour` text NOT NULL,
  `filter_type_hide` text NOT NULL,
  `filter_type_show` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `schedule_filter`
--

INSERT INTO `schedule_filter` (`id`, `start_time_12_hour`, `end_time_12_hour`, `start_time_24_hour`, `end_time_24_hour`, `filter_type_hide`, `filter_type_show`) VALUES
(1, '06:00 AM', '09:30 AM', '06:00', '09:30', 'Pick Up', 'DEPARTURE TIME'),
(2, '09:00 AM', '11:00 AM', '09:00', '11:00', 'Pick Up', 'DEPARTURE TIME'),
(3, '01:00 PM', '03:00 PM', '13:00', '15:00', 'Drop', 'ARRIVAL TIME'),
(4, '03:00 PM', '06:00 PM', '15:00', '18:00', 'Drop', 'ARRIVAL TIME');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `schedule_filter`
--
ALTER TABLE `schedule_filter`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `schedule_filter`
--
ALTER TABLE `schedule_filter`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
