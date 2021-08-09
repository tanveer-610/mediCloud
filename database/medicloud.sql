-- phpMyAdmin SQL Dump
-- version 5.0.4
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Aug 09, 2021 at 06:14 PM
-- Server version: 10.4.17-MariaDB
-- PHP Version: 8.0.1

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `medicloud`
--

-- --------------------------------------------------------

--
-- Table structure for table `appointment`
--

CREATE TABLE `appointment` (
  `appointment_id` int(11) NOT NULL,
  `patient_id` int(11) NOT NULL,
  `patient_name` varchar(50) NOT NULL,
  `doctor_id` int(11) NOT NULL,
  `doctor_name` varchar(50) NOT NULL,
  `location` varchar(100) NOT NULL,
  `date` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `appointment`
--

INSERT INTO `appointment` (`appointment_id`, `patient_id`, `patient_name`, `doctor_id`, `doctor_name`, `location`, `date`) VALUES
(8, 1, 'Shuvo', 2706, ' Dr. Rafa ', ' Dhanmondi  ', '2021-08-11'),
(10, 1, 'Shuvo', 2781, ' Dr. Jahidul ', ' Dhanmondi  ', '2021-08-11'),
(11, 1, 'Shuvo', 2768, ' Dr Tanvir ', ' Coxes Bazar ', '2021-08-13'),
(12, 2, 'Dipto Das', 2790, ' Dr. Mohi ', ' Mohammadpur ', '2021-08-12'),
(13, 2, 'Dipto Das', 2706, ' Dr. Rafa ', ' Dhanmondi  ', '2021-08-10'),
(14, 2, 'Dipto Das', 2768, ' Dr Tanvir ', ' Coxs Bazar ', '2021-08-11'),
(15, 1, 'Shuvo', 2707, ' Dipto ', ' Pirojpur Desh Clinic ', '2021-08-26'),
(16, 1, 'Shuvo', 2768, ' Dr Tanvir ', ' Coxs Bazar ', '2021-08-24'),
(17, 4, 'rafa', 2768, ' Dr Tanvir ', ' Coxs Bazar ', '2021-08-12');

-- --------------------------------------------------------

--
-- Table structure for table `doctor`
--

CREATE TABLE `doctor` (
  `Id` int(20) NOT NULL,
  `email` varchar(30) NOT NULL,
  `Password` varchar(20) NOT NULL,
  `name` varchar(30) NOT NULL,
  `specialist` varchar(20) NOT NULL,
  `chember` varchar(60) NOT NULL,
  `number` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `doctor`
--

INSERT INTO `doctor` (`Id`, `email`, `Password`, `name`, `specialist`, `chember`, `number`) VALUES
(2706, 'rafa123@gmail.com', '123', 'Dr. Rafa', 'surgery', 'Dhanmondi ', '0123456'),
(2707, 'dipto@gmail.com', '123', 'Dipto', 'heart', 'Pirojpur Desh Clinic', '0123456'),
(2768, 'tanvir123@gmail.com', '123', 'Dr Tanvir', 'Bone', 'Coxs Bazar', '0123456'),
(2781, 'jahid123@gmail.com', '1', 'Dr. Jahidul', 'Bone', 'Dhanmondi ', '0123456'),
(2790, 'mohi123@gmail.com', '123', 'Dr. Mohi', 'Mental', 'Mohammadpur', '0123456');

-- --------------------------------------------------------

--
-- Table structure for table `patient`
--

CREATE TABLE `patient` (
  `Id` int(20) NOT NULL,
  `email` varchar(30) NOT NULL,
  `Password` varchar(20) NOT NULL,
  `name` varchar(30) NOT NULL,
  `number` int(20) NOT NULL,
  `address` varchar(60) NOT NULL,
  `Age` int(5) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `patient`
--

INSERT INTO `patient` (`Id`, `email`, `Password`, `name`, `number`, `address`, `Age`) VALUES
(1, 'patient1@gmail.com', '1', 'Shuvo', 123456, 'pirojpur', 0),
(2, 'diptodas123@gmail.com', '123', 'Dipto Das', 1746841260, '2158  Alaska Hwy', 21),
(3, 'mahiya123@gmail.com', '1', 'mahiya', 1746841260, '32,Dhanmondi', 21),
(4, 'rafa1@gmail.com', '1', 'rafa', 1746841260, '32,Dhanmondi', 21);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `appointment`
--
ALTER TABLE `appointment`
  ADD PRIMARY KEY (`appointment_id`);

--
-- Indexes for table `doctor`
--
ALTER TABLE `doctor`
  ADD PRIMARY KEY (`Id`);

--
-- Indexes for table `patient`
--
ALTER TABLE `patient`
  ADD PRIMARY KEY (`Id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `appointment`
--
ALTER TABLE `appointment`
  MODIFY `appointment_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=18;

--
-- AUTO_INCREMENT for table `patient`
--
ALTER TABLE `patient`
  MODIFY `Id` int(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
