-- phpMyAdmin SQL Dump
-- version 3.5.2.2
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: Aug 16, 2014 at 06:16 AM
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
  PRIMARY KEY (`company_code`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=2 ;

--
-- Dumping data for table `company`
--

INSERT INTO `company` (`company_code`, `company_name`, `company_email`, `company_address`, `company_contact`, `company_desc`) VALUES
(1, 'workgram', 'workgram.com', 'workgram', '2412125', 'workgram');

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
  `account_activation_code` varchar(100) NOT NULL,
  `company_code` int(11) NOT NULL,
  `is_online` enum('Y','N') DEFAULT 'N' COMMENT 'Online =Y,Offline=N',
  `del_ind` enum('1','0','2') NOT NULL COMMENT '0-deactivate,1 -active, 2-pending(Inserted Employee record from mail server)',
  `added_by` int(11) DEFAULT NULL,
  `added_date` timestamp NULL DEFAULT NULL,
  `updated_by` int(11) DEFAULT NULL,
  `updated_date` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`employee_code`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=7 ;

--
-- Dumping data for table `employee`
--

INSERT INTO `employee` (`employee_code`, `employee_no`, `employee_fname`, `employee_lname`, `employee_password`, `employee_email`, `employee_type`, `employee_bday`, `employee_contact`, `employee_wages_category`, `employee_contract`, `employee_avatar`, `account_activation_code`, `company_code`, `is_online`, `del_ind`, `added_by`, `added_date`, `updated_by`, `updated_date`) VALUES
(1, '1', 'Shamain', 'Peiris', 'c4961b067d274050e43e26beb9d7d19c', 'shamaingdd@gmail.com', 'employee type', '1991-06-10', '0758376047', 412125125, 'dasds', '', '', 1, 'Y', '1', 12, '2014-05-20 18:30:00', NULL, NULL),
(2, '2', 'Gayathma', 'Perera', 'c4961b067d274050e43e26beb9d7d19c', 'gayathma3@gmail.com', '0', '1991-04-10', '353523', NULL, 'FULL_TIME', 'employee_avatar1407564628-531709_575297122495442_553449702_n.jpg', '', 1, 'N', '1', 12, '2014-05-30 23:30:00', NULL, NULL),
(3, '3', 'Rachini', 'Perera', 'b01509c878e24c0dfd78da7bae7d5e70', 'rachini@gmail.com', '2', '2014-06-12', '2332623623', 213232, 'FULL_TIME', 'emp_avatar1405095017-p.jpg', '3', 1, '', '1', 0, '2014-07-11 12:40:36', NULL, NULL),
(4, '4', 'Dahami', 'Perera', 'c4961b067d274050e43e26beb9d7d19c', 'dahami@gmail.com', 'emp', '2014-06-20', '34535', 32535, '235', '', '', 1, '', '1', 1, '2014-06-13 18:30:00', NULL, NULL),
(5, '5', 'Kaumadi', 'Perera', 'c4961b067d274050e43e26beb9d7d19c', 'kaumadi@gmail.com', 'emp', '2014-06-20', '3453534', 35325, 'FULL_TIME', '', '', 1, '', '1', 1, '2014-06-13 18:30:00', NULL, NULL),
(6, '6', 'Dilupa', 'Perera', 'c4961b067d274050e43e26beb9d7d19c', 'dilupa@gmail.com', 'emp', '2014-06-28', '4234234', 4234, 'PART_TIME', '', '', 1, '', '1', 1, '2014-06-13 18:30:00', NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `employee_event`
--

CREATE TABLE IF NOT EXISTS `employee_event` (
  `employee_event_id` int(11) NOT NULL AUTO_INCREMENT,
  `event_id` int(11) NOT NULL,
  `employee_code` int(11) NOT NULL,
  PRIMARY KEY (`employee_event_id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

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
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=29 ;

--
-- Dumping data for table `employee_privileges`
--

INSERT INTO `employee_privileges` (`employee_privilege_code`, `employee_code`, `privilege_code`, `added_date`) VALUES
(24, 12, 10, '2014-07-07 16:49:19'),
(25, 12, 9, '2014-07-07 16:50:45'),
(27, 2, 9, '2014-07-09 11:24:32'),
(28, 2, 10, '2014-07-09 11:24:32');

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
  `del_ind` enum('1','0') NOT NULL,
  `added_date` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  PRIMARY KEY (`employee_skill_id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `employee_tasks`
--

CREATE TABLE IF NOT EXISTS `employee_tasks` (
  `employee_task_id` int(11) NOT NULL AUTO_INCREMENT,
  `employee_id` int(11) NOT NULL,
  `task_id` int(11) NOT NULL,
  `added_date` datetime NOT NULL,
  PRIMARY KEY (`employee_task_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=3 ;

--
-- Dumping data for table `employee_tasks`
--

INSERT INTO `employee_tasks` (`employee_task_id`, `employee_id`, `task_id`, `added_date`) VALUES
(1, 1, 1, '0000-00-00 00:00:00'),
(2, 2, 1, '2014-07-25 00:00:00');

-- --------------------------------------------------------

--
-- Table structure for table `event`
--

CREATE TABLE IF NOT EXISTS `event` (
  `event_id` int(11) NOT NULL AUTO_INCREMENT,
  `event_title` varchar(100) NOT NULL,
  `event_description` varchar(300) DEFAULT NULL,
  `start_date` date NOT NULL,
  `end_date` date NOT NULL,
  `del_ind` enum('1','0') NOT NULL,
  `added_by` int(11) DEFAULT NULL,
  `added_date` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`event_id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `notification`
--

CREATE TABLE IF NOT EXISTS `notification` (
  `notification_id` int(11) NOT NULL AUTO_INCREMENT,
  `system_id` int(11) NOT NULL,
  `notification_msg` varchar(300) NOT NULL,
  `notification_area_url` varchar(300) NOT NULL,
  `notification_added_date` int(11) NOT NULL,
  PRIMARY KEY (`notification_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=5 ;

--
-- Dumping data for table `notification`
--

INSERT INTO `notification` (`notification_id`, `system_id`, `notification_msg`, `notification_area_url`, `notification_added_date`) VALUES
(1, 1, 'fasfasfh', 'fasfasf', 2014),
(2, 1, 'gfjh', 'ghgh', 2014),
(3, 1, 'gjhh', 'urfff', 2014),
(4, 1, 'vxzvx', 'vxzvxv', 2014);

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
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=21 ;

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
(7, 2, 2, 'n'),
(8, 1, 2, 'n'),
(9, 6, 3, 'n'),
(10, 5, 3, 'n'),
(11, 4, 3, 'n'),
(12, 3, 3, 'n'),
(13, 2, 3, 'n'),
(14, 1, 3, 'y'),
(15, 6, 4, 'n'),
(16, 5, 4, 'n'),
(17, 4, 4, 'n'),
(18, 3, 4, 'n'),
(19, 2, 4, 'n'),
(20, 1, 4, 'y');

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
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=11 ;

--
-- Dumping data for table `privilege`
--

INSERT INTO `privilege` (`privilege_code`, `privilege_master_code`, `privilege`, `privilege_description`, `priviledge_code_HF`, `assign_for`) VALUES
(9, 5, 'Manage Master Privileges', 'Manage Master Privileges', 'MANAGE_MASTER_PRIVILEGES', '1'),
(10, 5, 'Add New Master Privilege', 'Add New Master Privilege', 'ADD_NEW_MASTER_PRIVILEGE', '1');

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
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=6 ;

--
-- Dumping data for table `privilege_master`
--

INSERT INTO `privilege_master` (`privilege_master_code`, `master_privilege`, `master_privilege_description`, `system_code`) VALUES
(5, 'Manage Master Privileges', 'Manage Master Privileges', 4);

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
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=2 ;

--
-- Dumping data for table `project`
--

INSERT INTO `project` (`project_id`, `project_logo`, `project_name`, `project_vendor`, `project_start_date`, `project_end_date`, `project_description`, `company_code`, `del_ind`, `added_by`, `added_date`) VALUES
(1, 'cZC', 'cZ', 'CZ', '2014-08-09', '2014-08-16', 'czC', 1, '0', 1, '2014-08-08 18:30:00');

-- --------------------------------------------------------

--
-- Table structure for table `project_stuff`
--

CREATE TABLE IF NOT EXISTS `project_stuff` (
  `project_stuff_id` int(11) NOT NULL AUTO_INCREMENT,
  `stuff_name` varchar(200) NOT NULL,
  `project_id` int(11) NOT NULL,
  `del_ind` enum('1','0') NOT NULL DEFAULT '0',
  `added_date` timestamp NULL DEFAULT NULL,
  `added_by` int(11) NOT NULL,
  PRIMARY KEY (`project_stuff_id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

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
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=2 ;

--
-- Dumping data for table `skill`
--

INSERT INTO `skill` (`skill_code`, `skill_name`, `skill_cat_code`, `del_ind`, `added_by`, `added_date`) VALUES
(1, 'dsdaxxxxx', 1, '1', 2, '2014-08-09 02:05:46');

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
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=2 ;

--
-- Dumping data for table `skill_category`
--

INSERT INTO `skill_category` (`skill_cat_code`, `skill_cat_name`, `colour`, `del_ind`, `added_by`, `added_date`) VALUES
(1, 'czx', '#9c3131', '1', 2, '2014-08-09 01:05:10');

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
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=463 ;

--
-- Dumping data for table `statistics`
--

INSERT INTO `statistics` (`statistic_id`, `user_id`, `action`, `date`, `uri`, `post_data`, `ip`, `browser`) VALUES
(1, 0, 'edit_employee_profile', 1407519614, 'employee/employee_profile_controller/edit_employee_profile/2', '', '::1', 'Mozilla/5.0 (Windows NT 6.2; WOW64; rv:31.0) Gecko/20100101 Firefox/31.0'),
(2, 0, 'edit_employee_profile', 1407519617, 'employee/employee_profile_controller/edit_employee_profile/%5Bobject%20Object%5D', '', '::1', 'Mozilla/5.0 (Windows NT 6.2; WOW64; rv:31.0) Gecko/20100101 Firefox/31.0'),
(3, 0, 'edit_employee', 1407519624, 'employee/employee_profile_controller/edit_employee', '{"employee_fname":"Gayathma","employee_lname":"Perera","employee_no":"2","employee_email":"gayathma3@gmail.com","employee_bday":"1991-04-10","employee_contact":"353523","employee_contract":"FULL_TIME","employee_code":"2"}', '::1', 'Mozilla/5.0 (Windows NT 6.2; WOW64; rv:31.0) Gecko/20100101 Firefox/31.0'),
(4, 0, 'edit_employee_profile', 1407519661, 'employee/employee_profile_controller/edit_employee_profile/2', '', '::1', 'Mozilla/5.0 (Windows NT 6.2; WOW64; rv:31.0) Gecko/20100101 Firefox/31.0'),
(5, 0, 'edit_employee_profile', 1407519665, 'employee/employee_profile_controller/edit_employee_profile/%5Bobject%20Object%5D', '', '::1', 'Mozilla/5.0 (Windows NT 6.2; WOW64; rv:31.0) Gecko/20100101 Firefox/31.0'),
(6, 0, 'edit_employee', 1407519666, 'employee/employee_profile_controller/edit_employee', '{"employee_fname":"Gayathma","employee_lname":"Perera","employee_no":"2","employee_email":"gayathma3@gmail.com","employee_bday":"1991-04-10","employee_contact":"353523","employee_contract":"FULL_TIME","employee_code":"2"}', '::1', 'Mozilla/5.0 (Windows NT 6.2; WOW64; rv:31.0) Gecko/20100101 Firefox/31.0'),
(7, 0, 'view_profile', 1407519667, 'employee/employee_profile_controller/view_profile', '', '::1', 'Mozilla/5.0 (Windows NT 6.2; WOW64; rv:31.0) Gecko/20100101 Firefox/31.0'),
(8, 0, '%5Bobject%20Object%5D', 1407519670, 'employee/employee_profile_controller/%5Bobject%20Object%5D', '', '::1', 'Mozilla/5.0 (Windows NT 6.2; WOW64; rv:31.0) Gecko/20100101 Firefox/31.0'),
(9, 0, 'manage_projects', 1407519910, 'project/project_controller/manage_projects', '', '::1', 'Mozilla/5.0 (Windows NT 6.2; WOW64; rv:31.0) Gecko/20100101 Firefox/31.0'),
(10, 0, '%5Bobject%20Object%5D', 1407519912, 'project/project_controller/%5Bobject%20Object%5D', '', '::1', 'Mozilla/5.0 (Windows NT 6.2; WOW64; rv:31.0) Gecko/20100101 Firefox/31.0'),
(11, 0, 'manage_projects', 1407520803, 'project/project_controller/manage_projects', '', '::1', 'Mozilla/5.0 (Windows NT 6.2; WOW64; rv:31.0) Gecko/20100101 Firefox/31.0'),
(12, 0, '%5Bobject%20Object%5D', 1407520807, 'project/project_controller/%5Bobject%20Object%5D', '', '::1', 'Mozilla/5.0 (Windows NT 6.2; WOW64; rv:31.0) Gecko/20100101 Firefox/31.0'),
(13, 0, 'add_project_view', 1407520811, 'project/project_controller/add_project_view', '', '::1', 'Mozilla/5.0 (Windows NT 6.2; WOW64; rv:31.0) Gecko/20100101 Firefox/31.0'),
(14, 0, 'index', 1407520815, 'project/fileupload', '', '::1', 'Mozilla/5.0 (Windows NT 6.2; WOW64; rv:31.0) Gecko/20100101 Firefox/31.0'),
(15, 0, 'add_project_view', 1407520903, 'project/project_controller/add_project_view', '', '::1', 'Mozilla/5.0 (Windows NT 6.2; WOW64; rv:31.0) Gecko/20100101 Firefox/31.0'),
(16, 0, 'index', 1407520907, 'project/fileupload', '', '::1', 'Mozilla/5.0 (Windows NT 6.2; WOW64; rv:31.0) Gecko/20100101 Firefox/31.0'),
(17, 0, 'manage_projects', 1407520916, 'project/project_controller/manage_projects', '', '::1', 'Mozilla/5.0 (Windows NT 6.2; WOW64; rv:31.0) Gecko/20100101 Firefox/31.0'),
(18, 0, '%5Bobject%20Object%5D', 1407520919, 'project/project_controller/%5Bobject%20Object%5D', '', '::1', 'Mozilla/5.0 (Windows NT 6.2; WOW64; rv:31.0) Gecko/20100101 Firefox/31.0'),
(19, 0, 'add_project_view', 1407520920, 'project/project_controller/add_project_view', '', '::1', 'Mozilla/5.0 (Windows NT 6.2; WOW64; rv:31.0) Gecko/20100101 Firefox/31.0'),
(20, 0, 'index', 1407520924, 'project/fileupload', '', '::1', 'Mozilla/5.0 (Windows NT 6.2; WOW64; rv:31.0) Gecko/20100101 Firefox/31.0'),
(21, 0, 'index', 1407552307, 'login/login_controller', '', '::1', 'Mozilla/5.0 (Windows NT 6.2; WOW64; rv:31.0) Gecko/20100101 Firefox/31.0'),
(22, 0, 'authenticate_user', 1407552318, 'login/login_controller/authenticate_user', '{"login_username":"gayathma3","login_password":"abc123@#"}', '::1', 'Mozilla/5.0 (Windows NT 6.2; WOW64; rv:31.0) Gecko/20100101 Firefox/31.0'),
(23, 0, 'index', 1407552343, 'login/login_controller', '', '::1', 'Mozilla/5.0 (Windows NT 6.2; WOW64; rv:31.0) Gecko/20100101 Firefox/31.0'),
(24, 0, 'authenticate_user', 1407552352, 'login/login_controller/authenticate_user', '{"login_username":"gayathma3","login_password":"abc123@#"}', '::1', 'Mozilla/5.0 (Windows NT 6.2; WOW64; rv:31.0) Gecko/20100101 Firefox/31.0'),
(25, 0, 'index', 1407552444, 'login/login_controller', '', '::1', 'Mozilla/5.0 (Windows NT 6.2; WOW64; rv:31.0) Gecko/20100101 Firefox/31.0'),
(26, 0, 'authenticate_user', 1407552454, 'login/login_controller/authenticate_user', '{"login_username":"gayathma3","login_password":"abc123@#"}', '::1', 'Mozilla/5.0 (Windows NT 6.2; WOW64; rv:31.0) Gecko/20100101 Firefox/31.0'),
(27, 0, 'index', 1407552497, 'login/login_controller', '', '::1', 'Mozilla/5.0 (Windows NT 6.2; WOW64; rv:31.0) Gecko/20100101 Firefox/31.0'),
(28, 0, 'authenticate_user', 1407552510, 'login/login_controller/authenticate_user', '{"login_username":"gayathma3","login_password":"abc123@#"}', '::1', 'Mozilla/5.0 (Windows NT 6.2; WOW64; rv:31.0) Gecko/20100101 Firefox/31.0'),
(29, 0, 'index', 1407552513, 'login/login_controller', '', '::1', 'Mozilla/5.0 (Windows NT 6.2; WOW64; rv:31.0) Gecko/20100101 Firefox/31.0'),
(30, 0, 'index', 1407552514, 'dashboard/dashboard_controller', '', '::1', 'Mozilla/5.0 (Windows NT 6.2; WOW64; rv:31.0) Gecko/20100101 Firefox/31.0'),
(31, 0, '%5Bobject%20Object%5D', 1407552516, 'dashboard/dashboard_controller/%5Bobject%20Object%5D', '', '::1', 'Mozilla/5.0 (Windows NT 6.2; WOW64; rv:31.0) Gecko/20100101 Firefox/31.0'),
(32, 0, 'manage_employee_screenshot', 1407552527, 'employee_screenshots/employee_screenshots_controller/manage_employee_screenshot', '', '::1', 'Mozilla/5.0 (Windows NT 6.2; WOW64; rv:31.0) Gecko/20100101 Firefox/31.0'),
(33, 0, 'assets', 1407552528, 'employee_screenshots/employee_screenshots_controller/assets/img/others/denali.jpg', '', '::1', 'Mozilla/5.0 (Windows NT 6.2; WOW64; rv:31.0) Gecko/20100101 Firefox/31.0'),
(34, 0, 'assets', 1407552528, 'employee_screenshots/employee_screenshots_controller/assets/img/others/glacier.jpg', '', '::1', 'Mozilla/5.0 (Windows NT 6.2; WOW64; rv:31.0) Gecko/20100101 Firefox/31.0'),
(35, 0, 'assets', 1407552528, 'employee_screenshots/employee_screenshots_controller/assets/img/others/crater.jpg', '', '::1', 'Mozilla/5.0 (Windows NT 6.2; WOW64; rv:31.0) Gecko/20100101 Firefox/31.0'),
(36, 0, 'assets', 1407552528, 'employee_screenshots/employee_screenshots_controller/assets/img/others/grand.jpg', '', '::1', 'Mozilla/5.0 (Windows NT 6.2; WOW64; rv:31.0) Gecko/20100101 Firefox/31.0'),
(37, 0, 'assets', 1407552528, 'employee_screenshots/employee_screenshots_controller/assets/img/others/great.jpg', '', '::1', 'Mozilla/5.0 (Windows NT 6.2; WOW64; rv:31.0) Gecko/20100101 Firefox/31.0'),
(38, 0, 'assets', 1407552528, 'employee_screenshots/employee_screenshots_controller/assets/img/others/haleakala.jpg', '', '::1', 'Mozilla/5.0 (Windows NT 6.2; WOW64; rv:31.0) Gecko/20100101 Firefox/31.0'),
(39, 0, 'assets', 1407552529, 'employee_screenshots/employee_screenshots_controller/assets/img/others/yellowstone.jpg', '', '::1', 'Mozilla/5.0 (Windows NT 6.2; WOW64; rv:31.0) Gecko/20100101 Firefox/31.0'),
(40, 0, '%5Bobject%20Object%5D', 1407552529, 'employee_screenshots/employee_screenshots_controller/%5Bobject%20Object%5D', '', '::1', 'Mozilla/5.0 (Windows NT 6.2; WOW64; rv:31.0) Gecko/20100101 Firefox/31.0'),
(41, 0, 'assets', 1407552529, 'employee_screenshots/employee_screenshots_controller/assets/img/others/zion.jpg', '', '::1', 'Mozilla/5.0 (Windows NT 6.2; WOW64; rv:31.0) Gecko/20100101 Firefox/31.0'),
(42, 0, 'manage_notification', 1407552631, 'notification/notification_controller/manage_notification', '', '::1', 'Mozilla/5.0 (Windows NT 6.2; WOW64; rv:31.0) Gecko/20100101 Firefox/31.0'),
(43, 0, '%5Bobject%20Object%5D', 1407552634, 'notification/notification_controller/%5Bobject%20Object%5D', '', '::1', 'Mozilla/5.0 (Windows NT 6.2; WOW64; rv:31.0) Gecko/20100101 Firefox/31.0'),
(44, 0, 'manage_projects', 1407552804, 'project/project_controller/manage_projects', '', '::1', 'Mozilla/5.0 (Windows NT 6.2; WOW64; rv:31.0) Gecko/20100101 Firefox/31.0'),
(45, 0, '%5Bobject%20Object%5D', 1407552807, 'project/project_controller/%5Bobject%20Object%5D', '', '::1', 'Mozilla/5.0 (Windows NT 6.2; WOW64; rv:31.0) Gecko/20100101 Firefox/31.0'),
(46, 0, 'add_project_view', 1407552812, 'project/project_controller/add_project_view', '', '::1', 'Mozilla/5.0 (Windows NT 6.2; WOW64; rv:31.0) Gecko/20100101 Firefox/31.0'),
(47, 0, 'index', 1407552816, 'project/fileupload', '', '::1', 'Mozilla/5.0 (Windows NT 6.2; WOW64; rv:31.0) Gecko/20100101 Firefox/31.0'),
(48, 0, 'add_project_view', 1407553273, 'project/project_controller/add_project_view', '', '::1', 'Mozilla/5.0 (Windows NT 6.2; WOW64; rv:31.0) Gecko/20100101 Firefox/31.0'),
(49, 0, 'index', 1407553276, 'project/fileupload', '', '::1', 'Mozilla/5.0 (Windows NT 6.2; WOW64; rv:31.0) Gecko/20100101 Firefox/31.0'),
(50, 0, 'manage_projects', 1407553282, 'project/project_controller/manage_projects', '', '::1', 'Mozilla/5.0 (Windows NT 6.2; WOW64; rv:31.0) Gecko/20100101 Firefox/31.0'),
(51, 0, '%5Bobject%20Object%5D', 1407553284, 'project/project_controller/%5Bobject%20Object%5D', '', '::1', 'Mozilla/5.0 (Windows NT 6.2; WOW64; rv:31.0) Gecko/20100101 Firefox/31.0'),
(52, 0, 'add_project_view', 1407553286, 'project/project_controller/add_project_view', '', '::1', 'Mozilla/5.0 (Windows NT 6.2; WOW64; rv:31.0) Gecko/20100101 Firefox/31.0'),
(53, 0, 'index', 1407553288, 'project/fileupload', '', '::1', 'Mozilla/5.0 (Windows NT 6.2; WOW64; rv:31.0) Gecko/20100101 Firefox/31.0'),
(54, 0, 'manage_companies', 1407553301, 'company/company_controller/manage_companies', '', '::1', 'Mozilla/5.0 (Windows NT 6.2; WOW64; rv:31.0) Gecko/20100101 Firefox/31.0'),
(55, 0, '%5Bobject%20Object%5D', 1407553303, 'company/company_controller/%5Bobject%20Object%5D', '', '::1', 'Mozilla/5.0 (Windows NT 6.2; WOW64; rv:31.0) Gecko/20100101 Firefox/31.0'),
(56, 0, 'edit_company_view', 1407553308, 'company/company_controller/edit_company_view/1', '', '::1', 'Mozilla/5.0 (Windows NT 6.2; WOW64; rv:31.0) Gecko/20100101 Firefox/31.0'),
(57, 0, 'edit_company_view', 1407553310, 'company/company_controller/edit_company_view/%5Bobject%20Object%5D', '', '::1', 'Mozilla/5.0 (Windows NT 6.2; WOW64; rv:31.0) Gecko/20100101 Firefox/31.0'),
(58, 0, 'index', 1407556013, 'login/login_controller', '', '::1', 'Mozilla/5.0 (Windows NT 6.2; WOW64; rv:31.0) Gecko/20100101 Firefox/31.0'),
(59, 0, 'index', 1407556014, 'dashboard/dashboard_controller', '', '::1', 'Mozilla/5.0 (Windows NT 6.2; WOW64; rv:31.0) Gecko/20100101 Firefox/31.0'),
(60, 0, '%5Bobject%20Object%5D', 1407556017, 'dashboard/dashboard_controller/%5Bobject%20Object%5D', '', '::1', 'Mozilla/5.0 (Windows NT 6.2; WOW64; rv:31.0) Gecko/20100101 Firefox/31.0'),
(61, 0, 'manage_notification', 1407556514, 'notification/notification_controller/manage_notification', '', '::1', 'Mozilla/5.0 (Windows NT 6.2; WOW64; rv:31.0) Gecko/20100101 Firefox/31.0'),
(62, 0, '%5Bobject%20Object%5D', 1407556516, 'notification/notification_controller/%5Bobject%20Object%5D', '', '::1', 'Mozilla/5.0 (Windows NT 6.2; WOW64; rv:31.0) Gecko/20100101 Firefox/31.0'),
(63, 0, 'manage_companies', 1407557335, 'company/company_controller/manage_companies', '', '::1', 'Mozilla/5.0 (Windows NT 6.2; WOW64; rv:31.0) Gecko/20100101 Firefox/31.0'),
(64, 0, '%5Bobject%20Object%5D', 1407557338, 'company/company_controller/%5Bobject%20Object%5D', '', '::1', 'Mozilla/5.0 (Windows NT 6.2; WOW64; rv:31.0) Gecko/20100101 Firefox/31.0'),
(65, 0, 'edit_company_view', 1407557480, 'company/company_controller/edit_company_view/1', '', '::1', 'Mozilla/5.0 (Windows NT 6.2; WOW64; rv:31.0) Gecko/20100101 Firefox/31.0'),
(66, 0, 'edit_company_view', 1407557482, 'company/company_controller/edit_company_view/%5Bobject%20Object%5D', '', '::1', 'Mozilla/5.0 (Windows NT 6.2; WOW64; rv:31.0) Gecko/20100101 Firefox/31.0'),
(67, 0, 'manage_notification', 1407557803, 'notification/notification_controller/manage_notification', '', '::1', 'Mozilla/5.0 (Windows NT 6.2; WOW64; rv:31.0) Gecko/20100101 Firefox/31.0'),
(68, 0, '%5Bobject%20Object%5D', 1407557805, 'notification/notification_controller/%5Bobject%20Object%5D', '', '::1', 'Mozilla/5.0 (Windows NT 6.2; WOW64; rv:31.0) Gecko/20100101 Firefox/31.0'),
(69, 0, 'manage_companies', 1407558028, 'company/company_controller/manage_companies', '', '::1', 'Mozilla/5.0 (Windows NT 6.2; WOW64; rv:31.0) Gecko/20100101 Firefox/31.0'),
(70, 0, '%5Bobject%20Object%5D', 1407558030, 'company/company_controller/%5Bobject%20Object%5D', '', '::1', 'Mozilla/5.0 (Windows NT 6.2; WOW64; rv:31.0) Gecko/20100101 Firefox/31.0'),
(71, 0, 'manage_projects', 1407558138, 'project/project_controller/manage_projects', '', '::1', 'Mozilla/5.0 (Windows NT 6.2; WOW64; rv:31.0) Gecko/20100101 Firefox/31.0'),
(72, 0, '%5Bobject%20Object%5D', 1407558141, 'project/project_controller/%5Bobject%20Object%5D', '', '::1', 'Mozilla/5.0 (Windows NT 6.2; WOW64; rv:31.0) Gecko/20100101 Firefox/31.0'),
(73, 0, 'add_project_view', 1407558142, 'project/project_controller/add_project_view', '', '::1', 'Mozilla/5.0 (Windows NT 6.2; WOW64; rv:31.0) Gecko/20100101 Firefox/31.0'),
(74, 0, 'index', 1407558144, 'project/fileupload', '', '::1', 'Mozilla/5.0 (Windows NT 6.2; WOW64; rv:31.0) Gecko/20100101 Firefox/31.0'),
(75, 0, 'index', 1407558217, 'project/fileupload', '{"project_name":"","project_vendor":"","project_start_date":"2014-08-09","project_end_date":"","project_description":"","_wysihtml5_mode":"1","project_logo":"project_default_logo.png"}', '::1', 'Mozilla/5.0 (Windows NT 6.2; WOW64; rv:31.0) Gecko/20100101 Firefox/31.0'),
(76, 0, 'manage_companies', 1407558253, 'company/company_controller/manage_companies', '', '::1', 'Mozilla/5.0 (Windows NT 6.2; WOW64; rv:31.0) Gecko/20100101 Firefox/31.0'),
(77, 0, '%5Bobject%20Object%5D', 1407558255, 'company/company_controller/%5Bobject%20Object%5D', '', '::1', 'Mozilla/5.0 (Windows NT 6.2; WOW64; rv:31.0) Gecko/20100101 Firefox/31.0'),
(78, 0, 'edit_company_view', 1407558257, 'company/company_controller/edit_company_view/1', '', '::1', 'Mozilla/5.0 (Windows NT 6.2; WOW64; rv:31.0) Gecko/20100101 Firefox/31.0'),
(79, 0, 'edit_company_view', 1407558259, 'company/company_controller/edit_company_view/%5Bobject%20Object%5D', '', '::1', 'Mozilla/5.0 (Windows NT 6.2; WOW64; rv:31.0) Gecko/20100101 Firefox/31.0'),
(80, 0, 'edit_company_view', 1407558398, 'company/company_controller/edit_company_view/1', '', '::1', 'Mozilla/5.0 (Windows NT 6.2; WOW64; rv:31.0) Gecko/20100101 Firefox/31.0'),
(81, 0, 'edit_company_view', 1407558400, 'company/company_controller/edit_company_view/%5Bobject%20Object%5D', '', '::1', 'Mozilla/5.0 (Windows NT 6.2; WOW64; rv:31.0) Gecko/20100101 Firefox/31.0'),
(82, 0, 'edit_company_view', 1407558566, 'company/company_controller/edit_company_view/1', '', '::1', 'Mozilla/5.0 (Windows NT 6.2; WOW64; rv:31.0) Gecko/20100101 Firefox/31.0'),
(83, 0, 'edit_company_view', 1407558569, 'company/company_controller/edit_company_view/%5Bobject%20Object%5D', '', '::1', 'Mozilla/5.0 (Windows NT 6.2; WOW64; rv:31.0) Gecko/20100101 Firefox/31.0'),
(84, 0, 'manage_projects', 1407558579, 'project/project_controller/manage_projects', '', '::1', 'Mozilla/5.0 (Windows NT 6.2; WOW64; rv:31.0) Gecko/20100101 Firefox/31.0'),
(85, 0, '%5Bobject%20Object%5D', 1407558581, 'project/project_controller/%5Bobject%20Object%5D', '', '::1', 'Mozilla/5.0 (Windows NT 6.2; WOW64; rv:31.0) Gecko/20100101 Firefox/31.0'),
(86, 0, 'manage_employees', 1407558584, 'employee/employee_controller/manage_employees', '', '::1', 'Mozilla/5.0 (Windows NT 6.2; WOW64; rv:31.0) Gecko/20100101 Firefox/31.0'),
(87, 0, '%5Bobject%20Object%5D', 1407558586, 'employee/employee_controller/%5Bobject%20Object%5D', '', '::1', 'Mozilla/5.0 (Windows NT 6.2; WOW64; rv:31.0) Gecko/20100101 Firefox/31.0'),
(88, 0, 'edit_employee_view', 1407558593, 'employee/employee_controller/edit_employee_view/4', '', '::1', 'Mozilla/5.0 (Windows NT 6.2; WOW64; rv:31.0) Gecko/20100101 Firefox/31.0'),
(89, 0, 'edit_employee_view', 1407558595, 'employee/employee_controller/edit_employee_view/%5Bobject%20Object%5D', '', '::1', 'Mozilla/5.0 (Windows NT 6.2; WOW64; rv:31.0) Gecko/20100101 Firefox/31.0'),
(90, 0, 'edit_employee_view', 1407558642, 'employee/employee_controller/edit_employee_view/4', '', '::1', 'Mozilla/5.0 (Windows NT 6.2; WOW64; rv:31.0) Gecko/20100101 Firefox/31.0'),
(91, 0, 'edit_employee_view', 1407558645, 'employee/employee_controller/edit_employee_view/%5Bobject%20Object%5D', '', '::1', 'Mozilla/5.0 (Windows NT 6.2; WOW64; rv:31.0) Gecko/20100101 Firefox/31.0'),
(92, 0, 'edit_employee_view', 1407558672, 'employee/employee_controller/edit_employee_view/4', '', '::1', 'Mozilla/5.0 (Windows NT 6.2; WOW64; rv:31.0) Gecko/20100101 Firefox/31.0'),
(93, 0, 'edit_employee_view', 1407558674, 'employee/employee_controller/edit_employee_view/%5Bobject%20Object%5D', '', '::1', 'Mozilla/5.0 (Windows NT 6.2; WOW64; rv:31.0) Gecko/20100101 Firefox/31.0'),
(94, 0, 'edit_employee_view', 1407558751, 'employee/employee_controller/edit_employee_view/4', '', '::1', 'Mozilla/5.0 (Windows NT 6.2; WOW64; rv:31.0) Gecko/20100101 Firefox/31.0'),
(95, 0, 'edit_employee_view', 1407558755, 'employee/employee_controller/edit_employee_view/%5Bobject%20Object%5D', '', '::1', 'Mozilla/5.0 (Windows NT 6.2; WOW64; rv:31.0) Gecko/20100101 Firefox/31.0'),
(96, 0, 'edit_employee_view', 1407558842, 'employee/employee_controller/edit_employee_view/4', '', '::1', 'Mozilla/5.0 (Windows NT 6.2; WOW64; rv:31.0) Gecko/20100101 Firefox/31.0'),
(97, 0, 'edit_employee_view', 1407558846, 'employee/employee_controller/edit_employee_view/%5Bobject%20Object%5D', '', '::1', 'Mozilla/5.0 (Windows NT 6.2; WOW64; rv:31.0) Gecko/20100101 Firefox/31.0'),
(98, 0, 'edit_employee_view', 1407558859, 'employee/employee_controller/edit_employee_view/4', '', '::1', 'Mozilla/5.0 (Windows NT 6.2; WOW64; rv:31.0) Gecko/20100101 Firefox/31.0'),
(99, 0, 'edit_employee_view', 1407558863, 'employee/employee_controller/edit_employee_view/%5Bobject%20Object%5D', '', '::1', 'Mozilla/5.0 (Windows NT 6.2; WOW64; rv:31.0) Gecko/20100101 Firefox/31.0'),
(100, 0, 'manage_skill_matrix', 1407558898, 'skill_matrix/skill_matrix_controller/manage_skill_matrix', '', '::1', 'Mozilla/5.0 (Windows NT 6.2; WOW64; rv:31.0) Gecko/20100101 Firefox/31.0'),
(101, 0, '%5Bobject%20Object%5D', 1407558900, 'skill_matrix/skill_matrix_controller/%5Bobject%20Object%5D', '', '::1', 'Mozilla/5.0 (Windows NT 6.2; WOW64; rv:31.0) Gecko/20100101 Firefox/31.0'),
(102, 0, 'manage_skill_category', 1407558903, 'skill/skill_category_controller/manage_skill_category', '', '::1', 'Mozilla/5.0 (Windows NT 6.2; WOW64; rv:31.0) Gecko/20100101 Firefox/31.0'),
(103, 0, '%5Bobject%20Object%5D', 1407558905, 'skill/skill_category_controller/%5Bobject%20Object%5D', '', '::1', 'Mozilla/5.0 (Windows NT 6.2; WOW64; rv:31.0) Gecko/20100101 Firefox/31.0'),
(104, 0, 'add_new_skill_category', 1407558910, 'skill/skill_category_controller/add_new_skill_category', '{"skill_cat_name":"czx","colour":"#9c3131"}', '::1', 'Mozilla/5.0 (Windows NT 6.2; WOW64; rv:31.0) Gecko/20100101 Firefox/31.0'),
(105, 0, 'manage_skill_category', 1407558911, 'skill/skill_category_controller/manage_skill_category', '', '::1', 'Mozilla/5.0 (Windows NT 6.2; WOW64; rv:31.0) Gecko/20100101 Firefox/31.0'),
(106, 0, '%5Bobject%20Object%5D', 1407558914, 'skill/skill_category_controller/%5Bobject%20Object%5D', '', '::1', 'Mozilla/5.0 (Windows NT 6.2; WOW64; rv:31.0) Gecko/20100101 Firefox/31.0'),
(107, 0, 'edit_skill_category_view', 1407558916, 'skill/skill_category_controller/edit_skill_category_view/1', '', '::1', 'Mozilla/5.0 (Windows NT 6.2; WOW64; rv:31.0) Gecko/20100101 Firefox/31.0'),
(108, 0, 'edit_skill_category_view', 1407558918, 'skill/skill_category_controller/edit_skill_category_view/%5Bobject%20Object%5D', '', '::1', 'Mozilla/5.0 (Windows NT 6.2; WOW64; rv:31.0) Gecko/20100101 Firefox/31.0'),
(109, 0, 'manage_employee_screenshot', 1407558933, 'employee_screenshots/employee_screenshots_controller/manage_employee_screenshot', '', '::1', 'Mozilla/5.0 (Windows NT 6.2; WOW64; rv:31.0) Gecko/20100101 Firefox/31.0'),
(110, 0, 'assets', 1407558934, 'employee_screenshots/employee_screenshots_controller/assets/img/others/denali.jpg', '', '::1', 'Mozilla/5.0 (Windows NT 6.2; WOW64; rv:31.0) Gecko/20100101 Firefox/31.0'),
(111, 0, 'assets', 1407558934, 'employee_screenshots/employee_screenshots_controller/assets/img/others/glacier.jpg', '', '::1', 'Mozilla/5.0 (Windows NT 6.2; WOW64; rv:31.0) Gecko/20100101 Firefox/31.0'),
(112, 0, 'assets', 1407558934, 'employee_screenshots/employee_screenshots_controller/assets/img/others/haleakala.jpg', '', '::1', 'Mozilla/5.0 (Windows NT 6.2; WOW64; rv:31.0) Gecko/20100101 Firefox/31.0'),
(113, 0, 'assets', 1407558934, 'employee_screenshots/employee_screenshots_controller/assets/img/others/great.jpg', '', '::1', 'Mozilla/5.0 (Windows NT 6.2; WOW64; rv:31.0) Gecko/20100101 Firefox/31.0'),
(114, 0, 'assets', 1407558934, 'employee_screenshots/employee_screenshots_controller/assets/img/others/grand.jpg', '', '::1', 'Mozilla/5.0 (Windows NT 6.2; WOW64; rv:31.0) Gecko/20100101 Firefox/31.0'),
(115, 0, 'assets', 1407558934, 'employee_screenshots/employee_screenshots_controller/assets/img/others/crater.jpg', '', '::1', 'Mozilla/5.0 (Windows NT 6.2; WOW64; rv:31.0) Gecko/20100101 Firefox/31.0'),
(116, 0, 'assets', 1407558935, 'employee_screenshots/employee_screenshots_controller/assets/img/others/yellowstone.jpg', '', '::1', 'Mozilla/5.0 (Windows NT 6.2; WOW64; rv:31.0) Gecko/20100101 Firefox/31.0'),
(117, 0, '%5Bobject%20Object%5D', 1407558935, 'employee_screenshots/employee_screenshots_controller/%5Bobject%20Object%5D', '', '::1', 'Mozilla/5.0 (Windows NT 6.2; WOW64; rv:31.0) Gecko/20100101 Firefox/31.0'),
(118, 0, 'assets', 1407558935, 'employee_screenshots/employee_screenshots_controller/assets/img/others/zion.jpg', '', '::1', 'Mozilla/5.0 (Windows NT 6.2; WOW64; rv:31.0) Gecko/20100101 Firefox/31.0'),
(119, 0, 'manage_projects', 1407558955, 'project/project_controller/manage_projects', '', '::1', 'Mozilla/5.0 (Windows NT 6.2; WOW64; rv:31.0) Gecko/20100101 Firefox/31.0'),
(120, 0, '%5Bobject%20Object%5D', 1407558957, 'project/project_controller/%5Bobject%20Object%5D', '', '::1', 'Mozilla/5.0 (Windows NT 6.2; WOW64; rv:31.0) Gecko/20100101 Firefox/31.0'),
(121, 0, 'add_project_view', 1407558959, 'project/project_controller/add_project_view', '', '::1', 'Mozilla/5.0 (Windows NT 6.2; WOW64; rv:31.0) Gecko/20100101 Firefox/31.0'),
(122, 0, 'index', 1407558962, 'project/fileupload', '', '::1', 'Mozilla/5.0 (Windows NT 6.2; WOW64; rv:31.0) Gecko/20100101 Firefox/31.0'),
(123, 0, 'manage_employee_screenshot', 1407559013, 'employee_screenshots/employee_screenshots_controller/manage_employee_screenshot', '', '::1', 'Mozilla/5.0 (Windows NT 6.2; WOW64; rv:31.0) Gecko/20100101 Firefox/31.0'),
(124, 0, 'assets', 1407559015, 'employee_screenshots/employee_screenshots_controller/assets/img/others/crater.jpg', '', '::1', 'Mozilla/5.0 (Windows NT 6.2; WOW64; rv:31.0) Gecko/20100101 Firefox/31.0'),
(125, 0, 'assets', 1407559015, 'employee_screenshots/employee_screenshots_controller/assets/img/others/denali.jpg', '', '::1', 'Mozilla/5.0 (Windows NT 6.2; WOW64; rv:31.0) Gecko/20100101 Firefox/31.0'),
(126, 0, 'assets', 1407559015, 'employee_screenshots/employee_screenshots_controller/assets/img/others/haleakala.jpg', '', '::1', 'Mozilla/5.0 (Windows NT 6.2; WOW64; rv:31.0) Gecko/20100101 Firefox/31.0'),
(127, 0, 'assets', 1407559015, 'employee_screenshots/employee_screenshots_controller/assets/img/others/glacier.jpg', '', '::1', 'Mozilla/5.0 (Windows NT 6.2; WOW64; rv:31.0) Gecko/20100101 Firefox/31.0'),
(128, 0, 'assets', 1407559015, 'employee_screenshots/employee_screenshots_controller/assets/img/others/grand.jpg', '', '::1', 'Mozilla/5.0 (Windows NT 6.2; WOW64; rv:31.0) Gecko/20100101 Firefox/31.0'),
(129, 0, 'assets', 1407559015, 'employee_screenshots/employee_screenshots_controller/assets/img/others/great.jpg', '', '::1', 'Mozilla/5.0 (Windows NT 6.2; WOW64; rv:31.0) Gecko/20100101 Firefox/31.0'),
(130, 0, 'assets', 1407559016, 'employee_screenshots/employee_screenshots_controller/assets/img/others/yellowstone.jpg', '', '::1', 'Mozilla/5.0 (Windows NT 6.2; WOW64; rv:31.0) Gecko/20100101 Firefox/31.0'),
(131, 0, 'assets', 1407559016, 'employee_screenshots/employee_screenshots_controller/assets/img/others/zion.jpg', '', '::1', 'Mozilla/5.0 (Windows NT 6.2; WOW64; rv:31.0) Gecko/20100101 Firefox/31.0'),
(132, 0, '%5Bobject%20Object%5D', 1407559017, 'employee_screenshots/employee_screenshots_controller/%5Bobject%20Object%5D', '', '::1', 'Mozilla/5.0 (Windows NT 6.2; WOW64; rv:31.0) Gecko/20100101 Firefox/31.0'),
(133, 0, 'manage_employee_screenshot', 1407559059, 'employee_screenshots/employee_screenshots_controller/manage_employee_screenshot', '', '::1', 'Mozilla/5.0 (Windows NT 6.2; WOW64; rv:31.0) Gecko/20100101 Firefox/31.0'),
(134, 0, 'manage_employee_screenshot', 1407559074, 'employee_screenshots/employee_screenshots_controller/manage_employee_screenshot', '', '::1', 'Mozilla/5.0 (Windows NT 6.2; WOW64; rv:31.0) Gecko/20100101 Firefox/31.0'),
(135, 0, 'manage_employee_screenshot', 1407559138, 'employee_screenshots/employee_screenshots_controller/manage_employee_screenshot', '', '::1', 'Mozilla/5.0 (Windows NT 6.2; WOW64; rv:31.0) Gecko/20100101 Firefox/31.0'),
(136, 0, 'assets', 1407559140, 'employee_screenshots/employee_screenshots_controller/assets/img/others/haleakala.jpg', '', '::1', 'Mozilla/5.0 (Windows NT 6.2; WOW64; rv:31.0) Gecko/20100101 Firefox/31.0'),
(137, 0, 'assets', 1407559140, 'employee_screenshots/employee_screenshots_controller/assets/img/others/crater.jpg', '', '::1', 'Mozilla/5.0 (Windows NT 6.2; WOW64; rv:31.0) Gecko/20100101 Firefox/31.0'),
(138, 0, 'assets', 1407559140, 'employee_screenshots/employee_screenshots_controller/assets/img/others/glacier.jpg', '', '::1', 'Mozilla/5.0 (Windows NT 6.2; WOW64; rv:31.0) Gecko/20100101 Firefox/31.0'),
(139, 0, 'assets', 1407559140, 'employee_screenshots/employee_screenshots_controller/assets/img/others/denali.jpg', '', '::1', 'Mozilla/5.0 (Windows NT 6.2; WOW64; rv:31.0) Gecko/20100101 Firefox/31.0'),
(140, 0, 'assets', 1407559140, 'employee_screenshots/employee_screenshots_controller/assets/img/others/great.jpg', '', '::1', 'Mozilla/5.0 (Windows NT 6.2; WOW64; rv:31.0) Gecko/20100101 Firefox/31.0'),
(141, 0, 'assets', 1407559140, 'employee_screenshots/employee_screenshots_controller/assets/img/others/grand.jpg', '', '::1', 'Mozilla/5.0 (Windows NT 6.2; WOW64; rv:31.0) Gecko/20100101 Firefox/31.0'),
(142, 0, 'assets', 1407559141, 'employee_screenshots/employee_screenshots_controller/assets/img/others/zion.jpg', '', '::1', 'Mozilla/5.0 (Windows NT 6.2; WOW64; rv:31.0) Gecko/20100101 Firefox/31.0'),
(143, 0, 'assets', 1407559141, 'employee_screenshots/employee_screenshots_controller/assets/img/others/yellowstone.jpg', '', '::1', 'Mozilla/5.0 (Windows NT 6.2; WOW64; rv:31.0) Gecko/20100101 Firefox/31.0'),
(144, 0, '%5Bobject%20Object%5D', 1407559142, 'employee_screenshots/employee_screenshots_controller/%5Bobject%20Object%5D', '', '::1', 'Mozilla/5.0 (Windows NT 6.2; WOW64; rv:31.0) Gecko/20100101 Firefox/31.0'),
(145, 0, 'manage_employee_screenshot', 1407559179, 'employee_screenshots/employee_screenshots_controller/manage_employee_screenshot', '', '::1', 'Mozilla/5.0 (Windows NT 6.2; WOW64; rv:31.0) Gecko/20100101 Firefox/31.0'),
(146, 0, 'assets', 1407559181, 'employee_screenshots/employee_screenshots_controller/assets/img/others/denali.jpg', '', '::1', 'Mozilla/5.0 (Windows NT 6.2; WOW64; rv:31.0) Gecko/20100101 Firefox/31.0'),
(147, 0, 'assets', 1407559181, 'employee_screenshots/employee_screenshots_controller/assets/img/others/haleakala.jpg', '', '::1', 'Mozilla/5.0 (Windows NT 6.2; WOW64; rv:31.0) Gecko/20100101 Firefox/31.0'),
(148, 0, 'assets', 1407559181, 'employee_screenshots/employee_screenshots_controller/assets/img/others/crater.jpg', '', '::1', 'Mozilla/5.0 (Windows NT 6.2; WOW64; rv:31.0) Gecko/20100101 Firefox/31.0'),
(149, 0, 'assets', 1407559181, 'employee_screenshots/employee_screenshots_controller/assets/img/others/glacier.jpg', '', '::1', 'Mozilla/5.0 (Windows NT 6.2; WOW64; rv:31.0) Gecko/20100101 Firefox/31.0'),
(150, 0, 'assets', 1407559181, 'employee_screenshots/employee_screenshots_controller/assets/img/others/great.jpg', '', '::1', 'Mozilla/5.0 (Windows NT 6.2; WOW64; rv:31.0) Gecko/20100101 Firefox/31.0'),
(151, 0, 'assets', 1407559181, 'employee_screenshots/employee_screenshots_controller/assets/img/others/grand.jpg', '', '::1', 'Mozilla/5.0 (Windows NT 6.2; WOW64; rv:31.0) Gecko/20100101 Firefox/31.0'),
(152, 0, 'assets', 1407559182, 'employee_screenshots/employee_screenshots_controller/assets/img/others/zion.jpg', '', '::1', 'Mozilla/5.0 (Windows NT 6.2; WOW64; rv:31.0) Gecko/20100101 Firefox/31.0'),
(153, 0, 'assets', 1407559182, 'employee_screenshots/employee_screenshots_controller/assets/img/others/yellowstone.jpg', '', '::1', 'Mozilla/5.0 (Windows NT 6.2; WOW64; rv:31.0) Gecko/20100101 Firefox/31.0'),
(154, 0, '%5Bobject%20Object%5D', 1407559183, 'employee_screenshots/employee_screenshots_controller/%5Bobject%20Object%5D', '', '::1', 'Mozilla/5.0 (Windows NT 6.2; WOW64; rv:31.0) Gecko/20100101 Firefox/31.0'),
(155, 0, 'manage_employee_screenshot', 1407559386, 'employee_screenshots/employee_screenshots_controller/manage_employee_screenshot', '', '::1', 'Mozilla/5.0 (Windows NT 6.2; WOW64; rv:31.0) Gecko/20100101 Firefox/31.0'),
(156, 0, 'assets', 1407559388, 'employee_screenshots/employee_screenshots_controller/assets/img/others/crater.jpg', '', '::1', 'Mozilla/5.0 (Windows NT 6.2; WOW64; rv:31.0) Gecko/20100101 Firefox/31.0'),
(157, 0, 'assets', 1407559388, 'employee_screenshots/employee_screenshots_controller/assets/img/others/denali.jpg', '', '::1', 'Mozilla/5.0 (Windows NT 6.2; WOW64; rv:31.0) Gecko/20100101 Firefox/31.0'),
(158, 0, 'assets', 1407559388, 'employee_screenshots/employee_screenshots_controller/assets/img/others/glacier.jpg', '', '::1', 'Mozilla/5.0 (Windows NT 6.2; WOW64; rv:31.0) Gecko/20100101 Firefox/31.0'),
(159, 0, 'assets', 1407559388, 'employee_screenshots/employee_screenshots_controller/assets/img/others/grand.jpg', '', '::1', 'Mozilla/5.0 (Windows NT 6.2; WOW64; rv:31.0) Gecko/20100101 Firefox/31.0'),
(160, 0, 'assets', 1407559388, 'employee_screenshots/employee_screenshots_controller/assets/img/others/great.jpg', '', '::1', 'Mozilla/5.0 (Windows NT 6.2; WOW64; rv:31.0) Gecko/20100101 Firefox/31.0'),
(161, 0, 'assets', 1407559388, 'employee_screenshots/employee_screenshots_controller/assets/img/others/haleakala.jpg', '', '::1', 'Mozilla/5.0 (Windows NT 6.2; WOW64; rv:31.0) Gecko/20100101 Firefox/31.0'),
(162, 0, 'assets', 1407559389, 'employee_screenshots/employee_screenshots_controller/assets/img/others/yellowstone.jpg', '', '::1', 'Mozilla/5.0 (Windows NT 6.2; WOW64; rv:31.0) Gecko/20100101 Firefox/31.0'),
(163, 0, 'assets', 1407559389, 'employee_screenshots/employee_screenshots_controller/assets/img/others/zion.jpg', '', '::1', 'Mozilla/5.0 (Windows NT 6.2; WOW64; rv:31.0) Gecko/20100101 Firefox/31.0'),
(164, 0, '%5Bobject%20Object%5D', 1407559390, 'employee_screenshots/employee_screenshots_controller/%5Bobject%20Object%5D', '', '::1', 'Mozilla/5.0 (Windows NT 6.2; WOW64; rv:31.0) Gecko/20100101 Firefox/31.0'),
(165, 0, 'manage_employee_screenshot', 1407559480, 'employee_screenshots/employee_screenshots_controller/manage_employee_screenshot', '', '::1', 'Mozilla/5.0 (Windows NT 6.2; WOW64; rv:31.0) Gecko/20100101 Firefox/31.0'),
(166, 0, '%5Bobject%20Object%5D', 1407559484, 'employee_screenshots/employee_screenshots_controller/%5Bobject%20Object%5D', '', '::1', 'Mozilla/5.0 (Windows NT 6.2; WOW64; rv:31.0) Gecko/20100101 Firefox/31.0'),
(167, 0, 'manage_employee_screenshot', 1407559568, 'employee_screenshots/employee_screenshots_controller/manage_employee_screenshot', '', '::1', 'Mozilla/5.0 (Windows NT 6.2; WOW64; rv:31.0) Gecko/20100101 Firefox/31.0'),
(168, 0, '%5Bobject%20Object%5D', 1407559572, 'employee_screenshots/employee_screenshots_controller/%5Bobject%20Object%5D', '', '::1', 'Mozilla/5.0 (Windows NT 6.2; WOW64; rv:31.0) Gecko/20100101 Firefox/31.0'),
(169, 0, 'manage_employee_screenshot', 1407559724, 'employee_screenshots/employee_screenshots_controller/manage_employee_screenshot', '', '::1', 'Mozilla/5.0 (Windows NT 6.2; WOW64; rv:31.0) Gecko/20100101 Firefox/31.0'),
(170, 0, '%5Bobject%20Object%5D', 1407559727, 'employee_screenshots/employee_screenshots_controller/%5Bobject%20Object%5D', '', '::1', 'Mozilla/5.0 (Windows NT 6.2; WOW64; rv:31.0) Gecko/20100101 Firefox/31.0'),
(171, 0, 'manage_employee_screenshot', 1407559810, 'employee_screenshots/employee_screenshots_controller/manage_employee_screenshot', '', '::1', 'Mozilla/5.0 (Windows NT 6.2; WOW64; rv:31.0) Gecko/20100101 Firefox/31.0'),
(172, 0, '%5Bobject%20Object%5D', 1407559814, 'employee_screenshots/employee_screenshots_controller/%5Bobject%20Object%5D', '', '::1', 'Mozilla/5.0 (Windows NT 6.2; WOW64; rv:31.0) Gecko/20100101 Firefox/31.0'),
(173, 0, 'manage_employee_screenshot', 1407559881, 'employee_screenshots/employee_screenshots_controller/manage_employee_screenshot', '', '::1', 'Mozilla/5.0 (Windows NT 6.2; WOW64; rv:31.0) Gecko/20100101 Firefox/31.0'),
(174, 0, '%5Bobject%20Object%5D', 1407559885, 'employee_screenshots/employee_screenshots_controller/%5Bobject%20Object%5D', '', '::1', 'Mozilla/5.0 (Windows NT 6.2; WOW64; rv:31.0) Gecko/20100101 Firefox/31.0'),
(175, 0, 'manage_employee_screenshot', 1407559935, 'employee_screenshots/employee_screenshots_controller/manage_employee_screenshot', '', '::1', 'Mozilla/5.0 (Windows NT 6.2; WOW64; rv:31.0) Gecko/20100101 Firefox/31.0'),
(176, 0, '%5Bobject%20Object%5D', 1407559938, 'employee_screenshots/employee_screenshots_controller/%5Bobject%20Object%5D', '', '::1', 'Mozilla/5.0 (Windows NT 6.2; WOW64; rv:31.0) Gecko/20100101 Firefox/31.0'),
(177, 0, 'manage_employee_screenshot', 1407559980, 'employee_screenshots/employee_screenshots_controller/manage_employee_screenshot', '', '::1', 'Mozilla/5.0 (Windows NT 6.2; WOW64; rv:31.0) Gecko/20100101 Firefox/31.0'),
(178, 0, '%5Bobject%20Object%5D', 1407559983, 'employee_screenshots/employee_screenshots_controller/%5Bobject%20Object%5D', '', '::1', 'Mozilla/5.0 (Windows NT 6.2; WOW64; rv:31.0) Gecko/20100101 Firefox/31.0'),
(179, 0, 'manage_employee_screenshot', 1407560361, 'employee_screenshots/employee_screenshots_controller/manage_employee_screenshot', '', '::1', 'Mozilla/5.0 (Windows NT 6.2; WOW64; rv:31.0) Gecko/20100101 Firefox/31.0'),
(180, 0, '%5Bobject%20Object%5D', 1407560363, 'employee_screenshots/employee_screenshots_controller/%5Bobject%20Object%5D', '', '::1', 'Mozilla/5.0 (Windows NT 6.2; WOW64; rv:31.0) Gecko/20100101 Firefox/31.0'),
(181, 0, 'manage_employee_screenshot', 1407560531, 'employee_screenshots/employee_screenshots_controller/manage_employee_screenshot', '', '::1', 'Mozilla/5.0 (Windows NT 6.2; WOW64; rv:31.0) Gecko/20100101 Firefox/31.0'),
(182, 0, '%5Bobject%20Object%5D', 1407560535, 'employee_screenshots/employee_screenshots_controller/%5Bobject%20Object%5D', '', '::1', 'Mozilla/5.0 (Windows NT 6.2; WOW64; rv:31.0) Gecko/20100101 Firefox/31.0'),
(183, 0, 'manage_employees', 1407560817, 'employee/employee_controller/manage_employees', '', '::1', 'Mozilla/5.0 (Windows NT 6.2; WOW64; rv:31.0) Gecko/20100101 Firefox/31.0'),
(184, 0, '%5Bobject%20Object%5D', 1407560819, 'employee/employee_controller/%5Bobject%20Object%5D', '', '::1', 'Mozilla/5.0 (Windows NT 6.2; WOW64; rv:31.0) Gecko/20100101 Firefox/31.0'),
(185, 0, 'manage_skill_matrix', 1407560882, 'skill_matrix/skill_matrix_controller/manage_skill_matrix', '', '::1', 'Mozilla/5.0 (Windows NT 6.2; WOW64; rv:31.0) Gecko/20100101 Firefox/31.0'),
(186, 0, '%5Bobject%20Object%5D', 1407560884, 'skill_matrix/skill_matrix_controller/%5Bobject%20Object%5D', '', '::1', 'Mozilla/5.0 (Windows NT 6.2; WOW64; rv:31.0) Gecko/20100101 Firefox/31.0'),
(187, 0, 'manage_employee_screenshot', 1407560944, 'employee_screenshots/employee_screenshots_controller/manage_employee_screenshot', '', '::1', 'Mozilla/5.0 (Windows NT 6.2; WOW64; rv:31.0) Gecko/20100101 Firefox/31.0'),
(188, 0, '%5Bobject%20Object%5D', 1407560946, 'employee_screenshots/employee_screenshots_controller/%5Bobject%20Object%5D', '', '::1', 'Mozilla/5.0 (Windows NT 6.2; WOW64; rv:31.0) Gecko/20100101 Firefox/31.0'),
(189, 0, 'manage_employee_screenshot', 1407561029, 'employee_screenshots/employee_screenshots_controller/manage_employee_screenshot', '', '::1', 'Mozilla/5.0 (Windows NT 6.2; WOW64; rv:31.0) Gecko/20100101 Firefox/31.0'),
(190, 0, '%5Bobject%20Object%5D', 1407561032, 'employee_screenshots/employee_screenshots_controller/%5Bobject%20Object%5D', '', '::1', 'Mozilla/5.0 (Windows NT 6.2; WOW64; rv:31.0) Gecko/20100101 Firefox/31.0'),
(191, 0, 'manage_employee_screenshot', 1407561096, 'employee_screenshots/employee_screenshots_controller/manage_employee_screenshot', '', '::1', 'Mozilla/5.0 (Windows NT 6.2; WOW64; rv:31.0) Gecko/20100101 Firefox/31.0'),
(192, 0, '%5Bobject%20Object%5D', 1407561100, 'employee_screenshots/employee_screenshots_controller/%5Bobject%20Object%5D', '', '::1', 'Mozilla/5.0 (Windows NT 6.2; WOW64; rv:31.0) Gecko/20100101 Firefox/31.0'),
(193, 0, 'manage_employee_screenshot', 1407561125, 'employee_screenshots/employee_screenshots_controller/manage_employee_screenshot', '', '::1', 'Mozilla/5.0 (Windows NT 6.2; WOW64; rv:31.0) Gecko/20100101 Firefox/31.0'),
(194, 0, '%5Bobject%20Object%5D', 1407561128, 'employee_screenshots/employee_screenshots_controller/%5Bobject%20Object%5D', '', '::1', 'Mozilla/5.0 (Windows NT 6.2; WOW64; rv:31.0) Gecko/20100101 Firefox/31.0'),
(195, 0, 'manage_companies', 1407561591, 'company/company_controller/manage_companies', '', '::1', 'Mozilla/5.0 (Windows NT 6.2; WOW64; rv:31.0) Gecko/20100101 Firefox/31.0'),
(196, 0, '%5Bobject%20Object%5D', 1407561594, 'company/company_controller/%5Bobject%20Object%5D', '', '::1', 'Mozilla/5.0 (Windows NT 6.2; WOW64; rv:31.0) Gecko/20100101 Firefox/31.0'),
(197, 0, 'manage_privilege_masters', 1407561632, 'settings/privilege_master_controller/manage_privilege_masters', '', '::1', 'Mozilla/5.0 (Windows NT 6.2; WOW64; rv:31.0) Gecko/20100101 Firefox/31.0'),
(198, 0, '%5Bobject%20Object%5D', 1407561634, 'settings/privilege_master_controller/%5Bobject%20Object%5D', '', '::1', 'Mozilla/5.0 (Windows NT 6.2; WOW64; rv:31.0) Gecko/20100101 Firefox/31.0'),
(199, 0, 'edit_master_privileges_view', 1407561644, 'settings/privilege_master_controller/edit_master_privileges_view/5', '', '::1', 'Mozilla/5.0 (Windows NT 6.2; WOW64; rv:31.0) Gecko/20100101 Firefox/31.0'),
(200, 0, 'edit_master_privileges_view', 1407561646, 'settings/privilege_master_controller/edit_master_privileges_view/%5Bobject%20Object%5D', '', '::1', 'Mozilla/5.0 (Windows NT 6.2; WOW64; rv:31.0) Gecko/20100101 Firefox/31.0'),
(201, 0, 'manage_privilege_masters', 1407561664, 'settings/privilege_master_controller/manage_privilege_masters', '', '::1', 'Mozilla/5.0 (Windows NT 6.2; WOW64; rv:31.0) Gecko/20100101 Firefox/31.0'),
(202, 0, '%5Bobject%20Object%5D', 1407561666, 'settings/privilege_master_controller/%5Bobject%20Object%5D', '', '::1', 'Mozilla/5.0 (Windows NT 6.2; WOW64; rv:31.0) Gecko/20100101 Firefox/31.0'),
(203, 0, 'manage_privilege_masters', 1407561685, 'settings/privilege_master_controller/manage_privilege_masters', '', '::1', 'Mozilla/5.0 (Windows NT 6.2; WOW64; rv:31.0) Gecko/20100101 Firefox/31.0'),
(204, 0, '%5Bobject%20Object%5D', 1407561687, 'settings/privilege_master_controller/%5Bobject%20Object%5D', '', '::1', 'Mozilla/5.0 (Windows NT 6.2; WOW64; rv:31.0) Gecko/20100101 Firefox/31.0'),
(205, 0, 'manage_employees', 1407561754, 'employee/employee_controller/manage_employees', '', '::1', 'Mozilla/5.0 (Windows NT 6.2; WOW64; rv:31.0) Gecko/20100101 Firefox/31.0'),
(206, 0, '%5Bobject%20Object%5D', 1407561756, 'employee/employee_controller/%5Bobject%20Object%5D', '', '::1', 'Mozilla/5.0 (Windows NT 6.2; WOW64; rv:31.0) Gecko/20100101 Firefox/31.0'),
(207, 0, 'manage_skill_category', 1407561762, 'skill/skill_category_controller/manage_skill_category', '', '::1', 'Mozilla/5.0 (Windows NT 6.2; WOW64; rv:31.0) Gecko/20100101 Firefox/31.0'),
(208, 0, '%5Bobject%20Object%5D', 1407561764, 'skill/skill_category_controller/%5Bobject%20Object%5D', '', '::1', 'Mozilla/5.0 (Windows NT 6.2; WOW64; rv:31.0) Gecko/20100101 Firefox/31.0'),
(209, 0, 'manage_employees', 1407561767, 'employee/employee_controller/manage_employees', '', '::1', 'Mozilla/5.0 (Windows NT 6.2; WOW64; rv:31.0) Gecko/20100101 Firefox/31.0'),
(210, 0, '%5Bobject%20Object%5D', 1407561770, 'employee/employee_controller/%5Bobject%20Object%5D', '', '::1', 'Mozilla/5.0 (Windows NT 6.2; WOW64; rv:31.0) Gecko/20100101 Firefox/31.0'),
(211, 0, 'edit_skill_category_view', 1407561785, 'skill/skill_category_controller/edit_skill_category_view/1', '', '::1', 'Mozilla/5.0 (Windows NT 6.2; WOW64; rv:31.0) Gecko/20100101 Firefox/31.0'),
(212, 0, 'edit_skill_category_view', 1407561788, 'skill/skill_category_controller/edit_skill_category_view/%5Bobject%20Object%5D', '', '::1', 'Mozilla/5.0 (Windows NT 6.2; WOW64; rv:31.0) Gecko/20100101 Firefox/31.0'),
(213, 0, 'edit_skill_category_view', 1407562370, 'skill/skill_category_controller/edit_skill_category_view/1', '', '::1', 'Mozilla/5.0 (Windows NT 6.2; WOW64; rv:31.0) Gecko/20100101 Firefox/31.0'),
(214, 0, 'edit_skill_category_view', 1407562372, 'skill/skill_category_controller/edit_skill_category_view/%5Bobject%20Object%5D', '', '::1', 'Mozilla/5.0 (Windows NT 6.2; WOW64; rv:31.0) Gecko/20100101 Firefox/31.0'),
(215, 0, 'edit_skill_category_view', 1407562459, 'skill/skill_category_controller/edit_skill_category_view/1', '', '::1', 'Mozilla/5.0 (Windows NT 6.2; WOW64; rv:31.0) Gecko/20100101 Firefox/31.0'),
(216, 0, 'edit_skill_category_view', 1407562462, 'skill/skill_category_controller/edit_skill_category_view/%5Bobject%20Object%5D', '', '::1', 'Mozilla/5.0 (Windows NT 6.2; WOW64; rv:31.0) Gecko/20100101 Firefox/31.0'),
(217, 0, 'edit_skill_category_view', 1407562490, 'skill/skill_category_controller/edit_skill_category_view/1', '', '::1', 'Mozilla/5.0 (Windows NT 6.2; WOW64; rv:31.0) Gecko/20100101 Firefox/31.0'),
(218, 0, 'edit_skill_category_view', 1407562492, 'skill/skill_category_controller/edit_skill_category_view/%5Bobject%20Object%5D', '', '::1', 'Mozilla/5.0 (Windows NT 6.2; WOW64; rv:31.0) Gecko/20100101 Firefox/31.0'),
(219, 0, 'manage_skill', 1407562537, 'skill/skill_controller/manage_skill', '', '::1', 'Mozilla/5.0 (Windows NT 6.2; WOW64; rv:31.0) Gecko/20100101 Firefox/31.0'),
(220, 0, '%5Bobject%20Object%5D', 1407562539, 'skill/skill_controller/%5Bobject%20Object%5D', '', '::1', 'Mozilla/5.0 (Windows NT 6.2; WOW64; rv:31.0) Gecko/20100101 Firefox/31.0'),
(221, 0, 'add_new_skill', 1407562546, 'skill/skill_controller/add_new_skill', '{"skill_cat_code":"1","skill_name":"dsdaxxxxx"}', '::1', 'Mozilla/5.0 (Windows NT 6.2; WOW64; rv:31.0) Gecko/20100101 Firefox/31.0'),
(222, 0, 'manage_skill', 1407562547, 'skill/skill_controller/manage_skill', '', '::1', 'Mozilla/5.0 (Windows NT 6.2; WOW64; rv:31.0) Gecko/20100101 Firefox/31.0'),
(223, 0, '%5Bobject%20Object%5D', 1407562549, 'skill/skill_controller/%5Bobject%20Object%5D', '', '::1', 'Mozilla/5.0 (Windows NT 6.2; WOW64; rv:31.0) Gecko/20100101 Firefox/31.0'),
(224, 0, 'edit_skill_view', 1407562551, 'skill/skill_controller/edit_skill_view/1', '', '::1', 'Mozilla/5.0 (Windows NT 6.2; WOW64; rv:31.0) Gecko/20100101 Firefox/31.0'),
(225, 0, 'edit_skill_view', 1407562553, 'skill/skill_controller/edit_skill_view/%5Bobject%20Object%5D', '', '::1', 'Mozilla/5.0 (Windows NT 6.2; WOW64; rv:31.0) Gecko/20100101 Firefox/31.0'),
(226, 0, 'edit_skill_view', 1407562592, 'skill/skill_controller/edit_skill_view/1', '', '::1', 'Mozilla/5.0 (Windows NT 6.2; WOW64; rv:31.0) Gecko/20100101 Firefox/31.0'),
(227, 0, 'edit_skill_view', 1407562595, 'skill/skill_controller/edit_skill_view/%5Bobject%20Object%5D', '', '::1', 'Mozilla/5.0 (Windows NT 6.2; WOW64; rv:31.0) Gecko/20100101 Firefox/31.0'),
(228, 0, 'edit_skill_view', 1407562617, 'skill/skill_controller/edit_skill_view/1', '', '::1', 'Mozilla/5.0 (Windows NT 6.2; WOW64; rv:31.0) Gecko/20100101 Firefox/31.0'),
(229, 0, 'edit_skill_view', 1407562619, 'skill/skill_controller/edit_skill_view/%5Bobject%20Object%5D', '', '::1', 'Mozilla/5.0 (Windows NT 6.2; WOW64; rv:31.0) Gecko/20100101 Firefox/31.0'),
(230, 0, 'manage_privilege_masters', 1407562652, 'settings/privilege_master_controller/manage_privilege_masters', '', '::1', 'Mozilla/5.0 (Windows NT 6.2; WOW64; rv:31.0) Gecko/20100101 Firefox/31.0'),
(231, 0, '%5Bobject%20Object%5D', 1407562654, 'settings/privilege_master_controller/%5Bobject%20Object%5D', '', '::1', 'Mozilla/5.0 (Windows NT 6.2; WOW64; rv:31.0) Gecko/20100101 Firefox/31.0'),
(232, 0, 'edit_master_privileges_view', 1407562655, 'settings/privilege_master_controller/edit_master_privileges_view/5', '', '::1', 'Mozilla/5.0 (Windows NT 6.2; WOW64; rv:31.0) Gecko/20100101 Firefox/31.0'),
(233, 0, 'edit_master_privileges_view', 1407562657, 'settings/privilege_master_controller/edit_master_privileges_view/%5Bobject%20Object%5D', '', '::1', 'Mozilla/5.0 (Windows NT 6.2; WOW64; rv:31.0) Gecko/20100101 Firefox/31.0'),
(234, 0, 'manage_skill_matrix', 1407562718, 'skill_matrix/skill_matrix_controller/manage_skill_matrix', '', '::1', 'Mozilla/5.0 (Windows NT 6.2; WOW64; rv:31.0) Gecko/20100101 Firefox/31.0'),
(235, 0, '%5Bobject%20Object%5D', 1407562720, 'skill_matrix/skill_matrix_controller/%5Bobject%20Object%5D', '', '::1', 'Mozilla/5.0 (Windows NT 6.2; WOW64; rv:31.0) Gecko/20100101 Firefox/31.0'),
(236, 0, 'manage_skill_matrix', 1407563007, 'skill_matrix/skill_matrix_controller/manage_skill_matrix', '', '::1', 'Mozilla/5.0 (Windows NT 6.2; WOW64; rv:31.0) Gecko/20100101 Firefox/31.0'),
(237, 0, '%5Bobject%20Object%5D', 1407563011, 'skill_matrix/skill_matrix_controller/%5Bobject%20Object%5D', '', '::1', 'Mozilla/5.0 (Windows NT 6.2; WOW64; rv:31.0) Gecko/20100101 Firefox/31.0'),
(238, 0, 'manage_skill_matrix', 1407563104, 'skill_matrix/skill_matrix_controller/manage_skill_matrix', '', '::1', 'Mozilla/5.0 (Windows NT 6.2; WOW64; rv:31.0) Gecko/20100101 Firefox/31.0'),
(239, 0, '%5Bobject%20Object%5D', 1407563107, 'skill_matrix/skill_matrix_controller/%5Bobject%20Object%5D', '', '::1', 'Mozilla/5.0 (Windows NT 6.2; WOW64; rv:31.0) Gecko/20100101 Firefox/31.0'),
(240, 0, 'manage_skill_matrix', 1407563275, 'skill_matrix/skill_matrix_controller/manage_skill_matrix', '', '::1', 'Mozilla/5.0 (Windows NT 6.2; WOW64; rv:31.0) Gecko/20100101 Firefox/31.0'),
(241, 0, '%5Bobject%20Object%5D', 1407563279, 'skill_matrix/skill_matrix_controller/%5Bobject%20Object%5D', '', '::1', 'Mozilla/5.0 (Windows NT 6.2; WOW64; rv:31.0) Gecko/20100101 Firefox/31.0'),
(242, 0, 'manage_skill_matrix', 1407563366, 'skill_matrix/skill_matrix_controller/manage_skill_matrix', '', '::1', 'Mozilla/5.0 (Windows NT 6.2; WOW64; rv:31.0) Gecko/20100101 Firefox/31.0'),
(243, 0, '%5Bobject%20Object%5D', 1407563370, 'skill_matrix/skill_matrix_controller/%5Bobject%20Object%5D', '', '::1', 'Mozilla/5.0 (Windows NT 6.2; WOW64; rv:31.0) Gecko/20100101 Firefox/31.0'),
(244, 0, 'manage_skill_matrix', 1407563446, 'skill_matrix/skill_matrix_controller/manage_skill_matrix', '', '::1', 'Mozilla/5.0 (Windows NT 6.2; WOW64; rv:31.0) Gecko/20100101 Firefox/31.0'),
(245, 0, '%5Bobject%20Object%5D', 1407563450, 'skill_matrix/skill_matrix_controller/%5Bobject%20Object%5D', '', '::1', 'Mozilla/5.0 (Windows NT 6.2; WOW64; rv:31.0) Gecko/20100101 Firefox/31.0'),
(246, 0, 'manage_privilege_masters', 1407563572, 'settings/privilege_master_controller/manage_privilege_masters', '', '::1', 'Mozilla/5.0 (Windows NT 6.2; WOW64; rv:31.0) Gecko/20100101 Firefox/31.0'),
(247, 0, '%5Bobject%20Object%5D', 1407563574, 'settings/privilege_master_controller/%5Bobject%20Object%5D', '', '::1', 'Mozilla/5.0 (Windows NT 6.2; WOW64; rv:31.0) Gecko/20100101 Firefox/31.0'),
(248, 0, 'edit_master_privileges_view', 1407563575, 'settings/privilege_master_controller/edit_master_privileges_view/5', '', '::1', 'Mozilla/5.0 (Windows NT 6.2; WOW64; rv:31.0) Gecko/20100101 Firefox/31.0'),
(249, 0, 'edit_master_privileges_view', 1407563577, 'settings/privilege_master_controller/edit_master_privileges_view/%5Bobject%20Object%5D', '', '::1', 'Mozilla/5.0 (Windows NT 6.2; WOW64; rv:31.0) Gecko/20100101 Firefox/31.0'),
(250, 0, 'manage_privileges', 1407563580, 'settings/privilege_controller/manage_privileges', '', '::1', 'Mozilla/5.0 (Windows NT 6.2; WOW64; rv:31.0) Gecko/20100101 Firefox/31.0'),
(251, 0, '%5Bobject%20Object%5D', 1407563582, 'settings/privilege_controller/%5Bobject%20Object%5D', '', '::1', 'Mozilla/5.0 (Windows NT 6.2; WOW64; rv:31.0) Gecko/20100101 Firefox/31.0'),
(252, 0, 'edit_privileges_view', 1407563584, 'settings/privilege_controller/edit_privileges_view/9', '', '::1', 'Mozilla/5.0 (Windows NT 6.2; WOW64; rv:31.0) Gecko/20100101 Firefox/31.0'),
(253, 0, 'edit_privileges_view', 1407563586, 'settings/privilege_controller/edit_privileges_view/%5Bobject%20Object%5D', '', '::1', 'Mozilla/5.0 (Windows NT 6.2; WOW64; rv:31.0) Gecko/20100101 Firefox/31.0'),
(254, 0, 'edit_privileges_view', 1407563604, 'settings/privilege_controller/edit_privileges_view/9', '', '::1', 'Mozilla/5.0 (Windows NT 6.2; WOW64; rv:31.0) Gecko/20100101 Firefox/31.0'),
(255, 0, 'edit_privileges_view', 1407563606, 'settings/privilege_controller/edit_privileges_view/%5Bobject%20Object%5D', '', '::1', 'Mozilla/5.0 (Windows NT 6.2; WOW64; rv:31.0) Gecko/20100101 Firefox/31.0');
INSERT INTO `statistics` (`statistic_id`, `user_id`, `action`, `date`, `uri`, `post_data`, `ip`, `browser`) VALUES
(256, 0, 'manage_privilege_masters', 1407563610, 'settings/privilege_master_controller/manage_privilege_masters', '', '::1', 'Mozilla/5.0 (Windows NT 6.2; WOW64; rv:31.0) Gecko/20100101 Firefox/31.0'),
(257, 0, '%5Bobject%20Object%5D', 1407563612, 'settings/privilege_master_controller/%5Bobject%20Object%5D', '', '::1', 'Mozilla/5.0 (Windows NT 6.2; WOW64; rv:31.0) Gecko/20100101 Firefox/31.0'),
(258, 0, 'manage_skill', 1407563636, 'skill/skill_controller/manage_skill', '', '::1', 'Mozilla/5.0 (Windows NT 6.2; WOW64; rv:31.0) Gecko/20100101 Firefox/31.0'),
(259, 0, '%5Bobject%20Object%5D', 1407563638, 'skill/skill_controller/%5Bobject%20Object%5D', '', '::1', 'Mozilla/5.0 (Windows NT 6.2; WOW64; rv:31.0) Gecko/20100101 Firefox/31.0'),
(260, 0, 'edit_skill_view', 1407564068, 'skill/skill_controller/edit_skill_view/1', '', '::1', 'Mozilla/5.0 (Windows NT 6.2; WOW64; rv:31.0) Gecko/20100101 Firefox/31.0'),
(261, 0, 'edit_skill_view', 1407564071, 'skill/skill_controller/edit_skill_view/%5Bobject%20Object%5D', '', '::1', 'Mozilla/5.0 (Windows NT 6.2; WOW64; rv:31.0) Gecko/20100101 Firefox/31.0'),
(262, 0, 'manage_privilege_masters', 1407564077, 'settings/privilege_master_controller/manage_privilege_masters', '', '::1', 'Mozilla/5.0 (Windows NT 6.2; WOW64; rv:31.0) Gecko/20100101 Firefox/31.0'),
(263, 0, '%5Bobject%20Object%5D', 1407564079, 'settings/privilege_master_controller/%5Bobject%20Object%5D', '', '::1', 'Mozilla/5.0 (Windows NT 6.2; WOW64; rv:31.0) Gecko/20100101 Firefox/31.0'),
(264, 0, 'edit_master_privileges_view', 1407564080, 'settings/privilege_master_controller/edit_master_privileges_view/5', '', '::1', 'Mozilla/5.0 (Windows NT 6.2; WOW64; rv:31.0) Gecko/20100101 Firefox/31.0'),
(265, 0, 'edit_master_privileges_view', 1407564082, 'settings/privilege_master_controller/edit_master_privileges_view/%5Bobject%20Object%5D', '', '::1', 'Mozilla/5.0 (Windows NT 6.2; WOW64; rv:31.0) Gecko/20100101 Firefox/31.0'),
(266, 0, 'edit_master_privileges_view', 1407564200, 'settings/privilege_master_controller/edit_master_privileges_view/5', '', '::1', 'Mozilla/5.0 (Windows NT 6.2; WOW64; rv:31.0) Gecko/20100101 Firefox/31.0'),
(267, 0, 'edit_master_privileges_view', 1407564204, 'settings/privilege_master_controller/edit_master_privileges_view/%5Bobject%20Object%5D', '', '::1', 'Mozilla/5.0 (Windows NT 6.2; WOW64; rv:31.0) Gecko/20100101 Firefox/31.0'),
(268, 0, 'view_profile', 1407564576, 'employee/employee_profile_controller/view_profile', '', '::1', 'Mozilla/5.0 (Windows NT 6.2; WOW64; rv:31.0) Gecko/20100101 Firefox/31.0'),
(269, 0, '%5Bobject%20Object%5D', 1407564579, 'employee/employee_profile_controller/%5Bobject%20Object%5D', '', '::1', 'Mozilla/5.0 (Windows NT 6.2; WOW64; rv:31.0) Gecko/20100101 Firefox/31.0'),
(270, 0, 'upload_employee_avatar', 1407564628, 'employee/employee_profile_controller/upload_employee_avatar', '', '::1', 'Mozilla/5.0 (Windows NT 6.2; WOW64; rv:31.0) Gecko/20100101 Firefox/31.0'),
(271, 0, 'update_employee_avatar', 1407564629, 'employee/employee_profile_controller/update_employee_avatar', '{"employee_avatar":"employee_avatar1407564628-531709_575297122495442_553449702_n.jpg","employee_code":"2"}', '::1', 'Mozilla/5.0 (Windows NT 6.2; WOW64; rv:31.0) Gecko/20100101 Firefox/31.0'),
(272, 0, 'view_profile', 1407564632, 'employee/employee_profile_controller/view_profile', '', '::1', 'Mozilla/5.0 (Windows NT 6.2; WOW64; rv:31.0) Gecko/20100101 Firefox/31.0'),
(273, 0, '%5Bobject%20Object%5D', 1407564634, 'employee/employee_profile_controller/%5Bobject%20Object%5D', '', '::1', 'Mozilla/5.0 (Windows NT 6.2; WOW64; rv:31.0) Gecko/20100101 Firefox/31.0'),
(274, 0, 'view_profile', 1407564651, 'employee/employee_profile_controller/view_profile', '', '::1', 'Mozilla/5.0 (Windows NT 6.2; WOW64; rv:31.0) Gecko/20100101 Firefox/31.0'),
(275, 0, '%5Bobject%20Object%5D', 1407564654, 'employee/employee_profile_controller/%5Bobject%20Object%5D', '', '::1', 'Mozilla/5.0 (Windows NT 6.2; WOW64; rv:31.0) Gecko/20100101 Firefox/31.0'),
(276, 0, 'upload_employee_cover_pic', 1407564663, 'employee/employee_profile_controller/upload_employee_cover_pic', '', '::1', 'Mozilla/5.0 (Windows NT 6.2; WOW64; rv:31.0) Gecko/20100101 Firefox/31.0'),
(277, 0, 'index', 1408158273, 'login/login_controller', '', '::1', 'Mozilla/5.0 (Windows NT 6.2; WOW64; rv:31.0) Gecko/20100101 Firefox/31.0'),
(278, 0, 'authenticate_user', 1408158282, 'login/login_controller/authenticate_user', '{"login_username":"gayathma","login_password":"abc123@#"}', '::1', 'Mozilla/5.0 (Windows NT 6.2; WOW64; rv:31.0) Gecko/20100101 Firefox/31.0'),
(279, 0, 'index', 1408158294, 'login/login_controller', '', '::1', 'Mozilla/5.0 (Windows NT 6.2; WOW64; rv:31.0) Gecko/20100101 Firefox/31.0'),
(280, 0, 'authenticate_user', 1408158304, 'login/login_controller/authenticate_user', '{"login_username":"gayathma3","login_password":"abc123@#"}', '::1', 'Mozilla/5.0 (Windows NT 6.2; WOW64; rv:31.0) Gecko/20100101 Firefox/31.0'),
(281, 0, 'index', 1408158306, 'login/login_controller', '', '::1', 'Mozilla/5.0 (Windows NT 6.2; WOW64; rv:31.0) Gecko/20100101 Firefox/31.0'),
(282, 0, 'index', 1408158307, 'dashboard/dashboard_controller', '', '::1', 'Mozilla/5.0 (Windows NT 6.2; WOW64; rv:31.0) Gecko/20100101 Firefox/31.0'),
(283, 0, '%5Bobject%20Object%5D', 1408158311, 'dashboard/dashboard_controller/%5Bobject%20Object%5D', '', '::1', 'Mozilla/5.0 (Windows NT 6.2; WOW64; rv:31.0) Gecko/20100101 Firefox/31.0'),
(284, 0, 'init_notification_menu', 1408158311, 'notification/notification_controller/init_notification_menu', '', '::1', 'Mozilla/5.0 (Windows NT 6.2; WOW64; rv:31.0) Gecko/20100101 Firefox/31.0'),
(285, 0, 'user_unseen_notification_count', 1408158312, 'notification/notified_users_controller/user_unseen_notification_count', '', '::1', 'Mozilla/5.0 (Windows NT 6.2; WOW64; rv:31.0) Gecko/20100101 Firefox/31.0'),
(286, 0, 'manage_notification', 1408158336, 'notification/notification_controller/manage_notification', '', '::1', 'Mozilla/5.0 (Windows NT 6.2; WOW64; rv:31.0) Gecko/20100101 Firefox/31.0'),
(287, 0, 'init_notification_menu', 1408158338, 'notification/notification_controller/init_notification_menu', '', '::1', 'Mozilla/5.0 (Windows NT 6.2; WOW64; rv:31.0) Gecko/20100101 Firefox/31.0'),
(288, 0, '%5Bobject%20Object%5D', 1408158338, 'notification/notification_controller/%5Bobject%20Object%5D', '', '::1', 'Mozilla/5.0 (Windows NT 6.2; WOW64; rv:31.0) Gecko/20100101 Firefox/31.0'),
(289, 0, 'user_unseen_notification_count', 1408158340, 'notification/notified_users_controller/user_unseen_notification_count', '', '::1', 'Mozilla/5.0 (Windows NT 6.2; WOW64; rv:31.0) Gecko/20100101 Firefox/31.0'),
(290, 0, 'add_new_notification', 1408158393, 'notification/notification_controller/add_new_notification', '{"ntype":"specific","notification_msg":"fasfasfh","system_code":"1","notification_area_url":"fasfasf","notified_users":["6","1"]}', '::1', 'Mozilla/5.0 (Windows NT 6.2; WOW64; rv:31.0) Gecko/20100101 Firefox/31.0'),
(291, 0, 'manage_notification', 1408158394, 'notification/notification_controller/manage_notification', '', '::1', 'Mozilla/5.0 (Windows NT 6.2; WOW64; rv:31.0) Gecko/20100101 Firefox/31.0'),
(292, 0, 'init_notification_menu', 1408158397, 'notification/notification_controller/init_notification_menu', '', '::1', 'Mozilla/5.0 (Windows NT 6.2; WOW64; rv:31.0) Gecko/20100101 Firefox/31.0'),
(293, 0, '%5Bobject%20Object%5D', 1408158397, 'notification/notification_controller/%5Bobject%20Object%5D', '', '::1', 'Mozilla/5.0 (Windows NT 6.2; WOW64; rv:31.0) Gecko/20100101 Firefox/31.0'),
(294, 0, 'user_unseen_notification_count', 1408158398, 'notification/notified_users_controller/user_unseen_notification_count', '', '::1', 'Mozilla/5.0 (Windows NT 6.2; WOW64; rv:31.0) Gecko/20100101 Firefox/31.0'),
(295, 0, 'manage_notification', 1408158410, 'notification/notification_controller/manage_notification', '', '::1', 'Mozilla/5.0 (Windows NT 6.2; WOW64; rv:31.0) Gecko/20100101 Firefox/31.0'),
(296, 0, '%5Bobject%20Object%5D', 1408158412, 'notification/notification_controller/%5Bobject%20Object%5D', '', '::1', 'Mozilla/5.0 (Windows NT 6.2; WOW64; rv:31.0) Gecko/20100101 Firefox/31.0'),
(297, 0, 'init_notification_menu', 1408158412, 'notification/notification_controller/init_notification_menu', '', '::1', 'Mozilla/5.0 (Windows NT 6.2; WOW64; rv:31.0) Gecko/20100101 Firefox/31.0'),
(298, 0, 'user_unseen_notification_count', 1408158413, 'notification/notified_users_controller/user_unseen_notification_count', '', '::1', 'Mozilla/5.0 (Windows NT 6.2; WOW64; rv:31.0) Gecko/20100101 Firefox/31.0'),
(299, 0, 'logout', 1408158423, 'login/login_controller/logout', '', '::1', 'Mozilla/5.0 (Windows NT 6.2; WOW64; rv:31.0) Gecko/20100101 Firefox/31.0'),
(300, 0, 'index', 1408158425, 'login/login_controller', '', '::1', 'Mozilla/5.0 (Windows NT 6.2; WOW64; rv:31.0) Gecko/20100101 Firefox/31.0'),
(301, 0, 'authenticate_user', 1408158709, 'login/login_controller/authenticate_user', '{"login_username":"shamain","login_password":"abc123@#"}', '::1', 'Mozilla/5.0 (Windows NT 6.2; WOW64; rv:31.0) Gecko/20100101 Firefox/31.0'),
(302, 0, 'authenticate_user', 1408158717, 'login/login_controller/authenticate_user', '{"login_username":"shamain","login_password":"abc123@#"}', '::1', 'Mozilla/5.0 (Windows NT 6.2; WOW64; rv:31.0) Gecko/20100101 Firefox/31.0'),
(303, 0, 'index', 1408158720, 'login/login_controller', '', '::1', 'Mozilla/5.0 (Windows NT 6.2; WOW64; rv:31.0) Gecko/20100101 Firefox/31.0'),
(304, 0, 'authenticate_user', 1408158756, 'login/login_controller/authenticate_user', '{"login_username":"shamaingdd","login_password":"abc123@#"}', '::1', 'Mozilla/5.0 (Windows NT 6.2; WOW64; rv:31.0) Gecko/20100101 Firefox/31.0'),
(305, 0, 'index', 1408158759, 'login/login_controller', '', '::1', 'Mozilla/5.0 (Windows NT 6.2; WOW64; rv:31.0) Gecko/20100101 Firefox/31.0'),
(306, 0, 'index', 1408158760, 'dashboard/dashboard_controller', '', '::1', 'Mozilla/5.0 (Windows NT 6.2; WOW64; rv:31.0) Gecko/20100101 Firefox/31.0'),
(307, 0, '%5Bobject%20Object%5D', 1408158763, 'dashboard/dashboard_controller/%5Bobject%20Object%5D', '', '::1', 'Mozilla/5.0 (Windows NT 6.2; WOW64; rv:31.0) Gecko/20100101 Firefox/31.0'),
(308, 0, 'init_notification_menu', 1408158763, 'notification/notification_controller/init_notification_menu', '', '::1', 'Mozilla/5.0 (Windows NT 6.2; WOW64; rv:31.0) Gecko/20100101 Firefox/31.0'),
(309, 0, 'user_unseen_notification_count', 1408158764, 'notification/notified_users_controller/user_unseen_notification_count', '', '::1', 'Mozilla/5.0 (Windows NT 6.2; WOW64; rv:31.0) Gecko/20100101 Firefox/31.0'),
(310, 0, 'user_unseen_notification_count', 1408158776, 'notification/notified_users_controller/user_unseen_notification_count', '', '::1', 'Mozilla/5.0 (Windows NT 6.2; WOW64; rv:31.0) Gecko/20100101 Firefox/31.0'),
(311, 0, 'init_notification_menu', 1408158776, 'notification/notification_controller/init_notification_menu', '', '::1', 'Mozilla/5.0 (Windows NT 6.2; WOW64; rv:31.0) Gecko/20100101 Firefox/31.0'),
(312, 0, 'mark_notification_as_seen', 1408158776, 'notification/notified_users_controller/mark_notification_as_seen/2', '', '::1', 'Mozilla/5.0 (Windows NT 6.2; WOW64; rv:31.0) Gecko/20100101 Firefox/31.0'),
(313, 0, 'user_unseen_notification_count', 1408158777, 'notification/notified_users_controller/user_unseen_notification_count', '', '::1', 'Mozilla/5.0 (Windows NT 6.2; WOW64; rv:31.0) Gecko/20100101 Firefox/31.0'),
(314, 0, 'user_unseen_notification_count', 1408158779, 'notification/notified_users_controller/user_unseen_notification_count', '', '::1', 'Mozilla/5.0 (Windows NT 6.2; WOW64; rv:31.0) Gecko/20100101 Firefox/31.0'),
(315, 0, 'mark_notification_as_seen', 1408158779, 'notification/notified_users_controller/mark_notification_as_seen/2', '', '::1', 'Mozilla/5.0 (Windows NT 6.2; WOW64; rv:31.0) Gecko/20100101 Firefox/31.0'),
(316, 0, 'init_notification_menu', 1408158779, 'notification/notification_controller/init_notification_menu', '', '::1', 'Mozilla/5.0 (Windows NT 6.2; WOW64; rv:31.0) Gecko/20100101 Firefox/31.0'),
(317, 0, 'user_unseen_notification_count', 1408158780, 'notification/notified_users_controller/user_unseen_notification_count', '', '::1', 'Mozilla/5.0 (Windows NT 6.2; WOW64; rv:31.0) Gecko/20100101 Firefox/31.0'),
(318, 0, 'manage_notification', 1408158813, 'notification/notification_controller/manage_notification', '', '::1', 'Mozilla/5.0 (Windows NT 6.2; WOW64; rv:31.0) Gecko/20100101 Firefox/31.0'),
(319, 0, '%5Bobject%20Object%5D', 1408158815, 'notification/notification_controller/%5Bobject%20Object%5D', '', '::1', 'Mozilla/5.0 (Windows NT 6.2; WOW64; rv:31.0) Gecko/20100101 Firefox/31.0'),
(320, 0, 'init_notification_menu', 1408158815, 'notification/notification_controller/init_notification_menu', '', '::1', 'Mozilla/5.0 (Windows NT 6.2; WOW64; rv:31.0) Gecko/20100101 Firefox/31.0'),
(321, 0, 'user_unseen_notification_count', 1408158816, 'notification/notified_users_controller/user_unseen_notification_count', '', '::1', 'Mozilla/5.0 (Windows NT 6.2; WOW64; rv:31.0) Gecko/20100101 Firefox/31.0'),
(322, 0, 'manage_notified_users', 1408158820, 'notification/notified_users_controller/manage_notified_users', '', '::1', 'Mozilla/5.0 (Windows NT 6.2; WOW64; rv:31.0) Gecko/20100101 Firefox/31.0'),
(323, 0, 'manage_notified_users', 1408158822, 'notification/notified_users_controller/manage_notified_users/%5Bobject%20Object%5D', '', '::1', 'Mozilla/5.0 (Windows NT 6.2; WOW64; rv:31.0) Gecko/20100101 Firefox/31.0'),
(324, 0, 'init_notification_menu', 1408158822, 'notification/notification_controller/init_notification_menu', '', '::1', 'Mozilla/5.0 (Windows NT 6.2; WOW64; rv:31.0) Gecko/20100101 Firefox/31.0'),
(325, 0, 'user_unseen_notification_count', 1408158823, 'notification/notified_users_controller/user_unseen_notification_count', '', '::1', 'Mozilla/5.0 (Windows NT 6.2; WOW64; rv:31.0) Gecko/20100101 Firefox/31.0'),
(326, 0, 'manage_notification', 1408158836, 'notification/notification_controller/manage_notification', '', '::1', 'Mozilla/5.0 (Windows NT 6.2; WOW64; rv:31.0) Gecko/20100101 Firefox/31.0'),
(327, 0, '%5Bobject%20Object%5D', 1408158837, 'notification/notification_controller/%5Bobject%20Object%5D', '', '::1', 'Mozilla/5.0 (Windows NT 6.2; WOW64; rv:31.0) Gecko/20100101 Firefox/31.0'),
(328, 0, 'init_notification_menu', 1408158837, 'notification/notification_controller/init_notification_menu', '', '::1', 'Mozilla/5.0 (Windows NT 6.2; WOW64; rv:31.0) Gecko/20100101 Firefox/31.0'),
(329, 0, 'user_unseen_notification_count', 1408158839, 'notification/notified_users_controller/user_unseen_notification_count', '', '::1', 'Mozilla/5.0 (Windows NT 6.2; WOW64; rv:31.0) Gecko/20100101 Firefox/31.0'),
(330, 0, 'add_new_notification', 1408158922, 'notification/notification_controller/add_new_notification', '{"ntype":"global","notification_msg":"gfjh","system_code":"1","notification_area_url":"ghgh"}', '::1', 'Mozilla/5.0 (Windows NT 6.2; WOW64; rv:31.0) Gecko/20100101 Firefox/31.0'),
(331, 0, 'manage_notification', 1408158924, 'notification/notification_controller/manage_notification', '', '::1', 'Mozilla/5.0 (Windows NT 6.2; WOW64; rv:31.0) Gecko/20100101 Firefox/31.0'),
(332, 0, '%5Bobject%20Object%5D', 1408158926, 'notification/notification_controller/%5Bobject%20Object%5D', '', '::1', 'Mozilla/5.0 (Windows NT 6.2; WOW64; rv:31.0) Gecko/20100101 Firefox/31.0'),
(333, 0, 'init_notification_menu', 1408158926, 'notification/notification_controller/init_notification_menu', '', '::1', 'Mozilla/5.0 (Windows NT 6.2; WOW64; rv:31.0) Gecko/20100101 Firefox/31.0'),
(334, 0, 'user_unseen_notification_count', 1408158927, 'notification/notified_users_controller/user_unseen_notification_count', '', '::1', 'Mozilla/5.0 (Windows NT 6.2; WOW64; rv:31.0) Gecko/20100101 Firefox/31.0'),
(335, 0, 'add_new_notification', 1408158963, 'notification/notification_controller/add_new_notification', '{"ntype":"global","notification_msg":"gjhh","system_code":"1","notification_area_url":"urfff"}', '::1', 'Mozilla/5.0 (Windows NT 6.2; WOW64; rv:31.0) Gecko/20100101 Firefox/31.0'),
(336, 0, 'manage_notification', 1408158964, 'notification/notification_controller/manage_notification', '', '::1', 'Mozilla/5.0 (Windows NT 6.2; WOW64; rv:31.0) Gecko/20100101 Firefox/31.0'),
(337, 0, '%5Bobject%20Object%5D', 1408158966, 'notification/notification_controller/%5Bobject%20Object%5D', '', '::1', 'Mozilla/5.0 (Windows NT 6.2; WOW64; rv:31.0) Gecko/20100101 Firefox/31.0'),
(338, 0, 'init_notification_menu', 1408158966, 'notification/notification_controller/init_notification_menu', '', '::1', 'Mozilla/5.0 (Windows NT 6.2; WOW64; rv:31.0) Gecko/20100101 Firefox/31.0'),
(339, 0, 'user_unseen_notification_count', 1408158967, 'notification/notified_users_controller/user_unseen_notification_count', '', '::1', 'Mozilla/5.0 (Windows NT 6.2; WOW64; rv:31.0) Gecko/20100101 Firefox/31.0'),
(340, 0, 'manage_employee_screenshot', 1408159038, 'employee_screenshots/employee_screenshots_controller/manage_employee_screenshot', '', '::1', 'Mozilla/5.0 (Windows NT 6.2; WOW64; rv:31.0) Gecko/20100101 Firefox/31.0'),
(341, 0, 'init_notification_menu', 1408159040, 'notification/notification_controller/init_notification_menu', '', '::1', 'Mozilla/5.0 (Windows NT 6.2; WOW64; rv:31.0) Gecko/20100101 Firefox/31.0'),
(342, 0, '%5Bobject%20Object%5D', 1408159040, 'employee_screenshots/employee_screenshots_controller/%5Bobject%20Object%5D', '', '::1', 'Mozilla/5.0 (Windows NT 6.2; WOW64; rv:31.0) Gecko/20100101 Firefox/31.0'),
(343, 0, 'user_unseen_notification_count', 1408159041, 'notification/notified_users_controller/user_unseen_notification_count', '', '::1', 'Mozilla/5.0 (Windows NT 6.2; WOW64; rv:31.0) Gecko/20100101 Firefox/31.0'),
(344, 0, 'mark_notification_as_seen', 1408159051, 'notification/notified_users_controller/mark_notification_as_seen/14', '', '::1', 'Mozilla/5.0 (Windows NT 6.2; WOW64; rv:31.0) Gecko/20100101 Firefox/31.0'),
(345, 0, 'user_unseen_notification_count', 1408159051, 'notification/notified_users_controller/user_unseen_notification_count', '', '::1', 'Mozilla/5.0 (Windows NT 6.2; WOW64; rv:31.0) Gecko/20100101 Firefox/31.0'),
(346, 0, 'init_notification_menu', 1408159051, 'notification/notification_controller/init_notification_menu', '', '::1', 'Mozilla/5.0 (Windows NT 6.2; WOW64; rv:31.0) Gecko/20100101 Firefox/31.0'),
(347, 0, 'user_unseen_notification_count', 1408159052, 'notification/notified_users_controller/user_unseen_notification_count', '', '::1', 'Mozilla/5.0 (Windows NT 6.2; WOW64; rv:31.0) Gecko/20100101 Firefox/31.0'),
(348, 0, 'email.html', 1408159286, 'employee_screenshots/employee_screenshots_controller/email.html', '', '::1', 'Mozilla/5.0 (Windows NT 6.2; WOW64; rv:31.0) Gecko/20100101 Firefox/31.0'),
(349, 0, 'user_unseen_notification_count', 1408159288, 'notification/notified_users_controller/user_unseen_notification_count', '', '::1', 'Mozilla/5.0 (Windows NT 6.2; WOW64; rv:31.0) Gecko/20100101 Firefox/31.0'),
(350, 0, 'manage_companies', 1408159302, 'company/company_controller/manage_companies', '', '::1', 'Mozilla/5.0 (Windows NT 6.2; WOW64; rv:31.0) Gecko/20100101 Firefox/31.0'),
(351, 0, '%5Bobject%20Object%5D', 1408159304, 'company/company_controller/%5Bobject%20Object%5D', '', '::1', 'Mozilla/5.0 (Windows NT 6.2; WOW64; rv:31.0) Gecko/20100101 Firefox/31.0'),
(352, 0, 'init_notification_menu', 1408159304, 'notification/notification_controller/init_notification_menu', '', '::1', 'Mozilla/5.0 (Windows NT 6.2; WOW64; rv:31.0) Gecko/20100101 Firefox/31.0'),
(353, 0, 'user_unseen_notification_count', 1408159305, 'notification/notified_users_controller/user_unseen_notification_count', '', '::1', 'Mozilla/5.0 (Windows NT 6.2; WOW64; rv:31.0) Gecko/20100101 Firefox/31.0'),
(354, 0, 'manage_skill_matrix', 1408159353, 'skill_matrix/skill_matrix_controller/manage_skill_matrix', '', '::1', 'Mozilla/5.0 (Windows NT 6.2; WOW64; rv:31.0) Gecko/20100101 Firefox/31.0'),
(355, 0, 'init_notification_menu', 1408159355, 'notification/notification_controller/init_notification_menu', '', '::1', 'Mozilla/5.0 (Windows NT 6.2; WOW64; rv:31.0) Gecko/20100101 Firefox/31.0'),
(356, 0, '%5Bobject%20Object%5D', 1408159355, 'skill_matrix/skill_matrix_controller/%5Bobject%20Object%5D', '', '::1', 'Mozilla/5.0 (Windows NT 6.2; WOW64; rv:31.0) Gecko/20100101 Firefox/31.0'),
(357, 0, 'user_unseen_notification_count', 1408159356, 'notification/notified_users_controller/user_unseen_notification_count', '', '::1', 'Mozilla/5.0 (Windows NT 6.2; WOW64; rv:31.0) Gecko/20100101 Firefox/31.0'),
(358, 0, 'manage_projects', 1408159358, 'project/project_controller/manage_projects', '', '::1', 'Mozilla/5.0 (Windows NT 6.2; WOW64; rv:31.0) Gecko/20100101 Firefox/31.0'),
(359, 0, 'init_notification_menu', 1408159360, 'notification/notification_controller/init_notification_menu', '', '::1', 'Mozilla/5.0 (Windows NT 6.2; WOW64; rv:31.0) Gecko/20100101 Firefox/31.0'),
(360, 0, '%5Bobject%20Object%5D', 1408159360, 'project/project_controller/%5Bobject%20Object%5D', '', '::1', 'Mozilla/5.0 (Windows NT 6.2; WOW64; rv:31.0) Gecko/20100101 Firefox/31.0'),
(361, 0, 'user_unseen_notification_count', 1408159361, 'notification/notified_users_controller/user_unseen_notification_count', '', '::1', 'Mozilla/5.0 (Windows NT 6.2; WOW64; rv:31.0) Gecko/20100101 Firefox/31.0'),
(362, 0, 'add_project_view', 1408159369, 'project/project_controller/add_project_view', '', '::1', 'Mozilla/5.0 (Windows NT 6.2; WOW64; rv:31.0) Gecko/20100101 Firefox/31.0'),
(363, 0, 'init_notification_menu', 1408159371, 'notification/notification_controller/init_notification_menu', '', '::1', 'Mozilla/5.0 (Windows NT 6.2; WOW64; rv:31.0) Gecko/20100101 Firefox/31.0'),
(364, 0, 'index', 1408159371, 'project/fileupload', '', '::1', 'Mozilla/5.0 (Windows NT 6.2; WOW64; rv:31.0) Gecko/20100101 Firefox/31.0'),
(365, 0, 'user_unseen_notification_count', 1408159372, 'notification/notified_users_controller/user_unseen_notification_count', '', '::1', 'Mozilla/5.0 (Windows NT 6.2; WOW64; rv:31.0) Gecko/20100101 Firefox/31.0'),
(366, 0, 'manage_notification', 1408159941, 'notification/notification_controller/manage_notification', '', '::1', 'Mozilla/5.0 (Windows NT 6.2; WOW64; rv:31.0) Gecko/20100101 Firefox/31.0'),
(367, 0, '%5Bobject%20Object%5D', 1408159943, 'notification/notification_controller/%5Bobject%20Object%5D', '', '::1', 'Mozilla/5.0 (Windows NT 6.2; WOW64; rv:31.0) Gecko/20100101 Firefox/31.0'),
(368, 0, 'init_notification_menu', 1408159943, 'notification/notification_controller/init_notification_menu', '', '::1', 'Mozilla/5.0 (Windows NT 6.2; WOW64; rv:31.0) Gecko/20100101 Firefox/31.0'),
(369, 0, 'user_unseen_notification_count', 1408159944, 'notification/notified_users_controller/user_unseen_notification_count', '', '::1', 'Mozilla/5.0 (Windows NT 6.2; WOW64; rv:31.0) Gecko/20100101 Firefox/31.0'),
(370, 0, 'add_new_notification', 1408159964, 'notification/notification_controller/add_new_notification', '{"ntype":"global","notification_msg":"vxzvx","system_code":"1","notification_area_url":"vxzvxv"}', '::1', 'Mozilla/5.0 (Windows NT 6.2; WOW64; rv:31.0) Gecko/20100101 Firefox/31.0'),
(371, 0, 'manage_notification', 1408159965, 'notification/notification_controller/manage_notification', '', '::1', 'Mozilla/5.0 (Windows NT 6.2; WOW64; rv:31.0) Gecko/20100101 Firefox/31.0'),
(372, 0, '%5Bobject%20Object%5D', 1408159967, 'notification/notification_controller/%5Bobject%20Object%5D', '', '::1', 'Mozilla/5.0 (Windows NT 6.2; WOW64; rv:31.0) Gecko/20100101 Firefox/31.0'),
(373, 0, 'init_notification_menu', 1408159967, 'notification/notification_controller/init_notification_menu', '', '::1', 'Mozilla/5.0 (Windows NT 6.2; WOW64; rv:31.0) Gecko/20100101 Firefox/31.0'),
(374, 0, 'user_unseen_notification_count', 1408159968, 'notification/notified_users_controller/user_unseen_notification_count', '', '::1', 'Mozilla/5.0 (Windows NT 6.2; WOW64; rv:31.0) Gecko/20100101 Firefox/31.0'),
(375, 0, 'mark_notification_as_seen', 1408159974, 'notification/notified_users_controller/mark_notification_as_seen/20', '', '::1', 'Mozilla/5.0 (Windows NT 6.2; WOW64; rv:31.0) Gecko/20100101 Firefox/31.0'),
(376, 0, 'user_unseen_notification_count', 1408159974, 'notification/notified_users_controller/user_unseen_notification_count', '', '::1', 'Mozilla/5.0 (Windows NT 6.2; WOW64; rv:31.0) Gecko/20100101 Firefox/31.0'),
(377, 0, 'init_notification_menu', 1408159974, 'notification/notification_controller/init_notification_menu', '', '::1', 'Mozilla/5.0 (Windows NT 6.2; WOW64; rv:31.0) Gecko/20100101 Firefox/31.0'),
(378, 0, 'user_unseen_notification_count', 1408159975, 'notification/notified_users_controller/user_unseen_notification_count', '', '::1', 'Mozilla/5.0 (Windows NT 6.2; WOW64; rv:31.0) Gecko/20100101 Firefox/31.0'),
(379, 0, 'mark_notification_as_seen', 1408160011, 'notification/notified_users_controller/mark_notification_as_seen/20', '', '::1', 'Mozilla/5.0 (Windows NT 6.2; WOW64; rv:31.0) Gecko/20100101 Firefox/31.0'),
(380, 0, 'init_notification_menu', 1408160011, 'notification/notification_controller/init_notification_menu', '', '::1', 'Mozilla/5.0 (Windows NT 6.2; WOW64; rv:31.0) Gecko/20100101 Firefox/31.0'),
(381, 0, 'user_unseen_notification_count', 1408160011, 'notification/notified_users_controller/user_unseen_notification_count', '', '::1', 'Mozilla/5.0 (Windows NT 6.2; WOW64; rv:31.0) Gecko/20100101 Firefox/31.0'),
(382, 0, 'user_unseen_notification_count', 1408160012, 'notification/notified_users_controller/user_unseen_notification_count', '', '::1', 'Mozilla/5.0 (Windows NT 6.2; WOW64; rv:31.0) Gecko/20100101 Firefox/31.0'),
(383, 0, 'manage_notified_users', 1408160034, 'notification/notified_users_controller/manage_notified_users', '', '::1', 'Mozilla/5.0 (Windows NT 6.2; WOW64; rv:31.0) Gecko/20100101 Firefox/31.0'),
(384, 0, 'manage_notified_users', 1408160037, 'notification/notified_users_controller/manage_notified_users/%5Bobject%20Object%5D', '', '::1', 'Mozilla/5.0 (Windows NT 6.2; WOW64; rv:31.0) Gecko/20100101 Firefox/31.0'),
(385, 0, 'init_notification_menu', 1408160037, 'notification/notification_controller/init_notification_menu', '', '::1', 'Mozilla/5.0 (Windows NT 6.2; WOW64; rv:31.0) Gecko/20100101 Firefox/31.0'),
(386, 0, 'user_unseen_notification_count', 1408160038, 'notification/notified_users_controller/user_unseen_notification_count', '', '::1', 'Mozilla/5.0 (Windows NT 6.2; WOW64; rv:31.0) Gecko/20100101 Firefox/31.0'),
(387, 0, 'manage_projects', 1408160081, 'project/project_controller/manage_projects', '', '::1', 'Mozilla/5.0 (Windows NT 6.2; WOW64; rv:31.0) Gecko/20100101 Firefox/31.0'),
(388, 0, 'init_notification_menu', 1408160083, 'notification/notification_controller/init_notification_menu', '', '::1', 'Mozilla/5.0 (Windows NT 6.2; WOW64; rv:31.0) Gecko/20100101 Firefox/31.0'),
(389, 0, '%5Bobject%20Object%5D', 1408160083, 'project/project_controller/%5Bobject%20Object%5D', '', '::1', 'Mozilla/5.0 (Windows NT 6.2; WOW64; rv:31.0) Gecko/20100101 Firefox/31.0'),
(390, 0, 'user_unseen_notification_count', 1408160084, 'notification/notified_users_controller/user_unseen_notification_count', '', '::1', 'Mozilla/5.0 (Windows NT 6.2; WOW64; rv:31.0) Gecko/20100101 Firefox/31.0'),
(391, 0, 'manage_skill_matrix', 1408160086, 'skill_matrix/skill_matrix_controller/manage_skill_matrix', '', '::1', 'Mozilla/5.0 (Windows NT 6.2; WOW64; rv:31.0) Gecko/20100101 Firefox/31.0'),
(392, 0, 'init_notification_menu', 1408160088, 'notification/notification_controller/init_notification_menu', '', '::1', 'Mozilla/5.0 (Windows NT 6.2; WOW64; rv:31.0) Gecko/20100101 Firefox/31.0'),
(393, 0, '%5Bobject%20Object%5D', 1408160088, 'skill_matrix/skill_matrix_controller/%5Bobject%20Object%5D', '', '::1', 'Mozilla/5.0 (Windows NT 6.2; WOW64; rv:31.0) Gecko/20100101 Firefox/31.0'),
(394, 0, 'user_unseen_notification_count', 1408160089, 'notification/notified_users_controller/user_unseen_notification_count', '', '::1', 'Mozilla/5.0 (Windows NT 6.2; WOW64; rv:31.0) Gecko/20100101 Firefox/31.0'),
(395, 0, 'manage_skill_category', 1408160096, 'skill/skill_category_controller/manage_skill_category', '', '::1', 'Mozilla/5.0 (Windows NT 6.2; WOW64; rv:31.0) Gecko/20100101 Firefox/31.0'),
(396, 0, 'init_notification_menu', 1408160098, 'notification/notification_controller/init_notification_menu', '', '::1', 'Mozilla/5.0 (Windows NT 6.2; WOW64; rv:31.0) Gecko/20100101 Firefox/31.0'),
(397, 0, '%5Bobject%20Object%5D', 1408160098, 'skill/skill_category_controller/%5Bobject%20Object%5D', '', '::1', 'Mozilla/5.0 (Windows NT 6.2; WOW64; rv:31.0) Gecko/20100101 Firefox/31.0'),
(398, 0, 'user_unseen_notification_count', 1408160099, 'notification/notified_users_controller/user_unseen_notification_count', '', '::1', 'Mozilla/5.0 (Windows NT 6.2; WOW64; rv:31.0) Gecko/20100101 Firefox/31.0'),
(399, 0, 'manage_skill', 1408160101, 'skill/skill_controller/manage_skill', '', '::1', 'Mozilla/5.0 (Windows NT 6.2; WOW64; rv:31.0) Gecko/20100101 Firefox/31.0'),
(400, 0, '%5Bobject%20Object%5D', 1408160103, 'skill/skill_controller/%5Bobject%20Object%5D', '', '::1', 'Mozilla/5.0 (Windows NT 6.2; WOW64; rv:31.0) Gecko/20100101 Firefox/31.0'),
(401, 0, 'init_notification_menu', 1408160103, 'notification/notification_controller/init_notification_menu', '', '::1', 'Mozilla/5.0 (Windows NT 6.2; WOW64; rv:31.0) Gecko/20100101 Firefox/31.0'),
(402, 0, 'user_unseen_notification_count', 1408160104, 'notification/notified_users_controller/user_unseen_notification_count', '', '::1', 'Mozilla/5.0 (Windows NT 6.2; WOW64; rv:31.0) Gecko/20100101 Firefox/31.0'),
(403, 0, 'manage_skill_matrix', 1408160107, 'skill_matrix/skill_matrix_controller/manage_skill_matrix', '', '::1', 'Mozilla/5.0 (Windows NT 6.2; WOW64; rv:31.0) Gecko/20100101 Firefox/31.0'),
(404, 0, 'init_notification_menu', 1408160109, 'notification/notification_controller/init_notification_menu', '', '::1', 'Mozilla/5.0 (Windows NT 6.2; WOW64; rv:31.0) Gecko/20100101 Firefox/31.0'),
(405, 0, '%5Bobject%20Object%5D', 1408160109, 'skill_matrix/skill_matrix_controller/%5Bobject%20Object%5D', '', '::1', 'Mozilla/5.0 (Windows NT 6.2; WOW64; rv:31.0) Gecko/20100101 Firefox/31.0'),
(406, 0, 'user_unseen_notification_count', 1408160110, 'notification/notified_users_controller/user_unseen_notification_count', '', '::1', 'Mozilla/5.0 (Windows NT 6.2; WOW64; rv:31.0) Gecko/20100101 Firefox/31.0'),
(407, 0, 'view_profile', 1408160197, 'employee/employee_profile_controller/view_profile', '', '::1', 'Mozilla/5.0 (Windows NT 6.2; WOW64; rv:31.0) Gecko/20100101 Firefox/31.0'),
(408, 0, 'init_notification_menu', 1408160200, 'notification/notification_controller/init_notification_menu', '', '::1', 'Mozilla/5.0 (Windows NT 6.2; WOW64; rv:31.0) Gecko/20100101 Firefox/31.0'),
(409, 0, '%5Bobject%20Object%5D', 1408160200, 'employee/employee_profile_controller/%5Bobject%20Object%5D', '', '::1', 'Mozilla/5.0 (Windows NT 6.2; WOW64; rv:31.0) Gecko/20100101 Firefox/31.0'),
(410, 0, 'user_unseen_notification_count', 1408160201, 'notification/notified_users_controller/user_unseen_notification_count', '', '::1', 'Mozilla/5.0 (Windows NT 6.2; WOW64; rv:31.0) Gecko/20100101 Firefox/31.0'),
(411, 0, 'manage_skill_category', 1408160335, 'skill/skill_category_controller/manage_skill_category', '', '::1', 'Mozilla/5.0 (Windows NT 6.2; WOW64; rv:31.0) Gecko/20100101 Firefox/31.0'),
(412, 0, '%5Bobject%20Object%5D', 1408160337, 'skill/skill_category_controller/%5Bobject%20Object%5D', '', '::1', 'Mozilla/5.0 (Windows NT 6.2; WOW64; rv:31.0) Gecko/20100101 Firefox/31.0'),
(413, 0, 'init_notification_menu', 1408160337, 'notification/notification_controller/init_notification_menu', '', '::1', 'Mozilla/5.0 (Windows NT 6.2; WOW64; rv:31.0) Gecko/20100101 Firefox/31.0'),
(414, 0, 'user_unseen_notification_count', 1408160338, 'notification/notified_users_controller/user_unseen_notification_count', '', '::1', 'Mozilla/5.0 (Windows NT 6.2; WOW64; rv:31.0) Gecko/20100101 Firefox/31.0'),
(415, 0, 'manage_skill', 1408160339, 'skill/skill_controller/manage_skill', '', '::1', 'Mozilla/5.0 (Windows NT 6.2; WOW64; rv:31.0) Gecko/20100101 Firefox/31.0'),
(416, 0, '%5Bobject%20Object%5D', 1408160340, 'skill/skill_controller/%5Bobject%20Object%5D', '', '::1', 'Mozilla/5.0 (Windows NT 6.2; WOW64; rv:31.0) Gecko/20100101 Firefox/31.0'),
(417, 0, 'init_notification_menu', 1408160340, 'notification/notification_controller/init_notification_menu', '', '::1', 'Mozilla/5.0 (Windows NT 6.2; WOW64; rv:31.0) Gecko/20100101 Firefox/31.0'),
(418, 0, 'user_unseen_notification_count', 1408160341, 'notification/notified_users_controller/user_unseen_notification_count', '', '::1', 'Mozilla/5.0 (Windows NT 6.2; WOW64; rv:31.0) Gecko/20100101 Firefox/31.0'),
(419, 0, 'manage_skill_category', 1408160343, 'skill/skill_category_controller/manage_skill_category', '', '::1', 'Mozilla/5.0 (Windows NT 6.2; WOW64; rv:31.0) Gecko/20100101 Firefox/31.0'),
(420, 0, 'init_notification_menu', 1408160345, 'notification/notification_controller/init_notification_menu', '', '::1', 'Mozilla/5.0 (Windows NT 6.2; WOW64; rv:31.0) Gecko/20100101 Firefox/31.0'),
(421, 0, '%5Bobject%20Object%5D', 1408160345, 'skill/skill_category_controller/%5Bobject%20Object%5D', '', '::1', 'Mozilla/5.0 (Windows NT 6.2; WOW64; rv:31.0) Gecko/20100101 Firefox/31.0'),
(422, 0, 'edit_skill_category_view', 1408160346, 'skill/skill_category_controller/edit_skill_category_view/1', '', '::1', 'Mozilla/5.0 (Windows NT 6.2; WOW64; rv:31.0) Gecko/20100101 Firefox/31.0'),
(423, 0, 'edit_skill_category_view', 1408160346, 'skill/skill_category_controller/edit_skill_category_view/1', '', '::1', 'Mozilla/5.0 (Windows NT 6.2; WOW64; rv:31.0) Gecko/20100101 Firefox/31.0'),
(424, 0, 'init_notification_menu', 1408160348, 'notification/notification_controller/init_notification_menu', '', '::1', 'Mozilla/5.0 (Windows NT 6.2; WOW64; rv:31.0) Gecko/20100101 Firefox/31.0'),
(425, 0, 'edit_skill_category_view', 1408160348, 'skill/skill_category_controller/edit_skill_category_view/%5Bobject%20Object%5D', '', '::1', 'Mozilla/5.0 (Windows NT 6.2; WOW64; rv:31.0) Gecko/20100101 Firefox/31.0'),
(426, 0, 'user_unseen_notification_count', 1408160349, 'notification/notified_users_controller/user_unseen_notification_count', '', '::1', 'Mozilla/5.0 (Windows NT 6.2; WOW64; rv:31.0) Gecko/20100101 Firefox/31.0'),
(427, 0, 'manage_skill', 1408160354, 'skill/skill_controller/manage_skill', '', '::1', 'Mozilla/5.0 (Windows NT 6.2; WOW64; rv:31.0) Gecko/20100101 Firefox/31.0'),
(428, 0, 'init_notification_menu', 1408160356, 'notification/notification_controller/init_notification_menu', '', '::1', 'Mozilla/5.0 (Windows NT 6.2; WOW64; rv:31.0) Gecko/20100101 Firefox/31.0'),
(429, 0, '%5Bobject%20Object%5D', 1408160356, 'skill/skill_controller/%5Bobject%20Object%5D', '', '::1', 'Mozilla/5.0 (Windows NT 6.2; WOW64; rv:31.0) Gecko/20100101 Firefox/31.0'),
(430, 0, 'user_unseen_notification_count', 1408160357, 'notification/notified_users_controller/user_unseen_notification_count', '', '::1', 'Mozilla/5.0 (Windows NT 6.2; WOW64; rv:31.0) Gecko/20100101 Firefox/31.0'),
(431, 0, 'edit_skill_view', 1408160357, 'skill/skill_controller/edit_skill_view/1', '', '::1', 'Mozilla/5.0 (Windows NT 6.2; WOW64; rv:31.0) Gecko/20100101 Firefox/31.0'),
(432, 0, 'edit_skill_view', 1408160359, 'skill/skill_controller/edit_skill_view/%5Bobject%20Object%5D', '', '::1', 'Mozilla/5.0 (Windows NT 6.2; WOW64; rv:31.0) Gecko/20100101 Firefox/31.0'),
(433, 0, 'init_notification_menu', 1408160359, 'notification/notification_controller/init_notification_menu', '', '::1', 'Mozilla/5.0 (Windows NT 6.2; WOW64; rv:31.0) Gecko/20100101 Firefox/31.0'),
(434, 0, 'user_unseen_notification_count', 1408160360, 'notification/notified_users_controller/user_unseen_notification_count', '', '::1', 'Mozilla/5.0 (Windows NT 6.2; WOW64; rv:31.0) Gecko/20100101 Firefox/31.0'),
(435, 0, 'manage_skill_matrix', 1408160363, 'skill_matrix/skill_matrix_controller/manage_skill_matrix', '', '::1', 'Mozilla/5.0 (Windows NT 6.2; WOW64; rv:31.0) Gecko/20100101 Firefox/31.0'),
(436, 0, 'init_notification_menu', 1408160365, 'notification/notification_controller/init_notification_menu', '', '::1', 'Mozilla/5.0 (Windows NT 6.2; WOW64; rv:31.0) Gecko/20100101 Firefox/31.0'),
(437, 0, '%5Bobject%20Object%5D', 1408160365, 'skill_matrix/skill_matrix_controller/%5Bobject%20Object%5D', '', '::1', 'Mozilla/5.0 (Windows NT 6.2; WOW64; rv:31.0) Gecko/20100101 Firefox/31.0'),
(438, 0, 'user_unseen_notification_count', 1408160366, 'notification/notified_users_controller/user_unseen_notification_count', '', '::1', 'Mozilla/5.0 (Windows NT 6.2; WOW64; rv:31.0) Gecko/20100101 Firefox/31.0'),
(439, 0, 'manage_skill_matrix', 1408160593, 'skill_matrix/skill_matrix_controller/manage_skill_matrix', '', '::1', 'Mozilla/5.0 (Windows NT 6.2; WOW64; rv:31.0) Gecko/20100101 Firefox/31.0'),
(440, 0, '%5Bobject%20Object%5D', 1408160595, 'skill_matrix/skill_matrix_controller/%5Bobject%20Object%5D', '', '::1', 'Mozilla/5.0 (Windows NT 6.2; WOW64; rv:31.0) Gecko/20100101 Firefox/31.0'),
(441, 0, 'init_notification_menu', 1408160595, 'notification/notification_controller/init_notification_menu', '', '::1', 'Mozilla/5.0 (Windows NT 6.2; WOW64; rv:31.0) Gecko/20100101 Firefox/31.0'),
(442, 0, 'user_unseen_notification_count', 1408160596, 'notification/notified_users_controller/user_unseen_notification_count', '', '::1', 'Mozilla/5.0 (Windows NT 6.2; WOW64; rv:31.0) Gecko/20100101 Firefox/31.0'),
(443, 0, 'manage_skill_matrix', 1408160617, 'skill_matrix/skill_matrix_controller/manage_skill_matrix', '', '::1', 'Mozilla/5.0 (Windows NT 6.2; WOW64; rv:31.0) Gecko/20100101 Firefox/31.0'),
(444, 0, 'init_notification_menu', 1408160620, 'notification/notification_controller/init_notification_menu', '', '::1', 'Mozilla/5.0 (Windows NT 6.2; WOW64; rv:31.0) Gecko/20100101 Firefox/31.0'),
(445, 0, '%5Bobject%20Object%5D', 1408160620, 'skill_matrix/skill_matrix_controller/%5Bobject%20Object%5D', '', '::1', 'Mozilla/5.0 (Windows NT 6.2; WOW64; rv:31.0) Gecko/20100101 Firefox/31.0'),
(446, 0, 'user_unseen_notification_count', 1408160621, 'notification/notified_users_controller/user_unseen_notification_count', '', '::1', 'Mozilla/5.0 (Windows NT 6.2; WOW64; rv:31.0) Gecko/20100101 Firefox/31.0'),
(447, 0, 'manage_skill', 1408160675, 'skill/skill_controller/manage_skill', '', '::1', 'Mozilla/5.0 (Windows NT 6.2; WOW64; rv:31.0) Gecko/20100101 Firefox/31.0'),
(448, 0, '%5Bobject%20Object%5D', 1408160677, 'skill/skill_controller/%5Bobject%20Object%5D', '', '::1', 'Mozilla/5.0 (Windows NT 6.2; WOW64; rv:31.0) Gecko/20100101 Firefox/31.0'),
(449, 0, 'init_notification_menu', 1408160677, 'notification/notification_controller/init_notification_menu', '', '::1', 'Mozilla/5.0 (Windows NT 6.2; WOW64; rv:31.0) Gecko/20100101 Firefox/31.0'),
(450, 0, 'user_unseen_notification_count', 1408160679, 'notification/notified_users_controller/user_unseen_notification_count', '', '::1', 'Mozilla/5.0 (Windows NT 6.2; WOW64; rv:31.0) Gecko/20100101 Firefox/31.0'),
(451, 0, 'edit_skill_view', 1408160679, 'skill/skill_controller/edit_skill_view/1', '', '::1', 'Mozilla/5.0 (Windows NT 6.2; WOW64; rv:31.0) Gecko/20100101 Firefox/31.0'),
(452, 0, 'edit_skill_view', 1408160681, 'skill/skill_controller/edit_skill_view/%5Bobject%20Object%5D', '', '::1', 'Mozilla/5.0 (Windows NT 6.2; WOW64; rv:31.0) Gecko/20100101 Firefox/31.0'),
(453, 0, 'init_notification_menu', 1408160681, 'notification/notification_controller/init_notification_menu', '', '::1', 'Mozilla/5.0 (Windows NT 6.2; WOW64; rv:31.0) Gecko/20100101 Firefox/31.0'),
(454, 0, 'user_unseen_notification_count', 1408160682, 'notification/notified_users_controller/user_unseen_notification_count', '', '::1', 'Mozilla/5.0 (Windows NT 6.2; WOW64; rv:31.0) Gecko/20100101 Firefox/31.0'),
(455, 0, 'manage_skill_matrix', 1408160751, 'skill_matrix/skill_matrix_controller/manage_skill_matrix', '', '::1', 'Mozilla/5.0 (Windows NT 6.2; WOW64; rv:31.0) Gecko/20100101 Firefox/31.0'),
(456, 0, '%5Bobject%20Object%5D', 1408160754, 'skill_matrix/skill_matrix_controller/%5Bobject%20Object%5D', '', '::1', 'Mozilla/5.0 (Windows NT 6.2; WOW64; rv:31.0) Gecko/20100101 Firefox/31.0'),
(457, 0, 'init_notification_menu', 1408160754, 'notification/notification_controller/init_notification_menu', '', '::1', 'Mozilla/5.0 (Windows NT 6.2; WOW64; rv:31.0) Gecko/20100101 Firefox/31.0'),
(458, 0, 'user_unseen_notification_count', 1408160755, 'notification/notified_users_controller/user_unseen_notification_count', '', '::1', 'Mozilla/5.0 (Windows NT 6.2; WOW64; rv:31.0) Gecko/20100101 Firefox/31.0'),
(459, 0, 'manage_skill_matrix', 1408160898, 'skill_matrix/skill_matrix_controller/manage_skill_matrix', '', '::1', 'Mozilla/5.0 (Windows NT 6.2; WOW64; rv:31.0) Gecko/20100101 Firefox/31.0'),
(460, 0, '%5Bobject%20Object%5D', 1408160902, 'skill_matrix/skill_matrix_controller/%5Bobject%20Object%5D', '', '::1', 'Mozilla/5.0 (Windows NT 6.2; WOW64; rv:31.0) Gecko/20100101 Firefox/31.0'),
(461, 0, 'init_notification_menu', 1408160902, 'notification/notification_controller/init_notification_menu', '', '::1', 'Mozilla/5.0 (Windows NT 6.2; WOW64; rv:31.0) Gecko/20100101 Firefox/31.0'),
(462, 0, 'user_unseen_notification_count', 1408160903, 'notification/notified_users_controller/user_unseen_notification_count', '', '::1', 'Mozilla/5.0 (Windows NT 6.2; WOW64; rv:31.0) Gecko/20100101 Firefox/31.0');

-- --------------------------------------------------------

--
-- Table structure for table `system`
--

CREATE TABLE IF NOT EXISTS `system` (
  `system_code` int(11) NOT NULL AUTO_INCREMENT,
  `system` varchar(100) NOT NULL,
  `dashboard_url` varchar(255) DEFAULT NULL,
  PRIMARY KEY (`system_code`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=5 ;

--
-- Dumping data for table `system`
--

INSERT INTO `system` (`system_code`, `system`, `dashboard_url`) VALUES
(1, 'Employee', '/employee/employee_controller/manage_employees'),
(2, 'Projects', '/project/project_controller/manage_projects'),
(3, 'Privileges', '/settings/privilege_controller/manage_privileges'),
(4, 'Master Privileges', '/settings/privilege_master_controller/manage_privilege_masters');

-- --------------------------------------------------------

--
-- Table structure for table `task`
--

CREATE TABLE IF NOT EXISTS `task` (
  `task_id` int(11) NOT NULL AUTO_INCREMENT,
  `task_name` text NOT NULL,
  `task_descrption` text NOT NULL,
  `task_priority` varchar(30) NOT NULL,
  `task_progress` int(11) NOT NULL,
  `task_deadline` datetime NOT NULL,
  `task_status` enum('1','0') NOT NULL DEFAULT '0' COMMENT '1 - Task Finished 0 - Task Not Finished',
  `project_id` int(11) NOT NULL,
  `del_ind` enum('1','0') NOT NULL,
  `added_date` timestamp NULL DEFAULT NULL,
  `added_by` varchar(100) NOT NULL,
  PRIMARY KEY (`task_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;

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
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

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
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

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
