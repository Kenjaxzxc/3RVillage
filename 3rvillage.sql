-- phpMyAdmin SQL Dump
-- version 4.6.5.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Oct 05, 2018 at 02:47 AM
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
  `userpic` varchar(255) NOT NULL DEFAULT 'profile_img.png',
  `contactno` varchar(20) NOT NULL,
  `status` int(11) NOT NULL DEFAULT '1'
) ENGINE=InnoDB DEFAULT CHARSET=latin1 ROW_FORMAT=COMPACT;

--
-- Dumping data for table `account`
--

INSERT INTO `account` (`accountid`, `firstname`, `lastname`, `username`, `password`, `email`, `userpic`, `contactno`, `status`) VALUES
(1, 'Admin', 'Admin', 'admin', 'admin', '', '', '', 1),
(2, 'AllixaJean', 'Gempesao', 'allixa', 'allixa', 'allixajeang88@yahoo.com', 'gallery-09.jpg', '09491209500', 1),
(3, 'charnilie', 'Ouano', 'cha', '1231231', 'cha@yahoo.com', 'item-cart-01.jpg', '09464278949', 1),
(4, 'kenji', 'pugoy', 'kenji', 'kenji', 'kenji@gmail.com', 'gallery-07.jpg', '1231321', 1),
(6, 'Heubert', 'Ferolino', 'heubert', 'ferolino', 'heubert@gmail.com', 'profile_img.png', '09276168497', 1);

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

--
-- Dumping data for table `interested`
--

INSERT INTO `interested` (`int_id`, `user_id`, `item_id`, `_date`, `status`) VALUES
(1, 4, 2, '2018-09-25 09:07:19', 1),
(2, 4, 4, '2018-10-04 09:35:46', 1),
(3, 4, 11, '2018-10-04 09:41:06', 0),
(4, 4, 11, '2018-10-04 09:57:25', 0);

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

--
-- Dumping data for table `itemsell`
--

INSERT INTO `itemsell` (`ItemSellID`, `SItemTitle`, `SItemCat`, `SItemDesc`, `SItemLocation`, `SItemPrice`, `ExpectedPrice`, `SItemStyle`, `SItemBrand`, `SItemColor`, `SItemImages1`, `SItemPosted`, `UpdatedDate`, `accountid`, `SItemStatus`) VALUES
(1, 'Bag', 'Bag', 'Bag for sale', 'Bukidnon', '324.00', '234.00', 'sdfdsf', 'dfdsf', 'Red', 'banner-06.jpg', '2018-09-24 17:40:42', NULL, 3, 0),
(2, 'heheh', 'Apparels', 'hfhdyfeheg', 'Abra', '567.00', '3452.00', 'gegr', 'hehege', 'Red', 'banner-07.jpg', '2018-09-24 17:41:34', NULL, 3, 0),
(3, 'Watch', 'Bag', 'watch', 'Abra', '123.00', '343.00', '', 'Casio', 'Black', 'product-15.jpg', '2018-09-25 10:16:49', NULL, 2, 0),
(4, 'Cabinet', 'Others', 'slightly used.', 'Abra', '600.00', '300.00', 'native', 'mandaue foam', 'Brown', 'cabinet.jpg', '2018-09-25 11:32:18', '2018-10-04 11:38:16', 3, 2),
(5, 'Table', 'Others', 'Table', 'Abra', '5000.00', '7000.00', '', 'Wood', 'Brown', 'table.jpg', '2018-09-25 11:41:35', NULL, 3, 0),
(6, 'PHONE', 'Gadgets', 'ASD', 'Abra', '23.00', '123.00', '', 'Cherry Mobile', 'Blue', 'images1.jpg', '2018-09-25 11:56:18', NULL, 6, 1),
(7, 'ASD', 'Apparels', 'SAD', 'Abra', '343.00', '3434.00', 'ASD', 'ASDAS', 'Red', 'blog-05.jpg', '2018-09-25 11:56:30', NULL, 6, 1),
(8, 'ASDAS', 'Apparels', 'ASDASD', 'Abra', '13123.00', '3434.00', 'asdad', 'AD', 'Red', 'gallery-08.jpg', '2018-09-25 11:56:42', NULL, 6, 1),
(9, 'asdasdas', 'Apparels', 'ASD', 'Abra', '343.00', '3434.00', 'ASD', 'ASD', 'Red', 'gallery-09.jpg', '2018-09-25 11:56:52', NULL, 6, 1),
(10, 'ASDAS', 'Accessories', 'ASD', 'Abra', '434.00', '3333.00', '', '123', 'Red', 'banner-05.jpg', '2018-09-25 11:57:03', NULL, 6, 1),
(11, 'Cellphone', 'Apparels', 'Cherry mobile phone', 'Abra', '3434.00', '6000.00', '', 'Cherry Mobile', 'Red', 'images1.jpg', '2018-10-04 09:40:50', NULL, 3, 1);

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

--
-- Dumping data for table `messages`
--

