-- phpMyAdmin SQL Dump
-- version 4.7.4
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Nov 23, 2018 at 09:46 PM
-- Server version: 10.1.28-MariaDB
-- PHP Version: 7.1.11

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `mobile`
--

-- --------------------------------------------------------

--
-- Table structure for table `adddeatails`
--

CREATE TABLE `adddeatails` (
  `aid` int(5) NOT NULL,
  `ordersid` int(11) NOT NULL,
  `fname` varchar(25) NOT NULL,
  `lname` varchar(25) NOT NULL,
  `address` varchar(100) NOT NULL,
  `zipcode` int(7) NOT NULL,
  `country` varchar(10) NOT NULL,
  `state` varchar(10) NOT NULL,
  `city` varchar(10) NOT NULL,
  `phoneno` varchar(10) NOT NULL,
  `pfname` varchar(25) NOT NULL,
  `plname` varchar(25) NOT NULL,
  `paddress` varchar(100) NOT NULL,
  `pzipcode` int(7) NOT NULL,
  `pcountry` varchar(10) NOT NULL,
  `pstate` varchar(10) NOT NULL,
  `pcity` varchar(10) NOT NULL,
  `pphoneno` varchar(12) NOT NULL,
  `order_status` varchar(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `adddeatails`
--

INSERT INTO `adddeatails` (`aid`, `ordersid`, `fname`, `lname`, `address`, `zipcode`, `country`, `state`, `city`, `phoneno`, `pfname`, `plname`, `paddress`, `pzipcode`, `pcountry`, `pstate`, `pcity`, `pphoneno`, `order_status`) VALUES
(11, 23, 'divyesh', 'ghghg', 'fgg', 395008, 'india', 'gujarat', 'surat', '556685', 'divyesh', 'ghh', 'vgbhg', 395008, 'india', 'gujarat', 'surat', 'ghghgh', 'NEW'),
(12, 24, 'amit', 'ghbghg', 'wdasddaswd', 395008, 'india', 'gujrat', 'surat', '9988998899', 'amit', 'pjhj', 'wdasddaswd', 395008, 'india', 'gujrat', 'surat', '9988998899', 'SHIPPED'),
(13, 25, 'Bapu', 'Dot', 'ddg', 395006, 'IN', 'Gujarat', 'Surat', '7894561230', 'Bapu', 'Dot', 'sdgsg', 395006, 'IN', 'Gujarat', 'Surat', '7894561230', 'PROGRESS'),
(22, 31, 'amit', 'bhalani', 'katargam', 395006, 'india', 'gujrat', 'surat', '9988998899', 'amit', 'bhalani', 'katargam', 395006, 'india', 'gujrat', 'surat', '9988998899', 'PROGRESS'),
(23, 0, 'demo', 'demo', '<br /><b>Notice</b>:  Undefined index: address in <b>C:xampphtdocsmobshopcheckout.php</b> on line <b', 370485, 'India', 'GujarÄt', 'mandvi', '9924178472', 'demo', 'demo', '<br /><b>Notice</b>:  Undefined index: address in <b>C:xampphtdocsmobshopcheckout.php</b> on line <b', 370485, 'India', 'GujarÄt', 'mandvi', '9924178472', 'NEW'),
(24, 0, 'demo', 'demo', '<br /><b>Notice</b>:  Undefined index: address in <b>C:xampphtdocsmobshopcheckout.php</b> on line <b', 370485, 'India', 'GujarÄt', 'mandvi', '9924178472', 'demo', 'demo', '<br /><b>Notice</b>:  Undefined index: address in <b>C:xampphtdocsmobshopcheckout.php</b> on line <b', 370485, 'India', 'GujarÄt', 'mandvi', '9924178472', 'NEW');

-- --------------------------------------------------------

--
-- Table structure for table `orderdetails`
--

CREATE TABLE `orderdetails` (
  `oid` int(5) NOT NULL,
  `prod_id` int(5) NOT NULL,
  `ordersid` int(5) NOT NULL,
  `price` int(5) NOT NULL,
  `quantity` int(5) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `orderdetails`
--

INSERT INTO `orderdetails` (`oid`, `prod_id`, `ordersid`, `price`, `quantity`) VALUES
(12, 7, 24, 21299, 2),
(21, 5, 30, 56900, 1),
(22, 9, 31, 29000, 1);

-- --------------------------------------------------------

--
-- Table structure for table `tbl_admin`
--

CREATE TABLE `tbl_admin` (
  `admin_id` int(15) NOT NULL,
  `admin_email_id` varchar(30) NOT NULL,
  `admin_pswd` varchar(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_admin`
--

INSERT INTO `tbl_admin` (`admin_id`, `admin_email_id`, `admin_pswd`) VALUES
(1, 'admin@admin.com', 'admin');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_company`
--

CREATE TABLE `tbl_company` (
  `com_id` int(5) NOT NULL,
  `company` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_company`
--

INSERT INTO `tbl_company` (`com_id`, `company`) VALUES
(1, 'Nokia'),
(2, 'Samsung'),
(4, 'Motorola'),
(5, 'Apple'),
(6, 'Lenovo'),
(7, 'Asus'),
(11, 'vivo');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_feedback`
--

CREATE TABLE `tbl_feedback` (
  `feed_id` int(5) NOT NULL,
  `name` varchar(20) NOT NULL,
  `subject` varchar(20) NOT NULL,
  `email_id` varchar(30) NOT NULL,
  `desc_feedback` varchar(5000) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `tbl_order`
--

CREATE TABLE `tbl_order` (
  `id` int(5) NOT NULL,
  `name` varchar(50) NOT NULL,
  `date` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `cust_id` int(5) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_order`
--

INSERT INTO `tbl_order` (`id`, `name`, `date`, `cust_id`) VALUES
(32, 'new Item', '2018-11-23 20:39:03', 22),
(33, 'new Item', '2018-11-23 20:44:35', 22);

-- --------------------------------------------------------

--
-- Table structure for table `tbl_product`
--

CREATE TABLE `tbl_product` (
  `prod_id` int(5) NOT NULL,
  `prod_name` varchar(50) NOT NULL,
  `description` varchar(100) NOT NULL,
  `price` int(6) NOT NULL,
  `quantity` int(5) NOT NULL,
  `image` varchar(100) NOT NULL,
  `image2` varchar(100) NOT NULL,
  `image3` varchar(100) NOT NULL,
  `image4` varchar(100) NOT NULL,
  `com_id` int(5) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_product`
--

INSERT INTO `tbl_product` (`prod_id`, `prod_name`, `description`, `price`, `quantity`, `image`, `image2`, `image3`, `image4`, `com_id`) VALUES
(3, 'Apple 6s(rose,16GB)', 'iOS 9 OS 4.7\" Retina HD Display Camera: 12MP|5MP 3D Touch & Live Photos', 48000, 10, 'apple-iphone-6s-na-400x400-imaeby6rmzxdpvbj.jpeg', 'appleros2.jpg', '91CQmmsX46L._SL1500_.jpg', 'apple-iphone-6s-na-400x400-imaeby6rmzxdpvbj.jpeg', 5),
(4, 'Nokia Lumia 630 Dual Sim', 'Windows Phone 8.1 OS 5 MP Primary Camera 4.5 inch LCD Display Smart Dual Sim', 8940, 15, 'nokia-lumia-630-400x400-imadw6e8ypmzxq4y.jpeg', 'nokia-lumia-630-400x400-imadw6dcxxamhhdn.jpeg', 'nokia-lumia-630-400x400-imadw52zwhggnhnn.jpeg', 'nokia-lumia-630-400x400-imadw6dcycgd5thg.jpeg', 1),
(5, 'Samsung Galxy S7 Edge', 'QHD S AMOLED Display 4 GB RAM | 32 GB ROM Dual Pixel Camera 3600 mAh Battery', 56900, 25, 'samsung-galaxy-s7-edge-na-400x400-imaegmk53n7cnuv6.jpeg', 'samsung-galaxy-s7-edge-na-400x400-imaegmk5q7xwnefv.jpeg', 'samsung-galaxy-s7-edge-na-400x400-imaegmk5czftjgsr.jpeg', 'samsung-galaxy-s7-edge-na-400x400-imaegmk5x3msgv79.jpeg', 2),
(6, 'Moto X Play 32 GB White', '5.5 inch FHD Screen Camera: 21MP|5MP 3630 mAh Battery Corning Gorilla Glass3', 17900, 30, 'motorola-moto-x-play-xt1562-400x400-imaeb7fcpgftfvfq.jpeg', 'motorola-moto-x-play-xt1562-400x400-imaeb7fhkyvkzfyr.jpeg', 'motorola-moto-x-play-xt1562-400x400-imaeb7fjkxjdzykv.jpeg', 'motorola-moto-x-play-xt1562-400x400-imaefthspt3u4y6p.jpeg', 4),
(7, 'Apple 5S(silver,16GB)', '8 MP iSight Camera iOS 7 Full HD Recording FaceTime HD Camera', 21299, 15, 'apple-iphone-5s-400x400-imadpppch2n6hhux.jpeg', '61pyJRRST3L._SL1500_.jpg', '71JEkDCDYjL._SL1500_.jpg', 'apple-iphone-5s-400x400-imadpppch2n6hhux.jpeg', 5),
(8, 'Apple iPhone 6(Space Grey, 16 GB)', 'iOS 9 OS 4.7\" HD Display Camera: 8MP|1.2MP Fingerprint Sensor', 37999, 20, 'apple-iphone-6-400x400-imaeymdqs5gm5xkz.jpeg', 'apple-iphone-6-400x400-imaeynyptwbgfn5s.jpeg', 'apple-iphone-6-400x400-imaeymdqwfgvkqff.jpeg', 'apple-iphone-6-400x400-imaeymdqs5gm5xkz.jpeg', 5),
(9, 'Apple iPhone 5C(Green, 32 GB)', 'FaceTime HD Camera 8 MP iSight Camera iOS 7 Full HD Recording', 29000, 25, 'apple-iphone-5c-400x400-imadpnhzmg3q2dt6.jpeg', 'apple-iphone-5c-400x400-imadpnhzpg8xgpmv.jpeg', 'apple-iphone-5c-400x400-imadpnhzkgcg9ujd.jpeg', 'apple-iphone-5c-400x400-imadpnhzmg3q2dt6.jpeg', 5),
(10, 'Apple iPhone 5C(Blue, 16 GB)', 'iOS 7 FaceTime HD Camera 8 MP iSight Camera Full HD Recording', 31900, 30, 'apple-iphone-5c-400x400-imadpnhygtzu8s3z.jpeg', '51lGxcrZijL._SL1100_.jpg', '61Ahv9f3bBL._SL1000_.jpg', '71CProl-mSL._SL1000_.jpg', 5),
(11, 'Nokia Lumia 930(Black, 32 GB)', '2.2 GHz Quad Core 20 MP Primary Camera 32 GB Internal Storage Windows 8.1 OS', 27299, 10, 'nokia-lumia-930-930-400x400-imae3p4qayfxzqau.jpeg', 'mi-redmi-note-na-400x400-imae6g4hv4bqfkcp.jpeg', '', '', 1),
(12, 'Microsoft Lumia 640 XL(Black, 8 GB)', 'Windows Phone 8.1 OS 5MP Secondary Camera Dual Sim (GSM + WCDMA) 13 MP Primary Camera', 13800, 10, 'microsoft-lumia-640-xl-400x400-imae62q8txf2uwhs.jpeg', '41ceF68V6DL._SL1000_.jpg', 'microsoft-lumia-640-xl-400x400-imae62q8txf2uwhs.jpeg', '41ceF68V6DL._SL1000_.jpg', 1),
(13, 'Microsoft Lumia 540(White, 8 GB)', 'Windows 8.1 OS 8 MP Primary Camera 5MP Secondary Camera Dual Sim (GSM + WCDMA)', 8939, 15, 'microsoft-lumia-540-400x400-imae7fn5yzda3tdf.jpeg', 'microsoft-lumia-540-400x400-imae7fn5yggjwp59.jpeg', 'microsoft-lumia-540-400x400-imae7fn5yggjwp59.jpeg', 'microsoft-lumia-540-400x400-imae7fn5yggjwp59.jpeg', 1),
(14, 'Microsoft Lumia 550(White, 8 GB)', 'Windows 10 OS 5 MP Primary Camera 2 MP Secondary Camera 4.7 inch Touchscreen', 7147, 15, '813hZ4EGt-L._SL1500_.jpg', 'microsoft-lumia-550-lumia-550-400x400-imaeeqmpkmhkuhyy.jpeg', 'microsoft-lumia-550-lumia-550-400x400-imaeeqmsx5emeynh.jpeg', 'microsoft-lumia-550-lumia-550-400x400-imaeeqmsamaazmzj.jpeg', 1),
(15, 'Samsung Galaxy J5 - 6 ', '5.2\" sAMOLED Display 13MP|5MP; Dual Flash Android Marshmallow 6 3100mAh Battery', 13990, 10, 'samsung-galaxy-j5-2016-sm-j510fzwuins-400x400-imaeg8cyzupzrkcc.jpeg', 'samsung-galaxy-j7-6-new-2016-edition-sm-j710fzwuins-400x400-imaeghzhvgvxyepd.jpeg', 'samsung-galaxy-j5-6-new-2016-edition-sm-j510fzwuins-400x400-imaegjdkmstbgbr5.jpeg', 'samsung-galaxy-j5-6-new-2016-edition-sm-j510fzwuins-400x400-imaegjdk4fehjehp.jpeg', 2),
(16, 'Samsung Galaxy J7 - 6', '5.5\" sAMOLED Display 13MP|5MP; Dual Flash Android Marshmallow 6 3300mAh Battery', 15590, 10, 'samsung-galaxy-j7-2016-sm-j710fzwuins-400x400-imaeg8cxzmhzjyjt.jpeg', 'samsung-galaxy-j7-6-new-2016-edition-sm-j710fzwuins-400x400-imaeghzhvgvxyepd .jpeg', 'samsung-galaxy-j5-6-new-2016-edition-sm-j510fzwuins-400x400-imaegjdkmstbgbr5 .jpeg', 'samsung-galaxy-j5-6-new-2016-edition-sm-j510fzwuins-400x400-imaegjdk4fehjehp .jpeg', 2),
(17, 'Samsung Galaxy On7(Gold, 8 GB)', '5.5 Inch HD Display Camera: 13MP|5MP 3000 mAh Battery Supports MixRadio', 10190, 15, 'samsung-galaxy-on7-sm-g600f-400x400-imaecqkgzeuz9ebn.jpeg', 'samsung-galaxy-on7-sm-g600fzddins-400x400-imaecjy462yjfrwq.jpeg', 'samsung-galaxy-on7-sm-g600fzddins-400x400-imaecjy4g2eccxsa.jpeg', 'samsung-galaxy-on7-sm-g600fzddins-400x400-imaecjy4uuh5nuaq.jpeg', 2),
(18, 'Samsung Galaxy Core Prime(White, 8 GB)', '4.5 inch Touchscreen 1GB RAM 8GB ROM Camera: 5MP 2MP 2000 mAh Batter', 5999, 18, 'samsung-galaxy-core-prime-sm-g360hzwdins-400x400-imae43p8cqngzupz.jpeg', 'samsung-galaxy-core-prime-sm-g360hzwdins-400x400-imae44sgugfhkfcx.jpeg', 'samsung-galaxy-core-prime-sm-g360hzwdins-400x400-imae44sgugfhkfcx.jpeg', 'samsung-galaxy-core-prime-sm-g360hzwdins-400x400-imae44sgugfhkfcx.jpeg', 2),
(19, 'Moto G Turbo Edition(Black, 16 GB)', 'IP67 Water Resistance Camera: 13MP|5MP Corning Gorilla Glass3 Turbo Charger', 12199, 15, 'motorola-moto-g-turbo-edition-xt1557-400x400-imaefgnkmprhzhzk.jpeg', 'motorola-moto-g-turbo-edition-xt1557-400x400-imaeg6y5seu79f6r.jpeg', 'motorola-moto-g-turbo-edition-xt1557-400x400-imaeg5ujvqyrkktf.jpeg', 'motorola-moto-g-turbo-edition-xt1557-400x400-imaefmyngzuhna4r.jpeg', 4),
(20, 'Moto X Style(Black, 32 GB)', 'Android v5.1.1 OS 21 MP + 5 MP 3000 mAh Battery Dual Nano Sim (4G+4G)', 28599, 14, 'motorola-moto-x-style-xt1572-400x400-imaebugedxgxfr6g.jpeg', 'moto-style-topic.png', 'imagesdds.jpg', 'motorola-moto-x-style-xt1572-400x400-imaebugedxgxfr6g.jpeg', 4),
(21, 'Moto Turbo(Black, 64 GB)', 'Turbo Charging 5.2 inch QHD Display 3900 mAh Battery 21 MP Primary Camera', 31990, 17, 'motorola-moto-turbo-xt1225-400x400-imae5fyxgh7qy6ag.jpeg', 'motorola-moto-turbo-xt1225-400x400-imae5fyxg8emex9a.jpeg', 'motorola-moto-turbo-xt1225-400x400-imae5fyxgh7qy6ag.jpeg', 'motorola-moto-turbo-xt1225-400x400-imae5fyxg8emex9a.jpeg', 4),
(22, 'Moto X (2nd Generation)(Black, 32 GB)', '3 MP Primary Camera 5.2 inch Touchscreen Android v4.4.4 OS 2.5 GHz Processor', 17199, 14, 'motorola-moto-turbo-xt1225-400x400-imae5fyxgh7qy6ag.jpeg', 'motorola-xt1092-400x400-imaefs86f3y4gs3s.jpeg', 'motorola-xt1092-400x400-imaefs86u8zhffbe.jpeg', 'motorola-moto-turbo-xt1225-400x400-imae5fyxgh7qy6ag.jpeg', 4),
(23, 'Lenovo VIBE P1m(Black, 16 GB)', '3900mAh Battery, OTG 5 inch HD IPS Display 2GB RAM | 16GB ROM 8MP | 5MP Camera', 6999, 14, 'lenovo-vibe-p1m-pa1g0035in-400x400-imaec3g2ghmtg4vz.jpeg', 'lenovo-vibe-p1m-p1ma40-400x400-imaefthsykxwtqpw.jpeg', 'lenovo-vibe-p1m-pa1g0035in-400x400-imaec3g2pjnhay8s.jpeg', 'lenovo-vibe-p1m-pa1g0035in-400x400-imaecb3whtetdhz4.jpeg', 6),
(24, 'Lenovo Vibe K5 Plus(Dark Grey, 16 GB)', '5 inch Full HD Display TheaterMax VR Support Dolby Atmos Speakers Qualcomm Snapdragon616', 8499, 16, 'lenovo-vibe-k5-plus-a6020a46-400x400-imaegu5zagahzghj.jpeg', 'lenovo-vibe-k5-plus-a6020a46-400x400-imaegu5zggaqdne5.jpeg', 'lenovo-vibe-k5-plus-a6020a46-400x400-imaegu5zvhtpg742.jpeg', 'lenovo-vibe-k5-plus-a6020a46-400x400-imaegu8zyj784hbf.jpeg', 6),
(25, 'Lenovo K3 Note(Black, 16 GB)', '5.5 inch FHD Display Camera: 13MP|5MP With Android M Update TheaterMax VR Suppor', 9999, 15, 'lenovo-k3-note-na-400x400-imae8hstkr6sbtgt.jpeg', 'lenovo-k3-note-k50a40-400x400-imaefths4sn4nqm3.jpeg', 'lenovo-k3-note-na-400x400-imae8hstk2sz6vbf.jpeg', 'lenovo-k3-note-na-400x400-imae8hstnspdrjtj.jpeg', 6),
(26, 'Lenovo Vibe K5 Plus(Silver, 16 GB)', '5 inch Full HD Display TheaterMax VR Support Dolby Atmos Speakers Qualcomm Snapdragon616', 9999, 15, 'lenovo-vibe-k5-plus-a6020a46-400x400-imaegu5zh5mfrzgh.jpeg', 'lenovo-vibe-k5-plus-a6020a46-400x400-imaegu5zjrphdrcu.jpeg', 'lenovo-vibe-k5-plus-a6020a46-400x400-imaegu8zth5e3pds.jpeg', 'lenovo-vibe-k5-plus-a6020a46-400x400-imaegu8ze8hmexyu.jpeg', 6),
(27, 'Asus zenfone max', '5000 mAh Battery Works as a Power Bank Camera: 13 MP|5MP 5.5 inch HD display', 8999, 10, 'asus-zenfone-max-zc550kl-6a023in-400x400-imaeegudewju56a8.jpeg', 'asus-zenfone-max-zc550kl-6a072in-400x400-imaegrdph3gs6pvs.jpeg', 'asus-zenfone-max-zc550kl-6a072in-400x400-imaegsb7aacwchzz.jpeg', 'asus-zenfone-max-zc550kl-6a072in-400x400-imaegsb7hgkfbspu.jpeg', 7);

-- --------------------------------------------------------

--
-- Table structure for table `tbl_register`
--

CREATE TABLE `tbl_register` (
  `cust_id` int(5) NOT NULL,
  `first_name` varchar(30) NOT NULL,
  `last_name` varchar(30) NOT NULL,
  `user_name` varchar(30) NOT NULL,
  `email_add` varchar(50) NOT NULL,
  `gender` varchar(5) NOT NULL,
  `country` varchar(10) NOT NULL,
  `state` varchar(10) NOT NULL,
  `city` varchar(10) NOT NULL,
  `zip_code` int(7) NOT NULL,
  `password` varchar(25) NOT NULL,
  `confirm_password` varchar(25) NOT NULL,
  `phone_no` varchar(10) NOT NULL,
  `active` tinyint(1) NOT NULL COMMENT 'user active or not'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_register`
--

INSERT INTO `tbl_register` (`cust_id`, `first_name`, `last_name`, `user_name`, `email_add`, `gender`, `country`, `state`, `city`, `zip_code`, `password`, `confirm_password`, `phone_no`, `active`) VALUES
(22, 'demo', 'demo', 'demo', 'demo@demo.com', 'male', 'India', 'GujarÄt', 'mandvi', 370485, 'demo', 'demo', '9924178472', 1);

-- --------------------------------------------------------

--
-- Table structure for table `tbl_status`
--

CREATE TABLE `tbl_status` (
  `stid` int(5) NOT NULL,
  `prod_id` varchar(5) NOT NULL,
  `status` varchar(10) NOT NULL,
  `cust_id` int(5) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_status`
--

INSERT INTO `tbl_status` (`stid`, `prod_id`, `status`, `cust_id`) VALUES
(9, '18', 'PAID', 2),
(10, '7', 'SHIPPED', 1),
(11, '15', 'DELIVARY', 1),
(12, '3', 'PAID', 1),
(13, '3', 'SHIPPED', 3);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `adddeatails`
--
ALTER TABLE `adddeatails`
  ADD PRIMARY KEY (`aid`);

--
-- Indexes for table `orderdetails`
--
ALTER TABLE `orderdetails`
  ADD PRIMARY KEY (`oid`);

--
-- Indexes for table `tbl_admin`
--
ALTER TABLE `tbl_admin`
  ADD PRIMARY KEY (`admin_id`);

--
-- Indexes for table `tbl_company`
--
ALTER TABLE `tbl_company`
  ADD PRIMARY KEY (`com_id`);

--
-- Indexes for table `tbl_feedback`
--
ALTER TABLE `tbl_feedback`
  ADD PRIMARY KEY (`feed_id`);

--
-- Indexes for table `tbl_order`
--
ALTER TABLE `tbl_order`
  ADD PRIMARY KEY (`id`),
  ADD KEY `cust_id` (`cust_id`);

--
-- Indexes for table `tbl_product`
--
ALTER TABLE `tbl_product`
  ADD PRIMARY KEY (`prod_id`);

--
-- Indexes for table `tbl_register`
--
ALTER TABLE `tbl_register`
  ADD PRIMARY KEY (`cust_id`);

--
-- Indexes for table `tbl_status`
--
ALTER TABLE `tbl_status`
  ADD PRIMARY KEY (`stid`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `adddeatails`
--
ALTER TABLE `adddeatails`
  MODIFY `aid` int(5) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=25;

--
-- AUTO_INCREMENT for table `orderdetails`
--
ALTER TABLE `orderdetails`
  MODIFY `oid` int(5) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=23;

--
-- AUTO_INCREMENT for table `tbl_admin`
--
ALTER TABLE `tbl_admin`
  MODIFY `admin_id` int(15) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `tbl_company`
--
ALTER TABLE `tbl_company`
  MODIFY `com_id` int(5) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT for table `tbl_feedback`
--
ALTER TABLE `tbl_feedback`
  MODIFY `feed_id` int(5) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `tbl_order`
--
ALTER TABLE `tbl_order`
  MODIFY `id` int(5) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=34;

--
-- AUTO_INCREMENT for table `tbl_product`
--
ALTER TABLE `tbl_product`
  MODIFY `prod_id` int(5) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=28;

--
-- AUTO_INCREMENT for table `tbl_register`
--
ALTER TABLE `tbl_register`
  MODIFY `cust_id` int(5) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=23;

--
-- AUTO_INCREMENT for table `tbl_status`
--
ALTER TABLE `tbl_status`
  MODIFY `stid` int(5) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `tbl_order`
--
ALTER TABLE `tbl_order`
  ADD CONSTRAINT `tbl_order_ibfk_1` FOREIGN KEY (`cust_id`) REFERENCES `tbl_register` (`cust_id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
