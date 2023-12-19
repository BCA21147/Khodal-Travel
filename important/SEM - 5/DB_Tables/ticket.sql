-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Sep 17, 2023 at 05:44 PM
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
-- Table structure for table `ticket`
--

CREATE TABLE `ticket` (
  `id` int(11) NOT NULL,
  `booking_id` text NOT NULL,
  `passenger_id` text NOT NULL,
  `booking_date` text NOT NULL,
  `trip` text NOT NULL,
  `journey_date` text NOT NULL,
  `total_children` text NOT NULL,
  `total_special` text NOT NULL,
  `total_adult` text NOT NULL,
  `pick_up_stand` text NOT NULL,
  `drop_stand` text NOT NULL,
  `seat_no` text NOT NULL,
  `total_children_price` text NOT NULL,
  `total_special_price` text NOT NULL,
  `total_adult_price` text NOT NULL,
  `ticket_price` text NOT NULL,
  `tax_price` text NOT NULL,
  `total_price` text NOT NULL,
  `passenger_details` text NOT NULL,
  `payment_status` text NOT NULL,
  `status` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `ticket`
--

INSERT INTO `ticket` (`id`, `booking_id`, `passenger_id`, `booking_date`, `trip`, `journey_date`, `total_children`, `total_special`, `total_adult`, `pick_up_stand`, `drop_stand`, `seat_no`, `total_children_price`, `total_special_price`, `total_adult_price`, `ticket_price`, `tax_price`, `total_price`, `passenger_details`, `payment_status`, `status`) VALUES
(1, 'RWSM6N8307FGVO2', '[1]|[USER]', '2023-09-17 06:26:40', '[1]|[[13]|[DHAKA]]|[[16]|[PANCHAGARH]]', '2024-01-08_', '0', '1', '0', '[17]|[UTTARA]', '[9]|[KAMARPARA]', 'A1', '0', '600', '0', '600', '72', '672', 'a:1:{i:0;a:10:{s:10:\"First_Name\";s:8:\"Sutariya\";s:9:\"Last_Name\";s:7:\"Krishna\";s:9:\"Mobile_No\";s:10:\"8264170570\";s:10:\"NID_Number\";s:15:\"123456789101112\";s:5:\"Email\";s:34:\"krishnar.sutariyarskd154@gmail.com\";s:7:\"ID_Type\";s:3:\"UID\";s:7:\"Country\";s:12:\"[99]|[INDIA]\";s:4:\"City\";s:5:\"Surat\";s:8:\"Zip_Code\";s:6:\"395010\";s:7:\"Address\";s:64:\"154,Raj Mandir Soc, Savaliya Circal, Yogi Chowk, Surat. - 395010\";}}', 'unpaid', '1'),
(2, 'VFRHKBQWG3NZPUD', '[1]|[ADMIN]', '2023-09-09 04:02:29', '[2]|[[13]|[DHAKA]]|[[15]|[RANGPUR]]', '2024-08-31_', '0', '0', '1', '[15]|[KALLYANPUR]', '[9]|[KAMARPARA]', 'A2', '0', '0', '900', '900', '108', '1008', 'a:1:{i:0;a:10:{s:10:\"First_Name\";s:8:\"Sutariya\";s:9:\"Last_Name\";s:7:\"Divyang\";s:9:\"Mobile_No\";s:10:\"9016072392\";s:10:\"NID_Number\";s:15:\"123456789101112\";s:5:\"Email\";s:34:\"divyangr.sutariyarskd154@gmail.com\";s:7:\"ID_Type\";s:3:\"UID\";s:7:\"Country\";s:12:\"[99]|[INDIA]\";s:4:\"City\";s:5:\"Surat\";s:8:\"Zip_Code\";s:6:\"395010\";s:7:\"Address\";s:64:\"154,Raj Mandir Soc, Savaliya Circal, Yogi Chowk, Surat. - 395010\";}}', 'unpaid', '0'),
(3, 'TXERMQ24NOZ8HS0', '[1]|[ADMIN]', '2023-09-17 07:06:55', '[2]|[[13]|[DHAKA]]|[[15]|[RANGPUR]]', '2023-10-11_', '0', '0', '2', '[15]|[KALLYANPUR]', '[9]|[KAMARPARA]', 'A1, A2', '0', '0', '1800', '1800', '216', '2016', 'a:2:{i:0;a:10:{s:10:\"First_Name\";s:7:\"Shiroya\";s:9:\"Last_Name\";s:5:\"Manoj\";s:9:\"Mobile_No\";s:10:\"1234567890\";s:10:\"NID_Number\";s:11:\"12345678910\";s:5:\"Email\";s:15:\"manoj@gmail.com\";s:7:\"ID_Type\";s:2:\"PP\";s:7:\"Country\";s:12:\"[99]|[INDIA]\";s:4:\"City\";s:5:\"Surat\";s:8:\"Zip_Code\";s:0:\"\";s:7:\"Address\";s:18:\"Yogi Chowk, Surat.\";}i:1;a:4:{s:10:\"First_Name\";s:7:\"Shiroya\";s:9:\"Last_Name\";s:7:\"Sheetal\";s:9:\"Mobile_No\";s:10:\"1234567890\";s:10:\"NID_Number\";s:11:\"01987654321\";}}', 'paid', '1');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `ticket`
--
ALTER TABLE `ticket`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `ticket`
--
ALTER TABLE `ticket`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
