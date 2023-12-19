-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Oct 08, 2023 at 08:57 AM
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
-- Table structure for table `admin`
--

CREATE TABLE `admin` (
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
-- Dumping data for table `admin`
--

INSERT INTO `admin` (`id`, `first_name`, `last_name`, `mobile_no`, `email`, `id_type`, `nid_number`, `country_name`, `city_name`, `zip_code`, `address`, `password`) VALUES
(1, 'Sutariya', 'Krishna', '8264170570', 'krishnar.sutariyarskd154@gmail.com', 'UID', '123456789101112', '[99]|[INDIA]', 'Surat', '395010', '154,Raj Mandir Soc, Savaliya Circal, Yogi Chowk, Surat. - 395010', 'Krishna@1234');

-- --------------------------------------------------------

--
-- Table structure for table `country`
--

CREATE TABLE `country` (
  `id` int(11) NOT NULL,
  `country_name` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `country`
--

INSERT INTO `country` (`id`, `country_name`) VALUES
(1, 'AFGHANISTAN'),
(2, 'ALBANIA'),
(3, 'ALGERIA'),
(4, 'AMERICAN SAMOA'),
(5, 'ANDORRA'),
(6, 'ANGOLA'),
(7, 'ANGUILLA'),
(8, 'ANTARCTICA'),
(9, 'ANTIGUA AND BARBUDA'),
(10, 'ARGENTINA'),
(11, 'ARMENIA'),
(12, 'ARUBA'),
(13, 'AUSTRALIA'),
(14, 'AUSTRIA'),
(15, 'AZERBAIJAN'),
(16, 'BAHAMAS'),
(17, 'BAHRAIN'),
(18, 'BANGLADESH'),
(19, 'BARBADOS'),
(20, 'BELARUS'),
(21, 'BELGIUM'),
(22, 'BELIZE'),
(23, 'BENIN'),
(24, 'BERMUDA'),
(25, 'BHUTAN'),
(26, 'BOLIVIA'),
(27, 'BOSNIA AND HERZEGOVINA'),
(28, 'BOTSWANA'),
(29, 'BOUVET ISLAND'),
(30, 'BRAZIL'),
(31, 'BRITISH INDIAN OCEAN TERRITORY'),
(32, 'BRUNEI DARUSSALAM'),
(33, 'BULGARIA'),
(34, 'BURKINA FASO'),
(35, 'BURUNDI'),
(36, 'CAMBODIA'),
(37, 'CAMEROON'),
(38, 'CANADA'),
(39, 'CAPE VERDE'),
(40, 'CAYMAN ISLANDS'),
(41, 'CENTRAL AFRICAN REPUBLIC'),
(42, 'CHAD'),
(43, 'CHILE'),
(44, 'CHINA'),
(45, 'CHRISTMAS ISLAND'),
(46, 'COCOS (KEELING) ISLANDS'),
(47, 'COLOMBIA'),
(48, 'COMOROS'),
(49, 'CONGO'),
(50, 'CONGO, THE DEMOCRATIC REPUBLIC OF THE'),
(51, 'COOK ISLANDS'),
(52, 'COSTA RICA'),
(53, 'COTE D`IVOIRE'),
(54, 'CROATIA'),
(55, 'CUBA'),
(56, 'CYPRUS'),
(57, 'CZECH REPUBLIC'),
(58, 'DENMARK'),
(59, 'DJIBOUTI'),
(60, 'DOMINICA'),
(61, 'DOMINICAN REPUBLIC'),
(62, 'ECUADOR'),
(63, 'EGYPT'),
(64, 'EL SALVADOR'),
(65, 'EQUATORIAL GUINEA'),
(66, 'ERITREA'),
(67, 'ESTONIA'),
(68, 'ETHIOPIA'),
(69, 'FALKLAND ISLANDS (MALVINAS)'),
(70, 'FAROE ISLANDS'),
(71, 'FIJI'),
(72, 'FINLAND'),
(73, 'FRANCE'),
(74, 'FRENCH GUIANA'),
(75, 'FRENCH POLYNESIA'),
(76, 'FRENCH SOUTHERN TERRITORIES'),
(77, 'GABON'),
(78, 'GAMBIA'),
(79, 'GEORGIA'),
(80, 'GERMANY'),
(81, 'GHANA'),
(82, 'GIBRALTAR'),
(83, 'GREECE'),
(84, 'GREENLAND'),
(85, 'GRENADA'),
(86, 'GUADELOUPE'),
(87, 'GUAM'),
(88, 'GUATEMALA'),
(89, 'GUINEA'),
(90, 'GUINEA-BISSAU'),
(91, 'GUYANA'),
(92, 'HAITI'),
(93, 'HEARD ISLAND AND MCDONALD ISLANDS'),
(94, 'HOLY SEE (VATICAN CITY STATE)'),
(95, 'HONDURAS'),
(96, 'HONG KONG'),
(97, 'HUNGARY'),
(98, 'ICELAND'),
(99, 'INDIA'),
(100, 'INDONESIA'),
(101, 'IRAN, ISLAMIC REPUBLIC OF'),
(102, 'IRAQ'),
(103, 'IRELAND'),
(104, 'ISRAEL'),
(105, 'ITALY'),
(106, 'JAMAICA'),
(107, 'JAPAN'),
(108, 'JORDAN'),
(109, 'KAZAKHSTAN'),
(110, 'KENYA'),
(111, 'KIRIBATI'),
(112, 'KOREA, DEMOCRATIC PEOPLE`S REPUBLIC OF'),
(113, 'KOREA, REPUBLIC OF'),
(114, 'KUWAIT'),
(115, 'KYRGYZSTAN'),
(116, 'LAO PEOPLE`S DEMOCRATIC REPUBLIC'),
(117, 'LATVIA'),
(118, 'LEBANON'),
(119, 'LESOTHO'),
(120, 'LIBERIA'),
(121, 'LIBYAN ARAB JAMAHIRIYA'),
(122, 'LIECHTENSTEIN'),
(123, 'LITHUANIA'),
(124, 'LUXEMBOURG'),
(125, 'MACAO'),
(126, 'MACEDONIA, THE FORMER YUGOSLAV REPUBLIC OF'),
(127, 'MADAGASCAR'),
(128, 'MALAWI'),
(129, 'MALAYSIA'),
(130, 'MALDIVES'),
(131, 'MALI'),
(132, 'MALTA'),
(133, 'MARSHALL ISLANDS'),
(134, 'MARTINIQUE'),
(135, 'MAURITANIA'),
(136, 'MAURITIUS'),
(137, 'MAYOTTE'),
(138, 'MEXICO'),
(139, 'MICRONESIA, FEDERATED STATES OF'),
(140, 'MOLDOVA, REPUBLIC OF'),
(141, 'MONACO'),
(142, 'MONGOLIA'),
(143, 'MONTSERRAT'),
(144, 'MOROCCO'),
(145, 'MOZAMBIQUE'),
(146, 'MYANMAR'),
(147, 'NAMIBIA'),
(148, 'NAURU'),
(149, 'NEPAL'),
(150, 'NETHERLANDS'),
(151, 'NETHERLANDS ANTILLES'),
(152, 'NEW CALEDONIA'),
(153, 'NEW ZEALAND'),
(154, 'NICARAGUA'),
(155, 'NIGER'),
(156, 'NIGERIA'),
(157, 'NIUE'),
(158, 'NORFOLK ISLAND'),
(159, 'NORTHERN MARIANA ISLANDS'),
(160, 'NORWAY'),
(161, 'OMAN'),
(162, 'PAKISTAN'),
(163, 'PALAU'),
(164, 'PALESTINIAN TERRITORY, OCCUPIED'),
(165, 'PANAMA'),
(166, 'PAPUA NEW GUINEA'),
(167, 'PARAGUAY'),
(168, 'PERU'),
(169, 'PHILIPPINES'),
(170, 'PITCAIRN'),
(171, 'POLAND'),
(172, 'PORTUGAL'),
(173, 'PUERTO RICO'),
(174, 'QATAR'),
(175, 'REUNION'),
(176, 'ROMANIA'),
(177, 'RUSSIAN FEDERATION'),
(178, 'RWANDA'),
(179, 'SAINT HELENA'),
(180, 'SAINT KITTS AND NEVIS'),
(181, 'SAINT LUCIA'),
(182, 'SAINT PIERRE AND MIQUELON'),
(183, 'SAINT VINCENT AND THE GRENADINES'),
(184, 'SAMOA'),
(185, 'SAN MARINO'),
(186, 'SAO TOME AND PRINCIPE'),
(187, 'SAUDI ARABIA'),
(188, 'SENEGAL'),
(189, 'SERBIA AND MONTENEGRO'),
(190, 'SEYCHELLES'),
(191, 'SIERRA LEONE'),
(192, 'SINGAPORE'),
(193, 'SLOVAKIA'),
(194, 'SLOVENIA'),
(195, 'SOLOMON ISLANDS'),
(196, 'SOMALIA'),
(197, 'SOUTH AFRICA'),
(198, 'SOUTH GEORGIA AND THE SOUTH SANDWICH ISLANDS'),
(199, 'SPAIN'),
(200, 'SRI LANKA'),
(201, 'SUDAN'),
(202, 'SURINAME'),
(203, 'SVALBARD AND JAN MAYEN'),
(204, 'SWAZILAND'),
(205, 'SWEDEN'),
(206, 'SWITZERLAND'),
(207, 'SYRIAN ARAB REPUBLIC'),
(208, 'TAIWAN, PROVINCE OF CHINA'),
(209, 'TAJIKISTAN'),
(210, 'TANZANIA, UNITED REPUBLIC OF'),
(211, 'THAILAND'),
(212, 'TIMOR-LESTE'),
(213, 'TOGO'),
(214, 'TOKELAU'),
(215, 'TONGA'),
(216, 'TRINIDAD AND TOBAGO'),
(217, 'TUNISIA'),
(218, 'TURKEY'),
(219, 'TURKMENISTAN'),
(220, 'TURKS AND CAICOS ISLANDS'),
(221, 'TUVALU'),
(222, 'UGANDA'),
(223, 'UKRAINE'),
(224, 'UNITED ARAB EMIRATES'),
(225, 'UNITED KINGDOM'),
(226, 'UNITED STATES'),
(227, 'UNITED STATES MINOR OUTLYING ISLANDS'),
(228, 'URUGUAY'),
(229, 'UZBEKISTAN'),
(230, 'VANUATU'),
(231, 'VENEZUELA'),
(232, 'VIET NAM'),
(233, 'VIRGIN ISLANDS, BRITISH'),
(234, 'VIRGIN ISLANDS, U.S.'),
(235, 'WALLIS AND FUTUNA'),
(236, 'WESTERN SAHARA'),
(237, 'YEMEN'),
(238, 'ZAMBIA'),
(239, 'ZIMBABWE');

-- --------------------------------------------------------

--
-- Table structure for table `coupon`
--

CREATE TABLE `coupon` (
  `id` int(11) NOT NULL,
  `code` text NOT NULL,
  `start_date` text NOT NULL,
  `end_date` text NOT NULL,
  `trip` text NOT NULL,
  `amount` text NOT NULL,
  `terms_conditions` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `coupon`
--

INSERT INTO `coupon` (`id`, `code`, `start_date`, `end_date`, `trip`, `amount`, `terms_conditions`) VALUES
(1, 'BUSCODE-2023826195121611693056912161', '2022-06-01', '2029-01-01', '[2]|[DHAKA]|[RANGPUR]', '250', 'Lorem Ipsum');

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

-- --------------------------------------------------------

--
-- Table structure for table `employee_type`
--

CREATE TABLE `employee_type` (
  `id` int(11) NOT NULL,
  `emp_type` text NOT NULL,
  `emp_details` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `employee_type`
--

INSERT INTO `employee_type` (`id`, `emp_type`, `emp_details`) VALUES
(1, 'Driver', 'This is cannot be deleted'),
(2, 'Assistant', 'This is cannot be deleted'),
(3, 'ABC', 'This is can be deleted'),
(4, 'XYZ', 'This is can be deleted');

-- --------------------------------------------------------

--
-- Table structure for table `facility`
--

CREATE TABLE `facility` (
  `id` int(11) NOT NULL,
  `facility_name` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `facility`
--

INSERT INTO `facility` (`id`, `facility_name`) VALUES
(1, 'Lunch'),
(2, 'Wi-Fi'),
(3, 'Blanket'),
(4, 'Water Bottol');

-- --------------------------------------------------------

--
-- Table structure for table `fleet`
--

CREATE TABLE `fleet` (
  `id` int(11) NOT NULL,
  `type` text NOT NULL,
  `layout` text NOT NULL,
  `fleet_no_of_row` int(11) NOT NULL,
  `last_seat_check` int(11) NOT NULL,
  `total_seat` int(11) NOT NULL,
  `seat_number` text NOT NULL,
  `status` int(11) NOT NULL,
  `luggage_service` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `fleet`
--

INSERT INTO `fleet` (`id`, `type`, `layout`, `fleet_no_of_row`, `last_seat_check`, `total_seat`, `seat_number`, `status`, `luggage_service`) VALUES
(1, 'AC', '2×2', 9, 1, 37, 'A1, A2, A3, A4, B1, B2, B3, B4, C1, C2, C3, C4, D1, D2, D3, D4, E1, E2, E3, E4, F1, F2, F3, F4, G1, G2, G3, G4, H1, H2, H3, H4, I1, I2, I3, I4, Z', 1, 1),
(2, 'BUSINESS-CLASS', '1×1', 11, 1, 23, 'A1, A2, B1, B2, C1, C2, D1, D2, E1, E2, F1, F2, G1, G2, H1, H2, I1, I2, J1, J2, K1, K2, Z', 1, 1),
(3, 'NON-AC', '2×2', 10, 1, 41, 'A1, A2, A3, A4, B1, B2, B3, B4, C1, C2, C3, C4, D1, D2, D3, D4, E1, E2, E3, E4, F1, F2, F3, F4, G1, G2, G3, G4, H1, H2, H3, H4, I1, I2, I3, I4, J1, J2, J3, J4, Z', 1, 1),
(4, 'LOCAL', '2×2', 10, 0, 40, 'A1, A2, A3, A4, B1, B2, B3, B4, C1, C2, C3, C4, D1, D2, D3, D4, E1, E2, E3, E4, F1, F2, F3, F4, G1, G2, G3, G4, H1, H2, H3, H4, I1, I2, I3, I4, J1, J2, J3, J4', 1, 1),
(5, 'WORLD-CLASS', '2×1', 8, 1, 25, 'A1, A2, A3, B1, B2, B3, C1, C2, C3, D1, D2, D3, E1, E2, E3, F1, F2, F3, G1, G2, G3, H1, H2, H3, Z', 1, 1);

-- --------------------------------------------------------

--
-- Table structure for table `inquiry`
--

CREATE TABLE `inquiry` (
  `id` int(11) NOT NULL,
  `name` text NOT NULL,
  `email` text NOT NULL,
  `mobile_no` text NOT NULL,
  `subject` text NOT NULL,
  `message` text NOT NULL,
  `status` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `inquiry`
--

INSERT INTO `inquiry` (`id`, `name`, `email`, `mobile_no`, `subject`, `message`, `status`) VALUES
(1, 'James', 'vinnie@gmail.com', '08036048913', 'TESTING MAIL', 'Please Cheack', '1'),
(2, 'AGBo', 'agbolase@gmail.com', '08036048913', 'ROUTE ENQUIRY', 'Testing Message', '0'),
(3, 'lorem ipsum', 'I4@p.com', '0000000000000', 'Lorem Ipsum is simply dummy text of the printing and typesetting industry', 'Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry\'s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum', '1'),
(4, 'lorem ipsum', 'I3@p.com', '0000000000000', 'Lorem Ipsum is simply dummy text of the printing and typesetting industry', 'Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry\'s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum', '0'),
(5, 'lorem ipsum', 'I2@p.com', '0000000000000', 'Lorem Ipsum is simply dummy text of the printing and typesetting industry', 'Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry\'s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum', '1'),
(6, 'lorem ipsum', 'I1@p.com', '0000000000000', 'Lorem Ipsum is simply dummy text of the printing and typesetting industry', 'Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry\'s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum', '0'),
(7, 'Sutariya Krishna', 'krishnar.sutariyarskd154@gmail.com', '8264170570', 'ABCD', 'ABCDEFGHIJKLMNOPQRSTUVWXYZ', '0');

-- --------------------------------------------------------

--
-- Table structure for table `location`
--

CREATE TABLE `location` (
  `id` int(11) NOT NULL,
  `location_name` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `location`
--

INSERT INTO `location` (`id`, `location_name`) VALUES
(1, 'FENI'),
(2, 'TANGAIL'),
(3, 'CHITTAGONG'),
(4, 'BOGRA'),
(5, 'MUNSHIGANJ'),
(6, 'MANIKGANJ'),
(7, 'MADARIPUR'),
(8, 'KISHOREGANJ'),
(9, 'JAMALPUR'),
(10, 'GOPALGANJ'),
(11, 'GAZIPUR'),
(12, 'FARIDPUR'),
(13, 'DHAKA'),
(14, 'THAKURGAON'),
(15, 'RANGPUR'),
(16, 'PANCHAGARH'),
(17, 'NILPHAMARI'),
(18, 'LALMONIRHAT'),
(19, 'KURIGRAM'),
(20, 'GAIBANDHA'),
(21, 'DINAJPUR');

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

-- --------------------------------------------------------

--
-- Table structure for table `payment_method`
--

CREATE TABLE `payment_method` (
  `id` int(11) NOT NULL,
  `method_name` text NOT NULL,
  `status` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `payment_method`
--

INSERT INTO `payment_method` (`id`, `method_name`, `status`) VALUES
(1, 'Cash', 1),
(2, 'Bank', 1),
(3, 'EFT', 1);

-- --------------------------------------------------------

--
-- Table structure for table `schedule`
--

CREATE TABLE `schedule` (
  `id` int(11) NOT NULL,
  `start_time_12_hour` text NOT NULL,
  `end_time_12_hour` text NOT NULL,
  `start_time_24_hour` text NOT NULL,
  `end_time_24_hour` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `schedule`
--

INSERT INTO `schedule` (`id`, `start_time_12_hour`, `end_time_12_hour`, `start_time_24_hour`, `end_time_24_hour`) VALUES
(1, '07:00 PM', '03:00 PM', '19:00', '15:00'),
(2, '07:30 AM', '03:30 PM', '07:30', '15:30'),
(3, '09:00 AM', '05:00 PM', '09:00', '17:00'),
(4, '09:30 AM', '05:30 PM', '09:30', '17:30'),
(5, '10:00 PM', '06:00 AM', '22:00', '06:00'),
(6, '11:00 PM', '07:00 AM', '23:00', '07:00');

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

-- --------------------------------------------------------

--
-- Table structure for table `tax`
--

CREATE TABLE `tax` (
  `id` int(11) NOT NULL,
  `tax_name` text NOT NULL,
  `tax_value` text NOT NULL,
  `tax_reg_no` text NOT NULL,
  `status` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `tax`
--

INSERT INTO `tax` (`id`, `tax_name`, `tax_value`, `tax_reg_no`, `status`) VALUES
(1, 'CGT', '7', '123ABC', 1),
(2, 'GST TAX', '5', 'ABC123', 1);

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
-- Indexes for table `admin`
--
ALTER TABLE `admin`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `country`
--
ALTER TABLE `country`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `coupon`
--
ALTER TABLE `coupon`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `employee`
--
ALTER TABLE `employee`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `employee_type`
--
ALTER TABLE `employee_type`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `facility`
--
ALTER TABLE `facility`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `fleet`
--
ALTER TABLE `fleet`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `inquiry`
--
ALTER TABLE `inquiry`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `location`
--
ALTER TABLE `location`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `passenger`
--
ALTER TABLE `passenger`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `payment_method`
--
ALTER TABLE `payment_method`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `schedule`
--
ALTER TABLE `schedule`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `schedule_filter`
--
ALTER TABLE `schedule_filter`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `stand`
--
ALTER TABLE `stand`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tax`
--
ALTER TABLE `tax`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `ticket`
--
ALTER TABLE `ticket`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `trip`
--
ALTER TABLE `trip`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `vehical`
--
ALTER TABLE `vehical`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `admin`
--
ALTER TABLE `admin`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `country`
--
ALTER TABLE `country`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=240;

--
-- AUTO_INCREMENT for table `coupon`
--
ALTER TABLE `coupon`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `employee`
--
ALTER TABLE `employee`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `employee_type`
--
ALTER TABLE `employee_type`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `facility`
--
ALTER TABLE `facility`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `fleet`
--
ALTER TABLE `fleet`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `inquiry`
--
ALTER TABLE `inquiry`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `location`
--
ALTER TABLE `location`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=22;

--
-- AUTO_INCREMENT for table `passenger`
--
ALTER TABLE `passenger`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `payment_method`
--
ALTER TABLE `payment_method`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `schedule`
--
ALTER TABLE `schedule`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `schedule_filter`
--
ALTER TABLE `schedule_filter`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `stand`
--
ALTER TABLE `stand`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=18;

--
-- AUTO_INCREMENT for table `tax`
--
ALTER TABLE `tax`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `ticket`
--
ALTER TABLE `ticket`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `trip`
--
ALTER TABLE `trip`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `vehical`
--
ALTER TABLE `vehical`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
