-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Oct 31, 2022 at 06:19 PM
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
-- Table structure for table `appointments`
--

CREATE TABLE `appointments` (
  `appt_no` int(10) UNSIGNED NOT NULL,
  `appt_date` date DEFAULT NULL,
  `appt_time` time DEFAULT NULL,
  `doctor_name` varchar(30) DEFAULT NULL,
  `dental_service` varchar(30) DEFAULT NULL,
  `user_name` varchar(30) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `appointments`
--

INSERT INTO `appointments` (`appt_no`, `appt_date`, `appt_time`, `doctor_name`, `dental_service`, `user_name`) VALUES
(0, '2022-11-22', '14:00:00', 'Dr Azlin Daur', 'General Dentistry', NULL),
(1, '2022-11-10', '14:00:00', 'Dr. Josephiney Toy Chier Sia', 'General Dentistry', NULL),
(3, '2022-11-10', '15:00:00', 'Dr Azlin Daur', 'General Dentistry', NULL),
(4, '2022-11-11', '10:00:00', 'Dr Andie Lao', 'Extractions and Minor Surgery', NULL),
(5, '2022-11-11', '14:00:00', 'Dr Azlin Daur', 'General Dentistry', NULL),
(6, '2022-11-11', '15:00:00', 'Dr. Josephiney Toy Chier Sia', 'General Dentistry', NULL),
(7, '2022-11-11', '16:00:00', 'Dr Andie Lao', 'General Dentistry', 'poketree'),
(8, '2022-11-11', '16:00:00', 'Dr. Josephiney Toy Chier Sia', 'General Dentistry', NULL),
(9, '2022-11-30', '14:00:00', 'Dr Andie Lao', 'General Dentistry', NULL),
(10, '2022-11-12', '14:00:00', 'Dr Andie Lao', 'Aesthetic Dentistry', NULL),
(11, '2022-11-12', '13:00:00', 'Dr Azlin Daur', 'General Dentistry', NULL),
(12, '2022-11-13', '10:00:00', 'Dr Andie Lao', 'General Dentistry', NULL),
(13, '2022-11-13', '15:00:00', 'Dr Andie Lao', 'General Dentistry', NULL),
(14, '2022-11-14', '10:00:00', 'Dr Andie Lao', 'General Dentistry', NULL),
(15, '2022-11-14', '13:00:00', 'Dr Andie Lao', 'General Dentistry', NULL),
(16, '2022-11-14', '16:00:00', 'Dr Andie Lao', 'General Dentistry', NULL),
(18, '2022-11-15', '14:00:00', 'Dr. Josephiney Toy Chier Sia', 'General Dentistry', NULL),
(19, '2022-11-15', '16:00:00', 'Dr. Josephiney Toy Chier Sia', 'Aesthetic Dentistry', NULL),
(20, '2022-11-16', '10:00:00', 'Dr Azlin Daur', 'Extractions and Minor Surgery', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `doctors`
--

CREATE TABLE `doctors` (
  `doctor_name` varchar(30) NOT NULL,
  `service_1` varchar(30) DEFAULT NULL,
  `service_2` varchar(30) DEFAULT NULL,
  `service_3` varchar(30) DEFAULT NULL,
  `about_doctor` longtext DEFAULT NULL,
  `image_url` varchar(255) NOT NULL,
  `user_name` varchar(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `doctors`
--

INSERT INTO `doctors` (`doctor_name`, `service_1`, `service_2`, `service_3`, `about_doctor`, `image_url`, `user_name`) VALUES
('Dr Andie Lao', 'General Dentistry', 'Aesthetic Dentistry', 'Extractions and Minor Surgery', 'Dr Andie Lao graduated from National University of Singapore in 2002. During his undergraduate years, he won the first prize in the Undergraduate Research Opportunity Programme.\r\n\r\nDr Lao is an accredited Specialist in Endodontics with the Singapore Dental Council. He completed his Masters of Dental Surgery in Endodontics from National University of Singapore in 2007 and is a Member of the Royal College of Surgeons in Restorative Dentistry (Edinburgh). He maintains a fully restricted practice in the specialty of endodontics with special interest in cracked tooth management and dental traumatology.\r\n\r\nDr Lao is also actively involved in teaching as he is presently an adjunct lecturer in the Faculty of Dentistry, National University of Singapore and an examiner and lecturer of ITE under the NITEC (Dental Assisting) programme. Dr Andy Lim is also the current reviewer of the Singapore Dental Journal. He also has a Graduate Diploma in Acupuncture from The Singapore College of Traditional Chinese Medicine. Presently, Dr Andy Lim serves as the Vice President of the Society of Endodontists Singapore (SES) and he is an active member of the Singapore Dental Association (SDA).', '../assets/img/images/doctor1.png', 'andieliao'),
('Dr Azlin Daur', 'General Dentistry', 'Aesthetic Dentistry', 'Extractions and Minor Surgery', 'Dr Azlin Daur graduated in 1992 from the National University of Singapore. His passion in Endodontology led him to pursue post-graduate training at the Eastman Dental Institute, University College London in 2003.\r\n\r\nHe then served as a Specialist Dental Officer with the Military Medicine Institute in addition to a part-time clinical tutor position with the Faculty of Dentistry NUS.\r\n\r\nDr Azlin is a registered Specialist Endodontist with the Singapore Dental Council. His areas of interest involves treating biologically complex and failed root canal cases.', '../assets/img/images/doctor2.png', 'azlindaur'),
('Dr. Josephiney Toy Chier Sia', 'General Dentistry', 'Extractions and Minor Surgery', NULL, 'Dr. Josephiney Toy graduated from one of the top universities in Malaysia, University of Malaya in 2004. She was awarded Masters of Dental Surgery in Endodontics from National University of Singapore in 2017 and is a Member of the Royal College of Surgeons Edinburgh.\r\n\r\nDuring her residency training, she participated in the International Association of Dental Research and published her paper in world-renowned Journal of Endodontics, an official journal of American Association of Endodontists. Dr. Tay is very dedicated in her work. She has given lectures and conducted workshops even when as a general practitioner and is currently involved in the Denticare Dental Institute. Her focus is mainly endodontics and her scope of practice includes complex root canal treatment, dental injuries, endodontic microsurgeries, regenerative endodontics and vital pulp therapies.', '../assets/img/images/doctor3.png', 'jtoy');

-- --------------------------------------------------------

--
-- Table structure for table `user_accounts`
--

CREATE TABLE `user_accounts` (
  `user_name` varchar(30) NOT NULL,
  `pass_word` varchar(30) DEFAULT NULL,
  `admin_rights` varchar(3) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `user_accounts`
--

INSERT INTO `user_accounts` (`user_name`, `pass_word`, `admin_rights`) VALUES
('amktree', 'passwordadmin', '1'),
('andieliao', 'andieliao', '1'),
('jtoy', 'jtoy', '1'),
('poketree', 'poketree', '0'),
('tptree', 'passwordnoadmin', '0');

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
('poketree', 'Bum See', 'S1234567', '2022-10-25', 'Male', 'Doctor', '12345678', 'poketree@localhost.com', 'NIL', '1 tulang', 'NIL', '312456', 'Bum Say', '12345687', 'Mother');

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
-- Indexes for table `doctors`
--
ALTER TABLE `doctors`
  ADD PRIMARY KEY (`doctor_name`);

--
-- Indexes for table `user_accounts`
--
ALTER TABLE `user_accounts`
  ADD PRIMARY KEY (`user_name`);

--
-- Indexes for table `user_profile`
--
ALTER TABLE `user_profile`
  ADD KEY `user_name` (`user_name`);

--
-- Constraints for dumped tables
--

--
-- Constraints for table `appointments`
--
ALTER TABLE `appointments`
  ADD CONSTRAINT `appointments_ibfk_1` FOREIGN KEY (`user_name`) REFERENCES `user_accounts` (`user_name`),
  ADD CONSTRAINT `appointments_ibfk_2` FOREIGN KEY (`doctor_name`) REFERENCES `doctors` (`doctor_name`);

--
-- Constraints for table `user_profile`
--
ALTER TABLE `user_profile`
  ADD CONSTRAINT `user_profile_ibfk_1` FOREIGN KEY (`user_name`) REFERENCES `user_accounts` (`user_name`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
