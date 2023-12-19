-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Aug 16, 2023 at 03:38 PM
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
-- Table structure for table `stand`
--

CREATE TABLE `stand` (
  `id` int(11) NOT NULL,
  `stand_name` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `stand`
--

INSERT INTO `stand` (`id`, `stand_name`) VALUES
(1, 'GAIBANDHA BUS STAND'),
(2, 'KURIGRAM BUS STAND'),
(3, 'LALMONIRHAT BUS STAND'),
(4, 'NILPHAMARI BUS STAND'),
(5, 'PANCHAGARH BUS STAND'),
(6, 'BRTC BUS STAND'),
(7, 'BAHDDERHAT BUS TERMINAL'),
(8, 'MODERN MORE'),
(9, 'KAMARPARA'),
(10, 'PIRGANJ'),
(11, 'SOTIBARI'),
(12, 'MOKAMTOLA'),
(13, 'TANGAIL BUS STAND'),
(14, 'ABDULLAHPUR'),
(15, 'KALLYANPUR'),
(16, 'MOHAKHALI'),
(17, 'UTTARA');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `stand`
--
ALTER TABLE `stand`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `stand`
--
ALTER TABLE `stand`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=18;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
