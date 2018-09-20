-- phpMyAdmin SQL Dump
-- version 4.6.5.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Sep 20, 2018 at 11:14 AM
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
  `status` int(11) NOT NULL DEFAULT '1'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `account`
--

INSERT INTO `account` (`accountid`, `firstname`, `lastname`, `username`, `password`, `email`, `contactno`, `status`) VALUES
(1, 'Kenji', 'Pugoy', 'kenjaxzxc', 'eggking311', 'kenjaxqwe@gmail.com', '09424855562', 1),
(2, 'qwe', 'wew', 'we', '', 'weqwe@wqeqwe', '', 0),
(3, 'qweqw', 'eee', 'rrrrr', 'qqqq', 'ww@wee', '1234', 0),
(4, '', '', 'qwee', 'ww', '', 'qwewe', 0),
(5, 'ken', 'pugoy', 'kenken', 'qwe', 'ken@gmail.com', '123123', 0),
(6, 'eeee', 'eee', 'qqqqqq', 'asd', 'www@gma', '', 0),
(7, 'testing', 'testing', 'testing', 'testing', 'testing@gmail.com', 'testing', 0),
(8, 'abc', 'cc', 'abcd', 'asd', 'abcd@gmail.com', '123123', 0),
(9, 'ddd', 'ss', '', '', '', '', 0),
(10, 'qweqwe', 'sdsd', 'zxc', 'eggking', 'sada@sd', '213213', 0),
(11, 'firstname', 'wqeqwe', 'qwe', 'asd', 'weqwe@wqeqwe', '', 0),
(12, 'ddddddd', 'aaaa', 'qwe', 'asd', 'sada@sd', '1w111', 0),
(13, 'qweqw', 'qwe', 'qe', 'qwe', 'qweqwe@sad', '09222817453', 1),
(14, 'qwe', 'qwe', 'qweqwe', 'qweqwe', 'qwe@gmail.com', '09454273493', 1);

-- --------------------------------------------------------

--
-- Table structure for table `admin`
--

