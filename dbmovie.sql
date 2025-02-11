-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: localhost:1111
-- Generation Time: Aug 11, 2024 at 10:28 PM
-- Server version: 10.4.28-MariaDB
-- PHP Version: 8.2.4

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `dbmovie`
--

-- --------------------------------------------------------

--
-- Table structure for table `image`
--

CREATE TABLE `image` (
  `pic_id` int(11) NOT NULL,
  `pic_img` varchar(30) NOT NULL,
  `pic_name` varchar(30) NOT NULL,
  `pic_price` varchar(30) NOT NULL,
  `pic_language` varchar(30) NOT NULL,
  `pic_cinema` varchar(30) NOT NULL,
  `pic_time` varchar(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data for table `image`
--

INSERT INTO `image` (`pic_id`, `pic_img`, `pic_name`, `pic_price`, `pic_language`, `pic_cinema`, `pic_time`) VALUES
(1, 'Liger.jpg', 'Liger', '140', 'Hindi', 'Cinezz Multiplex', '9:30 AM to 12:00 PM'),
(2, 'Beast.jpg', 'Beast', '150', 'Hindi', 'Heros Multiplex', '9:00 AM to 11:15 AM'),
(3, 'Salaar.jpg', 'Salaar', '160', 'Hindi', 'Rajhans Multiplex', '10:15 AM to 12:45 PM'),
(4, 'Maharaja.jpg', 'Maharaja', '250', 'Hindi', '24hours Multiplex', '10:15 AM to 12:45 PM'),
(5, 'Vikram.jpg', 'Vikram', '200', 'Hindi', 'VR Multiplex', '9:30 AM to 12:00 PM'),
(6, 'Kantara.jpg', 'Kantara', '300', 'Hindi', 'RR Multiplex', '9:00 AM to 11:15 AM'),
(7, 'Jailer.jpg', 'Jailer', '350', 'Hindi', 'AR Multiplex', '10:15 AM to 12:45 PM'),
(8, 'Kalki.jpg', 'Kalki', '450', 'Hindi', 'RR Multiplex', '10:15 AM to 12:45 PM');

-- --------------------------------------------------------

--
-- Table structure for table `login`
--

CREATE TABLE `login` (
  `u_id` int(11) NOT NULL,
  `u_email` varchar(30) NOT NULL,
  `u_password` varchar(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data for table `login`
--

INSERT INTO `login` (`u_id`, `u_email`, `u_password`) VALUES
(1, 'MRANANTSSONI7@GMAIL.COM', '202020'),
(2, 'MRANANTSONI7@GMAIL.COM', '202020'),
(3, 'MRANANTSONI7@GMAIL.COM', '202020'),
(4, 'MRANANTSONI7@GMAIL.COM', '202020'),
(5, 'MRANANTSONI7@GMAIL.COM', '202020'),
(6, 'MRANANTSONI7@GMAIL.COM', '202020'),
(7, 'a58@gmail.com', '107107'),
(8, 'MRANANTSONI@GMAIL.COM', 'abcabcabc');

-- --------------------------------------------------------

--
-- Table structure for table `register`
--

CREATE TABLE `register` (
  `u_id` int(11) NOT NULL,
  `u_fname` varchar(30) NOT NULL,
  `u_lname` varchar(30) NOT NULL,
  `u_email` varchar(30) NOT NULL,
  `u_pass` varchar(30) NOT NULL,
  `u_conpass` varchar(30) NOT NULL,
  `u_mobile` bigint(11) NOT NULL,
  `u_address` varchar(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data for table `register`
--

INSERT INTO `register` (`u_id`, `u_fname`, `u_lname`, `u_email`, `u_pass`, `u_conpass`, `u_mobile`, `u_address`) VALUES
(1, 'SONI', 'RAJESHKUMAR', 'MRANANTSONI7@GMAIL.COM', 'Anant20', 'Anant20', 8140591020, 'Surat (M Corp.) (Part) 204-KIR'),
(2, 'anant', 'soni', 'a58@gmail.com', '107107', '107107', 8151817151, 's'),
(3, 'anant', 'soni', 'mranantsoni@gmail.com', 'abcabcabc', 'abcabcabc', 8140591020, 'mumbai');

-- --------------------------------------------------------

--
-- Table structure for table `ticket`
--

CREATE TABLE `ticket` (
  `u_id` int(11) NOT NULL,
  `u_fname` varchar(30) NOT NULL,
  `u_lname` varchar(30) NOT NULL,
  `u_email` varchar(30) NOT NULL,
  `u_contact` bigint(11) NOT NULL,
  `u_movie` varchar(30) NOT NULL,
  `u_date` varchar(11) NOT NULL,
  `u_time` varchar(30) NOT NULL,
  `u_seat` varchar(30) NOT NULL,
  `u_price` varchar(30) NOT NULL,
  `u_tcktno` varchar(30) NOT NULL,
  `u_pay` varchar(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data for table `ticket`
--

INSERT INTO `ticket` (`u_id`, `u_fname`, `u_lname`, `u_email`, `u_contact`, `u_movie`, `u_date`, `u_time`, `u_seat`, `u_price`, `u_tcktno`, `u_pay`) VALUES
(17, 'Anant', 'Soni', 'MRANANTSONI@GMAIL.COM', 8140592050, 'movie 1', '10-08-2024', '7:30 AM', 'First Row', '250', '3', '750'),
(19, 'Anant', 'Soni', 'MRANANTSONI@GMAIL.COM', 8140592050, 'movie 2', '10-08-2024', '7:30 AM', 'First Row', '250', '2', '500'),
(20, 'Anant', 'Soni', 'MRANANTSONI7@GMAIL.COM', 8140592050, 'movie 1', '10-08-2024', '7:30 AM', 'Second Row', '450', '5', '2250'),
(21, 'Anant', 'Soni', 'MRANANTSONI7@GMAIL.COM', 8140592050, 'movie 1', '10-08-2024', '7:30 AM', 'First Row', '250', '1', '250');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `image`
--
ALTER TABLE `image`
  ADD PRIMARY KEY (`pic_id`);

--
-- Indexes for table `login`
--
ALTER TABLE `login`
  ADD PRIMARY KEY (`u_id`);

--
-- Indexes for table `register`
--
ALTER TABLE `register`
  ADD PRIMARY KEY (`u_id`);

--
-- Indexes for table `ticket`
--
ALTER TABLE `ticket`
  ADD PRIMARY KEY (`u_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `image`
--
ALTER TABLE `image`
  MODIFY `pic_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `login`
--
ALTER TABLE `login`
  MODIFY `u_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `register`
--
ALTER TABLE `register`
  MODIFY `u_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `ticket`
--
ALTER TABLE `ticket`
  MODIFY `u_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=23;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
