-- phpMyAdmin SQL Dump
-- version 3.5.2.2
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: Sep 28, 2014 at 08:51 AM
-- Server version: 5.5.27
-- PHP Version: 5.4.7

SET SQL_MODE="NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `workgram`
--

-- --------------------------------------------------------

--
-- Table structure for table `company`
--

CREATE TABLE IF NOT EXISTS `company` (
  `company_code` int(11) NOT NULL AUTO_INCREMENT,
  `company_name` varchar(100) NOT NULL,
  `company_email` varchar(100) NOT NULL,
  `company_address` varchar(100) NOT NULL,
  `company_contact` varchar(30) NOT NULL,
  `company_desc` text,
  `del_ind` enum('1','0') NOT NULL DEFAULT '1',
  PRIMARY KEY (`company_code`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=3 ;

--
-- Dumping data for table `company`
--

INSERT INTO `company` (`company_code`, `company_name`, `company_email`, `company_address`, `company_contact`, `company_desc`, `del_ind`) VALUES
(1, 'workgram', 'workgram@gmail.com', 'workgram', '2412125', 'workgram', '1'),
(2, 'czxc', 'zc@dsa.gsds', 'zxc', '5235', '    sfdfd', '0');

-- --------------------------------------------------------

--
-- Table structure for table `company_settings`
--

CREATE TABLE IF NOT EXISTS `company_settings` (
  `company_setting_id` int(11) NOT NULL AUTO_INCREMENT,
  `company_id` int(11) NOT NULL,
  `setting_id` int(11) NOT NULL,
  `setting_parameter_id` int(11) NOT NULL,
  `added_date` datetime NOT NULL,
  PRIMARY KEY (`company_setting_id`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=2 ;

--
-- Dumping data for table `company_settings`
--

INSERT INTO `company_settings` (`company_setting_id`, `company_id`, `setting_id`, `setting_parameter_id`, `added_date`) VALUES
(1, 1, 1, 3, '2014-01-03 10:34:36');

-- --------------------------------------------------------

--
-- Table structure for table `employee`
--

CREATE TABLE IF NOT EXISTS `employee` (
  `employee_code` int(11) NOT NULL AUTO_INCREMENT,
  `employee_no` varchar(30) DEFAULT NULL,
  `employee_fname` varchar(100) NOT NULL,
  `employee_lname` varchar(100) NOT NULL,
  `employee_password` varchar(100) NOT NULL,
  `employee_email` varchar(100) NOT NULL,
  `employee_type` varchar(30) NOT NULL,
  `employee_bday` date DEFAULT NULL,
  `employee_contact` varchar(30) DEFAULT NULL,
  `employee_wages_category` int(11) DEFAULT NULL,
  `employee_contract` varchar(30) NOT NULL,
  `employee_avatar` varchar(100) DEFAULT NULL,
  `employee_cover_image` varchar(400) DEFAULT NULL,
  `account_activation_code` varchar(100) NOT NULL,
  `company_code` int(11) NOT NULL,
  `is_online` enum('Y','N') DEFAULT 'N' COMMENT 'Online =Y,Offline=N',
  `del_ind` enum('1','0','2') NOT NULL COMMENT '0-deactivate,1 -active, 2-pending(Inserted Employee record from mail server)',
  `added_by` int(11) DEFAULT NULL,
  `added_date` timestamp NULL DEFAULT NULL,
  `updated_by` int(11) DEFAULT NULL,
  `updated_date` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`employee_code`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=8 ;

--
-- Dumping data for table `employee`
--

INSERT INTO `employee` (`employee_code`, `employee_no`, `employee_fname`, `employee_lname`, `employee_password`, `employee_email`, `employee_type`, `employee_bday`, `employee_contact`, `employee_wages_category`, `employee_contract`, `employee_avatar`, `employee_cover_image`, `account_activation_code`, `company_code`, `is_online`, `del_ind`, `added_by`, `added_date`, `updated_by`, `updated_date`) VALUES
(1, '1', 'Shamain', 'Peiris', 'c4961b067d274050e43e26beb9d7d19c', 'shamaingdd@gmail.com', 'employee type', '1991-06-10', '0758376047', 412125125, 'dasds', 'employee_avatar1408164180-531709_575297122495442_553449702_n.jpg', 'default_cover_pic.png', '', 1, 'Y', '1', 12, '2014-05-20 18:30:00', NULL, NULL),
(2, '1', 'Gayathma', 'Perera', 'c4961b067d274050e43e26beb9d7d19c', 'gayathma3@gmail.com', '1', '1991-04-10', '222', NULL, 'FULL_TIME', NULL, 'default_cover_pic.png', '', 1, 'Y', '1', 12, '2014-05-30 23:30:00', NULL, NULL),
(3, '3', 'Rachini', 'Perera', 'b01509c878e24c0dfd78da7bae7d5e70', 'rachini@gmail.com', '2', '2014-06-12', '2332623623', 213232, 'FULL_TIME', 'employee_avatar1408607805-765-default-avatar.png', 'default_cover_pic.png', '', 1, 'N', '1', 0, '2014-07-11 12:40:36', NULL, NULL),
(4, '4', 'Dahami', 'Perera', 'c4961b067d274050e43e26beb9d7d19c', 'dahami@gmail.com', '1', '2014-06-20', '34535', 32535, '235', '', 'default_cover_pic.png', '', 1, '', '1', 1, '2014-06-13 18:30:00', NULL, NULL),
(5, '5', 'Kaumadi', 'Perera', 'd41d8cd98f00b204e9800998ecf8427e', 'kaumadi@gmail.com', '1', '2014-06-20', '3453534', 2, 'FULL_TIME', 'avatar.jpg', NULL, '', 1, '', '1', 1, '2014-06-13 18:30:00', 2, '2014-08-29 10:59:18'),
(6, '6', 'Dilupa', 'Perera', 'd41d8cd98f00b204e9800998ecf8427e', 'dilupa@gmail.com', '1', '2014-06-28', '4234234', 2, 'PART_TIME', 'avatar.jpg', NULL, '', 1, '', '1', 1, '2014-06-13 18:30:00', 2, '2014-08-29 10:59:32'),
(7, 'd', 'dD', 'dDd', 'd41d8cd98f00b204e9800998ecf8427e', 'dd@dasd.fsf', '1', '0000-00-00', '43434', 0, 'FULL_TIME', 'default_cover_pic.png', NULL, '3', 1, NULL, '1', 2, '2014-08-23 00:36:26', 2, '2014-08-24 13:34:34');

-- --------------------------------------------------------

--
-- Table structure for table `employee_attendance`
--

CREATE TABLE IF NOT EXISTS `employee_attendance` (
  `employee_attendance_id` int(11) NOT NULL AUTO_INCREMENT,
  `employee_code` int(11) NOT NULL,
  `date` date NOT NULL,
  `login_time` time NOT NULL,
  `login_out_time` time NOT NULL,
  `worked_hours` float NOT NULL DEFAULT '0',
  `type` enum('H','F') NOT NULL,
  PRIMARY KEY (`employee_attendance_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=2 ;

--
-- Dumping data for table `employee_attendance`
--

INSERT INTO `employee_attendance` (`employee_attendance_id`, `employee_code`, `date`, `login_time`, `login_out_time`, `worked_hours`, `type`) VALUES
(1, 2, '2014-09-08', '00:00:09', '00:00:10', 0, 'H');

-- --------------------------------------------------------

--
-- Table structure for table `employee_event`
--

CREATE TABLE IF NOT EXISTS `employee_event` (
  `employee_event_id` int(11) NOT NULL AUTO_INCREMENT,
  `event_id` int(11) NOT NULL,
  `employee_code` int(11) NOT NULL,
  PRIMARY KEY (`employee_event_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=15 ;

--
-- Dumping data for table `employee_event`
--

INSERT INTO `employee_event` (`employee_event_id`, `event_id`, `employee_code`) VALUES
(1, 1, 7),
(2, 1, 6),
(3, 1, 5),
(4, 1, 4),
(5, 1, 3),
(6, 1, 2),
(7, 1, 1),
(8, 1, 7),
(9, 1, 6),
(10, 1, 5),
(11, 1, 4),
(12, 1, 3),
(13, 1, 2),
(14, 1, 1);

-- --------------------------------------------------------

--
-- Table structure for table `employee_payment`
--

CREATE TABLE IF NOT EXISTS `employee_payment` (
  `pay_id` int(11) NOT NULL AUTO_INCREMENT,
  `employee_code` int(11) NOT NULL,
  `company_code` int(11) NOT NULL,
  `wages_category_id` int(11) NOT NULL,
  `year_month` date DEFAULT NULL,
  `amount` decimal(10,0) NOT NULL,
  `is_paid` enum('Y','N') CHARACTER SET utf8 DEFAULT 'N',
  PRIMARY KEY (`pay_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=2 ;

--
-- Dumping data for table `employee_payment`
--

INSERT INTO `employee_payment` (`pay_id`, `employee_code`, `company_code`, `wages_category_id`, `year_month`, `amount`, `is_paid`) VALUES
(1, 7, 1, 1, '2014-01-01', 20000, 'Y');

-- --------------------------------------------------------

--
-- Table structure for table `employee_privileges`
--

CREATE TABLE IF NOT EXISTS `employee_privileges` (
  `employee_privilege_code` int(11) NOT NULL AUTO_INCREMENT,
  `employee_code` int(11) NOT NULL,
  `privilege_code` int(11) NOT NULL,
  `added_date` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`employee_privilege_code`),
  UNIQUE KEY `Employeeuser_Priviledge_Code` (`employee_privilege_code`),
  KEY `Employee_Code` (`employee_code`),
  KEY `Privilege_Code` (`privilege_code`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=49 ;

--
-- Dumping data for table `employee_privileges`
--

INSERT INTO `employee_privileges` (`employee_privilege_code`, `employee_code`, `privilege_code`, `added_date`) VALUES
(24, 12, 10, '2014-07-07 16:49:19'),
(25, 12, 9, '2014-07-07 16:50:45'),
(38, 2, 16, '2014-09-27 05:42:35'),
(39, 2, 9, '2014-09-27 16:21:17'),
(40, 2, 10, '2014-09-27 16:21:17'),
(41, 2, 17, '2014-09-27 16:21:17'),
(42, 2, 18, '2014-09-27 16:21:17'),
(43, 2, 19, '2014-09-27 16:21:17'),
(44, 2, 20, '2014-09-27 16:34:01'),
(46, 2, 21, '2014-09-27 16:38:43'),
(47, 2, 22, '2014-09-27 16:38:43'),
(48, 2, 23, '2014-09-27 16:39:18');

-- --------------------------------------------------------

--
-- Table structure for table `employee_screenshot`
--

CREATE TABLE IF NOT EXISTS `employee_screenshot` (
  `employee_screenshot_id` int(11) NOT NULL AUTO_INCREMENT,
  `employee_code` int(11) NOT NULL,
  `project_id` int(11) NOT NULL,
  `task_id` int(11) NOT NULL,
  `date` datetime NOT NULL,
  `image` varchar(200) NOT NULL,
  `del_ind` enum('1','0') NOT NULL,
  PRIMARY KEY (`employee_screenshot_id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `employee_skill`
--

CREATE TABLE IF NOT EXISTS `employee_skill` (
  `employee_skill_id` int(11) NOT NULL AUTO_INCREMENT,
  `skill_code` int(11) NOT NULL,
  `employee_code` int(11) NOT NULL,
  `expert_level` float NOT NULL DEFAULT '0',
  `reference` varchar(400) DEFAULT NULL,
  `del_ind` enum('1','0') NOT NULL,
  `added_date` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  PRIMARY KEY (`employee_skill_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=9 ;

--
-- Dumping data for table `employee_skill`
--

INSERT INTO `employee_skill` (`employee_skill_id`, `skill_code`, `employee_code`, `expert_level`, `reference`, `del_ind`, `added_date`) VALUES
(1, 3, 2, 69.5652, '', '0', '2014-08-23 05:40:32'),
(2, 4, 2, 71.0145, '', '0', '2014-08-23 05:41:02'),
(3, 7, 2, 100, '', '1', '2014-08-29 14:37:13'),
(4, 8, 2, 47.8261, '', '1', '2014-08-23 02:00:01'),
(5, 3, 2, 47.8261, '', '1', '2014-08-23 02:10:44'),
(6, 4, 2, 52.1739, '', '1', '2014-08-23 02:11:15'),
(7, 9, 2, 71.0145, '', '1', '2014-08-23 02:40:23'),
(8, 7, 1, 100, '', '1', '2014-08-25 03:21:43');

-- --------------------------------------------------------

--
-- Table structure for table `employee_tasks`
--

CREATE TABLE IF NOT EXISTS `employee_tasks` (
  `employee_task_id` int(11) NOT NULL AUTO_INCREMENT,
  `employee_id` int(11) NOT NULL,
  `task_id` int(11) NOT NULL,
  `task_status` enum('1','0') NOT NULL DEFAULT '0',
  `added_date` datetime NOT NULL,
  PRIMARY KEY (`employee_task_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=7 ;

--
-- Dumping data for table `employee_tasks`
--

INSERT INTO `employee_tasks` (`employee_task_id`, `employee_id`, `task_id`, `task_status`, `added_date`) VALUES
(1, 2, 1, '0', '0000-00-00 00:00:00'),
(2, 3, 1, '0', '2014-07-25 00:00:00'),
(3, 1, 7, '0', '2014-08-25 05:43:16'),
(4, 2, 2, '0', '2014-08-25 05:45:29'),
(5, 2, 4, '0', '2014-08-25 05:45:29'),
(6, 1, 8, '0', '2014-08-25 05:45:29');

-- --------------------------------------------------------

--
-- Table structure for table `event`
--

CREATE TABLE IF NOT EXISTS `event` (
  `event_id` int(11) NOT NULL AUTO_INCREMENT,
  `event_title` varchar(100) NOT NULL,
  `event_description` varchar(300) DEFAULT NULL,
  `event_type` varchar(100) NOT NULL,
  `start_date` date NOT NULL,
  `end_date` date NOT NULL,
  `del_ind` enum('1','0') NOT NULL,
  `added_by` int(11) DEFAULT NULL,
  `added_date` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`event_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=3 ;

--
-- Dumping data for table `event`
--

INSERT INTO `event` (`event_id`, `event_title`, `event_description`, `event_type`, `start_date`, `end_date`, `del_ind`, `added_by`, `added_date`) VALUES
(1, 'fasfs', 'sfasf', '', '2014-09-16', '2014-09-18', '1', 2, '2014-09-16 11:20:06'),
(2, 'xzvx', 'vzxv', 'global', '2014-09-27', '2014-09-30', '1', 2, '2014-09-27 01:00:04');

-- --------------------------------------------------------

--
-- Table structure for table `notification`
--

CREATE TABLE IF NOT EXISTS `notification` (
  `notification_id` int(11) NOT NULL AUTO_INCREMENT,
  `system_id` int(11) NOT NULL,
  `notification_msg` varchar(300) NOT NULL,
  `notification_area_url` varchar(300) NOT NULL,
  `notification_added_date` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`notification_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=8 ;

--
-- Dumping data for table `notification`
--

INSERT INTO `notification` (`notification_id`, `system_id`, `notification_msg`, `notification_area_url`, `notification_added_date`) VALUES
(1, 1, 'fasfasfh', 'fasfasf', '0000-00-00 00:00:00'),
(2, 1, 'gfjh', 'ghgh', '0000-00-00 00:00:00'),
(3, 1, 'gjhh', 'urfff', '0000-00-00 00:00:00'),
(4, 1, 'vxzvx', 'vxzvxv', '0000-00-00 00:00:00'),
(5, 1, 'vzxv', 'vzxv', '0000-00-00 00:00:00'),
(6, 1, 'zxv', 'zxvzxv', '0000-00-00 00:00:00'),
(7, 1, 'zvxv', 'zvxv', '0000-00-00 00:00:00');

-- --------------------------------------------------------

--
-- Table structure for table `notified_users`
--

CREATE TABLE IF NOT EXISTS `notified_users` (
  `notified_users_id` int(11) NOT NULL AUTO_INCREMENT,
  `employee_code` int(11) NOT NULL,
  `notification_id` int(11) NOT NULL,
  `notified_user_is_seen` enum('y','n') NOT NULL DEFAULT 'n',
  PRIMARY KEY (`notified_users_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=42 ;

--
-- Dumping data for table `notified_users`
--

INSERT INTO `notified_users` (`notified_users_id`, `employee_code`, `notification_id`, `notified_user_is_seen`) VALUES
(1, 6, 1, 'n'),
(2, 1, 1, 'y'),
(3, 6, 2, 'n'),
(4, 5, 2, 'n'),
(5, 4, 2, 'n'),
(6, 3, 2, 'n'),
(7, 2, 2, 'y'),
(8, 1, 2, 'n'),
(9, 6, 3, 'n'),
(10, 5, 3, 'n'),
(11, 4, 3, 'n'),
(12, 3, 3, 'n'),
(13, 2, 3, 'y'),
(14, 1, 3, 'y'),
(15, 6, 4, 'n'),
(16, 5, 4, 'n'),
(17, 4, 4, 'n'),
(18, 3, 4, 'n'),
(19, 2, 4, 'y'),
(20, 1, 4, 'y'),
(21, 7, 5, 'n'),
(22, 6, 5, 'n'),
(23, 5, 5, 'n'),
(24, 4, 5, 'n'),
(25, 3, 5, 'n'),
(26, 2, 5, 'y'),
(27, 1, 5, 'n'),
(28, 7, 6, 'n'),
(29, 6, 6, 'n'),
(30, 5, 6, 'n'),
(31, 4, 6, 'n'),
(32, 3, 6, 'n'),
(33, 2, 6, 'y'),
(34, 1, 6, 'n'),
(35, 7, 7, 'n'),
(36, 6, 7, 'n'),
(37, 5, 7, 'n'),
(38, 4, 7, 'n'),
(39, 3, 7, 'n'),
(40, 2, 7, 'y'),
(41, 1, 7, 'n');

-- --------------------------------------------------------

--
-- Table structure for table `privilege`
--

CREATE TABLE IF NOT EXISTS `privilege` (
  `privilege_code` int(11) NOT NULL AUTO_INCREMENT,
  `privilege_master_code` int(11) NOT NULL,
  `privilege` varchar(100) NOT NULL,
  `privilege_description` varchar(1000) NOT NULL,
  `priviledge_code_HF` varchar(100) NOT NULL COMMENT 'Human Friendly Priviledge Code',
  `assign_for` enum('1','2','3','4') NOT NULL,
  PRIMARY KEY (`privilege_code`),
  KEY `lcs_privilege_ibfk_1` (`privilege_master_code`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=24 ;

--
-- Dumping data for table `privilege`
--

INSERT INTO `privilege` (`privilege_code`, `privilege_master_code`, `privilege`, `privilege_description`, `priviledge_code_HF`, `assign_for`) VALUES
(9, 5, 'Manage Master Privileges', 'Manage Master Privileges', 'MANAGE_MASTER_PRIVILEGES', '1'),
(10, 5, 'Add New Master Privilege', 'Add New Master Privilege', 'ADD_NEW_MASTER_PRIVILEGE', '1'),
(15, 8, 'Manage Employee', 'Manage Employee', 'MANAGE_EMPLOYEE', '2'),
(16, 7, 'Manage Company', 'Manage Company', 'MANAGE_COMPANY', '1'),
(17, 7, 'Add New Company', 'Add New Company', 'ADD_NEW_COMPANY', '1'),
(18, 7, 'Edit Company', 'Edit Company', 'EDIT_COMPANY', '1'),
(19, 8, 'Delete Company', 'Delete Company', 'DELETE_COMPANY', '1'),
(20, 9, 'Manage Projects', 'Manage Projects', 'MANAGE_PROJECTS', '4'),
(21, 9, 'Add New Project', 'Add New Project', 'ADD_NEW_PROJECT', '4'),
(22, 9, 'Delete Project', 'Delete Project', 'DELETE_PROJECT', '4'),
(23, 9, 'Edit Project', 'Edit Project', 'EDIT_PROJECT', '4');

-- --------------------------------------------------------

--
-- Table structure for table `privilege_master`
--

CREATE TABLE IF NOT EXISTS `privilege_master` (
  `privilege_master_code` int(11) NOT NULL AUTO_INCREMENT,
  `master_privilege` varchar(100) NOT NULL,
  `master_privilege_description` varchar(1000) NOT NULL,
  `system_code` int(11) NOT NULL,
  PRIMARY KEY (`privilege_master_code`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=10 ;

--
-- Dumping data for table `privilege_master`
--

INSERT INTO `privilege_master` (`privilege_master_code`, `master_privilege`, `master_privilege_description`, `system_code`) VALUES
(5, 'Manage Master Privileges', 'Manage Master Privileges', 4),
(7, 'Manage Company', 'Manage Company', 5),
(8, 'Manage Employee', 'Manage Employee', 1),
(9, 'Manage Projects', 'Manage Projects', 2);

-- --------------------------------------------------------

--
-- Table structure for table `project`
--

CREATE TABLE IF NOT EXISTS `project` (
  `project_id` int(11) NOT NULL AUTO_INCREMENT,
  `project_logo` varchar(100) DEFAULT NULL,
  `project_name` varchar(100) NOT NULL,
  `project_vendor` varchar(100) NOT NULL,
  `project_start_date` date NOT NULL,
  `project_end_date` date DEFAULT NULL,
  `project_description` text NOT NULL,
  `company_code` int(11) NOT NULL,
  `del_ind` enum('1','0') NOT NULL,
  `added_by` int(11) DEFAULT NULL,
  `added_date` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`project_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=17 ;

--
-- Dumping data for table `project`
--

INSERT INTO `project` (`project_id`, `project_logo`, `project_name`, `project_vendor`, `project_start_date`, `project_end_date`, `project_description`, `company_code`, `del_ind`, `added_by`, `added_date`) VALUES
(1, 'cZC', 'cZ', 'CZ', '2014-08-09', '2014-08-19', 'czC', 1, '1', 1, '2014-08-08 18:30:00'),
(2, 'project_default_logo.png', 'fas', 'fsf', '2014-08-21', '0000-00-00', 'sfas', 1, '1', 3, '2014-08-21 02:45:27'),
(3, 'project_default_logo.png', 'new project', 'cZZ', '2014-08-21', '0000-00-00', 'czcZc', 1, '1', 3, '2014-08-21 03:01:15'),
(4, 'project_default_logo.png', 'fafa', 'fasfsa', '2014-08-21', '0000-00-00', 'fsafas', 1, '1', 3, '2014-08-21 03:28:08'),
(5, 'project_default_logo.png', 'fafa', 'fasfsa', '2014-08-21', '0000-00-00', 'fsafas', 1, '1', 3, '2014-08-21 03:28:14'),
(6, 'project_default_logo.png', 'fafa', 'fasfsa', '2014-08-21', '0000-00-00', 'fsafas', 1, '1', 3, '2014-08-21 03:31:47'),
(7, 'project_default_logo.png', 'fafa', 'fasfsa', '2014-08-21', '0000-00-00', 'fsafas', 1, '0', 3, '2014-08-21 03:32:01'),
(8, 'project_default_logo.png', 'fafa', 'fasfsa', '2014-08-21', '0000-00-00', 'fsafas', 1, '0', 3, '2014-08-21 03:32:10'),
(9, 'project_default_logo.png', 'fafa', 'fasfsa', '2014-08-21', '0000-00-00', 'fsafas', 1, '1', 3, '2014-08-21 03:32:41'),
(10, 'project_default_logo.png', 'dasd', 'ada', '2014-08-21', '0000-00-00', 'faf', 1, '0', 2, '2014-08-21 08:28:22'),
(11, 'project_default_logo.png', 'sff', 'safs', '2014-08-21', '0000-00-00', 'asf', 1, '1', 2, '2014-08-21 08:41:32'),
(12, 'project_default_logo.png', 'my project', 'dad', '2014-08-23', '0000-00-00', 'dad', 1, '0', 2, '2014-08-23 00:50:24'),
(13, 'project_default_logo.png', 'sf', 'fasf', '2014-09-10', '2014-09-07', 'fsfs', 1, '0', 2, '2014-09-10 12:56:30'),
(14, 'project_default_logo.png', 'aaaaaaaaaaaaaaaaaa', 'czcZc', '2014-09-25', '2014-09-26', 'cZCZc', 1, '1', 2, '2014-09-25 11:20:19'),
(15, 'project_default_logo.png', 'sdf', 'sdgd', '2014-09-25', '2014-09-26', 'gsdg', 1, '1', 2, '2014-09-25 12:20:05'),
(16, 'project_default_logo.png', 'sAS', 'SAs', '2014-09-28', '2014-09-25', 'sAS', 1, '1', 2, '2014-09-28 02:25:26');

-- --------------------------------------------------------

--
-- Table structure for table `project_stuff`
--

CREATE TABLE IF NOT EXISTS `project_stuff` (
  `project_stuff_id` int(11) NOT NULL AUTO_INCREMENT,
  `stuff_name` varchar(200) NOT NULL,
  `company_code` int(11) NOT NULL,
  `project_id` int(11) NOT NULL,
  `del_ind` enum('1','0') NOT NULL DEFAULT '0',
  `added_date` timestamp NULL DEFAULT NULL,
  `added_by` int(11) NOT NULL,
  PRIMARY KEY (`project_stuff_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=16 ;

--
-- Dumping data for table `project_stuff`
--

INSERT INTO `project_stuff` (`project_stuff_id`, `stuff_name`, `company_code`, `project_id`, `del_ind`, `added_date`, `added_by`) VALUES
(1, 'p.jpg', 1, 4, '1', '2014-08-21 03:28:08', 3),
(2, 'The-Twilight-Saga_breaking-Dawn-Part-2-2012-Movie-Photos-wide-Wallpapers-13-728x455 (2).jpg', 1, 4, '1', '2014-08-21 03:28:08', 3),
(3, 'p.jpg', 1, 5, '1', '2014-08-21 03:28:15', 3),
(4, 'The-Twilight-Saga_breaking-Dawn-Part-2-2012-Movie-Photos-wide-Wallpapers-13-728x455 (2).jpg', 1, 5, '1', '2014-08-21 03:28:15', 3),
(5, 'sample.avi', 1, 10, '1', '2014-08-21 08:28:22', 2),
(6, 'screencaps.jpeg', 1, 10, '1', '2014-08-21 08:28:22', 2),
(7, 'Tarzan.2013.1080p.BluRay.x264.YIFY.mp4', 1, 11, '1', '2014-08-21 08:41:32', 2),
(8, '531709_575297122495442_553449702_n.jpg', 1, 14, '1', '2014-09-25 11:20:19', 2),
(9, 'p (1).jpg', 1, 14, '1', '2014-09-25 11:20:19', 2),
(10, 'The-Twilight-Saga_breaking-Dawn-Part-2-2012-Movie-Photos-wide-Wallpapers-13-728x455 (1).jpg', 1, 14, '1', '2014-09-25 11:20:19', 2),
(11, 'Edward Bella Twilight Breaking Dawn HD Wallpaper.jpg', 1, 15, '1', '2014-09-25 12:20:05', 2),
(12, 'despicable-me-4fdb838e20288.jpg', 1, 15, '1', '2014-09-25 12:20:05', 2),
(13, '531709_575297122495442_553449702_n.jpg', 1, 16, '1', '2014-09-28 02:25:26', 2),
(14, 'The-Twilight-Saga_breaking-Dawn-Part-2-2012-Movie-Photos-wide-Wallpapers-13-728x455.jpg', 1, 16, '1', '2014-09-28 02:25:26', 2),
(15, 'p.jpg', 1, 16, '1', '2014-09-28 02:25:26', 2);

-- --------------------------------------------------------

--
-- Table structure for table `project_stuff_temp`
--

CREATE TABLE IF NOT EXISTS `project_stuff_temp` (
  `project_stuff_id` int(11) NOT NULL AUTO_INCREMENT,
  `stuff_name` varchar(200) NOT NULL,
  `company_code` int(11) NOT NULL,
  `del_ind` enum('1','0') NOT NULL DEFAULT '0',
  `added_date` timestamp NULL DEFAULT NULL,
  `added_by` int(11) NOT NULL,
  PRIMARY KEY (`project_stuff_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=4 ;

--
-- Dumping data for table `project_stuff_temp`
--

INSERT INTO `project_stuff_temp` (`project_stuff_id`, `stuff_name`, `company_code`, `del_ind`, `added_date`, `added_by`) VALUES
(1, '531709_575297122495442_553449702_n.jpg', 1, '1', '2014-09-28 02:25:24', 2),
(2, 'The-Twilight-Saga_breaking-Dawn-Part-2-2012-Movie-Photos-wide-Wallpapers-13-728x455.jpg', 1, '1', '2014-09-28 02:25:24', 2),
(3, 'p.jpg', 1, '1', '2014-09-28 02:25:24', 2);

-- --------------------------------------------------------

--
-- Table structure for table `screenshot_inquiry`
--

CREATE TABLE IF NOT EXISTS `screenshot_inquiry` (
  `inquiry_id` int(11) NOT NULL AUTO_INCREMENT,
  `inquiry_name` varchar(100) CHARACTER SET utf8 NOT NULL,
  `inquiry_description` varchar(300) NOT NULL,
  `added_date` timestamp NULL DEFAULT NULL,
  `added_by` varchar(50) NOT NULL,
  `added_to` varchar(50) CHARACTER SET utf8 NOT NULL,
  `project` varchar(50) CHARACTER SET utf8 NOT NULL,
  `task` varchar(50) CHARACTER SET utf8 NOT NULL,
  PRIMARY KEY (`inquiry_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=9 ;

--
-- Dumping data for table `screenshot_inquiry`
--

INSERT INTO `screenshot_inquiry` (`inquiry_id`, `inquiry_name`, `inquiry_description`, `added_date`, `added_by`, `added_to`, `project`, `task`) VALUES
(1, 'cxzc', '    xzcx', NULL, '', '', '', ''),
(2, 'fwf', '    fwfwfwfw', NULL, '', '', '', ''),
(3, 'wee', '    dwswffws', '2014-09-23 18:30:00', '0', '0', '0', '0'),
(4, 'dsd', '    qeqrqrqr', '2014-09-29 18:30:00', '0', '0', '0', '0'),
(5, 'dadaf', ' gsdgdg   ', '2014-09-27 03:37:20', '2', '0', '0', '0'),
(6, 'ghgh', '    hjghjgj', '2014-09-27 03:39:07', 'Gayathma Perera', '0', '0', '0'),
(7, 'jhjghj', '    hjhsjhkas', '2014-09-27 03:42:11', 'Gayathma Perera', 'Gayathma Perera', '0', '0'),
(8, 'vcxv', '    vxcv', '2014-09-28 02:57:24', 'Gayathma Perera', 'vxcv', '2', '2');

-- --------------------------------------------------------

--
-- Table structure for table `settings`
--

CREATE TABLE IF NOT EXISTS `settings` (
  `setting_id` int(11) NOT NULL AUTO_INCREMENT,
  `setting_name` varchar(100) NOT NULL,
  `setting_description` varchar(300) NOT NULL,
  `setting_type` enum('c','r','d','t') NOT NULL COMMENT 'c - check box,r - radio button,d - dropdown,t - text',
  `added_date` datetime NOT NULL,
  PRIMARY KEY (`setting_id`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=3 ;

--
-- Dumping data for table `settings`
--

INSERT INTO `settings` (`setting_id`, `setting_name`, `setting_description`, `setting_type`, `added_date`) VALUES
(1, 'User Login Options', 'We can define company wise / employee wise login types', 'd', '2014-01-03 10:19:32'),
(2, 'Dashboard Widgets', 'This is the setting to change the WORKGRAM system dashboard widgets.', 'd', '2014-02-07 16:47:42');

-- --------------------------------------------------------

--
-- Table structure for table `setting_parameters`
--

CREATE TABLE IF NOT EXISTS `setting_parameters` (
  `setting_parameter_id` int(11) NOT NULL AUTO_INCREMENT,
  `setting_id` int(11) NOT NULL,
  `parameter_name` varchar(100) NOT NULL,
  `parameter_description` varchar(300) NOT NULL,
  `is_parameter_default_value` enum('y','n') NOT NULL DEFAULT 'n',
  `added_date` datetime NOT NULL,
  PRIMARY KEY (`setting_parameter_id`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=4 ;

--
-- Dumping data for table `setting_parameters`
--

INSERT INTO `setting_parameters` (`setting_parameter_id`, `setting_id`, `parameter_name`, `parameter_description`, `is_parameter_default_value`, `added_date`) VALUES
(1, 1, 'Username & Password', 'Username and Password will be stored in the system, and users can change the username and password', 'n', '2014-01-03 10:29:15'),
(2, 1, 'Active Directory Authentication', 'Users will be authenticate through the centralized AD server.Users email address username and AD use', 'n', '2014-01-03 10:29:33'),
(3, 1, 'Corporate Email authentication', 'Company employees email credentials will be using to authenticate.', 'y', '2014-01-03 10:30:47');

-- --------------------------------------------------------

--
-- Table structure for table `skill`
--

CREATE TABLE IF NOT EXISTS `skill` (
  `skill_code` int(11) NOT NULL AUTO_INCREMENT,
  `skill_name` varchar(100) NOT NULL,
  `skill_cat_code` int(11) NOT NULL,
  `del_ind` enum('1','0') NOT NULL,
  `added_by` int(11) DEFAULT NULL,
  `added_date` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`skill_code`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=10 ;

--
-- Dumping data for table `skill`
--

INSERT INTO `skill` (`skill_code`, `skill_name`, `skill_cat_code`, `del_ind`, `added_by`, `added_date`) VALUES
(1, 'White Box Testing', 1, '1', 2, '2014-08-09 02:05:46'),
(2, 'Black Box Testing', 1, '1', 2, '2014-08-22 12:55:26'),
(3, 'PHP', 3, '1', 2, '2014-08-22 23:57:45'),
(4, 'JAVA', 3, '1', 2, '2014-08-22 23:57:58'),
(5, 'Photoshop', 2, '1', 2, '2014-08-22 23:58:13'),
(6, 'Cinema 4D', 2, '1', 2, '2014-08-22 23:58:27'),
(7, 'SLIM', 4, '1', 2, '2014-08-22 23:59:03'),
(8, 'CIMA', 4, '1', 2, '2014-08-22 23:59:26'),
(9, 'Android', 3, '1', 2, '2014-08-23 02:39:25');

-- --------------------------------------------------------

--
-- Table structure for table `skill_category`
--

CREATE TABLE IF NOT EXISTS `skill_category` (
  `skill_cat_code` int(11) NOT NULL AUTO_INCREMENT,
  `skill_cat_name` varchar(100) NOT NULL,
  `colour` varchar(20) NOT NULL,
  `del_ind` enum('1','0') NOT NULL,
  `added_by` int(11) DEFAULT NULL,
  `added_date` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`skill_cat_code`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=5 ;

--
-- Dumping data for table `skill_category`
--

INSERT INTO `skill_category` (`skill_cat_code`, `skill_cat_name`, `colour`, `del_ind`, `added_by`, `added_date`) VALUES
(1, 'Quaity Assuarance', '#fbb05e', '1', 2, '2014-08-09 01:05:10'),
(2, 'Designing', '#0AA699', '1', 2, '2014-08-22 14:02:45'),
(3, 'Developing', '#F35958', '1', 2, '2014-08-22 14:04:02'),
(4, 'Marketing', '#0090d9', '1', 2, '2014-08-22 14:06:44');

-- --------------------------------------------------------

--
-- Table structure for table `statistics`
--

CREATE TABLE IF NOT EXISTS `statistics` (
  `statistic_id` int(11) NOT NULL AUTO_INCREMENT,
  `user_id` int(11) NOT NULL DEFAULT '0',
  `action` varchar(300) NOT NULL,
  `date` int(11) NOT NULL,
  `uri` varchar(255) NOT NULL,
  `post_data` text NOT NULL,
  `ip` varchar(300) DEFAULT NULL,
  `browser` varchar(300) DEFAULT NULL,
  PRIMARY KEY (`statistic_id`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=7 ;

--
-- Dumping data for table `statistics`
--

INSERT INTO `statistics` (`statistic_id`, `user_id`, `action`, `date`, `uri`, `post_data`, `ip`, `browser`) VALUES
(1, 0, 'index', 1411887082, 'chat/process', '{"function":"update","state":"63"}', '::1', 'Mozilla/5.0 (Windows NT 6.2; WOW64; rv:32.0) Gecko/20100101 Firefox/32.0'),
(2, 0, 'index', 1411887083, 'chat/process', '{"function":"update","state":"63"}', '::1', 'Mozilla/5.0 (Windows NT 6.2; WOW64; rv:32.0) Gecko/20100101 Firefox/32.0'),
(3, 0, 'index', 1411887085, 'chat/process', '{"function":"update","state":"63"}', '::1', 'Mozilla/5.0 (Windows NT 6.2; WOW64; rv:32.0) Gecko/20100101 Firefox/32.0'),
(4, 0, 'index', 1411887086, 'chat/process', '{"function":"update","state":"63"}', '::1', 'Mozilla/5.0 (Windows NT 6.2; WOW64; rv:32.0) Gecko/20100101 Firefox/32.0'),
(5, 0, 'index', 1411887087, 'chat/process', '{"function":"update","state":"63"}', '::1', 'Mozilla/5.0 (Windows NT 6.2; WOW64; rv:32.0) Gecko/20100101 Firefox/32.0'),
(6, 0, 'index', 1411887088, 'chat/process', '{"function":"update","state":"63"}', '::1', 'Mozilla/5.0 (Windows NT 6.2; WOW64; rv:32.0) Gecko/20100101 Firefox/32.0');

-- --------------------------------------------------------

--
-- Table structure for table `system`
--

CREATE TABLE IF NOT EXISTS `system` (
  `system_code` int(11) NOT NULL AUTO_INCREMENT,
  `system` varchar(100) NOT NULL,
  `dashboard_url` varchar(255) DEFAULT NULL,
  PRIMARY KEY (`system_code`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=6 ;

--
-- Dumping data for table `system`
--

INSERT INTO `system` (`system_code`, `system`, `dashboard_url`) VALUES
(1, 'Employee', '/employee/employee_controller/manage_employees'),
(2, 'Projects', '/project/project_controller/manage_projects'),
(3, 'Privileges', '/settings/privilege_controller/manage_privileges'),
(4, 'Master Privileges', '/settings/privilege_master_controller/manage_privilege_masters'),
(5, 'Company', '/company/company_controller/manage_companies');

-- --------------------------------------------------------

--
-- Table structure for table `task`
--

CREATE TABLE IF NOT EXISTS `task` (
  `task_id` int(11) NOT NULL AUTO_INCREMENT,
  `task_name` text NOT NULL,
  `task_description` text NOT NULL,
  `task_priority` varchar(30) NOT NULL,
  `task_progress` int(11) NOT NULL,
  `task_deadline` datetime NOT NULL,
  `task_status` enum('1','0') NOT NULL DEFAULT '0' COMMENT '1 - Task Finished 0 - Task Not Finished',
  `project_id` int(11) NOT NULL,
  `del_ind` enum('1','0') NOT NULL,
  `added_date` timestamp NULL DEFAULT NULL,
  `added_by` varchar(100) NOT NULL,
  PRIMARY KEY (`task_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=11 ;

--
-- Dumping data for table `task`
--

INSERT INTO `task` (`task_id`, `task_name`, `task_description`, `task_priority`, `task_progress`, `task_deadline`, `task_status`, `project_id`, `del_ind`, `added_date`, `added_by`) VALUES
(1, 'task 1', 'fsfsfs', '1', 0, '2014-08-22 00:00:00', '0', 1, '1', '2014-08-20 18:30:00', '2'),
(2, 'tttttttttttt', 'vxzvx', '5', 5, '2014-08-23 00:00:00', '0', 1, '1', '2014-08-23 12:23:13', '2'),
(3, ' vbcvb', 'bcvb', '2', 2, '2014-08-29 00:00:00', '0', 0, '1', '2014-08-24 13:26:19', '2'),
(4, 'xcx', 'vxzvx', 'vxv', 0, '2014-08-23 00:00:00', '0', 2, '1', '2014-08-24 14:21:16', '2'),
(5, 'fdfd', 'vxzvx', '4', 4, '2014-08-23 00:00:00', '0', 2, '1', '2014-08-24 14:24:35', '2'),
(6, 'dsad', 'ads', '10', 0, '2014-08-25 00:00:00', '0', 11, '1', '2014-08-25 00:11:28', '2'),
(7, 'dsad', 'ads', '10', 0, '2014-08-25 00:00:00', '0', 11, '1', '2014-08-25 00:13:16', '2'),
(8, 'zczv', 'sasa', '10', 0, '2014-08-25 00:00:00', '0', 11, '1', '2014-08-25 00:15:29', '2'),
(9, 'cxzc', 'vzxv', '10', 0, '2014-09-27 00:00:00', '0', 14, '1', '2014-09-27 00:19:32', '2'),
(10, 'cxzc', 'vzxv', '10', 0, '2014-09-27 00:00:00', '0', 14, '1', '2014-09-27 00:19:39', '2');

-- --------------------------------------------------------

--
-- Table structure for table `task_comment`
--

CREATE TABLE IF NOT EXISTS `task_comment` (
  `comment_id` int(11) NOT NULL AUTO_INCREMENT,
  `task_id` int(11) NOT NULL,
  `comment` varchar(200) NOT NULL,
  `del_ind` enum('1','0') NOT NULL,
  `added_by` int(11) NOT NULL,
  `added_date` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`comment_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=5 ;

--
-- Dumping data for table `task_comment`
--

INSERT INTO `task_comment` (`comment_id`, `task_id`, `comment`, `del_ind`, `added_by`, `added_date`) VALUES
(1, 3, 'czc', '1', 2, '2014-08-24 14:55:52'),
(2, 3, 'zcz', '1', 2, '2014-08-24 14:56:33'),
(3, 8, 'kj', '1', 2, '2014-08-25 00:18:45'),
(4, 5, 'hk', '1', 2, '2014-09-13 00:06:28');

-- --------------------------------------------------------

--
-- Table structure for table `wages_category`
--

CREATE TABLE IF NOT EXISTS `wages_category` (
  `wages_category_id` int(11) NOT NULL AUTO_INCREMENT,
  `category_name` varchar(100) NOT NULL,
  `basic_salary` decimal(20,2) DEFAULT NULL,
  `ot_rate` decimal(20,2) DEFAULT NULL,
  `allowance` decimal(20,2) DEFAULT NULL,
  `bonus` decimal(20,2) DEFAULT NULL,
  `del_ind` enum('1','0') NOT NULL,
  `added_by` int(11) DEFAULT NULL,
  `added_date` timestamp NULL DEFAULT NULL,
  `updated_by` int(11) DEFAULT NULL,
  `updated_date` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`wages_category_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=4 ;

--
-- Dumping data for table `wages_category`
--

INSERT INTO `wages_category` (`wages_category_id`, `category_name`, `basic_salary`, `ot_rate`, `allowance`, `bonus`, `del_ind`, `added_by`, `added_date`, `updated_by`, `updated_date`) VALUES
(1, '0', 0.00, 0.00, 0.00, 0.00, '0', 0, '2014-08-21 08:06:16', NULL, NULL),
(2, 'dadada', 32.00, 242.00, 222222.00, 0.00, '1', 0, '2014-08-21 08:07:58', NULL, NULL),
(3, 'czc', 0.00, 0.00, 0.00, 0.00, '0', 0, '2014-08-21 08:08:36', NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `worker`
--

CREATE TABLE IF NOT EXISTS `worker` (
  `worker_id` int(11) NOT NULL AUTO_INCREMENT,
  `emp_code` int(11) DEFAULT NULL,
  `worker_date` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `worker_project_id` int(11) NOT NULL,
  `worker_project_task_id` int(11) NOT NULL,
  `worker_shot_name` varchar(45) NOT NULL,
  `del_ind` enum('1','0') NOT NULL DEFAULT '1',
  PRIMARY KEY (`worker_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=10 ;

--
-- Dumping data for table `worker`
--

INSERT INTO `worker` (`worker_id`, `emp_code`, `worker_date`, `worker_project_id`, `worker_project_task_id`, `worker_shot_name`, `del_ind`) VALUES
(1, 2, '2014-08-24 20:57:29', 1, 2, 'gayathma3_24-43-14-02-43-26.png', '1'),
(2, 2, '2014-08-24 20:57:36', 1, 1, 'gayathma3_24-44-14-02-44-18.png', '1'),
(3, 2, '2014-08-24 21:01:59', 1, 1, 'gayathma3_24-01-14-10-01-50.png', '1'),
(4, 2, '2014-08-24 21:02:07', 1, 1, 'gayathma3_24-57-14-09-57-20.png', '1'),
(5, 2, '2014-08-25 07:37:43', 1, 1, 'gayathma3_25-37-14-08-37-40.png', '1'),
(6, 2, '2014-08-25 08:52:11', 1, 1, 'gayathma3_25-52-14-09-52-05.png', '1'),
(7, 2, '2014-08-25 10:54:50', 1, 1, 'gayathma3_25-54-14-11-54-44.png', '1'),
(8, 2, '2014-08-25 11:02:25', 1, 1, 'gayathma3_25-02-14-12-02-19.png', '1'),
(9, 2, '2014-08-25 11:10:02', 1, 1, 'gayathma3_25-09-14-12-09-54.png', '1');

--
-- Constraints for dumped tables
--

--
-- Constraints for table `employee_privileges`
--
ALTER TABLE `employee_privileges`
  ADD CONSTRAINT `employee_privileges_ibfk_1` FOREIGN KEY (`privilege_code`) REFERENCES `privilege` (`privilege_code`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `privilege`
--
ALTER TABLE `privilege`
  ADD CONSTRAINT `privilege_ibfk_1` FOREIGN KEY (`privilege_master_code`) REFERENCES `privilege_master` (`privilege_master_code`) ON DELETE CASCADE ON UPDATE CASCADE;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
