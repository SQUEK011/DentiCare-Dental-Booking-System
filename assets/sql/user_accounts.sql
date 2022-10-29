-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Oct 28, 2022 at 07:48 AM
-- Server version: 10.4.25-MariaDB
-- PHP Version: 8.1.10

/*SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";*/


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `denticare`
--

-- --------------------------------------------------------

--
-- Table structure for table `user_accounts`
--

/*CREATE TABLE `user_accounts` (
  `user_name` varchar(30) NOT NULL,
  `pass_word` varchar(30) DEFAULT NULL,
  `admin_rights` varchar(3) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;*/

--
-- Dumping data for table `user_accounts`
--

INSERT INTO `user_accounts` (`user_name`, `pass_word`, `admin_rights`) VALUES
('amktree', 'passwordadmin', '1'),
('poketree', 'poketree', '0'),
('tptree', 'passwordnoadmin', '0');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `user_accounts`
--
/*ALTER TABLE `user_accounts`
  ADD PRIMARY KEY (`user_name`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
