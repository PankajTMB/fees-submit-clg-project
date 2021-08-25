-- phpMyAdmin SQL Dump
-- version 5.0.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jun 14, 2021 at 01:19 PM
-- Server version: 10.4.13-MariaDB
-- PHP Version: 7.2.31

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `feessumbit`
--

-- --------------------------------------------------------

--
-- Table structure for table `fess_submit`
--

CREATE TABLE `fess_submit` (
  `id` int(20) NOT NULL,
  `deposite_fees` int(11) NOT NULL,
  `deposite_date_time` datetime NOT NULL DEFAULT current_timestamp(),
  `roll_no` int(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `fess_submit`
--

INSERT INTO `fess_submit` (`id`, `deposite_fees`, `deposite_date_time`, `roll_no`) VALUES
(20, 10000, '2021-06-14 16:46:18', 1000),
(21, 5000, '2021-06-14 16:47:16', 1000);

-- --------------------------------------------------------

--
-- Table structure for table `student_table`
--

CREATE TABLE `student_table` (
  `roll_no` varchar(10) NOT NULL,
  `name` varchar(25) NOT NULL,
  `gender` varchar(10) NOT NULL,
  `father_name` varchar(25) NOT NULL,
  `mother_name` varchar(25) NOT NULL,
  `email` varchar(50) NOT NULL,
  `number` varchar(15) NOT NULL,
  `number2` varchar(15) NOT NULL,
  `classname` varchar(10) NOT NULL,
  `classyear` varchar(10) NOT NULL,
  `addmision_date` datetime NOT NULL DEFAULT current_timestamp(),
  `total_fees` int(20) NOT NULL,
  `id` int(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `student_table`
--

INSERT INTO `student_table` (`roll_no`, `name`, `gender`, `father_name`, `mother_name`, `email`, `number`, `number2`, `classname`, `classyear`, `addmision_date`, `total_fees`, `id`) VALUES
('1000', 'Pankaj', 'male', 'Sh.Kailash Chander', 'Vijay Laxmi', 'pankajghorela511@gmail.com', '6284125224', '', 'BCA', 'year1', '2021-06-14 16:45:13', 40000, 70);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `fess_submit`
--
ALTER TABLE `fess_submit`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `student_table`
--
ALTER TABLE `student_table`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `fess_submit`
--
ALTER TABLE `fess_submit`
  MODIFY `id` int(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=22;

--
-- AUTO_INCREMENT for table `student_table`
--
ALTER TABLE `student_table`
  MODIFY `id` int(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=71;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
