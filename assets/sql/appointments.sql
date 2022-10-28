-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Oct 28, 2022 at 09:27 AM
-- Server version: 10.4.24-MariaDB
-- PHP Version: 8.1.6

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
-- Table structure for table `appointments`
--

CREATE TABLE `appointments` (
  `appt_no` int(10) UNSIGNED NOT NULL,
  `appt_date` date DEFAULT NULL,
  `appt_time` time DEFAULT NULL,
  `doctor_name` varchar(30) DEFAULT NULL,
  `service_selected` varchar(30) DEFAULT NULL,
  `user_name` varchar(30) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `appointments`
--

INSERT INTO `appointments` (`appt_no`, `appt_date`, `appt_time`, `doctor_name`, `service_selected`, `user_name`) VALUES
(1, '2022-11-10', '14:00:00', 'Dr. Josephiney Toy Chier Sia', 'General Dentistry', NULL),
(2, '2022-11-10', '14:00:00', 'Dr Andie Lao', 'Aesthetic Dentistry', NULL),
(3, '2022-11-10', '15:00:00', 'Dr Azlin Daur', 'General Dentistry', NULL),
(4, '2022-11-11', '10:00:00', 'Dr Andie Lao', 'Extractions and Minor Surgery', NULL),
(5, '2022-11-11', '14:00:00', 'Dr Azlin Daur', 'General Dentistry', NULL),
(6, '2022-11-11', '15:00:00', 'Dr. Josephiney Toy Chier Sia', 'General Dentistry', NULL),
(7, '2022-11-11', '16:00:00', 'Dr Andie Lao', 'General Dentistry', NULL),
(8, '2022-11-11', '16:00:00', 'Dr. Josephiney Toy Chier Sia', 'General Dentistry', NULL),
(9, '2022-11-12', '10:00:00', 'Dr Andie Lao', 'General Dentistry', NULL),
(10, '2022-11-12', '14:00:00', 'Dr Andie Lao', 'Aesthetic Dentistry', NULL),
(11, '2022-11-12', '13:00:00', 'Dr Azlin Daur', 'General Dentistry', NULL),
(12, '2022-11-13', '10:00:00', 'Dr Andie Lao', 'General Dentistry', NULL);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `appointments`
--
ALTER TABLE `appointments`
  ADD PRIMARY KEY (`appt_no`),
  ADD KEY `user_name` (`user_name`),
  ADD KEY `doctor_name` (`doctor_name`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `appointments`
--
ALTER TABLE `appointments`
  MODIFY `appt_no` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `appointments`
--
ALTER TABLE `appointments`
  ADD CONSTRAINT `appointments_ibfk_1` FOREIGN KEY (`user_name`) REFERENCES `user_accounts` (`user_name`),
  ADD CONSTRAINT `appointments_ibfk_2` FOREIGN KEY (`doctor_name`) REFERENCES `doctors` (`doctor_name`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
