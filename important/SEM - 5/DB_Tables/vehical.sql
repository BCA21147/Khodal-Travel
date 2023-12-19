-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Aug 16, 2023 at 10:29 AM
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
-- Table structure for table `vehical`
--

CREATE TABLE `vehical` (
  `id` int(11) NOT NULL,
  `reg_no` text NOT NULL,
  `eng_no` text NOT NULL,
  `model_no` text NOT NULL,
  `fleet_type` text NOT NULL,
  `chassis_no` text NOT NULL,
  `owner` text NOT NULL,
  `owner_mobile` text NOT NULL,
  `company` text NOT NULL,
  `status` int(11) NOT NULL,
  `images` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `vehical`
--

INSERT INTO `vehical` (`id`, `reg_no`, `eng_no`, `model_no`, `fleet_type`, `chassis_no`, `owner`, `owner_mobile`, `company`, `status`, `images`) VALUES
(1, 'AC-R-123', 'AC-E-123', 'AC-M-123', '[1]|[AC]', 'AC-C-123', 'Lorem Ipsum', '12111111111', 'HANIF', 1, 'a:1:{i:0;s:23:\"08162023014950PM-1.jpeg\";}'),
(2, 'BUSINESS-R-123', 'BUSINESS-E-123', 'BUSINESS-M-123', '[2]|[BUSINESS-CLASS]', 'BUSINESS-C-123', 'Lorem Ipsum', '13111111111', 'SHYAMOLI', 1, 'a:1:{i:0;s:23:\"08162023015325PM-1.jpeg\";}'),
(3, 'NON-AC-R-123', 'NON-AC-E-123', 'NON-AC-M-123', '[3]|[NON-AC]', 'NON-AC-C-123', 'Lorem Ipsum', '14111111111', 'SONYA', 1, 'a:1:{i:0;s:23:\"08162023015629PM-1.jpeg\";}'),
(4, 'LOCAL-R-123', 'LOCAL-E-123', 'LOCAL-M-123', '[4]|[LOCAL]', 'LOCAL-C-123', 'Lorem Ipsum', '15111111111', 'SOUDIA', 1, 'a:1:{i:0;s:23:\"08162023015751PM-1.jpeg\";}'),
(5, 'WORLD-CLASS-R-123', 'WORLD-CLASS-E-123', 'WORLD-CLASS-M-123', '[5]|[WORLD-CLASS]', 'WORLD-CLASS-C-123', 'Lorem Ipsum', '16111111111', 'NIRALA', 1, 'a:1:{i:0;s:23:\"08162023015930PM-1.jpeg\";}');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `vehical`
--
ALTER TABLE `vehical`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `vehical`
--
ALTER TABLE `vehical`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
