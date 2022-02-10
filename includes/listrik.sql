-- phpMyAdmin SQL Dump
-- version 5.0.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Feb 10, 2022 at 11:43 AM
-- Server version: 10.4.11-MariaDB
-- PHP Version: 7.2.27

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `listrik`
--

-- --------------------------------------------------------

--
-- Table structure for table `data_inventory`
--

CREATE TABLE `data_inventory` (
  `id` int(11) NOT NULL,
  `data_inventoris` int(11) NOT NULL,
  `name` varchar(100) DEFAULT NULL,
  `brand` varchar(100) DEFAULT NULL,
  `series` varchar(100) DEFAULT NULL,
  `years` varchar(100) DEFAULT NULL,
  `quantity` varchar(100) DEFAULT NULL,
  `unit` varchar(100) DEFAULT NULL,
  `warehouse` varchar(100) DEFAULT NULL,
  `room` varchar(100) DEFAULT NULL,
  `conditions` int(11) NOT NULL,
  `descs` text DEFAULT NULL,
  `created_at` datetime NOT NULL DEFAULT current_timestamp(),
  `updated_at` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `data_inventory`
--

INSERT INTO `data_inventory` (`id`, `data_inventoris`, `name`, `brand`, `series`, `years`, `quantity`, `unit`, `warehouse`, `room`, `conditions`, `descs`, `created_at`, `updated_at`) VALUES
(21, 732859526, 'Modul Elektron', '', '', '', '1 set', '', 'Lab.Listrik', 'R.Mekatronika ', 1, '', '2020-02-21 17:22:35', NULL),
(22, 1388246746, 'New & Renewable Energy Trainer', '', '', '2015', '', '', 'Lab.Listrik', 'R.Mekatronika ', 1, '', '2020-02-21 17:22:35', NULL),
(23, 796072888, 'Komputer ', '', '', '2015', '3 set', '', 'Lab.Listrik', 'R.Mekatronika ', 1, '', '2020-02-21 17:22:35', NULL),
(24, 825822803, 'Denford Microturn Module ', 'Amatroll', 'CNC-M60Z', '2018', '2 set', '', 'Lab.Listrik', 'R.Mekatronika ', 1, '', '2020-02-21 17:22:35', NULL),
(25, 1161215752, 'Air Conditioner', 'Panasonic', 'CS-PC-I2NKP', '2018', '2 buah', '', 'Lab.Listrik', 'R.Mekatronika ', 1, '', '2020-02-21 17:22:35', NULL),
(26, 2110641153, 'Electro Hidrolic ', 'ITCS PLC', 'HD-002', '', '1 set', '', 'Lab.Listrik', 'R.Mekatronika ', 1, '', '2020-02-21 17:22:35', NULL),
(27, 734603118, 'Electro Pneumatic Trainer (Board 1)', '', '', '', '1 set', '', 'Lab.Listrik', 'R.Mekatronika ', 1, '', '2020-02-21 17:22:35', NULL),
(28, 842952291, 'Electro Pneumatic Trainer (Board 2)', '', '', '', '1 set', '', 'Lab.Listrik', 'R.Mekatronika ', 1, '', '2020-02-21 17:22:35', NULL),
(29, 1312395897, 'Electro Pneumatic Trainer (Board 3)', '', '', '', '1 set', '', 'Lab.Listrik', 'R.Mekatronika ', 1, '', '2020-02-21 17:22:35', NULL),
(30, 2106079583, 'Electro Pneumatic Trainer (Board 4)', '', '', '', '1 set', '', 'Lab.Listrik', 'R.Mekatronika ', 1, '', '2020-02-21 17:22:35', NULL),
(31, 1689639800, 'Module Pneumatic Trainer (Table)', '', '', '', '2 set', '', 'Lab.Listrik', 'R.Mekatronika ', 1, '', '2020-02-21 17:22:35', NULL),
(32, 820103328, 'Trainer Pneumatic Pemotong Kentang', '', '', '', '1 set', '', 'Lab.Listrik', 'R.Mekatronika ', 1, '', '2020-02-21 17:22:35', NULL),
(33, 402738768, 'Trainer Pneumatic Finishing Roti ', '', '', '', '1 set', '', 'Lab.Listrik', 'R.Mekatronika ', 1, '', '2020-02-21 17:22:35', NULL),
(34, 560934514, 'Pompa Compressor', '', '', '', '5 buah', '', 'Lab.Listrik', 'R.Mekatronika ', 1, '', '2020-02-21 17:22:35', NULL),
(35, 1692872358, 'Kursi Bundar ', '', '', '', '17 buah', '', 'Lab.Listrik', 'R.Mekatronika ', 1, '', '2020-02-21 17:22:35', NULL),
(36, 169700586, 'Kursi Sandar ', '', '', '', '12 buah', '', 'Lab.Listrik', 'R.Mekatronika ', 1, '', '2020-02-21 17:22:35', NULL),
(37, 123872213, 'Terminal (4 Stop Kontak)', '', '', '', '8 buah', '', 'Lab.Listrik', 'R.Mekatronika ', 1, '', '2020-02-21 17:22:35', NULL),
(38, 896401954, 'Single Stop Kontak', '', '', '', '1 buah', '', 'Lab.Listrik', 'R.Mekatronika ', 1, '', '2020-02-21 17:22:35', NULL),
(39, 1700054455, 'Stop Kontak 3 Phase', '', '', '', '3 buah', '', 'Lab.Listrik', 'R.Mekatronika ', 1, '', '2020-02-21 17:22:35', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `infolab`
--

CREATE TABLE `infolab` (
  `id` int(11) NOT NULL,
  `progdi` varchar(30) NOT NULL,
  `head` varchar(30) NOT NULL,
  `NIP` varchar(30) NOT NULL,
  `NIDN` varchar(30) NOT NULL,
  `updated_at` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `infolab`
--

INSERT INTO `infolab` (`id`, `progdi`, `head`, `NIP`, `NIDN`, `updated_at`) VALUES
(0, 'Teknik Listrik', 'Drs. Ari Santoso, S.ST, M.Eng.', '195903101986121002', '0010035904', '2020-02-09 11:16:49');

-- --------------------------------------------------------

--
-- Table structure for table `level`
--

CREATE TABLE `level` (
  `id` int(11) NOT NULL,
  `name` varchar(30) NOT NULL,
  `permission` text NOT NULL,
  `created_at` datetime NOT NULL DEFAULT current_timestamp(),
  `updated_at` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `level`
--

INSERT INTO `level` (`id`, `name`, `permission`, `created_at`, `updated_at`) VALUES
(1, 'SuperAdmin', 'a:20:{i:0;s:10:\"createUser\";i:1;s:10:\"updateUser\";i:2;s:8:\"viewUser\";i:3;s:10:\"deleteUser\";i:4;s:11:\"createLevel\";i:5;s:11:\"updateLevel\";i:6;s:9:\"viewLevel\";i:7;s:11:\"deleteLevel\";i:8;s:14:\"createSchedule\";i:9;s:14:\"updateSchedule\";i:10;s:12:\"viewSchedule\";i:11;s:14:\"deleteSchedule\";i:12;s:15:\"createInventory\";i:13;s:15:\"updateInventory\";i:14;s:13:\"viewInventory\";i:15;s:15:\"deleteInventory\";i:16;s:13:\"createSetting\";i:17;s:13:\"updateSetting\";i:18;s:11:\"viewSetting\";i:19;s:13:\"deleteSetting\";}', '2020-02-06 07:24:20', NULL),
(2, 'admin', 'a:6:{i:0;s:10:\"createUser\";i:1;s:10:\"updateUser\";i:2;s:11:\"createLevel\";i:3;s:9:\"viewLevel\";i:4;s:15:\"updateInventory\";i:5;s:13:\"viewInventory\";}', '2020-02-06 07:25:41', '2020-02-10 16:49:44'),
(3, 'protokol', 'a:5:{i:0;s:10:\"createUser\";i:1;s:10:\"updateUser\";i:2;s:8:\"viewUser\";i:3;s:15:\"createInventory\";i:4;s:13:\"viewInventory\";}', '2020-02-06 08:10:04', '2020-02-06 08:11:25'),
(4, 'SuperAdmin', 'a:20:{i:0;s:10:\"createUser\";i:1;s:10:\"updateUser\";i:2;s:8:\"viewUser\";i:3;s:10:\"deleteUser\";i:4;s:11:\"createLevel\";i:5;s:11:\"updateLevel\";i:6;s:9:\"viewLevel\";i:7;s:11:\"deleteLevel\";i:8;s:14:\"createSchedule\";i:9;s:14:\"updateSchedule\";i:10;s:12:\"viewSchedule\";i:11;s:14:\"deleteSchedule\";i:12;s:15:\"createInventory\";i:13;s:15:\"updateInventory\";i:14;s:13:\"viewInventory\";i:15;s:15:\"deleteInventory\";i:16;s:13:\"createSetting\";i:17;s:13:\"updateSetting\";i:18;s:11:\"viewSetting\";i:19;s:13:\"deleteSetting\";}', '2020-02-10 16:43:30', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `schedule`
--

CREATE TABLE `schedule` (
  `id` int(11) NOT NULL,
  `day` varchar(15) NOT NULL,
  `dates` varchar(30) NOT NULL,
  `description` text NOT NULL,
  `created_at` datetime NOT NULL DEFAULT current_timestamp(),
  `updated_at` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `schedule`
--

INSERT INTO `schedule` (`id`, `day`, `dates`, `description`, `created_at`, `updated_at`) VALUES
(3, 'Monday', '2020-02-17', 'Praktek LT 2A', '2020-02-13 06:43:02', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `setting`
--

CREATE TABLE `setting` (
  `id` int(11) NOT NULL,
  `titile` varchar(255) NOT NULL,
  `subTitle` varchar(255) NOT NULL,
  `logo1` text NOT NULL,
  `logo2` text NOT NULL,
  `img1` text NOT NULL,
  `img2` text NOT NULL,
  `img3` text NOT NULL,
  `img4` text NOT NULL,
  `updated_at` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `setting`
--

INSERT INTO `setting` (`id`, `titile`, `subTitle`, `logo1`, `logo2`, `img1`, `img2`, `img3`, `img4`, `updated_at`) VALUES
(1, 'LABORATORIUM PLC ', 'KEGIATAN PRAKTIKUM SCADA', 'logopoli.png', 'source.gif', '7_reasons_why_now_is_the_right_time_to_move_to_drupal_80a.jpg', 'images.png', '2016-star-citizen-game-img.jpg', 'Apa-Itu-CMS-Content-Management-System-Lengkap.jpg', '2020-02-13 13:45:17');

-- --------------------------------------------------------

--
-- Table structure for table `sub_data_inventory`
--

CREATE TABLE `sub_data_inventory` (
  `id` int(11) NOT NULL,
  `id_inventory` int(11) NOT NULL,
  `name` varchar(100) DEFAULT NULL,
  `brand` varchar(100) DEFAULT NULL,
  `series` varchar(100) DEFAULT NULL,
  `years` varchar(100) DEFAULT NULL,
  `quantity` varchar(100) DEFAULT NULL,
  `unit` varchar(100) DEFAULT NULL,
  `warehouse` varchar(100) DEFAULT NULL,
  `room` varchar(100) DEFAULT NULL,
  `conditions` int(11) NOT NULL,
  `descs` text DEFAULT NULL,
  `created_at` datetime NOT NULL DEFAULT current_timestamp(),
  `updated_at` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `sub_data_inventory`
--

INSERT INTO `sub_data_inventory` (`id`, `id_inventory`, `name`, `brand`, `series`, `years`, `quantity`, `unit`, `warehouse`, `room`, `conditions`, `descs`, `created_at`, `updated_at`) VALUES
(72, 732859526, 'Power Board', '', 'B-3729 B', '', '', '', 'Lab.Listrik', 'R.Mekatronika ', 1, '', '2020-02-21 17:22:35', NULL),
(73, 732859526, 'Power Supply', '', 'B-3729-C', '', '', '', 'Lab.Listrik', 'R.Mekatronika ', 1, '', '2020-02-21 17:22:35', NULL),
(74, 732859526, 'PLL Machine', '', 'B-3729 A', '', '', '', 'Lab.Listrik', 'R.Mekatronika ', 1, '', '2020-02-21 17:22:35', NULL),
(75, 1388246746, 'Photovoltarc module 1', '', 'ED-9710-10', '2015', '', '', 'Lab.Listrik', 'R.Mekatronika ', 1, '', '2020-02-21 17:22:35', NULL),
(76, 1388246746, 'Changing Controller Module', '', 'ED-9710-1', '2015', '', '', 'Lab.Listrik', 'R.Mekatronika ', 1, '', '2020-02-21 17:22:35', NULL),
(77, 1388246746, 'Inverter Module', '', 'ED-9710-2', '2015', '', '', 'Lab.Listrik', 'R.Mekatronika ', 1, '', '2020-02-21 17:22:35', NULL),
(78, 1388246746, 'Central Communication Module', '', 'ED-9710-4', '2015', '', '', 'Lab.Listrik', 'R.Mekatronika ', 1, '', '2020-02-21 17:22:35', NULL),
(79, 1388246746, 'AC Load Module', '', 'ED-9710-5', '2015', '', '', 'Lab.Listrik', 'R.Mekatronika ', 1, '', '2020-02-21 17:22:35', NULL),
(80, 1388246746, 'PC Load Module', '', 'ED-9710-6', '2015', '', '', 'Lab.Listrik', 'R.Mekatronika ', 1, '', '2020-02-21 17:22:35', NULL),
(81, 1388246746, 'DC to DC Converter Module', '', 'ED--9710-7', '2015', '', '', 'Lab.Listrik', 'R.Mekatronika ', 1, '', '2020-02-21 17:22:35', NULL),
(82, 796072888, 'Monitor', 'LG', '', '2015', '', '3 buah', 'Lab.Listrik', 'R.Mekatronika ', 1, '', '2020-02-21 17:22:35', NULL),
(83, 796072888, 'CPU', 'LG', '', '2015', '', '3 buah', 'Lab.Listrik', 'R.Mekatronika ', 1, '', '2020-02-21 17:22:35', NULL),
(84, 796072888, 'Mouse', 'itech', '', '2015', '', '3 buah', 'Lab.Listrik', 'R.Mekatronika ', 1, '', '2020-02-21 17:22:35', NULL),
(85, 796072888, 'Keyboard', 'K-One', '', '2015', '', '3 buah', 'Lab.Listrik', 'R.Mekatronika ', 1, '', '2020-02-21 17:22:35', NULL),
(86, 796072888, 'Power Supply', 'Amatroll', '', '', '', '1 buah', 'Lab.Listrik', 'R.Mekatronika ', 1, '', '2020-02-21 17:22:35', NULL),
(87, 825822803, 'Pegas', 'Amatroll', '94-RCP-1', '2018', '', '1 buah', 'Lab.Listrik', 'R.Mekatronika ', 1, '', '2020-02-21 17:22:35', NULL),
(88, 2110641153, 'Terminal Input Source', '', '', '', '', '1 buah', 'Lab.Listrik', 'R.Mekatronika ', 1, '', '2020-02-21 17:22:35', NULL),
(89, 2110641153, 'Indicator Lamp', '', '', '', '', '1 buah', 'Lab.Listrik', 'R.Mekatronika ', 1, '', '2020-02-21 17:22:35', NULL),
(90, 2110641153, 'MCB', '', '', '', '', '1 buah', 'Lab.Listrik', 'R.Mekatronika ', 1, '', '2020-02-21 17:22:35', NULL),
(91, 2110641153, 'Unit Input Module', '', '', '', '', '1 buah', 'Lab.Listrik', 'R.Mekatronika ', 1, '', '2020-02-21 17:22:35', NULL),
(92, 2110641153, 'Unit Output', '', '', '', '', '1 buah', 'Lab.Listrik', 'R.Mekatronika ', 1, '', '2020-02-21 17:22:35', NULL),
(93, 2110641153, 'Relay Module', '', '', '', '', '1 buah', 'Lab.Listrik', 'R.Mekatronika ', 1, '', '2020-02-21 17:22:35', NULL),
(94, 2110641153, 'Push Button', '', '', '', '', '1 buah', 'Lab.Listrik', 'R.Mekatronika ', 1, '', '2020-02-21 17:22:35', NULL),
(95, 2110641153, 'Power Pack Control 220 V AC', '', '', '', '', '1 buah', 'Lab.Listrik', 'R.Mekatronika ', 1, '', '2020-02-21 17:22:35', NULL),
(96, 2110641153, 'Shuttle Valve', '', '', '', '', '1 buah', 'Lab.Listrik', 'R.Mekatronika ', 1, '', '2020-02-21 17:22:35', NULL),
(97, 2110641153, 'No Valve Electric Control', '', '', '', '', '1 buah', 'Lab.Listrik', 'R.Mekatronika ', 1, '', '2020-02-21 17:22:35', NULL),
(98, 2110641153, 'Relief Valve', '', '', '', '', '1 buah', 'Lab.Listrik', 'R.Mekatronika ', 1, '', '2020-02-21 17:22:35', NULL),
(99, 2110641153, 'Valve Solenoid Control', '', '', '', '', '1 buah', 'Lab.Listrik', 'R.Mekatronika ', 1, '', '2020-02-21 17:22:35', NULL),
(100, 2110641153, 'Double Acting Cylinder', '', '', '', '', '1 buah', 'Lab.Listrik', 'R.Mekatronika ', 1, '', '2020-02-21 17:22:35', NULL),
(101, 734603118, 'Power Supply Unit', '', 'ITCS 02 EPF', '', '', '1 buah', 'Lab.Listrik', 'R.Mekatronika ', 1, '', '2020-02-21 17:22:35', NULL),
(102, 734603118, 'Wiring Pneumatic Picture', '', '', '', '', '1 buah', 'Lab.Listrik', 'R.Mekatronika ', 1, '', '2020-02-21 17:22:35', NULL),
(103, 734603118, 'Indicator Lamp', '', 'ITCS 02 EPF', '', '', '1 buah', 'Lab.Listrik', 'R.Mekatronika ', 1, '', '2020-02-21 17:22:35', NULL),
(104, 734603118, 'Relay Unit', '', 'ITCS 02 EPF', '', '', '1 buah', 'Lab.Listrik', 'R.Mekatronika ', 1, '', '2020-02-21 17:22:35', NULL),
(105, 734603118, 'Single Cylinder Acting', '', 'ITCS 02 EPF', '', '', '1 buah', 'Lab.Listrik', 'R.Mekatronika ', 1, '', '2020-02-21 17:22:35', NULL),
(106, 842952291, 'Module Push Button', '', '', '', '', '1 buah', 'Lab.Listrik', 'R.Mekatronika ', 1, '', '2020-02-21 17:22:35', NULL),
(107, 842952291, 'Indicator Lamp', '', '', '', '', '1 buah', 'Lab.Listrik', 'R.Mekatronika ', 1, '', '2020-02-21 17:22:35', NULL),
(108, 842952291, 'Module Relay', '', '', '', '', '1 buah', 'Lab.Listrik', 'R.Mekatronika ', 1, '', '2020-02-21 17:22:35', NULL),
(109, 842952291, 'Module Air Filter Regulator', '', '', '', '', '1 buah', 'Lab.Listrik', 'R.Mekatronika ', 1, '', '2020-02-21 17:22:35', NULL),
(110, 842952291, 'Module 3/2 Way Sol Valve', '', '', '', '', '1 buah', 'Lab.Listrik', 'R.Mekatronika ', 1, '', '2020-02-21 17:22:35', NULL),
(111, 842952291, 'Jumper Connection', '', '', '', '', '1 buah', 'Lab.Listrik', 'R.Mekatronika ', 1, '', '2020-02-21 17:22:35', NULL),
(112, 842952291, 'Module 5/2 Way Sol Valve', '', '', '', '', '1 buah', 'Lab.Listrik', 'R.Mekatronika ', 1, '', '2020-02-21 17:22:35', NULL),
(113, 842952291, 'Module Limit Switch', '', '', '', '', '1 buah', 'Lab.Listrik', 'R.Mekatronika ', 1, '', '2020-02-21 17:22:35', NULL),
(114, 842952291, 'Module Speed Control', '', '', '', '', '1 buah', 'Lab.Listrik', 'R.Mekatronika ', 1, '', '2020-02-21 17:22:35', NULL),
(115, 842952291, 'Module Single Cylinder Acting', '', '', '', '', '1 buah', 'Lab.Listrik', 'R.Mekatronika ', 1, '', '2020-02-21 17:22:35', NULL),
(116, 842952291, 'Module Double Cylinder Actiong', '', '', '', '', '1 buah', 'Lab.Listrik', 'R.Mekatronika ', 1, '', '2020-02-21 17:22:35', NULL),
(117, 842952291, 'Module Proximity Sensor', '', '', '', '', '1 buah', 'Lab.Listrik', 'R.Mekatronika ', 1, '', '2020-02-21 17:22:35', NULL),
(118, 1312395897, 'Module Relay', '', '', '', '', '1 buah', 'Lab.Listrik', 'R.Mekatronika ', 1, '', '2020-02-21 17:22:35', NULL),
(119, 1312395897, 'Module Indicator Lamp', '', '', '', '', '1 buah', 'Lab.Listrik', 'R.Mekatronika ', 1, '', '2020-02-21 17:22:35', NULL),
(120, 1312395897, 'Module Air Filter Regulator', '', '', '', '', '1 buah', 'Lab.Listrik', 'R.Mekatronika ', 1, '', '2020-02-21 17:22:35', NULL),
(121, 1312395897, 'Modul 3/2 Way Sol Valve', '', '', '', '', '1 buah', 'Lab.Listrik', 'R.Mekatronika ', 1, '', '2020-02-21 17:22:35', NULL),
(122, 1312395897, 'Jumper Connection', '', '', '', '', '1 buah', 'Lab.Listrik', 'R.Mekatronika ', 1, '', '2020-02-21 17:22:35', NULL),
(123, 1312395897, 'Modul 5/2 Way Sol Valve', '', '', '', '', '1 buah', 'Lab.Listrik', 'R.Mekatronika ', 1, '', '2020-02-21 17:22:35', NULL),
(124, 1312395897, 'Modul Limit Switch', '', '', '', '', '1 buah', 'Lab.Listrik', 'R.Mekatronika ', 1, '', '2020-02-21 17:22:35', NULL),
(125, 1312395897, 'Modul Speed Control', '', '', '', '', '1 buah', 'Lab.Listrik', 'R.Mekatronika ', 1, '', '2020-02-21 17:22:35', NULL),
(126, 1312395897, 'Modul Single Cylinder Acting', '', '', '', '', '1 buah', 'Lab.Listrik', 'R.Mekatronika ', 1, '', '2020-02-21 17:22:35', NULL),
(127, 1312395897, 'Modul Double Cylinder', '', '', '', '', '1 buah', 'Lab.Listrik', 'R.Mekatronika ', 1, '', '2020-02-21 17:22:35', NULL),
(128, 1312395897, 'Modul Proximity Sensor PNP', '', '', '', '', '1 buah', 'Lab.Listrik', 'R.Mekatronika ', 1, '', '2020-02-21 17:22:35', NULL),
(129, 2106079583, 'Module Power Supply', '', '', '', '', '1 buah', 'Lab.Listrik', 'R.Mekatronika ', 1, '', '2020-02-21 17:22:35', NULL),
(130, 2106079583, 'Module Push Button', '', '', '', '', '1 buah', 'Lab.Listrik', 'R.Mekatronika ', 1, '', '2020-02-21 17:22:35', NULL),
(131, 2106079583, 'Module Indicator Lamp', '', '', '', '', '1 buah', 'Lab.Listrik', 'R.Mekatronika ', 1, '', '2020-02-21 17:22:35', NULL),
(132, 2106079583, 'Module Relay', '', '', '', '', '1 buah', 'Lab.Listrik', 'R.Mekatronika ', 1, '', '2020-02-21 17:22:35', NULL),
(133, 2106079583, 'Module Air Filter Regulator', '', '', '', '', '1 buah', 'Lab.Listrik', 'R.Mekatronika ', 1, '', '2020-02-21 17:22:35', NULL),
(134, 2106079583, 'Modul 3/2 Way Sol Valve', '', '', '', '', '1 buah', 'Lab.Listrik', 'R.Mekatronika ', 1, '', '2020-02-21 17:22:35', NULL),
(135, 2106079583, 'Jumper Connection', '', '', '', '', '1 buah', 'Lab.Listrik', 'R.Mekatronika ', 1, '', '2020-02-21 17:22:35', NULL),
(136, 2106079583, 'Modul 5/2 Way Sol Valve', '', '', '', '', '1 buah', 'Lab.Listrik', 'R.Mekatronika ', 1, '', '2020-02-21 17:22:35', NULL),
(137, 2106079583, 'Modul Limit Switch', '', '', '', '', '1 buah', 'Lab.Listrik', 'R.Mekatronika ', 1, '', '2020-02-21 17:22:35', NULL),
(138, 2106079583, 'Modul Speed Control', '', '', '', '', '1 buah', 'Lab.Listrik', 'R.Mekatronika ', 1, '', '2020-02-21 17:22:35', NULL),
(139, 2106079583, 'Modul Single Cylinder Acting', '', '', '', '', '1 buah', 'Lab.Listrik', 'R.Mekatronika ', 1, '', '2020-02-21 17:22:35', NULL),
(140, 2106079583, 'Modul Double Cylinder', '', '', '', '', '1 buah', 'Lab.Listrik', 'R.Mekatronika ', 1, '', '2020-02-21 17:22:35', NULL),
(141, 2106079583, 'Modul Proximity Sensor PNP', '', '', '', '', '1 buah', 'Lab.Listrik', 'R.Mekatronika ', 2, '', '2020-02-21 17:22:35', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `email` varchar(100) NOT NULL,
  `username` varchar(55) NOT NULL,
  `password` varchar(255) CHARACTER SET utf8 NOT NULL,
  `level` int(11) NOT NULL,
  `created_at` datetime NOT NULL DEFAULT current_timestamp(),
  `updated_at` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `email`, `username`, `password`, `level`, `created_at`, `updated_at`) VALUES
(1, 'administrator@admin.com', 'administrator', '4194d1706ed1f408d5e02d672777019f4d5385c766a8c6ca8acba3167d36a7b9', 1, '2020-02-05 18:32:23', NULL),
(2, 'admin@admin.com', 'admin', '8c6976e5b5410415bde908bd4dee15dfb167a9c873fc4bb8a81f6f2ab448a918', 4, '2020-02-05 19:01:12', '2020-02-10 16:51:23');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `data_inventory`
--
ALTER TABLE `data_inventory`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `level`
--
ALTER TABLE `level`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `schedule`
--
ALTER TABLE `schedule`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `setting`
--
ALTER TABLE `setting`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `sub_data_inventory`
--
ALTER TABLE `sub_data_inventory`
  ADD PRIMARY KEY (`id`),
  ADD KEY `id_inventory` (`id_inventory`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `data_inventory`
--
ALTER TABLE `data_inventory`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=40;

--
-- AUTO_INCREMENT for table `level`
--
ALTER TABLE `level`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `schedule`
--
ALTER TABLE `schedule`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `setting`
--
ALTER TABLE `setting`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `sub_data_inventory`
--
ALTER TABLE `sub_data_inventory`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=142;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
