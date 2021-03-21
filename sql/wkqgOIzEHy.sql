-- phpMyAdmin SQL Dump
-- version 4.8.5
-- https://www.phpmyadmin.net/
--
-- Host: localhost
-- Generation Time: Mar 21, 2021 at 09:25 AM
-- Server version: 8.0.13-4
-- PHP Version: 7.2.24-0ubuntu0.18.04.7

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `wkqgOIzEHy`
--

-- --------------------------------------------------------

--
-- Table structure for table `admin`
--

CREATE TABLE `admin` (
  `id` int(11) NOT NULL,
  `username` varchar(50) NOT NULL,
  `password` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `admin`
--

INSERT INTO `admin` (`id`, `username`, `password`) VALUES
(1, 'shrikant', 'asd');

-- --------------------------------------------------------

--
-- Table structure for table `attendance`
--

CREATE TABLE `attendance` (
  `emp_id` varchar(20) COLLATE utf8_unicode_ci DEFAULT NULL,
  `date` date DEFAULT NULL,
  `time` time DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `attendance`
--

INSERT INTO `attendance` (`emp_id`, `date`, `time`) VALUES
('S730', '2021-03-21', '14:09:50'),
('S932', '2021-03-21', '14:10:03'),
('S932', '2021-03-21', '14:13:22'),
('S730', '2021-03-21', '14:13:33'),
('S730', '2021-03-21', '14:28:47'),
('S730', '2021-03-21', '14:30:54');

-- --------------------------------------------------------

--
-- Table structure for table `dummy_data`
--

CREATE TABLE `dummy_data` (
  `id` int(11) NOT NULL,
  `emp_id` varchar(255) NOT NULL,
  `date` date NOT NULL,
  `month` int(11) NOT NULL,
  `year` int(11) NOT NULL,
  `time` time NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `dummy_data`
--

INSERT INTO `dummy_data` (`id`, `emp_id`, `date`, `month`, `year`, `time`) VALUES
(61, 'S730', '2021-03-16', 3, 2021, '07:00:00'),
(62, 'S932', '2021-03-16', 3, 2021, '07:00:32'),
(63, 'S730', '2021-03-16', 3, 2021, '13:05:00'),
(64, 'S932', '2021-03-16', 3, 2021, '14:00:32'),
(65, 'S730', '2021-03-16', 3, 2021, '14:15:00'),
(66, 'S932', '2021-03-16', 3, 2021, '14:00:32'),
(67, 'S730', '2021-03-16', 3, 2021, '17:12:43'),
(68, 'S932', '2021-03-16', 3, 2021, '17:20:23'),
(69, 'S730', '2021-03-17', 3, 2021, '07:03:00'),
(70, 'S730', '2021-03-17', 3, 2021, '14:20:32'),
(71, 'S730', '2021-03-17', 3, 2021, '15:15:00'),
(72, 'S730', '2021-03-17', 3, 2021, '17:20:23');

-- --------------------------------------------------------

--
-- Table structure for table `leaves`
--

CREATE TABLE `leaves` (
  `srno` int(11) NOT NULL,
  `Staff_ID` varchar(100) NOT NULL,
  `Leave_Type` varchar(100) NOT NULL,
  `StartDate` date NOT NULL,
  `EndDate` date NOT NULL,
  `StartTime` time NOT NULL,
  `EndTime` time NOT NULL,
  `Reason` varchar(100) NOT NULL,
  `Status` varchar(50) NOT NULL,
  `Date/Time` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `leaves`
--

INSERT INTO `leaves` (`srno`, `Staff_ID`, `Leave_Type`, `StartDate`, `EndDate`, `StartTime`, `EndTime`, `Reason`, `Status`) VALUES
(6, 'S730', 'whole', '2021-02-28', '0000-00-00', '00:00:00', '00:00:00', 'xyz', 'pending'),
(7, 'S730', 'whole', '2021-03-01', '0000-00-00', '00:00:00', '00:00:00', 'ghsdg', 'pending'),
(8, 'S730', 'whole', '2021-03-10', '0000-00-00', '00:00:00', '00:00:00', 'hgjgj', 'pending');

-- --------------------------------------------------------

--
-- Table structure for table `staff`
--

CREATE TABLE `staff` (
  `id` int(10) NOT NULL,
  `staff_id` varchar(10) DEFAULT NULL,
  `firstname` varchar(20) NOT NULL,
  `lastname` varchar(20) NOT NULL,
  `address` text NOT NULL,
  `dob` date NOT NULL,
  `gender` varchar(10) NOT NULL,
  `email` varchar(50) NOT NULL,
  `phone` varchar(10) NOT NULL,
  `position` varchar(15) NOT NULL,
  `sal` varchar(10) NOT NULL,
  `photo` varchar(500) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `staff`
--

INSERT INTO `staff` (`id`, `staff_id`, `firstname`, `lastname`, `address`, `dob`, `gender`, `email`, `phone`, `position`, `sal`, `photo`) VALUES
(10, 'S730', 'Shrikant', 'pandhekar', 'cidco', '2021-02-01', 'Male', 'pandhekar.shrikant@gmail.com', '7028357194', 'Empolyee', '120000', 'SS.JPG.JPG'),
(11, 'S932', 'asd', 'pandhekar', 'sadasd', '2021-02-06', 'Male', 'pandhekar.shrikant@gmail.com', '1231232132', 'Empolyee', '21123213', 'Capture.JPG.JPG');

-- --------------------------------------------------------

--
-- Table structure for table `staffsalary`
--

CREATE TABLE `staffsalary` (
  `id` int(11) NOT NULL,
  `staff_id` varchar(10) NOT NULL,
  `salary` bigint(10) NOT NULL,
  `pfpercent` int(10) NOT NULL,
  `netsal` bigint(7) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `staffsalary`
--

INSERT INTO `staffsalary` (`id`, `staff_id`, `salary`, `pfpercent`, `netsal`) VALUES
(2, '123', 5000, 10, 4500),
(4, '124', 50000, 12, 44000),
(6, '123', 30000, 10, 27000),
(10, '124', 50000, 14, 43000),
(12, '123', 30000, 14, 25800),
(13, '123', 30000, 14, 25800),
(14, 'S730', 12000, 15, 10200),
(15, 'S730', 12000, 15, 10200),
(16, 'S730', 12000, 15, 10200),
(17, 'S730', 12000, 15, 10200),
(18, 'S730', 12000, 15, 10200),
(19, 'S730', 12000, 15, 10200),
(20, 'S730', 12000, 15, 10200),
(21, 'S730', 12000, 15, 10200),
(22, 'S730', 12000, 15, 10200),
(23, 'S730', 12000, 15, 10200),
(24, 'S730', 12000, 15, 10200),
(25, 'S730', 12000, 15, 10200),
(26, 'S730', 12000, 15, 10200),
(27, 'S730', 12000, 15, 10200),
(28, 'S730', 12000, 15, 10200),
(29, 'S730', 12000, 15, 10200),
(30, 'S730', 0, 15, 0),
(31, 'S730', 120000, 15, 102000),
(32, 'S730', 120000, 15, 102000),
(33, 'S730', 120000, 15, 102000),
(34, 'S730', 120000, 15, 102000),
(35, 'S730', 12000, 15, 10200),
(36, 'S730', 12000, 15, 10200),
(37, 'S730', 12000, 15, 10200),
(38, 'S730', 12000, 15, 10200),
(39, 'S730', 12000, 15, 10200),
(40, 'S730', 120000, 15, 102000),
(41, 'S730', 120000, 15, 102000),
(42, 'S730', 120000, 14, 103200),
(43, 'S730', 120000, 15, 102000),
(44, 'S730', 120000, 15, 102000);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admin`
--
ALTER TABLE `admin`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `dummy_data`
--
ALTER TABLE `dummy_data`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `leaves`
--
ALTER TABLE `leaves`
  ADD PRIMARY KEY (`srno`);

--
-- Indexes for table `staff`
--
ALTER TABLE `staff`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `staff_id` (`staff_id`);

--
-- Indexes for table `staffsalary`
--
ALTER TABLE `staffsalary`
  ADD PRIMARY KEY (`id`,`staff_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `admin`
--
ALTER TABLE `admin`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `leaves`
--
ALTER TABLE `leaves`
  MODIFY `srno` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `staff`
--
ALTER TABLE `staff`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT for table `staffsalary`
--
ALTER TABLE `staffsalary`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=45;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
