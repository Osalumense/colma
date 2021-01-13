/*
Navicat MySQL Data Transfer

Source Server         : localhost_3306
Source Server Version : 100121
Source Host           : localhost:3306
Source Database       : colma

Target Server Type    : MYSQL
Target Server Version : 100121
File Encoding         : 65001

Date: 2018-01-09 13:04:55
*/

SET FOREIGN_KEY_CHECKS=0;

-- ----------------------------
-- Table structure for appsmenu
-- ----------------------------
DROP TABLE IF EXISTS `appsmenu`;
CREATE TABLE `appsmenu` (
  `appmenuid` int(11) NOT NULL AUTO_INCREMENT,
  `menuname` varchar(255) NOT NULL,
  `status` int(11) NOT NULL,
  `menuorder` int(11) NOT NULL,
  PRIMARY KEY (`appmenuid`)
) ENGINE=MyISAM AUTO_INCREMENT=17 DEFAULT CHARSET=latin1;

-- ----------------------------
-- Records of appsmenu
-- ----------------------------
INSERT INTO `appsmenu` VALUES ('6', 'membership control', '1', '0');
INSERT INTO `appsmenu` VALUES ('2', 'manage menu', '1', '0');
INSERT INTO `appsmenu` VALUES ('3', 'manage roles', '1', '0');
INSERT INTO `appsmenu` VALUES ('4', 'deleted items', '1', '0');
INSERT INTO `appsmenu` VALUES ('5', 'reports', '1', '0');
INSERT INTO `appsmenu` VALUES ('7', 'setup', '1', '0');
INSERT INTO `appsmenu` VALUES ('8', 'facility management', '1', '0');
INSERT INTO `appsmenu` VALUES ('9', 'monthly deductions', '1', '0');
INSERT INTO `appsmenu` VALUES ('10', 'system maintenance', '1', '0');
INSERT INTO `appsmenu` VALUES ('11', 'views', '1', '0');
INSERT INTO `appsmenu` VALUES ('12', 'list', '1', '0');
INSERT INTO `appsmenu` VALUES ('13', 'cash flowin', '1', '0');
INSERT INTO `appsmenu` VALUES ('14', 'cash flowout', '1', '0');
INSERT INTO `appsmenu` VALUES ('15', 'reconcillation', '1', '0');
INSERT INTO `appsmenu` VALUES ('16', 'liberator', '1', '0');

-- ----------------------------
-- Table structure for appssubmenu
-- ----------------------------
DROP TABLE IF EXISTS `appssubmenu`;
CREATE TABLE `appssubmenu` (
  `submenuid` int(11) NOT NULL AUTO_INCREMENT,
  `submenuname` varchar(255) NOT NULL,
  `menuid` int(11) NOT NULL,
  `filename` varchar(255) NOT NULL,
  `extension` varchar(255) NOT NULL,
  `status` int(11) NOT NULL,
  `submenutypeid` int(11) NOT NULL,
  `menustatus` int(11) NOT NULL,
  `submenuorder` int(11) NOT NULL,
  PRIMARY KEY (`submenuid`)
) ENGINE=MyISAM AUTO_INCREMENT=47 DEFAULT CHARSET=latin1;

-- ----------------------------
-- Records of appssubmenu
-- ----------------------------
INSERT INTO `appssubmenu` VALUES ('2', 'switch submenu', '2', 'switchsubmenu', 'php', '1', '1', '1', '0');
INSERT INTO `appssubmenu` VALUES ('3', 'view user role', '3', 'viewuserrole', 'php', '1', '1', '1', '0');
INSERT INTO `appssubmenu` VALUES ('4', 'view logs', '5', 'viewlogs', 'php', '1', '1', '1', '0');
INSERT INTO `appssubmenu` VALUES ('5', 'application ajax', '1', 'appajax', 'php', '1', '2', '1', '0');
INSERT INTO `appssubmenu` VALUES ('6', 'assign role to user', '3', 'userroleassign', 'php', '1', '1', '1', '0');
INSERT INTO `appssubmenu` VALUES ('7', 'delete menu', '2', 'delmenu', 'php', '0', '1', '1', '0');
INSERT INTO `appssubmenu` VALUES ('9', 'edit role', '3', 'editrole', 'php', '1', '1', '1', '0');
INSERT INTO `appssubmenu` VALUES ('10', 'view assigned roles', '3', 'roleassigned', 'php', '1', '1', '1', '0');
INSERT INTO `appssubmenu` VALUES ('11', 'add new role', '3', 'addrole', 'php', '1', '1', '1', '0');
INSERT INTO `appssubmenu` VALUES ('12', 'deleted menu', '4', 'deledmenu', 'php', '1', '1', '1', '0');
INSERT INTO `appssubmenu` VALUES ('18', 'register new member', '6', 'newmember', 'php', '1', '1', '1', '0');
INSERT INTO `appssubmenu` VALUES ('15', 'add menu', '2', 'addmenu', 'php', '1', '1', '1', '0');
INSERT INTO `appssubmenu` VALUES ('16', 'assign role to menu', '3', 'roleassign', 'php', '1', '1', '1', '0');
INSERT INTO `appssubmenu` VALUES ('17', 'edit menu', '2', 'editmenu', 'php', '1', '1', '1', '0');
INSERT INTO `appssubmenu` VALUES ('19', 'register facility application', '8', 'facilityreg', 'php', '1', '1', '1', '0');
INSERT INTO `appssubmenu` VALUES ('20', 'transfer form', '6', 'transferform', 'php', '1', '1', '1', '0');
INSERT INTO `appssubmenu` VALUES ('21', 'monthly savings rescheduling', '6', 'montsav', 'php', '1', '1', '1', '0');
INSERT INTO `appssubmenu` VALUES ('22', 'close out a member', '6', 'setmemberoff', 'php', '1', '1', '1', '0');
INSERT INTO `appssubmenu` VALUES ('23', 'view member profile', '6', 'viewmember', 'php', '1', '1', '1', '0');
INSERT INTO `appssubmenu` VALUES ('24', 'individual facility repayment', '13', 'cashinrepayment', 'php', '1', '1', '1', '0');
INSERT INTO `appssubmenu` VALUES ('25', 'add facility', '8', 'facilities', 'php', '1', '1', '1', '0');
INSERT INTO `appssubmenu` VALUES ('26', 'enter savings increment', '13', 'individualsavings', 'php', '1', '1', '1', '0');
INSERT INTO `appssubmenu` VALUES ('27', 'new officer', '6', 'officerreg', 'php', '1', '1', '1', '0');
INSERT INTO `appssubmenu` VALUES ('28', 'close out officers', '6', 'officerclose', 'php', '1', '1', '1', '0');
INSERT INTO `appssubmenu` VALUES ('29', 'view facilities', '8', 'viewfacilities', 'php', '1', '1', '1', '0');
INSERT INTO `appssubmenu` VALUES ('30', 'edit facility', '8', 'editfacilities', 'php', '1', '1', '1', '0');
INSERT INTO `appssubmenu` VALUES ('31', 'enter payments for savings withdrawal', '14', 'cashoutsavings', 'php', '1', '1', '1', '0');
INSERT INTO `appssubmenu` VALUES ('32', 'enter payments for facilities', '14', 'paymentforfacilities', 'php', '1', '1', '1', '0');
INSERT INTO `appssubmenu` VALUES ('33', 'letter of offer', '8', 'letterofoffer', 'php', '1', '1', '1', '0');
INSERT INTO `appssubmenu` VALUES ('34', 'bank reports', '15', 'bankreports', 'php', '1', '1', '1', '0');
INSERT INTO `appssubmenu` VALUES ('35', 'monthly deduction setup', '9', 'montlydedset', 'php', '1', '1', '1', '0');
INSERT INTO `appssubmenu` VALUES ('36', 'share increment', '6', 'shareincrement', 'php', '1', '1', '1', '0');
INSERT INTO `appssubmenu` VALUES ('37', 'edit installment', '8', 'editinstallment', 'php', '1', '1', '1', '0');
INSERT INTO `appssubmenu` VALUES ('38', 'enter receipts from others', '13', 'rcptfrmothers', 'php', '1', '1', '1', '0');
INSERT INTO `appssubmenu` VALUES ('39', 'add liberatior', '16', 'addliberator', 'php', '1', '1', '1', '0');
INSERT INTO `appssubmenu` VALUES ('40', 'enter refunds on facilities', '14', 'cashoutrefundloans', 'php', '1', '1', '1', '0');
INSERT INTO `appssubmenu` VALUES ('41', 'enter payments to others', '14', 'cashouttoothers', 'php', '1', '1', '1', '0');
INSERT INTO `appssubmenu` VALUES ('42', 'enter payments for imprest', '14', 'cashouttoimprest', 'php', '1', '1', '1', '0');
INSERT INTO `appssubmenu` VALUES ('43', 'enter imprest expense', '14', 'imprestexpense', 'php', '1', '1', '1', '0');
INSERT INTO `appssubmenu` VALUES ('44', 'upload new bulk facility', '8', 'facilityregister', 'php', '1', '1', '1', '0');
INSERT INTO `appssubmenu` VALUES ('45', 'edit monthly deduction', '9', 'editdeduction', 'php', '1', '1', '1', '0');
INSERT INTO `appssubmenu` VALUES ('46', 'edit member record', '6', 'editmemberrecord', 'php', '1', '1', '1', '0');

