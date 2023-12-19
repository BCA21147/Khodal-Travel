-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Aug 26, 2023 at 01:33 PM
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
-- Table structure for table `trip`
--

CREATE TABLE `trip` (
  `id` int(11) NOT NULL,
  `trip_pick_up` text NOT NULL,
  `trip_drop` text NOT NULL,
  `stoppage_point` text NOT NULL,
  `schedule_time` text NOT NULL,
  `boarding_point` text NOT NULL,
  `dropping_point` text NOT NULL,
  `children_seat` text NOT NULL,
  `children_fair` text NOT NULL,
  `special_seat` text NOT NULL,
  `special_fair` text NOT NULL,
  `adult_fair` text NOT NULL,
  `distance` text NOT NULL,
  `approximate_time` text NOT NULL,
  `start_date` text NOT NULL,
  `weekend` text NOT NULL,
  `facility` text NOT NULL,
  `fleet_type` text NOT NULL,
  `vehical_list` text NOT NULL,
  `company_name` text NOT NULL,
  `employee` text NOT NULL,
  `status` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `trip`
--

INSERT INTO `trip` (`id`, `trip_pick_up`, `trip_drop`, `stoppage_point`, `schedule_time`, `boarding_point`, `dropping_point`, `children_seat`, `children_fair`, `special_seat`, `special_fair`, `adult_fair`, `distance`, `approximate_time`, `start_date`, `weekend`, `facility`, `fleet_type`, `vehical_list`, `company_name`, `employee`, `status`) VALUES
(1, '[13]|[DHAKA]', '[16]|[PANCHAGARH]', 'a:2:{i:0;s:11:\"[4]|[BOGRA]\";i:1;s:17:\"[17]|[NILPHAMARI]\";}', '[1]|[07:00 PM - 03:00 PM]', 'a:2:{i:0;a:4:{s:21:\"boarding_time_12_hour\";s:8:\"07:00 AM\";s:21:\"boarding_time_24_hour\";s:5:\"07:00\";s:18:\"boarding_bus_stand\";s:16:\"[16]|[MOHAKHALI]\";s:16:\"boarding_details\";s:11:\"Lorem Ipsum\";}i:1;a:4:{s:21:\"boarding_time_12_hour\";s:8:\"07:30 AM\";s:21:\"boarding_time_24_hour\";s:5:\"07:30\";s:18:\"boarding_bus_stand\";s:13:\"[17]|[UTTARA]\";s:16:\"boarding_details\";s:11:\"Lorem Ipsum\";}}', 'a:2:{i:0;a:4:{s:21:\"dropping_time_12_hour\";s:8:\"12:00 PM\";s:21:\"dropping_time_24_hour\";s:5:\"12:00\";s:18:\"dropping_bus_stand\";s:16:\"[12]|[MOKAMTOLA]\";s:16:\"dropping_details\";s:11:\"Lorem Ipsum\";}i:1;a:4:{s:21:\"dropping_time_12_hour\";s:8:\"03:00 PM\";s:21:\"dropping_time_24_hour\";s:5:\"15:00\";s:18:\"dropping_bus_stand\";s:15:\"[9]|[KAMARPARA]\";s:16:\"dropping_details\";s:11:\"Lorem Ipsum\";}}', '5', '500', '5', '600', '800', '300 KM', '9', '2022-06-26', 'a:1:{i:0;s:6:\"Friday\";}', 'a:4:{i:0;s:13:\"[3]|[Blanket]\";i:1;s:11:\"[1]|[Lunch]\";i:2;s:18:\"[4]|[Water Bottol]\";i:3;s:11:\"[2]|[Wi-Fi]\";}', '[1]|[AC]', '[1]|[AC-R-123]', 'HANIF', 'a:4:{s:6:\"driver\";a:1:{i:0;s:16:\"[6]|[Driver]|[A]\";}s:9:\"assistant\";a:1:{i:0;s:19:\"[3]|[Assistant]|[A]\";}s:3:\"abc\";a:1:{i:0;s:17:\"[-]|[None]|[None]\";}s:3:\"xyz\";a:1:{i:0;s:17:\"[-]|[None]|[None]\";}}', '1'),
(2, '[13]|[DHAKA]', '[15]|[RANGPUR]', 'a:2:{i:0;s:11:\"[4]|[BOGRA]\";i:1;s:18:\"[18]|[LALMONIRHAT]\";}', '[3]|[09:00 AM - 05:00 PM]', 'a:1:{i:0;a:4:{s:21:\"boarding_time_12_hour\";s:8:\"09:00 AM\";s:21:\"boarding_time_24_hour\";s:5:\"09:00\";s:18:\"boarding_bus_stand\";s:17:\"[15]|[KALLYANPUR]\";s:16:\"boarding_details\";s:11:\"Lorem Ipsum\";}}', 'a:1:{i:0;a:4:{s:21:\"dropping_time_12_hour\";s:8:\"05:00 PM\";s:21:\"dropping_time_24_hour\";s:5:\"17:00\";s:18:\"dropping_bus_stand\";s:15:\"[9]|[KAMARPARA]\";s:16:\"dropping_details\";s:11:\"Lorem Ipsum\";}}', '', '', '', '', '900', '800 KM', '6', '2022-06-26', 'a:1:{i:0;s:6:\"Friday\";}', 'a:4:{i:0;s:13:\"[3]|[Blanket]\";i:1;s:11:\"[1]|[Lunch]\";i:2;s:18:\"[4]|[Water Bottol]\";i:3;s:11:\"[2]|[Wi-Fi]\";}', '[4]|[LOCAL]', '[4]|[LOCAL-R-123]', 'BABLU', 'a:4:{s:6:\"driver\";a:1:{i:0;s:16:\"[5]|[Driver]|[B]\";}s:9:\"assistant\";a:1:{i:0;s:19:\"[2]|[Assistant]|[B]\";}s:3:\"abc\";a:1:{i:0;s:17:\"[-]|[None]|[None]\";}s:3:\"xyz\";a:1:{i:0;s:17:\"[-]|[None]|[None]\";}}', '1'),
(3, '[13]|[DHAKA]', '[3]|[CHITTAGONG]', 'a:1:{i:0;s:11:\"[4]|[BOGRA]\";}', '[6]|[11:00 PM - 07:00 AM]', 'a:1:{i:0;a:4:{s:21:\"boarding_time_12_hour\";s:8:\"11:00 PM\";s:21:\"boarding_time_24_hour\";s:5:\"23:00\";s:18:\"boarding_bus_stand\";s:17:\"[15]|[KALLYANPUR]\";s:16:\"boarding_details\";s:11:\"Lorem Ipsum\";}}', 'a:1:{i:0;a:4:{s:21:\"dropping_time_12_hour\";s:8:\"07:00 PM\";s:21:\"dropping_time_24_hour\";s:5:\"19:00\";s:18:\"dropping_bus_stand\";s:20:\"[6]|[BRTC BUS STAND]\";s:16:\"dropping_details\";s:11:\"Lorem Ipsum\";}}', '6', '600', '6', '700', '1200', '900 KM', '9', '2022-06-26', 'a:1:{i:0;s:6:\"Friday\";}', 'a:3:{i:0;s:13:\"[3]|[Blanket]\";i:1;s:11:\"[1]|[Lunch]\";i:2;s:11:\"[2]|[Wi-Fi]\";}', '[2]|[BUSINESS-CLASS]', '[2]|[BUSINESS-R-123]', 'SHOHAG', 'a:4:{s:6:\"driver\";a:1:{i:0;s:16:\"[6]|[Driver]|[A]\";}s:9:\"assistant\";a:1:{i:0;s:19:\"[3]|[Assistant]|[A]\";}s:3:\"abc\";a:1:{i:0;s:17:\"[-]|[None]|[None]\";}s:3:\"xyz\";a:1:{i:0;s:17:\"[-]|[None]|[None]\";}}', '1');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `trip`
--
ALTER TABLE `trip`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `trip`
--
ALTER TABLE `trip`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
