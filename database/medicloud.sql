-- phpMyAdmin SQL Dump
-- version 5.0.4
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Aug 30, 2021 at 08:50 PM
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
(12, 2, 'Dipto Das', 2790, ' Dr. Mohi ', ' Mohammadpur ', '2021-08-12'),
(13, 2, 'Dipto Das', 2706, ' Dr. Rafa ', ' Dhanmondi  ', '2021-08-10');

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
(1234, 'noni@gmail.com', '123', 'Dr Noni Gopal', 'heart', 'Govt Hos Pirojpur( any time)', '01746841261'),
(2706, 'rafa123@gmail.com', '123', 'Dr. Rafa', 'surgery', 'Lab Aid(8pm-10pm)', '0123456'),
(2707, 'dipto@gmail.com', '123', 'Dipto', 'heart', 'Pirojpur Desh Clinic', '0123456'),
(2768, 'tanvir123@gmail.com', '123', 'Dr Tanvir', 'Bone', 'Coxs Bazar', '12345623'),
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
(1, 'patient1@gmail.com', '1', 'Shuvo', 123456, 'pirojpur', 22),
(2, 'diptodas123@gmail.com', '123', 'Dipto Das shuvo', 1746841260, 'Hospital Road, Pirojpur', 22),
(3, 'mahiya123@gmail.com', '1', 'mahiya', 1746841260, '32,Dhanmondi', 21),
(4, 'rafa1@gmail.com', '1', 'rafa', 1746841260, '32,Dhanmondi', 21),
(5, 'rafa2@gmail.com', '1', 'rafa2', 1746841260, '32,Dhanmondi', 21);

-- --------------------------------------------------------

--
-- Table structure for table `prescription`
--

CREATE TABLE `prescription` (
  `Id` int(11) NOT NULL,
  `patient_id` int(11) NOT NULL,
  `Doctor_id` int(11) NOT NULL,
  `doctor_name` varchar(255) NOT NULL,
  `text` text NOT NULL,
  `date` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `prescription`
--

INSERT INTO `prescription` (`Id`, `patient_id`, `Doctor_id`, `doctor_name`, `text`, `date`) VALUES
(14, 4, 2768, 'Dr Tanvir', 'Rx,\r\nnapa 1+0+1\r\nnapa 0+0+0', '2021-08-16'),
(15, 4, 2768, 'Dr Tanvir', 'Rx,\r\nhello 123\r\nhi\r\nhelo\r\no\r\no\r\no', '2021-08-16'),
(16, 1, 2768, 'Dr Tanvir', 'Rx,\r\nnapa 1+0+1 7days', '2021-08-29');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `user_name` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `name` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `user_name`, `email`, `password`, `name`) VALUES
(3, 'ela', 'lima@gmail.com', '202cb962ac59075b964b07152d234b70', 'Ela'),
(4, 'elias', 'mariam@gmail.com', '202cb962ac59075b964b07152d234b70', 'elias');

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
-- Indexes for table `prescription`
--
ALTER TABLE `prescription`
  ADD PRIMARY KEY (`Id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `appointment`
--
ALTER TABLE `appointment`
  MODIFY `appointment_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=28;

--
-- AUTO_INCREMENT for table `patient`
--
ALTER TABLE `patient`
  MODIFY `Id` int(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `prescription`
--
ALTER TABLE `prescription`
  MODIFY `Id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
