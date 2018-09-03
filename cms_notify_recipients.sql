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
-- Table structure for table `cms_notify_recipients`
--

CREATE TABLE `cms_notify_recipients` (
  `rpnt_id` int(11) NOT NULL,
  `ntfn_id` int(11) NOT NULL,
  `receiver_id` int(11) NOT NULL,
  `receiver_role` int(11) NOT NULL,
  `rpnt_notification_read_status` int(11) NOT NULL COMMENT '0 unread 1read',
  `rpnt_status` int(11) NOT NULL,
  `rpnt_created` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `cms_notify_recipients`
--

INSERT INTO `cms_notify_recipients` (`rpnt_id`, `ntfn_id`, `receiver_id`, `receiver_role`, `rpnt_notification_read_status`, `rpnt_status`, `rpnt_created`) VALUES
(1, 1, 17, 5, 0, 0, '2018-09-03 12:58:06'),
(2, 2, 5, 4, 0, 0, '2018-09-03 12:58:34'),
(3, 2, 6, 4, 0, 0, '2018-09-03 12:58:34'),
(4, 3, 1, 6, 0, 0, '2018-09-03 12:59:01'),
(5, 3, 2, 6, 0, 0, '2018-09-03 12:59:01');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `cms_notify_recipients`
--
ALTER TABLE `cms_notify_recipients`
  ADD PRIMARY KEY (`rpnt_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `cms_notify_recipients`
--
ALTER TABLE `cms_notify_recipients`
  MODIFY `rpnt_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
