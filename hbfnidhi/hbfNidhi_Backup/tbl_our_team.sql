-- phpMyAdmin SQL Dump
-- version 4.8.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jun 01, 2018 at 04:06 PM
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
-- Table structure for table `tbl_our_team`
--

CREATE TABLE `tbl_our_team` (
  `our_team_id` int(10) NOT NULL,
  `our_team_name` varchar(52) NOT NULL,
  `our_team_designation` varchar(232) NOT NULL,
  `our_team_description` text NOT NULL,
  `image` varchar(100) NOT NULL,
  `status` int(1) NOT NULL,
  `date` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_our_team`
--

INSERT INTO `tbl_our_team` (`our_team_id`, `our_team_name`, `our_team_designation`, `our_team_description`, `image`, `status`, `date`) VALUES
(1, 'Check', 'CEO', 'Checking', '', 1, ''),
(2, 'Sitanshu Gupta', 'CEO & Founder', '<p>Our Team is very Good&nbsp;</p>\r\n', 'TulipsMqiX.jpg', 1, '2018-06-01 07:49:54'),
(3, 'Shivam', 'Manager', '<p><span style=\"font-family:ubuntu,sans-serif; font-size:14px\">He has more than 9 years of experience in Financial Sector. He is a first-generation business entrepreneur and a thorough executer who believes in working hard to get results with persistence. A passionate salesman, Sachin has been committed to building strong relationships with client, people and team. He has worked for over 2 years for Foreign based Leading Investment Banks where his role involved managing a team to provide Financial Services. He also worked as an Investment Consultant for few organizations and individuals of High and Ultra High Net worth and has an AUM of more than 50 million (in INR) currently managed under various financial products.</span></p>\r\n', '1hhUdpUBH.jpg', 1, '2018-06-01 09:10:52');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `tbl_our_team`
--
ALTER TABLE `tbl_our_team`
  ADD PRIMARY KEY (`our_team_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `tbl_our_team`
--
ALTER TABLE `tbl_our_team`
  MODIFY `our_team_id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
