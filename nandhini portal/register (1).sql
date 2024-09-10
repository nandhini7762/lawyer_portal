-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Sep 08, 2024 at 04:20 PM
-- Server version: 10.4.27-MariaDB
-- PHP Version: 8.0.25

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `register`
--

-- --------------------------------------------------------

--
-- Table structure for table `case_reg`
--

CREATE TABLE `case_reg` (
  `fullname` varchar(25) NOT NULL,
  `phone` varchar(10) NOT NULL,
  `email` varchar(50) NOT NULL,
  `address` varchar(150) NOT NULL,
  `dob` date NOT NULL,
  `gender` varchar(10) NOT NULL,
  `occupation` varchar(25) NOT NULL,
  `maritalstatus` varchar(10) NOT NULL,
  `emercontact` varchar(25) NOT NULL,
  `emerconname` varchar(25) NOT NULL,
  `casetitle` varchar(25) NOT NULL,
  `casetype` varchar(25) NOT NULL,
  `casedesc` varchar(250) NOT NULL,
  `casenum` varchar(10) NOT NULL,
  `DOI` date NOT NULL,
  `DOCR` date NOT NULL,
  `oppparty` varchar(25) NOT NULL,
  `courtname` varchar(25) NOT NULL,
  `caseheardate` date NOT NULL,
  `judge` varchar(25) NOT NULL,
  `jurisdiction` varchar(25) NOT NULL,
  `lawyerassigned` varchar(25) NOT NULL,
  `lawyercon` varchar(10) NOT NULL,
  `specialreq` varchar(100) NOT NULL,
  `notes` varchar(200) NOT NULL,
  `dateoa` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `case_reg`
--

INSERT INTO `case_reg` (`fullname`, `phone`, `email`, `address`, `dob`, `gender`, `occupation`, `maritalstatus`, `emercontact`, `emerconname`, `casetitle`, `casetype`, `casedesc`, `casenum`, `DOI`, `DOCR`, `oppparty`, `courtname`, `caseheardate`, `judge`, `jurisdiction`, `lawyerassigned`, `lawyercon`, `specialreq`, `notes`, `dateoa`) VALUES
('Nandhini S', '8072946167', 'nandhinisenthilkumar7736@gmail.com', 'uthukuli main road karumarampalayam,Tirupur 641 607', '2024-09-09', 'female', 'savew', 'widowed', 'Nandhini S', '1234567890', 'dfxgvtd', 'family', 'edgreg', 'dxfrt', '2024-09-26', '2024-09-15', 'axfew', 'axcfew', '2024-09-27', 'SFwasf', 'axcfew', 'Zdawd', 'nmkujmk', 'aeswfed', 'asd', '2024-09-14');

-- --------------------------------------------------------

--
-- Table structure for table `form`
--

CREATE TABLE `form` (
  `id` int(22) NOT NULL,
  `fname` varchar(22) NOT NULL,
  `lname` varchar(22) NOT NULL,
  `gender` varchar(22) NOT NULL,
  `cnum` varchar(22) NOT NULL,
  `address` varchar(22) NOT NULL,
  `email` varchar(50) NOT NULL,
  `pass` varchar(22) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `form`
--

INSERT INTO `form` (`id`, `fname`, `lname`, `gender`, `cnum`, `address`, `email`, `pass`) VALUES
(2, 'nandhini', 's', 'female', '8072946167', 'uthukuli main road kar', 'nandhinisenthilkumar7736@gmail.com', 'nandhu'),
(3, 'priya', 'dharshini', 'female', '6369446212', 'thiruvarur', 'priya@gmail.com', '@Priya'),
(4, 'Nandhini', 'S', 'female', '8072946167', 'uthukuli main road kar', 'nandhinisenthilkumar7736@gmail.com', '123'),
(5, 'Nandhini', 'S', 'female', '8072946167', 'uthukuli main road kar', 'nandhinisenthilkumar7736@gmail.com', '123456789');

-- --------------------------------------------------------

--
-- Table structure for table `lawyer_reg`
--

CREATE TABLE `lawyer_reg` (
  `cis_code` int(30) NOT NULL,
  `courtcomplex` varchar(30) NOT NULL,
  `sta` varchar(30) NOT NULL,
  `country` varchar(30) NOT NULL,
  `advocate` varchar(30) NOT NULL,
  `gender` varchar(10) NOT NULL,
  `bar` varchar(30) NOT NULL,
  `offaddress` varchar(300) NOT NULL,
  `offnumber` varchar(10) NOT NULL,
  `mail` varchar(50) NOT NULL,
  `fax` varchar(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `lawyer_reg`
--

INSERT INTO `lawyer_reg` (`cis_code`, `courtcomplex`, `sta`, `country`, `advocate`, `gender`, `bar`, `offaddress`, `offnumber`, `mail`, `fax`) VALUES
(2435, 'sa', 'tamilnadu', 'india', 'nandhini', 'female', '38057', '2wd2', 'e2e2wd', 'nan@gmail.com', '23523425'),
(4565765, 'civil', 'tamilnadu', 'india', 'nandhini', 'female', 'yes', '64,tiruppur', '23523235', 'nan@gmail.com', '23523425');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `case_reg`
--
ALTER TABLE `case_reg`
  ADD PRIMARY KEY (`phone`,`email`);

--
-- Indexes for table `form`
--
ALTER TABLE `form`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `lawyer_reg`
--
ALTER TABLE `lawyer_reg`
  ADD PRIMARY KEY (`cis_code`,`mail`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `form`
--
ALTER TABLE `form`
  MODIFY `id` int(22) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