-- ----------------------------
-- Table structure for banks
-- ----------------------------
DROP TABLE IF EXISTS `banks`;
CREATE TABLE `banks` (
  `bkid` varchar(50) NOT NULL,
  `bankname` varchar(50) NOT NULL,
  `bankstatus` int(11) NOT NULL,
  `id` int(11) NOT NULL AUTO_INCREMENT,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=39 DEFAULT CHARSET=latin1;

-- ----------------------------
-- Records of banks
-- ----------------------------
INSERT INTO `banks` VALUES ('FBN', 'FIRST BANK OF NIGERIA', '1', '19');
INSERT INTO `banks` VALUES ('CB', 'CHARTERED BANK', '1', '20');
INSERT INTO `banks` VALUES ('DB', 'DIAMOND BANK', '1', '21');
INSERT INTO `banks` VALUES ('AFRB', 'AFRI BANK', '1', '22');
INSERT INTO `banks` VALUES ('STB', 'STANDARD TRUST BANK', '1', '23');
INSERT INTO `banks` VALUES ('GTB', 'GUARANTEE TRUST BANK', '1', '24');
INSERT INTO `banks` VALUES ('OMEGA', 'OMEGA BANK', '1', '25');
INSERT INTO `banks` VALUES ('ECO', 'ECOBANK', '1', '26');
INSERT INTO `banks` VALUES ('CITZEN', 'CITIZEN BANK', '1', '27');
INSERT INTO `banks` VALUES ('CBL', 'CBL', '1', '28');
INSERT INTO `banks` VALUES ('CBI', 'CBI', '1', '29');
INSERT INTO `banks` VALUES ('AIB', 'AFRICAN INTERNATIONAL BANK', '1', '30');
INSERT INTO `banks` VALUES ('MBC', 'MBC', '1', '31');
INSERT INTO `banks` VALUES ('ASTB', 'ASTB', '1', '32');
INSERT INTO `banks` VALUES ('SGB', 'SOCIETE GENERALE BANK', '1', '33');
INSERT INTO `banks` VALUES ('ZENITH', 'ZENITH BANK', '1', '34');
INSERT INTO `banks` VALUES ('CITY', 'CITY EXPRESS BANK', '1', '35');
INSERT INTO `banks` VALUES ('CMFB', 'COVENANT MICRO FINANCE BANK', '1', '36');
INSERT INTO `banks` VALUES ('UBA', 'UNITED BANK FOR AFRICA', '1', '37');

-- ----------------------------
-- Table structure for cashflowin
-- ----------------------------
DROP TABLE IF EXISTS `cashflowin`;
CREATE TABLE `cashflowin` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `incomeidno` int(11) NOT NULL,
  `receiptno` varchar(50) NOT NULL,
  `receiptdate` date NOT NULL,
  `payer` varchar(255) DEFAULT NULL COMMENT 'Payer name wheter meber or non member',
  `payerid` varchar(11) NOT NULL,
  `amount` double NOT NULL,
  `incomesource` int(11) NOT NULL,
  `instrument` int(11) NOT NULL,
  `docref` varchar(50) NOT NULL,
  `docdate` date NOT NULL,
  `docbank` varchar(50) NOT NULL,
  `purpose` varchar(50) NOT NULL,
  `userr` varchar(50) NOT NULL,
  `udate` datetime NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=25 DEFAULT CHARSET=latin1;

-- ----------------------------
-- Records of cashflowin
-- ----------------------------
INSERT INTO `cashflowin` VALUES ('1', '1', '6786887', '2017-09-10', null, 'colma17001', '10000', '1', '1', '798789', '2017-09-10', '36', ' Application Fee', '10', '2017-09-10 07:59:48');
INSERT INTO `cashflowin` VALUES ('2', '2', '6786887', '2017-09-10', null, 'colma17004', '10000', '10', '0', '798789', '2017-09-10', '', 'Regular Loan Application Fee', '10', '2017-09-10 08:02:15');
INSERT INTO `cashflowin` VALUES ('3', '3', '6786887', '2017-09-10', null, 'colma17004', '10000', '10', '0', '798789', '2017-09-10', '', 'Regular Loan Application Fee', '10', '2017-09-10 08:05:36');
INSERT INTO `cashflowin` VALUES ('4', '4', '787878', '2017-09-11', null, '', '1000', '1', '2', '798789', '2017-09-11', '36', 'Membership Registration Application Fee ', '10', '2017-09-11 08:18:32');
INSERT INTO `cashflowin` VALUES ('5', '5', '8787676', '2017-09-11', null, 'colma17004', '200000', '3', '2', '7978', '2017-09-22', '36', 'Share Increment ', '10', '2017-09-11 08:18:33');
INSERT INTO `cashflowin` VALUES ('6', '6', '787878', '2017-09-18', null, '', '1000', '0', '2', '798789', '2017-09-11', '36', ' Application Fee ', '10', '2017-09-11 14:56:41');
INSERT INTO `cashflowin` VALUES ('7', '7', '787878', '2017-09-18', null, 'colma17004', '1000', '0', '4', '798789', '2017-09-11', '23', '  Application Fee ', '10', '2017-09-11 15:29:05');
INSERT INTO `cashflowin` VALUES ('8', '8', '787878', '2017-09-11', null, 'colma17009', '1000', '1', '4', '798789', '2017-09-11', '36', 'Membership Registration  Application Fee ', '10', '2017-09-11 17:43:54');
INSERT INTO `cashflowin` VALUES ('9', '9', '8787676', '2017-09-11', null, 'colma17009', '10000', '3', '4', '7978', '2017-09-11', '36', 'Share  Increment ', '10', '2017-09-11 17:43:54');
INSERT INTO `cashflowin` VALUES ('10', '10', '787878', '2017-09-11', null, 'colma17009', '10000', '10', '4', '798789', '2017-09-11', '36', 'Regular Loan  Application Fee ', '10', '2017-09-11 18:14:18');
INSERT INTO `cashflowin` VALUES ('11', '11', '787878', '2017-09-11', null, 'colma17009', '1000', '2', '4', '798789', '2017-09-11', '36', 'Savings  Application Fee ', '10', '2017-09-11 18:29:15');
INSERT INTO `cashflowin` VALUES ('12', '12', '787878', '2017-09-12', null, 'colma17001', '200000', '3', '4', '798789', '2017-09-12', '20', 'Share  Increment ', '10', '2017-09-12 07:40:11');
INSERT INTO `cashflowin` VALUES ('13', '13', '68667', '2017-09-13', null, '', '10000', '10', '4', '73887', '2017-09-13', '36', 'Regular Loan  Repayment ', '10', '2017-09-13 13:40:39');
INSERT INTO `cashflowin` VALUES ('14', '14', '787878', '2017-09-13', null, '', '100000', '10', '4', '798789', '2017-09-13', '22', 'Regular Loan  Repayment ', '10', '2017-09-13 18:06:08');
INSERT INTO `cashflowin` VALUES ('15', '15', '787878', '2017-09-11', null, '', '100000', '10', '4', '798789', '2017-09-11', '36', 'Regular Loan  Repayment ', '10', '2017-09-13 18:51:36');
INSERT INTO `cashflowin` VALUES ('16', '16', '787878', '2017-09-11', null, '', '100000', '10', '4', '798789', '2017-09-11', '36', 'Regular Loan  Repayment ', '10', '2017-09-13 18:56:38');
INSERT INTO `cashflowin` VALUES ('17', '17', '787878', '2017-09-11', null, '', '100000', '10', '4', '798789', '2017-09-11', '36', 'Regular Loan  Repayment ', '10', '2017-09-13 18:58:16');
INSERT INTO `cashflowin` VALUES ('18', '18', '787878', '2017-09-11', null, '', '100000', '10', '4', '798789', '2017-09-11', '36', 'Regular Loan  Repayment ', '10', '2017-09-13 19:03:26');
INSERT INTO `cashflowin` VALUES ('19', '19', '787878', '2017-09-11', null, '', '100000', '10', '4', '798789', '2017-09-11', '36', 'Regular Loan  Repayment ', '10', '2017-09-13 19:10:44');
INSERT INTO `cashflowin` VALUES ('20', '20', '787878', '2017-09-11', null, '', '100000', '10', '4', '798789', '2017-09-11', '36', 'Regular Loan  Repayment ', '10', '2017-09-13 19:12:36');
INSERT INTO `cashflowin` VALUES ('21', '21', '787878', '2017-09-11', null, '', '100000', '10', '4', '798789', '2017-09-11', '36', 'Regular Loan  Repayment ', '10', '2017-09-13 19:17:28');
INSERT INTO `cashflowin` VALUES ('22', '22', '787878', '2017-09-11', 'Christmas', '', '1000', '0', '4', '798789', '2017-09-11', '36', '  Christmas ', '10', '2017-09-14 14:57:42');
INSERT INTO `cashflowin` VALUES ('23', '22', '787878', '2017-09-11', 'Christmas', '', '1000', '0', '4', '798789', '2017-09-11', '36', ' Christmas ', '10', '2017-09-14 14:57:42');
INSERT INTO `cashflowin` VALUES ('24', '23', '787878', '2017-09-07', 'Akand Joshua', '', '100000', '0', '4', '798789', '2017-09-11', '36', '  Christmass ', '10', '2017-09-14 20:36:47');

-- ----------------------------
-- Table structure for cashflowout
-- ----------------------------
DROP TABLE IF EXISTS `cashflowout`;
CREATE TABLE `cashflowout` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
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
  `udate` datetime NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=25 DEFAULT CHARSET=latin1;

-- ----------------------------
-- Records of cashflowout
-- ----------------------------
INSERT INTO `cashflowout` VALUES ('1', '1', '787878', '2017-09-15', '', '0', '0', '  Application Fee', '0', '2', '798789', '2017-09-15', '36', '0', '0', 'hk', '10', '2017-09-15 18:37:34');
INSERT INTO `cashflowout` VALUES ('2', '2', '787878', '2017-09-15', '', '', '0', '  Application Fee', '0', '2', '798789', '2017-09-15', '36', '0', '0', 'hk', '10', '2017-09-15 18:38:35');
INSERT INTO `cashflowout` VALUES ('3', '3', '787878', '2017-09-15', '', 'colma17001', '0', '  Application Fee', '0', '2', '798789', '2017-09-15', '36', '0', '0', 'hk', '10', '2017-09-15 18:39:57');
INSERT INTO `cashflowout` VALUES ('4', '4', '787878', '2017-09-15', '', 'colma17001', '200000', '  Application Fee', '0', '2', '798789', '2017-09-15', '19', '0', '5', '', '10', '2017-09-15 19:45:40');
INSERT INTO `cashflowout` VALUES ('5', '5', '787878', '2017-09-15', '', 'colma17001', '200000', '  Application Fee', '0', '2', '798789', '2017-09-15', '19', '0', '5', '', '10', '2017-09-15 19:47:32');
INSERT INTO `cashflowout` VALUES ('6', '6', '787878', '2017-09-15', '', 'colma17001', '200000', '  Application Fee', '0', '2', '798789', '2017-09-15', '19', '0', '5', '', '10', '2017-09-15 19:53:53');
INSERT INTO `cashflowout` VALUES ('7', '7', '787878', '2017-09-15', '', 'colma17001', '200000', '  Application Fee', '0', '2', '798789', '2017-09-15', '19', '0', '5', ' hhj', '10', '2017-09-15 19:54:43');
INSERT INTO `cashflowout` VALUES ('8', '8', '787878', '2017-09-16', '', 'colma17001', '0', '  Application Fee', '0', '5', '798789', '2017-09-16', '22', '0', '0', 'hghg', '10', '2017-09-16 05:17:50');
INSERT INTO `cashflowout` VALUES ('9', '9', '787878', '2017-09-16', '', 'colma17001', '0', '  Application Fee', '0', '5', '798789', '2017-09-16', '22', '0', '0', 'hghg', '10', '2017-09-16 05:20:04');
INSERT INTO `cashflowout` VALUES ('10', '10', '787878', '2017-09-16', '', 'colma17001', '0', '  Application Fee', '0', '5', '798789', '2017-09-16', '22', '0', '0', 'hghg', '10', '2017-09-16 05:24:54');
INSERT INTO `cashflowout` VALUES ('11', '11', '787878', '2017-09-16', '', 'colma17001', '0', '  Application Fee', '0', '5', '798789', '2017-09-16', '22', '0', '0', 'hghg', '10', '2017-09-16 05:24:58');
INSERT INTO `cashflowout` VALUES ('12', '12', '787878', '2017-09-16', '', 'colma17001', '0', '  Application Fee', '0', '5', '798789', '2017-09-16', '22', '0', '0', 'hghg', '10', '2017-09-16 05:31:57');
INSERT INTO `cashflowout` VALUES ('13', '13', '787878', '2017-09-16', '', 'colma17001', '0', '  Application Fee', '0', '5', '798789', '2017-09-16', '22', '0', '0', 'hghg', '10', '2017-09-16 05:32:04');
INSERT INTO `cashflowout` VALUES ('14', '14', '787878', '2017-09-16', '', 'colma17001', '0', '  Application Fee', '0', '5', '798789', '2017-09-16', '22', '0', '0', 'hghg', '10', '2017-09-16 05:34:42');
INSERT INTO `cashflowout` VALUES ('15', '15', '787878', '2017-09-16', '', 'colma17001', '0', '  Application Fee', '0', '5', '798789', '2017-09-16', '22', '0', '0', 'hghg', '10', '2017-09-16 05:34:45');
INSERT INTO `cashflowout` VALUES ('16', '16', '787878', '2017-09-16', '', 'colma17001', '0', '  Application Fee', '0', '5', '798789', '2017-09-16', '22', '0', '0', 'hghg', '10', '2017-09-16 05:35:20');
INSERT INTO `cashflowout` VALUES ('17', '17', '787878', '2017-09-16', '', 'colma17001', '0', '  Application Fee', '0', '5', '798789', '2017-09-16', '22', '0', '0', 'hghg', '10', '2017-09-16 05:35:39');
INSERT INTO `cashflowout` VALUES ('18', '18', '787878', '2017-09-16', '', 'colma17001', '0', '  Application Fee', '0', '5', '798789', '2017-09-16', '22', '0', '0', 'hghg', '10', '2017-09-16 05:36:16');
INSERT INTO `cashflowout` VALUES ('19', '19', '787878', '2017-09-16', '', 'colma17001', '0', '  Application Fee', '0', '2', '798789', '2017-09-16', '22', '0', '0', 'bm', '10', '2017-09-16 05:49:53');
INSERT INTO `cashflowout` VALUES ('20', '20', '787878', '2017-09-16', '', 'colma17001', '0', '  Application Fee', '0', '2', '798789', '2017-09-16', '20', '0', '0', 'njhkjhkj', '10', '2017-09-16 05:50:45');
INSERT INTO `cashflowout` VALUES ('21', '21', '787878', '2017-09-16', '', 'colma17001', '0', '  Application Fee', '0', '1', '798789', '2017-09-16', '20', '0', '0', 'njhkjhkj', '10', '2017-09-16 05:53:18');
INSERT INTO `cashflowout` VALUES ('22', '22', '787878', '2017-09-16', '', 'colma17001', '0', '  Application Fee', '0', '2', '798789', '2017-09-16', '20', '0', '0', 'njhkjhkj', '10', '2017-09-16 06:20:08');
INSERT INTO `cashflowout` VALUES ('23', '23', '787878', '2017-09-12', 'Akande Joshua Ayomikun', '', '200000', 'imprest', '0', '2', '798789', '2017-09-20', '22', '0', '0', 'the', '10', '2017-09-20 21:38:55');
INSERT INTO `cashflowout` VALUES ('24', '24', '787878', '2017-09-12', 'Akande Joshua Ayomikun', '', '200000', 'imprest', '0', '4', '798789', '2017-09-20', '22', '0', '0', 'the', '10', '2017-09-20 21:40:16');

-- ----------------------------
-- Table structure for countries
-- ----------------------------
DROP TABLE IF EXISTS `countries`;
CREATE TABLE `countries` (
  `countryid` smallint(6) NOT NULL AUTO_INCREMENT,
  `country` varchar(150) NOT NULL,
  `countrycode` char(10) NOT NULL,
  `phoneCode` char(19) NOT NULL,
  `nationality` varchar(150) NOT NULL,
  `currency` varchar(45) NOT NULL,
  PRIMARY KEY (`countryid`),
  UNIQUE KEY `countrycode` (`countrycode`),
  KEY `country` (`country`)
) ENGINE=MyISAM AUTO_INCREMENT=253 DEFAULT CHARSET=utf8 COMMENT='InnoDB free: 121856 kB; InnoDB free: 121856 kB; InnoDB free:';

-- ----------------------------
-- Records of countries
-- ----------------------------
INSERT INTO `countries` VALUES ('1', 'Andorra, Principality Of', 'AD', '376', '', '');
INSERT INTO `countries` VALUES ('2', 'United Arab Emirates', 'AE', '971', '', '');
INSERT INTO `countries` VALUES ('3', 'Afghanistan, Islamic State Of', 'AF', '93', '', '');
INSERT INTO `countries` VALUES ('4', 'Antigua And Barbuda', 'AG', '1-268', '', '');
INSERT INTO `countries` VALUES ('5', 'Anguilla', 'AI', '1-264', '', '');
INSERT INTO `countries` VALUES ('6', 'Albania', 'AL', '355', '', '');
INSERT INTO `countries` VALUES ('7', 'Armenia', 'AM', '374', '', '');
INSERT INTO `countries` VALUES ('8', 'Netherlands Antilles', 'AN', '599', '', '');
INSERT INTO `countries` VALUES ('9', 'Angola', 'AO', '244', '', '');
INSERT INTO `countries` VALUES ('10', 'Antarctica', 'AQ', '672', '', '');
INSERT INTO `countries` VALUES ('11', 'Argentina', 'AR', '54', '', '');
INSERT INTO `countries` VALUES ('12', 'American Samoa', 'AS', '1-684', '', '');
INSERT INTO `countries` VALUES ('13', 'Austria', 'AT', '43', '', '');
INSERT INTO `countries` VALUES ('14', 'Australia', 'AU', '61', '', '');
INSERT INTO `countries` VALUES ('15', 'Aruba', 'AW', '297', '', '');
INSERT INTO `countries` VALUES ('16', 'Azerbaidjan', 'AZ', '994', '', '');
INSERT INTO `countries` VALUES ('17', 'Bosnia-Herzegovina', 'BA', '387', '', '');
INSERT INTO `countries` VALUES ('18', 'Barbados', 'BB', '1-246', '', '');
INSERT INTO `countries` VALUES ('19', 'Bangladesh', 'BD', '880', '', '');
INSERT INTO `countries` VALUES ('20', 'Belgium', 'BE', '32', '', '');
INSERT INTO `countries` VALUES ('21', 'Burkina Faso', 'BF', '226', '', '');
INSERT INTO `countries` VALUES ('22', 'Bulgaria', 'BG', '359', '', '');
INSERT INTO `countries` VALUES ('23', 'Bahrain', 'BH', '973', '', '');
INSERT INTO `countries` VALUES ('24', 'Burundi', 'BI', '257', '', '');
INSERT INTO `countries` VALUES ('25', 'Benin', 'BJ', '229', '', '');
INSERT INTO `countries` VALUES ('26', 'Bermuda', 'BM', '1-441', '', '');
INSERT INTO `countries` VALUES ('27', 'Brunei Darussalam', 'BN', '673', '', '');
INSERT INTO `countries` VALUES ('28', 'Bolivia', 'BO', '591', '', '');
INSERT INTO `countries` VALUES ('29', 'Brazil', 'BR', '55', '', '');
INSERT INTO `countries` VALUES ('30', 'Bahamas', 'BS', '1-242', '', '');
INSERT INTO `countries` VALUES ('31', 'Bhutan', 'BT', '975', '', '');
INSERT INTO `countries` VALUES ('32', 'Bouvet Island', 'BV', '55', '', '');
INSERT INTO `countries` VALUES ('33', 'Botswana', 'BW', '267', '', '');
INSERT INTO `countries` VALUES ('34', 'Belarus', 'BY', '375', '', '');
INSERT INTO `countries` VALUES ('35', 'Belize', 'BZ', '501', '', '');
INSERT INTO `countries` VALUES ('36', 'Canada', 'CA', '1', '', '');
INSERT INTO `countries` VALUES ('37', 'Cocos (Keeling) Islands', 'CC', '61', '', '');
INSERT INTO `countries` VALUES ('38', 'Central African Republic', 'CF', '236', '', '');
INSERT INTO `countries` VALUES ('39', 'Congo, The Democratic Republic', 'CD', '243', '', '');
INSERT INTO `countries` VALUES ('40', 'Congo', 'CG', '242', '', '');
INSERT INTO `countries` VALUES ('41', 'Switzerland', 'CH', '41', '', '');
INSERT INTO `countries` VALUES ('42', 'Ivory Coast (Cote D\'Ivoire)', 'CI', '225', '', '');
INSERT INTO `countries` VALUES ('43', 'Cook Islands', 'CK', '682', '', '');
INSERT INTO `countries` VALUES ('44', 'Chile', 'CL', '56', '', '');
INSERT INTO `countries` VALUES ('45', 'Cameroon', 'CM', '237', '', '');
INSERT INTO `countries` VALUES ('46', 'China', 'CN', '86', '', '');
INSERT INTO `countries` VALUES ('47', 'Colombia', 'CO', '57', '', '');
INSERT INTO `countries` VALUES ('48', 'Costa Rica', 'CR', '506', '', '');
INSERT INTO `countries` VALUES ('49', 'Former Czechoslovakia', 'CS', '420', '', '');
INSERT INTO `countries` VALUES ('50', 'Cuba', 'CU', '53', '', '');
INSERT INTO `countries` VALUES ('51', 'Cape Verde', 'CV', '238', '', '');
INSERT INTO `countries` VALUES ('52', 'Christmas Island', 'CX', '53', '', '');
INSERT INTO `countries` VALUES ('53', 'Cyprus', 'CY', '357', '', '');
INSERT INTO `countries` VALUES ('54', 'Czech Republic', 'CZ', '420', '', '');
INSERT INTO `countries` VALUES ('55', 'Germany', 'DE', '49', '', '');
INSERT INTO `countries` VALUES ('56', 'Djibouti', 'DJ', '253', '', '');
INSERT INTO `countries` VALUES ('57', 'Denmark', 'DK', '45', '', '');
INSERT INTO `countries` VALUES ('58', 'Dominica', 'DM', '1-767', '', '');
INSERT INTO `countries` VALUES ('59', 'Dominican Republic', 'DO', '1-809', '', '');
INSERT INTO `countries` VALUES ('60', 'Algeria', 'DZ', '213', '', '');
INSERT INTO `countries` VALUES ('61', 'Ecuador', 'EC', '593', '', '');
INSERT INTO `countries` VALUES ('62', 'Estonia', 'EE', '372', '', '');
INSERT INTO `countries` VALUES ('63', 'Egypt', 'EG', '20', '', '');
INSERT INTO `countries` VALUES ('64', 'Western Sahara', 'EH', '212', '', '');
INSERT INTO `countries` VALUES ('65', 'Eritrea', 'ER', '291', '', '');
INSERT INTO `countries` VALUES ('66', 'Spain', 'ES', '34', '', '');
INSERT INTO `countries` VALUES ('67', 'Ethiopia', 'ET', '251', '', '');
INSERT INTO `countries` VALUES ('68', 'Finland', 'FI', '358', '', '');
INSERT INTO `countries` VALUES ('69', 'Fiji', 'FJ', '679', '', '');
INSERT INTO `countries` VALUES ('70', 'Falkland Islands', 'FK', '500', '', '');
INSERT INTO `countries` VALUES ('71', 'Micronesia', 'FM', '691', '', '');
INSERT INTO `countries` VALUES ('72', 'Faroe Islands', 'FO', '298', '', '');
INSERT INTO `countries` VALUES ('73', 'France', 'FR', '33', '', '');
INSERT INTO `countries` VALUES ('74', 'France (European Territory)', 'FX', '', '', '');
INSERT INTO `countries` VALUES ('75', 'Gabon', 'GA', '241', '', '');
INSERT INTO `countries` VALUES ('76', 'Great Britain', 'GB', '44', '', '');
INSERT INTO `countries` VALUES ('77', 'Grenada', 'GD', '1-473', '', '');
INSERT INTO `countries` VALUES ('78', 'Georgia', 'GE', '995', '', '');
INSERT INTO `countries` VALUES ('79', 'French Guyana', 'GF', '594', '', '');
INSERT INTO `countries` VALUES ('80', 'Ghana', 'GH', '233', '', '');
INSERT INTO `countries` VALUES ('81', 'Gibraltar', 'GI', '350', '', '');
INSERT INTO `countries` VALUES ('82', 'Greenland', 'GL', '299', '', '');
INSERT INTO `countries` VALUES ('83', 'Gambia', 'GM', '220', '', '');
INSERT INTO `countries` VALUES ('84', 'Guinea', 'GN', '224', '', '');
INSERT INTO `countries` VALUES ('85', 'USA Government', 'GOV', '', '', '');
INSERT INTO `countries` VALUES ('86', 'Guadeloupe (French)', 'GP', '590', '', '');
INSERT INTO `countries` VALUES ('87', 'Equatorial Guinea', 'GQ', '240', '', '');
INSERT INTO `countries` VALUES ('88', 'Greece', 'GR', '30', '', '');
INSERT INTO `countries` VALUES ('89', 'S. Georgia & S. Sandwich Isls.', 'GS', '500', '', '');
INSERT INTO `countries` VALUES ('90', 'Guatemala', 'GT', '502', '', '');
INSERT INTO `countries` VALUES ('91', 'Guam (USA)', 'GU', '1-671', '', '');
INSERT INTO `countries` VALUES ('92', 'Guinea Bissau', 'GW', '245', '', '');
INSERT INTO `countries` VALUES ('93', 'Guyana', 'GY', '592', '', '');
INSERT INTO `countries` VALUES ('94', 'Hong Kong', 'HK', '852', '', '');
INSERT INTO `countries` VALUES ('95', 'Heard And Mcdonald Islands', 'HM', '', '', '');
INSERT INTO `countries` VALUES ('96', 'Honduras', 'HN', '504', '', '');
INSERT INTO `countries` VALUES ('97', 'Croatia', 'HR', '385', '', '');
INSERT INTO `countries` VALUES ('98', 'Haiti', 'HT', '509', '', '');
INSERT INTO `countries` VALUES ('99', 'Hungary', 'HU', '36', '', '');
INSERT INTO `countries` VALUES ('100', 'Indonesia', 'ID', '62', '', '');
INSERT INTO `countries` VALUES ('101', 'Ireland', 'IE', '353', '', '');
INSERT INTO `countries` VALUES ('102', 'Israel', 'IL', '972', '', '');
INSERT INTO `countries` VALUES ('103', 'India', 'IN', '91', '', '');
INSERT INTO `countries` VALUES ('104', 'British Indian Ocean Territory', 'IO', '246', '', '');
INSERT INTO `countries` VALUES ('105', 'Iraq', 'IQ', '964', '', '');
INSERT INTO `countries` VALUES ('106', 'Iran', 'IR', '98', '', '');
INSERT INTO `countries` VALUES ('107', 'Iceland', 'IS', '354', '', '');
INSERT INTO `countries` VALUES ('108', 'Italy', 'IT', '39', '', '');
INSERT INTO `countries` VALUES ('109', 'Jamaica', 'JM', '1-876', '', '');
INSERT INTO `countries` VALUES ('110', 'Jordan', 'JO', '962', '', '');
INSERT INTO `countries` VALUES ('111', 'Japan', 'JP', '81', '', '');
INSERT INTO `countries` VALUES ('112', 'Kenya', 'KE', '254', '', '');
INSERT INTO `countries` VALUES ('113', 'Kyrgyz Republic (Kyrgyzstan)', 'KG', '996', '', '');
INSERT INTO `countries` VALUES ('114', 'Cambodia, Kingdom Of', 'KH', '855', '', '');
INSERT INTO `countries` VALUES ('115', 'Kiribati', 'KI', '686', '', '');
INSERT INTO `countries` VALUES ('116', 'Comoros', 'KM', '269', '', '');
INSERT INTO `countries` VALUES ('117', 'Saint Kitts & Nevis Anguilla', 'KN', '1-869', '', '');
INSERT INTO `countries` VALUES ('118', 'North Korea', 'KP', '850', '', '');
INSERT INTO `countries` VALUES ('119', 'South Korea', 'KR', '82', '', '');
INSERT INTO `countries` VALUES ('120', 'Kuwait', 'KW', '965', '', '');
INSERT INTO `countries` VALUES ('121', 'Cayman Islands', 'KY', '1-345', '', '');
INSERT INTO `countries` VALUES ('122', 'Kazakhstan', 'KZ', '7', '', '');
INSERT INTO `countries` VALUES ('123', 'Laos', 'LA', '856', '', '');
INSERT INTO `countries` VALUES ('124', 'Lebanon', 'LB', '961', '', '');
INSERT INTO `countries` VALUES ('125', 'Saint Lucia', 'LC', '1-758', '', '');
INSERT INTO `countries` VALUES ('126', 'Liechtenstein', 'LI', '423', '', '');
INSERT INTO `countries` VALUES ('127', 'Sri Lanka', 'LK', '94', '', '');
INSERT INTO `countries` VALUES ('128', 'Liberia', 'LR', '231', '', '');
INSERT INTO `countries` VALUES ('129', 'Lesotho', 'LS', '266', '', '');
INSERT INTO `countries` VALUES ('130', 'Lithuania', 'LT', '370', '', '');
INSERT INTO `countries` VALUES ('131', 'Luxembourg', 'LU', '352', '', '');
INSERT INTO `countries` VALUES ('132', 'Latvia', 'LV', '371', '', '');
INSERT INTO `countries` VALUES ('133', 'Libya', 'LY', '218', '', '');
INSERT INTO `countries` VALUES ('134', 'Morocco', 'MA', '212', '', '');
INSERT INTO `countries` VALUES ('135', 'Monaco', 'MC', '377', '', '');
INSERT INTO `countries` VALUES ('136', 'Moldavia', 'MD', '373', '', '');
INSERT INTO `countries` VALUES ('137', 'Madagascar', 'MG', '261', '', '');
INSERT INTO `countries` VALUES ('138', 'Marshall Islands', 'MH', '692', '', '');
INSERT INTO `countries` VALUES ('139', 'Macedonia', 'MK', '389', '', '');
INSERT INTO `countries` VALUES ('140', 'Mali', 'ML', '223', '', '');
INSERT INTO `countries` VALUES ('141', 'Myanmar', 'MM', '95', '', '');
INSERT INTO `countries` VALUES ('142', 'Mongolia', 'MN', '976', '', '');
INSERT INTO `countries` VALUES ('143', 'Macau', 'MO', '853', '', '');
INSERT INTO `countries` VALUES ('144', 'Northern Mariana Islands', 'MP', '1-670', '', '');
INSERT INTO `countries` VALUES ('145', 'Martinique (French)', 'MQ', '596', '', '');
INSERT INTO `countries` VALUES ('146', 'Mauritania', 'MR', '222', '', '');
INSERT INTO `countries` VALUES ('147', 'Montserrat', 'MS', '1-664', '', '');
INSERT INTO `countries` VALUES ('148', 'Malta', 'MT', '356', '', '');
INSERT INTO `countries` VALUES ('149', 'Mauritius', 'MU', '230', '', '');
INSERT INTO `countries` VALUES ('150', 'Maldives', 'MV', '960', '', '');
INSERT INTO `countries` VALUES ('151', 'Malawi', 'MW', '265', '', '');
INSERT INTO `countries` VALUES ('152', 'Mexico', 'MX', '52', '', '');
INSERT INTO `countries` VALUES ('153', 'Malaysia', 'MY', '60', '', '');
INSERT INTO `countries` VALUES ('154', 'Mozambique', 'MZ', '258', '', '');
INSERT INTO `countries` VALUES ('155', 'Namibia', 'NA', '264', '', '');
INSERT INTO `countries` VALUES ('156', 'New Caledonia (French)', 'NC', '687', '', '');
INSERT INTO `countries` VALUES ('157', 'Niger', 'NE', '227', '', '');
INSERT INTO `countries` VALUES ('158', 'Norfolk Island', 'NF', '672', '', '');
INSERT INTO `countries` VALUES ('159', 'Nigeria', 'NG', '234', 'Nigerian', '');
INSERT INTO `countries` VALUES ('160', 'Nicaragua', 'NI', '505', '', '');
INSERT INTO `countries` VALUES ('161', 'Netherlands', 'NL', '31', '', '');
INSERT INTO `countries` VALUES ('162', 'Norway', 'NO', '47', '', '');
INSERT INTO `countries` VALUES ('163', 'Nepal', 'NP', '977', '', '');
INSERT INTO `countries` VALUES ('164', 'Nauru', 'NR', '674', '', '');
INSERT INTO `countries` VALUES ('165', 'Niue', 'NU', '683', '', '');
INSERT INTO `countries` VALUES ('166', 'New Zealand', 'NZ', '64', '', '');
INSERT INTO `countries` VALUES ('167', 'Oman', 'OM', '968', '', '');
INSERT INTO `countries` VALUES ('168', 'Panama', 'PA', '507', '', '');
INSERT INTO `countries` VALUES ('169', 'Peru', 'PE', '51', '', '');
INSERT INTO `countries` VALUES ('170', 'Polynesia (French)', 'PF', '689', '', '');
INSERT INTO `countries` VALUES ('171', 'Papua New Guinea', 'PG', '675', '', '');
INSERT INTO `countries` VALUES ('172', 'Philippines', 'PH', '63', '', '');
INSERT INTO `countries` VALUES ('173', 'Pakistan', 'PK', '92', '', '');
INSERT INTO `countries` VALUES ('174', 'Poland', 'PL', '48', '', '');
INSERT INTO `countries` VALUES ('175', 'Saint Pierre And Miquelon', 'PM', '508', '', '');
INSERT INTO `countries` VALUES ('176', 'Pitcairn Island', 'PN', '64', '', '');
INSERT INTO `countries` VALUES ('177', 'Puerto Rico', 'PR', '1-787', '', '');
INSERT INTO `countries` VALUES ('178', 'Portugal', 'PT', '351', '', '');
INSERT INTO `countries` VALUES ('179', 'Palau', 'PW', '680', '', '');
INSERT INTO `countries` VALUES ('180', 'Paraguay', 'PY', '595', '', '');
INSERT INTO `countries` VALUES ('181', 'Qatar', 'QA', '974', '', '');
INSERT INTO `countries` VALUES ('182', 'Reunion (Ffrench)', 'RE', '262', '', '');
INSERT INTO `countries` VALUES ('183', 'Romania', 'RO', '40', '', '');
INSERT INTO `countries` VALUES ('184', 'Russian Federation', 'RU', '7', '', '');
INSERT INTO `countries` VALUES ('185', 'Rwanda', 'RW', '250', '', '');
INSERT INTO `countries` VALUES ('186', 'Saudi Arabia', 'SA', '966', '', '');
INSERT INTO `countries` VALUES ('187', 'Solomon Islands', 'SB', '677', '', '');
INSERT INTO `countries` VALUES ('188', 'Seychelles', 'SC', '248', '', '');
INSERT INTO `countries` VALUES ('189', 'Sudan', 'SD', '249', '', '');
INSERT INTO `countries` VALUES ('190', 'Sweden', 'SE', '46', '', '');
INSERT INTO `countries` VALUES ('191', 'Singapore', 'SG', '65', '', '');
INSERT INTO `countries` VALUES ('192', 'Saint Helena', 'SH', '290', '', '');
INSERT INTO `countries` VALUES ('193', 'Slovenia', 'SI', '386', '', '');
INSERT INTO `countries` VALUES ('194', 'Svalbard And Jan Mayen Islands', 'SJ', '47', '', '');
INSERT INTO `countries` VALUES ('195', 'Slovak Republic', 'SK', '421', '', '');
INSERT INTO `countries` VALUES ('196', 'Sierra Leone', 'SL', '232', '', '');
INSERT INTO `countries` VALUES ('197', 'San Marino', 'SM', '378', '', '');
INSERT INTO `countries` VALUES ('198', 'Senegal', 'SN', '221', '', '');
INSERT INTO `countries` VALUES ('199', 'Somalia', 'SO', '252', '', '');
INSERT INTO `countries` VALUES ('200', 'Suriname', 'SR', '597', '', '');
INSERT INTO `countries` VALUES ('201', 'Saint Tome (Sao Tome) And Principe', 'ST', '239', '', '');
INSERT INTO `countries` VALUES ('202', 'Former USSR', 'SU', '', '', '');
INSERT INTO `countries` VALUES ('203', 'El Salvador', 'SV', '503', '', '');
INSERT INTO `countries` VALUES ('204', 'Syria', 'SY', '963', '', '');
INSERT INTO `countries` VALUES ('205', 'Swaziland', 'SZ', '268', '', '');
INSERT INTO `countries` VALUES ('206', 'Turks And Caicos Islands', 'TC', '1-649', '', '');
INSERT INTO `countries` VALUES ('207', 'Chad', 'TD', '235', '', '');
INSERT INTO `countries` VALUES ('208', 'French Southern Territories', 'TF', '', '', '');
INSERT INTO `countries` VALUES ('209', 'Togo', 'TG', '228', '', '');
INSERT INTO `countries` VALUES ('210', 'Thailand', 'TH', '66', '', '');
INSERT INTO `countries` VALUES ('211', 'Tadjikistan', 'TJ', '992', '', '');
INSERT INTO `countries` VALUES ('212', 'Tokelau', 'TK', '690', '', '');
INSERT INTO `countries` VALUES ('213', 'Turkmenistan', 'TM', '993', '', '');
INSERT INTO `countries` VALUES ('214', 'Tunisia', 'TN', '216', '', '');
INSERT INTO `countries` VALUES ('215', 'Tonga', 'TO', '676', '', '');
INSERT INTO `countries` VALUES ('216', 'East Timor', 'TP', '670', '', '');
INSERT INTO `countries` VALUES ('217', 'Turkey', 'TR', '90', '', '');
INSERT INTO `countries` VALUES ('218', 'Trinidad And Tobago', 'TT', '1-868', '', '');
INSERT INTO `countries` VALUES ('219', 'Tuvalu', 'TV', '688', '', '');
INSERT INTO `countries` VALUES ('220', 'Taiwan', 'TW', '886', '', '');
INSERT INTO `countries` VALUES ('221', 'Tanzania', 'TZ', '255', '', '');
INSERT INTO `countries` VALUES ('222', 'Ukraine', 'UA', '380', '', '');
INSERT INTO `countries` VALUES ('223', 'Uganda', 'UG', '256', '', '');
INSERT INTO `countries` VALUES ('224', 'United Kingdom', 'UK', '44', '', '');
INSERT INTO `countries` VALUES ('225', 'Usa Minor Outlying Islands', 'UM', '1', '', '');
INSERT INTO `countries` VALUES ('226', 'United States', 'US', '1', '', '');
INSERT INTO `countries` VALUES ('227', 'Uruguay', 'UY', '598', '', '');
INSERT INTO `countries` VALUES ('228', 'Uzbekistan', 'UZ', '998', '', '');
INSERT INTO `countries` VALUES ('229', 'Holy See (Vatican City State)', 'VA', '379', '', '');
INSERT INTO `countries` VALUES ('230', 'Saint Vincent & Grenadines', 'VC', '1-784', '', '');
INSERT INTO `countries` VALUES ('231', 'Venezuela', 'VE', '58', '', '');
INSERT INTO `countries` VALUES ('232', 'Virgin Islands (British)', 'VG', '1-284', '', '');
INSERT INTO `countries` VALUES ('233', 'Virgin Islands (USA)', 'VI', '1-340', '', '');
INSERT INTO `countries` VALUES ('234', 'Vietnam', 'VN', '84', '', '');
INSERT INTO `countries` VALUES ('235', 'Vanuatu', 'VU', '678', '', '');
INSERT INTO `countries` VALUES ('236', 'Wallis And Futuna Islands', 'WF', '681', '', '');
INSERT INTO `countries` VALUES ('237', 'Samoa', 'WS', '685', '', '');
INSERT INTO `countries` VALUES ('238', 'Yemen', 'YE', '967', '', '');
INSERT INTO `countries` VALUES ('239', 'Mayotte', 'YT', '262', '', '');
INSERT INTO `countries` VALUES ('240', 'Yugoslavia', 'YU', '38', '', '');
INSERT INTO `countries` VALUES ('241', 'South Africa', 'ZA', '27', '', '');
INSERT INTO `countries` VALUES ('242', 'Zambia', 'ZM', '260', '', '');
INSERT INTO `countries` VALUES ('243', 'Zaire', 'ZR', '243', '', '');
INSERT INTO `countries` VALUES ('244', 'Zimbabwe', 'ZW', '263', '', '');
INSERT INTO `countries` VALUES ('252', 'Nagorno-Karabakh', '', '', '', '');

-- ----------------------------
-- Table structure for duties
-- ----------------------------
DROP TABLE IF EXISTS `duties`;
CREATE TABLE `duties` (
  `dutyid` int(11) NOT NULL AUTO_INCREMENT,
  `duty` varchar(255) NOT NULL,
  `dutystatus` int(255) NOT NULL,
  PRIMARY KEY (`dutyid`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=latin1;

-- ----------------------------
-- Records of duties
-- ----------------------------
INSERT INTO `duties` VALUES ('1', 'Liberator 1', '1');
INSERT INTO `duties` VALUES ('2', 'Liberator 2', '1');

-- ----------------------------
-- Table structure for expenseheads
-- ----------------------------
DROP TABLE IF EXISTS `expenseheads`;
CREATE TABLE `expenseheads` (
  `exphead` varchar(255) NOT NULL,
  `expno` int(11) NOT NULL AUTO_INCREMENT,
  PRIMARY KEY (`expno`)
) ENGINE=MyISAM AUTO_INCREMENT=9 DEFAULT CHARSET=latin1;

-- ----------------------------
-- Records of expenseheads
-- ----------------------------
INSERT INTO `expenseheads` VALUES ('Purchases', '1');
INSERT INTO `expenseheads` VALUES ('Stationaries', '2');
INSERT INTO `expenseheads` VALUES ('Dividend', '3');
INSERT INTO `expenseheads` VALUES ('Withdrawal', '4');
INSERT INTO `expenseheads` VALUES ('Salary', '5');
INSERT INTO `expenseheads` VALUES ('Transfer', '6');
INSERT INTO `expenseheads` VALUES ('Refund', '7');
INSERT INTO `expenseheads` VALUES ('System Repair', '8');

-- ----------------------------
-- Table structure for facilities
-- ----------------------------
DROP TABLE IF EXISTS `facilities`;
CREATE TABLE `facilities` (
  `fidno` int(11) NOT NULL AUTO_INCREMENT,
  `facility` varchar(50) NOT NULL,
  `fstatus` int(11) NOT NULL,
  `facilityfee` double NOT NULL,
  PRIMARY KEY (`fidno`)
) ENGINE=InnoDB AUTO_INCREMENT=11 DEFAULT CHARSET=latin1;

-- ----------------------------
-- Records of facilities
-- ----------------------------
INSERT INTO `facilities` VALUES ('1', 'Membership Registration', '1', '1000');
INSERT INTO `facilities` VALUES ('2', 'Savings', '1', '1000');
INSERT INTO `facilities` VALUES ('3', 'Share', '1', '10000');
INSERT INTO `facilities` VALUES ('4', 'Asset Loan', '1', '1000');
INSERT INTO `facilities` VALUES ('5', 'Savings Withdrawal', '1', '1000');
INSERT INTO `facilities` VALUES ('6', 'Commodity Sales', '1', '1000');
INSERT INTO `facilities` VALUES ('7', 'Land Acquisition', '1', '1000');
INSERT INTO `facilities` VALUES ('8', 'Household Equipment Acquisition', '1', '1000');
INSERT INTO `facilities` VALUES ('9', 'Overdraft', '1', '1000');
INSERT INTO `facilities` VALUES ('10', 'Regular Loan', '1', '1000');

-- ----------------------------
-- Table structure for facilityregister
-- ----------------------------
DROP TABLE IF EXISTS `facilityregister`;
CREATE TABLE `facilityregister` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `tno` int(11) NOT NULL,
  `facid` int(11) NOT NULL,
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
  `approvaldate` datetime NOT NULL DEFAULT '0000-00-00 00:00:00' ON UPDATE CURRENT_TIMESTAMP,
  `printstatus` int(11) NOT NULL,
  `chequeissued` int(11) NOT NULL,
  `remarks` varchar(50) NOT NULL,
  `userr` varchar(50) NOT NULL,
  `udate` datetime NOT NULL,
  `cdate` datetime NOT NULL DEFAULT '0000-00-00 00:00:00' ON UPDATE CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`,`tno`)
) ENGINE=MyISAM AUTO_INCREMENT=66 DEFAULT CHARSET=latin1;

-- ----------------------------
-- Records of facilityregister
-- ----------------------------
INSERT INTO `facilityregister` VALUES ('2', '1', '10', 'colma17001', '2017-09-09', '200000', '10', '20000', '22000', 'Just pay', '0', '2820000', 'colma17004', '50000', 'colma17009', '50000', 'colma17002', 'colma17005', '2017-09-19 19:22:12', '0', '0', '', '10', '2017-09-10 07:39:51', '2017-09-19 19:22:12');
INSERT INTO `facilityregister` VALUES ('3', '2', '10', 'colma17004', '2017-09-09', '200000', '10', '20000', '22000', 'Just pay', '0', '220000', 'colma17001', '50000', 'colma17002', '50000', 'colma17005', 'colma17005', '2017-09-19 19:22:36', '0', '0', '', '10', '2017-09-10 07:51:14', '2017-09-19 19:22:36');
INSERT INTO `facilityregister` VALUES ('9', '3', '10', 'colma17009', '2017-09-11', '200000', '10', '20000', '22000', 'Just pay', '0', '220000', 'colma17002', '50000', 'colma17001', '50000', 'colma17004', 'colma17005', '2017-09-19 19:23:21', '0', '0', '', '10', '2017-09-11 18:14:18', '2017-09-19 19:23:21');
INSERT INTO `facilityregister` VALUES ('60', '12', '2', 'colma17002', '2017-02-09', '100000', '0', '0', '10000', '', '100000', '0', '', '0', '', '0', '', '', '2017-02-09 00:00:00', '0', '0', '', '10', '2017-09-22 12:34:40', '0000-00-00 00:00:00');
INSERT INTO `facilityregister` VALUES ('61', '13', '2', 'colma17003', '2017-02-09', '100000', '0', '0', '10000', '', '100000', '0', '', '0', '', '0', '', '', '2017-02-09 00:00:00', '0', '0', '', '10', '2017-09-22 12:34:40', '0000-00-00 00:00:00');
INSERT INTO `facilityregister` VALUES ('62', '14', '2', 'colma17004', '2017-02-09', '100000', '0', '0', '10000', '', '100000', '0', '', '0', '', '0', '', '', '2017-02-09 00:00:00', '0', '0', '', '10', '2017-09-22 12:34:40', '0000-00-00 00:00:00');
INSERT INTO `facilityregister` VALUES ('63', '15', '2', 'colma17005', '2017-02-09', '100000', '0', '0', '10000', '', '100000', '0', '', '0', '', '0', '', '', '2017-02-09 00:00:00', '0', '0', '', '10', '2017-09-22 12:34:40', '0000-00-00 00:00:00');
INSERT INTO `facilityregister` VALUES ('64', '16', '2', 'colma17006', '2017-02-09', '100000', '0', '0', '10000', '', '100000', '0', '', '0', '', '0', '', '', '2017-02-09 00:00:00', '0', '0', '', '10', '2017-09-22 12:34:40', '0000-00-00 00:00:00');
INSERT INTO `facilityregister` VALUES ('65', '17', '2', 'colma17007', '2017-02-09', '100000', '0', '0', '10000', '', '100000', '0', '', '0', '', '0', '', '', '2017-02-09 00:00:00', '0', '0', '', '10', '2017-09-22 12:34:40', '0000-00-00 00:00:00');
INSERT INTO `facilityregister` VALUES ('59', '11', '2', 'colma17001', '2017-02-09', '100000', '0', '0', '10000', '', '100000', '0', '', '0', '', '0', '', '', '2017-02-09 00:00:00', '0', '0', '', '10', '2017-09-22 12:34:40', '0000-00-00 00:00:00');
INSERT INTO `facilityregister` VALUES ('58', '10', '2', 'colma17007', '2017-02-09', '100000', '0', '0', '10000', '', '100000', '0', '', '0', '', '0', '', '', '2017-02-09 00:00:00', '0', '0', '', '10', '2017-09-22 07:41:59', '0000-00-00 00:00:00');
INSERT INTO `facilityregister` VALUES ('57', '9', '2', 'colma17006', '2017-02-09', '100000', '0', '0', '10000', '', '100000', '0', '', '0', '', '0', '', '', '2017-02-09 00:00:00', '0', '0', '', '10', '2017-09-22 07:41:59', '0000-00-00 00:00:00');
INSERT INTO `facilityregister` VALUES ('56', '8', '2', 'colma17005', '2017-02-09', '100000', '0', '0', '10000', '', '100000', '0', '', '0', '', '0', '', '', '2017-02-09 00:00:00', '0', '0', '', '10', '2017-09-22 07:41:59', '0000-00-00 00:00:00');
INSERT INTO `facilityregister` VALUES ('55', '7', '2', 'colma17004', '2017-02-09', '100000', '0', '0', '10000', '', '100000', '0', '', '0', '', '0', '', '', '2017-02-09 00:00:00', '0', '0', '', '10', '2017-09-22 07:41:59', '0000-00-00 00:00:00');
INSERT INTO `facilityregister` VALUES ('54', '6', '2', 'colma17003', '2017-02-09', '100000', '0', '0', '10000', '', '100000', '0', '', '0', '', '0', '', '', '2017-02-09 00:00:00', '0', '0', '', '10', '2017-09-22 07:41:59', '0000-00-00 00:00:00');
INSERT INTO `facilityregister` VALUES ('53', '5', '2', 'colma17002', '2017-02-09', '100000', '0', '0', '10000', '', '100000', '0', '', '0', '', '0', '', '', '2017-02-09 00:00:00', '0', '0', '', '10', '2017-09-22 07:41:59', '0000-00-00 00:00:00');
INSERT INTO `facilityregister` VALUES ('52', '4', '2', 'colma17001', '2017-02-09', '100000', '0', '0', '10000', '', '100000', '0', '', '0', '', '0', '', '', '2017-02-09 00:00:00', '0', '0', '', '10', '2017-09-22 07:41:59', '0000-00-00 00:00:00');

-- ----------------------------
-- Table structure for gender
-- ----------------------------
DROP TABLE IF EXISTS `gender`;
CREATE TABLE `gender` (
  `full` varchar(50) NOT NULL,
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `gender` varchar(255) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=3 DEFAULT CHARSET=latin1;

-- ----------------------------
-- Records of gender
-- ----------------------------
INSERT INTO `gender` VALUES ('MALE', '1', 'm');
INSERT INTO `gender` VALUES ('FEMALE', '2', 'f');

-- ----------------------------
-- Table structure for groupnames
-- ----------------------------
DROP TABLE IF EXISTS `groupnames`;
CREATE TABLE `groupnames` (
  `groupid` int(11) NOT NULL,
  `groupname` varchar(255) NOT NULL,
  `groupstatus` varchar(255) NOT NULL,
  PRIMARY KEY (`groupid`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- ----------------------------
-- Records of groupnames
-- ----------------------------
INSERT INTO `groupnames` VALUES ('1', 'jj', '1');

-- ----------------------------
-- Table structure for imprestexpenses
-- ----------------------------
DROP TABLE IF EXISTS `imprestexpenses`;
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

-- ----------------------------
-- Records of imprestexpenses
-- ----------------------------
INSERT INTO `imprestexpenses` VALUES ('1', '2009-02-01 00:00:00', '1', '1000', 'Purchase of Hardcover notebooks', '', '', '0000-00-00 00:00:00');
INSERT INTO `imprestexpenses` VALUES ('2', '2009-02-02 00:00:00', '2', '500', 'Transport to Ikeja', '', '', '0000-00-00 00:00:00');
INSERT INTO `imprestexpenses` VALUES ('3', '2009-07-03 00:00:00', '3', '1500', 'Lunch for the Auditors', '', '', '0000-00-00 00:00:00');
INSERT INTO `imprestexpenses` VALUES ('4', '2009-07-04 00:00:00', '4', '750', 'Purchase of stamps', '', '', '0000-00-00 00:00:00');

-- ----------------------------
-- Table structure for instruments
-- ----------------------------
DROP TABLE IF EXISTS `instruments`;
CREATE TABLE `instruments` (
  `instrumentid` int(11) NOT NULL AUTO_INCREMENT,
  `instrument` varchar(255) NOT NULL,
  `instrimentstatus` int(11) NOT NULL,
  PRIMARY KEY (`instrumentid`)
) ENGINE=MyISAM AUTO_INCREMENT=6 DEFAULT CHARSET=latin1;

-- ----------------------------
-- Records of instruments
-- ----------------------------
INSERT INTO `instruments` VALUES ('1', 'cash', '1');
INSERT INTO `instruments` VALUES ('2', 'cheque', '1');
INSERT INTO `instruments` VALUES ('3', 'draft', '1');
INSERT INTO `instruments` VALUES ('4', 'teller', '1');
INSERT INTO `instruments` VALUES ('5', 'instruction to debit', '1');

-- ----------------------------
-- Table structure for interest
-- ----------------------------
DROP TABLE IF EXISTS `interest`;
CREATE TABLE `interest` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `interestrate` varchar(255) NOT NULL,
  `facilityid` int(11) NOT NULL,
  `datecreated` datetime NOT NULL DEFAULT '0000-00-00 00:00:00' ON UPDATE CURRENT_TIMESTAMP,
  `datechanged` datetime NOT NULL DEFAULT '0000-00-00 00:00:00' ON UPDATE CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=2 DEFAULT CHARSET=latin1;

-- ----------------------------
-- Records of interest
-- ----------------------------
INSERT INTO `interest` VALUES ('1', '10', '10', '2017-09-09 21:36:18', '2017-09-09 21:36:18');

-- ----------------------------
-- Table structure for lga
-- ----------------------------
DROP TABLE IF EXISTS `lga`;
CREATE TABLE `lga` (
  `lga_id` mediumint(10) unsigned NOT NULL DEFAULT '0',
  `state_id` int(11) NOT NULL DEFAULT '0',
  `lga_name` varchar(50) NOT NULL DEFAULT '',
  PRIMARY KEY (`lga_id`),
  KEY `state_id` (`state_id`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

-- ----------------------------
-- Records of lga
-- ----------------------------
INSERT INTO `lga` VALUES ('1', '1', 'Aba North');
INSERT INTO `lga` VALUES ('2', '1', 'Aba South');
INSERT INTO `lga` VALUES ('3', '1', 'Arochukwu');
INSERT INTO `lga` VALUES ('4', '1', 'Bende');
INSERT INTO `lga` VALUES ('5', '1', 'Ikwuano');
INSERT INTO `lga` VALUES ('6', '1', 'Isiala-Ngwa North');
INSERT INTO `lga` VALUES ('7', '1', 'Isiala-Ngwa South');
INSERT INTO `lga` VALUES ('8', '1', 'Isikwuato');
INSERT INTO `lga` VALUES ('9', '1', 'Nneochi');
INSERT INTO `lga` VALUES ('10', '1', 'Obi-Ngwa');
INSERT INTO `lga` VALUES ('11', '1', 'Ohafia');
INSERT INTO `lga` VALUES ('12', '1', 'Osisioma');
INSERT INTO `lga` VALUES ('13', '1', 'Ugwunagbo');
INSERT INTO `lga` VALUES ('14', '1', 'Ukwa East');
INSERT INTO `lga` VALUES ('15', '1', 'Ukwa West');
INSERT INTO `lga` VALUES ('16', '1', 'Umuahia North');
INSERT INTO `lga` VALUES ('17', '1', 'Umuahia South');
INSERT INTO `lga` VALUES ('18', '2', 'Demsa');
INSERT INTO `lga` VALUES ('19', '2', 'Fufore');
INSERT INTO `lga` VALUES ('20', '2', 'Genye');
INSERT INTO `lga` VALUES ('21', '2', 'Girei');
INSERT INTO `lga` VALUES ('22', '2', 'Gombi');
INSERT INTO `lga` VALUES ('23', '2', 'guyuk');
INSERT INTO `lga` VALUES ('24', '2', 'Hong');
INSERT INTO `lga` VALUES ('25', '2', 'Jada');
INSERT INTO `lga` VALUES ('26', '2', 'Jimeta');
INSERT INTO `lga` VALUES ('27', '2', 'Lamurde');
INSERT INTO `lga` VALUES ('28', '2', 'Madagali');
INSERT INTO `lga` VALUES ('29', '2', 'Maiha');
INSERT INTO `lga` VALUES ('30', '2', 'Mayo Belwa');
INSERT INTO `lga` VALUES ('31', '2', 'Michika');
INSERT INTO `lga` VALUES ('32', '2', 'Mubi North');
INSERT INTO `lga` VALUES ('33', '2', 'Mubi South');
INSERT INTO `lga` VALUES ('34', '2', 'Numan');
INSERT INTO `lga` VALUES ('35', '2', 'Shelleng');
INSERT INTO `lga` VALUES ('36', '2', 'Song');
INSERT INTO `lga` VALUES ('37', '2', 'Toungo');
INSERT INTO `lga` VALUES ('38', '2', 'Yola');
INSERT INTO `lga` VALUES ('39', '3', 'Abak');
INSERT INTO `lga` VALUES ('40', '3', 'Eastern-Obolo');
INSERT INTO `lga` VALUES ('41', '3', 'Eket');
INSERT INTO `lga` VALUES ('42', '3', 'Ekpe-Atani');
INSERT INTO `lga` VALUES ('43', '3', 'Essien-Udim');
INSERT INTO `lga` VALUES ('44', '3', 'Esit Ekit');
INSERT INTO `lga` VALUES ('45', '3', 'Etim-Ekpo');
INSERT INTO `lga` VALUES ('46', '3', 'Etinam');
INSERT INTO `lga` VALUES ('47', '3', 'Ibeno');
INSERT INTO `lga` VALUES ('48', '3', 'Ibesikp-Asitan');
INSERT INTO `lga` VALUES ('49', '3', 'Ibiono-Ibom');
INSERT INTO `lga` VALUES ('50', '3', 'Ika');
INSERT INTO `lga` VALUES ('51', '3', 'Ikono');
INSERT INTO `lga` VALUES ('52', '3', 'Ikot-Abasi');
INSERT INTO `lga` VALUES ('53', '3', 'Ikot-Ekpene');
INSERT INTO `lga` VALUES ('54', '3', 'Ini');
INSERT INTO `lga` VALUES ('55', '3', 'Itu');
INSERT INTO `lga` VALUES ('56', '3', 'Mbo');
INSERT INTO `lga` VALUES ('57', '3', 'Mkpae-Enin');
INSERT INTO `lga` VALUES ('58', '3', 'Nsit-Ibom');
INSERT INTO `lga` VALUES ('59', '3', 'Nsit-Ubium');
INSERT INTO `lga` VALUES ('60', '3', 'Obot-Akara');
INSERT INTO `lga` VALUES ('61', '3', 'Okobo');
INSERT INTO `lga` VALUES ('62', '3', 'Onna');
INSERT INTO `lga` VALUES ('63', '3', 'Oron');
INSERT INTO `lga` VALUES ('64', '3', 'Oro-Anam');
INSERT INTO `lga` VALUES ('65', '3', 'Udung-Uko');
INSERT INTO `lga` VALUES ('66', '3', 'Ukanefun');
INSERT INTO `lga` VALUES ('67', '3', 'Uru Offong Oruko');
INSERT INTO `lga` VALUES ('68', '3', 'Uruan');
INSERT INTO `lga` VALUES ('69', '3', 'Uquo Ibene');
INSERT INTO `lga` VALUES ('70', '3', 'Uyo');
INSERT INTO `lga` VALUES ('71', '4', 'Aguata');
INSERT INTO `lga` VALUES ('72', '4', 'Anambra');
INSERT INTO `lga` VALUES ('73', '4', 'Anambra West');
INSERT INTO `lga` VALUES ('74', '4', 'Anocha');
INSERT INTO `lga` VALUES ('75', '4', 'Awka- North');
INSERT INTO `lga` VALUES ('76', '4', 'Awka-South');
INSERT INTO `lga` VALUES ('77', '4', 'Ayamelum');
INSERT INTO `lga` VALUES ('78', '4', 'Dunukofia');
INSERT INTO `lga` VALUES ('79', '4', 'Ekwusigo');
INSERT INTO `lga` VALUES ('80', '4', 'Idemili-North');
INSERT INTO `lga` VALUES ('81', '4', 'Idemili-South');
INSERT INTO `lga` VALUES ('82', '4', 'Ihiala');
INSERT INTO `lga` VALUES ('83', '4', 'Njikoka');
INSERT INTO `lga` VALUES ('84', '4', 'Nnewi-North');
INSERT INTO `lga` VALUES ('85', '4', 'Nnewi-South');
INSERT INTO `lga` VALUES ('86', '4', 'Ogbaru');
INSERT INTO `lga` VALUES ('87', '4', 'Onisha North');
INSERT INTO `lga` VALUES ('88', '4', 'Onitsha South');
INSERT INTO `lga` VALUES ('89', '4', 'Orumba North');
INSERT INTO `lga` VALUES ('90', '4', 'Orumba South');
INSERT INTO `lga` VALUES ('91', '4', 'Oyi');
INSERT INTO `lga` VALUES ('92', '5', 'Alkaleri');
INSERT INTO `lga` VALUES ('93', '5', 'Bauchi');
INSERT INTO `lga` VALUES ('94', '5', 'Bogoro');
INSERT INTO `lga` VALUES ('95', '5', 'Damban');
INSERT INTO `lga` VALUES ('96', '5', 'Darazo');
INSERT INTO `lga` VALUES ('97', '5', 'Dass');
INSERT INTO `lga` VALUES ('98', '5', 'Gamawa');
INSERT INTO `lga` VALUES ('99', '5', 'Ganjuwa');
INSERT INTO `lga` VALUES ('100', '5', 'Giade');
INSERT INTO `lga` VALUES ('101', '5', 'Itas/Gadau');
INSERT INTO `lga` VALUES ('102', '5', 'Jama\'are');
INSERT INTO `lga` VALUES ('103', '5', 'Katagum');
INSERT INTO `lga` VALUES ('104', '5', 'Kirfi');
INSERT INTO `lga` VALUES ('105', '5', 'Misau');
INSERT INTO `lga` VALUES ('106', '5', 'Ningi');
INSERT INTO `lga` VALUES ('107', '5', 'Shira');
INSERT INTO `lga` VALUES ('108', '5', 'Tafawa-Balewa');
INSERT INTO `lga` VALUES ('109', '5', 'Toro');
INSERT INTO `lga` VALUES ('110', '5', 'Warji');
INSERT INTO `lga` VALUES ('111', '5', 'Zaki');
INSERT INTO `lga` VALUES ('112', '6', 'Brass');
INSERT INTO `lga` VALUES ('113', '6', 'Ekerernor');
INSERT INTO `lga` VALUES ('114', '6', 'Kolokuma/Opokuma');
INSERT INTO `lga` VALUES ('115', '6', 'Nembe');
INSERT INTO `lga` VALUES ('116', '6', 'Ogbia');
INSERT INTO `lga` VALUES ('117', '6', 'Sagbama');
INSERT INTO `lga` VALUES ('118', '6', 'Southern-Ijaw');
INSERT INTO `lga` VALUES ('119', '6', 'Yenegoa');
INSERT INTO `lga` VALUES ('120', '6', 'Kembe');
INSERT INTO `lga` VALUES ('121', '7', 'Ado');
INSERT INTO `lga` VALUES ('122', '7', 'Agatu');
INSERT INTO `lga` VALUES ('123', '7', 'Apa');
INSERT INTO `lga` VALUES ('124', '7', 'Buruku');
INSERT INTO `lga` VALUES ('125', '7', 'Gboko');
INSERT INTO `lga` VALUES ('126', '7', 'Guma');
INSERT INTO `lga` VALUES ('127', '7', 'Gwer-East');
INSERT INTO `lga` VALUES ('128', '7', 'Gwer-West');
INSERT INTO `lga` VALUES ('129', '7', 'Katsina-Ala');
INSERT INTO `lga` VALUES ('130', '7', 'Konshisha');
INSERT INTO `lga` VALUES ('131', '7', 'Kwande');
INSERT INTO `lga` VALUES ('132', '7', 'Logo');
INSERT INTO `lga` VALUES ('133', '7', 'Makurdi');
INSERT INTO `lga` VALUES ('134', '7', 'Obi');
INSERT INTO `lga` VALUES ('135', '7', 'Ogbadibo');
INSERT INTO `lga` VALUES ('136', '7', 'Ohimini');
INSERT INTO `lga` VALUES ('137', '7', 'Oju');
INSERT INTO `lga` VALUES ('138', '7', 'Okpokwu');
INSERT INTO `lga` VALUES ('139', '7', 'Otukpo');
INSERT INTO `lga` VALUES ('140', '7', 'Tarkar');
INSERT INTO `lga` VALUES ('141', '7', 'Vandeikya');
INSERT INTO `lga` VALUES ('142', '7', 'Ukum');
INSERT INTO `lga` VALUES ('143', '7', 'Ushongo');
INSERT INTO `lga` VALUES ('144', '8', 'Abadan');
INSERT INTO `lga` VALUES ('145', '8', 'Askira-Uba');
INSERT INTO `lga` VALUES ('146', '8', 'Bama');
INSERT INTO `lga` VALUES ('147', '8', 'Bayo');
INSERT INTO `lga` VALUES ('148', '8', 'Biu');
INSERT INTO `lga` VALUES ('149', '8', 'Chibok');
INSERT INTO `lga` VALUES ('150', '8', 'Damboa');
INSERT INTO `lga` VALUES ('151', '8', 'Dikwa');
INSERT INTO `lga` VALUES ('152', '8', 'Gubio');
INSERT INTO `lga` VALUES ('153', '8', 'Guzamala');
INSERT INTO `lga` VALUES ('154', '8', 'Gwoza');
INSERT INTO `lga` VALUES ('155', '8', 'Hawul');
INSERT INTO `lga` VALUES ('156', '8', 'Jere');
INSERT INTO `lga` VALUES ('157', '8', 'Kaga');
INSERT INTO `lga` VALUES ('158', '8', 'Kala/Balge');
INSERT INTO `lga` VALUES ('159', '8', 'Kukawa');
INSERT INTO `lga` VALUES ('160', '8', 'Konduga');
INSERT INTO `lga` VALUES ('161', '8', 'Kwaya-Kusar');
INSERT INTO `lga` VALUES ('162', '8', 'Mafa');
INSERT INTO `lga` VALUES ('163', '8', 'Magumeri');
INSERT INTO `lga` VALUES ('164', '8', 'Maiduguri');
INSERT INTO `lga` VALUES ('165', '8', 'Marte');
INSERT INTO `lga` VALUES ('166', '8', 'Mobbar');
INSERT INTO `lga` VALUES ('167', '8', 'Monguno');
INSERT INTO `lga` VALUES ('168', '8', 'Ngala');
INSERT INTO `lga` VALUES ('169', '8', 'Nganzai');
INSERT INTO `lga` VALUES ('170', '8', 'Shani');
INSERT INTO `lga` VALUES ('171', '9', 'Abi');
INSERT INTO `lga` VALUES ('172', '9', 'Akamkpa');
INSERT INTO `lga` VALUES ('173', '9', 'Akpabuyo');
INSERT INTO `lga` VALUES ('174', '9', 'Bakassi');
INSERT INTO `lga` VALUES ('175', '9', 'Bekwara');
INSERT INTO `lga` VALUES ('176', '9', 'Biasi');
INSERT INTO `lga` VALUES ('177', '9', 'Boki');
INSERT INTO `lga` VALUES ('178', '9', 'Calabar-Municipal');
INSERT INTO `lga` VALUES ('179', '9', 'Calabar-South');
INSERT INTO `lga` VALUES ('180', '9', 'Etunk');
INSERT INTO `lga` VALUES ('181', '9', 'Ikom');
INSERT INTO `lga` VALUES ('182', '9', 'Obantiku');
INSERT INTO `lga` VALUES ('183', '9', 'Ogoja');
INSERT INTO `lga` VALUES ('184', '9', 'Ugep North');
INSERT INTO `lga` VALUES ('185', '9', 'Yakurr');
INSERT INTO `lga` VALUES ('186', '9', 'Yala');
INSERT INTO `lga` VALUES ('187', '10', 'Aniocha North');
INSERT INTO `lga` VALUES ('188', '10', 'Aniocha South');
INSERT INTO `lga` VALUES ('189', '10', 'Bomadi');
INSERT INTO `lga` VALUES ('190', '10', 'Burutu');
INSERT INTO `lga` VALUES ('191', '10', 'Ethiope East');
INSERT INTO `lga` VALUES ('192', '10', 'Ethiope West');
INSERT INTO `lga` VALUES ('193', '10', 'Ika North East');
INSERT INTO `lga` VALUES ('194', '10', 'Ika South');
INSERT INTO `lga` VALUES ('195', '10', 'Isoko North');
INSERT INTO `lga` VALUES ('196', '10', 'Isoko South');
INSERT INTO `lga` VALUES ('197', '10', 'Ndokwa East');
INSERT INTO `lga` VALUES ('198', '10', 'Ndokwa West');
INSERT INTO `lga` VALUES ('199', '10', 'Okpe');
INSERT INTO `lga` VALUES ('200', '10', 'Oshimili North');
INSERT INTO `lga` VALUES ('201', '10', 'Oshimili South');
INSERT INTO `lga` VALUES ('202', '10', 'Patani');
INSERT INTO `lga` VALUES ('203', '10', 'Sapele');
INSERT INTO `lga` VALUES ('204', '10', 'Udu');
INSERT INTO `lga` VALUES ('205', '10', 'Ughilli North');
INSERT INTO `lga` VALUES ('206', '10', 'Ughilli South');
INSERT INTO `lga` VALUES ('207', '10', 'Ukwuani');
INSERT INTO `lga` VALUES ('208', '10', 'Uvwie');
INSERT INTO `lga` VALUES ('209', '10', 'Warri Central');
INSERT INTO `lga` VALUES ('210', '10', 'Warri North');
INSERT INTO `lga` VALUES ('211', '10', 'Warri South');
INSERT INTO `lga` VALUES ('212', '11', 'Abakaliki');
INSERT INTO `lga` VALUES ('213', '11', 'Ofikpo North');
INSERT INTO `lga` VALUES ('214', '11', 'Ofikpo South');
INSERT INTO `lga` VALUES ('215', '11', 'Ebonyi');
INSERT INTO `lga` VALUES ('216', '11', 'Ezza North');
INSERT INTO `lga` VALUES ('217', '11', 'Ezza South');
INSERT INTO `lga` VALUES ('218', '11', 'ikwo');
INSERT INTO `lga` VALUES ('219', '11', 'Ishielu');
INSERT INTO `lga` VALUES ('220', '11', 'Ivo');
INSERT INTO `lga` VALUES ('221', '11', 'Izzi');
INSERT INTO `lga` VALUES ('222', '11', 'Ohaukwu');
INSERT INTO `lga` VALUES ('223', '11', 'Ohaozara');
INSERT INTO `lga` VALUES ('224', '11', 'Onicha');
INSERT INTO `lga` VALUES ('225', '12', 'Akoko Edo');
INSERT INTO `lga` VALUES ('226', '12', 'Egor');
INSERT INTO `lga` VALUES ('227', '12', 'Esan Central');
INSERT INTO `lga` VALUES ('228', '12', 'Esan North East');
INSERT INTO `lga` VALUES ('229', '12', 'Esan South East');
INSERT INTO `lga` VALUES ('230', '12', 'Esan West');
INSERT INTO `lga` VALUES ('231', '12', 'Etsako-Central');
INSERT INTO `lga` VALUES ('232', '12', 'Etsako-West');
INSERT INTO `lga` VALUES ('233', '12', 'Igueben');
INSERT INTO `lga` VALUES ('234', '12', 'Ikpoba-Okha');
INSERT INTO `lga` VALUES ('235', '12', 'Oredo');
INSERT INTO `lga` VALUES ('236', '12', 'Orhionmwon');
INSERT INTO `lga` VALUES ('237', '12', 'Ovia North East');
INSERT INTO `lga` VALUES ('238', '12', 'Ovia South West');
INSERT INTO `lga` VALUES ('239', '12', 'owan east');
INSERT INTO `lga` VALUES ('240', '12', 'Owan West');
INSERT INTO `lga` VALUES ('241', '12', 'Umunniwonde');
INSERT INTO `lga` VALUES ('242', '13', 'Ado Ekiti');
INSERT INTO `lga` VALUES ('243', '13', 'Aiyedire');
INSERT INTO `lga` VALUES ('244', '13', 'Efon');
INSERT INTO `lga` VALUES ('245', '13', 'Ekiti-East');
INSERT INTO `lga` VALUES ('246', '13', 'Ekiti-South West');
INSERT INTO `lga` VALUES ('247', '13', 'Ekiti West');
INSERT INTO `lga` VALUES ('248', '13', 'Emure');
INSERT INTO `lga` VALUES ('249', '13', 'Ido Osi');
INSERT INTO `lga` VALUES ('250', '13', 'Ijero');
INSERT INTO `lga` VALUES ('251', '13', 'Ikere');
INSERT INTO `lga` VALUES ('252', '13', 'Ikole');
INSERT INTO `lga` VALUES ('253', '13', 'Ilejemeta');
INSERT INTO `lga` VALUES ('254', '13', 'Irepodun/Ifelodun');
INSERT INTO `lga` VALUES ('255', '13', 'Ise Orun');
INSERT INTO `lga` VALUES ('256', '13', 'Moba');
INSERT INTO `lga` VALUES ('257', '13', 'Oye');
INSERT INTO `lga` VALUES ('258', '14', 'Aninri');
INSERT INTO `lga` VALUES ('259', '14', 'Awgu');
INSERT INTO `lga` VALUES ('260', '14', 'Enugu East');
INSERT INTO `lga` VALUES ('261', '14', 'Enugu North');
INSERT INTO `lga` VALUES ('262', '14', 'Enugu South');
INSERT INTO `lga` VALUES ('263', '14', 'Ezeagu');
INSERT INTO `lga` VALUES ('264', '14', 'Igbo Etiti');
INSERT INTO `lga` VALUES ('265', '14', 'Igbo Eze North');
INSERT INTO `lga` VALUES ('266', '14', 'Igbo Eze South');
INSERT INTO `lga` VALUES ('267', '14', 'Isi Uzo');
INSERT INTO `lga` VALUES ('268', '14', 'Nkanu East');
INSERT INTO `lga` VALUES ('269', '14', 'Nkanu West');
INSERT INTO `lga` VALUES ('270', '14', 'Nsukka');
INSERT INTO `lga` VALUES ('271', '14', 'Oji-River');
INSERT INTO `lga` VALUES ('272', '14', 'Udenu');
INSERT INTO `lga` VALUES ('273', '14', 'Udi');
INSERT INTO `lga` VALUES ('274', '14', 'Uzo Uwani');
INSERT INTO `lga` VALUES ('275', '15', 'Akko');
INSERT INTO `lga` VALUES ('276', '15', 'Balanga');
INSERT INTO `lga` VALUES ('277', '15', 'Billiri');
INSERT INTO `lga` VALUES ('278', '15', 'Dukku');
INSERT INTO `lga` VALUES ('279', '15', 'Funakaye');
INSERT INTO `lga` VALUES ('280', '15', 'Gombe');
INSERT INTO `lga` VALUES ('281', '15', 'Kaltungo');
INSERT INTO `lga` VALUES ('282', '15', 'Kwami');
INSERT INTO `lga` VALUES ('283', '15', 'Nafada/Bajoga');
INSERT INTO `lga` VALUES ('284', '15', 'Shomgom');
INSERT INTO `lga` VALUES ('285', '15', 'Yamltu/Deba');
INSERT INTO `lga` VALUES ('286', '16', 'Ahiazu-Mbaise');
INSERT INTO `lga` VALUES ('287', '16', 'Ehime-Mbano');
INSERT INTO `lga` VALUES ('288', '16', 'Ezinihtte');
INSERT INTO `lga` VALUES ('289', '16', 'Ideato North');
INSERT INTO `lga` VALUES ('290', '16', 'Ideato South');
INSERT INTO `lga` VALUES ('291', '16', 'Ihitte/Uboma');
INSERT INTO `lga` VALUES ('292', '16', 'Ikeduru');
INSERT INTO `lga` VALUES ('293', '16', 'Isiala-Mbano');
INSERT INTO `lga` VALUES ('294', '16', 'Isu');
INSERT INTO `lga` VALUES ('295', '16', 'Mbaitoli');
INSERT INTO `lga` VALUES ('296', '16', 'Ngor-Okpala');
INSERT INTO `lga` VALUES ('297', '16', 'Njaba');
INSERT INTO `lga` VALUES ('298', '16', 'Nkwerre');
INSERT INTO `lga` VALUES ('299', '16', 'Nwangele');
INSERT INTO `lga` VALUES ('300', '16', 'obowo');
INSERT INTO `lga` VALUES ('301', '16', 'Oguta');
INSERT INTO `lga` VALUES ('302', '16', 'Ohaji-Eggema');
INSERT INTO `lga` VALUES ('303', '16', 'Okigwe');
INSERT INTO `lga` VALUES ('304', '16', 'Onuimo');
INSERT INTO `lga` VALUES ('305', '16', 'Orlu');
INSERT INTO `lga` VALUES ('306', '16', 'Orsu');
INSERT INTO `lga` VALUES ('307', '16', 'Oru East');
INSERT INTO `lga` VALUES ('308', '16', 'Oru West');
INSERT INTO `lga` VALUES ('309', '16', 'Owerri Municipal');
INSERT INTO `lga` VALUES ('310', '16', 'Owerri North');
INSERT INTO `lga` VALUES ('311', '16', 'Owerri West');
INSERT INTO `lga` VALUES ('312', '17', 'Auyu');
INSERT INTO `lga` VALUES ('313', '17', 'Babura');
INSERT INTO `lga` VALUES ('314', '17', 'Birnin Kudu');
INSERT INTO `lga` VALUES ('315', '17', 'Birniwa');
INSERT INTO `lga` VALUES ('316', '17', 'Bosuwa');
INSERT INTO `lga` VALUES ('317', '17', 'Buji');
INSERT INTO `lga` VALUES ('318', '17', 'Dutse');
INSERT INTO `lga` VALUES ('319', '17', 'Gagarawa');
INSERT INTO `lga` VALUES ('320', '17', 'Garki');
INSERT INTO `lga` VALUES ('321', '17', 'Gumel');
INSERT INTO `lga` VALUES ('322', '17', 'Guri');
INSERT INTO `lga` VALUES ('323', '17', 'Gwaram');
INSERT INTO `lga` VALUES ('324', '17', 'Gwiwa');
INSERT INTO `lga` VALUES ('325', '17', 'Hadejia');
INSERT INTO `lga` VALUES ('326', '17', 'Jahun');
INSERT INTO `lga` VALUES ('327', '17', 'Kafin Hausa');
INSERT INTO `lga` VALUES ('328', '17', 'Kaugama');
INSERT INTO `lga` VALUES ('329', '17', 'Kazaure');
INSERT INTO `lga` VALUES ('330', '17', 'Kirikasanuma');
INSERT INTO `lga` VALUES ('331', '17', 'Kiyawa');
INSERT INTO `lga` VALUES ('332', '17', 'Maigatari');
INSERT INTO `lga` VALUES ('333', '17', 'Malam Maduri');
INSERT INTO `lga` VALUES ('334', '17', 'Miga');
INSERT INTO `lga` VALUES ('335', '17', 'Ringim');
INSERT INTO `lga` VALUES ('336', '17', 'Roni');
INSERT INTO `lga` VALUES ('337', '17', 'Sule Tankarkar');
INSERT INTO `lga` VALUES ('338', '17', 'Taura');
INSERT INTO `lga` VALUES ('339', '17', 'Yankwashi');
INSERT INTO `lga` VALUES ('340', '18', 'Birnin-Gwari');
INSERT INTO `lga` VALUES ('341', '18', 'Chikun');
INSERT INTO `lga` VALUES ('342', '18', 'Giwa');
INSERT INTO `lga` VALUES ('343', '18', 'Gwagwada');
INSERT INTO `lga` VALUES ('344', '18', 'Igabi');
INSERT INTO `lga` VALUES ('345', '18', 'Ikara');
INSERT INTO `lga` VALUES ('346', '18', 'Jaba');
INSERT INTO `lga` VALUES ('347', '18', 'Jema\'a');
INSERT INTO `lga` VALUES ('348', '18', 'Kachia');
INSERT INTO `lga` VALUES ('349', '18', 'Kaduna North');
INSERT INTO `lga` VALUES ('350', '18', 'Kagarko');
INSERT INTO `lga` VALUES ('351', '18', 'Kajuru');
INSERT INTO `lga` VALUES ('352', '18', 'Kaura');
INSERT INTO `lga` VALUES ('353', '18', 'Kauru');
INSERT INTO `lga` VALUES ('354', '18', 'Koka/Kawo');
INSERT INTO `lga` VALUES ('355', '18', 'Kubah');
INSERT INTO `lga` VALUES ('356', '18', 'Kudan');
INSERT INTO `lga` VALUES ('357', '18', 'Lere');
INSERT INTO `lga` VALUES ('358', '18', 'Makarfi');
INSERT INTO `lga` VALUES ('359', '18', 'Sabon Gari');
INSERT INTO `lga` VALUES ('360', '18', 'Sanga');
INSERT INTO `lga` VALUES ('361', '18', 'Sabo');
INSERT INTO `lga` VALUES ('362', '18', 'Tudun-Wada/Makera');
INSERT INTO `lga` VALUES ('363', '18', 'Zango-Kataf');
INSERT INTO `lga` VALUES ('364', '18', 'Zaria');
INSERT INTO `lga` VALUES ('365', '19', 'Ajingi');
INSERT INTO `lga` VALUES ('366', '19', ' Albasu');
INSERT INTO `lga` VALUES ('367', '19', 'Bagwai');
INSERT INTO `lga` VALUES ('368', '19', 'Bebeji');
INSERT INTO `lga` VALUES ('369', '19', 'Bichi');
INSERT INTO `lga` VALUES ('370', '19', 'Bunkure');
INSERT INTO `lga` VALUES ('371', '19', 'Dala');
INSERT INTO `lga` VALUES ('372', '19', 'Dambatta');
INSERT INTO `lga` VALUES ('373', '19', 'Dawakin Kudu');
INSERT INTO `lga` VALUES ('374', '19', 'Dawakin Tofa');
INSERT INTO `lga` VALUES ('375', '19', 'Doguwa');
INSERT INTO `lga` VALUES ('376', '19', 'Fagge');
INSERT INTO `lga` VALUES ('377', '19', 'Gabasawa');
INSERT INTO `lga` VALUES ('378', '19', 'Garko');
INSERT INTO `lga` VALUES ('379', '19', 'Garun-Mallam');
INSERT INTO `lga` VALUES ('380', '19', 'Gaya');
INSERT INTO `lga` VALUES ('381', '19', 'Gezawa');
INSERT INTO `lga` VALUES ('382', '19', 'Gwale');
INSERT INTO `lga` VALUES ('383', '19', 'Gwarzo');
INSERT INTO `lga` VALUES ('384', '19', 'Kabo');
INSERT INTO `lga` VALUES ('385', '19', 'Kano Municipal');
INSERT INTO `lga` VALUES ('386', '19', 'Karaye');
INSERT INTO `lga` VALUES ('387', '19', 'Kibiya');
INSERT INTO `lga` VALUES ('388', '19', 'Kiru');
INSERT INTO `lga` VALUES ('389', '19', 'Kumbotso');
INSERT INTO `lga` VALUES ('390', '19', 'Kunchi');
INSERT INTO `lga` VALUES ('391', '19', 'Kura');
INSERT INTO `lga` VALUES ('392', '19', 'Madobi');
INSERT INTO `lga` VALUES ('393', '19', 'Makoda');
INSERT INTO `lga` VALUES ('394', '19', 'Minjibir');
INSERT INTO `lga` VALUES ('395', '19', 'Nasarawa');
INSERT INTO `lga` VALUES ('396', '19', 'Rano');
INSERT INTO `lga` VALUES ('397', '19', 'Rimin Gado');
INSERT INTO `lga` VALUES ('398', '19', 'Rogo');
INSERT INTO `lga` VALUES ('399', '19', 'Shanono');
INSERT INTO `lga` VALUES ('400', '19', 'Sumaila');
INSERT INTO `lga` VALUES ('401', '19', 'Takai');
INSERT INTO `lga` VALUES ('402', '19', 'Tarauni');
INSERT INTO `lga` VALUES ('403', '19', 'Tofa');
INSERT INTO `lga` VALUES ('404', '19', 'Tsanyawa');
INSERT INTO `lga` VALUES ('405', '19', 'Tudun Wada');
INSERT INTO `lga` VALUES ('406', '19', 'Ngogo');
INSERT INTO `lga` VALUES ('407', '19', 'Warawa');
INSERT INTO `lga` VALUES ('408', '19', 'Wudil');
INSERT INTO `lga` VALUES ('409', '20', 'Bakori');
INSERT INTO `lga` VALUES ('410', '20', 'Batagarawa');
INSERT INTO `lga` VALUES ('411', '20', 'Batsari');
INSERT INTO `lga` VALUES ('412', '20', 'Baure');
INSERT INTO `lga` VALUES ('413', '20', 'Bindawa');
INSERT INTO `lga` VALUES ('414', '20', 'Charanchi');
INSERT INTO `lga` VALUES ('415', '20', 'Danja');
INSERT INTO `lga` VALUES ('416', '20', 'Danjume');
INSERT INTO `lga` VALUES ('417', '20', 'Dan-Musa');
INSERT INTO `lga` VALUES ('418', '20', 'Daura');
INSERT INTO `lga` VALUES ('419', '20', 'Dutsi');
INSERT INTO `lga` VALUES ('420', '20', 'Dutsinma');
INSERT INTO `lga` VALUES ('421', '20', 'Faskari');
INSERT INTO `lga` VALUES ('422', '20', 'Funtua');
INSERT INTO `lga` VALUES ('423', '20', 'Ingara');
INSERT INTO `lga` VALUES ('424', '20', 'Jibia');
INSERT INTO `lga` VALUES ('425', '20', 'Kafur');
INSERT INTO `lga` VALUES ('426', '20', 'Kaita');
INSERT INTO `lga` VALUES ('427', '20', 'Kankara');
INSERT INTO `lga` VALUES ('428', '20', 'Kankia');
INSERT INTO `lga` VALUES ('429', '20', 'Katsina');
INSERT INTO `lga` VALUES ('430', '20', 'Kurfi');
INSERT INTO `lga` VALUES ('431', '20', 'Kusada');
INSERT INTO `lga` VALUES ('432', '20', 'Mai Adua');
INSERT INTO `lga` VALUES ('433', '20', 'Malumfashi');
INSERT INTO `lga` VALUES ('434', '20', 'Mani');
INSERT INTO `lga` VALUES ('435', '20', 'Mashi');
INSERT INTO `lga` VALUES ('436', '20', 'Matazu');
INSERT INTO `lga` VALUES ('437', '20', 'Musawa');
INSERT INTO `lga` VALUES ('438', '20', 'Rimi');
INSERT INTO `lga` VALUES ('439', '20', 'Sabuwa');
INSERT INTO `lga` VALUES ('440', '20', 'Safana');
INSERT INTO `lga` VALUES ('441', '20', 'Sandamu');
INSERT INTO `lga` VALUES ('442', '20', 'Zango');
INSERT INTO `lga` VALUES ('443', '21', 'Aleira');
INSERT INTO `lga` VALUES ('444', '21', 'Arewa');
INSERT INTO `lga` VALUES ('445', '21', 'Argungu');
INSERT INTO `lga` VALUES ('446', '21', 'Augie');
INSERT INTO `lga` VALUES ('447', '21', 'Bagudo');
INSERT INTO `lga` VALUES ('448', '21', 'Birnin-Kebbi');
INSERT INTO `lga` VALUES ('449', '21', 'Bumza');
INSERT INTO `lga` VALUES ('450', '21', 'Dandi');
INSERT INTO `lga` VALUES ('451', '21', 'Danko');
INSERT INTO `lga` VALUES ('452', '21', 'Fakai');
INSERT INTO `lga` VALUES ('453', '21', 'Gwandu');
INSERT INTO `lga` VALUES ('454', '21', 'Jega');
INSERT INTO `lga` VALUES ('455', '21', 'Kalgo');
INSERT INTO `lga` VALUES ('456', '21', 'Koko-Besse');
INSERT INTO `lga` VALUES ('457', '21', 'Maiyama');
INSERT INTO `lga` VALUES ('458', '21', 'Ngaski');
INSERT INTO `lga` VALUES ('459', '21', 'Sakaba');
INSERT INTO `lga` VALUES ('460', '21', 'Shanga');
INSERT INTO `lga` VALUES ('461', '21', 'Suru');
INSERT INTO `lga` VALUES ('462', '21', 'Wasagu');
INSERT INTO `lga` VALUES ('463', '21', 'Yauri');
INSERT INTO `lga` VALUES ('464', '21', 'Zuru');
INSERT INTO `lga` VALUES ('465', '22', 'Adavi');
INSERT INTO `lga` VALUES ('466', '22', 'Ajaokuta');
INSERT INTO `lga` VALUES ('467', '22', 'Ankpa');
INSERT INTO `lga` VALUES ('468', '22', 'Bassa');
INSERT INTO `lga` VALUES ('469', '22', 'Dekina');
INSERT INTO `lga` VALUES ('470', '22', 'Ibaji');
INSERT INTO `lga` VALUES ('471', '22', 'Idah');
INSERT INTO `lga` VALUES ('472', '22', 'Igalamela');
INSERT INTO `lga` VALUES ('473', '22', 'Ijumu');
INSERT INTO `lga` VALUES ('474', '22', 'Kabba/Bunu');
INSERT INTO `lga` VALUES ('475', '22', 'Kogi');
INSERT INTO `lga` VALUES ('476', '22', 'Lokoja');
INSERT INTO `lga` VALUES ('477', '22', 'Mopa-Muro-Mopi');
INSERT INTO `lga` VALUES ('478', '22', 'Ofu');
INSERT INTO `lga` VALUES ('479', '22', 'Ogori/Magongo');
INSERT INTO `lga` VALUES ('480', '22', 'Okehi');
INSERT INTO `lga` VALUES ('481', '22', 'Okene');
INSERT INTO `lga` VALUES ('482', '22', 'Olamaboro');
INSERT INTO `lga` VALUES ('483', '22', 'Omala');
INSERT INTO `lga` VALUES ('484', '22', 'Oyi');
INSERT INTO `lga` VALUES ('485', '22', 'Yagba-East');
INSERT INTO `lga` VALUES ('486', '22', 'Yagba-West');
INSERT INTO `lga` VALUES ('487', '23', 'Asa');
INSERT INTO `lga` VALUES ('488', '23', 'Baruten');
INSERT INTO `lga` VALUES ('489', '23', 'Edu');
INSERT INTO `lga` VALUES ('490', '23', 'Ekiti');
INSERT INTO `lga` VALUES ('491', '23', 'Ifelodun');
INSERT INTO `lga` VALUES ('492', '23', 'Ilorin East');
INSERT INTO `lga` VALUES ('493', '23', 'Ilorin South');
INSERT INTO `lga` VALUES ('494', '23', 'Ilorin West');
INSERT INTO `lga` VALUES ('495', '23', 'Irepodun');
INSERT INTO `lga` VALUES ('496', '23', 'Isin');
INSERT INTO `lga` VALUES ('497', '23', 'Kaiama');
INSERT INTO `lga` VALUES ('498', '23', 'Moro');
INSERT INTO `lga` VALUES ('499', '23', 'Offa');
INSERT INTO `lga` VALUES ('500', '23', 'Oke-Ero');
INSERT INTO `lga` VALUES ('501', '23', 'Oyun');
INSERT INTO `lga` VALUES ('502', '23', 'Pategi');
INSERT INTO `lga` VALUES ('503', '24', 'Agege');
INSERT INTO `lga` VALUES ('504', '24', 'Ajeromi-Ifelodun');
INSERT INTO `lga` VALUES ('505', '24', 'Alimosho');
INSERT INTO `lga` VALUES ('506', '24', 'Amuwo-Odofin');
INSERT INTO `lga` VALUES ('507', '24', 'Apapa');
INSERT INTO `lga` VALUES ('508', '24', 'Badagry');
INSERT INTO `lga` VALUES ('509', '24', 'Epe');
INSERT INTO `lga` VALUES ('510', '24', 'Eti-Osa');
INSERT INTO `lga` VALUES ('511', '24', 'Ibeju-Lekki');
INSERT INTO `lga` VALUES ('512', '24', 'Ifako-Ijaiye');
INSERT INTO `lga` VALUES ('513', '24', 'Ikeja');
INSERT INTO `lga` VALUES ('514', '24', 'Ikorodu');
INSERT INTO `lga` VALUES ('515', '24', 'Kosofe');
INSERT INTO `lga` VALUES ('516', '24', 'Lagos-Island');
INSERT INTO `lga` VALUES ('517', '24', 'Lagos-Mainland');
INSERT INTO `lga` VALUES ('518', '24', 'Mushin');
INSERT INTO `lga` VALUES ('519', '24', 'Ojo');
INSERT INTO `lga` VALUES ('520', '24', 'Oshodi-Isolo');
INSERT INTO `lga` VALUES ('521', '24', 'Shomolu');
INSERT INTO `lga` VALUES ('522', '24', 'Suru-Lere');
INSERT INTO `lga` VALUES ('523', '25', 'Akwanga');
INSERT INTO `lga` VALUES ('524', '25', 'Awe');
INSERT INTO `lga` VALUES ('525', '25', 'Doma');
INSERT INTO `lga` VALUES ('526', '25', 'Karu');
INSERT INTO `lga` VALUES ('527', '25', 'Keana');
INSERT INTO `lga` VALUES ('528', '25', 'Keffi');
INSERT INTO `lga` VALUES ('529', '25', 'Kokona');
INSERT INTO `lga` VALUES ('530', '25', 'Lafia');
INSERT INTO `lga` VALUES ('531', '25', 'Nassarawa');
INSERT INTO `lga` VALUES ('532', '25', 'Nassarawa Eggor');
INSERT INTO `lga` VALUES ('533', '25', 'Obi');
INSERT INTO `lga` VALUES ('534', '25', 'Toto');
INSERT INTO `lga` VALUES ('535', '25', 'Wamba');
INSERT INTO `lga` VALUES ('536', '26', 'Agaie');
INSERT INTO `lga` VALUES ('537', '26', 'Agwara');
INSERT INTO `lga` VALUES ('538', '26', 'Bida');
INSERT INTO `lga` VALUES ('539', '26', 'Borgu');
INSERT INTO `lga` VALUES ('540', '26', 'Bosso');
INSERT INTO `lga` VALUES ('541', '26', 'Chanchaga');
INSERT INTO `lga` VALUES ('542', '26', 'Edati');
INSERT INTO `lga` VALUES ('543', '26', 'Gbako');
INSERT INTO `lga` VALUES ('544', '26', 'Gurara');
INSERT INTO `lga` VALUES ('545', '26', 'Katcha');
INSERT INTO `lga` VALUES ('546', '26', 'Kontagora');
INSERT INTO `lga` VALUES ('547', '26', 'Lapai');
INSERT INTO `lga` VALUES ('548', '26', 'Lavum');
INSERT INTO `lga` VALUES ('549', '26', 'Magama');
INSERT INTO `lga` VALUES ('550', '26', 'Mariga');
INSERT INTO `lga` VALUES ('551', '26', 'Mashegu');
INSERT INTO `lga` VALUES ('552', '26', 'Mokwa');
INSERT INTO `lga` VALUES ('553', '26', 'Muya');
INSERT INTO `lga` VALUES ('554', '26', 'Paikoro');
INSERT INTO `lga` VALUES ('555', '26', 'Rafi');
INSERT INTO `lga` VALUES ('556', '26', 'Rajau');
INSERT INTO `lga` VALUES ('557', '26', 'Shiroro');
INSERT INTO `lga` VALUES ('558', '26', 'Suleja');
INSERT INTO `lga` VALUES ('559', '26', 'Tafa');
INSERT INTO `lga` VALUES ('560', '26', 'Wushishi');
INSERT INTO `lga` VALUES ('561', '27', 'Abeokuta -North');
INSERT INTO `lga` VALUES ('562', '27', 'Abeokuta -South');
INSERT INTO `lga` VALUES ('563', '27', 'Ado-Odu/Ota');
INSERT INTO `lga` VALUES ('564', '27', 'Yewa-North');
INSERT INTO `lga` VALUES ('565', '27', 'Yewa-South');
INSERT INTO `lga` VALUES ('566', '27', 'Ewekoro');
INSERT INTO `lga` VALUES ('567', '27', 'Ifo');
INSERT INTO `lga` VALUES ('568', '27', 'Ijebu East');
INSERT INTO `lga` VALUES ('569', '27', 'Ijebu North');
INSERT INTO `lga` VALUES ('570', '27', 'Ijebu North-East');
INSERT INTO `lga` VALUES ('571', '27', 'Ijebu-Ode');
INSERT INTO `lga` VALUES ('572', '27', 'Ikenne');
INSERT INTO `lga` VALUES ('573', '27', 'Imeko-Afon');
INSERT INTO `lga` VALUES ('574', '27', 'Ipokia');
INSERT INTO `lga` VALUES ('575', '27', 'Obafemi -Owode');
INSERT INTO `lga` VALUES ('576', '27', 'Odeda');
INSERT INTO `lga` VALUES ('577', '27', 'Odogbolu');
INSERT INTO `lga` VALUES ('578', '27', 'Ogun-Water Side');
INSERT INTO `lga` VALUES ('579', '27', 'Remo-North');
INSERT INTO `lga` VALUES ('580', '27', 'Shagamu');
INSERT INTO `lga` VALUES ('581', '28', 'Akoko-North-East');
INSERT INTO `lga` VALUES ('582', '28', 'Akoko-North-West');
INSERT INTO `lga` VALUES ('583', '28', 'Akoko-South-West');
INSERT INTO `lga` VALUES ('584', '28', 'Akoko-South-East');
INSERT INTO `lga` VALUES ('585', '28', 'Akure- South');
INSERT INTO `lga` VALUES ('586', '28', 'Akure-North');
INSERT INTO `lga` VALUES ('587', '28', 'Ese-Odo');
INSERT INTO `lga` VALUES ('588', '28', 'Idanre');
INSERT INTO `lga` VALUES ('589', '28', 'Ifedore');
INSERT INTO `lga` VALUES ('590', '28', 'Ilaje');
INSERT INTO `lga` VALUES ('591', '28', 'Ile-Oluji-Okeigbo');
INSERT INTO `lga` VALUES ('592', '28', 'Irele');
INSERT INTO `lga` VALUES ('593', '28', 'Odigbo');
INSERT INTO `lga` VALUES ('594', '28', 'Okitipupa');
INSERT INTO `lga` VALUES ('595', '28', 'Ondo-West');
INSERT INTO `lga` VALUES ('596', '28', 'Ondo East');
INSERT INTO `lga` VALUES ('597', '28', 'Ose');
INSERT INTO `lga` VALUES ('598', '28', 'Owo');
INSERT INTO `lga` VALUES ('599', '29', 'Atakumosa');
INSERT INTO `lga` VALUES ('600', '29', 'Atakumosa East');
INSERT INTO `lga` VALUES ('601', '29', 'Ayeda-Ade');
INSERT INTO `lga` VALUES ('602', '29', 'Ayedire');
INSERT INTO `lga` VALUES ('603', '29', 'Boluwaduro');
INSERT INTO `lga` VALUES ('604', '29', 'Boripe');
INSERT INTO `lga` VALUES ('605', '29', 'Ede');
INSERT INTO `lga` VALUES ('606', '29', 'Ede North');
INSERT INTO `lga` VALUES ('607', '29', 'Egbedore');
INSERT INTO `lga` VALUES ('608', '29', 'Ejigbo');
INSERT INTO `lga` VALUES ('609', '29', 'Ife');
INSERT INTO `lga` VALUES ('610', '29', 'Ife East');
INSERT INTO `lga` VALUES ('611', '29', 'Ife North');
INSERT INTO `lga` VALUES ('612', '29', 'Ife South');
INSERT INTO `lga` VALUES ('613', '29', 'Ifedayo');
INSERT INTO `lga` VALUES ('614', '29', 'Ifelodun');
INSERT INTO `lga` VALUES ('615', '29', 'Ila');
INSERT INTO `lga` VALUES ('616', '29', 'Ilesha');
INSERT INTO `lga` VALUES ('617', '29', 'Ilesha-West');
INSERT INTO `lga` VALUES ('618', '29', 'Irepodun');
INSERT INTO `lga` VALUES ('619', '29', 'Irewole');
INSERT INTO `lga` VALUES ('620', '29', 'Isokun');
INSERT INTO `lga` VALUES ('621', '29', 'Iwo');
INSERT INTO `lga` VALUES ('622', '29', 'Obokun');
INSERT INTO `lga` VALUES ('623', '29', 'Odo-Otin');
INSERT INTO `lga` VALUES ('624', '29', 'Ola Oluwa');
INSERT INTO `lga` VALUES ('625', '29', 'Olorunda');
INSERT INTO `lga` VALUES ('626', '29', 'Ori-Ade');
INSERT INTO `lga` VALUES ('627', '29', 'Orolu');
INSERT INTO `lga` VALUES ('628', '29', 'Osogbo');
INSERT INTO `lga` VALUES ('629', '30', 'Afijio');
INSERT INTO `lga` VALUES ('630', '30', 'Akinyele');
INSERT INTO `lga` VALUES ('631', '30', 'Atiba');
INSERT INTO `lga` VALUES ('632', '30', 'Atisbo');
INSERT INTO `lga` VALUES ('633', '30', 'Egbeda');
INSERT INTO `lga` VALUES ('634', '30', 'Ibadan-Central');
INSERT INTO `lga` VALUES ('635', '30', 'Ibadan-North-East');
INSERT INTO `lga` VALUES ('636', '30', 'Ibadan-North-West');
INSERT INTO `lga` VALUES ('637', '30', 'Ibadan-South-East');
INSERT INTO `lga` VALUES ('638', '30', 'Ibadan-South-West');
INSERT INTO `lga` VALUES ('639', '30', 'Ibarapa-Central');
INSERT INTO `lga` VALUES ('640', '30', 'Ibarapa-East');
INSERT INTO `lga` VALUES ('641', '30', 'Ibarapa-North');
INSERT INTO `lga` VALUES ('642', '30', 'Ido');
INSERT INTO `lga` VALUES ('643', '30', 'Ifedayo');
INSERT INTO `lga` VALUES ('644', '30', 'Ifeloju');
INSERT INTO `lga` VALUES ('645', '30', 'Irepo');
INSERT INTO `lga` VALUES ('646', '30', 'Iseyin');
INSERT INTO `lga` VALUES ('647', '30', 'Itesiwaju');
INSERT INTO `lga` VALUES ('648', '30', 'Iwajowa');
INSERT INTO `lga` VALUES ('649', '30', 'Kajola');
INSERT INTO `lga` VALUES ('650', '30', 'Lagelu');
INSERT INTO `lga` VALUES ('651', '30', 'Odo-Oluwa');
INSERT INTO `lga` VALUES ('652', '30', 'Ogbomoso-North');
INSERT INTO `lga` VALUES ('653', '30', 'Ogbomosho-South');
INSERT INTO `lga` VALUES ('654', '30', 'Olorunsogo');
INSERT INTO `lga` VALUES ('655', '30', 'Oluyole');
INSERT INTO `lga` VALUES ('656', '30', 'Ona-Ara');
INSERT INTO `lga` VALUES ('657', '30', 'Orelope');
INSERT INTO `lga` VALUES ('658', '30', 'Ori-Ire');
INSERT INTO `lga` VALUES ('659', '30', 'Oyo East');
INSERT INTO `lga` VALUES ('660', '30', 'Oyo West');
INSERT INTO `lga` VALUES ('661', '30', 'saki east');
INSERT INTO `lga` VALUES ('662', '30', 'Saki West');
INSERT INTO `lga` VALUES ('663', '30', 'Surulere');
INSERT INTO `lga` VALUES ('664', '31', 'Barkin Ladi');
INSERT INTO `lga` VALUES ('665', '31', 'Bassa');
INSERT INTO `lga` VALUES ('666', '31', 'Bokkos');
INSERT INTO `lga` VALUES ('667', '31', 'Jos-East');
INSERT INTO `lga` VALUES ('668', '31', 'Jos-South');
INSERT INTO `lga` VALUES ('669', '31', 'Jos-North');
INSERT INTO `lga` VALUES ('670', '31', 'Kanam');
INSERT INTO `lga` VALUES ('671', '31', 'Kanke');
INSERT INTO `lga` VALUES ('672', '31', 'Langtang North');
INSERT INTO `lga` VALUES ('673', '31', 'Langtang South');
INSERT INTO `lga` VALUES ('674', '31', 'Mangu');
INSERT INTO `lga` VALUES ('675', '31', 'Mikang');
INSERT INTO `lga` VALUES ('676', '31', 'Pankshin');
INSERT INTO `lga` VALUES ('677', '31', 'Quan\'pan');
INSERT INTO `lga` VALUES ('678', '31', 'Riyom');
INSERT INTO `lga` VALUES ('679', '31', 'Shendam');
INSERT INTO `lga` VALUES ('680', '31', 'Wase');
INSERT INTO `lga` VALUES ('681', '32', 'Abua/Odual');
INSERT INTO `lga` VALUES ('682', '32', 'Ahoada East');
INSERT INTO `lga` VALUES ('683', '32', 'Ahoada West');
INSERT INTO `lga` VALUES ('684', '32', 'Akukutoru');
INSERT INTO `lga` VALUES ('685', '32', 'Andoni');
INSERT INTO `lga` VALUES ('686', '32', 'Asari-Toro');
INSERT INTO `lga` VALUES ('687', '32', 'Bonny');
INSERT INTO `lga` VALUES ('688', '32', 'Degema');
INSERT INTO `lga` VALUES ('689', '32', 'Eleme');
INSERT INTO `lga` VALUES ('690', '32', 'Emuoha');
INSERT INTO `lga` VALUES ('691', '32', 'Etche');
INSERT INTO `lga` VALUES ('692', '32', 'Gokana');
INSERT INTO `lga` VALUES ('693', '32', 'Ikwerre');
INSERT INTO `lga` VALUES ('694', '32', 'Khana');
INSERT INTO `lga` VALUES ('695', '32', 'Obio/Akpor');
INSERT INTO `lga` VALUES ('696', '32', 'Ogba/Egbama/Ndoni');
INSERT INTO `lga` VALUES ('697', '32', 'Ogu/Bolo');
INSERT INTO `lga` VALUES ('698', '32', 'Okrika');
INSERT INTO `lga` VALUES ('699', '32', 'Omuma');
INSERT INTO `lga` VALUES ('700', '32', 'Opobo/Nkoro');
INSERT INTO `lga` VALUES ('701', '32', 'Oyigbo');
INSERT INTO `lga` VALUES ('702', '32', 'Port-Harcourt');
INSERT INTO `lga` VALUES ('703', '32', 'Tai');
INSERT INTO `lga` VALUES ('704', '33', 'Binji');
INSERT INTO `lga` VALUES ('705', '33', 'Bodinga');
INSERT INTO `lga` VALUES ('706', '33', 'Dange-Shuni');
INSERT INTO `lga` VALUES ('707', '33', 'Gada');
INSERT INTO `lga` VALUES ('708', '33', 'Goronyo');
INSERT INTO `lga` VALUES ('709', '33', 'Gudu');
INSERT INTO `lga` VALUES ('710', '33', 'Gwadabawa');
INSERT INTO `lga` VALUES ('711', '33', 'Illela');
INSERT INTO `lga` VALUES ('712', '33', 'Isa');
INSERT INTO `lga` VALUES ('713', '33', 'Kebbe');
INSERT INTO `lga` VALUES ('714', '33', 'Kware');
INSERT INTO `lga` VALUES ('715', '33', 'Raba');
INSERT INTO `lga` VALUES ('716', '33', 'Sabon-Birni');
INSERT INTO `lga` VALUES ('717', '33', 'Shagari');
INSERT INTO `lga` VALUES ('718', '33', 'Silame');
INSERT INTO `lga` VALUES ('719', '33', 'Sokoto North');
INSERT INTO `lga` VALUES ('720', '33', 'Sokoto South');
INSERT INTO `lga` VALUES ('721', '33', 'Tambuwal');
INSERT INTO `lga` VALUES ('722', '33', 'Tanzaga');
INSERT INTO `lga` VALUES ('723', '33', 'Tureta');
INSERT INTO `lga` VALUES ('724', '33', 'Wamakko');
INSERT INTO `lga` VALUES ('725', '33', 'Wurno');
INSERT INTO `lga` VALUES ('726', '33', 'Yabo');
INSERT INTO `lga` VALUES ('727', '34', 'Ardo Kola');
INSERT INTO `lga` VALUES ('728', '34', 'Bali');
INSERT INTO `lga` VALUES ('729', '34', 'Donga');
INSERT INTO `lga` VALUES ('730', '34', 'Gashaka');
INSERT INTO `lga` VALUES ('731', '34', 'Gassol');
INSERT INTO `lga` VALUES ('732', '34', 'Ibi');
INSERT INTO `lga` VALUES ('733', '34', 'Jalingo');
INSERT INTO `lga` VALUES ('734', '34', 'Karim-Lamido');
INSERT INTO `lga` VALUES ('735', '34', 'Kurmi');
INSERT INTO `lga` VALUES ('736', '34', 'Lau');
INSERT INTO `lga` VALUES ('737', '34', 'Sardauna');
INSERT INTO `lga` VALUES ('738', '34', 'Takuni');
INSERT INTO `lga` VALUES ('739', '34', 'Ussa');
INSERT INTO `lga` VALUES ('740', '34', 'Wukari');
INSERT INTO `lga` VALUES ('741', '34', 'Yarro');
INSERT INTO `lga` VALUES ('742', '34', 'Zing');
INSERT INTO `lga` VALUES ('743', '35', 'Bade');
INSERT INTO `lga` VALUES ('744', '35', 'Bursali');
INSERT INTO `lga` VALUES ('745', '35', 'Damaturu');
INSERT INTO `lga` VALUES ('746', '35', 'Fuka');
INSERT INTO `lga` VALUES ('747', '35', 'Fune');
INSERT INTO `lga` VALUES ('748', '35', 'Geidam');
INSERT INTO `lga` VALUES ('749', '35', 'Gogaram');
INSERT INTO `lga` VALUES ('750', '35', 'Gujba');
INSERT INTO `lga` VALUES ('751', '35', 'Gulani');
INSERT INTO `lga` VALUES ('752', '35', 'Jakusko');
INSERT INTO `lga` VALUES ('753', '35', 'Karasuwa');
INSERT INTO `lga` VALUES ('754', '35', 'Machina');
INSERT INTO `lga` VALUES ('755', '35', 'Nangere');
INSERT INTO `lga` VALUES ('756', '35', 'Nguru');
INSERT INTO `lga` VALUES ('757', '35', 'Potiskum');
INSERT INTO `lga` VALUES ('758', '35', 'Tarmua');
INSERT INTO `lga` VALUES ('759', '35', 'Yunisari');
INSERT INTO `lga` VALUES ('760', '35', 'Yusufari');
INSERT INTO `lga` VALUES ('761', '36', 'Anka');
INSERT INTO `lga` VALUES ('762', '36', 'Bakure');
INSERT INTO `lga` VALUES ('763', '36', 'Bukkuyum');
INSERT INTO `lga` VALUES ('764', '36', 'Bungudo');
INSERT INTO `lga` VALUES ('765', '36', 'Gumi');
INSERT INTO `lga` VALUES ('766', '36', 'Gusau');
INSERT INTO `lga` VALUES ('767', '36', 'Isa');
INSERT INTO `lga` VALUES ('768', '36', 'Kaura-Namoda');
INSERT INTO `lga` VALUES ('769', '36', 'Kiyawa');
INSERT INTO `lga` VALUES ('770', '36', 'Maradun');
INSERT INTO `lga` VALUES ('771', '36', 'Marau');
INSERT INTO `lga` VALUES ('772', '36', 'Shinkafa');
INSERT INTO `lga` VALUES ('773', '36', 'Talata-Mafara');
INSERT INTO `lga` VALUES ('774', '36', 'Tsafe');
INSERT INTO `lga` VALUES ('775', '36', 'Zurmi');
INSERT INTO `lga` VALUES ('776', '9', 'Obudu');
INSERT INTO `lga` VALUES ('777', '37', 'Abaji');
INSERT INTO `lga` VALUES ('778', '37', 'Bwari');
INSERT INTO `lga` VALUES ('779', '37', 'Gwagwalada');
INSERT INTO `lga` VALUES ('780', '37', 'Kuje');
INSERT INTO `lga` VALUES ('781', '37', 'Kwali');
INSERT INTO `lga` VALUES ('782', '37', 'Municipal');
INSERT INTO `lga` VALUES ('783', '12', 'Etsako-East');
INSERT INTO `lga` VALUES ('784', '16', 'Ahiazu-Mbaise');
INSERT INTO `lga` VALUES ('785', '38', 'Foreign');
INSERT INTO `lga` VALUES ('786', '18', 'Kaduna South');
INSERT INTO `lga` VALUES ('787', '16', 'Aboh-Mbaise');
INSERT INTO `lga` VALUES ('788', '9', 'Odukpani');

-- ----------------------------
-- Table structure for liberators
-- ----------------------------
DROP TABLE IF EXISTS `liberators`;
CREATE TABLE `liberators` (
  `liberatorid` int(11) NOT NULL,
  `staffid` int(11) NOT NULL,
  `title` int(11) NOT NULL,
  `sname` varchar(255) NOT NULL,
  `fname` varchar(255) NOT NULL,
  `mname` varchar(255) NOT NULL,
  `post` int(11) NOT NULL,
  `duty` int(11) NOT NULL,
  `liberatorstatus` int(11) NOT NULL,
  PRIMARY KEY (`liberatorid`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- ----------------------------
-- Records of liberators
-- ----------------------------

-- ----------------------------
-- Table structure for login
-- ----------------------------
DROP TABLE IF EXISTS `login`;
CREATE TABLE `login` (
  `loginid` int(11) NOT NULL AUTO_INCREMENT,
  `userid` varchar(255) NOT NULL,
  `kokoro` varchar(255) NOT NULL,
  `status` int(11) NOT NULL,
  `checkk` int(11) NOT NULL,
  `usertypeid` int(11) NOT NULL,
  PRIMARY KEY (`loginid`,`userid`)
) ENGINE=MyISAM AUTO_INCREMENT=2 DEFAULT CHARSET=latin1;

-- ----------------------------
-- Records of login
-- ----------------------------
INSERT INTO `login` VALUES ('1', 'colma17001', '$2y$10$VnPQ6i.gfn.Y13MjqWzP1Owi0skdaAKyJlS4nTsGxzZES6NeYn.6W', '1', '0', '1');

-- ----------------------------
-- Table structure for mdeduction1
-- ----------------------------
DROP TABLE IF EXISTS `mdeduction1`;
CREATE TABLE `mdeduction1` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `cid` varchar(255) NOT NULL,
  `amt` double NOT NULL,
  `facilityid` int(11) NOT NULL,
  `tno` int(11) NOT NULL,
  `bacctno` varchar(255) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=13 DEFAULT CHARSET=latin1;

-- ----------------------------
-- Records of mdeduction1
-- ----------------------------
INSERT INTO `mdeduction1` VALUES ('1', 'colma17001', '768686', '2', '0', '7677676876');
INSERT INTO `mdeduction1` VALUES ('2', 'colma17004', '800000', '2', '0', '7677676876');
INSERT INTO `mdeduction1` VALUES ('3', 'colma17002', '768686', '2', '0', '7677676876');
INSERT INTO `mdeduction1` VALUES ('4', 'colma17003', '768686', '2', '0', '7677676876');
INSERT INTO `mdeduction1` VALUES ('5', 'colma17005', '768686', '2', '0', '7677676876');
INSERT INTO `mdeduction1` VALUES ('6', 'colma17006', '1000000', '2', '0', '1356564');
INSERT INTO `mdeduction1` VALUES ('7', 'colma17007', '1000000', '2', '0', '1356564');
INSERT INTO `mdeduction1` VALUES ('8', 'colma17008', '1000000', '2', '0', '1356564');
INSERT INTO `mdeduction1` VALUES ('9', 'colma17009', '500000', '2', '0', '7677676876');
INSERT INTO `mdeduction1` VALUES ('10', 'colma17001', '22000', '10', '1', '7677676876');
INSERT INTO `mdeduction1` VALUES ('11', 'colma17004', '22000', '10', '2', '7677676876');
INSERT INTO `mdeduction1` VALUES ('12', 'colma17009', '22000', '10', '3', '7677676876');

-- ----------------------------
-- Table structure for memberregister
-- ----------------------------
DROP TABLE IF EXISTS `memberregister`;
CREATE TABLE `memberregister` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
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
  `datecreated` datetime NOT NULL DEFAULT '0000-00-00 00:00:00' ON UPDATE CURRENT_TIMESTAMP,
  `officer` varchar(255) NOT NULL,
  `dateout` date NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=18 DEFAULT CHARSET=latin1;

-- ----------------------------
-- Records of memberregister
-- ----------------------------
INSERT INTO `memberregister` VALUES ('1', 'colma17001', '1', 'Akande', 'Joshua', 'Ayomikun', '2017-09-08', '1', '1', 'NG', '22, ogoja crescent', 'agbara estate', 'homeadd3', '3', 'NG', '09066439983', 'joshuaayomikun@gmail.com', 'Runs', '26, egbedi street', 'off ishitu road, egan', 'igando', '4', 'NG', '1983', '1', '66', '76', '78', '68', '3', 'Akande', 'Eunice', 'Opeoluwa', '1', '22, ogoja crescent', 'agbara estate', 'agbara', '4', 'NG', '07035123715', 'joshuaayomikun@gmail.com', '1970-01-01', '768686', '7677676876', '1', '200000', '1', '2017-11-07 17:22:22', '1', '0000-00-00');
INSERT INTO `memberregister` VALUES ('11', 'colma17004', '3', 'Oladoyin', 'Lolade', '', '2017-09-07', '2', '1', 'NG', '22, ogoja crescent', 'agbara estate', 'homeadd3', '3', 'NG', '09066439983', 'joshuaayomikun@gmail.com', 'Runs', '26, egbedi street', 'off ishitu road, egan', 'igando', '4', 'NG', '1984', '1', '66', '76', '78', '68', '1', 'Akande', 'Eunice', 'Opeoluwa', '1', '22, ogoja crescent', 'agbara estate', 'agbara', '3', 'NG', '07035123715', 'joshuaayomikun@gmail.com', '2017-09-07', '800000', '7677676876', '1', '10000', '1', '2017-09-20 04:28:00', '1', '0000-00-00');
INSERT INTO `memberregister` VALUES ('9', 'colma17002', '1', 'Alichi', 'Chikwesi', 'Victor', '2017-09-08', '1', '1', 'NG', '22, ogoja crescent', 'agbara estate', 'agbara', '3', 'NG', '09066439983', 'joshuaayomikun@gmail.com', 'Runs', '26, egbedi street', 'off ishitu road, egan', 'igando', '4', 'NG', '1983', '1', '66', '76', '78', '68', '1', 'Akande', 'Eunice', 'Opeoluwa', '1', '22, ogoja crescent', 'agbara estate', 'agbara', '4', 'NG', '09066439983', 'joshuaayomikun@gmail.com', '2017-09-07', '768686', '7677676876', '1', '10000', '1', '2017-09-16 19:54:30', '1', '0000-00-00');
INSERT INTO `memberregister` VALUES ('10', 'colma17003', '1', 'Ajijola', 'Oluwaseun', 'Isaiah', '2017-09-08', '1', '1', 'NG', '22, ogoja crescent', 'agbara estate', 'agbara', '3', 'NG', '09066439983', 'joshuaayomikun@gmail.com', 'Runs', '26, egbedi street', 'off ishitu road, egan', 'igando', '4', 'NG', '1983', '1', '66', '76', '78', '68', '1', 'Akande', 'Eunice', 'Opeoluwa', '1', '22, ogoja crescent', 'agbara estate', 'agbara', '4', 'NG', '09066439983', 'joshuaayomikun@gmail.com', '2017-09-07', '768686', '7677676876', '1', '10000', '1', '2017-09-16 19:54:30', '1', '0000-00-00');
INSERT INTO `memberregister` VALUES ('12', 'colma17005', '1', 'Akinremi', 'Josiah', 'Olumide', '2017-09-07', '1', '1', 'NG', '22, ogoja crescent', 'agbara estate', 'agbara', '4', 'NG', '09066439983', 'joshuaayomikun@gmail.com', 'Runs', '26, egbedi street', 'off ishitu road, egan', 'igando', '4', 'NG', '1984', '1', '66', '76', '78', '68', '1', 'Akande', 'Eunice', 'Opeoluwa', '1', '22, ogoja crescent', 'agbara estate', 'agbara', '4', 'NG', '09066439983', 'joshuaayomikun@gmail.com', '2017-09-07', '768686', '7677676876', '1', '10000', '1', '2017-09-16 19:54:30', '1', '0000-00-00');
INSERT INTO `memberregister` VALUES ('13', 'colma17006', '3', 'Amadi', 'Ebere', 'Ebube', '1997-09-11', '2', '1', 'NG', 'Km 10, Idiroko road, canaanland', 'block z3 flat 3, covenant university', 'Ota', '27', 'NG', '09066439983', 'joshuaayomikun@gmail.com', 'IT Solutions', '26, egbedi street', 'off ishitu road, egan', 'igando', '24', 'NG', '1983', '1', '66', '76', '78', '68', '1', 'Akande', 'Joshua', 'Ayomikun', '1', '22, ogoja crescent', 'agbara estate', 'agbara', '27', 'NG', '09066439983', 'joshuaayomikun@gmail.com', '2017-09-05', '1000000', '1356564', '1', '10000', '1', '2017-09-16 19:54:30', '1', '0000-00-00');
INSERT INTO `memberregister` VALUES ('15', 'colma17007', '3', 'Amadi', 'Ebere', 'Ebube', '1997-09-11', '2', '1', 'NG', 'Km 10, Idiroko road, canaanland', 'block z3 flat 3, covenant university', 'Ota', '27', 'NG', '09066439983', 'joshuaayomikun@gmail.com', 'IT Solutions', '26, egbedi street', 'off ishitu road, egan', 'igando', '24', 'NG', '1983', '1', '66', '76', '78', '68', '1', 'Akande', 'Joshua', 'Ayomikun', '1', '22, ogoja crescent', 'agbara estate', 'agbara', '27', 'NG', '09066439983', 'joshuaayomikun@gmail.com', '2017-09-05', '1000000', '1356564', '1', '10000', '1', '2017-09-16 19:54:30', '1', '0000-00-00');
INSERT INTO `memberregister` VALUES ('16', 'colma17008', '3', 'Amadi', 'Ebere', 'Ebube', '1997-09-11', '2', '1', 'NG', 'Km 10, Idiroko road, canaanland', 'block z3 flat 3, covenant university', 'Ota', '27', 'NG', '09066439983', 'joshuaayomikun@gmail.com', 'IT Solutions', '26, egbedi street', 'off ishitu road, egan', 'igando', '24', 'NG', '1983', '1', '66', '76', '78', '68', '1', 'Akande', 'Joshua', 'Ayomikun', '1', '22, ogoja crescent', 'agbara estate', 'agbara', '27', 'NG', '09066439983', 'joshuaayomikun@gmail.com', '2017-09-05', '1000000', '1356564', '1', '10000', '1', '2017-09-16 19:54:30', '1', '0000-00-00');
INSERT INTO `memberregister` VALUES ('17', 'colma17009', '2', 'Ajayi', 'Priscilla', 'Oluwatoyin', '1987-10-29', '2', '2', 'NG', 'Km 10, Idiroko Road ', 'Canaanland ', 'Ota', '27', 'NG', '09066439983', 'joshuaayomikun@gmail.com', 'IT SOlutions', '26, egbedi street', 'off ishitu road, egan', 'igando', '24', 'NG', '1991', '1', '66', '76', '78', '68', '3', 'Akande', 'Eunice', 'Opeoluwa', '1', '22, ogoja crescent', 'agbara estate', 'agbara', '27', 'NG', '07035123715', 'opeunique@yahoo.co.uk', '2017-09-11', '500000', '7677676876', '1', '10000', '1', '2017-11-05 03:31:44', '1', '0000-00-00');

-- ----------------------------
-- Table structure for menutypes
-- ----------------------------
DROP TABLE IF EXISTS `menutypes`;
CREATE TABLE `menutypes` (
  `mtypid` int(11) NOT NULL AUTO_INCREMENT,
  `mtypname` varchar(255) NOT NULL,
  PRIMARY KEY (`mtypid`)
) ENGINE=MyISAM AUTO_INCREMENT=3 DEFAULT CHARSET=latin1;

-- ----------------------------
-- Records of menutypes
-- ----------------------------
INSERT INTO `menutypes` VALUES ('1', 'Main menu');
INSERT INTO `menutypes` VALUES ('2', 'Submenu');

-- ----------------------------
-- Table structure for months
-- ----------------------------
DROP TABLE IF EXISTS `months`;
CREATE TABLE `months` (
  `monthid` varchar(11) NOT NULL,
  `month` varchar(255) DEFAULT NULL,
  PRIMARY KEY (`monthid`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

-- ----------------------------
-- Records of months
-- ----------------------------
INSERT INTO `months` VALUES ('01', 'JANUARY');
INSERT INTO `months` VALUES ('02', 'FEBRUARY');
INSERT INTO `months` VALUES ('03', 'MARCH');
INSERT INTO `months` VALUES ('04', 'APRIL');
INSERT INTO `months` VALUES ('05', 'MAY');
INSERT INTO `months` VALUES ('06', 'JUNE');
INSERT INTO `months` VALUES ('07', 'JULY');
INSERT INTO `months` VALUES ('08', 'AUGUST');
INSERT INTO `months` VALUES ('09', 'SEPTEMBER');
INSERT INTO `months` VALUES ('10', 'OCTOBER');
INSERT INTO `months` VALUES ('11', 'NOVEMBER');
INSERT INTO `months` VALUES ('12', 'DECEMBER');

-- ----------------------------
-- Table structure for montpays
-- ----------------------------
DROP TABLE IF EXISTS `montpays`;
CREATE TABLE `montpays` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `pdate` datetime NOT NULL,
  `idn` varchar(255) NOT NULL,
  `amount` double NOT NULL,
  `facid` int(11) NOT NULL,
  `facility` varchar(50) NOT NULL,
  `remark` varchar(50) NOT NULL,
  `userr` varchar(50) NOT NULL,
  `udate` datetime NOT NULL,
  `paymode` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=latin1;

-- ----------------------------
-- Records of montpays
-- ----------------------------
INSERT INTO `montpays` VALUES ('1', '1970-01-01 00:00:00', 'colma17001', '100000', '2', '', '10', '4', '0000-00-00 00:00:00', '2');
INSERT INTO `montpays` VALUES ('2', '1970-01-01 00:00:00', 'colma17001', '200', '2', '', '5', '2', '0000-00-00 00:00:00', '2');
INSERT INTO `montpays` VALUES ('3', '1970-01-01 00:00:00', 'colma17001', '200000', '2', '', '5', '2', '0000-00-00 00:00:00', '2');
INSERT INTO `montpays` VALUES ('4', '1970-01-01 00:00:00', 'colma17001', '-200000', '5', '', '', '10', '2017-09-15 19:53:53', '2');
INSERT INTO `montpays` VALUES ('5', '1970-01-01 00:00:00', 'colma17001', '-200000', '5', '', ' hhj', '10', '2017-09-15 19:54:43', '2');

-- ----------------------------
-- Table structure for mstat
-- ----------------------------
DROP TABLE IF EXISTS `mstat`;
CREATE TABLE `mstat` (
  `maristatus` varchar(50) NOT NULL,
  `mstatid` int(11) NOT NULL AUTO_INCREMENT,
  `mstatstatus` int(11) NOT NULL,
  PRIMARY KEY (`mstatid`)
) ENGINE=MyISAM AUTO_INCREMENT=6 DEFAULT CHARSET=latin1;

-- ----------------------------
-- Records of mstat
-- ----------------------------
INSERT INTO `mstat` VALUES ('SINGLE', '1', '1');
INSERT INTO `mstat` VALUES ('MARRIED', '2', '1');
INSERT INTO `mstat` VALUES ('WIDOWED', '3', '1');
INSERT INTO `mstat` VALUES ('DIVORCED', '4', '1');
INSERT INTO `mstat` VALUES ('SEPARATED', '5', '1');

-- ----------------------------
-- Table structure for names
-- ----------------------------
DROP TABLE IF EXISTS `names`;
CREATE TABLE `names` (
  `id` int(11) NOT NULL,
  `name` varchar(255) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- ----------------------------
-- Records of names
-- ----------------------------

-- ----------------------------
-- Table structure for officers
-- ----------------------------
DROP TABLE IF EXISTS `officers`;
CREATE TABLE `officers` (
  `officersid` int(11) NOT NULL AUTO_INCREMENT,
  `office` varchar(50) NOT NULL,
  `memid` varchar(50) NOT NULL,
  `dtin` date NOT NULL,
  `dtout` date NOT NULL,
  `remarks` varchar(240) NOT NULL,
  PRIMARY KEY (`officersid`)
) ENGINE=InnoDB AUTO_INCREMENT=9 DEFAULT CHARSET=latin1;

-- ----------------------------
-- Records of officers
-- ----------------------------
INSERT INTO `officers` VALUES ('1', '1', 'colma17001', '2009-04-01', '0000-00-00', '');
INSERT INTO `officers` VALUES ('2', '2', '13', '2009-04-01', '0000-00-00', '');
INSERT INTO `officers` VALUES ('3', '3', '24', '2009-04-01', '0000-00-00', '');
INSERT INTO `officers` VALUES ('4', '4', '23', '2009-04-01', '0000-00-00', '');
INSERT INTO `officers` VALUES ('5', '5', '108', '2009-04-01', '0000-00-00', '');
INSERT INTO `officers` VALUES ('6', '6', '95', '2009-04-01', '0000-00-00', '');
INSERT INTO `officers` VALUES ('7', '7', '200', '2009-04-01', '0000-00-00', '');
INSERT INTO `officers` VALUES ('8', '8', '119', '2009-04-01', '0000-00-00', '');

-- ----------------------------
-- Table structure for offices
-- ----------------------------
DROP TABLE IF EXISTS `offices`;
CREATE TABLE `offices` (
  `officeid` int(11) NOT NULL,
  `office` varchar(255) NOT NULL,
  `officestatus` varchar(255) NOT NULL,
  `datecreated` datetime NOT NULL DEFAULT '0000-00-00 00:00:00' ON UPDATE CURRENT_TIMESTAMP,
  `datechanged` datetime NOT NULL DEFAULT '0000-00-00 00:00:00' ON UPDATE CURRENT_TIMESTAMP,
  PRIMARY KEY (`officeid`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- ----------------------------
-- Records of offices
-- ----------------------------
INSERT INTO `offices` VALUES ('1', 'President', '1', '2017-09-02 03:44:43', '2017-09-02 03:44:43');
INSERT INTO `offices` VALUES ('2', 'Vice President', '1', '2017-09-02 03:44:42', '2017-09-02 03:44:42');
INSERT INTO `offices` VALUES ('3', 'Secretary', '1', '2017-09-02 03:44:42', '2017-09-02 03:44:42');
INSERT INTO `offices` VALUES ('4', 'Treasurer', '1', '2017-09-02 03:46:47', '2017-09-02 03:46:47');
INSERT INTO `offices` VALUES ('5', 'Financial Secretary', '1', '2017-09-02 03:46:21', '2017-09-02 03:46:21');
INSERT INTO `offices` VALUES ('6', 'Welfare', '1', '2017-09-02 03:46:21', '2017-09-02 03:46:21');
INSERT INTO `offices` VALUES ('7', 'P.R.O', '1', '2017-09-02 03:46:21', '2017-09-02 03:46:21');
INSERT INTO `offices` VALUES ('8', 'Asst. Gen. Secretary', '1', '2017-09-02 03:46:21', '2017-09-02 03:46:21');

-- ----------------------------
-- Table structure for period
-- ----------------------------
DROP TABLE IF EXISTS `period`;
CREATE TABLE `period` (
  `periodid` int(11) NOT NULL AUTO_INCREMENT,
  `period` int(11) NOT NULL,
  `facilityid` int(11) NOT NULL,
  `periodstatus` int(11) NOT NULL,
  PRIMARY KEY (`periodid`)
) ENGINE=MyISAM AUTO_INCREMENT=2 DEFAULT CHARSET=latin1;

-- ----------------------------
-- Records of period
-- ----------------------------
INSERT INTO `period` VALUES ('1', '10', '10', '1');

-- ----------------------------
-- Table structure for portallog
-- ----------------------------
DROP TABLE IF EXISTS `portallog`;
CREATE TABLE `portallog` (
  `id` bigint(20) NOT NULL AUTO_INCREMENT,
  `staffid` varchar(100) NOT NULL,
  `username` varchar(100) NOT NULL,
  `comments` longtext NOT NULL,
  `date` datetime NOT NULL,
  `menuid` int(100) NOT NULL,
  `appid` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=121 DEFAULT CHARSET=latin1;

-- ----------------------------
-- Records of portallog
-- ----------------------------
INSERT INTO `portallog` VALUES ('1', '', '', ' logged in', '2017-07-18 10:12:38', '0', '0');
INSERT INTO `portallog` VALUES ('2', '', '', ' logged out', '2017-07-18 10:16:44', '0', '0');
INSERT INTO `portallog` VALUES ('3', '', '', ' logged in', '2017-07-18 10:16:55', '0', '0');
INSERT INTO `portallog` VALUES ('4', '', '', ' logged out', '2017-07-18 10:16:56', '0', '0');
INSERT INTO `portallog` VALUES ('5', '', '', ' logged in', '2017-07-18 10:17:49', '0', '0');
INSERT INTO `portallog` VALUES ('6', 'mem1', '', ' logged in', '2017-07-18 14:46:02', '0', '0');
INSERT INTO `portallog` VALUES ('7', 'mem1', '', ' logged in', '2017-07-18 14:56:38', '0', '0');
INSERT INTO `portallog` VALUES ('8', 'mem1', '', 'Menu name changed from Manage Menu to Manage Menus', '2017-07-19 21:49:19', '0', '0');
INSERT INTO `portallog` VALUES ('9', 'mem1', '', 'Menu name changed from Manage Menus to Manage Menu', '2017-07-19 21:49:24', '0', '0');
INSERT INTO `portallog` VALUES ('10', 'mem1', '', 'Menu name changed from Reportss to Reports', '2017-07-19 22:35:06', '0', '0');
INSERT INTO `portallog` VALUES ('11', 'mem1', '', 'Role name changed from member to user', '2017-07-20 07:36:33', '0', '0');
INSERT INTO `portallog` VALUES ('12', 'mem1', '', 'Entries added as menu to this application', '2017-07-20 13:43:10', '0', '0');
INSERT INTO `portallog` VALUES ('13', 'mem1', '', 'Add Member added as submenu to Entries menu in this application', '2017-07-20 13:45:07', '0', '0');
INSERT INTO `portallog` VALUES ('14', 'mem1', '', '1 Submenu assigned to Admin', '2017-07-20 13:45:35', '0', '0');
INSERT INTO `portallog` VALUES ('15', 'mem1', '', ' logged in', '2017-07-22 21:04:26', '0', '0');
INSERT INTO `portallog` VALUES ('16', 'mem1', '', ' logged in', '2017-07-22 22:51:01', '0', '0');
INSERT INTO `portallog` VALUES ('17', 'mem1', '', ' logged in', '2017-07-22 22:59:27', '0', '0');
INSERT INTO `portallog` VALUES ('18', 'mem1', '', ' logged in', '2017-07-22 23:00:22', '0', '0');
INSERT INTO `portallog` VALUES ('19', 'mem1', '', ' logged in', '2017-07-23 16:19:00', '0', '0');
INSERT INTO `portallog` VALUES ('20', 'mem1', '', ' logged in', '2017-08-01 13:38:18', '0', '0');
INSERT INTO `portallog` VALUES ('21', 'mem1', '', ' logged in', '2017-08-05 05:48:45', '0', '0');
INSERT INTO `portallog` VALUES ('22', 'mem1', '', 'Loan added as submenu to Entries menu in this application', '2017-08-05 05:54:24', '2', '0');
INSERT INTO `portallog` VALUES ('23', 'mem1', '', '1 Submenu assigned to Admin', '2017-08-05 05:54:54', '3', '0');
INSERT INTO `portallog` VALUES ('24', 'mem1', '', ' logged in', '2017-08-06 18:04:48', '0', '0');
INSERT INTO `portallog` VALUES ('25', 'mem1', '', ' logged in', '2017-08-09 09:45:58', '0', '0');
INSERT INTO `portallog` VALUES ('26', 'mem1', '', 'Transfer Form added as submenu to Entries menu in this application', '2017-08-10 00:58:27', '2', '0');
INSERT INTO `portallog` VALUES ('27', 'mem1', '', '1 Submenu assigned to Admin', '2017-08-10 01:00:24', '3', '0');
INSERT INTO `portallog` VALUES ('28', 'mem1', '', ' logged in', '2017-08-11 15:55:44', '0', '0');
INSERT INTO `portallog` VALUES ('29', 'mem1', '', ' logged in', '2017-08-14 09:45:49', '0', '0');
INSERT INTO `portallog` VALUES ('30', 'mem1', '', 'Monthly Savings Rescheduling added as submenu to Entries menu in this application', '2017-08-14 09:50:19', '2', '0');
INSERT INTO `portallog` VALUES ('31', 'mem1', '', 'Setup added as menu to this application', '2017-08-14 09:50:34', '2', '0');
INSERT INTO `portallog` VALUES ('32', 'mem1', '', '1 Submenu assigned to Admin', '2017-08-14 09:51:58', '3', '0');
INSERT INTO `portallog` VALUES ('33', 'mem1', '', ' logged in', '2017-08-20 19:17:22', '0', '0');
INSERT INTO `portallog` VALUES ('34', 'mem1', '', 'Close Out A Member added as submenu to Membership Control menu in this application', '2017-08-21 00:48:46', '2', '0');
INSERT INTO `portallog` VALUES ('35', 'mem1', '', '1 Submenu assigned to Admin', '2017-08-21 00:49:26', '3', '0');
INSERT INTO `portallog` VALUES ('36', 'mem1', '', 'View Member added as submenu to Membership Control menu in this application', '2017-08-21 03:41:47', '2', '0');
INSERT INTO `portallog` VALUES ('37', 'mem1', '', '1 Submenu assigned to Admin', '2017-08-21 03:42:04', '3', '0');
INSERT INTO `portallog` VALUES ('38', 'mem1', '', ' logged in', '2017-08-23 17:20:07', '0', '0');
INSERT INTO `portallog` VALUES ('39', 'mem1', '', ' logged in', '2017-08-26 19:20:57', '0', '0');
INSERT INTO `portallog` VALUES ('40', 'mem1', '', 'Cash Inflow added as menu to this application', '2017-08-27 09:31:49', '2', '0');
INSERT INTO `portallog` VALUES ('41', 'mem1', '', 'Individual Facility Repayment added as submenu to Cash Inflow menu in this application', '2017-08-27 09:33:09', '2', '0');
INSERT INTO `portallog` VALUES ('42', 'mem1', '', 'Facilities added as submenu to Setup menu in this application', '2017-08-27 10:00:29', '2', '0');
INSERT INTO `portallog` VALUES ('43', 'mem1', '', '2 Submenu assigned to Admin', '2017-08-27 10:00:50', '3', '0');
INSERT INTO `portallog` VALUES ('44', 'mem1', '', ' logged in', '2017-09-01 14:10:47', '0', '0');
INSERT INTO `portallog` VALUES ('45', 'mem1', '', 'Enter Individual Savings added as submenu to Cash Inflow menu in this application', '2017-09-02 02:32:23', '2', '0');
INSERT INTO `portallog` VALUES ('46', 'mem1', '', '1 Submenu assigned to Admin', '2017-09-02 02:33:16', '3', '0');
INSERT INTO `portallog` VALUES ('47', 'mem1', '', 'New Officer added as submenu to Membership Control menu in this application', '2017-09-02 04:18:33', '2', '0');
INSERT INTO `portallog` VALUES ('48', 'mem1', '', '1 Submenu assigned to Admin', '2017-09-02 04:19:06', '3', '0');
INSERT INTO `portallog` VALUES ('49', 'mem1', '', 'Close Out Officers added as submenu to Membership Control menu in this application', '2017-09-02 04:51:39', '2', '0');
INSERT INTO `portallog` VALUES ('50', 'mem1', '', '1 Submenu assigned to Admin', '2017-09-02 04:51:52', '3', '0');
INSERT INTO `portallog` VALUES ('51', 'mem1', '', 'View Facilities added as submenu to Facility Management menu in this application', '2017-09-02 15:32:46', '2', '0');
INSERT INTO `portallog` VALUES ('52', 'mem1', '', '1 Submenu assigned to Admin', '2017-09-02 15:33:29', '3', '0');
INSERT INTO `portallog` VALUES ('53', 'mem1', '', 'Edit Facility added as submenu to Facility Management menu in this application', '2017-09-02 16:29:00', '2', '0');
INSERT INTO `portallog` VALUES ('54', 'mem1', '', '1 Submenu assigned to Admin', '2017-09-02 16:29:14', '3', '0');
INSERT INTO `portallog` VALUES ('55', 'mem1', '', 'Cash Flowout added as menu to this application', '2017-09-02 19:30:57', '2', '0');
INSERT INTO `portallog` VALUES ('56', 'mem1', '', 'Enter Payments For Savings Withdrawal added as submenu to Cash Flowout menu in this application', '2017-09-02 19:45:02', '2', '0');
INSERT INTO `portallog` VALUES ('57', 'mem1', '', '1 Submenu assigned to Admin', '2017-09-02 19:45:19', '3', '0');
INSERT INTO `portallog` VALUES ('58', 'mem1', '', 'Enter Payments For Facilities added as submenu to Cash Flowout menu in this application', '2017-09-02 21:00:17', '2', '0');
INSERT INTO `portallog` VALUES ('59', 'mem1', '', '1 Submenu assigned to Admin', '2017-09-02 21:00:29', '3', '0');
INSERT INTO `portallog` VALUES ('60', 'mem1', 'mem1', 'mem1 logged out', '2017-09-03 05:16:07', '0', '0');
INSERT INTO `portallog` VALUES ('61', 'mem1', '', ' logged in', '2017-09-03 05:27:32', '0', '0');
INSERT INTO `portallog` VALUES ('62', 'mem1', 'mem1', 'mem1 logged out', '2017-09-03 05:28:26', '0', '0');
INSERT INTO `portallog` VALUES ('63', 'mem1', '', ' logged in', '2017-09-03 05:31:21', '0', '0');
INSERT INTO `portallog` VALUES ('64', 'mem1', '', 'Letter Of Offer added as submenu to Facility Management menu in this application', '2017-09-03 06:15:48', '2', '0');
INSERT INTO `portallog` VALUES ('65', 'mem1', '', '1 Submenu assigned to Admin', '2017-09-03 06:16:02', '3', '0');
INSERT INTO `portallog` VALUES ('66', 'mem1', 'mem1', 'mem1 logged out', '2017-09-03 11:37:52', '0', '0');
INSERT INTO `portallog` VALUES ('67', 'mem1', '', ' logged in', '2017-09-03 11:51:12', '0', '0');
INSERT INTO `portallog` VALUES ('68', 'mem1', 'mem1', 'mem1 logged out', '2017-09-03 12:35:31', '0', '0');
INSERT INTO `portallog` VALUES ('69', 'mem1', '', ' logged in', '2017-09-03 12:52:27', '0', '0');
INSERT INTO `portallog` VALUES ('70', 'mem1', 'mem1', 'mem1 logged out', '2017-09-03 13:15:38', '0', '0');
INSERT INTO `portallog` VALUES ('71', 'mem1', '', ' logged in', '2017-09-03 13:16:07', '0', '0');
INSERT INTO `portallog` VALUES ('72', 'mem1', 'mem1', 'mem1 logged out', '2017-09-03 13:38:57', '0', '0');
INSERT INTO `portallog` VALUES ('73', 'mem1', '', ' logged in', '2017-09-03 21:17:58', '0', '0');
INSERT INTO `portallog` VALUES ('74', 'mem1', '', ' logged in', '2017-09-03 21:18:52', '0', '0');
INSERT INTO `portallog` VALUES ('75', 'mem1', '', ' logged in', '2017-09-04 12:58:38', '0', '0');
INSERT INTO `portallog` VALUES ('76', 'colma17001', 'colma17001', 'colma17001 logged out', '2017-09-04 15:59:42', '0', '0');
INSERT INTO `portallog` VALUES ('77', 'colma17001', '', ' logged in', '2017-09-04 15:59:53', '0', '0');
INSERT INTO `portallog` VALUES ('78', 'colma17001', '', 'Reconcillation added as menu to this application', '2017-09-05 18:23:35', '2', '0');
INSERT INTO `portallog` VALUES ('79', 'colma17001', '', 'Bank Reports added as submenu to Reconcillation menu in this application', '2017-09-05 18:24:55', '2', '0');
INSERT INTO `portallog` VALUES ('80', 'colma17001', '', '1 Submenu assigned to Admin', '2017-09-05 18:25:29', '3', '0');
INSERT INTO `portallog` VALUES ('81', 'colma17001', '', ' logged in', '2017-09-07 15:58:07', '0', '0');
INSERT INTO `portallog` VALUES ('82', 'colma17001', '', ' logged in', '2017-09-09 20:26:27', '0', '0');
INSERT INTO `portallog` VALUES ('83', 'colma17001', '', ' logged in', '2017-09-10 18:22:11', '0', '0');
INSERT INTO `portallog` VALUES ('84', 'colma17001', '', 'The menu exists in this application', '2017-09-11 17:08:49', '2', '0');
INSERT INTO `portallog` VALUES ('85', 'colma17001', '', 'Monthly Deduction Setup added as submenu to Monthly Deductions menu in this application', '2017-09-11 17:09:53', '2', '0');
INSERT INTO `portallog` VALUES ('86', 'colma17001', 'colma17001', 'colma17001 logged out', '2017-09-11 17:36:19', '0', '0');
INSERT INTO `portallog` VALUES ('87', 'colma17001', '', ' logged in', '2017-09-11 17:36:44', '0', '0');
INSERT INTO `portallog` VALUES ('88', 'colma17001', '', 'Share Increment added as submenu to Monthly Deductions menu in this application', '2017-09-11 19:01:07', '2', '0');
INSERT INTO `portallog` VALUES ('89', 'colma17001', '', '2 Submenu assigned to Admin', '2017-09-11 19:01:45', '3', '0');
INSERT INTO `portallog` VALUES ('90', 'colma17001', '', ' logged in', '2017-09-13 17:47:41', '0', '0');
INSERT INTO `portallog` VALUES ('91', 'colma17001', '', 'Edit Installment added as submenu to Facility Management menu in this application', '2017-09-13 19:47:34', '2', '0');
INSERT INTO `portallog` VALUES ('92', 'colma17001', '', '1 Submenu assigned to Admin', '2017-09-13 19:47:52', '3', '0');
INSERT INTO `portallog` VALUES ('93', 'colma17001', '', 'Enter Receipts From Others added as submenu to Cash Flowin menu in this application', '2017-09-14 06:22:16', '2', '0');
INSERT INTO `portallog` VALUES ('94', 'colma17001', '', '1 Submenu assigned to Admin', '2017-09-14 06:23:08', '3', '0');
INSERT INTO `portallog` VALUES ('95', 'colma17001', '', 'Liberator added as menu to this application', '2017-09-14 15:18:16', '2', '0');
INSERT INTO `portallog` VALUES ('96', 'colma17001', '', 'Add Liberatior added as submenu to Liberator menu in this application', '2017-09-14 15:35:05', '2', '0');
INSERT INTO `portallog` VALUES ('97', 'colma17001', '', '1 Submenu assigned to Admin', '2017-09-14 15:37:16', '3', '0');
INSERT INTO `portallog` VALUES ('98', 'colma17001', '', ' logged in', '2017-09-15 10:54:15', '0', '0');
INSERT INTO `portallog` VALUES ('99', 'colma17001', '', ' logged in', '2017-09-15 16:16:22', '0', '0');
INSERT INTO `portallog` VALUES ('100', 'colma17001', '', ' logged in', '2017-09-16 00:54:17', '0', '0');
INSERT INTO `portallog` VALUES ('101', 'colma17001', '', 'Enter Refunds On Facilities added as submenu to Cash Flowout menu in this application', '2017-09-16 00:55:50', '2', '0');
INSERT INTO `portallog` VALUES ('102', 'colma17001', '', '1 Submenu assigned to Admin', '2017-09-16 00:56:10', '3', '0');
INSERT INTO `portallog` VALUES ('103', 'colma17001', '', 'Enter Payments To Others added as submenu to Cash Flowout menu in this application', '2017-09-16 07:50:06', '2', '0');
INSERT INTO `portallog` VALUES ('104', 'colma17001', '', '1 Submenu assigned to Admin', '2017-09-16 07:50:25', '3', '0');
INSERT INTO `portallog` VALUES ('105', 'colma17001', '', ' logged in', '2017-09-18 12:21:17', '0', '0');
INSERT INTO `portallog` VALUES ('106', 'colma17001', '', 'Enter Payments For Imprest added as submenu to Cash Flowout menu in this application', '2017-09-20 05:59:35', '2', '0');
INSERT INTO `portallog` VALUES ('107', 'colma17001', '', '1 Submenu assigned to Admin', '2017-09-20 06:00:16', '3', '0');
INSERT INTO `portallog` VALUES ('108', 'colma17001', '', 'Imprest Expense added as submenu to Cash Flowout menu in this application', '2017-09-21 05:38:26', '2', '0');
INSERT INTO `portallog` VALUES ('109', 'colma17001', '', '1 Submenu assigned to Admin', '2017-09-21 05:38:39', '3', '0');
INSERT INTO `portallog` VALUES ('110', 'colma17001', '', 'Upload New Bulk Facility added as submenu to Facility Management menu in this application', '2017-09-21 07:17:14', '2', '0');
INSERT INTO `portallog` VALUES ('111', 'colma17001', '', '1 Submenu assigned to Admin', '2017-09-21 07:28:12', '3', '0');
INSERT INTO `portallog` VALUES ('112', 'colma17001', '', ' logged in', '2017-09-21 11:58:38', '0', '0');
INSERT INTO `portallog` VALUES ('113', 'colma17001', '', 'Edit Monthly Deduction added as submenu to Monthly Deductions menu in this application', '2017-09-25 20:20:56', '8', '0');
INSERT INTO `portallog` VALUES ('114', 'colma17001', '', '1 Submenu assigned to Admin', '2017-09-25 22:27:37', '3', '0');
INSERT INTO `portallog` VALUES ('115', 'colma17001', '', ' logged in', '2017-10-18 18:20:22', '0', '0');
INSERT INTO `portallog` VALUES ('116', 'colma17001', '', ' logged in', '2017-10-24 14:30:44', '0', '0');
INSERT INTO `portallog` VALUES ('117', 'colma17001', '', ' logged in', '2017-11-05 03:21:37', '0', '0');
INSERT INTO `portallog` VALUES ('118', 'colma17001', '', 'Edit Member Record added as submenu to Membership Control menu in this application', '2017-11-05 03:23:28', '2', '0');
INSERT INTO `portallog` VALUES ('119', 'colma17001', '', '1 Submenu assigned to Admin', '2017-11-05 03:24:04', '3', '0');
INSERT INTO `portallog` VALUES ('120', 'colma17001', '', ' logged in', '2017-11-10 12:48:28', '0', '0');

-- ----------------------------
-- Table structure for posts
-- ----------------------------
DROP TABLE IF EXISTS `posts`;
CREATE TABLE `posts` (
  `postid` int(11) NOT NULL AUTO_INCREMENT,
  `post` varchar(255) NOT NULL,
  `poststatus` int(11) NOT NULL,
  `datecreated` datetime NOT NULL DEFAULT '0000-00-00 00:00:00' ON UPDATE CURRENT_TIMESTAMP,
  `datechanged` datetime NOT NULL DEFAULT '0000-00-00 00:00:00' ON UPDATE CURRENT_TIMESTAMP,
  PRIMARY KEY (`postid`)
) ENGINE=MyISAM AUTO_INCREMENT=9 DEFAULT CHARSET=latin1;

-- ----------------------------
-- Records of posts
-- ----------------------------
INSERT INTO `posts` VALUES ('1', 'President', '1', '2017-09-02 03:44:43', '2017-09-02 03:44:43');
INSERT INTO `posts` VALUES ('2', 'Vice President', '1', '2017-09-02 03:44:42', '2017-09-02 03:44:42');
INSERT INTO `posts` VALUES ('3', 'Secretary', '1', '2017-09-02 03:44:42', '2017-09-02 03:44:42');
INSERT INTO `posts` VALUES ('4', 'Treasurer', '1', '2017-09-02 03:46:47', '2017-09-02 03:46:47');
INSERT INTO `posts` VALUES ('5', 'Financial Secretary', '1', '2017-09-02 03:46:21', '2017-09-02 03:46:21');
INSERT INTO `posts` VALUES ('6', 'Welfare', '1', '2017-09-02 03:46:21', '2017-09-02 03:46:21');
INSERT INTO `posts` VALUES ('7', 'P.R.O', '1', '2017-09-02 03:46:21', '2017-09-02 03:46:21');
INSERT INTO `posts` VALUES ('8', 'Asst. Gen. Secretary', '1', '2017-09-02 03:46:21', '2017-09-02 03:46:21');

-- ----------------------------
-- Table structure for relationships
-- ----------------------------
DROP TABLE IF EXISTS `relationships`;
CREATE TABLE `relationships` (
  `relid` int(11) NOT NULL AUTO_INCREMENT,
  `relname` varchar(255) NOT NULL,
  `relstatus` varchar(255) NOT NULL,
  PRIMARY KEY (`relid`)
) ENGINE=MyISAM AUTO_INCREMENT=2 DEFAULT CHARSET=latin1;

-- ----------------------------
-- Records of relationships
-- ----------------------------
INSERT INTO `relationships` VALUES ('1', 'sister', '1');

-- ----------------------------
-- Table structure for roles
-- ----------------------------
DROP TABLE IF EXISTS `roles`;
CREATE TABLE `roles` (
  `roleid` int(11) NOT NULL AUTO_INCREMENT,
  `rolename` varchar(255) NOT NULL,
  `status` int(11) NOT NULL,
  PRIMARY KEY (`roleid`)
) ENGINE=MyISAM AUTO_INCREMENT=3 DEFAULT CHARSET=latin1;

-- ----------------------------
-- Records of roles
-- ----------------------------
INSERT INTO `roles` VALUES ('1', 'admin', '1');
INSERT INTO `roles` VALUES ('2', 'user', '1');

-- ----------------------------
-- Table structure for savingsreschudling
-- ----------------------------
DROP TABLE IF EXISTS `savingsreschudling`;
CREATE TABLE `savingsreschudling` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `tno` int(11) NOT NULL,
  `memid` varchar(11) NOT NULL,
  `presentsavings` double NOT NULL,
  `proposedsavings` double NOT NULL,
  `startdate` date NOT NULL,
  `reason` varchar(255) NOT NULL,
  `formdate` datetime NOT NULL DEFAULT '0000-00-00 00:00:00' ON UPDATE CURRENT_TIMESTAMP,
  `officer` varchar(255) NOT NULL,
  `entrydate` datetime NOT NULL DEFAULT '0000-00-00 00:00:00' ON UPDATE CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=latin1;

-- ----------------------------
-- Records of savingsreschudling
-- ----------------------------
INSERT INTO `savingsreschudling` VALUES ('1', '1', '0', '768', '800', '2017-09-30', '', '2017-09-22 00:00:00', '10', '2017-09-11 00:00:00');
INSERT INTO `savingsreschudling` VALUES ('2', '2', 'colma17004', '768686', '800000', '2017-09-30', '', '2017-09-22 00:00:00', '10', '2017-09-11 15:29:05');
INSERT INTO `savingsreschudling` VALUES ('3', '3', 'colma17009', '400000', '500000', '2017-09-30', '', '2017-09-11 00:00:00', '10', '2017-09-11 18:29:15');

-- ----------------------------
-- Table structure for setoffreasons
-- ----------------------------
DROP TABLE IF EXISTS `setoffreasons`;
CREATE TABLE `setoffreasons` (
  `reasonid` int(11) NOT NULL AUTO_INCREMENT,
  `reason` varchar(255) NOT NULL,
  PRIMARY KEY (`reasonid`)
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=latin1;

-- ----------------------------
-- Records of setoffreasons
-- ----------------------------
INSERT INTO `setoffreasons` VALUES ('1', 'defaulting');
INSERT INTO `setoffreasons` VALUES ('2', 'relocation');
INSERT INTO `setoffreasons` VALUES ('3', 'voluntary withrawal');
INSERT INTO `setoffreasons` VALUES ('4', 'deceased');
INSERT INTO `setoffreasons` VALUES ('5', 'dismissal');

-- ----------------------------
-- Table structure for severances
-- ----------------------------
DROP TABLE IF EXISTS `severances`;
CREATE TABLE `severances` (
  `severanceid` int(11) NOT NULL,
  `memid` varchar(255) NOT NULL,
  `setoffreason` varchar(255) NOT NULL,
  `setoffremark` varchar(255) NOT NULL,
  `officer` varchar(255) NOT NULL,
  `datecreated` datetime NOT NULL DEFAULT '0000-00-00 00:00:00' ON UPDATE CURRENT_TIMESTAMP,
  PRIMARY KEY (`severanceid`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

-- ----------------------------
-- Records of severances
-- ----------------------------

-- ----------------------------
-- Table structure for shareincrement
-- ----------------------------
DROP TABLE IF EXISTS `shareincrement`;
CREATE TABLE `shareincrement` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `tno` int(11) NOT NULL,
  `formdate` date NOT NULL DEFAULT '0000-00-00',
  `memid` varchar(11) NOT NULL,
  `presentshare` double NOT NULL,
  `proposedshare` double NOT NULL,
  `receiptno` varchar(11) NOT NULL,
  `receiptdate` datetime NOT NULL DEFAULT '0000-00-00 00:00:00' ON UPDATE CURRENT_TIMESTAMP,
  `instrument` int(11) NOT NULL,
  `refno` varchar(11) NOT NULL,
  `refdate` datetime NOT NULL DEFAULT '0000-00-00 00:00:00' ON UPDATE CURRENT_TIMESTAMP,
  `officer` varchar(255) NOT NULL,
  `entrydate` datetime NOT NULL DEFAULT '0000-00-00 00:00:00' ON UPDATE CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=latin1;

-- ----------------------------
-- Records of shareincrement
-- ----------------------------
INSERT INTO `shareincrement` VALUES ('1', '1', '1970-01-01', '0', '10000', '200000', '787878', '2017-09-12 00:00:00', '4', '798789', '2017-09-12 00:00:00', '10', '2017-09-12 07:40:11');

-- ----------------------------
-- Table structure for society
-- ----------------------------
DROP TABLE IF EXISTS `society`;
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

-- ----------------------------
-- Records of society
-- ----------------------------
INSERT INTO `society` VALUES ('0', '', '', '0000-00-00', '', '', '', '', '', '', '', '', 'colma');

-- ----------------------------
-- Table structure for states
-- ----------------------------
DROP TABLE IF EXISTS `states`;
CREATE TABLE `states` (
  `state_id` smallint(6) NOT NULL DEFAULT '0',
  `state_name` varchar(20) NOT NULL DEFAULT '',
  `state_code` varchar(2) NOT NULL,
  `countrycode` varchar(5) NOT NULL DEFAULT '159',
  `countryid` int(11) NOT NULL,
  PRIMARY KEY (`state_id`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

-- ----------------------------
-- Records of states
-- ----------------------------
INSERT INTO `states` VALUES ('1', 'Abia', 'AB', 'NG', '0');
INSERT INTO `states` VALUES ('2', 'Adamawa', 'AD', 'NG', '0');
INSERT INTO `states` VALUES ('3', 'Akwa Ibom', 'AK', 'NG', '0');
INSERT INTO `states` VALUES ('4', 'Anambra', 'AN', 'NG', '0');
INSERT INTO `states` VALUES ('5', 'Bauchi', 'BA', 'NG', '0');
INSERT INTO `states` VALUES ('6', 'Bayelsa', 'BY', 'NG', '0');
INSERT INTO `states` VALUES ('7', 'Benue', 'BN', 'NG', '0');
INSERT INTO `states` VALUES ('8', 'Borno', 'BO', 'NG', '0');
INSERT INTO `states` VALUES ('9', 'Cross River', 'CR', 'NG', '0');
INSERT INTO `states` VALUES ('10', 'Delta', 'DT', 'NG', '0');
INSERT INTO `states` VALUES ('11', 'Ebonyi', 'EB', 'NG', '0');
INSERT INTO `states` VALUES ('12', 'Edo', 'ED', 'NG', '0');
INSERT INTO `states` VALUES ('13', 'Ekiti', 'EK', 'NG', '0');
INSERT INTO `states` VALUES ('14', 'Enugu', 'EN', 'NG', '0');
INSERT INTO `states` VALUES ('15', 'Gombe', 'GM', 'NG', '0');
INSERT INTO `states` VALUES ('16', 'Imo', 'IM', 'NG', '0');
INSERT INTO `states` VALUES ('17', 'Jigawa', 'JG', 'NG', '0');
INSERT INTO `states` VALUES ('18', 'Kaduna', 'KD', 'NG', '0');
INSERT INTO `states` VALUES ('19', 'Kano', 'KN', 'NG', '0');
INSERT INTO `states` VALUES ('20', 'Katsina', 'KT', 'NG', '0');
INSERT INTO `states` VALUES ('21', 'Kebbi', 'KB', 'NG', '0');
INSERT INTO `states` VALUES ('22', 'Kogi', 'KG', 'NG', '0');
INSERT INTO `states` VALUES ('23', 'Kwara', 'KW', 'NG', '0');
INSERT INTO `states` VALUES ('24', 'Lagos', 'LA', 'NG', '0');
INSERT INTO `states` VALUES ('25', 'Nasarawa', 'NS', 'NG', '0');
INSERT INTO `states` VALUES ('26', 'Niger', 'NG', 'NG', '0');
INSERT INTO `states` VALUES ('27', 'Ogun', 'OG', 'NG', '0');
INSERT INTO `states` VALUES ('28', 'Ondo', 'OD', 'NG', '0');
INSERT INTO `states` VALUES ('29', 'Osun', 'OS', 'NG', '0');
INSERT INTO `states` VALUES ('30', 'Oyo', 'OY', 'NG', '0');
INSERT INTO `states` VALUES ('31', 'Plateau', 'PT', 'NG', '0');
INSERT INTO `states` VALUES ('32', 'Rivers', 'RV', 'NG', '0');
INSERT INTO `states` VALUES ('33', 'Sokoto', 'SK', 'NG', '0');
INSERT INTO `states` VALUES ('34', 'Taraba', 'TR', 'NG', '0');
INSERT INTO `states` VALUES ('35', 'Yobe', 'YB', 'NG', '0');
INSERT INTO `states` VALUES ('36', 'Zamfara', 'ZF', 'NG', '0');
INSERT INTO `states` VALUES ('37', 'FCT', 'FC', 'NG', '0');
INSERT INTO `states` VALUES ('38', 'Foreign', '', '0', '0');

-- ----------------------------
-- Table structure for submenutypes
-- ----------------------------
DROP TABLE IF EXISTS `submenutypes`;
CREATE TABLE `submenutypes` (
  `submenutypeid` int(11) NOT NULL AUTO_INCREMENT,
  `submenutypename` varchar(255) NOT NULL,
  PRIMARY KEY (`submenutypeid`)
) ENGINE=MyISAM AUTO_INCREMENT=3 DEFAULT CHARSET=latin1;

-- ----------------------------
-- Records of submenutypes
-- ----------------------------
INSERT INTO `submenutypes` VALUES ('1', 'main submenu');
INSERT INTO `submenutypes` VALUES ('2', 'submenu link');

-- ----------------------------
-- Table structure for titles
-- ----------------------------
DROP TABLE IF EXISTS `titles`;
CREATE TABLE `titles` (
  `titleid` int(11) NOT NULL AUTO_INCREMENT,
  `fulltitle` varchar(255) NOT NULL,
  `title` varchar(50) NOT NULL,
  `titlestatus` int(11) NOT NULL,
  PRIMARY KEY (`titleid`)
) ENGINE=MyISAM AUTO_INCREMENT=10 DEFAULT CHARSET=latin1;

-- ----------------------------
-- Records of titles
-- ----------------------------
INSERT INTO `titles` VALUES ('1', 'MR', 'MR', '1');
INSERT INTO `titles` VALUES ('2', 'MRS', 'MRS', '1');
INSERT INTO `titles` VALUES ('3', 'MISS', 'MISS', '1');
INSERT INTO `titles` VALUES ('4', 'DOCTOR', 'DR', '1');
INSERT INTO `titles` VALUES ('5', 'PROFESSOR', 'PROF', '1');
INSERT INTO `titles` VALUES ('6', 'PASTOR', 'PST', '1');
INSERT INTO `titles` VALUES ('7', 'DEACON', 'DCN', '1');
INSERT INTO `titles` VALUES ('8', 'DEACONESS', 'DCNS', '1');
INSERT INTO `titles` VALUES ('9', 'ARCHITECT', 'ARC', '1');

-- ----------------------------
-- Table structure for trn_user_log
-- ----------------------------
DROP TABLE IF EXISTS `trn_user_log`;
CREATE TABLE `trn_user_log` (
  `app_id` int(11) DEFAULT NULL,
  `transaction_id` int(11) DEFAULT NULL,
  `mobile_no` varchar(15) DEFAULT NULL,
  `node_id` int(11) DEFAULT NULL,
  `customer_attribute` datetime DEFAULT NULL,
  `entered_value` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- ----------------------------
-- Records of trn_user_log
-- ----------------------------
INSERT INTO `trn_user_log` VALUES ('100', '111', '9999999999', '1', '2001-01-01 00:00:00', '2');
INSERT INTO `trn_user_log` VALUES ('100', '111', '9999999999', '2', '2001-02-01 00:00:00', '1');
INSERT INTO `trn_user_log` VALUES ('100', '111', '9999999999', '3', '2001-03-01 00:00:00', '4');
INSERT INTO `trn_user_log` VALUES ('100', '111', '9999999999', '4', '2001-04-01 00:00:00', '3');
INSERT INTO `trn_user_log` VALUES ('100', '111', '9999999999', '5', '2001-05-01 00:00:00', '2');
INSERT INTO `trn_user_log` VALUES ('100', '222', '8888888888', '4', '2001-04-01 00:00:00', '1');
INSERT INTO `trn_user_log` VALUES ('100', '222', '8888888888', '3', '2001-03-01 00:00:00', '2');
INSERT INTO `trn_user_log` VALUES ('100', '222', '8888888888', '2', '2001-02-01 00:00:00', '1');
INSERT INTO `trn_user_log` VALUES ('100', '222', '8888888888', '1', '2001-01-01 00:00:00', '3');
INSERT INTO `trn_user_log` VALUES ('100', '222', '8888888888', '5', '2001-05-01 00:00:00', '4');

-- ----------------------------
-- Table structure for userrights
-- ----------------------------
DROP TABLE IF EXISTS `userrights`;
CREATE TABLE `userrights` (
  `userrightid` int(11) NOT NULL AUTO_INCREMENT,
  `appsubmenuid` int(11) NOT NULL,
  `roleid` int(11) NOT NULL,
  `status` int(11) NOT NULL,
  `submenustatus` int(11) NOT NULL,
  `menustatus` int(11) NOT NULL,
  `rolestatus` int(11) NOT NULL,
  PRIMARY KEY (`userrightid`)
) ENGINE=MyISAM AUTO_INCREMENT=47 DEFAULT CHARSET=latin1 ROW_FORMAT=FIXED;

-- ----------------------------
-- Records of userrights
-- ----------------------------
INSERT INTO `userrights` VALUES ('1', '3', '1', '1', '1', '1', '1');
INSERT INTO `userrights` VALUES ('2', '8', '1', '1', '1', '1', '1');
INSERT INTO `userrights` VALUES ('3', '12', '1', '1', '1', '1', '1');
INSERT INTO `userrights` VALUES ('4', '14', '1', '1', '1', '1', '1');
INSERT INTO `userrights` VALUES ('5', '15', '1', '1', '1', '1', '1');
INSERT INTO `userrights` VALUES ('6', '17', '1', '1', '1', '1', '1');
INSERT INTO `userrights` VALUES ('7', '10', '1', '1', '1', '1', '1');
INSERT INTO `userrights` VALUES ('8', '9', '1', '1', '1', '1', '1');
INSERT INTO `userrights` VALUES ('9', '7', '1', '1', '1', '1', '1');
INSERT INTO `userrights` VALUES ('10', '6', '1', '1', '1', '1', '1');
INSERT INTO `userrights` VALUES ('11', '5', '1', '1', '1', '1', '1');
INSERT INTO `userrights` VALUES ('12', '4', '1', '1', '1', '1', '1');
INSERT INTO `userrights` VALUES ('13', '1', '1', '1', '1', '1', '1');
INSERT INTO `userrights` VALUES ('14', '2', '1', '1', '1', '1', '1');
INSERT INTO `userrights` VALUES ('15', '11', '1', '1', '1', '1', '1');
INSERT INTO `userrights` VALUES ('16', '13', '1', '1', '1', '1', '1');
INSERT INTO `userrights` VALUES ('17', '16', '1', '1', '1', '1', '1');
INSERT INTO `userrights` VALUES ('18', '18', '1', '1', '1', '1', '1');
INSERT INTO `userrights` VALUES ('19', '19', '1', '1', '1', '1', '1');
INSERT INTO `userrights` VALUES ('20', '20', '1', '1', '1', '1', '1');
INSERT INTO `userrights` VALUES ('21', '21', '1', '1', '1', '1', '1');
INSERT INTO `userrights` VALUES ('22', '22', '1', '1', '1', '1', '1');
INSERT INTO `userrights` VALUES ('23', '23', '1', '1', '1', '1', '1');
INSERT INTO `userrights` VALUES ('24', '24', '1', '1', '1', '1', '1');
INSERT INTO `userrights` VALUES ('25', '25', '1', '1', '1', '1', '1');
INSERT INTO `userrights` VALUES ('26', '26', '1', '1', '1', '1', '1');
INSERT INTO `userrights` VALUES ('27', '27', '1', '1', '1', '1', '1');
INSERT INTO `userrights` VALUES ('28', '28', '1', '1', '1', '1', '1');
INSERT INTO `userrights` VALUES ('29', '29', '1', '1', '1', '1', '1');
INSERT INTO `userrights` VALUES ('30', '30', '1', '1', '1', '1', '1');
INSERT INTO `userrights` VALUES ('31', '31', '1', '1', '1', '1', '1');
INSERT INTO `userrights` VALUES ('32', '32', '1', '1', '1', '1', '1');
INSERT INTO `userrights` VALUES ('33', '33', '1', '1', '1', '1', '1');
INSERT INTO `userrights` VALUES ('34', '34', '1', '1', '1', '1', '1');
INSERT INTO `userrights` VALUES ('35', '35', '1', '1', '1', '1', '1');
INSERT INTO `userrights` VALUES ('36', '36', '1', '1', '1', '1', '1');
INSERT INTO `userrights` VALUES ('37', '37', '1', '1', '1', '1', '1');
INSERT INTO `userrights` VALUES ('38', '38', '1', '1', '1', '1', '1');
INSERT INTO `userrights` VALUES ('39', '39', '1', '1', '1', '1', '1');
INSERT INTO `userrights` VALUES ('40', '40', '1', '1', '1', '1', '1');
INSERT INTO `userrights` VALUES ('41', '41', '1', '1', '1', '1', '1');
INSERT INTO `userrights` VALUES ('42', '42', '1', '1', '1', '1', '1');
INSERT INTO `userrights` VALUES ('43', '43', '1', '1', '1', '1', '1');
INSERT INTO `userrights` VALUES ('44', '44', '1', '1', '1', '1', '1');
INSERT INTO `userrights` VALUES ('45', '45', '1', '1', '1', '1', '1');
INSERT INTO `userrights` VALUES ('46', '46', '1', '1', '1', '1', '1');

-- ----------------------------
-- Table structure for userroles
-- ----------------------------
DROP TABLE IF EXISTS `userroles`;
CREATE TABLE `userroles` (
  `userrolesid` int(11) NOT NULL AUTO_INCREMENT,
  `loginid` int(11) NOT NULL,
  `roleid` int(11) NOT NULL,
  `status` int(11) NOT NULL,
  `rolestatus` int(11) NOT NULL,
  PRIMARY KEY (`userrolesid`)
) ENGINE=MyISAM AUTO_INCREMENT=2 DEFAULT CHARSET=latin1;

-- ----------------------------
-- Records of userroles
-- ----------------------------
INSERT INTO `userroles` VALUES ('1', '1', '1', '1', '1');

-- ----------------------------
-- Table structure for users
-- ----------------------------
DROP TABLE IF EXISTS `users`;
CREATE TABLE `users` (
  `userid` varchar(11) NOT NULL,
  `sname` varchar(255) NOT NULL,
  `mname` varchar(255) NOT NULL,
  `fname` varchar(255) NOT NULL,
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `title` int(11) NOT NULL,
  `userstatus` int(11) NOT NULL,
  `gender` varchar(255) NOT NULL,
  `emailadd` varchar(255) NOT NULL,
  PRIMARY KEY (`userid`,`id`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

-- ----------------------------
-- Records of users
-- ----------------------------
INSERT INTO `users` VALUES ('admin', 'adamu', 'paul', 'john', '1', '5', '1', '1', 'adamu.john@covenantuniversity.edu.ng');
INSERT INTO `users` VALUES ('student', 'Ciroma', 'Chukwuma', 'Adekunle', '1', '0', '1', '2', '');

-- ----------------------------
-- Table structure for usertypes
-- ----------------------------
DROP TABLE IF EXISTS `usertypes`;
CREATE TABLE `usertypes` (
  `usertypeid` int(11) NOT NULL AUTO_INCREMENT,
  `usertypename` varchar(255) NOT NULL,
  `usertypeurl` varchar(255) NOT NULL,
  `status` int(11) NOT NULL,
  PRIMARY KEY (`usertypeid`)
) ENGINE=MyISAM AUTO_INCREMENT=3 DEFAULT CHARSET=latin1;

-- ----------------------------
-- Records of usertypes
-- ----------------------------
INSERT INTO `usertypes` VALUES ('1', 'staff', 'administration.php', '1');
INSERT INTO `usertypes` VALUES ('2', 'student', 'studentdashboard.php', '1');

-- ----------------------------
-- Table structure for wofbilevel
-- ----------------------------
DROP TABLE IF EXISTS `wofbilevel`;
CREATE TABLE `wofbilevel` (
  `certid` int(11) NOT NULL AUTO_INCREMENT,
  `certabbr` varchar(255) NOT NULL,
  `certname` varchar(255) NOT NULL,
  `certstatus` int(11) NOT NULL,
  PRIMARY KEY (`certid`)
) ENGINE=MyISAM AUTO_INCREMENT=2 DEFAULT CHARSET=latin1;

-- ----------------------------
-- Records of wofbilevel
-- ----------------------------
INSERT INTO `wofbilevel` VALUES ('1', 'bcc', 'basic certificate course', '1');

-- ----------------------------
-- View structure for memlst
-- ----------------------------
DROP VIEW IF EXISTS `memlst`;
CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`localhost`  VIEW `memlst` AS SELECT
memberregister.id,
memberregister.memid,
memberregister.title,
memberregister.sname,
memberregister.fname,
memberregister.mname,
memberregister.dob,
memberregister.gender,
memberregister.mstat,
memberregister.nationality,
memberregister.homeadd1,
memberregister.homeadd2,
memberregister.homeadd3,
memberregister.state,
memberregister.country,
memberregister.phoneno,
memberregister.email,
memberregister.busnature,
memberregister.busadd1,
memberregister.busadd2,
memberregister.busadd3,
memberregister.busstate,
memberregister.buscountry,
memberregister.chyr,
memberregister.wofbilevel,
memberregister.province,
memberregister.district,
memberregister.zone,
memberregister.wsflocation,
memberregister.nkintitle,
memberregister.nkinsname,
memberregister.nkinfname,
memberregister.nkinmname,
memberregister.nkinrel,
memberregister.nkadd1,
memberregister.nkadd2,
memberregister.nkadd3,
memberregister.nkstate,
memberregister.nkcountry,
memberregister.nkphoneno,
memberregister.nkemail,
memberregister.datejoin,
memberregister.monthlysavings,
memberregister.accountnumber,
memberregister.groupid,
memberregister.shareamount,
memberregister.memstatus,
memberregister.datecreated,
memberregister.officer
FROM
memberregister
WHERE
memberregister.memstatus = 1 ;
