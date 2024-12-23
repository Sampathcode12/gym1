-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Nov 17, 2024 at 07:53 PM
-- Server version: 10.4.32-MariaDB
-- PHP Version: 8.0.30

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `gym`
--

-- --------------------------------------------------------

--
-- Table structure for table `blog`
--

CREATE TABLE `blog` (
  `B_id` int(35) NOT NULL,
  `Blog_name` varchar(20) NOT NULL,
  `Blog_post` text NOT NULL,
  `Submit_user_name` varchar(15) NOT NULL,
  `Submit_date` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf32 COLLATE=utf32_unicode_520_ci;

--
-- Dumping data for table `blog`
--

INSERT INTO `blog` (`B_id`, `Blog_name`, `Blog_post`, `Submit_user_name`, `Submit_date`) VALUES
(11, '', '', '', '0000-00-00');

-- --------------------------------------------------------

--
-- Table structure for table `bookings`
--

CREATE TABLE `bookings` (
  `B_id` int(20) NOT NULL,
  `class_name` varchar(30) NOT NULL,
  `booking_date` date NOT NULL,
  `booking_time` varchar(8) NOT NULL,
  `user_name` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf32 COLLATE=utf32_unicode_520_ci;

--
-- Dumping data for table `bookings`
--

INSERT INTO `bookings` (`B_id`, `class_name`, `booking_date`, `booking_time`, `user_name`) VALUES
(1, 'yoga', '2024-11-07', '16:08', 'Admin'),
(6, 'yoga', '2024-11-28', '18:33', 'sampath');

-- --------------------------------------------------------

--
-- Table structure for table `classtb`
--

CREATE TABLE `classtb` (
  `Cid` int(20) NOT NULL,
  `Cname` varchar(20) NOT NULL,
  `date` date NOT NULL,
  `time` varchar(20) NOT NULL,
  `Trainer_name` varchar(20) NOT NULL,
  `description` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf32 COLLATE=utf32_unicode_520_ci;

--
-- Dumping data for table `classtb`
--

INSERT INTO `classtb` (`Cid`, `Cname`, `date`, `time`, `Trainer_name`, `description`) VALUES
(1, '', '0000-00-00', '', '', ''),
(11, 'yoga', '0000-00-00', '', '', '');

-- --------------------------------------------------------

--
-- Table structure for table `login`
--

CREATE TABLE `login` (
  `User_email` varchar(20) NOT NULL,
  `U_password` varchar(12) NOT NULL,
  `user_type` varchar(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf32 COLLATE=utf32_unicode_520_ci;

--
-- Dumping data for table `login`
--

INSERT INTO `login` (`User_email`, `U_password`, `user_type`) VALUES
('amalParera@gmail.com', '123', ''),
('amarasiri@gmail.com', '123', 'Staff'),
('samantha123@gmail.co', '123', 'Customer'),
('user@gmail.com', '123', '');

-- --------------------------------------------------------

--
-- Table structure for table `packages`
--

CREATE TABLE `packages` (
  `package_id` int(11) NOT NULL,
  `package_name` varchar(30) NOT NULL,
  `price` int(100) NOT NULL,
  `duration_days` int(11) NOT NULL,
  `features` text DEFAULT NULL,
  `description` text DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf32 COLLATE=utf32_unicode_520_ci;

--
-- Dumping data for table `packages`
--

INSERT INTO `packages` (`package_id`, `package_name`, `price`, `duration_days`, `features`, `description`) VALUES
(1, 'not select package N', 0, 0, NULL, NULL),
(2, 'cardio', 100, 45, '', '');

-- --------------------------------------------------------

--
-- Table structure for table `tblfeedback`
--

CREATE TABLE `tblfeedback` (
  `Id` int(10) NOT NULL,
  `F_note` varchar(500) NOT NULL,
  `U_name` varchar(12) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf32 COLLATE=utf32_unicode_520_ci;

-- --------------------------------------------------------

--
-- Table structure for table `trainers`
--

CREATE TABLE `trainers` (
  `T_id` int(50) NOT NULL,
  `email` varchar(25) NOT NULL,
  `Trainer_name` varchar(15) NOT NULL,
  `Trainer_ex_year` varchar(8) NOT NULL,
  `Trainer_spetial` varchar(10) NOT NULL,
  `Number` varchar(12) NOT NULL,
  `expertise_path` varchar(15) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf32 COLLATE=utf32_unicode_520_ci;

--
-- Dumping data for table `trainers`
--

INSERT INTO `trainers` (`T_id`, `email`, `Trainer_name`, `Trainer_ex_year`, `Trainer_spetial`, `Number`, `expertise_path`) VALUES
(1, 'sampatmeeall@gmail.com', 'sampath', '9', '88', '90', 'yyyy'),
(3, 'sampatmeeall@gmail.com', 'sampath', '', '', '', ' '),
(4, 'sampatmeeall@gmail.com', 'sampath', '', '', '', ' ');

-- --------------------------------------------------------

--
-- Table structure for table `user_info`
--

CREATE TABLE `user_info` (
  `Use_name` varchar(20) NOT NULL,
  `User_email` varchar(25) NOT NULL,
  `Address` varchar(15) NOT NULL,
  `Contact` int(12) NOT NULL,
  `Birthday` date NOT NULL,
  `user_type` varchar(11) NOT NULL,
  `package_name` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf32 COLLATE=utf32_unicode_520_ci;

--
-- Dumping data for table `user_info`
--

INSERT INTO `user_info` (`Use_name`, `User_email`, `Address`, `Contact`, `Birthday`, `user_type`, `package_name`) VALUES
('amal', 'Amal@gmail.com', 'www', 0, '2024-11-12', 'Customer', 'hhhh'),
('amarasiry', 'amarasiri@gmail.com', 'mathara', 11, '2024-11-08', 'Staff', 'not select package N'),
('samantha', 'samantha123@gmail.com', 'colombo', 666666666, '2000-01-09', 'Customer', 'Yoga');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `blog`
--
ALTER TABLE `blog`
  ADD PRIMARY KEY (`B_id`);

--
-- Indexes for table `bookings`
--
ALTER TABLE `bookings`
  ADD PRIMARY KEY (`B_id`);

--
-- Indexes for table `classtb`
--
ALTER TABLE `classtb`
  ADD PRIMARY KEY (`Cid`);

--
-- Indexes for table `login`
--
ALTER TABLE `login`
  ADD PRIMARY KEY (`User_email`);

--
-- Indexes for table `packages`
--
ALTER TABLE `packages`
  ADD PRIMARY KEY (`package_id`),
  ADD UNIQUE KEY `package_name` (`package_name`);

--
-- Indexes for table `tblfeedback`
--
ALTER TABLE `tblfeedback`
  ADD PRIMARY KEY (`Id`);

--
-- Indexes for table `trainers`
--
ALTER TABLE `trainers`
  ADD PRIMARY KEY (`T_id`);

--
-- Indexes for table `user_info`
--
ALTER TABLE `user_info`
  ADD PRIMARY KEY (`Use_name`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `blog`
--
ALTER TABLE `blog`
  MODIFY `B_id` int(35) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- AUTO_INCREMENT for table `bookings`
--
ALTER TABLE `bookings`
  MODIFY `B_id` int(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `classtb`
--
ALTER TABLE `classtb`
  MODIFY `Cid` int(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT for table `packages`
--
ALTER TABLE `packages`
  MODIFY `package_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `tblfeedback`
--
ALTER TABLE `tblfeedback`
  MODIFY `Id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `trainers`
--
ALTER TABLE `trainers`
  MODIFY `T_id` int(50) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
