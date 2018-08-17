-- phpMyAdmin SQL Dump
-- version 4.6.5.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Aug 17, 2018 at 06:02 AM
-- Server version: 10.1.21-MariaDB
-- PHP Version: 7.1.1

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `3rvillage`
--

-- --------------------------------------------------------

--
-- Table structure for table `account`
--

CREATE TABLE `account` (
  `accountid` int(11) NOT NULL,
  `firstname` varchar(50) NOT NULL,
  `lastname` varchar(50) NOT NULL,
  `username` varchar(50) NOT NULL,
  `password` varchar(50) NOT NULL,
  `email` varchar(50) NOT NULL,
  `contactno` varchar(20) NOT NULL,
  `status` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `account`
--

INSERT INTO `account` (`accountid`, `firstname`, `lastname`, `username`, `password`, `email`, `contactno`, `status`) VALUES
(1, 'Kenji', 'Pugoy', 'kenjaxzxc', 'eggking311', 'kenjaxzxc@gmail.com', '09424855562', 0),
(2, 'qwe', 'wew', 'we', '', 'weqwe@wqeqwe', '', 0),
(3, 'qweqw', 'eee', 'rrrrr', 'qqqq', 'ww@wee', '1234', 0),
(4, '', '', 'qwee', 'ww', '', 'qwewe', 0),
(5, 'ken', 'pugoy', 'kenken', 'qwe', 'ken@gmail.com', '123123', 0),
(6, 'eeee', 'eee', 'qqqqqq', 'asd', 'www@gma', '', 0);

-- --------------------------------------------------------

--
-- Table structure for table `itemsell`
--

CREATE TABLE `itemsell` (
  `ItemSellID` int(11) NOT NULL,
  `SItemTitle` varchar(50) NOT NULL,
  `SItemCat` varchar(50) NOT NULL,
  `SItemDesc` varchar(255) NOT NULL,
  `SItemLocation` varchar(50) NOT NULL,
  `SItemPrice` int(11) NOT NULL,
  `SItemImages` blob NOT NULL,
  `SItemPosted` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `SItemStatus` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `itemsell`
--

INSERT INTO `itemsell` (`ItemSellID`, `SItemTitle`, `SItemCat`, `SItemDesc`, `SItemLocation`, `SItemPrice`, `SItemImages`, `SItemPosted`, `SItemStatus`) VALUES
(1, '234', '', '234', '234', 234, '', '2018-08-16 16:16:07', 0),
(2, '234', '', '234', '234', 234, '', '2018-08-16 16:16:22', 0),
(3, 'unggoy', 'Bag', 'unggoy kang dako', 'Cebu', 123123, '', '2018-08-16 16:22:52', 0),
(4, 'asdasd', 'Men', 'asdasd', 'Abra', 21323, '', '2018-08-16 17:02:16', 0);

-- --------------------------------------------------------

--
-- Table structure for table `ngo`
--

CREATE TABLE `ngo` (
  `NGOID` int(11) NOT NULL,
  `NGOName` varchar(50) NOT NULL,
  `NGODesc` varchar(255) NOT NULL,
  `NGOAddr` varchar(100) NOT NULL,
  `NGORegion` varchar(50) NOT NULL,
  `NGOProvince` varchar(50) NOT NULL,
  `NGOEmail` varchar(50) NOT NULL,
  `NGOContactNo` varchar(20) NOT NULL,
  `NGOWebsite` varchar(50) NOT NULL,
  `BIRCerNo` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `account`
--
ALTER TABLE `account`
  ADD PRIMARY KEY (`accountid`);

--
-- Indexes for table `itemsell`
--
ALTER TABLE `itemsell`
  ADD PRIMARY KEY (`ItemSellID`);

--
-- Indexes for table `ngo`
--
ALTER TABLE `ngo`
  ADD PRIMARY KEY (`NGOID`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `account`
--
ALTER TABLE `account`
  MODIFY `accountid` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;
--
-- AUTO_INCREMENT for table `itemsell`
--
ALTER TABLE `itemsell`
  MODIFY `ItemSellID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
--
-- AUTO_INCREMENT for table `ngo`
--
ALTER TABLE `ngo`
  MODIFY `NGOID` int(11) NOT NULL AUTO_INCREMENT;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
