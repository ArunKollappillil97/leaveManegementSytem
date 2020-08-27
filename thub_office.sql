-- phpMyAdmin SQL Dump
-- version 4.8.4
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jul 15, 2020 at 09:30 AM
-- Server version: 10.1.37-MariaDB
-- PHP Version: 7.3.1

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `thub_office`
--

-- --------------------------------------------------------

--
-- Table structure for table `tbl_designation`
--

CREATE TABLE `tbl_designation` (
  `designation_id` int(11) NOT NULL,
  `designation` varchar(100) NOT NULL,
  `active` char(1) NOT NULL DEFAULT 'Y'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_designation`
--

INSERT INTO `tbl_designation` (`designation_id`, `designation`, `active`) VALUES
(2, 'HR Manager', 'Y'),
(3, 'Staff', 'Y');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_leave`
--

CREATE TABLE `tbl_leave` (
  `leave_id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `leave_reason` text NOT NULL,
  `leave_type` varchar(50) NOT NULL,
  `leave_fromdate` date NOT NULL,
  `leave_todate` date NOT NULL,
  `status` char(1) NOT NULL DEFAULT 'Y',
  `applystatus` char(1) NOT NULL DEFAULT 'Y',
  `rejectstatus` char(1) NOT NULL DEFAULT 'Y',
  `added_on` date NOT NULL,
  `added_ip` varchar(100) NOT NULL,
  `modified_ip` varchar(100) NOT NULL,
  `modified_on` date NOT NULL,
  `active` char(1) NOT NULL DEFAULT 'Y'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `tbl_login`
--

CREATE TABLE `tbl_login` (
  `login_id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `user_type` int(1) NOT NULL,
  `user_name` varchar(100) NOT NULL,
  `password` varchar(100) NOT NULL,
  `added_on` date NOT NULL,
  `modified_on` date NOT NULL,
  `added_ip` varchar(100) NOT NULL,
  `modified_ip` varchar(100) NOT NULL,
  `active` char(1) NOT NULL DEFAULT 'Y'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_login`
--

INSERT INTO `tbl_login` (`login_id`, `user_id`, `user_type`, `user_name`, `password`, `added_on`, `modified_on`, `added_ip`, `modified_ip`, `active`) VALUES
(1, 1, 1, 'admin@gmail.com', '123456', '2020-07-12', '2020-07-12', '::1', '::1', 'Y');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_qualification`
--

CREATE TABLE `tbl_qualification` (
  `qualification_id` int(11) NOT NULL,
  `course` varchar(50) NOT NULL,
  `stream` varchar(50) NOT NULL,
  `added_on` date NOT NULL,
  `modified_on` date NOT NULL,
  `added_ip` varchar(50) NOT NULL,
  `modified_ip` varchar(50) NOT NULL,
  `active` char(1) NOT NULL DEFAULT 'Y'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `tbl_staff`
--

CREATE TABLE `tbl_staff` (
  `Staff_id` int(11) NOT NULL,
  `name` varchar(100) NOT NULL,
  `phone` bigint(10) NOT NULL,
  `email` varchar(100) NOT NULL,
  `address` text NOT NULL,
  `dob` date NOT NULL,
  `doj` date NOT NULL,
  `designation_id` int(11) NOT NULL,
  `university` varchar(100) NOT NULL,
  `course` varchar(100) NOT NULL,
  `stream` varchar(100) NOT NULL,
  `institution` varchar(100) NOT NULL,
  `yop` varchar(50) NOT NULL,
  `photo` varchar(100) NOT NULL,
  `added_on` date NOT NULL,
  `modified_on` date NOT NULL,
  `added_ip` varchar(100) NOT NULL,
  `modified_ip` varchar(100) NOT NULL,
  `active` char(1) NOT NULL DEFAULT 'Y'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `tbl_designation`
--
ALTER TABLE `tbl_designation`
  ADD PRIMARY KEY (`designation_id`);

--
-- Indexes for table `tbl_leave`
--
ALTER TABLE `tbl_leave`
  ADD PRIMARY KEY (`leave_id`);

--
-- Indexes for table `tbl_login`
--
ALTER TABLE `tbl_login`
  ADD PRIMARY KEY (`login_id`);

--
-- Indexes for table `tbl_qualification`
--
ALTER TABLE `tbl_qualification`
  ADD PRIMARY KEY (`qualification_id`);

--
-- Indexes for table `tbl_staff`
--
ALTER TABLE `tbl_staff`
  ADD PRIMARY KEY (`Staff_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `tbl_designation`
--
ALTER TABLE `tbl_designation`
  MODIFY `designation_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `tbl_leave`
--
ALTER TABLE `tbl_leave`
  MODIFY `leave_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `tbl_login`
--
ALTER TABLE `tbl_login`
  MODIFY `login_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `tbl_qualification`
--
ALTER TABLE `tbl_qualification`
  MODIFY `qualification_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=18;

--
-- AUTO_INCREMENT for table `tbl_staff`
--
ALTER TABLE `tbl_staff`
  MODIFY `Staff_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
