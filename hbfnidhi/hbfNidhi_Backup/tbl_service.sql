-- phpMyAdmin SQL Dump
-- version 4.8.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jun 02, 2018 at 03:37 PM
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
-- Table structure for table `tbl_service`
--

CREATE TABLE `tbl_service` (
  `service_id` int(10) NOT NULL,
  `service_title` varchar(100) NOT NULL,
  `service_image1` varchar(50) NOT NULL,
  `service_image2` varchar(50) NOT NULL,
  `sort_description` varchar(252) DEFAULT NULL,
  `service_description` text NOT NULL,
  `status` int(11) NOT NULL,
  `recv_date` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_service`
--

INSERT INTO `tbl_service` (`service_id`, `service_title`, `service_image1`, `service_image2`, `sort_description`, `service_description`, `status`, `recv_date`) VALUES
(1, 'Human Life Value/Protection', 'humanlifevalueyPZh.jpg', 'inner-bannervpIi.jpg', NULL, '<p>Voluptatum deleniti atque corrupti quos dolores et ques molestias excepturi sint occaecati cupiditate non provident eitro rabeta lingo.</p>', 1, '2018-06-02 14:05:09'),
(2, 'Needs Childs Solutions', 'childsolutions6Uh8.jpg', 'inner-banner2QWK.jpg', NULL, '<p>Minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat tarad limino ata nodera clas.</p>', 1, '2018-06-02 14:07:44'),
(5, 'Needs Retirement Solutions', 'retiermentsolutionsVwK8.jpg', 'inner-bannerXZ4Y.jpg', NULL, '<p>Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur trinige zareta lobur trade</p>', 1, '2018-06-02 14:14:22');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `tbl_service`
--
ALTER TABLE `tbl_service`
  ADD PRIMARY KEY (`service_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `tbl_service`
--
ALTER TABLE `tbl_service`
  MODIFY `service_id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
