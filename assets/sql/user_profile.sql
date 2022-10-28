-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Oct 28, 2022 at 07:49 AM
-- Server version: 10.4.25-MariaDB
-- PHP Version: 8.1.10

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `denticare`
--

-- --------------------------------------------------------

--
-- Table structure for table `user_profile`
--

CREATE TABLE `user_profile` (
  `user_name` varchar(30) DEFAULT NULL,
  `full_name` varchar(30) DEFAULT NULL,
  `nric` varchar(8) DEFAULT NULL,
  `D_O_B` date DEFAULT NULL,
  `gender` varchar(10) DEFAULT NULL,
  `occupation` varchar(20) DEFAULT NULL,
  `mobile_no` varchar(8) DEFAULT NULL,
  `email` varchar(50) DEFAULT NULL,
  `allergies` varchar(255) NOT NULL,
  `address_1` varchar(50) DEFAULT NULL,
  `address_2` varchar(50) DEFAULT NULL,
  `postal_code` varchar(6) DEFAULT NULL,
  `emergency_contact_name` varchar(30) DEFAULT NULL,
  `emergency_contact_no` varchar(8) DEFAULT NULL,
  `emergency_contact_relation` varchar(30) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `user_profile`
--

INSERT INTO `user_profile` (`user_name`, `full_name`, `nric`, `D_O_B`, `gender`, `occupation`, `mobile_no`, `email`, `allergies`, `address_1`, `address_2`, `postal_code`, `emergency_contact_name`, `emergency_contact_no`, `emergency_contact_relation`) VALUES
('poketree', 'Bum See', 'S1234567', '2022-10-25', 'Male', 'Doctor', '12345678', 'abc@test.com', 'NIL', '1 tulang', 'NIL', '312456', 'Bum Say', '12345687', 'Mother');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `user_profile`
--
ALTER TABLE `user_profile`
  ADD KEY `user_name` (`user_name`);

--
-- Constraints for dumped tables
--

--
-- Constraints for table `user_profile`
--
ALTER TABLE `user_profile`
  ADD CONSTRAINT `user_profile_ibfk_1` FOREIGN KEY (`user_name`) REFERENCES `user_accounts` (`user_name`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
