-- phpMyAdmin SQL Dump
-- version 3.2.4
-- http://www.phpmyadmin.net
--
-- Host: localhost
-- Generation Time: Jan 23, 2014 at 06:18 PM
-- Server version: 5.1.41
-- PHP Version: 5.3.1

SET SQL_MODE="NO_AUTO_VALUE_ON_ZERO";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `wkn_ems`
--

-- --------------------------------------------------------

--
-- Table structure for table `tbl_emp`
--

CREATE TABLE IF NOT EXISTS `tbl_emp` (
  `emp_id` int(11) NOT NULL AUTO_INCREMENT,
  `emp_reg_id` int(11) NOT NULL,
  `emp_name` varchar(200) NOT NULL,
  `emp_age` int(11) NOT NULL,
  `emp_father_name` varchar(300) NOT NULL,
  `emp_mother_name` varchar(300) NOT NULL,
  `emp_dob` varchar(100) NOT NULL,
  `emp_office_no` int(11) NOT NULL,
  `emp_office_email` varchar(200) NOT NULL,
  `emp_desination` varchar(300) NOT NULL,
  `emp_dpt` enum('Marketing','Back Office','H.R.','Accounts','Admin') NOT NULL,
  `emp_under` varchar(300) NOT NULL,
  `emp_bank` varchar(300) NOT NULL,
  `emp_ac_no` varchar(300) NOT NULL,
  `emp_pan_no` varchar(300) NOT NULL,
  `emp_code` varchar(300) NOT NULL,
  `emp_param_adrs` varchar(300) NOT NULL,
  `emp_res_adrs` varchar(300) NOT NULL,
  `emp_ref_name` varchar(700) NOT NULL,
  `emp_ref_contact_no` varchar(700) NOT NULL,
  `emp_join_date` varchar(200) NOT NULL,
  `emp_res_date` datetime NOT NULL,
  `emp_rejoin_date` datetime NOT NULL,
  `emp_exp` int(11) NOT NULL,
  `emp_status` enum('WORKING','RESIGN','REJOIN') NOT NULL,
  PRIMARY KEY (`emp_id`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=24 ;

--
-- Dumping data for table `tbl_emp`
--

INSERT INTO `tbl_emp` (`emp_id`, `emp_reg_id`, `emp_name`, `emp_age`, `emp_father_name`, `emp_mother_name`, `emp_dob`, `emp_office_no`, `emp_office_email`, `emp_desination`, `emp_dpt`, `emp_under`, `emp_bank`, `emp_ac_no`, `emp_pan_no`, `emp_code`, `emp_param_adrs`, `emp_res_adrs`, `emp_ref_name`, `emp_ref_contact_no`, `emp_join_date`, `emp_res_date`, `emp_rejoin_date`, `emp_exp`, `emp_status`) VALUES
(19, 21, 'Ajay Kumar', 22, 'ggg', 'ddddd', '01/31/2014', 555, 'aa', 'ggg', 'Marketing', 'Marketing', 'gggg', 'sss', 'ddd', '1', '2222', 'eee', 'eeee', '5555', '0000-00-00 00:00:00', '0000-00-00 00:00:00', '0000-00-00 00:00:00', 5, 'WORKING'),
(20, 22, 'vijay Kumar', 22, 'ggg', 'ddddd', '01/31/2014', 555, 'aa', 'ggg', 'Back Office', 'Accounts', 'gggg', 'sss', 'ddd', '2', '2222', 'eee', 'eeee', '5555', '0000-00-00 00:00:00', '0000-00-00 00:00:00', '0000-00-00 00:00:00', 5, 'WORKING'),
(23, 25, 'Ajasy Kumar', 22, 'ggg', 'ddddd', '01/25/2014', 555, 'aa', 'ggg', '', 'H.R', 'gggg', 'sss', 'ddd', '5', 'sss', 'sss', 'ddd', '5555', '01/29/2014', '0000-00-00 00:00:00', '0000-00-00 00:00:00', 5, 'RESIGN');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_registration`
--

CREATE TABLE IF NOT EXISTS `tbl_registration` (
  `reg_id` int(11) NOT NULL AUTO_INCREMENT,
  `reg_uname` varchar(200) NOT NULL,
  `reg_name` varchar(200) NOT NULL,
  `reg_type` enum('ADMIN','HR','EMPLOYEE') NOT NULL,
  `reg_pass` varchar(200) NOT NULL,
  `reg_date` datetime NOT NULL,
  `reg_status` enum('Active','Inactive') NOT NULL DEFAULT 'Inactive',
  PRIMARY KEY (`reg_id`),
  UNIQUE KEY `reg_uname` (`reg_uname`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=26 ;

--
-- Dumping data for table `tbl_registration`
--

INSERT INTO `tbl_registration` (`reg_id`, `reg_uname`, `reg_name`, `reg_type`, `reg_pass`, `reg_date`, `reg_status`) VALUES
(1, 'admin', 'admin', 'ADMIN', 'admin', '2014-01-22 15:16:36', 'Active'),
(25, 'Ajasy Kumar', 'Ajasy Kumar', 'EMPLOYEE', 'Ajasy Kumar', '2014-01-23 14:09:32', 'Active'),
(22, 'vijay Kumar', 'vijay Kumar', 'EMPLOYEE', 'vijay Kumar', '2014-01-23 11:37:23', 'Active'),
(21, 'Ajay Kumar', 'Ajay Kumar', 'EMPLOYEE', 'Ajay Kumar', '2014-01-23 11:33:23', 'Active');

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
