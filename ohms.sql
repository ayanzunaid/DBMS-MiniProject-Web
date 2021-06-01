-- phpMyAdmin SQL Dump
-- version 5.0.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Mar 31, 2020 at 08:28 AM
-- Server version: 10.4.11-MariaDB
-- PHP Version: 7.4.3

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `ohms`
--

-- --------------------------------------------------------

--
-- Table structure for table `applies`
--

CREATE TABLE `applies` (
  `provider_id` varbinary(30) NOT NULL,
  `user_id` varbinary(30) NOT NULL,
  `service_name` varchar(30) NOT NULL,
  `list_date` datetime NOT NULL,
  `servicing_date` datetime NOT NULL,
  `servicing_charge` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `applies`
--

INSERT INTO `applies` (`provider_id`, `user_id`, `service_name`, `list_date`, `servicing_date`, `servicing_charge`) VALUES
(0x6179616e7a756e616964313040676d61696c2e636f6d, 0x6d6f696e40676d61696c2e636f6d, 'carpenter', '2020-03-17 13:58:14', '2020-03-20 13:02:49', 300),
(0x6179616e7a756e616964313040676d61696c2e636f6d, 0x6d6f696e40676d61696c2e636f6d, 'gardener', '2020-03-24 11:53:47', '2020-03-26 08:00:00', 200),
(0x6179616e7a756e616964313040676d61696c2e636f6d, 0x6d6f696e40676d61696c2e636f6d, 'mechanic', '2020-03-29 12:19:59', '2020-04-22 10:00:00', 1000),
(0x6179616e7a756e616964313040676d61696c2e636f6d, 0x6d6f696e40676d61696c2e636f6d, 'plumber', '2020-03-29 11:46:48', '2020-05-02 10:00:00', 250),
(0x7365727669636540676d61696c2e636f6d, 0x64656d6f40676d61696c2e636f6d, 'mechanic', '2020-03-31 10:56:28', '2020-03-31 11:10:00', 300);

-- --------------------------------------------------------

--
-- Table structure for table `consumer`
--

CREATE TABLE `consumer` (
  `user_id` varbinary(30) NOT NULL,
  `username` varchar(30) NOT NULL,
  `password` varbinary(400) NOT NULL,
  `street_name` varchar(50) DEFAULT NULL,
  `street_number` varchar(10) DEFAULT NULL,
  `apt_number` varchar(10) DEFAULT NULL,
  `city` varchar(30) DEFAULT NULL,
  `state` varchar(30) DEFAULT NULL,
  `pin` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `consumer`
--

INSERT INTO `consumer` (`user_id`, `username`, `password`, `street_name`, `street_number`, `apt_number`, `city`, `state`, `pin`) VALUES
(0x64656d6f40676d61696c2e636f6d, 'demo', 0x3930303135303938336364323466623064363936336637643238653137663732, 'abc street', '5th avenue', '334', 'Kharagpur', 'West Bengal', 721302),
(0x6d6f696e40676d61696c2e636f6d, 'moin', 0x3930303135303938336364323466623064363936336637643238653137663732, 'Azad Hall of Residence', 'C Wing ', '228', 'Kharagpur', 'West Bengal', 721302);

-- --------------------------------------------------------

--
-- Table structure for table `consumer_nos`
--

CREATE TABLE `consumer_nos` (
  `user_id` varbinary(30) NOT NULL,
  `mobile` varchar(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `consumer_nos`
--

INSERT INTO `consumer_nos` (`user_id`, `mobile`) VALUES
(0x64656d6f40676d61696c2e636f6d, '1234567890'),
(0x64656d6f40676d61696c2e636f6d, '2345678901'),
(0x6d6f696e40676d61696c2e636f6d, '1234567890'),
(0x6d6f696e40676d61696c2e636f6d, '9461884668');

-- --------------------------------------------------------

--
-- Table structure for table `provides`
--

CREATE TABLE `provides` (
  `provider_id` varbinary(30) NOT NULL,
  `service_name` varchar(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `provides`
--

INSERT INTO `provides` (`provider_id`, `service_name`) VALUES
(0x6179616e7a756e616964313040676d61696c2e636f6d, 'carpenter'),
(0x6179616e7a756e616964313040676d61696c2e636f6d, 'electrician'),
(0x6179616e7a756e616964313040676d61696c2e636f6d, 'gardener'),
(0x6179616e7a756e616964313040676d61696c2e636f6d, 'mechanic'),
(0x6179616e7a756e616964313040676d61696c2e636f6d, 'plumber'),
(0x7365727669636540676d61696c2e636f6d, 'mechanic');

-- --------------------------------------------------------

--
-- Table structure for table `review`
--

CREATE TABLE `review` (
  `provider_id` varbinary(30) NOT NULL,
  `user_id` varbinary(30) NOT NULL,
  `service_name` varchar(30) NOT NULL,
  `list_date` datetime NOT NULL,
  `review_date` datetime NOT NULL,
  `comment` varchar(100) DEFAULT NULL,
  `rating` int(11) NOT NULL CHECK (`rating` between 1 and 5)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `review`
--

INSERT INTO `review` (`provider_id`, `user_id`, `service_name`, `list_date`, `review_date`, `comment`, `rating`) VALUES
(0x6179616e7a756e616964313040676d61696c2e636f6d, 0x6d6f696e40676d61696c2e636f6d, 'gardener', '2020-03-24 11:53:47', '2020-03-30 21:47:05', 'good job', 4),
(0x7365727669636540676d61696c2e636f6d, 0x64656d6f40676d61696c2e636f6d, 'mechanic', '2020-03-31 10:56:28', '2020-03-31 11:14:16', 'good job', 4);

-- --------------------------------------------------------

--
-- Table structure for table `serviceman`
--

CREATE TABLE `serviceman` (
  `provider_id` varbinary(30) NOT NULL,
  `username` varchar(30) NOT NULL,
  `password` varbinary(400) NOT NULL,
  `rating` float DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `serviceman`
--

INSERT INTO `serviceman` (`provider_id`, `username`, `password`, `rating`) VALUES
(0x6179616e7a756e616964313040676d61696c2e636f6d, 'ayan zunaid', 0x3930303135303938336364323466623064363936336637643238653137663732, 4),
(0x7365727669636540676d61696c2e636f6d, 'serviceman', 0x3930303135303938336364323466623064363936336637643238653137663732, 4);

-- --------------------------------------------------------

--
-- Table structure for table `serviceman_nos`
--

CREATE TABLE `serviceman_nos` (
  `provider_id` varbinary(30) NOT NULL,
  `mobile` varchar(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `serviceman_nos`
--

INSERT INTO `serviceman_nos` (`provider_id`, `mobile`) VALUES
(0x6179616e7a756e616964313040676d61696c2e636f6d, '7477725444'),
(0x6179616e7a756e616964313040676d61696c2e636f6d, '9461884668'),
(0x7365727669636540676d61696c2e636f6d, '3456789012'),
(0x7365727669636540676d61696c2e636f6d, '4567890123');

-- --------------------------------------------------------

--
-- Table structure for table `services`
--

CREATE TABLE `services` (
  `service_name` varchar(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `services`
--

INSERT INTO `services` (`service_name`) VALUES
('carpenter'),
('electrician'),
('gardener'),
('mechanic'),
('plumber');

-- --------------------------------------------------------

--
-- Table structure for table `service_listing`
--

CREATE TABLE `service_listing` (
  `user_id` varbinary(30) NOT NULL,
  `service_name` varchar(30) NOT NULL,
  `list_date` datetime NOT NULL,
  `duration` varchar(10) NOT NULL,
  `open_date` datetime NOT NULL,
  `close_date` datetime NOT NULL,
  `alloted` tinyint(1) NOT NULL DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `service_listing`
--

INSERT INTO `service_listing` (`user_id`, `service_name`, `list_date`, `duration`, `open_date`, `close_date`, `alloted`) VALUES
(0x64656d6f40676d61696c2e636f6d, 'mechanic', '2020-03-31 10:56:28', '2h', '2020-03-31 11:00:00', '2020-03-31 23:00:00', 1),
(0x6d6f696e40676d61696c2e636f6d, 'carpenter', '2020-03-17 13:58:14', '3h', '2020-03-20 10:00:00', '2020-03-20 20:00:00', 0),
(0x6d6f696e40676d61696c2e636f6d, 'electrician', '2020-03-18 17:53:33', '5h', '2020-03-18 19:00:00', '2020-03-20 08:00:00', 0),
(0x6d6f696e40676d61696c2e636f6d, 'gardener', '2020-03-24 11:53:47', '4h', '2020-03-25 09:00:00', '2020-03-27 21:00:00', 1),
(0x6d6f696e40676d61696c2e636f6d, 'mechanic', '2020-03-29 12:19:59', '6h', '2020-04-22 08:00:00', '2020-04-22 14:00:00', 1),
(0x6d6f696e40676d61696c2e636f6d, 'plumber', '2020-03-29 11:46:48', '2h', '2020-04-30 09:00:00', '2020-05-08 22:00:00', 1);

-- --------------------------------------------------------

--
-- Table structure for table `service_tasks`
--

CREATE TABLE `service_tasks` (
  `provider_id` varbinary(30) NOT NULL,
  `user_id` varbinary(30) NOT NULL,
  `service_name` varchar(30) NOT NULL,
  `list_date` datetime NOT NULL,
  `servicing_date` datetime NOT NULL,
  `servicing_charge` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `service_tasks`
--

INSERT INTO `service_tasks` (`provider_id`, `user_id`, `service_name`, `list_date`, `servicing_date`, `servicing_charge`) VALUES
(0x6179616e7a756e616964313040676d61696c2e636f6d, 0x6d6f696e40676d61696c2e636f6d, 'gardener', '2020-03-24 11:53:47', '2020-03-26 08:00:00', 200),
(0x6179616e7a756e616964313040676d61696c2e636f6d, 0x6d6f696e40676d61696c2e636f6d, 'mechanic', '2020-03-29 12:19:59', '2020-04-22 10:00:00', 1000),
(0x6179616e7a756e616964313040676d61696c2e636f6d, 0x6d6f696e40676d61696c2e636f6d, 'plumber', '2020-03-29 11:46:48', '2020-05-02 10:00:00', 250),
(0x7365727669636540676d61696c2e636f6d, 0x64656d6f40676d61696c2e636f6d, 'mechanic', '2020-03-31 10:56:28', '2020-03-31 11:10:00', 300);

-- --------------------------------------------------------

--
-- Table structure for table `servicing_locations`
--

CREATE TABLE `servicing_locations` (
  `provider_id` varbinary(30) NOT NULL,
  `pin` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `servicing_locations`
--

INSERT INTO `servicing_locations` (`provider_id`, `pin`) VALUES
(0x6179616e7a756e616964313040676d61696c2e636f6d, 342005),
(0x6179616e7a756e616964313040676d61696c2e636f6d, 342008),
(0x6179616e7a756e616964313040676d61696c2e636f6d, 721302),
(0x7365727669636540676d61696c2e636f6d, 342005),
(0x7365727669636540676d61696c2e636f6d, 721302);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `applies`
--
ALTER TABLE `applies`
  ADD PRIMARY KEY (`provider_id`,`user_id`,`service_name`,`list_date`),
  ADD KEY `user_id` (`user_id`,`service_name`,`list_date`);

--
-- Indexes for table `consumer`
--
ALTER TABLE `consumer`
  ADD PRIMARY KEY (`user_id`);

--
-- Indexes for table `consumer_nos`
--
ALTER TABLE `consumer_nos`
  ADD PRIMARY KEY (`user_id`,`mobile`);

--
-- Indexes for table `provides`
--
ALTER TABLE `provides`
  ADD PRIMARY KEY (`provider_id`,`service_name`),
  ADD KEY `service_name` (`service_name`);

--
-- Indexes for table `review`
--
ALTER TABLE `review`
  ADD PRIMARY KEY (`provider_id`,`user_id`,`service_name`,`list_date`,`review_date`);

--
-- Indexes for table `serviceman`
--
ALTER TABLE `serviceman`
  ADD PRIMARY KEY (`provider_id`);

--
-- Indexes for table `serviceman_nos`
--
ALTER TABLE `serviceman_nos`
  ADD PRIMARY KEY (`provider_id`,`mobile`);

--
-- Indexes for table `services`
--
ALTER TABLE `services`
  ADD PRIMARY KEY (`service_name`);

--
-- Indexes for table `service_listing`
--
ALTER TABLE `service_listing`
  ADD PRIMARY KEY (`user_id`,`service_name`,`list_date`),
  ADD KEY `service_name` (`service_name`);

--
-- Indexes for table `service_tasks`
--
ALTER TABLE `service_tasks`
  ADD PRIMARY KEY (`provider_id`,`user_id`,`service_name`,`list_date`);

--
-- Indexes for table `servicing_locations`
--
ALTER TABLE `servicing_locations`
  ADD PRIMARY KEY (`provider_id`,`pin`);

--
-- Constraints for dumped tables
--

--
-- Constraints for table `applies`
--
ALTER TABLE `applies`
  ADD CONSTRAINT `applies_ibfk_1` FOREIGN KEY (`provider_id`) REFERENCES `serviceman` (`provider_id`),
  ADD CONSTRAINT `applies_ibfk_2` FOREIGN KEY (`user_id`,`service_name`,`list_date`) REFERENCES `service_listing` (`user_id`, `service_name`, `list_date`);

--
-- Constraints for table `consumer_nos`
--
ALTER TABLE `consumer_nos`
  ADD CONSTRAINT `consumer_nos_ibfk_1` FOREIGN KEY (`user_id`) REFERENCES `consumer` (`user_id`);

--
-- Constraints for table `provides`
--
ALTER TABLE `provides`
  ADD CONSTRAINT `provides_ibfk_1` FOREIGN KEY (`provider_id`) REFERENCES `serviceman` (`provider_id`),
  ADD CONSTRAINT `provides_ibfk_2` FOREIGN KEY (`service_name`) REFERENCES `services` (`service_name`);

--
-- Constraints for table `review`
--
ALTER TABLE `review`
  ADD CONSTRAINT `review_ibfk_1` FOREIGN KEY (`provider_id`,`user_id`,`service_name`,`list_date`) REFERENCES `applies` (`provider_id`, `user_id`, `service_name`, `list_date`);

--
-- Constraints for table `serviceman_nos`
--
ALTER TABLE `serviceman_nos`
  ADD CONSTRAINT `serviceman_nos_ibfk_1` FOREIGN KEY (`provider_id`) REFERENCES `serviceman` (`provider_id`);

--
-- Constraints for table `service_listing`
--
ALTER TABLE `service_listing`
  ADD CONSTRAINT `service_listing_ibfk_1` FOREIGN KEY (`user_id`) REFERENCES `consumer` (`user_id`),
  ADD CONSTRAINT `service_listing_ibfk_2` FOREIGN KEY (`service_name`) REFERENCES `services` (`service_name`);

--
-- Constraints for table `service_tasks`
--
ALTER TABLE `service_tasks`
  ADD CONSTRAINT `service_tasks_ibfk_1` FOREIGN KEY (`provider_id`,`user_id`,`service_name`,`list_date`) REFERENCES `applies` (`provider_id`, `user_id`, `service_name`, `list_date`);

--
-- Constraints for table `servicing_locations`
--
ALTER TABLE `servicing_locations`
  ADD CONSTRAINT `servicing_locations_ibfk_1` FOREIGN KEY (`provider_id`) REFERENCES `serviceman` (`provider_id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