INSERT INTO `messages` (`id`, `_from`, `_to`, `message`, `is_read`, `_time`) VALUES
(1, 4, 3, 'a:2:{s:5:\"photo\";a:0:{}s:7:\"message\";s:3:\"hey\";}', 1, '2018-10-04 09:57:39'),
(2, 4, 3, 'a:2:{s:5:\"photo\";a:1:{i:0;s:36:\"4236aaabaffcf4915479ab00608d9714.jpg\";}s:7:\"message\";s:0:\"\";}', 1, '2018-10-04 09:58:02'),
(3, 3, 4, 'a:2:{s:5:\"photo\";a:1:{i:0;s:36:\"4be782c12cdd38b14e32e3d4531a5c7f.jpg\";}s:7:\"message\";s:0:\"\";}', 1, '2018-10-04 09:58:12'),
(4, 3, 4, 'a:2:{s:5:\"photo\";a:1:{i:0;s:36:\"4c0ca5cf00610448fe7739d7711a3ba2.jpg\";}s:7:\"message\";s:10:\"mao ni sya\";}', 1, '2018-10-04 09:58:31'),
(5, 4, 3, 'a:2:{s:5:\"photo\";a:3:{i:0;s:36:\"f70ef3ec4a8f5b4aa79bab3bea0ee264.jpg\";i:1;s:36:\"f70ef3ec4a8f5b4aa79bab3bea0ee264.jpg\";i:2;s:36:\"b18c1b34d83295b38e9f595a434dd906.jpg\";}s:7:\"message\";s:7:\"comment\";}', 1, '2018-10-04 09:58:50'),
(6, 4, 3, 'a:2:{s:5:\"photo\";a:1:{i:0;s:36:\"a61e72fd2433eb6ae0ca7e3592d71e0f.jpg\";}s:7:\"message\";s:0:\"\";}', 1, '2018-10-04 10:30:21'),
(7, 4, 3, 'a:2:{s:5:\"photo\";a:0:{}s:7:\"message\";s:3:\"hey\";}', 1, '2018-10-04 10:30:47'),
(8, 4, 3, 'a:2:{s:5:\"photo\";a:1:{i:0;s:36:\"8abd29d77ef24fd49836cd9494f45b1e.jpg\";}s:7:\"message\";s:0:\"\";}', 1, '2018-10-04 10:31:03'),
(9, 4, 3, 'a:2:{s:5:\"photo\";a:1:{i:0;s:36:\"9fb20c2a3e0bcae04111ab86adc90d75.jpg\";}s:7:\"message\";s:0:\"\";}', 1, '2018-10-04 11:00:38');

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

--
-- Dumping data for table `ngo`
--

INSERT INTO `ngo` (`NGOID`, `NGOName`, `NGODesc`, `NGOAddr`, `NGORegion`, `NGOProvince`, `NGOEmail`, `NGOContactNo`, `NGOWebsite`, `BIRCerNo`, `DateCert`, `Expiration`, `NGOProof`, `password`, `status`) VALUES
(1, 'Sagip', 'sagip kapamilya', 'Lapulapu', '7', 'cebu', 'sagip@gmail.com', '09424855562', 'sagip.com.ph', 34314324, '2018-09-13', '2018-09-20', 'logo-3r.jpg', 'sagip', 1);

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

--
-- Dumping data for table `notification`
--

INSERT INTO `notification` (`notif_id`, `notif_details`, `notif_time`, `table_name`, `table_id`, `user_id`, `status`, `is_read`) VALUES
(1, 'Your post title ASDAS on category Accessories has been inactive ! ', '2018-10-03 02:33:39', 'itemsell', 10, 6, 0, 0),
(2, 'Your post title ASDAS on category Accessories has been inactive ! ', '2018-10-04 09:34:45', 'itemsell', 10, 6, 0, 0),
(3, 'Your post title asdasdas on category Apparels has been inactive ! ', '2018-10-04 09:35:03', 'itemsell', 9, 6, 0, 0),
(4, 'Your post title ASDAS on category Apparels has been inactive ! ', '2018-10-04 09:35:06', 'itemsell', 8, 6, 0, 0),
(5, 'Your post title Cabinet on category Others has been inactive ! ', '2018-10-04 09:35:42', 'itemsell', 4, 3, 0, 0),
(6, 'Your post title heheh on category Apparels has been inactive ! ', '2018-10-04 09:37:55', 'itemsell', 2, 3, 0, 0),
(7, 'Your post title Table on category Others has been inactive ! ', '2018-10-04 09:37:58', 'itemsell', 5, 3, 0, 0),
(8, 'Your post title Cabinet on category Others has been inactive ! ', '2018-10-04 09:38:00', 'itemsell', 4, 3, 0, 0),
(9, 'Your post title Bag on category Bag has been inactive ! ', '2018-10-04 09:38:03', 'itemsell', 1, 3, 0, 0),
(10, 'Your post title Bag on category Bag has been inactive ! ', '2018-10-04 09:38:05', 'itemsell', 1, 3, 0, 0),
(11, 'Your post title Cabinet on category Others has been actived now ! ', '2018-10-04 09:38:16', 'itemsell', 4, 3, 1, 0);

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

