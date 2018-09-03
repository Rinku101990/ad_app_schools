-- phpMyAdmin SQL Dump
-- version 4.7.4
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Sep 03, 2018 at 02:21 PM
-- Server version: 10.1.30-MariaDB
-- PHP Version: 5.6.33

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `schoolapp`
--

-- --------------------------------------------------------

--
-- Table structure for table `cms_notifications_templates`
--

CREATE TABLE `cms_notifications_templates` (
  `tmpl_id` int(11) NOT NULL,
  `tmpl_name` varchar(200) NOT NULL,
  `tmpl_descriptions` text NOT NULL,
  `tmpl_status` int(11) NOT NULL,
  `tmpl_created` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `cms_notifications_templates`
--

INSERT INTO `cms_notifications_templates` (`tmpl_id`, `tmpl_name`, `tmpl_descriptions`, `tmpl_status`, `tmpl_created`) VALUES
(4, 'Leave', 'Hello Students tomorrow will be holidays.', 0, '2018-08-31 09:39:22'),
(5, 'Events', 'Hello, Teachers and students tomorrow will be sports event organized by school authority .Please present on time 09:30AM reporting time.', 0, '2018-08-31 09:42:16'),
(7, 'cxvxcv', 'xcvxcv', 0, '2018-09-01 12:01:35');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `cms_notifications_templates`
--
ALTER TABLE `cms_notifications_templates`
  ADD PRIMARY KEY (`tmpl_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `cms_notifications_templates`
--
ALTER TABLE `cms_notifications_templates`
  MODIFY `tmpl_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
