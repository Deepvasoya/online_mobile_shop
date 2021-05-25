-- phpMyAdmin SQL Dump
-- version 5.0.4
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Apr 12, 2021 at 11:15 AM
-- Server version: 10.4.17-MariaDB
-- PHP Version: 8.0.1

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `mshop`
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
  `order_status` varchar(10) NOT NULL,
  `c_id` int(5) NOT NULL,
  `date` datetime NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `adddeatails`
--

INSERT INTO `adddeatails` (`aid`, `ordersid`, `fname`, `lname`, `address`, `zipcode`, `country`, `state`, `city`, `phoneno`, `pfname`, `plname`, `paddress`, `pzipcode`, `pcountry`, `pstate`, `pcity`, `pphoneno`, `order_status`, `c_id`, `date`) VALUES
(85, 95, 'DEEP', 'VASOYA', 'Near Maruti, SP Road', 360490, 'India', 'Gujarat', 'Upleta', '0910671554', 'DEEP', 'VASOYA', 'Near Maruti, SP Road', 360490, 'India', 'Gujarat', 'Upleta', '09106715543', 'COMPLETED', 19, '2021-04-05 10:19:42'),
(88, 98, 'DEEP', 'VASOYA', 'Near Maruti, SP Road', 360490, 'India', 'Gujarat', 'Upleta', '0910671554', 'DEEP', 'VASOYA', 'Near Maruti, SP Road', 360490, 'India', 'Gujarat', 'Upleta', '09106715543', 'COMPLETED', 19, '2021-04-02 16:00:08'),
(92, 102, 'DEEP', 'VASOYA', 'Near Maruti, SP Road', 360490, 'India', 'Gujarat', 'Upleta', '0910671554', 'DEEP', 'VASOYA', 'Near Maruti, SP Road', 360490, 'India', 'Gujarat', 'Upleta', '09106715543', 'COMPLETED', 19, '2021-04-10 10:20:35');

-- --------------------------------------------------------

--
-- Table structure for table `address`
--

