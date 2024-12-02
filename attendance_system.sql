-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Dec 02, 2024 at 07:06 PM
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
(4, 10, 1, '');

-- --------------------------------------------------------

--
-- Table structure for table `class`
--

CREATE TABLE `class` (
  `id` int(50) NOT NULL,
  `teacherid` int(50) NOT NULL,
  `starttime` time NOT NULL,
  `endtime` time NOT NULL,
  `credit_hours` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data for table `class`
--

INSERT INTO `class` (`id`, `teacherid`, `starttime`, `endtime`, `credit_hours`) VALUES
(1, 101, '09:00:00', '10:30:00', 3),
(2, 102, '11:00:00', '12:30:00', 3),
(3, 103, '14:00:00', '15:30:00', 2),
(4, 101, '16:00:00', '17:30:00', 3);

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE `user` (
  `id` int(50) NOT NULL,
  `fullname` varchar(200) NOT NULL,
  `email` varchar(200) NOT NULL,
  `class` varchar(10) NOT NULL,
  `role` enum('teacher','student','admin') NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`id`, `fullname`, `email`, `class`, `role`) VALUES
(7, 'Bob Martin', 'bobmartin@example.com', 'CS101', 'student'),
(8, 'Eve White', 'evewhite@example.com', 'CS101', 'student'),
(9, 'Charlie Green', 'charliegreen@example.com', 'MATH101', 'student'),
(10, 'Daniel Clark', 'danielclark@example.com', 'MATH101', 'student'),
(11, 'Grace Adams', 'graceadams@example.com', 'ENG101', 'student'),
(12, 'Tom King', 'tomking@example.com', 'ENG101', 'student'),
(101, 'John Doe', 'johndoe@example.com', 'CS101', 'teacher'),
(102, 'Jane Smith', 'janesmith@example.com', 'MATH101', 'teacher'),
(103, 'Alice Brown', 'alicebrown@example.com', 'ENG101', 'teacher');

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
  MODIFY `id` int(50) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=105;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
