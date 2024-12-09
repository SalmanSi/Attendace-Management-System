-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Dec 09, 2024 at 08:36 PM
-- Server version: 10.4.32-MariaDB
-- PHP Version: 8.2.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `attendance_system`
--

-- --------------------------------------------------------

--
-- Table structure for table `attendance`
--

CREATE TABLE `attendance` (
  `classid` int(50) NOT NULL,
  `studentid` int(50) NOT NULL,
  `isPresent` tinyint(1) NOT NULL,
  `comments` varchar(200) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data for table `attendance`
--

INSERT INTO `attendance` (`classid`, `studentid`, `isPresent`, `comments`) VALUES
(1, 4, 1, 'Present'),
(1, 5, 0, 'Absent'),
(2, 6, 1, 'Present'),
(2, 7, 1, 'Present'),
(3, 8, 0, 'Absent'),
(3, 9, 1, 'Present'),
(4, 10, 1, 'Present'),
(4, 11, 1, 'Present'),
(1, 7, 1, ''),
(1, 10, 1, ''),
(4, 7, 1, ''),
(4, 10, 1, ''),
(3, 7, 1, ''),
(3, 12, 1, ''),
(1, 9, 1, ''),
(1, 11, 1, ''),
(2, 8, 1, ''),
(2, 12, 1, ''),
(2, 8, 1, ''),
(1, 8, 1, ''),
(1, 12, 1, '');

-- --------------------------------------------------------

--
-- Table structure for table `class`
--

CREATE TABLE `class` (
  `id` int(50) NOT NULL,
  `teacherid` int(50) NOT NULL,
  `starttime` time NOT NULL,
  `endtime` time NOT NULL,
  `credit_hours` int(11) NOT NULL,
  `date` date DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data for table `class`
--

INSERT INTO `class` (`id`, `teacherid`, `starttime`, `endtime`, `credit_hours`, `date`) VALUES
(1, 101, '09:00:00', '10:30:00', 3, '2024-12-03'),
(2, 102, '11:00:00', '12:30:00', 3, '2024-12-08'),
(3, 103, '14:00:00', '15:30:00', 2, '2024-12-17'),
(4, 101, '16:00:00', '17:30:00', 3, '2024-12-11');

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE `user` (
  `id` int(50) NOT NULL,
  `fullname` varchar(200) NOT NULL,
  `email` varchar(200) NOT NULL,
  `class` varchar(10) NOT NULL,
  `role` enum('teacher','student','admin') NOT NULL,
  `password` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`id`, `fullname`, `email`, `class`, `role`, `password`) VALUES
(7, 'Salman', 'salman@admin', '', 'admin', 'admin'),
(8, 'Eve White', 'evewhite@example.com', 'CS101', 'student', 'student123'),
(9, 'Charlie Green', 'charliegreen@example.com', 'MATH101', 'student', NULL),
(10, 'Daniel Clark', 'danielclark@example.com', 'MATH101', 'student', 'student123'),
(11, 'Grace Adams', 'graceadams@example.com', 'ENG101', 'student', NULL),
(12, 'Tom King', 'tomking@example.com', 'ENG101', 'student', 'student123'),
(101, 'John Doe', 'johndoe@example.com', 'CS101', 'teacher', 'teacher123'),
(102, 'Jane Smith', 'janesmith@example.com', 'MATH101', 'teacher', 'teacher123'),
(103, 'Alice Brown', 'alicebrown@example.com', 'ENG101', 'teacher', 'teacher123'),
(105, 'test user', 'test@teacher', 'cs101', 'teacher', '$2y$10$POkS1T1S.aq.MYGWPsEtauzoS2iGghGosUNf.QbDD.1klCkvOjeVq'),
(106, 'test user', 'test@teacher', 'cs101', 'teacher', 'test'),
(107, 'test user', 'test@teacher', 'cs101', 'teacher', 'test'),
(108, 'test user', 'test@teacher', 'cs101', 'teacher', 'test');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `class`
--
ALTER TABLE `class`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `user`
--
ALTER TABLE `user`
  MODIFY `id` int(50) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=109;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
