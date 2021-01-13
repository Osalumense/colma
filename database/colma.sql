-- phpMyAdmin SQL Dump
-- version 5.0.3
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Dec 30, 2020 at 07:49 PM
-- Server version: 10.4.14-MariaDB
-- PHP Version: 7.2.34

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `colma`
--

-- --------------------------------------------------------

--
-- Table structure for table `appsmenu`
--

CREATE TABLE `appsmenu` (
  `appmenuid` int(11) NOT NULL,
  `menuname` varchar(255) NOT NULL,
  `status` int(11) NOT NULL,
  `menuorder` int(11) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `appsmenu`
--

INSERT INTO `appsmenu` (`appmenuid`, `menuname`, `status`, `menuorder`) VALUES
(6, 'membership control', 1, 0),
(2, 'manage menu', 1, 0),
(3, 'manage roles', 1, 0),
(4, 'deleted items', 1, 0),
(5, 'reports', 1, 0),
(7, 'setup', 1, 0),
(8, 'facility management', 1, 0),
(9, 'member payments', 1, 0),
(10, 'system maintenance', 1, 0),
(11, 'views', 1, 0),
(12, 'list', 1, 0),
(13, 'cash flowin', 1, 0),
(14, 'cash flowout', 1, 0),
(15, 'reconcillation', 1, 0),
(16, 'liberator', 1, 0);

-- --------------------------------------------------------

--
-- Table structure for table `appssubmenu`
--

CREATE TABLE `appssubmenu` (
  `submenuid` int(11) NOT NULL,
  `submenuname` varchar(255) NOT NULL,
  `menuid` int(11) NOT NULL,
  `filename` varchar(255) NOT NULL,
  `extension` varchar(255) NOT NULL,
  `status` int(11) NOT NULL,
  `submenutypeid` int(11) NOT NULL,
  `menustatus` int(11) NOT NULL,
  `submenuorder` int(11) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `appssubmenu`
--

INSERT INTO `appssubmenu` (`submenuid`, `submenuname`, `menuid`, `filename`, `extension`, `status`, `submenutypeid`, `menustatus`, `submenuorder`) VALUES
(2, 'switch submenu', 2, 'switchsubmenu', 'php', 1, 1, 1, 0),
(3, 'view user role', 3, 'viewuserrole', 'php', 1, 1, 1, 0),
(4, 'view logs', 5, 'viewlogs', 'php', 1, 1, 1, 0),
(5, 'application ajax', 1, 'appajax', 'php', 1, 2, 1, 0),
(6, 'assign role to user', 3, 'userroleassign', 'php', 1, 1, 1, 0),
(7, 'delete menu', 2, 'delmenu', 'php', 0, 1, 1, 0),
(9, 'edit role', 3, 'editrole', 'php', 1, 1, 1, 0),
(10, 'view assigned roles', 3, 'roleassigned', 'php', 1, 1, 1, 0),
(11, 'add new role', 3, 'addrole', 'php', 1, 1, 1, 0),
(12, 'deleted menu', 4, 'deledmenu', 'php', 1, 1, 1, 0),
(18, 'register new member', 6, 'newmember', 'php', 1, 1, 1, 0),
(15, 'add menu', 2, 'addmenu', 'php', 1, 1, 1, 0),
(16, 'assign role to menu', 3, 'roleassign', 'php', 1, 1, 1, 0),
(17, 'edit menu', 2, 'editmenu', 'php', 1, 1, 1, 0),
(19, 'register facility application', 8, 'facilityreg', 'php', 1, 1, 1, 0),
(20, 'transfer form', 6, 'transferform', 'php', 1, 1, 1, 0),
(21, 'monthly savings rescheduling', 6, 'montsav', 'php', 1, 1, 1, 0),
(22, 'close out a member', 6, 'setmemberoff', 'php', 1, 1, 1, 0),
(23, 'view member profile', 6, 'viewmember', 'php', 1, 1, 1, 0),
(24, 'facility balloon payment', 9, 'cashinrepayment', 'php', 1, 1, 1, 0),
(25, 'add facility', 8, 'facilities', 'php', 1, 1, 1, 0),
(26, 'enter savings increment', 13, 'individualsavings', 'php', 1, 1, 1, 0),
(27, 'new officer', 6, 'officerreg', 'php', 1, 1, 1, 0),
(28, 'close out officers', 6, 'officerclose', 'php', 1, 1, 1, 0),
(29, 'view facilities', 8, 'viewfacilities', 'php', 1, 1, 1, 0),
(30, 'edit facility', 8, 'editfacilities', 'php', 1, 1, 1, 0),
(31, 'enter payments for savings withdrawal', 14, 'cashoutsavings', 'php', 1, 1, 1, 0),
(32, 'enter payments for facilities', 14, 'paymentforfacilities', 'php', 1, 1, 1, 0),
(33, 'letter of offer', 8, 'letterofoffer', 'php', 1, 1, 1, 0),
(34, 'bank reports', 15, 'bankreports', 'php', 1, 1, 1, 0),
(35, 'setup monthly deduction', 9, 'montlydedset', 'php', 1, 1, 1, 0),
(36, 'share increment', 13, 'shareincrement', 'php', 1, 1, 1, 0),
(37, 'edit installment', 8, 'editinstallment', 'php', 1, 1, 1, 0),
(38, 'enter receipts from others', 13, 'rcptfrmothers', 'php', 1, 1, 1, 0),
(39, 'add liberatior', 16, 'addliberator', 'php', 1, 1, 1, 0),
(40, 'enter refunds on facilities', 14, 'cashoutrefundloans', 'php', 1, 1, 1, 0),
(41, 'enter payments to others', 14, 'cashouttoothers', 'php', 1, 1, 1, 0),
(42, 'enter payments for imprest', 14, 'cashouttoimprest', 'php', 1, 1, 1, 0),
(43, 'enter imprest expense', 14, 'imprestexpense', 'php', 1, 1, 1, 0),
(44, 'upload new bulk facility', 8, 'facilityregister', 'php', 1, 1, 1, 0),
(45, 'edit monthly deduction', 9, 'editdeduction', 'php', 1, 1, 1, 0),
(46, 'edit member record', 6, 'editmemberrecord', 'php', 1, 1, 1, 0),
(47, 'view monthly deduction', 9, 'viewdeductions', 'php', 1, 1, 1, 0),
(48, 'distribute monthly deduction', 9, 'monthlydeductiondistribution', 'php', 1, 1, 1, 0),
(49, 'enter monthly deduction - individual', 9, 'individualmontdeduction', 'php', 1, 1, 1, 0),
(50, 'register facility - user', 8, 'facilityreguser', 'php', 1, 1, 1, 0),
(51, 'savings increment', 6, 'savingsincrement', 'php', 1, 1, 1, 0),
(52, 'lists', 5, 'lists', 'php', 1, 1, 1, 0);

-- --------------------------------------------------------

--
-- Table structure for table `banks`
--

CREATE TABLE `banks` (
  `bkid` varchar(50) NOT NULL,
  `bankname` varchar(50) NOT NULL,
  `bankstatus` int(11) NOT NULL,
  `id` int(11) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `banks`
--

INSERT INTO `banks` (`bkid`, `bankname`, `bankstatus`, `id`) VALUES
('FBN', 'FIRST BANK OF NIGERIA', 1, 19),
('CB', 'CHARTERED BANK', 1, 20),
('DB', 'DIAMOND BANK', 1, 21),
('AFRB', 'AFRI BANK', 1, 22),
('STB', 'STANDARD TRUST BANK', 1, 23),
('GTB', 'GUARANTEE TRUST BANK', 1, 24),
('OMEGA', 'OMEGA BANK', 1, 25),
('ECO', 'ECOBANK', 1, 26),
('CITZEN', 'CITIZEN BANK', 1, 27),
('CBL', 'CBL', 1, 28),
('CBI', 'CBI', 1, 29),
('AIB', 'AFRICAN INTERNATIONAL BANK', 1, 30),
('MBC', 'MBC', 1, 31),
('ASTB', 'ASTB', 1, 32),
('SGB', 'SOCIETE GENERALE BANK', 1, 33),
('ZENITH', 'ZENITH BANK', 1, 34),
('CITY', 'CITY EXPRESS BANK', 1, 35),
('CMFB', 'COVENANT MICRO FINANCE BANK', 1, 36),
('UBA', 'UNITED BANK FOR AFRICA', 1, 37);

-- --------------------------------------------------------

--
-- Table structure for table `cashflowin`
--

CREATE TABLE `cashflowin` (
  `id` int(11) NOT NULL,
  `incomeidno` int(11) NOT NULL,
  `receiptno` varchar(50) NOT NULL,
  `receiptdate` date NOT NULL,
  `payer` varchar(255) DEFAULT NULL COMMENT 'Payer name whether member or non member',
  `payerid` varchar(11) NOT NULL,
  `amount` double NOT NULL,
  `incomesource` int(11) NOT NULL,
  `instrument` int(11) NOT NULL,
  `docref` varchar(50) NOT NULL,
  `docdate` date NOT NULL,
  `docbank` varchar(50) NOT NULL,
  `purpose` varchar(50) NOT NULL,
  `userr` varchar(50) NOT NULL,
  `udate` datetime NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `cashflowin`
--

INSERT INTO `cashflowin` (`id`, `incomeidno`, `receiptno`, `receiptdate`, `payer`, `payerid`, `amount`, `incomesource`, `instrument`, `docref`, `docdate`, `docbank`, `purpose`, `userr`, `udate`) VALUES
(1, 1, '6786887', '2017-09-10', NULL, 'colma17001', 10000, 1, 1, '798789', '2017-09-10', '36', ' Application Fee', '10', '2017-09-10 07:59:48'),
(2, 2, '6786887', '2017-09-10', NULL, 'colma17004', 10000, 10, 0, '798789', '2017-09-10', '', 'Regular Loan Application Fee', '10', '2017-09-10 08:02:15'),
(3, 3, '6786887', '2017-09-10', NULL, 'colma17004', 10000, 10, 0, '798789', '2017-09-10', '', 'Regular Loan Application Fee', '10', '2017-09-10 08:05:36'),
(4, 4, '787878', '2017-09-11', NULL, '', 1000, 1, 2, '798789', '2017-09-11', '36', 'Membership Registration Application Fee ', '10', '2017-09-11 08:18:32'),
(5, 5, '8787676', '2017-09-11', NULL, 'colma17004', 200000, 3, 2, '7978', '2017-09-22', '36', 'Share Increment ', '10', '2017-09-11 08:18:33'),
(6, 6, '787878', '2017-09-18', NULL, '', 1000, 0, 2, '798789', '2017-09-11', '36', ' Application Fee ', '10', '2017-09-11 14:56:41'),
(7, 7, '787878', '2017-09-18', NULL, 'colma17004', 1000, 0, 4, '798789', '2017-09-11', '23', '  Application Fee ', '10', '2017-09-11 15:29:05'),
(8, 8, '787878', '2017-09-11', NULL, 'colma17009', 1000, 1, 4, '798789', '2017-09-11', '36', 'Membership Registration  Application Fee ', '10', '2017-09-11 17:43:54'),
(9, 9, '8787676', '2017-09-11', NULL, 'colma17009', 10000, 3, 4, '7978', '2017-09-11', '36', 'Share  Increment ', '10', '2017-09-11 17:43:54'),
(10, 10, '787878', '2017-09-11', NULL, 'colma17009', 10000, 10, 4, '798789', '2017-09-11', '36', 'Regular Loan  Application Fee ', '10', '2017-09-11 18:14:18'),
(11, 11, '787878', '2017-09-11', NULL, 'colma17009', 1000, 2, 4, '798789', '2017-09-11', '36', 'Savings  Application Fee ', '10', '2017-09-11 18:29:15'),
(12, 12, '787878', '2017-09-12', NULL, 'colma17001', 200000, 3, 4, '798789', '2017-09-12', '20', 'Share  Increment ', '10', '2017-09-12 07:40:11'),
(13, 13, '68667', '2017-09-13', NULL, '', 10000, 10, 4, '73887', '2017-09-13', '36', 'Regular Loan  Repayment ', '10', '2017-09-13 13:40:39'),
(14, 14, '787878', '2017-09-13', NULL, '', 100000, 10, 4, '798789', '2017-09-13', '22', 'Regular Loan  Repayment ', '10', '2017-09-13 18:06:08'),
(15, 15, '787878', '2017-09-11', NULL, '', 100000, 10, 4, '798789', '2017-09-11', '36', 'Regular Loan  Repayment ', '10', '2017-09-13 18:51:36'),
(16, 16, '787878', '2017-09-11', NULL, '', 100000, 10, 4, '798789', '2017-09-11', '36', 'Regular Loan  Repayment ', '10', '2017-09-13 18:56:38'),
(17, 17, '787878', '2017-09-11', NULL, '', 100000, 10, 4, '798789', '2017-09-11', '36', 'Regular Loan  Repayment ', '10', '2017-09-13 18:58:16'),
(18, 18, '787878', '2017-09-11', NULL, '', 100000, 10, 4, '798789', '2017-09-11', '36', 'Regular Loan  Repayment ', '10', '2017-09-13 19:03:26'),
(19, 19, '787878', '2017-09-11', NULL, '', 100000, 10, 4, '798789', '2017-09-11', '36', 'Regular Loan  Repayment ', '10', '2017-09-13 19:10:44'),
(20, 20, '787878', '2017-09-11', NULL, '', 100000, 10, 4, '798789', '2017-09-11', '36', 'Regular Loan  Repayment ', '10', '2017-09-13 19:12:36'),
(21, 21, '787878', '2017-09-11', NULL, '', 100000, 10, 4, '798789', '2017-09-11', '36', 'Regular Loan  Repayment ', '10', '2017-09-13 19:17:28'),
(22, 22, '787878', '2017-09-11', 'Christmas', '', 1000, 0, 4, '798789', '2017-09-11', '36', '  Christmas ', '10', '2017-09-14 14:57:42'),
(23, 22, '787878', '2017-09-11', 'Christmas', '', 1000, 0, 4, '798789', '2017-09-11', '36', ' Christmas ', '10', '2017-09-14 14:57:42'),
(24, 23, '787878', '2017-09-07', 'Akand Joshua', '', 100000, 0, 4, '798789', '2017-09-11', '36', '  Christmass ', '10', '2017-09-14 20:36:47'),
(38, 0, '212123', '2020-12-24', NULL, 'colma17003', 1000, 4, 1, '1212121', '2020-12-24', '30', 'Payment', 'colma17001', '2020-12-24 00:00:00'),
(37, 0, '212123', '2020-12-24', NULL, 'colma17001', 1000, 4, 1, '1212121', '2020-12-24', '30', 'Payment', 'colma17001', '2020-12-24 00:00:00'),
(27, 1, '212143', '2020-11-13', '', 'colma20001', 1000, 1, 0, '1212122', '2020-11-10', '34', 'Membership Registration  Application Fee ', '', '2020-11-30 20:43:40'),
(28, 1, '122166', '2020-11-13', '', 'colma20001', 10000, 3, 1, '129267', '2020-11-13', '21', 'Share  Increment ', '', '2020-11-30 20:43:40'),
(29, 1, '212143', '2020-11-13', '', 'colma20002', 1000, 1, 0, '1212122', '2020-11-10', '34', 'Membership Registration  Application Fee ', '', '2020-11-30 22:10:21'),
(30, 1, '122166', '2020-11-13', '', 'colma20002', 10000, 3, 1, '129267', '2020-11-13', '21', 'Share  Increment ', '', '2020-11-30 22:10:21'),
(31, 1, '2121233', '2020-11-30', '', 'colma20003', 1000, 1, 0, '9093839', '2020-11-30', '21', 'Membership Registration  Application Fee ', '', '2020-12-01 13:04:56'),
(32, 1, '0090393', '2020-11-30', '', 'colma20003', 10000, 3, 1, '9099292', '2020-11-30', '21', 'Share  Increment ', '', '2020-12-01 13:04:56'),
(40, 0, '212122', '2020-12-24', NULL, 'colma17004', 1000, 7, 4, '1212123', '2020-12-24', '24', 'application fee', 'colma17001', '2020-12-24 00:00:00'),
(39, 0, '212122', '2020-12-24', NULL, 'colma17004', 1000, 7, 4, '1212123', '2020-12-24', '24', 'application fee', 'colma17001', '2020-12-24 00:00:00'),
(35, 1, '893839', '2020-11-28', '', 'colma20005', 1000, 1, 0, '0009988', '2020-12-02', '20', 'Membership Registration  Application Fee ', '', '2020-12-01 17:50:08'),
(36, 1, '1228929', '2020-11-28', '', 'colma20005', 10000, 3, 1, '12929029', '2020-11-28', '20', 'Share  Increment ', '', '2020-12-01 17:50:08'),
(41, 0, '2121222', '2020-12-24', NULL, 'colma17004', 1000, 7, 5, '1212124', '2020-12-24', '19', 'application fee', 'colma17001', '2020-12-24 00:00:00'),
(42, 0, '2121222', '2020-12-24', NULL, 'colma17004', 1000, 7, 5, '1212124', '2020-12-24', '19', 'application fee', 'colma17001', '2020-12-24 00:00:00'),
(43, 0, '2121222', '2020-12-24', NULL, 'colma17004', 1000, 7, 5, '1212124', '2020-12-24', '19', 'application fee', 'colma17001', '2020-12-24 00:00:00'),
(44, 0, '2121222', '2020-12-24', NULL, 'colma17004', 1000, 7, 5, '1212124', '2020-12-24', '19', 'application fee', 'colma17001', '2020-12-24 00:00:00'),
(45, 0, '2121222', '2020-12-24', NULL, 'colma17004', 1000, 7, 5, '1212124', '2020-12-24', '19', 'application fee', 'colma17001', '2020-12-24 00:00:00'),
(46, 0, '2121222', '2020-12-24', NULL, 'colma17004', 1000, 7, 5, '1212124', '2020-12-24', '19', 'application fee', 'colma17001', '2020-12-24 00:00:00'),
(47, 0, '2121222', '2020-12-24', NULL, 'colma17004', 1000, 7, 5, '1212124', '2020-12-24', '19', 'application fee', 'colma17001', '2020-12-24 00:00:00'),
(48, 0, '2121226', '2020-12-24', NULL, 'colma20001', 1000, 10, 5, '1212128', '2020-12-24', '26', 'application fee', 'colma17001', '2020-12-24 00:00:00'),
(49, 0, '2121226', '2020-12-24', NULL, 'colma20001', 1000, 10, 5, '1212128', '2020-12-24', '26', 'application fee', 'colma17001', '2020-12-24 00:00:00'),
(50, 0, '2121226', '2020-12-24', NULL, 'colma20001', 1000, 10, 5, '1212128', '2020-12-24', '26', 'application fee', 'colma17001', '2020-12-24 00:00:00'),
(51, 0, '2121226', '2020-12-24', NULL, 'colma20001', 1000, 10, 5, '1212128', '2020-12-24', '26', 'application fee', 'colma17001', '2020-12-24 00:00:00'),
(52, 0, '2121226', '2020-12-24', NULL, 'colma20001', 1000, 10, 5, '1212128', '2020-12-24', '26', 'application fee', 'colma17001', '2020-12-24 00:00:00'),
(53, 0, '2121226', '2020-12-24', NULL, 'colma20001', 1000, 10, 5, '1212128', '2020-12-24', '26', 'application fee', 'colma17001', '2020-12-24 00:00:00'),
(54, 0, '2121226', '2020-12-24', NULL, 'colma20001', 1000, 10, 5, '1212128', '2020-12-24', '26', 'application fee', 'colma17001', '2020-12-24 00:00:00'),
(55, 0, '2121226', '2020-12-24', NULL, 'colma20001', 1000, 10, 5, '1212128', '2020-12-24', '26', 'application fee', 'colma17001', '2020-12-24 00:00:00'),
(56, 0, '2121226', '2020-12-24', NULL, 'colma20001', 1000, 10, 5, '1212128', '2020-12-24', '26', 'application fee', 'colma17001', '2020-12-24 00:00:00'),
(57, 0, '21212', '2020-12-24', NULL, 'colma20001', 1000, 10, 4, '121212', '2020-12-24', '19', 'application fee', 'colma17001', '2020-12-24 00:00:00'),
(58, 0, '2121221', '2020-12-24', NULL, 'colma20001', 1000, 8, 2, '121212109', '2020-12-24', '19', 'application fee', 'colma17001', '2020-12-24 00:00:00'),
(59, 0, '21212222', '2020-12-25', NULL, 'colma17001', 1000, 7, 2, '12121244', '2020-12-25', '19', 'akaja', 'colma17001', '2020-12-25 00:00:00'),
(68, 0, '21212300', '2020-12-24', NULL, 'colma20002', 10000, 3, 2, '121212100', '2020-12-24', '20', 'payment for share increment', 'colma17001', '2020-12-28 19:03:55'),
(67, 0, '212', '2020-12-28', NULL, 'colma20001', 10000, 3, 1, '1212', '2020-12-28', '19', 'Payment made', 'colma17001', '2020-12-28 18:45:39');

-- --------------------------------------------------------

--
-- Table structure for table `cashflowout`
--

CREATE TABLE `cashflowout` (
  `id` int(11) NOT NULL,
  `oino` int(11) NOT NULL,
  `vno` varchar(50) NOT NULL,
  `vdate` date NOT NULL,
  `receiver` varchar(50) NOT NULL,
  `receiverid` varchar(11) NOT NULL,
  `amount` double NOT NULL,
  `purpose` varchar(50) NOT NULL,
  `expenseid` int(11) NOT NULL,
  `instrument` int(11) NOT NULL,
  `docref` varchar(50) NOT NULL,
  `docdate` date NOT NULL,
  `docbank` varchar(50) NOT NULL,
  `facilityno` int(11) NOT NULL,
  `facility` varchar(255) NOT NULL,
  `remark` varchar(50) NOT NULL,
  `userr` varchar(50) NOT NULL,
  `udate` datetime NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `cashflowout`
--

INSERT INTO `cashflowout` (`id`, `oino`, `vno`, `vdate`, `receiver`, `receiverid`, `amount`, `purpose`, `expenseid`, `instrument`, `docref`, `docdate`, `docbank`, `facilityno`, `facility`, `remark`, `userr`, `udate`) VALUES
(1, 1, '787878', '2017-09-15', '', '0', 0, '  Application Fee', 0, 2, '798789', '2017-09-15', '36', 0, '0', 'hk', '10', '2017-09-15 18:37:34'),
(2, 2, '787878', '2017-09-15', '', '', 0, '  Application Fee', 0, 2, '798789', '2017-09-15', '36', 0, '0', 'hk', '10', '2017-09-15 18:38:35'),
(3, 3, '787878', '2017-09-15', '', 'colma17001', 0, '  Application Fee', 0, 2, '798789', '2017-09-15', '36', 0, '0', 'hk', '10', '2017-09-15 18:39:57'),
(4, 4, '787878', '2017-09-15', '', 'colma17001', 200000, '  Application Fee', 0, 2, '798789', '2017-09-15', '19', 0, '5', '', '10', '2017-09-15 19:45:40'),
(5, 5, '787878', '2017-09-15', '', 'colma17001', 200000, '  Application Fee', 0, 2, '798789', '2017-09-15', '19', 0, '5', '', '10', '2017-09-15 19:47:32'),
(6, 6, '787878', '2017-09-15', '', 'colma17001', 200000, '  Application Fee', 0, 2, '798789', '2017-09-15', '19', 0, '5', '', '10', '2017-09-15 19:53:53'),
(7, 7, '787878', '2017-09-15', '', 'colma17001', 200000, '  Application Fee', 0, 2, '798789', '2017-09-15', '19', 0, '5', ' hhj', '10', '2017-09-15 19:54:43'),
(8, 8, '787878', '2017-09-16', '', 'colma17001', 0, '  Application Fee', 0, 5, '798789', '2017-09-16', '22', 0, '0', 'hghg', '10', '2017-09-16 05:17:50'),
(9, 9, '787878', '2017-09-16', '', 'colma17001', 0, '  Application Fee', 0, 5, '798789', '2017-09-16', '22', 0, '0', 'hghg', '10', '2017-09-16 05:20:04'),
(10, 10, '787878', '2017-09-16', '', 'colma17001', 0, '  Application Fee', 0, 5, '798789', '2017-09-16', '22', 0, '0', 'hghg', '10', '2017-09-16 05:24:54'),
(11, 11, '787878', '2017-09-16', '', 'colma17001', 0, '  Application Fee', 0, 5, '798789', '2017-09-16', '22', 0, '0', 'hghg', '10', '2017-09-16 05:24:58'),
(12, 12, '787878', '2017-09-16', '', 'colma17001', 0, '  Application Fee', 0, 5, '798789', '2017-09-16', '22', 0, '0', 'hghg', '10', '2017-09-16 05:31:57'),
(13, 13, '787878', '2017-09-16', '', 'colma17001', 0, '  Application Fee', 0, 5, '798789', '2017-09-16', '22', 0, '0', 'hghg', '10', '2017-09-16 05:32:04'),
(14, 14, '787878', '2017-09-16', '', 'colma17001', 0, '  Application Fee', 0, 5, '798789', '2017-09-16', '22', 0, '0', 'hghg', '10', '2017-09-16 05:34:42'),
(15, 15, '787878', '2017-09-16', '', 'colma17001', 0, '  Application Fee', 0, 5, '798789', '2017-09-16', '22', 0, '0', 'hghg', '10', '2017-09-16 05:34:45'),
(16, 16, '787878', '2017-09-16', '', 'colma17001', 0, '  Application Fee', 0, 5, '798789', '2017-09-16', '22', 0, '0', 'hghg', '10', '2017-09-16 05:35:20'),
(17, 17, '787878', '2017-09-16', '', 'colma17001', 0, '  Application Fee', 0, 5, '798789', '2017-09-16', '22', 0, '0', 'hghg', '10', '2017-09-16 05:35:39'),
(18, 18, '787878', '2017-09-16', '', 'colma17001', 0, '  Application Fee', 0, 5, '798789', '2017-09-16', '22', 0, '0', 'hghg', '10', '2017-09-16 05:36:16'),
(19, 19, '787878', '2017-09-16', '', 'colma17001', 0, '  Application Fee', 0, 2, '798789', '2017-09-16', '22', 0, '0', 'bm', '10', '2017-09-16 05:49:53'),
(20, 20, '787878', '2017-09-16', '', 'colma17001', 0, '  Application Fee', 0, 2, '798789', '2017-09-16', '20', 0, '0', 'njhkjhkj', '10', '2017-09-16 05:50:45'),
(21, 21, '787878', '2017-09-16', '', 'colma17001', 0, '  Application Fee', 0, 1, '798789', '2017-09-16', '20', 0, '0', 'njhkjhkj', '10', '2017-09-16 05:53:18'),
(22, 22, '787878', '2017-09-16', '', 'colma17001', 0, '  Application Fee', 0, 2, '798789', '2017-09-16', '20', 0, '0', 'njhkjhkj', '10', '2017-09-16 06:20:08'),
(23, 23, '787878', '2017-09-12', 'Akande Joshua Ayomikun', '', 200000, 'imprest', 0, 2, '798789', '2017-09-20', '22', 0, '0', 'the', '10', '2017-09-20 21:38:55'),
(24, 24, '787878', '2017-09-12', 'Akande Joshua Ayomikun', '', 200000, 'imprest', 0, 4, '798789', '2017-09-20', '22', 0, '0', 'the', '10', '2017-09-20 21:40:16');

-- --------------------------------------------------------

--
-- Table structure for table `countries`
--

CREATE TABLE `countries` (
  `countryid` smallint(6) NOT NULL,
  `country` varchar(150) NOT NULL,
  `countrycode` char(10) NOT NULL,
  `phoneCode` char(19) NOT NULL,
  `nationality` varchar(150) NOT NULL,
  `currency` varchar(45) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COMMENT='InnoDB free: 121856 kB; InnoDB free: 121856 kB; InnoDB free:';

--
-- Dumping data for table `countries`
--

INSERT INTO `countries` (`countryid`, `country`, `countrycode`, `phoneCode`, `nationality`, `currency`) VALUES
(1, 'Andorra, Principality Of', 'AD', '376', '', ''),
(2, 'United Arab Emirates', 'AE', '971', '', ''),
(3, 'Afghanistan, Islamic State Of', 'AF', '93', '', ''),
(4, 'Antigua And Barbuda', 'AG', '1-268', '', ''),
(5, 'Anguilla', 'AI', '1-264', '', ''),
(6, 'Albania', 'AL', '355', '', ''),
(7, 'Armenia', 'AM', '374', '', ''),
(8, 'Netherlands Antilles', 'AN', '599', '', ''),
(9, 'Angola', 'AO', '244', '', ''),
(10, 'Antarctica', 'AQ', '672', '', ''),
(11, 'Argentina', 'AR', '54', '', ''),
(12, 'American Samoa', 'AS', '1-684', '', ''),
(13, 'Austria', 'AT', '43', '', ''),
(14, 'Australia', 'AU', '61', '', ''),
(15, 'Aruba', 'AW', '297', '', ''),
(16, 'Azerbaidjan', 'AZ', '994', '', ''),
(17, 'Bosnia-Herzegovina', 'BA', '387', '', ''),
(18, 'Barbados', 'BB', '1-246', '', ''),
(19, 'Bangladesh', 'BD', '880', '', ''),
(20, 'Belgium', 'BE', '32', '', ''),
(21, 'Burkina Faso', 'BF', '226', '', ''),
(22, 'Bulgaria', 'BG', '359', '', ''),
(23, 'Bahrain', 'BH', '973', '', ''),
(24, 'Burundi', 'BI', '257', '', ''),
(25, 'Benin', 'BJ', '229', '', ''),
(26, 'Bermuda', 'BM', '1-441', '', ''),
(27, 'Brunei Darussalam', 'BN', '673', '', ''),
(28, 'Bolivia', 'BO', '591', '', ''),
(29, 'Brazil', 'BR', '55', '', ''),
(30, 'Bahamas', 'BS', '1-242', '', ''),
(31, 'Bhutan', 'BT', '975', '', ''),
(32, 'Bouvet Island', 'BV', '55', '', ''),
(33, 'Botswana', 'BW', '267', '', ''),
(34, 'Belarus', 'BY', '375', '', ''),
(35, 'Belize', 'BZ', '501', '', ''),
(36, 'Canada', 'CA', '1', '', ''),
(37, 'Cocos (Keeling) Islands', 'CC', '61', '', ''),
(38, 'Central African Republic', 'CF', '236', '', ''),
(39, 'Congo, The Democratic Republic', 'CD', '243', '', ''),
(40, 'Congo', 'CG', '242', '', ''),
(41, 'Switzerland', 'CH', '41', '', ''),
(42, 'Ivory Coast (Cote D\'Ivoire)', 'CI', '225', '', ''),
(43, 'Cook Islands', 'CK', '682', '', ''),
(44, 'Chile', 'CL', '56', '', ''),
(45, 'Cameroon', 'CM', '237', '', ''),
(46, 'China', 'CN', '86', '', ''),
(47, 'Colombia', 'CO', '57', '', ''),
(48, 'Costa Rica', 'CR', '506', '', ''),
(49, 'Former Czechoslovakia', 'CS', '420', '', ''),
(50, 'Cuba', 'CU', '53', '', ''),
(51, 'Cape Verde', 'CV', '238', '', ''),
(52, 'Christmas Island', 'CX', '53', '', ''),
(53, 'Cyprus', 'CY', '357', '', ''),
(54, 'Czech Republic', 'CZ', '420', '', ''),
(55, 'Germany', 'DE', '49', '', ''),
(56, 'Djibouti', 'DJ', '253', '', ''),
(57, 'Denmark', 'DK', '45', '', ''),
(58, 'Dominica', 'DM', '1-767', '', ''),
(59, 'Dominican Republic', 'DO', '1-809', '', ''),
(60, 'Algeria', 'DZ', '213', '', ''),
(61, 'Ecuador', 'EC', '593', '', ''),
(62, 'Estonia', 'EE', '372', '', ''),
(63, 'Egypt', 'EG', '20', '', ''),
(64, 'Western Sahara', 'EH', '212', '', ''),
(65, 'Eritrea', 'ER', '291', '', ''),
(66, 'Spain', 'ES', '34', '', ''),
(67, 'Ethiopia', 'ET', '251', '', ''),
(68, 'Finland', 'FI', '358', '', ''),
(69, 'Fiji', 'FJ', '679', '', ''),
(70, 'Falkland Islands', 'FK', '500', '', ''),
(71, 'Micronesia', 'FM', '691', '', ''),
(72, 'Faroe Islands', 'FO', '298', '', ''),
(73, 'France', 'FR', '33', '', ''),
(74, 'France (European Territory)', 'FX', '', '', ''),
(75, 'Gabon', 'GA', '241', '', ''),
(76, 'Great Britain', 'GB', '44', '', ''),
(77, 'Grenada', 'GD', '1-473', '', ''),
(78, 'Georgia', 'GE', '995', '', ''),
(79, 'French Guyana', 'GF', '594', '', ''),
(80, 'Ghana', 'GH', '233', '', ''),
(81, 'Gibraltar', 'GI', '350', '', ''),
(82, 'Greenland', 'GL', '299', '', ''),
(83, 'Gambia', 'GM', '220', '', ''),
(84, 'Guinea', 'GN', '224', '', ''),
(85, 'USA Government', 'GOV', '', '', ''),
(86, 'Guadeloupe (French)', 'GP', '590', '', ''),
(87, 'Equatorial Guinea', 'GQ', '240', '', ''),
(88, 'Greece', 'GR', '30', '', ''),
(89, 'S. Georgia & S. Sandwich Isls.', 'GS', '500', '', ''),
(90, 'Guatemala', 'GT', '502', '', ''),
(91, 'Guam (USA)', 'GU', '1-671', '', ''),
(92, 'Guinea Bissau', 'GW', '245', '', ''),
(93, 'Guyana', 'GY', '592', '', ''),
(94, 'Hong Kong', 'HK', '852', '', ''),
(95, 'Heard And Mcdonald Islands', 'HM', '', '', ''),
(96, 'Honduras', 'HN', '504', '', ''),
(97, 'Croatia', 'HR', '385', '', ''),
(98, 'Haiti', 'HT', '509', '', ''),
(99, 'Hungary', 'HU', '36', '', ''),
(100, 'Indonesia', 'ID', '62', '', ''),
(101, 'Ireland', 'IE', '353', '', ''),
(102, 'Israel', 'IL', '972', '', ''),
(103, 'India', 'IN', '91', '', ''),
(104, 'British Indian Ocean Territory', 'IO', '246', '', ''),
(105, 'Iraq', 'IQ', '964', '', ''),
(106, 'Iran', 'IR', '98', '', ''),
(107, 'Iceland', 'IS', '354', '', ''),
(108, 'Italy', 'IT', '39', '', ''),
(109, 'Jamaica', 'JM', '1-876', '', ''),
(110, 'Jordan', 'JO', '962', '', ''),
(111, 'Japan', 'JP', '81', '', ''),
(112, 'Kenya', 'KE', '254', '', ''),
(113, 'Kyrgyz Republic (Kyrgyzstan)', 'KG', '996', '', ''),
(114, 'Cambodia, Kingdom Of', 'KH', '855', '', ''),
(115, 'Kiribati', 'KI', '686', '', ''),
(116, 'Comoros', 'KM', '269', '', ''),
(117, 'Saint Kitts & Nevis Anguilla', 'KN', '1-869', '', ''),
(118, 'North Korea', 'KP', '850', '', ''),
(119, 'South Korea', 'KR', '82', '', ''),
(120, 'Kuwait', 'KW', '965', '', ''),
(121, 'Cayman Islands', 'KY', '1-345', '', ''),
(122, 'Kazakhstan', 'KZ', '7', '', ''),
(123, 'Laos', 'LA', '856', '', ''),
(124, 'Lebanon', 'LB', '961', '', ''),
(125, 'Saint Lucia', 'LC', '1-758', '', ''),
(126, 'Liechtenstein', 'LI', '423', '', ''),
(127, 'Sri Lanka', 'LK', '94', '', ''),
(128, 'Liberia', 'LR', '231', '', ''),
(129, 'Lesotho', 'LS', '266', '', ''),
(130, 'Lithuania', 'LT', '370', '', ''),
(131, 'Luxembourg', 'LU', '352', '', ''),
(132, 'Latvia', 'LV', '371', '', ''),
(133, 'Libya', 'LY', '218', '', ''),
(134, 'Morocco', 'MA', '212', '', ''),
(135, 'Monaco', 'MC', '377', '', ''),
(136, 'Moldavia', 'MD', '373', '', ''),
(137, 'Madagascar', 'MG', '261', '', ''),
(138, 'Marshall Islands', 'MH', '692', '', ''),
(139, 'Macedonia', 'MK', '389', '', ''),
(140, 'Mali', 'ML', '223', '', ''),
(141, 'Myanmar', 'MM', '95', '', ''),
(142, 'Mongolia', 'MN', '976', '', ''),
(143, 'Macau', 'MO', '853', '', ''),
(144, 'Northern Mariana Islands', 'MP', '1-670', '', ''),
(145, 'Martinique (French)', 'MQ', '596', '', ''),
(146, 'Mauritania', 'MR', '222', '', ''),
(147, 'Montserrat', 'MS', '1-664', '', ''),
(148, 'Malta', 'MT', '356', '', ''),
(149, 'Mauritius', 'MU', '230', '', ''),
(150, 'Maldives', 'MV', '960', '', ''),
(151, 'Malawi', 'MW', '265', '', ''),
(152, 'Mexico', 'MX', '52', '', ''),
(153, 'Malaysia', 'MY', '60', '', ''),
(154, 'Mozambique', 'MZ', '258', '', ''),
(155, 'Namibia', 'NA', '264', '', ''),
(156, 'New Caledonia (French)', 'NC', '687', '', ''),
(157, 'Niger', 'NE', '227', '', ''),
(158, 'Norfolk Island', 'NF', '672', '', ''),
(159, 'Nigeria', 'NG', '234', 'Nigerian', ''),
(160, 'Nicaragua', 'NI', '505', '', ''),
(161, 'Netherlands', 'NL', '31', '', ''),
(162, 'Norway', 'NO', '47', '', ''),
(163, 'Nepal', 'NP', '977', '', ''),
(164, 'Nauru', 'NR', '674', '', ''),
(165, 'Niue', 'NU', '683', '', ''),
(166, 'New Zealand', 'NZ', '64', '', ''),
(167, 'Oman', 'OM', '968', '', ''),
(168, 'Panama', 'PA', '507', '', ''),
(169, 'Peru', 'PE', '51', '', ''),
(170, 'Polynesia (French)', 'PF', '689', '', ''),
(171, 'Papua New Guinea', 'PG', '675', '', ''),
(172, 'Philippines', 'PH', '63', '', ''),
(173, 'Pakistan', 'PK', '92', '', ''),
(174, 'Poland', 'PL', '48', '', ''),
(175, 'Saint Pierre And Miquelon', 'PM', '508', '', ''),
(176, 'Pitcairn Island', 'PN', '64', '', ''),
(177, 'Puerto Rico', 'PR', '1-787', '', ''),
(178, 'Portugal', 'PT', '351', '', ''),
(179, 'Palau', 'PW', '680', '', ''),
(180, 'Paraguay', 'PY', '595', '', ''),
(181, 'Qatar', 'QA', '974', '', ''),
(182, 'Reunion (Ffrench)', 'RE', '262', '', ''),
(183, 'Romania', 'RO', '40', '', ''),
(184, 'Russian Federation', 'RU', '7', '', ''),
(185, 'Rwanda', 'RW', '250', '', ''),
(186, 'Saudi Arabia', 'SA', '966', '', ''),
(187, 'Solomon Islands', 'SB', '677', '', ''),
(188, 'Seychelles', 'SC', '248', '', ''),
(189, 'Sudan', 'SD', '249', '', ''),
(190, 'Sweden', 'SE', '46', '', ''),
(191, 'Singapore', 'SG', '65', '', ''),
(192, 'Saint Helena', 'SH', '290', '', ''),
(193, 'Slovenia', 'SI', '386', '', ''),
(194, 'Svalbard And Jan Mayen Islands', 'SJ', '47', '', ''),
(195, 'Slovak Republic', 'SK', '421', '', ''),
(196, 'Sierra Leone', 'SL', '232', '', ''),
(197, 'San Marino', 'SM', '378', '', ''),
(198, 'Senegal', 'SN', '221', '', ''),
(199, 'Somalia', 'SO', '252', '', ''),
(200, 'Suriname', 'SR', '597', '', ''),
(201, 'Saint Tome (Sao Tome) And Principe', 'ST', '239', '', ''),
(202, 'Former USSR', 'SU', '', '', ''),
(203, 'El Salvador', 'SV', '503', '', ''),
(204, 'Syria', 'SY', '963', '', ''),
(205, 'Swaziland', 'SZ', '268', '', ''),
(206, 'Turks And Caicos Islands', 'TC', '1-649', '', ''),
(207, 'Chad', 'TD', '235', '', ''),
(208, 'French Southern Territories', 'TF', '', '', ''),
(209, 'Togo', 'TG', '228', '', ''),
(210, 'Thailand', 'TH', '66', '', ''),
(211, 'Tadjikistan', 'TJ', '992', '', ''),
(212, 'Tokelau', 'TK', '690', '', ''),
(213, 'Turkmenistan', 'TM', '993', '', ''),
(214, 'Tunisia', 'TN', '216', '', ''),
(215, 'Tonga', 'TO', '676', '', ''),
(216, 'East Timor', 'TP', '670', '', ''),
(217, 'Turkey', 'TR', '90', '', ''),
(218, 'Trinidad And Tobago', 'TT', '1-868', '', ''),
(219, 'Tuvalu', 'TV', '688', '', ''),
(220, 'Taiwan', 'TW', '886', '', ''),
(221, 'Tanzania', 'TZ', '255', '', ''),
(222, 'Ukraine', 'UA', '380', '', ''),
(223, 'Uganda', 'UG', '256', '', ''),
(224, 'United Kingdom', 'UK', '44', '', ''),
(225, 'Usa Minor Outlying Islands', 'UM', '1', '', ''),
(226, 'United States', 'US', '1', '', ''),
(227, 'Uruguay', 'UY', '598', '', ''),
(228, 'Uzbekistan', 'UZ', '998', '', ''),
(229, 'Holy See (Vatican City State)', 'VA', '379', '', ''),
(230, 'Saint Vincent & Grenadines', 'VC', '1-784', '', ''),
(231, 'Venezuela', 'VE', '58', '', ''),
(232, 'Virgin Islands (British)', 'VG', '1-284', '', ''),
(233, 'Virgin Islands (USA)', 'VI', '1-340', '', ''),
(234, 'Vietnam', 'VN', '84', '', ''),
(235, 'Vanuatu', 'VU', '678', '', ''),
(236, 'Wallis And Futuna Islands', 'WF', '681', '', ''),
(237, 'Samoa', 'WS', '685', '', ''),
(238, 'Yemen', 'YE', '967', '', ''),
(239, 'Mayotte', 'YT', '262', '', ''),
(240, 'Yugoslavia', 'YU', '38', '', ''),
(241, 'South Africa', 'ZA', '27', '', ''),
(242, 'Zambia', 'ZM', '260', '', ''),
(243, 'Zaire', 'ZR', '243', '', ''),
(244, 'Zimbabwe', 'ZW', '263', '', ''),
(252, 'Nagorno-Karabakh', '', '', '', '');

-- --------------------------------------------------------

--
-- Table structure for table `duties`
--

CREATE TABLE `duties` (
  `dutyid` int(11) NOT NULL,
  `duty` varchar(255) NOT NULL,
  `dutystatus` int(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `duties`
--

INSERT INTO `duties` (`dutyid`, `duty`, `dutystatus`) VALUES
(1, 'Liberator 1', 1),
(2, 'Liberator 2', 1);

-- --------------------------------------------------------

--
-- Table structure for table `expenseheads`
--

CREATE TABLE `expenseheads` (
  `exphead` varchar(255) NOT NULL,
  `expno` int(11) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `expenseheads`
--

INSERT INTO `expenseheads` (`exphead`, `expno`) VALUES
('Purchases', 1),
('Stationaries', 2),
('Dividend', 3),
('Withdrawal', 4),
('Salary', 5),
('Transfer', 6),
('Refund', 7),
('System Repair', 8);

-- --------------------------------------------------------

--
-- Table structure for table `facilityregister`
--

CREATE TABLE `facilityregister` (
  `id` int(11) NOT NULL,
  `facno` int(11) NOT NULL,
  `factypeid` int(11) NOT NULL,
  `midno` varchar(11) NOT NULL,
  `adate` date NOT NULL,
  `principal` double NOT NULL,
  `period` int(11) NOT NULL,
  `interest` double NOT NULL,
  `instalment` double NOT NULL,
  `purpose` varchar(255) NOT NULL,
  `paid` double NOT NULL,
  `balance` double NOT NULL,
  `guaranto1` varchar(50) NOT NULL,
  `gamount1` double NOT NULL,
  `guaranto2` varchar(50) NOT NULL,
  `gamount2` double NOT NULL,
  `witness` varchar(50) NOT NULL,
  `approvedby` varchar(255) NOT NULL,
  `approvaldate` datetime NOT NULL DEFAULT current_timestamp(),
  `printstatus` int(11) NOT NULL,
  `chequeissued` int(11) NOT NULL,
  `remarks` varchar(50) NOT NULL,
  `userr` varchar(50) NOT NULL,
  `udate` datetime NOT NULL,
  `cdate` datetime NOT NULL DEFAULT current_timestamp()
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `facilityregister`
--

INSERT INTO `facilityregister` (`id`, `facno`, `factypeid`, `midno`, `adate`, `principal`, `period`, `interest`, `instalment`, `purpose`, `paid`, `balance`, `guaranto1`, `gamount1`, `guaranto2`, `gamount2`, `witness`, `approvedby`, `approvaldate`, `printstatus`, `chequeissued`, `remarks`, `userr`, `udate`, `cdate`) VALUES
(2, 1, 10, 'colma17001', '2017-09-09', 200000, 10, 20000, 22000, 'Just pay', 110000, 110000, 'colma17004', 50000, 'colma17009', 50000, 'colma17002', 'colma17005', '2017-09-19 19:22:12', 0, 0, '', '10', '2017-09-10 07:39:51', '2017-09-19 19:22:12'),
(3, 2, 10, 'colma17004', '2017-09-09', 200000, 10, 20000, 22000, 'Just pay', 88000, 132000, 'colma17001', 50000, 'colma17002', 50000, 'colma17005', 'colma17005', '2017-09-19 19:22:36', 0, 0, '', '10', '2017-09-10 07:51:14', '2017-09-19 19:22:36'),
(9, 3, 10, 'colma17009', '2017-09-11', 200000, 10, 20000, 22000, 'Just pay', 88000, 132000, 'colma17002', 50000, 'colma17001', 50000, 'colma17004', 'colma17005', '2017-09-19 19:23:21', 0, 0, '', '10', '2017-09-11 18:14:18', '2017-09-19 19:23:21'),
(66, 0, 7, 'colma20001', '2020-12-22', 1500000, 12, 225000, 143750, 'Land Purchase', 0, 1500000, 'colma17001', 1000000, 'colma17003', 500000, '', '', '2020-12-22 13:03:49', 0, 0, '', '', '0000-00-00 00:00:00', '2020-12-22 13:03:49'),
(73, 0, 9, 'colma20001', '2020-12-27', 400000, 11, 40000, 40000, 'New solar generator', 0, 400000, 'colma20002', 300000, 'colma17001', 200000, 'colma17004', '', '2020-12-27 16:19:20', 0, 0, '', '', '0000-00-00 00:00:00', '2020-12-27 16:19:20'),
(72, 0, 7, 'colma17001', '2020-12-25', 50000, 10, 7500, 5750, 'Personal home freezer', 0, 50000, 'colma17005', 30000, 'colma20002', 20000, 'colma17004', '', '2020-12-25 21:00:45', 0, 0, '', '', '0000-00-00 00:00:00', '2020-12-25 21:00:45');

-- --------------------------------------------------------

--
-- Table structure for table `facilitytypes`
--

CREATE TABLE `facilitytypes` (
  `factypeid` int(11) NOT NULL,
  `facility` varchar(50) NOT NULL,
  `fstatus` int(11) NOT NULL,
  `facilityfee` double NOT NULL,
  `interest_rate` int(10) NOT NULL,
  `max_amount` int(10) NOT NULL,
  `max_period` int(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `facilitytypes`
--

INSERT INTO `facilitytypes` (`factypeid`, `facility`, `fstatus`, `facilityfee`, `interest_rate`, `max_amount`, `max_period`) VALUES
(1, 'Membership Registration', 1, 1000, 0, 0, 0),
(2, 'Savings', 1, 1000, 0, 0, 0),
(3, 'Share', 1, 10000, 0, 0, 0),
(4, 'Asset Loan', 1, 1000, 10, 2, 12),
(5, 'Savings Withdrawal', 1, 1000, 20, 0, 0),
(6, 'Commodity Sales', 1, 1000, 10, 2, 12),
(7, 'Land Acquisition', 1, 1000, 15, 2, 24),
(8, 'Household Equipment Acquisition', 1, 1000, 15, 2, 12),
(9, 'Overdraft', 1, 1000, 10, 2, 12),
(10, 'Regular Loan', 1, 1000, 10, 2, 12),
(11, 'Asset Acquisition', 1, 2000, 15, 2, 12);

-- --------------------------------------------------------

--
-- Table structure for table `gender`
--

CREATE TABLE `gender` (
  `full` varchar(50) NOT NULL,
  `id` int(11) NOT NULL,
  `gender` varchar(255) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `gender`
--

INSERT INTO `gender` (`full`, `id`, `gender`) VALUES
('MALE', 1, 'm'),
('FEMALE', 2, 'f');

-- --------------------------------------------------------

--
-- Table structure for table `groupnames`
--

CREATE TABLE `groupnames` (
  `groupid` int(11) NOT NULL,
  `groupname` varchar(255) NOT NULL,
  `groupstatus` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `groupnames`
--

INSERT INTO `groupnames` (`groupid`, `groupname`, `groupstatus`) VALUES
(1, 'jj', '1');

-- --------------------------------------------------------

--
-- Table structure for table `imprestexpenses`
--

CREATE TABLE `imprestexpenses` (
  `impno` int(11) NOT NULL,
  `vdate` datetime NOT NULL,
  `vno` varchar(50) NOT NULL,
  `amount` double NOT NULL,
  `purpose` varchar(50) NOT NULL,
  `remark` varchar(100) NOT NULL,
  `userr` varchar(50) NOT NULL,
  `udate` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `imprestexpenses`
--

INSERT INTO `imprestexpenses` (`impno`, `vdate`, `vno`, `amount`, `purpose`, `remark`, `userr`, `udate`) VALUES
(1, '2009-02-01 00:00:00', '1', 1000, 'Purchase of Hardcover notebooks', '', '', '0000-00-00 00:00:00'),
(2, '2009-02-02 00:00:00', '2', 500, 'Transport to Ikeja', '', '', '0000-00-00 00:00:00'),
(3, '2009-07-03 00:00:00', '3', 1500, 'Lunch for the Auditors', '', '', '0000-00-00 00:00:00'),
(4, '2009-07-04 00:00:00', '4', 750, 'Purchase of stamps', '', '', '0000-00-00 00:00:00');

-- --------------------------------------------------------

--
-- Table structure for table `instruments`
--

CREATE TABLE `instruments` (
  `instrumentid` int(11) NOT NULL,
  `instrument` varchar(255) NOT NULL,
  `instrimentstatus` int(11) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `instruments`
--

INSERT INTO `instruments` (`instrumentid`, `instrument`, `instrimentstatus`) VALUES
(1, 'cash', 1),
(2, 'cheque', 1),
(3, 'draft', 1),
(4, 'teller', 1),
(5, 'instruction to debit', 1),
(6, 'transfer', 1),
(7, 'transfer', 1);

-- --------------------------------------------------------

--
-- Table structure for table `interest`
--

CREATE TABLE `interest` (
  `id` int(11) NOT NULL,
  `interestrate` varchar(255) NOT NULL,
  `facilityid` int(11) NOT NULL,
  `datecreated` datetime NOT NULL DEFAULT '0000-00-00 00:00:00' ON UPDATE current_timestamp(),
  `datechanged` datetime NOT NULL DEFAULT '0000-00-00 00:00:00' ON UPDATE current_timestamp()
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `interest`
--

INSERT INTO `interest` (`id`, `interestrate`, `facilityid`, `datecreated`, `datechanged`) VALUES
(1, '10', 10, '2017-09-09 21:36:18', '2017-09-09 21:36:18');

-- --------------------------------------------------------

--
-- Table structure for table `lga`
--

CREATE TABLE `lga` (
  `lga_id` mediumint(10) UNSIGNED NOT NULL DEFAULT 0,
  `state_id` int(11) NOT NULL DEFAULT 0,
  `lga_name` varchar(50) NOT NULL DEFAULT ''
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `lga`
--

INSERT INTO `lga` (`lga_id`, `state_id`, `lga_name`) VALUES
(1, 1, 'Aba North'),
(2, 1, 'Aba South'),
(3, 1, 'Arochukwu'),
(4, 1, 'Bende'),
(5, 1, 'Ikwuano'),
(6, 1, 'Isiala-Ngwa North'),
(7, 1, 'Isiala-Ngwa South'),
(8, 1, 'Isikwuato'),
(9, 1, 'Nneochi'),
(10, 1, 'Obi-Ngwa'),
(11, 1, 'Ohafia'),
(12, 1, 'Osisioma'),
(13, 1, 'Ugwunagbo'),
(14, 1, 'Ukwa East'),
(15, 1, 'Ukwa West'),
(16, 1, 'Umuahia North'),
(17, 1, 'Umuahia South'),
(18, 2, 'Demsa'),
(19, 2, 'Fufore'),
(20, 2, 'Genye'),
(21, 2, 'Girei'),
(22, 2, 'Gombi'),
(23, 2, 'guyuk'),
(24, 2, 'Hong'),
(25, 2, 'Jada'),
(26, 2, 'Jimeta'),
(27, 2, 'Lamurde'),
(28, 2, 'Madagali'),
(29, 2, 'Maiha'),
(30, 2, 'Mayo Belwa'),
(31, 2, 'Michika'),
(32, 2, 'Mubi North'),
(33, 2, 'Mubi South'),
(34, 2, 'Numan'),
(35, 2, 'Shelleng'),
(36, 2, 'Song'),
(37, 2, 'Toungo'),
(38, 2, 'Yola'),
(39, 3, 'Abak'),
(40, 3, 'Eastern-Obolo'),
(41, 3, 'Eket'),
(42, 3, 'Ekpe-Atani'),
(43, 3, 'Essien-Udim'),
(44, 3, 'Esit Ekit'),
(45, 3, 'Etim-Ekpo'),
(46, 3, 'Etinam'),
(47, 3, 'Ibeno'),
(48, 3, 'Ibesikp-Asitan'),
(49, 3, 'Ibiono-Ibom'),
(50, 3, 'Ika'),
(51, 3, 'Ikono'),
(52, 3, 'Ikot-Abasi'),
(53, 3, 'Ikot-Ekpene'),
(54, 3, 'Ini'),
(55, 3, 'Itu'),
(56, 3, 'Mbo'),
(57, 3, 'Mkpae-Enin'),
(58, 3, 'Nsit-Ibom'),
(59, 3, 'Nsit-Ubium'),
(60, 3, 'Obot-Akara'),
(61, 3, 'Okobo'),
(62, 3, 'Onna'),
(63, 3, 'Oron'),
(64, 3, 'Oro-Anam'),
(65, 3, 'Udung-Uko'),
(66, 3, 'Ukanefun'),
(67, 3, 'Uru Offong Oruko'),
(68, 3, 'Uruan'),
(69, 3, 'Uquo Ibene'),
(70, 3, 'Uyo'),
(71, 4, 'Aguata'),
(72, 4, 'Anambra'),
(73, 4, 'Anambra West'),
(74, 4, 'Anocha'),
(75, 4, 'Awka- North'),
(76, 4, 'Awka-South'),
(77, 4, 'Ayamelum'),
(78, 4, 'Dunukofia'),
(79, 4, 'Ekwusigo'),
(80, 4, 'Idemili-North'),
(81, 4, 'Idemili-South'),
(82, 4, 'Ihiala'),
(83, 4, 'Njikoka'),
(84, 4, 'Nnewi-North'),
(85, 4, 'Nnewi-South'),
(86, 4, 'Ogbaru'),
(87, 4, 'Onisha North'),
(88, 4, 'Onitsha South'),
(89, 4, 'Orumba North'),
(90, 4, 'Orumba South'),
(91, 4, 'Oyi'),
(92, 5, 'Alkaleri'),
(93, 5, 'Bauchi'),
(94, 5, 'Bogoro'),
(95, 5, 'Damban'),
(96, 5, 'Darazo'),
(97, 5, 'Dass'),
(98, 5, 'Gamawa'),
(99, 5, 'Ganjuwa'),
(100, 5, 'Giade'),
(101, 5, 'Itas/Gadau'),
(102, 5, 'Jama\'are'),
(103, 5, 'Katagum'),
(104, 5, 'Kirfi'),
(105, 5, 'Misau'),
(106, 5, 'Ningi'),
(107, 5, 'Shira'),
(108, 5, 'Tafawa-Balewa'),
(109, 5, 'Toro'),
(110, 5, 'Warji'),
(111, 5, 'Zaki'),
(112, 6, 'Brass'),
(113, 6, 'Ekerernor'),
(114, 6, 'Kolokuma/Opokuma'),
(115, 6, 'Nembe'),
(116, 6, 'Ogbia'),
(117, 6, 'Sagbama'),
(118, 6, 'Southern-Ijaw'),
(119, 6, 'Yenegoa'),
(120, 6, 'Kembe'),
(121, 7, 'Ado'),
(122, 7, 'Agatu'),
(123, 7, 'Apa'),
(124, 7, 'Buruku'),
(125, 7, 'Gboko'),
(126, 7, 'Guma'),
(127, 7, 'Gwer-East'),
(128, 7, 'Gwer-West'),
(129, 7, 'Katsina-Ala'),
(130, 7, 'Konshisha'),
(131, 7, 'Kwande'),
(132, 7, 'Logo'),
(133, 7, 'Makurdi'),
(134, 7, 'Obi'),
(135, 7, 'Ogbadibo'),
(136, 7, 'Ohimini'),
(137, 7, 'Oju'),
(138, 7, 'Okpokwu'),
(139, 7, 'Otukpo'),
(140, 7, 'Tarkar'),
(141, 7, 'Vandeikya'),
(142, 7, 'Ukum'),
(143, 7, 'Ushongo'),
(144, 8, 'Abadan'),
(145, 8, 'Askira-Uba'),
(146, 8, 'Bama'),
(147, 8, 'Bayo'),
(148, 8, 'Biu'),
(149, 8, 'Chibok'),
(150, 8, 'Damboa'),
(151, 8, 'Dikwa'),
(152, 8, 'Gubio'),
(153, 8, 'Guzamala'),
(154, 8, 'Gwoza'),
(155, 8, 'Hawul'),
(156, 8, 'Jere'),
(157, 8, 'Kaga'),
(158, 8, 'Kala/Balge'),
(159, 8, 'Kukawa'),
(160, 8, 'Konduga'),
(161, 8, 'Kwaya-Kusar'),
(162, 8, 'Mafa'),
(163, 8, 'Magumeri'),
(164, 8, 'Maiduguri'),
(165, 8, 'Marte'),
(166, 8, 'Mobbar'),
(167, 8, 'Monguno'),
(168, 8, 'Ngala'),
(169, 8, 'Nganzai'),
(170, 8, 'Shani'),
(171, 9, 'Abi'),
(172, 9, 'Akamkpa'),
(173, 9, 'Akpabuyo'),
(174, 9, 'Bakassi'),
(175, 9, 'Bekwara'),
(176, 9, 'Biasi'),
(177, 9, 'Boki'),
(178, 9, 'Calabar-Municipal'),
(179, 9, 'Calabar-South'),
(180, 9, 'Etunk'),
(181, 9, 'Ikom'),
(182, 9, 'Obantiku'),
(183, 9, 'Ogoja'),
(184, 9, 'Ugep North'),
(185, 9, 'Yakurr'),
(186, 9, 'Yala'),
(187, 10, 'Aniocha North'),
(188, 10, 'Aniocha South'),
(189, 10, 'Bomadi'),
(190, 10, 'Burutu'),
(191, 10, 'Ethiope East'),
(192, 10, 'Ethiope West'),
(193, 10, 'Ika North East'),
(194, 10, 'Ika South'),
(195, 10, 'Isoko North'),
(196, 10, 'Isoko South'),
(197, 10, 'Ndokwa East'),
(198, 10, 'Ndokwa West'),
(199, 10, 'Okpe'),
(200, 10, 'Oshimili North'),
(201, 10, 'Oshimili South'),
(202, 10, 'Patani'),
(203, 10, 'Sapele'),
(204, 10, 'Udu'),
(205, 10, 'Ughilli North'),
(206, 10, 'Ughilli South'),
(207, 10, 'Ukwuani'),
(208, 10, 'Uvwie'),
(209, 10, 'Warri Central'),
(210, 10, 'Warri North'),
(211, 10, 'Warri South'),
(212, 11, 'Abakaliki'),
(213, 11, 'Ofikpo North'),
(214, 11, 'Ofikpo South'),
(215, 11, 'Ebonyi'),
(216, 11, 'Ezza North'),
(217, 11, 'Ezza South'),
(218, 11, 'ikwo'),
(219, 11, 'Ishielu'),
(220, 11, 'Ivo'),
(221, 11, 'Izzi'),
(222, 11, 'Ohaukwu'),
(223, 11, 'Ohaozara'),
(224, 11, 'Onicha'),
(225, 12, 'Akoko Edo'),
(226, 12, 'Egor'),
(227, 12, 'Esan Central'),
(228, 12, 'Esan North East'),
(229, 12, 'Esan South East'),
(230, 12, 'Esan West'),
(231, 12, 'Etsako-Central'),
(232, 12, 'Etsako-West'),
(233, 12, 'Igueben'),
(234, 12, 'Ikpoba-Okha'),
(235, 12, 'Oredo'),
(236, 12, 'Orhionmwon'),
(237, 12, 'Ovia North East'),
(238, 12, 'Ovia South West'),
(239, 12, 'owan east'),
(240, 12, 'Owan West'),
(241, 12, 'Umunniwonde'),
(242, 13, 'Ado Ekiti'),
(243, 13, 'Aiyedire'),
(244, 13, 'Efon'),
(245, 13, 'Ekiti-East'),
(246, 13, 'Ekiti-South West'),
(247, 13, 'Ekiti West'),
(248, 13, 'Emure'),
(249, 13, 'Ido Osi'),
(250, 13, 'Ijero'),
(251, 13, 'Ikere'),
(252, 13, 'Ikole'),
(253, 13, 'Ilejemeta'),
(254, 13, 'Irepodun/Ifelodun'),
(255, 13, 'Ise Orun'),
(256, 13, 'Moba'),
(257, 13, 'Oye'),
(258, 14, 'Aninri'),
(259, 14, 'Awgu'),
(260, 14, 'Enugu East'),
(261, 14, 'Enugu North'),
(262, 14, 'Enugu South'),
(263, 14, 'Ezeagu'),
(264, 14, 'Igbo Etiti'),
(265, 14, 'Igbo Eze North'),
(266, 14, 'Igbo Eze South'),
(267, 14, 'Isi Uzo'),
(268, 14, 'Nkanu East'),
(269, 14, 'Nkanu West'),
(270, 14, 'Nsukka'),
(271, 14, 'Oji-River'),
(272, 14, 'Udenu'),
(273, 14, 'Udi'),
(274, 14, 'Uzo Uwani'),
(275, 15, 'Akko'),
(276, 15, 'Balanga'),
(277, 15, 'Billiri'),
(278, 15, 'Dukku'),
(279, 15, 'Funakaye'),
(280, 15, 'Gombe'),
(281, 15, 'Kaltungo'),
(282, 15, 'Kwami'),
(283, 15, 'Nafada/Bajoga'),
(284, 15, 'Shomgom'),
(285, 15, 'Yamltu/Deba'),
(286, 16, 'Ahiazu-Mbaise'),
(287, 16, 'Ehime-Mbano'),
(288, 16, 'Ezinihtte'),
(289, 16, 'Ideato North'),
(290, 16, 'Ideato South'),
(291, 16, 'Ihitte/Uboma'),
(292, 16, 'Ikeduru'),
(293, 16, 'Isiala-Mbano'),
(294, 16, 'Isu'),
(295, 16, 'Mbaitoli'),
(296, 16, 'Ngor-Okpala'),
(297, 16, 'Njaba'),
(298, 16, 'Nkwerre'),
(299, 16, 'Nwangele'),
(300, 16, 'obowo'),
(301, 16, 'Oguta'),
(302, 16, 'Ohaji-Eggema'),
(303, 16, 'Okigwe'),
(304, 16, 'Onuimo'),
(305, 16, 'Orlu'),
(306, 16, 'Orsu'),
(307, 16, 'Oru East'),
(308, 16, 'Oru West'),
(309, 16, 'Owerri Municipal'),
(310, 16, 'Owerri North'),
(311, 16, 'Owerri West'),
(312, 17, 'Auyu'),
(313, 17, 'Babura'),
(314, 17, 'Birnin Kudu'),
(315, 17, 'Birniwa'),
(316, 17, 'Bosuwa'),
(317, 17, 'Buji'),
(318, 17, 'Dutse'),
(319, 17, 'Gagarawa'),
(320, 17, 'Garki'),
(321, 17, 'Gumel'),
(322, 17, 'Guri'),
(323, 17, 'Gwaram'),
(324, 17, 'Gwiwa'),
(325, 17, 'Hadejia'),
(326, 17, 'Jahun'),
(327, 17, 'Kafin Hausa'),
(328, 17, 'Kaugama'),
(329, 17, 'Kazaure'),
(330, 17, 'Kirikasanuma'),
(331, 17, 'Kiyawa'),
(332, 17, 'Maigatari'),
(333, 17, 'Malam Maduri'),
(334, 17, 'Miga'),
(335, 17, 'Ringim'),
(336, 17, 'Roni'),
(337, 17, 'Sule Tankarkar'),
(338, 17, 'Taura'),
(339, 17, 'Yankwashi'),
(340, 18, 'Birnin-Gwari'),
(341, 18, 'Chikun'),
(342, 18, 'Giwa'),
(343, 18, 'Gwagwada'),
(344, 18, 'Igabi'),
(345, 18, 'Ikara'),
(346, 18, 'Jaba'),
(347, 18, 'Jema\'a'),
(348, 18, 'Kachia'),
(349, 18, 'Kaduna North'),
(350, 18, 'Kagarko'),
(351, 18, 'Kajuru'),
(352, 18, 'Kaura'),
(353, 18, 'Kauru'),
(354, 18, 'Koka/Kawo'),
(355, 18, 'Kubah'),
(356, 18, 'Kudan'),
(357, 18, 'Lere'),
(358, 18, 'Makarfi'),
(359, 18, 'Sabon Gari'),
(360, 18, 'Sanga'),
(361, 18, 'Sabo'),
(362, 18, 'Tudun-Wada/Makera'),
(363, 18, 'Zango-Kataf'),
(364, 18, 'Zaria'),
(365, 19, 'Ajingi'),
(366, 19, ' Albasu'),
(367, 19, 'Bagwai'),
(368, 19, 'Bebeji'),
(369, 19, 'Bichi'),
(370, 19, 'Bunkure'),
(371, 19, 'Dala'),
(372, 19, 'Dambatta'),
(373, 19, 'Dawakin Kudu'),
(374, 19, 'Dawakin Tofa'),
(375, 19, 'Doguwa'),
(376, 19, 'Fagge'),
(377, 19, 'Gabasawa'),
(378, 19, 'Garko'),
(379, 19, 'Garun-Mallam'),
(380, 19, 'Gaya'),
(381, 19, 'Gezawa'),
(382, 19, 'Gwale'),
(383, 19, 'Gwarzo'),
(384, 19, 'Kabo'),
(385, 19, 'Kano Municipal'),
(386, 19, 'Karaye'),
(387, 19, 'Kibiya'),
(388, 19, 'Kiru'),
(389, 19, 'Kumbotso'),
(390, 19, 'Kunchi'),
(391, 19, 'Kura'),
(392, 19, 'Madobi'),
(393, 19, 'Makoda'),
(394, 19, 'Minjibir'),
(395, 19, 'Nasarawa'),
(396, 19, 'Rano'),
(397, 19, 'Rimin Gado'),
(398, 19, 'Rogo'),
(399, 19, 'Shanono'),
(400, 19, 'Sumaila'),
(401, 19, 'Takai'),
(402, 19, 'Tarauni'),
(403, 19, 'Tofa'),
(404, 19, 'Tsanyawa'),
(405, 19, 'Tudun Wada'),
(406, 19, 'Ngogo'),
(407, 19, 'Warawa'),
(408, 19, 'Wudil'),
(409, 20, 'Bakori'),
(410, 20, 'Batagarawa'),
(411, 20, 'Batsari'),
(412, 20, 'Baure'),
(413, 20, 'Bindawa'),
(414, 20, 'Charanchi'),
(415, 20, 'Danja'),
(416, 20, 'Danjume'),
(417, 20, 'Dan-Musa'),
(418, 20, 'Daura'),
(419, 20, 'Dutsi'),
(420, 20, 'Dutsinma'),
(421, 20, 'Faskari'),
(422, 20, 'Funtua'),
(423, 20, 'Ingara'),
(424, 20, 'Jibia'),
(425, 20, 'Kafur'),
(426, 20, 'Kaita'),
(427, 20, 'Kankara'),
(428, 20, 'Kankia'),
(429, 20, 'Katsina'),
(430, 20, 'Kurfi'),
(431, 20, 'Kusada'),
(432, 20, 'Mai Adua'),
(433, 20, 'Malumfashi'),
(434, 20, 'Mani'),
(435, 20, 'Mashi'),
(436, 20, 'Matazu'),
(437, 20, 'Musawa'),
(438, 20, 'Rimi'),
(439, 20, 'Sabuwa'),
(440, 20, 'Safana'),
(441, 20, 'Sandamu'),
(442, 20, 'Zango'),
(443, 21, 'Aleira'),
(444, 21, 'Arewa'),
(445, 21, 'Argungu'),
(446, 21, 'Augie'),
(447, 21, 'Bagudo'),
(448, 21, 'Birnin-Kebbi'),
(449, 21, 'Bumza'),
(450, 21, 'Dandi'),
(451, 21, 'Danko'),
(452, 21, 'Fakai'),
(453, 21, 'Gwandu'),
(454, 21, 'Jega'),
(455, 21, 'Kalgo'),
(456, 21, 'Koko-Besse'),
(457, 21, 'Maiyama'),
(458, 21, 'Ngaski'),
(459, 21, 'Sakaba'),
(460, 21, 'Shanga'),
(461, 21, 'Suru'),
(462, 21, 'Wasagu'),
(463, 21, 'Yauri'),
(464, 21, 'Zuru'),
(465, 22, 'Adavi'),
(466, 22, 'Ajaokuta'),
(467, 22, 'Ankpa'),
(468, 22, 'Bassa'),
(469, 22, 'Dekina'),
(470, 22, 'Ibaji'),
(471, 22, 'Idah'),
(472, 22, 'Igalamela'),
(473, 22, 'Ijumu'),
(474, 22, 'Kabba/Bunu'),
(475, 22, 'Kogi'),
(476, 22, 'Lokoja'),
(477, 22, 'Mopa-Muro-Mopi'),
(478, 22, 'Ofu'),
(479, 22, 'Ogori/Magongo'),
(480, 22, 'Okehi'),
(481, 22, 'Okene'),
(482, 22, 'Olamaboro'),
(483, 22, 'Omala'),
(484, 22, 'Oyi'),
(485, 22, 'Yagba-East'),
(486, 22, 'Yagba-West'),
(487, 23, 'Asa'),
(488, 23, 'Baruten'),
(489, 23, 'Edu'),
(490, 23, 'Ekiti'),
(491, 23, 'Ifelodun'),
(492, 23, 'Ilorin East'),
(493, 23, 'Ilorin South'),
(494, 23, 'Ilorin West'),
(495, 23, 'Irepodun'),
(496, 23, 'Isin'),
(497, 23, 'Kaiama'),
(498, 23, 'Moro'),
(499, 23, 'Offa'),
(500, 23, 'Oke-Ero'),
(501, 23, 'Oyun'),
(502, 23, 'Pategi'),
(503, 24, 'Agege'),
(504, 24, 'Ajeromi-Ifelodun'),
(505, 24, 'Alimosho'),
(506, 24, 'Amuwo-Odofin'),
(507, 24, 'Apapa'),
(508, 24, 'Badagry'),
(509, 24, 'Epe'),
(510, 24, 'Eti-Osa'),
(511, 24, 'Ibeju-Lekki'),
(512, 24, 'Ifako-Ijaiye'),
(513, 24, 'Ikeja'),
(514, 24, 'Ikorodu'),
(515, 24, 'Kosofe'),
(516, 24, 'Lagos-Island'),
(517, 24, 'Lagos-Mainland'),
(518, 24, 'Mushin'),
(519, 24, 'Ojo'),
(520, 24, 'Oshodi-Isolo'),
(521, 24, 'Shomolu'),
(522, 24, 'Suru-Lere'),
(523, 25, 'Akwanga'),
(524, 25, 'Awe'),
(525, 25, 'Doma'),
(526, 25, 'Karu'),
(527, 25, 'Keana'),
(528, 25, 'Keffi'),
(529, 25, 'Kokona'),
(530, 25, 'Lafia'),
(531, 25, 'Nassarawa'),
(532, 25, 'Nassarawa Eggor'),
(533, 25, 'Obi'),
(534, 25, 'Toto'),
(535, 25, 'Wamba'),
(536, 26, 'Agaie'),
(537, 26, 'Agwara'),
(538, 26, 'Bida'),
(539, 26, 'Borgu'),
(540, 26, 'Bosso'),
(541, 26, 'Chanchaga'),
(542, 26, 'Edati'),
(543, 26, 'Gbako'),
(544, 26, 'Gurara'),
(545, 26, 'Katcha'),
(546, 26, 'Kontagora'),
(547, 26, 'Lapai'),
(548, 26, 'Lavum'),
(549, 26, 'Magama'),
(550, 26, 'Mariga'),
(551, 26, 'Mashegu'),
(552, 26, 'Mokwa'),
(553, 26, 'Muya'),
(554, 26, 'Paikoro'),
(555, 26, 'Rafi'),
(556, 26, 'Rajau'),
(557, 26, 'Shiroro'),
(558, 26, 'Suleja'),
(559, 26, 'Tafa'),
(560, 26, 'Wushishi'),
(561, 27, 'Abeokuta -North'),
(562, 27, 'Abeokuta -South'),
(563, 27, 'Ado-Odu/Ota'),
(564, 27, 'Yewa-North'),
(565, 27, 'Yewa-South'),
(566, 27, 'Ewekoro'),
(567, 27, 'Ifo'),
(568, 27, 'Ijebu East'),
(569, 27, 'Ijebu North'),
(570, 27, 'Ijebu North-East'),
(571, 27, 'Ijebu-Ode'),
(572, 27, 'Ikenne'),
(573, 27, 'Imeko-Afon'),
(574, 27, 'Ipokia'),
(575, 27, 'Obafemi -Owode'),
(576, 27, 'Odeda'),
(577, 27, 'Odogbolu'),
(578, 27, 'Ogun-Water Side'),
(579, 27, 'Remo-North'),
(580, 27, 'Shagamu'),
(581, 28, 'Akoko-North-East'),
(582, 28, 'Akoko-North-West'),
(583, 28, 'Akoko-South-West'),
(584, 28, 'Akoko-South-East'),
(585, 28, 'Akure- South'),
(586, 28, 'Akure-North'),
(587, 28, 'Ese-Odo'),
(588, 28, 'Idanre'),
(589, 28, 'Ifedore'),
(590, 28, 'Ilaje'),
(591, 28, 'Ile-Oluji-Okeigbo'),
(592, 28, 'Irele'),
(593, 28, 'Odigbo'),
(594, 28, 'Okitipupa'),
(595, 28, 'Ondo-West'),
(596, 28, 'Ondo East'),
(597, 28, 'Ose'),
(598, 28, 'Owo'),
(599, 29, 'Atakumosa'),
(600, 29, 'Atakumosa East'),
(601, 29, 'Ayeda-Ade'),
(602, 29, 'Ayedire'),
(603, 29, 'Boluwaduro'),
(604, 29, 'Boripe'),
(605, 29, 'Ede'),
(606, 29, 'Ede North'),
(607, 29, 'Egbedore'),
(608, 29, 'Ejigbo'),
(609, 29, 'Ife'),
(610, 29, 'Ife East'),
(611, 29, 'Ife North'),
(612, 29, 'Ife South'),
(613, 29, 'Ifedayo'),
(614, 29, 'Ifelodun'),
(615, 29, 'Ila'),
(616, 29, 'Ilesha'),
(617, 29, 'Ilesha-West'),
(618, 29, 'Irepodun'),
(619, 29, 'Irewole'),
(620, 29, 'Isokun'),
(621, 29, 'Iwo'),
(622, 29, 'Obokun'),
(623, 29, 'Odo-Otin'),
(624, 29, 'Ola Oluwa'),
(625, 29, 'Olorunda'),
(626, 29, 'Ori-Ade'),
(627, 29, 'Orolu'),
(628, 29, 'Osogbo'),
(629, 30, 'Afijio'),
(630, 30, 'Akinyele'),
(631, 30, 'Atiba'),
(632, 30, 'Atisbo'),
(633, 30, 'Egbeda'),
(634, 30, 'Ibadan-Central'),
(635, 30, 'Ibadan-North-East'),
(636, 30, 'Ibadan-North-West'),
(637, 30, 'Ibadan-South-East'),
(638, 30, 'Ibadan-South-West'),
(639, 30, 'Ibarapa-Central'),
(640, 30, 'Ibarapa-East'),
(641, 30, 'Ibarapa-North'),
(642, 30, 'Ido'),
(643, 30, 'Ifedayo'),
(644, 30, 'Ifeloju'),
(645, 30, 'Irepo'),
(646, 30, 'Iseyin'),
(647, 30, 'Itesiwaju'),
(648, 30, 'Iwajowa'),
(649, 30, 'Kajola'),
(650, 30, 'Lagelu'),
(651, 30, 'Odo-Oluwa'),
(652, 30, 'Ogbomoso-North'),
(653, 30, 'Ogbomosho-South'),
(654, 30, 'Olorunsogo'),
(655, 30, 'Oluyole'),
(656, 30, 'Ona-Ara'),
(657, 30, 'Orelope'),
(658, 30, 'Ori-Ire'),
(659, 30, 'Oyo East'),
(660, 30, 'Oyo West'),
(661, 30, 'saki east'),
(662, 30, 'Saki West'),
(663, 30, 'Surulere'),
(664, 31, 'Barkin Ladi'),
(665, 31, 'Bassa'),
(666, 31, 'Bokkos'),
(667, 31, 'Jos-East'),
(668, 31, 'Jos-South'),
(669, 31, 'Jos-North'),
(670, 31, 'Kanam'),
(671, 31, 'Kanke'),
(672, 31, 'Langtang North'),
(673, 31, 'Langtang South'),
(674, 31, 'Mangu'),
(675, 31, 'Mikang'),
(676, 31, 'Pankshin'),
(677, 31, 'Quan\'pan'),
(678, 31, 'Riyom'),
(679, 31, 'Shendam'),
(680, 31, 'Wase'),
(681, 32, 'Abua/Odual'),
(682, 32, 'Ahoada East'),
(683, 32, 'Ahoada West'),
(684, 32, 'Akukutoru'),
(685, 32, 'Andoni'),
(686, 32, 'Asari-Toro'),
(687, 32, 'Bonny'),
(688, 32, 'Degema'),
(689, 32, 'Eleme'),
(690, 32, 'Emuoha'),
(691, 32, 'Etche'),
(692, 32, 'Gokana'),
(693, 32, 'Ikwerre'),
(694, 32, 'Khana'),
(695, 32, 'Obio/Akpor'),
(696, 32, 'Ogba/Egbama/Ndoni'),
(697, 32, 'Ogu/Bolo'),
(698, 32, 'Okrika'),
(699, 32, 'Omuma'),
(700, 32, 'Opobo/Nkoro'),
(701, 32, 'Oyigbo'),
(702, 32, 'Port-Harcourt'),
(703, 32, 'Tai'),
(704, 33, 'Binji'),
(705, 33, 'Bodinga'),
(706, 33, 'Dange-Shuni'),
(707, 33, 'Gada'),
(708, 33, 'Goronyo'),
(709, 33, 'Gudu'),
(710, 33, 'Gwadabawa'),
(711, 33, 'Illela'),
(712, 33, 'Isa'),
(713, 33, 'Kebbe'),
(714, 33, 'Kware'),
(715, 33, 'Raba'),
(716, 33, 'Sabon-Birni'),
(717, 33, 'Shagari'),
(718, 33, 'Silame'),
(719, 33, 'Sokoto North'),
(720, 33, 'Sokoto South'),
(721, 33, 'Tambuwal'),
(722, 33, 'Tanzaga'),
(723, 33, 'Tureta'),
(724, 33, 'Wamakko'),
(725, 33, 'Wurno'),
(726, 33, 'Yabo'),
(727, 34, 'Ardo Kola'),
(728, 34, 'Bali'),
(729, 34, 'Donga'),
(730, 34, 'Gashaka'),
(731, 34, 'Gassol'),
(732, 34, 'Ibi'),
(733, 34, 'Jalingo'),
(734, 34, 'Karim-Lamido'),
(735, 34, 'Kurmi'),
(736, 34, 'Lau'),
(737, 34, 'Sardauna'),
(738, 34, 'Takuni'),
(739, 34, 'Ussa'),
(740, 34, 'Wukari'),
(741, 34, 'Yarro'),
(742, 34, 'Zing'),
(743, 35, 'Bade'),
(744, 35, 'Bursali'),
(745, 35, 'Damaturu'),
(746, 35, 'Fuka'),
(747, 35, 'Fune'),
(748, 35, 'Geidam'),
(749, 35, 'Gogaram'),
(750, 35, 'Gujba'),
(751, 35, 'Gulani'),
(752, 35, 'Jakusko'),
(753, 35, 'Karasuwa'),
(754, 35, 'Machina'),
(755, 35, 'Nangere'),
(756, 35, 'Nguru'),
(757, 35, 'Potiskum'),
(758, 35, 'Tarmua'),
(759, 35, 'Yunisari'),
(760, 35, 'Yusufari'),
(761, 36, 'Anka'),
(762, 36, 'Bakure'),
(763, 36, 'Bukkuyum'),
(764, 36, 'Bungudo'),
(765, 36, 'Gumi'),
(766, 36, 'Gusau'),
(767, 36, 'Isa'),
(768, 36, 'Kaura-Namoda'),
(769, 36, 'Kiyawa'),
(770, 36, 'Maradun'),
(771, 36, 'Marau'),
(772, 36, 'Shinkafa'),
(773, 36, 'Talata-Mafara'),
(774, 36, 'Tsafe'),
(775, 36, 'Zurmi'),
(776, 9, 'Obudu'),
(777, 37, 'Abaji'),
(778, 37, 'Bwari'),
(779, 37, 'Gwagwalada'),
(780, 37, 'Kuje'),
(781, 37, 'Kwali'),
(782, 37, 'Municipal'),
(783, 12, 'Etsako-East'),
(784, 16, 'Ahiazu-Mbaise'),
(785, 38, 'Foreign'),
(786, 18, 'Kaduna South'),
(787, 16, 'Aboh-Mbaise'),
(788, 9, 'Odukpani');

-- --------------------------------------------------------

--
-- Table structure for table `liberators`
--

CREATE TABLE `liberators` (
  `liberatorid` int(11) NOT NULL,
  `staffid` int(11) NOT NULL,
  `title` int(11) NOT NULL,
  `sname` varchar(255) NOT NULL,
  `fname` varchar(255) NOT NULL,
  `mname` varchar(255) NOT NULL,
  `post` int(11) NOT NULL,
  `duty` int(11) NOT NULL,
  `liberatorstatus` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `login`
--

CREATE TABLE `login` (
  `loginid` int(11) NOT NULL,
  `userid` varchar(255) NOT NULL,
  `kokoro` varchar(255) NOT NULL,
  `status` int(11) NOT NULL,
  `checkk` int(11) NOT NULL,
  `usertypeid` int(11) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `login`
--

INSERT INTO `login` (`loginid`, `userid`, `kokoro`, `status`, `checkk`, `usertypeid`) VALUES
(1, 'colma17001', '$2y$11$qCx41jKdqI5oMRGgNg4At.rwTmHwfIn6miF3zWVVC1IhDTc3CORYy', 1, 0, 1);

-- --------------------------------------------------------

--
-- Table structure for table `mdeduction1`
--

CREATE TABLE `mdeduction1` (
  `id` int(11) NOT NULL,
  `memid` varchar(255) NOT NULL,
  `membername` varchar(100) NOT NULL,
  `bacctno` varchar(255) NOT NULL,
  `amt` double NOT NULL,
  `factypeid` int(11) NOT NULL,
  `facno` int(11) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `mdeduction1`
--

INSERT INTO `mdeduction1` (`id`, `memid`, `membername`, `bacctno`, `amt`, `factypeid`, `facno`) VALUES
(1, 'colma17001', 'Akande Joshua Ayomikun', '7677676876', 768686, 2, 0),
(2, 'colma17004', 'Oladoyin Lolade ', '7677676876', 800000, 2, 0),
(3, 'colma17002', 'Alichi Chikwesi Victor', '7677676876', 768686, 2, 0),
(4, 'colma17003', 'Ajijola Oluwaseun Isaiah', '7677676876', 768686, 2, 0),
(5, 'colma17005', 'Akinremi Josiah Olumide', '7677676876', 768686, 2, 0),
(6, 'colma17006', 'Amadi Ebere Ebube', '1356564', 1000000, 2, 0),
(7, 'colma17007', 'Amadi Ebere Ebube', '1356564', 1000000, 2, 0),
(8, 'colma17008', 'Amadi Ebere Ebube', '1356564', 1000000, 2, 0),
(9, 'colma20001', 'Akugbe Stephen Osalumense', '2208441313', 50000, 2, 0),
(10, 'colma20002', 'Akugbe Sammy Osazua', '2208441377', 50000, 2, 0),
(11, 'colma20003', 'Akande Simisola Adeola', '0069383385', 20000, 2, 0),
(12, 'colma20005', 'Madueke Williams Uchendu', '220888098', 50000, 2, 0),
(13, 'colma17001', 'Akande Joshua Ayomikun', '7677676876', 22000, 10, 1),
(14, 'colma17001', 'Akande Joshua Ayomikun', '7677676876', 5750, 7, 0),
(15, 'colma17004', 'Oladoyin Lolade ', '7677676876', 22000, 10, 2),
(16, 'colma17009', 'Ajayi Priscilla Oluwatoyin', '7677676876', 22000, 10, 3),
(17, 'colma20001', 'Akugbe Stephen Osalumense', '2208441313', 143750, 7, 0),
(18, 'colma20001', 'Akugbe Stephen Osalumense', '2208441313', 46000, 8, 0);

-- --------------------------------------------------------

--
-- Table structure for table `mdeduction2`
--

CREATE TABLE `mdeduction2` (
  `id` int(11) NOT NULL,
  `memid` varchar(255) NOT NULL,
  `membername` varchar(100) NOT NULL,
  `bacctno` varchar(255) NOT NULL,
  `amt` double NOT NULL,
  `factypeid` int(11) NOT NULL,
  `facno` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `mdeduction2`
--

INSERT INTO `mdeduction2` (`id`, `memid`, `membername`, `bacctno`, `amt`, `factypeid`, `facno`) VALUES
(1, 'colma17001', 'Akande Joshua Ayomikun', '7677676876', 40000, 2, 0),
(2, 'colma17001', 'Akande Joshua Ayomikun', '7677676876', 7689, 2, 0),
(3, 'colma17001', 'Akande Joshua Ayomikun', '7677676876', 9908, 2, 0),
(4, 'colma17001', 'Akande Joshua Ayomikun', '7677676876', 7686, 2, 0),
(5, 'colma17001', 'Akande Joshua Ayomikun', '7677676876', 76868, 2, 0),
(6, 'colma17001', 'Akande Joshua Ayomikun', '7677676876', 7686, 2, 0),
(7, 'colma17001', 'Akande Joshua Ayomikun', '7677676876', 22000, 10, 1),
(8, 'colma20001', 'Akugbe Stephen Osalumense', '2208441313', 30000, 2, 0),
(9, 'colma17005', 'Akinremi Josiah Olumide', '7677676876', 76869, 2, 0),
(10, 'colma17001', 'Akande Joshua Ayomikun', '7677676876', 40000, 2, 0);

-- --------------------------------------------------------

--
-- Table structure for table `memberpays`
--

CREATE TABLE `memberpays` (
  `id` int(11) NOT NULL,
  `memid` varchar(255) NOT NULL,
  `amount` double NOT NULL,
  `factypeid` int(11) NOT NULL,
  `facno` varchar(50) NOT NULL,
  `paydate` datetime NOT NULL,
  `year_mont` varchar(10) NOT NULL,
  `remark` varchar(50) NOT NULL,
  `userr` varchar(50) NOT NULL,
  `entrydate` datetime NOT NULL,
  `paymode` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `memberpays`
--

INSERT INTO `memberpays` (`id`, `memid`, `amount`, `factypeid`, `facno`, `paydate`, `year_mont`, `remark`, `userr`, `entrydate`, `paymode`) VALUES
(1, 'colma17001', 768686, 2, '0', '2020-12-31 00:00:00', '2020_12', '', 'colma17001', '2020-12-18 13:05:29', 0),
(2, 'colma17004', 800000, 2, '0', '2020-12-31 00:00:00', '2020_12', '', 'colma17001', '2020-12-18 13:05:29', 0),
(3, 'colma17002', 768686, 2, '0', '2020-12-31 00:00:00', '2020_12', '', 'colma17001', '2020-12-18 13:05:29', 0),
(4, 'colma17003', 768686, 2, '0', '2020-12-31 00:00:00', '2020_12', '', 'colma17001', '2020-12-18 13:05:29', 0),
(5, 'colma17005', 768686, 2, '0', '2020-12-31 00:00:00', '2020_12', '', 'colma17001', '2020-12-18 13:05:29', 0),
(6, 'colma17006', 1000000, 2, '0', '2020-12-31 00:00:00', '2020_12', '', 'colma17001', '2020-12-18 13:05:29', 0),
(7, 'colma17007', 1000000, 2, '0', '2020-12-31 00:00:00', '2020_12', '', 'colma17001', '2020-12-18 13:05:29', 0),
(8, 'colma17008', 1000000, 2, '0', '2020-12-31 00:00:00', '2020_12', '', 'colma17001', '2020-12-18 13:05:29', 0),
(9, 'colma20001', 50000, 2, '0', '2020-12-31 00:00:00', '2020_12', '', 'colma17001', '2020-12-18 13:05:29', 0),
(10, 'colma20002', 50000, 2, '0', '2020-12-31 00:00:00', '2020_12', '', 'colma17001', '2020-12-18 13:05:29', 0),
(11, 'colma20003', 20000, 2, '0', '2020-12-31 00:00:00', '2020_12', '', 'colma17001', '2020-12-18 13:05:29', 0),
(12, 'colma20005', 50000, 2, '0', '2020-12-31 00:00:00', '2020_12', '', 'colma17001', '2020-12-18 13:05:29', 0),
(13, 'colma17001', 22000, 10, '1', '2020-12-31 00:00:00', '2020_12', '', 'colma17001', '2020-12-18 13:05:29', 0),
(14, 'colma17004', 22000, 10, '2', '2020-12-31 00:00:00', '2020_12', '', 'colma17001', '2020-12-18 13:05:29', 0),
(15, 'colma17009', 22000, 10, '3', '2020-12-31 00:00:00', '2020_12', '', 'colma17001', '2020-12-18 13:05:29', 0),
(16, 'colma17001', 768686, 2, '0', '2020-12-31 00:00:00', '2020_12', '', 'colma17001', '2020-12-18 13:07:46', 0),
(17, 'colma17004', 800000, 2, '0', '2020-12-31 00:00:00', '2020_12', '', 'colma17001', '2020-12-18 13:07:46', 0),
(18, 'colma17002', 768686, 2, '0', '2020-12-31 00:00:00', '2020_12', '', 'colma17001', '2020-12-18 13:07:46', 0),
(19, 'colma17003', 768686, 2, '0', '2020-12-31 00:00:00', '2020_12', '', 'colma17001', '2020-12-18 13:07:46', 0),
(20, 'colma17005', 768686, 2, '0', '2020-12-31 00:00:00', '2020_12', '', 'colma17001', '2020-12-18 13:07:46', 0),
(21, 'colma17006', 1000000, 2, '0', '2020-12-31 00:00:00', '2020_12', '', 'colma17001', '2020-12-18 13:07:46', 0),
(22, 'colma17007', 1000000, 2, '0', '2020-12-31 00:00:00', '2020_12', '', 'colma17001', '2020-12-18 13:07:46', 0),
(23, 'colma17008', 1000000, 2, '0', '2020-12-31 00:00:00', '2020_12', '', 'colma17001', '2020-12-18 13:07:46', 0),
(24, 'colma20001', 50000, 2, '0', '2020-12-31 00:00:00', '2020_12', '', 'colma17001', '2020-12-18 13:07:46', 0),
(25, 'colma20002', 50000, 2, '0', '2020-12-31 00:00:00', '2020_12', '', 'colma17001', '2020-12-18 13:07:46', 0),
(26, 'colma20003', 20000, 2, '0', '2020-12-31 00:00:00', '2020_12', '', 'colma17001', '2020-12-18 13:07:46', 0),
(27, 'colma20005', 50000, 2, '0', '2020-12-31 00:00:00', '2020_12', '', 'colma17001', '2020-12-18 13:07:46', 0),
(28, 'colma17001', 22000, 10, '1', '2020-12-31 00:00:00', '2020_12', '', 'colma17001', '2020-12-18 13:07:46', 0),
(29, 'colma17004', 22000, 10, '2', '2020-12-31 00:00:00', '2020_12', '', 'colma17001', '2020-12-18 13:07:46', 0),
(30, 'colma17009', 22000, 10, '3', '2020-12-31 00:00:00', '2020_12', '', 'colma17001', '2020-12-18 13:07:46', 0),
(31, 'colma17001', 768686, 2, '0', '2020-12-31 00:00:00', '2020_12', '', 'colma17001', '2020-12-18 14:52:09', 0),
(32, 'colma17004', 800000, 2, '0', '2020-12-31 00:00:00', '2020_12', '', 'colma17001', '2020-12-18 14:52:09', 0),
(33, 'colma17002', 768686, 2, '0', '2020-12-31 00:00:00', '2020_12', '', 'colma17001', '2020-12-18 14:52:09', 0),
(34, 'colma17003', 768686, 2, '0', '2020-12-31 00:00:00', '2020_12', '', 'colma17001', '2020-12-18 14:52:09', 0),
(35, 'colma17005', 768686, 2, '0', '2020-12-31 00:00:00', '2020_12', '', 'colma17001', '2020-12-18 14:52:09', 0),
(36, 'colma17006', 1000000, 2, '0', '2020-12-31 00:00:00', '2020_12', '', 'colma17001', '2020-12-18 14:52:09', 0),
(37, 'colma17007', 1000000, 2, '0', '2020-12-31 00:00:00', '2020_12', '', 'colma17001', '2020-12-18 14:52:09', 0),
(38, 'colma17008', 1000000, 2, '0', '2020-12-31 00:00:00', '2020_12', '', 'colma17001', '2020-12-18 14:52:09', 0),
(39, 'colma20001', 50000, 2, '0', '2020-12-31 00:00:00', '2020_12', '', 'colma17001', '2020-12-18 14:52:09', 0),
(40, 'colma20002', 50000, 2, '0', '2020-12-31 00:00:00', '2020_12', '', 'colma17001', '2020-12-18 14:52:09', 0),
(41, 'colma20003', 20000, 2, '0', '2020-12-31 00:00:00', '2020_12', '', 'colma17001', '2020-12-18 14:52:09', 0),
(42, 'colma20005', 50000, 2, '0', '2020-12-31 00:00:00', '2020_12', '', 'colma17001', '2020-12-18 14:52:09', 0),
(43, 'colma17001', 22000, 10, '1', '2020-12-31 00:00:00', '2020_12', '', 'colma17001', '2020-12-18 14:52:09', 0),
(44, 'colma17004', 22000, 10, '2', '2020-12-31 00:00:00', '2020_12', '', 'colma17001', '2020-12-18 14:52:09', 0),
(45, 'colma17009', 22000, 10, '3', '2020-12-31 00:00:00', '2020_12', '', 'colma17001', '2020-12-18 14:52:09', 0),
(46, 'colma17001', 768686, 2, '0', '2021-01-31 00:00:00', '2021_01', '', 'colma17001', '2020-12-18 16:24:16', 0),
(47, 'colma17004', 800000, 2, '0', '2021-01-31 00:00:00', '2021_01', '', 'colma17001', '2020-12-18 16:24:16', 0),
(48, 'colma17002', 768686, 2, '0', '2021-01-31 00:00:00', '2021_01', '', 'colma17001', '2020-12-18 16:24:16', 0),
(49, 'colma17003', 768686, 2, '0', '2021-01-31 00:00:00', '2021_01', '', 'colma17001', '2020-12-18 16:24:16', 0),
(50, 'colma17005', 768686, 2, '0', '2021-01-31 00:00:00', '2021_01', '', 'colma17001', '2020-12-18 16:24:16', 0),
(51, 'colma17006', 1000000, 2, '0', '2021-01-31 00:00:00', '2021_01', '', 'colma17001', '2020-12-18 16:24:16', 0),
(52, 'colma17007', 1000000, 2, '0', '2021-01-31 00:00:00', '2021_01', '', 'colma17001', '2020-12-18 16:24:16', 0),
(53, 'colma17008', 1000000, 2, '0', '2021-01-31 00:00:00', '2021_01', '', 'colma17001', '2020-12-18 16:24:16', 0),
(54, 'colma20001', 50000, 2, '0', '2021-01-31 00:00:00', '2021_01', '', 'colma17001', '2020-12-18 16:24:16', 0),
(55, 'colma20002', 50000, 2, '0', '2021-01-31 00:00:00', '2021_01', '', 'colma17001', '2020-12-18 16:24:16', 0),
(56, 'colma20003', 20000, 2, '0', '2021-01-31 00:00:00', '2021_01', '', 'colma17001', '2020-12-18 16:24:16', 0),
(57, 'colma20005', 50000, 2, '0', '2021-01-31 00:00:00', '2021_01', '', 'colma17001', '2020-12-18 16:24:16', 0),
(58, 'colma17001', 22000, 10, '1', '2021-01-31 00:00:00', '2021_01', '', 'colma17001', '2020-12-18 16:24:16', 0),
(59, 'colma17004', 22000, 10, '2', '2021-01-31 00:00:00', '2021_01', '', 'colma17001', '2020-12-18 16:24:16', 0),
(60, 'colma17009', 22000, 10, '3', '2021-01-31 00:00:00', '2021_01', '', 'colma17001', '2020-12-18 16:24:16', 0),
(61, 'colma17001', 40000, 2, '0', '2021-02-28 00:00:00', '2021_02', '', 'colma17001', '2020-12-21 01:16:53', 0),
(62, 'colma17001', 7689, 2, '0', '2021-02-28 00:00:00', '2021_02', '', 'colma17001', '2020-12-21 01:16:53', 0),
(63, 'colma17001', 9908, 2, '0', '2021-02-28 00:00:00', '2021_02', '', 'colma17001', '2020-12-21 01:16:53', 0),
(64, 'colma17001', 7686, 2, '0', '2021-02-28 00:00:00', '2021_02', '', 'colma17001', '2020-12-21 01:16:53', 0),
(65, 'colma17001', 76868, 2, '0', '2021-02-28 00:00:00', '2021_02', '', 'colma17001', '2020-12-21 01:16:53', 0),
(66, 'colma17001', 7686, 2, '0', '2021-02-28 00:00:00', '2021_02', '', 'colma17001', '2020-12-21 01:16:53', 0),
(67, 'colma17001', 22000, 10, '1', '2021-02-28 00:00:00', '2021_02', '', 'colma17001', '2020-12-21 01:16:53', 0),
(68, 'colma20001', 30000, 2, '0', '2021-02-28 00:00:00', '2021_02', '', 'colma17001', '2020-12-21 01:16:53', 0),
(69, 'colma17005', 76869, 2, '0', '2021-02-28 00:00:00', '2021_02', '', 'colma17001', '2020-12-21 01:16:53', 0),
(70, 'colma17001', 40000, 2, '0', '2021-02-28 00:00:00', '2021_02', '', 'colma17001', '2020-12-21 01:16:53', 0);

-- --------------------------------------------------------

--
-- Table structure for table `memberregister`
--

CREATE TABLE `memberregister` (
  `id` int(11) NOT NULL,
  `memid` varchar(255) NOT NULL,
  `title` int(11) NOT NULL,
  `sname` varchar(255) NOT NULL,
  `fname` varchar(255) NOT NULL,
  `mname` varchar(255) NOT NULL,
  `dob` date NOT NULL,
  `gender` int(11) NOT NULL,
  `mstat` int(11) NOT NULL,
  `nationality` varchar(11) NOT NULL,
  `homeadd1` varchar(255) NOT NULL,
  `homeadd2` varchar(255) NOT NULL,
  `homeadd3` varchar(11) NOT NULL,
  `state` int(255) NOT NULL,
  `country` varchar(255) NOT NULL,
  `phoneno` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `busnature` varchar(255) NOT NULL,
  `busadd1` varchar(255) NOT NULL,
  `busadd2` varchar(255) NOT NULL,
  `busadd3` varchar(255) NOT NULL,
  `busstate` int(11) NOT NULL,
  `buscountry` varchar(11) NOT NULL,
  `chyr` int(11) NOT NULL,
  `wofbilevel` int(11) NOT NULL,
  `province` varchar(255) NOT NULL,
  `district` varchar(255) NOT NULL,
  `zone` varchar(255) NOT NULL,
  `wsflocation` varchar(255) DEFAULT NULL,
  `nkintitle` int(11) NOT NULL,
  `nkinsname` varchar(255) NOT NULL,
  `nkinfname` varchar(255) NOT NULL,
  `nkinmname` varchar(255) NOT NULL,
  `nkinrel` varchar(255) NOT NULL,
  `nkadd1` varchar(255) NOT NULL,
  `nkadd2` varchar(255) NOT NULL,
  `nkadd3` varchar(255) NOT NULL,
  `nkstate` int(11) DEFAULT NULL,
  `nkcountry` varchar(255) DEFAULT NULL,
  `nkphoneno` varchar(255) NOT NULL,
  `nkemail` varchar(255) NOT NULL,
  `datejoin` date NOT NULL DEFAULT '0000-00-00',
  `monthlysavings` double NOT NULL,
  `accountnumber` varchar(255) NOT NULL,
  `groupid` int(11) NOT NULL,
  `shareamount` double NOT NULL,
  `memstatus` int(11) NOT NULL,
  `datecreated` datetime NOT NULL DEFAULT '0000-00-00 00:00:00' ON UPDATE current_timestamp(),
  `officer` varchar(255) NOT NULL,
  `dateout` date NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `memberregister`
--

INSERT INTO `memberregister` (`id`, `memid`, `title`, `sname`, `fname`, `mname`, `dob`, `gender`, `mstat`, `nationality`, `homeadd1`, `homeadd2`, `homeadd3`, `state`, `country`, `phoneno`, `email`, `busnature`, `busadd1`, `busadd2`, `busadd3`, `busstate`, `buscountry`, `chyr`, `wofbilevel`, `province`, `district`, `zone`, `wsflocation`, `nkintitle`, `nkinsname`, `nkinfname`, `nkinmname`, `nkinrel`, `nkadd1`, `nkadd2`, `nkadd3`, `nkstate`, `nkcountry`, `nkphoneno`, `nkemail`, `datejoin`, `monthlysavings`, `accountnumber`, `groupid`, `shareamount`, `memstatus`, `datecreated`, `officer`, `dateout`) VALUES
(1, 'colma17001', 1, 'Akande', 'Joshua', 'Ayomikun', '2017-09-08', 1, 1, 'NG', '22, ogoja crescent', 'agbara estate', 'homeadd3', 3, 'NG', '09066439983', 'joshuaayomikun@gmail.com', 'Runs', '26, egbedi street', 'off ishitu road, egan', 'igando', 4, 'NG', 1983, 1, '66', '76', '78', '68', 3, 'Akande', 'Eunice', 'Opeoluwa', '1', '22, ogoja crescent', 'agbara estate', 'agbara', 4, 'NG', '07035123715', 'joshuaayomikun@gmail.com', '1970-01-01', 768686, '7677676876', 1, 200000, 1, '2017-11-07 17:22:22', '1', '0000-00-00'),
(11, 'colma17004', 3, 'Oladoyin', 'Lolade', '', '2017-09-07', 2, 1, 'NG', '22, ogoja crescent', 'agbara estate', 'homeadd3', 3, 'NG', '09066439983', 'joshuaayomikun@gmail.com', 'Runs', '26, egbedi street', 'off ishitu road, egan', 'igando', 4, 'NG', 1984, 1, '66', '76', '78', '68', 1, 'Akande', 'Eunice', 'Opeoluwa', '1', '22, ogoja crescent', 'agbara estate', 'agbara', 3, 'NG', '07035123715', 'joshuaayomikun@gmail.com', '2017-09-07', 800000, '7677676876', 1, 10000, 1, '2017-09-20 04:28:00', '1', '0000-00-00'),
(9, 'colma17002', 1, 'Alichi', 'Chikwesi', 'Victor', '2017-09-08', 1, 1, 'NG', '22, ogoja crescent', 'agbara estate', 'agbara', 3, 'NG', '09066439983', 'joshuaayomikun@gmail.com', 'Runs', '26, egbedi street', 'off ishitu road, egan', 'igando', 4, 'NG', 1983, 1, '66', '76', '78', '68', 1, 'Akande', 'Eunice', 'Opeoluwa', '1', '22, ogoja crescent', 'agbara estate', 'agbara', 4, 'NG', '09066439983', 'joshuaayomikun@gmail.com', '2017-09-07', 768686, '7677676876', 1, 10000, 1, '2017-09-16 19:54:30', '1', '0000-00-00'),
(10, 'colma17003', 1, 'Ajijola', 'Oluwaseun', 'Isaiah', '2017-09-08', 1, 1, 'NG', '22, ogoja crescent', 'agbara estate', 'agbara', 3, 'NG', '09066439983', 'joshuaayomikun@gmail.com', 'Runs', '26, egbedi street', 'off ishitu road, egan', 'igando', 4, 'NG', 1983, 1, '66', '76', '78', '68', 1, 'Akande', 'Eunice', 'Opeoluwa', '1', '22, ogoja crescent', 'agbara estate', 'agbara', 4, 'NG', '09066439983', 'joshuaayomikun@gmail.com', '2017-09-07', 768686, '7677676876', 1, 10000, 1, '2017-09-16 19:54:30', '1', '0000-00-00'),
(12, 'colma17005', 1, 'Akinremi', 'Josiah', 'Olumide', '2017-09-07', 1, 1, 'NG', '22, ogoja crescent', 'agbara estate', 'agbara', 4, 'NG', '09066439983', 'joshuaayomikun@gmail.com', 'Runs', '26, egbedi street', 'off ishitu road, egan', 'igando', 4, 'NG', 1984, 1, '66', '76', '78', '68', 1, 'Akande', 'Eunice', 'Opeoluwa', '1', '22, ogoja crescent', 'agbara estate', 'agbara', 4, 'NG', '09066439983', 'joshuaayomikun@gmail.com', '2017-09-07', 768686, '7677676876', 1, 10000, 1, '2017-09-16 19:54:30', '1', '0000-00-00'),
(13, 'colma17006', 3, 'Amadi', 'Ebere', 'Ebube', '1997-09-11', 2, 1, 'NG', 'Km 10, Idiroko road, canaanland', 'block z3 flat 3, covenant university', 'Ota', 27, 'NG', '09066439983', 'joshuaayomikun@gmail.com', 'IT Solutions', '26, egbedi street', 'off ishitu road, egan', 'igando', 24, 'NG', 1983, 1, '66', '76', '78', '68', 1, 'Akande', 'Joshua', 'Ayomikun', '1', '22, ogoja crescent', 'agbara estate', 'agbara', 27, 'NG', '09066439983', 'joshuaayomikun@gmail.com', '2017-09-05', 1000000, '1356564', 1, 10000, 1, '2017-09-16 19:54:30', '1', '0000-00-00'),
(15, 'colma17007', 3, 'Amadi', 'Ebere', 'Ebube', '1997-09-11', 2, 1, 'NG', 'Km 10, Idiroko road, canaanland', 'block z3 flat 3, covenant university', 'Ota', 27, 'NG', '09066439983', 'joshuaayomikun@gmail.com', 'IT Solutions', '26, egbedi street', 'off ishitu road, egan', 'igando', 24, 'NG', 1983, 1, '66', '76', '78', '68', 1, 'Akande', 'Joshua', 'Ayomikun', '1', '22, ogoja crescent', 'agbara estate', 'agbara', 27, 'NG', '09066439983', 'joshuaayomikun@gmail.com', '2017-09-05', 1000000, '1356564', 1, 10000, 1, '2017-09-16 19:54:30', '1', '0000-00-00'),
(16, 'colma17008', 3, 'Amadi', 'Ebere', 'Ebube', '1997-09-11', 2, 1, 'NG', 'Km 10, Idiroko road, canaanland', 'block z3 flat 3, covenant university', 'Ota', 27, 'NG', '09066439983', 'joshuaayomikun@gmail.com', 'IT Solutions', '26, egbedi street', 'off ishitu road, egan', 'igando', 24, 'NG', 1983, 1, '66', '76', '78', '68', 1, 'Akande', 'Joshua', 'Ayomikun', '1', '22, ogoja crescent', 'agbara estate', 'agbara', 27, 'NG', '09066439983', 'joshuaayomikun@gmail.com', '2017-09-05', 1000000, '1356564', 1, 10000, 1, '2017-09-16 19:54:30', '1', '0000-00-00'),
(17, 'colma17009', 2, 'Ajayi', 'Priscilla', 'Oluwatoyin', '1987-10-29', 2, 2, 'NG', 'Km 10, Idiroko Road ', 'Canaanland ', 'homeadd3', 27, 'NG', '09066439983', 'joshuaayomikun@gmail.com', 'IT SOlutions', '26, egbedi street', 'off ishitu road, egan', 'igando', 24, 'NG', 1991, 1, '66', '76', '78', '68', 3, 'Akande', 'Eunice', 'Opeoluwa', '1', '22, ogoja crescent', 'agbara estate', 'agbara', 27, 'NG', '', 'opeunique@yahoo.co.uk', '2017-09-11', 500000, '7677676876', 1, 10000, 0, '2020-11-16 14:45:10', '1', '2020-11-17'),
(18, 'colma20001', 1, 'Akugbe', 'Stephen', 'Osalumense', '2020-11-25', 1, 2, 'NG', '16, Remi Alao street', 'Iyana Iyesi', 'Ota', 12, 'NG', '09092373298', 'harkugbeosaz@gmail.com', 'Software Development', '16, Remi Alao street', 'Iyana Iyesi', 'Ota', 27, 'NG', 2017, 1, 'Ogun State', 'Canaan City', 'Canaan Land', 'Canaan City', 1, 'Akugbe', 'Samuel', 'Osalumense', '2', '16, Remi Alao street', 'Iyana Iyesi', 'Ota', 27, 'NG', '09092373298', 'harkugbeosaz@gmail.com', '2020-11-05', 10000, '2208441313', 1, 10000, 1, '2020-12-28 18:45:39', '1', '0000-00-00'),
(19, 'colma20002', 1, 'Akugbe', 'Sammy', 'Osazua', '2020-11-01', 1, 2, 'NG', '16, Remi Alao street', 'Iyana Iyesi', 'Ota', 27, 'NG', '09092373298', 'harkugbeosaz@gmail.com', 'Digital Marketer', '16, Remi Alao street', 'Iyana Iyesi', 'Ota', 27, 'NG', 2016, 1, 'Ogun State', 'Canaan City', 'Canaan Land', 'Canaan City', 1, 'Akugbe', 'Stephen', 'Osalumense', '2', '16, Remi Alao street', 'Iyana Iyesi', 'Ota', 27, 'NG', '09092373298', 'harkugbeosaz@gmail.com', '2020-11-08', 10000, '2208441377', 1, 30000, 1, '2020-12-28 19:08:12', '1', '0000-00-00'),
(21, 'colma20003', 2, 'Akande', 'Simisola', 'Adeola', '1990-08-18', 2, 2, 'NG', 'University of Benin, Ugbowo campus', 'Benin City', 'Benin', 12, 'NG', '+2349077519931', 'sakugbe@gmail.com', 'Digital Entrepreneur', 'University of Benin, Ugbowo campus', 'Benin City', 'Benin', 12, 'NG', 2015, 2, 'Benin City', 'Uwasota', 'Uwasota', 'Technical College Road', 1, 'Akande', 'Solomon', 'Amuludun', '5', 'University of Benin, Ugbowo campus', 'Benin City', 'Benin', 12, 'NG', '07041165200', 'sakugbe@gmail.com', '2020-12-01', 20000, '0069383385', 1, 10000, 1, '2020-12-01 14:28:21', '1', '0000-00-00'),
(23, 'colma20005', 1, 'Madueke', 'Williams', 'Uchendu', '1982-08-12', 1, 2, 'NG', '16, Remi Alao street', 'Iyana Iyesi', 'Ota', 27, 'NG', '09092373298', 'harkugbeosaz@gmail.com', 'Business Man', '16, Remi Alao street', 'Iyana Iyesi', 'Ota', 27, 'NG', 2008, 3, 'Ogun State', 'Iyana Iyesi', 'Iyesi', 'Iyana Iyesi', 2, 'Madueke', 'Vivian', 'Uloma', '5', '16, Remi Alao street', 'Iyana Iyesi', 'Ota', 27, 'NG', '09092373298', 'harkugbeosaz@gmail.com', '2020-12-01', 50000, '220888098', 1, 10000, 1, '2020-12-01 17:50:08', '1', '0000-00-00');

-- --------------------------------------------------------

--
-- Stand-in structure for view `memlst`
-- (See below for the actual view)
--
CREATE TABLE `memlst` (
`id` int(11)
,`memid` varchar(255)
,`title` int(11)
,`sname` varchar(255)
,`fname` varchar(255)
,`mname` varchar(255)
,`dob` date
,`gender` int(11)
,`mstat` int(11)
,`nationality` varchar(11)
,`homeadd1` varchar(255)
,`homeadd2` varchar(255)
,`homeadd3` varchar(11)
,`state` int(255)
,`country` varchar(255)
,`phoneno` varchar(255)
,`email` varchar(255)
,`busnature` varchar(255)
,`busadd1` varchar(255)
,`busadd2` varchar(255)
,`busadd3` varchar(255)
,`busstate` int(11)
,`buscountry` varchar(11)
,`chyr` int(11)
,`wofbilevel` int(11)
,`province` varchar(255)
,`district` varchar(255)
,`zone` varchar(255)
,`wsflocation` varchar(255)
,`nkintitle` int(11)
,`nkinsname` varchar(255)
,`nkinfname` varchar(255)
,`nkinmname` varchar(255)
,`nkinrel` varchar(255)
,`nkadd1` varchar(255)
,`nkadd2` varchar(255)
,`nkadd3` varchar(255)
,`nkstate` int(11)
,`nkcountry` varchar(255)
,`nkphoneno` varchar(255)
,`nkemail` varchar(255)
,`datejoin` date
,`monthlysavings` double
,`accountnumber` varchar(255)
,`groupid` int(11)
,`shareamount` double
,`memstatus` int(11)
,`datecreated` datetime
,`officer` varchar(255)
);

-- --------------------------------------------------------

--
-- Table structure for table `menutypes`
--

CREATE TABLE `menutypes` (
  `mtypid` int(11) NOT NULL,
  `mtypname` varchar(255) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `menutypes`
--

INSERT INTO `menutypes` (`mtypid`, `mtypname`) VALUES
(1, 'Main menu'),
(2, 'Submenu');

-- --------------------------------------------------------

--
-- Table structure for table `months`
--

CREATE TABLE `months` (
  `monthid` varchar(11) NOT NULL,
  `month` varchar(255) DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `months`
--

INSERT INTO `months` (`monthid`, `month`) VALUES
('01', 'JANUARY'),
('02', 'FEBRUARY'),
('03', 'MARCH'),
('04', 'APRIL'),
('05', 'MAY'),
('06', 'JUNE'),
('07', 'JULY'),
('08', 'AUGUST'),
('09', 'SEPTEMBER'),
('10', 'OCTOBER'),
('11', 'NOVEMBER'),
('12', 'DECEMBER');

-- --------------------------------------------------------

--
-- Table structure for table `mstat`
--

CREATE TABLE `mstat` (
  `maristatus` varchar(50) NOT NULL,
  `mstatid` int(11) NOT NULL,
  `mstatstatus` int(11) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `mstat`
--

INSERT INTO `mstat` (`maristatus`, `mstatid`, `mstatstatus`) VALUES
('SINGLE', 1, 1),
('MARRIED', 2, 1),
('WIDOWED', 3, 1),
('DIVORCED', 4, 1),
('SEPARATED', 5, 1);

-- --------------------------------------------------------

--
-- Table structure for table `names`
--

CREATE TABLE `names` (
  `id` int(11) NOT NULL,
  `name` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `officers`
--

CREATE TABLE `officers` (
  `officersid` int(11) NOT NULL,
  `office` varchar(50) NOT NULL,
  `memid` varchar(50) NOT NULL,
  `dtin` date NOT NULL,
  `dtout` date NOT NULL,
  `remarks` varchar(240) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `officers`
--

INSERT INTO `officers` (`officersid`, `office`, `memid`, `dtin`, `dtout`, `remarks`) VALUES
(1, '1', 'colma17001', '2009-04-01', '0000-00-00', ''),
(2, '2', '13', '2009-04-01', '0000-00-00', ''),
(3, '3', '24', '2009-04-01', '0000-00-00', ''),
(4, '4', '23', '2009-04-01', '0000-00-00', ''),
(5, '5', '108', '2009-04-01', '0000-00-00', ''),
(6, '6', '95', '2009-04-01', '0000-00-00', ''),
(7, '7', '200', '2009-04-01', '0000-00-00', ''),
(8, '8', '119', '2009-04-01', '0000-00-00', ''),
(9, '2', '21', '2020-11-03', '0000-00-00', 'Assist the president'),
(10, '2', '24', '2020-11-03', '0000-00-00', 'Vice president');

-- --------------------------------------------------------

--
-- Table structure for table `offices`
--

CREATE TABLE `offices` (
  `officeid` int(11) NOT NULL,
  `office` varchar(255) NOT NULL,
  `officestatus` varchar(255) NOT NULL,
  `datecreated` datetime NOT NULL DEFAULT '0000-00-00 00:00:00' ON UPDATE current_timestamp(),
  `datechanged` datetime NOT NULL DEFAULT '0000-00-00 00:00:00' ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `offices`
--

INSERT INTO `offices` (`officeid`, `office`, `officestatus`, `datecreated`, `datechanged`) VALUES
(1, 'President', '1', '2017-09-02 03:44:43', '2017-09-02 03:44:43'),
(2, 'Vice President', '1', '2017-09-02 03:44:42', '2017-09-02 03:44:42'),
(3, 'Secretary', '1', '2017-09-02 03:44:42', '2017-09-02 03:44:42'),
(4, 'Treasurer', '1', '2017-09-02 03:46:47', '2017-09-02 03:46:47'),
(5, 'Financial Secretary', '1', '2017-09-02 03:46:21', '2017-09-02 03:46:21'),
(6, 'Welfare', '1', '2017-09-02 03:46:21', '2017-09-02 03:46:21'),
(7, 'P.R.O', '1', '2017-09-02 03:46:21', '2017-09-02 03:46:21'),
(8, 'Asst. Gen. Secretary', '1', '2017-09-02 03:46:21', '2017-09-02 03:46:21');

-- --------------------------------------------------------

--
-- Table structure for table `period`
--

CREATE TABLE `period` (
  `periodid` int(11) NOT NULL,
  `period` int(11) NOT NULL,
  `facilityid` int(11) NOT NULL,
  `periodstatus` int(11) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `period`
--

INSERT INTO `period` (`periodid`, `period`, `facilityid`, `periodstatus`) VALUES
(1, 10, 10, 1);

-- --------------------------------------------------------

--
-- Table structure for table `portallog`
--

CREATE TABLE `portallog` (
  `id` bigint(20) NOT NULL,
  `staffid` varchar(100) NOT NULL,
  `username` varchar(100) NOT NULL,
  `comments` longtext NOT NULL,
  `date` datetime NOT NULL,
  `menuid` int(100) NOT NULL,
  `appid` int(11) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `portallog`
--

INSERT INTO `portallog` (`id`, `staffid`, `username`, `comments`, `date`, `menuid`, `appid`) VALUES
(1, '', '', ' logged in', '2017-07-18 10:12:38', 0, 0),
(2, '', '', ' logged out', '2017-07-18 10:16:44', 0, 0),
(3, '', '', ' logged in', '2017-07-18 10:16:55', 0, 0),
(4, '', '', ' logged out', '2017-07-18 10:16:56', 0, 0),
(5, '', '', ' logged in', '2017-07-18 10:17:49', 0, 0),
(6, 'mem1', '', ' logged in', '2017-07-18 14:46:02', 0, 0),
(7, 'mem1', '', ' logged in', '2017-07-18 14:56:38', 0, 0),
(8, 'mem1', '', 'Menu name changed from Manage Menu to Manage Menus', '2017-07-19 21:49:19', 0, 0),
(9, 'mem1', '', 'Menu name changed from Manage Menus to Manage Menu', '2017-07-19 21:49:24', 0, 0),
(10, 'mem1', '', 'Menu name changed from Reportss to Reports', '2017-07-19 22:35:06', 0, 0),
(11, 'mem1', '', 'Role name changed from member to user', '2017-07-20 07:36:33', 0, 0),
(12, 'mem1', '', 'Entries added as menu to this application', '2017-07-20 13:43:10', 0, 0),
(13, 'mem1', '', 'Add Member added as submenu to Entries menu in this application', '2017-07-20 13:45:07', 0, 0),
(14, 'mem1', '', '1 Submenu assigned to Admin', '2017-07-20 13:45:35', 0, 0),
(15, 'mem1', '', ' logged in', '2017-07-22 21:04:26', 0, 0),
(16, 'mem1', '', ' logged in', '2017-07-22 22:51:01', 0, 0),
(17, 'mem1', '', ' logged in', '2017-07-22 22:59:27', 0, 0),
(18, 'mem1', '', ' logged in', '2017-07-22 23:00:22', 0, 0),
(19, 'mem1', '', ' logged in', '2017-07-23 16:19:00', 0, 0),
(20, 'mem1', '', ' logged in', '2017-08-01 13:38:18', 0, 0),
(21, 'mem1', '', ' logged in', '2017-08-05 05:48:45', 0, 0),
(22, 'mem1', '', 'Loan added as submenu to Entries menu in this application', '2017-08-05 05:54:24', 2, 0),
(23, 'mem1', '', '1 Submenu assigned to Admin', '2017-08-05 05:54:54', 3, 0),
(24, 'mem1', '', ' logged in', '2017-08-06 18:04:48', 0, 0),
(25, 'mem1', '', ' logged in', '2017-08-09 09:45:58', 0, 0),
(26, 'mem1', '', 'Transfer Form added as submenu to Entries menu in this application', '2017-08-10 00:58:27', 2, 0),
(27, 'mem1', '', '1 Submenu assigned to Admin', '2017-08-10 01:00:24', 3, 0),
(28, 'mem1', '', ' logged in', '2017-08-11 15:55:44', 0, 0),
(29, 'mem1', '', ' logged in', '2017-08-14 09:45:49', 0, 0),
(30, 'mem1', '', 'Monthly Savings Rescheduling added as submenu to Entries menu in this application', '2017-08-14 09:50:19', 2, 0),
(31, 'mem1', '', 'Setup added as menu to this application', '2017-08-14 09:50:34', 2, 0),
(32, 'mem1', '', '1 Submenu assigned to Admin', '2017-08-14 09:51:58', 3, 0),
(33, 'mem1', '', ' logged in', '2017-08-20 19:17:22', 0, 0),
(34, 'mem1', '', 'Close Out A Member added as submenu to Membership Control menu in this application', '2017-08-21 00:48:46', 2, 0),
(35, 'mem1', '', '1 Submenu assigned to Admin', '2017-08-21 00:49:26', 3, 0),
(36, 'mem1', '', 'View Member added as submenu to Membership Control menu in this application', '2017-08-21 03:41:47', 2, 0),
(37, 'mem1', '', '1 Submenu assigned to Admin', '2017-08-21 03:42:04', 3, 0),
(38, 'mem1', '', ' logged in', '2017-08-23 17:20:07', 0, 0),
(39, 'mem1', '', ' logged in', '2017-08-26 19:20:57', 0, 0),
(40, 'mem1', '', 'Cash Inflow added as menu to this application', '2017-08-27 09:31:49', 2, 0),
(41, 'mem1', '', 'Individual Facility Repayment added as submenu to Cash Inflow menu in this application', '2017-08-27 09:33:09', 2, 0),
(42, 'mem1', '', 'Facilities added as submenu to Setup menu in this application', '2017-08-27 10:00:29', 2, 0),
(43, 'mem1', '', '2 Submenu assigned to Admin', '2017-08-27 10:00:50', 3, 0),
(44, 'mem1', '', ' logged in', '2017-09-01 14:10:47', 0, 0),
(45, 'mem1', '', 'Enter Individual Savings added as submenu to Cash Inflow menu in this application', '2017-09-02 02:32:23', 2, 0),
(46, 'mem1', '', '1 Submenu assigned to Admin', '2017-09-02 02:33:16', 3, 0),
(47, 'mem1', '', 'New Officer added as submenu to Membership Control menu in this application', '2017-09-02 04:18:33', 2, 0),
(48, 'mem1', '', '1 Submenu assigned to Admin', '2017-09-02 04:19:06', 3, 0),
(49, 'mem1', '', 'Close Out Officers added as submenu to Membership Control menu in this application', '2017-09-02 04:51:39', 2, 0),
(50, 'mem1', '', '1 Submenu assigned to Admin', '2017-09-02 04:51:52', 3, 0),
(51, 'mem1', '', 'View Facilities added as submenu to Facility Management menu in this application', '2017-09-02 15:32:46', 2, 0),
(52, 'mem1', '', '1 Submenu assigned to Admin', '2017-09-02 15:33:29', 3, 0),
(53, 'mem1', '', 'Edit Facility added as submenu to Facility Management menu in this application', '2017-09-02 16:29:00', 2, 0),
(54, 'mem1', '', '1 Submenu assigned to Admin', '2017-09-02 16:29:14', 3, 0),
(55, 'mem1', '', 'Cash Flowout added as menu to this application', '2017-09-02 19:30:57', 2, 0),
(56, 'mem1', '', 'Enter Payments For Savings Withdrawal added as submenu to Cash Flowout menu in this application', '2017-09-02 19:45:02', 2, 0),
(57, 'mem1', '', '1 Submenu assigned to Admin', '2017-09-02 19:45:19', 3, 0),
(58, 'mem1', '', 'Enter Payments For Facilities added as submenu to Cash Flowout menu in this application', '2017-09-02 21:00:17', 2, 0),
(59, 'mem1', '', '1 Submenu assigned to Admin', '2017-09-02 21:00:29', 3, 0),
(60, 'mem1', 'mem1', 'mem1 logged out', '2017-09-03 05:16:07', 0, 0),
(61, 'mem1', '', ' logged in', '2017-09-03 05:27:32', 0, 0),
(62, 'mem1', 'mem1', 'mem1 logged out', '2017-09-03 05:28:26', 0, 0),
(63, 'mem1', '', ' logged in', '2017-09-03 05:31:21', 0, 0),
(64, 'mem1', '', 'Letter Of Offer added as submenu to Facility Management menu in this application', '2017-09-03 06:15:48', 2, 0),
(65, 'mem1', '', '1 Submenu assigned to Admin', '2017-09-03 06:16:02', 3, 0),
(66, 'mem1', 'mem1', 'mem1 logged out', '2017-09-03 11:37:52', 0, 0),
(67, 'mem1', '', ' logged in', '2017-09-03 11:51:12', 0, 0),
(68, 'mem1', 'mem1', 'mem1 logged out', '2017-09-03 12:35:31', 0, 0),
(69, 'mem1', '', ' logged in', '2017-09-03 12:52:27', 0, 0),
(70, 'mem1', 'mem1', 'mem1 logged out', '2017-09-03 13:15:38', 0, 0),
(71, 'mem1', '', ' logged in', '2017-09-03 13:16:07', 0, 0),
(72, 'mem1', 'mem1', 'mem1 logged out', '2017-09-03 13:38:57', 0, 0),
(73, 'mem1', '', ' logged in', '2017-09-03 21:17:58', 0, 0),
(74, 'mem1', '', ' logged in', '2017-09-03 21:18:52', 0, 0),
(75, 'mem1', '', ' logged in', '2017-09-04 12:58:38', 0, 0),
(76, 'colma17001', 'colma17001', 'colma17001 logged out', '2017-09-04 15:59:42', 0, 0),
(77, 'colma17001', '', ' logged in', '2017-09-04 15:59:53', 0, 0),
(78, 'colma17001', '', 'Reconcillation added as menu to this application', '2017-09-05 18:23:35', 2, 0),
(79, 'colma17001', '', 'Bank Reports added as submenu to Reconcillation menu in this application', '2017-09-05 18:24:55', 2, 0),
(80, 'colma17001', '', '1 Submenu assigned to Admin', '2017-09-05 18:25:29', 3, 0),
(81, 'colma17001', '', ' logged in', '2017-09-07 15:58:07', 0, 0),
(82, 'colma17001', '', ' logged in', '2017-09-09 20:26:27', 0, 0),
(83, 'colma17001', '', ' logged in', '2017-09-10 18:22:11', 0, 0),
(84, 'colma17001', '', 'The menu exists in this application', '2017-09-11 17:08:49', 2, 0),
(85, 'colma17001', '', 'Monthly Deduction Setup added as submenu to Monthly Deductions menu in this application', '2017-09-11 17:09:53', 2, 0),
(86, 'colma17001', 'colma17001', 'colma17001 logged out', '2017-09-11 17:36:19', 0, 0),
(87, 'colma17001', '', ' logged in', '2017-09-11 17:36:44', 0, 0),
(88, 'colma17001', '', 'Share Increment added as submenu to Monthly Deductions menu in this application', '2017-09-11 19:01:07', 2, 0),
(89, 'colma17001', '', '2 Submenu assigned to Admin', '2017-09-11 19:01:45', 3, 0),
(90, 'colma17001', '', ' logged in', '2017-09-13 17:47:41', 0, 0),
(91, 'colma17001', '', 'Edit Installment added as submenu to Facility Management menu in this application', '2017-09-13 19:47:34', 2, 0),
(92, 'colma17001', '', '1 Submenu assigned to Admin', '2017-09-13 19:47:52', 3, 0),
(93, 'colma17001', '', 'Enter Receipts From Others added as submenu to Cash Flowin menu in this application', '2017-09-14 06:22:16', 2, 0),
(94, 'colma17001', '', '1 Submenu assigned to Admin', '2017-09-14 06:23:08', 3, 0),
(95, 'colma17001', '', 'Liberator added as menu to this application', '2017-09-14 15:18:16', 2, 0),
(96, 'colma17001', '', 'Add Liberatior added as submenu to Liberator menu in this application', '2017-09-14 15:35:05', 2, 0),
(97, 'colma17001', '', '1 Submenu assigned to Admin', '2017-09-14 15:37:16', 3, 0),
(98, 'colma17001', '', ' logged in', '2017-09-15 10:54:15', 0, 0),
(99, 'colma17001', '', ' logged in', '2017-09-15 16:16:22', 0, 0),
(100, 'colma17001', '', ' logged in', '2017-09-16 00:54:17', 0, 0),
(101, 'colma17001', '', 'Enter Refunds On Facilities added as submenu to Cash Flowout menu in this application', '2017-09-16 00:55:50', 2, 0),
(102, 'colma17001', '', '1 Submenu assigned to Admin', '2017-09-16 00:56:10', 3, 0),
(103, 'colma17001', '', 'Enter Payments To Others added as submenu to Cash Flowout menu in this application', '2017-09-16 07:50:06', 2, 0),
(104, 'colma17001', '', '1 Submenu assigned to Admin', '2017-09-16 07:50:25', 3, 0),
(105, 'colma17001', '', ' logged in', '2017-09-18 12:21:17', 0, 0),
(106, 'colma17001', '', 'Enter Payments For Imprest added as submenu to Cash Flowout menu in this application', '2017-09-20 05:59:35', 2, 0),
(107, 'colma17001', '', '1 Submenu assigned to Admin', '2017-09-20 06:00:16', 3, 0),
(108, 'colma17001', '', 'Imprest Expense added as submenu to Cash Flowout menu in this application', '2017-09-21 05:38:26', 2, 0),
(109, 'colma17001', '', '1 Submenu assigned to Admin', '2017-09-21 05:38:39', 3, 0),
(110, 'colma17001', '', 'Upload New Bulk Facility added as submenu to Facility Management menu in this application', '2017-09-21 07:17:14', 2, 0),
(111, 'colma17001', '', '1 Submenu assigned to Admin', '2017-09-21 07:28:12', 3, 0),
(112, 'colma17001', '', ' logged in', '2017-09-21 11:58:38', 0, 0),
(113, 'colma17001', '', 'Edit Monthly Deduction added as submenu to Monthly Deductions menu in this application', '2017-09-25 20:20:56', 8, 0),
(114, 'colma17001', '', '1 Submenu assigned to Admin', '2017-09-25 22:27:37', 3, 0),
(115, 'colma17001', '', ' logged in', '2017-10-18 18:20:22', 0, 0),
(116, 'colma17001', '', ' logged in', '2017-10-24 14:30:44', 0, 0),
(117, 'colma17001', '', ' logged in', '2017-11-05 03:21:37', 0, 0),
(118, 'colma17001', '', 'Edit Member Record added as submenu to Membership Control menu in this application', '2017-11-05 03:23:28', 2, 0),
(119, 'colma17001', '', '1 Submenu assigned to Admin', '2017-11-05 03:24:04', 3, 0),
(120, 'colma17001', '', ' logged in', '2017-11-10 12:48:28', 0, 0),
(121, 'colma17001', '', ' logged in', '2020-11-12 18:22:40', 0, 0),
(122, 'colma17001', '', ' logged in', '2020-11-13 14:41:49', 0, 0),
(123, 'colma17001', '', ' logged in', '2020-11-16 10:35:20', 0, 0),
(124, 'colma17001', '', ' logged in', '2020-11-16 17:47:06', 0, 0),
(125, 'colma17001', '', ' logged in', '2020-11-16 18:54:40', 0, 0),
(126, 'colma17001', '', ' logged in', '2020-11-16 20:22:17', 0, 0),
(127, 'colma17001', '', ' logged in', '2020-11-21 11:19:19', 0, 0),
(128, 'colma17001', '', ' logged in', '2020-11-21 11:40:52', 0, 0),
(129, 'colma17001', '', ' logged in', '2020-11-21 11:44:13', 0, 0),
(130, 'colma17001', '', ' logged in', '2020-11-21 11:53:06', 0, 0),
(131, 'colma17001', '', ' logged in', '2020-11-26 18:02:05', 0, 0),
(132, 'colma17001', '', ' logged in', '2020-12-07 22:57:50', 0, 0),
(133, 'colma17001', '', ' logged in', '2020-12-07 22:57:59', 0, 0),
(134, 'colma17001', '', ' logged in', '2020-12-08 10:51:51', 0, 0),
(135, 'colma17001', '', ' logged in', '2020-12-13 18:10:10', 0, 0),
(136, 'colma17001', '', ' logged in', '2020-12-14 13:55:56', 0, 0),
(137, 'colma17001', '', ' logged in', '2020-12-14 14:21:05', 0, 0),
(138, 'colma17001', '', ' logged in', '2020-12-14 14:23:40', 0, 0),
(139, 'colma17001', '', ' logged in', '2020-12-14 15:07:46', 0, 0),
(140, 'colma17001', '', ' logged in', '2020-12-15 10:43:06', 0, 0),
(141, 'colma17001', '', ' logged in', '2020-12-16 18:23:41', 0, 0),
(142, 'colma17001', '', ' logged in', '2020-12-16 20:26:47', 0, 0),
(143, 'colma17001', '', 'View Monthly Deduction added as submenu to Monthly Deductions menu in this application', '2020-12-16 21:22:22', 2, 0),
(144, 'colma17001', '', '1 Submenu assigned to Admin', '2020-12-16 21:23:51', 3, 0),
(145, 'colma17001', '', ' logged in', '2020-12-16 21:56:46', 0, 0),
(146, 'colma17001', '', ' logged in', '2020-12-17 12:37:30', 0, 0),
(147, 'colma17001', '', ' logged in', '2020-12-17 12:59:04', 0, 0),
(148, 'colma17001', '', ' logged in', '2020-12-17 16:57:46', 0, 0),
(149, 'colma17001', '', ' logged in', '2020-12-17 17:18:02', 0, 0),
(150, 'colma17001', '', 'Monthly Deduction Distribution added as submenu to Monthly Deductions menu in this application', '2020-12-18 09:54:37', 2, 0),
(151, 'colma17001', '', '1 Submenu assigned to Admin', '2020-12-18 09:55:03', 3, 0),
(152, 'colma17001', '', ' logged in', '2020-12-18 11:12:54', 0, 0),
(153, 'colma17001', '', ' logged in', '2020-12-18 11:18:39', 0, 0),
(154, 'colma17001', '', 'Views deleted successfully from menu list', '2020-12-18 19:08:11', 2, 0),
(155, 'colma17001', '', ' logged in', '2020-12-18 19:10:12', 0, 0),
(156, 'colma17001', '', 'Enter Monthly Deduction - Individual added as submenu to Monthly Deductions menu in this application', '2020-12-18 19:11:33', 2, 0),
(157, 'colma17001', '', '1 Submenu assigned to Admin', '2020-12-18 19:12:16', 3, 0),
(158, 'colma17001', '', ' logged in', '2020-12-20 15:40:18', 0, 0),
(159, 'colma17001', '', ' logged in', '2020-12-21 09:37:03', 0, 0),
(160, 'colma17001', '', ' logged in', '2020-12-22 22:05:20', 0, 0),
(161, 'colma17001', 'colma17001', 'colma17001 logged out', '2020-12-24 16:49:05', 0, 0),
(162, 'colma17001', '', ' logged in', '2020-12-24 16:49:21', 0, 0),
(163, 'colma17001', '', 'Register Facility - User added as submenu to Facility Management menu in this application', '2020-12-24 21:17:28', 2, 0),
(164, 'colma17001', '', '1 Submenu assigned to Admin', '2020-12-24 21:18:01', 3, 0),
(165, 'colma17001', '', ' logged in', '2020-12-25 20:47:30', 0, 0),
(166, 'colma17001', 'colma17001', 'colma17001 logged out', '2020-12-26 18:25:22', 0, 0),
(167, 'colma17001', '', ' logged in', '2020-12-26 18:25:25', 0, 0),
(168, 'colma17001', '', ' logged in', '2020-12-26 18:28:35', 0, 0),
(169, 'colma17001', '', ' logged in', '2020-12-27 15:30:32', 0, 0),
(170, 'colma17001', '', 'Savings Increment added as submenu to Membership Control menu in this application', '2020-12-27 21:41:41', 2, 0),
(171, 'colma17001', '', '1 Submenu assigned to Admin', '2020-12-27 21:52:24', 3, 0),
(172, 'colma17001', '', 'Lists added as submenu to Reports menu in this application', '2020-12-29 02:36:22', 2, 0),
(173, 'colma17001', '', '1 Submenu assigned to Admin', '2020-12-29 02:36:43', 3, 0),
(174, 'colma17001', 'colma17001', 'colma17001 logged out', '2020-12-30 12:02:32', 0, 0),
(175, 'colma17001', '', ' logged in', '2020-12-30 12:02:35', 0, 0);

-- --------------------------------------------------------

--
-- Table structure for table `posts`
--

CREATE TABLE `posts` (
  `postid` int(11) NOT NULL,
  `post` varchar(255) NOT NULL,
  `poststatus` int(11) NOT NULL,
  `datecreated` datetime NOT NULL DEFAULT '0000-00-00 00:00:00' ON UPDATE current_timestamp(),
  `datechanged` datetime NOT NULL DEFAULT '0000-00-00 00:00:00' ON UPDATE current_timestamp()
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `posts`
--

INSERT INTO `posts` (`postid`, `post`, `poststatus`, `datecreated`, `datechanged`) VALUES
(1, 'President', 1, '2017-09-02 03:44:43', '2017-09-02 03:44:43'),
(2, 'Vice President', 1, '2017-09-02 03:44:42', '2017-09-02 03:44:42'),
(3, 'Secretary', 1, '2017-09-02 03:44:42', '2017-09-02 03:44:42'),
(4, 'Treasurer', 1, '2017-09-02 03:46:47', '2017-09-02 03:46:47'),
(5, 'Financial Secretary', 1, '2017-09-02 03:46:21', '2017-09-02 03:46:21'),
(6, 'Welfare', 1, '2017-09-02 03:46:21', '2017-09-02 03:46:21'),
(7, 'P.R.O', 1, '2017-09-02 03:46:21', '2017-09-02 03:46:21'),
(8, 'Asst. Gen. Secretary', 1, '2017-09-02 03:46:21', '2017-09-02 03:46:21');

-- --------------------------------------------------------

--
-- Table structure for table `relationships`
--

CREATE TABLE `relationships` (
  `relid` int(11) NOT NULL,
  `relname` varchar(255) NOT NULL,
  `relstatus` varchar(255) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `relationships`
--

INSERT INTO `relationships` (`relid`, `relname`, `relstatus`) VALUES
(1, 'sister', '1'),
(2, 'brother', '1'),
(3, 'father', '1'),
(4, 'mother', '1'),
(5, 'spouse', '1'),
(6, 'others', '1');

-- --------------------------------------------------------

--
-- Table structure for table `roles`
--

CREATE TABLE `roles` (
  `roleid` int(11) NOT NULL,
  `rolename` varchar(255) NOT NULL,
  `status` int(11) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `roles`
--

INSERT INTO `roles` (`roleid`, `rolename`, `status`) VALUES
(1, 'admin', 1),
(2, 'user', 1);

-- --------------------------------------------------------

--
-- Table structure for table `rptmonth`
--

CREATE TABLE `rptmonth` (
  `id` int(11) NOT NULL,
  `montnumber` int(10) NOT NULL,
  `monthname` varchar(15) NOT NULL,
  `montstat` date NOT NULL,
  `montend` date NOT NULL,
  `year_mont` varchar(10) NOT NULL,
  `deductionstatus` int(2) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `rptmonth`
--

INSERT INTO `rptmonth` (`id`, `montnumber`, `monthname`, `montstat`, `montend`, `year_mont`, `deductionstatus`) VALUES
(1, 2, 'February', '2021-02-01', '2021-02-28', '2021_02', 1);

-- --------------------------------------------------------

--
-- Table structure for table `savingsincrement`
--

CREATE TABLE `savingsincrement` (
  `id` int(11) NOT NULL,
  `memid` varchar(15) NOT NULL,
  `presentsavings` double NOT NULL,
  `proposedsavings` double NOT NULL,
  `receiptno` varchar(12) NOT NULL,
  `instrument` int(11) NOT NULL,
  `refno` varchar(11) NOT NULL,
  `refdate` datetime NOT NULL,
  `officer` varchar(255) NOT NULL,
  `entrydate` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `savingsincrement`
--

INSERT INTO `savingsincrement` (`id`, `memid`, `presentsavings`, `proposedsavings`, `receiptno`, `instrument`, `refno`, `refdate`, `officer`, `entrydate`) VALUES
(1, 'colma20001', 50000, 60000, '21212312', 1, '12121', '2020-12-28 00:00:00', 'colma17001', '2020-12-28 00:00:00'),
(2, 'colma20001', 50000, 60000, '21212312', 1, '12121', '2020-12-28 00:00:00', 'colma17001', '2020-12-28 00:00:00'),
(3, 'colma20001', 50000, 60000, '21212312', 2, '12121', '2020-12-28 00:00:00', 'colma17001', '2020-12-28 00:00:00'),
(4, 'colma20001', 50000, 60000, '21212312', 2, '12121', '2020-12-28 00:00:00', 'colma17001', '2020-12-28 00:00:00'),
(5, 'colma20001', 50000, 60000, '21212312', 2, '12121', '2020-12-28 00:00:00', 'colma17001', '2020-12-28 00:00:00'),
(6, 'colma20001', 60, 50000, '2121229', 1, '1212188', '2020-12-28 00:00:00', 'colma17001', '2020-12-28 00:00:00');

-- --------------------------------------------------------

--
-- Table structure for table `savingsreschudling`
--

CREATE TABLE `savingsreschudling` (
  `id` int(11) NOT NULL,
  `tno` int(11) NOT NULL,
  `memid` varchar(11) NOT NULL,
  `presentsavings` double NOT NULL,
  `proposedsavings` double NOT NULL,
  `startdate` date NOT NULL,
  `reason` varchar(255) NOT NULL,
  `formdate` datetime NOT NULL DEFAULT '0000-00-00 00:00:00' ON UPDATE current_timestamp(),
  `officer` varchar(255) NOT NULL,
  `entrydate` datetime NOT NULL DEFAULT '0000-00-00 00:00:00' ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `savingsreschudling`
--

INSERT INTO `savingsreschudling` (`id`, `tno`, `memid`, `presentsavings`, `proposedsavings`, `startdate`, `reason`, `formdate`, `officer`, `entrydate`) VALUES
(1, 1, '0', 768, 800, '2017-09-30', '', '2017-09-22 00:00:00', '10', '2017-09-11 00:00:00'),
(2, 2, 'colma17004', 768686, 800000, '2017-09-30', '', '2017-09-22 00:00:00', '10', '2017-09-11 15:29:05'),
(3, 3, 'colma17009', 400000, 500000, '2017-09-30', '', '2017-09-11 00:00:00', '10', '2017-09-11 18:29:15');

-- --------------------------------------------------------

--
-- Table structure for table `setoffreasons`
--

CREATE TABLE `setoffreasons` (
  `reasonid` int(11) NOT NULL,
  `reason` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `setoffreasons`
--

INSERT INTO `setoffreasons` (`reasonid`, `reason`) VALUES
(1, 'defaulting'),
(2, 'relocation'),
(3, 'voluntary withrawal'),
(4, 'deceased'),
(5, 'dismissal');

-- --------------------------------------------------------

--
-- Table structure for table `severances`
--

CREATE TABLE `severances` (
  `severanceid` int(11) NOT NULL,
  `memid` varchar(255) NOT NULL,
  `setoffreason` varchar(255) NOT NULL,
  `setoffremark` varchar(255) NOT NULL,
  `officer` varchar(255) NOT NULL,
  `datecreated` datetime NOT NULL DEFAULT '0000-00-00 00:00:00' ON UPDATE current_timestamp()
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `shareincrement`
--

CREATE TABLE `shareincrement` (
  `id` int(11) NOT NULL,
  `tno` int(11) NOT NULL,
  `formdate` date NOT NULL DEFAULT '0000-00-00',
  `memid` varchar(11) NOT NULL,
  `presentshare` double NOT NULL,
  `proposedshare` double NOT NULL,
  `receiptno` varchar(11) NOT NULL,
  `receiptdate` datetime NOT NULL DEFAULT '0000-00-00 00:00:00' ON UPDATE current_timestamp(),
  `instrument` int(11) NOT NULL,
  `refno` varchar(11) NOT NULL,
  `refdate` datetime NOT NULL DEFAULT '0000-00-00 00:00:00' ON UPDATE current_timestamp(),
  `officer` varchar(255) NOT NULL,
  `entrydate` datetime NOT NULL DEFAULT '0000-00-00 00:00:00' ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `shareincrement`
--

INSERT INTO `shareincrement` (`id`, `tno`, `formdate`, `memid`, `presentshare`, `proposedshare`, `receiptno`, `receiptdate`, `instrument`, `refno`, `refdate`, `officer`, `entrydate`) VALUES
(1, 1, '1970-01-01', '0', 10000, 200000, '787878', '2017-09-12 00:00:00', 4, '798789', '2017-09-12 00:00:00', '10', '2017-09-12 07:40:11'),
(2, 0, '0000-00-00', 'colma20001', 10000, 0, '212', '2020-12-28 00:00:00', 1, '1212', '2020-12-28 00:00:00', 'colma17001', '2020-12-28 18:45:39'),
(3, 0, '0000-00-00', 'colma20002', 10000, 20000, '21212300', '2020-12-24 00:00:00', 2, '121212100', '2020-12-24 00:00:00', 'colma17001', '2020-12-28 19:03:55');

-- --------------------------------------------------------

--
-- Table structure for table `society`
--

CREATE TABLE `society` (
  `societyid` int(11) NOT NULL,
  `sfullname` varchar(240) NOT NULL,
  `sshortname` varchar(255) NOT NULL,
  `datefound` date NOT NULL,
  `street` varchar(200) NOT NULL,
  `quarter` varchar(200) NOT NULL,
  `city` varchar(255) NOT NULL,
  `state` varchar(200) NOT NULL,
  `country` varchar(255) NOT NULL,
  `phoneno1` varchar(255) NOT NULL,
  `phoneno2` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `regnoprefix` varchar(255) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `society`
--

INSERT INTO `society` (`societyid`, `sfullname`, `sshortname`, `datefound`, `street`, `quarter`, `city`, `state`, `country`, `phoneno1`, `phoneno2`, `email`, `regnoprefix`) VALUES
(0, '', '', '0000-00-00', '', '', '', '', '', '', '', '', 'colma');

-- --------------------------------------------------------

--
-- Table structure for table `states`
--

CREATE TABLE `states` (
  `state_id` smallint(6) NOT NULL DEFAULT 0,
  `state_name` varchar(20) NOT NULL DEFAULT '',
  `state_code` varchar(2) NOT NULL,
  `countrycode` varchar(5) NOT NULL DEFAULT '159',
  `countryid` int(11) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `states`
--

INSERT INTO `states` (`state_id`, `state_name`, `state_code`, `countrycode`, `countryid`) VALUES
(1, 'Abia', 'AB', 'NG', 0),
(2, 'Adamawa', 'AD', 'NG', 0),
(3, 'Akwa Ibom', 'AK', 'NG', 0),
(4, 'Anambra', 'AN', 'NG', 0),
(5, 'Bauchi', 'BA', 'NG', 0),
(6, 'Bayelsa', 'BY', 'NG', 0),
(7, 'Benue', 'BN', 'NG', 0),
(8, 'Borno', 'BO', 'NG', 0),
(9, 'Cross River', 'CR', 'NG', 0),
(10, 'Delta', 'DT', 'NG', 0),
(11, 'Ebonyi', 'EB', 'NG', 0),
(12, 'Edo', 'ED', 'NG', 0),
(13, 'Ekiti', 'EK', 'NG', 0),
(14, 'Enugu', 'EN', 'NG', 0),
(15, 'Gombe', 'GM', 'NG', 0),
(16, 'Imo', 'IM', 'NG', 0),
(17, 'Jigawa', 'JG', 'NG', 0),
(18, 'Kaduna', 'KD', 'NG', 0),
(19, 'Kano', 'KN', 'NG', 0),
(20, 'Katsina', 'KT', 'NG', 0),
(21, 'Kebbi', 'KB', 'NG', 0),
(22, 'Kogi', 'KG', 'NG', 0),
(23, 'Kwara', 'KW', 'NG', 0),
(24, 'Lagos', 'LA', 'NG', 0),
(25, 'Nasarawa', 'NS', 'NG', 0),
(26, 'Niger', 'NG', 'NG', 0),
(27, 'Ogun', 'OG', 'NG', 0),
(28, 'Ondo', 'OD', 'NG', 0),
(29, 'Osun', 'OS', 'NG', 0),
(30, 'Oyo', 'OY', 'NG', 0),
(31, 'Plateau', 'PT', 'NG', 0),
(32, 'Rivers', 'RV', 'NG', 0),
(33, 'Sokoto', 'SK', 'NG', 0),
(34, 'Taraba', 'TR', 'NG', 0),
(35, 'Yobe', 'YB', 'NG', 0),
(36, 'Zamfara', 'ZF', 'NG', 0),
(37, 'FCT', 'FC', 'NG', 0),
(38, 'Foreign', '', '0', 0);

-- --------------------------------------------------------

--
-- Table structure for table `submenutypes`
--

CREATE TABLE `submenutypes` (
  `submenutypeid` int(11) NOT NULL,
  `submenutypename` varchar(255) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `submenutypes`
--

INSERT INTO `submenutypes` (`submenutypeid`, `submenutypename`) VALUES
(1, 'main submenu'),
(2, 'submenu link');

-- --------------------------------------------------------

--
-- Table structure for table `titles`
--

CREATE TABLE `titles` (
  `titleid` int(11) NOT NULL,
  `fulltitle` varchar(255) NOT NULL,
  `title` varchar(50) NOT NULL,
  `titlestatus` int(11) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `titles`
--

INSERT INTO `titles` (`titleid`, `fulltitle`, `title`, `titlestatus`) VALUES
(1, 'MR', 'MR', 1),
(2, 'MRS', 'MRS', 1),
(3, 'MISS', 'MISS', 1),
(4, 'DOCTOR', 'DR', 1),
(5, 'PROFESSOR', 'PROF', 1),
(6, 'PASTOR', 'PST', 1),
(7, 'DEACON', 'DCN', 1),
(8, 'DEACONESS', 'DCNS', 1),
(9, 'ARCHITECT', 'ARC', 1);

-- --------------------------------------------------------

--
-- Table structure for table `trn_user_log`
--

CREATE TABLE `trn_user_log` (
  `app_id` int(11) DEFAULT NULL,
  `transaction_id` int(11) DEFAULT NULL,
  `mobile_no` varchar(15) DEFAULT NULL,
  `node_id` int(11) DEFAULT NULL,
  `customer_attribute` datetime DEFAULT NULL,
  `entered_value` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `trn_user_log`
--

INSERT INTO `trn_user_log` (`app_id`, `transaction_id`, `mobile_no`, `node_id`, `customer_attribute`, `entered_value`) VALUES
(100, 111, '9999999999', 1, '2001-01-01 00:00:00', 2),
(100, 111, '9999999999', 2, '2001-02-01 00:00:00', 1),
(100, 111, '9999999999', 3, '2001-03-01 00:00:00', 4),
(100, 111, '9999999999', 4, '2001-04-01 00:00:00', 3),
(100, 111, '9999999999', 5, '2001-05-01 00:00:00', 2),
(100, 222, '8888888888', 4, '2001-04-01 00:00:00', 1),
(100, 222, '8888888888', 3, '2001-03-01 00:00:00', 2),
(100, 222, '8888888888', 2, '2001-02-01 00:00:00', 1),
(100, 222, '8888888888', 1, '2001-01-01 00:00:00', 3),
(100, 222, '8888888888', 5, '2001-05-01 00:00:00', 4);

-- --------------------------------------------------------

--
-- Table structure for table `userrights`
--

CREATE TABLE `userrights` (
  `userrightid` int(11) NOT NULL,
  `appsubmenuid` int(11) NOT NULL,
  `roleid` int(11) NOT NULL,
  `status` int(11) NOT NULL,
  `submenustatus` int(11) NOT NULL,
  `menustatus` int(11) NOT NULL,
  `rolestatus` int(11) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1 ROW_FORMAT=FIXED;

--
-- Dumping data for table `userrights`
--

INSERT INTO `userrights` (`userrightid`, `appsubmenuid`, `roleid`, `status`, `submenustatus`, `menustatus`, `rolestatus`) VALUES
(1, 3, 1, 1, 1, 1, 1),
(2, 8, 1, 1, 1, 1, 1),
(3, 12, 1, 1, 1, 1, 1),
(4, 14, 1, 1, 1, 1, 1),
(5, 15, 1, 1, 1, 1, 1),
(6, 17, 1, 1, 1, 1, 1),
(7, 10, 1, 1, 1, 1, 1),
(8, 9, 1, 1, 1, 1, 1),
(9, 7, 1, 1, 1, 1, 1),
(10, 6, 1, 1, 1, 1, 1),
(11, 5, 1, 1, 1, 1, 1),
(12, 4, 1, 1, 1, 1, 1),
(13, 1, 1, 1, 1, 1, 1),
(14, 2, 1, 1, 1, 1, 1),
(15, 11, 1, 1, 1, 1, 1),
(16, 13, 1, 1, 1, 1, 1),
(17, 16, 1, 1, 1, 1, 1),
(18, 18, 1, 1, 1, 1, 1),
(19, 19, 1, 1, 1, 1, 1),
(20, 20, 1, 1, 1, 1, 1),
(21, 21, 1, 1, 1, 1, 1),
(22, 22, 1, 1, 1, 1, 1),
(23, 23, 1, 1, 1, 1, 1),
(24, 24, 1, 1, 1, 1, 1),
(25, 25, 1, 1, 1, 1, 1),
(26, 26, 1, 1, 1, 1, 1),
(27, 27, 1, 1, 1, 1, 1),
(28, 28, 1, 1, 1, 1, 1),
(29, 29, 1, 1, 1, 1, 1),
(30, 30, 1, 1, 1, 1, 1),
(31, 31, 1, 1, 1, 1, 1),
(32, 32, 1, 1, 1, 1, 1),
(33, 33, 1, 1, 1, 1, 1),
(34, 34, 1, 1, 1, 1, 1),
(35, 35, 1, 1, 1, 1, 1),
(36, 36, 1, 1, 1, 1, 1),
(37, 37, 1, 1, 1, 1, 1),
(38, 38, 1, 1, 1, 1, 1),
(39, 39, 1, 1, 1, 1, 1),
(40, 40, 1, 1, 1, 1, 1),
(41, 41, 1, 1, 1, 1, 1),
(42, 42, 1, 1, 1, 1, 1),
(43, 43, 1, 1, 1, 1, 1),
(44, 44, 1, 1, 1, 1, 1),
(45, 45, 1, 1, 1, 1, 1),
(46, 46, 1, 1, 1, 1, 1),
(47, 47, 1, 1, 1, 1, 1),
(48, 48, 1, 1, 1, 1, 1),
(49, 49, 1, 1, 1, 1, 1),
(50, 50, 1, 1, 1, 1, 1),
(51, 51, 1, 1, 1, 1, 1),
(52, 52, 1, 1, 1, 1, 1);

-- --------------------------------------------------------

--
-- Table structure for table `userroles`
--

CREATE TABLE `userroles` (
  `userrolesid` int(11) NOT NULL,
  `loginid` int(11) NOT NULL,
  `roleid` int(11) NOT NULL,
  `status` int(11) NOT NULL,
  `rolestatus` int(11) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `userroles`
--

INSERT INTO `userroles` (`userrolesid`, `loginid`, `roleid`, `status`, `rolestatus`) VALUES
(1, 1, 1, 1, 1);

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `userid` varchar(11) NOT NULL,
  `sname` varchar(255) NOT NULL,
  `mname` varchar(255) NOT NULL,
  `fname` varchar(255) NOT NULL,
  `id` int(11) NOT NULL,
  `title` int(11) NOT NULL,
  `userstatus` int(11) NOT NULL,
  `gender` varchar(255) NOT NULL,
  `emailadd` varchar(255) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`userid`, `sname`, `mname`, `fname`, `id`, `title`, `userstatus`, `gender`, `emailadd`) VALUES
('admin', 'adamu', 'paul', 'john', 1, 5, 1, '1', 'adamu.john@covenantuniversity.edu.ng'),
('student', 'Ciroma', 'Chukwuma', 'Adekunle', 1, 0, 1, '2', '');

-- --------------------------------------------------------

--
-- Table structure for table `usertypes`
--

CREATE TABLE `usertypes` (
  `usertypeid` int(11) NOT NULL,
  `usertypename` varchar(255) NOT NULL,
  `usertypeurl` varchar(255) NOT NULL,
  `status` int(11) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `usertypes`
--

INSERT INTO `usertypes` (`usertypeid`, `usertypename`, `usertypeurl`, `status`) VALUES
(1, 'staff', 'administration.php', 1),
(2, 'student', 'studentdashboard.php', 1);

-- --------------------------------------------------------

--
-- Table structure for table `wofbilevel`
--

CREATE TABLE `wofbilevel` (
  `certid` int(11) NOT NULL,
  `certabbr` varchar(255) NOT NULL,
  `certname` varchar(255) NOT NULL,
  `certstatus` int(11) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `wofbilevel`
--

INSERT INTO `wofbilevel` (`certid`, `certabbr`, `certname`, `certstatus`) VALUES
(1, 'BCC', 'Basic Certificate Course', 1),
(2, 'LCC', 'Leadership Certificate Course', 1),
(3, 'LDC', 'Leadership Diploma Certificate', 1),
(4, 'None', 'None', 1);

-- --------------------------------------------------------

--
-- Structure for view `memlst`
--
DROP TABLE IF EXISTS `memlst`;

CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`localhost` SQL SECURITY DEFINER VIEW `memlst`  AS SELECT `memberregister`.`id` AS `id`, `memberregister`.`memid` AS `memid`, `memberregister`.`title` AS `title`, `memberregister`.`sname` AS `sname`, `memberregister`.`fname` AS `fname`, `memberregister`.`mname` AS `mname`, `memberregister`.`dob` AS `dob`, `memberregister`.`gender` AS `gender`, `memberregister`.`mstat` AS `mstat`, `memberregister`.`nationality` AS `nationality`, `memberregister`.`homeadd1` AS `homeadd1`, `memberregister`.`homeadd2` AS `homeadd2`, `memberregister`.`homeadd3` AS `homeadd3`, `memberregister`.`state` AS `state`, `memberregister`.`country` AS `country`, `memberregister`.`phoneno` AS `phoneno`, `memberregister`.`email` AS `email`, `memberregister`.`busnature` AS `busnature`, `memberregister`.`busadd1` AS `busadd1`, `memberregister`.`busadd2` AS `busadd2`, `memberregister`.`busadd3` AS `busadd3`, `memberregister`.`busstate` AS `busstate`, `memberregister`.`buscountry` AS `buscountry`, `memberregister`.`chyr` AS `chyr`, `memberregister`.`wofbilevel` AS `wofbilevel`, `memberregister`.`province` AS `province`, `memberregister`.`district` AS `district`, `memberregister`.`zone` AS `zone`, `memberregister`.`wsflocation` AS `wsflocation`, `memberregister`.`nkintitle` AS `nkintitle`, `memberregister`.`nkinsname` AS `nkinsname`, `memberregister`.`nkinfname` AS `nkinfname`, `memberregister`.`nkinmname` AS `nkinmname`, `memberregister`.`nkinrel` AS `nkinrel`, `memberregister`.`nkadd1` AS `nkadd1`, `memberregister`.`nkadd2` AS `nkadd2`, `memberregister`.`nkadd3` AS `nkadd3`, `memberregister`.`nkstate` AS `nkstate`, `memberregister`.`nkcountry` AS `nkcountry`, `memberregister`.`nkphoneno` AS `nkphoneno`, `memberregister`.`nkemail` AS `nkemail`, `memberregister`.`datejoin` AS `datejoin`, `memberregister`.`monthlysavings` AS `monthlysavings`, `memberregister`.`accountnumber` AS `accountnumber`, `memberregister`.`groupid` AS `groupid`, `memberregister`.`shareamount` AS `shareamount`, `memberregister`.`memstatus` AS `memstatus`, `memberregister`.`datecreated` AS `datecreated`, `memberregister`.`officer` AS `officer` FROM `memberregister` WHERE `memberregister`.`memstatus` = 1 ;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `appsmenu`
--
ALTER TABLE `appsmenu`
  ADD PRIMARY KEY (`appmenuid`);

--
-- Indexes for table `appssubmenu`
--
ALTER TABLE `appssubmenu`
  ADD PRIMARY KEY (`submenuid`);

--
-- Indexes for table `banks`
--
ALTER TABLE `banks`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `cashflowin`
--
ALTER TABLE `cashflowin`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `cashflowout`
--
ALTER TABLE `cashflowout`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `countries`
--
ALTER TABLE `countries`
  ADD PRIMARY KEY (`countryid`),
  ADD UNIQUE KEY `countrycode` (`countrycode`),
  ADD KEY `country` (`country`);

--
-- Indexes for table `duties`
--
ALTER TABLE `duties`
  ADD PRIMARY KEY (`dutyid`);

--
-- Indexes for table `expenseheads`
--
ALTER TABLE `expenseheads`
  ADD PRIMARY KEY (`expno`);

--
-- Indexes for table `facilityregister`
--
ALTER TABLE `facilityregister`
  ADD PRIMARY KEY (`id`,`facno`);

--
-- Indexes for table `facilitytypes`
--
ALTER TABLE `facilitytypes`
  ADD PRIMARY KEY (`factypeid`);

--
-- Indexes for table `gender`
--
ALTER TABLE `gender`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `groupnames`
--
ALTER TABLE `groupnames`
  ADD PRIMARY KEY (`groupid`);

--
-- Indexes for table `instruments`
--
ALTER TABLE `instruments`
  ADD PRIMARY KEY (`instrumentid`);

--
-- Indexes for table `interest`
--
ALTER TABLE `interest`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `lga`
--
ALTER TABLE `lga`
  ADD PRIMARY KEY (`lga_id`),
  ADD KEY `state_id` (`state_id`);

--
-- Indexes for table `liberators`
--
ALTER TABLE `liberators`
  ADD PRIMARY KEY (`liberatorid`);

--
-- Indexes for table `login`
--
ALTER TABLE `login`
  ADD PRIMARY KEY (`loginid`,`userid`);

--
-- Indexes for table `mdeduction1`
--
ALTER TABLE `mdeduction1`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `mdeduction2`
--
ALTER TABLE `mdeduction2`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `memberpays`
--
ALTER TABLE `memberpays`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `memberregister`
--
ALTER TABLE `memberregister`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `menutypes`
--
ALTER TABLE `menutypes`
  ADD PRIMARY KEY (`mtypid`);

--
-- Indexes for table `months`
--
ALTER TABLE `months`
  ADD PRIMARY KEY (`monthid`);

--
-- Indexes for table `mstat`
--
ALTER TABLE `mstat`
  ADD PRIMARY KEY (`mstatid`);

--
-- Indexes for table `names`
--
ALTER TABLE `names`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `officers`
--
ALTER TABLE `officers`
  ADD PRIMARY KEY (`officersid`);

--
-- Indexes for table `offices`
--
ALTER TABLE `offices`
  ADD PRIMARY KEY (`officeid`);

--
-- Indexes for table `period`
--
ALTER TABLE `period`
  ADD PRIMARY KEY (`periodid`);

--
-- Indexes for table `portallog`
--
ALTER TABLE `portallog`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `posts`
--
ALTER TABLE `posts`
  ADD PRIMARY KEY (`postid`);

--
-- Indexes for table `relationships`
--
ALTER TABLE `relationships`
  ADD PRIMARY KEY (`relid`);

--
-- Indexes for table `roles`
--
ALTER TABLE `roles`
  ADD PRIMARY KEY (`roleid`);

--
-- Indexes for table `rptmonth`
--
ALTER TABLE `rptmonth`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `savingsincrement`
--
ALTER TABLE `savingsincrement`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `savingsreschudling`
--
ALTER TABLE `savingsreschudling`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `setoffreasons`
--
ALTER TABLE `setoffreasons`
  ADD PRIMARY KEY (`reasonid`);

--
-- Indexes for table `severances`
--
ALTER TABLE `severances`
  ADD PRIMARY KEY (`severanceid`);

--
-- Indexes for table `shareincrement`
--
ALTER TABLE `shareincrement`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `states`
--
ALTER TABLE `states`
  ADD PRIMARY KEY (`state_id`);

--
-- Indexes for table `submenutypes`
--
ALTER TABLE `submenutypes`
  ADD PRIMARY KEY (`submenutypeid`);

--
-- Indexes for table `titles`
--
ALTER TABLE `titles`
  ADD PRIMARY KEY (`titleid`);

--
-- Indexes for table `userrights`
--
ALTER TABLE `userrights`
  ADD PRIMARY KEY (`userrightid`);

--
-- Indexes for table `userroles`
--
ALTER TABLE `userroles`
  ADD PRIMARY KEY (`userrolesid`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`userid`,`id`);

--
-- Indexes for table `usertypes`
--
ALTER TABLE `usertypes`
  ADD PRIMARY KEY (`usertypeid`);

--
-- Indexes for table `wofbilevel`
--
ALTER TABLE `wofbilevel`
  ADD PRIMARY KEY (`certid`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `appsmenu`
--
ALTER TABLE `appsmenu`
  MODIFY `appmenuid` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10938287;

--
-- AUTO_INCREMENT for table `appssubmenu`
--
ALTER TABLE `appssubmenu`
  MODIFY `submenuid` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=53;

--
-- AUTO_INCREMENT for table `banks`
--
ALTER TABLE `banks`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=39;

--
-- AUTO_INCREMENT for table `cashflowin`
--
ALTER TABLE `cashflowin`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=69;

--
-- AUTO_INCREMENT for table `cashflowout`
--
ALTER TABLE `cashflowout`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=25;

--
-- AUTO_INCREMENT for table `countries`
--
ALTER TABLE `countries`
  MODIFY `countryid` smallint(6) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=253;

--
-- AUTO_INCREMENT for table `duties`
--
ALTER TABLE `duties`
  MODIFY `dutyid` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `expenseheads`
--
ALTER TABLE `expenseheads`
  MODIFY `expno` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `facilityregister`
--
ALTER TABLE `facilityregister`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=74;

--
-- AUTO_INCREMENT for table `facilitytypes`
--
ALTER TABLE `facilitytypes`
  MODIFY `factypeid` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- AUTO_INCREMENT for table `gender`
--
ALTER TABLE `gender`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `instruments`
--
ALTER TABLE `instruments`
  MODIFY `instrumentid` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `interest`
--
ALTER TABLE `interest`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `login`
--
ALTER TABLE `login`
  MODIFY `loginid` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `mdeduction1`
--
ALTER TABLE `mdeduction1`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=19;

--
-- AUTO_INCREMENT for table `mdeduction2`
--
ALTER TABLE `mdeduction2`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `memberpays`
--
ALTER TABLE `memberpays`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=71;

--
-- AUTO_INCREMENT for table `memberregister`
--
ALTER TABLE `memberregister`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=24;

--
-- AUTO_INCREMENT for table `menutypes`
--
ALTER TABLE `menutypes`
  MODIFY `mtypid` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `mstat`
--
ALTER TABLE `mstat`
  MODIFY `mstatid` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `officers`
--
ALTER TABLE `officers`
  MODIFY `officersid` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `period`
--
ALTER TABLE `period`
  MODIFY `periodid` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `portallog`
--
ALTER TABLE `portallog`
  MODIFY `id` bigint(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=176;

--
-- AUTO_INCREMENT for table `posts`
--
ALTER TABLE `posts`
  MODIFY `postid` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `relationships`
--
ALTER TABLE `relationships`
  MODIFY `relid` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `roles`
--
ALTER TABLE `roles`
  MODIFY `roleid` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `rptmonth`
--
ALTER TABLE `rptmonth`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `savingsincrement`
--
ALTER TABLE `savingsincrement`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `savingsreschudling`
--
ALTER TABLE `savingsreschudling`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `setoffreasons`
--
ALTER TABLE `setoffreasons`
  MODIFY `reasonid` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `shareincrement`
--
ALTER TABLE `shareincrement`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `submenutypes`
--
ALTER TABLE `submenutypes`
  MODIFY `submenutypeid` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `titles`
--
ALTER TABLE `titles`
  MODIFY `titleid` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `userrights`
--
ALTER TABLE `userrights`
  MODIFY `userrightid` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=53;

--
-- AUTO_INCREMENT for table `userroles`
--
ALTER TABLE `userroles`
  MODIFY `userrolesid` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `usertypes`
--
ALTER TABLE `usertypes`
  MODIFY `usertypeid` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `wofbilevel`
--
ALTER TABLE `wofbilevel`
  MODIFY `certid` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
