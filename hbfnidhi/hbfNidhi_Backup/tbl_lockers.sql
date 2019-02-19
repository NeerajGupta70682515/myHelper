-- phpMyAdmin SQL Dump
-- version 4.8.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jun 02, 2018 at 03:38 PM
-- Server version: 10.1.31-MariaDB
-- PHP Version: 5.6.35

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `hbfnidhi`
--

-- --------------------------------------------------------

--
-- Table structure for table `tbl_lockers`
--

CREATE TABLE `tbl_lockers` (
  `locker_id` int(10) NOT NULL,
  `locker_name` varchar(52) NOT NULL,
  `locker_mobile` varchar(11) NOT NULL,
  `locker_email` varchar(80) NOT NULL,
  `locker_city` varchar(100) NOT NULL,
  `locker_message` text NOT NULL,
  `status` int(10) NOT NULL,
  `date` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_lockers`
--

INSERT INTO `tbl_lockers` (`locker_id`, `locker_name`, `locker_mobile`, `locker_email`, `locker_city`, `locker_message`, `status`, `date`) VALUES
(1, 'Neeraj', '1234567890', 'neeraj@gmail.com', 'Noida', '<p>Lockers Check</p>', 1, '2018-06-02 09:06:03'),
(2, 'Shivam Kumar Vishwakarma', '0987654321', 'vishwakarma@gmail.com', 'Merut', '<p>Checking Again Again</p>', 1, '2018-06-02 09:25:00');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `tbl_lockers`
--
ALTER TABLE `tbl_lockers`
  ADD PRIMARY KEY (`locker_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `tbl_lockers`
--
ALTER TABLE `tbl_lockers`
  MODIFY `locker_id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
