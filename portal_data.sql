-- phpMyAdmin SQL Dump
-- version 5.0.4
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Feb 01, 2021 at 10:24 AM
-- Server version: 10.4.17-MariaDB
-- PHP Version: 7.4.13

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `portal_data`
--

-- --------------------------------------------------------

--
-- Table structure for table `selected_option`
--

CREATE TABLE `selected_option` (
  `id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `Q1` int(11) NOT NULL,
  `Q2` int(11) NOT NULL,
  `Q3` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `test`
--

CREATE TABLE `test` (
  `PersonID` int(11) DEFAULT NULL,
  `LastName` varchar(255) DEFAULT NULL,
  `FirstName` varchar(255) DEFAULT NULL,
  `Address` varchar(255) DEFAULT NULL,
  `City` varchar(255) DEFAULT NULL,
  `extracolun` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `user_login_data`
--

CREATE TABLE `user_login_data` (
  `id` int(11) NOT NULL,
  `mem_name` varchar(255) NOT NULL,
  `mem_email` varchar(255) NOT NULL,
  `mem_pass` varchar(255) NOT NULL,
  `mem_number` varchar(20) NOT NULL,
  `mem_clgname` varchar(500) NOT NULL,
  `payment_status` tinyint(1) NOT NULL DEFAULT 0,
  `exam_status` tinyint(1) NOT NULL DEFAULT 0,
  `marks` int(11) NOT NULL,
  `class` varchar(10) NOT NULL,
  `parents_no` varchar(15) NOT NULL,
  `optional_school_name` varchar(255) NOT NULL,
  `mem_dob` date NOT NULL,
  `mem_address` varchar(255) NOT NULL,
  `order_id` varchar(255) NOT NULL,
  `razor_payment_id` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `vnit`
--

CREATE TABLE `vnit` (
  `id` int(11) UNSIGNED NOT NULL,
  `mem_name` varchar(255) NOT NULL,
  `mem_email` varchar(255) NOT NULL,
  `mem_number` varchar(20) NOT NULL,
  `mem_class` varchar(10) NOT NULL,
  `parents_no` varchar(15) NOT NULL,
  `mem_dob` date DEFAULT NULL,
  `mem_address` varchar(255) NOT NULL,
  `marks` int(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `selected_option`
--
ALTER TABLE `selected_option`
  ADD PRIMARY KEY (`id`) USING BTREE;

--
-- Indexes for table `user_login_data`
--
ALTER TABLE `user_login_data`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `vnit`
--
ALTER TABLE `vnit`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `user_login_data`
--
ALTER TABLE `user_login_data`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `vnit`
--
ALTER TABLE `vnit`
  MODIFY `id` int(11) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `selected_option`
--
ALTER TABLE `selected_option`
  ADD CONSTRAINT `user_linkto_option` FOREIGN KEY (`id`) REFERENCES `user_login_data` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
