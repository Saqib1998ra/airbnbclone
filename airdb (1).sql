-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Nov 23, 2023 at 12:18 PM
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
-- Database: `airdb`
--

-- --------------------------------------------------------

--
-- Table structure for table `listing`
--

CREATE TABLE `listing` (
  `id` int(11) NOT NULL,
  `image` varchar(50) DEFAULT NULL,
  `city` varchar(30) DEFAULT NULL,
  `address` varchar(30) DEFAULT NULL,
  `date` date DEFAULT NULL,
  `rooms` int(30) DEFAULT NULL,
  `price` int(30) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `listing`
--

INSERT INTO `listing` (`id`, `image`, `city`, `address`, `date`, `rooms`, `price`) VALUES
(17, 'assets/rooms-suites-min.jpg', 'lahore', 'johar town', '2023-11-15', 1, 100),
(20, 'assets/cute-room-ideas-1677096334.png', 'multan', 'cantt', '2023-11-28', 2, 200),
(24, 'assets/DSC07685-HDR-Edit-Edit.jpg', 'multan', 'opposite OGDCL kot adu', '2023-11-23', 2, 200),
(26, 'assets/z0UUS6oz.jpeg', 'kot adu', 'opposite OGDCL kot adu', '2023-11-24', 2, 2322),
(27, 'assets/TurtleLairSuite-Bedroom.jpg', 'gujrat', 'gujrat near kfc', '2023-11-20', 1, 500),
(29, 'assets/cover.webp', 'Dubai', 'near dubai mall', '2023-11-27', 2, 200),
(30, 'assets/single_room_with_ensuite1.jpg', 'lahore', 'DHA phase 1', '2023-11-22', 2, 200),
(31, 'assets/mru5l2y7-720.jpg', 'karachi', 'faisal base near', '2023-11-29', 1, 100);

-- --------------------------------------------------------

--
-- Table structure for table `payment`
--

CREATE TABLE `payment` (
  `id` int(11) NOT NULL,
  `cardName` varchar(255) NOT NULL,
  `cardNum` int(11) NOT NULL,
  `exp` int(11) NOT NULL,
  `cvv` int(11) NOT NULL,
  `address` varchar(255) NOT NULL,
  `aptNum` int(11) NOT NULL,
  `city` varchar(255) NOT NULL,
  `state` varchar(255) NOT NULL,
  `zip` int(11) NOT NULL,
  `country` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data for table `payment`
--

INSERT INTO `payment` (`id`, `cardName`, `cardNum`, `exp`, `cvv`, `address`, `aptNum`, `city`, `state`, `zip`, `country`) VALUES
(2, 'paypal', 2147483647, 1, 12332, 'opposite OGDCL kot adu', 21321, 'kot adu', 'muzaffargarh', 32000, 'Pakistan');

-- --------------------------------------------------------

--
-- Table structure for table `sign_up`
--

CREATE TABLE `sign_up` (
  `id` int(11) NOT NULL,
  `name` varchar(50) DEFAULT NULL,
  `email` varchar(30) DEFAULT NULL,
  `pass` varchar(30) DEFAULT NULL,
  `phone` varchar(30) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `sign_up`
--

INSERT INTO `sign_up` (`id`, `name`, `email`, `pass`, `phone`) VALUES
(1, 'zubair', 'zubair123@gmail.com', '123456', '03036059294'),
(3, 'nafees', 'nafees@gmail.com', '1234', '1233435354'),
(4, 'admin', 'admin@gmail.com', '1234', '12322313223');

-- --------------------------------------------------------

--
-- Table structure for table `yourinfo`
--

CREATE TABLE `yourinfo` (
  `id` int(11) NOT NULL,
  `check_in` datetime DEFAULT NULL,
  `check_out` datetime DEFAULT NULL,
  `guest` int(10) DEFAULT NULL,
  `price` int(10) DEFAULT NULL,
  `uid` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data for table `yourinfo`
--

INSERT INTO `yourinfo` (`id`, `check_in`, `check_out`, `guest`, `price`, `uid`) VALUES
(17, '2023-11-24 00:00:00', '2023-11-28 00:00:00', 4, 100, NULL);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `listing`
--
ALTER TABLE `listing`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `payment`
--
ALTER TABLE `payment`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `sign_up`
--
ALTER TABLE `sign_up`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `email` (`email`),
  ADD UNIQUE KEY `email_2` (`email`),
  ADD UNIQUE KEY `email_3` (`email`),
  ADD UNIQUE KEY `email_4` (`email`),
  ADD UNIQUE KEY `email_5` (`email`),
  ADD UNIQUE KEY `email_6` (`email`);

--
-- Indexes for table `yourinfo`
--
ALTER TABLE `yourinfo`
  ADD PRIMARY KEY (`id`),
  ADD KEY `FK_UserReserve` (`uid`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `listing`
--
ALTER TABLE `listing`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=33;

--
-- AUTO_INCREMENT for table `payment`
--
ALTER TABLE `payment`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `sign_up`
--
ALTER TABLE `sign_up`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `yourinfo`
--
ALTER TABLE `yourinfo`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=18;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `yourinfo`
--
ALTER TABLE `yourinfo`
  ADD CONSTRAINT `FK_UserReserve` FOREIGN KEY (`uid`) REFERENCES `sign_up` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
