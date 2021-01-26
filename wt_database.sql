-- phpMyAdmin SQL Dump
-- version 5.0.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jan 26, 2021 at 01:30 PM
-- Server version: 10.4.11-MariaDB
-- PHP Version: 7.4.3

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `wt_database`
--

-- --------------------------------------------------------

--
-- Table structure for table `book`
--

CREATE TABLE `book` (
  `id` int(255) NOT NULL,
  `Username` varchar(30) NOT NULL,
  `Fname` varchar(30) NOT NULL,
  `Gender` varchar(10) NOT NULL,
  `CID` int(5) NOT NULL,
  `DID` int(5) NOT NULL,
  `DOV` date NOT NULL,
  `Timestamp` datetime NOT NULL,
  `Status` varchar(100) NOT NULL,
  `ride_status` int(255) DEFAULT NULL,
  `ride_id` int(255) DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `book`
--

INSERT INTO `book` (`id`, `Username`, `Fname`, `Gender`, `CID`, `DID`, `DOV`, `Timestamp`, `Status`, `ride_status`, `ride_id`) VALUES
(1, 'user', 'patient', 'male', 1, 1, '2017-11-08', '2017-11-05 16:43:48', 'lol', NULL, NULL),
(2, 'user', 'saya', 'female', 1, 1, '2021-01-21', '2021-01-14 19:24:41', 'apo?', NULL, NULL),
(3, 'silz', 'asilah', 'female', 1, 1, '2021-01-21', '2021-01-14 20:52:53', 'Cancelled by Patient', NULL, NULL),
(4, 'silz', 'Sharifah Nur Asilah ', 'female', 1, 1, '2021-01-19', '2021-01-14 23:02:16', 'Cancelled by Patient', NULL, NULL),
(5, 'lololol', 'Shahira Izwanie Sinan', 'female', 1, 1, '2021-01-25', '2021-01-24 17:11:53', 'Not Available', NULL, NULL),
(6, 'lololol', 'Eileena Ariffin Soon', 'female', 2, 3, '2021-01-27', '2021-01-24 17:17:48', 'Booking Registered.Wait for the update', NULL, NULL),
(7, 'lololol', 'Eileena Ariffin Soon', 'female', 2, 3, '2021-01-26', '2021-01-24 18:44:14', 'Booking Registered.Wait for the update', NULL, NULL),
(8, 'lololol', 'Molly', 'female', 2, 3, '2021-01-28', '2021-01-24 18:56:47', 'Booking Registered.Wait for the update', NULL, NULL),
(9, 'lololol', 'Molly', 'female', 2, 3, '2021-01-28', '2021-01-24 18:58:19', 'Booking Registered.Wait for the update', NULL, NULL),
(10, 'lololol', 'Chubby', 'male', 1, 1, '2021-01-27', '2021-01-24 18:58:59', 'Booking Registered.Wait for the update', NULL, NULL),
(11, 'lololol', 'Bagheera', 'male', 2, 3, '2021-01-27', '2021-01-24 19:04:07', 'Booking Registered.Wait for the update', NULL, NULL),
(12, 'lololol', 'Bagheera', 'male', 2, 3, '2021-01-25', '2021-01-24 19:34:21', 'Booking Registered.Wait for the update', NULL, NULL),
(13, 'lololol', 'Bagheera', 'male', 2, 3, '2021-01-25', '2021-01-24 19:37:40', 'Booking Registered.Wait for the update', NULL, NULL),
(14, 'lololol', 'Arisya', 'female', 2, 3, '2021-01-28', '2021-01-24 19:38:04', 'Booking Registered.Wait for the update', NULL, NULL),
(44, 'jieun', 'Sharifah Nur Asilah ', 'female', 2, 3, '2021-01-28', '2021-01-26 10:38:42', 'Booking Registered.Wait for the update', 1, 136),
(43, 'jieun', 'Lee Ji Eun', 'female', 2, 3, '2021-01-27', '2021-01-26 10:35:53', 'Booking Registered.Wait for the update', 1, 135),
(45, 'jieun', 'Lee Ji Eun', 'female', 2, 3, '2021-01-28', '2021-01-26 11:49:35', 'Booking Registered.Wait for the update', 1, 137),
(46, 'silz', 'Sharifah Nur Asilah ', 'female', 2, 3, '2021-01-27', '2021-01-26 11:54:48', 'Booking Registered.Wait for the update', 1, 138);

-- --------------------------------------------------------

--
-- Table structure for table `clinic`
--

CREATE TABLE `clinic` (
  `cid` int(11) NOT NULL,
  `name` varchar(30) NOT NULL,
  `address` varchar(100) NOT NULL,
  `town` varchar(30) NOT NULL,
  `city` varchar(30) NOT NULL,
  `contact` bigint(20) NOT NULL,
  `mid` varchar(5) DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `clinic`
--

INSERT INTO `clinic` (`cid`, `name`, `address`, `town`, `city`, `contact`, `mid`) VALUES
(1, 'Clinic', 'XYZ apartment, CST', 'CST', 'Mumbai', 9999988888, '1'),
(2, 'Klinik Pelangi', '49 Jalan Lembah 4', 'Bandar Seri Alam', 'Johor', 1110742106, ''),
(4, 'Klinik Penawar', 'Jalan Perling 9 ', 'Cheras', 'Kuala Lumpur', 25267637, ''),
(5, 'Klinik K.J. Lim', ' Jalan Prima SG 3/2, Prima Seri Gombak, 68100 Batu Caves, Selangor', 'Gombak', 'Selangor', 123456789, '2');

-- --------------------------------------------------------

--
-- Table structure for table `doctor`
--

CREATE TABLE `doctor` (
  `did` int(11) NOT NULL,
  `name` varchar(30) NOT NULL,
  `gender` varchar(30) NOT NULL,
  `dob` date NOT NULL,
  `experience` int(11) NOT NULL,
  `specialization` varchar(30) NOT NULL,
  `contact` bigint(20) NOT NULL,
  `address` varchar(100) NOT NULL,
  `username` varchar(30) NOT NULL,
  `password` varchar(30) NOT NULL,
  `region` varchar(30) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `doctor`
--

INSERT INTO `doctor` (`did`, `name`, `gender`, `dob`, `experience`, `specialization`, `contact`, `address`, `username`, `password`, `region`) VALUES
(1, 'doctor', 'male', '1980-01-01', 10, 'Orthodontist', 9999999999, 'XYZ tower, CST', 'doctor', 'doctor', 'Mumbai'),
(3, 'Aminah', 'female', '2021-01-02', 2, 'hahahaha', 75768574, '49 Jalan Lembah 4, Bandar Seri Alam', 'aminah', '1234567890', 'Johor'),
(4, 'Salmah', 'female', '2021-01-06', 10, 'hahaha', 9102838273, 'Johor Bahru', 'salmah', '1234567890', 'Johor'),
(5, 'Eileena', 'female', '1998-02-04', 10, 'Neurologists', 145216585, 'No 43 Jalan 13/23B', 'eileenasoo', '$2y$10$IdcoBODBHMwGfKNugia8lOO', 'Kuala Lumpur'),
(6, 'Ali bin Abu', 'male', '2000-01-01', 10, 'Allergists', 145216585, 'No 43 Jalan 13/23B', 'user1', '$2y$10$7oIL/Um9pmoOd8KWgMAu8eQ', 'Kuala Lumpur');

-- --------------------------------------------------------

--
-- Table structure for table `doctor_availability`
--

CREATE TABLE `doctor_availability` (
  `cid` int(11) NOT NULL,
  `did` int(11) NOT NULL,
  `day` varchar(50) NOT NULL,
  `starttime` time NOT NULL,
  `endtime` time NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `doctor_availability`
--

INSERT INTO `doctor_availability` (`cid`, `did`, `day`, `starttime`, `endtime`) VALUES
(1, 1, 'Friday', '14:00:00', '18:00:00'),
(1, 1, 'Monday', '14:00:00', '18:00:00'),
(1, 1, 'Thursday', '14:00:00', '18:00:00'),
(1, 1, 'Tuesday', '06:21:00', '00:23:00'),
(1, 1, 'Tuesday', '14:00:00', '18:00:00'),
(1, 1, 'Wednesday', '06:21:00', '00:23:00'),
(1, 1, 'Wednesday', '14:00:00', '18:00:00'),
(2, 3, 'Thursday', '10:00:00', '22:00:00'),
(2, 3, 'Tuesday', '10:00:00', '22:00:00'),
(2, 3, 'Wednesday', '10:00:00', '22:00:00'),
(4, 0, 'Friday', '10:00:00', '10:00:00'),
(4, 0, 'Monday', '10:00:00', '10:00:00'),
(4, 0, 'Thursday', '10:00:00', '10:00:00'),
(4, 0, 'Tuesday', '10:00:00', '10:00:00'),
(4, 0, 'Wednesday', '10:00:00', '10:00:00');

-- --------------------------------------------------------

--
-- Table structure for table `location`
--

CREATE TABLE `location` (
  `id` int(11) NOT NULL,
  `city` varchar(50) NOT NULL,
  `name` varchar(50) NOT NULL,
  `distance` varchar(50) NOT NULL,
  `total_fare` varchar(50) NOT NULL,
  `is_available` tinyint(4) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `location`
--

INSERT INTO `location` (`id`, `city`, `name`, `distance`, `total_fare`, `is_available`) VALUES
(6, 'Kuala Lumpur', 'Cheras', '1', '3', 1),
(7, 'Kuala Lumpur', 'Petaling Jaya', '20', '15', 1),
(8, 'Kuala Lumpur', 'Bangsar', '10', '10', 1),
(9, 'Kuala Lumpur', 'Ampang', '26', '26', 1);

-- --------------------------------------------------------

--
-- Table structure for table `manager`
--

CREATE TABLE `manager` (
  `mid` int(11) NOT NULL,
  `name` varchar(30) NOT NULL,
  `gender` varchar(30) NOT NULL,
  `dob` date NOT NULL,
  `contact` bigint(20) NOT NULL,
  `address` varchar(100) NOT NULL,
  `username` varchar(30) NOT NULL,
  `password` varchar(30) NOT NULL,
  `region` varchar(30) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `manager`
--

INSERT INTO `manager` (`mid`, `name`, `gender`, `dob`, `contact`, `address`, `username`, `password`, `region`) VALUES
(1, 'Manager', 'male', '1990-01-01', 8888899999, 'XYZ complex CST', 'manager', 'manager', 'Mumbai'),
(2, 'Arisya Athilah', 'female', '1998-07-17', 145216585, 'Jalan 1/A Gombak', 'arisya', '$2y$10$JzXFqa/iHbZe/HkUY4YKqu1', 'Selangor');

-- --------------------------------------------------------

--
-- Table structure for table `manager_clinic`
--

CREATE TABLE `manager_clinic` (
  `cid` int(11) NOT NULL,
  `mid` int(11) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `manager_clinic`
--

INSERT INTO `manager_clinic` (`cid`, `mid`) VALUES
(1, 1),
(5, 2);

-- --------------------------------------------------------

--
-- Table structure for table `patient`
--

CREATE TABLE `patient` (
  `name` varchar(30) NOT NULL,
  `gender` varchar(30) NOT NULL,
  `dob` date NOT NULL,
  `contact` bigint(20) NOT NULL,
  `email` varchar(30) NOT NULL,
  `username` varchar(20) NOT NULL,
  `password` varchar(20) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `patient`
--

INSERT INTO `patient` (`name`, `gender`, `dob`, `contact`, `email`, `username`, `password`) VALUES
('user', 'male', '1985-01-01', 7897897897, 'user@test.com', 'user', 'user'),
('amirah', 'female', '2021-01-23', 110742106, 'amirahrozey@gmail.com', 'amirahhhh', '1234567890'),
('shahira', 'female', '2021-01-01', 110982921, 'sheraax1998@gmail.com', 'sheralol', '1234567890'),
('Sharifah Nur Asilah ', 'female', '2021-01-16', 1110742106, 'asilah2110@gmail.com', 'silzzzz', '$2y$10$HA3iPwC2jVpm5'),
('Eileena Soon', 'female', '2021-01-20', 1110742106, 'cashier@rezeipt.online', 'lololol', '$2y$10$VJQUOLfZ7tmAt'),
('Lee Ji Eun', 'female', '1993-05-16', 1110742106, 'iu@naver.com', 'jieun', '$2y$10$WSEF8QR//GvLV'),
('Aminah Wahab', 'female', '2021-01-26', 1110742106, 'cashier@rezeipt.online', 'aminahwaha', '$2y$10$dNIGalR2oClbn');

-- --------------------------------------------------------

--
-- Table structure for table `ride`
--

CREATE TABLE `ride` (
  `id` int(11) NOT NULL,
  `ride_date` varchar(20) NOT NULL,
  `from_distance` varchar(50) NOT NULL,
  `to_distance` varchar(50) NOT NULL,
  `cab_type` varchar(20) NOT NULL,
  `total_distance` varchar(50) NOT NULL,
  `total_fare` varchar(50) NOT NULL,
  `status` int(11) NOT NULL,
  `username` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `ride`
--

INSERT INTO `ride` (`id`, `ride_date`, `from_distance`, `to_distance`, `cab_type`, `total_distance`, `total_fare`, `status`, `username`) VALUES
(132, '2021-01-26 03:01', 'Ampang', 'Cheras', 'CedRoyal', '26', '18.7', 1, ''),
(133, '2021-01-26 03:02', 'Ampang', 'Cheras', 'CedMicro', '26', '9.5', 1, ''),
(134, '2021-01-26 03:04', 'Ampang', 'Cheras', 'CedMicro', '26', '9.5', 1, ''),
(135, '2021-01-26 03:06', 'Ampang', 'Cheras', 'CedSUV', '26', '18.7', 1, 'amirahhhh'),
(136, '2021-01-26 03:08', 'Ampang', 'Cheras', 'CedMini', '26', '14.8', 2, 'jieun'),
(137, '2021-01-26 04:19', 'Ampang', 'Cheras', 'CedMini', '26', '14.8', 2, 'jieun'),
(138, '2021-01-26 04:24', 'Ampang', 'Cheras', 'CedRoyal', '26', '18.7', 2, 'sheralol');

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE `user` (
  `id` int(255) NOT NULL,
  `username` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `role` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`id`, `username`, `password`, `role`) VALUES
(1, 'silz', '$2y$10$8en/vx9kbGQIugfdqiLnYOGDs4RZ3xJB2HTs1tLqhOsDEMIZcJsqS', 1),
(2, 'admin', '$2y$10$8en/vx9kbGQIugfdqiLnYOGDs4RZ3xJB2HTs1tLqhOsDEMIZcJsqS', 3),
(3, 'manager', '$2y$10$8en/vx9kbGQIugfdqiLnYOGDs4RZ3xJB2HTs1tLqhOsDEMIZcJsqS', 2),
(4, 'amirahhhh', '1234567890', 1),
(5, 'sheralol', '1234567890', 1),
(6, 'aminah', '1234567890', 3),
(7, 'salmah', '1234567890', 3),
(8, 'lololol', '$2y$10$VJQUOLfZ7tmAtWF4bi.56ulP.RXqQ0PlAwZ4gqwbX9Tm.LZPDdXDi', 1),
(9, 'eileenasoo', '$2y$10$IdcoBODBHMwGfKNugia8lOOUEhZiBeQ/4UagOFWglBN5DkArLF.jm', 3),
(10, 'user1', '$2y$10$7oIL/Um9pmoOd8KWgMAu8eQIdE3Gw4NtZUsbQ/l1bBeAwjsgvHyIi', 3),
(11, 'arisya', '$2y$10$JzXFqa/iHbZe/HkUY4YKqu1ZAGpPnuI7996MlwZwAbN1jxGKnYIIq', 2),
(12, 'jieun', '$2y$10$WSEF8QR//GvLVNdXwhPQNe.hKP3RqUV3dk4CVyhM7YcPTuha6R4UG', 1),
(13, 'aminahwaha', '$2y$10$dNIGalR2oClbnzUlyAscn.WIaIQOpQrW2lV72QN5DmytdFbEcRu0y', 1);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `book`
--
ALTER TABLE `book`
  ADD PRIMARY KEY (`id`),
  ADD KEY `ride_id` (`ride_id`);

--
-- Indexes for table `clinic`
--
ALTER TABLE `clinic`
  ADD PRIMARY KEY (`cid`,`name`);

--
-- Indexes for table `doctor`
--
ALTER TABLE `doctor`
  ADD PRIMARY KEY (`did`);

--
-- Indexes for table `doctor_availability`
--
ALTER TABLE `doctor_availability`
  ADD PRIMARY KEY (`cid`,`did`,`day`,`starttime`,`endtime`);

--
-- Indexes for table `location`
--
ALTER TABLE `location`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `manager`
--
ALTER TABLE `manager`
  ADD PRIMARY KEY (`mid`);

--
-- Indexes for table `manager_clinic`
--
ALTER TABLE `manager_clinic`
  ADD PRIMARY KEY (`cid`,`mid`);

--
-- Indexes for table `patient`
--
ALTER TABLE `patient`
  ADD PRIMARY KEY (`email`,`username`);

--
-- Indexes for table `ride`
--
ALTER TABLE `ride`
  ADD PRIMARY KEY (`id`),
  ADD KEY `username` (`username`);

--
-- Indexes for table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `book`
--
ALTER TABLE `book`
  MODIFY `id` int(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=47;

--
-- AUTO_INCREMENT for table `clinic`
--
ALTER TABLE `clinic`
  MODIFY `cid` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `doctor`
--
ALTER TABLE `doctor`
  MODIFY `did` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `location`
--
ALTER TABLE `location`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `manager`
--
ALTER TABLE `manager`
  MODIFY `mid` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `ride`
--
ALTER TABLE `ride`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=139;

--
-- AUTO_INCREMENT for table `user`
--
ALTER TABLE `user`
  MODIFY `id` int(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=22;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
