-- phpMyAdmin SQL Dump
-- version 4.7.7
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3306
-- Generation Time: May 31, 2018 at 06:32 AM
-- Server version: 5.6.38
-- PHP Version: 5.6.30

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `itmnc_hbfnidhi`
--

-- --------------------------------------------------------

--
-- Table structure for table `ci_sessions`
--

CREATE TABLE `ci_sessions` (
  `session_id` text,
  `ip_address` text,
  `user_agent` text,
  `last_activity` text,
  `user_data` text
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `ci_sessions`
--

INSERT INTO `ci_sessions` (`session_id`, `ip_address`, `user_agent`, `last_activity`, `user_data`) VALUES
('2a309a1228b0e32f2f86d157ddce19d3', '103.82.223.25', 'Mozilla/5.0 (Windows NT 6.1; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/66.0.3359.181 Safari/537.36', '1527746929', 'a:2:{s:9:\"user_data\";s:0:\"\";s:13:\"previous_page\";s:0:\"\";}'),
('1dd56b7f094e989d8daba1517ad0b8f1', '23.99.101.118', 'Mozilla/5.0 (Windows NT 6.1; WOW64) SkypeUriPreview Preview/0.5', '1527743722', 'a:2:{s:9:\"user_data\";s:0:\"\";s:13:\"previous_page\";s:0:\"\";}'),
('dab03f63326b3adf639f7b4d7bf224d3', '171.61.154.57', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/66.0.3359.181 Safari/537.36', '1527746949', 'a:2:{s:9:\"user_data\";s:0:\"\";s:13:\"previous_page\";s:0:\"\";}'),
('3d1604ea2737027afda6622ac763e89a', '103.82.223.25', 'Mozilla/5.0 (Windows NT 6.3; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/66.0.3359.181 Safari/537.36', '1527743582', 'a:7:{s:9:\"user_data\";s:0:\"\";s:13:\"previous_page\";s:0:\"\";s:10:\"admin_user\";s:5:\"admin\";s:7:\"adm_key\";s:8:\"cnsgkMd4\";s:10:\"admin_type\";s:1:\"1\";s:8:\"admin_id\";s:1:\"1\";s:15:\"admin_logged_in\";b:1;}');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_admin`
--

CREATE TABLE `tbl_admin` (
  `admin_id` int(11) NOT NULL,
  `admin_type` enum('1','2') NOT NULL DEFAULT '2' COMMENT '1= super admin , 2= other',
  `admin_key` varchar(15) NOT NULL,
  `admin_username` varchar(50) NOT NULL,
  `admin_password` varchar(100) CHARACTER SET latin1 COLLATE latin1_general_cs DEFAULT NULL,
  `admin_email` varchar(255) NOT NULL DEFAULT '',
  `litigation_days` int(5) NOT NULL,
  `admin_last_login` datetime NOT NULL DEFAULT '0000-00-00 00:00:00',
  `address` text NOT NULL,
  `city` varchar(100) DEFAULT NULL,
  `country` varchar(100) DEFAULT NULL,
  `phone` varchar(50) NOT NULL,
  `fax` varchar(50) NOT NULL,
  `contact_person` varchar(50) NOT NULL,
  `contact_phone` varchar(50) NOT NULL,
  `contact_email` varchar(50) NOT NULL,
  `post_date` date NOT NULL,
  `status` enum('0','1','2') NOT NULL DEFAULT '1'
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_admin`
--

INSERT INTO `tbl_admin` (`admin_id`, `admin_type`, `admin_key`, `admin_username`, `admin_password`, `admin_email`, `litigation_days`, `admin_last_login`, `address`, `city`, `country`, `phone`, `fax`, `contact_person`, `contact_phone`, `contact_email`, `post_date`, `status`) VALUES
(1, '1', 'cnsgkMd4', 'admin', 'admin123', 'info@megavisors.com', 20, '0000-00-00 00:00:00', 'B405 New delhi', 'New Delhi', 'India', '9953286789', '', '', '', '', '0000-00-00', '1');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_advertise`
--

CREATE TABLE `tbl_advertise` (
  `id` int(11) NOT NULL,
  `posted_by` enum('user','admin') NOT NULL DEFAULT 'user',
  `first_name` varchar(100) NOT NULL,
  `last_name` varchar(100) NOT NULL,
  `company_name` varchar(100) NOT NULL,
  `phone_number` varchar(100) NOT NULL,
  `email` varchar(100) NOT NULL,
  `country` varchar(100) NOT NULL,
  `city` varchar(100) NOT NULL,
  `banner_type` enum('text','image') NOT NULL DEFAULT 'image',
  `website_url` varchar(255) CHARACTER SET utf8 DEFAULT NULL,
  `banner_position` varchar(100) NOT NULL,
  `banner_start_date` varchar(255) CHARACTER SET utf8 DEFAULT NULL,
  `banner_expire_date` varchar(100) DEFAULT NULL,
  `duration_time` varchar(100) DEFAULT NULL,
  `banner` varchar(255) CHARACTER SET utf8 DEFAULT '0,0',
  `inserted_on` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `banner_price` float(10,2) DEFAULT NULL,
  `payment_status` enum('Paid','Pending') DEFAULT 'Pending',
  `payment_mode` varchar(50) DEFAULT NULL,
  `order_status` enum('Canceled','Pending','Paid') NOT NULL DEFAULT 'Pending',
  `status` enum('0','1','2') NOT NULL DEFAULT '1' COMMENT '0=in-active,1=active,2=deleted'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `tbl_auto_respond_mails`
--

CREATE TABLE `tbl_auto_respond_mails` (
  `id` int(11) NOT NULL,
  `email_section` varchar(80) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `email_subject` varchar(200) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `email_content` text CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `status` enum('0','1','2') CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL DEFAULT '1',
  `updated_on` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_auto_respond_mails`
--

INSERT INTO `tbl_auto_respond_mails` (`id`, `email_section`, `email_subject`, `email_content`, `status`, `updated_on`) VALUES
(1, 'Registration ', 'Welcome to {site_name}', '<table border=\"0\" style=\"width:100%\">\r\n <tbody>\r\n  <tr>\r\n   <td colspan=\"2\"><strong>Hi {mem_name},</strong></td>\r\n  </tr>\r\n  <tr>\r\n   <td colspan=\"2\">We are happy to have you as the newest member of {site_name}!</td>\r\n  </tr>\r\n  <tr>\r\n   <td colspan=\"2\">This is a registration email as per the details submitted by you. You are now registered on {site_name} with the following details:</td>\r\n  </tr>\r\n  <tr>\r\n   <td colspan=\"2\">&nbsp;</td>\r\n  </tr>\r\n  <tr>\r\n   <td><strong>Email ID:</strong></td>\r\n   <td>{username}</td>\r\n  </tr>\r\n  <tr>\r\n   <td><strong>Password:</strong></td>\r\n   <td>{password}</td>\r\n  </tr>\r\n  <tr>\r\n   <td colspan=\"2\">&nbsp;</td>\r\n  </tr>\r\n  <tr>\r\n   <td colspan=\"2\">Thanks again. We hope you will visit us again soon and put these special services to work for you.<br />\r\n   Please feel free to contact us if you have any questions at all.</td>\r\n  </tr>\r\n  <tr>\r\n   <td colspan=\"2\">&nbsp;</td>\r\n  </tr>\r\n  <tr>\r\n   <td colspan=\"2\">Thank you.<br />\r\n   {site_name} Customer Service<br />\r\n   Email: {admin_email}</td>\r\n  </tr>\r\n  <tr>\r\n   <td colspan=\"2\" style=\"text-align:center\">&copy; 2013 {site_name}. All right reserved.</td>\r\n  </tr>\r\n </tbody>\r\n</table>', '1', '2013-05-09 06:38:27'),
(2, 'Forgot Password', 'Forgot Password', '<table border=\"0\" style=\"width:100%\">\r\n <tbody>\r\n  <tr>\r\n   <td colspan=\"2\"><strong>Hi {mem_name},</strong></td>\r\n  </tr>\r\n  <tr>\r\n   <td colspan=\"2\">Your login details are as follows:</td>\r\n  </tr>\r\n  <tr>\r\n   <td colspan=\"2\">&nbsp;</td>\r\n  </tr>\r\n  <tr>\r\n   <td><strong>Email ID:</strong></td>\r\n   <td>{username}</td>\r\n  </tr>\r\n  <tr>\r\n   <td><strong>password:</strong></td>\r\n   <td>{password}</td>\r\n  </tr>\r\n  <tr>\r\n   <td colspan=\"2\">&nbsp;</td>\r\n  </tr>\r\n  <tr>\r\n   <td colspan=\"2\">Click here to login {link}</td>\r\n  </tr>\r\n  <tr>\r\n   <td colspan=\"2\">&nbsp;</td>\r\n  </tr>\r\n  <tr>\r\n   <td colspan=\"2\">Thank you.<br />\r\n   {site_name} Customer Service<br />\r\n   Email: {admin_email}</td>\r\n  </tr>\r\n  <tr>\r\n   <td colspan=\"2\" style=\"text-align:center\">&copy; 2013 {site_name}. All right reserved.</td>\r\n  </tr>\r\n </tbody>\r\n</table>', '1', '2013-05-08 05:01:25'),
(3, 'Refer To Friends', 'Refer a Friend', '<table align=\"center\" border=\"0\" cellpadding=\"0\" cellspacing=\"0\" style=\"border:2px solid #e9e9e9; margin-top:10px; width:600px\">\r\n <tbody>\r\n  <tr>\r\n   <td style=\"text-align:left\">Hi {friend_name},</td>\r\n  </tr>\r\n  <tr>\r\n   <td>\r\n   <p>{your_name} has recommended this {text}, as {your_name} thinks you would like it.<br />\r\n   <br />\r\n   To view the Deal details please click on the following link.<br />\r\n   <br />\r\n   {site_link}</p>\r\n\r\n   <p>Thanks and Regards,</p>\r\n\r\n   <p>{site_name} Team</p>\r\n   </td>\r\n  </tr>\r\n  <tr>\r\n   <td style=\"text-align:center\">&copy; 2013 {site_name}. All right reserved.</td>\r\n  </tr>\r\n </tbody>\r\n</table>', '1', '2013-05-08 05:03:53'),
(4, 'Enquiry ', 'Enquiry Received on', '<table border=\"0\" width=\"100%\">\r\n	<tbody>\r\n		<tr>\r\n			<td colspan=\"2\">\r\n				<strong>Dear {mem_name}</strong></td>\r\n		</tr>\r\n		<tr>\r\n			<td colspan=\"2\">\r\n				Enquiry&nbsp; has been submitted with following info :</td>\r\n		</tr>\r\n		<tr>\r\n			<td colspan=\"2\">\r\n				&nbsp;</td>\r\n		</tr>\r\n		<tr>\r\n			<td width=\"26%\">\r\n				<strong>email:</strong></td>\r\n			<td>\r\n				<span style=\"margin-top: 15px;\">{email}</span></td>\r\n		</tr>\r\n		<tr>\r\n			<td>\r\n				<strong>phone no.:</strong></td>\r\n			<td>\r\n				<span style=\"margin-top: 15px;\">{phone}</span></td>\r\n		</tr>\r\n		<tr>\r\n			<td>\r\n				<strong>comments:</strong></td>\r\n			<td>\r\n				<span style=\"margin-top: 15px;\">{comments}</span></td>\r\n		</tr>\r\n		<tr>\r\n			<td colspan=\"2\">\r\n				&nbsp;</td>\r\n		</tr>\r\n		<tr>\r\n			<td colspan=\"2\">\r\n				&nbsp;{link} to login</td>\r\n		</tr>\r\n	</tbody>\r\n</table>\r\n<br />\r\n<span style=\"margin-top: 15px;\">Thank you.<br />\r\n{site_name} Customer Service<br />\r\nEmail: {admin_email} </span>', '2', '2012-05-09 16:46:26'),
(5, 'Contact Us', 'Enquiry Received on', '<table border=\"0\" width=\"100%\">\r\n	<tbody>\r\n		<tr>\r\n			<td colspan=\"2\">\r\n				<strong>Dear {mem_name}</strong></td>\r\n		</tr>\r\n		<tr>\r\n			<td colspan=\"2\">\r\n				Enquiry&nbsp; has been submitted with following info :</td>\r\n		</tr>\r\n		<tr>\r\n			<td colspan=\"2\">\r\n				&nbsp;</td>\r\n		</tr>\r\n		<tr>\r\n			<td width=\"26%\">\r\n				<strong>email:</strong></td>\r\n			<td>\r\n				<span style=\"margin-top: 15px;\">{email}</span></td>\r\n		</tr>\r\n		<tr>\r\n			<td>\r\n				<strong>phone no.:</strong></td>\r\n			<td>\r\n				<span style=\"margin-top: 15px;\">{phone}</span></td>\r\n		</tr>\r\n		<tr>\r\n			<td>\r\n				<strong>comments:</strong></td>\r\n			<td>\r\n				<span style=\"margin-top: 15px;\">{comments}</span></td>\r\n		</tr>\r\n		<tr>\r\n			<td colspan=\"2\">\r\n				&nbsp;</td>\r\n		</tr>\r\n		<tr>\r\n			<td colspan=\"2\">\r\n				&nbsp;{link} to login</td>\r\n		</tr>\r\n	</tbody>\r\n</table>\r\n<br />\r\n<span style=\"margin-top: 15px;\">Thank you.<br />\r\n{site_name} Customer Service<br />\r\nEmail: {admin_email} </span>', '2', '2011-12-17 10:51:08'),
(6, 'Accept  circle requests', 'Circle  requests accepted', '<table border=\"0\" width=\"100%\">\n	<tbody>\n		<tr>\n			<td colspan=\"2\">\n				<strong>Dear {mem_name}</strong></td>\n		</tr>\n		<tr>\n			<td align=\"center\">\n				{user_pic}</td>\n			<td>\n				{poster_name} has joined&nbsp; your circle on {site_name}</td>\n		</tr>\n		<tr>\n			<td>\n				&nbsp;</td>\n			<td>\n				&nbsp;</td>\n		</tr>\n		<tr>\n			<td width=\"10%\">\n				&nbsp;</td>\n			<td>\n				To view {poster_name} profile {link}</td>\n		</tr>\n	</tbody>\n</table>\n<br />\n<span style=\"margin-top: 15px;\">Thank you.<br />\n{site_name} Customer Service<br />\nEmail: {admin_email} </span>', '2', '2012-09-13 16:48:37'),
(7, 'New circle Request', 'New circle request received ', '<table border=\"0\" width=\"100%\">\n	<tbody>\n		<tr>\n			<td colspan=\"4\">\n				<strong>Dear {mem_name}</strong></td>\n		</tr>\n		<tr>\n			<td align=\"center\">\n				{user_pic}</td>\n			<td colspan=\"3\">\n				{poster_name} invited you to join a circle on {site_name}</td>\n		</tr>\n		<tr>\n			<td>\n				&nbsp;</td>\n			<td colspan=\"3\">\n				&nbsp;</td>\n		</tr>\n		<tr>\n			<td width=\"9%\">\n				&nbsp;</td>\n			<td align=\"right\" valign=\"top\" width=\"7%\">\n				{accept}</td>\n			<td align=\"center\" valign=\"top\" width=\"1%\">\n				<strong>||</strong></td>\n			<td align=\"left\" valign=\"top\" width=\"83%\">\n				{decline}</td>\n		</tr>\n	</tbody>\n</table>\n<br />\n<span style=\"margin-top: 15px;\">Thank you.<br />\n{site_name} Customer Service<br />\nEmail: {admin_email} </span>', '2', '2012-05-07 16:39:58'),
(8, 'Wall Comment', 'A comment  on your wall', '<table border=\"0\" width=\"100%\">\r\n	<tbody>\r\n		<tr>\r\n			<td colspan=\"2\">\r\n				<strong>Dear {mem_name}</strong></td>\r\n		</tr>\r\n		<tr>\r\n			<td colspan=\"2\">\r\n				{poster_name} has commented on your wall.</td>\r\n		</tr>\r\n		<tr>\r\n			<td colspan=\"2\">\r\n				Please {link} to view the comment&nbsp;</td>\r\n		</tr>\r\n		<tr>\r\n			<td width=\"26%\">\r\n				&nbsp;</td>\r\n			<td>\r\n				&nbsp;</td>\r\n		</tr>\r\n	</tbody>\r\n</table>\r\n<br />\r\n<span style=\"margin-top: 15px;\">Thank you.<br />\r\n{site_name} Customer Service<br />\r\nEmail: {admin_email} </span>', '2', '2012-01-25 12:20:23'),
(9, 'Post comment on circle', 'Received  a new comment on your topic in a circle', '<table border=\"0\" width=\"100%\">\n	<tbody>\n		<tr>\n			<td colspan=\"2\">\n				<strong>Dear {mem_name}</strong></td>\n		</tr>\n		<tr>\n			<td colspan=\"2\">\n				{poster_name} has commented on&nbsp;your topic in a circle.</td>\n		</tr>\n		<tr>\n			<td colspan=\"2\">\n				Please {link} to view the comment&nbsp;</td>\n		</tr>\n		<tr>\n			<td width=\"26%\">\n				&nbsp;</td>\n			<td>\n				&nbsp;</td>\n		</tr>\n	</tbody>\n</table>\n<br />\n<span style=\"margin-top: 15px;\">Thank you.<br />\n{site_name} Customer Service<br />\nEmail: {admin_email} </span>', '2', '2012-05-09 15:23:53'),
(10, 'Post topic on circle', 'Receive new topic on circle', '<table border=\"0\" width=\"100%\">\r\n	<tbody>\r\n		<tr>\r\n			<td colspan=\"2\">\r\n				<strong>Dear {mem_name}</strong></td>\r\n		</tr>\r\n		<tr>\r\n			<td colspan=\"2\">\r\n				{poster_name} has posted topic on your circle.</td>\r\n		</tr>\r\n		<tr>\r\n			<td colspan=\"2\">\r\n				Please {link} to view the comment&nbsp;</td>\r\n		</tr>\r\n		<tr>\r\n			<td width=\"26%\">\r\n				&nbsp;</td>\r\n			<td>\r\n				&nbsp;</td>\r\n		</tr>\r\n	</tbody>\r\n</table>\r\n<br />\r\n<span style=\"margin-top: 15px;\">Thank you.<br />\r\n{site_name} Customer Service<br />\r\nEmail: {admin_email} </span>', '2', '2012-04-23 15:09:39'),
(11, 'Wall Topic Post', 'New post  on your wall', '<table border=\"0\" width=\"100%\">\n	<tbody>\n		<tr>\n			<td colspan=\"2\">\n				<strong>Dear {mem_name}</strong></td>\n		</tr>\n		<tr>\n			<td colspan=\"2\">\n				{poster_name} has posted {txt_name} on your wall.</td>\n		</tr>\n		<tr>\n			<td colspan=\"2\">\n				Please click here {link} to view the comment&nbsp;</td>\n		</tr>\n		<tr>\n			<td width=\"26%\">\n				abc</td>\n			<td>\n				&nbsp;</td>\n		</tr>\n	</tbody>\n</table>\n<br />\n<span style=\"margin-top: 15px;\">Thank you.<br />\n{site_name} Customer Service<br />\nEmail: {admin_email} </span>', '2', '2012-05-28 11:15:41'),
(12, 'New Trooper Request', 'New Trooper request', '<table border=\"0\" width=\"100%\">\n	<tbody>\n		<tr>\n			<td colspan=\"4\">\n				<strong>Dear {mem_name}</strong></td>\n		</tr>\n		<tr>\n			<td align=\"middle\">\n				{user_pic}</td>\n			<td colspan=\"3\">\n				{poster_name} wants to add you as a trooper&nbsp;on {site_name}</td>\n		</tr>\n		<tr>\n			<td>\n				&nbsp;</td>\n			<td colspan=\"3\">\n				&nbsp;</td>\n		</tr>\n		<tr>\n			<td width=\"9%\">\n				&nbsp;</td>\n			<td align=\"right\" valign=\"top\" width=\"7%\">\n				{accept}</td>\n			<td align=\"middle\" valign=\"top\" width=\"1%\">\n				<strong>||</strong></td>\n			<td align=\"left\" valign=\"top\" width=\"83%\">\n				{decline}</td>\n		</tr>\n	</tbody>\n</table>\n<br />\n<span style=\"margin-top: 15px\">Thank you.<br />\n{site_name} Customer Service<br />\nEmail: {admin_email} </span>', '2', '2012-05-08 15:27:26'),
(13, 'Accepts Trooper Request', 'Trooper request accepted', '<table border=\"0\" width=\"100%\">\n	<tbody>\n		<tr>\n			<td colspan=\"2\">\n				<strong>Dear {mem_name}</strong></td>\n		</tr>\n		<tr>\n			<td align=\"middle\">\n				{user_pic}</td>\n			<td>\n				{poster_name} accepted your&nbsp;trooper request&nbsp;on {site_name}</td>\n		</tr>\n		<tr>\n			<td>\n				&nbsp;</td>\n			<td>\n				&nbsp;</td>\n		</tr>\n		<tr>\n			<td width=\"10%\">\n				&nbsp;</td>\n			<td>\n				To view {poster_name} profile {link}</td>\n		</tr>\n	</tbody>\n</table>\n<br />\n<span style=\"margin-top: 15px\">Thank you.<br />\n{site_name} Customer Service<br />\nEmail: {admin_email} </span>', '2', '2012-05-08 14:46:17'),
(14, 'Event  Invition', 'Event  Invitation from a trooper ', '<table border=\"0\" style=\"width: 615px; height: 88px;\">\n	<tbody>\n		<tr>\n			<td colspan=\"4\">\n				<strong>Dear {mem_name}</strong></td>\n		</tr>\n		<tr>\n			<td align=\"left\" colspan=\"4\">\n				{poster_name} invited you to attened an event on {site_name} . {click_here_link}&nbsp; to view the event.</td>\n		</tr>\n	</tbody>\n</table>\n<br />\n<br />\n<span style=\"margin-top: 15px;\">Thank you.<br />\n{site_name} Customer Service<br />\nEmail: {admin_email} </span>', '2', '2012-09-13 17:17:08'),
(15, 'comments on my collections', 'comments received  on collection', '<table border=\"0\" width=\"100%\">\r\n	<tbody>\r\n		<tr>\r\n			<td colspan=\"2\">\r\n				<strong>Dear {mem_name}</strong></td>\r\n		</tr>\r\n		<tr>\r\n			<td colspan=\"2\">\r\n				{poster_name} has commented on your collection.</td>\r\n		</tr>\r\n		<tr>\r\n			<td colspan=\"2\">\r\n				Please {link} to view the comment&nbsp;</td>\r\n		</tr>\r\n		<tr>\r\n			<td width=\"26%\">\r\n				&nbsp;</td>\r\n			<td>\r\n				&nbsp;</td>\r\n		</tr>\r\n	</tbody>\r\n</table>\r\n<br />\r\n<span style=\"margin-top: 15px;\">Thank you.<br />\r\n{site_name} Customer Service<br />\r\nEmail: {admin_email} </span>', '2', '2012-05-07 13:10:21');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_banners`
--

CREATE TABLE `tbl_banners` (
  `banner_id` int(11) NOT NULL,
  `banner_position` varchar(100) DEFAULT NULL,
  `banner_image` varchar(200) DEFAULT NULL,
  `banner_url` varchar(170) DEFAULT NULL,
  `banner_page` varchar(30) DEFAULT NULL COMMENT 'Like : home page,category page',
  `status` enum('1','0') DEFAULT '1' COMMENT '1=Actice,0=Inactive',
  `clicks` int(11) NOT NULL DEFAULT '0',
  `banner_added_date` datetime DEFAULT NULL,
  `banner_start_date` datetime DEFAULT NULL,
  `banner_end_date` datetime DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_banners`
--

INSERT INTO `tbl_banners` (`banner_id`, `banner_position`, `banner_image`, `banner_url`, `banner_page`, `status`, `clicks`, `banner_added_date`, `banner_start_date`, `banner_end_date`) VALUES
(9, 'Bottom1', 'banner42rC.png', 'http://localhost/seychelles/category', '0', '1', 0, '2013-07-15 12:15:02', NULL, NULL),
(10, 'Bottom2', 'i-bnr1akGk.jpg', 'http://localhost/seychelles/category', '0', '1', 0, '2013-07-15 12:16:12', NULL, NULL),
(11, 'Bottom3', 'slide20b4D.jpg', 'http://localhost/seychelles/category', '0', '1', 0, '2013-07-15 12:16:32', NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `tbl_blog`
--

CREATE TABLE `tbl_blog` (
  `blog_id` int(11) NOT NULL,
  `blog_title` text CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `blog_image` varchar(255) CHARACTER SET utf8 COLLATE utf8_unicode_ci DEFAULT NULL,
  `blog_url` varchar(100) CHARACTER SET utf8 COLLATE utf8_unicode_ci DEFAULT NULL,
  `sort_description` text CHARACTER SET utf8 COLLATE utf8_unicode_ci,
  `blog_description` longtext CHARACTER SET utf8 COLLATE utf8_unicode_ci,
  `publisher` varchar(200) CHARACTER SET utf8 COLLATE utf8_unicode_ci DEFAULT NULL,
  `sort_order` int(11) DEFAULT NULL,
  `status` enum('1','0') DEFAULT '1',
  `recv_date` datetime DEFAULT NULL,
  `featured_news` enum('Y','N') CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL DEFAULT 'N',
  `up_date` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `tbl_categories`
--

CREATE TABLE `tbl_categories` (
  `category_id` int(11) NOT NULL,
  `category_name` varchar(100) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `friendly_url` varchar(100) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `category_image` varchar(255) CHARACTER SET utf8 COLLATE utf8_unicode_ci DEFAULT NULL,
  `category_description` text CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `parent_id` int(11) NOT NULL DEFAULT '0',
  `sort_order` int(3) DEFAULT NULL,
  `date_added` datetime NOT NULL DEFAULT '0000-00-00 00:00:00',
  `date_modified` datetime NOT NULL DEFAULT '0000-00-00 00:00:00',
  `status` enum('0','1','2') COLLATE utf8_bin NOT NULL DEFAULT '1' COMMENT '1=active,0=inactive,2=deleted',
  `meta_title` varchar(100) COLLATE utf8_bin DEFAULT NULL,
  `meta_keywords` varchar(100) COLLATE utf8_bin DEFAULT NULL,
  `meta_description` varchar(225) COLLATE utf8_bin DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_bin;

--
-- Dumping data for table `tbl_categories`
--

INSERT INTO `tbl_categories` (`category_id`, `category_name`, `friendly_url`, `category_image`, `category_description`, `parent_id`, `sort_order`, `date_added`, `date_modified`, `status`, `meta_title`, `meta_keywords`, `meta_description`) VALUES
(1, 'Start A Business', 'start-a-business', '', '0', 0, NULL, '2018-02-01 10:56:43', '0000-00-00 00:00:00', '1', NULL, NULL, NULL),
(2, 'Business  Registration', 'business-registration', '', '0', 1, NULL, '2018-02-01 10:58:41', '0000-00-00 00:00:00', '1', NULL, NULL, NULL),
(3, 'NGO Registration', 'ngo-registration', '', '0', 1, NULL, '2018-02-01 10:58:49', '0000-00-00 00:00:00', '1', NULL, NULL, NULL),
(4, 'Government Registrations', 'government-registrations', '', '0', 1, NULL, '2018-02-01 10:59:11', '0000-00-00 00:00:00', '1', NULL, NULL, NULL),
(5, 'Trademark & Patents', 'trademark-patents', '', '0', 1, NULL, '2018-02-01 11:00:37', '0000-00-00 00:00:00', '1', NULL, NULL, NULL),
(6, 'Business Agreements', 'business-agreements', '', '0', 1, NULL, '2018-02-01 11:00:59', '0000-00-00 00:00:00', '1', NULL, NULL, NULL),
(7, 'General Agreements', 'general-agreements', '', '0', 1, NULL, '2018-02-01 11:01:31', '0000-00-00 00:00:00', '1', NULL, NULL, NULL),
(9, 'Manage a business &Compliance', 'manage-a-business-', '', '0', 0, NULL, '2018-02-01 11:03:53', '0000-00-00 00:00:00', '1', NULL, NULL, NULL),
(10, 'Annual Compliance for Business', 'annual-compliance-for-business', '', '0', 9, NULL, '2018-02-01 11:04:56', '0000-00-00 00:00:00', '1', NULL, NULL, NULL),
(11, 'Change In Business', 'change-in-business', '', '0', 9, NULL, '2018-02-01 11:05:20', '0000-00-00 00:00:00', '1', NULL, NULL, NULL),
(12, 'Taxation & Audit', 'taxation-audit', '', '0', 9, NULL, '2018-02-01 11:05:43', '0000-00-00 00:00:00', '1', NULL, NULL, NULL),
(13, 'Advisory', 'advisory', '', '0', 0, NULL, '2018-03-15 10:11:53', '0000-00-00 00:00:00', '1', NULL, NULL, NULL),
(14, 'aa', 'aa', '', '0', 13, NULL, '2018-03-15 10:41:00', '0000-00-00 00:00:00', '1', NULL, NULL, NULL),
(15, 'ss', 'ss', '', '0', 13, NULL, '2018-03-15 10:41:07', '0000-00-00 00:00:00', '1', NULL, NULL, NULL),
(16, 'dd', 'dd', '', '0', 13, NULL, '2018-03-15 10:41:14', '0000-00-00 00:00:00', '1', NULL, NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `tbl_cms_pages`
--

CREATE TABLE `tbl_cms_pages` (
  `page_id` int(11) NOT NULL,
  `parent_id` int(11) NOT NULL DEFAULT '0',
  `page_name` varchar(255) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL DEFAULT '',
  `friendly_url` varchar(50) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `page_description` longtext CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `page_short_description` text CHARACTER SET utf8 COLLATE utf8_unicode_ci,
  `image` varchar(255) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `status` enum('0','1','2') CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL DEFAULT '1' COMMENT '0=Inactive,1=Active,2=Deleted',
  `page_updated_date` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_cms_pages`
--

INSERT INTO `tbl_cms_pages` (`page_id`, `parent_id`, `page_name`, `friendly_url`, `page_description`, `page_short_description`, `image`, `status`, `page_updated_date`) VALUES
(1, 0, 'About Us', 'about-us', '<p>about Lorem ipsum dolor sit amet, consectetur adipiscing elit. Fusce commodo urna eget risus lacinia varius. Nunc at aliquam enim. Morbi in metus eu enim blandit porttitor sit amet et nibh. Sed lectus ligula, lacinia non consectetur ac, fermentum et tortor. Donec libero neque, ullamcorper sit amet placerat eu, aliquam interdum enim. Aenean accumsan tellus nec velit vehicula ac dictum eros ultricies. Vestibulum nunc enim, elementum eget placerat in, elementum ut mi. Praesent vel est ac tellus iaculis egestas. Curabitur sollicitudin, urna suscipit porttitor vestibulum, ligula neque faucibus felis, non posuere diam ante eget enim.<br />\r\n&nbsp;</p>\r\n', 'ABOUT US', '', '1', '2018-02-01 14:50:19'),
(4, 0, 'Contact Us', 'contact-us', '<h3>Say Hello</h3>\n\n<h6>Sales inquiries</h6>\n\n<p>Call us: +91 9953286789</p>\n\n<p>Email us: info@megaviasors.com</p>\n\n<h6>Order Status:</h6>\n\n<p>Call us: +91 9953286789</p>\n\n<p>Email us: info@megavisors.com</p>\n\n<h6>Careers</h6>\n\n<p>Email us: info@megavisors.com</p>\n', 'We trust that those who challenge today will do amazing things tomorrow. If you\'re as eager about the opportunities as we are,do contact us.', '', '1', '2018-03-11 05:57:39'),
(5, 0, 'Terms And Conditions', 'terms-and-conditions', '<p style=\"text-align: justify;\"><strong><u>Terms of Use:</u></strong></p>\n\n<p style=\"text-align: justify;\"><strong>Welcome to Megavisors.com</strong></p>\n\n<p style=\"text-align: justify;\">Since we will not be meeting face to face, it is important to set out the terms of the agreement clearly in advance.</p>\n\n<p style=\"text-align: justify;\">If you have any queries about Megavisors, please do not hesitate to contact us. In this agreement, we have referred to the Megavisors service as the &quot;service&quot;, to you as the &quot;user&quot; and to our agreement as the &quot;agreement&quot;.</p>\n\n<p style=\"text-align: justify;\">If you wish to use our &quot;Common Needs&quot; feature, you affirm that you are more than 18 years of age and are fully able and competent to enter into the terms, conditions, obligations, affirmations, representations, and warranties consequent to the creation of the documents, and are aware of the same. Kindly call us for further assistance.</p>\n\n<p style=\"text-align: justify;\">&nbsp;</p>\n\n<p style=\"text-align: justify;\"><strong>I. MEGAVISORS.COM ONLY PROVIDES A MEDIUM FOR INTERACTION</strong></p>\n\n<p style=\"text-align: justify;\">Megavisors is an internet portal that facilitates communication between legal professionals and potential users of legal services. Megavisors acts as a venue for providers and consumers of legal services to exchange information with the goal of eventually forming a professional relationship. Megavisors does not guarantee that users will successfully find an advocate/lawyer/attorney through this system. Megavisors takes no position and offers no opinion on when or if a lawyer-client relationship has been formed. In order to provide an optimal forum for lawyers and clients, Megavisors does not involve itself in the agreements between lawyers and clients or the actual representation of clients. Therefore, we cannot ensure the completion of the agreement or the integrity of either party. The user, and not Megavisors, is solely responsible for assessing the integrity, honesty, and trustworthiness of all persons with whom the user communicates on this service.</p>\n\n<p style=\"text-align: justify;\">(a) Disclaimer of lawyer-client relationship Megavisors is not an agent of any particular lawyer. It only facilitates the communication of lawyers and potential clients. Any electronic communication sent to Megavisors alone will not create a lawyer-client relationship between the user and Megavisors, such being expressly denied.</p>\n\n<p style=\"text-align: justify;\">(b) Megavisors does not promote any User. Megavisors seeks to help every needy litigant find a lawyer best suited to his/her needs. Megavisors is not intended to be a source of advertising or solicitation and the contents of the website should not be construed as legal advice. Megavisors may recommend a subscribing lawyer if he matches a user&#39;s requirements, but not otherwise. Transmission, receipt or use of Megavisors does not constitute or create a lawyer-client relationship. No recipients of content from this website should act, or refrain from acting, based upon any or all of the contents of this site. We welcome the user to study the profiles of lawyers independently and make an informed choice.</p>\n\n<p style=\"text-align: justify;\">(c) Specifically, Megavisors does not provide any avenue for solicitation Megavisors hides information about clients from lawyers until the client communicates with the lawyer directly or online. Therefore, the lawyer is not allowed to view private information about potential clients.</p>\n\n<p style=\"text-align: justify;\">(d) Megavisors does not provide Legal Advice, Megavisors &#39;Common Needs&#39; feature uses only user supplied content to produce basic documents. The information provided in the &#39;FAQs&#39; section also does not amount to legal advice, such merely being commonly asked queries about Will making, Lease Agreement drafting, Cheque Dishonour notices, Money recovery notices, Power of Attorney to collect rent and other documents which may be added from time to time. Users are advised to consult a lawyer if they need specialized guidance on any of these documents.</p>\n\n<p style=\"text-align: justify;\">(e) &#39;Common Needs&#39;- Resale of Forms Prohibited, Megavisors grants you a limited, personal, non-exclusive, non-transferable license to use our &quot;Common Needs&quot; feature for your own personal use, or if you are an attorney or professional, for your client. Except as otherwise provided, you acknowledge and agree that you have no right to modify, edit, copy, reproduce, create derivative works of, reverse engineer, alter, enhance or in any way exploit any of the Forms in any manner, except for modifications in filling out the Forms for your authorized use. By ordering a document from Megavisors, you agree that the document you purchase may only be used by you for your personal or business use or used by you in connection with your client and may not be sold or redistributed without the express written consent of Megavisors. Reselling or distributing without permission amounts to a violation of Megavisors&#39;s exclusive copyright and is liable to prosecution.</p>\n\n<p style=\"text-align: justify;\">(f) Disclaimer of representations by users Megavisors makes no representation, guarantee, or warranty (express or implied) as to the legal ability, competence, or quality of representation which may be provided by any of the lawyers or law firms which are listed through this site or any affiliate thereof.</p>\n\n<p style=\"text-align: justify;\">&nbsp;</p>\n\n<p style=\"text-align: justify;\"><strong>II. USER GUIDELINES</strong></p>\n\n<p style=\"text-align: justify;\">The users of Megavisors are granted a nonexclusive, limited right to access and use the service in accordance with the rules that are described in this contract. In order to keep this system attractive and useful for all users, it is important that users follow the rules of the system. Megavisors reserves the right to deny further access to its service to any user who violates these rules, is the subject of complaints by other Megavisors users or for any other reason. Users engaged in any of the following activities on our system will not be tolerated:</p>\n\n<p style=\"text-align: justify;\">&middot; Foul or otherwise inappropriate language.</p>\n\n<p style=\"text-align: justify;\">&middot; Racist, hateful, or otherwise offensive comments.</p>\n\n<p style=\"text-align: justify;\">&middot; Promote or provide instructional information about illegal activities, or promoting physical harm or injury against any group or individual.</p>\n\n<p style=\"text-align: justify;\">&middot; Defame any person or group which includes people of all ages, races, religions, and nationalities.</p>\n\n<p style=\"text-align: justify;\">&middot; Violate the rights of another, including but not limited to the intellectual property rights of another. This includes using the service for acts of copyright, trademark, patent, trade secret, or other intellectual property infringement, including but not limited to offering pirated computer programs or links to such programs, information used to circumvent manufacturer-installed copy-protect devices, including serial or registration numbers for software programs, or any type of cracker utilities (this also includes files which are solely intended for game emulation).</p>\n\n<p style=\"text-align: justify;\">&middot; Violate Internet standards.</p>\n\n<p style=\"text-align: justify;\">&middot; Use the service for displaying harassing, abusive, threatening, harmful, vulgar, obscene, or tortuous material or invading other&#39;s privacy.</p>\n\n<p style=\"text-align: justify;\">&middot; Interfere with or disrupting the service or servers or networks connected to the service by posting advertisements or links to competing services, transmitting &quot;junk mail&quot;, &quot;spam&quot;, &quot;chain letters&quot;, or unsolicited mass distribution of e-mail.</p>\n\n<p style=\"text-align: justify;\">&middot; Compromise the security of the service Megavisors provides. Please do not try to gain access to system areas private to Megavisors, or to other users.</p>\n\n<p style=\"text-align: justify;\">&nbsp;</p>\n\n<p style=\"text-align: justify;\"><strong>III. DISCLAIMER OF INFORMATION OBTAINED ON THE SERVICE AND SOME USER SUPPLIED CONTENT</strong></p>\n\n<p style=\"text-align: justify;\">(a) Disclaimer of information obtained on the Service Megavisors provides lawyers and potential clients with a forum whereby people who need legal representation or help are connected to providers of it. Megavisors is a resource for informational purposes and is intended, but not promised or guaranteed to be correct, complete, and up-to-date. The accuracy, completeness or adequacy of Megavisors is not warranted or guaranteed. Megavisors further assumes no liability for the interpretation and/or use of the information contained on this website. The owner of this website does not intend links from this site to other websites to be referrals to, endorsements of, or affiliations with the linked entities. Megavisors is not responsible for, and makes no representations or warranties about the contents of websites to which links may be provided from this website.</p>\n\n<p style=\"text-align: justify;\">Megavisors will make every effort to ensure that promotional material of a user trying to promote himself on the website is deleted. Apart from this, the opinions and views expressed are those of the individual users of the service and do not reflect those of Megavisors. Data submitted by other users (lay persons) is not verified or reviewed in any way before it appears on the Megavisors website. Please use due caution when using this site.</p>\n\n<p style=\"text-align: justify;\">Megavisors makes every effort to verify that lawyers who subscribe to the service are licensed and in good standing with the local bar at the time of registration. However, Megavisors cannot track, verify, or monitor the standing of each lawyer using the Service. Therefore, Megavisors makes no representation regarding the status, standing or ability of any lawyer or law firm that is listed on the site.</p>\n\n<p style=\"text-align: justify;\">Users are urged to make their own independent investigation and evaluation of any lawyer or law firm being considered. The determination of the need for legal services and the choice of a lawyer are extremely important decisions and should not be based solely on claims of expertise, or on the cost of rendering the requested legal services. Megavisors is not responsible for, and in no way endorses any description or indication of specialization or limitation of practice by a lawyer or law firm. Efforts will be made to avoid false information, but please be aware that no agency or board may have certified such lawyer as a specialist or expert in any indicated field of law practice. In addition, a lawyer claiming specialization is not necessarily any more competent than other lawyers. It is up to the user to question the lawyers on the factual basis of any statement they make, ask for the names of the certifying agencies, and verify all information.</p>\n\n<p style=\"text-align: justify;\">Users are encouraged to use caution when reviewing any information submitted by lawyers and other parties. Although Megavisors requires lawyers to comply with all regulations governing lawyer conduct, it is impossible for Megavisors to monitor lawyers&#39; integrity.</p>\n\n<p style=\"text-align: justify;\">Megavisors in no way endorses the content or legality of any offers, statements, or promises made by lawyers or any other parties, on or off this site.</p>\n\n<p style=\"text-align: justify;\">(b) Disclaimer of content supplied by users in the form of reviews, comments, communications, and other content At various locations on the Site, Megavisors may permit visitors to post reviews, comments, and other content (the &quot;user content&quot;). Megavisors is not the publisher or author of such user content. It only stores and disseminates the ideas and opinions that Megavisors members may choose to post and distribute as user content. Megavisors disclaims all responsibility for this content. If any offending material is brought to the notice of Megavisors, it will be deleted as soon as is possible. Whether such material is indeed offending will be finally be left to the discretion of Megavisors.</p>\n\n<p style=\"text-align: justify;\">&nbsp;</p>\n\n<p style=\"text-align: justify;\"><strong>IV. LIMITATIONS ON USE</strong></p>\n\n<p style=\"text-align: justify;\">The contents of Megavisors are for personal use only and not for commercial exploitation. You may not decompile, reverse engineer, disassemble, rent, lease, loan, sell, sublicense, or create derivative works from Megavisors. Nor may you use any network monitoring or discovery software to determine the site architecture, or extract information about usage or users. You may not use any robot, spider, other automatic device, or manual process to monitor or copy the contents without taking prior written permission from Megavisors. You may not copy, modify, reproduce, republish, distribute, display, or transmit for commercial, non-profit or public purposes all or any portion of Megavisors, except to the extent permitted above. You may not use or otherwise export or re-export Megavisors or any portion available on or through Megavisors in violation of the export control laws and regulations of India. Any unauthorized use of Megavisors or its content is prohibited.</p>\n\n<p style=\"text-align: justify;\">&nbsp;</p>\n\n<p style=\"text-align: justify;\"><strong>V. CONFIDENTIALITY</strong></p>\n\n<p style=\"text-align: justify;\">Megavisors makes every effort to maintain the confidentiality of any information submitted by users to our system and our database of lawyers. The user is however warned that the use of the internet or e-mail for confidential or sensitive information is susceptible to risks that inevitably arise on this medium. Additionally, because Megavisors cannot control the conduct of others, we cannot guarantee that this information will remain confidential. Please use caution in deciding what information to input into the System. Do not make any confessions or admissions. The user should preferably describe their issue or dispute in the general terms only. Specific information should only be revealed after the user has selected an advocate/lawyer/attorney and made contact outside the service (e.g. via telephone or appointment). Subscribing lawyers using this service should refrain from asking any user to reveal any specific or confidential information through the service. Megavisors is not responsible for the release or improper use of such information by users or any release due to error or failure in the System.</p>\n\n<p style=\"text-align: justify;\">&nbsp;</p>\n\n<p style=\"text-align: justify;\"><strong>VI. INDEMNIFICATION</strong></p>\n\n<p style=\"text-align: justify;\">The user agrees that Megavisors is not responsible for any harm that his/her use of this service may cause. The user agrees to indemnify, defend, and hold Megavisors harmless from and against any and all liability and costs incurred in connection with any loss, liability, claim, demand, damage, and expenses arising from or in connection with the contents or use of the service. The user agrees that this defense and indemnity shall also apply to any breach by the user of the agreement or the foregoing representations, warranties and covenants. The user further agrees that this defense and indemnity shall include without limitation lawyer fees and costs. The user also agrees that this defense and indemnity shall apply to Megavisors, its founders, officers and employees. Megavisors reserves the right, at its own expense, to assume the exclusive defense and control of any matter otherwise subject to indemnification by the user and the user shall not in any event settle any matter without the written consent of Megavisors.</p>\n\n<p style=\"text-align: justify;\">&nbsp;</p>\n\n<p style=\"text-align: justify;\"><strong>VII. COMMUNICATIONS AND OTHER DATA</strong></p>\n\n<p style=\"text-align: justify;\">Megavisors is not responsible for any loss of data resulting from accidental or deliberate deletion, network or system outages, backup failure, file corruption, or any other reasons.</p>\n\n<p style=\"text-align: justify;\">&nbsp;</p>\n\n<p style=\"text-align: justify;\"><strong>VIII. LICENSE OF YOUR CONTENTS TO MEGAVISORS</strong></p>\n\n<p style=\"text-align: justify;\">By uploading content to or submitting any materials for use on Megavisors, you grant (or warrant that the owner of such rights has expressly granted) Megavisors a perpetual, royalty-free, irrevocable, non-exclusive right and license to use, reproduce, modify, adapt, publish, translate, create derivative works from and distribute such materials or incorporate such materials into any form, medium, or technology now known or later developed. Megavisors however gives an assurance that any information of a sensitive nature will not be intentionally disclosed and revealed to any third party.</p>\n\n<p style=\"text-align: justify;\">&nbsp;</p>\n\n<p style=\"text-align: justify;\"><strong>IX. MEGAVISORS PROPRIETARY RIGHTS</strong></p>\n\n<p style=\"text-align: justify;\">Except as expressly provided in these terms and conditions, nothing contained herein shall be construed as conferring any license or right, by implication, estoppels or otherwise, under copyright or other intellectual property rights. The user agrees that the content and Web Site are protected by copyright, trademark, service marks, patents or other proprietary rights and laws. The user acknowledges and agrees that the user is permitted to use this material and information only as expressly authorized by Megavisors, and may not copy, reproduce, transmit, distribute, or create derivative works of such content or information without express authorization. The user acknowledges and agrees that Megavisors can display images and text throughout the Service. Users cannot extract and publish any information from the system, either electronically or in print, without the permission of Megavisors and the permission of all other concerned parties. This is not a complete list - other things on the system are also Megavisors property. Contact Megavisors before copying anything from the system with plans of reproducing it or distributing it.</p>\n\n<p style=\"text-align: justify;\">&nbsp;</p>\n\n<p style=\"text-align: justify;\"><strong>X. LINKING TO MEGAVISORS.COM</strong></p>\n\n<p style=\"text-align: justify;\">Users are welcome to provide links to the homepage of Megavisors, provided they do not remove or obscure, by framing or otherwise, any portion of the homepage and that you discontinue providing links to the site if requested by Megavisors.</p>\n\n<p style=\"text-align: justify;\">&nbsp;</p>\n\n<p style=\"text-align: justify;\"><strong>XI. ADVERTISERS</strong></p>\n\n<p style=\"text-align: justify;\">Megavisors may contain advertising and sponsorship. Advertisers and sponsors are responsible for ensuring that material submitted for inclusion on Megavisors is accurate and complies with applicable laws. Megavisors will not be responsible for the illegality of or any error or inaccuracy in advertisers&#39; or sponsors&#39; materials.</p>\n\n<p style=\"text-align: justify;\">&nbsp;</p>\n\n<p style=\"text-align: justify;\"><strong>XII. REGISTRATION</strong></p>\n\n<p style=\"text-align: justify;\">Certain sections of Megavisors may require you to register. If registration is requested, you agree to provide Megavisors with accurate and complete registration information. It is your responsibility to inform Megavisors of any changes to that information. Each registration is for a single person only, unless specifically designated otherwise on the registration page. Megavisors does not permit:</p>\n\n<p style=\"text-align: justify;\">a) any other person using the registered sections under your name; or</p>\n\n<p style=\"text-align: justify;\">b) access through a single name being made available to multiple users on a network. You are responsible for preventing such unauthorized use.</p>\n\n<p style=\"text-align: justify;\">If you believe there has been unauthorized use, please notify Megavisors immediately by contacting us. If we find that unauthorized use is being made of Megavisors and the services we provide, the right of any or many users may be terminated.</p>\n\n<p style=\"text-align: justify;\">&nbsp;</p>\n\n<p style=\"text-align: justify;\"><strong>XIII. ERRORS AND CORRECTIONS</strong></p>\n\n<p style=\"text-align: justify;\">Megavisors does not represent or warrant that the service will be error-free, free of viruses or other harmful components, or that defects will be corrected. Megavisors may make improvements and/or changes to its features, functionality or service at any time.</p>\n\n<p style=\"text-align: justify;\">&nbsp;</p>\n\n<p style=\"text-align: justify;\"><strong>XIV. THIRD PARTY CONTENT</strong></p>\n\n<p style=\"text-align: justify;\">Third party content may appear on Megavisors or may be accessible via links from Megavisors. Megavisors is not responsible for and assumes no liability for any mistakes, misstatements of law, defamation, slander, libel, omissions, falsehood, obscenity or profanity in the statements, opinions, representations or any other form of information contained in any third-party content appearing on Megavisors. You understand that the information and opinions in the third-party content is neither endorsed by nor does it reflect the belief of Megavisors.</p>\n\n<p style=\"text-align: justify;\">&nbsp;</p>\n\n<p style=\"text-align: justify;\"><strong>XV. UNLAWFUL ACTIVITY</strong></p>\n\n<p style=\"text-align: justify;\">Megavisors reserves the right to investigate complaints or reported violations of the Agreement and to take any action, Megavisors deems appropriate including but not limited to reporting any suspected unlawful activity to law enforcement officials, regulators, or other third parties and disclosing any information necessary or appropriate to such persons or entities relating to user profiles, e-mail addresses, usage history, posted materials, IP addresses and traffic information.</p>\n\n<p style=\"text-align: justify;\">&nbsp;</p>\n\n<p style=\"text-align: justify;\"><strong>XVI. REMEDIES FOR VIOLATIONS</strong></p>\n\n<p style=\"text-align: justify;\">Megavisors reserves the right to seek all remedies available at law and in equity for violations of the Agreement, including but not limited to the right to block access from a particular Internet address to Megavisors and its features.</p>\n\n<p style=\"text-align: justify;\">&nbsp;</p>\n\n<p style=\"text-align: justify;\"><strong>XVII. CONFLICTS CHECKS</strong></p>\n\n<p style=\"text-align: justify;\">The user understands that a registered lawyer will not be able to and will not perform a check for conflicts of interest between the user and other clients of the registered lawyer prior to responding to a request. Conflict checks require the user to provide their name and contact information and the identity of any affiliated entities, opposing individuals and entities, and such other information as a lawyer may require. Conflict checks by a registered lawyer who obtains information from the user through this service are not possible since submissions by the user to the subscribing lawyer are not sufficient to enable the subscribing lawyer to conduct such a check.</p>\n\n<p style=\"text-align: justify;\">&nbsp;</p>\n\n<p style=\"text-align: justify;\"><strong>XVIII. SEVERABILITY OF PROVISIONS</strong></p>\n\n<p style=\"text-align: justify;\">The Agreement and the Privacy Policy constitute the entire agreement with respect to the use of the service provided by Megavisors. If any provision of these terms and conditions is unlawful, void or unenforceable then that provision shall be deemed severable from the remaining provisions and shall not affect their validity and enforceability.</p>\n\n<p style=\"text-align: justify;\">&nbsp;</p>\n\n<p style=\"text-align: justify;\"><strong>XIX. MODIFICATIONS TO TERMS OF USE</strong></p>\n\n<p style=\"text-align: justify;\">Megavisors may change the agreement at any time. The user will be responsible for checking the Terms and Conditions before use. Use of the service after the change will indicate acceptance of the new terms and conditions.</p>\n\n<p style=\"text-align: justify;\">&nbsp;</p>\n\n<p style=\"text-align: justify;\"><strong>XX. MODIFICATIONS TO SERVICE</strong></p>\n\n<p style=\"text-align: justify;\">Megavisors reserves the right to modify or discontinue, temporarily or permanently, the service with or without notice to the user. The user agrees that Megavisors shall not be liable to the user or any third party for any modification or discontinuance of the service. The user acknowledges and agrees that any termination of service under any provision of this agreement may be effected without prior notice, and acknowledges and agrees that Megavisors may immediately delete data and files in the user&#39;s account and bar any further access to such files or the Service.</p>\n\n<p style=\"text-align: justify;\">&nbsp;</p>\n\n<p style=\"text-align: justify;\"><strong>XXI. DISCLAIMER OF WARRANTIES AND LIMITATION OF LIABILITY</strong></p>\n\n<p style=\"text-align: justify;\">A great danger for Megavisors, and for all operators of online systems, is that we might be held accountable for the wrongful actions of our users. If one user libels another user, the injured user might blame us, even though the first user was really at fault. If a user uploads a program with a computer virus, and the other users&#39; computers are damaged, we might be blamed even though a user left the virus on our System. If a user transmits illegal or improper information to another user, we might be blamed even though we did nothing more than unknowingly carry the message from one user to another. Accordingly, we need all users to accept responsibility for their own acts, and to accept that an act by another user that damages them must not be blamed on us, but only on the other user.</p>\n\n<p style=\"text-align: justify;\">Although it is the goal of Megavisors to provide users with reliable and quality systems, we may make mistakes or experience system failure from time to time. Such problems are inevitable in operating a system of this size. We would not be able to make this system available to users if we had to accept blame or financial liability for any usability problems, system failures or errors, or mistakes or damages of any kind. In order to continue offering and improving our service, Megavisors must deny any warranties on this service and state that our liability for any problems connected with the use of our system is strictly limited.</p>\n\n<p style=\"text-align: justify;\">&nbsp;</p>\n\n<p style=\"text-align: justify;\">These needs are accomplished by the following disclaimers:</p>\n\n<p style=\"text-align: justify;\">(a) Disclaimer of Warranties: The user expressly agrees that use of the service is at the user&#39;s sole risk. The service is provided on an &quot;as is&quot; and &quot;as available&quot; basis. Megavisors expressly disclaims all warranties of any kind, whether express or implied, including, but not limited to the implied warranties of merchantability, fitness for a particular purpose and non-infringement. Megavisors makes no warranty that the service will meet a user&#39;s requirements, that the service will be uninterrupted, timely, secure, or error-free; nor does Megavisors make any warranty as to the results that may be obtained from the use of the service or as to the accuracy or reliability of any information obtained through the service or that defects in the software will be corrected. Megavisors makes no warranty regarding any goods or services purchased or information obtained through the service or any transactions entered into through the service.</p>\n\n<p style=\"text-align: justify;\">No advice or information, whether oral or written, obtained by the User from Megavisors shall create any warranty not expressly stated herein.</p>\n\n<p style=\"text-align: justify;\">(b) Limitation of Liability: The user agrees that Megavisors shall not be liable for any direct, indirect, incidental, special or consequential damages resulting from the use or the inability to use the service or for the cost of procurement of substitute goods and services or resulting from any goods or services purchased or obtained or messages received or transactions entered into through or from the service or resulting from unauthorized access to or alteration of user&#39;s transmissions or data, including, but not limited to damages for loss of profits, use, data or other intangibles, even if Megavisors has been advised of the possibility of such damages. The user further agrees that Megavisors shall not be liable for any damages arising from interruption, suspension or termination of service, including, but not limited to direct, indirect, incidental, special, consequential or exemplary damages, whether or not such interruption, suspension or termination was justified, negligent, intentional or inadvertent.</p>\n\n<p style=\"text-align: justify;\">&nbsp;</p>\n\n<p style=\"text-align: justify;\"><strong>XXII. ARBITRATION</strong></p>\n\n<p style=\"text-align: justify;\">Any controversy or claim arising out of or relating to this Agreement or Megavisors services shall be settled by binding Arbitration in accordance with laws of India. Any such controversy or claim shall be arbitrated on an individual basis, and shall not be consolidated in any arbitration with any claim or controversy of any other party. Any other dispute or disagreement of a legal nature will also be decided in accordance with the laws of India, and the Courts of Delhi, India shall have jurisdiction in all such cases.</p>\n\n<p style=\"text-align: justify;\">&nbsp;</p>\n\n<p style=\"text-align: justify;\"><strong>XXIII. OWNERSHIP</strong></p>\n\n<p style=\"text-align: justify;\">This Site is owned and operated by Megavisors. All right, title and interest in and to the materials provided on this Site, including but not limited to information, documents, logos, graphics, sounds and images (the &quot;Materials&quot;) are owned by Megavisors. Except as otherwise expressly provided by Megavisors, none of the materials may be copied, reproduced, republished, downloaded, uploaded, posted, displayed, transmitted or distributed in any way and nothing on this Site shall be construed to confer any license under any of Megavisors&#39;s intellectual property rights, whether by estoppel, implication or otherwise. Contact us if you have any questions about obtaining such licenses. Megavisors does not sell, license, lease or otherwise provide any of the materials other than those specifically identified as being provided by Megavisors. Any rights not expressly granted herein are reserved by Megavisors.</p>\n\n<p style=\"text-align: justify;\">&nbsp;</p>\n\n<p style=\"text-align: justify;\"><strong>XXIV. ENTIRE AGREEMENT</strong></p>\n\n<p style=\"text-align: justify;\">This agreement constitutes the entire and whole agreement between user and Megavisors, and is intended as a complete and exclusive statement of the terms of the agreement. This agreement shall supersede all other communications between Megavisors and its users with respect to the subject matter hereof and supersedes and replaces all prior or contemporaneous understandings or agreements, written or oral, regarding such subject matter. If at any time you find these Terms and Conditions unacceptable or if you do not agree to these Terms and Conditions, please do not use this Site. We may revise these Terms and Conditions at any time without notice to you. It is your responsibility to review these Terms and Conditions periodically.</p>\n\n<p style=\"text-align: justify;\">By using Megavisors services or accessing the Megavisors site, you acknowledge that you have read these terms and conditions and agree to be bound by them.</p>\n\n<p style=\"text-align: justify;\">&nbsp;</p>\n\n<p style=\"text-align: justify;\"><strong>XXV. INDEMNIFICATION</strong></p>\n\n<p style=\"text-align: justify;\">You agree to defend, indemnify and hold harmless Megavisors, our officers, directors, shareholders, employees and agents from and against any and all claims, liabilities, damages, losses or expenses, including reasonable attorneys&#39; fees and costs, arising out of or in any way connected with your access to or use of the site and the materials.</p>\n\n<p style=\"text-align: justify;\">&nbsp;</p>\n\n<p style=\"text-align: justify;\"><strong>XXVI. CANCELLATION AND REFUND POLICY</strong></p>\n\n<p style=\"text-align: justify;\">We strive to ensure that the services you avail through our website are to your full satisfaction, and are the best in the Industry at extremely reasonable and affordable rates. However, there may arise situations when you desire a refund. Firstly, when you pay for the services but later on decide that you do not wish to avail them. Secondly, when there is a delay in the services offered from our side, beyond the time frame we have intimated to you, due to human error i.e., factors for which we are solely responsible. Thirdly, although we highly doubt it, you might find our services unsatisfactory. In all three situations, kindly send in an e-mail to on the Ticket that has been created in your name, marking a copy to info@Megavisors.com. We would like to clarify that only refunds of the professional fees component of the charges paid by you shall be considered for a refund.</p>\n\n<p style=\"text-align: justify;\">Upon receiving your mail, the Senior Management at Megavisors shall decide on whether your request for a refund should be processed, contingent on the reasons for such a request. Please note that we reserve the right to take the final and binding decision with regard to requests for refund. Most importantly, we wish to clarify that in cases outside our control, including but not limited to national holidays, department holidays, delays on the part of the Government of India, the respective State Governments, Our affiliates or elsewhere, acts of war, acts of God, earthquake, riot, sabotage, labour shortage or dispute, internet interruption, power disruption, lack of phone network connectivity, technical failures, breakage of sea cable, hacking, piracy, we shall not liable for any delays. If we confirm your request for refund, subject to the terms and conditions mentioned herein or elsewhere, we will send you an e-mail seeking the details required to refund the amount which may include your Bank Account details such as the account number and the IFS code of the branch in question. Kindly note that it will take us a minimum of about 48-72 working hours from the receipt of all such information to process the refund and initiate the transfer. We reiterate once again that only the professional fees paid for our services shall be refunded, subject to the discretion of the Senior Management at Megavisors.com</p>\n\n<p style=\"text-align: justify;\">We assure you that we are continuously working to improve our services and are we are welcome to any suggestions from your end. For any other queries please contact out customer service desk at info@Megavisors.com</p>\n', 'Terms And Conditions', '', '1', '2018-02-23 07:17:15');
INSERT INTO `tbl_cms_pages` (`page_id`, `parent_id`, `page_name`, `friendly_url`, `page_description`, `page_short_description`, `image`, `status`, `page_updated_date`) VALUES
(6, 0, 'Privacy Policy', 'privacy-policy', '<p style=\"text-align: justify;\"><u>1. GENERAL</u></p>\n\n<p style=\"text-align: justify;\">a) This document is an electronic record in terms of Information Technology Act, 2000 and rules there under as applicable and the amended provisions pertaining to electronic records in various statutes as amended by the Information Technology Act, 2000. This electronic record is generated by a computer system and does not require any physical or digital signatures.</p>\n\n<p style=\"text-align: justify;\">b) This document is published in accordance with the provisions of Rule 3 (1) of the Information Technology (Intermediaries guidelines) Rules, 2011 that require publishing the rules and regulations, privacy policy and Terms of Use for access or usage of megavisors.com</p>\n\n<p style=\"text-align: justify;\">c) The domain name www.megavisors.com(&quot;Website&quot;), is owned and operated by Modet India ITeS Pvt. Ltd.(&ldquo;Company&rdquo;) a Private Company limited by shares, incorporated under the provisions of the Companies Act, 2013, and having its registered office at 306-A, BG-06, Paschim Vihar, New Delhi-110063, where such expression shall, unless repugnant to the context thereof, be deemed to include its respective representatives, administrators, employees, directors, officers, agents and their successors and assigns.</p>\n\n<p style=\"text-align: justify;\">d) For the purpose of this Privacy Policy (&ldquo;Policy&rdquo;), wherever the context so requires,</p>\n\n<p style=\"text-align: justify;\">i) The term &lsquo;You&rsquo; &amp; &lsquo;User&rsquo; shall mean any legal person or entity accessing or using the services provided on this Website, who is competent to enter into binding contracts, as per the provisions of the Indian Contract Act, 1872;</p>\n\n<p style=\"text-align: justify;\">ii) The terms &lsquo;We&rsquo;, &lsquo;Us&rsquo;&amp; &lsquo;Our&rsquo; shall mean the Website and/or the Company, as the context so requires.</p>\n\n<p style=\"text-align: justify;\">iii) The terms &lsquo;Party&rsquo; &amp; &lsquo;Parties&rsquo; shall respectively be used to refer to the User and the Company individually and collectively, as the context so requires.</p>\n\n<p style=\"text-align: justify;\">e) The headings of each section in this Policy are only for the purpose of organizing the various provisions under this Policy in an orderly manner, and shall not be used by either Party to interpret the provisions contained herein in any manner. Further, it is specifically agreed to by the Parties that the headings shall have no legal or contractual value.</p>\n\n<p style=\"text-align: justify;\">f) The use of the Website by the User is solely governed by this Policy as well as the Terms of Use of the Website (&ldquo;Terms&rdquo;, available at www.megavisors.com), and any modifications or amendments made thereto by the Company from time to time, at its sole discretion. Visiting the home page of the Website and/or using any of the services provided on the Website shall be deemed to signify the User&rsquo;s unequivocal acceptance of this Policy and the aforementioned Terms, and the User expressly agrees to be bound by the same. The User expressly agrees and acknowledges that the Terms and Policy are co-terminus, and that expiry / termination of either one will lead to the termination of the other.</p>\n\n<p style=\"text-align: justify;\">&nbsp;</p>\n\n<p style=\"text-align: justify;\">g) The User unequivocally agrees that this Policy and the aforementioned Terms constitute a legally binding agreement between the User and the Company, and that the User shall be subject to the rules, guidelines, policies, terms, and conditions applicable to any service that is provided by the Website, and that the same shall be deemed to be incorporated into the Terms, and shall be treated as part and parcel of the same. The User acknowledges and agrees that no signature or express act is required to make these Terms and the Policy binding on the User, and that the User&rsquo;s act of visiting any part of the Website constitutes the User&rsquo;s full and final acceptance of the Policy and the aforementioned Terms.</p>\n\n<p style=\"text-align: justify;\">h) The Parties expressly agree that the Company retains the sole and exclusive right to amend or modify the Policy and the aforementioned Terms without any prior permission or intimation to the User, and the User expressly agrees that any such amendments or modifications shall come into effect immediately. The User has a duty to periodically check the Policy and Terms, and stay updated on their provisions and requirements. If the User continues to use the Website following such a change, the User will be deemed to have consented to any and all amendments / modifications made to the Policy and Terms. In so far as the User complies with the Policy and Terms, he/she is granted a personal, non-exclusive, non-transferable, revocable, limited privilege to enter, access and use the Website.</p>\n\n<p style=\"text-align: justify;\">&nbsp;</p>\n\n<p style=\"text-align: justify;\"><u>2. COLLECTION OF PERSONAL AND OTHER INFORMATION</u></p>\n\n<p style=\"text-align: justify;\">a) The User expressly agrees and acknowledges that the Company collects and stores the User&rsquo;s personal information, which is provided by the User from time to time on the Website, including but not limited to the User&rsquo;s user name, passwords, email address, name, address, age, date of birth, sex, nationality, shopping preferences, browsing history, etc., as well as any images or other information uploaded/published by the User on the Website. The User is aware that this information will be used by the Company/Website to provide services and features targeted at the User, that are most likely to meet the User&rsquo;s needs, and also to customize and improve the Website to make its users&rsquo; experiences safer and easier.</p>\n\n<p style=\"text-align: justify;\">b) The User is aware that the Company/Website may automatically track certain information about the User based upon the User&rsquo;s IP address and the User&rsquo;s behaviour on the Website, and the User expressly consents to the same. The User is aware that this information is used to do internal research on user demographics, interests, and behaviour, to enable the Company/Website to better understand, and cater to the interests of its users. The User is expressly made aware that such information may include the URL that the User visited prior to accessing the Website, the URL which the User subsequently visits (whether or not these URLs form a part of the Website), the User&rsquo;s computer &amp; web browser information, the User&rsquo;s IP address, etc.</p>\n\n<p style=\"text-align: justify;\">&nbsp;</p>\n\n<p style=\"text-align: justify;\">c) If the User chooses to purchase products / services from the Website, the User consents to allowing the Company/Website to collect information about the User&rsquo;s buying behaviour and trends.</p>\n\n<p style=\"text-align: justify;\">d) If the User chooses to post messages / reviews / feedback anywhere on the Website, including but not limited to message boards, chat rooms, other message areas, etc., the User is aware that any and all such information provided / uploaded will be collected and stored by the Company indefinitely, and that such retained information may be used to resolve disputes, provide customer support, troubleshoot problems, etc., and that such information, if requested, may be provided to judicial or governmental authorities of requisite jurisdiction, or otherwise used by the Company/Website as permitted by applicable laws.</p>\n\n<p style=\"text-align: justify;\">e) The User is aware that any and all information pertaining to the User collected by the Company, whether or not directly provided by the User to the Company/Website, including but not limited to personal correspondence such as emails or letters, feedback from other users or third parties regarding the User&rsquo;s activities or postings on the Website, etc., may be collected and complied by the Company/Website into a file/folder specifically created for / allotted to the User, and the User hereby expressly consents to the same.</p>\n\n<p style=\"text-align: justify;\">f) The User is aware that while he/she can browse some sections of the Website without being a registered user, certain activities (such as placing an order) require the User to provide valid personal information to the Company/Website for the purpose of registration. The User is aware that the contact information provided to the Company/Website may be used to send the User offers and promotions, whether or not based on the User&rsquo;s previous orders and interests, and the User hereby expressly consents to receiving the same.</p>\n\n<p style=\"text-align: justify;\">g) The User is aware that the Company/Website may occasionally request the User to complete optional online surveys. These surveys may require the User to provide contact information and demographic information (like zip code, age, income bracket, sex, etc.). The User is aware that this data to is used to customise the Website for the benefit of the User, and providing all users of the Website with products/services/content that the Company/Website believes they might be interested in availing of, and also to display content according to the User&rsquo;s preferences.</p>\n\n<p style=\"text-align: justify;\">h) The User is further aware that the Company/Website may occasionally request the User to write reviews for products/services purchased/availed of by the User from the Website, and also reviews for the various sellers listing their products/services on the Website. The User is aware that such reviews will help other users of the website make prudent and correct purchases, and also help the Company/Website remove sellers whose products are unsatisfactory in any way, and the User hereby expressly authorises the Company/Website to publish any and all reviews written by the User on the Website, along with the User&rsquo;s name and certain contact details, for the benefit and use of other Users of the Website.</p>\n\n<p style=\"text-align: justify;\">i) Nothing contained herein shall be deemed to compel the Website/Company to store, upload, publish, or display in any manner content/reviews/surveys/feedback submitted by the User, and the User hereby expressly authorises the Website/Company to remove from the Website any such content, review, survey, or feedback submitted by the User, without cause or being required to notify the User of the same.</p>\n\n<p style=\"text-align: justify;\">&nbsp;</p>\n\n<p style=\"text-align: justify;\"><u>3. COOKIES</u></p>\n\n<p style=\"text-align: justify;\">a) The User is aware that a &lsquo;Cookie&rsquo; is a small piece of information stored by a web server on a web browser, so it can later be traced back from that particular browser, and that cookies are useful for enabling the browser to remember information specific to a given user, including but not limited to a User&rsquo;s login identification, password, etc. The User is aware that the Website places both permanent and temporary cookies in the User&rsquo;s computer&#39;s hard drive and web browser, and does hereby expressly consent to the same.</p>\n\n<p style=\"text-align: justify;\">b) The User is further aware that the Website uses data collection devices such as cookies on certain pages of the Website to help analyse web page flow, measure promotional effectiveness, and promote trust and safety, and that certain features of the Website are only available through the use of such cookies. While the User is free to decline the Website&rsquo;s cookies if the User&rsquo;s browser permits, the User may consequently be unable to use certain features on the Website</p>\n\n<p style=\"text-align: justify;\">c) Additionally, the User is aware that he/she might encounter &lsquo;cookies&rsquo; or other similar devices on certain pages of the Website that are placed by third parties or affiliates of the Company/Website. The User expressly agrees and acknowledges that the Company/Website does not control the use of such cookies/other devices by third parties, that the Company/Website is in no way responsible for the same, and that the User assumes any and all risks in this regard.</p>\n\n<p style=\"text-align: justify;\">&nbsp;</p>\n\n<p style=\"text-align: justify;\"><u>4. DIVULGING/SHARING OF PERSONAL INFORMATION</u></p>\n\n<p style=\"text-align: justify;\">a) The User is aware that the Website/Company may share the User&rsquo;s personal information with other corporate entities and affiliates to help detect and prevent identity theft, fraud and other potentially illegal acts; correlate related or multiple accounts to prevent abuse of the Website&rsquo;s services; and to facilitate joint or co-branded services, where such services are provided by more than one corporate entity.</p>\n\n<p style=\"text-align: justify;\">b) The User is aware that the Website/Company may disclose personal information if required to do so by law or if the Website/Company in good faith believes that such disclosure is reasonably necessary to respond to subpoenas, court orders, or other legal processes. The Website/Company may also disclose the User&rsquo;s personal information to law enforcement offices, third party rights owners, or other third parties if it believes that such disclosure is reasonably necessary to enforce the Terms or Policy; respond to claims that an advertisement, posting or other content violates the rights of a third party; or protect the rights, property or personal safety of its users, or the general public.</p>\n\n<p style=\"text-align: justify;\">c) The User is further aware that the Website/Company and its affiliates may share / sell some or all of the User&rsquo;s personal information with other business entities should the Company/Website (or its assets) plan to merge with, or be acquired by such business entity, or in the event of re-organization, amalgamation, or restructuring of the Company&rsquo;s business. Such business entity or new entity will continue to be bound be the Terms and Policy, as may be amended from time to time.</p>\n\n<p style=\"text-align: justify;\">&nbsp;</p>\n\n<p style=\"text-align: justify;\"><u>5. SECURITY</u></p>\n\n<p style=\"text-align: justify;\">Transactions on the Website are secure and protected. Any information entered by the User when transacting on the Website is encrypted to protect the User against unintentional disclosure to third parties. The User&rsquo;s credit and debit card information is not received, stored by or retained by the Company / Website in any manner. This information is supplied by the User directly to the relevant payment gateway which is authorized to handle the information provided, and is compliant with the regulations and requirements of various banks and institutions and payment franchisees that it is associated with.</p>\n\n<p style=\"text-align: justify;\">&nbsp;</p>\n\n<p style=\"text-align: justify;\"><u>6. THIRD PARTY ADVERTISEMENTS / PROMOTIONS</u></p>\n\n<p style=\"text-align: justify;\">The User is aware that the Company/Website uses third-party advertising companies to serve ads to the users of the Website. The User is aware that these companies may use information relating to the User&rsquo;s visits to the Website and other websites in order to provide customised advertisements to the User. Furthermore, the Website may contain links to other websites that may collect personally identifiable information about the User. The Company/Website is not responsible for the privacy practices or the content of any of the aforementioned linked websites, and the User expressly acknowledges the same and agrees that any and all risks associated will be borne entirely by the User.</p>\n\n<p style=\"text-align: justify;\">&nbsp;</p>\n\n<p style=\"text-align: justify;\"><u>7. USER&rsquo;S CONSENT</u></p>\n\n<p style=\"text-align: justify;\">By using the Website and/ or by providing information to the Company through the Website, the User consents to the collection and use of the information disclosed by the User on the Website in accordance with this Policy, including but not limited to the User&rsquo;s consent the Company/Website sharing/divulging the User&rsquo;s information, as per the terms contained hereinabove in Section 4 of the Policy.</p>\n\n<p style=\"text-align: justify;\">&nbsp;</p>\n\n<p style=\"text-align: justify;\"><u>8. GRIEVANCE OFFICER</u></p>\n\n<p style=\"text-align: justify;\">In accordance with Information Technology Act 2000 and rules made there under, the name and contact details of the Grievance Officer are provided below: Nand Lal Mishra (E-mail: nand@megavisors.com)</p>\n\n<p style=\"text-align: justify;\">&nbsp;</p>\n\n<p style=\"text-align: justify;\"><u>9. DISPUTE RESOLUTION AND JURISDICTION</u></p>\n\n<p style=\"text-align: justify;\">It is expressly agreed to by the Parties hereto that the formation, interpretation and performance of this Policy and any disputes arising herefrom will be resolved through a two-step Alternate Dispute Resolution (&ldquo;ADR&rdquo;) mechanism. It is further agreed to by the Parties that the contents of this Section shall survive even after the termination or expiry of the Policy and/or Terms.</p>\n\n<p style=\"text-align: justify;\">a) <strong>Mediation</strong>: In case of any dispute between the parties, the Parties will attempt to resolve the same amicably amongst themselves, to the mutual satisfaction of both Parties. In the event that the Parties are unable to reach such an amicable solution within thirty (30) days of one Party communicating the existence of a dispute to the other Party, the dispute will be resolved by arbitration, as detailed hereinbelow.</p>\n\n<p style=\"text-align: justify;\">b) <strong>Arbitration</strong>: In the event that the Parties are unable to amicably resolve a dispute by mediation, said dispute will be referred to arbitration by a sole arbitrator to be appointed by the Company, and the award passed by such sole arbitrator will be valid and binding on both Parties. The Parties shall bear their own costs for the proceedings, although the sole arbitrator may, in his/her sole discretion, direct either Party to bear the entire cost of the proceedings. The arbitration shall be conducted in English, and the seat of Arbitration shall be the city of New Delhi in the state of Delhi, India.</p>\n\n<p style=\"text-align: justify;\">The Parties expressly agree that the Terms, Policy and any other agreements entered into between the Parties are governed by the laws, rules and regulations of India, and that the Courts at Delhi, shall have exclusive jurisdiction over any disputes arising between the Parties.</p>\n', 'Privacy Policy', '', '1', '2018-02-23 07:16:24'),
(7, 0, 'Welcome to Kidstuff Seychelles', 'welcome_kidstuff', '<p class=\"red b\">welcome At ShopClues.com, we provide world class shipping to all our customers that includes inspection, fast &amp; on-time delivery, top quality packaging, insurance for the package, and timely communication at each stage of shipping. We completely understand that once you buy merchandise online, the biggest question usually is &quot;Where is my stuff?&quot; - well at ShopClues.com, we address that worry by promising you &quot;No Anxiety Shipping&quot;. This means that once you have bought a product at our site, we take care of everything so you don&#39;t have to be anxious about anything.</p>\r\n', '', '', '2', '2013-07-05 05:11:57'),
(12, 0, 'Partner with Us', 'partner-with-us', '<p><span style=\"color:rgb(187, 187, 187); font-family:montserrat,sans-serif\">about Lorem ipsum dolor sit amet, consectetur adipiscing elit. Fusce commodo urna eget risus lacinia varius. Nunc at aliquam enim. Morbi in metus eu enim blandit porttitor sit amet et nibh. Sed lectus ligula, lacinia non consectetur ac, fermentum et tortor. Donec libero neque, ullamcorper sit amet placerat eu, aliquam interdum enim. Aenean accumsan tellus nec velit vehicula ac dictum eros ultricies. Vestibulum nunc enim, elementum eget placerat in, elementum ut mi. Praesent vel est ac tellus iaculis egestas. Curabitur sollicitudin, urna suscipit porttitor vestibulum, ligula neque faucibus felis, non posuere diam ante eget enim.</span><br />\r\n<br />\r\n<span style=\"color:rgb(187, 187, 187); font-family:montserrat,sans-serif\">Nulla volutpat arcu sed tellus suscipit dictum. Pellentesque ornare neque a ante iaculis cursus. Aliquam posuere dapibus rhoncus. Fusce dignissim rhoncus nunc vel bibendum. Donec imperdiet nisl condimentum mauris lobortis et commodo nisi suscipit. Etiam dictum sapien ac tellus commodo facilisis.</span></p>\r\n', NULL, '', '1', '2018-02-13 08:02:50'),
(13, 0, 'Get In Touch', 'get-in-touch', '<p><span style=\"color:rgb(187, 187, 187); font-family:montserrat,sans-serif\">about Lorem ipsum dolor sit amet, consectetur adipiscing elit. Fusce commodo urna eget risus lacinia varius. Nunc at aliquam enim. Morbi in metus eu enim blandit porttitor sit amet et nibh. Sed lectus ligula, lacinia non consectetur ac, fermentum et tortor. Donec libero neque, ullamcorper sit amet placerat eu, aliquam interdum enim. Aenean accumsan tellus nec velit vehicula ac dictum eros ultricies. Vestibulum nunc enim, elementum eget placerat in, elementum ut mi. Praesent vel est ac tellus iaculis egestas. Curabitur sollicitudin, urna suscipit porttitor vestibulum, ligula neque faucibus felis, non posuere diam ante eget enim.</span><br />\r\n<br />\r\n<span style=\"color:rgb(187, 187, 187); font-family:montserrat,sans-serif\">Nulla volutpat arcu sed tellus suscipit dictum. Pellentesque ornare neque a ante iaculis cursus. Aliquam posuere dapibus rhoncus. Fusce dignissim rhoncus nunc vel bibendum. Donec imperdiet nisl condimentum mauris lobortis et commodo nisi suscipit. Etiam dictum sapien ac tellus commodo facilisis.</span></p>\r\n', NULL, '', '1', '2018-02-13 08:04:21'),
(14, 0, 'Careers', 'careers', '<p>&nbsp;</p>\r\n\r\n<p><span style=\"color:rgb(187, 187, 187); font-family:montserrat,sans-serif\">about Lorem ipsum dolor sit amet, consectetur adipiscing elit. Fusce commodo urna eget risus lacinia varius. Nunc at aliquam enim. Morbi in metus eu enim blandit porttitor sit amet et nibh. Sed lectus ligula, lacinia non consectetur ac, fermentum et tortor. Donec libero neque, ullamcorper sit amet placerat eu, aliquam interdum enim. Aenean accumsan tellus nec velit vehicula ac dictum eros ultricies. Vestibulum nunc enim, elementum eget placerat in, elementum ut mi. Praesent vel est ac tellus iaculis egestas. Curabitur sollicitudin, urna suscipit porttitor vestibulum, ligula neque faucibus felis, non posuere diam ante eget enim.</span><br />\r\n<br />\r\n<span style=\"color:rgb(187, 187, 187); font-family:montserrat,sans-serif\">Nulla volutpat arcu sed tellus suscipit dictum. Pellentesque ornare neque a ante iaculis cursus. Aliquam posuere dapibus rhoncus. Fusce dignissim rhoncus nunc vel bibendum. Donec imperdiet nisl condimentum mauris lobortis et commodo nisi suscipit. Etiam dictum sapien ac tellus commodo facilisis.</span></p>\r\n', '', '', '1', '2018-02-13 08:06:27'),
(15, 0, 'Refund Policy', 'refund-policy', '<p><strong><u>Refund Policy</u></strong></p>\n\n<p>We ensure you that all the services, being best in the Industry upto maximum extent that is possible and at extremely reasonable and affordable rates, you are going to avail from our website shall be provided with a view to provide you, the full satisfaction.</p>\n\n<p>However, if any situation arise, where you find any problem in availing any service or getting dissatisfied due to any other reason mutually agreed upon, because of which you desire to have refund of your money, you may avail so, subject to the reasons covered under the following criterion:</p>\n\n<p><strong><u>First:</u></strong> when you have paid for availing any service, which you don&rsquo;t desire to avail thereafter.</p>\n\n<p><strong><u>Second:</u></strong> if there is any delay beyond the stipulated &amp; mutually agreed time in providing the services you have asked for from our side, that may be due to human error i.e., factors for which we shall be solely responsible.</p>\n\n<p><strong><u>Third:</u></strong> if you find yourself unsatisfied for the services you availed from us, which, however, comes under the skeptical vision as we provide our services in the&nbsp; best, affluent and efficient manner as best as possible.</p>\n\n<p>On falling in all or any of the above mentioned three situations, kindly allow us to have an e-mail on the Ticket that has been raised in your name, sending a copy to info@megavisors.com</p>\n\n<p>For a better clarification, we would like to reveal you about the refund policy that the professional fee out of the entire fund paid by you for availing any service shall be regarded as the amount that can be refunded if desired so.</p>\n\n<p>Thereafter, the request for the refund, if to be proceeded or not depending upon the contingent reasons which if fall under the pre-decided criterion or not, shall be decided by the Senior Management at Megavisors on making profound analysis for the same upon receiving your mail.</p>\n\n<p>We also clarify that we shall not be responsible for any delay caused because of the acts which are not in the control of our hands, the list of such acts is inclusive that implies that the matter stated in it is not limited upto this extent only, impliedly it&rsquo;s not having the exclusive matter, few of which are mentioned hereunder; department holidays, national holidays, delays on the part of the Government of India or of any other respective State Governments, Our affiliates, war, acts of God, earthquake, riot, sabotage, labour shortage or dispute, Technical default like internet interruption, power disruption, bad phone network connectivity and other technical failures like breakage of sea cable, hacking, piracy etc.</p>\n\n<p>Upon confirming your request for refund, if did so, subject to the terms and conditions mentioned herein or elsewhere for the same, we shall ask for the relevant information required for making such refund possible via an e-mail, viz. Bank details, including account number and the IFS code of the same.</p>\n\n<p>Please note that it shall take at least 48-72 working hours for processing for the refund from the date of receipt of all required information provided by you for the same, therefore please be patient &amp; hold on faith.</p>\n\n<p>We hereby enlightening you once again that only the professional fees paid for availing any services out of the entire fund paid by you for the same shall be refunded, subject to the discretion of the Senior Management at Megavisors.com.</p>\n\n<p>We assure you further that we are consistently working upon ourselves to make our services better therefore, we are pleased to welcome everybody to make any kind of recommendations or suggestions for our betterment from their end. For any other further information or queries you may contact us at our customer service desk at info@megavisors.com</p>\n', 'Refund Policy', '', '1', '2018-02-23 11:29:47'),
(16, 0, 'Connect with us', 'connect', '<p><strong>Call us: </strong>+91- 9953286789</p>\n\n<p><strong>Email us: </strong>info@megavisors.com</p>\n\n<p><strong>Delhi Office:</strong></p>\n\n<p>First Floor, A-81, Sector-04, Noida-201301.</p>\n', 'connect', '', '1', '2018-03-11 05:44:19'),
(17, 0, 'Helping Small Businesses', 'helping-small-businesses', '<p>Lorem ipsum dolor sit amet, consectetur adi pisi cing elit, sed do eiusmod tempor exercitationemut labore. Lorem ipsum dolor sit amet, consectetur adi pisi cing elit, sed do eiusmod tempor exercitationemut labore.</p>\r\n', NULL, '', '1', '2018-02-02 10:45:15'),
(20, 0, 'Resources', 'resources', '<p>about Lorem ipsum dolor sit amet, consectetur adipiscing elit. Fusce commodo urna eget risus lacinia varius. Nunc at aliquam enim. Morbi in metus eu enim blandit porttitor sit amet et nibh. Sed lectus ligula, lacinia non consectetur ac, fermentum et tortor. Donec libero neque, ullamcorper sit amet placerat eu, aliquam interdum enim. Aenean accumsan tellus nec velit vehicula ac dictum eros ultricies. Vestibulum nunc enim, elementum eget placerat in, elementum ut mi. Praesent vel est ac tellus iaculis egestas. Curabitur sollicitudin, urna suscipit porttitor vestibulum, ligula neque faucibus felis, non posuere diam ante eget enim.</p>\r\n', NULL, '', '1', '2018-02-02 11:28:58'),
(21, 0, 'Our Offerings!', 'our-offer', '<p>Honestly, We Love Start-ups! The mere idea of doing business trying to do something new gives an adrenaline rush to us and so we just love to promote them and help them achieve success.</p>\n\n<p>&nbsp;</p>\n\n<p>To promote the start-ups and budding entrepreneurs, we offer our Free Advisory Services to Bootstrap Start-ups. Starting from the Ideation of their business model&nbsp;to innovation of their products, we help them create the basic and the required viable products to at-least kick-start their business plan and sit for fund-raising.</p>\n\n<p>&nbsp;</p>\n\n<p>But, we know that be it a start-up or an MNC future security from legal discrepancies is one of the most vital thing for any business to start and succeed.</p>\n\n<p>Therefore, to save our budding entrepreneurs and securing their start-up from future disputes we help them in preparing their Founder&rsquo;s Agreement.</p>\n\n<p>&nbsp;</p>\n\n<p>To get guidance from our experts more on this,&nbsp;</p>\n', '', '', '1', '2018-03-11 05:47:34'),
(22, 0, 'We offer Highly Collaborative & Personalized Business Transformation Advisory Services', 'collaborative', '<p><strong>Have an Idea but don&rsquo;t know how to execute it? Don&rsquo;t worry we are there to help you!</strong></p>\n\n<p>Stop keeping your business ideas with yourself.&nbsp; Share it with us and our team of experts will help you transform your idea into a fruitful business.</p>\n\n<p>You just need to sit back and wait for the formulation of your idea meanwhile our team will start the process of Ideation while taking care of all the Innovation and Execution work with the perspective of the long-term growth of the business.</p>\n\n<p>&nbsp;</p>\n\n<p><strong>How do we do it?</strong></p>\n\n<p>Turning dreams into reality isn&rsquo;t an easy task. But we at Megavisors, with the help of our assessment process, designs the tailored business solutions to help your business grow.</p>\n\n<p>Our team of experts designs the implementation plan for your dream business and helps it turn into reality through a step by step, thoroughly designed Execution Plan.</p>\n\n<p>The plans with which the team comes up doesn&rsquo;t only meet the purpose of establishing the Business but also helps in the growth of the Business. Thus, with this growth driven approach of ours will help your dreams turn into reality.</p>\n\n<p><strong>So what are you waiting for? </strong></p>\n\n<p><strong>Just share your Ideas or Drop your Queries and our experts will assist you with the best possible solutions.</strong></p>\n\n<p><strong>We are here to help you&nbsp;</strong></p>\n', '', '', '1', '2018-03-11 05:38:01');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_countries`
--

CREATE TABLE `tbl_countries` (
  `country_id` int(11) NOT NULL,
  `name` varchar(128) COLLATE utf8_bin NOT NULL,
  `iso_code_2` varchar(2) COLLATE utf8_bin NOT NULL DEFAULT '',
  `iso_code_3` varchar(3) COLLATE utf8_bin NOT NULL DEFAULT '',
  `status` int(1) NOT NULL DEFAULT '1'
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_bin;

--
-- Dumping data for table `tbl_countries`
--

INSERT INTO `tbl_countries` (`country_id`, `name`, `iso_code_2`, `iso_code_3`, `status`) VALUES
(1, 'Afghanistan', 'AF', 'AFG', 1),
(2, 'Albania', 'AL', 'ALB', 1),
(3, 'Algeria', 'DZ', 'DZA', 1),
(4, 'American Samoa', 'AS', 'ASM', 1),
(5, 'Andorra', 'AD', 'AND', 1),
(6, 'Angola', 'AO', 'AGO', 1),
(7, 'Anguilla', 'AI', 'AIA', 1),
(8, 'Antarctica', 'AQ', 'ATA', 1),
(9, 'Antigua and Barbuda', 'AG', 'ATG', 1),
(10, 'Argentina', 'AR', 'ARG', 1),
(11, 'Armenia', 'AM', 'ARM', 1),
(12, 'Aruba', 'AW', 'ABW', 1),
(13, 'Australia', 'AU', 'AUS', 1),
(14, 'Austria', 'AT', 'AUT', 1),
(15, 'Azerbaijan', 'AZ', 'AZE', 1),
(16, 'Bahamas', 'BS', 'BHS', 1),
(17, 'Bahrain', 'BH', 'BHR', 1),
(18, 'Bangladesh', 'BD', 'BGD', 1),
(19, 'Barbados', 'BB', 'BRB', 1),
(20, 'Belarus', 'BY', 'BLR', 1),
(21, 'Belgium', 'BE', 'BEL', 1),
(22, 'Belize', 'BZ', 'BLZ', 1),
(23, 'Benin', 'BJ', 'BEN', 1),
(24, 'Bermuda', 'BM', 'BMU', 1),
(25, 'Bhutan', 'BT', 'BTN', 1),
(26, 'Bolivia', 'BO', 'BOL', 1),
(27, 'Bosnia and Herzegowina', 'BA', 'BIH', 1),
(28, 'Botswana', 'BW', 'BWA', 1),
(29, 'Bouvet Island', 'BV', 'BVT', 1),
(30, 'Brazil', 'BR', 'BRA', 1),
(31, 'British Indian Ocean Territory', 'IO', 'IOT', 1),
(32, 'Brunei Darussalam', 'BN', 'BRN', 1),
(33, 'Bulgaria', 'BG', 'BGR', 1),
(34, 'Burkina Faso', 'BF', 'BFA', 1),
(35, 'Burundi', 'BI', 'BDI', 1),
(36, 'Cambodia', 'KH', 'KHM', 1),
(37, 'Cameroon', 'CM', 'CMR', 1),
(38, 'Canada', 'CA', 'CAN', 1),
(39, 'Cape Verde', 'CV', 'CPV', 1),
(40, 'Cayman Islands', 'KY', 'CYM', 1),
(41, 'Central African Republic', 'CF', 'CAF', 1),
(42, 'Chad', 'TD', 'TCD', 1),
(43, 'Chile', 'CL', 'CHL', 1),
(44, 'China', 'CN', 'CHN', 1),
(45, 'Christmas Island', 'CX', 'CXR', 1),
(46, 'Cocos (Keeling) Islands', 'CC', 'CCK', 1),
(47, 'Colombia', 'CO', 'COL', 1),
(48, 'Comoros', 'KM', 'COM', 1),
(49, 'Congo', 'CG', 'COG', 1),
(50, 'Cook Islands', 'CK', 'COK', 1),
(51, 'Costa Rica', 'CR', 'CRI', 1),
(52, 'Cote D\'Ivoire', 'CI', 'CIV', 1),
(53, 'Croatia', 'HR', 'HRV', 1),
(54, 'Cuba', 'CU', 'CUB', 1),
(55, 'Cyprus', 'CY', 'CYP', 1),
(56, 'Czech Republic', 'CZ', 'CZE', 1),
(57, 'Denmark', 'DK', 'DNK', 1),
(58, 'Djibouti', 'DJ', 'DJI', 1),
(59, 'Dominica', 'DM', 'DMA', 1),
(60, 'Dominican Republic', 'DO', 'DOM', 1),
(61, 'East Timor', 'TP', 'TMP', 1),
(62, 'Ecuador', 'EC', 'ECU', 1),
(63, 'Egypt', 'EG', 'EGY', 1),
(64, 'El Salvador', 'SV', 'SLV', 1),
(65, 'Equatorial Guinea', 'GQ', 'GNQ', 1),
(66, 'Eritrea', 'ER', 'ERI', 1),
(67, 'Estonia', 'EE', 'EST', 1),
(68, 'Ethiopia', 'ET', 'ETH', 1),
(69, 'Falkland Islands (Malvinas)', 'FK', 'FLK', 1),
(70, 'Faroe Islands', 'FO', 'FRO', 1),
(71, 'Fiji', 'FJ', 'FJI', 1),
(72, 'Finland', 'FI', 'FIN', 1),
(73, 'France', 'FR', 'FRA', 1),
(74, 'France, Metropolitan', 'FX', 'FXX', 1),
(75, 'French Guiana', 'GF', 'GUF', 1),
(76, 'French Polynesia', 'PF', 'PYF', 1),
(77, 'French Southern Territories', 'TF', 'ATF', 1),
(78, 'Gabon', 'GA', 'GAB', 1),
(79, 'Gambia', 'GM', 'GMB', 1),
(80, 'Georgia', 'GE', 'GEO', 1),
(81, 'Germany', 'DE', 'DEU', 1),
(82, 'Ghana', 'GH', 'GHA', 1),
(83, 'Gibraltar', 'GI', 'GIB', 1),
(84, 'Greece', 'GR', 'GRC', 1),
(85, 'Greenland', 'GL', 'GRL', 1),
(86, 'Grenada', 'GD', 'GRD', 1),
(87, 'Guadeloupe', 'GP', 'GLP', 1),
(88, 'Guam', 'GU', 'GUM', 1),
(89, 'Guatemala', 'GT', 'GTM', 1),
(90, 'Guinea', 'GN', 'GIN', 1),
(91, 'Guinea-bissau', 'GW', 'GNB', 1),
(92, 'Guyana', 'GY', 'GUY', 1),
(93, 'Haiti', 'HT', 'HTI', 1),
(94, 'Heard and Mc Donald Islands', 'HM', 'HMD', 1),
(95, 'Honduras', 'HN', 'HND', 1),
(96, 'Hong Kong', 'HK', 'HKG', 1),
(97, 'Hungary', 'HU', 'HUN', 1),
(98, 'Iceland', 'IS', 'ISL', 1),
(99, 'India', 'IN', 'IND', 1),
(100, 'Indonesia', 'ID', 'IDN', 1),
(101, 'Iran (Islamic Republic of)', 'IR', 'IRN', 1),
(102, 'Iraq', 'IQ', 'IRQ', 1),
(103, 'Ireland', 'IE', 'IRL', 1),
(104, 'Israel', 'IL', 'ISR', 1),
(105, 'Italy', 'IT', 'ITA', 1),
(106, 'Jamaica', 'JM', 'JAM', 1),
(107, 'Japan', 'JP', 'JPN', 1),
(108, 'Jordan', 'JO', 'JOR', 1),
(109, 'Kazakhstan', 'KZ', 'KAZ', 1),
(110, 'Kenya', 'KE', 'KEN', 1),
(111, 'Kiribati', 'KI', 'KIR', 1),
(112, 'North Korea', 'KP', 'PRK', 1),
(113, 'Korea, Republic of', 'KR', 'KOR', 1),
(114, 'Kuwait', 'KW', 'KWT', 1),
(115, 'Kyrgyzstan', 'KG', 'KGZ', 1),
(116, 'Lao People\'s Democratic Republic', 'LA', 'LAO', 1),
(117, 'Latvia', 'LV', 'LVA', 1),
(118, 'Lebanon', 'LB', 'LBN', 1),
(119, 'Lesotho', 'LS', 'LSO', 1),
(120, 'Liberia', 'LR', 'LBR', 1),
(121, 'Libyan Arab Jamahiriya', 'LY', 'LBY', 1),
(122, 'Liechtenstein', 'LI', 'LIE', 1),
(123, 'Lithuania', 'LT', 'LTU', 1),
(124, 'Luxembourg', 'LU', 'LUX', 1),
(125, 'Macau', 'MO', 'MAC', 1),
(126, 'Macedonia', 'MK', 'MKD', 1),
(127, 'Madagascar', 'MG', 'MDG', 1),
(128, 'Malawi', 'MW', 'MWI', 1),
(129, 'Malaysia', 'MY', 'MYS', 1),
(130, 'Maldives', 'MV', 'MDV', 1),
(131, 'Mali', 'ML', 'MLI', 1),
(132, 'Malta', 'MT', 'MLT', 1),
(133, 'Marshall Islands', 'MH', 'MHL', 1),
(134, 'Martinique', 'MQ', 'MTQ', 1),
(135, 'Mauritania', 'MR', 'MRT', 1),
(136, 'Mauritius', 'MU', 'MUS', 1),
(137, 'Mayotte', 'YT', 'MYT', 1),
(138, 'Mexico', 'MX', 'MEX', 1),
(139, 'Micronesia, Federated States of', 'FM', 'FSM', 1),
(140, 'Moldova, Republic of', 'MD', 'MDA', 1),
(141, 'Monaco', 'MC', 'MCO', 1),
(142, 'Mongolia', 'MN', 'MNG', 1),
(143, 'Montserrat', 'MS', 'MSR', 1),
(144, 'Morocco', 'MA', 'MAR', 1),
(145, 'Mozambique', 'MZ', 'MOZ', 1),
(146, 'Myanmar', 'MM', 'MMR', 1),
(147, 'Namibia', 'NA', 'NAM', 1),
(148, 'Nauru', 'NR', 'NRU', 1),
(149, 'Nepal', 'NP', 'NPL', 1),
(150, 'Netherlands', 'NL', 'NLD', 1),
(151, 'Netherlands Antilles', 'AN', 'ANT', 1),
(152, 'New Caledonia', 'NC', 'NCL', 1),
(153, 'New Zealand', 'NZ', 'NZL', 1),
(154, 'Nicaragua', 'NI', 'NIC', 1),
(155, 'Niger', 'NE', 'NER', 1),
(156, 'Nigeria', 'NG', 'NGA', 1),
(157, 'Niue', 'NU', 'NIU', 1),
(158, 'Norfolk Island', 'NF', 'NFK', 1),
(159, 'Northern Mariana Islands', 'MP', 'MNP', 1),
(160, 'Norway', 'NO', 'NOR', 1),
(161, 'Oman', 'OM', 'OMN', 1),
(162, 'Pakistan', 'PK', 'PAK', 1),
(163, 'Palau', 'PW', 'PLW', 1),
(164, 'Panama', 'PA', 'PAN', 1),
(165, 'Papua New Guinea', 'PG', 'PNG', 1),
(166, 'Paraguay', 'PY', 'PRY', 1),
(167, 'Peru', 'PE', 'PER', 1),
(168, 'Philippines', 'PH', 'PHL', 1),
(169, 'Pitcairn', 'PN', 'PCN', 1),
(170, 'Poland', 'PL', 'POL', 1),
(171, 'Portugal', 'PT', 'PRT', 1),
(172, 'Puerto Rico', 'PR', 'PRI', 1),
(173, 'Qatar', 'QA', 'QAT', 1),
(174, 'Reunion', 'RE', 'REU', 1),
(175, 'Romania', 'RO', 'ROM', 1),
(176, 'Russian Federation', 'RU', 'RUS', 1),
(177, 'Rwanda', 'RW', 'RWA', 1),
(178, 'Saint Kitts and Nevis', 'KN', 'KNA', 1),
(179, 'Saint Lucia', 'LC', 'LCA', 1),
(180, 'Saint Vincent and the Grenadines', 'VC', 'VCT', 1),
(181, 'Samoa', 'WS', 'WSM', 1),
(182, 'San Marino', 'SM', 'SMR', 1),
(183, 'Sao Tome and Principe', 'ST', 'STP', 1),
(184, 'Saudi Arabia', 'SA', 'SAU', 1),
(185, 'Senegal', 'SN', 'SEN', 1),
(186, 'Seychelles', 'SC', 'SYC', 1),
(187, 'Sierra Leone', 'SL', 'SLE', 1),
(188, 'Singapore', 'SG', 'SGP', 1),
(189, 'Slovak Republic', 'SK', 'SVK', 1),
(190, 'Slovenia', 'SI', 'SVN', 1),
(191, 'Solomon Islands', 'SB', 'SLB', 1),
(192, 'Somalia', 'SO', 'SOM', 1),
(193, 'South Africa', 'ZA', 'ZAF', 1),
(194, 'South Georgia &amp; South Sandwich Islands', 'GS', 'SGS', 1),
(195, 'Spain', 'ES', 'ESP', 1),
(196, 'Sri Lanka', 'LK', 'LKA', 1),
(197, 'St. Helena', 'SH', 'SHN', 1),
(198, 'St. Pierre and Miquelon', 'PM', 'SPM', 1),
(199, 'Sudan', 'SD', 'SDN', 1),
(200, 'Suriname', 'SR', 'SUR', 1),
(201, 'Svalbard and Jan Mayen Islands', 'SJ', 'SJM', 1),
(202, 'Swaziland', 'SZ', 'SWZ', 1),
(203, 'Sweden', 'SE', 'SWE', 1),
(204, 'Switzerland', 'CH', 'CHE', 1),
(205, 'Syrian Arab Republic', 'SY', 'SYR', 1),
(206, 'Taiwan', 'TW', 'TWN', 1),
(207, 'Tajikistan', 'TJ', 'TJK', 1),
(208, 'Tanzania, United Republic of', 'TZ', 'TZA', 1),
(209, 'Thailand', 'TH', 'THA', 1),
(210, 'Togo', 'TG', 'TGO', 1),
(211, 'Tokelau', 'TK', 'TKL', 1),
(212, 'Tonga', 'TO', 'TON', 1),
(213, 'Trinidad and Tobago', 'TT', 'TTO', 1),
(214, 'Tunisia', 'TN', 'TUN', 1),
(215, 'Turkey', 'TR', 'TUR', 1),
(216, 'Turkmenistan', 'TM', 'TKM', 1),
(217, 'Turks and Caicos Islands', 'TC', 'TCA', 1),
(218, 'Tuvalu', 'TV', 'TUV', 1),
(219, 'Uganda', 'UG', 'UGA', 1),
(220, 'Ukraine', 'UA', 'UKR', 1),
(221, 'United Arab Emirates', 'AE', 'ARE', 1),
(222, 'United Kingdom', 'GB', 'GBR', 1),
(223, 'United States', 'US', 'USA', 1),
(224, 'United States Minor Outlying Islands', 'UM', 'UMI', 1),
(225, 'Uruguay', 'UY', 'URY', 1),
(226, 'Uzbekistan', 'UZ', 'UZB', 1),
(227, 'Vanuatu', 'VU', 'VUT', 1),
(228, 'Vatican City State (Holy See)', 'VA', 'VAT', 1),
(229, 'Venezuela', 'VE', 'VEN', 1),
(230, 'Viet Nam', 'VN', 'VNM', 1),
(231, 'Virgin Islands (British)', 'VG', 'VGB', 1),
(232, 'Virgin Islands (U.S.)', 'VI', 'VIR', 1),
(233, 'Wallis and Futuna Islands', 'WF', 'WLF', 1),
(234, 'Western Sahara', 'EH', 'ESH', 1),
(235, 'Yemen', 'YE', 'YEM', 1),
(236, 'Yugoslavia', 'YU', 'YUG', 1),
(237, 'Democratic Republic of Congo', 'CD', 'COD', 1),
(238, 'Zambia', 'ZM', 'ZMB', 1),
(239, 'Zimbabwe', 'ZW', 'ZWE', 1);

-- --------------------------------------------------------

--
-- Table structure for table `tbl_customers`
--

CREATE TABLE `tbl_customers` (
  `customers_id` int(11) NOT NULL,
  `user_name` varchar(80) NOT NULL COMMENT 'customer  email  id used as username',
  `password` varchar(100) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `title` varchar(10) DEFAULT NULL,
  `first_name` varchar(32) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `last_name` varchar(32) CHARACTER SET utf8 COLLATE utf8_unicode_ci DEFAULT NULL,
  `gender` enum('M','F') CHARACTER SET utf8 COLLATE utf8_unicode_ci DEFAULT 'M',
  `birth_date` date DEFAULT NULL,
  `customer_photo` varchar(32) DEFAULT NULL,
  `phone_number` varchar(32) DEFAULT NULL,
  `fax_number` varchar(32) DEFAULT NULL,
  `actkey` varchar(32) NOT NULL,
  `status` enum('0','1','2') NOT NULL DEFAULT '0' COMMENT '0=Inactive,1=Active,2=Deleted ',
  `is_verified` enum('0','1') NOT NULL DEFAULT '0' COMMENT '0=unverfied,1=verfied',
  `login_type` enum('normal','facebook','twitter') NOT NULL DEFAULT 'normal',
  `account_created_date` datetime DEFAULT NULL,
  `current_login` datetime NOT NULL,
  `last_login_date` datetime DEFAULT NULL,
  `ip_address` varchar(25) NOT NULL,
  `is_blocked` enum('0','1') NOT NULL DEFAULT '0' COMMENT '0=unblocked,1=blocked',
  `block_time` datetime NOT NULL DEFAULT '0000-00-00 00:00:00',
  `number_of_login_try` int(4) NOT NULL DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_customers`
--

INSERT INTO `tbl_customers` (`customers_id`, `user_name`, `password`, `title`, `first_name`, `last_name`, `gender`, `birth_date`, `customer_photo`, `phone_number`, `fax_number`, `actkey`, `status`, `is_verified`, `login_type`, `account_created_date`, `current_login`, `last_login_date`, `ip_address`, `is_blocked`, `block_time`, `number_of_login_try`) VALUES
(1, 'dkm@gmail.com', 'NkNe0dZTPS2mFUe_JBLonVUGVq8AzBUlVfU3KYepfbU', NULL, 'dk', 'maurya', 'M', NULL, NULL, NULL, NULL, '', '1', '1', 'normal', '2013-04-12 16:36:31', '2013-07-05 07:18:48', '2013-07-05 07:09:09', '', '0', '0000-00-00 00:00:00', 0),
(2, 'weblink.dkm@gmail.com', 'qhKX-7BEhFOMaEUR0MbOEt1mNaJxZKG_FPR2QjuQoEo', 'Mr.', 'dk', 'maurya', 'M', NULL, NULL, NULL, NULL, '7250b4e66132b288a6ba8f3750e05d96', '1', '1', 'normal', '2013-04-18 11:52:36', '2013-05-13 07:47:49', '2013-05-13 07:44:54', '127.0.0.1', '0', '0000-00-00 00:00:00', 0),
(3, 'weblink.manish84@gmail.com', 'cHVBdUSs9tCwhR6xOEPLooY8eKl4mN2k7GdoxQ6Vw7Q', '0', 'manishss', '0', 'M', NULL, NULL, '4354543', NULL, 'c5a33a8789a31cc1303b786e108a867f', '1', '1', 'normal', '2013-07-05 11:14:17', '2013-07-24 05:32:19', '2013-07-23 07:36:42', '127.0.0.1', '0', '0000-00-00 00:00:00', 0),
(4, 'sanjeev.wlin@gmail.com', '_D7Xjge_wHCQPbVnngFbQUoibRCI0AKFgImPetT7GOo', NULL, 'dssfdafsd', '0', 'M', NULL, NULL, '342423423', NULL, '696030a54fd7423e0a839750636772bf', '1', '1', 'normal', '2013-07-17 07:34:15', '2013-07-17 07:34:15', '2013-07-17 07:34:15', '127.0.0.1', '0', '0000-00-00 00:00:00', 0),
(5, 'ddddd@gmail.com', '_D7Xjge_wHCQPbVnngFbQUoibRCI0AKFgImPetT7GOo', '0', 'sdfsfsda', '0', 'M', NULL, NULL, '3432423', NULL, 'c89d230a5d0493c264fb956bb8082d63', '1', '1', 'normal', '2013-07-22 12:28:31', '2013-07-22 12:28:31', '2013-07-22 12:28:31', '127.0.0.1', '0', '0000-00-00 00:00:00', 0);

-- --------------------------------------------------------

--
-- Table structure for table `tbl_customers_address_book`
--

CREATE TABLE `tbl_customers_address_book` (
  `address_id` int(11) NOT NULL,
  `customer_id` int(11) NOT NULL,
  `name` varchar(32) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `address` varchar(200) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `zipcode` varchar(25) NOT NULL,
  `phone` varchar(25) NOT NULL,
  `fax` varchar(50) DEFAULT NULL,
  `city` varchar(50) NOT NULL,
  `state` varchar(50) NOT NULL,
  `country` varchar(80) NOT NULL,
  `reciv_date` datetime NOT NULL,
  `address_type` enum('Bill','Ship') NOT NULL,
  `default_status` enum('Y','N') NOT NULL DEFAULT 'N'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_customers_address_book`
--

INSERT INTO `tbl_customers_address_book` (`address_id`, `customer_id`, `name`, `address`, `zipcode`, `phone`, `fax`, `city`, `state`, `country`, `reciv_date`, `address_type`, `default_status`) VALUES
(1, 2, 'dkms', 's-62 shalimar  garden bill1', '2010051', '75675675671', NULL, 'New delhi1', 'Delhi1', 'India', '2013-04-18 11:58:50', 'Bill', 'Y'),
(2, 2, 'dkms', 's-62 shalimar  garden bill1', '2010051', '75675675671', NULL, 'New delhi1', 'Delhi1', 'India', '2013-04-18 11:58:50', 'Ship', 'Y'),
(3, 6, 'bill dkm', 's-62 shalimar  garden bill', '201005 bill', '7567567567 bill', NULL, 'New delhi  bill', 'Delhi bill', 'India', '2013-04-18 12:04:51', 'Bill', 'N'),
(4, 6, 'ship dkm', 's-62 shalimar  garden ship', 'ship dkm', 'ship dkm', NULL, 'New delhi  ship', 'delhi  ship', 'India', '2013-04-18 12:04:51', 'Ship', 'N'),
(5, 7, 'mk', 's-68 shalimar garden', '201005', '7567567567', NULL, 'Ghazibad', 'Uttar pradesh', 'India', '2013-05-08 07:27:29', 'Bill', 'Y'),
(6, 7, 'mk', 's-68 shalimar garden', '201005', '7567567567', NULL, 'Ghazibad', 'Uttar pradesh', 'India', '2013-05-08 07:27:29', 'Ship', 'Y'),
(7, 8, 'din', 's-62 shalimar', '201005', '7567567567', NULL, 'Ghazibad', 'Uttar pradesh', 'India', '2013-05-09 12:06:12', 'Bill', 'Y'),
(8, 8, 'din', 's-62 shalimar', '201005', '7567567567', NULL, 'Ghazibad', 'Uttar pradesh', 'India', '2013-05-09 12:06:12', 'Ship', 'Y'),
(9, 9, 'dkm', 's-62 shalimar', '201005', '7567567567', NULL, 'Ghazibad', 'Uttar pradesh', 'India', '2013-05-09 12:08:22', 'Bill', 'Y'),
(10, 9, 'dkm', 's-62 shalimar', '201005', '7567567567', NULL, 'Ghazibad', 'Uttar pradesh', 'India', '2013-05-09 12:08:22', 'Ship', 'Y'),
(11, 3, 'sdffs', 'sfsadfsda', '32432423', '324242', NULL, 'sdfsdafasd', 'sdffsd', 'Angola', '2013-07-05 11:14:17', 'Bill', 'Y'),
(12, 3, 'sdffsdsfsafsafsda', 'sfsadfsdadsfsfasdfas', '32432423', '32424234324234', NULL, 'sdfsdafasddfsdfsad', 'sdffsddsfsafsdfs', 'Angola', '2013-07-05 11:14:17', 'Ship', 'Y'),
(13, 4, 'dsfsad', 'fdsfas', '34234234234', 'dsfsafs', NULL, 'dsfsafs', 'sdfafs', 'Australia', '2013-07-17 07:34:15', 'Bill', 'Y'),
(14, 4, 'dsfsad', 'fdsfas', '34234234234', 'dsfsafs', NULL, 'dsfsafs', 'sdfafs', 'Australia', '2013-07-17 07:34:15', 'Ship', 'Y'),
(15, 5, 'ddddd', 'sssssss', '434423', 'gggggg', NULL, 'dsfsdfas', 'sdfsdfas', 'Andorra', '2013-07-22 12:28:31', 'Bill', 'Y'),
(16, 5, 'ddddddsffas', 'ssssssssdfsdafd', '434423343432', 'ggggggsdffsdf', NULL, 'dsfsdfasdsfsdfds', 'sdfsdfasdsfsad', 'Angola', '2013-07-22 12:28:31', 'Ship', 'Y');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_enquiry`
--

CREATE TABLE `tbl_enquiry` (
  `id` int(11) NOT NULL,
  `type` enum('1','2','3') NOT NULL DEFAULT '3' COMMENT '1=Enquiries,2=Suggestioin,3=Contact us',
  `product_service` varchar(220) DEFAULT NULL,
  `email` varchar(80) NOT NULL,
  `first_name` varchar(30) NOT NULL,
  `last_name` varchar(30) DEFAULT NULL,
  `company_name` varchar(60) DEFAULT NULL,
  `country` varchar(200) DEFAULT NULL,
  `state` varchar(50) DEFAULT NULL,
  `city` varchar(50) DEFAULT NULL,
  `phone_number` varchar(20) DEFAULT NULL,
  `mobile` varchar(100) DEFAULT NULL,
  `fax_number` varchar(30) DEFAULT NULL,
  `address` varchar(220) DEFAULT NULL,
  `zipcode` varchar(10) DEFAULT NULL,
  `message` text,
  `ip_address` varchar(255) DEFAULT NULL,
  `status` enum('1','2') NOT NULL,
  `reply_status` enum('Y','N') NOT NULL DEFAULT 'N',
  `receive_date` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `tbl_faq`
--

CREATE TABLE `tbl_faq` (
  `faq_id` int(11) NOT NULL,
  `faq_service` varchar(255) DEFAULT '0',
  `faq_question` varchar(225) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `faq_answer` text CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `sort_order` int(11) DEFAULT '0',
  `status` enum('1','2','3') NOT NULL DEFAULT '1',
  `faq_date_added` datetime NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_faq`
--

INSERT INTO `tbl_faq` (`faq_id`, `faq_service`, `faq_question`, `faq_answer`, `sort_order`, `status`, `faq_date_added`) VALUES
(26, 'One Person Company', 'Do I need to be present during this registration process?', '<p>No, since Company registration is a wholly online process, there is no need to be present physically to our office or ministry of corporate affairs. Moreover, where it is required to do so, we shall send our authorized person on your behalf to the concerned authority.</p>', 0, '1', '2018-02-15 10:11:12'),
(29, 'One Person Company', 'Do I need to hire a full-time CA/ CS?', '<p>Unless &amp; until Your Company comes under the purview of the limit prescribed for to mandatorily have a full time CS or CA respectively, you are not required to hire a full-time CA or CS.</p>', 0, '1', '2018-02-28 12:07:44');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_invite_friends`
--

CREATE TABLE `tbl_invite_friends` (
  `invite_id` int(11) NOT NULL,
  `friend_name` varchar(100) NOT NULL,
  `friend_email` varchar(100) NOT NULL,
  `your_name` varchar(100) NOT NULL,
  `your_email` varchar(100) NOT NULL,
  `receive_date` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_invite_friends`
--

INSERT INTO `tbl_invite_friends` (`invite_id`, `friend_name`, `friend_email`, `your_name`, `your_email`, `receive_date`) VALUES
(1, 'dk', 'dk@gmail.com', 'ss', 'ss@gmail.com', '2013-05-06 12:12:19'),
(2, 'dk', 'dkm@gmail.com', 'ss', 'ss@gmail.com', '2013-05-06 12:13:12'),
(3, 'sdfsa', 'test@gmail.com', 'sdfsa', 'test@gmail.com', '2013-07-03 12:48:31');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_meta_tags`
--

CREATE TABLE `tbl_meta_tags` (
  `meta_id` int(11) NOT NULL,
  `page_url` varchar(200) NOT NULL,
  `meta_title` varchar(80) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `meta_description` varchar(160) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `meta_keyword` varchar(160) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `meta_date_added` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_meta_tags`
--

INSERT INTO `tbl_meta_tags` (`meta_id`, `page_url`, `meta_title`, `meta_description`, `meta_keyword`, `meta_date_added`) VALUES
(3, 'pages/feedback', 'feedback', 'feedback', 'feedback', '2013-04-09 08:56:36'),
(4, 'pages/faq', 'faq', 'faq', 'faq', '2013-04-09 08:57:14'),
(5, 'pages/refer_friends', 'Refer friends', 'Refer friends', 'Refer friends', '2013-04-09 08:57:50'),
(6, 'pages/refer_friendsss', 'pages/refer_friends', 'pages/refer_friends', 'pages/refer_friends', '2013-07-11 12:39:49'),
(7, 'pages/refer_friendssss', 'pages/refer_friends', 'pages/refer_friends', 'pages/refer_friends', '2013-07-11 12:40:15'),
(8, 'a', 'a', 'a', 'a', '2014-02-07 16:42:53'),
(9, 'v', 'v', 'v', 'v', '2014-02-07 16:43:01'),
(10, 'c', 'c', 'c', 'c', '2014-02-07 16:43:09'),
(11, 'd', 'd', 'd', 'd', '2014-02-07 16:43:16'),
(12, 'ss', 'sss', 'sss', 'sss', '2014-02-07 16:43:24'),
(13, 'cxx', 'xcxx', 'xcx', 'cxcx', '2014-02-07 16:43:34');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_news`
--

CREATE TABLE `tbl_news` (
  `news_id` int(11) NOT NULL,
  `news_title` text CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `news_image` varchar(255) CHARACTER SET utf8 COLLATE utf8_unicode_ci DEFAULT NULL,
  `news_url` varchar(100) CHARACTER SET utf8 COLLATE utf8_unicode_ci DEFAULT NULL,
  `sort_description` text CHARACTER SET utf8 COLLATE utf8_unicode_ci,
  `news_description` longtext CHARACTER SET utf8 COLLATE utf8_unicode_ci,
  `publisher` varchar(200) CHARACTER SET utf8 COLLATE utf8_unicode_ci DEFAULT NULL,
  `sort_order` int(11) DEFAULT NULL,
  `status` enum('1','0') DEFAULT '1',
  `recv_date` datetime DEFAULT NULL,
  `featured_news` enum('Y','N') CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL DEFAULT 'N',
  `up_date` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_news`
--

INSERT INTO `tbl_news` (`news_id`, `news_title`, `news_image`, `news_url`, `sort_description`, `news_description`, `publisher`, `sort_order`, `status`, `recv_date`, `featured_news`, `up_date`) VALUES
(8, 'welcome to skylightclasses', 'o22Pri.png', 'dfgjk', NULL, '<p>dfsdafdsf</p>', NULL, NULL, '1', '2018-05-30 13:35:17', 'N', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `tbl_newsletters`
--

CREATE TABLE `tbl_newsletters` (
  `subscriber_id` int(11) NOT NULL,
  `subscriber_name` varchar(32) CHARACTER SET utf8 COLLATE utf8_unicode_ci DEFAULT NULL,
  `subscriber_email` varchar(80) CHARACTER SET utf8 COLLATE utf8_unicode_ci DEFAULT NULL,
  `status` enum('0','1','2') DEFAULT '1' COMMENT '1=Active,0=Deactive,2=Deleted',
  `mail_status` enum('1','0') DEFAULT '0' COMMENT '1=Yes,0=No',
  `subscribe_date` datetime DEFAULT NULL,
  `mail_sent_date` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_newsletters`
--

INSERT INTO `tbl_newsletters` (`subscriber_id`, `subscriber_name`, `subscriber_email`, `status`, `mail_status`, `subscribe_date`, `mail_sent_date`) VALUES
(6, 'amit', 'amit@gmail.com', '1', '0', '2014-02-02 12:28:08', NULL),
(7, NULL, 'sunil.itmnc@gmail.com', '1', '0', '2018-02-16 10:28:10', NULL),
(8, NULL, 'shivani@gmail.com', '1', '0', '2018-02-16 10:34:02', NULL),
(9, NULL, 'mrbmanish8294@gmail.com', '1', '0', '2018-02-16 10:38:19', NULL),
(10, NULL, 'shivani111@gmail.com', '1', '0', '2018-02-16 13:55:04', NULL),
(11, NULL, 'sunil.itmnmanishc@gmail.com', '1', '0', '2018-02-01 14:39:18', NULL),
(12, NULL, 'vicky42000@yahoo.com', '1', '0', '2018-02-20 14:57:04', NULL),
(13, NULL, 'atsandra.dubose123@gmail.com', '1', '0', '2018-02-20 16:12:53', NULL),
(14, NULL, 'rbourke79@yahoo.com', '1', '0', '2018-02-20 16:20:51', NULL),
(15, NULL, 'nicholeta@gmail.com', '1', '0', '2018-02-20 16:28:19', NULL),
(16, NULL, 'r.zotti@cox.net', '1', '0', '2018-02-20 18:20:03', NULL),
(17, NULL, 'cheryllynnmarriott@yahoo.com', '1', '0', '2018-02-20 18:37:54', NULL),
(18, NULL, 'pdschmiege@yahoo.com', '1', '0', '2018-02-20 19:46:57', NULL),
(19, NULL, 'nigh7_br33d@yahoo.com', '1', '0', '2018-02-20 20:55:23', NULL),
(20, NULL, 'ace.morris@embarqmail.com', '1', '0', '2018-02-20 22:01:49', NULL),
(21, NULL, 'sherrylynn21230@yahoo.com', '1', '0', '2018-02-20 22:16:11', NULL),
(22, NULL, 'jennifersaragross@gmail.com', '1', '0', '2018-02-20 22:39:25', NULL),
(23, NULL, 'mike@lustrousmetal.com', '1', '0', '2018-02-20 22:51:19', NULL),
(24, NULL, 'mj@4dlashes.com', '1', '0', '2018-02-20 23:41:49', NULL),
(25, NULL, 'rsub929@yahoo.com', '1', '0', '2018-02-20 23:57:49', NULL),
(26, NULL, 'ransomdm@yahoo.com', '1', '0', '2018-02-21 00:27:15', NULL),
(27, NULL, 'skylar.newton@gmail.com', '1', '0', '2018-02-21 00:28:46', NULL),
(28, NULL, 'pjgannon@sbcglobal.net', '1', '0', '2018-02-21 01:08:00', NULL),
(29, NULL, 'sdfdsfdsafsadfasd@gmail.com', '1', '0', '2018-02-21 14:39:01', NULL),
(30, NULL, 'bobmiller330@yahoo.com', '1', '0', '2018-02-22 08:47:54', NULL),
(31, NULL, 'andreaszeinert@yahoo.de', '1', '0', '2018-02-22 12:21:07', NULL),
(32, NULL, 'aldebol2424@yahoo.com', '1', '0', '2018-02-22 19:19:25', NULL),
(33, NULL, 'veach.chris@gmail.com', '1', '0', '2018-02-22 19:38:01', NULL),
(34, NULL, 'info@ceravolo.de', '1', '0', '2018-02-22 23:23:42', NULL),
(35, NULL, 'aerogbogbo@yahoo.com', '1', '0', '2018-02-22 23:24:29', NULL),
(36, NULL, 'dmac5735@att.net', '1', '0', '2018-02-23 03:05:36', NULL),
(37, NULL, 'mjlantz@charter.net', '1', '0', '2018-02-23 04:05:30', NULL),
(38, NULL, 'zach764@gmail.com', '1', '0', '2018-02-24 12:51:29', NULL),
(39, NULL, 'pshh_aimee@yahoo.com', '1', '0', '2018-02-24 18:06:08', NULL),
(40, NULL, 'bcoxbari@yahoo.com', '1', '0', '2018-02-24 19:27:48', NULL),
(41, NULL, 'bnwo91@yahoo.com', '1', '0', '2018-02-24 22:03:10', NULL),
(42, NULL, 'stephanienicole24@yahoo.com', '1', '0', '2018-02-26 08:10:52', NULL),
(43, NULL, 'bphi_20@yahoo.com', '1', '0', '2018-02-26 11:46:04', NULL),
(44, NULL, 'rebecca@englishcenter.edu', '1', '0', '2018-02-26 17:40:33', NULL),
(45, NULL, 'argreene@farmersagent.com', '1', '0', '2018-02-26 18:15:39', NULL),
(46, NULL, 'vandarchie@sbcglobal.net', '1', '0', '2018-02-26 18:35:02', NULL),
(47, NULL, 'jasonkelly59@yahoo.com', '1', '0', '2018-02-26 20:12:12', NULL),
(48, NULL, 'steve2u42@yahoo.com', '1', '0', '2018-02-26 20:38:03', NULL),
(49, NULL, 'dnagloo@yahoo.com', '1', '0', '2018-02-26 21:11:52', NULL),
(50, NULL, 'rod.magill@gmail.com', '1', '0', '2018-02-26 22:05:25', NULL),
(51, NULL, 'ltill@lindatill.com', '1', '0', '2018-02-26 22:34:58', NULL),
(52, NULL, 'cinderelli99@yahoo.com', '1', '0', '2018-02-26 22:38:58', NULL),
(53, NULL, 'santek.tina@gmail.com', '1', '0', '2018-02-26 22:50:55', NULL),
(54, NULL, 'texastires05@sbcglobal.net', '1', '0', '2018-02-26 23:19:37', NULL),
(55, NULL, 'teneshia79@yahoo.com', '1', '0', '2018-02-27 00:55:42', NULL),
(56, NULL, 'kristiejohn2000@yahoo.com', '1', '0', '2018-02-27 01:25:56', NULL),
(57, NULL, 'jgarcias9@yahoo.com', '1', '0', '2018-02-27 02:55:12', NULL),
(58, NULL, 'amyhead16@gmail.com', '1', '0', '2018-02-27 07:16:30', NULL),
(59, NULL, 'momomnj@gmail.com', '1', '0', '2018-02-28 12:31:33', NULL),
(60, NULL, 'noodle7417@yahoo.com', '1', '0', '2018-02-28 12:35:25', NULL),
(61, NULL, 'andyhsueh@yahoo.com', '1', '0', '2018-02-28 13:58:47', NULL),
(62, NULL, 'ccairns1115@yahoo.com', '1', '0', '2018-02-28 14:54:41', NULL),
(63, NULL, 'brodybennett@yahoo.com', '1', '0', '2018-02-28 16:55:37', NULL),
(64, NULL, 'sarasflynn@yahoo.com', '1', '0', '2018-02-28 17:18:37', NULL),
(65, NULL, 'carranco@deltasteel.com', '1', '0', '2018-02-28 17:59:20', NULL),
(66, NULL, 'kmurray2@cogeco.ca', '1', '0', '2018-02-28 18:00:19', NULL),
(67, NULL, 'brisuedew@gmail.com', '1', '0', '2018-02-28 18:19:54', NULL),
(68, NULL, 'concretegolden@yahoo.com', '1', '0', '2018-02-28 18:22:45', NULL),
(69, NULL, 'azmiskell@gmail.com', '1', '0', '2018-02-28 18:59:01', NULL),
(70, NULL, 'joe.gubbels@ricecompanies.com', '1', '0', '2018-02-28 22:47:34', NULL),
(71, NULL, 'mijaypurchasing@yahoo.com', '1', '0', '2018-02-28 23:35:27', NULL),
(72, NULL, 'joaaneealttmor213@gmail.com', '1', '0', '2018-02-28 23:56:30', NULL),
(73, NULL, 'rhd3@yahoo.com', '1', '0', '2018-03-01 01:28:56', NULL),
(74, NULL, 'mtin@telus.net', '1', '0', '2018-03-01 04:45:24', NULL),
(75, NULL, 'tracey_nagel@copelandbuhl.com', '1', '0', '2018-03-01 05:33:56', NULL),
(76, NULL, 'mbdenicol@yahoo.com', '1', '0', '2018-03-02 12:41:21', NULL),
(77, NULL, 'dcgrann@tbaytel.net', '1', '0', '2018-03-02 13:47:15', NULL),
(78, NULL, 'mjbrettchen@gmail.com', '1', '0', '2018-03-02 14:02:31', NULL),
(79, NULL, 'sykopatrick@gmail.com', '1', '0', '2018-03-02 14:24:27', NULL),
(80, NULL, 'loeschau@lueckmedia.de', '1', '0', '2018-03-02 15:31:42', NULL),
(81, NULL, 'joe@bigskyharley.com', '1', '0', '2018-03-02 18:11:15', NULL),
(82, NULL, 'rushjet1@rushjet1.com', '1', '0', '2018-03-02 19:43:39', NULL),
(83, NULL, 'cesarsandovalflores@gmail.com', '1', '0', '2018-03-02 20:28:39', NULL),
(84, NULL, 'bmhrubes@optonline.net', '1', '0', '2018-03-02 23:07:48', NULL),
(85, NULL, 'shipping@prosorbents.com', '1', '0', '2018-03-03 00:07:37', NULL),
(86, NULL, 'jessica.f.stuart@gmail.com', '1', '0', '2018-03-03 05:23:53', NULL),
(87, NULL, 'derrickvalencic@gmail.com', '1', '0', '2018-03-03 22:53:38', NULL),
(88, NULL, 'jbazphotography@yahoo.com', '1', '0', '2018-03-03 23:53:06', NULL),
(89, NULL, 'rebecca.strater@gmail.com', '1', '0', '2018-03-04 00:50:08', NULL),
(90, NULL, 'don.werden@valeo.com', '1', '0', '2018-03-04 01:17:11', NULL),
(91, NULL, 'm.bosque25@gmail.com', '1', '0', '2018-03-04 01:55:50', NULL),
(92, NULL, 'eibojacobs@gmx.de', '1', '0', '2018-03-04 03:30:06', NULL),
(93, NULL, 'scarlett1johnson@aol.com', '1', '0', '2018-03-04 04:14:11', NULL),
(94, NULL, 'mukhtargamal@yahoo.com', '1', '0', '2018-03-04 06:40:36', NULL),
(95, NULL, 'justinschilder@yahoo.com', '1', '0', '2018-03-04 12:37:28', NULL),
(96, NULL, 'milletgj@yahoo.com', '1', '0', '2018-03-04 15:48:16', NULL),
(97, NULL, 'ysjmeek@yahoo.com', '1', '0', '2018-03-04 16:24:41', NULL),
(98, NULL, 'lindy.rudkin2@aol.com', '1', '0', '2018-03-04 18:46:23', NULL),
(99, NULL, 'sbcoogan@yahoo.com', '1', '0', '2018-03-04 19:05:22', NULL),
(100, NULL, 'naked_pretzel29@yahoo.com', '1', '0', '2018-03-04 19:43:20', NULL),
(101, NULL, 'youmechoose@gmail.com', '1', '0', '2018-03-04 20:02:07', NULL),
(102, NULL, 'maggieparslow@gmail.com', '1', '0', '2018-03-04 21:13:39', NULL),
(103, NULL, 'myshamrox@gmail.com', '1', '0', '2018-03-05 00:44:32', NULL),
(104, NULL, 'comikboy@yahoo.com', '1', '0', '2018-03-05 00:56:04', NULL),
(105, NULL, 'pjr3359@aol.com', '1', '0', '2018-03-05 01:59:07', NULL),
(106, NULL, 'mdderc4@aol.com', '1', '0', '2018-03-05 03:44:48', NULL),
(107, NULL, 'one4dogma@gmail.com', '1', '0', '2018-03-05 04:39:47', NULL),
(108, NULL, 'colleenbtlr@aol.com', '1', '0', '2018-03-05 05:23:04', NULL),
(109, NULL, 'fountain26@aol.com', '1', '0', '2018-03-05 06:37:32', NULL),
(110, NULL, 'dibrown@tassie.net.au', '1', '0', '2018-03-11 11:15:47', NULL),
(111, NULL, 'mukesh.mishra96@gmail.com', '1', '0', '2018-03-13 15:44:13', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `tbl_order`
--

CREATE TABLE `tbl_order` (
  `order_id` int(11) NOT NULL,
  `customers_id` int(11) NOT NULL DEFAULT '0',
  `invoice_number` varchar(30) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `first_name` varchar(50) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `last_name` varchar(50) DEFAULT NULL,
  `phone` varchar(50) CHARACTER SET utf8 COLLATE utf8_unicode_ci DEFAULT NULL,
  `email` varchar(50) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL COMMENT 'In case of user login  user_name  ',
  `billing_name` varchar(100) DEFAULT NULL,
  `billing_address` varchar(223) DEFAULT NULL,
  `billing_phone` varchar(50) DEFAULT NULL,
  `billing_fax` varchar(50) DEFAULT NULL,
  `billing_zipcode` varchar(50) DEFAULT NULL,
  `billing_country` varchar(100) DEFAULT NULL,
  `billing_state` varchar(50) DEFAULT NULL,
  `billing_city` varchar(50) DEFAULT NULL,
  `shipping_name` varchar(100) DEFAULT NULL,
  `shipping_address` varchar(223) DEFAULT NULL,
  `shipping_phone` varchar(50) DEFAULT NULL,
  `shipping_fax` varchar(50) DEFAULT NULL,
  `shipping_zipcode` varchar(50) DEFAULT NULL,
  `shipping_country` varchar(100) DEFAULT NULL,
  `shipping_state` varchar(50) DEFAULT NULL,
  `shipping_city` varchar(50) DEFAULT NULL,
  `shipping_method` varchar(100) DEFAULT NULL,
  `discount_coupon_id` varchar(40) DEFAULT NULL,
  `coupon_discount_amount` float(10,2) DEFAULT NULL,
  `shipping_amount` float(10,2) DEFAULT NULL,
  `total_amount` decimal(15,4) NOT NULL,
  `vat_amount` decimal(15,4) DEFAULT NULL,
  `tax_amount` varchar(50) DEFAULT NULL,
  `tax_type` varchar(50) DEFAULT NULL,
  `currency_code` char(3) DEFAULT NULL,
  `currency_value` decimal(14,6) DEFAULT NULL,
  `order_status` enum('Pending','Closed','Canceled','Delivered','Ready For Dispatch','Rejected','Deleted') NOT NULL DEFAULT 'Pending' COMMENT '''Pending'',''Closed'',''Canceled'',''Delivered'',''Ready For Dispatch'',''Rejected'',''Deleted''',
  `order_received_date` datetime DEFAULT '0000-00-00 00:00:00',
  `order_delivery_date` datetime DEFAULT '0000-00-00 00:00:00',
  `payment_method` varchar(200) DEFAULT NULL,
  `payment_status` enum('Paid','Unpaid') NOT NULL DEFAULT 'Unpaid'
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_order`
--

INSERT INTO `tbl_order` (`order_id`, `customers_id`, `invoice_number`, `first_name`, `last_name`, `phone`, `email`, `billing_name`, `billing_address`, `billing_phone`, `billing_fax`, `billing_zipcode`, `billing_country`, `billing_state`, `billing_city`, `shipping_name`, `shipping_address`, `shipping_phone`, `shipping_fax`, `shipping_zipcode`, `shipping_country`, `shipping_state`, `shipping_city`, `shipping_method`, `discount_coupon_id`, `coupon_discount_amount`, `shipping_amount`, `total_amount`, `vat_amount`, `tax_amount`, `tax_type`, `currency_code`, `currency_value`, `order_status`, `order_received_date`, `order_delivery_date`, `payment_method`, `payment_status`) VALUES
(2, 0, 'inv_2', 'manish', NULL, NULL, 'mrbmanish8294@gmail.com', 'manish', 'Chapara', '7894561230', NULL, '789456', 'india', 'Bihar', 'Siwan', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '15000.0000', NULL, NULL, NULL, NULL, NULL, 'Pending', '2018-02-16 14:31:46', '0000-00-00 00:00:00', '', 'Unpaid'),
(3, 0, 'inv_3', 'manish', NULL, NULL, 'mrbmanish8294@gmail.com', 'manish', 'Chapara', '7894561230', NULL, '789456', 'india', 'Bihar', 'Siwan', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '15000.0000', NULL, NULL, NULL, NULL, NULL, 'Pending', '2018-02-16 14:34:22', '0000-00-00 00:00:00', '', 'Unpaid'),
(4, 0, 'inv_4', 'manish', NULL, NULL, 'mrbmanish8294@gmail.com', 'manish', 'Chapara', '7894561230', NULL, '789456', 'india', 'Bihar', 'Siwan', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '15000.0000', NULL, NULL, NULL, NULL, NULL, 'Pending', '2018-02-16 14:43:47', '0000-00-00 00:00:00', '', 'Unpaid'),
(5, 0, 'inv_5', 'manish', NULL, NULL, 'mrbmanish8294@gmail.com', 'manish', 'Chapara', '7894561230', NULL, '789456', 'india', 'Bihar', 'Siwan', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '14499.0000', NULL, NULL, NULL, NULL, NULL, 'Pending', '2018-02-16 15:00:04', '0000-00-00 00:00:00', '', 'Unpaid'),
(6, 0, 'inv_6', 'manish', NULL, NULL, 'mrbmanish8294@gmail.com', 'manish', 'Chapara', '7894561230', NULL, '789456', 'india', 'Bihar', 'Siwan', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '15000.0000', NULL, NULL, NULL, NULL, NULL, 'Pending', '2018-02-16 15:07:05', '0000-00-00 00:00:00', '', 'Unpaid'),
(7, 0, 'inv_7', 'manish', NULL, NULL, 'mrbmanish8294@gmail.com', 'manish', 'Chapara', '7894561230', NULL, '789456', 'india', 'Bihar', 'Siwan', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '15000.0000', NULL, NULL, NULL, NULL, NULL, 'Pending', '2018-02-16 15:12:04', '0000-00-00 00:00:00', '', 'Unpaid'),
(8, 0, 'inv_8', 'manish', NULL, NULL, 'mrbmanish8294@gmail.com', 'manish', 'Chapara', '7894561230', NULL, '789456', 'india', 'Bihar', 'Siwan', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '14499.0000', NULL, NULL, NULL, NULL, NULL, 'Pending', '2018-02-16 15:21:44', '0000-00-00 00:00:00', '', 'Unpaid'),
(9, 0, 'inv_9', 'manish', NULL, NULL, 'mrbmanish8294@gmail.com', 'manish', 'Chapara', '7894561230', NULL, '789456', 'india', 'Bihar', 'Siwan', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '14499.0000', NULL, NULL, NULL, NULL, NULL, 'Pending', '2018-02-16 15:24:09', '0000-00-00 00:00:00', '', 'Unpaid'),
(10, 0, 'inv_10', 'keoti', NULL, NULL, 'mrbmanish8294@gmail.com', 'keoti', 'aa', '7894561230', NULL, '789456', 'india', 'bihar', 'aa', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '9999.0000', NULL, NULL, NULL, NULL, NULL, 'Pending', '2018-03-10 14:18:23', '0000-00-00 00:00:00', '', 'Unpaid'),
(11, 0, 'inv_11', 'mukesh', NULL, NULL, 'mukesh.mishra96@gmail.com', 'mukesh', 'noida', '9971177398', NULL, '201301', 'india ', 'uttar pradesh', 'noida', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '9999.0000', NULL, NULL, NULL, NULL, NULL, 'Pending', '2018-03-13 15:39:38', '0000-00-00 00:00:00', '', 'Unpaid');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_package`
--

CREATE TABLE `tbl_package` (
  `package_id` int(11) NOT NULL,
  `package_service` varchar(255) DEFAULT NULL,
  `package_name` varchar(200) NOT NULL,
  `package_friendly_url` varchar(200) DEFAULT NULL,
  `package_description` text,
  `package_price` int(10) DEFAULT '0',
  `status` enum('0','1','2') NOT NULL DEFAULT '1' COMMENT '1=active,0=inactive,2=deleted',
  `package_added_date` datetime NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `tbl_payment_setting`
--

CREATE TABLE `tbl_payment_setting` (
  `id` int(11) NOT NULL,
  `marchent_id` varchar(250) NOT NULL,
  `marchent_key` text NOT NULL,
  `base_url` text NOT NULL,
  `success_url` text NOT NULL,
  `cancel_url` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_payment_setting`
--

INSERT INTO `tbl_payment_setting` (`id`, `marchent_id`, `marchent_key`, `base_url`, `success_url`, `cancel_url`) VALUES
(1, 'mxZLGm6W', 'zJdcdyi1OC', 'https://secure.payu.in/_payment', 'payment/order_success/', 'payment/order_cancle/');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_product`
--

CREATE TABLE `tbl_product` (
  `product_id` int(11) NOT NULL,
  `product_title` text CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `product_image` varchar(255) CHARACTER SET utf8 COLLATE utf8_unicode_ci DEFAULT NULL,
  `product_image1` varchar(255) DEFAULT NULL,
  `product_url` varchar(100) CHARACTER SET utf8 COLLATE utf8_unicode_ci DEFAULT NULL,
  `sort_description` text CHARACTER SET utf8 COLLATE utf8_unicode_ci,
  `product_description` text CHARACTER SET utf8 COLLATE utf8_unicode_ci,
  `publisher` varchar(200) CHARACTER SET utf8 COLLATE utf8_unicode_ci DEFAULT NULL,
  `sort_order` int(11) DEFAULT NULL,
  `status` enum('1','0') DEFAULT '1',
  `recv_date` datetime DEFAULT NULL,
  `featured_product` enum('Y','N') CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL DEFAULT 'N',
  `up_date` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_product`
--

INSERT INTO `tbl_product` (`product_id`, `product_title`, `product_image`, `product_image1`, `product_url`, `sort_description`, `product_description`, `publisher`, `sort_order`, `status`, `recv_date`, `featured_product`, `up_date`) VALUES
(1, 'Saving Account', 'savingOEdo.png', 'o1kitt.png', '0', NULL, '<p>HBF NIDHI LTD offers an attractive savings account to our members with a interest rate of 6% . We offers this savings account facility to our tie-up housing society members where banking service/solution are not easy for senior citizen, ladies &amp; others.</p>\r\n\r\n<h5><strong>Features of HBF Saving Account:</strong></h5>\r\n\r\n<ul>\r\n <li>Minimum amount of deposit for opening a Savings Account with a minimum balance of Rs. 100 only which is to be maintained always.</li>\r\n <li>The money can be withdrawn and deposited by using withdrawal/Deposit slip in the concerned branch(es) or on demand at your doorstep free of charges*</li>\r\n <li>To enable the depositor to earn high rate of Interest below are the slabs for Interest Rates provided:\r\n <div class=\"table-responsive\" style=\"box-sizing: border-box; min-height: 0.01%; overflow-x: auto;\">\r\n <table class=\"table table-bordered table-hover\" style=\"background-color:transparent; border-collapse:collapse; border-spacing:0px; border:1px solid rgb(221, 221, 221); box-sizing:border-box; margin-bottom:20px; max-width:100%; width:624px\">\r\n  <thead>\r\n   <tr>\r\n    <th style=\"text-align:left; vertical-align:bottom\">Daily Minimum Balance Required in your Account</th>\r\n    <th style=\"text-align:left; vertical-align:bottom\">Daily Minimum Balance Required in your Account</th>\r\n   </tr>\r\n  </thead>\r\n  <tbody>\r\n   <tr>\r\n    <td style=\"vertical-align:top\">Less than or Equal to Rs. 10,000/-</td>\r\n    <td style=\"vertical-align:top\">@6% p.a.</td>\r\n   </tr>\r\n   <tr>\r\n    <td style=\"vertical-align:top\">For Rs. 10,001 and above</td>\r\n    <td style=\"vertical-align:top\">@6% p.a.</td>\r\n   </tr>\r\n  </tbody>\r\n </table>\r\n </div>\r\n </li>\r\n <li>NEFT Transfers&rsquo; facility will also be provided for ease of transacting</li>\r\n <li>Loans will NOT be provided against the balance kept in HBF Savings Account</li>\r\n</ul>\r\n\r\n<h5><strong>Documents required for opening Savings Account:</strong></h5>\r\n\r\n<p>You can open your HBF Savings Account by providing evidence of the depositor in the form of proof of identity and address as under:</p>\r\n\r\n<ul>\r\n <li>Proof of Identity (any one of the following).\r\n <ol style=\"list-style-type:upper-alpha !important\">\r\n  <li>Passport</li>\r\n  <li>Unique Identification Number</li>\r\n  <li>Income-tax PAN card</li>\r\n  <li>Elector Photo Identity Card</li>\r\n  <li>Driving licence</li>\r\n  <li>Ration card</li>\r\n </ol>\r\n </li>\r\n <li>Proof of address (any one of the following)\r\n <ol>\r\n  <li>Passport</li>\r\n  <li>Unique Identification Number</li>\r\n  <li>Elector Photo Identity Card</li>\r\n  <li>Driving licence</li>\r\n  <li>Ration card</li>\r\n  <li>Telephone bill</li>\r\n  <li>Bank account statement</li>\r\n  <li>Electricity bill</li>\r\n </ol>\r\n </li>\r\n</ul>', NULL, NULL, '1', '2018-05-30 08:38:16', 'N', NULL),
(2, 'Fixed Deposit', 'fixedCaOc.png', 'o24YFb.png', '0', NULL, '<div class=\"col-md-8\" style=\"box-sizing: border-box; position: relative; min-height: 1px; padding-right: 15px; padding-left: 15px; float: left; width: 694.484px; font-family: Ubuntu, sans-serif; font-size: 14px;\">\r\n<p>HBF Nidhi Ltd understands the need for security. Our secure Fixed Deposits provide you greater earnings and features.</p>\r\n\r\n<h5><strong>Intrest Rate (w.e.f. 1st June 2017)</strong></h5>\r\n\r\n<div class=\"table-responsive\" style=\"box-sizing: border-box; min-height: 0.01%; overflow-x: auto;\">\r\n<table class=\"table table-bordered table-hover text-center\" style=\"background-color:transparent; border-collapse:collapse; border-spacing:0px; border:1px solid rgb(221, 221, 221); box-sizing:border-box; margin-bottom:20px; max-width:100%; text-align:center; width:664px\">\r\n <thead>\r\n  <tr>\r\n   <th style=\"text-align:left; vertical-align:bottom\">Period</th>\r\n   <th style=\"text-align:left; vertical-align:bottom\">Cumulative Scheme- Normal (Annual Yield)</th>\r\n   <th style=\"text-align:left; vertical-align:bottom\">Cumulative Scheme -Senior Citizen (Annual Yield)</th>\r\n  </tr>\r\n </thead>\r\n <tbody>\r\n  <tr>\r\n   <td style=\"vertical-align:top\">6 Months</td>\r\n   <td style=\"vertical-align:top\">7.5%</td>\r\n   <td style=\"vertical-align:top\">7.5%</td>\r\n  </tr>\r\n  <tr>\r\n   <td style=\"vertical-align:top\">12 Months</td>\r\n   <td style=\"vertical-align:top\">07.61%</td>\r\n   <td style=\"vertical-align:top\">07.88%</td>\r\n  </tr>\r\n  <tr>\r\n   <td style=\"vertical-align:top\">24 Months</td>\r\n   <td style=\"vertical-align:top\">08.00%</td>\r\n   <td style=\"vertical-align:top\">08.27%</td>\r\n  </tr>\r\n  <tr>\r\n   <td style=\"vertical-align:top\">36 Months</td>\r\n   <td style=\"vertical-align:top\">08.40%</td>\r\n   <td style=\"vertical-align:top\">08.77%</td>\r\n  </tr>\r\n  <tr>\r\n   <td style=\"vertical-align:top\">48 Months</td>\r\n   <td style=\"vertical-align:top\">08.88%</td>\r\n   <td style=\"vertical-align:top\">9.15%</td>\r\n  </tr>\r\n  <tr>\r\n   <td style=\"vertical-align:top\">60 Months</td>\r\n   <td style=\"vertical-align:top\">09.95%</td>\r\n   <td style=\"vertical-align:top\">10.32%</td>\r\n  </tr>\r\n </tbody>\r\n</table>\r\n</div>\r\n\r\n<h5><strong>Features</strong></h5>\r\n\r\n<ul>\r\n <li>Attractive &amp; Assured Returns</li>\r\n <li>Best services at Branches and at doorstep</li>\r\n <li>Prompt Doorstep Assistance through our well experienced staff</li>\r\n <li>Quick Loan against Deposit facility</li>\r\n</ul>\r\n\r\n<h5><strong>Nomination</strong></h5>\r\n\r\n<p>Nomination facility available for deposits. There can be only one Nominee for a deposit account whether held singly or jointly. Applicants can make nomination by filling up the prescribed form. The nomination details can be changed during the subsistence of the account relationship by filling up the prescribed form.</p>\r\n\r\n<h6><strong>No foreclosure shall be allowed within 3 months of deposit;</strong></h6>\r\n\r\n<ul>\r\n <li>No foreclosure shall be allowed within 3 months of deposit.</li>\r\n <li>No interest shall be allowed for foreclosure between three and six months of deposits. Only principal amount will be refunded.</li>\r\n <li>Interest shall be allowed at the Savings Bank rate payable by the HBF Nidhi LTD for foreclosure between six and twelve months.</li>\r\n <li>If foreclosure is opted for after twelve months of deposit the interest payable on such deposits would be reduced by 2% from the contracted rate of interest payable for such period for which the deposits have remained with the company.</li>\r\n</ul>\r\n\r\n<h5><strong>Maturity terms</strong></h5>\r\n\r\n<ul>\r\n <li>No foreclosure shall be allowed within 3 months of deposit.</li>\r\n <li>No interest shall be paid on foreclosure between three and six months of deposits. Only principal amount will be refunded.</li>\r\n <li>Interest shall be allowed at 4% rate payable by the HBF Nidhi LTD for foreclosure between six and twelve months.</li>\r\n <li>If foreclosure is opted for after twelve months of deposit the interest payable on such deposits would be 6% interest payable for such period for which the deposits have remained with the company.</li>\r\n <li>Premature withdrawal is not available if you choose Non-Breakable FD scheme</li>\r\n <li>Company can have deducted 1% from principle amount as a foreclosure or administration charges</li>\r\n</ul>\r\n\r\n<h5><strong>Monthly Income Plan - Ab zindagikoruknena do</strong></h5>\r\n\r\n<p>HBF Nidhi , Monthly Income Plan assured guaranteed fixed monthly income for next 5 years.</p>\r\n\r\n<p>Age : 18 years and above</p>\r\n\r\n<p>Term: 1 year, 2 year, 3year, 4year, 5year</p>\r\n\r\n<ul>\r\n <li>EMI will Transfer to 1st , 11th, 21stof every month</li>\r\n <li>Loan Against Fixed Deposit available,under Non-Flexible Deposit,</li>\r\n <li>Only Account Holder is authorized to change Nomination and other changes.</li>\r\n <li>TDS deduction on interest as per govt law.</li>\r\n</ul>\r\n\r\n<h5><strong>HBF Bitiya Nidhi Dhan Scheme</strong></h5>\r\n<img src=\"http://hbfnidhi.com/images/bitiya.png\" style=\"border:0px; box-sizing:border-box; vertical-align:middle\" />\r\n<h5><strong>HBF बिटियानिधिधनयोजना</strong></h5>\r\n\r\n<h5><strong>Term : 5 years fixed</strong></h5>\r\n\r\n<h5><strong>Age : 0 year &ndash; 25 years</strong></h5>\r\n\r\n<h5><strong>Interest Rate : 11% annual (Yearly compounding)</strong></h5>\r\n\r\n<h5><strong>Only for Girl / Female</strong></h5>\r\n\r\n<ul>\r\n <li>Save money for Your Daughter&rsquo;s Education, Marriage, &amp; Financial Securities.</li>\r\n <li>Minimum Investment 5000 Maximum 5 Lac on name of girl child.</li>\r\n <li>Auto Renewal Available Under Fixed deposit Individual scheme,</li>\r\n <li>TDS deduction on interest as per govt law.</li>\r\n <li>Non- Breakable Scheme. Prematurity is not available.</li>\r\n <li>No Loan Facility is available because it&rsquo;s specially for girl child.</li>\r\n <li>For Limited Period Only</li>\r\n <li>&nbsp;</li>\r\n</ul>\r\n</div>', NULL, NULL, '1', '2018-05-30 08:46:43', 'N', NULL),
(3, 'Recurring Deposit', 'recuringgsFV.png', 'o5Y4Of.png', '0', NULL, '<p>HBF Nidhi Ltd. Recurring Deposit is designed to help you prepare for the future. It enables you save regularly for a certain period of time with minimum amount starting Rs. 1,000/- only and earn a higher interest rate. At the end of pre-defined period you are paid back the lump sum including the principal and interest.</p>\r\n\r\n<h5><strong>Features:</strong></h5>\r\n\r\n<ul>\r\n <li>Minimum amount can be deposit Rs.1,000/- at regular intervals.</li>\r\n <li>The Period of deposit is minimum 1 year and maximum 5 years.</li>\r\n <li>The most attractive rate of interest of 8% p.a. with an effect of 1st Mar 2017.</li>\r\n <li>Providing the loan facility. The loan can be given up to 90% of the amount standing the credit of the account holder.</li>\r\n <li>Recurring Deposit provides an option Any Time Money after 12 months. Member can opt this option.</li>\r\n</ul>\r\n\r\n<h6><strong>Interest rate</strong></h6>\r\n\r\n<ul>\r\n <li>Interest Rate @ 8% p.a.</li>\r\n <li>Interest Rate @ 8.25% p.a. in case of RD in name of Girl Child below 15yrs of age.</li>\r\n <li>Interest Rate @ 8.25% p.a. in case of RD of a Senior Citizen.</li>\r\n</ul>\r\n\r\n<div class=\"clearfix\" style=\"box-sizing: border-box; font-family: Ubuntu, sans-serif; font-size: 14px;\">&nbsp;</div>\r\n\r\n<h6><strong>Foreclosure of deposits should be governed by the following guidelines:</strong></h6>\r\n\r\n<ul>\r\n <li>No foreclosure shall be allowed within 3 months of deposit.</li>\r\n <li>No interest shall be allowed for foreclosure between three and six months of deposits. Only principal amount will be refunded.</li>\r\n <li>Interest shall be allowed at the Savings Bank rate payable by the HBF Nidhi LTD for foreclosure between six and twelve months.</li>\r\n <li>If foreclosure is opted for after twelve months of deposit the interest payable on such deposits would be reduced by 2% from the contracted rate of interest payable for such period for which the deposits have remained with the company.</li>\r\n</ul>', NULL, NULL, '1', '2018-05-30 09:32:25', 'N', NULL),
(4, 'HBF Loans', 'societyYmd0.png', 'o3Spie.png', '0', NULL, '<div class=\"panel-heading\" id=\"headingOne\" style=\"box-sizing: border-box; padding: 0px; border-bottom: 0px rgb(238, 238, 238); border-radius: 0px; color: rgb(252, 252, 252); background-color: rgb(82, 168, 180); border-top-color: rgb(238, 238, 238); border-right-color: rgb(238, 238, 238); border-left-color: rgb(238, 238, 238); font-family: Ubuntu, sans-serif; font-size: 14px;\">\r\n<h4><a href=\"http://hbfnidhi.com/loans.html#collapseOne\" style=\"box-sizing: border-box; background-color: transparent; color: inherit; text-decoration-line: none; cursor: pointer; display: block; padding: 15px;\">Gold Loan</a></h4>\r\n</div>\r\n\r\n<div class=\"panel-collapse collapse in\" id=\"collapseOne\" style=\"box-sizing: border-box; font-family: Ubuntu, sans-serif; font-size: 14px;\">\r\n<div class=\"panel-body\" style=\"box-sizing: border-box; padding: 15px; border-top: 1px solid rgb(238, 238, 238);\">\r\n<p>With attractive schemes, easy repayment options and lowest interest rates, HBF Nidhi Ltd, one of the leading Nidhi Companies in NCR offers a hassle-free experience to avail gold loan.</p>\r\n\r\n<p>HBF Nidhi Ltd Gold loans may be availed for any amount between Rs.1,000 to a maximum of Rs. 7.5 Lakhs. Loans are available for periods ranging from one month to one year. Our Gold loans do not have any lock- in-period and there are no prepayment penalties. You can repay earlier than the scheduled as you desire. Anyone who is the member and owns gold ornaments can avail the loan. (Note: Minors are not eligible.) To obtain the loan, you need to submit your gold jewellery (within the Karat range of 18 to 24 k) at your nearest HBF branches. The loan amount will be sanctioned on the basis of gold valuation which involves verification of its purity. The weight of stones etc. fixed on the ornaments will be deducted for the intention of valuation.</p>\r\n\r\n<h5><strong>Interest Rate</strong></h5>\r\n\r\n<p>Our base rate of interest is 12 percent. However, depending upon how high the loan to value (LTV) is, additional interest (amounting to risk premium) ranging from 4-8 percent is charged over and above the base rate. The interest and risk premium is applicable only for the days the money was actually utilised. There are no prepayment penalties.Simple interest is charged, which the borrower has to pay at the specified periodicity or at the closure of loan, whichever is earlier. The interest rate is fixed and calculated on a reducing balance basis.</p>\r\n\r\n<p>Gold loan products have a maximum tenure of one year. However, depending upon how high the LTV is opted,members are required to service the interest at specified periodicities.For example, in schemes where LTV is high, interest would have to be serviced monthly.</p>\r\n\r\n<h5><strong>Supporting Documents</strong></h5>\r\n\r\n<p>To abide by the KYC (Know Your Customer) Policy of RBI and approved KYC norms of our Company, we insist to produce one document of identity proof (Such as Ration Card with photo, Driving License, PAN Card, Voter ID card, Passport, Aaadhar Card etc.) and one document of residential address proof (Such as Telephone Bill, Electricity Bill, Water Bill, Bank account / Credit Card Statement, Municipal / Local/House Tax Bill / Receipt, Authentic Rent Receipt / Lease Document, Letter from reputed employer/ Public Authority).</p>\r\n\r\n<p>Once you submit your Application Form, Demand Promissory Note and supporting documents, we shall give approval within a matter of minutes provided everything is in order. All loan approvals are at the sole discretion of the Branch Head.</p>\r\n\r\n<h5><strong>Schemes</strong></h5>\r\n\r\n<p>Our gold loan schemes fall broadly into two categories:</p>\r\n\r\n<ul>\r\n <li><strong>High loan to value:</strong>&nbsp;These schemes offer the maximum amount of loan per Gram. At the same time in keeping with the extra risk, the interest cost to the borrower is higher.</li>\r\n <li><strong>Low interest rate:</strong>&nbsp;In this category, the interest rates are lower but the Loan to Value (LTV) is also comparatively less.</li>\r\n</ul>\r\n\r\n<p>Our products are well tailored not only to the income group of the customer, but to relevant considerations like how much loan customers would like to avail against jewellery, and their comfort levels with respect to the interest rate and periodicity of repayment of interest and principal. Incidentally, gold loans can be availed at our branches for amounts as low as Rs.1000 and as high as Rs. 7.5 Lakhs.</p>\r\n\r\n<h5><strong>Guaranty and Security</strong></h5>\r\n\r\n<p>We know that these gold ornaments are very precious and favorite to you. So we guarantee you that it will be in our safe hands in strong cash safes inside a strong room built as per the standards and specifications applicable to commercial banks. The pledged gold ornaments are also insured for full value. Moreover, security personnel and modern electronic surveillance technology are deployed to protect your beloved gold ornaments.</p>\r\n\r\n<p>The most important things from the customer&rsquo;s perspective are transparency, security and choice of loan product to suit individual requirements. Transparency would help the customer see for himself what he gets in return for what he pays. There should be no hidden costs and no nasty surprises.</p>\r\n\r\n<p>Security is about how well the gold is physically secured, and also about the internal systems and procedures at the company which ensure that there is no scope for any malfunctions after the jewelers have been pledged. The choice of loan products should cover the range from high LTV (loan to value) to low LTV, with appropriate variations in interest rates.</p>\r\n\r\n<div class=\"panel-heading\" id=\"headingTwo\" style=\"box-sizing: border-box; padding: 0px; border-bottom: 0px rgb(238, 238, 238); border-radius: 0px; color: rgb(252, 252, 252); background-color: rgb(82, 168, 180); border-top-color: rgb(238, 238, 238); border-right-color: rgb(238, 238, 238); border-left-color: rgb(238, 238, 238); font-family: Ubuntu, sans-serif; font-size: 14px;\">\r\n<h4><a href=\"http://hbfnidhi.com/loans.html#collapseTwo\" style=\"box-sizing: border-box; background-color: transparent; color: inherit; text-decoration-line: none; cursor: pointer; display: block; padding: 15px;\">Loan against Deposit Receipt</a></h4>\r\n</div>\r\n\r\n<div class=\"panel-collapse collapse in\" id=\"collapseTwo\" style=\"box-sizing: border-box; font-family: Ubuntu, sans-serif; font-size: 14px;\">\r\n<div class=\"panel-body\" style=\"box-sizing: border-box; padding: 15px; border-top: 1px solid rgb(238, 238, 238);\">\r\n<p>Loan against Fixed Deposits is a facility offered by HBF Nidhi Ltd to our members against your deposits held with us. For your liquidity requirements, avail 90% of the value of deposits held, without breaking the deposit.</p>\r\n\r\n<p>You can avail a loan against the security of TDR / RD deposits.</p>\r\n\r\n<h5><strong>You need not close the deposit prematurely, and can avail the loan:</strong></h5>\r\n\r\n<ul>\r\n <li>At the branch where you maintain the deposit.</li>\r\n <li>As an overdraft or as a demand loan.</li>\r\n <li>For a maximum of 90% of the face value of deposit and including the interest accrued on the deposit.</li>\r\n <li>At an interest rate linked to Deposit Rate against TD/RD deposits.</li>\r\n</ul>\r\n\r\n<div class=\"table-responsive\" style=\"box-sizing: border-box; min-height: 0.01%; overflow-x: auto;\">\r\n<table class=\"table table-bordered table-hover table-striped\" style=\"background-color:transparent; border-collapse:collapse; border-spacing:0px; border:1px solid rgb(221, 221, 221); box-sizing:border-box; margin-bottom:20px; max-width:100%; width:632px\">\r\n <thead>\r\n  <tr>\r\n   <th colspan=\"2\" style=\"text-align:left; vertical-align:bottom\">Loan / OD against Deposits</th>\r\n  </tr>\r\n </thead>\r\n <tbody>\r\n  <tr>\r\n   <td style=\"vertical-align:top\">Eligibility</td>\r\n   <td style=\"vertical-align:top\">Term Deposit /Recurring Deposit Holder</td>\r\n  </tr>\r\n  <tr>\r\n   <td style=\"vertical-align:top\">Amount of Loan</td>\r\n   <td style=\"vertical-align:top\">90% of accrued value of deposit.</td>\r\n  </tr>\r\n  <tr>\r\n   <td style=\"vertical-align:top\">Margin</td>\r\n   <td style=\"vertical-align:top\">10% on accrued value of deposit</td>\r\n  </tr>\r\n  <tr>\r\n   <td style=\"vertical-align:top\">Repayment</td>\r\n   <td style=\"vertical-align:top\">\r\n   <ul>\r\n    <li>Flexible</li>\r\n    <li>Maximum up to date of maturity of deposit</li>\r\n   </ul>\r\n   </td>\r\n  </tr>\r\n  <tr>\r\n   <td style=\"vertical-align:top\">Prepayment charges</td>\r\n   <td style=\"vertical-align:top\"><strong>Interest Rate:</strong>&nbsp;2% over the contracted rate for the Term Deposit/Recurring Deposit pledged.</td>\r\n  </tr>\r\n  <tr>\r\n   <td style=\"vertical-align:top\">Security</td>\r\n   <td style=\"vertical-align:top\">Pledge of Term Deposit/Recurring deposit Receipt.</td>\r\n  </tr>\r\n </tbody>\r\n</table>\r\n</div>\r\n</div>\r\n</div>\r\n</div>\r\n</div>\r\n\r\n<div class=\"panel-heading\" id=\"headingThree\" style=\"box-sizing: border-box; padding: 0px; border-bottom: 0px rgb(238, 238, 238); border-radius: 0px; color: rgb(252, 252, 252); background-color: rgb(82, 168, 180); border-top-color: rgb(238, 238, 238); border-right-color: rgb(238, 238, 238); border-left-color: rgb(238, 238, 238); font-family: Ubuntu, sans-serif; font-size: 14px;\">\r\n<h4><a href=\"http://hbfnidhi.com/loans.html#collapseThree\" style=\"box-sizing: border-box; background-color: transparent; color: inherit; text-decoration-line: none; cursor: pointer; display: block; padding: 15px;\">Mortgage Loan</a></h4>\r\n</div>\r\n\r\n<div class=\"panel-collapse collapse in\" id=\"collapseThree\" style=\"box-sizing: border-box; font-family: Ubuntu, sans-serif; font-size: 14px;\">\r\n<div class=\"panel-body\" style=\"box-sizing: border-box; padding: 15px; border-top: 1px solid rgb(238, 238, 238);\">\r\n<h5><strong>Features</strong></h5>\r\n\r\n<ul>\r\n <li>Multipurpose loan</li>\r\n <li>Loan for Businessmen, Professionals, Employed persons and Individuals for the marriage of children, higher studies of child, Medical treatment etc. who is having sufficient income to service the loan.</li>\r\n <li>Loans from Rs.2.00 lakh onwards depending on your needs</li>\r\n <li>Borrow up to 50% of market value of the property.</li>\r\n <li>Attractive interest rate</li>\r\n <li>Simple and very speedy processing</li>\r\n <li>Repayment tenure up to 60 months</li>\r\n <li>Repayment of installments through any of our branches</li>\r\n <li>Minimum land area of property</li>\r\n <li>No Penalty for premature closing after 6 months</li>\r\n <li>Facility for daily remittance</li>\r\n</ul>\r\n</div>\r\n</div>\r\n\r\n<p>&nbsp;</p>', NULL, NULL, '1', '2018-05-30 09:43:53', 'N', NULL),
(5, 'D To D Services', 'fixedhhyb.png', 'o4NqFM.png', '0', NULL, '<h4>Doorstep Services:</h4>\r\n\r\n<p>There is an increasing expectation from customers for better service from their banks. The availability of ATMs for 24-hour banking is also not seen as sufficient. More and more customers look for getting banking transactions done sitting in their homes or offices. This has led to the concept of Doorstep Banking getting more and more volumes.</p>\r\n\r\n<p>While, the services to be offered are simple; the timeliness and urgency towards the customer poses a big challenge specifically because the geographical reach are very important.</p>\r\n\r\n<p>These services are already being handled well through phone calls and third-party service providers. However, to handle higher volumes with reduced errors we have evolved the Doorstep Banking solution.</p>\r\n\r\n<p>As also defined in Regulatory guidelines, Banks now offer the following banking services to all of their customers at their doorstep:</p>\r\n\r\n<ul>\r\n <li>Cash pick-up and delivery</li>\r\n <li>Instruments/Cheque pick up</li>\r\n <li>Instruments (DD/PO) delivery</li>\r\n</ul>\r\n\r\n<p>In order to manage / track/ evaluate these services centrally, there is need of robust system integrating central unit, hub branches, spoke branches &amp; service provider agency. This system should enable the faster mode of communication between central unit, hub branches, service provider &amp; customer thus reducing the turnaround time so that each customer is serviced effectively.</p>\r\n\r\n<p>HBF provide a doorstep services in India. where we start our first phase from Noida second from Guru gram third from Delhi NCR &amp;fourth is DELHI NCR &amp; Lucknow . Entire four phases we will cover within three years.</p>\r\n\r\n<p>Our doorstep banking facility help to our members banking solution at their home . We will provide deposit, withdrawal, statement and other services at their home.</p>\r\n\r\n<p>In future, our organization will provide doorstep Micro ATM Services also.</p>\r\n\r\n<h4>Condition</h4>\r\n\r\n<p>Services only for our members.</p>\r\n\r\n<p>Number of times cash collecting transactions from customer&#39;s home will vary for everyone according to their Transaction volume.</p>', NULL, NULL, '1', '2018-05-30 13:09:40', 'N', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `tbl_services`
--

CREATE TABLE `tbl_services` (
  `service_id` int(11) NOT NULL,
  `category_id` int(11) NOT NULL,
  `category_links` varchar(255) NOT NULL,
  `service_title` varchar(255) NOT NULL,
  `service_img` varchar(255) DEFAULT NULL,
  `service_url` varchar(255) NOT NULL,
  `fee` varchar(25) DEFAULT NULL,
  `pack_incl` text,
  `service_desc` text NOT NULL,
  `doc_head1` varchar(255) DEFAULT NULL,
  `doc_desc1` text,
  `doc_head2` varchar(255) DEFAULT NULL,
  `doc_desc2` text,
  `person_head` varchar(255) DEFAULT NULL,
  `person_desc` text,
  `capital_head` varchar(255) DEFAULT NULL,
  `capital_desc` text,
  `resident_head` varchar(255) DEFAULT NULL,
  `resident_desc` text,
  `unq_nam_head` varchar(255) DEFAULT NULL,
  `unq_nam_desc` text,
  `adv_head_5` varchar(255) DEFAULT NULL,
  `adv_desc_5` text,
  `step_head1` varchar(255) DEFAULT NULL,
  `step_desc1` text,
  `step_head2` varchar(255) DEFAULT NULL,
  `step_desc2` text,
  `step_head3` varchar(255) DEFAULT NULL,
  `step_desc3` text,
  `step_head4` varchar(255) DEFAULT NULL,
  `step_desc4` text,
  `step_head5` varchar(255) DEFAULT NULL,
  `step_desc5` text,
  `price` varchar(25) DEFAULT NULL,
  `recomend` text,
  `vent_capt_firm` text,
  `ltd_lib_prot` text,
  `divd_tax` text,
  `perp_exist` text,
  `stat_compliance` text,
  `credibility` text,
  `buz_growth` text,
  `comp_1` text,
  `comp_2` text,
  `comp_serv_head` varchar(255) DEFAULT NULL,
  `step_serv_head` varchar(255) DEFAULT NULL,
  `adv_serv_head` varchar(255) DEFAULT NULL,
  `doc_req_head` varchar(255) DEFAULT NULL,
  `featured_product` enum('0','1') NOT NULL DEFAULT '0',
  `created_date_time` datetime NOT NULL,
  `status` enum('0','1','2') NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_services`
--

INSERT INTO `tbl_services` (`service_id`, `category_id`, `category_links`, `service_title`, `service_img`, `service_url`, `fee`, `pack_incl`, `service_desc`, `doc_head1`, `doc_desc1`, `doc_head2`, `doc_desc2`, `person_head`, `person_desc`, `capital_head`, `capital_desc`, `resident_head`, `resident_desc`, `unq_nam_head`, `unq_nam_desc`, `adv_head_5`, `adv_desc_5`, `step_head1`, `step_desc1`, `step_head2`, `step_desc2`, `step_head3`, `step_desc3`, `step_head4`, `step_desc4`, `step_head5`, `step_desc5`, `price`, `recomend`, `vent_capt_firm`, `ltd_lib_prot`, `divd_tax`, `perp_exist`, `stat_compliance`, `credibility`, `buz_growth`, `comp_1`, `comp_2`, `comp_serv_head`, `step_serv_head`, `adv_serv_head`, `doc_req_head`, `featured_product`, `created_date_time`, `status`) VALUES
(2, 2, '2,1', 'One Person Company', 'Home-3FFz4.png', 'one-person-company', '8500', '<ul>\n <li>Search of Trademark &amp; Name Availability</li>\n <li>One DSC &amp; One DIN</li>\n <li>Name Reservation</li>\n <li>MOA , AOA and Other documents</li>\n <li>MCA &amp; Govt. Fees</li>\n <li>Incorporation Certificate (CIN)&nbsp;</li>\n <li>&nbsp;Pan &amp; Tan of One Person Company (OPC)</li>\n <li>Documents Pick up &amp; Drop facility&nbsp;</li>\n</ul>\n\n<p>&nbsp;</p>\n', '<p style=\"text-align:justify\">One Person Company (OPC) is the latest and the best medium for the Sole-proprietorship Business men to penetrate in the corporate world. This concept has its prevalence not only in India, but also in abroad, including Singapore, USA even Europe.&nbsp; It is the best source through which an individual, being incipient, may take an initiative to start a company without being wary of the having other subscribers or shareholders or Directors, since this is the company where only one person, being a subscriber or shareholder or a director, is suffice to incorporate this company, However, the upper limit for the directors is set up at maximum upto 15 directors.&nbsp; The voluntarily conversion of an OPC into any other kind of company has been confined upto 2 years since its incorporation, However, if the Paid-up capital of the OPC Company crosses Rs.50 Lakhs or the average annual turnover during any 3 consecutive financial years exceeds Rs.2 Crore, then it&rsquo;s mandatorily to be converted into a private limited company within 6 months.</p>\n', 'From Directors and Shareholders', '<ul>\n	<li>Passport Size Photograph</li>\n	<li>Scanned Copy of Adhar Card/ Election Card/ Passport</li>\n	<li>Scanned Copy of PAN</li>\n	<li>Scanned Copy of Latest Bank Statement/ Utility Bill ( Electricity Bill /Telephone Bill )</li>\n	<li>Scanned Copy of Rent Agreement</li>\n</ul>\n\n<p>&nbsp;</p>\n', 'For Proposed Registered Address (Residential/Commercial)', '<ul>\n	<li>Scanned Copy of Rent Agreement (For Rented Premises )</li>\n	<li>Scanned Copy of NOC</li>\n	<li>Scanned Copy of Electricity Bill</li>\n</ul>\n', 'CONTINUED EXISTENCE', 'OPC has more liberalized & Uninterrupted approach to penetrate into corporate world for the pioneer businessmen as it’s prevented from the sterner and more rigid compliances those have to be complied in other form of Companies such as Pvt. Ltd. & Public Limited Company.', 'LIMITED LIABILITY', 'Since there is only one member, the Liability of the shareholder of OPC has been confined only upto the liability of such OPC company in proportion to the capital he has brought with him, he shall not be liable for any further debt beyond that.', 'LEAST RESTRICTIONS', 'These companies come under the purview of small companies, which have been liberalized under the MCA notification dated 05.06.2015 in compliance work.', 'TRANSFERABLITY', 'Since there is only one member ‘Shares Transfer in OPC Company’ can be transacted to only the nominee to whom the shares can be transferred not to any other person otherwise than him. ', '', '', 'Digital Signature & DIN of Director ', 'First step is to obtain the Digital Signature (DSC) & DIN of Director & Register with MCA.', 'Trademark & Name Availability Search ', 'Secondly, after satiating that no infringement shall be made under Trademark Act for choosing the proposed name, the said name application shall be filed to the registrar of the Company for getting the approval of the said name.', 'Preparation of Documents(MOA & AOA) of OPC', 'Immediately after obtaining the name approval, all the required documents pertaining to incorporation shall be uploaded for Final Submission to the registrar of Company.', 'Company Incorporation ', 'Finally, Certificate of Incorporation along with the other supporting documents, viz. MOA, AOA & PAN Acknowledgement evidencing Incorporation of Company shall be provided to the concerned party next day after incorporation', 'PAN, TAN & BANK A/C ', 'After incorporation of OPC , PAN has been allotted by Income Tax Department & TAN is Mandatory for TDS compliance. Also we support for Opening of Bank Account of OPC.', '9899', 'Solo Business Owner  ', 'Less Possibility ', 'Yes', 'Dividend Tax', 'Yes', 'Medium ', 'Medium ', 'Medium ', '3', '4', 'Compare your Best Startup Options', 'Steps of This Service', 'Advantages of This Service', 'Document Required of This Service', '1', '2018-03-15 13:33:28', '1'),
(3, 2, '2,1', 'Private Limited Company', 'home-412d6.png', 'private-limited-company', '9999', '<ul>\n <li>Search of Trademark &amp; Name Availability</li>\n <li>Two DSC &amp; Two&nbsp;DIN</li>\n <li>Name Reservation</li>\n <li>MOA , AOA and Other documents</li>\n <li>MCA &amp; Govt. Fees</li>\n <li>Certificate of Incorporation(CIN)</li>\n <li>Company Pan &amp; Tan</li>\n</ul>\n', '<p>Private Limited Company can be created with the association of 2 or more directors the upper limit of which is set up at 15 directors. It can have minimum 2 and maximum 200 members, however, the persons, holding the membership, who are or were in employment of the company, shall not come under such counting. Since it is the Primary requirement of growing business to have funding, Unlike Proprietorships, partnership firms, and Limited Liability Partnerships cannot issue shares, Private Limited Company is able to attract equity funding by issuing equity among the limited number of persons, except by the way of issuing prospectus. It can be started even with the paid up capital of 1,00,000/-&nbsp; Rs. However, it&rsquo;s not a mandatory requirement to employ this much capital due to the evasion made by law for the same but its recommendatory requirement that one should bring at least this much capital with oneself.It also enables new business to attract a capital share from sources like Family, friends, Venture Capitalist, Angel Investor or private equity firm.</p>\n', 'From all Shareholder & Director ', '<ul>\n	<li>Passport Size Photograph</li>\n	<li>Scanned Copy of Adhar Card/ Election Card/ Passport</li>\n	<li>Scanned Copy of PAN</li>\n	<li>Scanned Copy of Latest Bank Statement/ Utility Bill ( Electricity Bill /Telephone Bill )</li>\n	<li>Scanned Copy of Rent Agreement</li>\n</ul>\n', 'For Registered Business Premises', '<ul>\n	<li>Scanned Copy of Rent Agreement (For Rented Premises )</li>\n	<li>Scanned Copy of NOC</li>\n	<li>Scanned Copy of Electricity Bill</li>\n</ul>\n', 'SEPARATE LEGAL ENTITY', 'Unlike Proprietorship or Partnership firms, Private Limited Companies are considered as separate legal entities since, the Benefits & the liabilities of the company and directors are severely considered, as the benefits and the liabilities of the company can’t be treated as if it is of the directors and vice-versa.', 'LIMITED LIABILITY', 'Liability of Share of Shareholder of company is limited upto unpaid share amount due upon them of their total holding and regarding any other debt only upto the proportion of their shareholding. They shall not be liable for any further debt of the company beyond debt.', 'CONTINUED EXISTENCE', 'Its Existence will be uninterrupted, as the Death or departure of Member or the director of the Company shall hardly affect the existence of the company. A Company will be continuing irrespective of change of membership or directorship subject to the limits prescribed for the same.', 'EASILY TRANSFERABLE', 'Shareholders of Private limited company can transfer their shares to existing shareholder or other selected group of persons just by signing and filing of Share Transfer deed and handing over the Share Certificate by way of private placement or preferential allotment, However, the shares transfer of a private company has been restricted to be transferred through Prospectus, i.e. issue of share to Public.', 'LEAST RESTRICTIONS', 'The Private Company is liberalized from the more strict compliance those are to be complied with in any other case of the company due to the exemptions provided to private companies under MCA notification No. 05.06.2015.', 'Required Information &  Documents ', 'We collect all the required Information and the documents, which is required for Company Registration and start the process.', 'Digital Signature & DIN of Director', 'Second step is to obtain the DSC & DIN of each Director', 'Trademark & Name Availability Search', 'Thirdly, after satiating that no infringement shall be made under Trademark Act for choosing the proposed name, the said name application shall be filed to the registrar of the Company for getting the approval of the said name.', 'Preparation of Documents(MOA & AOA) of  Company ', 'Immediately after obtaining the name approval, all the required documents pertaining to incorporation shall be uploaded for Final Submission to the registrar of Company.', 'Company Incorporation', 'Finally, Certificate of Incorporation along with the other supporting documents, viz. MOA, AOA PAN & TAN Acknowledgement evidencing Incorporation of Company shall be provided to the concerned party next day after incorporation.', '9999', 'New Startups ', 'Possibility', 'Yes', 'Yes ', 'Yes ', 'High', 'High', 'High', '2', '6', '', '', '', '', '1', '2018-03-15 13:34:34', '1'),
(4, 2, '2,1', 'Public Limited Company', 'Home-5aRov.png', 'public-limited-company', '39999', '<ul>\n <li>Search of Trademark &amp; Name Availability</li>\n <li>Three DSC &amp; DIN&nbsp;</li>\n <li>Name Reservation</li>\n <li>MOA , AOA and Other documents</li>\n <li>MCA &amp; Govt. Fees</li>\n <li>Certificate of Incorporation(CIN)</li>\n <li>Company Pan &amp; Tan</li>\n <li>Documents Pick up &amp; Drop facility</li>\n</ul>\n\n<p>Note: GST will be extra on professional fees.</p>\n\n<p>&nbsp;</p>\n', '<p>Public limited company can be registered with minimum 3 director and &nbsp;7 members and there is no limit for maximum number of Members since the fund can be raised through public by way of issuing share through prospectus, however, the maximum number of directors a Public Company can have is confined upto 15 directors in accordance with the provisions of Companies Act, 2013.Along with having all the advantages of private Limited Company it is also having the better access to Capital,&nbsp; Such as raising share capital from existing and new Investor ,i.e. raising fund from public, either launching the IPO or FPO of shares lead to carry on trading on stock exchange freely if it&rsquo;s registered with stock exchange that means the company is listed or through way of issuing prospectus if the company is Unlisted Public Company. Moreover, this company can be started up just with the paid-up capital of Rs. 5,00,000 /-. However, it&rsquo;s not a mandatory requirement to employ this much capital due to the evasion made by law for the same but its recommendatory requirement that one should bring at least this much capital with oneself to have such an affluent status of a Public Company as it helps to induce public to invest more in your company.</p>\n', 'From Directors and Shareholders', '<ul>\n	<li>Passport Size Photograph</li>\n	<li>Scanned Copy of PAN</li>\n	<li>Scanned Copy of Adhar Card/ Passport/ Election Card/&nbsp;</li>\n	<li>Scanned Copy of Latest Bank Statement /Utility Bill ( Electricity Bill /Telephone Bill )</li>\n</ul>\n\n<p>&nbsp;</p>\n', 'For Proposed Registered Address (Residential/Commercial)', '<ul>\n	<li>Scanned Copy of Rent Agreement (For Rented Premises)</li>\n	<li>Scanned Copy of NOC from Landlord/ Owner</li>\n	<li>Scanned Copy of Electricity Bill</li>\n</ul>\n\n<p>&nbsp;</p>\n', 'CONTINUED EXISTENCE', 'Its Existence will be uninterrupted, as the Death or departure of Member or the director of the Company shall hardly affect the existence of the company. A Company will be continuing irrespective of change of membership or directorship subject to the limits prescribed for the same.', 'LIMITED LIABILITY', 'Liability of Share of Shareholder of company is limited upto unpaid share amount due upon them of their total holding and regarding any other debt only upto the proportion of their shareholding. They shall not be liable for any further debt of the company beyond debt.', 'SHARE TRANSFERABLITY', 'Shares of Public limited company are freely transferable providing the more liquidity to its shareholders, as the fund can be raised through public in the case of this company by way of issuing prospectus, where the Public Company may either be a Listed Entity or an Unlisted Entity.', 'SEPARATE LEGAL ENTITY', 'Unlike Proprietorship or Partnership firms, Private Limited Companies are considered as separate legal entities since, the Benefits & the liabilities of the company and directors are severely considered, as the benefits and the liabilities of the company can’t be treated as if it is of the directors and vice-versa.', 'BRAND RECOGNITION', 'A public company can apprise its brand orientation easily to general public since it has the option to raise fund through public, moreover, it does have the choice to get its shares listed on a stock exchange that can help this type of company to saturate its brand name in wide. ', 'Required Information & Documents', 'We collect all the required Information and the documents, which is required for Company Registration and start the process.', 'Digital Signature & DIN of Director', 'Second step is to obtain the DSC & DIN of each Director.', 'Trademark & Name Availability Search', 'Thirdly, after satiating that no infringement shall be made under Trademark Act for choosing the proposed name, the said name application shall be filed to the registrar of the Company for getting the approval of the said name.', 'Preparation of Documents (MOA & AOA) of Company', 'Immediately after obtaining the name approval, all the required documents pertaining to incorporation shall be uploaded for Final Submission to the registrar of Company.', 'Company Incorporation', 'Finally, Certificate of Incorporation along with the other supporting documents, viz. MOA, AOA PAN & TAN Acknowledgement evidencing Incorporation of Company shall be provided to the concerned party next day after incorporation.', '', 'Big Organisation ', 'More Possibilities ', 'Yes', 'Few Benefits', 'Yes', 'High', 'High', 'High', '2', '3', 'Compare your Best Startup Option ', '', '', '', '1', '2018-03-16 11:44:49', '1'),
(5, 2, '2,1', 'Producer Company', NULL, 'producer-company', '59999', '<ul>\n <li>Package Inclusion for:</li>\n <li>Search of Trademark &amp; Name Availability</li>\n <li>DSC &amp; DIN&nbsp;</li>\n <li>Name Reservation</li>\n <li>MOA , AOA and Other documents</li>\n <li>MCA &amp; Govt. Fees</li>\n <li>Certificate of Incorporation(CIN)</li>\n <li>Company Pan &amp; Tan</li>\n</ul>\n\n<p>Note: GST will be extra on professional fees.</p>\n', '<p style=\"text-align:justify\">A Producer Company is that company which promotes the objectives of agriculture production, post-harvesting processing activities, procurement, selling and distribution, export of primary produce of the Members or import of goods for their benefit. Since, India is an agriculture-based country where approximately 62% of its population depends directly or indirectly upon agriculture, there are more probabilities for incorporation of such type of companies. Indian farmers, being belonging absolutely to unorganized sector, are unable to use the latest technologies in the agricultural sector production due to which they commit suicide that, hitherto, has been accounted for minimum 12 % of all suicides in India.</p>\n\n<p style=\"text-align:justify\">Therefore, Producers Company is the way to provide a Formal structure to the farmers, empowering them to enjoy the corporate milieu which allows them to use the latest technology and reduce the cost of agriculture harvesting.</p>\n\n<p style=\"text-align:justify\">A Producer Company is that company which promotes the objectives of agriculture production, post-harvesting processing activities, procurement, selling and distribution, export of primary produce of the Members or import of goods for their benefit. Since India is an agriculture-based country where approximately 62% of its population depends directly or indirectly upon agriculture, there are more probabilities for incorporation of such type of companies. Indian farmers, being belonging absolutely to unorganized sector, are unable to use the latest technologies in the agricultural sector production due to which they commit suicide that, hitherto, has been accounted for minimum 12 % of all suicides in India.</p>\n\n<p style=\"text-align:justify\">Therefore, Producers Company is the way to provide a Formal structure to the farmers, empowering them to enjoy the corporate milieu which allows them to use the latest technology and reduce the cost of agriculture harvesting.</p>\n', 'From Directors and Shareholders', '<ul>\n	<li>Passport Size Photograph</li>\n	<li>Scanned Copy of PAN</li>\n	<li>Scanned Copy of Adhar Card/ Passport/ Election Card/&nbsp;</li>\n	<li>Scanned Copy of Latest Bank Statement /Utility Bill ( Electricity Bill /Telephone Bill )</li>\n</ul>\n\n<p>&nbsp;</p>\n', 'For Proposed Registered Address (Residential/Commercial)', '<ul>\n	<li>Scanned Copy of Rent Agreement (For Rented Premises)</li>\n	<li>Scanned Copy of NOC from Landlord/ Owner</li>\n	<li>Scanned Copy of Electricity Bill</li>\n</ul>\n', 'ORGANIZED STRUCTURE', 'Producer Company, being registered under the Companies act, shall be treated as part of the Organized Structure, helping the registered person in raising the goodwill easily to reach the eyes of the investors.', 'CONTINUITY OF EXISTENCE', 'Its Existence will be uninterrupted, as the Death or departure of any member or director of the Company shall hardly affect the existence of the company since Producer Company, being a company has Separate Legal Entity. A Company will be continuing notwithstanding any change has been made in membership or directorship subject to the limits prescribed for the same.', 'FINANCIAL ASSISTANCE', 'As attaining the organizational Structure, it becomes easy for the farmers to raise the fund from the well cognizant institutions.', 'PUBLIC IMAGE', 'Becoming the part of organized structure, will definitely help the applicant to raise orientation and to apprise general public about the campaign in which they are involved so that the awareness about their project may be disseminated among people.', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', 'Advantages of Producer Company ', 'Document Required for Producer Company Registration ', '0', '2018-03-16 12:14:39', '1'),
(6, 2, '2,1', 'Limited Liability Partnership', NULL, 'limited-liability-partnership', '7799', '<p>Search of Trademark &amp; Name Availability<br />\nTwo&nbsp; DSC &amp; DIN&nbsp;<br />\nName Reservation<br />\nLLP Agreement preparation<br />\nMCA Govt. Fees<br />\nStamp Fees ( Capital Contribution Rs. 100,000)<br />\nLimited Liability Partnership Identification Number (LLPIN)&nbsp;<br />\nLLP&nbsp; Pan &amp; Tan<br />\nNote: GST will be extra on professional fees.</p>\n', '<p>With the emanation of Limited Liability Partnership Act 2008, it has been realized that LLP elicit the more transcended version of the partnership firm since it has allowed them to reach the organized corporate structure becoming a company. Due to having these attributes it is also considered a hybrid form of a company as it yields both the features of a Partnership firm along with ascribes of a company. &nbsp;Minimum two Partners will be required to register LLP. With the emanation of LLP, the liabilities of partners have made limited that used to be unlimited in the case of a Partnership Firm. LLP is most suitable for the small business owners and Professionals like CA, CS CWA etc. on the contrary, it is not suitable for them who want to have venture funding in business. From the point of view of the credibility, LLP shall have prevalence over Partnership firm or Proprietorship business. Moreover, Annual maintenance of LLP firm is also much cheaper than a Private Limited or Public Limited Company.</p>\n', '', '', '', '', 'LIMITED LIABILITY', 'Liability of Partners of the Limited Liability firm (LLP) is limited upto their Contribution in the firm on proportionate basis, they shall not be liable for any further debt of the company beyond such debt.', 'ORGANIZED STRUCTURE', 'LLP, being having the ascribes of both the Partnership Act and the Companies act, shall be treated as part of the Organized Structure, helping the registered person in raising the goodwill  easily to reach the eyes of the investors.', 'CONTINUITY OF EXISTENCE', 'Its Existence will be uninterrupted, as the Death or departure of any Partner of the Company shall hardly affect the existence of the company since LLP, being a company has Separate Legal Entity. A Company will be continuing notwithstanding any change has been made in Partnership.', 'MINIMAL REGULATORY COMPLIANCE', 'LLP, being having no need of Audit by CA for having the turnover less than 40 lakh and Capital contribution i.e. less than 25 lakh, seems the most attractive for the early stage startups for doing small business', 'TAX ADVANTAGE', 'LLP is exempted from the purview of paying Corporate Dividend Distribution Tax for the partners for making their profit out of the business profit which, on the contrary, is not exempted in the case of any other kind of company.', 'Digital Signature Certificate (DSC)', 'To file the Incorporation, ROC compliance forms, and Tax returns, digital signature is the primitive thing that all proposed directors/promoters of the LLP Company must have for the purpose of signing the documents digitally instead of doing physical signature to register a company.', 'Director Identification Number (DIN)', 'The DIN is required to be obtained for each director/promoter by attesting it from any of the professional prescribed for to do so immediately following to get the DSC in incorporating a LLP. The approval of which shall be confirmed on the mail of the concerned party which takes probably one working day to get approved. ', 'Name approval ', 'The next step is to proceed for to file a Name Approval application to ROC after completing a Trademark search, satiating ourselves that the name of the company is not making any infringement of Trademark Act. Generally, it takes 2 to 3 working days to get the approval from the Registrar of Companies for the registration of a LLP.', 'Incorporation form', 'After getting the Name approval from the Registrar of Companies, final incorporation form along with all underlying and supporting documents viz. document of partners; (PAN, Address proof, Residence Proof, Photograph, Passport) and documents of LLP; (Registered Office Proof, DSC) are required to be filled under the supervision of any of the professional prescribed for to the same authority that may take 15 to 20 days approximately for such submission. And afterwards LLP Agreement that shall be printed on stamp paper has to be filed within 30 days in Form 3 to ROC. In regard of the same the LLPN number shall be allotted by the ROC.', 'PAN, TAN of LLP', 'Afterwards The PAN & TAN application is filed with the Income Tax Department & Acknowledgement has been shared with a client.', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '0', '2018-03-17 08:58:20', '1'),
(7, 2, '2,1', 'Partnership Firm', NULL, 'partnership-firm', '5000', '<ul>\n <li>Drafting of Partnership Deed&nbsp;</li>\n <li>Stamp Duty &amp; Notary Exp.</li>\n <li>PAN &amp; TAN of Partnership&nbsp;</li>\n</ul>\n\n<p>&nbsp;</p>\n', '<p style=\"text-align:justify\">A Partnership is a small business structure under which people can make an association where they are ready to share the profit and the losses those are going to be held in the firm in proportion to the ratios fixed in correspondence with the capital they brought along with them in the firm. However, hitherto, it used to be treated as belonging to the unorganized sector. Now with the implementation of the Limited liability partnership Act. 2008 it has reached the strata of organized sector since LLP is the hybrid form of company which is having the attributes of not only the Partnership firm but also the company, therefore, nowadays people prefer to register their business As LLP. Due to having the attributes of both the company and the partnership firm, the unlimited liability of partners in the general partnership business can be converted into the limited one in the case of LLP Firm; there is no legal implication towards the registrar i.e. ROC in case of having a Partnership Firm registration, on the contrary in case of LLP it does so. It will suffice to have the partnership deed, PAN, and earlier it used to be VAT / Service tax registration, nowadays&lsquo; GST registration&rsquo; to incorporate a Partnership firm.</p>\n', 'Documents Required From Partners ', '<ul>\n	<li>Scan Copy PAN Card&nbsp;</li>\n	<li>Scan Copy Voter&#39;s ID/Passport/Driver&#39;s License</li>\n	<li>Passport-sized photograph of All Partners</li>\n</ul>\n', 'For Proposed Registered Address (Residential/Commercial)', '<ul>\n	<li>Scanned Copy of Rent Agreement (For Rented Premises)</li>\n	<li>Scanned Copy of NOC from Landlord/ Owner</li>\n	<li>Scanned Copy of Electricity Bill</li>\n</ul>\n\n<p>&nbsp;</p>\n', 'EASY TO START', 'Since Registration is not mandatory, the partnership deed will only be required to start the business in case of a Partnership Firm.', 'BUSINESS NAME', 'It would be more appropriating for your business if you would be having your firm name registered under trademark Act so that the brand name of your business can be protected from further competitors. However, in the case of LLP one is required to comply with the rules of ROC as well, since LLP incorporation is done only by the approval of ROC.', 'COST EFFECTIVENESS', 'A General Partnership Firm, being having the minimal compliance requirements, seems to be more cost effective than an LLP/ Private Limited ', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', 'Document Required for Registration of Partnership Firm ', '0', '2018-03-17 11:03:45', '1'),
(8, 2, '2,1', 'Proprietorship Firm', NULL, 'proprietorship-firm', NULL, NULL, '', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '0', '2018-02-01 11:24:33', '1'),
(9, 2, '2,1', 'Indian Subsidiary', NULL, 'indian-subsidiary', NULL, NULL, '', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '0', '2018-02-01 11:24:58', '1'),
(10, 3, '3,1', 'Trust (NGO) Registration', NULL, 'trust-ngo-registration', NULL, NULL, '', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '0', '2018-02-01 11:26:36', '1'),
(11, 3, '3,1', 'Societies Registration', NULL, 'societies-registration', NULL, NULL, '', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '0', '2018-02-01 11:27:05', '1'),
(12, 3, '3,1', 'Section 8 company Registration', NULL, 'section-8-company-registration', NULL, NULL, '', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '0', '2018-02-01 11:27:48', '1'),
(13, 3, '3,1', 'Registration for 80G Certificate', NULL, 'registration-for-80g-certificate', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', NULL, NULL, NULL, NULL, '0', '2018-03-01 15:16:15', '1'),
(14, 3, '3,1', 'FCRA Registration', NULL, 'fcra-registration', NULL, NULL, '', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '0', '2018-02-01 11:28:52', '1'),
(15, 4, '4,1', 'Shops & Establishments Regis', NULL, 'shops-establishments-regis', NULL, NULL, '', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '0', '2018-02-01 11:31:31', '1'),
(16, 4, '4,1', 'Trade License', NULL, 'trade-license', NULL, NULL, '', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '0', '2018-02-01 11:31:55', '1'),
(17, 4, '4,1', 'MSME Registration', NULL, 'msme-registration', NULL, NULL, '', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '0', '2018-02-01 11:32:23', '1'),
(18, 4, '4,1', 'FSSAI Registration', NULL, 'fssai-registration', NULL, NULL, '', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '0', '2018-02-01 11:32:49', '1'),
(19, 4, '4,1', 'Import Export Code', NULL, 'import-export-code', NULL, NULL, '', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '0', '2018-02-01 11:36:47', '1'),
(20, 4, '4,1', 'ESI Registration', NULL, 'esi-registration', NULL, NULL, '', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '0', '2018-02-01 11:37:11', '1'),
(21, 4, '4,1', 'PF Registration', NULL, 'pf-registration', NULL, NULL, '', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '0', '2018-02-01 11:44:38', '1'),
(22, 4, '4,1', 'RERA Registration', NULL, 'rera-registration', NULL, NULL, '', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '0', '2018-02-01 11:44:58', '1'),
(23, 5, '5,1', 'Trademark Registration', NULL, 'trademark-registration', NULL, NULL, '', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '0', '2018-02-01 11:45:48', '1'),
(24, 5, '5,1', 'Copyright Registration', NULL, 'copyright-registration', NULL, NULL, '', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '0', '2018-02-01 11:46:14', '1'),
(25, 5, '5,1', 'Patent Registration', NULL, 'patent-registration', NULL, NULL, '', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '0', '2018-02-01 11:46:45', '1'),
(26, 6, '6,1', 'Founder Agreement', NULL, 'founders-agreement', NULL, NULL, '', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '0', '2018-02-01 11:48:07', '1'),
(27, 6, '6,1', 'Shareholder Agreement', NULL, 'shareholders-agreement', NULL, NULL, '', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '0', '2018-02-01 11:50:14', '1'),
(28, 6, '6,1', 'Term sheet', NULL, 'term-sheet', NULL, NULL, '', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '0', '2018-02-01 11:50:43', '1'),
(29, 6, '6,1', 'Service Level Agreement', NULL, 'service-level-agreement', NULL, NULL, '', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '0', '2018-02-01 11:51:03', '1'),
(30, 6, '6,1', 'Vendor Agreement', NULL, 'vendor-agreement', NULL, NULL, '', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '0', '2018-02-01 11:51:28', '1'),
(31, 6, '6,1', 'Memorandum of Understanding', NULL, 'memorandum-of-understanding', NULL, NULL, '', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '0', '2018-02-01 11:52:00', '1'),
(32, 6, '6,1', 'Joint Venture Agreement', NULL, 'joint-venture-agreement', NULL, NULL, '', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '0', '2018-02-01 11:52:26', '1'),
(33, 6, '6,1', 'Franchise Agreement', NULL, 'franchise-agreement', NULL, NULL, '', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '0', '2018-02-01 11:52:49', '1'),
(34, 6, '6,1', 'Share Purchase Agreement', NULL, 'share-purchase-agreement', NULL, NULL, '', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '0', '2018-02-01 11:53:15', '1'),
(35, 6, '6,1', 'Master Service Agreement', NULL, 'master-service-agreement', NULL, NULL, '', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '0', '2018-02-01 11:53:44', '1'),
(36, 7, '7,1', 'Non-Disclosure Agreement', NULL, 'non-disclosure-agreement', NULL, NULL, '', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '0', '2018-02-01 11:54:11', '1'),
(37, 7, '7,1', 'Consultancy Agreement', NULL, 'consultancy-agreement', NULL, NULL, '', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '0', '2018-02-01 12:00:46', '1'),
(38, 7, '7,1', 'Employment Contract', NULL, 'employment-contract', NULL, NULL, '', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '0', '2018-02-01 12:01:22', '1'),
(39, 7, '7,1', 'Legal Notice', NULL, 'legal-notice', NULL, NULL, '', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '0', '2018-02-01 12:03:00', '1'),
(40, 7, '7,1', 'Will', NULL, 'will', NULL, NULL, '', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '0', '2018-02-01 12:06:46', '1'),
(41, 7, '7,1', 'Gift Deed', NULL, 'gift-deed', NULL, NULL, '', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '0', '2018-02-01 12:09:35', '1'),
(42, 7, '7,1', 'Rental Agreement', NULL, 'rental-agreement', NULL, NULL, '', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '0', '2018-02-01 12:09:53', '1'),
(43, 7, '7,1', 'Sales Deed', NULL, 'sales-deed', NULL, NULL, '', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '0', '2018-02-01 12:10:42', '1'),
(47, 10, '10,9', 'Annual Compliance of Private Limited', NULL, 'annual-compliance-of-private-limited', NULL, NULL, '', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '0', '2018-02-01 12:26:33', '1'),
(48, 10, '10,9', 'Annual Compliance of Public Limited', NULL, 'annual-compliance-of-public-limited', NULL, NULL, '', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '0', '2018-02-01 12:26:56', '1'),
(49, 10, '10,9', 'Annual Compliance of Limited Liability Partnership (LLP)', NULL, 'annual-compliance-of-limited-liability-partnership-llp', NULL, NULL, '', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '0', '2018-02-01 12:27:20', '1'),
(50, 10, '10,9', 'Annual Compliance of One Person Company (OPC)', NULL, 'annual-compliance-of-one-person-company-opc', NULL, NULL, '', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '0', '2018-02-01 12:27:45', '1'),
(51, 10, '10,9', 'Annual compliance of Producer Company', NULL, 'annual-compliance-of-producer-company', NULL, NULL, '', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '0', '2018-02-01 12:28:11', '1'),
(52, 11, '11,9', 'Convert Proprietorship To Private Limited', NULL, 'convert-proprietorship-to-private-limited', NULL, NULL, '', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '0', '2018-02-01 12:34:01', '1'),
(53, 11, '11,9', 'Convert Private Limited To Public Limited', NULL, 'convert-private-limited-to-public-limited', NULL, NULL, '', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '0', '2018-02-01 12:34:22', '1'),
(54, 11, '11,9', 'Convert Partnership To LLP', NULL, 'convert-partnership-to-llp', NULL, NULL, '', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '0', '2018-02-01 12:34:47', '1'),
(55, 11, '11,9', 'Increase in Authorized Share Capital', NULL, 'increase-in-authorized-share-capital', NULL, NULL, '', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '0', '2018-02-01 12:35:12', '1'),
(56, 11, '11,9', 'Change in Registered Office', NULL, 'change-in-registered-office', NULL, NULL, '', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '0', '2018-02-01 12:35:35', '1'),
(57, 11, '11,9', 'Change In Directors', NULL, 'change-in-directors', NULL, NULL, '', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '0', '2018-02-01 12:35:58', '1'),
(58, 11, '11,9', 'Company Share Transfer', NULL, 'company-share-transfer', NULL, NULL, '', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '0', '2018-02-01 12:36:23', '1'),
(59, 12, '12,9', 'GST Registration', NULL, 'gst-registration', NULL, NULL, '', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '0', '2018-02-01 12:36:52', '1'),
(60, 12, '12,9', 'GST Return & Compliance', NULL, 'gst-return-compliance', NULL, NULL, '', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '0', '2018-02-01 12:37:15', '1'),
(61, 12, '12,9', 'TDS Return', NULL, 'tds-return', '', '', '', NULL, NULL, NULL, NULL, '', '', '', '', '', '', '', '', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '0', '2018-02-23 08:07:40', '1'),
(62, 12, '12,9', 'ESI Return', NULL, 'esi-return', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '0', '2018-02-23 12:54:14', '1'),
(63, 12, '12,9', 'PF Return', NULL, 'pf-return', NULL, NULL, '', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '0', '2018-02-01 12:38:28', '1'),
(64, 12, '12,9', 'Income Tax Notice', NULL, 'income-tax-notice', NULL, NULL, '<p>dfererre</p>\r\n', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '0', '2018-02-02 08:03:50', '1'),
(66, 12, '12,9', 'Tax Audit', NULL, 'tax-audit', NULL, NULL, '', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '0', '2018-02-01 12:39:46', '1'),
(67, 12, '12,9', 'Audit and Assurance', NULL, 'audit-and-assurance', '5000', '<ul>\r\n <li>Digital Signature for Two Designated Partner</li>\r\n <li>Directors Identification Number (DIN)</li>\r\n <li>Name approval of the LLP</li>\r\n <li>Drafting of the LLP Agreement</li>\r\n <li>Issuance of Certificate of Incorporation</li>\r\n <li>PAN &amp; TAN of LLP &amp; Bank A/c Opening</li>\r\n <li>Digital Signature for Two Designated Partner</li>\r\n</ul>\r\n', '<p>LLP Registration in India is an alternative corporate business form that gives the benefits of limited liability and the flexibility of a partnership business, In other words it offers benefits of both worlds by bringing simplicity in management and scope of expansion like that of a company. The compliance requirements are relatively less and only few returns have to be filed. For small LLP the audit Is not required and the compliance is based on the information declared by the partners. A Limited Liability Partnership Registration is a new form of business introduced in the year 2009; this is a unique form of business in the sense that it has simplicity of a partnership firm and benefits of limited liability as in a limited corporation. Minimum two people can form an LLP with no maximum limit on the number of its partners. The advantage of llp form of business over a private limited is in the fact that there is less compliance requirement in comparison to a private limited company. For instance audit is not required till the time turnover reaches 40 lac or capital reached Rs. 25 lac. This is preferred choice for small businesses with less capita</p>\r\n', 'Audit and Assurance', '<p>LLP Registration in India is an alternative corporate business form that gives the benefits of limited liability and the flexibility of a partnership business, In other words it offers benefits of both worlds by bringing simplicity in management and scope of expansion like that of a company.</p>\r\n', '', '<p>LLP Registration in India is an alternative corporate business form that gives the benefits of limited liability and the flexibility of a partnership business, In other words it offers benefits of both worlds by bringing simplicity in management and scope of expansion like that of a company.</p>\r\n', 'Minimum Two Person', 'An LLP can be started by at least two partners, however there in limit to the maximum number of partners.', 'Minimum Capital', 'An LLP can be started by at least two partners, however there in limit to the maximum number of partners.', 'Resident Designated Partner', 'An LLP can be started by at least two partners, however there in limit to the maximum number of partners.', 'Unique Name of LLP', 'An LLP can be started by at least two partners, however there in limit to the maximum number of partners.', 'Unique Name of LLP', 'Unique Name of LLP', 'Unique Name of LLP', 'Unique Name of LLP', 'Unique Name of LLP', 'Unique Name of LLP', 'Unique Name of LLP', 'Unique Name of LLP', 'Unique Name of LLP', 'Unique Name of LLP', 'Unique Name of LLP', 'Unique Name of LLP', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '0', '2018-02-23 13:29:46', '1'),
(68, 2, '2,1', 'Nidhi CompanyRegistration', '', 'nidhi-companyregistration', '25000', '<p>ewew</p>\n', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '0', '2018-03-15 10:07:46', '1');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_slide_banners`
--

CREATE TABLE `tbl_slide_banners` (
  `banner_id` int(11) NOT NULL,
  `banner_title` varchar(100) DEFAULT NULL,
  `banner_image` varchar(200) DEFAULT NULL,
  `banner_url` varchar(170) DEFAULT NULL,
  `status` enum('1','0') DEFAULT '1' COMMENT '1=Actice,0=Inactive',
  `clicks` int(11) DEFAULT NULL,
  `banner_added_date` datetime DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_slide_banners`
--

INSERT INTO `tbl_slide_banners` (`banner_id`, `banner_title`, `banner_image`, `banner_url`, `status`, `clicks`, `banner_added_date`) VALUES
(2, 'banner1', 'banner2cAGG.jpg', NULL, '1', 0, '2013-07-11 11:09:01'),
(3, 'banner2', 'banner1PrlC.jpg', NULL, '1', 0, '2013-07-11 11:09:11'),
(4, 'banner3', 'bannerUdmM.jpg', NULL, '1', 0, '2013-07-11 11:09:19'),
(7, 'banner4', 'banner4Eqk8.jpg', NULL, '1', 0, '2018-05-29 14:52:45'),
(8, 'banner5', 'banner50js1.jpg', NULL, '1', 0, '2018-05-29 14:56:21');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_social_profile`
--

CREATE TABLE `tbl_social_profile` (
  `social_id` int(10) NOT NULL,
  `facebook` varchar(255) DEFAULT NULL,
  `google` varchar(255) DEFAULT NULL,
  `linkedIn` varchar(255) DEFAULT NULL,
  `twitter` varchar(255) DEFAULT NULL,
  `instagram` varchar(255) DEFAULT NULL,
  `youtube` varchar(255) DEFAULT NULL,
  `pinterest` varchar(255) DEFAULT NULL,
  `blogger` varchar(255) DEFAULT NULL,
  `tumblr` varchar(255) DEFAULT NULL,
  `wordpress` varchar(255) DEFAULT NULL,
  `update_social` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_social_profile`
--

INSERT INTO `tbl_social_profile` (`social_id`, `facebook`, `google`, `linkedIn`, `twitter`, `instagram`, `youtube`, `pinterest`, `blogger`, `tumblr`, `wordpress`, `update_social`) VALUES
(1, 'https://www.facebook.com/', 'https://plus.google.com/', 'https://www.linkedin.com', 'https://twitter.com/', 'https://www.instagram.com/', 'https://www.youtube.com/', 'https://in.pinterest.com/', 'https://www.blogger.com/', 'https://www.tumblr.com/', 'https://wordpress.com/', '2017-12-25 00:00:00');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_testimonial`
--

CREATE TABLE `tbl_testimonial` (
  `testimonial_id` int(11) NOT NULL,
  `testimonial_title` varchar(150) CHARACTER SET utf8 COLLATE utf8_unicode_ci DEFAULT NULL,
  `poster_name` varchar(30) CHARACTER SET utf8 COLLATE utf8_unicode_ci DEFAULT NULL,
  `email` varchar(80) CHARACTER SET utf8 COLLATE utf8_unicode_ci DEFAULT NULL,
  `testimonial_description` text CHARACTER SET utf8 COLLATE utf8_unicode_ci,
  `photo` varchar(255) CHARACTER SET utf8 COLLATE utf8_unicode_ci DEFAULT NULL,
  `posted_date` datetime DEFAULT NULL,
  `featured` enum('Y','N') NOT NULL DEFAULT 'N' COMMENT 'Y=Yes,N=No',
  `status` enum('1','0') NOT NULL DEFAULT '0' COMMENT '1=Actice,0=Inactive'
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_testimonial`
--

INSERT INTO `tbl_testimonial` (`testimonial_id`, `testimonial_title`, `poster_name`, `email`, `testimonial_description`, `photo`, `posted_date`, `featured`, `status`) VALUES
(11, 'Admin', 'sdffsda', '', '<p>Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry&#39;s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry&#39;s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting,</p>', NULL, '2013-07-17 06:15:13', 'Y', '1');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_testimonials`
--

CREATE TABLE `tbl_testimonials` (
  `testimonials_id` int(11) NOT NULL,
  `testimonials_title` text CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `testimonials_image` varchar(255) CHARACTER SET utf8 COLLATE utf8_unicode_ci DEFAULT NULL,
  `testimonials_address` varchar(255) DEFAULT NULL,
  `testimonials_url` varchar(100) CHARACTER SET utf8 COLLATE utf8_unicode_ci DEFAULT NULL,
  `sort_description` text CHARACTER SET utf8 COLLATE utf8_unicode_ci,
  `testimonials_description` text CHARACTER SET utf8 COLLATE utf8_unicode_ci,
  `publisher` varchar(200) CHARACTER SET utf8 COLLATE utf8_unicode_ci DEFAULT NULL,
  `sort_order` int(11) DEFAULT NULL,
  `status` enum('1','0') DEFAULT '1',
  `recv_date` datetime DEFAULT NULL,
  `featured_testimonials` enum('Y','N') CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL DEFAULT 'N',
  `up_date` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_testimonials`
--

INSERT INTO `tbl_testimonials` (`testimonials_id`, `testimonials_title`, `testimonials_image`, `testimonials_address`, `testimonials_url`, `sort_description`, `testimonials_description`, `publisher`, `sort_order`, `status`, `recv_date`, `featured_testimonials`, `up_date`) VALUES
(6, 'Saul Godman', 'testimonial-3ZcMy.jpg', 'Greader Noida', '0', NULL, '<p>testimonialstestimonialstestimonialstestimonials</p>', NULL, NULL, '1', '2018-05-30 14:03:59', 'N', NULL),
(7, 'Saul Godman', 'testimonial-2O3St.jpg', 'Ramapur Kachhawa Mirzapur', NULL, NULL, '<p>testimonials_addresstestimonials_addresstestimonials_addresstestimonials_address</p>', NULL, NULL, '1', '2018-05-30 14:16:14', 'N', NULL),
(8, 'Saul Godman', 'testimonial-1AoZW.jpg', 'Ramapur Kachhawa Mirzapur', NULL, NULL, '<p>sddsfdasf</p>', NULL, NULL, '1', '2018-05-30 14:40:09', 'N', NULL),
(9, 'Saul Godman', 'testimonial-4KZaM.jpg', 'Ramapur Kachhawa Mirzapur', NULL, NULL, '<p>fsdfdsfdsf</p>', NULL, NULL, '1', '2018-05-30 14:42:37', 'N', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `tbl_zip_location`
--

CREATE TABLE `tbl_zip_location` (
  `zip_location_id` int(11) NOT NULL,
  `location_name` varchar(32) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL DEFAULT '',
  `zip_code` varchar(50) COLLATE latin1_general_ci NOT NULL,
  `added_date` datetime DEFAULT NULL,
  `status` enum('1','2','3') COLLATE latin1_general_ci NOT NULL DEFAULT '1',
  `xls_type` enum('Y','N') COLLATE latin1_general_ci DEFAULT 'N' COMMENT 'Y=Yes,N=No'
) ENGINE=MyISAM DEFAULT CHARSET=latin1 COLLATE=latin1_general_ci;

--
-- Dumping data for table `tbl_zip_location`
--

INSERT INTO `tbl_zip_location` (`zip_location_id`, `location_name`, `zip_code`, `added_date`, `status`, `xls_type`) VALUES
(1, 'Delhi East', '110092', '2013-06-10 12:34:07', '1', 'N'),
(2, 'Agra', '215487', '2013-06-10 12:34:49', '1', 'N'),
(4, 'Australia Square', '1215', '2013-08-06 07:35:15', '1', 'Y'),
(5, 'Grosvenor Place', '1220', '2013-08-06 07:35:15', '1', 'Y'),
(6, 'Royal Exchange', '1225', '2013-08-06 07:35:15', '1', 'Y'),
(7, 'Queen Victoria Building', '1230', '2013-08-06 07:35:15', '1', 'Y'),
(8, 'Eastern Suburbs', '1235', '2013-08-06 07:35:15', '1', 'Y'),
(9, 'Haymarket', '1240', '2013-08-06 07:35:15', '1', 'Y'),
(10, 'Darlinghurst', '1300', '2013-08-06 07:35:15', '1', 'Y'),
(11, 'Potts Point', '1335', '2013-08-06 07:35:15', '1', 'Y'),
(12, 'East Suburbs', '1340', '2013-08-06 07:35:15', '1', 'Y'),
(13, 'Woollahra', '1350', '2013-08-06 07:35:15', '1', 'Y'),
(14, 'East Suburbs', '1355', '2013-08-06 07:35:15', '1', 'Y'),
(15, 'East Suburbs', '1360', '2013-08-06 07:35:15', '1', 'Y'),
(16, 'Waterloo', '1363', '2013-08-06 07:35:15', '1', 'Y'),
(17, 'Alexandria', '1435', '2013-08-06 07:35:15', '1', 'Y'),
(18, 'South Suburbs', '1445', '2013-08-06 07:35:15', '1', 'Y'),
(19, 'Camperdown', '1450', '2013-08-06 07:35:15', '1', 'Y'),
(20, 'Botany', '1455', '2013-08-06 07:35:15', '1', 'Y'),
(21, 'Mascot', '1460', '2013-08-06 07:35:15', '1', 'Y'),
(22, 'South Suburbs', '1465', '2013-08-06 07:35:15', '1', 'Y'),
(23, 'University Of Nsw', '1466', '2013-08-06 07:35:15', '1', 'Y'),
(24, 'South Suburbs', '1470', '2013-08-06 07:35:15', '1', 'Y'),
(25, 'South Suburbs', '1475', '2013-08-06 07:35:15', '1', 'Y'),
(26, 'South Suburbs', '1480', '2013-08-06 07:35:15', '1', 'Y'),
(27, 'South Suburbs', '1481', '2013-08-06 07:35:15', '1', 'Y'),
(28, 'Rockdale', '1485', '2013-08-06 07:35:15', '1', 'Y'),
(29, 'South Suburbs', '1490', '2013-08-06 07:35:15', '1', 'Y'),
(30, 'South Suburbs', '1495', '2013-08-06 07:35:15', '1', 'Y'),
(31, 'South Suburbs', '1499', '2013-08-06 07:35:15', '1', 'Y'),
(32, 'West Chatswood', '1515', '2013-08-06 07:35:15', '1', 'Y'),
(33, 'North Suburbs', '1560', '2013-08-06 07:35:15', '1', 'Y'),
(34, 'North Suburbs', '1565', '2013-08-06 07:35:15', '1', 'Y'),
(35, 'North Suburbs', '1570', '2013-08-06 07:35:15', '1', 'Y'),
(36, 'North Suburbs', '1585', '2013-08-06 07:35:15', '1', 'Y'),
(37, 'North Suburbs', '1590', '2013-08-06 07:35:15', '1', 'Y'),
(38, 'North Suburbs', '1595', '2013-08-06 07:35:15', '1', 'Y'),
(39, 'North Suburbs', '1630', '2013-08-06 07:35:15', '1', 'Y'),
(40, 'North Suburbs', '1635', '2013-08-06 07:35:15', '1', 'Y'),
(41, 'Frenchs Forest', '1639', '2013-08-06 07:35:15', '1', 'Y'),
(42, 'North Suburbs', '1640', '2013-08-06 07:35:15', '1', 'Y'),
(43, 'North Suburbs', '1655', '2013-08-06 07:35:15', '1', 'Y'),
(44, 'North Suburbs', '1660', '2013-08-06 07:35:15', '1', 'Y'),
(45, 'North Ryde', '1670', '2013-08-06 07:35:15', '1', 'Y'),
(46, 'North Suburbs', '1675', '2013-08-06 07:35:15', '1', 'Y'),
(47, 'North Suburbs', '1680', '2013-08-06 07:35:15', '1', 'Y'),
(48, 'North Suburbs', '1685', '2013-08-06 07:35:15', '1', 'Y'),
(49, 'North West Suburbs', '1700', '2013-08-06 07:35:15', '1', 'Y'),
(50, 'Rydalmere', '1701', '2013-08-06 07:35:15', '1', 'Y'),
(51, 'North West Suburbs', '1710', '2013-08-06 07:35:15', '1', 'Y'),
(52, 'North West Suburbs', '1715', '2013-08-06 07:35:15', '1', 'Y'),
(53, 'North West Suburbs', '1730', '2013-08-06 07:35:15', '1', 'Y'),
(54, 'Sydney', '1750', '2013-08-06 07:35:15', '1', 'Y'),
(55, 'North West Suburbs', '1755', '2013-08-06 07:35:15', '1', 'Y'),
(56, 'North West Suburbs', '1765', '2013-08-06 07:35:15', '1', 'Y'),
(57, 'Penrith', '1790', '2013-08-06 07:35:15', '1', 'Y'),
(58, 'South West Suburbs', '1800', '2013-08-06 07:35:15', '1', 'Y'),
(59, 'South West Suburbs', '1805', '2013-08-06 07:35:15', '1', 'Y'),
(60, 'Silverwater', '1811', '2013-08-06 07:35:15', '1', 'Y'),
(61, 'South West Suburbs', '1825', '2013-08-06 07:35:15', '1', 'Y'),
(62, 'South West Suburbs', '1835', '2013-08-06 07:35:15', '1', 'Y'),
(63, 'Wetherill Park', '1851', '2013-08-06 07:35:15', '1', 'Y'),
(64, 'South West Suburbs', '1860', '2013-08-06 07:35:15', '1', 'Y'),
(65, 'Prestons', '1871', '2013-08-06 07:35:15', '1', 'Y'),
(66, 'South West Suburbs', '1875', '2013-08-06 07:35:15', '1', 'Y'),
(67, 'South West Suburbs', '1885', '2013-08-06 07:35:15', '1', 'Y'),
(68, 'South West Suburbs', '1890', '2013-08-06 07:35:15', '1', 'Y'),
(69, 'Milperra', '1891', '2013-08-06 07:35:15', '1', 'Y'),
(70, 'Dawes Point', '2000', '2013-08-06 07:35:15', '1', 'Y'),
(71, 'Haymarket', '2000', '2013-08-06 07:35:15', '1', 'Y'),
(72, 'Millers Point', '2000', '2013-08-06 07:35:15', '1', 'Y'),
(73, 'Sydney', '2000', '2013-08-06 07:35:15', '1', 'Y'),
(74, 'The Rocks', '2000', '2013-08-06 07:35:15', '1', 'Y'),
(75, 'Sydney', '2001', '2013-08-06 07:35:15', '1', 'Y'),
(76, 'World Square', '2002', '2013-08-06 07:35:15', '1', 'Y'),
(77, 'Eastern Suburbs', '2004', '2013-08-06 07:35:15', '1', 'Y'),
(78, 'University Of Sydney', '2006', '2013-08-06 07:35:15', '1', 'Y'),
(79, 'Ultimo', '2007', '2013-08-06 07:35:15', '1', 'Y'),
(80, 'Chippendale', '2008', '2013-08-06 07:35:15', '1', 'Y'),
(81, 'Darlington', '2008', '2013-08-06 07:35:15', '1', 'Y'),
(82, 'Pyrmont', '2009', '2013-08-06 07:35:15', '1', 'Y'),
(83, 'Surry Hills', '2010', '2013-08-06 07:35:15', '1', 'Y'),
(84, 'Darlinghurst', '2010', '2013-08-06 07:35:15', '1', 'Y'),
(85, 'Woolloomooloo', '2011', '2013-08-06 07:35:15', '1', 'Y'),
(86, 'Elizabeth Bay', '2011', '2013-08-06 07:35:15', '1', 'Y'),
(87, 'Potts Point', '2011', '2013-08-06 07:35:15', '1', 'Y'),
(88, 'Rushcutters Bay', '2011', '2013-08-06 07:35:15', '1', 'Y'),
(89, 'Strawberry Hills', '2012', '2013-08-06 07:35:15', '1', 'Y'),
(90, 'Alexandria', '2015', '2013-08-06 07:35:15', '1', 'Y'),
(91, 'Beaconsfield', '2015', '2013-08-06 07:35:15', '1', 'Y'),
(92, 'Eveleigh', '2015', '2013-08-06 07:35:15', '1', 'Y'),
(93, 'Redfern', '2016', '2013-08-06 07:35:15', '1', 'Y'),
(94, 'Waterloo', '2017', '2013-08-06 07:35:15', '1', 'Y'),
(95, 'Zetland', '2017', '2013-08-06 07:35:15', '1', 'Y'),
(96, 'Eastlakes', '2018', '2013-08-06 07:35:15', '1', 'Y'),
(97, 'Rosebery', '2018', '2013-08-06 07:35:15', '1', 'Y'),
(98, 'Banksmeadow', '2019', '2013-08-06 07:35:15', '1', 'Y'),
(99, 'Botany', '2019', '2013-08-06 07:35:15', '1', 'Y'),
(100, 'Mascot', '2020', '2013-08-06 07:35:15', '1', 'Y'),
(101, 'Moore Park', '2021', '2013-08-06 07:35:15', '1', 'Y'),
(102, 'Paddington', '2021', '2013-08-06 07:35:15', '1', 'Y'),
(103, 'Centennial Park', '2021', '2013-08-06 07:35:15', '1', 'Y'),
(104, 'Queens Park', '2022', '2013-08-06 07:35:15', '1', 'Y'),
(105, 'Bondi Junction', '2022', '2013-08-06 07:35:15', '1', 'Y'),
(106, 'Bellevue Hill', '2023', '2013-08-06 07:35:15', '1', 'Y'),
(107, 'Bronte', '2024', '2013-08-06 07:35:15', '1', 'Y'),
(108, 'Waverley', '2024', '2013-08-06 07:35:15', '1', 'Y'),
(109, 'Woollahra', '2025', '2013-08-06 07:35:15', '1', 'Y'),
(110, 'Bondi', '2026', '2013-08-06 07:35:15', '1', 'Y'),
(111, 'Darling Point', '2027', '2013-08-06 07:35:15', '1', 'Y'),
(112, 'Edgecliff', '2027', '2013-08-06 07:35:15', '1', 'Y'),
(113, 'Point Piper', '2027', '2013-08-06 07:35:15', '1', 'Y'),
(114, 'Double Bay', '2028', '2013-08-06 07:35:15', '1', 'Y'),
(115, 'Rose Bay', '2029', '2013-08-06 07:35:15', '1', 'Y'),
(116, 'Vaucluse', '2030', '2013-08-06 07:35:15', '1', 'Y'),
(117, 'Watsons Bay', '2030', '2013-08-06 07:35:15', '1', 'Y'),
(118, 'Dover Heights', '2030', '2013-08-06 07:35:15', '1', 'Y'),
(119, 'Clovelly', '2031', '2013-08-06 07:35:15', '1', 'Y'),
(120, 'Randwick', '2031', '2013-08-06 07:35:15', '1', 'Y'),
(121, 'Daceyville', '2032', '2013-08-06 07:35:15', '1', 'Y'),
(122, 'Kingsford', '2032', '2013-08-06 07:35:15', '1', 'Y'),
(123, 'Kensington', '2033', '2013-08-06 07:35:15', '1', 'Y'),
(124, 'Coogee', '2034', '2013-08-06 07:35:15', '1', 'Y'),
(125, 'South Coogee', '2034', '2013-08-06 07:35:15', '1', 'Y'),
(126, 'Maroubra', '2035', '2013-08-06 07:35:15', '1', 'Y'),
(127, 'Pagewood', '2035', '2013-08-06 07:35:15', '1', 'Y'),
(128, 'Chifley', '2036', '2013-08-06 07:35:15', '1', 'Y'),
(129, 'Eastgardens', '2036', '2013-08-06 07:35:15', '1', 'Y'),
(130, 'Hillsdale', '2036', '2013-08-06 07:35:15', '1', 'Y'),
(131, 'La Perouse', '2036', '2013-08-06 07:35:15', '1', 'Y'),
(132, 'Little Bay', '2036', '2013-08-06 07:35:15', '1', 'Y'),
(133, 'Malabar', '2036', '2013-08-06 07:35:15', '1', 'Y'),
(134, 'Matraville', '2036', '2013-08-06 07:35:15', '1', 'Y'),
(135, 'Phillip Bay', '2036', '2013-08-06 07:35:15', '1', 'Y'),
(136, 'Port Botany', '2036', '2013-08-06 07:35:15', '1', 'Y'),
(137, 'Forest Lodge', '2037', '2013-08-06 07:35:15', '1', 'Y'),
(138, 'Glebe', '2037', '2013-08-06 07:35:15', '1', 'Y'),
(139, 'Annandale', '2038', '2013-08-06 07:35:15', '1', 'Y'),
(140, 'Rozelle', '2039', '2013-08-06 07:35:15', '1', 'Y'),
(141, 'Leichhardt', '2040', '2013-08-06 07:35:15', '1', 'Y'),
(142, 'Lilyfield', '2040', '2013-08-06 07:35:15', '1', 'Y'),
(143, 'Birchgrove', '2040', '2013-08-06 07:35:15', '1', 'Y'),
(144, 'Balmain', '2041', '2013-08-06 07:35:15', '1', 'Y'),
(145, 'Balmain East', '2041', '2013-08-06 07:35:15', '1', 'Y'),
(146, 'Newtown', '2042', '2013-08-06 07:35:15', '1', 'Y'),
(147, 'Enmore', '2042', '2013-08-06 07:35:15', '1', 'Y'),
(148, 'Erskineville', '2043', '2013-08-06 07:35:15', '1', 'Y'),
(149, 'St Peters', '2044', '2013-08-06 07:35:15', '1', 'Y'),
(150, 'Haberfield', '2045', '2013-08-06 07:35:15', '1', 'Y'),
(151, 'Abbotsford', '2046', '2013-08-06 07:35:15', '1', 'Y'),
(152, 'Drummoyne', '2047', '2013-08-06 07:35:15', '1', 'Y'),
(153, 'Stanmore', '2048', '2013-08-06 07:35:15', '1', 'Y'),
(154, 'Lewisham', '2049', '2013-08-06 07:35:15', '1', 'Y'),
(155, 'Camperdown', '2050', '2013-08-06 07:35:15', '1', 'Y'),
(156, 'University Of New South Wales', '2052', '2013-08-06 07:35:15', '1', 'Y'),
(157, 'Chatswood', '2057', '2013-08-06 07:35:15', '1', 'Y'),
(158, 'North Sydney', '2059', '2013-08-06 07:35:15', '1', 'Y'),
(159, 'Waverton', '2060', '2013-08-06 07:35:15', '1', 'Y'),
(160, 'Kirribilli', '2061', '2013-08-06 07:35:15', '1', 'Y'),
(161, 'Cammeray', '2062', '2013-08-06 07:35:15', '1', 'Y'),
(162, 'Northbridge', '2063', '2013-08-06 07:35:15', '1', 'Y'),
(163, 'Artarmon', '2064', '2013-08-06 07:35:15', '1', 'Y'),
(164, 'Crows Nest', '2065', '2013-08-06 07:35:15', '1', 'Y'),
(165, 'Lane Cove', '2066', '2013-08-06 07:35:15', '1', 'Y'),
(166, 'Chatswood', '2067', '2013-08-06 07:35:15', '1', 'Y'),
(167, 'Middle Cove', '2068', '2013-08-06 07:35:15', '1', 'Y'),
(168, 'Roseville', '2069', '2013-08-06 07:35:15', '1', 'Y'),
(169, 'East Lindfield', '2070', '2013-08-06 07:35:15', '1', 'Y'),
(170, 'Killara', '2071', '2013-08-06 07:35:15', '1', 'Y'),
(171, 'Gordon', '2072', '2013-08-06 07:35:15', '1', 'Y'),
(172, 'Pymble', '2073', '2013-08-06 07:35:15', '1', 'Y'),
(173, 'Turramurra', '2074', '2013-08-06 07:35:15', '1', 'Y'),
(174, 'St Ives', '2075', '2013-08-06 07:35:15', '1', 'Y'),
(175, 'Normanhurst', '2076', '2013-08-06 07:35:15', '1', 'Y'),
(176, 'Waitara', '2077', '2013-08-06 07:35:15', '1', 'Y'),
(177, 'Mount Colah', '2079', '2013-08-06 07:35:15', '1', 'Y'),
(178, 'Mount Kuring-gai', '2080', '2013-08-06 07:35:15', '1', 'Y'),
(179, 'Berowra', '2081', '2013-08-06 07:35:15', '1', 'Y'),
(180, 'Berowra Heights', '2082', '2013-08-06 07:35:15', '1', 'Y'),
(181, 'Brooklyn', '2083', '2013-08-06 07:35:15', '1', 'Y'),
(182, 'Duffys Forest', '2084', '2013-08-06 07:35:15', '1', 'Y'),
(183, 'Belrose', '2085', '2013-08-06 07:35:15', '1', 'Y'),
(184, 'Frenchs Forest', '2086', '2013-08-06 07:35:15', '1', 'Y'),
(185, 'Forestville', '2087', '2013-08-06 07:35:15', '1', 'Y'),
(186, 'Mosman', '2088', '2013-08-06 07:35:15', '1', 'Y'),
(187, 'Neutral Bay', '2089', '2013-08-06 07:35:15', '1', 'Y'),
(188, 'Cremorne', '2090', '2013-08-06 07:35:15', '1', 'Y'),
(189, 'Seaforth', '2092', '2013-08-06 07:35:15', '1', 'Y'),
(190, 'Balgowlah', '2093', '2013-08-06 07:35:15', '1', 'Y'),
(191, 'Fairlight', '2094', '2013-08-06 07:35:15', '1', 'Y'),
(192, 'Manly', '2095', '2013-08-06 07:35:15', '1', 'Y'),
(193, 'Queenscliff', '2096', '2013-08-06 07:35:15', '1', 'Y'),
(194, 'Collaroy', '2097', '2013-08-06 07:35:15', '1', 'Y'),
(195, 'Cromer', '2099', '2013-08-06 07:35:15', '1', 'Y'),
(196, 'Beacon Hill', '2100', '2013-08-06 07:35:15', '1', 'Y'),
(197, 'Narrabeen', '2101', '2013-08-06 07:35:15', '1', 'Y'),
(198, 'Warriewood', '2102', '2013-08-06 07:35:15', '1', 'Y'),
(199, 'Mona Vale', '2103', '2013-08-06 07:35:15', '1', 'Y'),
(200, 'Bayview', '2104', '2013-08-06 07:35:15', '1', 'Y'),
(201, 'Church Point', '2105', '2013-08-06 07:35:15', '1', 'Y'),
(202, 'Newport', '2106', '2013-08-06 07:35:15', '1', 'Y'),
(203, 'Whale Beach', '2107', '2013-08-06 07:35:15', '1', 'Y'),
(204, 'Palm Beach', '2108', '2013-08-06 07:35:15', '1', 'Y'),
(205, 'Macquarie University', '2109', '2013-08-06 07:35:15', '1', 'Y'),
(206, 'Woolwich', '2110', '2013-08-06 07:35:15', '1', 'Y'),
(207, 'Gladesville', '2111', '2013-08-06 07:35:15', '1', 'Y'),
(208, 'Putney', '2112', '2013-08-06 07:35:15', '1', 'Y'),
(209, 'Denistone East', '2113', '2013-08-06 07:35:15', '1', 'Y'),
(210, 'Denistone', '2114', '2013-08-06 07:35:15', '1', 'Y'),
(211, 'Ermington', '2115', '2013-08-06 07:35:15', '1', 'Y'),
(212, 'Rydalmere', '2116', '2013-08-06 07:35:15', '1', 'Y'),
(213, 'Telopea', '2117', '2013-08-06 07:35:15', '1', 'Y'),
(214, 'Carlingford', '2118', '2013-08-06 07:35:15', '1', 'Y'),
(215, 'Cheltenham', '2119', '2013-08-06 07:35:15', '1', 'Y'),
(216, 'Pennant Hills', '2120', '2013-08-06 07:35:15', '1', 'Y'),
(217, 'Epping', '2121', '2013-08-06 07:35:15', '1', 'Y'),
(218, 'Marsfield', '2122', '2013-08-06 07:35:15', '1', 'Y'),
(219, 'Parramatta', '2123', '2013-08-06 07:35:15', '1', 'Y'),
(220, 'Parramatta', '2124', '2013-08-06 07:35:15', '1', 'Y'),
(221, 'West Pennant Hills', '2125', '2013-08-06 07:35:15', '1', 'Y'),
(222, 'Cherrybrook', '2126', '2013-08-06 07:35:15', '1', 'Y'),
(223, 'Homebush Bay', '2127', '2013-08-06 07:35:15', '1', 'Y'),
(224, 'Silverwater', '2128', '2013-08-06 07:35:15', '1', 'Y'),
(225, 'Sydney Markets', '2129', '2013-08-06 07:35:15', '1', 'Y'),
(226, 'Summer Hill', '2130', '2013-08-06 07:35:15', '1', 'Y'),
(227, 'Ashfield', '2131', '2013-08-06 07:35:15', '1', 'Y'),
(228, 'Croydon', '2132', '2013-08-06 07:35:15', '1', 'Y'),
(229, 'Croydon Park', '2133', '2013-08-06 07:35:15', '1', 'Y'),
(230, 'Burwood', '2134', '2013-08-06 07:35:15', '1', 'Y'),
(231, 'Strathfield', '2135', '2013-08-06 07:35:15', '1', 'Y'),
(232, 'Strathfield South', '2136', '2013-08-06 07:35:15', '1', 'Y'),
(233, 'Breakfast Point', '2137', '2013-08-06 07:35:15', '1', 'Y'),
(234, 'Concord West', '2138', '2013-08-06 07:35:15', '1', 'Y'),
(235, 'Concord Repatriation Hospital', '2139', '2013-08-06 07:35:15', '1', 'Y'),
(236, 'Homebush', '2140', '2013-08-06 07:35:15', '1', 'Y'),
(237, 'Lidcombe', '2141', '2013-08-06 07:35:15', '1', 'Y'),
(238, 'Rosehill', '2142', '2013-08-06 07:35:15', '1', 'Y'),
(239, 'Birrong', '2143', '2013-08-06 07:35:15', '1', 'Y'),
(240, 'Auburn', '2144', '2013-08-06 07:35:15', '1', 'Y'),
(241, 'Constitution Hill', '2145', '2013-08-06 07:35:15', '1', 'Y'),
(242, 'Toongabbie', '2146', '2013-08-06 07:35:15', '1', 'Y'),
(243, 'Seven Hills', '2147', '2013-08-06 07:35:15', '1', 'Y'),
(244, 'Arndell Park', '2148', '2013-08-06 07:35:15', '1', 'Y'),
(245, 'Harris Park', '2150', '2013-08-06 07:35:15', '1', 'Y'),
(246, 'North Parramatta', '2151', '2013-08-06 07:35:15', '1', 'Y'),
(247, 'Northmead', '2152', '2013-08-06 07:35:15', '1', 'Y'),
(248, 'Winston Hills', '2153', '2013-08-06 07:35:15', '1', 'Y'),
(249, 'Castle Hill', '2154', '2013-08-06 07:35:15', '1', 'Y'),
(250, 'Beaumont Hills', '2155', '2013-08-06 07:35:15', '1', 'Y'),
(251, 'Kenthurst', '2156', '2013-08-06 07:35:15', '1', 'Y'),
(252, 'Glenorie', '2157', '2013-08-06 07:35:15', '1', 'Y'),
(253, 'Dural', '2158', '2013-08-06 07:35:15', '1', 'Y'),
(254, 'Arcadia', '2159', '2013-08-06 07:35:15', '1', 'Y'),
(255, 'Merrylands', '2160', '2013-08-06 07:35:15', '1', 'Y'),
(256, 'Guildford', '2161', '2013-08-06 07:35:15', '1', 'Y'),
(257, 'Sefton', '2162', '2013-08-06 07:35:15', '1', 'Y'),
(258, 'Carramar', '2163', '2013-08-06 07:35:15', '1', 'Y'),
(259, 'Smithfield', '2164', '2013-08-06 07:35:15', '1', 'Y'),
(260, 'Fairfield', '2165', '2013-08-06 07:35:15', '1', 'Y'),
(261, 'Cabramatta', '2166', '2013-08-06 07:35:15', '1', 'Y'),
(262, 'Glenfield', '2167', '2013-08-06 07:35:15', '1', 'Y'),
(263, 'Ashcroft', '2168', '2013-08-06 07:35:15', '1', 'Y'),
(264, 'Casula', '2170', '2013-08-06 07:35:15', '1', 'Y'),
(265, 'Cecil Hills', '2171', '2013-08-06 07:35:15', '1', 'Y'),
(266, 'Pleasure Point', '2172', '2013-08-06 07:35:15', '1', 'Y'),
(267, 'Holsworthy', '2173', '2013-08-06 07:35:15', '1', 'Y'),
(268, 'Edmondson Park', '2174', '2013-08-06 07:35:15', '1', 'Y'),
(269, 'Horsley Park', '2175', '2013-08-06 07:35:15', '1', 'Y'),
(270, 'Abbotsbury', '2176', '2013-08-06 07:35:15', '1', 'Y'),
(271, 'Bonnyrigg', '2177', '2013-08-06 07:35:15', '1', 'Y'),
(272, 'Cecil Park', '2178', '2013-08-06 07:35:15', '1', 'Y'),
(273, 'Austral', '2179', '2013-08-06 07:35:15', '1', 'Y'),
(274, 'Chullora', '2190', '2013-08-06 07:35:15', '1', 'Y'),
(275, 'Belfield', '2191', '2013-08-06 07:35:15', '1', 'Y'),
(276, 'Belmore', '2192', '2013-08-06 07:35:15', '1', 'Y'),
(277, 'Ashbury', '2193', '2013-08-06 07:35:15', '1', 'Y'),
(278, 'Campsie', '2194', '2013-08-06 07:35:15', '1', 'Y'),
(279, 'Lakemba', '2195', '2013-08-06 07:35:15', '1', 'Y'),
(280, 'Punchbowl', '2196', '2013-08-06 07:35:15', '1', 'Y'),
(281, 'Bass Hill', '2197', '2013-08-06 07:35:15', '1', 'Y'),
(282, 'Georges Hall', '2198', '2013-08-06 07:35:15', '1', 'Y'),
(283, 'Yagoona', '2199', '2013-08-06 07:35:15', '1', 'Y'),
(284, 'Bankstown', '2200', '2013-08-06 07:35:15', '1', 'Y'),
(285, 'Dulwich Hill', '2203', '2013-08-06 07:35:15', '1', 'Y'),
(286, 'Marrickville', '2204', '2013-08-06 07:35:15', '1', 'Y'),
(287, 'Arncliffe', '2205', '2013-08-06 07:35:15', '1', 'Y'),
(288, 'Clemton Park', '2206', '2013-08-06 07:35:15', '1', 'Y'),
(289, 'Bardwell Park', '2207', '2013-08-06 07:35:15', '1', 'Y'),
(290, 'Kingsgrove', '2208', '2013-08-06 07:35:15', '1', 'Y'),
(291, 'Beverly Hills', '2209', '2013-08-06 07:35:15', '1', 'Y'),
(292, 'Peakhurst', '2210', '2013-08-06 07:35:15', '1', 'Y'),
(293, 'Padstow', '2211', '2013-08-06 07:35:15', '1', 'Y'),
(294, 'Revesby', '2212', '2013-08-06 07:35:15', '1', 'Y'),
(295, 'East Hills', '2213', '2013-08-06 07:35:15', '1', 'Y'),
(296, 'Milperra', '2214', '2013-08-06 07:35:15', '1', 'Y'),
(297, 'Banksia', '2216', '2013-08-06 07:35:15', '1', 'Y'),
(298, 'Beverley Park', '2217', '2013-08-06 07:35:15', '1', 'Y'),
(299, 'Allawah', '2218', '2013-08-06 07:35:15', '1', 'Y'),
(300, 'Dolls Point', '2219', '2013-08-06 07:35:15', '1', 'Y'),
(301, 'Hurstville', '2220', '2013-08-06 07:35:15', '1', 'Y'),
(302, 'Kyle Bay', '2221', '2013-08-06 07:35:15', '1', 'Y'),
(303, 'Penshurst', '2222', '2013-08-06 07:35:15', '1', 'Y'),
(304, 'Mortdale', '2223', '2013-08-06 07:35:15', '1', 'Y'),
(305, 'Kangaroo Point', '2224', '2013-08-06 07:35:15', '1', 'Y'),
(306, 'Oyster Bay', '2225', '2013-08-06 07:35:15', '1', 'Y'),
(307, 'Bonnet Bay', '2226', '2013-08-06 07:35:15', '1', 'Y'),
(308, 'Gymea', '2227', '2013-08-06 07:35:15', '1', 'Y'),
(309, 'Miranda', '2228', '2013-08-06 07:35:15', '1', 'Y'),
(310, 'Caringbah', '2229', '2013-08-06 07:35:15', '1', 'Y'),
(311, 'Bundeena', '2230', '2013-08-06 07:35:15', '1', 'Y'),
(312, 'Kurnell', '2231', '2013-08-06 07:35:15', '1', 'Y'),
(313, 'Audley', '2232', '2013-08-06 07:35:15', '1', 'Y'),
(314, 'Engadine', '2233', '2013-08-06 07:35:15', '1', 'Y'),
(315, 'Alfords Point', '2234', '2013-08-06 07:35:15', '1', 'Y'),
(316, 'Calga', '2250', '2013-08-06 07:35:15', '1', 'Y'),
(317, 'Avoca Beach', '2251', '2013-08-06 07:35:15', '1', 'Y'),
(318, 'Blackwall', '2256', '2013-08-06 07:35:15', '1', 'Y'),
(319, 'Booker Bay', '2257', '2013-08-06 07:35:15', '1', 'Y'),
(320, 'Kangy Angy', '2258', '2013-08-06 07:35:15', '1', 'Y'),
(321, 'Chain Valley Bay', '2259', '2013-08-06 07:35:15', '1', 'Y'),
(322, 'Erina Heights', '2260', '2013-08-06 07:35:15', '1', 'Y'),
(323, 'Bateau Bay', '2261', '2013-08-06 07:35:15', '1', 'Y'),
(324, 'Blue Haven', '2262', '2013-08-06 07:35:15', '1', 'Y'),
(325, 'Canton Beach', '2263', '2013-08-06 07:35:15', '1', 'Y'),
(326, 'Bonnells Bay', '2264', '2013-08-06 07:35:15', '1', 'Y'),
(327, 'Cooranbong', '2265', '2013-08-06 07:35:15', '1', 'Y'),
(328, 'Wangi Wangi', '2267', '2013-08-06 07:35:16', '1', 'Y'),
(329, 'Barnsley', '2278', '2013-08-06 07:35:16', '1', 'Y'),
(330, 'Belmont', '2280', '2013-08-06 07:35:16', '1', 'Y'),
(331, 'Blacksmiths', '2281', '2013-08-06 07:35:16', '1', 'Y'),
(332, 'Eleebana', '2282', '2013-08-06 07:35:16', '1', 'Y'),
(333, 'Arcadia Vale', '2283', '2013-08-06 07:35:16', '1', 'Y'),
(334, 'Argenton', '2284', '2013-08-06 07:35:16', '1', 'Y'),
(335, 'Cameron Park', '2285', '2013-08-06 07:35:16', '1', 'Y'),
(336, 'Holmesville', '2286', '2013-08-06 07:35:16', '1', 'Y'),
(337, 'Birmingham Gardens', '2287', '2013-08-06 07:35:16', '1', 'Y'),
(338, 'Adamstown', '2289', '2013-08-06 07:35:16', '1', 'Y'),
(339, 'Bennetts Green', '2290', '2013-08-06 07:35:16', '1', 'Y'),
(340, 'Merewether', '2291', '2013-08-06 07:35:16', '1', 'Y'),
(341, 'Broadmeadow', '2292', '2013-08-06 07:35:16', '1', 'Y'),
(342, 'Maryville', '2293', '2013-08-06 07:35:16', '1', 'Y'),
(343, 'Carrington', '2294', '2013-08-06 07:35:16', '1', 'Y'),
(344, 'Fern Bay', '2295', '2013-08-06 07:35:16', '1', 'Y'),
(345, 'Islington', '2296', '2013-08-06 07:35:16', '1', 'Y'),
(346, 'Tighes Hill', '2297', '2013-08-06 07:35:16', '1', 'Y'),
(347, 'Georgetown', '2298', '2013-08-06 07:35:16', '1', 'Y'),
(348, 'Jesmond', '2299', '2013-08-06 07:35:16', '1', 'Y'),
(349, 'Bar Beach', '2300', '2013-08-06 07:35:16', '1', 'Y'),
(350, 'Newcastle West', '2302', '2013-08-06 07:35:16', '1', 'Y'),
(351, 'Hamilton', '2303', '2013-08-06 07:35:16', '1', 'Y'),
(352, 'Kooragang', '2304', '2013-08-06 07:35:16', '1', 'Y'),
(353, 'New Lambton', '2305', '2013-08-06 07:35:16', '1', 'Y'),
(354, 'Windale', '2306', '2013-08-06 07:35:16', '1', 'Y'),
(355, 'Shortland', '2307', '2013-08-06 07:35:16', '1', 'Y'),
(356, 'Callaghan', '2308', '2013-08-06 07:35:16', '1', 'Y'),
(357, 'Hamilton', '2309', '2013-08-06 07:35:16', '1', 'Y'),
(358, 'Hunter Region', '2310', '2013-08-06 07:35:16', '1', 'Y'),
(359, 'Allynbrook', '2311', '2013-08-06 07:35:16', '1', 'Y'),
(360, 'Nabiac', '2312', '2013-08-06 07:35:16', '1', 'Y'),
(361, 'Williamtown Raaf', '2314', '2013-08-06 07:35:16', '1', 'Y'),
(362, 'Corlette', '2315', '2013-08-06 07:35:16', '1', 'Y'),
(363, 'Anna Bay', '2316', '2013-08-06 07:35:16', '1', 'Y'),
(364, 'Salamander Bay', '2317', '2013-08-06 07:35:16', '1', 'Y'),
(365, 'Campvale', '2318', '2013-08-06 07:35:16', '1', 'Y'),
(366, 'Tanilba Bay', '2319', '2013-08-06 07:35:16', '1', 'Y'),
(367, 'Aberglasslyn', '2320', '2013-08-06 07:35:16', '1', 'Y'),
(368, 'Clarence Town', '2321', '2013-08-06 07:35:16', '1', 'Y'),
(369, 'Beresfield', '2322', '2013-08-06 07:35:16', '1', 'Y'),
(370, 'Ashtonfield', '2323', '2013-08-06 07:35:16', '1', 'Y'),
(371, 'Balickera', '2324', '2013-08-06 07:35:16', '1', 'Y'),
(372, 'Aberdare', '2325', '2013-08-06 07:35:16', '1', 'Y'),
(373, 'Abermain', '2326', '2013-08-06 07:35:16', '1', 'Y'),
(374, 'Kurri Kurri', '2327', '2013-08-06 07:35:16', '1', 'Y'),
(375, 'Denman', '2328', '2013-08-06 07:35:16', '1', 'Y'),
(376, 'Borambil', '2329', '2013-08-06 07:35:16', '1', 'Y'),
(377, 'Broke', '2330', '2013-08-06 07:35:16', '1', 'Y'),
(378, 'Singleton Milpo', '2331', '2013-08-06 07:35:16', '1', 'Y'),
(379, 'Baerami Creek', '2333', '2013-08-06 07:35:16', '1', 'Y'),
(380, 'Greta', '2334', '2013-08-06 07:35:16', '1', 'Y'),
(381, 'Belford', '2335', '2013-08-06 07:35:16', '1', 'Y'),
(382, 'Aberdeen', '2336', '2013-08-06 07:35:16', '1', 'Y'),
(383, 'Bunnan', '2337', '2013-08-06 07:35:16', '1', 'Y'),
(384, 'Ardglen', '2338', '2013-08-06 07:35:16', '1', 'Y'),
(385, 'Warrah Creek', '2339', '2013-08-06 07:35:16', '1', 'Y'),
(386, 'Bowling Alley Point', '2340', '2013-08-06 07:35:16', '1', 'Y'),
(387, 'Werris Creek', '2341', '2013-08-06 07:35:16', '1', 'Y'),
(388, 'Currabubula', '2342', '2013-08-06 07:35:16', '1', 'Y'),
(389, 'Blackville', '2343', '2013-08-06 07:35:16', '1', 'Y'),
(390, 'Duri', '2344', '2013-08-06 07:35:16', '1', 'Y'),
(391, 'Attunga', '2345', '2013-08-06 07:35:16', '1', 'Y'),
(392, 'Manilla', '2346', '2013-08-06 07:35:16', '1', 'Y'),
(393, 'Barraba', '2347', '2013-08-06 07:35:16', '1', 'Y'),
(394, 'Tamworth', '2348', '2013-08-06 07:35:16', '1', 'Y'),
(395, 'Armidale', '2350', '2013-08-06 07:35:16', '1', 'Y'),
(396, 'University Of New England', '2351', '2013-08-06 07:35:16', '1', 'Y'),
(397, 'Kootingal', '2352', '2013-08-06 07:35:16', '1', 'Y'),
(398, 'Moonbi', '2353', '2013-08-06 07:35:16', '1', 'Y'),
(399, 'Kentucky', '2354', '2013-08-06 07:35:16', '1', 'Y'),
(400, 'Bendemeer', '2355', '2013-08-06 07:35:16', '1', 'Y'),
(401, 'Gwabegar', '2356', '2013-08-06 07:35:16', '1', 'Y'),
(402, 'Bugaldie', '2357', '2013-08-06 07:35:16', '1', 'Y'),
(403, 'Enmore', '2358', '2013-08-06 07:35:16', '1', 'Y'),
(404, 'Bundarra', '2359', '2013-08-06 07:35:16', '1', 'Y'),
(405, 'Bukkulla', '2360', '2013-08-06 07:35:16', '1', 'Y'),
(406, 'Ashford', '2361', '2013-08-06 07:35:16', '1', 'Y'),
(407, 'Ben Lomond', '2365', '2013-08-06 07:35:16', '1', 'Y'),
(408, 'Stannifer', '2369', '2013-08-06 07:35:16', '1', 'Y'),
(409, 'Dundee', '2370', '2013-08-06 07:35:16', '1', 'Y'),
(410, 'Deepwater', '2371', '2013-08-06 07:35:16', '1', 'Y'),
(411, 'Black Swamp', '2372', '2013-08-06 07:35:16', '1', 'Y'),
(412, 'Mullaley', '2379', '2013-08-06 07:35:16', '1', 'Y'),
(413, 'Gunnedah', '2380', '2013-08-06 07:35:16', '1', 'Y'),
(414, 'Breeza', '2381', '2013-08-06 07:35:16', '1', 'Y'),
(415, 'Boggabri', '2382', '2013-08-06 07:35:16', '1', 'Y'),
(416, 'Burren Junction', '2386', '2013-08-06 07:35:16', '1', 'Y'),
(417, 'Rowena', '2387', '2013-08-06 07:35:16', '1', 'Y'),
(418, 'Cuttabri', '2388', '2013-08-06 07:35:16', '1', 'Y'),
(419, 'Baan Baa', '2390', '2013-08-06 07:35:16', '1', 'Y'),
(420, 'Binnaway', '2395', '2013-08-06 07:35:16', '1', 'Y'),
(421, 'Baradine', '2396', '2013-08-06 07:35:16', '1', 'Y'),
(422, 'Bellata', '2397', '2013-08-06 07:35:16', '1', 'Y'),
(423, 'Gurley', '2398', '2013-08-06 07:35:16', '1', 'Y'),
(424, 'Pallamallawa', '2399', '2013-08-06 07:35:16', '1', 'Y'),
(425, 'Ashley', '2400', '2013-08-06 07:35:16', '1', 'Y'),
(426, 'Gravesend', '2401', '2013-08-06 07:35:16', '1', 'Y'),
(427, 'Coolatai', '2402', '2013-08-06 07:35:16', '1', 'Y'),
(428, 'Delungra', '2403', '2013-08-06 07:35:16', '1', 'Y'),
(429, 'Bingara', '2404', '2013-08-06 07:35:16', '1', 'Y'),
(430, 'Boomi', '2405', '2013-08-06 07:35:16', '1', 'Y'),
(431, 'Mungindi', '2406', '2013-08-06 07:35:16', '1', 'Y'),
(432, 'North Star', '2408', '2013-08-06 07:35:16', '1', 'Y'),
(433, 'Boggabilla', '2409', '2013-08-06 07:35:16', '1', 'Y'),
(434, 'Yetman', '2410', '2013-08-06 07:35:16', '1', 'Y'),
(435, 'Croppa Creek', '2411', '2013-08-06 07:35:16', '1', 'Y'),
(436, 'Monkerai', '2415', '2013-08-06 07:35:16', '1', 'Y'),
(437, 'Bandon Grove', '2420', '2013-08-06 07:35:16', '1', 'Y'),
(438, 'Paterson', '2421', '2013-08-06 07:35:16', '1', 'Y'),
(439, 'Barrington', '2422', '2013-08-06 07:35:16', '1', 'Y'),
(440, 'Boolambayte', '2423', '2013-08-06 07:35:16', '1', 'Y'),
(441, 'Cundle Flat', '2424', '2013-08-06 07:35:16', '1', 'Y'),
(442, 'Allworth', '2425', '2013-08-06 07:35:16', '1', 'Y'),
(443, 'Coopernook', '2426', '2013-08-06 07:35:16', '1', 'Y'),
(444, 'Crowdy Head', '2427', '2013-08-06 07:35:16', '1', 'Y'),
(445, 'Charlotte Bay', '2428', '2013-08-06 07:35:16', '1', 'Y'),
(446, 'Bobin', '2429', '2013-08-06 07:35:16', '1', 'Y'),
(447, 'Bohnock', '2430', '2013-08-06 07:35:16', '1', 'Y'),
(448, 'Jerseyville', '2431', '2013-08-06 07:35:16', '1', 'Y'),
(449, 'Kendall', '2439', '2013-08-06 07:35:16', '1', 'Y'),
(450, 'Bellbrook', '2440', '2013-08-06 07:35:16', '1', 'Y'),
(451, 'Ballengarra', '2441', '2013-08-06 07:35:16', '1', 'Y'),
(452, 'Kempsey', '2442', '2013-08-06 07:35:16', '1', 'Y'),
(453, 'Camden Head', '2443', '2013-08-06 07:35:16', '1', 'Y'),
(454, 'Blackmans Point', '2444', '2013-08-06 07:35:16', '1', 'Y'),
(455, 'Bonny Hills', '2445', '2013-08-06 07:35:16', '1', 'Y'),
(456, 'Bagnoo', '2446', '2013-08-06 07:35:16', '1', 'Y'),
(457, 'Macksville', '2447', '2013-08-06 07:35:16', '1', 'Y'),
(458, 'Nambucca Heads', '2448', '2013-08-06 07:35:16', '1', 'Y'),
(459, 'Argents Hill', '2449', '2013-08-06 07:35:16', '1', 'Y'),
(460, 'Boambee', '2450', '2013-08-06 07:35:16', '1', 'Y'),
(461, 'Boambee East', '2452', '2013-08-06 07:35:16', '1', 'Y'),
(462, 'Bostobrick', '2453', '2013-08-06 07:35:16', '1', 'Y'),
(463, 'Bellingen', '2454', '2013-08-06 07:35:16', '1', 'Y'),
(464, 'Arrawarra Headland', '2455', '2013-08-06 07:35:16', '1', 'Y'),
(465, 'Arrawarra Headland', '2456', '2013-08-06 07:35:16', '1', 'Y'),
(466, 'Baryulgil', '2460', '2013-08-06 07:35:16', '1', 'Y'),
(467, 'Pillar Valley', '2462', '2013-08-06 07:35:16', '1', 'Y'),
(468, 'Brooms Head', '2463', '2013-08-06 07:35:16', '1', 'Y'),
(469, 'Yamba', '2464', '2013-08-06 07:35:16', '1', 'Y'),
(470, 'Harwood', '2465', '2013-08-06 07:35:16', '1', 'Y'),
(471, 'Iluka', '2466', '2013-08-06 07:35:16', '1', 'Y'),
(472, 'Bonalbo', '2469', '2013-08-06 07:35:16', '1', 'Y'),
(473, 'Backmede', '2470', '2013-08-06 07:35:16', '1', 'Y'),
(474, 'Coraki', '2471', '2013-08-06 07:35:16', '1', 'Y'),
(475, 'Broadwater', '2472', '2013-08-06 07:35:16', '1', 'Y'),
(476, 'Evans Head', '2473', '2013-08-06 07:35:16', '1', 'Y'),
(477, 'Cawongla', '2474', '2013-08-06 07:35:16', '1', 'Y'),
(478, 'Urbenville', '2475', '2013-08-06 07:35:16', '1', 'Y'),
(479, 'Acacia Plateau', '2476', '2013-08-06 07:35:16', '1', 'Y'),
(480, 'Alstonville', '2477', '2013-08-06 07:35:16', '1', 'Y'),
(481, 'Ballina', '2478', '2013-08-06 07:35:16', '1', 'Y'),
(482, 'Bangalow', '2479', '2013-08-06 07:35:16', '1', 'Y'),
(483, 'Bentley', '2480', '2013-08-06 07:35:16', '1', 'Y'),
(484, 'Broken Head', '2481', '2013-08-06 07:35:16', '1', 'Y'),
(485, 'Goonengerry', '2482', '2013-08-06 07:35:16', '1', 'Y'),
(486, 'Billinudgel', '2483', '2013-08-06 07:35:16', '1', 'Y'),
(487, 'Back Creek', '2484', '2013-08-06 07:35:16', '1', 'Y'),
(488, 'Tweed Heads', '2485', '2013-08-06 07:35:16', '1', 'Y'),
(489, 'Banora Point', '2486', '2013-08-06 07:35:16', '1', 'Y'),
(490, 'Chinderah', '2487', '2013-08-06 07:35:16', '1', 'Y'),
(491, 'Bogangar', '2488', '2013-08-06 07:35:16', '1', 'Y'),
(492, 'Hastings Point', '2489', '2013-08-06 07:35:16', '1', 'Y'),
(493, 'Tumbulgum', '2490', '2013-08-06 07:35:16', '1', 'Y'),
(494, 'Coniston', '2500', '2013-08-06 07:35:16', '1', 'Y'),
(495, 'Cringila', '2502', '2013-08-06 07:35:16', '1', 'Y'),
(496, 'Kemblawarra', '2505', '2013-08-06 07:35:16', '1', 'Y'),
(497, 'Berkeley', '2506', '2013-08-06 07:35:16', '1', 'Y'),
(498, 'Coalcliff', '2508', '2013-08-06 07:35:16', '1', 'Y'),
(499, 'Austinmer', '2515', '2013-08-06 07:35:16', '1', 'Y'),
(500, 'Bulli', '2516', '2013-08-06 07:35:16', '1', 'Y'),
(501, 'Russell Vale', '2517', '2013-08-06 07:35:16', '1', 'Y'),
(502, 'Bellambi', '2518', '2013-08-06 07:35:16', '1', 'Y'),
(503, 'Balgownie', '2519', '2013-08-06 07:35:16', '1', 'Y'),
(504, 'Wollongong', '2520', '2013-08-06 07:35:16', '1', 'Y'),
(505, 'South Coast', '2521', '2013-08-06 07:35:16', '1', 'Y'),
(506, 'University Of Wollongong', '2522', '2013-08-06 07:35:16', '1', 'Y'),
(507, 'Figtree', '2525', '2013-08-06 07:35:16', '1', 'Y'),
(508, 'Cordeaux Heights', '2526', '2013-08-06 07:35:16', '1', 'Y'),
(509, 'Albion Park', '2527', '2013-08-06 07:35:16', '1', 'Y'),
(510, 'Barrack Heights', '2528', '2013-08-06 07:35:16', '1', 'Y'),
(511, 'Blackbutt', '2529', '2013-08-06 07:35:16', '1', 'Y'),
(512, 'Brownsville', '2530', '2013-08-06 07:35:16', '1', 'Y'),
(513, 'Bombo', '2533', '2013-08-06 07:35:16', '1', 'Y'),
(514, 'Foxground', '2534', '2013-08-06 07:35:16', '1', 'Y'),
(515, 'Bellawongarah', '2535', '2013-08-06 07:35:16', '1', 'Y'),
(516, 'Batehaven', '2536', '2013-08-06 07:35:16', '1', 'Y'),
(517, 'Bergalia', '2537', '2013-08-06 07:35:16', '1', 'Y'),
(518, 'Milton', '2538', '2013-08-06 07:35:16', '1', 'Y'),
(519, 'Bawley Point', '2539', '2013-08-06 07:35:16', '1', 'Y'),
(520, 'Bamarang', '2540', '2013-08-06 07:35:16', '1', 'Y'),
(521, 'Bangalee', '2541', '2013-08-06 07:35:16', '1', 'Y'),
(522, 'Bodalla', '2545', '2013-08-06 07:35:16', '1', 'Y'),
(523, 'Barragga Bay', '2546', '2013-08-06 07:35:16', '1', 'Y'),
(524, 'Berrambool', '2548', '2013-08-06 07:35:16', '1', 'Y'),
(525, 'Broadwater', '2549', '2013-08-06 07:35:16', '1', 'Y'),
(526, 'Bega', '2550', '2013-08-06 07:35:16', '1', 'Y'),
(527, 'Eden', '2551', '2013-08-06 07:35:16', '1', 'Y'),
(528, 'Badgerys Creek', '2555', '2013-08-06 07:35:16', '1', 'Y'),
(529, 'Bringelly', '2556', '2013-08-06 07:35:16', '1', 'Y'),
(530, 'Catherine Field', '2557', '2013-08-06 07:35:16', '1', 'Y'),
(531, 'Eagle Vale', '2558', '2013-08-06 07:35:16', '1', 'Y'),
(532, 'Blairmount', '2559', '2013-08-06 07:35:16', '1', 'Y'),
(533, 'Airds', '2560', '2013-08-06 07:35:16', '1', 'Y'),
(534, 'Menangle Park', '2563', '2013-08-06 07:35:16', '1', 'Y'),
(535, 'Long Point', '2564', '2013-08-06 07:35:16', '1', 'Y'),
(536, 'Macquarie Links', '2565', '2013-08-06 07:35:16', '1', 'Y'),
(537, 'Bow Bowing', '2566', '2013-08-06 07:35:16', '1', 'Y'),
(538, 'Currans Hill', '2567', '2013-08-06 07:35:16', '1', 'Y'),
(539, 'Menangle', '2568', '2013-08-06 07:35:16', '1', 'Y'),
(540, 'Douglas Park', '2569', '2013-08-06 07:35:16', '1', 'Y'),
(541, 'Camden', '2570', '2013-08-06 07:35:16', '1', 'Y'),
(542, 'Balmoral Village', '2571', '2013-08-06 07:35:16', '1', 'Y'),
(543, 'Lakesland', '2572', '2013-08-06 07:35:16', '1', 'Y'),
(544, 'Tahmoor', '2573', '2013-08-06 07:35:16', '1', 'Y'),
(545, 'Bargo', '2574', '2013-08-06 07:35:16', '1', 'Y'),
(546, 'Aylmerton', '2575', '2013-08-06 07:35:16', '1', 'Y'),
(547, 'Bowral', '2576', '2013-08-06 07:35:16', '1', 'Y'),
(548, 'Avoca', '2577', '2013-08-06 07:35:16', '1', 'Y'),
(549, 'Bundanoon', '2578', '2013-08-06 07:35:16', '1', 'Y'),
(550, 'Exeter', '2579', '2013-08-06 07:35:16', '1', 'Y'),
(551, 'Bannister', '2580', '2013-08-06 07:35:16', '1', 'Y'),
(552, 'Breadalbane', '2581', '2013-08-06 07:35:16', '1', 'Y'),
(553, 'Bookham', '2582', '2013-08-06 07:35:16', '1', 'Y'),
(554, 'Bigga', '2583', '2013-08-06 07:35:16', '1', 'Y'),
(555, 'Binalong', '2584', '2013-08-06 07:35:16', '1', 'Y'),
(556, 'Galong', '2585', '2013-08-06 07:35:16', '1', 'Y'),
(557, 'Boorowa', '2586', '2013-08-06 07:35:16', '1', 'Y'),
(558, 'Harden', '2587', '2013-08-06 07:35:16', '1', 'Y'),
(559, 'Wallendbeen', '2588', '2013-08-06 07:35:16', '1', 'Y'),
(560, 'Bethungra', '2590', '2013-08-06 07:35:16', '1', 'Y'),
(561, 'Bribbaree', '2594', '2013-08-06 07:35:16', '1', 'Y'),
(562, 'Brindabella', '2611', '2013-08-06 07:35:16', '1', 'Y'),
(563, 'Jerrabomberra', '2619', '2013-08-06 07:35:16', '1', 'Y'),
(564, 'Burra', '2620', '2013-08-06 07:35:16', '1', 'Y'),
(565, 'Bungendore', '2621', '2013-08-06 07:35:16', '1', 'Y'),
(566, 'Araluen', '2622', '2013-08-06 07:35:16', '1', 'Y'),
(567, 'Captains Flat', '2623', '2013-08-06 07:35:16', '1', 'Y'),
(568, 'Perisher Valley', '2624', '2013-08-06 07:35:16', '1', 'Y'),
(569, 'Thredbo Village', '2625', '2013-08-06 07:35:16', '1', 'Y'),
(570, 'Bredbo', '2626', '2013-08-06 07:35:16', '1', 'Y'),
(571, 'Jindabyne', '2627', '2013-08-06 07:35:16', '1', 'Y'),
(572, 'Berridale', '2628', '2013-08-06 07:35:16', '1', 'Y'),
(573, 'Adaminaby', '2629', '2013-08-06 07:35:16', '1', 'Y'),
(574, 'Bungarby', '2630', '2013-08-06 07:35:16', '1', 'Y'),
(575, 'Ando', '2631', '2013-08-06 07:35:16', '1', 'Y'),
(576, 'Bibbenluke', '2632', '2013-08-06 07:35:16', '1', 'Y'),
(577, 'Delegate', '2633', '2013-08-06 07:35:16', '1', 'Y'),
(578, 'Albury', '2640', '2013-08-06 07:35:16', '1', 'Y'),
(579, 'Lavington', '2641', '2013-08-06 07:35:16', '1', 'Y'),
(580, 'Brocklesby', '2642', '2013-08-06 07:35:16', '1', 'Y'),
(581, 'Howlong', '2643', '2013-08-06 07:35:16', '1', 'Y'),
(582, 'Bowna', '2644', '2013-08-06 07:35:16', '1', 'Y'),
(583, 'Urana', '2645', '2013-08-06 07:35:16', '1', 'Y'),
(584, 'Balldale', '2646', '2013-08-06 07:35:16', '1', 'Y'),
(585, 'Mulwala', '2647', '2013-08-06 07:35:16', '1', 'Y'),
(586, 'Cal Lal', '2648', '2013-08-06 07:35:16', '1', 'Y'),
(587, 'Laurel Hill', '2649', '2013-08-06 07:35:16', '1', 'Y'),
(588, 'Ashmont', '2650', '2013-08-06 07:35:16', '1', 'Y'),
(589, 'Forest Hill', '2651', '2013-08-06 07:35:16', '1', 'Y'),
(590, 'Boree Creek', '2652', '2013-08-06 07:35:16', '1', 'Y'),
(591, 'Mannus', '2653', '2013-08-06 07:35:16', '1', 'Y'),
(592, 'French Park', '2655', '2013-08-06 07:35:16', '1', 'Y'),
(593, 'Lockhart', '2656', '2013-08-06 07:35:16', '1', 'Y'),
(594, 'Henty', '2658', '2013-08-06 07:35:16', '1', 'Y'),
(595, 'Walla Walla', '2659', '2013-08-06 07:35:16', '1', 'Y'),
(596, 'Culcairn', '2660', '2013-08-06 07:35:16', '1', 'Y'),
(597, 'Kapooka', '2661', '2013-08-06 07:35:16', '1', 'Y'),
(598, 'Junee', '2663', '2013-08-06 07:35:16', '1', 'Y'),
(599, 'Ardlethan', '2665', '2013-08-06 07:35:16', '1', 'Y'),
(600, 'Grogan', '2666', '2013-08-06 07:35:16', '1', 'Y'),
(601, 'Barmedman', '2668', '2013-08-06 07:35:16', '1', 'Y'),
(602, 'Bygalorie', '2669', '2013-08-06 07:35:16', '1', 'Y'),
(603, 'Burcher', '2671', '2013-08-06 07:35:16', '1', 'Y'),
(604, 'Burgooney', '2672', '2013-08-06 07:35:16', '1', 'Y'),
(605, 'Hillston', '2675', '2013-08-06 07:35:16', '1', 'Y'),
(606, 'Riverina', '2678', '2013-08-06 07:35:16', '1', 'Y'),
(607, 'Beelbangera', '2680', '2013-08-06 07:35:16', '1', 'Y'),
(608, 'Yenda', '2681', '2013-08-06 07:35:16', '1', 'Y'),
(609, 'Corobimilla', '2700', '2013-08-06 07:35:16', '1', 'Y'),
(610, 'Coolamon', '2701', '2013-08-06 07:35:16', '1', 'Y'),
(611, 'Ganmain', '2702', '2013-08-06 07:35:16', '1', 'Y'),
(612, 'Yanco', '2703', '2013-08-06 07:35:16', '1', 'Y'),
(613, 'Corbie Hill', '2705', '2013-08-06 07:35:16', '1', 'Y'),
(614, 'Darlington Point', '2706', '2013-08-06 07:35:16', '1', 'Y'),
(615, 'Argoon', '2707', '2013-08-06 07:35:16', '1', 'Y'),
(616, 'Lavington', '2708', '2013-08-06 07:35:16', '1', 'Y'),
(617, 'Caldwell', '2710', '2013-08-06 07:35:16', '1', 'Y'),
(618, 'Booligal', '2711', '2013-08-06 07:35:16', '1', 'Y'),
(619, 'Berrigan', '2712', '2013-08-06 07:35:16', '1', 'Y'),
(620, 'Blighty', '2713', '2013-08-06 07:35:16', '1', 'Y'),
(621, 'Tocumwal', '2714', '2013-08-06 07:35:16', '1', 'Y'),
(622, 'Balranald', '2715', '2013-08-06 07:35:16', '1', 'Y'),
(623, 'Jerilderie', '2716', '2013-08-06 07:35:16', '1', 'Y'),
(624, 'Dareton', '2717', '2013-08-06 07:35:16', '1', 'Y'),
(625, 'Gilmore', '2720', '2013-08-06 07:35:16', '1', 'Y'),
(626, 'Quandialla', '2721', '2013-08-06 07:35:16', '1', 'Y'),
(627, 'Brungle', '2722', '2013-08-06 07:35:16', '1', 'Y'),
(628, 'Stockinbingal', '2725', '2013-08-06 07:35:16', '1', 'Y'),
(629, 'Jugiong', '2726', '2013-08-06 07:35:16', '1', 'Y'),
(630, 'Adjungbilly', '2727', '2013-08-06 07:35:16', '1', 'Y'),
(631, 'Adelong', '2729', '2013-08-06 07:35:16', '1', 'Y'),
(632, 'Batlow', '2730', '2013-08-06 07:35:16', '1', 'Y'),
(633, 'Bunnaloo', '2731', '2013-08-06 07:35:16', '1', 'Y'),
(634, 'Barham', '2732', '2013-08-06 07:35:16', '1', 'Y'),
(635, 'Moulamein', '2733', '2013-08-06 07:35:16', '1', 'Y'),
(636, 'Kyalite', '2734', '2013-08-06 07:35:16', '1', 'Y'),
(637, 'Koraleigh', '2735', '2013-08-06 07:35:16', '1', 'Y'),
(638, 'Tooleybuc', '2736', '2013-08-06 07:35:16', '1', 'Y'),
(639, 'Euston', '2737', '2013-08-06 07:35:16', '1', 'Y'),
(640, 'Gol Gol', '2738', '2013-08-06 07:35:16', '1', 'Y'),
(641, 'Buronga', '2739', '2013-08-06 07:35:16', '1', 'Y'),
(642, 'Glenmore Park', '2745', '2013-08-06 07:35:16', '1', 'Y'),
(643, 'Cambridge Park', '2747', '2013-08-06 07:35:16', '1', 'Y'),
(644, 'Orchard Hills', '2748', '2013-08-06 07:35:16', '1', 'Y'),
(645, 'Castlereagh', '2749', '2013-08-06 07:35:16', '1', 'Y'),
(646, 'Emu Plains', '2750', '2013-08-06 07:35:16', '1', 'Y'),
(647, 'Penrith', '2751', '2013-08-06 07:35:16', '1', 'Y'),
(648, 'Silverdale', '2752', '2013-08-06 07:35:16', '1', 'Y'),
(649, 'Bowen Mountain', '2753', '2013-08-06 07:35:16', '1', 'Y'),
(650, 'North Richmond', '2754', '2013-08-06 07:35:16', '1', 'Y'),
(651, 'Richmond Raaf', '2755', '2013-08-06 07:35:16', '1', 'Y'),
(652, 'Bligh Park', '2756', '2013-08-06 07:35:16', '1', 'Y'),
(653, 'Kurmond', '2757', '2013-08-06 07:35:16', '1', 'Y'),
(654, 'Bilpin', '2758', '2013-08-06 07:35:16', '1', 'Y'),
(655, 'St Clair', '2759', '2013-08-06 07:35:16', '1', 'Y'),
(656, 'Colyton', '2760', '2013-08-06 07:35:16', '1', 'Y'),
(657, 'Dean Park', '2761', '2013-08-06 07:35:16', '1', 'Y'),
(658, 'Schofields', '2762', '2013-08-06 07:35:16', '1', 'Y'),
(659, 'Acacia Gardens', '2763', '2013-08-06 07:35:16', '1', 'Y'),
(660, 'Berkshire Park', '2765', '2013-08-06 07:35:16', '1', 'Y'),
(661, 'Eastern Creek', '2766', '2013-08-06 07:35:16', '1', 'Y'),
(662, 'Doonside', '2767', '2013-08-06 07:35:16', '1', 'Y'),
(663, 'Glenwood', '2768', '2013-08-06 07:35:16', '1', 'Y'),
(664, 'Bidwill', '2770', '2013-08-06 07:35:16', '1', 'Y'),
(665, 'Glenbrook', '2773', '2013-08-06 07:35:16', '1', 'Y'),
(666, 'Mount Riverview', '2774', '2013-08-06 07:35:16', '1', 'Y'),
(667, 'Central Macdonald', '2775', '2013-08-06 07:35:16', '1', 'Y'),
(668, 'Faulconbridge', '2776', '2013-08-06 07:35:16', '1', 'Y'),
(669, 'Hawkesbury Heights', '2777', '2013-08-06 07:35:16', '1', 'Y'),
(670, 'Linden', '2778', '2013-08-06 07:35:16', '1', 'Y'),
(671, 'Hazelbrook', '2779', '2013-08-06 07:35:16', '1', 'Y'),
(672, 'Katoomba', '2780', '2013-08-06 07:35:16', '1', 'Y'),
(673, 'Wentworth Falls', '2782', '2013-08-06 07:35:16', '1', 'Y'),
(674, 'Lawson', '2783', '2013-08-06 07:35:16', '1', 'Y'),
(675, 'Bullaburra', '2784', '2013-08-06 07:35:16', '1', 'Y'),
(676, 'Blackheath', '2785', '2013-08-06 07:35:16', '1', 'Y'),
(677, 'Bell', '2786', '2013-08-06 07:35:16', '1', 'Y'),
(678, 'Black Springs', '2787', '2013-08-06 07:35:16', '1', 'Y'),
(679, 'Bowenfels', '2790', '2013-08-06 07:35:16', '1', 'Y'),
(680, 'Carcoar', '2791', '2013-08-06 07:35:16', '1', 'Y'),
(681, 'Mandurama', '2792', '2013-08-06 07:35:16', '1', 'Y'),
(682, 'Darbys Falls', '2793', '2013-08-06 07:35:16', '1', 'Y'),
(683, 'Bumbaldry', '2794', '2013-08-06 07:35:16', '1', 'Y'),
(684, 'Bald Ridge', '2795', '2013-08-06 07:35:16', '1', 'Y'),
(685, 'Garland', '2797', '2013-08-06 07:35:16', '1', 'Y'),
(686, 'Forest Reefs', '2798', '2013-08-06 07:35:16', '1', 'Y'),
(687, 'Barry', '2799', '2013-08-06 07:35:16', '1', 'Y'),
(688, 'Borenore', '2800', '2013-08-06 07:35:16', '1', 'Y'),
(689, 'Bendick Murrell', '2803', '2013-08-06 07:35:16', '1', 'Y'),
(690, 'Canowindra', '2804', '2013-08-06 07:35:16', '1', 'Y'),
(691, 'Gooloogong', '2805', '2013-08-06 07:35:16', '1', 'Y'),
(692, 'Eugowra', '2806', '2013-08-06 07:35:16', '1', 'Y'),
(693, 'Koorawatha', '2807', '2013-08-06 07:35:16', '1', 'Y'),
(694, 'Greenethorpe', '2809', '2013-08-06 07:35:16', '1', 'Y'),
(695, 'Bimbi', '2810', '2013-08-06 07:35:16', '1', 'Y'),
(696, 'Arthurville', '2820', '2013-08-06 07:35:16', '1', 'Y'),
(697, 'Narromine', '2821', '2013-08-06 07:35:16', '1', 'Y'),
(698, 'Trangie', '2823', '2013-08-06 07:35:16', '1', 'Y'),
(699, 'Warren', '2824', '2013-08-06 07:35:16', '1', 'Y'),
(700, 'Bogan', '2825', '2013-08-06 07:35:16', '1', 'Y');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `tbl_admin`
--
ALTER TABLE `tbl_admin`
  ADD PRIMARY KEY (`admin_id`);

--
-- Indexes for table `tbl_advertise`
--
ALTER TABLE `tbl_advertise`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tbl_auto_respond_mails`
--
ALTER TABLE `tbl_auto_respond_mails`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tbl_banners`
--
ALTER TABLE `tbl_banners`
  ADD PRIMARY KEY (`banner_id`);

--
-- Indexes for table `tbl_blog`
--
ALTER TABLE `tbl_blog`
  ADD PRIMARY KEY (`blog_id`);

--
-- Indexes for table `tbl_categories`
--
ALTER TABLE `tbl_categories`
  ADD PRIMARY KEY (`category_id`);

--
-- Indexes for table `tbl_cms_pages`
--
ALTER TABLE `tbl_cms_pages`
  ADD PRIMARY KEY (`page_id`),
  ADD KEY `friendly_url` (`friendly_url`);

--
-- Indexes for table `tbl_countries`
--
ALTER TABLE `tbl_countries`
  ADD PRIMARY KEY (`country_id`);

--
-- Indexes for table `tbl_customers`
--
ALTER TABLE `tbl_customers`
  ADD PRIMARY KEY (`customers_id`);

--
-- Indexes for table `tbl_customers_address_book`
--
ALTER TABLE `tbl_customers_address_book`
  ADD PRIMARY KEY (`address_id`);

--
-- Indexes for table `tbl_enquiry`
--
ALTER TABLE `tbl_enquiry`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tbl_faq`
--
ALTER TABLE `tbl_faq`
  ADD PRIMARY KEY (`faq_id`);

--
-- Indexes for table `tbl_invite_friends`
--
ALTER TABLE `tbl_invite_friends`
  ADD PRIMARY KEY (`invite_id`);

--
-- Indexes for table `tbl_meta_tags`
--
ALTER TABLE `tbl_meta_tags`
  ADD PRIMARY KEY (`meta_id`);

--
-- Indexes for table `tbl_news`
--
ALTER TABLE `tbl_news`
  ADD PRIMARY KEY (`news_id`);

--
-- Indexes for table `tbl_newsletters`
--
ALTER TABLE `tbl_newsletters`
  ADD PRIMARY KEY (`subscriber_id`);

--
-- Indexes for table `tbl_order`
--
ALTER TABLE `tbl_order`
  ADD PRIMARY KEY (`order_id`);

--
-- Indexes for table `tbl_package`
--
ALTER TABLE `tbl_package`
  ADD PRIMARY KEY (`package_id`);

--
-- Indexes for table `tbl_payment_setting`
--
ALTER TABLE `tbl_payment_setting`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tbl_product`
--
ALTER TABLE `tbl_product`
  ADD PRIMARY KEY (`product_id`);

--
-- Indexes for table `tbl_services`
--
ALTER TABLE `tbl_services`
  ADD PRIMARY KEY (`service_id`),
  ADD UNIQUE KEY `service_url` (`service_url`);

--
-- Indexes for table `tbl_slide_banners`
--
ALTER TABLE `tbl_slide_banners`
  ADD PRIMARY KEY (`banner_id`);

--
-- Indexes for table `tbl_social_profile`
--
ALTER TABLE `tbl_social_profile`
  ADD PRIMARY KEY (`social_id`);

--
-- Indexes for table `tbl_testimonial`
--
ALTER TABLE `tbl_testimonial`
  ADD PRIMARY KEY (`testimonial_id`);

--
-- Indexes for table `tbl_testimonials`
--
ALTER TABLE `tbl_testimonials`
  ADD PRIMARY KEY (`testimonials_id`);

--
-- Indexes for table `tbl_zip_location`
--
ALTER TABLE `tbl_zip_location`
  ADD PRIMARY KEY (`zip_location_id`),
  ADD KEY `idx_mfg_name_zen` (`location_name`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `tbl_admin`
--
ALTER TABLE `tbl_admin`
  MODIFY `admin_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `tbl_advertise`
--
ALTER TABLE `tbl_advertise`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `tbl_auto_respond_mails`
--
ALTER TABLE `tbl_auto_respond_mails`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;

--
-- AUTO_INCREMENT for table `tbl_banners`
--
ALTER TABLE `tbl_banners`
  MODIFY `banner_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT for table `tbl_blog`
--
ALTER TABLE `tbl_blog`
  MODIFY `blog_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `tbl_categories`
--
ALTER TABLE `tbl_categories`
  MODIFY `category_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;

--
-- AUTO_INCREMENT for table `tbl_cms_pages`
--
ALTER TABLE `tbl_cms_pages`
  MODIFY `page_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=23;

--
-- AUTO_INCREMENT for table `tbl_countries`
--
ALTER TABLE `tbl_countries`
  MODIFY `country_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=240;

--
-- AUTO_INCREMENT for table `tbl_customers`
--
ALTER TABLE `tbl_customers`
  MODIFY `customers_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `tbl_customers_address_book`
--
ALTER TABLE `tbl_customers_address_book`
  MODIFY `address_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;

--
-- AUTO_INCREMENT for table `tbl_enquiry`
--
ALTER TABLE `tbl_enquiry`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=35;

--
-- AUTO_INCREMENT for table `tbl_faq`
--
ALTER TABLE `tbl_faq`
  MODIFY `faq_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=31;

--
-- AUTO_INCREMENT for table `tbl_invite_friends`
--
ALTER TABLE `tbl_invite_friends`
  MODIFY `invite_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `tbl_meta_tags`
--
ALTER TABLE `tbl_meta_tags`
  MODIFY `meta_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- AUTO_INCREMENT for table `tbl_news`
--
ALTER TABLE `tbl_news`
  MODIFY `news_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `tbl_newsletters`
--
ALTER TABLE `tbl_newsletters`
  MODIFY `subscriber_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=112;

--
-- AUTO_INCREMENT for table `tbl_order`
--
ALTER TABLE `tbl_order`
  MODIFY `order_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT for table `tbl_package`
--
ALTER TABLE `tbl_package`
  MODIFY `package_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `tbl_payment_setting`
--
ALTER TABLE `tbl_payment_setting`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `tbl_product`
--
ALTER TABLE `tbl_product`
  MODIFY `product_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `tbl_services`
--
ALTER TABLE `tbl_services`
  MODIFY `service_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=69;

--
-- AUTO_INCREMENT for table `tbl_slide_banners`
--
ALTER TABLE `tbl_slide_banners`
  MODIFY `banner_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;

--
-- AUTO_INCREMENT for table `tbl_social_profile`
--
ALTER TABLE `tbl_social_profile`
  MODIFY `social_id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `tbl_testimonial`
--
ALTER TABLE `tbl_testimonial`
  MODIFY `testimonial_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT for table `tbl_testimonials`
--
ALTER TABLE `tbl_testimonials`
  MODIFY `testimonials_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `tbl_zip_location`
--
ALTER TABLE `tbl_zip_location`
  MODIFY `zip_location_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=701;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