CREATE TABLE `admin` (
  `adminid` int(11) NOT NULL,
  `username` varchar(50) NOT NULL,
  `password` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `admin`
--

INSERT INTO `admin` (`adminid`, `username`, `password`) VALUES
(1, 'admin', 'admin');

-- --------------------------------------------------------

--
-- Table structure for table `itemdonate`
--

CREATE TABLE `itemdonate` (
  `DonateSellID` int(11) NOT NULL,
  `DItemTitle` varchar(50) NOT NULL,
  `DItemCat` varchar(50) NOT NULL,
  `DItemDesc` varchar(255) NOT NULL,
  `DItemLocation` varchar(255) NOT NULL,
  `DItemPrice` int(11) NOT NULL,
  `DItemImages` varchar(255) NOT NULL,
  `DItemPosted` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `accountid` int(11) NOT NULL,
  `DItemStatus` int(11) NOT NULL DEFAULT '1'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `itemsell`
--

CREATE TABLE `itemsell` (
  `ItemSellID` int(11) NOT NULL,
  `SItemTitle` varchar(50) NOT NULL,
  `SItemCat` varchar(50) NOT NULL,
  `SItemDesc` varchar(255) NOT NULL,
  `SItemLocation` varchar(255) NOT NULL,
  `SItemPrice` decimal(10,2) NOT NULL,
  `SItemImages1` varchar(255) NOT NULL,
  `SItemImages2` varchar(255) NOT NULL,
  `SItemImages3` varchar(255) NOT NULL,
  `SItemImages4` varchar(255) NOT NULL,
  `SItemImages5` varchar(255) NOT NULL,
  `SItemImages6` varchar(255) NOT NULL,
  `SItemPosted` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `accountid` int(11) NOT NULL,
  `SItemStatus` int(11) NOT NULL DEFAULT '1'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `itemsell`
--

INSERT INTO `itemsell` (`ItemSellID`, `SItemTitle`, `SItemCat`, `SItemDesc`, `SItemLocation`, `SItemPrice`, `SItemImages1`, `SItemImages2`, `SItemImages3`, `SItemImages4`, `SItemImages5`, `SItemImages6`, `SItemPosted`, `accountid`, `SItemStatus`) VALUES
(1, 'qwe', 'Apparels', 'qwe', 'Abra', '13123.00', 'Chrysanthemum.jpg', 'Desert.jpg', 'Hydrangeas.jpg', 'Jellyfish.jpg', 'Koala.jpg', 'Lighthouse.jpg', '2018-09-20 09:12:04', 1, 1),
(2, 'asd', 'Apparels', 'asd', 'Abra', '2323.23', 'blog-01.jpg', 'blog-02.jpg', 'blog-03.jpg', 'gallery-02.jpg', '', '', '2018-09-20 09:13:42', 1, 1);

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
  `BIRCerNo` int(11) NOT NULL,
  `DateCert` date NOT NULL,
  `Expiration` date NOT NULL,
  `NGOProof` varchar(255) NOT NULL,
  `password` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `ngo`
--

INSERT INTO `ngo` (`NGOID`, `NGOName`, `NGODesc`, `NGOAddr`, `NGORegion`, `NGOProvince`, `NGOEmail`, `NGOContactNo`, `NGOWebsite`, `BIRCerNo`, `DateCert`, `Expiration`, `NGOProof`, `password`) VALUES
(1, 'NGO', 'amping', 'Lahug', '7', 'cebu', 'ngo@gmail.com', '1234', 'ngo.com.ph', 1212313124, '2016-12-29', '2020-04-02', 'Penguins.jpg', 'qwe');

-- --------------------------------------------------------

--
-- Table structure for table `wishlist`
--

CREATE TABLE `wishlist` (
  `WishListID` int(11) NOT NULL,
  `WLName` varchar(50) NOT NULL,
  `WLWant` varchar(100) NOT NULL,
  `WLMessage` varchar(255) NOT NULL,
  `WLCategory` varchar(50) NOT NULL,
  `accountid` int(11) NOT NULL,
  `WLStatus` int(11) NOT NULL DEFAULT '1'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `wishlist`
--

INSERT INTO `wishlist` (`WishListID`, `WLName`, `WLWant`, `WLMessage`, `WLCategory`, `accountid`, `WLStatus`) VALUES
(1, 'Kenji Pugoy', 'test1', 'test1', 'Appliances', 1, 1),
(2, 'Kenji Pugoy', 'test2', 'test2', 'Apparels', 1, 1),
(3, 'Kenji Pugoy', 'test3', 'test3', 'Gadgets', 1, 1),
(4, 'ken pugoy', 'test4', 'test4', 'Vehicles', 5, 1),
(5, 'ken pugoy', 'test5', 'test5', 'Apparels', 5, 1),
(6, 'ken pugoy', 'test6', 'test6', 'Vehicles', 5, 1),
(7, 'Kenji Pugoy', 'tryy', 'try', 'Apparels', 1, 1),
(8, 'Kenji Pugoy', 'ww', 'qq', 'Apparels', 1, 1),
(9, 'Kenji Pugoy', 'asdasd', 'asd', 'Apparels', 1, 1),
(10, 'Kenji Pugoy', 'ee', 'qq', 'Apparels', 1, 1),
(11, 'Kenji Pugoy', 'ddd', 'ss', 'Apparels', 1, 1),
(12, 'Kenji Pugoy', 'wqeqwe', 'qq', 'Apparels', 1, 1),
(13, 'Kenji Pugoy', 'ddddd', 'q', 'Apparels', 1, 1),
(14, 'Kenji Pugoy', 'qqq', 'ww', 'Apparels', 1, 1);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `account`
--
ALTER TABLE `account`
  ADD PRIMARY KEY (`accountid`);

--
-- Indexes for table `admin`
--
ALTER TABLE `admin`
  ADD PRIMARY KEY (`adminid`);

--
-- Indexes for table `itemdonate`
--
ALTER TABLE `itemdonate`
  ADD PRIMARY KEY (`DonateSellID`),
  ADD KEY `accountid` (`accountid`);

--
-- Indexes for table `itemsell`
--
ALTER TABLE `itemsell`
  ADD PRIMARY KEY (`ItemSellID`),
  ADD KEY `accountid` (`accountid`);

--
-- Indexes for table `ngo`
--
ALTER TABLE `ngo`
  ADD PRIMARY KEY (`NGOID`);

--
-- Indexes for table `wishlist`
--
ALTER TABLE `wishlist`
  ADD PRIMARY KEY (`WishListID`),
  ADD KEY `accountid` (`accountid`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `account`
--
ALTER TABLE `account`
  MODIFY `accountid` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;
--
-- AUTO_INCREMENT for table `admin`
--
ALTER TABLE `admin`
  MODIFY `adminid` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT for table `itemdonate`
--
ALTER TABLE `itemdonate`
  MODIFY `DonateSellID` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `itemsell`
--
ALTER TABLE `itemsell`
  MODIFY `ItemSellID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT for table `ngo`
--
ALTER TABLE `ngo`
  MODIFY `NGOID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT for table `wishlist`
--
ALTER TABLE `wishlist`
  MODIFY `WishListID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;
--
-- Constraints for dumped tables
--

--
-- Constraints for table `itemdonate`
--
ALTER TABLE `itemdonate`
  ADD CONSTRAINT `itemdonate_ibfk_1` FOREIGN KEY (`accountid`) REFERENCES `account` (`accountid`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `itemsell`
--
ALTER TABLE `itemsell`
  ADD CONSTRAINT `itemsell_ibfk_1` FOREIGN KEY (`accountid`) REFERENCES `account` (`accountid`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `wishlist`
--
ALTER TABLE `wishlist`
  ADD CONSTRAINT `wishlist_ibfk_1` FOREIGN KEY (`accountid`) REFERENCES `account` (`accountid`) ON DELETE CASCADE ON UPDATE CASCADE;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
