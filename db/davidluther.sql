-- phpMyAdmin SQL Dump
-- version 4.7.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jan 24, 2019 at 12:17 PM
-- Server version: 10.1.25-MariaDB
-- PHP Version: 5.6.31

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `davidluther`
--

-- --------------------------------------------------------

--
-- Table structure for table `table 19`
--

CREATE TABLE `table 19` (
  `COL 1` int(3) DEFAULT NULL,
  `COL 2` int(3) DEFAULT NULL,
  `COL 3` int(2) DEFAULT NULL,
  `COL 4` int(1) DEFAULT NULL,
  `COL 5` int(1) DEFAULT NULL,
  `COL 6` int(1) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `table 19`
--

INSERT INTO `table 19` (`COL 1`, `COL 2`, `COL 3`, `COL 4`, `COL 5`, `COL 6`) VALUES
(1, 1, 9, 0, 0, 1),
(2, 2, 8, 0, 0, 1),
(3, 3, 7, 0, 0, 1),
(4, 4, 6, 0, 0, 1),
(5, 5, 9, 0, 0, 1),
(6, 6, 8, 0, 0, 1),
(7, 7, 7, 0, 0, 1),
(8, 8, 6, 0, 0, 1),
(9, 9, 9, 0, 0, 1),
(10, 10, 8, 0, 0, 1),
(11, 11, 6, 0, 0, 1),
(12, 12, 7, 0, 0, 1),
(13, 13, 10, 0, 0, 1),
(14, 14, 10, 0, 0, 1),
(15, 15, 10, 0, 0, 1),
(16, 16, 9, 0, 0, 1),
(17, 17, 8, 0, 0, 1),
(18, 18, 7, 0, 0, 1),
(19, 19, 6, 0, 0, 1),
(20, 20, 6, 0, 0, 1),
(21, 21, 6, 0, 0, 1),
(22, 22, 6, 0, 0, 1),
(23, 23, 6, 0, 0, 1),
(24, 24, 6, 0, 0, 1),
(25, 25, 6, 0, 0, 1),
(26, 26, 6, 0, 0, 1),
(27, 27, 6, 0, 0, 1),
(28, 28, 6, 0, 0, 1),
(29, 29, 6, 0, 0, 1),
(30, 30, 6, 0, 0, 1),
(31, 31, 6, 0, 0, 1),
(32, 32, 6, 0, 0, 1),
(33, 33, 6, 0, 0, 1),
(34, 34, 6, 0, 0, 1),
(35, 35, 6, 0, 0, 1),
(36, 36, 6, 0, 0, 1),
(37, 37, 6, 0, 0, 1),
(38, 38, 6, 0, 0, 1),
(39, 39, 6, 0, 0, 1),
(40, 40, 6, 0, 0, 1),
(41, 41, 6, 0, 0, 1),
(42, 42, 6, 0, 0, 1),
(43, 43, 6, 0, 0, 1),
(44, 44, 6, 0, 0, 1),
(45, 45, 6, 0, 0, 1),
(46, 46, 6, 0, 0, 1),
(47, 47, 6, 0, 0, 1),
(48, 48, 6, 0, 0, 1),
(49, 49, 6, 0, 0, 1),
(50, 50, 6, 0, 0, 1),
(51, 51, 6, 0, 0, 1),
(52, 52, 6, 0, 0, 1),
(53, 53, 6, 0, 0, 1),
(54, 54, 7, 0, 2, 1),
(55, 55, 8, 0, 1, 1),
(56, 56, 9, 0, 0, 1),
(57, 57, 6, 0, 0, 1),
(58, 58, 7, 0, 0, 1),
(59, 59, 8, 0, 0, 1),
(60, 60, 9, 0, 0, 1),
(61, 61, 6, 0, 0, 1),
(62, 62, 7, 0, 0, 1),
(63, 63, 8, 0, 0, 1),
(64, 64, 9, 0, 0, 1),
(65, 65, 6, 0, 0, 1),
(66, 66, 7, 0, 0, 1),
(67, 67, 8, 0, 0, 1),
(68, 68, 9, 0, 0, 1),
(69, 69, 6, 0, 0, 1),
(70, 70, 7, 0, 0, 1),
(71, 71, 8, 0, 0, 1),
(72, 72, 9, 0, 0, 1),
(73, 73, 6, 0, 0, 1),
(74, 74, 7, 0, 0, 1),
(75, 75, 8, 0, 0, 1),
(76, 76, 9, 0, 0, 1),
(77, 77, 6, 0, 0, 1),
(78, 78, 7, 0, 0, 1),
(79, 79, 8, 0, 0, 1),
(80, 80, 9, 0, 0, 1),
(81, 81, 6, 0, 0, 1),
(82, 82, 7, 0, 0, 1),
(83, 83, 8, 0, 0, 1),
(84, 84, 9, 0, 0, 1),
(85, 85, 6, 0, 0, 1),
(86, 86, 7, 0, 0, 1),
(87, 87, 8, 0, 0, 1),
(88, 88, 9, 0, 0, 1),
(89, 89, 6, 0, 0, 1),
(90, 90, 7, 0, 0, 1),
(91, 91, 8, 0, 0, 1),
(92, 92, 9, 0, 0, 1),
(93, 93, 6, 0, 0, 1),
(94, 94, 7, 0, 0, 1),
(95, 95, 8, 0, 0, 1),
(96, 96, 9, 0, 0, 1),
(97, 97, 6, 0, 0, 1),
(98, 98, 7, 0, 0, 1),
(99, 99, 8, 0, 0, 1),
(100, 100, 9, 0, 0, 1),
(101, 101, 6, 0, 0, 1),
(102, 102, 7, 0, 0, 1),
(103, 103, 8, 0, 0, 1),
(104, 104, 9, 0, 0, 1);

-- --------------------------------------------------------

--
-- Table structure for table `tbl_category`
--

CREATE TABLE `tbl_category` (
  `category_id` int(11) NOT NULL,
  `category_name` varchar(255) NOT NULL,
  `category_description` text NOT NULL,
  `category_status` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_category`
--

INSERT INTO `tbl_category` (`category_id`, `category_name`, `category_description`, `category_status`) VALUES
(1, 'QWERTY', 'asdfghjklpoiuyt', 0),
(2, 'QWERTY ASDFGHJ', 'cvbgcvbvcb', 0),
(3, 'JEANS', 'POIUYTREWQASDFGHJKLMNBVCXZ', 0),
(4, 'SHIRTS', 'NUMJIBVGTVFRCDESABULMX', 0),
(5, 'CHURIDHAR', 'NBDHDBCYGDBBEWE DUWHDE', 0),
(6, 'LATCHE', 'SA SBHDDDU B', 0),
(7, 'SHIRT', 'Mens Wear', 1),
(8, 'PANT/CHINO', 'Mens Wear', 1),
(9, 'JEANS/DENIM', 'Mens Wear', 1),
(10, 'SHORTS', 'Mens Wear', 1),
(11, 'BOXER', 'Mens Wear', 1),
(12, 'T-SHIRT', 'Mens Wear', 1),
(13, 'SARI', 'Ladies Wear', 1),
(14, 'CHURIDAR/SET', 'Ladies Wear', 1),
(15, 'TOP', 'Ladies Wear', 1),
(16, 'LEGGINGS', 'Ladies Wear', 1),
(17, 'Shirt-Kids', 'Boys Wear', 1),
(18, 'Jeans-Kids', 'Boys Wear', 1),
(19, 'Pants-Kids', 'Boys Wear', 1),
(20, 'Shorts-Kids', 'Boys Wear', 1),
(21, 'Top-Kids', 'Girls Wear', 1),
(22, 'Frock-Kids', 'Girls Wear', 1),
(23, 'Leggings-Kids', 'Girls Wear', 1),
(24, 'Baby Rompers', 'New Born', 1),
(25, 'Baby Rompers', 'New Born', 0),
(26, 'Baby Rompers', 'New Born', 0),
(27, 'Baby Rompers', 'New Born', 0),
(28, 'Baby Frock', 'New Born', 1),
(29, 'Baby Top', 'New Born', 1),
(30, 'Baby Bottom', 'New Born', 1),
(31, 'Baby Joppin Hood', 'New Born', 1),
(32, 'Baby Bed', 'New Born', 1);

-- --------------------------------------------------------

--
-- Table structure for table `tbl_color`
--

CREATE TABLE `tbl_color` (
  `color_id` int(11) NOT NULL,
  `color_name` varchar(30) NOT NULL,
  `color_description` varchar(50) NOT NULL,
  `color_status` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_color`
--

INSERT INTO `tbl_color` (`color_id`, `color_name`, `color_description`, `color_status`) VALUES
(1, 'BLUE', 'sdgfsdgfs', 0),
(2, 'RED', 'qwerty', 0),
(3, 'GREEN', 'DFGGDFVB', 0),
(4, 'PINK', 'DFDFHFDH', 0),
(5, 'Red', 'Plain', 1),
(6, 'Orange', 'Plain', 1),
(7, 'Green', 'Plain', 1),
(8, 'Blue', 'Royal', 1),
(9, 'Blue', 'Navy', 1),
(10, 'Olive', 'Green', 1),
(11, 'Maroon', 'Plain', 1),
(12, 'Silver', 'Metallic', 1),
(13, 'Indigo', 'Plain', 1),
(14, 'Violet', 'Plain', 1),
(15, 'Pink', 'Plain', 1),
(16, 'Black', 'Plain', 1),
(17, 'White', 'Plain', 1),
(18, 'Safron', 'Plain', 1),
(19, 'Kaki', 'Dark', 1),
(20, 'Kaki', 'Light', 1),
(21, 'Ash', 'Plain', 1),
(22, 'Print', 'White round dots on Blue', 0),
(23, 'White', 'White Check on Blue', 0),
(24, 'Print', 'Black Print on white', 0),
(25, 'Print', 'Small Arrow on Meroun', 0),
(26, 'Print', 'Shining dot on cream', 0),
(27, 'Print', 'Shining dot on metallic grey', 0),
(28, 'Print', 'Square design on metallic grey', 0),
(29, 'Print', 'Doby dot on Meroun', 0),
(30, 'Print', 'Shining dot on Navy Blue', 0),
(31, 'Chambray', 'Metallic Grey', 1),
(32, 'Print', 'Black dot on reddish Meroun', 0),
(33, 'Stripe', 'Meroun stripe on Blue', 0),
(34, 'Print', 'Blue dots on Dark shining Meroun', 0),
(35, 'Cream', 'Plain', 1),
(36, 'Stripe', 'Various', 1),
(37, 'Print', 'Black thread on Royal Blue', 0),
(38, 'Print', 'White micro check on Lavender', 0),
(39, 'Doby', 'Various', 1),
(40, 'Print', 'Various', 1),
(41, 'Chambray', 'Chambray', 1),
(42, 'Multiple', 'Various', 1),
(43, 'Check', 'Various', 1),
(44, 'Grey', 'Metallic', 1),
(45, 'Lavender', 'Plain', 1),
(46, 'Yellow', 'Plain', 1),
(47, 'Chocolate', 'Plain', 1),
(48, 'Brown', 'Plain', 1),
(49, 'Golden', 'Plain', 1),
(50, 'Bronze', 'Plain', 1),
(51, 'Coffee', 'Plain', 1),
(52, 'Majenda', 'Plain', 1);

-- --------------------------------------------------------

--
-- Table structure for table `tbl_customer`
--

CREATE TABLE `tbl_customer` (
  `cust_id` int(11) NOT NULL,
  `customertype` varchar(50) NOT NULL,
  `custname` varchar(50) NOT NULL,
  `custaddress` text NOT NULL,
  `custphone` bigint(20) NOT NULL,
  `custemail` varchar(50) NOT NULL,
  `customerdob` date NOT NULL,
  `custpan` varchar(100) NOT NULL,
  `custgst` varchar(100) NOT NULL,
  `custstatus` int(11) NOT NULL,
  `weddingdate` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_customer`
--

INSERT INTO `tbl_customer` (`cust_id`, `customertype`, `custname`, `custaddress`, `custphone`, `custemail`, `customerdob`, `custpan`, `custgst`, `custstatus`, `weddingdate`) VALUES
(1, 'retail', 'M/s ASIANET SATELLITE COMMUNICATIONS LTD', '     2ND FLOOR,LEELA INFOPARK,KAZHAKUTTAM,TRIVANDRUM   ', 9895623015, 'asianetsatellite@gmail.com', '2000-11-27', 'AAECA5548E', '32AAECA5548E1ZO', 1, '0000-00-00'),
(2, 'retail', 'M/s THIRUKOCHI FINANCIAL CONSULTANTS PVT.LTD', '    2ND FLOOR,CHAMMANY ROAD,NEAR PF OFFICE,KALOOR,COCHIN-6821111  ', 1236547890, 'poiuy@gmail.com', '1989-03-31', 'AADCT6642H', '32AADCT6642H1ZF', 1, '0000-00-00'),
(3, 'retail', 'M/s LOTUS VISION RESEARCH TRUST', '    28/2964A,A1,A4,A5,A6,NETHAJI ROAD,CHERUPARAMBATH,KADAVANTHARA,COCHIN - 682020  ', 9564854916, 'lotus@gmail.com', '0000-00-00', 'AAATL1354L', '32AAATL1354L1ZR', 1, '0000-00-00'),
(4, 'retail', 'M/s ADCORRE MEDIAS PVT. LTD', '    39/2360 BRIGADE PLAZA, OPP LOTUS CLUB,WARRIOM ROAD,COCHIN -682016  ', 3698521470, 'dersni@gmail.com', '1992-12-29', 'AALCA0571C', '32AALCA0571C1Z8', 1, '0000-00-00'),
(5, 'retail', 'M/s AAN MEGA MEDIA ', '      1ST FLOOR,41/228(OLD NO.66/396), SHANTHI BUILDING,MAHKAVI BHARATIYAR ROAD,ERNAKULAM - 682035    ', 7412589630, 'qwerty@gmail.com', '1990-12-28', 'AHFPA5964K', '32AHFPA5964K2ZC', 1, '0000-00-00'),
(6, 'retail', 'INFORMATION AND PUBLIC RELATIONS DEPARTMENT', '  THE DIRECTOR,INFORMATION AND PUBLIC RELATIONS DEPARTMENT,GOVERNMENT OF KERALA,SECRETARIATE,TRIVANDRUM    ', 90485612365, 'dersni@gmail.com', '1981-12-04', 'AABCO1875H', 'QWERTYU78451263', 1, '0000-00-00'),
(7, 'retail', 'M/s ORIENTAL METALS INDIA PRIVATE LIMITED', 'UNITY COMPLEX, MARKET ROAD,ERNAKULAM -682035  ', 12365478963, 'crfbyn@gmail.com', '1989-08-30', 'AABCO1875H', '32AABCO1875H1ZL', 1, '0000-00-00'),
(8, 'retail', 'M/s LIFE INSURANCE CORPORATION OF INDIA', '    M.G ROAD,ERNAKULAM  ', 7845129635, 'xcvbn@gmail.com', '1988-11-30', 'AAACL0582H', '32AAACL0582H1ZV', 1, '0000-00-00'),
(9, 'retail', 'M/s THEYYAMPATTIL FURNITURE', '       NH-47,OPP.KIMS HOSPITAL,COCHIN- 682033     ', 4844855611, 'poiuy@gmail.com', '1990-05-15', 'AAGFT3159F', '32AAGFT3159F1ZC', 1, '0000-00-00'),
(10, 'retail', 'M/s SMART VIEW', '     MANGALATH HOUSE,MAMBRA ROAD,CHALIKAVATTOM,VENNALA P.O,PIN- 682028   ', 8111935666, 'qwerty@gmail.com', '1988-11-20', 'AIVPN4264E', '32AIVPN4264E1Z3', 1, '0000-00-00'),
(11, 'whole', 'uiouio', '   uiouiouio ', 0, 'uiouiouio', '0000-00-00', 'uiouio', 'uiouiouio', 0, '0000-00-00'),
(12, 'retail', 'Saji John', '114-D, DD Misty Hills, Millumpadi, Navodaya, Thengode P.O, Kakkanad', 9400034911, 'sajijohn4444@gmail.com', '1989-09-26', 'WX112UKVINPS113', 'SSBBGG', 1, '2019-01-15'),
(13, 'retail', 'abdcdd', '  xvnnddoos', 9895544740, 'jencysaji61@gmail.com', '1989-10-01', '', '', 1, '2018-11-28');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_designation`
--

CREATE TABLE `tbl_designation` (
  `d_id` int(11) NOT NULL,
  `designation` varchar(50) DEFAULT NULL,
  `description` varchar(50) DEFAULT NULL,
  `d_status` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_designation`
--

INSERT INTO `tbl_designation` (`d_id`, `designation`, `description`, `d_status`) VALUES
(1, 'asas', 'fafasasas', 1),
(2, 'rwewr', 'ewrwerwe', 1),
(3, 'rwerwerwerwer', 'gjkghdhdfh', 1);

-- --------------------------------------------------------

--
-- Table structure for table `tbl_expense`
--

CREATE TABLE `tbl_expense` (
  `exp_id` int(11) NOT NULL,
  `shop_id_fk` int(11) NOT NULL,
  `login_id_fk` int(11) NOT NULL,
  `exp_date` date NOT NULL,
  `exp_name` varchar(50) NOT NULL,
  `exp_amount` double NOT NULL,
  `exp_description` text NOT NULL,
  `finyear` varchar(50) NOT NULL,
  `exp_status` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_expense`
--

INSERT INTO `tbl_expense` (`exp_id`, `shop_id_fk`, `login_id_fk`, `exp_date`, `exp_name`, `exp_amount`, `exp_description`, `finyear`, `exp_status`) VALUES
(1, 0, 1, '2018-12-01', 'fgfdgfdg', 50, 'sdfsdfdsfsdfdsf', '2019-2020', 1),
(2, 0, 1, '2018-12-01', 'adasdsad', 50, 'asdsdsad', '2019-2020', 1);

-- --------------------------------------------------------

--
-- Table structure for table `tbl_finyear`
--

CREATE TABLE `tbl_finyear` (
  `finyear_id` int(11) NOT NULL,
  `fin_year` varchar(50) NOT NULL,
  `fin_startdate` varchar(50) NOT NULL,
  `fin_enddate` varchar(50) NOT NULL,
  `fin_status` int(11) NOT NULL,
  `status` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_finyear`
--

INSERT INTO `tbl_finyear` (`finyear_id`, `fin_year`, `fin_startdate`, `fin_enddate`, `fin_status`, `status`) VALUES
(1, '2019-2020', '2018-11-15', '2018-11-16', 1, 0),
(2, '2019-2020', '2018-11-14', '2018-11-17', 0, 0),
(3, '2020-2021', '2020-02-06', '2020-04-10', 0, 0),
(4, '2014-2015', '2014-04-01', '2015-03-31', 0, 1),
(5, '2015-2016', '2015-04-01', '2016-03-31', 0, 1),
(6, '2016-2017', '2016-04-01', '2017-03-31', 0, 1),
(7, '2017-2018', '2017-04-01', '2018-03-31', 0, 1),
(8, '2018-2019', '2018-04-01', '2019-04-01', 0, 0),
(9, '2018-2019', '2018-04-01', '2019-03-31', 0, 0),
(10, '2018-2019', '2018-04-01', '2019-03-31', 0, 0),
(11, '2018-2019', '2018-04-01', '2019-03-31', 0, 1);

-- --------------------------------------------------------

--
-- Table structure for table `tbl_log`
--

CREATE TABLE `tbl_log` (
  `log_id` int(11) NOT NULL,
  `log_id_fk` int(11) NOT NULL,
  `product_id_fk` int(11) NOT NULL,
  `shop_from` int(11) NOT NULL,
  `shop_to` int(11) NOT NULL,
  `quantity` int(11) NOT NULL,
  `date_time` date NOT NULL,
  `log_status` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_log`
--

INSERT INTO `tbl_log` (`log_id`, `log_id_fk`, `product_id_fk`, `shop_from`, `shop_to`, `quantity`, `date_time`, `log_status`) VALUES
(1, 0, 53, 6, 5, 1, '2019-01-02', 1),
(2, 0, 53, 5, 6, 1, '2018-12-05', 1),
(3, 0, 53, 6, 5, 1, '2019-01-02', 1),
(4, 0, 53, 6, 5, 1, '2019-01-02', 1),
(5, 0, 53, 6, 5, 1, '2019-01-02', 1),
(6, 0, 53, 6, 5, 1, '2019-01-02', 1),
(7, 0, 54, 6, 5, 1, '2019-01-02', 1),
(8, 0, 54, 5, 6, 1, '2019-01-03', 1),
(9, 0, 53, 6, 5, 1, '2019-01-02', 1),
(10, 0, 53, 6, 5, 1, '2019-01-05', 1),
(11, 0, 54, 6, 5, 1, '2019-01-05', 1),
(12, 0, 55, 6, 5, 1, '2019-01-05', 1),
(13, 0, 56, 6, 5, 1, '2019-01-05', 1),
(14, 0, 53, 6, 5, 1, '2019-01-03', 1),
(15, 0, 54, 6, 5, 1, '2019-01-03', 1),
(16, 0, 55, 6, 5, 1, '2019-01-03', 1),
(17, 0, 56, 6, 5, 1, '2019-01-03', 1),
(18, 0, 53, 6, 5, 1, '2018-12-01', 1),
(19, 0, 54, 6, 5, 1, '2018-12-13', 1),
(20, 0, 54, 6, 5, 1, '2018-12-13', 1),
(21, 0, 54, 6, 5, 1, '2018-12-01', 1),
(22, 0, 55, 6, 5, 1, '2018-12-01', 1),
(23, 0, 54, 6, 5, 1, '2018-12-01', 1),
(24, 0, 54, 6, 5, 1, '2018-12-06', 1),
(25, 0, 54, 5, 6, 1, '2019-01-08', 1);

-- --------------------------------------------------------

--
-- Table structure for table `tbl_login`
--

CREATE TABLE `tbl_login` (
  `id` int(11) NOT NULL,
  `user_name` varchar(50) NOT NULL,
  `email` varchar(50) NOT NULL,
  `password` varchar(50) NOT NULL,
  `user_type` varchar(5) NOT NULL,
  `created_date` datetime NOT NULL,
  `updated_date` datetime NOT NULL,
  `status` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_login`
--

INSERT INTO `tbl_login` (`id`, `user_name`, `email`, `password`, `user_type`, `created_date`, `updated_date`, `status`) VALUES
(1, 'admin', 'ajith9696race@gmail.com', 'admin@321', 'A', '2017-12-01 12:42:44', '2017-12-21 12:28:22', 1),
(2, 'asdfg', 'fg@gmail.com', '567', 'S', '2018-11-20 12:35:11', '2018-11-20 12:35:11', 1),
(3, 'info@wahylab.com', 'holidaystwilightindia@gmail.com', '877', 'S', '2018-11-20 12:58:11', '2018-11-20 12:58:11', 1),
(4, 'sanilent@rediffmail.com', 'fg@gmail.com', '232', 'S', '2018-11-20 01:00:11', '2018-11-20 01:00:11', 1),
(5, 'anju', 'user03.wahylab@gmail.com', 'anju@321', 'S', '2018-12-20 10:41:12', '2018-12-20 10:41:12', 1);

-- --------------------------------------------------------

--
-- Table structure for table `tbl_masterstock`
--

CREATE TABLE `tbl_masterstock` (
  `master_stockid` int(11) NOT NULL,
  `product_id_fk` int(11) NOT NULL,
  `size_id_fk` int(11) NOT NULL,
  `finyear` varchar(30) NOT NULL,
  `master_stock` bigint(50) NOT NULL,
  `masterstatus` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_masterstock`
--

INSERT INTO `tbl_masterstock` (`master_stockid`, `product_id_fk`, `size_id_fk`, `finyear`, `master_stock`, `masterstatus`) VALUES
(1, 1, 9, '0', 0, 1),
(2, 2, 8, '0', 0, 1),
(3, 3, 7, '0', 0, 1),
(4, 4, 6, '0', 0, 1),
(5, 5, 9, '0', 0, 1),
(6, 6, 8, '0', 0, 1),
(7, 7, 7, '0', 0, 1),
(8, 8, 6, '0', 0, 1),
(9, 9, 9, '0', 0, 1),
(10, 10, 8, '0', 0, 1),
(11, 11, 6, '0', 0, 1),
(12, 12, 7, '0', 0, 1),
(13, 13, 10, '0', 0, 1),
(14, 14, 10, '0', 0, 1),
(15, 15, 10, '0', 0, 1),
(16, 16, 9, '0', 0, 1),
(17, 17, 8, '0', 0, 1),
(18, 18, 7, '0', 0, 1),
(19, 19, 6, '0', 0, 1),
(20, 20, 6, '0', 0, 1),
(21, 21, 6, '0', 0, 1),
(22, 22, 6, '0', 0, 1),
(23, 23, 6, '0', 0, 1),
(24, 24, 6, '0', 0, 1),
(25, 25, 6, '0', 0, 1),
(26, 26, 6, '0', 0, 1),
(27, 27, 6, '0', 0, 1),
(28, 28, 6, '0', 0, 1),
(29, 29, 6, '0', 0, 1),
(30, 30, 6, '0', 0, 1),
(31, 31, 6, '0', 0, 1),
(32, 32, 6, '0', 0, 1),
(33, 33, 6, '0', 0, 1),
(34, 34, 6, '0', 0, 1),
(35, 35, 6, '0', 0, 1),
(36, 36, 6, '0', 0, 1),
(37, 37, 6, '0', 0, 1),
(38, 38, 6, '0', 0, 1),
(39, 39, 6, '0', 0, 1),
(40, 40, 6, '0', 0, 1),
(41, 41, 6, '0', 0, 1),
(42, 42, 6, '0', 0, 1),
(43, 43, 6, '0', 0, 1),
(44, 44, 6, '0', 0, 1),
(45, 45, 6, '0', 0, 1),
(46, 46, 6, '0', 0, 1),
(47, 47, 6, '0', 0, 1),
(48, 48, 6, '0', 0, 1),
(49, 49, 6, '0', 0, 1),
(50, 50, 6, '0', 0, 1),
(51, 51, 6, '0', 0, 1),
(52, 52, 6, '0', 0, 1),
(53, 53, 6, '0', 0, 1),
(54, 54, 7, '0', 2, 1),
(55, 55, 8, '0', 1, 1),
(56, 56, 9, '0', 0, 1),
(57, 57, 6, '0', 0, 1),
(58, 58, 7, '0', 0, 1),
(59, 59, 8, '0', 0, 1),
(60, 60, 9, '0', 0, 1),
(61, 61, 6, '0', 0, 1),
(62, 62, 7, '0', 0, 1),
(63, 63, 8, '0', 0, 1),
(64, 64, 9, '0', 0, 1),
(65, 65, 9, '0', 0, 1),
(66, 66, 6, '0', 0, 1),
(67, 67, 7, '0', 0, 1),
(68, 68, 8, '0', 0, 1),
(69, 69, 9, '0', 0, 1),
(70, 70, 6, '0', 0, 1),
(71, 71, 7, '0', 0, 1),
(72, 72, 8, '0', 0, 1),
(73, 73, 6, '0', 0, 1),
(74, 74, 7, '0', 0, 1),
(75, 75, 8, '0', 0, 1),
(76, 76, 9, '0', 0, 1),
(77, 77, 6, '0', 0, 1),
(78, 78, 7, '0', 0, 1),
(79, 79, 8, '0', 0, 1),
(80, 80, 9, '0', 0, 1),
(81, 81, 6, '0', 0, 1),
(82, 82, 7, '0', 0, 1),
(83, 83, 8, '0', 0, 1),
(84, 84, 9, '0', 0, 1),
(85, 85, 6, '0', 0, 1),
(86, 86, 7, '0', 0, 1),
(87, 87, 8, '0', 0, 1),
(88, 88, 9, '0', 0, 1),
(89, 89, 6, '0', 0, 1),
(90, 90, 7, '0', 0, 1),
(91, 91, 8, '0', 0, 1),
(92, 92, 9, '0', 0, 1),
(93, 93, 6, '0', 0, 1),
(94, 94, 7, '0', 0, 1),
(95, 95, 8, '0', 0, 1),
(96, 96, 9, '0', 0, 1),
(97, 97, 6, '0', 0, 1),
(98, 98, 7, '0', 0, 1),
(99, 99, 8, '0', 0, 1),
(100, 100, 9, '0', 0, 1);

-- --------------------------------------------------------

--
-- Table structure for table `tbl_openstock`
--

CREATE TABLE `tbl_openstock` (
  `open_id` int(11) NOT NULL,
  `shop_id_fk` int(11) NOT NULL,
  `product_id_fk` int(11) NOT NULL,
  `current_stock` int(11) NOT NULL,
  `finyear_id_fk` int(11) NOT NULL,
  `purchase_id_fk` int(11) NOT NULL,
  `log_id_fk` int(11) NOT NULL,
  `date` datetime NOT NULL,
  `status` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `tbl_product`
--

CREATE TABLE `tbl_product` (
  `product_id` int(11) NOT NULL,
  `category_id_fk` int(11) NOT NULL,
  `product_num` varchar(50) NOT NULL,
  `product_cmpny` varchar(50) NOT NULL,
  `product_hsn` varchar(50) NOT NULL,
  `product_name` varchar(255) NOT NULL,
  `product_brand` varchar(255) NOT NULL,
  `product_size` varchar(50) NOT NULL,
  `product_fit` varchar(50) NOT NULL,
  `product_color` varchar(250) NOT NULL,
  `product_sl` varchar(250) NOT NULL,
  `product_description` text NOT NULL,
  `product_status` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_product`
--

INSERT INTO `tbl_product` (`product_id`, `category_id_fk`, `product_num`, `product_cmpny`, `product_hsn`, `product_name`, `product_brand`, `product_size`, `product_fit`, `product_color`, `product_sl`, `product_description`, `product_status`) VALUES
(1, 7, 'DL-A-175', 'David Luther', '60', 'Shirt/Men', 'Collar/Cutaway', '9', 'Slim', '8', 'Full', 'Mens Wear', 1),
(2, 7, 'DL-A-175', 'David Luther', '60', 'Shirt/Men', 'Collar/Cutaway', '8', 'Slim', '8', 'Long', 'Mens Wear', 1),
(3, 7, 'DL-A-175', 'David Luther', '60', 'Shirt/Men', 'Collar/Cutaway', '7', 'Slim', '8', 'Long', 'Mens Wear', 1),
(4, 7, 'DL-A-175', 'David Luther', '60', 'Shirt/Men', 'Collar/Cutaway', '6', 'Slim', '8', 'Long', 'Mens Wear', 1),
(5, 7, 'DL-A-176', 'David Luther', '60', 'Shirt/Men', 'Collar/Cutaway', '9', 'Slim', '17', 'Long', 'Mens Wear', 1),
(6, 7, 'DL-A-176', 'David Luther', '60', 'Shirt/Men', 'Collar/Cutaway', '8', 'Slim', '17', 'Long', 'Mens Wear', 1),
(7, 7, 'DL-A-176', 'David Luther', '60', 'Shirt/Men', 'Collar/Cutaway', '7', 'Slim', '17', 'Long', 'Mens Wear', 1),
(8, 7, 'DL-A-176', 'David Luther', '60', 'Shirt/Men', 'Collar/Cutaway', '6', 'Slim', '17', 'Long', 'Mens Wear', 1),
(9, 7, 'DL-A-177', 'David Luther', '60', 'Shirt/Men', 'Collar/Cutaway', '9', 'Slim', '19', 'Long', 'Mens Wear', 1),
(10, 7, 'DL-A-177', 'David Luther', '60', 'Shirt/Men', 'Collar/Cutaway', '8', 'Slim', '19', 'Long', 'Mens Wear', 1),
(11, 7, 'DL-A-177', 'David Luther', '60', 'Shirt/Men', 'Collar/Cutaway', '6', 'Slim', '19', 'Long', 'Mens Wear', 1),
(12, 7, 'DL-A-177', 'David Luther', '60', 'Shirt/Men', 'Collar/Cutaway', '7', 'Slim', '19', 'Long', 'Mens Wear', 1),
(13, 7, 'DL-A-175', 'David Luther', '60', 'Shirt/Men', 'Collar/Cutaway', '10', 'Slim', '8', 'Long', 'Mens Wear', 1),
(14, 7, 'DL-A-176', 'David Luther', '60', 'Shirt/Men', 'Collar/Cutaway', '10', 'Slim', '17', 'Long', 'Mens Wear', 1),
(15, 7, 'DL-A-178', 'David Luther', '60', 'Shirt/Men', 'Collar/Cutaway', '10', 'Slim', '11', 'Long', 'Mens Wear', 1),
(16, 7, 'DL-A-178', 'David Luther', '60', 'Shirt/Men', 'Collar/Cutaway', '9', 'Slim', '11', 'Long', 'Mens Wear', 1),
(17, 7, 'DL-A-178', 'David Luther', '60', 'Shirt/Men', 'Collar/Cutaway', '8', 'Slim', '11', 'Long', 'Mens Wear', 1),
(18, 7, 'DL-A-178', 'David Luther', '60', 'Shirt/Men', 'Collar/Cutaway', '7', 'Slim', '11', 'Long', 'Mens Wear', 1),
(19, 7, 'DL-A-178', 'David Luther', '60', 'Shirt/Men', 'Collar/Cutaway', '6', 'Slim', '11', 'Long', 'Mens Wear', 1),
(20, 7, 'DL-A-179', 'David Luther', '60', 'Shirt/Men', 'Collar/Cutaway', '6', 'Slim', '40', 'Long', 'Mens Wear', 1),
(21, 7, 'DL-A-180', 'David Luther', '60', 'Shirt/Men', 'Collar/Cutaway', '6', 'Slim', '14', 'Long', 'Mens Wear', 1),
(22, 7, 'DL-A-181', 'David Luther', '60', 'Shirt/Men', 'Collar/Cutaway', '6', 'Slim', '44', 'Long', 'Mens Wear', 1),
(23, 7, 'DL-A-182', 'David Luther', '60', 'Shirt/Men', 'Collar/Cutaway', '6', 'Slim', '44', 'Long', 'Mens Wear', 1),
(24, 7, 'DL-A-183', 'David Luther', '60', 'Shirt/Men', 'Collar/Cutaway', '6', 'Slim', '11', 'Long', 'Mens Wear', 1),
(25, 7, 'DL-A-184', 'David Luther', '60', 'Shirt/Men', 'Collar/Cutaway', '6', 'Slim', '8', 'Long', 'Mens Wear', 1),
(26, 7, 'DL-A-185', 'David Luther', '60', 'Shirt/Men', 'Collar/Cutaway', '6', 'Slim', '31', 'Long', 'Mens Wear', 1),
(27, 7, 'DL-A-186', 'David Luther', '60', 'Shirt/Men', 'Collar/Cutaway', '6', 'Slim', '11', 'Long', 'Mens Wear', 1),
(28, 7, 'DL-A-187', 'David Luther', '60', 'Shirt/Men', 'Collar/Cutaway', '6', 'Slim', '8', 'Long', 'Mens Wear', 1),
(29, 7, 'DL-A-188', 'David Luther', '60', 'Shirt/Men', 'Collar/Cutaway', '6', 'Slim', '11', 'Long', 'Mens Wear', 1),
(30, 7, 'DL-A-189', 'David Luther', '60', 'Shirt/Men', 'Collar/Cutaway', '6', 'Slim', '35', 'Long', 'Mens Wear', 1),
(31, 7, 'DL-A-190', 'David Luther', '60', 'Shirt/Men', 'Collar/Cutaway', '6', 'Slim', '8', 'Long', 'Mens Wear', 1),
(32, 7, 'DL-A-191', 'David Luther', '60', 'Shirt/Men', 'Collar/Cutaway', '6', 'Slim', '36', 'Long', 'Mens Wear', 1),
(33, 7, 'DL-A-192', 'David Luther', '60', 'Shirt/Men', 'Collar/Cutaway', '6', 'Slim', '17', 'Long', 'Mens Wear', 1),
(34, 7, 'DL-A-193', 'David Luther', '60', 'Shirt/Men', 'Collar/Cutaway', '6', 'Slim', '8', 'Long', 'Mens Wear', 1),
(35, 7, 'DL-A-194', 'David Luther', '60', 'Shirt/Men', 'Collar/Cutaway', '6', 'Slim', '45', 'Long', 'Mens Wear', 1),
(36, 7, 'DL-A-195', 'David Luther', '60', 'Shirt/Men', 'Collar/Cutaway', '6', 'Slim', '14', 'Long', 'Mens Wear', 1),
(37, 7, 'DL-A-196', 'David Luther', '60', 'Shirt/Men', 'Collar/Cutaway', '6', 'Slim', '14', 'Long', 'Mens Wear', 1),
(38, 7, 'DL-A-197', 'David Luther', '60', 'Shirt/Men', 'Collar/Cutaway', '6', 'Slim', '11', 'Long', 'Mens Wear', 1),
(39, 7, 'DL-A-198', 'David Luther', '60', 'Shirt/Men', 'Collar/Cutaway', '6', 'Slim', '18', 'Short', 'Mens Wear', 1),
(40, 7, 'DL-A-199', 'David Luther', '60', 'Shirt/Men', 'Collar/Cutaway', '6', 'Slim', '46', 'Short', 'Mens Wear', 1),
(41, 7, 'DL-A-200', 'David Luther', '60', 'Shirt/Men', 'Collar/Cutaway', '6', 'Slim', '19', 'Short', 'Mens Wear', 1),
(42, 7, 'DL-A-201', 'David Luther', '60', 'Shirt/Men', 'Collar/Cutaway', '6', 'Slim', '21', 'Short', 'Mens Wear', 1),
(43, 7, 'DL-A-202', 'David Luther', '60', 'Shirt/Men', 'Collar/Cutaway', '6', 'Slim', '35', 'Short', 'Mens Wear', 1),
(44, 7, 'DL-A-203', 'David Luther', '60', 'Shirt/Men', 'Collar/Cutaway', '6', 'Slim', '15', 'Long', 'Mens Wear', 1),
(45, 7, 'DL-A-204', 'David Luther', '60', 'Shirt/Men', 'Collar/Cutaway', '6', 'Slim', '8', 'Full', 'Mens Wear', 1),
(46, 7, 'DL-A-204', 'TOM SMITH', '60', 'Shirt/Men', 'Collar/Cutaway', '6', 'Slim', '8', 'Short', 'Mens Wear', 1),
(47, 7, 'DL-A-205', 'David Luther', '60', 'Shirt/Men', 'Collar/Cutaway', '6', 'Slim', '40', 'Long', 'Mens Wear', 1),
(48, 7, 'DL-A-206', 'David Luther', '60', 'Shirt/Men', 'Collar/Cutaway', '6', 'Slim', '40', 'Long', 'Mens Wear', 1),
(49, 7, 'DL-A-207', 'David Luther', '60', 'Shirt/Men', 'Collar/Cutaway', '6', 'Slim', '40', 'Long', 'Mens Wear', 1),
(50, 7, 'DL-A-208', 'David Luther', '60', 'Shirt/Men', 'Collar/Cutaway', '6', 'Slim', '40', 'Long', 'Mens Wear', 1),
(51, 7, 'DL-A-209', 'David Luther', '60', 'Shirt/Men', 'Collar/Cutaway', '6', 'Slim', '40', 'Long', 'Mens Wear', 1),
(52, 7, 'DL-A-210', 'David Luther', '60', 'Shirt/Men', 'Collar/Cutaway', '6', 'Slim', '40', 'Long', 'Mens Wear', 1),
(53, 7, 'DL-A-174', 'David Luther', '60', 'Shirt/Men', 'Pointed Collar', '6', 'Slim', '17', 'Long', 'Mens Wear', 1),
(54, 7, 'DL-A-174', 'David Luther', '60', 'Shirt/Men', 'Pointed Collar', '7', 'Slim', '17', 'Long', 'Mens Wear', 1),
(55, 7, 'DL-A-174', 'David Luther', '60', 'Shirt/Men', 'Pointed Collar', '8', 'Slim', '17', 'Long', 'Mens Wear', 1),
(56, 7, 'DL-A-174', 'David Luther', '60', 'Shirt/Men', 'Pointed Collar', '9', 'Slim', '17', 'Long', 'Mens Wear', 1),
(57, 7, 'DL-A-173', 'David Luther', '60', 'Shirt/Men', 'Pointed Collar', '6', 'Slim', '47', 'Long', 'Mens Wear', 1),
(58, 7, 'DL-A-173', 'David Luther', '60', 'Shirt/Men', 'Pointed Collar', '7', 'Slim', '47', 'Long', 'Mens Wear', 1),
(59, 7, 'DL-A-173', 'David Luther', '60', 'Shirt/Men', 'Pointed Collar', '8', 'Slim', '47', 'Long', 'Mens Wear', 1),
(60, 7, 'DL-A-173', 'David Luther', '60', 'Shirt/Men', 'Pointed Collar', '9', 'Slim', '47', 'Long', 'Mens Wear', 1),
(61, 7, 'DL-A-172', 'David Luther', '60', 'Shirt/Men', 'Pointed Collar', '6', 'Slim', '10', 'Long', 'Mens Wear', 1),
(62, 7, 'DL-A-172', 'David Luther', '60', 'Shirt/Men', 'Pointed Collar', '7', 'Slim', '10', 'Long', 'Mens Wear', 1),
(63, 7, 'DL-A-172', 'David Luther', '60', 'Shirt/Men', 'Pointed Collar', '8', 'Slim', '10', 'Long', 'Mens Wear', 1),
(64, 7, 'DL-A-172', 'David Luther', '60', 'Shirt/Men', 'Pointed Collar', '9', 'Slim', '10', 'Long', 'Mens Wear', 1),
(65, 7, 'DL-A-171', 'David Luther', '60', 'Shirt/Men', 'Pointed Collar', '9', 'Slim', '7', 'Long', 'Mens Wear', 1),
(66, 7, 'DL-A-170', 'David Luther', '60', 'Shirt/Men', 'Pointed Collar', '6', 'Slim', '21', 'Long', 'Mens Wear', 1),
(67, 7, 'DL-A-170', 'David Luther', '60', 'Shirt/Men', 'Pointed Collar', '7', 'Slim', '21', 'Long', 'Mens Wear', 1),
(68, 7, 'DL-A-170', 'David Luther', '60', 'Shirt/Men', 'Pointed Collar', '8', 'Slim', '21', 'Long', 'Mens Wear', 1),
(69, 7, 'DL-A-170', 'David Luther', '60', 'Shirt/Men', 'Pointed Collar', '9', 'Slim', '21', 'Long', 'Mens Wear', 1),
(70, 7, 'DL-A-171', 'David Luther', '60', 'Shirt/Men', 'Pointed Collar', '6', 'Slim', '7', 'Long', 'Mens Wear', 1),
(71, 7, 'DL-A-171', 'David Luther', '60', 'Shirt/Men', 'Pointed Collar', '7', 'Slim', '7', 'Long', 'Mens Wear', 1),
(72, 7, 'DL-A-171', 'David Luther', '60', 'Shirt/Men', 'Pointed Collar', '8', 'Slim', '7', 'Long', 'Mens Wear', 1),
(73, 7, 'DL-A-169', 'David Luther', '60', 'Shirt/Men', 'Pointed Collar', '6', 'Slim', '8', 'Long', 'Mens Wear', 1),
(74, 7, 'DL-A-169', 'David Luther', '60', 'Shirt/Men', 'Pointed Collar', '7', 'Slim', '8', 'Long', 'Mens Wear', 1),
(75, 7, 'DL-A-169', 'David Luther', '60', 'Shirt/Men', 'Pointed Collar', '8', 'Slim', '8', 'Long', 'Mens Wear', 1),
(76, 7, 'DL-A-169', 'David Luther', '60', 'Shirt/Men', 'Pointed Collar', '9', 'Slim', '8', 'Long', 'Mens Wear', 1),
(77, 7, 'DL-A-168', 'David Luther', '60', 'Shirt/Men', 'Pointed Collar', '6', 'Slim', '39', 'Long', 'Mens Wear', 1),
(78, 7, 'DL-A-168', 'David Luther', '60', 'Shirt/Men', 'Pointed Collar', '7', 'Slim', '39', 'Long', 'Mens Wear', 1),
(79, 7, 'DL-A-168', 'David Luther', '60', 'Shirt/Men', 'Pointed Collar', '8', 'Slim', '39', 'Long', 'Mens Wear', 1),
(80, 7, 'DL-A-168', 'David Luther', '60', 'Shirt/Men', 'Pointed Collar', '9', 'Slim', '39', 'Long', 'Mens Wear', 1),
(81, 7, 'DL-A-167', 'David Luther', '60', 'Shirt/Men', 'Pointed Collar', '6', 'Slim', '35', 'Long', 'Mens Wear', 1),
(82, 7, 'DL-A-167', 'David Luther', '60', 'Shirt/Men', 'Pointed Collar', '7', 'Slim', '35', 'Long', 'Mens Wear', 1),
(83, 7, 'DL-A-167', 'David Luther', '60', 'Shirt/Men', 'Pointed Collar', '8', 'Slim', '35', 'Long', 'Mens Wear', 1),
(84, 7, 'DL-A-167', 'David Luther', '60', 'Shirt/Men', 'Pointed Collar', '9', 'Slim', '35', 'Long', 'Mens Wear', 1),
(85, 7, 'DL-A-166', 'David Luther', '60', 'Shirt/Men', 'Pointed Collar', '6', 'Slim', '47', 'Long', 'Mens Wear', 1),
(86, 7, 'DL-A-166', 'David Luther', '60', 'Shirt/Men', 'Pointed Collar', '7', 'Slim', '47', 'Long', 'Mens Wear', 1),
(87, 7, 'DL-A-166', 'David Luther', '60', 'Shirt/Men', 'Pointed Collar', '8', 'Slim', '47', 'Long', 'Mens Wear', 1),
(88, 7, 'DL-A-166', 'David Luther', '60', 'Shirt/Men', 'Pointed Collar', '9', 'Slim', '47', 'Long', 'Mens Wear', 1),
(89, 7, 'DL-A-164', 'David Luther', '60', 'Shirt/Men', 'Pointed Collar', '6', 'Slim', '49', 'Long', 'Mens Wear', 1),
(90, 7, 'DL-A-164', 'David Luther', '60', 'Shirt/Men', 'Pointed Collar', '7', 'Slim', '49', 'Long', 'Mens Wear', 1),
(91, 7, 'DL-A-164', 'David Luther', '60', 'Shirt/Men', 'Pointed Collar', '8', 'Slim', '49', 'Long', 'Mens Wear', 1),
(92, 7, 'DL-A-164', 'David Luther', '60', 'Shirt/Men', 'Pointed Collar', '9', 'Slim', '49', 'Long', 'Mens Wear', 1),
(93, 7, 'DL-A-163', 'David Luther', '60', 'Shirt/Men', 'Pointed Collar', '6', 'Slim', '7', 'Long', 'Mens Wear', 1),
(94, 7, 'DL-A-163', 'David Luther', '60', 'Shirt/Men', 'Pointed Collar', '7', 'Slim', '7', 'Long', 'Mens Wear', 1),
(95, 7, 'DL-A-163', 'David Luther', '60', 'Shirt/Men', 'Pointed Collar', '8', 'Slim', '7', 'Long', 'Mens Wear', 1),
(96, 7, 'DL-A-163', 'David Luther', '60', 'Shirt/Men', 'Pointed Collar', '9', 'Slim', '7', 'Long', 'Mens Wear', 1),
(97, 7, 'DL-A-165', 'David Luther', '60', 'Shirt/Men', 'Pointed Collar', '6', 'Slim', '48', 'Long', 'Mens Wear', 1),
(98, 7, 'DL-A-165', 'David Luther', '60', 'Shirt/Men', 'Pointed Collar', '7', 'Slim', '48', 'Long', 'Mens Wear', 1),
(99, 7, 'DL-A-165', 'David Luther', '60', 'Shirt/Men', 'Pointed Collar', '8', 'Slim', '48', 'Long', 'Mens Wear', 1),
(100, 7, 'DL-A-165', 'David Luther', '60', 'Shirt/Men', 'Pointed Collar', '9', 'Slim', '48', 'Long', 'Mens Wear', 1);

-- --------------------------------------------------------

--
-- Table structure for table `tbl_purchase`
--

CREATE TABLE `tbl_purchase` (
  `purchase_id` int(11) NOT NULL,
  `product_id_fk` int(11) NOT NULL,
  `vendor_id_fk` int(11) NOT NULL,
  `shop_id_fk` int(11) NOT NULL,
  `login_id_fk` int(11) NOT NULL,
  `finyear` varchar(20) NOT NULL,
  `invoice_number` varchar(50) NOT NULL,
  `purchase_quantity` int(11) NOT NULL,
  `purchase_price` double NOT NULL,
  `landing_cost` bigint(20) NOT NULL,
  `total_price` double NOT NULL,
  `purchase_date` date NOT NULL,
  `tax_id_fk` int(11) NOT NULL,
  `stockstatus` int(11) NOT NULL,
  `purchase_status` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `tbl_sale`
--

CREATE TABLE `tbl_sale` (
  `sale_id` int(11) NOT NULL,
  `product_id_fk` int(11) NOT NULL,
  `shop_id_fk` int(11) NOT NULL,
  `login_id_fk` int(11) NOT NULL,
  `customer_id_fk` int(11) NOT NULL,
  `finyear` varchar(11) NOT NULL,
  `invoice_number` varchar(50) NOT NULL,
  `sale_quantity` bigint(20) NOT NULL,
  `sale_price` double NOT NULL,
  `total_price` double NOT NULL,
  `sale_date` date NOT NULL,
  `tax_id_fk` int(11) NOT NULL,
  `sale_status` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `tbl_shop`
--

CREATE TABLE `tbl_shop` (
  `shpid` int(11) NOT NULL,
  `shpname` varchar(50) NOT NULL,
  `shpadress` text NOT NULL,
  `shphone` bigint(20) NOT NULL,
  `shpemail` varchar(50) NOT NULL,
  `shpgst` varchar(50) NOT NULL,
  `status` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_shop`
--

INSERT INTO `tbl_shop` (`shpid`, `shpname`, `shpadress`, `shphone`, `shpemail`, `shpgst`, `status`) VALUES
(1, 'PALA', 'PALA RAMAPURAM', 7845129680, 'davidluther@gmail.com', 'GST0123456789DAVID01', 0),
(2, 'RANNI', 'RANNI PATHANAMTHITTA', 96451235862, 'davidluther@gmail.com', 'GST0123456789DAVID02', 0),
(3, 'KOCHI', 'THOPPUMPADY KOCHI', 9562347852, 'davidluther@gmail.com', 'GST0123456789DAVID03', 0),
(4, 'THIRUVANANTHAPURAM', 'TVM-01 WEST FORT KOVALAM', 96451236785, 'davidluther@gmail.com', 'GST0123456789DAVID04', 0),
(5, 'David Luther Marine Drive', '40/1819-A5, Alliance Residency, Marine Drive, Shanmugham Road, Ernakulam, KOCHI-682030', 9400034911, 'sajijohn4444@gmail.com', '32BWYPS0733F1ZA', 1),
(6, 'David Luther Kaipattoor', '2/589, Frist Floor, Neduvampurathu Bldg., Kaipattoor, Pathanamthitta, Kerala, Pin 689648', 9400034911, 'sajijohn4444@gmail.com', '32BWYPS0733F1ZA', 1),
(7, 'Daveth International (David Luther Store)', 'No. XII/7, Manali Mukku, N.A.D P.O, Edathala, Alwaye, Ernakulam, PIN 683563', 9400034911, 'sajijohn4444@gmail.com', '32BWYPS0733F1ZA', 1);

-- --------------------------------------------------------

--
-- Table structure for table `tbl_size`
--

CREATE TABLE `tbl_size` (
  `size_id` int(11) NOT NULL,
  `size_name` varchar(30) NOT NULL,
  `size_description` varchar(50) NOT NULL,
  `size_status` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_size`
--

INSERT INTO `tbl_size` (`size_id`, `size_name`, `size_description`, `size_status`) VALUES
(1, '32', 'ghfgdfg', 0),
(2, '90', 'fhfgjfgh', 0),
(3, '85', 'RTYFGHG', 0),
(4, '36', 'FGHFGHFG', 0),
(5, '36', 'Mens wear', 1),
(6, '38', 'Mens wear', 1),
(7, '40', 'Mens wear', 1),
(8, '42', 'Mens wear', 1),
(9, '44', 'Mens wear', 1),
(10, '46', 'Mens wear', 1),
(11, '26', 'Mens wear', 1),
(12, '28', 'Mens wear', 1),
(13, '30', 'Mens wear', 1),
(14, '32', 'Mens wear', 1),
(15, '34', 'Mens wear', 1),
(16, 'XS', 'Various', 1),
(17, 'S', 'Various', 1),
(18, 'M', 'Various', 1),
(19, 'L', 'Various', 1),
(20, 'XL', 'Various', 1),
(21, 'XXL', 'Various', 1),
(22, 'XXXL', 'Various', 1);

-- --------------------------------------------------------

--
-- Table structure for table `tbl_stock`
--

CREATE TABLE `tbl_stock` (
  `stockid` int(11) NOT NULL,
  `shop_id_fk` int(11) NOT NULL,
  `log_id_fk` int(11) NOT NULL,
  `product_id_fk` int(11) NOT NULL,
  `size_id_fk` int(11) NOT NULL,
  `finyear` varchar(50) NOT NULL,
  `current_stock` bigint(20) NOT NULL,
  `status` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `tbl_taxdetails`
--

CREATE TABLE `tbl_taxdetails` (
  `tax_id` int(11) NOT NULL,
  `taxname` varchar(50) NOT NULL,
  `taxamount` double NOT NULL,
  `taxdetails` text NOT NULL,
  `tax_status` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_taxdetails`
--

INSERT INTO `tbl_taxdetails` (`tax_id`, `taxname`, `taxamount`, `taxdetails`, `tax_status`) VALUES
(1, 'GST @ 5% (split tax)', 5, 'GST @ 5% (split tax) gst 5% split tax', 1),
(2, 'GST @ 12% (split tax)', 12, 'GST @ 12% (split tax)  gst 12% split  tax', 1),
(3, 'GST @ 18% (split tax)', 1, 'GST @ 18% (split tax)  gst 18% split  tax', 0),
(4, 'GST @ 18% (split tax)', 18, 'GST @ 18% (split tax)  gst 18% split tax', 1),
(5, 'GST @ 28% (split tax)', 28, 'GST @ 28% (split tax) gst 28% split tax', 1),
(6, 'GST 5%', 5, 'GST @ 5% (split tax) gst 5% split tax', 0),
(7, 'GST@ 1% (split tax)', 1, 'GST@0.50 & SGST@0.50', 1),
(8, 'GST@ 0%', 0, 'Tax exempted', 1);

-- --------------------------------------------------------

--
-- Table structure for table `tbl_user`
--

CREATE TABLE `tbl_user` (
  `userid` int(11) NOT NULL,
  `shop_id_fk` int(11) NOT NULL,
  `log_id_fk` int(11) NOT NULL,
  `name` varchar(50) NOT NULL,
  `dob` date NOT NULL,
  `state` varchar(50) NOT NULL,
  `district` varchar(50) NOT NULL,
  `idnumber` bigint(20) NOT NULL,
  `username` varchar(50) NOT NULL,
  `password` varchar(50) NOT NULL,
  `status` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_user`
--

INSERT INTO `tbl_user` (`userid`, `shop_id_fk`, `log_id_fk`, `name`, `dob`, `state`, `district`, `idnumber`, `username`, `password`, `status`) VALUES
(1, 1, 0, 'Maiz', '2018-11-08', 'KERALA', 'sdsadsa', 7845129633, 'admin', 'saaas', 1),
(2, 2, 2, 'sadd', '2018-11-27', 'Kerala', 'sdsadsa', 0, 'ivin', 'ivin@321', 1),
(4, 1, 0, '1 Kg', '2018-11-21', 'KERALA', 'sdsadsa', 0, 'sanilent@rediffmail.com', 'dasdsad', 1),
(5, 1, 4, 'fdsfdf', '2018-11-23', 'kerala', 'sdf', 7845129633, 'sanilent@rediffmail.com', 'saaas', 1),
(6, 3, 5, 'Anju', '2018-12-13', 'KERALA', 'ERNAKULAM', 4512639, 'anju', 'anju@321', 1);

-- --------------------------------------------------------

--
-- Table structure for table `tbl_vendor`
--

CREATE TABLE `tbl_vendor` (
  `vendor_id` int(11) NOT NULL,
  `vendorname` varchar(60) NOT NULL,
  `vendoraddress` text NOT NULL,
  `vendorphone` bigint(20) NOT NULL,
  `vendoremail` varchar(50) NOT NULL,
  `vendorstate` varchar(50) NOT NULL,
  `vendor_stcode` varchar(50) NOT NULL,
  `vendorgst` varchar(50) NOT NULL,
  `vendorpan` varchar(50) NOT NULL,
  `vendorstatus` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_vendor`
--

INSERT INTO `tbl_vendor` (`vendor_id`, `vendorname`, `vendoraddress`, `vendorphone`, `vendoremail`, `vendorstate`, `vendor_stcode`, `vendorgst`, `vendorpan`, `vendorstatus`) VALUES
(1, ' M/s  Bharathi Enterprises', '2nd Floor, Ganges, Dr. C.V Narayana Iyer Road, Near Jubilee Hall, Calicut - 2', 495, 'billboardbharathi@gmail.com ', 'KERALA', '32', '32AAOFB9811A1ZT', 'AAOFB9811A', 0),
(2, 'React Hub', 'CS3 Heavenly Plaza', 9784512630, 'info@lookings.in', 'Kerala', '30', 'GSTIN01236547893RCT', 'PAN0012456328', 0),
(3, 'G.V. Enterprises', '  Bangalore', 9986998726, 'sajijohn4444@gmail.com', 'KARNATAKA', '560021', '29AFAPR4056C1ZK', '29FAPR', 1),
(4, 'Mozak Apparels', 'Bangalore', 7411129738, 'sajijohn4444@gmail.com', 'KARNATAKA', '560068', '29BIKPP4672A1Z2', '29BIKPP', 1),
(5, 'TEXLOT TRADERS PVT LTD', '  CHENNAI', 9486666000, 'sajijohn4444@gmail.com', 'TAMIL NADU', '600096', '33AAKCM1879L1ZZ', '33AAKCM', 1),
(6, 'PRADEEP FASHIONS', '  BANGALORE', 8022287159, 'sajijohn4444@gmail.com', 'KARNATAKA', '560053', '29AACHB3519B1ZT', '29AACHB', 1),
(7, 'SARAVANA NAITHUKADA', '  TRISSUR', 8593001650, 'sajijohn4444@gmail.com', 'Kerala', '680594', '32FSNPS4406L1ZA', '32FSNPS', 1),
(8, 'PRADEEP GARMENTS', '  BANGALORE', 41300677, 'sajijohn4444@gmail.com', 'KARNATAKA', '29', '29AFKPKO125K1ZE', '29AFKPKO', 1),
(9, 'BEST FASHION', '   TAMIL NADU ', 8667091787, 'sajijohn4444@gmail.com', 'TAMIL NADU', '638183', '33EMTPS1422M1ZJ', '33EMTPS1422', 1);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `tbl_category`
--
ALTER TABLE `tbl_category`
  ADD PRIMARY KEY (`category_id`);

--
-- Indexes for table `tbl_color`
--
ALTER TABLE `tbl_color`
  ADD PRIMARY KEY (`color_id`);

--
-- Indexes for table `tbl_customer`
--
ALTER TABLE `tbl_customer`
  ADD PRIMARY KEY (`cust_id`);

--
-- Indexes for table `tbl_designation`
--
ALTER TABLE `tbl_designation`
  ADD PRIMARY KEY (`d_id`);

--
-- Indexes for table `tbl_expense`
--
ALTER TABLE `tbl_expense`
  ADD PRIMARY KEY (`exp_id`);

--
-- Indexes for table `tbl_finyear`
--
ALTER TABLE `tbl_finyear`
  ADD PRIMARY KEY (`finyear_id`);

--
-- Indexes for table `tbl_log`
--
ALTER TABLE `tbl_log`
  ADD PRIMARY KEY (`log_id`);

--
-- Indexes for table `tbl_login`
--
ALTER TABLE `tbl_login`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tbl_masterstock`
--
ALTER TABLE `tbl_masterstock`
  ADD PRIMARY KEY (`master_stockid`);

--
-- Indexes for table `tbl_openstock`
--
ALTER TABLE `tbl_openstock`
  ADD PRIMARY KEY (`open_id`);

--
-- Indexes for table `tbl_product`
--
ALTER TABLE `tbl_product`
  ADD PRIMARY KEY (`product_id`);

--
-- Indexes for table `tbl_purchase`
--
ALTER TABLE `tbl_purchase`
  ADD PRIMARY KEY (`purchase_id`);

--
-- Indexes for table `tbl_sale`
--
ALTER TABLE `tbl_sale`
  ADD PRIMARY KEY (`sale_id`);

--
-- Indexes for table `tbl_shop`
--
ALTER TABLE `tbl_shop`
  ADD PRIMARY KEY (`shpid`);

--
-- Indexes for table `tbl_size`
--
ALTER TABLE `tbl_size`
  ADD PRIMARY KEY (`size_id`);

--
-- Indexes for table `tbl_stock`
--
ALTER TABLE `tbl_stock`
  ADD PRIMARY KEY (`stockid`);

--
-- Indexes for table `tbl_taxdetails`
--
ALTER TABLE `tbl_taxdetails`
  ADD PRIMARY KEY (`tax_id`);

--
-- Indexes for table `tbl_user`
--
ALTER TABLE `tbl_user`
  ADD PRIMARY KEY (`userid`);

--
-- Indexes for table `tbl_vendor`
--
ALTER TABLE `tbl_vendor`
  ADD PRIMARY KEY (`vendor_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `tbl_category`
--
ALTER TABLE `tbl_category`
  MODIFY `category_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=33;
--
-- AUTO_INCREMENT for table `tbl_color`
--
ALTER TABLE `tbl_color`
  MODIFY `color_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=53;
--
-- AUTO_INCREMENT for table `tbl_customer`
--
ALTER TABLE `tbl_customer`
  MODIFY `cust_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;
--
-- AUTO_INCREMENT for table `tbl_designation`
--
ALTER TABLE `tbl_designation`
  MODIFY `d_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
--
-- AUTO_INCREMENT for table `tbl_expense`
--
ALTER TABLE `tbl_expense`
  MODIFY `exp_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT for table `tbl_finyear`
--
ALTER TABLE `tbl_finyear`
  MODIFY `finyear_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;
--
-- AUTO_INCREMENT for table `tbl_log`
--
ALTER TABLE `tbl_log`
  MODIFY `log_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=26;
--
-- AUTO_INCREMENT for table `tbl_login`
--
ALTER TABLE `tbl_login`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;
--
-- AUTO_INCREMENT for table `tbl_masterstock`
--
ALTER TABLE `tbl_masterstock`
  MODIFY `master_stockid` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=101;
--
-- AUTO_INCREMENT for table `tbl_openstock`
--
ALTER TABLE `tbl_openstock`
  MODIFY `open_id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `tbl_product`
--
ALTER TABLE `tbl_product`
  MODIFY `product_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=101;
--
-- AUTO_INCREMENT for table `tbl_purchase`
--
ALTER TABLE `tbl_purchase`
  MODIFY `purchase_id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `tbl_sale`
--
ALTER TABLE `tbl_sale`
  MODIFY `sale_id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `tbl_shop`
--
ALTER TABLE `tbl_shop`
  MODIFY `shpid` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;
--
-- AUTO_INCREMENT for table `tbl_size`
--
ALTER TABLE `tbl_size`
  MODIFY `size_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=23;
--
-- AUTO_INCREMENT for table `tbl_stock`
--
ALTER TABLE `tbl_stock`
  MODIFY `stockid` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `tbl_taxdetails`
--
ALTER TABLE `tbl_taxdetails`
  MODIFY `tax_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;
--
-- AUTO_INCREMENT for table `tbl_user`
--
ALTER TABLE `tbl_user`
  MODIFY `userid` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;
--
-- AUTO_INCREMENT for table `tbl_vendor`
--
ALTER TABLE `tbl_vendor`
  MODIFY `vendor_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
