-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: localhost
-- Generation Time: Oct 28, 2021 at 12:30 PM
-- Server version: 10.4.21-MariaDB
-- PHP Version: 7.4.24

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

CREATE TABLE `tbl_advance` (
  `adv_id` int(11) NOT NULL,
  `company_id` int(11) NOT NULL,
  `emp_id` varchar(50) NOT NULL,
  `adv_month` int(11) NOT NULL,
  `adv_amount` int(11) NOT NULL,
  `adv_date` date NOT NULL,
  `adv_status` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_advance`
--

INSERT INTO `tbl_advance` (`adv_id`, `company_id`, `emp_id`, `adv_month`, `adv_amount`, `adv_date`, `adv_status`) VALUES
(1, 5, '1', 4, 2000, '2021-04-16', 1);

-- --------------------------------------------------------

--
-- Table structure for table `tbl_area`
--

CREATE TABLE `tbl_area` (
  `area_id` int(11) NOT NULL,
  `area_name` varchar(50) NOT NULL,
  `area_status` int(11) NOT NULL,
  `area_description` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

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

CREATE TABLE `tbl_bank` (
  `bank_id` int(11) NOT NULL,
  `bank_name` varchar(50) DEFAULT NULL,
  `bank_accno` varchar(50) DEFAULT NULL,
  `bank_branch` varchar(50) DEFAULT NULL,
  `bank_ifsc` varchar(50) DEFAULT NULL,
  `bank_cmp` int(11) DEFAULT NULL,
  `bank_status` int(11) DEFAULT NULL,
  `old_balance` int(11) NOT NULL,
  `debit_credit` int(11) DEFAULT NULL,
  `bank_debit_credit` tinyint(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_bank`
--

INSERT INTO `tbl_bank` (`bank_id`, `bank_name`, `bank_accno`, `bank_branch`, `bank_ifsc`, `bank_cmp`, `bank_status`, `old_balance`, `debit_credit`, `bank_debit_credit`) VALUES
(2, 'A', '213', 'DSF', '1231', 5, 0, 0, 0, 0),
(3, 'm', '12121332', 'DSFsfasfsdgsddsgsdgdsg', '12314665654541321', 5, 0, 0, 0, 0),
(4, 'Canara Bank', '123', 'DSF', '123', 5, 1, 0, 1, 0),
(5, 'State Bank of India', '6546873123', 'waedasds', 'ADCV14412', 5, 1, 0, NULL, 1),
(7, 'ING Vysya Bank2323', '7894561230', 'Edapally', 'AQWL4758PQ', 6, 0, 0, NULL, 1),
(8, 'FEDERAL BANK', '00001235645569887', 'Malappuram', 'FDRL001241', 6, 1, 0, NULL, 0);

-- --------------------------------------------------------

--
-- Table structure for table `tbl_bank_details`
--

CREATE TABLE `tbl_bank_details` (
  `bank_id` int(10) NOT NULL,
  `bank_name` varchar(255) NOT NULL,
  `bank_ac_no` mediumtext NOT NULL,
  `bank_created_at` date NOT NULL,
  `bank_updated_at` date NOT NULL,
  `bank_status` int(10) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_bank_details`
--

INSERT INTO `tbl_bank_details` (`bank_id`, `bank_name`, `bank_ac_no`, `bank_created_at`, `bank_updated_at`, `bank_status`) VALUES
(1, 'ICICI BANK', '123456789', '2021-10-25', '2021-10-25', 1),
(2, 'HDFC BANK', '123456789', '2021-10-25', '2021-10-25', 1),
(3, 'SBI BANK', '123456789', '2021-10-25', '2021-10-25', 1);

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
-- Table structure for table `tbl_color`
--

CREATE TABLE `tbl_color` (
  `color_id` int(10) NOT NULL,
  `company_id_fk` int(10) DEFAULT NULL,
  `color_name` varchar(255) DEFAULT NULL,
  `color_status` int(10) DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_color`
--

INSERT INTO `tbl_color` (`color_id`, `company_id_fk`, `color_name`, `color_status`) VALUES
(6, 7, '#D88', 1),
(5, 5, '#AAA', 1),
(4, 6, '#B84', 1),
(7, 8, '#84B', 1);

-- --------------------------------------------------------

--
-- Table structure for table `tbl_companyinfo`
--

CREATE TABLE `tbl_companyinfo` (
  `cmp_id` int(11) NOT NULL,
  `cmp_name` varchar(50) NOT NULL,
  `cmp_adress` text DEFAULT NULL,
  `cmp_gst` varchar(50) DEFAULT NULL,
  `cmp_email` varchar(50) DEFAULT NULL,
  `cmp_phone` varchar(50) DEFAULT NULL,
  `cmp_status` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_companyinfo`
--

INSERT INTO `tbl_companyinfo` (`cmp_id`, `cmp_name`, `cmp_adress`, `cmp_gst`, `cmp_email`, `cmp_phone`, `cmp_status`) VALUES
(5, 'Sarm1', 'kaloor', '123', 'wahysdf@gmail.com', '9988774', 1),
(6, 'Sarm2', 'dgdsh', '215654', 'wahy@gmail.com', '9988774455', 1),
(7, 'Sarm3', 'La-gt1-34/4', '215654', 'wahy@gmail.com', '7894561230', 1),
(8, 'sarm4', 'fdadsasdad', '215654', 'raj@123.com', '7894561230', 1);

-- --------------------------------------------------------

--
-- Table structure for table `tbl_customer`
--

CREATE TABLE `tbl_customer` (
  `cust_id` int(11) NOT NULL,
  `company_id` int(11) NOT NULL,
  `custname` varchar(50) NOT NULL,
  `custaddress` text NOT NULL,
  `custphone` bigint(20) NOT NULL,
  `custemail` varchar(50) NOT NULL,
  `old_balance` double NOT NULL DEFAULT 0,
  `custstatus` int(11) NOT NULL,
  `cust_pcategory` int(11) NOT NULL,
  `debit_credit` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

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
(12, 6, 'Mukesh456789', 'poverty', 7894561230, 'help2@help.com', 200000, 0, 1, 0),
(13, 6, 'JISHNU', 'TESTADDRESS', 8089706022, 'TEST@GMAIL.COM', 120, 1, 1, 1);

-- --------------------------------------------------------

--
-- Table structure for table `tbl_empabsent`
--

CREATE TABLE `tbl_empabsent` (
  `absent_id` int(11) NOT NULL,
  `absent_date` date NOT NULL,
  `month` int(11) NOT NULL,
  `emp_id` int(11) NOT NULL,
  `absent_status` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_empabsent`
--

INSERT INTO `tbl_empabsent` (`absent_id`, `absent_date`, `month`, `emp_id`, `absent_status`) VALUES
(1, '2021-04-09', 4, 1, 1);

-- --------------------------------------------------------

--
-- Table structure for table `tbl_empattendance`
--

CREATE TABLE `tbl_empattendance` (
  `att_id` int(11) NOT NULL,
  `att_date` date NOT NULL,
  `emp_id` int(11) NOT NULL,
  `att_status` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

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

CREATE TABLE `tbl_employee` (
  `emp_id` int(11) NOT NULL,
  `company_id` int(11) NOT NULL,
  `emp_name` varchar(50) NOT NULL,
  `emp_address` text NOT NULL,
  `emp_phone` bigint(20) NOT NULL,
  `emp_email` varchar(50) NOT NULL,
  `emp_date` date NOT NULL,
  `emp_mode` tinyint(10) NOT NULL COMMENT 'Wages=0&Salary=1',
  `emp_salary` int(11) NOT NULL,
  `emp_status` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_employee`
--

INSERT INTO `tbl_employee` (`emp_id`, `company_id`, `emp_name`, `emp_address`, `emp_phone`, `emp_email`, `emp_date`, `emp_mode`, `emp_salary`, `emp_status`) VALUES
(1, 5, 'AJITH', '   gdgh ', 213, 'abc@gmail.com', '2021-01-04', 0, 30000, 1),
(2, 5, 'Akhilesh', '  fgsdgdf', 213, 'abc@gmail.com', '2021-01-04', 0, 20000, 1),
(3, 6, 'abc', '  gdsgd', 213, 'abc@gmail.com', '2021-01-04', 0, 40000, 1),
(4, 5, 'Jishnu Mohan', '    erqeasdasdsad  ', 98745614233, 'wewe@hr.com', '1970-01-01', 1, 1000, 1),
(5, 5, 'Anoop', 'Thachillath House,  Test post Po, Test Place, Malappuram, Kerala  ', 9562546598, 'test@test.com', '1970-01-01', 0, 36000, 1);

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
(1, '2021-2022', '2021-04-01', '2022-03-31', 0, 0),
(2, '2021-2022', '2021-04-01', '2022-03-31', 0, 0),
(3, '2021-2022', '2021-04-01', '2021-03-31', 1, 1);

-- --------------------------------------------------------

--
-- Table structure for table `tbl_groups`
--

CREATE TABLE `tbl_groups` (
  `group_id` int(11) NOT NULL,
  `group_name` varchar(100) NOT NULL,
  `group_desc` text NOT NULL,
  `group_status` int(11) NOT NULL,
  `type_id_fk` int(11) NOT NULL,
  `default` int(11) NOT NULL COMMENT '1=default',
  `group_parent_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

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

CREATE TABLE `tbl_journal` (
  `journal_id` int(11) NOT NULL,
  `company_id_fk` int(11) NOT NULL,
  `fin_year` int(11) NOT NULL,
  `journal_date` date NOT NULL,
  `ledger_head_id` int(11) NOT NULL,
  `debit_amt` double NOT NULL DEFAULT 0,
  `credit_amt` double NOT NULL DEFAULT 0,
  `narration` text NOT NULL,
  `note` text NOT NULL,
  `journal_status` int(11) NOT NULL,
  `journal_inv` varchar(25) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

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

CREATE TABLE `tbl_ledgerbalance` (
  `led_id` int(11) NOT NULL,
  `company_id_fk` int(11) NOT NULL,
  `ledgerhead_id_fk` int(11) NOT NULL,
  `date` date NOT NULL,
  `balance` double NOT NULL DEFAULT 0,
  `debit_credit` int(11) NOT NULL COMMENT '1=debit 2=credit',
  `ledgerbalance_status` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

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
(32, 5, 17, '2021-10-20', 3000000, 1, 1),
(33, 5, 24, '2021-10-24', 200, 2, 1);

-- --------------------------------------------------------

--
-- Table structure for table `tbl_ledgerhead`
--

CREATE TABLE `tbl_ledgerhead` (
  `ledgerhead_id` int(11) NOT NULL,
  `group_id_fk` int(11) NOT NULL,
  `ledger_head` varchar(100) NOT NULL,
  `ledgerhead_desc` text NOT NULL,
  `opening_bal` double NOT NULL,
  `debit_or_credit` int(11) NOT NULL COMMENT '1=debit 2=credit',
  `ledgerhead_status` int(11) NOT NULL,
  `company_id_fk` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

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
(17, 15, 'JISHNU', 'Business person', 3000000, 2, 1, 5),
(18, 15, 'Rajnikanth', 'Customer', 0, 2, 1, 5),
(19, 15, 'Mukesh456789', 'Customer', 0, 2, 0, 6),
(21, 21, 'Aroma Supplierswrtfwertwer', 'Supplier', 0, 0, 0, 6),
(22, 15, 'JISHNU', 'Customer', 0, 0, 1, 6),
(23, 21, 'ABHI', 'Supplier', 0, 1, 1, 5),
(24, 27, 'TAX @ PURCHASE', 'TEST', 200, 1, 1, 5),
(25, 12, '', 'Bank', 0, 0, 0, 6),
(26, 12, 'ING Vysya Bank2323', 'Bank', 0, 2, 0, 6),
(27, 12, 'FEDERAL BANK', 'Bank', 0, 1, 1, 6);

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
  `cmp_id` int(11) NOT NULL,
  `created_date` datetime NOT NULL,
  `updated_date` datetime NOT NULL,
  `status` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_login`
--

INSERT INTO `tbl_login` (`id`, `user_name`, `email`, `password`, `user_type`, `cmp_id`, `created_date`, `updated_date`, `status`) VALUES
(1, 'admin', 'admin@sarm.com', '1234', 'A', 0, '2021-01-25 00:00:00', '0000-00-00 00:00:00', 1),
(5, 'user1', 'wahysdf@gmail.com', '123', 'C', 5, '2021-04-10 00:00:00', '2021-04-12 00:00:00', 1),
(6, 'usera', 'wahy@gmail.com', '1234', 'C', 6, '2021-04-12 00:00:00', '0000-00-00 00:00:00', 1),
(7, 'user4', 'wahy@gmail.com', '1234', 'C', 7, '2021-10-26 00:00:00', '0000-00-00 00:00:00', 1),
(8, 'user5', 'raj@123.com', '1234', 'C', 8, '2021-10-26 00:00:00', '0000-00-00 00:00:00', 1);

-- --------------------------------------------------------

--
-- Table structure for table `tbl_openingstock`
--

CREATE TABLE `tbl_openingstock` (
  `opening_id` int(11) NOT NULL,
  `company_id` int(11) NOT NULL,
  `item_id` int(11) NOT NULL,
  `stock` int(25) NOT NULL,
  `opening_status` int(11) NOT NULL,
  `finyr` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

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
(56, 5, 66, 0, 1, 3),
(57, 6, 67, 1000, 1, 3);

-- --------------------------------------------------------

--
-- Table structure for table `tbl_overtime`
--

CREATE TABLE `tbl_overtime` (
  `ot_id` int(11) NOT NULL,
  `ot_cmp_id_fk` int(11) NOT NULL,
  `ot_emp_id_fk` int(11) NOT NULL,
  `ot_amount` varchar(100) NOT NULL,
  `ot_date` varchar(20) NOT NULL,
  `ot_status` tinyint(4) NOT NULL,
  `created_at` datetime NOT NULL,
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_overtime`
--

INSERT INTO `tbl_overtime` (`ot_id`, `ot_cmp_id_fk`, `ot_emp_id_fk`, `ot_amount`, `ot_date`, `ot_status`, `created_at`, `updated_at`) VALUES
(1, 6, 4, '2500', '2021-10-21', 1, '2021-10-28 07:45:19', '2021-10-28 04:50:58');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_payroll`
--

CREATE TABLE `tbl_payroll` (
  `payroll_id` int(11) NOT NULL,
  `company_id` int(11) DEFAULT NULL,
  `payroll_emp_id` int(11) DEFAULT NULL,
  `payroll_basicsalary` int(11) DEFAULT NULL,
  `payroll_leaveamt` int(11) DEFAULT NULL,
  `payroll_advance` int(11) DEFAULT NULL,
  `payroll_salary` int(11) DEFAULT NULL,
  `payroll_salarydate` date DEFAULT NULL,
  `payroll_status` int(11) DEFAULT NULL,
  `payroll_salmonth` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_payroll`
--

INSERT INTO `tbl_payroll` (`payroll_id`, `company_id`, `payroll_emp_id`, `payroll_basicsalary`, `payroll_leaveamt`, `payroll_advance`, `payroll_salary`, `payroll_salarydate`, `payroll_status`, `payroll_salmonth`) VALUES
(1, 5, 1, 30000, 1, 2000, 27000, '2021-04-30', 1, 4);

-- --------------------------------------------------------

--
-- Table structure for table `tbl_pricecategory`
--

CREATE TABLE `tbl_pricecategory` (
  `pcategory_id` int(11) NOT NULL,
  `pcategory_name` varchar(255) NOT NULL,
  `pcategory_description` text NOT NULL,
  `pcategory_status` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

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

CREATE TABLE `tbl_pricelist` (
  `price_id` int(11) NOT NULL,
  `item_id` int(11) NOT NULL,
  `pcategory_id` int(11) NOT NULL,
  `item_price` int(20) DEFAULT NULL,
  `company_id` int(11) NOT NULL,
  `price_status` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

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
(120, 66, 4, NULL, 5, 1),
(121, 67, 1, 122, 6, 1),
(122, 67, 2, 130, 6, 1),
(123, 67, 3, 150, 6, 1),
(124, 67, 4, 170, 6, 1);

-- --------------------------------------------------------

--
-- Table structure for table `tbl_product`
--

CREATE TABLE `tbl_product` (
  `product_id` int(11) NOT NULL,
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
  `goods_or_service` int(10) NOT NULL COMMENT 'goods=0&Service=1',
  `company_id` int(11) NOT NULL,
  `active_status` int(11) NOT NULL DEFAULT 1 COMMENT '(1=active,0=desabled)'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_product`
--

INSERT INTO `tbl_product` (`product_id`, `supplier_id`, `maincategory_id`, `subcategory_id`, `product_code`, `product_name`, `product_unit`, `product_description`, `min_stock`, `product_status`, `product_type`, `goods_or_service`, `company_id`, `active_status`) VALUES
(1, 1, 5, 1, 'code1', 'Acer Display', '2', 'ADFHDF', 5, 1, 'RM', 0, 5, 1),
(2, 0, 5, 1, 'mp1', 'cover', '2', 'ghdfgh ggds', 10, 0, 'MP', 0, 5, 1),
(3, 0, 5, 1, 'mp22', 'Galaxyy', '2', 'trhyfh ', 15, 1, 'MP', 0, 5, 1),
(4, 1, 5, 1, 'code2', 'abc', '2', 'rehfeh', 1500, 1, 'RM', 0, 5, 1),
(5, 1, 5, 1, 'codes1', 'mobile', '2', 'sdfjagsakng', 10, 1, 'RM', 0, 5, 1),
(6, 1, 5, 1, 'AS00', 'ALUMINIUM SHEETS', '3', '', 0, 1, 'RM', 0, 5, 1),
(7, 1, 5, 1, 'AV00', 'ALUMINIUM VESSELS', '3', '', 0, 1, 'RM', 0, 5, 1),
(8, 1, 5, 1, 'PK00', 'PK SET', '4', '', 0, 1, 'RM', 0, 5, 1),
(9, 1, 5, 1, 'KLM1620', 'KALAM', '3', '', 0, 1, 'RM', 0, 5, 1),
(62, 1, 6, 1, 'code20', 'Viewsonic Display', '', 'Lcd Monitor', 0, 1, 'RM', 0, 5, 1),
(63, 1, 6, 1, 'code21', 'Dell Inspiron', '', 'Laptop', 0, 1, 'RM', 0, 5, 1),
(64, 1, 6, 1, 'code22', 'Epson Printer', '', 'Home Printer', 0, 1, 'RM', 0, 5, 1),
(65, 1, 6, 1, 'code23', 'Sonos Soundbar', '', 'Soundbar', 0, 1, 'RM', 0, 5, 1),
(66, 1, 6, 1, 'code24', 'Levis Jeans', '', 'Mens Jeans', 0, 1, 'RM', 0, 5, 1),
(67, 3, 5, 1, 'mp1', 'Acer Display', '3', 'adasd', 1500, 1, 'RM', 1, 6, 1);

-- --------------------------------------------------------

--
-- Table structure for table `tbl_production`
--

CREATE TABLE `tbl_production` (
  `production_id` int(11) NOT NULL,
  `company_id_fk` int(11) NOT NULL,
  `area_id_fk` int(11) NOT NULL,
  `fin_year` int(11) NOT NULL,
  `date` date NOT NULL,
  `production_status` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

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

CREATE TABLE `tbl_productioninput` (
  `input_id` int(11) NOT NULL,
  `production_id_fk` int(11) NOT NULL,
  `product_code` varchar(50) NOT NULL,
  `product_id` int(11) NOT NULL,
  `used_quantity` int(11) NOT NULL,
  `input_status` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

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

CREATE TABLE `tbl_productionoutput` (
  `output_id` int(11) NOT NULL,
  `production_id_fk` int(11) NOT NULL,
  `product_code` int(11) NOT NULL,
  `product_id` int(11) NOT NULL,
  `produced_quantity` int(11) NOT NULL,
  `output_status` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

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

CREATE TABLE `tbl_profit` (
  `id` int(11) NOT NULL,
  `cmp_id_fk` int(11) NOT NULL,
  `amount` int(11) NOT NULL,
  `profit_loss` int(11) NOT NULL COMMENT '1=profit,2=loss',
  `fin_year` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_profit`
--

INSERT INTO `tbl_profit` (`id`, `cmp_id_fk`, `amount`, `profit_loss`, `fin_year`) VALUES
(1, 5, 3500, 1, 3);

-- --------------------------------------------------------

--
-- Table structure for table `tbl_purchase`
--

CREATE TABLE `tbl_purchase` (
  `purchase_id` int(11) NOT NULL,
  `product_id_fk` int(11) NOT NULL,
  `supp_id` int(11) NOT NULL DEFAULT 0,
  `cmp_id` int(11) NOT NULL,
  `bank_id` int(10) DEFAULT NULL,
  `price_category` int(11) NOT NULL,
  `finyear` varchar(20) NOT NULL,
  `invoice_number` varchar(50) NOT NULL,
  `reference_bill_id` varchar(500) DEFAULT NULL,
  `purchase_quantity` int(11) NOT NULL,
  `purchase_price` double NOT NULL,
  `discount_price` bigint(20) NOT NULL,
  `discount_type` int(11) NOT NULL,
  `tax_per` float NOT NULL DEFAULT 0,
  `total_price` double NOT NULL,
  `purchase_date` date NOT NULL,
  `stockstatus` int(11) NOT NULL,
  `purchase_status` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_purchase`
--

INSERT INTO `tbl_purchase` (`purchase_id`, `product_id_fk`, `supp_id`, `cmp_id`, `bank_id`, `price_category`, `finyear`, `invoice_number`, `reference_bill_id`, `purchase_quantity`, `purchase_price`, `discount_price`, `discount_type`, `tax_per`, `total_price`, `purchase_date`, `stockstatus`, `purchase_status`) VALUES
(3, 1, 1, 5, NULL, 3, '3', '1234567890', NULL, 20, 300, 0, 1, 0, 6000, '2021-05-06', 1, 1),
(4, 3, 1, 5, NULL, 3, '3', '1234567890', NULL, 10, 3, 0, 1, 0, 30, '2021-05-06', 1, 1),
(5, 4, 1, 5, NULL, 3, '3', '1234567890', NULL, 5, 100, 0, 1, 0, 500, '2021-05-06', 1, 1),
(6, 1, 1, 5, NULL, 1, '3', '123', NULL, 10, 100, 10, 0, 0, 990, '2021-05-07', 0, 0),
(7, 3, 1, 5, NULL, 1, '3', '213124', NULL, 10, 1, 0, 1, 0, 10, '2021-05-06', 0, 0),
(8, 3, 1, 5, NULL, 1, '3', '465', NULL, 10, 1, 0, 1, 0, 10, '2021-05-10', 0, 2),
(9, 1, 1, 5, NULL, 1, '3', '365', NULL, 10, 100, 0, 1, 0, 1000, '2021-05-10', 0, 2),
(10, 1, 1, 5, NULL, 1, '3', '456', NULL, 10, 100, 0, 1, 0, 1000, '2021-05-10', 0, 2),
(11, 1, 1, 5, NULL, 4, '3', '852', NULL, 10, 400, 0, 1, 0, 4000, '2021-05-10', 0, 1),
(12, 1, 1, 5, NULL, 1, '3', '2020', NULL, 10, 100, 0, 1, 0, 1000, '2021-05-11', 1, 1),
(13, 4, 1, 5, NULL, 1, '3', '2020', NULL, 10, 100, 500, 1, 0, 500, '2021-05-11', 1, 1),
(14, 1, 1, 5, NULL, 1, '3', '2021', NULL, 10, 100, 100, 0, 0, 900, '2021-05-11', 1, 1),
(15, 5, 1, 5, NULL, 1, '3', '2021', NULL, 10, 100, 0, 1, 0, 1000, '2021-05-11', 1, 1),
(16, 3, 1, 5, NULL, 1, '3', '2022', NULL, 10, 1, 5, 0, 0, 5, '2021-05-11', 1, 1),
(17, 5, 1, 5, NULL, 1, '3', '2022', NULL, 10, 100, 0, 1, 0, 1000, '2021-05-11', 1, 1),
(18, 1, 1, 5, NULL, 1, '3', '7', NULL, 10, 100, 0, 1, 0, 1000, '2021-05-10', 0, 0),
(19, 3, 1, 5, NULL, 1, '3', '8', NULL, 10, 1, 0, 1, 0, 10, '2021-05-12', 0, 0),
(20, 6, 1, 5, NULL, 1, '3', '44', NULL, 50, 125, 0, 1, 0, 6250, '2021-05-12', 1, 1),
(21, 6, 1, 5, NULL, 1, '3', '99', NULL, -5, 125, 0, 1, 0, -625, '2021-05-12', 1, 1),
(22, 66, 4, 5, NULL, 1, '3', '1', 'ARP321252', 10, 100, 12, 1, 0, 880, '2021-10-22', 0, 0),
(23, 65, 4, 5, NULL, 1, '3', '1', 'ARP321252', 1, 100, 20, 1, 0, 80, '2021-10-22', 0, 0),
(24, 66, 4, 5, NULL, 1, '3', '12', 'PBR1234C1', 20, 100, 10, 1, 0, 1800, '2021-10-22', 0, 1),
(25, 65, 4, 5, NULL, 1, '3', '12', 'PBR1234C1', 20, 100, 10, 1, 0, 1800, '2021-10-22', 0, 1),
(26, 3, 1, 5, 2, 1, '3', '14', '7845', 10, 1, 1, 0, 0, 9, '2021-10-25', 0, 1),
(27, 62, 1, 5, 2, 1, '3', '14', '7845', 20, 100, 20, 0, 0, 1980, '2021-10-25', 0, 1),
(28, 7, 4, 5, 4, 1, '3', '1212', 'ARP23DAS', 20, 100, 10, 1, 0, 1800, '2021-10-25', 0, 1);

-- --------------------------------------------------------

--
-- Table structure for table `tbl_purchasepayments`
--

CREATE TABLE `tbl_purchasepayments` (
  `purchase_payment_id` int(11) NOT NULL,
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
  `payment_status` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

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
(14, 99, 0, 0, 1, 0, 0, -625, 0, 0, 23445, 22820, 1),
(15, 1, 0, 0, 1, 0, 0, 960, 0, 0, 100, 1060, 0),
(16, 12, 0, 0, 1, 0, 0, 3600, 0, 0, 100, 3700, 1),
(17, 14, 0, 0, 1, 0, 0, 1989, 0, 0, 22820, 24809, 1),
(18, 1212, 0, 0, 1, 0, 0, 1800, 0, 0, 3700, 5500, 1);

-- --------------------------------------------------------

--
-- Table structure for table `tbl_rawmaterials`
--

CREATE TABLE `tbl_rawmaterials` (
  `raw_id` int(11) NOT NULL,
  `prod_id` int(11) NOT NULL,
  `raw_itemid` int(11) NOT NULL,
  `raw_quantity` int(11) NOT NULL,
  `raw_status` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

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

CREATE TABLE `tbl_receipt` (
  `receipt_id` int(11) NOT NULL,
  `receip_id_fk` varchar(11) NOT NULL,
  `finyear_id_fk` int(11) NOT NULL,
  `receipt_amount` varchar(100) NOT NULL,
  `rept_date` date NOT NULL,
  `received_to` varchar(200) NOT NULL,
  `narration` varchar(250) NOT NULL,
  `receipt_status` int(11) NOT NULL,
  `company_id_fk` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

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

CREATE TABLE `tbl_receipthead` (
  `receipt_id` int(11) NOT NULL,
  `receipt_head` varchar(250) NOT NULL,
  `receipt_desc` varchar(255) NOT NULL,
  `receipt_status` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

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

CREATE TABLE `tbl_sale` (
  `sale_id` int(11) NOT NULL,
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
  `sale_status` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

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

CREATE TABLE `tbl_salepayments` (
  `sale_payment_id` int(11) NOT NULL,
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
  `payment_status` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

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

CREATE TABLE `tbl_stock` (
  `stock_id` int(11) NOT NULL,
  `finyear` int(11) DEFAULT NULL,
  `item_id` int(11) NOT NULL,
  `stock` int(11) NOT NULL DEFAULT 0,
  `company_id` int(11) NOT NULL,
  `stock_status` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

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
(9, 3, 9, -2, 5, 1),
(10, 3, 67, 0, 6, 1);

-- --------------------------------------------------------

--
-- Table structure for table `tbl_subcategory`
--

CREATE TABLE `tbl_subcategory` (
  `subcategory_id` int(11) NOT NULL,
  `subcategory_name` varchar(255) NOT NULL,
  `subcategory_description` text NOT NULL,
  `main_category_id` int(11) NOT NULL,
  `subcategory_status` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

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

CREATE TABLE `tbl_supplier` (
  `supplier_id` int(11) NOT NULL,
  `supplier_name` varchar(60) NOT NULL,
  `supplier_address` text NOT NULL,
  `supplier_phone` varchar(20) NOT NULL,
  `supplier_email` varchar(50) NOT NULL,
  `supplier_oldbal` double NOT NULL,
  `company_id` int(11) NOT NULL,
  `supplier_pcategory` int(11) NOT NULL,
  `supplier_status` int(11) NOT NULL,
  `debit_credit` int(11) NOT NULL,
  `supplier_type` enum('0','1') NOT NULL COMMENT 'debitor=0&Creditor=1'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_supplier`
--

INSERT INTO `tbl_supplier` (`supplier_id`, `supplier_name`, `supplier_address`, `supplier_phone`, `supplier_email`, `supplier_oldbal`, `company_id`, `supplier_pcategory`, `supplier_status`, `debit_credit`, `supplier_type`) VALUES
(1, 'new supplier', 'abc', '123', 'abc@gmail.com', 24809, 5, 1, 1, 0, '1'),
(2, 'new supplier2', 'abcd', '4948949', 'abcd@gmail.com', 20000, 6, 2, 0, 0, '1'),
(3, 'ashkar asr', 'calicut', '999999999', 'ashkarasr@gmail.com', 1500, 6, 3, 1, 0, '1'),
(4, 'Rajeev R', 'adetrfwefvcadftwf', '9876543210', 'hello@edge.com', 5500, 5, 1, 1, 0, '0'),
(6, 'Aroma Supplierswrtfwertwer', 'adasdsdasd', '9876543210', 'hello@edge.com', 100, 6, 1, 0, 0, '0'),
(7, 'ABHI', 'TEST', '9895626232', 'TEST@GMAIL.COM', 130, 5, 2, 1, 0, '1');

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
(1, 'GST', 10, 'sdgsgdf', 0),
(2, 'GST', 5, 'gst', 1);

-- --------------------------------------------------------

--
-- Table structure for table `tbl_type`
--

CREATE TABLE `tbl_type` (
  `type_id` int(11) NOT NULL,
  `type_name` varchar(50) NOT NULL,
  `type_status` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

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

CREATE TABLE `tbl_unit` (
  `unit_id` int(11) NOT NULL,
  `unit_name` varchar(255) NOT NULL,
  `unit_description` text NOT NULL,
  `unit_status` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_unit`
--

INSERT INTO `tbl_unit` (`unit_id`, `unit_name`, `unit_description`, `unit_status`) VALUES
(1, 'KG', '', 0),
(2, 'Gram', '', 1),
(3, 'KG', '', 1),
(4, 'PCS', '', 1),
(5, 'Dozen', '12 pieces', 1),
(6, 'Barrel', '', 1);

-- --------------------------------------------------------

--
-- Table structure for table `tbl_voucher`
--

CREATE TABLE `tbl_voucher` (
  `voucher_id` int(11) NOT NULL,
  `vouch_id_fk` int(11) NOT NULL,
  `finyear_id_fk` int(11) NOT NULL,
  `voucher_amount` varchar(100) NOT NULL,
  `paid_from` varchar(200) NOT NULL,
  `voucher_date` date NOT NULL,
  `narration` varchar(250) NOT NULL,
  `voucher_status` int(11) NOT NULL,
  `company_id_fk` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `tbl_vouchhead`
--

CREATE TABLE `tbl_vouchhead` (
  `vouch_id` int(11) NOT NULL,
  `vouch_head` varchar(250) NOT NULL,
  `vouch_desc` varchar(255) NOT NULL,
  `vouch_status` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_vouchhead`
--

INSERT INTO `tbl_vouchhead` (`vouch_id`, `vouch_head`, `vouch_desc`, `vouch_status`) VALUES
(2, 'VOUCHER1', 'SNSDBNKSDNFKJDSFBDSKJFD', 0),
(3, 'VOUCHER1', 'DAF', 1);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `tbl_advance`
--
ALTER TABLE `tbl_advance`
  ADD PRIMARY KEY (`adv_id`);

--
-- Indexes for table `tbl_area`
--
ALTER TABLE `tbl_area`
  ADD PRIMARY KEY (`area_id`);

--
-- Indexes for table `tbl_bank`
--
ALTER TABLE `tbl_bank`
  ADD PRIMARY KEY (`bank_id`);

--
-- Indexes for table `tbl_bank_details`
--
ALTER TABLE `tbl_bank_details`
  ADD PRIMARY KEY (`bank_id`);

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
-- Indexes for table `tbl_companyinfo`
--
ALTER TABLE `tbl_companyinfo`
  ADD PRIMARY KEY (`cmp_id`);

--
-- Indexes for table `tbl_customer`
--
ALTER TABLE `tbl_customer`
  ADD PRIMARY KEY (`cust_id`);

--
-- Indexes for table `tbl_empabsent`
--
ALTER TABLE `tbl_empabsent`
  ADD PRIMARY KEY (`absent_id`);

--
-- Indexes for table `tbl_empattendance`
--
ALTER TABLE `tbl_empattendance`
  ADD PRIMARY KEY (`att_id`);

--
-- Indexes for table `tbl_employee`
--
ALTER TABLE `tbl_employee`
  ADD PRIMARY KEY (`emp_id`);

--
-- Indexes for table `tbl_finyear`
--
ALTER TABLE `tbl_finyear`
  ADD PRIMARY KEY (`finyear_id`);

--
-- Indexes for table `tbl_groups`
--
ALTER TABLE `tbl_groups`
  ADD PRIMARY KEY (`group_id`);

--
-- Indexes for table `tbl_journal`
--
ALTER TABLE `tbl_journal`
  ADD PRIMARY KEY (`journal_id`);

--
-- Indexes for table `tbl_ledgerbalance`
--
ALTER TABLE `tbl_ledgerbalance`
  ADD PRIMARY KEY (`led_id`);

--
-- Indexes for table `tbl_ledgerhead`
--
ALTER TABLE `tbl_ledgerhead`
  ADD PRIMARY KEY (`ledgerhead_id`);

--
-- Indexes for table `tbl_login`
--
ALTER TABLE `tbl_login`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tbl_openingstock`
--
ALTER TABLE `tbl_openingstock`
  ADD PRIMARY KEY (`opening_id`);

--
-- Indexes for table `tbl_overtime`
--
ALTER TABLE `tbl_overtime`
  ADD PRIMARY KEY (`ot_id`);

--
-- Indexes for table `tbl_payroll`
--
ALTER TABLE `tbl_payroll`
  ADD PRIMARY KEY (`payroll_id`);

--
-- Indexes for table `tbl_pricecategory`
--
ALTER TABLE `tbl_pricecategory`
  ADD PRIMARY KEY (`pcategory_id`);

--
-- Indexes for table `tbl_pricelist`
--
ALTER TABLE `tbl_pricelist`
  ADD PRIMARY KEY (`price_id`);

--
-- Indexes for table `tbl_product`
--
ALTER TABLE `tbl_product`
  ADD PRIMARY KEY (`product_id`);

--
-- Indexes for table `tbl_production`
--
ALTER TABLE `tbl_production`
  ADD PRIMARY KEY (`production_id`);

--
-- Indexes for table `tbl_productioninput`
--
ALTER TABLE `tbl_productioninput`
  ADD PRIMARY KEY (`input_id`);

--
-- Indexes for table `tbl_productionoutput`
--
ALTER TABLE `tbl_productionoutput`
  ADD PRIMARY KEY (`output_id`);

--
-- Indexes for table `tbl_profit`
--
ALTER TABLE `tbl_profit`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tbl_purchase`
--
ALTER TABLE `tbl_purchase`
  ADD PRIMARY KEY (`purchase_id`);

--
-- Indexes for table `tbl_purchasepayments`
--
ALTER TABLE `tbl_purchasepayments`
  ADD PRIMARY KEY (`purchase_payment_id`);

--
-- Indexes for table `tbl_rawmaterials`
--
ALTER TABLE `tbl_rawmaterials`
  ADD PRIMARY KEY (`raw_id`);

--
-- Indexes for table `tbl_receipt`
--
ALTER TABLE `tbl_receipt`
  ADD PRIMARY KEY (`receipt_id`);

--
-- Indexes for table `tbl_receipthead`
--
ALTER TABLE `tbl_receipthead`
  ADD PRIMARY KEY (`receipt_id`);

--
-- Indexes for table `tbl_sale`
--
ALTER TABLE `tbl_sale`
  ADD PRIMARY KEY (`sale_id`);

--
-- Indexes for table `tbl_salepayments`
--
ALTER TABLE `tbl_salepayments`
  ADD PRIMARY KEY (`sale_payment_id`);

--
-- Indexes for table `tbl_stock`
--
ALTER TABLE `tbl_stock`
  ADD PRIMARY KEY (`stock_id`);

--
-- Indexes for table `tbl_subcategory`
--
ALTER TABLE `tbl_subcategory`
  ADD PRIMARY KEY (`subcategory_id`);

--
-- Indexes for table `tbl_supplier`
--
ALTER TABLE `tbl_supplier`
  ADD PRIMARY KEY (`supplier_id`);

--
-- Indexes for table `tbl_taxdetails`
--
ALTER TABLE `tbl_taxdetails`
  ADD PRIMARY KEY (`tax_id`);

--
-- Indexes for table `tbl_type`
--
ALTER TABLE `tbl_type`
  ADD PRIMARY KEY (`type_id`);

--
-- Indexes for table `tbl_unit`
--
ALTER TABLE `tbl_unit`
  ADD PRIMARY KEY (`unit_id`);

--
-- Indexes for table `tbl_voucher`
--
ALTER TABLE `tbl_voucher`
  ADD PRIMARY KEY (`voucher_id`);

--
-- Indexes for table `tbl_vouchhead`
--
ALTER TABLE `tbl_vouchhead`
  ADD PRIMARY KEY (`vouch_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `tbl_advance`
--
ALTER TABLE `tbl_advance`
  MODIFY `adv_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `tbl_area`
--
ALTER TABLE `tbl_area`
  MODIFY `area_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `tbl_bank`
--
ALTER TABLE `tbl_bank`
  MODIFY `bank_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `tbl_bank_details`
--
ALTER TABLE `tbl_bank_details`
  MODIFY `bank_id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `tbl_category`
--
ALTER TABLE `tbl_category`
  MODIFY `category_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `tbl_color`
--
ALTER TABLE `tbl_color`
  MODIFY `color_id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `tbl_companyinfo`
--
ALTER TABLE `tbl_companyinfo`
  MODIFY `cmp_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `tbl_customer`
--
ALTER TABLE `tbl_customer`
  MODIFY `cust_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- AUTO_INCREMENT for table `tbl_empabsent`
--
ALTER TABLE `tbl_empabsent`
  MODIFY `absent_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `tbl_empattendance`
--
ALTER TABLE `tbl_empattendance`
  MODIFY `att_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=36;

--
-- AUTO_INCREMENT for table `tbl_employee`
--
ALTER TABLE `tbl_employee`
  MODIFY `emp_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `tbl_finyear`
--
ALTER TABLE `tbl_finyear`
  MODIFY `finyear_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `tbl_groups`
--
ALTER TABLE `tbl_groups`
  MODIFY `group_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=34;

--
-- AUTO_INCREMENT for table `tbl_journal`
--
ALTER TABLE `tbl_journal`
  MODIFY `journal_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=32;

--
-- AUTO_INCREMENT for table `tbl_ledgerbalance`
--
ALTER TABLE `tbl_ledgerbalance`
  MODIFY `led_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=34;

--
-- AUTO_INCREMENT for table `tbl_ledgerhead`
--
ALTER TABLE `tbl_ledgerhead`
  MODIFY `ledgerhead_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=28;

--
-- AUTO_INCREMENT for table `tbl_login`
--
ALTER TABLE `tbl_login`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `tbl_openingstock`
--
ALTER TABLE `tbl_openingstock`
  MODIFY `opening_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=58;

--
-- AUTO_INCREMENT for table `tbl_overtime`
--
ALTER TABLE `tbl_overtime`
  MODIFY `ot_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `tbl_payroll`
--
ALTER TABLE `tbl_payroll`
  MODIFY `payroll_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `tbl_pricecategory`
--
ALTER TABLE `tbl_pricecategory`
  MODIFY `pcategory_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `tbl_pricelist`
--
ALTER TABLE `tbl_pricelist`
  MODIFY `price_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=125;

--
-- AUTO_INCREMENT for table `tbl_product`
--
ALTER TABLE `tbl_product`
  MODIFY `product_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=68;

--
-- AUTO_INCREMENT for table `tbl_production`
--
ALTER TABLE `tbl_production`
  MODIFY `production_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `tbl_productioninput`
--
ALTER TABLE `tbl_productioninput`
  MODIFY `input_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `tbl_productionoutput`
--
ALTER TABLE `tbl_productionoutput`
  MODIFY `output_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `tbl_profit`
--
ALTER TABLE `tbl_profit`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `tbl_purchase`
--
ALTER TABLE `tbl_purchase`
  MODIFY `purchase_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=29;

--
-- AUTO_INCREMENT for table `tbl_purchasepayments`
--
ALTER TABLE `tbl_purchasepayments`
  MODIFY `purchase_payment_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=19;

--
-- AUTO_INCREMENT for table `tbl_rawmaterials`
--
ALTER TABLE `tbl_rawmaterials`
  MODIFY `raw_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `tbl_receipt`
--
ALTER TABLE `tbl_receipt`
  MODIFY `receipt_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `tbl_receipthead`
--
ALTER TABLE `tbl_receipthead`
  MODIFY `receipt_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `tbl_sale`
--
ALTER TABLE `tbl_sale`
  MODIFY `sale_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=20;

--
-- AUTO_INCREMENT for table `tbl_salepayments`
--
ALTER TABLE `tbl_salepayments`
  MODIFY `sale_payment_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT for table `tbl_stock`
--
ALTER TABLE `tbl_stock`
  MODIFY `stock_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `tbl_subcategory`
--
ALTER TABLE `tbl_subcategory`
  MODIFY `subcategory_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `tbl_supplier`
--
ALTER TABLE `tbl_supplier`
  MODIFY `supplier_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `tbl_taxdetails`
--
ALTER TABLE `tbl_taxdetails`
  MODIFY `tax_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `tbl_type`
--
ALTER TABLE `tbl_type`
  MODIFY `type_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `tbl_unit`
--
ALTER TABLE `tbl_unit`
  MODIFY `unit_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `tbl_voucher`
--
ALTER TABLE `tbl_voucher`
  MODIFY `voucher_id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `tbl_vouchhead`
--
ALTER TABLE `tbl_vouchhead`
  MODIFY `vouch_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
