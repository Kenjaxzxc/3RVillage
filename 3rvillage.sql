-- phpMyAdmin SQL Dump
-- version 4.6.5.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Sep 24, 2018 at 07:34 AM
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
) ENGINE=InnoDB DEFAULT CHARSET=latin1 ROW_FORMAT=COMPACT;

--
-- Dumping data for table `account`
--

INSERT INTO `account` (`accountid`, `firstname`, `lastname`, `username`, `password`, `email`, `contactno`, `status`) VALUES
(1, 'Admin', 'Admin', 'admin', 'admin', '', '', 1),
(2, 'AllixaJean', 'Gempesao', 'allixa', 'allixa', 'allixajeang88@yahoo.com', '09491209500', 1),
(3, 'charnilie', 'Ouano', 'cha', '1231231', 'cha@yahoo.com', '09464278949', 1);

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
-- Table structure for table `interested`
--

CREATE TABLE `interested` (
  `int_id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `item_id` int(11) NOT NULL,
  `_date` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `status` tinyint(4) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

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
  `DItemBrand` varchar(50) NOT NULL,
  `DItemStyle` varchar(50) NOT NULL,
  `DItemColor` varchar(50) NOT NULL,
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
  `ExpectedPrice` decimal(10,2) NOT NULL,
  `SItemStyle` varchar(255) NOT NULL,
  `SItemBrand` varchar(255) NOT NULL,
  `SItemColor` varchar(255) NOT NULL,
  `SItemImages1` varchar(255) NOT NULL,
  `SItemPosted` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `UpdatedDate` datetime DEFAULT NULL,
  `accountid` int(11) NOT NULL,
  `SItemStatus` int(11) NOT NULL DEFAULT '1'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `messages`
--

CREATE TABLE `messages` (
  `id` int(11) NOT NULL,
  `_from` int(11) NOT NULL,
  `_to` int(11) NOT NULL,
  `message` text NOT NULL,
  `is_read` tinyint(4) NOT NULL DEFAULT '0',
  `_time` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

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
  `password` varchar(50) NOT NULL,
  `status` int(11) NOT NULL DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `notification`
--

CREATE TABLE `notification` (
  `notif_id` int(11) NOT NULL,
  `notif_details` varchar(255) NOT NULL,
  `notif_time` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `table_name` varchar(50) NOT NULL,
  `table_id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `status` int(11) NOT NULL,
  `is_read` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `review`
--

CREATE TABLE `review` (
  `review_id` int(11) NOT NULL,
  `seller_id` int(11) NOT NULL,
  `buyer_id` int(11) NOT NULL,
  `rate` int(11) NOT NULL,
  `feedback` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `subscribed`
--

CREATE TABLE `subscribed` (
  `subscribedID` int(11) NOT NULL,
  `userid` int(11) NOT NULL,
  `remaining` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `subscriptionhistory`
--

CREATE TABLE `subscriptionhistory` (
  `subscriptionHistory` int(11) NOT NULL,
  `userid` int(11) NOT NULL,
  `subscriptiontype` int(11) NOT NULL,
  `oldRemain` bigint(20) NOT NULL,
  `newRemain` bigint(20) NOT NULL,
  `transactionStamp` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `subscriptiontype`
--

CREATE TABLE `subscriptiontype` (
  `subscriptionID` int(11) NOT NULL,
  `subscriptionName` varchar(255) NOT NULL,
  `postLimit` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 ROW_FORMAT=COMPACT;

--
-- Dumping data for table `subscriptiontype`
--

INSERT INTO `subscriptiontype` (`subscriptionID`, `subscriptionName`, `postLimit`) VALUES
(1, 'A', 50),
(2, 'B', 100);

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

-- --------------------------------------------------------

--
-- Table structure for table `wishlistngo`
--

CREATE TABLE `wishlistngo` (
  `WishListID` int(11) NOT NULL,
  `WLName` varchar(50) NOT NULL,
  `WLWant` varchar(100) NOT NULL,
  `WLMessage` varchar(255) NOT NULL,
  `WLCategory` varchar(50) NOT NULL,
  `NGOID` int(11) NOT NULL,
  `WLStatus` int(11) NOT NULL DEFAULT '1'
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
-- Indexes for table `admin`
--
ALTER TABLE `admin`
  ADD PRIMARY KEY (`adminid`);

--
-- Indexes for table `interested`
--
ALTER TABLE `interested`
  ADD PRIMARY KEY (`int_id`);

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
  ADD PRIMARY KEY (`ItemSellID`);

--
-- Indexes for table `messages`
--
ALTER TABLE `messages`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `ngo`
--
ALTER TABLE `ngo`
  ADD PRIMARY KEY (`NGOID`);

--
-- Indexes for table `notification`
--
ALTER TABLE `notification`
  ADD PRIMARY KEY (`notif_id`);

--
-- Indexes for table `review`
--
ALTER TABLE `review`
  ADD PRIMARY KEY (`review_id`);

--
-- Indexes for table `subscribed`
--
ALTER TABLE `subscribed`
  ADD PRIMARY KEY (`subscribedID`),
  ADD KEY `userid` (`userid`);

--
-- Indexes for table `subscriptionhistory`
--
ALTER TABLE `subscriptionhistory`
  ADD PRIMARY KEY (`subscriptionHistory`),
  ADD KEY `userid` (`userid`);

--
-- Indexes for table `subscriptiontype`
--
ALTER TABLE `subscriptiontype`
  ADD PRIMARY KEY (`subscriptionID`);

--
-- Indexes for table `wishlist`
--
ALTER TABLE `wishlist`
  ADD PRIMARY KEY (`WishListID`),
  ADD KEY `accountid` (`accountid`);

--
-- Indexes for table `wishlistngo`
--
ALTER TABLE `wishlistngo`
  ADD PRIMARY KEY (`WishListID`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `account`
--
ALTER TABLE `account`
  MODIFY `accountid` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
--
-- AUTO_INCREMENT for table `admin`
--
ALTER TABLE `admin`
  MODIFY `adminid` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT for table `interested`
--
ALTER TABLE `interested`
  MODIFY `int_id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `itemdonate`
--
ALTER TABLE `itemdonate`
  MODIFY `DonateSellID` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `itemsell`
--
ALTER TABLE `itemsell`
  MODIFY `ItemSellID` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `messages`
--
ALTER TABLE `messages`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `ngo`
--
ALTER TABLE `ngo`
  MODIFY `NGOID` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `notification`
--
ALTER TABLE `notification`
  MODIFY `notif_id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `review`
--
ALTER TABLE `review`
  MODIFY `review_id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `subscribed`
--
ALTER TABLE `subscribed`
  MODIFY `subscribedID` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `subscriptionhistory`
--
ALTER TABLE `subscriptionhistory`
  MODIFY `subscriptionHistory` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `subscriptiontype`
--
ALTER TABLE `subscriptiontype`
  MODIFY `subscriptionID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT for table `wishlist`
--
ALTER TABLE `wishlist`
  MODIFY `WishListID` int(11) NOT NULL AUTO_INCREMENT;
--
-- Constraints for dumped tables
--

--
-- Constraints for table `itemdonate`
--
ALTER TABLE `itemdonate`
  ADD CONSTRAINT `itemdonate_ibfk_1` FOREIGN KEY (`accountid`) REFERENCES `account` (`accountid`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `subscribed`
--
ALTER TABLE `subscribed`
  ADD CONSTRAINT `subscribed_ibfk_1` FOREIGN KEY (`userid`) REFERENCES `account` (`accountid`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `subscriptionhistory`
--
ALTER TABLE `subscriptionhistory`
  ADD CONSTRAINT `subscriptionhistory_ibfk_1` FOREIGN KEY (`userid`) REFERENCES `account` (`accountid`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `wishlist`
--
ALTER TABLE `wishlist`
  ADD CONSTRAINT `wishlist_ibfk_1` FOREIGN KEY (`accountid`) REFERENCES `account` (`accountid`) ON DELETE CASCADE ON UPDATE CASCADE;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
