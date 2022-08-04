-- phpMyAdmin SQL Dump
-- version 4.9.0.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Apr 18, 2020 at 08:49 AM
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
(1, 'Ajinkya', '4297f44b13955235245b2497399d7a93', 8652692939, 9969727251, 'New Panvel', 'officialajinkyal@gmail.com', '2019-11-21 18:39:36', '::1');

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
  MODIFY `CId` int(255) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `customerpayment`
--
ALTER TABLE `customerpayment`
  MODIFY `CPId` int(255) NOT NULL AUTO_INCREMENT;

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
