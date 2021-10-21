-- phpMyAdmin SQL Dump
-- version 5.0.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1:3306
-- Generation Time: Oct 21, 2021 at 09:32 AM
-- Server version: 10.4.13-MariaDB
-- PHP Version: 7.4.9

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `sarm`
--

-- --------------------------------------------------------

--
-- Table structure for table `tbl_advance`
--

DROP TABLE IF EXISTS `tbl_advance`;
CREATE TABLE IF NOT EXISTS `tbl_advance` (
  `adv_id` int(11) NOT NULL AUTO_INCREMENT,
  `company_id` int(11) NOT NULL,
  `emp_id` varchar(50) NOT NULL,
  `adv_month` int(11) NOT NULL,
  `adv_amount` int(11) NOT NULL,
  `adv_date` date NOT NULL,
  `adv_status` int(11) NOT NULL,
  PRIMARY KEY (`adv_id`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_advance`
--

INSERT INTO `tbl_advance` (`adv_id`, `company_id`, `emp_id`, `adv_month`, `adv_amount`, `adv_date`, `adv_status`) VALUES
(1, 5, '1', 4, 2000, '2021-04-16', 1);

-- --------------------------------------------------------

--
-- Table structure for table `tbl_area`
--

DROP TABLE IF EXISTS `tbl_area`;
CREATE TABLE IF NOT EXISTS `tbl_area` (
  `area_id` int(11) NOT NULL AUTO_INCREMENT,
  `area_name` varchar(50) NOT NULL,
  `area_status` int(11) NOT NULL,
  `area_description` varchar(50) NOT NULL,
  PRIMARY KEY (`area_id`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_area`
--

INSERT INTO `tbl_area` (`area_id`, `area_name`, `area_status`, `area_description`) VALUES
(1, 'Rolling', 1, ''),
(2, 'Spinning', 1, ''),
(3, 'Job Work', 1, '');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_bank`
--

DROP TABLE IF EXISTS `tbl_bank`;
CREATE TABLE IF NOT EXISTS `tbl_bank` (
  `bank_id` int(11) NOT NULL AUTO_INCREMENT,
  `bank_name` varchar(50) DEFAULT NULL,
  `bank_accno` varchar(50) DEFAULT NULL,
  `bank_branch` varchar(50) DEFAULT NULL,
  `bank_ifsc` varchar(50) DEFAULT NULL,
  `bank_cmp` int(11) DEFAULT NULL,
  `bank_status` int(11) DEFAULT NULL,
  `old_balance` int(11) NOT NULL,
  `debit_credit` int(11) NOT NULL,
  PRIMARY KEY (`bank_id`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_bank`
--

INSERT INTO `tbl_bank` (`bank_id`, `bank_name`, `bank_accno`, `bank_branch`, `bank_ifsc`, `bank_cmp`, `bank_status`, `old_balance`, `debit_credit`) VALUES
(2, 'A', '213', 'DSF', '1231', 5, 0, 0, 0),
(3, 'm', '12121332', 'DSFsfasfsdgsddsgsdgdsg', '12314665654541321', 5, 0, 0, 0),
(4, 'A', '123', 'DSF', '123', 5, 1, 0, 0);

-- --------------------------------------------------------

--
-- Table structure for table `tbl_category`
--

DROP TABLE IF EXISTS `tbl_category`;
CREATE TABLE IF NOT EXISTS `tbl_category` (
  `category_id` int(11) NOT NULL AUTO_INCREMENT,
  `category_name` varchar(255) NOT NULL,
  `category_description` text NOT NULL,
  `category_status` int(11) NOT NULL,
  PRIMARY KEY (`category_id`)
) ENGINE=InnoDB AUTO_INCREMENT=10 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_category`
--

INSERT INTO `tbl_category` (`category_id`, `category_name`, `category_description`, `category_status`) VALUES
(1, 'Category1', 'Category1', 0),
(2, 'Category1', 'Category1', 0),
(3, 'Category2', 'Category2', 0),
(4, 'Category3', 'Category3', 0),
(5, 'Category1', 'Category1', 1),
(6, 'Category2', 'Category2', 1),
(7, 'Category3', 'Category3', 1),
(8, 'subCategory1', 'subCategory1', 0),
(9, 'Category4', 'Category4', 1);

-- --------------------------------------------------------

--
-- Table structure for table `tbl_companyinfo`
--

DROP TABLE IF EXISTS `tbl_companyinfo`;
CREATE TABLE IF NOT EXISTS `tbl_companyinfo` (
  `cmp_id` int(11) NOT NULL AUTO_INCREMENT,
  `cmp_name` varchar(50) NOT NULL,
  `cmp_adress` text DEFAULT NULL,
  `cmp_gst` varchar(50) DEFAULT NULL,
  `cmp_email` varchar(50) DEFAULT NULL,
  `cmp_phone` varchar(50) DEFAULT NULL,
  `cmp_status` int(11) NOT NULL,
  PRIMARY KEY (`cmp_id`)
) ENGINE=InnoDB AUTO_INCREMENT=7 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_companyinfo`
--

INSERT INTO `tbl_companyinfo` (`cmp_id`, `cmp_name`, `cmp_adress`, `cmp_gst`, `cmp_email`, `cmp_phone`, `cmp_status`) VALUES
(5, 'Sarm1', 'kaloor', '123', 'wahysdf@gmail.com', '9988774', 1),
(6, 'Sarm2', 'dgdsh', '215654', 'wahy@gmail.com', '9988774455', 1);

-- --------------------------------------------------------

--
-- Table structure for table `tbl_customer`
--

DROP TABLE IF EXISTS `tbl_customer`;
CREATE TABLE IF NOT EXISTS `tbl_customer` (
  `cust_id` int(11) NOT NULL AUTO_INCREMENT,
  `company_id` int(11) NOT NULL,
  `custname` varchar(50) NOT NULL,
  `custaddress` text NOT NULL,
  `custphone` bigint(20) NOT NULL,
  `custemail` varchar(50) NOT NULL,
  `old_balance` double NOT NULL DEFAULT 0,
  `custstatus` int(11) NOT NULL,
  `cust_pcategory` int(11) NOT NULL,
  `debit_credit` int(11) NOT NULL,
  PRIMARY KEY (`cust_id`)
) ENGINE=InnoDB AUTO_INCREMENT=13 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_customer`
--

INSERT INTO `tbl_customer` (`cust_id`, `company_id`, `custname`, `custaddress`, `custphone`, `custemail`, `old_balance`, `custstatus`, `cust_pcategory`, `debit_credit`) VALUES
(5, 5, 'Sneha', 'gdgbd', 8484984, 'cust@gmail.com', 0, 1, 10, 0),
(6, 6, 'nicemon', 'dsgg', 84849, 'cust1@gmail.com', 10000, 1, 11, 0),
(7, 5, 'preethi', 'gdfgh', 8484984, 'cust@gmail.com', 5000, 0, 10, 0),
(8, 5, 'ashkar', 'dsagfdg', 8484984, 'cust@gmail.com', 2000, 0, 11, 0),
(9, 6, 'preethi', 'asd dsafs', 84849844234, 'customer@gmail.com', 500, 1, 2, 0),
(10, 6, 'Ajith', 'kkm', 8484984, 'cust@gmail.com', 1000, 1, 2, 0),
(11, 5, 'Rajnikanth', 'Chenkottil, Kerala', 9876543210, 'repx@hexa.com', 20000, 1, 1, 0),
(12, 6, 'Mukesh456789', 'poverty', 7894561230, 'help2@help.com', 200000, 0, 1, 0);

-- --------------------------------------------------------

--
-- Table structure for table `tbl_empabsent`
--

DROP TABLE IF EXISTS `tbl_empabsent`;
CREATE TABLE IF NOT EXISTS `tbl_empabsent` (
  `absent_id` int(11) NOT NULL AUTO_INCREMENT,
  `absent_date` date NOT NULL,
  `month` int(11) NOT NULL,
  `emp_id` int(11) NOT NULL,
  `absent_status` int(11) NOT NULL,
  PRIMARY KEY (`absent_id`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_empabsent`
--

INSERT INTO `tbl_empabsent` (`absent_id`, `absent_date`, `month`, `emp_id`, `absent_status`) VALUES
(1, '2021-04-09', 4, 1, 1);

-- --------------------------------------------------------

--
-- Table structure for table `tbl_empattendance`
--

DROP TABLE IF EXISTS `tbl_empattendance`;
CREATE TABLE IF NOT EXISTS `tbl_empattendance` (
  `att_id` int(11) NOT NULL AUTO_INCREMENT,
  `att_date` date NOT NULL,
  `emp_id` int(11) NOT NULL,
  `att_status` int(11) NOT NULL,
  PRIMARY KEY (`att_id`)
) ENGINE=InnoDB AUTO_INCREMENT=36 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_empattendance`
--

INSERT INTO `tbl_empattendance` (`att_id`, `att_date`, `emp_id`, `att_status`) VALUES
(31, '2021-04-15', 2, 1),
(32, '2021-04-15', 3, 1),
(33, '2021-04-15', 1, 1),
(34, '2021-04-09', 3, 1),
(35, '2021-04-09', 2, 1);

-- --------------------------------------------------------

--
-- Table structure for table `tbl_employee`
--

DROP TABLE IF EXISTS `tbl_employee`;
CREATE TABLE IF NOT EXISTS `tbl_employee` (
  `emp_id` int(11) NOT NULL AUTO_INCREMENT,
  `company_id` int(11) NOT NULL,
  `emp_name` varchar(50) NOT NULL,
  `emp_address` text NOT NULL,
  `emp_phone` bigint(20) NOT NULL,
  `emp_email` varchar(50) NOT NULL,
  `emp_date` date NOT NULL,
  `emp_salary` int(11) NOT NULL,
  `emp_status` int(11) NOT NULL,
  PRIMARY KEY (`emp_id`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_employee`
--

INSERT INTO `tbl_employee` (`emp_id`, `company_id`, `emp_name`, `emp_address`, `emp_phone`, `emp_email`, `emp_date`, `emp_salary`, `emp_status`) VALUES
(1, 5, 'AJITH', '   gdgh ', 213, 'abc@gmail.com', '2021-01-04', 30000, 1),
(2, 5, 'Akhilesh', '  fgsdgdf', 213, 'abc@gmail.com', '2021-01-04', 20000, 1),
(3, 6, 'abc', '  gdsgd', 213, 'abc@gmail.com', '2021-01-04', 40000, 1);

-- --------------------------------------------------------

--
-- Table structure for table `tbl_finyear`
--

DROP TABLE IF EXISTS `tbl_finyear`;
CREATE TABLE IF NOT EXISTS `tbl_finyear` (
  `finyear_id` int(11) NOT NULL AUTO_INCREMENT,
  `fin_year` varchar(50) NOT NULL,
  `fin_startdate` varchar(50) NOT NULL,
  `fin_enddate` varchar(50) NOT NULL,
  `fin_status` int(11) NOT NULL,
  `status` int(11) NOT NULL,
  PRIMARY KEY (`finyear_id`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_finyear`
--

INSERT INTO `tbl_finyear` (`finyear_id`, `fin_year`, `fin_startdate`, `fin_enddate`, `fin_status`, `status`) VALUES
(1, '2021-2022', '2021-04-01', '2022-03-31', 0, 0),
(2, '2021-2022', '2021-04-01', '2022-03-31', 0, 0),
(3, '2021-2022', '2021-04-01', '2021-03-31', 1, 1);

-- --------------------------------------------------------

--
-- Table structure for table `tbl_groups`
--

DROP TABLE IF EXISTS `tbl_groups`;
CREATE TABLE IF NOT EXISTS `tbl_groups` (
  `group_id` int(11) NOT NULL AUTO_INCREMENT,
  `group_name` varchar(100) NOT NULL,
  `group_desc` text NOT NULL,
  `group_status` int(11) NOT NULL,
  `type_id_fk` int(11) NOT NULL,
  `default` int(11) NOT NULL COMMENT '1=default',
  `group_parent_id` int(11) NOT NULL,
  PRIMARY KEY (`group_id`)
) ENGINE=InnoDB AUTO_INCREMENT=34 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_groups`
--

INSERT INTO `tbl_groups` (`group_id`, `group_name`, `group_desc`, `group_status`, `type_id_fk`, `default`, `group_parent_id`) VALUES
(1, 'CURRENT ASSET', '', 1, 1, 1, 0),
(2, 'FIXED ASSET', '', 1, 1, 1, 0),
(3, 'SUSPENCE ACCOUNT', '', 1, 1, 1, 0),
(4, 'CAPITAL ACCOUNT', '', 1, 2, 1, 0),
(5, 'PROFIT & LOSS ACCOUNT', '', 1, 2, 1, 0),
(6, 'CURRENT LIABILITY', '', 1, 2, 1, 0),
(7, 'LOANS(LIABILITY)', '', 1, 2, 1, 0),
(8, 'DIRECT INCOME', '', 1, 3, 1, 0),
(9, 'INDIRECT INCOME', '', 1, 3, 1, 0),
(10, 'DIRECT EXPENSES', '', 1, 4, 1, 0),
(11, 'INDIRECT EXPENSES', '', 1, 4, 1, 0),
(12, 'BANK ACCOUNTS', '', 1, 1, 1, 1),
(13, 'CASH ACCOUNT', '', 1, 1, 1, 1),
(14, 'STOCK IN HAND', '', 1, 1, 1, 1),
(15, 'SUNDRY DEBTORS', '', 1, 1, 1, 1),
(16, 'LOAN & ADVANCES (ASSET)', '', 1, 1, 1, 1),
(17, 'FIXED ASSET', '', 1, 1, 1, 2),
(18, 'SUSPENCE ACCOUNT', '', 1, 1, 1, 3),
(19, 'CAPITAL ACCOUNT', '', 1, 2, 1, 4),
(20, 'DUTIES AND TAXES', '', 1, 2, 1, 6),
(21, 'SUNDRY CREDITORS', '', 1, 2, 1, 6),
(22, 'LOANS (LIABILITY)', '', 1, 2, 1, 7),
(24, 'SALES ACCOUNT', '', 1, 3, 1, 8),
(25, 'DIRECT INCOME', '', 1, 3, 1, 8),
(26, 'INDIRECT INCOME', '', 1, 3, 1, 9),
(27, 'DIRECT EXPENCES', '', 1, 4, 1, 10),
(28, 'PURCHASE ACCOUNT', '', 1, 4, 1, 10),
(29, 'INDIRECT EXPENCES', '', 1, 4, 1, 11),
(30, 'OPENING STOCK', '', 1, 4, 0, 0),
(31, 'OPENING STOCK', '', 1, 4, 0, 10),
(32, 'CURRENT ASSET', 'CURRENT ASSET DESCRIPTION', 0, 1, 0, 0),
(33, 'SUNDRY DEBTORS', 'SUNDRY DEBTORS DESCRIPTION', 1, 1, 1, 1);

-- --------------------------------------------------------

--
-- Table structure for table `tbl_journal`
--

DROP TABLE IF EXISTS `tbl_journal`;
CREATE TABLE IF NOT EXISTS `tbl_journal` (
  `journal_id` int(11) NOT NULL AUTO_INCREMENT,
  `company_id_fk` int(11) NOT NULL,
  `fin_year` int(11) NOT NULL,
  `journal_date` date NOT NULL,
  `ledger_head_id` int(11) NOT NULL,
  `debit_amt` double NOT NULL DEFAULT 0,
  `credit_amt` double NOT NULL DEFAULT 0,
  `narration` text NOT NULL,
  `note` text NOT NULL,
  `journal_status` int(11) NOT NULL,
  `journal_inv` varchar(25) NOT NULL,
  PRIMARY KEY (`journal_id`)
) ENGINE=InnoDB AUTO_INCREMENT=32 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_journal`
--

INSERT INTO `tbl_journal` (`journal_id`, `company_id_fk`, `fin_year`, `journal_date`, `ledger_head_id`, `debit_amt`, `credit_amt`, `narration`, `note`, `journal_status`, `journal_inv`) VALUES
(9, 5, 3, '2021-07-19', 6, 6000, 0, '', '', 1, 'JNL0005'),
(10, 5, 3, '2021-07-19', 4, 0, 5000, '', '', 1, 'JNL0005'),
(11, 5, 3, '2021-07-19', 3, 0, 1000, '', '', 1, 'JNL0005'),
(14, 5, 3, '2021-07-19', 10, 1000, 0, '                        ', '                    ', 1, 'JNL0001'),
(15, 5, 3, '2021-07-19', 3, 0, 1000, '                        ', '                    ', 1, 'JNL0001'),
(16, 5, 3, '2021-07-21', 15, 2000, 0, '', '', 1, 'JNL0002'),
(17, 5, 3, '2021-07-21', 3, 0, 2000, '', '', 1, 'JNL0002'),
(20, 5, 3, '2021-07-22', 4, 30000, 0, '', '', 0, 'JNL0004'),
(21, 5, 3, '2021-07-22', 9, 0, 30000, '', '', 0, 'JNL0004'),
(26, 5, 3, '2021-07-19', 3, 2000, 0, '                                                ', '                                        ', 1, 'JNL0006'),
(27, 5, 3, '2021-07-19', 9, 0, 2000, '                                                ', '                                        ', 1, 'JNL0006'),
(30, 5, 3, '2021-07-22', 3, 6000, 0, '                                                ', '                                        ', 1, 'JNL0003'),
(31, 5, 3, '2021-07-22', 7, 0, 6000, '                                                ', '                                        ', 1, 'JNL0003');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_ledgerbalance`
--

DROP TABLE IF EXISTS `tbl_ledgerbalance`;
CREATE TABLE IF NOT EXISTS `tbl_ledgerbalance` (
  `led_id` int(11) NOT NULL AUTO_INCREMENT,
  `company_id_fk` int(11) NOT NULL,
  `ledgerhead_id_fk` int(11) NOT NULL,
  `date` date NOT NULL,
  `balance` double NOT NULL DEFAULT 0,
  `debit_credit` int(11) NOT NULL COMMENT '1=debit 2=credit',
  `ledgerbalance_status` int(11) NOT NULL,
  PRIMARY KEY (`led_id`)
) ENGINE=InnoDB AUTO_INCREMENT=33 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_ledgerbalance`
--

INSERT INTO `tbl_ledgerbalance` (`led_id`, `company_id_fk`, `ledgerhead_id_fk`, `date`, `balance`, `debit_credit`, `ledgerbalance_status`) VALUES
(1, 5, 1, '2021-07-18', 50000, 1, 1),
(2, 5, 2, '2021-07-20', 60000, 2, 0),
(3, 5, 3, '2021-07-18', 30000, 2, 1),
(4, 5, 4, '2021-07-18', 20000, 2, 1),
(5, 5, 5, '2021-07-18', 3000, 2, 1),
(6, 5, 6, '2021-07-18', 5000, 1, 1),
(7, 5, 7, '2021-07-18', 0, 2, 1),
(8, 5, 8, '2021-07-18', 0, 1, 1),
(9, 5, 9, '2021-07-18', 0, 2, 1),
(10, 5, 10, '2021-07-18', 0, 1, 1),
(11, 5, 11, '2021-07-18', 0, 1, 1),
(12, 5, 12, '2021-07-18', 10000, 2, 1),
(13, 5, 13, '2021-07-18', 10000, 1, 1),
(14, 5, 10, '2021-07-19', 1000, 2, 1),
(15, 5, 3, '2021-07-19', 30000, 2, 1),
(16, 5, 11, '2021-07-19', 500, 2, 1),
(17, 5, 4, '2021-07-19', 14500, 2, 1),
(18, 5, 7, '2021-07-19', 1000, 1, 1),
(19, 5, 8, '2021-07-19', 1000, 2, 1),
(20, 5, 6, '2021-07-19', 1000, 2, 1),
(21, 5, 9, '2021-07-18', 0, 2, 1),
(22, 5, 14, '2021-07-28', 50000, 2, 1),
(23, 5, 15, '2021-07-20', 0, 1, 1),
(24, 5, 15, '2021-07-21', 2000, 2, 1),
(25, 5, 3, '2021-07-21', 28000, 2, 1),
(26, 5, 3, '2021-07-22', 34000, 2, 1),
(27, 5, 7, '2021-07-22', 7000, 1, 1),
(28, 5, 4, '2021-07-22', 44500, 2, 1),
(29, 5, 9, '2021-07-22', 30000, 1, 1),
(30, 5, 9, '2021-07-19', 2000, 1, 1),
(31, 5, 16, '2021-10-20', 20000, 1, 0),
(32, 5, 17, '2021-10-20', 3000000, 1, 1);

-- --------------------------------------------------------

--
-- Table structure for table `tbl_ledgerhead`
--

DROP TABLE IF EXISTS `tbl_ledgerhead`;
CREATE TABLE IF NOT EXISTS `tbl_ledgerhead` (
  `ledgerhead_id` int(11) NOT NULL AUTO_INCREMENT,
  `group_id_fk` int(11) NOT NULL,
  `ledger_head` varchar(100) NOT NULL,
  `ledgerhead_desc` text NOT NULL,
  `opening_bal` double NOT NULL,
  `debit_or_credit` int(11) NOT NULL COMMENT '1=debit 2=credit',
  `ledgerhead_status` int(11) NOT NULL,
  `company_id_fk` int(11) NOT NULL,
  PRIMARY KEY (`ledgerhead_id`)
) ENGINE=InnoDB AUTO_INCREMENT=22 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_ledgerhead`
--

INSERT INTO `tbl_ledgerhead` (`ledgerhead_id`, `group_id_fk`, `ledger_head`, `ledgerhead_desc`, `opening_bal`, `debit_or_credit`, `ledgerhead_status`, `company_id_fk`) VALUES
(1, 31, 'OPENING STOCK', '', 50000, 2, 1, 5),
(2, 14, 'CLOSING STOCK', '', 60000, 1, 0, 5),
(3, 13, 'CASH IN HAND', '', 30000, 1, 1, 5),
(4, 12, 'FEDERAL BANK', '', 20000, 1, 1, 5),
(5, 15, 'ALIF', '', 3000, 1, 1, 5),
(6, 21, 'IDEAL', '', 5000, 2, 1, 5),
(7, 25, 'FRIGHT@SALES', '', 0, 1, 1, 5),
(8, 27, 'FRIEGHT@PUR', '', 0, 2, 1, 5),
(9, 26, 'COMMISSION', '', 0, 1, 1, 5),
(10, 29, 'SALARY', '', 0, 2, 1, 5),
(11, 27, 'WAGES', '', 0, 2, 1, 5),
(12, 17, 'COMPUTER', '', 10000, 1, 1, 5),
(13, 19, 'PARTNER1', '', 10000, 2, 1, 5),
(14, 14, 'CLOSING STOCK', '', 50000, 1, 1, 5),
(15, 29, 'ELECTRICITY CHARGES', '', 0, 2, 1, 5),
(16, 15, 'RAJEEV', 'BUSINESS PERSON', 20000, 2, 0, 5),
(17, 15, 'Jishnu', 'Business person', 3000000, 2, 1, 5),
(18, 15, 'Rajnikanth', 'Customer', 0, 2, 1, 5),
(19, 15, 'Mukesh456789', 'Customer', 0, 2, 0, 6),
(21, 21, 'Aroma Supplierswrtfwertwer', 'Supplier', 0, 0, 0, 6);

-- --------------------------------------------------------

--
-- Table structure for table `tbl_login`
--

DROP TABLE IF EXISTS `tbl_login`;
CREATE TABLE IF NOT EXISTS `tbl_login` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `user_name` varchar(50) NOT NULL,
  `email` varchar(50) NOT NULL,
  `password` varchar(50) NOT NULL,
  `user_type` varchar(5) NOT NULL,
  `cmp_id` int(11) NOT NULL,
  `created_date` datetime NOT NULL,
  `updated_date` datetime NOT NULL,
  `status` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=7 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_login`
--

INSERT INTO `tbl_login` (`id`, `user_name`, `email`, `password`, `user_type`, `cmp_id`, `created_date`, `updated_date`, `status`) VALUES
(1, 'admin', 'admin@sarm.com', '1234', 'A', 0, '2021-01-25 00:00:00', '0000-00-00 00:00:00', 1),
(5, 'user1', 'wahysdf@gmail.com', '123', 'C', 5, '2021-04-10 00:00:00', '2021-04-12 00:00:00', 1),
(6, 'usera', 'wahy@gmail.com', '1234', 'C', 6, '2021-04-12 00:00:00', '0000-00-00 00:00:00', 1);

-- --------------------------------------------------------

--
-- Table structure for table `tbl_openingstock`
--

DROP TABLE IF EXISTS `tbl_openingstock`;
CREATE TABLE IF NOT EXISTS `tbl_openingstock` (
  `opening_id` int(11) NOT NULL AUTO_INCREMENT,
  `company_id` int(11) NOT NULL,
  `item_id` int(11) NOT NULL,
  `stock` int(25) NOT NULL,
  `opening_status` int(11) NOT NULL,
  `finyr` int(11) NOT NULL,
  PRIMARY KEY (`opening_id`)
) ENGINE=InnoDB AUTO_INCREMENT=57 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_openingstock`
--

INSERT INTO `tbl_openingstock` (`opening_id`, `company_id`, `item_id`, `stock`, `opening_status`, `finyr`) VALUES
(1, 5, 1, 10, 1, 3),
(2, 5, 2, 10, 1, 3),
(3, 5, 3, 10, 1, 3),
(4, 5, 4, 1000, 1, 3),
(5, 5, 5, 100, 1, 3),
(52, 5, 62, 0, 1, 3),
(53, 5, 63, 0, 1, 3),
(54, 5, 64, 0, 1, 3),
(55, 5, 65, 0, 1, 3),
(56, 5, 66, 0, 1, 3);

-- --------------------------------------------------------

--
-- Table structure for table `tbl_payroll`
--

DROP TABLE IF EXISTS `tbl_payroll`;
CREATE TABLE IF NOT EXISTS `tbl_payroll` (
  `payroll_id` int(11) NOT NULL AUTO_INCREMENT,
  `company_id` int(11) DEFAULT NULL,
  `payroll_emp_id` int(11) DEFAULT NULL,
  `payroll_basicsalary` int(11) DEFAULT NULL,
  `payroll_leaveamt` int(11) DEFAULT NULL,
  `payroll_advance` int(11) DEFAULT NULL,
  `payroll_salary` int(11) DEFAULT NULL,
  `payroll_salarydate` date DEFAULT NULL,
  `payroll_status` int(11) DEFAULT NULL,
  `payroll_salmonth` int(11) NOT NULL,
  PRIMARY KEY (`payroll_id`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_payroll`
--

INSERT INTO `tbl_payroll` (`payroll_id`, `company_id`, `payroll_emp_id`, `payroll_basicsalary`, `payroll_leaveamt`, `payroll_advance`, `payroll_salary`, `payroll_salarydate`, `payroll_status`, `payroll_salmonth`) VALUES
(1, 5, 1, 30000, 1, 2000, 27000, '2021-04-30', 1, 4);

-- --------------------------------------------------------

--
-- Table structure for table `tbl_pricecategory`
--

DROP TABLE IF EXISTS `tbl_pricecategory`;
CREATE TABLE IF NOT EXISTS `tbl_pricecategory` (
  `pcategory_id` int(11) NOT NULL AUTO_INCREMENT,
  `pcategory_name` varchar(255) NOT NULL,
  `pcategory_description` text NOT NULL,
  `pcategory_status` int(11) NOT NULL,
  PRIMARY KEY (`pcategory_id`)
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_pricecategory`
--

INSERT INTO `tbl_pricecategory` (`pcategory_id`, `pcategory_name`, `pcategory_description`, `pcategory_status`) VALUES
(1, 'caty1', '', 1),
(2, 'caty2', 'gsdd', 1),
(3, 'caty3', 'ghhg', 1),
(4, 'caty4', 'fhdfh', 1);

-- --------------------------------------------------------

--
-- Table structure for table `tbl_pricelist`
--

DROP TABLE IF EXISTS `tbl_pricelist`;
CREATE TABLE IF NOT EXISTS `tbl_pricelist` (
  `price_id` int(11) NOT NULL AUTO_INCREMENT,
  `item_id` int(11) NOT NULL,
  `pcategory_id` int(11) NOT NULL,
  `item_price` int(20) DEFAULT NULL,
  `company_id` int(11) NOT NULL,
  `price_status` int(11) NOT NULL,
  PRIMARY KEY (`price_id`)
) ENGINE=InnoDB AUTO_INCREMENT=121 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_pricelist`
--

INSERT INTO `tbl_pricelist` (`price_id`, `item_id`, `pcategory_id`, `item_price`, `company_id`, `price_status`) VALUES
(1, 1, 1, 100, 5, 1),
(2, 1, 2, 200, 5, 1),
(3, 1, 3, 300, 5, 1),
(4, 1, 4, 400, 5, 1),
(5, 2, 1, 10, 5, 0),
(6, 2, 2, 20, 5, 0),
(7, 2, 3, 30, 5, 0),
(8, 2, 4, 40, 5, 0),
(9, 3, 1, 1, 5, 1),
(10, 3, 2, 2, 5, 1),
(11, 3, 3, 3, 5, 1),
(12, 3, 4, 4, 5, 1),
(13, 4, 1, 100, 5, 1),
(14, 4, 2, 200, 5, 1),
(15, 4, 3, 100, 5, 1),
(16, 4, 4, 100, 5, 1),
(17, 5, 1, 100, 5, 1),
(18, 5, 2, 200, 5, 1),
(19, 5, 3, 300, 5, 1),
(20, 5, 4, 400, 5, 1),
(21, 6, 1, 125, 5, 1),
(22, 6, 2, 0, 5, 1),
(23, 6, 3, 0, 5, 1),
(24, 6, 4, 0, 5, 1),
(25, 7, 1, 200, 5, 1),
(26, 7, 2, 210, 5, 1),
(27, 7, 3, 220, 5, 1),
(28, 7, 4, 230, 5, 1),
(29, 8, 1, 140, 5, 1),
(30, 8, 2, 145, 5, 1),
(31, 8, 3, 150, 5, 1),
(32, 8, 4, 155, 5, 1),
(33, 9, 1, 270, 5, 1),
(34, 9, 2, 280, 5, 1),
(35, 9, 3, 290, 5, 1),
(36, 9, 4, 300, 5, 1),
(101, 62, 1, NULL, 5, 1),
(102, 62, 2, NULL, 5, 1),
(103, 62, 3, NULL, 5, 1),
(104, 62, 4, NULL, 5, 1),
(105, 63, 1, NULL, 5, 1),
(106, 63, 2, NULL, 5, 1),
(107, 63, 3, NULL, 5, 1),
(108, 63, 4, NULL, 5, 1),
(109, 64, 1, NULL, 5, 1),
(110, 64, 2, NULL, 5, 1),
(111, 64, 3, NULL, 5, 1),
(112, 64, 4, NULL, 5, 1),
(113, 65, 1, NULL, 5, 1),
(114, 65, 2, NULL, 5, 1),
(115, 65, 3, NULL, 5, 1),
(116, 65, 4, NULL, 5, 1),
(117, 66, 1, NULL, 5, 1),
(118, 66, 2, NULL, 5, 1),
(119, 66, 3, NULL, 5, 1),
(120, 66, 4, NULL, 5, 1);

-- --------------------------------------------------------

--
-- Table structure for table `tbl_product`
--

DROP TABLE IF EXISTS `tbl_product`;
CREATE TABLE IF NOT EXISTS `tbl_product` (
  `product_id` int(11) NOT NULL AUTO_INCREMENT,
  `supplier_id` int(11) NOT NULL,
  `maincategory_id` int(11) DEFAULT NULL,
  `subcategory_id` int(11) DEFAULT NULL,
  `product_code` varchar(50) NOT NULL,
  `product_name` varchar(50) NOT NULL,
  `product_unit` varchar(50) NOT NULL,
  `product_description` text NOT NULL,
  `min_stock` int(11) NOT NULL,
  `product_status` int(11) NOT NULL,
  `product_type` varchar(25) NOT NULL,
  `company_id` int(11) NOT NULL,
  `active_status` int(11) NOT NULL DEFAULT 1 COMMENT '(1=active,0=desabled)',
  PRIMARY KEY (`product_id`)
) ENGINE=InnoDB AUTO_INCREMENT=67 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_product`
--

INSERT INTO `tbl_product` (`product_id`, `supplier_id`, `maincategory_id`, `subcategory_id`, `product_code`, `product_name`, `product_unit`, `product_description`, `min_stock`, `product_status`, `product_type`, `company_id`, `active_status`) VALUES
(1, 1, 5, 1, 'code1', 'Acer Display', '2', 'ADFHDF', 5, 1, 'RM', 5, 1),
(2, 0, 5, 1, 'mp1', 'cover', '2', 'ghdfgh ggds', 10, 0, 'MP', 5, 1),
(3, 0, 5, 1, 'mp22', 'Galaxyy', '2', 'trhyfh ', 15, 1, 'MP', 5, 1),
(4, 1, 5, 1, 'code2', 'abc', '2', 'rehfeh', 1500, 1, 'RM', 5, 1),
(5, 1, 5, 1, 'codes1', 'mobile', '2', 'sdfjagsakng', 10, 1, 'RM', 5, 1),
(6, 1, 5, 1, 'AS00', 'ALUMINIUM SHEETS', '3', '', 0, 1, 'RM', 5, 1),
(7, 1, 5, 1, 'AV00', 'ALUMINIUM VESSELS', '3', '', 0, 1, 'RM', 5, 1),
(8, 1, 5, 1, 'PK00', 'PK SET', '4', '', 0, 1, 'RM', 5, 1),
(9, 1, 5, 1, 'KLM1620', 'KALAM', '3', '', 0, 1, 'RM', 5, 1),
(62, 1, 6, 1, 'code20', 'Viewsonic Display', '', 'Lcd Monitor', 0, 1, 'RM', 5, 1),
(63, 1, 6, 1, 'code21', 'Dell Inspiron', '', 'Laptop', 0, 1, 'RM', 5, 1),
(64, 1, 6, 1, 'code22', 'Epson Printer', '', 'Home Printer', 0, 1, 'RM', 5, 1),
(65, 1, 6, 1, 'code23', 'Sonos Soundbar', '', 'Soundbar', 0, 1, 'RM', 5, 1),
(66, 1, 6, 1, 'code24', 'Levis Jeans', '', 'Mens Jeans', 0, 1, 'RM', 5, 1);

-- --------------------------------------------------------

--
-- Table structure for table `tbl_production`
--

DROP TABLE IF EXISTS `tbl_production`;
CREATE TABLE IF NOT EXISTS `tbl_production` (
  `production_id` int(11) NOT NULL AUTO_INCREMENT,
  `company_id_fk` int(11) NOT NULL,
  `area_id_fk` int(11) NOT NULL,
  `fin_year` int(11) NOT NULL,
  `date` date NOT NULL,
  `production_status` int(11) NOT NULL,
  PRIMARY KEY (`production_id`)
) ENGINE=InnoDB AUTO_INCREMENT=7 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_production`
--

INSERT INTO `tbl_production` (`production_id`, `company_id_fk`, `area_id_fk`, `fin_year`, `date`, `production_status`) VALUES
(1, 5, 1, 3, '2021-05-12', 0),
(3, 5, 2, 3, '2021-05-12', 0),
(4, 5, 2, 3, '2021-05-12', 0),
(5, 5, 2, 3, '2021-05-12', 0),
(6, 5, 2, 3, '2021-05-12', 1);

-- --------------------------------------------------------

--
-- Table structure for table `tbl_productioninput`
--

DROP TABLE IF EXISTS `tbl_productioninput`;
CREATE TABLE IF NOT EXISTS `tbl_productioninput` (
  `input_id` int(11) NOT NULL AUTO_INCREMENT,
  `production_id_fk` int(11) NOT NULL,
  `product_code` varchar(50) NOT NULL,
  `product_id` int(11) NOT NULL,
  `used_quantity` int(11) NOT NULL,
  `input_status` int(11) NOT NULL,
  PRIMARY KEY (`input_id`)
) ENGINE=InnoDB AUTO_INCREMENT=8 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_productioninput`
--

INSERT INTO `tbl_productioninput` (`input_id`, `production_id_fk`, `product_code`, `product_id`, `used_quantity`, `input_status`) VALUES
(1, 1, 'code1', 1, 10, 0),
(2, 1, 'mp22', 3, 10, 0),
(4, 3, 'AS00', 6, 3, 0),
(5, 4, 'AS00', 6, 3, 0),
(6, 5, 'AS00', 6, 3, 0),
(7, 6, 'AS00', 6, 25, 1);

-- --------------------------------------------------------

--
-- Table structure for table `tbl_productionoutput`
--

DROP TABLE IF EXISTS `tbl_productionoutput`;
CREATE TABLE IF NOT EXISTS `tbl_productionoutput` (
  `output_id` int(11) NOT NULL AUTO_INCREMENT,
  `production_id_fk` int(11) NOT NULL,
  `product_code` int(11) NOT NULL,
  `product_id` int(11) NOT NULL,
  `produced_quantity` int(11) NOT NULL,
  `output_status` int(11) NOT NULL,
  PRIMARY KEY (`output_id`)
) ENGINE=InnoDB AUTO_INCREMENT=7 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_productionoutput`
--

INSERT INTO `tbl_productionoutput` (`output_id`, `production_id_fk`, `product_code`, `product_id`, `produced_quantity`, `output_status`) VALUES
(1, 1, 0, 4, 5, 0),
(2, 1, 0, 5, 10, 0),
(5, 6, 0, 7, 18, 1),
(6, 6, 0, 8, 30, 1);

-- --------------------------------------------------------

--
-- Table structure for table `tbl_profit`
--

DROP TABLE IF EXISTS `tbl_profit`;
CREATE TABLE IF NOT EXISTS `tbl_profit` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `cmp_id_fk` int(11) NOT NULL,
  `amount` int(11) NOT NULL,
  `profit_loss` int(11) NOT NULL COMMENT '1=profit,2=loss',
  `fin_year` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_profit`
--

INSERT INTO `tbl_profit` (`id`, `cmp_id_fk`, `amount`, `profit_loss`, `fin_year`) VALUES
(1, 5, 3500, 1, 3);

-- --------------------------------------------------------

--
-- Table structure for table `tbl_purchase`
--

DROP TABLE IF EXISTS `tbl_purchase`;
CREATE TABLE IF NOT EXISTS `tbl_purchase` (
  `purchase_id` int(11) NOT NULL AUTO_INCREMENT,
  `product_id_fk` int(11) NOT NULL,
  `supp_id` int(11) NOT NULL DEFAULT 0,
  `cmp_id` int(11) NOT NULL,
  `price_category` int(11) NOT NULL,
  `finyear` varchar(20) NOT NULL,
  `invoice_number` varchar(50) NOT NULL,
  `purchase_quantity` int(11) NOT NULL,
  `purchase_price` double NOT NULL,
  `discount_price` bigint(20) NOT NULL,
  `discount_type` int(11) NOT NULL,
  `tax_per` float NOT NULL DEFAULT 0,
  `total_price` double NOT NULL,
  `purchase_date` date NOT NULL,
  `stockstatus` int(11) NOT NULL,
  `purchase_status` int(11) NOT NULL,
  PRIMARY KEY (`purchase_id`)
) ENGINE=InnoDB AUTO_INCREMENT=22 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_purchase`
--

INSERT INTO `tbl_purchase` (`purchase_id`, `product_id_fk`, `supp_id`, `cmp_id`, `price_category`, `finyear`, `invoice_number`, `purchase_quantity`, `purchase_price`, `discount_price`, `discount_type`, `tax_per`, `total_price`, `purchase_date`, `stockstatus`, `purchase_status`) VALUES
(3, 1, 1, 5, 3, '3', '1234567890', 20, 300, 0, 1, 0, 6000, '2021-05-06', 1, 1),
(4, 3, 1, 5, 3, '3', '1234567890', 10, 3, 0, 1, 0, 30, '2021-05-06', 1, 1),
(5, 4, 1, 5, 3, '3', '1234567890', 5, 100, 0, 1, 0, 500, '2021-05-06', 1, 1),
(6, 1, 1, 5, 1, '3', '123', 10, 100, 10, 0, 0, 990, '2021-05-07', 0, 0),
(7, 3, 1, 5, 1, '3', '213124', 10, 1, 0, 1, 0, 10, '2021-05-06', 0, 0),
(8, 3, 1, 5, 1, '3', '465', 10, 1, 0, 1, 0, 10, '2021-05-10', 0, 2),
(9, 1, 1, 5, 1, '3', '365', 10, 100, 0, 1, 0, 1000, '2021-05-10', 0, 2),
(10, 1, 1, 5, 1, '3', '456', 10, 100, 0, 1, 0, 1000, '2021-05-10', 0, 2),
(11, 1, 1, 5, 4, '3', '852', 10, 400, 0, 1, 0, 4000, '2021-05-10', 0, 1),
(12, 1, 1, 5, 1, '3', '2020', 10, 100, 0, 1, 0, 1000, '2021-05-11', 1, 1),
(13, 4, 1, 5, 1, '3', '2020', 10, 100, 500, 1, 0, 500, '2021-05-11', 1, 1),
(14, 1, 1, 5, 1, '3', '2021', 10, 100, 100, 0, 0, 900, '2021-05-11', 1, 1),
(15, 5, 1, 5, 1, '3', '2021', 10, 100, 0, 1, 0, 1000, '2021-05-11', 1, 1),
(16, 3, 1, 5, 1, '3', '2022', 10, 1, 5, 0, 0, 5, '2021-05-11', 1, 1),
(17, 5, 1, 5, 1, '3', '2022', 10, 100, 0, 1, 0, 1000, '2021-05-11', 1, 1),
(18, 1, 1, 5, 1, '3', '7', 10, 100, 0, 1, 0, 1000, '2021-05-10', 0, 0),
(19, 3, 1, 5, 1, '3', '8', 10, 1, 0, 1, 0, 10, '2021-05-12', 0, 0),
(20, 6, 1, 5, 1, '3', '44', 50, 125, 0, 1, 0, 6250, '2021-05-12', 1, 1),
(21, 6, 1, 5, 1, '3', '99', -5, 125, 0, 1, 0, -625, '2021-05-12', 1, 1);

-- --------------------------------------------------------

--
-- Table structure for table `tbl_purchasepayments`
--

DROP TABLE IF EXISTS `tbl_purchasepayments`;
CREATE TABLE IF NOT EXISTS `tbl_purchasepayments` (
  `purchase_payment_id` int(11) NOT NULL AUTO_INCREMENT,
  `invoice_number` int(11) NOT NULL,
  `tax_amount` double NOT NULL,
  `bill_discount` double NOT NULL,
  `bill_discount_type` int(11) NOT NULL,
  `frieght` double NOT NULL,
  `packing_charge` double NOT NULL,
  `net_total` double NOT NULL,
  `cash_paid` double NOT NULL,
  `bank_paid` double NOT NULL,
  `old_balance` double NOT NULL,
  `net_balance` double NOT NULL,
  `payment_status` int(11) NOT NULL,
  PRIMARY KEY (`purchase_payment_id`)
) ENGINE=InnoDB AUTO_INCREMENT=15 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_purchasepayments`
--

INSERT INTO `tbl_purchasepayments` (`purchase_payment_id`, `invoice_number`, `tax_amount`, `bill_discount`, `bill_discount_type`, `frieght`, `packing_charge`, `net_total`, `cash_paid`, `bank_paid`, `old_balance`, `net_balance`, `payment_status`) VALUES
(2, 1234567890, 50, 80, 0, 50, 50, 6600, 0, 0, 6190, 12790, 1),
(3, 123, 20, 20, 0, 5, 5, 1000, 0, 0, 12790, 13790, 0),
(4, 213124, 0, 0, 1, 0, 0, 10, 0, 0, 12790, 12800, 0),
(5, 465, 0, 0, 1, 0, 0, 10, 0, 0, 12800, 12810, 1),
(6, 365, 0, 0, 1, 0, 0, 1000, 0, 0, 12800, 13800, 1),
(7, 456, 0, 0, 1, 0, 0, 1000, 0, 0, 12800, 13800, 1),
(8, 2020, 0, 0, 1, 0, 0, 1500, 0, 0, 12800, 14300, 1),
(9, 2021, 0, 0, 1, 0, 0, 1900, 0, 0, 14300, 16200, 1),
(10, 2022, 0, 0, 1, 0, 0, 1005, 0, 0, 16200, 17205, 1),
(11, 7, 0, 0, 1, 0, 0, 1000, 0, 0, 17195, 18195, 0),
(12, 8, 0, 0, 1, 0, 0, 10, 0, 0, 17195, 17205, 0),
(13, 44, 0, 0, 1, 0, 0, 6250, 0, 0, 17195, 23445, 1),
(14, 99, 0, 0, 1, 0, 0, -625, 0, 0, 23445, 22820, 1);

-- --------------------------------------------------------

--
-- Table structure for table `tbl_rawmaterials`
--

DROP TABLE IF EXISTS `tbl_rawmaterials`;
CREATE TABLE IF NOT EXISTS `tbl_rawmaterials` (
  `raw_id` int(11) NOT NULL AUTO_INCREMENT,
  `prod_id` int(11) NOT NULL,
  `raw_itemid` int(11) NOT NULL,
  `raw_quantity` int(11) NOT NULL,
  `raw_status` int(11) NOT NULL,
  PRIMARY KEY (`raw_id`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_rawmaterials`
--

INSERT INTO `tbl_rawmaterials` (`raw_id`, `prod_id`, `raw_itemid`, `raw_quantity`, `raw_status`) VALUES
(1, 2, 1, 1, 0),
(2, 3, 4, 1, 0),
(3, 3, 4, 4, 1),
(4, 3, 1, 1, 1);

-- --------------------------------------------------------

--
-- Table structure for table `tbl_receipt`
--

DROP TABLE IF EXISTS `tbl_receipt`;
CREATE TABLE IF NOT EXISTS `tbl_receipt` (
  `receipt_id` int(11) NOT NULL AUTO_INCREMENT,
  `receip_id_fk` varchar(11) NOT NULL,
  `finyear_id_fk` int(11) NOT NULL,
  `receipt_amount` varchar(100) NOT NULL,
  `rept_date` date NOT NULL,
  `received_to` varchar(200) NOT NULL,
  `narration` varchar(250) NOT NULL,
  `receipt_status` int(11) NOT NULL,
  `company_id_fk` int(11) NOT NULL,
  PRIMARY KEY (`receipt_id`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_receipt`
--

INSERT INTO `tbl_receipt` (`receipt_id`, `receip_id_fk`, `finyear_id_fk`, `receipt_amount`, `rept_date`, `received_to`, `narration`, `receipt_status`, `company_id_fk`) VALUES
(1, '2', 3, '1000', '2021-05-18', 'A', ' ABC ', 0, 0),
(2, '2', 3, '1000', '2021-05-19', 'Cash', ' ABC FMDSGDM', 0, 0),
(3, '2', 3, '1000', '2021-03-08', 'Cash', ' DFBDB', 1, 0),
(4, '2', 3, '1', '2021-05-10', 'Cash', ' SDGFGF ', 0, 5);

-- --------------------------------------------------------

--
-- Table structure for table `tbl_receipthead`
--

DROP TABLE IF EXISTS `tbl_receipthead`;
CREATE TABLE IF NOT EXISTS `tbl_receipthead` (
  `receipt_id` int(11) NOT NULL AUTO_INCREMENT,
  `receipt_head` varchar(250) NOT NULL,
  `receipt_desc` varchar(255) NOT NULL,
  `receipt_status` int(11) NOT NULL,
  PRIMARY KEY (`receipt_id`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_receipthead`
--

INSERT INTO `tbl_receipthead` (`receipt_id`, `receipt_head`, `receipt_desc`, `receipt_status`) VALUES
(1, 'RECEIPT', 'FSKJFBSDFNDKGNDKGND', 0),
(2, 'RECEIPT', 'FLKNFKDF', 1);

-- --------------------------------------------------------

--
-- Table structure for table `tbl_sale`
--

DROP TABLE IF EXISTS `tbl_sale`;
CREATE TABLE IF NOT EXISTS `tbl_sale` (
  `sale_id` int(11) NOT NULL AUTO_INCREMENT,
  `product_id_fk` int(11) NOT NULL,
  `cust_id` int(11) NOT NULL DEFAULT 0,
  `cmp_id` int(11) NOT NULL,
  `price_category` int(11) NOT NULL,
  `finyear` varchar(20) NOT NULL,
  `invoice_number` varchar(50) NOT NULL,
  `sale_quantity` int(11) NOT NULL,
  `sale_price` double NOT NULL,
  `discount_price` bigint(20) NOT NULL,
  `discount_type` int(11) NOT NULL,
  `tax_per` float NOT NULL DEFAULT 0,
  `total_price` double NOT NULL,
  `sale_date` date NOT NULL,
  `stockstatus` int(11) NOT NULL,
  `sale_status` int(11) NOT NULL,
  PRIMARY KEY (`sale_id`)
) ENGINE=InnoDB AUTO_INCREMENT=20 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_sale`
--

INSERT INTO `tbl_sale` (`sale_id`, `product_id_fk`, `cust_id`, `cmp_id`, `price_category`, `finyear`, `invoice_number`, `sale_quantity`, `sale_price`, `discount_price`, `discount_type`, `tax_per`, `total_price`, `sale_date`, `stockstatus`, `sale_status`) VALUES
(16, 8, 5, 5, 1, '3', '', -2, 140, 0, 1, 0, -280, '1970-01-01', 0, 1),
(17, 9, 5, 5, 1, '3', '1', 2, 265, 0, 1, 0, 397.5, '2021-05-18', 0, 1),
(18, 1, 5, 5, 1, '3', '10', 1, 100, 0, 1, 0, 100, '2021-06-14', 0, 1),
(19, 1, 5, 5, 2, '3', '', 2, 200, 10, 1, 0, 360, '2021-10-19', 0, 1);

-- --------------------------------------------------------

--
-- Table structure for table `tbl_salepayments`
--

DROP TABLE IF EXISTS `tbl_salepayments`;
CREATE TABLE IF NOT EXISTS `tbl_salepayments` (
  `sale_payment_id` int(11) NOT NULL AUTO_INCREMENT,
  `invoice_number` int(11) NOT NULL,
  `tax_amount` double NOT NULL,
  `bill_discount` double NOT NULL,
  `bill_discount_type` int(11) NOT NULL,
  `frieght` double NOT NULL,
  `packing_charge` double NOT NULL,
  `net_total` double NOT NULL,
  `cash_paid` double NOT NULL,
  `bank_paid` double NOT NULL,
  `bank_id` int(11) NOT NULL,
  `old_balance` double NOT NULL,
  `net_balance` double NOT NULL,
  `payment_status` int(11) NOT NULL,
  PRIMARY KEY (`sale_payment_id`)
) ENGINE=InnoDB AUTO_INCREMENT=13 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_salepayments`
--

INSERT INTO `tbl_salepayments` (`sale_payment_id`, `invoice_number`, `tax_amount`, `bill_discount`, `bill_discount_type`, `frieght`, `packing_charge`, `net_total`, `cash_paid`, `bank_paid`, `bank_id`, `old_balance`, `net_balance`, `payment_status`) VALUES
(9, 0, 0, 0, 1, 0, 0, -280, 0, 0, 0, 1000, 720, 1),
(10, 1, 0, 0, 1, 0, 0, 397.5, 0, 0, 0, 720, 1117.5, 1),
(11, 10, 0, 0, 1, 0, 0, 100, 100, 0, 0, 1117.5, 1117.5, 1),
(12, 0, 0, 0, 1, 0, 0, 360, 500, 0, 0, 1117.5, 0, 1);

-- --------------------------------------------------------

--
-- Table structure for table `tbl_stock`
--

DROP TABLE IF EXISTS `tbl_stock`;
CREATE TABLE IF NOT EXISTS `tbl_stock` (
  `stock_id` int(11) NOT NULL AUTO_INCREMENT,
  `finyear` int(11) DEFAULT NULL,
  `item_id` int(11) NOT NULL,
  `stock` int(11) NOT NULL DEFAULT 0,
  `company_id` int(11) NOT NULL,
  `stock_status` int(11) NOT NULL,
  PRIMARY KEY (`stock_id`)
) ENGINE=InnoDB AUTO_INCREMENT=10 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_stock`
--

INSERT INTO `tbl_stock` (`stock_id`, `finyear`, `item_id`, `stock`, `company_id`, `stock_status`) VALUES
(1, 3, 1, 37, 5, 1),
(2, 3, 2, 0, 5, 0),
(3, 3, 3, 20, 5, 1),
(4, 3, 4, 15, 5, 1),
(5, 3, 5, 20, 5, 1),
(6, 3, 6, 20, 5, 1),
(7, 3, 7, 18, 5, 1),
(8, 3, 8, 32, 5, 1),
(9, 3, 9, -2, 5, 1);

-- --------------------------------------------------------

--
-- Table structure for table `tbl_subcategory`
--

DROP TABLE IF EXISTS `tbl_subcategory`;
CREATE TABLE IF NOT EXISTS `tbl_subcategory` (
  `subcategory_id` int(11) NOT NULL AUTO_INCREMENT,
  `subcategory_name` varchar(255) NOT NULL,
  `subcategory_description` text NOT NULL,
  `main_category_id` int(11) NOT NULL,
  `subcategory_status` int(11) NOT NULL,
  PRIMARY KEY (`subcategory_id`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_subcategory`
--

INSERT INTO `tbl_subcategory` (`subcategory_id`, `subcategory_name`, `subcategory_description`, `main_category_id`, `subcategory_status`) VALUES
(1, 'subCategory1', 'subCategory1', 5, 1),
(2, 'subCategory3', 'subCategory3', 7, 0),
(3, 'subCategory3', 'subCategory3', 7, 1);

-- --------------------------------------------------------

--
-- Table structure for table `tbl_supplier`
--

DROP TABLE IF EXISTS `tbl_supplier`;
CREATE TABLE IF NOT EXISTS `tbl_supplier` (
  `supplier_id` int(11) NOT NULL AUTO_INCREMENT,
  `supplier_name` varchar(60) NOT NULL,
  `supplier_address` text NOT NULL,
  `supplier_phone` varchar(20) NOT NULL,
  `supplier_email` varchar(50) NOT NULL,
  `supplier_oldbal` double NOT NULL,
  `company_id` int(11) NOT NULL,
  `supplier_pcategory` int(11) NOT NULL,
  `supplier_status` int(11) NOT NULL,
  `debit_credit` int(11) NOT NULL,
  `supplier_type` enum('0','1') NOT NULL COMMENT 'debitor=0&Creditor=1',
  PRIMARY KEY (`supplier_id`)
) ENGINE=InnoDB AUTO_INCREMENT=7 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_supplier`
--

INSERT INTO `tbl_supplier` (`supplier_id`, `supplier_name`, `supplier_address`, `supplier_phone`, `supplier_email`, `supplier_oldbal`, `company_id`, `supplier_pcategory`, `supplier_status`, `debit_credit`, `supplier_type`) VALUES
(1, 'new supplier', 'abc', '123', 'abc@gmail.com', 22820, 5, 1, 1, 0, '1'),
(2, 'new supplier2', 'abcd', '4948949', 'abcd@gmail.com', 20000, 6, 2, 0, 0, '1'),
(3, 'ashkar asr', 'calicut', '999999999', 'ashkarasr@gmail.com', 1500, 6, 3, 1, 0, '1'),
(4, 'Rajeev R', 'adetrfwefvcadftwf', '9876543210', 'hello@edge.com', 100, 5, 1, 1, 0, '0'),
(6, 'Aroma Supplierswrtfwertwer', 'adasdsdasd', '9876543210', 'hello@edge.com', 100, 6, 1, 0, 0, '0');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_taxdetails`
--

DROP TABLE IF EXISTS `tbl_taxdetails`;
CREATE TABLE IF NOT EXISTS `tbl_taxdetails` (
  `tax_id` int(11) NOT NULL AUTO_INCREMENT,
  `taxname` varchar(50) NOT NULL,
  `taxamount` double NOT NULL,
  `taxdetails` text NOT NULL,
  `tax_status` int(11) NOT NULL,
  PRIMARY KEY (`tax_id`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_taxdetails`
--

INSERT INTO `tbl_taxdetails` (`tax_id`, `taxname`, `taxamount`, `taxdetails`, `tax_status`) VALUES
(1, 'GST', 10, 'sdgsgdf', 0),
(2, 'GST', 5, 'gst', 1);

-- --------------------------------------------------------

--
-- Table structure for table `tbl_type`
--

DROP TABLE IF EXISTS `tbl_type`;
CREATE TABLE IF NOT EXISTS `tbl_type` (
  `type_id` int(11) NOT NULL AUTO_INCREMENT,
  `type_name` varchar(50) NOT NULL,
  `type_status` int(11) NOT NULL,
  PRIMARY KEY (`type_id`)
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_type`
--

INSERT INTO `tbl_type` (`type_id`, `type_name`, `type_status`) VALUES
(1, 'ASSET', 1),
(2, 'LIABILITY', 1),
(3, 'INCOME', 1),
(4, 'EXPENSE', 1),
(5, 'OTHER', 1);

-- --------------------------------------------------------

--
-- Table structure for table `tbl_unit`
--

DROP TABLE IF EXISTS `tbl_unit`;
CREATE TABLE IF NOT EXISTS `tbl_unit` (
  `unit_id` int(11) NOT NULL AUTO_INCREMENT,
  `unit_name` varchar(255) NOT NULL,
  `unit_description` text NOT NULL,
  `unit_status` int(11) NOT NULL,
  PRIMARY KEY (`unit_id`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_unit`
--

INSERT INTO `tbl_unit` (`unit_id`, `unit_name`, `unit_description`, `unit_status`) VALUES
(1, 'KG', '', 0),
(2, 'Gram', '', 1),
(3, 'KG', '', 1),
(4, 'PCS', '', 1);

-- --------------------------------------------------------

--
-- Table structure for table `tbl_voucher`
--

DROP TABLE IF EXISTS `tbl_voucher`;
CREATE TABLE IF NOT EXISTS `tbl_voucher` (
  `voucher_id` int(11) NOT NULL AUTO_INCREMENT,
  `vouch_id_fk` int(11) NOT NULL,
  `finyear_id_fk` int(11) NOT NULL,
  `voucher_amount` varchar(100) NOT NULL,
  `paid_from` varchar(200) NOT NULL,
  `voucher_date` date NOT NULL,
  `narration` varchar(250) NOT NULL,
  `voucher_status` int(11) NOT NULL,
  `company_id_fk` int(11) NOT NULL,
  PRIMARY KEY (`voucher_id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `tbl_vouchhead`
--

DROP TABLE IF EXISTS `tbl_vouchhead`;
CREATE TABLE IF NOT EXISTS `tbl_vouchhead` (
  `vouch_id` int(11) NOT NULL AUTO_INCREMENT,
  `vouch_head` varchar(250) NOT NULL,
  `vouch_desc` varchar(255) NOT NULL,
  `vouch_status` int(11) NOT NULL,
  PRIMARY KEY (`vouch_id`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_vouchhead`
--

INSERT INTO `tbl_vouchhead` (`vouch_id`, `vouch_head`, `vouch_desc`, `vouch_status`) VALUES
(2, 'VOUCHER1', 'SNSDBNKSDNFKJDSFBDSKJFD', 0),
(3, 'VOUCHER1', 'DAF', 1);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