--
-- Dumping data for table `review`
--

INSERT INTO `review` (`review_id`, `seller_id`, `buyer_id`, `rate`, `feedback`) VALUES
(1, 3, 4, 4, '');

-- --------------------------------------------------------

--
-- Table structure for table `subscribed`
--

CREATE TABLE `subscribed` (
  `subscribedID` int(11) NOT NULL,
  `userid` int(11) NOT NULL,
  `remaining` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `subscribed`
--

INSERT INTO `subscribed` (`subscribedID`, `userid`, `remaining`) VALUES
(1, 3, 100),
(2, 4, 255),
(3, 2, 54),
(4, 6, 50);

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
  `card_num` int(11) NOT NULL,
  `amount` decimal(11,2) NOT NULL,
  `transactionStamp` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `s_status` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `subscriptionhistory`
--

INSERT INTO `subscriptionhistory` (`subscriptionHistory`, `userid`, `subscriptiontype`, `oldRemain`, `newRemain`, `card_num`, `amount`, `transactionStamp`, `s_status`) VALUES
(1, 3, 1, 0, 50, 0, '0.00', '2018-09-24 17:30:04', 0),
(3, 3, 1, 0, 50, 0, '0.00', '2018-09-24 17:37:18', 0),
(5, 3, 0, 3, 3, 2345678, '3456789.00', '2018-09-25 03:40:12', 0),
(6, 3, 0, 3, 3, 23423, '234234.00', '2018-09-25 03:43:54', 0),
(7, 3, 0, 3, 3, 3456, '34567.00', '2018-09-25 03:46:38', 0),
(8, 3, 2, 3, 103, 5965, '3453.00', '2018-09-25 03:48:24', 0),
(9, 2, 2, 0, 100, 123456, '2345.00', '2018-09-25 06:55:27', 0),
(10, 2, 1, 0, 50, 2345, '3456.00', '2018-09-25 06:58:25', 0),
(11, 2, 1, 0, 50, 3456, '100.00', '2018-09-25 07:00:16', 0),
(12, 4, 2, 5, 105, 88989898, '200.00', '2018-09-25 07:13:07', 0),
(13, 2, 2, 0, 100, 123123, '200.00', '2018-09-25 09:49:00', 0),
(14, 4, 2, 105, 205, 3141, '200.00', '2018-09-25 09:50:53', 0),
(15, 4, 1, 205, 255, 34324, '100.00', '2018-09-25 09:51:08', 0),
(16, 2, 1, 5, 55, 3434, '100.00', '2018-09-25 09:51:55', 0),
(17, 6, 1, 0, 50, 3434, '100.00', '2018-09-25 11:57:36', 0);

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
-- Table structure for table `subscription_payment`
--

CREATE TABLE `subscription_payment` (
  `sub_pay_id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `amount` decimal(11,2) NOT NULL,
  `sub_type` int(11) NOT NULL,
  `payment_date` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

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
  `WLStatus` int(11) NOT NULL DEFAULT '1',
  `_date` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `wishlist`
--

INSERT INTO `wishlist` (`WishListID`, `WLName`, `WLWant`, `WLMessage`, `WLCategory`, `accountid`, `WLStatus`, `_date`) VALUES
(1, 'charnilie Ouano', 'I want Cellphone', 'Cellphone', 'Apparels', 3, 1, '2018-10-04 10:03:24');

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
-- Indexes for table `subscription_payment`
--
ALTER TABLE `subscription_payment`
  ADD PRIMARY KEY (`sub_pay_id`);

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
  MODIFY `accountid` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;
--
-- AUTO_INCREMENT for table `admin`
--
ALTER TABLE `admin`
  MODIFY `adminid` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT for table `interested`
--
ALTER TABLE `interested`
  MODIFY `int_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
--
-- AUTO_INCREMENT for table `itemdonate`
--
ALTER TABLE `itemdonate`
  MODIFY `DonateSellID` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `itemsell`
--
ALTER TABLE `itemsell`
  MODIFY `ItemSellID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;
--
-- AUTO_INCREMENT for table `messages`
--
ALTER TABLE `messages`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;
--
-- AUTO_INCREMENT for table `ngo`
--
ALTER TABLE `ngo`
  MODIFY `NGOID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT for table `notification`
--
ALTER TABLE `notification`
  MODIFY `notif_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;
--
-- AUTO_INCREMENT for table `review`
--
ALTER TABLE `review`
  MODIFY `review_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT for table `subscribed`
--
ALTER TABLE `subscribed`
  MODIFY `subscribedID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
--
-- AUTO_INCREMENT for table `subscriptionhistory`
--
ALTER TABLE `subscriptionhistory`
  MODIFY `subscriptionHistory` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=18;
--
-- AUTO_INCREMENT for table `subscriptiontype`
--
ALTER TABLE `subscriptiontype`
  MODIFY `subscriptionID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT for table `subscription_payment`
--
ALTER TABLE `subscription_payment`
  MODIFY `sub_pay_id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `wishlist`
--
ALTER TABLE `wishlist`
  MODIFY `WishListID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
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
