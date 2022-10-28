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
-- Table structure for table `doctors`
--

CREATE TABLE `doctors` (
  `doctor_name` varchar(30) NOT NULL,
  `service_1` varchar(30) DEFAULT NULL,
  `service_2` varchar(30) DEFAULT NULL,
  `service_3` varchar(30) DEFAULT NULL,
  `about_doctor` longtext DEFAULT NULL,
  `image_url` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `doctors`
--

INSERT INTO `doctors` (`doctor_name`, `service_1`, `service_2`, `service_3`, `about_doctor`, `image_url`) VALUES
('Dr Andie Lao', 'General Dentistry', 'Aesthetic Dentistry', 'Extractions and Minor Surgery', 'Dr Andie Lao graduated from National University of Singapore in 2002. During his undergraduate years, he won the first prize in the Undergraduate Research Opportunity Programme.\r\n\r\nDr Lao is an accredited Specialist in Endodontics with the Singapore Dental Council. He completed his Masters of Dental Surgery in Endodontics from National University of Singapore in 2007 and is a Member of the Royal College of Surgeons in Restorative Dentistry (Edinburgh). He maintains a fully restricted practice in the specialty of endodontics with special interest in cracked tooth management and dental traumatology.\r\n\r\nDr Lao is also actively involved in teaching as he is presently an adjunct lecturer in the Faculty of Dentistry, National University of Singapore and an examiner and lecturer of ITE under the NITEC (Dental Assisting) programme. Dr Andy Lim is also the current reviewer of the Singapore Dental Journal. He also has a Graduate Diploma in Acupuncture from The Singapore College of Traditional Chinese Medicine. Presently, Dr Andy Lim serves as the Vice President of the Society of Endodontists Singapore (SES) and he is an active member of the Singapore Dental Association (SDA).', '../assets/img/images/doctor1.png'),
('Dr Azlin Daur', 'General Dentistry', 'Aesthetic Dentistry', 'Extractions and Minor Surgery', 'Dr Azlin Daur graduated in 1992 from the National University of Singapore. His passion in Endodontology led him to pursue post-graduate training at the Eastman Dental Institute, University College London in 2003.\r\n\r\nHe then served as a Specialist Dental Officer with the Military Medicine Institute in addition to a part-time clinical tutor position with the Faculty of Dentistry NUS.\r\n\r\nDr Azlin is a registered Specialist Endodontist with the Singapore Dental Council. His areas of interest involves treating biologically complex and failed root canal cases.', '../assets/img/images/doctor2.png'),
('Dr. Josephiney Toy Chier Sia', 'General Dentistry', 'Extractions and Minor Surgery', NULL, 'Dr. Josephiney Toy graduated from one of the top universities in Malaysia, University of Malaya in 2004. She was awarded Masters of Dental Surgery in Endodontics from National University of Singapore in 2017 and is a Member of the Royal College of Surgeons Edinburgh.\r\n\r\nDuring her residency training, she participated in the International Association of Dental Research and published her paper in world-renowned Journal of Endodontics, an official journal of American Association of Endodontists. Dr. Tay is very dedicated in her work. She has given lectures and conducted workshops even when as a general practitioner and is currently involved in the Denticare Dental Institute. Her focus is mainly endodontics and her scope of practice includes complex root canal treatment, dental injuries, endodontic microsurgeries, regenerative endodontics and vital pulp therapies.', '../assets/img/images/doctor3.png');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `doctors`
--
ALTER TABLE `doctors`
  ADD PRIMARY KEY (`doctor_name`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
