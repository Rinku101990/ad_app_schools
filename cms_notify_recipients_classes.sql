-- phpMyAdmin SQL Dump
-- version 4.7.4
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Sep 03, 2018 at 02:22 PM
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
-- Table structure for table `cms_notify_recipients_classes`
--

CREATE TABLE `cms_notify_recipients_classes` (
  `cnrc_id` int(11) NOT NULL,
  `ntfn_id` int(11) NOT NULL,
  `cls_id` int(11) NOT NULL,
  `cnrc_status` int(11) NOT NULL,
  `cnrc_created` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `cms_notify_recipients_classes`
--

INSERT INTO `cms_notify_recipients_classes` (`cnrc_id`, `ntfn_id`, `cls_id`, `cnrc_status`, `cnrc_created`) VALUES
(1, 3, 7, 0, '2018-09-03 12:59:01');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `cms_notify_recipients_classes`
--
ALTER TABLE `cms_notify_recipients_classes`
  ADD PRIMARY KEY (`cnrc_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `cms_notify_recipients_classes`
--
ALTER TABLE `cms_notify_recipients_classes`
  MODIFY `cnrc_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