CREATE TABLE `address` (
  `a_id` int(255) NOT NULL,
  `cid` int(11) NOT NULL,
  `fname` varchar(30) NOT NULL,
  `lname` varchar(30) NOT NULL,
  `address` text NOT NULL,
  `zipcode` int(7) NOT NULL,
  `city` varchar(30) NOT NULL,
  `state` varchar(30) NOT NULL,
  `country` varchar(30) NOT NULL,
  `phone` varchar(13) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `address`
--

INSERT INTO `address` (`a_id`, `cid`, `fname`, `lname`, `address`, `zipcode`, `city`, `state`, `country`, `phone`) VALUES
(2, 19, 'DEEP', 'VASOYA', 'Near Maruti, SP Road', 360490, 'Upleta', 'Gujarat', 'India', '09106715543'),
(5, 19, 'Jenil', 'Popat', 'Near Sp Road', 333310, 'Babra', 'Gujarat', 'India', '09876541230'),
(6, 22, 'DEEP', 'VASOYA', 'Near Maruti, SP Road', 360490, 'Upleta', 'Gujarat', 'India', '09106715543');

-- --------------------------------------------------------

--
-- Table structure for table `contact`
--

CREATE TABLE `contact` (
  `id` int(11) NOT NULL,
  `name` varchar(30) NOT NULL,
  `email` varchar(30) NOT NULL,
  `subject` varchar(30) NOT NULL,
  `comment` text NOT NULL,
  `date` datetime NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `contact`
--

INSERT INTO `contact` (`id`, `name`, `email`, `subject`, `comment`, `date`) VALUES
(1, 'Deep', 'deep@gmail.com', 'Good', 'Good', '2021-03-05 10:25:24'),
(2, 'Yash', 'yash@gmail.com', 'good', 'good', '2021-03-05 10:33:18'),
(3, 'Yash', 'yash@gmail.com', 'good', 'good', '2021-03-05 10:41:41'),
(4, 'Jenil', 'jenil@gmail.com', 'good', 'good\r\n', '2021-03-05 10:42:28'),
(5, 'Jenil', 'jenil@gmail.com', 'good', 'good\r\n', '2021-03-05 10:42:44');

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
(49, 8, 95, 37999, 1),
(52, 26, 98, 9999, 1),
(53, 7, 99, 21299, 2),
(55, 3, 101, 4800, 1),
(56, 25, 102, 9999, 3);

-- --------------------------------------------------------

--
-- Table structure for table `payments`
--

CREATE TABLE `payments` (
  `cid` int(11) NOT NULL,
  `orderid` int(11) NOT NULL,
  `item_number` int(11) NOT NULL,
  `product_qty` int(11) NOT NULL,
  `transaction_id` varchar(100) NOT NULL,
  `payment_gross` int(50) NOT NULL,
  `payment_status` varchar(20) NOT NULL,
  `date` datetime NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `payments`
--

INSERT INTO `payments` (`cid`, `orderid`, `item_number`, `product_qty`, `transaction_id`, `payment_gross`, `payment_status`, `date`) VALUES
(19, 95, 8, 1, 'd7e76591bbd9464386be35b55944c2ec', 38099, 'credit', '2021-04-01 10:27:48'),
(19, 98, 26, 1, '3fb90ab34b01428dafd786438c93bf84', 10099, 'credit', '2021-04-02 16:00:08'),
(22, 99, 7, 2, 'ee4586d2d0174b7d9f9b6c09503f3d53', 42698, 'credit', '2021-04-10 09:34:41'),
(19, 101, 3, 1, 'ab392551c1614b5ba65d3d2411d31c51', 4900, 'credit', '2021-04-10 09:42:37'),
(19, 102, 25, 3, '725b36aebcf049e3a94d3ccf5309c937', 30097, 'credit', '2021-04-10 10:20:35');

-- --------------------------------------------------------

--
-- Table structure for table `returnorder`
--

CREATE TABLE `returnorder` (
  `id` int(11) NOT NULL,
  `cid` int(11) NOT NULL,
  `oid` int(11) NOT NULL,
  `reason` varchar(20) NOT NULL,
  `comment` text NOT NULL,
  `itemname` varchar(100) NOT NULL,
  `quantity` int(11) NOT NULL,
  `date` datetime NOT NULL DEFAULT current_timestamp(),
  `status` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `returnorder`
--

INSERT INTO `returnorder` (`id`, `cid`, `oid`, `reason`, `comment`, `itemname`, `quantity`, `date`, `status`) VALUES
(3, 19, 95, 'Replace', 'Hi, I want to return this item which I bought last week.” Show the clerk the item and your receipt. Don\'t delay returning the item', 'Apple iPhone 6(Space Grey, 16 GB)', 1, '2021-04-07 16:38:46', 'REJECT');

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
(1, 'admin', 'admin');

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
(7, 'Asus');

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

--
-- Dumping data for table `tbl_feedback`
--

INSERT INTO `tbl_feedback` (`feed_id`, `name`, `subject`, `email_id`, `desc_feedback`) VALUES
(14, 'Deep Vasoya', 'Apple', 'deep.patel8678@gmail.com', 'It is a good mobile'),
(15, 'Yash', 'Nokia', 'yash@gmail.com', 'It is good moile phone');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_order`
--

CREATE TABLE `tbl_order` (
  `id` int(5) NOT NULL,
  `name` varchar(50) NOT NULL,
  `date` datetime NOT NULL,
  `cust_id` int(5) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_order`
--

INSERT INTO `tbl_order` (`id`, `name`, `date`, `cust_id`) VALUES
(95, 'new Item', '0000-00-00 00:00:00', 19),
(98, 'new Item', '0000-00-00 00:00:00', 19),
(99, 'new Item', '0000-00-00 00:00:00', 22),
(102, 'new Item', '0000-00-00 00:00:00', 19);

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
(3, 'Apple 6s(rse,16GB)', 'iOS 9 OS 4.7', 4800, 10, '1615363548-apple-iphone-6-400x400-imaeymdqs5gm5xkz.jpeg', '1615363548-apple-iphone-6-400x400-imaeymdqwfgvkqff.jpeg', '1615363548-apple-iphone-6-400x400-imaeynyptwbgfn5s.jpeg', '1615363548-apple-iphone-6s-na-400x400-imaeby6rmzxdpvbj.jpeg', 5),
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
(17, 'Samsung Galaxy On7(Gold, 8 GB)', '5.5 Inch HD Display Camera: 13MP|5MP 3000 mAh Battery Supports MixRadio', 10190, 15, 'samsung-galaxy-on7-sm-g600f-400x400-imaecqkgzeuz9ebn.jpeg', 'samsung-galaxy-on7-sm-g600fzddins-400x400-imaecjy462yjfrwq.jpeg', 'samsung-galaxy-on7-sm-g600fzddins-400x400-imaecjy4g2eccxsa.jpeg', 'samsung-galaxy-on7-sm-g600fzddins-400x400-imaecjy4uuh5nuaq.jpeg', 2),
(18, 'Samsung Galaxy Core Prime(White, 8 GB)', '4.5 inch Touchscreen 1GB RAM 8GB ROM Camera: 5MP 2MP 2000 mAh Batter', 5999, 18, 'samsung-galaxy-core-prime-sm-g360hzwdins-400x400-imae43p8cqngzupz.jpeg', 'samsung-galaxy-core-prime-sm-g360hzwdins-400x400-imae44sgugfhkfcx.jpeg', 'samsung-galaxy-core-prime-sm-g360hzwdins-400x400-imae44sgugfhkfcx.jpeg', 'samsung-galaxy-core-prime-sm-g360hzwdins-400x400-imae44sgugfhkfcx.jpeg', 2),
(19, 'Moto G Turbo Edition(Black, 16 GB)', 'IP67 Water Resistance Camera: 13MP|5MP Corning Gorilla Glass3 Turbo Charger', 12199, 15, 'motorola-moto-g-turbo-edition-xt1557-400x400-imaefgnkmprhzhzk.jpeg', 'motorola-moto-g-turbo-edition-xt1557-400x400-imaeg6y5seu79f6r.jpeg', 'motorola-moto-g-turbo-edition-xt1557-400x400-imaeg5ujvqyrkktf.jpeg', 'motorola-moto-g-turbo-edition-xt1557-400x400-imaefmyngzuhna4r.jpeg', 4),
(20, 'Moto X Style(Black, 32 GB)', 'Android v5.1.1 OS 21 MP + 5 MP 3000 mAh Battery Dual Nano Sim (4G+4G)', 28599, 14, 'motorola-moto-x-style-xt1572-400x400-imaebugedxgxfr6g.jpeg', 'moto-style-topic.png', 'imagesdds.jpg', 'motorola-moto-x-style-xt1572-400x400-imaebugedxgxfr6g.jpeg', 4),
(21, 'Moto Turbo(Black, 64 GB)', 'Turbo Charging 5.2 inch QHD Display 3900 mAh Battery 21 MP Primary Camera', 31990, 17, 'motorola-moto-turbo-xt1225-400x400-imae5fyxgh7qy6ag.jpeg', 'motorola-moto-turbo-xt1225-400x400-imae5fyxg8emex9a.jpeg', 'motorola-moto-turbo-xt1225-400x400-imae5fyxgh7qy6ag.jpeg', 'motorola-moto-turbo-xt1225-400x400-imae5fyxg8emex9a.jpeg', 4),
(22, 'Moto X (2nd Generation)(Black, 32 GB)', '3 MP Primary Camera 5.2 inch Touchscreen Android v4.4.4 OS 2.5 GHz Processor', 17199, 14, 'motorola-moto-turbo-xt1225-400x400-imae5fyxgh7qy6ag.jpeg', 'motorola-xt1092-400x400-imaefs86f3y4gs3s.jpeg', 'motorola-xt1092-400x400-imaefs86u8zhffbe.jpeg', 'motorola-moto-turbo-xt1225-400x400-imae5fyxgh7qy6ag.jpeg', 4),
(23, 'Lenovo VIBE P1m(Black, 16 GB)', '3900mAh Battery, OTG 5 inch HD IPS Display 2GB RAM | 16GB ROM 8MP | 5MP Camera', 6999, 14, 'lenovo-vibe-p1m-pa1g0035in-400x400-imaec3g2ghmtg4vz.jpeg', 'lenovo-vibe-p1m-p1ma40-400x400-imaefthsykxwtqpw.jpeg', 'lenovo-vibe-p1m-pa1g0035in-400x400-imaec3g2pjnhay8s.jpeg', 'lenovo-vibe-p1m-pa1g0035in-400x400-imaecb3whtetdhz4.jpeg', 6),
(24, 'Lenovo Vibe K5 Plus(Dark Grey, 16 GB)', '5 inch Full HD Display TheaterMax VR Support Dolby Atmos Speakers Qualcomm Snapdragon616', 8499, 16, 'lenovo-vibe-k5-plus-a6020a46-400x400-imaegu5zagahzghj.jpeg', 'lenovo-vibe-k5-plus-a6020a46-400x400-imaegu5zggaqdne5.jpeg', 'lenovo-vibe-k5-plus-a6020a46-400x400-imaegu5zvhtpg742.jpeg', 'lenovo-vibe-k5-plus-a6020a46-400x400-imaegu8zyj784hbf.jpeg', 6),
(25, 'Lenovo K3 Note(Black, 16 GB)', '5.5 inch FUll Display Camera: 13MP|5MP With Android M Update TheaterMax VR Suppor', 9999, 15, '', '', '', '', 6),
(26, 'Lenovo Vibe K5 Plus(Silver, 16 GB)', '5 inch Full HD Display TheaterMax VR Support Dolby Atmos Speakers Qualcomm Snapdragon616', 9999, 15, 'lenovo-vibe-k5-plus-a6020a46-400x400-imaegu5zh5mfrzgh.jpeg', 'lenovo-vibe-k5-plus-a6020a46-400x400-imaegu5zjrphdrcu.jpeg', 'lenovo-vibe-k5-plus-a6020a46-400x400-imaegu8zth5e3pds.jpeg', 'lenovo-vibe-k5-plus-a6020a46-400x400-imaegu8ze8hmexyu.jpeg', 6),
(27, 'Asus zenfone max', '5000 mAh Battery Works as a Power Bank Camera: 13 MP|5MP 5.5 inch HD display', 8999, 10, 'asus-zenfone-max-zc550kl-6a023in-400x400-imaeegudewju56a8.jpeg', 'asus-zenfone-max-zc550kl-6a072in-400x400-imaegrdph3gs6pvs.jpeg', 'asus-zenfone-max-zc550kl-6a072in-400x400-imaegsb7aacwchzz.jpeg', 'asus-zenfone-max-zc550kl-6a072in-400x400-imaegsb7hgkfbspu.jpeg', 7),
(28, 'ZenFone 7 Pro', 'ZenFone 7 Pro', 300000, 5, 'm1.png', 'm2.png', 'm3.png', 'm4.png', 7);

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
  `gender` varchar(10) NOT NULL,
  `country` varchar(10) NOT NULL,
  `state` varchar(10) NOT NULL,
  `city` varchar(10) NOT NULL,
  `zip_code` int(7) NOT NULL,
  `password` varchar(255) NOT NULL,
  `confirm_password` varchar(255) NOT NULL,
  `phone_no` varchar(10) NOT NULL,
  `status` int(1) NOT NULL,
  `token` varchar(255) NOT NULL,
  `verification` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_register`
--

INSERT INTO `tbl_register` (`cust_id`, `first_name`, `last_name`, `user_name`, `email_add`, `gender`, `country`, `state`, `city`, `zip_code`, `password`, `confirm_password`, `phone_no`, `status`, `token`, `verification`) VALUES
(19, 'DEEP', 'VASOYA', 'deep8678', 'deepvasoya103279@gmail.com', 'male', 'India', 'Gujarat', 'Upleta', 360490, '$2y$10$YdxS9Ikfm7skRjkUFuuDAuKvXsCxL16LTjmeN0.Z/opYq1.qgcTQu', '$2y$10$S/sfJo9yewz2Y4l9BIbep.LVLWXOS96dxxQ6SpdxhQ.vS.w49fsz2', '9106715543', 1, '69d677137fad29f6631de362bb31ca', 'done'),
(24, 'DEEP', 'VASOYA', 'deep2410', 'deep.vasoya103279@marwadiuniversity.ac.in', 'male', 'India', 'Gujarat', 'Upleta', 360490, '$2y$10$WHXlZhW03Sv79X4em5QpkOz5LKaU2y3Mtt/U.LeQUViiDqxVmZQ72', '$2y$10$4BogeZkbgUHWJBq3P5KhvesU8Z8dI.ebBHa.m6.g2qz8cpLAmiCaC', '9106715543', 1, 'a17c73184804b3a9820e8b169666f3', 'done');

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
-- Indexes for dumped tables
--

--
-- Indexes for table `adddeatails`
--
ALTER TABLE `adddeatails`
  ADD PRIMARY KEY (`aid`);

--
-- Indexes for table `address`
--
ALTER TABLE `address`
  ADD PRIMARY KEY (`a_id`);

--
-- Indexes for table `contact`
--
ALTER TABLE `contact`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `orderdetails`
--
ALTER TABLE `orderdetails`
  ADD PRIMARY KEY (`oid`);

--
-- Indexes for table `returnorder`
--
ALTER TABLE `returnorder`
  ADD PRIMARY KEY (`id`);

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
  ADD PRIMARY KEY (`id`);

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
  MODIFY `aid` int(5) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=93;

--
-- AUTO_INCREMENT for table `address`
--
ALTER TABLE `address`
  MODIFY `a_id` int(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `contact`
--
ALTER TABLE `contact`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT for table `orderdetails`
--
ALTER TABLE `orderdetails`
  MODIFY `oid` int(5) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=57;

--
-- AUTO_INCREMENT for table `returnorder`
--
ALTER TABLE `returnorder`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `tbl_admin`
--
ALTER TABLE `tbl_admin`
  MODIFY `admin_id` int(15) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `tbl_company`
--
ALTER TABLE `tbl_company`
  MODIFY `com_id` int(5) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `tbl_feedback`
--
ALTER TABLE `tbl_feedback`
  MODIFY `feed_id` int(5) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;

--
-- AUTO_INCREMENT for table `tbl_order`
--
ALTER TABLE `tbl_order`
  MODIFY `id` int(5) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=103;

--
-- AUTO_INCREMENT for table `tbl_product`
--
ALTER TABLE `tbl_product`
  MODIFY `prod_id` int(5) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=39;

--
-- AUTO_INCREMENT for table `tbl_register`
--
ALTER TABLE `tbl_register`
  MODIFY `cust_id` int(5) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=25;

--
-- AUTO_INCREMENT for table `tbl_status`
--
ALTER TABLE `tbl_status`
  MODIFY `stid` int(5) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
