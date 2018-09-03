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
-- Table structure for table `cms_notifications`
--

CREATE TABLE `cms_notifications` (
  `ntfn_id` int(11) NOT NULL,
  `schl_id` int(11) DEFAULT NULL,
  `ntfn_sender_id` varchar(100) NOT NULL,
  `ntfn_sender_ref_id` varchar(100) DEFAULT NULL,
  `roles_id` int(11) DEFAULT NULL,
  `ntfn_receiver_id` int(11) DEFAULT NULL,
  `ntfn_class_id` int(11) DEFAULT NULL,
  `ntfn_section_id` int(11) DEFAULT NULL,
  `ntfn_notification_type` int(11) NOT NULL,
  `ntfn_notification_message` text NOT NULL,
  `ntfn_notification_read_status` int(11) NOT NULL COMMENT '0 unread 1read',
  `ntfn_status` int(11) NOT NULL,
  `ntfn_created` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `cms_notifications`
--

INSERT INTO `cms_notifications` (`ntfn_id`, `schl_id`, `ntfn_sender_id`, `ntfn_sender_ref_id`, `roles_id`, `ntfn_receiver_id`, `ntfn_class_id`, `ntfn_section_id`, `ntfn_notification_type`, `ntfn_notification_message`, `ntfn_notification_read_status`, `ntfn_status`, `ntfn_created`) VALUES
(1, 2, '1', 'ADM00001', 5, NULL, NULL, NULL, 7, 'xcvxcv', 0, 0, '2018-09-03 12:58:06'),
(2, 3, '1', 'ADM00001', 4, NULL, NULL, NULL, 4, 'Hello Students tomorrow will be holidays.', 0, 0, '2018-09-03 12:58:34'),
(3, 2, '1', 'ADM00001', 6, NULL, NULL, NULL, 5, 'Hello, Teachers and students tomorrow will be sports event organized by school authority .Please present on time 09:30AM reporting time.', 0, 0, '2018-09-03 12:59:01');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `cms_notifications`
--
ALTER TABLE `cms_notifications`
  ADD PRIMARY KEY (`ntfn_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `cms_notifications`
--
ALTER TABLE `cms_notifications`
  MODIFY `ntfn_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
