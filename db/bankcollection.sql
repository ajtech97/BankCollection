-- phpMyAdmin SQL Dump
-- version 4.9.0.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jul 22, 2020 at 03:53 PM
-- Server version: 10.4.6-MariaDB
-- PHP Version: 7.3.9

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `bankcollection`
--

-- --------------------------------------------------------

--
-- Table structure for table `adminlogs`
--

CREATE TABLE `adminlogs` (
  `logid` int(255) NOT NULL,
  `adminid` int(255) NOT NULL,
  `username` varchar(255) NOT NULL,
  `logindatetime` datetime DEFAULT NULL,
  `logoutdatetime` datetime DEFAULT NULL,
  `ipaddress` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `customer`
--

CREATE TABLE `customer` (
  `CId` int(255) NOT NULL,
  `FName` varchar(255) NOT NULL,
  `LName` varchar(255) NOT NULL,
  `FullName` varchar(255) NOT NULL,
  `Amount` int(255) NOT NULL,
  `Paid` varchar(255) NOT NULL,
  `Address` text NOT NULL,
  `Mobile` bigint(255) NOT NULL,
  `Mobile2` bigint(255) NOT NULL,
  `Emailid` varchar(255) NOT NULL,
  `City` varchar(255) NOT NULL,
  `State` varchar(255) NOT NULL,
  `cust_display_or_not` varchar(255) NOT NULL,
  `CollectionStartDate` date NOT NULL,
  `CurrDateTime` datetime NOT NULL,
  `IPAddress` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `customer`
--

INSERT INTO `customer` (`CId`, `FName`, `LName`, `FullName`, `Amount`, `Paid`, `Address`, `Mobile`, `Mobile2`, `Emailid`, `City`, `State`, `cust_display_or_not`, `CollectionStartDate`, `CurrDateTime`, `IPAddress`) VALUES
(1, 'Ajinkya', 'Lonkar', 'AjinkyaLonkar', 1000, '', 'Panvel', 8888888888, 0, 'official@gmail.comm', 'Panvel', 'Maharashtra', 'YES', '2020-04-18', '2020-04-18 14:36:35', '::1'),
(2, 'asd', 'asd', 'asdasd', 100, '', 'asd', 8666551112, 0, 'ajinkyalonkar88.al@gmail.com', 'asd', 'Maharashtra', 'NO', '2020-04-18', '2020-04-18 15:06:22', '::1'),
(3, 'asd', 'asd', 'asdasd', 100, '', 'asd', 8666551122, 0, 'ajinkyalonkar88.al@gmail.com', 'asd', 'Maharashtra', 'NO', '2020-04-18', '2020-04-18 15:23:30', '::1'),
(4, 'Harsh', 'Bhute', 'HarshBhute', 10000, '', 'Thane', 9988776655, 0, '', 'Thane', 'Maharashtra', 'YES', '2020-04-19', '2020-04-19 19:21:42', '::1'),
(5, 'Om', 'Kar', 'OmKar', 9000, '', 'Pan', 8666551119, 0, 'aj@gmail.com', 'Panvel', 'Maharashtra', 'NO', '2020-04-20', '2020-04-20 19:11:45', '192.168.0.101'),
(6, 'Harsh', 'Bhute', 'HarshBhute', 10000, '', 'Thane muncipal', 8454933121, 0, '', 'Thanee', 'Maharashtra', 'NO', '2020-04-20', '2020-04-20 23:27:50', '::1'),
(7, 'Aishwarya asdasd', 'Sangle', 'AishwaryaasdasdSangle', 1000, '', 'Panvel', 8888888866, 831283898012, '', 'Pnavel', 'Maharashtra', 'NO', '2020-05-15', '2020-05-15 22:21:26', '::1'),
(8, 'Ajinkya', 'Lonkar', 'AjinkyaLonkar', 1000, '', 'Panebel', 9876228822, 0, 'officialajinkya@gmail', 'Pnavel', 'Maharashtra', 'NO', '2020-05-17', '2020-05-17 14:25:37', '::1'),
(9, 'Pranay', 'Patil', 'PranayPatil', 5000, '', 'New Panvel', 7777777777, 0, '', 'Panvel', 'Maharashtra', 'YES', '2020-05-17', '2020-05-17 17:14:07', '::1');

-- --------------------------------------------------------

--
-- Table structure for table `customerpayment`
--

CREATE TABLE `customerpayment` (
  `CPId` int(255) NOT NULL,
  `CId` int(255) NOT NULL,
  `Amount` int(255) NOT NULL,
  `PaymentDate` date NOT NULL,
  `PaymentTime` time NOT NULL,
  `CurrDateTime` datetime NOT NULL,
  `IPAddress` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `customerpayment`
--

INSERT INTO `customerpayment` (`CPId`, `CId`, `Amount`, `PaymentDate`, `PaymentTime`, `CurrDateTime`, `IPAddress`) VALUES
(1, 1, 1000, '2020-04-18', '14:36:42', '2020-04-18 14:36:42', '::1'),
(2, 1, 1000, '2020-04-17', '14:36:49', '2020-04-18 14:36:49', '::1'),
(6, 2, 100, '2020-04-18', '15:06:33', '2020-04-18 15:06:33', '::1'),
(8, 5, 9000, '2020-04-20', '19:13:51', '2020-04-20 19:13:51', '192.168.0.101'),
(9, 4, 5000, '2020-04-20', '23:29:56', '2020-04-20 23:29:56', '::1'),
(11, 1, 1000, '2020-05-15', '22:22:21', '2020-05-15 22:22:21', '::1'),
(12, 4, 10000, '2020-05-15', '22:22:28', '2020-05-15 22:22:28', '::1'),
(14, 4, 10000, '2020-05-17', '17:16:17', '2020-05-17 17:16:17', '::1'),
(15, 9, 5000, '2020-05-14', '17:16:39', '2020-05-17 17:16:39', '::1'),
(16, 9, 5000, '2020-05-15', '17:16:52', '2020-05-17 17:16:52', '::1');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `uid` int(255) NOT NULL,
  `name` varchar(255) NOT NULL,
  `pass` varchar(255) NOT NULL,
  `mobileno` bigint(255) NOT NULL,
  `anothermobileno` bigint(255) DEFAULT NULL,
  `address` varchar(255) NOT NULL,
  `emailid` varchar(255) DEFAULT NULL,
  `currdatetime` datetime NOT NULL,
  `ipaddress` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`uid`, `name`, `pass`, `mobileno`, `anothermobileno`, `address`, `emailid`, `currdatetime`, `ipaddress`) VALUES
(1, 'Ajinkya', 'f229bacb030b6e7ac6c074a61132ed17', 8652692939, 9969727251, 'New Panvel', 'officialajinkyal@gmail.com', '2020-05-17 17:11:52', '::1');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `adminlogs`
--
ALTER TABLE `adminlogs`
  ADD PRIMARY KEY (`logid`);

--
-- Indexes for table `customer`
--
ALTER TABLE `customer`
  ADD PRIMARY KEY (`CId`);

--
-- Indexes for table `customerpayment`
--
ALTER TABLE `customerpayment`
  ADD PRIMARY KEY (`CPId`),
  ADD KEY `customerpayment_ibfk_1` (`CId`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`uid`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `adminlogs`
--
ALTER TABLE `adminlogs`
  MODIFY `logid` int(255) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `customer`
--
ALTER TABLE `customer`
  MODIFY `CId` int(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `customerpayment`
--
ALTER TABLE `customerpayment`
  MODIFY `CPId` int(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `uid` int(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `customerpayment`
--
ALTER TABLE `customerpayment`
  ADD CONSTRAINT `customerpayment_ibfk_1` FOREIGN KEY (`CId`) REFERENCES `customer` (`CId`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
