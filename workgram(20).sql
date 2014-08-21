-- phpMyAdmin SQL Dump
-- version 3.5.2.2
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: Aug 21, 2014 at 07:58 AM
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
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=7 ;

--
-- Dumping data for table `employee`
--

INSERT INTO `employee` (`employee_code`, `employee_no`, `employee_fname`, `employee_lname`, `employee_password`, `employee_email`, `employee_type`, `employee_bday`, `employee_contact`, `employee_wages_category`, `employee_contract`, `employee_avatar`, `employee_cover_image`, `account_activation_code`, `company_code`, `is_online`, `del_ind`, `added_by`, `added_date`, `updated_by`, `updated_date`) VALUES
(1, '1', 'Shamain', 'Peiris', 'c4961b067d274050e43e26beb9d7d19c', 'shamaingdd@gmail.com', 'employee type', '1991-06-10', '0758376047', 412125125, 'dasds', 'employee_avatar1408164180-531709_575297122495442_553449702_n.jpg', NULL, '', 1, 'Y', '1', 12, '2014-05-20 18:30:00', NULL, NULL),
(2, '2', 'Gayathma', 'Perera', 'c4961b067d274050e43e26beb9d7d19c', 'gayathma3@gmail.com', '0', '1991-04-10', '353523', NULL, 'FULL_TIME', 'employee_avatar1408598782-p.jpg', 'default_cover_pic.png', '', 1, 'N', '1', 12, '2014-05-30 23:30:00', NULL, NULL),
(3, '3', 'Rachini', 'Perera', 'b01509c878e24c0dfd78da7bae7d5e70', 'rachini@gmail.com', '2', '2014-06-12', '2332623623', 213232, 'FULL_TIME', 'avatar_small2x.jpg', NULL, '', 1, 'Y', '1', 0, '2014-07-11 12:40:36', NULL, NULL),
(4, '4', 'Dahami', 'Perera', 'c4961b067d274050e43e26beb9d7d19c', 'dahami@gmail.com', 'emp', '2014-06-20', '34535', 32535, '235', '', NULL, '', 1, '', '1', 1, '2014-06-13 18:30:00', NULL, NULL),
(5, '5', 'Kaumadi', 'Perera', 'c4961b067d274050e43e26beb9d7d19c', 'kaumadi@gmail.com', 'emp', '2014-06-20', '3453534', 35325, 'FULL_TIME', '', NULL, '', 1, '', '1', 1, '2014-06-13 18:30:00', NULL, NULL),
(6, '6', 'Dilupa', 'Perera', 'c4961b067d274050e43e26beb9d7d19c', 'dilupa@gmail.com', 'emp', '2014-06-28', '4234234', 4234, 'PART_TIME', '', NULL, '', 1, '', '1', 1, '2014-06-13 18:30:00', NULL, NULL);

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
  `expert_level` float NOT NULL DEFAULT '0',
  `reference` varchar(400) DEFAULT NULL,
  `del_ind` enum('1','0') NOT NULL,
  `added_date` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  PRIMARY KEY (`employee_skill_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=2 ;

--
-- Dumping data for table `employee_skill`
--

INSERT INTO `employee_skill` (`employee_skill_id`, `skill_code`, `employee_code`, `expert_level`, `reference`, `del_ind`, `added_date`) VALUES
(1, 1, 2, 0, NULL, '1', '2014-08-18 13:44:36');

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
(1, 2, 1, '0000-00-00 00:00:00'),
(2, 3, 1, '2014-07-25 00:00:00');

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
(13, 2, 3, 'y'),
(14, 1, 3, 'y'),
(15, 6, 4, 'n'),
(16, 5, 4, 'n'),
(17, 4, 4, 'n'),
(18, 3, 4, 'n'),
(19, 2, 4, 'y'),
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
(1, 'cZC', 'cZ', 'CZ', '2014-08-09', '2014-08-19', 'czC', 1, '1', 1, '2014-08-08 18:30:00');

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
-- Table structure for table `project_stuff_temp`
--

CREATE TABLE IF NOT EXISTS `project_stuff_temp` (
  `project_stuff_id` int(11) NOT NULL AUTO_INCREMENT,
  `stuff_name` varchar(200) NOT NULL,
  `del_ind` enum('1','0') NOT NULL DEFAULT '0',
  `added_date` timestamp NULL DEFAULT NULL,
  `added_by` int(11) NOT NULL,
  PRIMARY KEY (`project_stuff_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=3 ;

--
-- Dumping data for table `project_stuff_temp`
--

INSERT INTO `project_stuff_temp` (`project_stuff_id`, `stuff_name`, `del_ind`, `added_date`, `added_by`) VALUES
(1, '531709_575297122495442_553449702_n.jpg', '1', '2014-08-21 00:44:41', 2),
(2, 'The-Twilight-Saga_breaking-Dawn-Part-2-2012-Movie-Photos-wide-Wallpapers-13-728x455.jpg', '1', '2014-08-21 00:44:41', 2);

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
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=1131 ;

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
(462, 0, 'user_unseen_notification_count', 1408160903, 'notification/notified_users_controller/user_unseen_notification_count', '', '::1', 'Mozilla/5.0 (Windows NT 6.2; WOW64; rv:31.0) Gecko/20100101 Firefox/31.0'),
(463, 0, 'manage_skill_matrix', 1408162702, 'skill_matrix/skill_matrix_controller/manage_skill_matrix', '', '::1', 'Mozilla/5.0 (Windows NT 6.2; WOW64; rv:31.0) Gecko/20100101 Firefox/31.0'),
(464, 0, '%5Bobject%20Object%5D', 1408162705, 'skill_matrix/skill_matrix_controller/%5Bobject%20Object%5D', '', '::1', 'Mozilla/5.0 (Windows NT 6.2; WOW64; rv:31.0) Gecko/20100101 Firefox/31.0'),
(465, 0, 'init_notification_menu', 1408162705, 'notification/notification_controller/init_notification_menu', '', '::1', 'Mozilla/5.0 (Windows NT 6.2; WOW64; rv:31.0) Gecko/20100101 Firefox/31.0'),
(466, 0, 'user_unseen_notification_count', 1408162706, 'notification/notified_users_controller/user_unseen_notification_count', '', '::1', 'Mozilla/5.0 (Windows NT 6.2; WOW64; rv:31.0) Gecko/20100101 Firefox/31.0'),
(467, 0, 'manage_skill_matrix', 1408162748, 'skill_matrix/skill_matrix_controller/manage_skill_matrix', '', '::1', 'Mozilla/5.0 (Windows NT 6.2; WOW64; rv:31.0) Gecko/20100101 Firefox/31.0'),
(468, 0, 'init_notification_menu', 1408162752, 'notification/notification_controller/init_notification_menu', '', '::1', 'Mozilla/5.0 (Windows NT 6.2; WOW64; rv:31.0) Gecko/20100101 Firefox/31.0'),
(469, 0, '%5Bobject%20Object%5D', 1408162752, 'skill_matrix/skill_matrix_controller/%5Bobject%20Object%5D', '', '::1', 'Mozilla/5.0 (Windows NT 6.2; WOW64; rv:31.0) Gecko/20100101 Firefox/31.0'),
(470, 0, 'user_unseen_notification_count', 1408162753, 'notification/notified_users_controller/user_unseen_notification_count', '', '::1', 'Mozilla/5.0 (Windows NT 6.2; WOW64; rv:31.0) Gecko/20100101 Firefox/31.0'),
(471, 0, 'manage_skill_matrix', 1408162835, 'skill_matrix/skill_matrix_controller/manage_skill_matrix', '', '::1', 'Mozilla/5.0 (Windows NT 6.2; WOW64; rv:31.0) Gecko/20100101 Firefox/31.0'),
(472, 0, 'init_notification_menu', 1408162839, 'notification/notification_controller/init_notification_menu', '', '::1', 'Mozilla/5.0 (Windows NT 6.2; WOW64; rv:31.0) Gecko/20100101 Firefox/31.0'),
(473, 0, '%5Bobject%20Object%5D', 1408162839, 'skill_matrix/skill_matrix_controller/%5Bobject%20Object%5D', '', '::1', 'Mozilla/5.0 (Windows NT 6.2; WOW64; rv:31.0) Gecko/20100101 Firefox/31.0'),
(474, 0, 'user_unseen_notification_count', 1408162840, 'notification/notified_users_controller/user_unseen_notification_count', '', '::1', 'Mozilla/5.0 (Windows NT 6.2; WOW64; rv:31.0) Gecko/20100101 Firefox/31.0'),
(475, 0, 'edit_skill_view', 1408162905, 'skill/skill_controller/edit_skill_view/1', '', '::1', 'Mozilla/5.0 (Windows NT 6.2; WOW64; rv:31.0) Gecko/20100101 Firefox/31.0'),
(476, 0, 'init_notification_menu', 1408162909, 'notification/notification_controller/init_notification_menu', '', '::1', 'Mozilla/5.0 (Windows NT 6.2; WOW64; rv:31.0) Gecko/20100101 Firefox/31.0'),
(477, 0, 'edit_skill_view', 1408162909, 'skill/skill_controller/edit_skill_view/%5Bobject%20Object%5D', '', '::1', 'Mozilla/5.0 (Windows NT 6.2; WOW64; rv:31.0) Gecko/20100101 Firefox/31.0'),
(478, 0, 'user_unseen_notification_count', 1408162910, 'notification/notified_users_controller/user_unseen_notification_count', '', '::1', 'Mozilla/5.0 (Windows NT 6.2; WOW64; rv:31.0) Gecko/20100101 Firefox/31.0'),
(479, 0, 'manage_skill_matrix', 1408162915, 'skill_matrix/skill_matrix_controller/manage_skill_matrix', '', '::1', 'Mozilla/5.0 (Windows NT 6.2; WOW64; rv:31.0) Gecko/20100101 Firefox/31.0'),
(480, 0, 'init_notification_menu', 1408162918, 'notification/notification_controller/init_notification_menu', '', '::1', 'Mozilla/5.0 (Windows NT 6.2; WOW64; rv:31.0) Gecko/20100101 Firefox/31.0'),
(481, 0, '%5Bobject%20Object%5D', 1408162918, 'skill_matrix/skill_matrix_controller/%5Bobject%20Object%5D', '', '::1', 'Mozilla/5.0 (Windows NT 6.2; WOW64; rv:31.0) Gecko/20100101 Firefox/31.0'),
(482, 0, 'user_unseen_notification_count', 1408162920, 'notification/notified_users_controller/user_unseen_notification_count', '', '::1', 'Mozilla/5.0 (Windows NT 6.2; WOW64; rv:31.0) Gecko/20100101 Firefox/31.0'),
(483, 0, 'edit_skill_view', 1408163201, 'skill/skill_controller/edit_skill_view/1', '', '::1', 'Mozilla/5.0 (Windows NT 6.2; WOW64; rv:31.0) Gecko/20100101 Firefox/31.0'),
(484, 0, 'edit_skill_view', 1408163205, 'skill/skill_controller/edit_skill_view/%5Bobject%20Object%5D', '', '::1', 'Mozilla/5.0 (Windows NT 6.2; WOW64; rv:31.0) Gecko/20100101 Firefox/31.0'),
(485, 0, 'init_notification_menu', 1408163205, 'notification/notification_controller/init_notification_menu', '', '::1', 'Mozilla/5.0 (Windows NT 6.2; WOW64; rv:31.0) Gecko/20100101 Firefox/31.0'),
(486, 0, 'user_unseen_notification_count', 1408163206, 'notification/notified_users_controller/user_unseen_notification_count', '', '::1', 'Mozilla/5.0 (Windows NT 6.2; WOW64; rv:31.0) Gecko/20100101 Firefox/31.0'),
(487, 0, 'manage_skill_matrix', 1408163211, 'skill_matrix/skill_matrix_controller/manage_skill_matrix', '', '::1', 'Mozilla/5.0 (Windows NT 6.2; WOW64; rv:31.0) Gecko/20100101 Firefox/31.0'),
(488, 0, 'init_notification_menu', 1408163215, 'notification/notification_controller/init_notification_menu', '', '::1', 'Mozilla/5.0 (Windows NT 6.2; WOW64; rv:31.0) Gecko/20100101 Firefox/31.0'),
(489, 0, '%5Bobject%20Object%5D', 1408163215, 'skill_matrix/skill_matrix_controller/%5Bobject%20Object%5D', '', '::1', 'Mozilla/5.0 (Windows NT 6.2; WOW64; rv:31.0) Gecko/20100101 Firefox/31.0'),
(490, 0, 'user_unseen_notification_count', 1408163216, 'notification/notified_users_controller/user_unseen_notification_count', '', '::1', 'Mozilla/5.0 (Windows NT 6.2; WOW64; rv:31.0) Gecko/20100101 Firefox/31.0'),
(491, 0, 'manage_skill_matrix', 1408163312, 'skill_matrix/skill_matrix_controller/manage_skill_matrix', '', '::1', 'Mozilla/5.0 (Windows NT 6.2; WOW64; rv:31.0) Gecko/20100101 Firefox/31.0'),
(492, 0, 'init_notification_menu', 1408163315, 'notification/notification_controller/init_notification_menu', '', '::1', 'Mozilla/5.0 (Windows NT 6.2; WOW64; rv:31.0) Gecko/20100101 Firefox/31.0'),
(493, 0, '%5Bobject%20Object%5D', 1408163315, 'skill_matrix/skill_matrix_controller/%5Bobject%20Object%5D', '', '::1', 'Mozilla/5.0 (Windows NT 6.2; WOW64; rv:31.0) Gecko/20100101 Firefox/31.0'),
(494, 0, 'user_unseen_notification_count', 1408163316, 'notification/notified_users_controller/user_unseen_notification_count', '', '::1', 'Mozilla/5.0 (Windows NT 6.2; WOW64; rv:31.0) Gecko/20100101 Firefox/31.0'),
(495, 0, 'manage_skill_matrix', 1408163372, 'skill_matrix/skill_matrix_controller/manage_skill_matrix', '', '::1', 'Mozilla/5.0 (Windows NT 6.2; WOW64; rv:31.0) Gecko/20100101 Firefox/31.0'),
(496, 0, '%5Bobject%20Object%5D', 1408163376, 'skill_matrix/skill_matrix_controller/%5Bobject%20Object%5D', '', '::1', 'Mozilla/5.0 (Windows NT 6.2; WOW64; rv:31.0) Gecko/20100101 Firefox/31.0'),
(497, 0, 'init_notification_menu', 1408163376, 'notification/notification_controller/init_notification_menu', '', '::1', 'Mozilla/5.0 (Windows NT 6.2; WOW64; rv:31.0) Gecko/20100101 Firefox/31.0'),
(498, 0, 'user_unseen_notification_count', 1408163377, 'notification/notified_users_controller/user_unseen_notification_count', '', '::1', 'Mozilla/5.0 (Windows NT 6.2; WOW64; rv:31.0) Gecko/20100101 Firefox/31.0'),
(499, 0, 'manage_projects', 1408163424, 'project/project_controller/manage_projects', '', '::1', 'Mozilla/5.0 (Windows NT 6.2; WOW64; rv:31.0) Gecko/20100101 Firefox/31.0'),
(500, 0, '%5Bobject%20Object%5D', 1408163426, 'project/project_controller/%5Bobject%20Object%5D', '', '::1', 'Mozilla/5.0 (Windows NT 6.2; WOW64; rv:31.0) Gecko/20100101 Firefox/31.0'),
(501, 0, 'init_notification_menu', 1408163426, 'notification/notification_controller/init_notification_menu', '', '::1', 'Mozilla/5.0 (Windows NT 6.2; WOW64; rv:31.0) Gecko/20100101 Firefox/31.0'),
(502, 0, 'user_unseen_notification_count', 1408163427, 'notification/notified_users_controller/user_unseen_notification_count', '', '::1', 'Mozilla/5.0 (Windows NT 6.2; WOW64; rv:31.0) Gecko/20100101 Firefox/31.0'),
(503, 0, 'view_task_for_projects', 1408163429, 'task/task_controller/view_task_for_projects/1', '', '::1', 'Mozilla/5.0 (Windows NT 6.2; WOW64; rv:31.0) Gecko/20100101 Firefox/31.0'),
(504, 0, 'init_notification_menu', 1408163431, 'notification/notification_controller/init_notification_menu', '', '::1', 'Mozilla/5.0 (Windows NT 6.2; WOW64; rv:31.0) Gecko/20100101 Firefox/31.0'),
(505, 0, 'view_task_for_projects', 1408163431, 'task/task_controller/view_task_for_projects/%5Bobject%20Object%5D', '', '::1', 'Mozilla/5.0 (Windows NT 6.2; WOW64; rv:31.0) Gecko/20100101 Firefox/31.0'),
(506, 0, 'user_unseen_notification_count', 1408163432, 'notification/notified_users_controller/user_unseen_notification_count', '', '::1', 'Mozilla/5.0 (Windows NT 6.2; WOW64; rv:31.0) Gecko/20100101 Firefox/31.0');
INSERT INTO `statistics` (`statistic_id`, `user_id`, `action`, `date`, `uri`, `post_data`, `ip`, `browser`) VALUES
(507, 0, 'user_unseen_notification_count', 1408163434, 'notification/notified_users_controller/user_unseen_notification_count', '', '::1', 'Mozilla/5.0 (Windows NT 6.2; WOW64; rv:31.0) Gecko/20100101 Firefox/31.0'),
(508, 0, 'add_project_view', 1408163435, 'project/project_controller/add_project_view', '', '::1', 'Mozilla/5.0 (Windows NT 6.2; WOW64; rv:31.0) Gecko/20100101 Firefox/31.0'),
(509, 0, 'index', 1408163438, 'project/fileupload', '', '::1', 'Mozilla/5.0 (Windows NT 6.2; WOW64; rv:31.0) Gecko/20100101 Firefox/31.0'),
(510, 0, 'init_notification_menu', 1408163438, 'notification/notification_controller/init_notification_menu', '', '::1', 'Mozilla/5.0 (Windows NT 6.2; WOW64; rv:31.0) Gecko/20100101 Firefox/31.0'),
(511, 0, 'user_unseen_notification_count', 1408163439, 'notification/notified_users_controller/user_unseen_notification_count', '', '::1', 'Mozilla/5.0 (Windows NT 6.2; WOW64; rv:31.0) Gecko/20100101 Firefox/31.0'),
(512, 0, 'add_project_view', 1408163575, 'project/project_controller/add_project_view', '', '::1', 'Mozilla/5.0 (Windows NT 6.2; WOW64; rv:31.0) Gecko/20100101 Firefox/31.0'),
(513, 0, 'init_notification_menu', 1408163577, 'notification/notification_controller/init_notification_menu', '', '::1', 'Mozilla/5.0 (Windows NT 6.2; WOW64; rv:31.0) Gecko/20100101 Firefox/31.0'),
(514, 0, 'index', 1408163577, 'project/fileupload', '', '::1', 'Mozilla/5.0 (Windows NT 6.2; WOW64; rv:31.0) Gecko/20100101 Firefox/31.0'),
(515, 0, 'user_unseen_notification_count', 1408163578, 'notification/notified_users_controller/user_unseen_notification_count', '', '::1', 'Mozilla/5.0 (Windows NT 6.2; WOW64; rv:31.0) Gecko/20100101 Firefox/31.0'),
(516, 0, 'manage_employee_screenshot', 1408163850, 'employee_screenshots/employee_screenshots_controller/manage_employee_screenshot', '', '::1', 'Mozilla/5.0 (Windows NT 6.2; WOW64; rv:31.0) Gecko/20100101 Firefox/31.0'),
(517, 0, '%5Bobject%20Object%5D', 1408163852, 'employee_screenshots/employee_screenshots_controller/%5Bobject%20Object%5D', '', '::1', 'Mozilla/5.0 (Windows NT 6.2; WOW64; rv:31.0) Gecko/20100101 Firefox/31.0'),
(518, 0, 'init_notification_menu', 1408163852, 'notification/notification_controller/init_notification_menu', '', '::1', 'Mozilla/5.0 (Windows NT 6.2; WOW64; rv:31.0) Gecko/20100101 Firefox/31.0'),
(519, 0, 'user_unseen_notification_count', 1408163854, 'notification/notified_users_controller/user_unseen_notification_count', '', '::1', 'Mozilla/5.0 (Windows NT 6.2; WOW64; rv:31.0) Gecko/20100101 Firefox/31.0'),
(520, 0, 'view_profile', 1408164099, 'employee/employee_profile_controller/view_profile', '', '::1', 'Mozilla/5.0 (Windows NT 6.2; WOW64; rv:31.0) Gecko/20100101 Firefox/31.0'),
(521, 0, '%5Bobject%20Object%5D', 1408164101, 'employee/employee_profile_controller/%5Bobject%20Object%5D', '', '::1', 'Mozilla/5.0 (Windows NT 6.2; WOW64; rv:31.0) Gecko/20100101 Firefox/31.0'),
(522, 0, 'init_notification_menu', 1408164101, 'notification/notification_controller/init_notification_menu', '', '::1', 'Mozilla/5.0 (Windows NT 6.2; WOW64; rv:31.0) Gecko/20100101 Firefox/31.0'),
(523, 0, 'user_unseen_notification_count', 1408164103, 'notification/notified_users_controller/user_unseen_notification_count', '', '::1', 'Mozilla/5.0 (Windows NT 6.2; WOW64; rv:31.0) Gecko/20100101 Firefox/31.0'),
(524, 0, 'upload_employee_avatar', 1408164180, 'employee/employee_profile_controller/upload_employee_avatar', '', '::1', 'Mozilla/5.0 (Windows NT 6.2; WOW64; rv:31.0) Gecko/20100101 Firefox/31.0'),
(525, 0, 'update_employee_avatar', 1408164181, 'employee/employee_profile_controller/update_employee_avatar', '{"employee_avatar":"employee_avatar1408164180-531709_575297122495442_553449702_n.jpg","employee_code":"1"}', '::1', 'Mozilla/5.0 (Windows NT 6.2; WOW64; rv:31.0) Gecko/20100101 Firefox/31.0'),
(526, 0, 'view_profile', 1408164186, 'employee/employee_profile_controller/view_profile', '', '::1', 'Mozilla/5.0 (Windows NT 6.2; WOW64; rv:31.0) Gecko/20100101 Firefox/31.0'),
(527, 0, '%5Bobject%20Object%5D', 1408164189, 'employee/employee_profile_controller/%5Bobject%20Object%5D', '', '::1', 'Mozilla/5.0 (Windows NT 6.2; WOW64; rv:31.0) Gecko/20100101 Firefox/31.0'),
(528, 0, 'init_notification_menu', 1408164189, 'notification/notification_controller/init_notification_menu', '', '::1', 'Mozilla/5.0 (Windows NT 6.2; WOW64; rv:31.0) Gecko/20100101 Firefox/31.0'),
(529, 0, 'user_unseen_notification_count', 1408164190, 'notification/notified_users_controller/user_unseen_notification_count', '', '::1', 'Mozilla/5.0 (Windows NT 6.2; WOW64; rv:31.0) Gecko/20100101 Firefox/31.0'),
(530, 0, 'view_profile', 1408164391, 'employee/employee_profile_controller/view_profile', '', '::1', 'Mozilla/5.0 (Windows NT 6.2; WOW64; rv:31.0) Gecko/20100101 Firefox/31.0'),
(531, 0, '%5Bobject%20Object%5D', 1408164393, 'employee/employee_profile_controller/%5Bobject%20Object%5D', '', '::1', 'Mozilla/5.0 (Windows NT 6.2; WOW64; rv:31.0) Gecko/20100101 Firefox/31.0'),
(532, 0, 'init_notification_menu', 1408164393, 'notification/notification_controller/init_notification_menu', '', '::1', 'Mozilla/5.0 (Windows NT 6.2; WOW64; rv:31.0) Gecko/20100101 Firefox/31.0'),
(533, 0, 'user_unseen_notification_count', 1408164394, 'notification/notified_users_controller/user_unseen_notification_count', '', '::1', 'Mozilla/5.0 (Windows NT 6.2; WOW64; rv:31.0) Gecko/20100101 Firefox/31.0'),
(534, 0, 'view_profile', 1408164463, 'employee/employee_profile_controller/view_profile', '', '::1', 'Mozilla/5.0 (Windows NT 6.2; WOW64; rv:31.0) Gecko/20100101 Firefox/31.0'),
(535, 0, '%5Bobject%20Object%5D', 1408164466, 'employee/employee_profile_controller/%5Bobject%20Object%5D', '', '::1', 'Mozilla/5.0 (Windows NT 6.2; WOW64; rv:31.0) Gecko/20100101 Firefox/31.0'),
(536, 0, 'init_notification_menu', 1408164466, 'notification/notification_controller/init_notification_menu', '', '::1', 'Mozilla/5.0 (Windows NT 6.2; WOW64; rv:31.0) Gecko/20100101 Firefox/31.0'),
(537, 0, 'user_unseen_notification_count', 1408164467, 'notification/notified_users_controller/user_unseen_notification_count', '', '::1', 'Mozilla/5.0 (Windows NT 6.2; WOW64; rv:31.0) Gecko/20100101 Firefox/31.0'),
(538, 0, 'view_profile', 1408164653, 'employee/employee_profile_controller/view_profile', '', '::1', 'Mozilla/5.0 (Windows NT 6.2; WOW64; rv:31.0) Gecko/20100101 Firefox/31.0'),
(539, 0, 'init_notification_menu', 1408164657, 'notification/notification_controller/init_notification_menu', '', '::1', 'Mozilla/5.0 (Windows NT 6.2; WOW64; rv:31.0) Gecko/20100101 Firefox/31.0'),
(540, 0, '%5Bobject%20Object%5D', 1408164657, 'employee/employee_profile_controller/%5Bobject%20Object%5D', '', '::1', 'Mozilla/5.0 (Windows NT 6.2; WOW64; rv:31.0) Gecko/20100101 Firefox/31.0'),
(541, 0, 'user_unseen_notification_count', 1408164658, 'notification/notified_users_controller/user_unseen_notification_count', '', '::1', 'Mozilla/5.0 (Windows NT 6.2; WOW64; rv:31.0) Gecko/20100101 Firefox/31.0'),
(542, 0, 'view_profile', 1408164716, 'employee/employee_profile_controller/view_profile', '', '::1', 'Mozilla/5.0 (Windows NT 6.2; WOW64; rv:31.0) Gecko/20100101 Firefox/31.0'),
(543, 0, 'init_notification_menu', 1408164719, 'notification/notification_controller/init_notification_menu', '', '::1', 'Mozilla/5.0 (Windows NT 6.2; WOW64; rv:31.0) Gecko/20100101 Firefox/31.0'),
(544, 0, '%5Bobject%20Object%5D', 1408164719, 'employee/employee_profile_controller/%5Bobject%20Object%5D', '', '::1', 'Mozilla/5.0 (Windows NT 6.2; WOW64; rv:31.0) Gecko/20100101 Firefox/31.0'),
(545, 0, 'user_unseen_notification_count', 1408164720, 'notification/notified_users_controller/user_unseen_notification_count', '', '::1', 'Mozilla/5.0 (Windows NT 6.2; WOW64; rv:31.0) Gecko/20100101 Firefox/31.0'),
(546, 0, 'view_profile', 1408164741, 'employee/employee_profile_controller/view_profile', '', '::1', 'Mozilla/5.0 (Windows NT 6.2; WOW64; rv:31.0) Gecko/20100101 Firefox/31.0'),
(547, 0, 'view_profile', 1408164927, 'employee/employee_profile_controller/view_profile', '', '::1', 'Mozilla/5.0 (Windows NT 6.2; WOW64; rv:31.0) Gecko/20100101 Firefox/31.0'),
(548, 0, 'view_profile', 1408164958, 'employee/employee_profile_controller/view_profile', '', '::1', 'Mozilla/5.0 (Windows NT 6.2; WOW64; rv:31.0) Gecko/20100101 Firefox/31.0'),
(549, 0, 'view_profile', 1408164987, 'employee/employee_profile_controller/view_profile', '', '::1', 'Mozilla/5.0 (Windows NT 6.2; WOW64; rv:31.0) Gecko/20100101 Firefox/31.0'),
(550, 0, 'view_profile', 1408164989, 'employee/employee_profile_controller/view_profile', '', '::1', 'Mozilla/5.0 (Windows NT 6.2; WOW64; rv:31.0) Gecko/20100101 Firefox/31.0'),
(551, 0, 'view_profile', 1408165034, 'employee/employee_profile_controller/view_profile', '', '::1', 'Mozilla/5.0 (Windows NT 6.2; WOW64; rv:31.0) Gecko/20100101 Firefox/31.0'),
(552, 0, 'view_profile', 1408165054, 'employee/employee_profile_controller/view_profile', '', '::1', 'Mozilla/5.0 (Windows NT 6.2; WOW64; rv:31.0) Gecko/20100101 Firefox/31.0'),
(553, 0, 'init_notification_menu', 1408165057, 'notification/notification_controller/init_notification_menu', '', '::1', 'Mozilla/5.0 (Windows NT 6.2; WOW64; rv:31.0) Gecko/20100101 Firefox/31.0'),
(554, 0, '%5Bobject%20Object%5D', 1408165057, 'employee/employee_profile_controller/%5Bobject%20Object%5D', '', '::1', 'Mozilla/5.0 (Windows NT 6.2; WOW64; rv:31.0) Gecko/20100101 Firefox/31.0'),
(555, 0, 'user_unseen_notification_count', 1408165058, 'notification/notified_users_controller/user_unseen_notification_count', '', '::1', 'Mozilla/5.0 (Windows NT 6.2; WOW64; rv:31.0) Gecko/20100101 Firefox/31.0'),
(556, 0, 'view_profile', 1408165414, 'employee/employee_profile_controller/view_profile', '', '::1', 'Mozilla/5.0 (Windows NT 6.2; WOW64; rv:31.0) Gecko/20100101 Firefox/31.0'),
(557, 0, '%5Bobject%20Object%5D', 1408165418, 'employee/employee_profile_controller/%5Bobject%20Object%5D', '', '::1', 'Mozilla/5.0 (Windows NT 6.2; WOW64; rv:31.0) Gecko/20100101 Firefox/31.0'),
(558, 0, 'init_notification_menu', 1408165418, 'notification/notification_controller/init_notification_menu', '', '::1', 'Mozilla/5.0 (Windows NT 6.2; WOW64; rv:31.0) Gecko/20100101 Firefox/31.0'),
(559, 0, 'user_unseen_notification_count', 1408165419, 'notification/notified_users_controller/user_unseen_notification_count', '', '::1', 'Mozilla/5.0 (Windows NT 6.2; WOW64; rv:31.0) Gecko/20100101 Firefox/31.0'),
(560, 0, 'view_profile', 1408165452, 'employee/employee_profile_controller/view_profile', '', '::1', 'Mozilla/5.0 (Windows NT 6.2; WOW64; rv:31.0) Gecko/20100101 Firefox/31.0'),
(561, 0, '%5Bobject%20Object%5D', 1408165455, 'employee/employee_profile_controller/%5Bobject%20Object%5D', '', '::1', 'Mozilla/5.0 (Windows NT 6.2; WOW64; rv:31.0) Gecko/20100101 Firefox/31.0'),
(562, 0, 'init_notification_menu', 1408165455, 'notification/notification_controller/init_notification_menu', '', '::1', 'Mozilla/5.0 (Windows NT 6.2; WOW64; rv:31.0) Gecko/20100101 Firefox/31.0'),
(563, 0, 'user_unseen_notification_count', 1408165456, 'notification/notified_users_controller/user_unseen_notification_count', '', '::1', 'Mozilla/5.0 (Windows NT 6.2; WOW64; rv:31.0) Gecko/20100101 Firefox/31.0'),
(564, 0, 'view_profile', 1408165616, 'employee/employee_profile_controller/view_profile', '', '::1', 'Mozilla/5.0 (Windows NT 6.2; WOW64; rv:31.0) Gecko/20100101 Firefox/31.0'),
(565, 0, 'init_notification_menu', 1408165618, 'notification/notification_controller/init_notification_menu', '', '::1', 'Mozilla/5.0 (Windows NT 6.2; WOW64; rv:31.0) Gecko/20100101 Firefox/31.0'),
(566, 0, '%5Bobject%20Object%5D', 1408165618, 'employee/employee_profile_controller/%5Bobject%20Object%5D', '', '::1', 'Mozilla/5.0 (Windows NT 6.2; WOW64; rv:31.0) Gecko/20100101 Firefox/31.0'),
(567, 0, 'user_unseen_notification_count', 1408165620, 'notification/notified_users_controller/user_unseen_notification_count', '', '::1', 'Mozilla/5.0 (Windows NT 6.2; WOW64; rv:31.0) Gecko/20100101 Firefox/31.0'),
(568, 0, 'view_profile', 1408165683, 'employee/employee_profile_controller/view_profile', '', '::1', 'Mozilla/5.0 (Windows NT 6.2; WOW64; rv:31.0) Gecko/20100101 Firefox/31.0'),
(569, 0, 'init_notification_menu', 1408165686, 'notification/notification_controller/init_notification_menu', '', '::1', 'Mozilla/5.0 (Windows NT 6.2; WOW64; rv:31.0) Gecko/20100101 Firefox/31.0'),
(570, 0, '%5Bobject%20Object%5D', 1408165686, 'employee/employee_profile_controller/%5Bobject%20Object%5D', '', '::1', 'Mozilla/5.0 (Windows NT 6.2; WOW64; rv:31.0) Gecko/20100101 Firefox/31.0'),
(571, 0, 'user_unseen_notification_count', 1408165688, 'notification/notified_users_controller/user_unseen_notification_count', '', '::1', 'Mozilla/5.0 (Windows NT 6.2; WOW64; rv:31.0) Gecko/20100101 Firefox/31.0'),
(572, 0, 'view_profile', 1408165713, 'employee/employee_profile_controller/view_profile', '', '::1', 'Mozilla/5.0 (Windows NT 6.2; WOW64; rv:31.0) Gecko/20100101 Firefox/31.0'),
(573, 0, '%5Bobject%20Object%5D', 1408165715, 'employee/employee_profile_controller/%5Bobject%20Object%5D', '', '::1', 'Mozilla/5.0 (Windows NT 6.2; WOW64; rv:31.0) Gecko/20100101 Firefox/31.0'),
(574, 0, 'init_notification_menu', 1408165715, 'notification/notification_controller/init_notification_menu', '', '::1', 'Mozilla/5.0 (Windows NT 6.2; WOW64; rv:31.0) Gecko/20100101 Firefox/31.0'),
(575, 0, 'user_unseen_notification_count', 1408165717, 'notification/notified_users_controller/user_unseen_notification_count', '', '::1', 'Mozilla/5.0 (Windows NT 6.2; WOW64; rv:31.0) Gecko/20100101 Firefox/31.0'),
(576, 0, 'view_profile', 1408165881, 'employee/employee_profile_controller/view_profile', '', '::1', 'Mozilla/5.0 (Windows NT 6.2; WOW64; rv:31.0) Gecko/20100101 Firefox/31.0'),
(577, 0, '%5Bobject%20Object%5D', 1408165885, 'employee/employee_profile_controller/%5Bobject%20Object%5D', '', '::1', 'Mozilla/5.0 (Windows NT 6.2; WOW64; rv:31.0) Gecko/20100101 Firefox/31.0'),
(578, 0, 'init_notification_menu', 1408165885, 'notification/notification_controller/init_notification_menu', '', '::1', 'Mozilla/5.0 (Windows NT 6.2; WOW64; rv:31.0) Gecko/20100101 Firefox/31.0'),
(579, 0, 'user_unseen_notification_count', 1408165887, 'notification/notified_users_controller/user_unseen_notification_count', '', '::1', 'Mozilla/5.0 (Windows NT 6.2; WOW64; rv:31.0) Gecko/20100101 Firefox/31.0'),
(580, 0, 'view_profile', 1408165903, 'employee/employee_profile_controller/view_profile', '', '::1', 'Mozilla/5.0 (Windows NT 6.2; WOW64; rv:31.0) Gecko/20100101 Firefox/31.0'),
(581, 0, 'init_notification_menu', 1408165907, 'notification/notification_controller/init_notification_menu', '', '::1', 'Mozilla/5.0 (Windows NT 6.2; WOW64; rv:31.0) Gecko/20100101 Firefox/31.0'),
(582, 0, '%5Bobject%20Object%5D', 1408165907, 'employee/employee_profile_controller/%5Bobject%20Object%5D', '', '::1', 'Mozilla/5.0 (Windows NT 6.2; WOW64; rv:31.0) Gecko/20100101 Firefox/31.0'),
(583, 0, 'user_unseen_notification_count', 1408165909, 'notification/notified_users_controller/user_unseen_notification_count', '', '::1', 'Mozilla/5.0 (Windows NT 6.2; WOW64; rv:31.0) Gecko/20100101 Firefox/31.0'),
(584, 0, 'view_profile', 1408165918, 'employee/employee_profile_controller/view_profile', '', '::1', 'Mozilla/5.0 (Windows NT 6.2; WOW64; rv:31.0) Gecko/20100101 Firefox/31.0'),
(585, 0, 'init_notification_menu', 1408165923, 'notification/notification_controller/init_notification_menu', '', '::1', 'Mozilla/5.0 (Windows NT 6.2; WOW64; rv:31.0) Gecko/20100101 Firefox/31.0'),
(586, 0, '%5Bobject%20Object%5D', 1408165923, 'employee/employee_profile_controller/%5Bobject%20Object%5D', '', '::1', 'Mozilla/5.0 (Windows NT 6.2; WOW64; rv:31.0) Gecko/20100101 Firefox/31.0'),
(587, 0, 'user_unseen_notification_count', 1408165924, 'notification/notified_users_controller/user_unseen_notification_count', '', '::1', 'Mozilla/5.0 (Windows NT 6.2; WOW64; rv:31.0) Gecko/20100101 Firefox/31.0'),
(588, 0, 'view_profile', 1408166228, 'employee/employee_profile_controller/view_profile', '', '::1', 'Mozilla/5.0 (Windows NT 6.2; WOW64; rv:31.0) Gecko/20100101 Firefox/31.0'),
(589, 0, 'view_profile', 1408166608, 'employee/employee_profile_controller/view_profile', '', '::1', 'Mozilla/5.0 (Windows NT 6.2; WOW64; rv:31.0) Gecko/20100101 Firefox/31.0'),
(590, 0, 'init_notification_menu', 1408166612, 'notification/notification_controller/init_notification_menu', '', '::1', 'Mozilla/5.0 (Windows NT 6.2; WOW64; rv:31.0) Gecko/20100101 Firefox/31.0'),
(591, 0, '%5Bobject%20Object%5D', 1408166612, 'employee/employee_profile_controller/%5Bobject%20Object%5D', '', '::1', 'Mozilla/5.0 (Windows NT 6.2; WOW64; rv:31.0) Gecko/20100101 Firefox/31.0'),
(592, 0, 'user_unseen_notification_count', 1408166614, 'notification/notified_users_controller/user_unseen_notification_count', '', '::1', 'Mozilla/5.0 (Windows NT 6.2; WOW64; rv:31.0) Gecko/20100101 Firefox/31.0'),
(593, 0, 'view_profile', 1408166674, 'employee/employee_profile_controller/view_profile', '', '::1', 'Mozilla/5.0 (Windows NT 6.2; WOW64; rv:31.0) Gecko/20100101 Firefox/31.0'),
(594, 0, 'view_profile', 1408166766, 'employee/employee_profile_controller/view_profile', '', '::1', 'Mozilla/5.0 (Windows NT 6.2; WOW64; rv:31.0) Gecko/20100101 Firefox/31.0'),
(595, 0, '%5Bobject%20Object%5D', 1408166771, 'employee/employee_profile_controller/%5Bobject%20Object%5D', '', '::1', 'Mozilla/5.0 (Windows NT 6.2; WOW64; rv:31.0) Gecko/20100101 Firefox/31.0'),
(596, 0, 'init_notification_menu', 1408166771, 'notification/notification_controller/init_notification_menu', '', '::1', 'Mozilla/5.0 (Windows NT 6.2; WOW64; rv:31.0) Gecko/20100101 Firefox/31.0'),
(597, 0, 'user_unseen_notification_count', 1408166772, 'notification/notified_users_controller/user_unseen_notification_count', '', '::1', 'Mozilla/5.0 (Windows NT 6.2; WOW64; rv:31.0) Gecko/20100101 Firefox/31.0'),
(598, 0, 'view_profile', 1408166903, 'employee/employee_profile_controller/view_profile', '', '::1', 'Mozilla/5.0 (Windows NT 6.2; WOW64; rv:31.0) Gecko/20100101 Firefox/31.0'),
(599, 0, 'init_notification_menu', 1408166907, 'notification/notification_controller/init_notification_menu', '', '::1', 'Mozilla/5.0 (Windows NT 6.2; WOW64; rv:31.0) Gecko/20100101 Firefox/31.0'),
(600, 0, '%5Bobject%20Object%5D', 1408166907, 'employee/employee_profile_controller/%5Bobject%20Object%5D', '', '::1', 'Mozilla/5.0 (Windows NT 6.2; WOW64; rv:31.0) Gecko/20100101 Firefox/31.0'),
(601, 0, 'user_unseen_notification_count', 1408166908, 'notification/notified_users_controller/user_unseen_notification_count', '', '::1', 'Mozilla/5.0 (Windows NT 6.2; WOW64; rv:31.0) Gecko/20100101 Firefox/31.0'),
(602, 0, 'view_profile', 1408166949, 'employee/employee_profile_controller/view_profile', '', '::1', 'Mozilla/5.0 (Windows NT 6.2; WOW64; rv:31.0) Gecko/20100101 Firefox/31.0'),
(603, 0, 'view_profile', 1408167102, 'employee/employee_profile_controller/view_profile', '', '::1', 'Mozilla/5.0 (Windows NT 6.2; WOW64; rv:31.0) Gecko/20100101 Firefox/31.0'),
(604, 0, 'add_project_view', 1408167237, 'project/project_controller/add_project_view', '', '::1', 'Mozilla/5.0 (Windows NT 6.2; WOW64; rv:31.0) Gecko/20100101 Firefox/31.0'),
(605, 0, 'index', 1408167242, 'project/fileupload', '', '::1', 'Mozilla/5.0 (Windows NT 6.2; WOW64; rv:31.0) Gecko/20100101 Firefox/31.0'),
(606, 0, 'init_notification_menu', 1408167242, 'notification/notification_controller/init_notification_menu', '', '::1', 'Mozilla/5.0 (Windows NT 6.2; WOW64; rv:31.0) Gecko/20100101 Firefox/31.0'),
(607, 0, 'user_unseen_notification_count', 1408167243, 'notification/notified_users_controller/user_unseen_notification_count', '', '::1', 'Mozilla/5.0 (Windows NT 6.2; WOW64; rv:31.0) Gecko/20100101 Firefox/31.0'),
(608, 0, 'view_profile', 1408167254, 'employee/employee_profile_controller/view_profile', '', '::1', 'Mozilla/5.0 (Windows NT 6.2; WOW64; rv:31.0) Gecko/20100101 Firefox/31.0'),
(609, 0, 'view_profile', 1408167361, 'employee/employee_profile_controller/view_profile', '', '::1', 'Mozilla/5.0 (Windows NT 6.2; WOW64; rv:31.0) Gecko/20100101 Firefox/31.0'),
(610, 0, 'view_profile', 1408167395, 'employee/employee_profile_controller/view_profile', '', '::1', 'Mozilla/5.0 (Windows NT 6.2; WOW64; rv:31.0) Gecko/20100101 Firefox/31.0'),
(611, 0, 'view_profile', 1408167415, 'employee/employee_profile_controller/view_profile', '', '::1', 'Mozilla/5.0 (Windows NT 6.2; WOW64; rv:31.0) Gecko/20100101 Firefox/31.0'),
(612, 0, '%5Bobject%20Object%5D', 1408167420, 'employee/employee_profile_controller/%5Bobject%20Object%5D', '', '::1', 'Mozilla/5.0 (Windows NT 6.2; WOW64; rv:31.0) Gecko/20100101 Firefox/31.0'),
(613, 0, 'init_notification_menu', 1408167420, 'notification/notification_controller/init_notification_menu', '', '::1', 'Mozilla/5.0 (Windows NT 6.2; WOW64; rv:31.0) Gecko/20100101 Firefox/31.0'),
(614, 0, 'user_unseen_notification_count', 1408167421, 'notification/notified_users_controller/user_unseen_notification_count', '', '::1', 'Mozilla/5.0 (Windows NT 6.2; WOW64; rv:31.0) Gecko/20100101 Firefox/31.0'),
(615, 0, 'view_profile', 1408167706, 'employee/employee_profile_controller/view_profile', '', '::1', 'Mozilla/5.0 (Windows NT 6.2; WOW64; rv:31.0) Gecko/20100101 Firefox/31.0'),
(616, 0, 'init_notification_menu', 1408167710, 'notification/notification_controller/init_notification_menu', '', '::1', 'Mozilla/5.0 (Windows NT 6.2; WOW64; rv:31.0) Gecko/20100101 Firefox/31.0'),
(617, 0, '%5Bobject%20Object%5D', 1408167710, 'employee/employee_profile_controller/%5Bobject%20Object%5D', '', '::1', 'Mozilla/5.0 (Windows NT 6.2; WOW64; rv:31.0) Gecko/20100101 Firefox/31.0'),
(618, 0, 'user_unseen_notification_count', 1408167711, 'notification/notified_users_controller/user_unseen_notification_count', '', '::1', 'Mozilla/5.0 (Windows NT 6.2; WOW64; rv:31.0) Gecko/20100101 Firefox/31.0'),
(619, 0, 'view_profile', 1408167765, 'employee/employee_profile_controller/view_profile', '', '::1', 'Mozilla/5.0 (Windows NT 6.2; WOW64; rv:31.0) Gecko/20100101 Firefox/31.0'),
(620, 0, 'init_notification_menu', 1408167770, 'notification/notification_controller/init_notification_menu', '', '::1', 'Mozilla/5.0 (Windows NT 6.2; WOW64; rv:31.0) Gecko/20100101 Firefox/31.0'),
(621, 0, '%5Bobject%20Object%5D', 1408167770, 'employee/employee_profile_controller/%5Bobject%20Object%5D', '', '::1', 'Mozilla/5.0 (Windows NT 6.2; WOW64; rv:31.0) Gecko/20100101 Firefox/31.0'),
(622, 0, 'user_unseen_notification_count', 1408167771, 'notification/notified_users_controller/user_unseen_notification_count', '', '::1', 'Mozilla/5.0 (Windows NT 6.2; WOW64; rv:31.0) Gecko/20100101 Firefox/31.0'),
(623, 0, 'view_profile', 1408167808, 'employee/employee_profile_controller/view_profile', '', '::1', 'Mozilla/5.0 (Windows NT 6.2; WOW64; rv:31.0) Gecko/20100101 Firefox/31.0'),
(624, 0, 'init_notification_menu', 1408167812, 'notification/notification_controller/init_notification_menu', '', '::1', 'Mozilla/5.0 (Windows NT 6.2; WOW64; rv:31.0) Gecko/20100101 Firefox/31.0'),
(625, 0, '%5Bobject%20Object%5D', 1408167812, 'employee/employee_profile_controller/%5Bobject%20Object%5D', '', '::1', 'Mozilla/5.0 (Windows NT 6.2; WOW64; rv:31.0) Gecko/20100101 Firefox/31.0'),
(626, 0, 'user_unseen_notification_count', 1408167814, 'notification/notified_users_controller/user_unseen_notification_count', '', '::1', 'Mozilla/5.0 (Windows NT 6.2; WOW64; rv:31.0) Gecko/20100101 Firefox/31.0'),
(627, 0, 'view_profile', 1408167892, 'employee/employee_profile_controller/view_profile', '', '::1', 'Mozilla/5.0 (Windows NT 6.2; WOW64; rv:31.0) Gecko/20100101 Firefox/31.0'),
(628, 0, '%5Bobject%20Object%5D', 1408167897, 'employee/employee_profile_controller/%5Bobject%20Object%5D', '', '::1', 'Mozilla/5.0 (Windows NT 6.2; WOW64; rv:31.0) Gecko/20100101 Firefox/31.0'),
(629, 0, 'init_notification_menu', 1408167897, 'notification/notification_controller/init_notification_menu', '', '::1', 'Mozilla/5.0 (Windows NT 6.2; WOW64; rv:31.0) Gecko/20100101 Firefox/31.0'),
(630, 0, 'user_unseen_notification_count', 1408167898, 'notification/notified_users_controller/user_unseen_notification_count', '', '::1', 'Mozilla/5.0 (Windows NT 6.2; WOW64; rv:31.0) Gecko/20100101 Firefox/31.0'),
(631, 0, 'view_profile', 1408167967, 'employee/employee_profile_controller/view_profile', '', '::1', 'Mozilla/5.0 (Windows NT 6.2; WOW64; rv:31.0) Gecko/20100101 Firefox/31.0'),
(632, 0, 'init_notification_menu', 1408167971, 'notification/notification_controller/init_notification_menu', '', '::1', 'Mozilla/5.0 (Windows NT 6.2; WOW64; rv:31.0) Gecko/20100101 Firefox/31.0'),
(633, 0, '%5Bobject%20Object%5D', 1408167971, 'employee/employee_profile_controller/%5Bobject%20Object%5D', '', '::1', 'Mozilla/5.0 (Windows NT 6.2; WOW64; rv:31.0) Gecko/20100101 Firefox/31.0'),
(634, 0, 'user_unseen_notification_count', 1408167972, 'notification/notified_users_controller/user_unseen_notification_count', '', '::1', 'Mozilla/5.0 (Windows NT 6.2; WOW64; rv:31.0) Gecko/20100101 Firefox/31.0'),
(635, 0, 'view_profile', 1408168300, 'employee/employee_profile_controller/view_profile', '', '::1', 'Mozilla/5.0 (Windows NT 6.2; WOW64; rv:31.0) Gecko/20100101 Firefox/31.0'),
(636, 0, '%5Bobject%20Object%5D', 1408168305, 'employee/employee_profile_controller/%5Bobject%20Object%5D', '', '::1', 'Mozilla/5.0 (Windows NT 6.2; WOW64; rv:31.0) Gecko/20100101 Firefox/31.0'),
(637, 0, 'init_notification_menu', 1408168305, 'notification/notification_controller/init_notification_menu', '', '::1', 'Mozilla/5.0 (Windows NT 6.2; WOW64; rv:31.0) Gecko/20100101 Firefox/31.0'),
(638, 0, 'user_unseen_notification_count', 1408168306, 'notification/notified_users_controller/user_unseen_notification_count', '', '::1', 'Mozilla/5.0 (Windows NT 6.2; WOW64; rv:31.0) Gecko/20100101 Firefox/31.0'),
(639, 0, 'view_profile', 1408168496, 'employee/employee_profile_controller/view_profile', '', '::1', 'Mozilla/5.0 (Windows NT 6.2; WOW64; rv:31.0) Gecko/20100101 Firefox/31.0'),
(640, 0, '%5Bobject%20Object%5D', 1408168501, 'employee/employee_profile_controller/%5Bobject%20Object%5D', '', '::1', 'Mozilla/5.0 (Windows NT 6.2; WOW64; rv:31.0) Gecko/20100101 Firefox/31.0'),
(641, 0, 'init_notification_menu', 1408168501, 'notification/notification_controller/init_notification_menu', '', '::1', 'Mozilla/5.0 (Windows NT 6.2; WOW64; rv:31.0) Gecko/20100101 Firefox/31.0'),
(642, 0, 'user_unseen_notification_count', 1408168502, 'notification/notified_users_controller/user_unseen_notification_count', '', '::1', 'Mozilla/5.0 (Windows NT 6.2; WOW64; rv:31.0) Gecko/20100101 Firefox/31.0'),
(643, 0, 'view_profile', 1408168635, 'employee/employee_profile_controller/view_profile', '', '::1', 'Mozilla/5.0 (Windows NT 6.2; WOW64; rv:31.0) Gecko/20100101 Firefox/31.0'),
(644, 0, 'init_notification_menu', 1408168639, 'notification/notification_controller/init_notification_menu', '', '::1', 'Mozilla/5.0 (Windows NT 6.2; WOW64; rv:31.0) Gecko/20100101 Firefox/31.0'),
(645, 0, '%5Bobject%20Object%5D', 1408168639, 'employee/employee_profile_controller/%5Bobject%20Object%5D', '', '::1', 'Mozilla/5.0 (Windows NT 6.2; WOW64; rv:31.0) Gecko/20100101 Firefox/31.0'),
(646, 0, 'user_unseen_notification_count', 1408168640, 'notification/notified_users_controller/user_unseen_notification_count', '', '::1', 'Mozilla/5.0 (Windows NT 6.2; WOW64; rv:31.0) Gecko/20100101 Firefox/31.0'),
(647, 0, 'view_profile', 1408168865, 'employee/employee_profile_controller/view_profile', '', '::1', 'Mozilla/5.0 (Windows NT 6.2; WOW64; rv:31.0) Gecko/20100101 Firefox/31.0'),
(648, 0, '%5Bobject%20Object%5D', 1408168870, 'employee/employee_profile_controller/%5Bobject%20Object%5D', '', '::1', 'Mozilla/5.0 (Windows NT 6.2; WOW64; rv:31.0) Gecko/20100101 Firefox/31.0'),
(649, 0, 'init_notification_menu', 1408168870, 'notification/notification_controller/init_notification_menu', '', '::1', 'Mozilla/5.0 (Windows NT 6.2; WOW64; rv:31.0) Gecko/20100101 Firefox/31.0'),
(650, 0, 'user_unseen_notification_count', 1408168871, 'notification/notified_users_controller/user_unseen_notification_count', '', '::1', 'Mozilla/5.0 (Windows NT 6.2; WOW64; rv:31.0) Gecko/20100101 Firefox/31.0'),
(651, 0, 'view_profile', 1408169144, 'employee/employee_profile_controller/view_profile', '', '::1', 'Mozilla/5.0 (Windows NT 6.2; WOW64; rv:31.0) Gecko/20100101 Firefox/31.0'),
(652, 0, '%5Bobject%20Object%5D', 1408169148, 'employee/employee_profile_controller/%5Bobject%20Object%5D', '', '::1', 'Mozilla/5.0 (Windows NT 6.2; WOW64; rv:31.0) Gecko/20100101 Firefox/31.0'),
(653, 0, 'init_notification_menu', 1408169148, 'notification/notification_controller/init_notification_menu', '', '::1', 'Mozilla/5.0 (Windows NT 6.2; WOW64; rv:31.0) Gecko/20100101 Firefox/31.0'),
(654, 0, 'user_unseen_notification_count', 1408169149, 'notification/notified_users_controller/user_unseen_notification_count', '', '::1', 'Mozilla/5.0 (Windows NT 6.2; WOW64; rv:31.0) Gecko/20100101 Firefox/31.0'),
(655, 0, 'index', 1408169763, 'login/login_controller', '', '::1', 'Mozilla/5.0 (Windows NT 6.2; WOW64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/36.0.1985.143 Safari/537.36'),
(656, 0, 'authenticate_user', 1408169783, 'login/login_controller/authenticate_user', '{"login_username":"gayathma3","login_password":"abc123@#"}', '::1', 'Mozilla/5.0 (Windows NT 6.2; WOW64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/36.0.1985.143 Safari/537.36'),
(657, 0, 'index', 1408169785, 'login/login_controller', '', '::1', 'Mozilla/5.0 (Windows NT 6.2; WOW64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/36.0.1985.143 Safari/537.36'),
(658, 0, 'index', 1408169786, 'dashboard/dashboard_controller', '', '::1', 'Mozilla/5.0 (Windows NT 6.2; WOW64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/36.0.1985.143 Safari/537.36'),
(659, 0, 'init_notification_menu', 1408169788, 'notification/notification_controller/init_notification_menu', '', '::1', 'Mozilla/5.0 (Windows NT 6.2; WOW64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/36.0.1985.143 Safari/537.36'),
(660, 0, '[object%20Object]', 1408169788, 'dashboard/dashboard_controller/[object%20Object]', '', '::1', 'Mozilla/5.0 (Windows NT 6.2; WOW64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/36.0.1985.143 Safari/537.36'),
(661, 0, 'user_unseen_notification_count', 1408169789, 'notification/notified_users_controller/user_unseen_notification_count', '', '::1', 'Mozilla/5.0 (Windows NT 6.2; WOW64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/36.0.1985.143 Safari/537.36'),
(662, 0, 'view_profile', 1408169803, 'employee/employee_profile_controller/view_profile', '', '::1', 'Mozilla/5.0 (Windows NT 6.2; WOW64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/36.0.1985.143 Safari/537.36'),
(663, 0, 'init_notification_menu', 1408169805, 'notification/notification_controller/init_notification_menu', '', '::1', 'Mozilla/5.0 (Windows NT 6.2; WOW64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/36.0.1985.143 Safari/537.36'),
(664, 0, '[object%20Object]', 1408169805, 'employee/employee_profile_controller/[object%20Object]', '', '::1', 'Mozilla/5.0 (Windows NT 6.2; WOW64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/36.0.1985.143 Safari/537.36'),
(665, 0, 'user_unseen_notification_count', 1408169806, 'notification/notified_users_controller/user_unseen_notification_count', '', '::1', 'Mozilla/5.0 (Windows NT 6.2; WOW64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/36.0.1985.143 Safari/537.36'),
(666, 0, 'view_profile', 1408170117, 'employee/employee_profile_controller/view_profile', '', '::1', 'Mozilla/5.0 (Windows NT 6.2; WOW64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/36.0.1985.143 Safari/537.36'),
(667, 0, 'init_notification_menu', 1408170119, 'notification/notification_controller/init_notification_menu', '', '::1', 'Mozilla/5.0 (Windows NT 6.2; WOW64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/36.0.1985.143 Safari/537.36'),
(668, 0, '[object%20Object]', 1408170119, 'employee/employee_profile_controller/[object%20Object]', '', '::1', 'Mozilla/5.0 (Windows NT 6.2; WOW64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/36.0.1985.143 Safari/537.36'),
(669, 0, 'user_unseen_notification_count', 1408170120, 'notification/notified_users_controller/user_unseen_notification_count', '', '::1', 'Mozilla/5.0 (Windows NT 6.2; WOW64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/36.0.1985.143 Safari/537.36'),
(670, 0, 'view_profile', 1408170202, 'employee/employee_profile_controller/view_profile', '', '::1', 'Mozilla/5.0 (Windows NT 6.2; WOW64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/36.0.1985.143 Safari/537.36'),
(671, 0, 'init_notification_menu', 1408170204, 'notification/notification_controller/init_notification_menu', '', '::1', 'Mozilla/5.0 (Windows NT 6.2; WOW64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/36.0.1985.143 Safari/537.36'),
(672, 0, '[object%20Object]', 1408170204, 'employee/employee_profile_controller/[object%20Object]', '', '::1', 'Mozilla/5.0 (Windows NT 6.2; WOW64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/36.0.1985.143 Safari/537.36'),
(673, 0, 'user_unseen_notification_count', 1408170205, 'notification/notified_users_controller/user_unseen_notification_count', '', '::1', 'Mozilla/5.0 (Windows NT 6.2; WOW64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/36.0.1985.143 Safari/537.36'),
(674, 0, 'view_profile', 1408170213, 'employee/employee_profile_controller/view_profile', '', '::1', 'Mozilla/5.0 (Windows NT 6.2; WOW64; rv:31.0) Gecko/20100101 Firefox/31.0'),
(675, 0, '%5Bobject%20Object%5D', 1408170217, 'employee/employee_profile_controller/%5Bobject%20Object%5D', '', '::1', 'Mozilla/5.0 (Windows NT 6.2; WOW64; rv:31.0) Gecko/20100101 Firefox/31.0'),
(676, 0, 'init_notification_menu', 1408170217, 'notification/notification_controller/init_notification_menu', '', '::1', 'Mozilla/5.0 (Windows NT 6.2; WOW64; rv:31.0) Gecko/20100101 Firefox/31.0'),
(677, 0, 'user_unseen_notification_count', 1408170218, 'notification/notified_users_controller/user_unseen_notification_count', '', '::1', 'Mozilla/5.0 (Windows NT 6.2; WOW64; rv:31.0) Gecko/20100101 Firefox/31.0'),
(678, 0, 'view_profile', 1408170394, 'employee/employee_profile_controller/view_profile', '', '::1', 'Mozilla/5.0 (Windows NT 6.2; WOW64; rv:31.0) Gecko/20100101 Firefox/31.0'),
(679, 0, 'init_notification_menu', 1408170397, 'notification/notification_controller/init_notification_menu', '', '::1', 'Mozilla/5.0 (Windows NT 6.2; WOW64; rv:31.0) Gecko/20100101 Firefox/31.0'),
(680, 0, '%5Bobject%20Object%5D', 1408170398, 'employee/employee_profile_controller/%5Bobject%20Object%5D', '', '::1', 'Mozilla/5.0 (Windows NT 6.2; WOW64; rv:31.0) Gecko/20100101 Firefox/31.0'),
(681, 0, 'user_unseen_notification_count', 1408170399, 'notification/notified_users_controller/user_unseen_notification_count', '', '::1', 'Mozilla/5.0 (Windows NT 6.2; WOW64; rv:31.0) Gecko/20100101 Firefox/31.0'),
(682, 0, 'view_profile', 1408170504, 'employee/employee_profile_controller/view_profile', '', '::1', 'Mozilla/5.0 (Windows NT 6.2; WOW64; rv:31.0) Gecko/20100101 Firefox/31.0'),
(683, 0, '%5Bobject%20Object%5D', 1408170508, 'employee/employee_profile_controller/%5Bobject%20Object%5D', '', '::1', 'Mozilla/5.0 (Windows NT 6.2; WOW64; rv:31.0) Gecko/20100101 Firefox/31.0'),
(684, 0, 'init_notification_menu', 1408170508, 'notification/notification_controller/init_notification_menu', '', '::1', 'Mozilla/5.0 (Windows NT 6.2; WOW64; rv:31.0) Gecko/20100101 Firefox/31.0'),
(685, 0, 'user_unseen_notification_count', 1408170509, 'notification/notified_users_controller/user_unseen_notification_count', '', '::1', 'Mozilla/5.0 (Windows NT 6.2; WOW64; rv:31.0) Gecko/20100101 Firefox/31.0'),
(686, 0, 'view_profile', 1408170550, 'employee/employee_profile_controller/view_profile', '', '::1', 'Mozilla/5.0 (Windows NT 6.2; WOW64; rv:31.0) Gecko/20100101 Firefox/31.0'),
(687, 0, '%5Bobject%20Object%5D', 1408170554, 'employee/employee_profile_controller/%5Bobject%20Object%5D', '', '::1', 'Mozilla/5.0 (Windows NT 6.2; WOW64; rv:31.0) Gecko/20100101 Firefox/31.0'),
(688, 0, 'init_notification_menu', 1408170554, 'notification/notification_controller/init_notification_menu', '', '::1', 'Mozilla/5.0 (Windows NT 6.2; WOW64; rv:31.0) Gecko/20100101 Firefox/31.0'),
(689, 0, 'user_unseen_notification_count', 1408170556, 'notification/notified_users_controller/user_unseen_notification_count', '', '::1', 'Mozilla/5.0 (Windows NT 6.2; WOW64; rv:31.0) Gecko/20100101 Firefox/31.0'),
(690, 0, 'view_profile', 1408170675, 'employee/employee_profile_controller/view_profile', '', '::1', 'Mozilla/5.0 (Windows NT 6.2; WOW64; rv:31.0) Gecko/20100101 Firefox/31.0'),
(691, 0, '%5Bobject%20Object%5D', 1408170680, 'employee/employee_profile_controller/%5Bobject%20Object%5D', '', '::1', 'Mozilla/5.0 (Windows NT 6.2; WOW64; rv:31.0) Gecko/20100101 Firefox/31.0'),
(692, 0, 'init_notification_menu', 1408170680, 'notification/notification_controller/init_notification_menu', '', '::1', 'Mozilla/5.0 (Windows NT 6.2; WOW64; rv:31.0) Gecko/20100101 Firefox/31.0'),
(693, 0, 'user_unseen_notification_count', 1408170681, 'notification/notified_users_controller/user_unseen_notification_count', '', '::1', 'Mozilla/5.0 (Windows NT 6.2; WOW64; rv:31.0) Gecko/20100101 Firefox/31.0'),
(694, 0, 'view_profile', 1408170817, 'employee/employee_profile_controller/view_profile', '', '::1', 'Mozilla/5.0 (Windows NT 6.2; WOW64; rv:31.0) Gecko/20100101 Firefox/31.0'),
(695, 0, 'init_notification_menu', 1408170822, 'notification/notification_controller/init_notification_menu', '', '::1', 'Mozilla/5.0 (Windows NT 6.2; WOW64; rv:31.0) Gecko/20100101 Firefox/31.0'),
(696, 0, '%5Bobject%20Object%5D', 1408170822, 'employee/employee_profile_controller/%5Bobject%20Object%5D', '', '::1', 'Mozilla/5.0 (Windows NT 6.2; WOW64; rv:31.0) Gecko/20100101 Firefox/31.0'),
(697, 0, 'user_unseen_notification_count', 1408170823, 'notification/notified_users_controller/user_unseen_notification_count', '', '::1', 'Mozilla/5.0 (Windows NT 6.2; WOW64; rv:31.0) Gecko/20100101 Firefox/31.0'),
(698, 0, 'view_profile', 1408170905, 'employee/employee_profile_controller/view_profile', '', '::1', 'Mozilla/5.0 (Windows NT 6.2; WOW64; rv:31.0) Gecko/20100101 Firefox/31.0'),
(699, 0, 'init_notification_menu', 1408170909, 'notification/notification_controller/init_notification_menu', '', '::1', 'Mozilla/5.0 (Windows NT 6.2; WOW64; rv:31.0) Gecko/20100101 Firefox/31.0'),
(700, 0, '%5Bobject%20Object%5D', 1408170909, 'employee/employee_profile_controller/%5Bobject%20Object%5D', '', '::1', 'Mozilla/5.0 (Windows NT 6.2; WOW64; rv:31.0) Gecko/20100101 Firefox/31.0'),
(701, 0, 'user_unseen_notification_count', 1408170910, 'notification/notified_users_controller/user_unseen_notification_count', '', '::1', 'Mozilla/5.0 (Windows NT 6.2; WOW64; rv:31.0) Gecko/20100101 Firefox/31.0'),
(702, 0, 'add_project_view', 1408171431, 'project/project_controller/add_project_view', '', '::1', 'Mozilla/5.0 (Windows NT 6.2; WOW64; rv:31.0) Gecko/20100101 Firefox/31.0'),
(703, 0, 'index', 1408171434, 'project/fileupload', '', '::1', 'Mozilla/5.0 (Windows NT 6.2; WOW64; rv:31.0) Gecko/20100101 Firefox/31.0'),
(704, 0, 'init_notification_menu', 1408171434, 'notification/notification_controller/init_notification_menu', '', '::1', 'Mozilla/5.0 (Windows NT 6.2; WOW64; rv:31.0) Gecko/20100101 Firefox/31.0'),
(705, 0, 'user_unseen_notification_count', 1408171435, 'notification/notified_users_controller/user_unseen_notification_count', '', '::1', 'Mozilla/5.0 (Windows NT 6.2; WOW64; rv:31.0) Gecko/20100101 Firefox/31.0'),
(706, 0, 'index', 1408171455, 'project/fileupload', '{"project_name":"","project_vendor":"","project_start_date":"2014-08-16","project_end_date":"","project_description":"<a href=\\"http:\\/\\/localhost\\/workgram-sliit\\/workgram\\/workgram\\/index.php\\/project\\/project_controller\\/add_project_view\\" rel=\\"nofollow\\" target=\\"_blank\\">http:\\/\\/localhost\\/workgram-sliit\\/workgram\\/workgram\\/index.php\\/project\\/project_controller\\/add_project_v...<\\/a><br>","_wysihtml5_mode":"1","project_logo":"project_default_logo.png"}', '::1', 'Mozilla/5.0 (Windows NT 6.2; WOW64; rv:31.0) Gecko/20100101 Firefox/31.0'),
(707, 0, 'add_project_view', 1408171538, 'project/project_controller/add_project_view', '', '::1', 'Mozilla/5.0 (Windows NT 6.2; WOW64; rv:31.0) Gecko/20100101 Firefox/31.0'),
(708, 0, 'index', 1408171542, 'project/fileupload', '', '::1', 'Mozilla/5.0 (Windows NT 6.2; WOW64; rv:31.0) Gecko/20100101 Firefox/31.0'),
(709, 0, 'init_notification_menu', 1408171542, 'notification/notification_controller/init_notification_menu', '', '::1', 'Mozilla/5.0 (Windows NT 6.2; WOW64; rv:31.0) Gecko/20100101 Firefox/31.0'),
(710, 0, 'user_unseen_notification_count', 1408171543, 'notification/notified_users_controller/user_unseen_notification_count', '', '::1', 'Mozilla/5.0 (Windows NT 6.2; WOW64; rv:31.0) Gecko/20100101 Firefox/31.0'),
(711, 0, 'index', 1408171583, 'project/fileupload', '{"project_name":"","project_vendor":"","project_start_date":"2014-08-16","project_end_date":"","project_description":"<a href=\\"http:\\/\\/localhost\\/workgram-sliit\\/workgram\\/workgram\\/index.php\\/project\\/project_controller\\/add_project_view\\" rel=\\"nofollow\\" target=\\"_blank\\">http:\\/\\/localhost\\/workgram-sliit\\/workgram\\/workgram\\/index.php\\/project\\/project_controller\\/add_project_v...<\\/a><br>","_wysihtml5_mode":"1","project_logo":"project_default_logo.png"}', '::1', 'Mozilla/5.0 (Windows NT 6.2; WOW64; rv:31.0) Gecko/20100101 Firefox/31.0'),
(712, 0, 'add_project_view', 1408171666, 'project/project_controller/add_project_view', '', '::1', 'Mozilla/5.0 (Windows NT 6.2; WOW64; rv:31.0) Gecko/20100101 Firefox/31.0'),
(713, 0, 'index', 1408171670, 'project/fileupload', '', '::1', 'Mozilla/5.0 (Windows NT 6.2; WOW64; rv:31.0) Gecko/20100101 Firefox/31.0'),
(714, 0, 'init_notification_menu', 1408171670, 'notification/notification_controller/init_notification_menu', '', '::1', 'Mozilla/5.0 (Windows NT 6.2; WOW64; rv:31.0) Gecko/20100101 Firefox/31.0'),
(715, 0, 'user_unseen_notification_count', 1408171672, 'notification/notified_users_controller/user_unseen_notification_count', '', '::1', 'Mozilla/5.0 (Windows NT 6.2; WOW64; rv:31.0) Gecko/20100101 Firefox/31.0'),
(716, 0, 'index', 1408171683, 'project/fileupload', '{"project_name":"","project_vendor":"","project_start_date":"2014-08-16","project_end_date":"","project_description":"<a href=\\"http:\\/\\/localhost\\/workgram-sliit\\/workgram\\/workgram\\/index.php\\/project\\/project_controller\\/add_project_view\\" rel=\\"nofollow\\" target=\\"_blank\\">http:\\/\\/localhost\\/workgram-sliit\\/workgram\\/workgram\\/index.php\\/project\\/project_controller\\/add_project_v...<\\/a><br>","_wysihtml5_mode":"1","project_logo":"project_default_logo.png"}', '::1', 'Mozilla/5.0 (Windows NT 6.2; WOW64; rv:31.0) Gecko/20100101 Firefox/31.0'),
(717, 0, 'add_temp_project_stuff', 1408171685, 'project/project_controller/add_temp_project_stuff', '{"file_name":["531709_575297122495442_553449702_n (1).jpg"]}', '::1', 'Mozilla/5.0 (Windows NT 6.2; WOW64; rv:31.0) Gecko/20100101 Firefox/31.0'),
(718, 0, 'add_project_view', 1408171715, 'project/project_controller/add_project_view', '', '::1', 'Mozilla/5.0 (Windows NT 6.2; WOW64; rv:31.0) Gecko/20100101 Firefox/31.0'),
(719, 0, 'index', 1408171732, 'login/login_controller', '', '::1', 'Mozilla/5.0 (Windows NT 6.2; WOW64; rv:31.0) Gecko/20100101 Firefox/31.0'),
(720, 0, 'index', 1408171734, 'dashboard/dashboard_controller', '', '::1', 'Mozilla/5.0 (Windows NT 6.2; WOW64; rv:31.0) Gecko/20100101 Firefox/31.0'),
(721, 0, '%5Bobject%20Object%5D', 1408171736, 'dashboard/dashboard_controller/%5Bobject%20Object%5D', '', '::1', 'Mozilla/5.0 (Windows NT 6.2; WOW64; rv:31.0) Gecko/20100101 Firefox/31.0'),
(722, 0, 'init_notification_menu', 1408171736, 'notification/notification_controller/init_notification_menu', '', '::1', 'Mozilla/5.0 (Windows NT 6.2; WOW64; rv:31.0) Gecko/20100101 Firefox/31.0'),
(723, 0, 'user_unseen_notification_count', 1408171737, 'notification/notified_users_controller/user_unseen_notification_count', '', '::1', 'Mozilla/5.0 (Windows NT 6.2; WOW64; rv:31.0) Gecko/20100101 Firefox/31.0'),
(724, 0, 'manage_projects', 1408171740, 'project/project_controller/manage_projects', '', '::1', 'Mozilla/5.0 (Windows NT 6.2; WOW64; rv:31.0) Gecko/20100101 Firefox/31.0'),
(725, 0, '%5Bobject%20Object%5D', 1408171742, 'project/project_controller/%5Bobject%20Object%5D', '', '::1', 'Mozilla/5.0 (Windows NT 6.2; WOW64; rv:31.0) Gecko/20100101 Firefox/31.0'),
(726, 0, 'init_notification_menu', 1408171742, 'notification/notification_controller/init_notification_menu', '', '::1', 'Mozilla/5.0 (Windows NT 6.2; WOW64; rv:31.0) Gecko/20100101 Firefox/31.0'),
(727, 0, 'user_unseen_notification_count', 1408171743, 'notification/notified_users_controller/user_unseen_notification_count', '', '::1', 'Mozilla/5.0 (Windows NT 6.2; WOW64; rv:31.0) Gecko/20100101 Firefox/31.0'),
(728, 0, 'add_project_view', 1408171743, 'project/project_controller/add_project_view', '', '::1', 'Mozilla/5.0 (Windows NT 6.2; WOW64; rv:31.0) Gecko/20100101 Firefox/31.0'),
(729, 0, 'index', 1408171745, 'project/fileupload', '', '::1', 'Mozilla/5.0 (Windows NT 6.2; WOW64; rv:31.0) Gecko/20100101 Firefox/31.0'),
(730, 0, 'init_notification_menu', 1408171745, 'notification/notification_controller/init_notification_menu', '', '::1', 'Mozilla/5.0 (Windows NT 6.2; WOW64; rv:31.0) Gecko/20100101 Firefox/31.0'),
(731, 0, 'user_unseen_notification_count', 1408171746, 'notification/notified_users_controller/user_unseen_notification_count', '', '::1', 'Mozilla/5.0 (Windows NT 6.2; WOW64; rv:31.0) Gecko/20100101 Firefox/31.0'),
(732, 0, 'index', 1408171767, 'project/fileupload', '{"project_name":"","project_vendor":"","project_start_date":"2014-08-16","project_end_date":"","project_description":"","_wysihtml5_mode":"1","project_logo":"project_default_logo.png"}', '::1', 'Mozilla/5.0 (Windows NT 6.2; WOW64; rv:31.0) Gecko/20100101 Firefox/31.0'),
(733, 0, 'add_temp_project_stuff', 1408171768, 'project/project_controller/add_temp_project_stuff', '{"file_name":["531709_575297122495442_553449702_n (2).jpg"]}', '::1', 'Mozilla/5.0 (Windows NT 6.2; WOW64; rv:31.0) Gecko/20100101 Firefox/31.0'),
(734, 0, 'index', 1408171777, 'project/fileupload', '{"project_name":"","project_vendor":"","project_start_date":"2014-08-16","project_end_date":"","project_description":"","_wysihtml5_mode":"1","project_logo":"project_default_logo.png"}', '::1', 'Mozilla/5.0 (Windows NT 6.2; WOW64; rv:31.0) Gecko/20100101 Firefox/31.0'),
(735, 0, 'add_temp_project_stuff', 1408171778, 'project/project_controller/add_temp_project_stuff', '{"file_name":["531709_575297122495442_553449702_n (2).jpg","The-Twilight-Saga_breaking-Dawn-Part-2-2012-Movie-Photos-wide-Wallpapers-13-728x455.jpg"]}', '::1', 'Mozilla/5.0 (Windows NT 6.2; WOW64; rv:31.0) Gecko/20100101 Firefox/31.0'),
(736, 0, 'index', 1408171803, 'project/fileupload', '{"project_name":"","project_vendor":"","project_start_date":"2014-08-16","project_end_date":"","project_description":"","_wysihtml5_mode":"1","project_logo":"project_default_logo.png"}', '::1', 'Mozilla/5.0 (Windows NT 6.2; WOW64; rv:31.0) Gecko/20100101 Firefox/31.0'),
(737, 0, 'add_temp_project_stuff', 1408171804, 'project/project_controller/add_temp_project_stuff', '{"file_name":["531709_575297122495442_553449702_n (2).jpg","The-Twilight-Saga_breaking-Dawn-Part-2-2012-Movie-Photos-wide-Wallpapers-13-728x455.jpg","531709_575297122495442_553449702_n (3).jpg"]}', '::1', 'Mozilla/5.0 (Windows NT 6.2; WOW64; rv:31.0) Gecko/20100101 Firefox/31.0'),
(738, 0, 'index', 1408171849, 'project/fileupload', '{"project_name":"","project_vendor":"","project_start_date":"2014-08-16","project_end_date":"","project_description":"","_wysihtml5_mode":"1","project_logo":"project_default_logo.png"}', '::1', 'Mozilla/5.0 (Windows NT 6.2; WOW64; rv:31.0) Gecko/20100101 Firefox/31.0'),
(739, 0, 'add_temp_project_stuff', 1408171850, 'project/project_controller/add_temp_project_stuff', '{"file_name":["531709_575297122495442_553449702_n (2).jpg","The-Twilight-Saga_breaking-Dawn-Part-2-2012-Movie-Photos-wide-Wallpapers-13-728x455.jpg","531709_575297122495442_553449702_n (3).jpg","531709_575297122495442_553449702_n (4).jpg"]}', '::1', 'Mozilla/5.0 (Windows NT 6.2; WOW64; rv:31.0) Gecko/20100101 Firefox/31.0'),
(740, 0, 'add_project_view', 1408171853, 'project/project_controller/add_project_view', '', '::1', 'Mozilla/5.0 (Windows NT 6.2; WOW64; rv:31.0) Gecko/20100101 Firefox/31.0'),
(741, 0, 'index', 1408171856, 'project/fileupload', '', '::1', 'Mozilla/5.0 (Windows NT 6.2; WOW64; rv:31.0) Gecko/20100101 Firefox/31.0'),
(742, 0, 'init_notification_menu', 1408171856, 'notification/notification_controller/init_notification_menu', '', '::1', 'Mozilla/5.0 (Windows NT 6.2; WOW64; rv:31.0) Gecko/20100101 Firefox/31.0'),
(743, 0, 'user_unseen_notification_count', 1408171858, 'notification/notified_users_controller/user_unseen_notification_count', '', '::1', 'Mozilla/5.0 (Windows NT 6.2; WOW64; rv:31.0) Gecko/20100101 Firefox/31.0'),
(744, 0, 'index', 1408171867, 'project/fileupload', '{"project_name":"","project_vendor":"","project_start_date":"2014-08-16","project_end_date":"","project_description":"","_wysihtml5_mode":"1","project_logo":"project_default_logo.png"}', '::1', 'Mozilla/5.0 (Windows NT 6.2; WOW64; rv:31.0) Gecko/20100101 Firefox/31.0'),
(745, 0, 'add_temp_project_stuff', 1408171868, 'project/project_controller/add_temp_project_stuff', '{"file_name":["531709_575297122495442_553449702_n (5).jpg"]}', '::1', 'Mozilla/5.0 (Windows NT 6.2; WOW64; rv:31.0) Gecko/20100101 Firefox/31.0'),
(746, 0, 'add_project_view', 1408171932, 'project/project_controller/add_project_view', '', '::1', 'Mozilla/5.0 (Windows NT 6.2; WOW64; rv:31.0) Gecko/20100101 Firefox/31.0'),
(747, 0, 'index', 1408171936, 'project/fileupload', '', '::1', 'Mozilla/5.0 (Windows NT 6.2; WOW64; rv:31.0) Gecko/20100101 Firefox/31.0'),
(748, 0, 'init_notification_menu', 1408171936, 'notification/notification_controller/init_notification_menu', '', '::1', 'Mozilla/5.0 (Windows NT 6.2; WOW64; rv:31.0) Gecko/20100101 Firefox/31.0');
INSERT INTO `statistics` (`statistic_id`, `user_id`, `action`, `date`, `uri`, `post_data`, `ip`, `browser`) VALUES
(749, 0, 'user_unseen_notification_count', 1408171937, 'notification/notified_users_controller/user_unseen_notification_count', '', '::1', 'Mozilla/5.0 (Windows NT 6.2; WOW64; rv:31.0) Gecko/20100101 Firefox/31.0'),
(750, 0, 'index', 1408171945, 'project/fileupload', '{"project_name":"","project_vendor":"","project_start_date":"2014-08-16","project_end_date":"","project_description":"","_wysihtml5_mode":"1","project_logo":"project_default_logo.png"}', '::1', 'Mozilla/5.0 (Windows NT 6.2; WOW64; rv:31.0) Gecko/20100101 Firefox/31.0'),
(751, 0, 'add_temp_project_stuff', 1408171947, 'project/project_controller/add_temp_project_stuff', '{"file_name":["despicable-me-4fdb838e20288.jpg"]}', '::1', 'Mozilla/5.0 (Windows NT 6.2; WOW64; rv:31.0) Gecko/20100101 Firefox/31.0'),
(752, 0, 'index', 1408172258, 'project/fileupload', '{"project_name":"","project_vendor":"","project_start_date":"2014-08-16","project_end_date":"","project_description":"","_wysihtml5_mode":"1","project_logo":"project_default_logo.png"}', '::1', 'Mozilla/5.0 (Windows NT 6.2; WOW64; rv:31.0) Gecko/20100101 Firefox/31.0'),
(753, 0, 'add_temp_project_stuff', 1408172259, 'project/project_controller/add_temp_project_stuff', '{"file_name":["despicable-me-4fdb838e20288.jpg","531709_575297122495442_553449702_n (6).jpg"]}', '::1', 'Mozilla/5.0 (Windows NT 6.2; WOW64; rv:31.0) Gecko/20100101 Firefox/31.0'),
(754, 0, 'index', 1408172363, 'project/fileupload', '{"project_name":"X","project_vendor":"cC","project_start_date":"2014-08-16","project_end_date":"","project_description":"xC","_wysihtml5_mode":"1","project_logo":"project_default_logo.png"}', '::1', 'Mozilla/5.0 (Windows NT 6.2; WOW64; rv:31.0) Gecko/20100101 Firefox/31.0'),
(755, 0, 'index', 1408172374, 'project/fileupload', '', '::1', 'Mozilla/5.0 (Windows NT 6.2; WOW64; rv:31.0) Gecko/20100101 Firefox/31.0'),
(756, 0, 'user_unseen_notification_count', 1408172375, 'notification/notified_users_controller/user_unseen_notification_count', '', '::1', 'Mozilla/5.0 (Windows NT 6.2; WOW64; rv:31.0) Gecko/20100101 Firefox/31.0'),
(757, 0, 'add_project_view', 1408172548, 'project/project_controller/add_project_view', '', '::1', 'Mozilla/5.0 (Windows NT 6.2; WOW64; rv:31.0) Gecko/20100101 Firefox/31.0'),
(758, 0, 'init_notification_menu', 1408172552, 'notification/notification_controller/init_notification_menu', '', '::1', 'Mozilla/5.0 (Windows NT 6.2; WOW64; rv:31.0) Gecko/20100101 Firefox/31.0'),
(759, 0, 'index', 1408172552, 'project/fileupload', '', '::1', 'Mozilla/5.0 (Windows NT 6.2; WOW64; rv:31.0) Gecko/20100101 Firefox/31.0'),
(760, 0, 'user_unseen_notification_count', 1408172553, 'notification/notified_users_controller/user_unseen_notification_count', '', '::1', 'Mozilla/5.0 (Windows NT 6.2; WOW64; rv:31.0) Gecko/20100101 Firefox/31.0'),
(761, 0, 'index', 1408172570, 'project/fileupload', '{"project_name":"X","project_vendor":"cC","project_start_date":"2014-08-16","project_end_date":"","project_description":"xC","_wysihtml5_mode":"1","project_logo":"project_default_logo.png"}', '::1', 'Mozilla/5.0 (Windows NT 6.2; WOW64; rv:31.0) Gecko/20100101 Firefox/31.0'),
(762, 0, 'add_temp_project_stuff', 1408172572, 'project/project_controller/add_temp_project_stuff', '{"file_name":["531709_575297122495442_553449702_n (7).jpg"]}', '::1', 'Mozilla/5.0 (Windows NT 6.2; WOW64; rv:31.0) Gecko/20100101 Firefox/31.0'),
(763, 0, 'index', 1408172605, 'project/fileupload', '{"project_name":"X","project_vendor":"cC","project_start_date":"2014-08-16","project_end_date":"","project_description":"xC","_wysihtml5_mode":"1","project_logo":"project_default_logo.png"}', '::1', 'Mozilla/5.0 (Windows NT 6.2; WOW64; rv:31.0) Gecko/20100101 Firefox/31.0'),
(764, 0, 'add_temp_project_stuff', 1408172607, 'project/project_controller/add_temp_project_stuff', '{"file_name":["531709_575297122495442_553449702_n (7).jpg","p.jpg"]}', '::1', 'Mozilla/5.0 (Windows NT 6.2; WOW64; rv:31.0) Gecko/20100101 Firefox/31.0'),
(765, 0, 'index', 1408172619, 'project/fileupload', '{"project_name":"X","project_vendor":"cC","project_start_date":"2014-08-16","project_end_date":"","project_description":"xC","_wysihtml5_mode":"1","project_logo":"project_default_logo.png"}', '::1', 'Mozilla/5.0 (Windows NT 6.2; WOW64; rv:31.0) Gecko/20100101 Firefox/31.0'),
(766, 0, 'add_temp_project_stuff', 1408172620, 'project/project_controller/add_temp_project_stuff', '{"file_name":["531709_575297122495442_553449702_n (7).jpg","p.jpg","The-Twilight-Saga_breaking-Dawn-Part-2-2012-Movie-Photos-wide-Wallpapers-13-728x455 (1).jpg"]}', '::1', 'Mozilla/5.0 (Windows NT 6.2; WOW64; rv:31.0) Gecko/20100101 Firefox/31.0'),
(767, 0, 'add_project_view', 1408173396, 'project/project_controller/add_project_view', '', '::1', 'Mozilla/5.0 (Windows NT 6.2; WOW64; rv:31.0) Gecko/20100101 Firefox/31.0'),
(768, 0, 'index', 1408173399, 'project/fileupload', '', '::1', 'Mozilla/5.0 (Windows NT 6.2; WOW64; rv:31.0) Gecko/20100101 Firefox/31.0'),
(769, 0, 'init_notification_menu', 1408173399, 'notification/notification_controller/init_notification_menu', '', '::1', 'Mozilla/5.0 (Windows NT 6.2; WOW64; rv:31.0) Gecko/20100101 Firefox/31.0'),
(770, 0, 'user_unseen_notification_count', 1408173401, 'notification/notified_users_controller/user_unseen_notification_count', '', '::1', 'Mozilla/5.0 (Windows NT 6.2; WOW64; rv:31.0) Gecko/20100101 Firefox/31.0'),
(771, 0, 'view_profile', 1408173509, 'employee/employee_profile_controller/view_profile', '', '::1', 'Mozilla/5.0 (Windows NT 6.2; WOW64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/36.0.1985.143 Safari/537.36'),
(772, 0, 'init_notification_menu', 1408173511, 'notification/notification_controller/init_notification_menu', '', '::1', 'Mozilla/5.0 (Windows NT 6.2; WOW64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/36.0.1985.143 Safari/537.36'),
(773, 0, '[object%20Object]', 1408173511, 'employee/employee_profile_controller/[object%20Object]', '', '::1', 'Mozilla/5.0 (Windows NT 6.2; WOW64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/36.0.1985.143 Safari/537.36'),
(774, 0, 'user_unseen_notification_count', 1408173512, 'notification/notified_users_controller/user_unseen_notification_count', '', '::1', 'Mozilla/5.0 (Windows NT 6.2; WOW64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/36.0.1985.143 Safari/537.36'),
(775, 0, 'view_profile', 1408173538, 'employee/employee_profile_controller/view_profile', '', '::1', 'Mozilla/5.0 (Windows NT 6.2; WOW64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/36.0.1985.143 Safari/537.36'),
(776, 0, 'init_notification_menu', 1408173540, 'notification/notification_controller/init_notification_menu', '', '::1', 'Mozilla/5.0 (Windows NT 6.2; WOW64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/36.0.1985.143 Safari/537.36'),
(777, 0, '[object%20Object]', 1408173540, 'employee/employee_profile_controller/[object%20Object]', '', '::1', 'Mozilla/5.0 (Windows NT 6.2; WOW64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/36.0.1985.143 Safari/537.36'),
(778, 0, 'user_unseen_notification_count', 1408173541, 'notification/notified_users_controller/user_unseen_notification_count', '', '::1', 'Mozilla/5.0 (Windows NT 6.2; WOW64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/36.0.1985.143 Safari/537.36'),
(779, 0, 'index', 1408376808, 'login/login_controller', '', '::1', 'Mozilla/5.0 (Windows NT 6.2; WOW64; rv:31.0) Gecko/20100101 Firefox/31.0'),
(780, 0, 'authenticate_user', 1408376828, 'login/login_controller/authenticate_user', '{"login_username":"gayathma3","login_password":"abc123@#"}', '::1', 'Mozilla/5.0 (Windows NT 6.2; WOW64; rv:31.0) Gecko/20100101 Firefox/31.0'),
(781, 0, 'index', 1408376830, 'login/login_controller', '', '::1', 'Mozilla/5.0 (Windows NT 6.2; WOW64; rv:31.0) Gecko/20100101 Firefox/31.0'),
(782, 0, 'index', 1408376831, 'dashboard/dashboard_controller', '', '::1', 'Mozilla/5.0 (Windows NT 6.2; WOW64; rv:31.0) Gecko/20100101 Firefox/31.0'),
(783, 0, 'init_notification_menu', 1408376836, 'notification/notification_controller/init_notification_menu', '', '::1', 'Mozilla/5.0 (Windows NT 6.2; WOW64; rv:31.0) Gecko/20100101 Firefox/31.0'),
(784, 0, '%5Bobject%20Object%5D', 1408376836, 'dashboard/dashboard_controller/%5Bobject%20Object%5D', '', '::1', 'Mozilla/5.0 (Windows NT 6.2; WOW64; rv:31.0) Gecko/20100101 Firefox/31.0'),
(785, 0, 'user_unseen_notification_count', 1408376837, 'notification/notified_users_controller/user_unseen_notification_count', '', '::1', 'Mozilla/5.0 (Windows NT 6.2; WOW64; rv:31.0) Gecko/20100101 Firefox/31.0'),
(786, 0, 'manage_projects', 1408376841, 'project/project_controller/manage_projects', '', '::1', 'Mozilla/5.0 (Windows NT 6.2; WOW64; rv:31.0) Gecko/20100101 Firefox/31.0'),
(787, 0, 'init_notification_menu', 1408376845, 'notification/notification_controller/init_notification_menu', '', '::1', 'Mozilla/5.0 (Windows NT 6.2; WOW64; rv:31.0) Gecko/20100101 Firefox/31.0'),
(788, 0, '%5Bobject%20Object%5D', 1408376845, 'project/project_controller/%5Bobject%20Object%5D', '', '::1', 'Mozilla/5.0 (Windows NT 6.2; WOW64; rv:31.0) Gecko/20100101 Firefox/31.0'),
(789, 0, 'user_unseen_notification_count', 1408376846, 'notification/notified_users_controller/user_unseen_notification_count', '', '::1', 'Mozilla/5.0 (Windows NT 6.2; WOW64; rv:31.0) Gecko/20100101 Firefox/31.0'),
(790, 0, 'add_project_view', 1408377061, 'project/project_controller/add_project_view', '', '::1', 'Mozilla/5.0 (Windows NT 6.2; WOW64; rv:31.0) Gecko/20100101 Firefox/31.0'),
(791, 0, 'index', 1408377063, 'project/fileupload', '', '::1', 'Mozilla/5.0 (Windows NT 6.2; WOW64; rv:31.0) Gecko/20100101 Firefox/31.0'),
(792, 0, 'init_notification_menu', 1408377063, 'notification/notification_controller/init_notification_menu', '', '::1', 'Mozilla/5.0 (Windows NT 6.2; WOW64; rv:31.0) Gecko/20100101 Firefox/31.0'),
(793, 0, 'user_unseen_notification_count', 1408377065, 'notification/notified_users_controller/user_unseen_notification_count', '', '::1', 'Mozilla/5.0 (Windows NT 6.2; WOW64; rv:31.0) Gecko/20100101 Firefox/31.0'),
(794, 0, 'index', 1408377093, 'project/fileupload', '{"project_name":"daD","project_vendor":"dsfs","project_start_date":"2014-08-18","project_end_date":"","project_description":"gsdgdh","_wysihtml5_mode":"1","project_logo":"project_default_logo.png"}', '::1', 'Mozilla/5.0 (Windows NT 6.2; WOW64; rv:31.0) Gecko/20100101 Firefox/31.0'),
(795, 0, 'index', 1408377188, 'project/fileupload', '', '::1', 'Mozilla/5.0 (Windows NT 6.2; WOW64; rv:31.0) Gecko/20100101 Firefox/31.0'),
(796, 0, 'user_unseen_notification_count', 1408377188, 'notification/notified_users_controller/user_unseen_notification_count', '', '::1', 'Mozilla/5.0 (Windows NT 6.2; WOW64; rv:31.0) Gecko/20100101 Firefox/31.0'),
(797, 0, 'add_project_view', 1408377190, 'project/project_controller/add_project_view', '', '::1', 'Mozilla/5.0 (Windows NT 6.2; WOW64; rv:31.0) Gecko/20100101 Firefox/31.0'),
(798, 0, 'index', 1408377192, 'project/fileupload', '', '::1', 'Mozilla/5.0 (Windows NT 6.2; WOW64; rv:31.0) Gecko/20100101 Firefox/31.0'),
(799, 0, 'init_notification_menu', 1408377192, 'notification/notification_controller/init_notification_menu', '', '::1', 'Mozilla/5.0 (Windows NT 6.2; WOW64; rv:31.0) Gecko/20100101 Firefox/31.0'),
(800, 0, 'user_unseen_notification_count', 1408377193, 'notification/notified_users_controller/user_unseen_notification_count', '', '::1', 'Mozilla/5.0 (Windows NT 6.2; WOW64; rv:31.0) Gecko/20100101 Firefox/31.0'),
(801, 0, 'index', 1408377195, 'project/fileupload', '{"project_name":"daD","project_vendor":"dsfs","project_start_date":"2014-08-18","project_end_date":"","project_description":"gsdgdh","_wysihtml5_mode":"1","project_logo":"project_default_logo.png"}', '::1', 'Mozilla/5.0 (Windows NT 6.2; WOW64; rv:31.0) Gecko/20100101 Firefox/31.0'),
(802, 0, 'index', 1408377220, 'project/fileupload', '{"project_name":"daD","project_vendor":"dsfs","project_start_date":"2014-08-18","project_end_date":"","project_description":"gsdgdh","_wysihtml5_mode":"1","project_logo":"project_default_logo.png"}', '::1', 'Mozilla/5.0 (Windows NT 6.2; WOW64; rv:31.0) Gecko/20100101 Firefox/31.0'),
(803, 0, 'index', 1408377227, 'project/fileupload', '', '::1', 'Mozilla/5.0 (Windows NT 6.2; WOW64; rv:31.0) Gecko/20100101 Firefox/31.0'),
(804, 0, 'user_unseen_notification_count', 1408377227, 'notification/notified_users_controller/user_unseen_notification_count', '', '::1', 'Mozilla/5.0 (Windows NT 6.2; WOW64; rv:31.0) Gecko/20100101 Firefox/31.0'),
(805, 0, 'index', 1408377310, 'project/fileupload', '{"project_name":"daD","project_vendor":"dsfs","project_start_date":"2014-08-18","project_end_date":"","project_description":"gsdgdh","_wysihtml5_mode":"1","project_logo":"project_default_logo.png"}', '::1', 'Mozilla/5.0 (Windows NT 6.2; WOW64; rv:31.0) Gecko/20100101 Firefox/31.0'),
(806, 0, 'index', 1408377370, 'project/fileupload', '', '::1', 'Mozilla/5.0 (Windows NT 6.2; WOW64; rv:31.0) Gecko/20100101 Firefox/31.0'),
(807, 0, 'user_unseen_notification_count', 1408377370, 'notification/notified_users_controller/user_unseen_notification_count', '', '::1', 'Mozilla/5.0 (Windows NT 6.2; WOW64; rv:31.0) Gecko/20100101 Firefox/31.0'),
(808, 0, 'add_project_view', 1408377372, 'project/project_controller/add_project_view', '', '::1', 'Mozilla/5.0 (Windows NT 6.2; WOW64; rv:31.0) Gecko/20100101 Firefox/31.0'),
(809, 0, 'init_notification_menu', 1408377374, 'notification/notification_controller/init_notification_menu', '', '::1', 'Mozilla/5.0 (Windows NT 6.2; WOW64; rv:31.0) Gecko/20100101 Firefox/31.0'),
(810, 0, 'index', 1408377374, 'project/fileupload', '', '::1', 'Mozilla/5.0 (Windows NT 6.2; WOW64; rv:31.0) Gecko/20100101 Firefox/31.0'),
(811, 0, 'user_unseen_notification_count', 1408377375, 'notification/notified_users_controller/user_unseen_notification_count', '', '::1', 'Mozilla/5.0 (Windows NT 6.2; WOW64; rv:31.0) Gecko/20100101 Firefox/31.0'),
(812, 0, 'add_project_view', 1408377401, 'project/project_controller/add_project_view', '', '::1', 'Mozilla/5.0 (Windows NT 6.2; WOW64; rv:31.0) Gecko/20100101 Firefox/31.0'),
(813, 0, 'index', 1408377404, 'project/fileupload', '', '::1', 'Mozilla/5.0 (Windows NT 6.2; WOW64; rv:31.0) Gecko/20100101 Firefox/31.0'),
(814, 0, 'init_notification_menu', 1408377404, 'notification/notification_controller/init_notification_menu', '', '::1', 'Mozilla/5.0 (Windows NT 6.2; WOW64; rv:31.0) Gecko/20100101 Firefox/31.0'),
(815, 0, 'user_unseen_notification_count', 1408377405, 'notification/notified_users_controller/user_unseen_notification_count', '', '::1', 'Mozilla/5.0 (Windows NT 6.2; WOW64; rv:31.0) Gecko/20100101 Firefox/31.0'),
(816, 0, 'index', 1408377415, 'project/fileupload', '{"project_name":"","project_vendor":"","project_start_date":"2014-08-18","project_end_date":"","project_description":"","_wysihtml5_mode":"1","project_logo":"project_default_logo.png"}', '::1', 'Mozilla/5.0 (Windows NT 6.2; WOW64; rv:31.0) Gecko/20100101 Firefox/31.0'),
(817, 0, 'index', 1408377501, 'project/fileupload', '{"project_name":"","project_vendor":"","project_start_date":"2014-08-18","project_end_date":"","project_description":"","_wysihtml5_mode":"1","project_logo":"project_default_logo.png"}', '::1', 'Mozilla/5.0 (Windows NT 6.2; WOW64; rv:31.0) Gecko/20100101 Firefox/31.0'),
(818, 0, 'index', 1408377545, 'project/fileupload', '', '::1', 'Mozilla/5.0 (Windows NT 6.2; WOW64; rv:31.0) Gecko/20100101 Firefox/31.0'),
(819, 0, 'user_unseen_notification_count', 1408377545, 'notification/notified_users_controller/user_unseen_notification_count', '', '::1', 'Mozilla/5.0 (Windows NT 6.2; WOW64; rv:31.0) Gecko/20100101 Firefox/31.0'),
(820, 0, 'add_project_view', 1408377572, 'project/project_controller/add_project_view', '', '::1', 'Mozilla/5.0 (Windows NT 6.2; WOW64; rv:31.0) Gecko/20100101 Firefox/31.0'),
(821, 0, 'index', 1408377574, 'project/fileupload', '', '::1', 'Mozilla/5.0 (Windows NT 6.2; WOW64; rv:31.0) Gecko/20100101 Firefox/31.0'),
(822, 0, 'init_notification_menu', 1408377574, 'notification/notification_controller/init_notification_menu', '', '::1', 'Mozilla/5.0 (Windows NT 6.2; WOW64; rv:31.0) Gecko/20100101 Firefox/31.0'),
(823, 0, 'index', 1408377575, 'project/fileupload', '{"project_name":"","project_vendor":"","project_start_date":"2014-08-18","project_end_date":"","project_description":"","_wysihtml5_mode":"1","project_logo":"project_default_logo.png"}', '::1', 'Mozilla/5.0 (Windows NT 6.2; WOW64; rv:31.0) Gecko/20100101 Firefox/31.0'),
(824, 0, 'index', 1408377678, 'project/fileupload', '{"project_name":"","project_vendor":"","project_start_date":"2014-08-18","project_end_date":"","project_description":"","_wysihtml5_mode":"1","project_logo":"project_default_logo.png"}', '::1', 'Mozilla/5.0 (Windows NT 6.2; WOW64; rv:31.0) Gecko/20100101 Firefox/31.0'),
(825, 0, 'index', 1408377683, 'project/fileupload', '', '::1', 'Mozilla/5.0 (Windows NT 6.2; WOW64; rv:31.0) Gecko/20100101 Firefox/31.0'),
(826, 0, 'user_unseen_notification_count', 1408377683, 'notification/notified_users_controller/user_unseen_notification_count', '', '::1', 'Mozilla/5.0 (Windows NT 6.2; WOW64; rv:31.0) Gecko/20100101 Firefox/31.0'),
(827, 0, 'add_project_view', 1408377685, 'project/project_controller/add_project_view', '', '::1', 'Mozilla/5.0 (Windows NT 6.2; WOW64; rv:31.0) Gecko/20100101 Firefox/31.0'),
(828, 0, 'index', 1408377688, 'project/fileupload', '', '::1', 'Mozilla/5.0 (Windows NT 6.2; WOW64; rv:31.0) Gecko/20100101 Firefox/31.0'),
(829, 0, 'init_notification_menu', 1408377688, 'notification/notification_controller/init_notification_menu', '', '::1', 'Mozilla/5.0 (Windows NT 6.2; WOW64; rv:31.0) Gecko/20100101 Firefox/31.0'),
(830, 0, 'user_unseen_notification_count', 1408377689, 'notification/notified_users_controller/user_unseen_notification_count', '', '::1', 'Mozilla/5.0 (Windows NT 6.2; WOW64; rv:31.0) Gecko/20100101 Firefox/31.0'),
(831, 0, 'index', 1408377695, 'project/fileupload', '{"project_name":"","project_vendor":"","project_start_date":"2014-08-18","project_end_date":"","project_description":"","_wysihtml5_mode":"1","project_logo":"project_default_logo.png"}', '::1', 'Mozilla/5.0 (Windows NT 6.2; WOW64; rv:31.0) Gecko/20100101 Firefox/31.0'),
(832, 0, 'index', 1408378009, 'project/fileupload', '', '::1', 'Mozilla/5.0 (Windows NT 6.2; WOW64; rv:31.0) Gecko/20100101 Firefox/31.0'),
(833, 0, 'user_unseen_notification_count', 1408378009, 'notification/notified_users_controller/user_unseen_notification_count', '', '::1', 'Mozilla/5.0 (Windows NT 6.2; WOW64; rv:31.0) Gecko/20100101 Firefox/31.0'),
(834, 0, 'add_project_view', 1408378010, 'project/project_controller/add_project_view', '', '::1', 'Mozilla/5.0 (Windows NT 6.2; WOW64; rv:31.0) Gecko/20100101 Firefox/31.0'),
(835, 0, 'index', 1408378014, 'project/fileupload', '', '::1', 'Mozilla/5.0 (Windows NT 6.2; WOW64; rv:31.0) Gecko/20100101 Firefox/31.0'),
(836, 0, 'init_notification_menu', 1408378014, 'notification/notification_controller/init_notification_menu', '', '::1', 'Mozilla/5.0 (Windows NT 6.2; WOW64; rv:31.0) Gecko/20100101 Firefox/31.0'),
(837, 0, 'user_unseen_notification_count', 1408378015, 'notification/notified_users_controller/user_unseen_notification_count', '', '::1', 'Mozilla/5.0 (Windows NT 6.2; WOW64; rv:31.0) Gecko/20100101 Firefox/31.0'),
(838, 0, 'index', 1408378021, 'project/fileupload', '{"project_name":"","project_vendor":"","project_start_date":"2014-08-18","project_end_date":"","project_description":"","_wysihtml5_mode":"1","project_logo":"project_default_logo.png"}', '::1', 'Mozilla/5.0 (Windows NT 6.2; WOW64; rv:31.0) Gecko/20100101 Firefox/31.0'),
(839, 0, 'index', 1408378027, 'project/fileupload', '', '::1', 'Mozilla/5.0 (Windows NT 6.2; WOW64; rv:31.0) Gecko/20100101 Firefox/31.0'),
(840, 0, 'user_unseen_notification_count', 1408378028, 'notification/notified_users_controller/user_unseen_notification_count', '', '::1', 'Mozilla/5.0 (Windows NT 6.2; WOW64; rv:31.0) Gecko/20100101 Firefox/31.0'),
(841, 0, 'index', 1408378037, 'project/fileupload', '{"project_name":"","project_vendor":"","project_start_date":"2014-08-18","project_end_date":"","project_description":"","_wysihtml5_mode":"1","project_logo":"project_default_logo.png"}', '::1', 'Mozilla/5.0 (Windows NT 6.2; WOW64; rv:31.0) Gecko/20100101 Firefox/31.0'),
(842, 0, 'index', 1408381829, 'project/fileupload', '', '::1', 'Mozilla/5.0 (Windows NT 6.2; WOW64; rv:31.0) Gecko/20100101 Firefox/31.0'),
(843, 0, 'user_unseen_notification_count', 1408381829, 'notification/notified_users_controller/user_unseen_notification_count', '', '::1', 'Mozilla/5.0 (Windows NT 6.2; WOW64; rv:31.0) Gecko/20100101 Firefox/31.0'),
(844, 0, 'add_project_view', 1408381832, 'project/project_controller/add_project_view', '', '::1', 'Mozilla/5.0 (Windows NT 6.2; WOW64; rv:31.0) Gecko/20100101 Firefox/31.0'),
(845, 0, 'index', 1408381837, 'project/fileupload', '', '::1', 'Mozilla/5.0 (Windows NT 6.2; WOW64; rv:31.0) Gecko/20100101 Firefox/31.0'),
(846, 0, 'init_notification_menu', 1408381837, 'notification/notification_controller/init_notification_menu', '', '::1', 'Mozilla/5.0 (Windows NT 6.2; WOW64; rv:31.0) Gecko/20100101 Firefox/31.0'),
(847, 0, 'user_unseen_notification_count', 1408381838, 'notification/notified_users_controller/user_unseen_notification_count', '', '::1', 'Mozilla/5.0 (Windows NT 6.2; WOW64; rv:31.0) Gecko/20100101 Firefox/31.0'),
(848, 0, 'view_profile', 1408381840, 'employee/employee_profile_controller/view_profile', '', '::1', 'Mozilla/5.0 (Windows NT 6.2; WOW64; rv:31.0) Gecko/20100101 Firefox/31.0'),
(849, 0, 'init_notification_menu', 1408381842, 'notification/notification_controller/init_notification_menu', '', '::1', 'Mozilla/5.0 (Windows NT 6.2; WOW64; rv:31.0) Gecko/20100101 Firefox/31.0'),
(850, 0, '%5Bobject%20Object%5D', 1408381842, 'employee/employee_profile_controller/%5Bobject%20Object%5D', '', '::1', 'Mozilla/5.0 (Windows NT 6.2; WOW64; rv:31.0) Gecko/20100101 Firefox/31.0'),
(851, 0, 'user_unseen_notification_count', 1408381843, 'notification/notified_users_controller/user_unseen_notification_count', '', '::1', 'Mozilla/5.0 (Windows NT 6.2; WOW64; rv:31.0) Gecko/20100101 Firefox/31.0'),
(852, 0, 'view_profile', 1408381941, 'employee/employee_profile_controller/view_profile', '', '::1', 'Mozilla/5.0 (Windows NT 6.2; WOW64; rv:31.0) Gecko/20100101 Firefox/31.0'),
(853, 0, 'init_notification_menu', 1408381951, 'notification/notification_controller/init_notification_menu', '', '::1', 'Mozilla/5.0 (Windows NT 6.2; WOW64; rv:31.0) Gecko/20100101 Firefox/31.0'),
(854, 0, '%5Bobject%20Object%5D', 1408381951, 'employee/employee_profile_controller/%5Bobject%20Object%5D', '', '::1', 'Mozilla/5.0 (Windows NT 6.2; WOW64; rv:31.0) Gecko/20100101 Firefox/31.0'),
(855, 0, 'view_profile', 1408381952, 'employee/employee_profile_controller/view_profile', '', '::1', 'Mozilla/5.0 (Windows NT 6.2; WOW64; rv:31.0) Gecko/20100101 Firefox/31.0'),
(856, 0, 'init_notification_menu', 1408381956, 'notification/notification_controller/init_notification_menu', '', '::1', 'Mozilla/5.0 (Windows NT 6.2; WOW64; rv:31.0) Gecko/20100101 Firefox/31.0'),
(857, 0, '%5Bobject%20Object%5D', 1408381956, 'employee/employee_profile_controller/%5Bobject%20Object%5D', '', '::1', 'Mozilla/5.0 (Windows NT 6.2; WOW64; rv:31.0) Gecko/20100101 Firefox/31.0'),
(858, 0, 'user_unseen_notification_count', 1408381957, 'notification/notified_users_controller/user_unseen_notification_count', '', '::1', 'Mozilla/5.0 (Windows NT 6.2; WOW64; rv:31.0) Gecko/20100101 Firefox/31.0'),
(859, 0, 'view_profile', 1408381978, 'employee/employee_profile_controller/view_profile', '', '::1', 'Mozilla/5.0 (Windows NT 6.2; WOW64; rv:31.0) Gecko/20100101 Firefox/31.0'),
(860, 0, 'init_notification_menu', 1408381981, 'notification/notification_controller/init_notification_menu', '', '::1', 'Mozilla/5.0 (Windows NT 6.2; WOW64; rv:31.0) Gecko/20100101 Firefox/31.0'),
(861, 0, '%5Bobject%20Object%5D', 1408381981, 'employee/employee_profile_controller/%5Bobject%20Object%5D', '', '::1', 'Mozilla/5.0 (Windows NT 6.2; WOW64; rv:31.0) Gecko/20100101 Firefox/31.0'),
(862, 0, 'user_unseen_notification_count', 1408381983, 'notification/notified_users_controller/user_unseen_notification_count', '', '::1', 'Mozilla/5.0 (Windows NT 6.2; WOW64; rv:31.0) Gecko/20100101 Firefox/31.0'),
(863, 0, 'view_profile', 1408381996, 'employee/employee_profile_controller/view_profile', '', '::1', 'Mozilla/5.0 (Windows NT 6.2; WOW64; rv:31.0) Gecko/20100101 Firefox/31.0'),
(864, 0, '%5Bobject%20Object%5D', 1408382003, 'employee/employee_profile_controller/%5Bobject%20Object%5D', '', '::1', 'Mozilla/5.0 (Windows NT 6.2; WOW64; rv:31.0) Gecko/20100101 Firefox/31.0'),
(865, 0, 'init_notification_menu', 1408382003, 'notification/notification_controller/init_notification_menu', '', '::1', 'Mozilla/5.0 (Windows NT 6.2; WOW64; rv:31.0) Gecko/20100101 Firefox/31.0'),
(866, 0, 'user_unseen_notification_count', 1408382004, 'notification/notified_users_controller/user_unseen_notification_count', '', '::1', 'Mozilla/5.0 (Windows NT 6.2; WOW64; rv:31.0) Gecko/20100101 Firefox/31.0'),
(867, 0, 'mark_notification_as_seen', 1408382030, 'notification/notified_users_controller/mark_notification_as_seen/19', '', '::1', 'Mozilla/5.0 (Windows NT 6.2; WOW64; rv:31.0) Gecko/20100101 Firefox/31.0'),
(868, 0, 'user_unseen_notification_count', 1408382030, 'notification/notified_users_controller/user_unseen_notification_count', '', '::1', 'Mozilla/5.0 (Windows NT 6.2; WOW64; rv:31.0) Gecko/20100101 Firefox/31.0'),
(869, 0, 'init_notification_menu', 1408382030, 'notification/notification_controller/init_notification_menu', '', '::1', 'Mozilla/5.0 (Windows NT 6.2; WOW64; rv:31.0) Gecko/20100101 Firefox/31.0'),
(870, 0, 'user_unseen_notification_count', 1408382031, 'notification/notified_users_controller/user_unseen_notification_count', '', '::1', 'Mozilla/5.0 (Windows NT 6.2; WOW64; rv:31.0) Gecko/20100101 Firefox/31.0'),
(871, 0, 'manage_skill_matrix', 1408382067, 'skill_matrix/skill_matrix_controller/manage_skill_matrix', '', '::1', 'Mozilla/5.0 (Windows NT 6.2; WOW64; rv:31.0) Gecko/20100101 Firefox/31.0'),
(872, 0, 'init_notification_menu', 1408382069, 'notification/notification_controller/init_notification_menu', '', '::1', 'Mozilla/5.0 (Windows NT 6.2; WOW64; rv:31.0) Gecko/20100101 Firefox/31.0'),
(873, 0, '%5Bobject%20Object%5D', 1408382069, 'skill_matrix/skill_matrix_controller/%5Bobject%20Object%5D', '', '::1', 'Mozilla/5.0 (Windows NT 6.2; WOW64; rv:31.0) Gecko/20100101 Firefox/31.0'),
(874, 0, 'user_unseen_notification_count', 1408382070, 'notification/notified_users_controller/user_unseen_notification_count', '', '::1', 'Mozilla/5.0 (Windows NT 6.2; WOW64; rv:31.0) Gecko/20100101 Firefox/31.0'),
(875, 0, 'add_new_skill_matrix', 1408382076, 'skill_matrix/skill_matrix_controller/add_new_skill_matrix', '{"skill_cat_code":"1","skill_code":"1","link":""}', '::1', 'Mozilla/5.0 (Windows NT 6.2; WOW64; rv:31.0) Gecko/20100101 Firefox/31.0'),
(876, 0, 'manage_skill_matrix', 1408382078, 'skill_matrix/skill_matrix_controller/manage_skill_matrix', '', '::1', 'Mozilla/5.0 (Windows NT 6.2; WOW64; rv:31.0) Gecko/20100101 Firefox/31.0'),
(877, 0, '%5Bobject%20Object%5D', 1408382084, 'skill_matrix/skill_matrix_controller/%5Bobject%20Object%5D', '', '::1', 'Mozilla/5.0 (Windows NT 6.2; WOW64; rv:31.0) Gecko/20100101 Firefox/31.0'),
(878, 0, 'init_notification_menu', 1408382084, 'notification/notification_controller/init_notification_menu', '', '::1', 'Mozilla/5.0 (Windows NT 6.2; WOW64; rv:31.0) Gecko/20100101 Firefox/31.0'),
(879, 0, 'user_unseen_notification_count', 1408382086, 'notification/notified_users_controller/user_unseen_notification_count', '', '::1', 'Mozilla/5.0 (Windows NT 6.2; WOW64; rv:31.0) Gecko/20100101 Firefox/31.0'),
(880, 0, 'index', 1408594398, 'login/login_controller', '', '::1', 'Mozilla/5.0 (Windows NT 6.2; WOW64; rv:31.0) Gecko/20100101 Firefox/31.0'),
(881, 0, 'authenticate_user', 1408594414, 'login/login_controller/authenticate_user', '{"login_username":"gayathma3","login_password":"abc123@#"}', '::1', 'Mozilla/5.0 (Windows NT 6.2; WOW64; rv:31.0) Gecko/20100101 Firefox/31.0'),
(882, 0, 'index', 1408594416, 'login/login_controller', '', '::1', 'Mozilla/5.0 (Windows NT 6.2; WOW64; rv:31.0) Gecko/20100101 Firefox/31.0'),
(883, 0, 'index', 1408594417, 'dashboard/dashboard_controller', '', '::1', 'Mozilla/5.0 (Windows NT 6.2; WOW64; rv:31.0) Gecko/20100101 Firefox/31.0'),
(884, 0, '%5Bobject%20Object%5D', 1408594420, 'dashboard/dashboard_controller/%5Bobject%20Object%5D', '', '::1', 'Mozilla/5.0 (Windows NT 6.2; WOW64; rv:31.0) Gecko/20100101 Firefox/31.0'),
(885, 0, 'init_notification_menu', 1408594420, 'notification/notification_controller/init_notification_menu', '', '::1', 'Mozilla/5.0 (Windows NT 6.2; WOW64; rv:31.0) Gecko/20100101 Firefox/31.0'),
(886, 0, 'user_unseen_notification_count', 1408594422, 'notification/notified_users_controller/user_unseen_notification_count', '', '::1', 'Mozilla/5.0 (Windows NT 6.2; WOW64; rv:31.0) Gecko/20100101 Firefox/31.0'),
(887, 0, 'manage_companies', 1408594423, 'company/company_controller/manage_companies', '', '::1', 'Mozilla/5.0 (Windows NT 6.2; WOW64; rv:31.0) Gecko/20100101 Firefox/31.0'),
(888, 0, 'init_notification_menu', 1408594424, 'notification/notification_controller/init_notification_menu', '', '::1', 'Mozilla/5.0 (Windows NT 6.2; WOW64; rv:31.0) Gecko/20100101 Firefox/31.0'),
(889, 0, '%5Bobject%20Object%5D', 1408594425, 'company/company_controller/%5Bobject%20Object%5D', '', '::1', 'Mozilla/5.0 (Windows NT 6.2; WOW64; rv:31.0) Gecko/20100101 Firefox/31.0'),
(890, 0, 'user_unseen_notification_count', 1408594426, 'notification/notified_users_controller/user_unseen_notification_count', '', '::1', 'Mozilla/5.0 (Windows NT 6.2; WOW64; rv:31.0) Gecko/20100101 Firefox/31.0'),
(891, 0, 'manage_employees', 1408594433, 'employee/employee_controller/manage_employees', '', '::1', 'Mozilla/5.0 (Windows NT 6.2; WOW64; rv:31.0) Gecko/20100101 Firefox/31.0'),
(892, 0, '%5Bobject%20Object%5D', 1408594435, 'employee/employee_controller/%5Bobject%20Object%5D', '', '::1', 'Mozilla/5.0 (Windows NT 6.2; WOW64; rv:31.0) Gecko/20100101 Firefox/31.0'),
(893, 0, 'init_notification_menu', 1408594435, 'notification/notification_controller/init_notification_menu', '', '::1', 'Mozilla/5.0 (Windows NT 6.2; WOW64; rv:31.0) Gecko/20100101 Firefox/31.0'),
(894, 0, 'user_unseen_notification_count', 1408594437, 'notification/notified_users_controller/user_unseen_notification_count', '', '::1', 'Mozilla/5.0 (Windows NT 6.2; WOW64; rv:31.0) Gecko/20100101 Firefox/31.0'),
(895, 0, 'manage_projects', 1408594461, 'project/project_controller/manage_projects', '', '::1', 'Mozilla/5.0 (Windows NT 6.2; WOW64; rv:31.0) Gecko/20100101 Firefox/31.0'),
(896, 0, 'init_notification_menu', 1408594463, 'notification/notification_controller/init_notification_menu', '', '::1', 'Mozilla/5.0 (Windows NT 6.2; WOW64; rv:31.0) Gecko/20100101 Firefox/31.0'),
(897, 0, '%5Bobject%20Object%5D', 1408594463, 'project/project_controller/%5Bobject%20Object%5D', '', '::1', 'Mozilla/5.0 (Windows NT 6.2; WOW64; rv:31.0) Gecko/20100101 Firefox/31.0'),
(898, 0, 'user_unseen_notification_count', 1408594464, 'notification/notified_users_controller/user_unseen_notification_count', '', '::1', 'Mozilla/5.0 (Windows NT 6.2; WOW64; rv:31.0) Gecko/20100101 Firefox/31.0'),
(899, 0, 'add_project_view', 1408594465, 'project/project_controller/add_project_view', '', '::1', 'Mozilla/5.0 (Windows NT 6.2; WOW64; rv:31.0) Gecko/20100101 Firefox/31.0'),
(900, 0, 'index', 1408594467, 'project/fileupload', '', '::1', 'Mozilla/5.0 (Windows NT 6.2; WOW64; rv:31.0) Gecko/20100101 Firefox/31.0'),
(901, 0, 'init_notification_menu', 1408594467, 'notification/notification_controller/init_notification_menu', '', '::1', 'Mozilla/5.0 (Windows NT 6.2; WOW64; rv:31.0) Gecko/20100101 Firefox/31.0'),
(902, 0, 'user_unseen_notification_count', 1408594468, 'notification/notified_users_controller/user_unseen_notification_count', '', '::1', 'Mozilla/5.0 (Windows NT 6.2; WOW64; rv:31.0) Gecko/20100101 Firefox/31.0'),
(903, 0, 'index', 1408594480, 'project/fileupload', '', '::1', 'Mozilla/5.0 (Windows NT 6.2; WOW64; rv:31.0) Gecko/20100101 Firefox/31.0'),
(904, 0, 'index', 1408594480, 'project/fileupload', '', '::1', 'Mozilla/5.0 (Windows NT 6.2; WOW64; rv:31.0) Gecko/20100101 Firefox/31.0'),
(905, 0, 'add_temp_project_stuff', 1408594481, 'project/project_controller/add_temp_project_stuff', '{"file_name":["531709_575297122495442_553449702_n.jpg","The-Twilight-Saga_breaking-Dawn-Part-2-2012-Movie-Photos-wide-Wallpapers-13-728x455.jpg"]}', '::1', 'Mozilla/5.0 (Windows NT 6.2; WOW64; rv:31.0) Gecko/20100101 Firefox/31.0'),
(906, 0, 'view_profile', 1408594635, 'employee/employee_profile_controller/view_profile', '', '::1', 'Mozilla/5.0 (Windows NT 6.2; WOW64; rv:31.0) Gecko/20100101 Firefox/31.0'),
(907, 0, '%5Bobject%20Object%5D', 1408594637, 'employee/employee_profile_controller/%5Bobject%20Object%5D', '', '::1', 'Mozilla/5.0 (Windows NT 6.2; WOW64; rv:31.0) Gecko/20100101 Firefox/31.0'),
(908, 0, 'init_notification_menu', 1408594637, 'notification/notification_controller/init_notification_menu', '', '::1', 'Mozilla/5.0 (Windows NT 6.2; WOW64; rv:31.0) Gecko/20100101 Firefox/31.0'),
(909, 0, 'user_unseen_notification_count', 1408594638, 'notification/notified_users_controller/user_unseen_notification_count', '', '::1', 'Mozilla/5.0 (Windows NT 6.2; WOW64; rv:31.0) Gecko/20100101 Firefox/31.0'),
(910, 0, 'upload_employee_cover_pic', 1408594665, 'employee/employee_profile_controller/upload_employee_cover_pic', '', '::1', 'Mozilla/5.0 (Windows NT 6.2; WOW64; rv:31.0) Gecko/20100101 Firefox/31.0'),
(911, 0, 'update_employee_cover_image', 1408594666, 'employee/employee_profile_controller/update_employee_cover_image', '{"employee_cover_image":"cover_pic1408594665-despicable-me-4fdb838e20288.jpg","employee_code":"2"}', '::1', 'Mozilla/5.0 (Windows NT 6.2; WOW64; rv:31.0) Gecko/20100101 Firefox/31.0'),
(912, 0, 'upload_employee_cover_pic', 1408594675, 'employee/employee_profile_controller/upload_employee_cover_pic', '', '::1', 'Mozilla/5.0 (Windows NT 6.2; WOW64; rv:31.0) Gecko/20100101 Firefox/31.0'),
(913, 0, 'update_employee_cover_image', 1408594676, 'employee/employee_profile_controller/update_employee_cover_image', '{"employee_cover_image":"cover_pic1408594675-Edward Bella Twilight Breaking Dawn HD Wallpaper.jpg","employee_code":"2"}', '::1', 'Mozilla/5.0 (Windows NT 6.2; WOW64; rv:31.0) Gecko/20100101 Firefox/31.0'),
(914, 0, 'view_profile', 1408594686, 'employee/employee_profile_controller/view_profile', '', '::1', 'Mozilla/5.0 (Windows NT 6.2; WOW64; rv:31.0) Gecko/20100101 Firefox/31.0'),
(915, 0, 'init_notification_menu', 1408594689, 'notification/notification_controller/init_notification_menu', '', '::1', 'Mozilla/5.0 (Windows NT 6.2; WOW64; rv:31.0) Gecko/20100101 Firefox/31.0'),
(916, 0, '%5Bobject%20Object%5D', 1408594689, 'employee/employee_profile_controller/%5Bobject%20Object%5D', '', '::1', 'Mozilla/5.0 (Windows NT 6.2; WOW64; rv:31.0) Gecko/20100101 Firefox/31.0'),
(917, 0, 'user_unseen_notification_count', 1408594690, 'notification/notified_users_controller/user_unseen_notification_count', '', '::1', 'Mozilla/5.0 (Windows NT 6.2; WOW64; rv:31.0) Gecko/20100101 Firefox/31.0'),
(918, 0, 'mark_notification_as_seen', 1408594827, 'notification/notified_users_controller/mark_notification_as_seen/19', '', '::1', 'Mozilla/5.0 (Windows NT 6.2; WOW64; rv:31.0) Gecko/20100101 Firefox/31.0'),
(919, 0, 'user_unseen_notification_count', 1408594827, 'notification/notified_users_controller/user_unseen_notification_count', '', '::1', 'Mozilla/5.0 (Windows NT 6.2; WOW64; rv:31.0) Gecko/20100101 Firefox/31.0'),
(920, 0, 'init_notification_menu', 1408594827, 'notification/notification_controller/init_notification_menu', '', '::1', 'Mozilla/5.0 (Windows NT 6.2; WOW64; rv:31.0) Gecko/20100101 Firefox/31.0'),
(921, 0, 'user_unseen_notification_count', 1408594828, 'notification/notified_users_controller/user_unseen_notification_count', '', '::1', 'Mozilla/5.0 (Windows NT 6.2; WOW64; rv:31.0) Gecko/20100101 Firefox/31.0'),
(922, 0, 'mark_notification_as_seen', 1408594830, 'notification/notified_users_controller/mark_notification_as_seen/13', '', '::1', 'Mozilla/5.0 (Windows NT 6.2; WOW64; rv:31.0) Gecko/20100101 Firefox/31.0'),
(923, 0, 'init_notification_menu', 1408594830, 'notification/notification_controller/init_notification_menu', '', '::1', 'Mozilla/5.0 (Windows NT 6.2; WOW64; rv:31.0) Gecko/20100101 Firefox/31.0'),
(924, 0, 'user_unseen_notification_count', 1408594830, 'notification/notified_users_controller/user_unseen_notification_count', '', '::1', 'Mozilla/5.0 (Windows NT 6.2; WOW64; rv:31.0) Gecko/20100101 Firefox/31.0'),
(925, 0, 'user_unseen_notification_count', 1408594831, 'notification/notified_users_controller/user_unseen_notification_count', '', '::1', 'Mozilla/5.0 (Windows NT 6.2; WOW64; rv:31.0) Gecko/20100101 Firefox/31.0'),
(926, 0, 'manage_notification', 1408594849, 'notification/notification_controller/manage_notification', '', '::1', 'Mozilla/5.0 (Windows NT 6.2; WOW64; rv:31.0) Gecko/20100101 Firefox/31.0'),
(927, 0, 'init_notification_menu', 1408594851, 'notification/notification_controller/init_notification_menu', '', '::1', 'Mozilla/5.0 (Windows NT 6.2; WOW64; rv:31.0) Gecko/20100101 Firefox/31.0'),
(928, 0, '%5Bobject%20Object%5D', 1408594851, 'notification/notification_controller/%5Bobject%20Object%5D', '', '::1', 'Mozilla/5.0 (Windows NT 6.2; WOW64; rv:31.0) Gecko/20100101 Firefox/31.0'),
(929, 0, 'user_unseen_notification_count', 1408594852, 'notification/notified_users_controller/user_unseen_notification_count', '', '::1', 'Mozilla/5.0 (Windows NT 6.2; WOW64; rv:31.0) Gecko/20100101 Firefox/31.0'),
(930, 0, 'view_profile', 1408594876, 'employee/employee_profile_controller/view_profile', '', '::1', 'Mozilla/5.0 (Windows NT 6.2; WOW64; rv:31.0) Gecko/20100101 Firefox/31.0'),
(931, 0, '%5Bobject%20Object%5D', 1408594878, 'employee/employee_profile_controller/%5Bobject%20Object%5D', '', '::1', 'Mozilla/5.0 (Windows NT 6.2; WOW64; rv:31.0) Gecko/20100101 Firefox/31.0'),
(932, 0, 'init_notification_menu', 1408594878, 'notification/notification_controller/init_notification_menu', '', '::1', 'Mozilla/5.0 (Windows NT 6.2; WOW64; rv:31.0) Gecko/20100101 Firefox/31.0'),
(933, 0, 'user_unseen_notification_count', 1408594880, 'notification/notified_users_controller/user_unseen_notification_count', '', '::1', 'Mozilla/5.0 (Windows NT 6.2; WOW64; rv:31.0) Gecko/20100101 Firefox/31.0'),
(934, 0, 'index', 1408596562, 'login/login_controller', '', '::1', 'Mozilla/5.0 (Windows NT 6.2; WOW64; rv:31.0) Gecko/20100101 Firefox/31.0'),
(935, 0, 'index', 1408596564, 'dashboard/dashboard_controller', '', '::1', 'Mozilla/5.0 (Windows NT 6.2; WOW64; rv:31.0) Gecko/20100101 Firefox/31.0'),
(936, 0, '%5Bobject%20Object%5D', 1408596566, 'dashboard/dashboard_controller/%5Bobject%20Object%5D', '', '::1', 'Mozilla/5.0 (Windows NT 6.2; WOW64; rv:31.0) Gecko/20100101 Firefox/31.0'),
(937, 0, 'init_notification_menu', 1408596566, 'notification/notification_controller/init_notification_menu', '', '::1', 'Mozilla/5.0 (Windows NT 6.2; WOW64; rv:31.0) Gecko/20100101 Firefox/31.0'),
(938, 0, 'user_unseen_notification_count', 1408596567, 'notification/notified_users_controller/user_unseen_notification_count', '', '::1', 'Mozilla/5.0 (Windows NT 6.2; WOW64; rv:31.0) Gecko/20100101 Firefox/31.0'),
(939, 0, 'manage_employee_screenshot', 1408596578, 'employee_screenshots/employee_screenshots_controller/manage_employee_screenshot', '', '::1', 'Mozilla/5.0 (Windows NT 6.2; WOW64; rv:31.0) Gecko/20100101 Firefox/31.0'),
(940, 0, '%5Bobject%20Object%5D', 1408596580, 'employee_screenshots/employee_screenshots_controller/%5Bobject%20Object%5D', '', '::1', 'Mozilla/5.0 (Windows NT 6.2; WOW64; rv:31.0) Gecko/20100101 Firefox/31.0'),
(941, 0, 'init_notification_menu', 1408596580, 'notification/notification_controller/init_notification_menu', '', '::1', 'Mozilla/5.0 (Windows NT 6.2; WOW64; rv:31.0) Gecko/20100101 Firefox/31.0'),
(942, 0, 'user_unseen_notification_count', 1408596581, 'notification/notified_users_controller/user_unseen_notification_count', '', '::1', 'Mozilla/5.0 (Windows NT 6.2; WOW64; rv:31.0) Gecko/20100101 Firefox/31.0'),
(943, 0, 'manage_employee_screenshot', 1408596718, 'employee_screenshots/employee_screenshots_controller/manage_employee_screenshot', '', '::1', 'Mozilla/5.0 (Windows NT 6.2; WOW64; rv:31.0) Gecko/20100101 Firefox/31.0'),
(944, 0, 'init_notification_menu', 1408596721, 'notification/notification_controller/init_notification_menu', '', '::1', 'Mozilla/5.0 (Windows NT 6.2; WOW64; rv:31.0) Gecko/20100101 Firefox/31.0'),
(945, 0, '%5Bobject%20Object%5D', 1408596721, 'employee_screenshots/employee_screenshots_controller/%5Bobject%20Object%5D', '', '::1', 'Mozilla/5.0 (Windows NT 6.2; WOW64; rv:31.0) Gecko/20100101 Firefox/31.0'),
(946, 0, 'user_unseen_notification_count', 1408596722, 'notification/notified_users_controller/user_unseen_notification_count', '', '::1', 'Mozilla/5.0 (Windows NT 6.2; WOW64; rv:31.0) Gecko/20100101 Firefox/31.0'),
(947, 0, 'manage_wages_category', 1408596724, 'wages_category/wages_category_controller/manage_wages_category', '', '::1', 'Mozilla/5.0 (Windows NT 6.2; WOW64; rv:31.0) Gecko/20100101 Firefox/31.0'),
(948, 0, 'init_notification_menu', 1408596726, 'notification/notification_controller/init_notification_menu', '', '::1', 'Mozilla/5.0 (Windows NT 6.2; WOW64; rv:31.0) Gecko/20100101 Firefox/31.0'),
(949, 0, '%5Bobject%20Object%5D', 1408596726, 'wages_category/wages_category_controller/%5Bobject%20Object%5D', '', '::1', 'Mozilla/5.0 (Windows NT 6.2; WOW64; rv:31.0) Gecko/20100101 Firefox/31.0'),
(950, 0, 'user_unseen_notification_count', 1408596727, 'notification/notified_users_controller/user_unseen_notification_count', '', '::1', 'Mozilla/5.0 (Windows NT 6.2; WOW64; rv:31.0) Gecko/20100101 Firefox/31.0'),
(951, 0, 'manage_wages_category', 1408596761, 'wages_category/wages_category_controller/manage_wages_category', '', '::1', 'Mozilla/5.0 (Windows NT 6.2; WOW64; rv:31.0) Gecko/20100101 Firefox/31.0'),
(952, 0, 'init_notification_menu', 1408596763, 'notification/notification_controller/init_notification_menu', '', '::1', 'Mozilla/5.0 (Windows NT 6.2; WOW64; rv:31.0) Gecko/20100101 Firefox/31.0'),
(953, 0, '%5Bobject%20Object%5D', 1408596763, 'wages_category/wages_category_controller/%5Bobject%20Object%5D', '', '::1', 'Mozilla/5.0 (Windows NT 6.2; WOW64; rv:31.0) Gecko/20100101 Firefox/31.0'),
(954, 0, 'user_unseen_notification_count', 1408596764, 'notification/notified_users_controller/user_unseen_notification_count', '', '::1', 'Mozilla/5.0 (Windows NT 6.2; WOW64; rv:31.0) Gecko/20100101 Firefox/31.0'),
(955, 0, 'manage_employees', 1408597133, 'employee/employee_controller/manage_employees', '', '::1', 'Mozilla/5.0 (Windows NT 6.2; WOW64; rv:31.0) Gecko/20100101 Firefox/31.0'),
(956, 0, '%5Bobject%20Object%5D', 1408597135, 'employee/employee_controller/%5Bobject%20Object%5D', '', '::1', 'Mozilla/5.0 (Windows NT 6.2; WOW64; rv:31.0) Gecko/20100101 Firefox/31.0'),
(957, 0, 'init_notification_menu', 1408597135, 'notification/notification_controller/init_notification_menu', '', '::1', 'Mozilla/5.0 (Windows NT 6.2; WOW64; rv:31.0) Gecko/20100101 Firefox/31.0'),
(958, 0, 'user_unseen_notification_count', 1408597136, 'notification/notified_users_controller/user_unseen_notification_count', '', '::1', 'Mozilla/5.0 (Windows NT 6.2; WOW64; rv:31.0) Gecko/20100101 Firefox/31.0'),
(959, 0, 'manage_projects', 1408597172, 'project/project_controller/manage_projects', '', '::1', 'Mozilla/5.0 (Windows NT 6.2; WOW64; rv:31.0) Gecko/20100101 Firefox/31.0'),
(960, 0, 'init_notification_menu', 1408597174, 'notification/notification_controller/init_notification_menu', '', '::1', 'Mozilla/5.0 (Windows NT 6.2; WOW64; rv:31.0) Gecko/20100101 Firefox/31.0'),
(961, 0, '%5Bobject%20Object%5D', 1408597174, 'project/project_controller/%5Bobject%20Object%5D', '', '::1', 'Mozilla/5.0 (Windows NT 6.2; WOW64; rv:31.0) Gecko/20100101 Firefox/31.0'),
(962, 0, 'user_unseen_notification_count', 1408597175, 'notification/notified_users_controller/user_unseen_notification_count', '', '::1', 'Mozilla/5.0 (Windows NT 6.2; WOW64; rv:31.0) Gecko/20100101 Firefox/31.0'),
(963, 0, 'add_project_view', 1408597176, 'project/project_controller/add_project_view', '', '::1', 'Mozilla/5.0 (Windows NT 6.2; WOW64; rv:31.0) Gecko/20100101 Firefox/31.0'),
(964, 0, 'init_notification_menu', 1408597177, 'notification/notification_controller/init_notification_menu', '', '::1', 'Mozilla/5.0 (Windows NT 6.2; WOW64; rv:31.0) Gecko/20100101 Firefox/31.0'),
(965, 0, 'index', 1408597177, 'project/fileupload', '', '::1', 'Mozilla/5.0 (Windows NT 6.2; WOW64; rv:31.0) Gecko/20100101 Firefox/31.0'),
(966, 0, 'user_unseen_notification_count', 1408597178, 'notification/notified_users_controller/user_unseen_notification_count', '', '::1', 'Mozilla/5.0 (Windows NT 6.2; WOW64; rv:31.0) Gecko/20100101 Firefox/31.0'),
(967, 0, 'view_profile', 1408597929, 'employee/employee_profile_controller/view_profile', '', '::1', 'Mozilla/5.0 (Windows NT 6.2; WOW64; rv:31.0) Gecko/20100101 Firefox/31.0'),
(968, 0, 'init_notification_menu', 1408597931, 'notification/notification_controller/init_notification_menu', '', '::1', 'Mozilla/5.0 (Windows NT 6.2; WOW64; rv:31.0) Gecko/20100101 Firefox/31.0'),
(969, 0, '%5Bobject%20Object%5D', 1408597931, 'employee/employee_profile_controller/%5Bobject%20Object%5D', '', '::1', 'Mozilla/5.0 (Windows NT 6.2; WOW64; rv:31.0) Gecko/20100101 Firefox/31.0'),
(970, 0, 'user_unseen_notification_count', 1408597933, 'notification/notified_users_controller/user_unseen_notification_count', '', '::1', 'Mozilla/5.0 (Windows NT 6.2; WOW64; rv:31.0) Gecko/20100101 Firefox/31.0'),
(971, 0, 'upload_employee_cover_pic', 1408597939, 'employee/employee_profile_controller/upload_employee_cover_pic', '', '::1', 'Mozilla/5.0 (Windows NT 6.2; WOW64; rv:31.0) Gecko/20100101 Firefox/31.0'),
(972, 0, 'update_employee_cover_image', 1408597940, 'employee/employee_profile_controller/update_employee_cover_image', '{"employee_cover_image":"cover_pic1408597939-despicable-me-4fdb838e20288.jpg","employee_code":"2"}', '::1', 'Mozilla/5.0 (Windows NT 6.2; WOW64; rv:31.0) Gecko/20100101 Firefox/31.0'),
(973, 0, 'view_profile', 1408597941, 'employee/employee_profile_controller/view_profile', '', '::1', 'Mozilla/5.0 (Windows NT 6.2; WOW64; rv:31.0) Gecko/20100101 Firefox/31.0'),
(974, 0, 'init_notification_menu', 1408597943, 'notification/notification_controller/init_notification_menu', '', '::1', 'Mozilla/5.0 (Windows NT 6.2; WOW64; rv:31.0) Gecko/20100101 Firefox/31.0'),
(975, 0, '%5Bobject%20Object%5D', 1408597943, 'employee/employee_profile_controller/%5Bobject%20Object%5D', '', '::1', 'Mozilla/5.0 (Windows NT 6.2; WOW64; rv:31.0) Gecko/20100101 Firefox/31.0'),
(976, 0, 'user_unseen_notification_count', 1408597944, 'notification/notified_users_controller/user_unseen_notification_count', '', '::1', 'Mozilla/5.0 (Windows NT 6.2; WOW64; rv:31.0) Gecko/20100101 Firefox/31.0'),
(977, 0, 'view_profile', 1408598050, 'employee/employee_profile_controller/view_profile', '', '::1', 'Mozilla/5.0 (Windows NT 6.2; WOW64; rv:31.0) Gecko/20100101 Firefox/31.0'),
(978, 0, '%5Bobject%20Object%5D', 1408598053, 'employee/employee_profile_controller/%5Bobject%20Object%5D', '', '::1', 'Mozilla/5.0 (Windows NT 6.2; WOW64; rv:31.0) Gecko/20100101 Firefox/31.0'),
(979, 0, 'init_notification_menu', 1408598053, 'notification/notification_controller/init_notification_menu', '', '::1', 'Mozilla/5.0 (Windows NT 6.2; WOW64; rv:31.0) Gecko/20100101 Firefox/31.0'),
(980, 0, 'user_unseen_notification_count', 1408598054, 'notification/notified_users_controller/user_unseen_notification_count', '', '::1', 'Mozilla/5.0 (Windows NT 6.2; WOW64; rv:31.0) Gecko/20100101 Firefox/31.0'),
(981, 0, 'logout', 1408598057, 'login/login_controller/logout', '', '::1', 'Mozilla/5.0 (Windows NT 6.2; WOW64; rv:31.0) Gecko/20100101 Firefox/31.0'),
(982, 0, 'index', 1408598059, 'login/login_controller', '', '::1', 'Mozilla/5.0 (Windows NT 6.2; WOW64; rv:31.0) Gecko/20100101 Firefox/31.0'),
(983, 0, 'authenticate_user', 1408598068, 'login/login_controller/authenticate_user', '{"login_username":"gayathma3","login_password":"abc123@#"}', '::1', 'Mozilla/5.0 (Windows NT 6.2; WOW64; rv:31.0) Gecko/20100101 Firefox/31.0'),
(984, 0, 'index', 1408598071, 'login/login_controller', '', '::1', 'Mozilla/5.0 (Windows NT 6.2; WOW64; rv:31.0) Gecko/20100101 Firefox/31.0'),
(985, 0, 'index', 1408598072, 'dashboard/dashboard_controller', '', '::1', 'Mozilla/5.0 (Windows NT 6.2; WOW64; rv:31.0) Gecko/20100101 Firefox/31.0'),
(986, 0, '%5Bobject%20Object%5D', 1408598074, 'dashboard/dashboard_controller/%5Bobject%20Object%5D', '', '::1', 'Mozilla/5.0 (Windows NT 6.2; WOW64; rv:31.0) Gecko/20100101 Firefox/31.0'),
(987, 0, 'init_notification_menu', 1408598074, 'notification/notification_controller/init_notification_menu', '', '::1', 'Mozilla/5.0 (Windows NT 6.2; WOW64; rv:31.0) Gecko/20100101 Firefox/31.0'),
(988, 0, 'user_unseen_notification_count', 1408598075, 'notification/notified_users_controller/user_unseen_notification_count', '', '::1', 'Mozilla/5.0 (Windows NT 6.2; WOW64; rv:31.0) Gecko/20100101 Firefox/31.0'),
(989, 0, 'view_profile', 1408598076, 'employee/employee_profile_controller/view_profile', '', '::1', 'Mozilla/5.0 (Windows NT 6.2; WOW64; rv:31.0) Gecko/20100101 Firefox/31.0'),
(990, 0, 'init_notification_menu', 1408598078, 'notification/notification_controller/init_notification_menu', '', '::1', 'Mozilla/5.0 (Windows NT 6.2; WOW64; rv:31.0) Gecko/20100101 Firefox/31.0'),
(991, 0, '%5Bobject%20Object%5D', 1408598078, 'employee/employee_profile_controller/%5Bobject%20Object%5D', '', '::1', 'Mozilla/5.0 (Windows NT 6.2; WOW64; rv:31.0) Gecko/20100101 Firefox/31.0'),
(992, 0, 'user_unseen_notification_count', 1408598079, 'notification/notified_users_controller/user_unseen_notification_count', '', '::1', 'Mozilla/5.0 (Windows NT 6.2; WOW64; rv:31.0) Gecko/20100101 Firefox/31.0');
INSERT INTO `statistics` (`statistic_id`, `user_id`, `action`, `date`, `uri`, `post_data`, `ip`, `browser`) VALUES
(993, 0, 'upload_employee_cover_pic', 1408598087, 'employee/employee_profile_controller/upload_employee_cover_pic', '', '::1', 'Mozilla/5.0 (Windows NT 6.2; WOW64; rv:31.0) Gecko/20100101 Firefox/31.0'),
(994, 0, 'update_employee_cover_image', 1408598088, 'employee/employee_profile_controller/update_employee_cover_image', '{"employee_cover_image":"cover_pic1408598087-Edward Bella Twilight Breaking Dawn HD Wallpaper.jpg","employee_code":"2"}', '::1', 'Mozilla/5.0 (Windows NT 6.2; WOW64; rv:31.0) Gecko/20100101 Firefox/31.0'),
(995, 0, 'view_profile', 1408598091, 'employee/employee_profile_controller/view_profile', '', '::1', 'Mozilla/5.0 (Windows NT 6.2; WOW64; rv:31.0) Gecko/20100101 Firefox/31.0'),
(996, 0, '%5Bobject%20Object%5D', 1408598093, 'employee/employee_profile_controller/%5Bobject%20Object%5D', '', '::1', 'Mozilla/5.0 (Windows NT 6.2; WOW64; rv:31.0) Gecko/20100101 Firefox/31.0'),
(997, 0, 'init_notification_menu', 1408598093, 'notification/notification_controller/init_notification_menu', '', '::1', 'Mozilla/5.0 (Windows NT 6.2; WOW64; rv:31.0) Gecko/20100101 Firefox/31.0'),
(998, 0, 'user_unseen_notification_count', 1408598094, 'notification/notified_users_controller/user_unseen_notification_count', '', '::1', 'Mozilla/5.0 (Windows NT 6.2; WOW64; rv:31.0) Gecko/20100101 Firefox/31.0'),
(999, 0, 'view_profile', 1408598514, 'employee/employee_profile_controller/view_profile', '', '::1', 'Mozilla/5.0 (Windows NT 6.2; WOW64; rv:31.0) Gecko/20100101 Firefox/31.0'),
(1000, 0, 'init_notification_menu', 1408598516, 'notification/notification_controller/init_notification_menu', '', '::1', 'Mozilla/5.0 (Windows NT 6.2; WOW64; rv:31.0) Gecko/20100101 Firefox/31.0'),
(1001, 0, '%5Bobject%20Object%5D', 1408598516, 'employee/employee_profile_controller/%5Bobject%20Object%5D', '', '::1', 'Mozilla/5.0 (Windows NT 6.2; WOW64; rv:31.0) Gecko/20100101 Firefox/31.0'),
(1002, 0, 'user_unseen_notification_count', 1408598517, 'notification/notified_users_controller/user_unseen_notification_count', '', '::1', 'Mozilla/5.0 (Windows NT 6.2; WOW64; rv:31.0) Gecko/20100101 Firefox/31.0'),
(1003, 0, 'view_profile', 1408598744, 'employee/employee_profile_controller/view_profile', '', '::1', 'Mozilla/5.0 (Windows NT 6.2; WOW64; rv:31.0) Gecko/20100101 Firefox/31.0'),
(1004, 0, '%5Bobject%20Object%5D', 1408598748, 'employee/employee_profile_controller/%5Bobject%20Object%5D', '', '::1', 'Mozilla/5.0 (Windows NT 6.2; WOW64; rv:31.0) Gecko/20100101 Firefox/31.0'),
(1005, 0, 'init_notification_menu', 1408598748, 'notification/notification_controller/init_notification_menu', '', '::1', 'Mozilla/5.0 (Windows NT 6.2; WOW64; rv:31.0) Gecko/20100101 Firefox/31.0'),
(1006, 0, 'user_unseen_notification_count', 1408598749, 'notification/notified_users_controller/user_unseen_notification_count', '', '::1', 'Mozilla/5.0 (Windows NT 6.2; WOW64; rv:31.0) Gecko/20100101 Firefox/31.0'),
(1007, 0, 'view_profile', 1408598773, 'employee/employee_profile_controller/view_profile', '', '::1', 'Mozilla/5.0 (Windows NT 6.2; WOW64; rv:31.0) Gecko/20100101 Firefox/31.0'),
(1008, 0, '%5Bobject%20Object%5D', 1408598776, 'employee/employee_profile_controller/%5Bobject%20Object%5D', '', '::1', 'Mozilla/5.0 (Windows NT 6.2; WOW64; rv:31.0) Gecko/20100101 Firefox/31.0'),
(1009, 0, 'init_notification_menu', 1408598776, 'notification/notification_controller/init_notification_menu', '', '::1', 'Mozilla/5.0 (Windows NT 6.2; WOW64; rv:31.0) Gecko/20100101 Firefox/31.0'),
(1010, 0, 'user_unseen_notification_count', 1408598777, 'notification/notified_users_controller/user_unseen_notification_count', '', '::1', 'Mozilla/5.0 (Windows NT 6.2; WOW64; rv:31.0) Gecko/20100101 Firefox/31.0'),
(1011, 0, 'upload_employee_avatar', 1408598782, 'employee/employee_profile_controller/upload_employee_avatar', '', '::1', 'Mozilla/5.0 (Windows NT 6.2; WOW64; rv:31.0) Gecko/20100101 Firefox/31.0'),
(1012, 0, 'update_employee_avatar', 1408598783, 'employee/employee_profile_controller/update_employee_avatar', '{"employee_avatar":"employee_avatar1408598782-p.jpg","employee_code":"2"}', '::1', 'Mozilla/5.0 (Windows NT 6.2; WOW64; rv:31.0) Gecko/20100101 Firefox/31.0'),
(1013, 0, 'view_profile', 1408598785, 'employee/employee_profile_controller/view_profile', '', '::1', 'Mozilla/5.0 (Windows NT 6.2; WOW64; rv:31.0) Gecko/20100101 Firefox/31.0'),
(1014, 0, '%5Bobject%20Object%5D', 1408598789, 'employee/employee_profile_controller/%5Bobject%20Object%5D', '', '::1', 'Mozilla/5.0 (Windows NT 6.2; WOW64; rv:31.0) Gecko/20100101 Firefox/31.0'),
(1015, 0, 'init_notification_menu', 1408598789, 'notification/notification_controller/init_notification_menu', '', '::1', 'Mozilla/5.0 (Windows NT 6.2; WOW64; rv:31.0) Gecko/20100101 Firefox/31.0'),
(1016, 0, 'user_unseen_notification_count', 1408598790, 'notification/notified_users_controller/user_unseen_notification_count', '', '::1', 'Mozilla/5.0 (Windows NT 6.2; WOW64; rv:31.0) Gecko/20100101 Firefox/31.0'),
(1017, 0, 'manage_employees', 1408598830, 'employee/employee_controller/manage_employees', '', '::1', 'Mozilla/5.0 (Windows NT 6.2; WOW64; rv:31.0) Gecko/20100101 Firefox/31.0'),
(1018, 0, '%5Bobject%20Object%5D', 1408598832, 'employee/employee_controller/%5Bobject%20Object%5D', '', '::1', 'Mozilla/5.0 (Windows NT 6.2; WOW64; rv:31.0) Gecko/20100101 Firefox/31.0'),
(1019, 0, 'init_notification_menu', 1408598832, 'notification/notification_controller/init_notification_menu', '', '::1', 'Mozilla/5.0 (Windows NT 6.2; WOW64; rv:31.0) Gecko/20100101 Firefox/31.0'),
(1020, 0, 'user_unseen_notification_count', 1408598833, 'notification/notified_users_controller/user_unseen_notification_count', '', '::1', 'Mozilla/5.0 (Windows NT 6.2; WOW64; rv:31.0) Gecko/20100101 Firefox/31.0'),
(1021, 0, 'view_profile', 1408598835, 'employee/employee_profile_controller/view_profile', '', '::1', 'Mozilla/5.0 (Windows NT 6.2; WOW64; rv:31.0) Gecko/20100101 Firefox/31.0'),
(1022, 0, '%5Bobject%20Object%5D', 1408598837, 'employee/employee_profile_controller/%5Bobject%20Object%5D', '', '::1', 'Mozilla/5.0 (Windows NT 6.2; WOW64; rv:31.0) Gecko/20100101 Firefox/31.0'),
(1023, 0, 'init_notification_menu', 1408598837, 'notification/notification_controller/init_notification_menu', '', '::1', 'Mozilla/5.0 (Windows NT 6.2; WOW64; rv:31.0) Gecko/20100101 Firefox/31.0'),
(1024, 0, 'user_unseen_notification_count', 1408598838, 'notification/notified_users_controller/user_unseen_notification_count', '', '::1', 'Mozilla/5.0 (Windows NT 6.2; WOW64; rv:31.0) Gecko/20100101 Firefox/31.0'),
(1025, 0, 'manage_employees', 1408598840, 'employee/employee_controller/manage_employees', '', '::1', 'Mozilla/5.0 (Windows NT 6.2; WOW64; rv:31.0) Gecko/20100101 Firefox/31.0'),
(1026, 0, '%5Bobject%20Object%5D', 1408598842, 'employee/employee_controller/%5Bobject%20Object%5D', '', '::1', 'Mozilla/5.0 (Windows NT 6.2; WOW64; rv:31.0) Gecko/20100101 Firefox/31.0'),
(1027, 0, 'init_notification_menu', 1408598842, 'notification/notification_controller/init_notification_menu', '', '::1', 'Mozilla/5.0 (Windows NT 6.2; WOW64; rv:31.0) Gecko/20100101 Firefox/31.0'),
(1028, 0, 'user_unseen_notification_count', 1408598844, 'notification/notified_users_controller/user_unseen_notification_count', '', '::1', 'Mozilla/5.0 (Windows NT 6.2; WOW64; rv:31.0) Gecko/20100101 Firefox/31.0'),
(1029, 0, 'view_profile', 1408598856, 'employee/employee_profile_controller/view_profile', '', '::1', 'Mozilla/5.0 (Windows NT 6.2; WOW64; rv:31.0) Gecko/20100101 Firefox/31.0'),
(1030, 0, '%5Bobject%20Object%5D', 1408598859, 'employee/employee_profile_controller/%5Bobject%20Object%5D', '', '::1', 'Mozilla/5.0 (Windows NT 6.2; WOW64; rv:31.0) Gecko/20100101 Firefox/31.0'),
(1031, 0, 'init_notification_menu', 1408598859, 'notification/notification_controller/init_notification_menu', '', '::1', 'Mozilla/5.0 (Windows NT 6.2; WOW64; rv:31.0) Gecko/20100101 Firefox/31.0'),
(1032, 0, 'user_unseen_notification_count', 1408598860, 'notification/notified_users_controller/user_unseen_notification_count', '', '::1', 'Mozilla/5.0 (Windows NT 6.2; WOW64; rv:31.0) Gecko/20100101 Firefox/31.0'),
(1033, 0, 'index-2.html', 1408598897, 'employee/employee_profile_controller/index-2.html', '', '::1', 'Mozilla/5.0 (Windows NT 6.2; WOW64; rv:31.0) Gecko/20100101 Firefox/31.0'),
(1034, 0, 'user_unseen_notification_count', 1408598901, 'notification/notified_users_controller/user_unseen_notification_count', '', '::1', 'Mozilla/5.0 (Windows NT 6.2; WOW64; rv:31.0) Gecko/20100101 Firefox/31.0'),
(1035, 0, 'index', 1408598902, 'dashboard/dashboard_controller', '', '::1', 'Mozilla/5.0 (Windows NT 6.2; WOW64; rv:31.0) Gecko/20100101 Firefox/31.0'),
(1036, 0, 'init_notification_menu', 1408598904, 'notification/notification_controller/init_notification_menu', '', '::1', 'Mozilla/5.0 (Windows NT 6.2; WOW64; rv:31.0) Gecko/20100101 Firefox/31.0'),
(1037, 0, '%5Bobject%20Object%5D', 1408598904, 'dashboard/dashboard_controller/%5Bobject%20Object%5D', '', '::1', 'Mozilla/5.0 (Windows NT 6.2; WOW64; rv:31.0) Gecko/20100101 Firefox/31.0'),
(1038, 0, 'user_unseen_notification_count', 1408598905, 'notification/notified_users_controller/user_unseen_notification_count', '', '::1', 'Mozilla/5.0 (Windows NT 6.2; WOW64; rv:31.0) Gecko/20100101 Firefox/31.0'),
(1039, 0, 'view_profile', 1408598924, 'employee/employee_profile_controller/view_profile', '', '::1', 'Mozilla/5.0 (Windows NT 6.2; WOW64; rv:31.0) Gecko/20100101 Firefox/31.0'),
(1040, 0, 'init_notification_menu', 1408598929, 'notification/notification_controller/init_notification_menu', '', '::1', 'Mozilla/5.0 (Windows NT 6.2; WOW64; rv:31.0) Gecko/20100101 Firefox/31.0'),
(1041, 0, '%5Bobject%20Object%5D', 1408598929, 'employee/employee_profile_controller/%5Bobject%20Object%5D', '', '::1', 'Mozilla/5.0 (Windows NT 6.2; WOW64; rv:31.0) Gecko/20100101 Firefox/31.0'),
(1042, 0, 'user_unseen_notification_count', 1408598930, 'notification/notified_users_controller/user_unseen_notification_count', '', '::1', 'Mozilla/5.0 (Windows NT 6.2; WOW64; rv:31.0) Gecko/20100101 Firefox/31.0'),
(1043, 0, 'view_profile', 1408599397, 'employee/employee_profile_controller/view_profile', '', '::1', 'Mozilla/5.0 (Windows NT 6.2; WOW64; rv:31.0) Gecko/20100101 Firefox/31.0'),
(1044, 0, 'init_notification_menu', 1408599401, 'notification/notification_controller/init_notification_menu', '', '::1', 'Mozilla/5.0 (Windows NT 6.2; WOW64; rv:31.0) Gecko/20100101 Firefox/31.0'),
(1045, 0, '%5Bobject%20Object%5D', 1408599401, 'employee/employee_profile_controller/%5Bobject%20Object%5D', '', '::1', 'Mozilla/5.0 (Windows NT 6.2; WOW64; rv:31.0) Gecko/20100101 Firefox/31.0'),
(1046, 0, 'user_unseen_notification_count', 1408599402, 'notification/notified_users_controller/user_unseen_notification_count', '', '::1', 'Mozilla/5.0 (Windows NT 6.2; WOW64; rv:31.0) Gecko/20100101 Firefox/31.0'),
(1047, 0, 'index', 1408599466, 'dashboard/dashboard_controller', '', '::1', 'Mozilla/5.0 (Windows NT 6.2; WOW64; rv:31.0) Gecko/20100101 Firefox/31.0'),
(1048, 0, '%5Bobject%20Object%5D', 1408599469, 'dashboard/dashboard_controller/%5Bobject%20Object%5D', '', '::1', 'Mozilla/5.0 (Windows NT 6.2; WOW64; rv:31.0) Gecko/20100101 Firefox/31.0'),
(1049, 0, 'init_notification_menu', 1408599469, 'notification/notification_controller/init_notification_menu', '', '::1', 'Mozilla/5.0 (Windows NT 6.2; WOW64; rv:31.0) Gecko/20100101 Firefox/31.0'),
(1050, 0, 'user_unseen_notification_count', 1408599470, 'notification/notified_users_controller/user_unseen_notification_count', '', '::1', 'Mozilla/5.0 (Windows NT 6.2; WOW64; rv:31.0) Gecko/20100101 Firefox/31.0'),
(1051, 0, 'view_profile', 1408599634, 'employee/employee_profile_controller/view_profile', '', '::1', 'Mozilla/5.0 (Windows NT 6.2; WOW64; rv:31.0) Gecko/20100101 Firefox/31.0'),
(1052, 0, 'init_notification_menu', 1408599637, 'notification/notification_controller/init_notification_menu', '', '::1', 'Mozilla/5.0 (Windows NT 6.2; WOW64; rv:31.0) Gecko/20100101 Firefox/31.0'),
(1053, 0, '%5Bobject%20Object%5D', 1408599637, 'employee/employee_profile_controller/%5Bobject%20Object%5D', '', '::1', 'Mozilla/5.0 (Windows NT 6.2; WOW64; rv:31.0) Gecko/20100101 Firefox/31.0'),
(1054, 0, 'user_unseen_notification_count', 1408599638, 'notification/notified_users_controller/user_unseen_notification_count', '', '::1', 'Mozilla/5.0 (Windows NT 6.2; WOW64; rv:31.0) Gecko/20100101 Firefox/31.0'),
(1055, 0, 'view_profile', 1408599670, 'employee/employee_profile_controller/view_profile', '', '::1', 'Mozilla/5.0 (Windows NT 6.2; WOW64; rv:31.0) Gecko/20100101 Firefox/31.0'),
(1056, 0, '%5Bobject%20Object%5D', 1408599673, 'employee/employee_profile_controller/%5Bobject%20Object%5D', '', '::1', 'Mozilla/5.0 (Windows NT 6.2; WOW64; rv:31.0) Gecko/20100101 Firefox/31.0'),
(1057, 0, 'init_notification_menu', 1408599673, 'notification/notification_controller/init_notification_menu', '', '::1', 'Mozilla/5.0 (Windows NT 6.2; WOW64; rv:31.0) Gecko/20100101 Firefox/31.0'),
(1058, 0, 'user_unseen_notification_count', 1408599674, 'notification/notified_users_controller/user_unseen_notification_count', '', '::1', 'Mozilla/5.0 (Windows NT 6.2; WOW64; rv:31.0) Gecko/20100101 Firefox/31.0'),
(1059, 0, 'view_profile', 1408599685, 'employee/employee_profile_controller/view_profile', '', '::1', 'Mozilla/5.0 (Windows NT 6.2; WOW64; rv:31.0) Gecko/20100101 Firefox/31.0'),
(1060, 0, 'init_notification_menu', 1408599687, 'notification/notification_controller/init_notification_menu', '', '::1', 'Mozilla/5.0 (Windows NT 6.2; WOW64; rv:31.0) Gecko/20100101 Firefox/31.0'),
(1061, 0, '%5Bobject%20Object%5D', 1408599687, 'employee/employee_profile_controller/%5Bobject%20Object%5D', '', '::1', 'Mozilla/5.0 (Windows NT 6.2; WOW64; rv:31.0) Gecko/20100101 Firefox/31.0'),
(1062, 0, 'user_unseen_notification_count', 1408599689, 'notification/notified_users_controller/user_unseen_notification_count', '', '::1', 'Mozilla/5.0 (Windows NT 6.2; WOW64; rv:31.0) Gecko/20100101 Firefox/31.0'),
(1063, 0, 'view_profile', 1408599734, 'employee/employee_profile_controller/view_profile', '', '::1', 'Mozilla/5.0 (Windows NT 6.2; WOW64; rv:31.0) Gecko/20100101 Firefox/31.0'),
(1064, 0, 'init_notification_menu', 1408599737, 'notification/notification_controller/init_notification_menu', '', '::1', 'Mozilla/5.0 (Windows NT 6.2; WOW64; rv:31.0) Gecko/20100101 Firefox/31.0'),
(1065, 0, '%5Bobject%20Object%5D', 1408599737, 'employee/employee_profile_controller/%5Bobject%20Object%5D', '', '::1', 'Mozilla/5.0 (Windows NT 6.2; WOW64; rv:31.0) Gecko/20100101 Firefox/31.0'),
(1066, 0, 'user_unseen_notification_count', 1408599738, 'notification/notified_users_controller/user_unseen_notification_count', '', '::1', 'Mozilla/5.0 (Windows NT 6.2; WOW64; rv:31.0) Gecko/20100101 Firefox/31.0'),
(1067, 0, 'view_profile', 1408599765, 'employee/employee_profile_controller/view_profile', '', '::1', 'Mozilla/5.0 (Windows NT 6.2; WOW64; rv:31.0) Gecko/20100101 Firefox/31.0'),
(1068, 0, 'init_notification_menu', 1408599768, 'notification/notification_controller/init_notification_menu', '', '::1', 'Mozilla/5.0 (Windows NT 6.2; WOW64; rv:31.0) Gecko/20100101 Firefox/31.0'),
(1069, 0, '%5Bobject%20Object%5D', 1408599768, 'employee/employee_profile_controller/%5Bobject%20Object%5D', '', '::1', 'Mozilla/5.0 (Windows NT 6.2; WOW64; rv:31.0) Gecko/20100101 Firefox/31.0'),
(1070, 0, 'user_unseen_notification_count', 1408599769, 'notification/notified_users_controller/user_unseen_notification_count', '', '::1', 'Mozilla/5.0 (Windows NT 6.2; WOW64; rv:31.0) Gecko/20100101 Firefox/31.0'),
(1071, 0, 'logout', 1408599777, 'login/login_controller/logout', '', '::1', 'Mozilla/5.0 (Windows NT 6.2; WOW64; rv:31.0) Gecko/20100101 Firefox/31.0'),
(1072, 0, 'index', 1408599779, 'login/login_controller', '', '::1', 'Mozilla/5.0 (Windows NT 6.2; WOW64; rv:31.0) Gecko/20100101 Firefox/31.0'),
(1073, 0, 'authenticate_user', 1408599798, 'login/login_controller/authenticate_user', '{"login_username":"gayathma3","login_password":"abc123@#"}', '::1', 'Mozilla/5.0 (Windows NT 6.2; WOW64; rv:31.0) Gecko/20100101 Firefox/31.0'),
(1074, 0, 'index', 1408599800, 'login/login_controller', '', '::1', 'Mozilla/5.0 (Windows NT 6.2; WOW64; rv:31.0) Gecko/20100101 Firefox/31.0'),
(1075, 0, 'index', 1408599801, 'dashboard/dashboard_controller', '', '::1', 'Mozilla/5.0 (Windows NT 6.2; WOW64; rv:31.0) Gecko/20100101 Firefox/31.0'),
(1076, 0, '%5Bobject%20Object%5D', 1408599805, 'dashboard/dashboard_controller/%5Bobject%20Object%5D', '', '::1', 'Mozilla/5.0 (Windows NT 6.2; WOW64; rv:31.0) Gecko/20100101 Firefox/31.0'),
(1077, 0, 'init_notification_menu', 1408599805, 'notification/notification_controller/init_notification_menu', '', '::1', 'Mozilla/5.0 (Windows NT 6.2; WOW64; rv:31.0) Gecko/20100101 Firefox/31.0'),
(1078, 0, 'user_unseen_notification_count', 1408599806, 'notification/notified_users_controller/user_unseen_notification_count', '', '::1', 'Mozilla/5.0 (Windows NT 6.2; WOW64; rv:31.0) Gecko/20100101 Firefox/31.0'),
(1079, 0, 'index', 1408599837, 'dashboard/dashboard_controller', '', '::1', 'Mozilla/5.0 (Windows NT 6.2; WOW64; rv:31.0) Gecko/20100101 Firefox/31.0'),
(1080, 0, '%5Bobject%20Object%5D', 1408599840, 'dashboard/dashboard_controller/%5Bobject%20Object%5D', '', '::1', 'Mozilla/5.0 (Windows NT 6.2; WOW64; rv:31.0) Gecko/20100101 Firefox/31.0'),
(1081, 0, 'init_notification_menu', 1408599840, 'notification/notification_controller/init_notification_menu', '', '::1', 'Mozilla/5.0 (Windows NT 6.2; WOW64; rv:31.0) Gecko/20100101 Firefox/31.0'),
(1082, 0, 'user_unseen_notification_count', 1408599841, 'notification/notified_users_controller/user_unseen_notification_count', '', '::1', 'Mozilla/5.0 (Windows NT 6.2; WOW64; rv:31.0) Gecko/20100101 Firefox/31.0'),
(1083, 0, 'view_profile', 1408599842, 'employee/employee_profile_controller/view_profile', '', '::1', 'Mozilla/5.0 (Windows NT 6.2; WOW64; rv:31.0) Gecko/20100101 Firefox/31.0'),
(1084, 0, 'init_notification_menu', 1408599844, 'notification/notification_controller/init_notification_menu', '', '::1', 'Mozilla/5.0 (Windows NT 6.2; WOW64; rv:31.0) Gecko/20100101 Firefox/31.0'),
(1085, 0, '%5Bobject%20Object%5D', 1408599844, 'employee/employee_profile_controller/%5Bobject%20Object%5D', '', '::1', 'Mozilla/5.0 (Windows NT 6.2; WOW64; rv:31.0) Gecko/20100101 Firefox/31.0'),
(1086, 0, 'user_unseen_notification_count', 1408599845, 'notification/notified_users_controller/user_unseen_notification_count', '', '::1', 'Mozilla/5.0 (Windows NT 6.2; WOW64; rv:31.0) Gecko/20100101 Firefox/31.0'),
(1087, 0, 'view_profile', 1408599915, 'employee/employee_profile_controller/view_profile', '', '::1', 'Mozilla/5.0 (Windows NT 6.2; WOW64; rv:31.0) Gecko/20100101 Firefox/31.0'),
(1088, 0, 'init_notification_menu', 1408599918, 'notification/notification_controller/init_notification_menu', '', '::1', 'Mozilla/5.0 (Windows NT 6.2; WOW64; rv:31.0) Gecko/20100101 Firefox/31.0'),
(1089, 0, '%5Bobject%20Object%5D', 1408599918, 'employee/employee_profile_controller/%5Bobject%20Object%5D', '', '::1', 'Mozilla/5.0 (Windows NT 6.2; WOW64; rv:31.0) Gecko/20100101 Firefox/31.0'),
(1090, 0, 'user_unseen_notification_count', 1408599919, 'notification/notified_users_controller/user_unseen_notification_count', '', '::1', 'Mozilla/5.0 (Windows NT 6.2; WOW64; rv:31.0) Gecko/20100101 Firefox/31.0'),
(1091, 0, 'view_profile', 1408599952, 'employee/employee_profile_controller/view_profile', '', '::1', 'Mozilla/5.0 (Windows NT 6.2; WOW64; rv:31.0) Gecko/20100101 Firefox/31.0'),
(1092, 0, 'init_notification_menu', 1408599954, 'notification/notification_controller/init_notification_menu', '', '::1', 'Mozilla/5.0 (Windows NT 6.2; WOW64; rv:31.0) Gecko/20100101 Firefox/31.0'),
(1093, 0, '%5Bobject%20Object%5D', 1408599954, 'employee/employee_profile_controller/%5Bobject%20Object%5D', '', '::1', 'Mozilla/5.0 (Windows NT 6.2; WOW64; rv:31.0) Gecko/20100101 Firefox/31.0'),
(1094, 0, 'user_unseen_notification_count', 1408599955, 'notification/notified_users_controller/user_unseen_notification_count', '', '::1', 'Mozilla/5.0 (Windows NT 6.2; WOW64; rv:31.0) Gecko/20100101 Firefox/31.0'),
(1095, 0, 'view_profile', 1408599973, 'employee/employee_profile_controller/view_profile', '', '::1', 'Mozilla/5.0 (Windows NT 6.2; WOW64; rv:31.0) Gecko/20100101 Firefox/31.0'),
(1096, 0, '%5Bobject%20Object%5D', 1408599976, 'employee/employee_profile_controller/%5Bobject%20Object%5D', '', '::1', 'Mozilla/5.0 (Windows NT 6.2; WOW64; rv:31.0) Gecko/20100101 Firefox/31.0'),
(1097, 0, 'init_notification_menu', 1408599976, 'notification/notification_controller/init_notification_menu', '', '::1', 'Mozilla/5.0 (Windows NT 6.2; WOW64; rv:31.0) Gecko/20100101 Firefox/31.0'),
(1098, 0, 'user_unseen_notification_count', 1408599977, 'notification/notified_users_controller/user_unseen_notification_count', '', '::1', 'Mozilla/5.0 (Windows NT 6.2; WOW64; rv:31.0) Gecko/20100101 Firefox/31.0'),
(1099, 0, 'view_profile', 1408600061, 'employee/employee_profile_controller/view_profile', '', '::1', 'Mozilla/5.0 (Windows NT 6.2; WOW64; rv:31.0) Gecko/20100101 Firefox/31.0'),
(1100, 0, 'init_notification_menu', 1408600064, 'notification/notification_controller/init_notification_menu', '', '::1', 'Mozilla/5.0 (Windows NT 6.2; WOW64; rv:31.0) Gecko/20100101 Firefox/31.0'),
(1101, 0, '%5Bobject%20Object%5D', 1408600064, 'employee/employee_profile_controller/%5Bobject%20Object%5D', '', '::1', 'Mozilla/5.0 (Windows NT 6.2; WOW64; rv:31.0) Gecko/20100101 Firefox/31.0'),
(1102, 0, 'user_unseen_notification_count', 1408600065, 'notification/notified_users_controller/user_unseen_notification_count', '', '::1', 'Mozilla/5.0 (Windows NT 6.2; WOW64; rv:31.0) Gecko/20100101 Firefox/31.0'),
(1103, 0, 'view_profile', 1408600077, 'employee/employee_profile_controller/view_profile', '', '::1', 'Mozilla/5.0 (Windows NT 6.2; WOW64; rv:31.0) Gecko/20100101 Firefox/31.0'),
(1104, 0, '%5Bobject%20Object%5D', 1408600080, 'employee/employee_profile_controller/%5Bobject%20Object%5D', '', '::1', 'Mozilla/5.0 (Windows NT 6.2; WOW64; rv:31.0) Gecko/20100101 Firefox/31.0'),
(1105, 0, 'init_notification_menu', 1408600080, 'notification/notification_controller/init_notification_menu', '', '::1', 'Mozilla/5.0 (Windows NT 6.2; WOW64; rv:31.0) Gecko/20100101 Firefox/31.0'),
(1106, 0, 'user_unseen_notification_count', 1408600081, 'notification/notified_users_controller/user_unseen_notification_count', '', '::1', 'Mozilla/5.0 (Windows NT 6.2; WOW64; rv:31.0) Gecko/20100101 Firefox/31.0'),
(1107, 0, 'manage_projects', 1408600119, 'project/project_controller/manage_projects', '', '::1', 'Mozilla/5.0 (Windows NT 6.2; WOW64; rv:31.0) Gecko/20100101 Firefox/31.0'),
(1108, 0, 'init_notification_menu', 1408600121, 'notification/notification_controller/init_notification_menu', '', '::1', 'Mozilla/5.0 (Windows NT 6.2; WOW64; rv:31.0) Gecko/20100101 Firefox/31.0'),
(1109, 0, '%5Bobject%20Object%5D', 1408600121, 'project/project_controller/%5Bobject%20Object%5D', '', '::1', 'Mozilla/5.0 (Windows NT 6.2; WOW64; rv:31.0) Gecko/20100101 Firefox/31.0'),
(1110, 0, 'user_unseen_notification_count', 1408600122, 'notification/notified_users_controller/user_unseen_notification_count', '', '::1', 'Mozilla/5.0 (Windows NT 6.2; WOW64; rv:31.0) Gecko/20100101 Firefox/31.0'),
(1111, 0, 'manage_skill_matrix', 1408600439, 'skill_matrix/skill_matrix_controller/manage_skill_matrix', '', '::1', 'Mozilla/5.0 (Windows NT 6.2; WOW64; rv:31.0) Gecko/20100101 Firefox/31.0'),
(1112, 0, '%5Bobject%20Object%5D', 1408600441, 'skill_matrix/skill_matrix_controller/%5Bobject%20Object%5D', '', '::1', 'Mozilla/5.0 (Windows NT 6.2; WOW64; rv:31.0) Gecko/20100101 Firefox/31.0'),
(1113, 0, 'init_notification_menu', 1408600441, 'notification/notification_controller/init_notification_menu', '', '::1', 'Mozilla/5.0 (Windows NT 6.2; WOW64; rv:31.0) Gecko/20100101 Firefox/31.0'),
(1114, 0, 'user_unseen_notification_count', 1408600443, 'notification/notified_users_controller/user_unseen_notification_count', '', '::1', 'Mozilla/5.0 (Windows NT 6.2; WOW64; rv:31.0) Gecko/20100101 Firefox/31.0'),
(1115, 0, 'logout', 1408600619, 'login/login_controller/logout', '', '::1', 'Mozilla/5.0 (Windows NT 6.2; WOW64; rv:31.0) Gecko/20100101 Firefox/31.0'),
(1116, 0, 'index', 1408600621, 'login/login_controller', '', '::1', 'Mozilla/5.0 (Windows NT 6.2; WOW64; rv:31.0) Gecko/20100101 Firefox/31.0'),
(1117, 0, 'authenticate_user', 1408600665, 'login/login_controller/authenticate_user', '{"login_username":"rachini","login_password":"abc123@#"}', '::1', 'Mozilla/5.0 (Windows NT 6.2; WOW64; rv:31.0) Gecko/20100101 Firefox/31.0'),
(1118, 0, 'index', 1408600667, 'login/login_controller', '', '::1', 'Mozilla/5.0 (Windows NT 6.2; WOW64; rv:31.0) Gecko/20100101 Firefox/31.0'),
(1119, 0, 'index', 1408600668, 'dashboard/dashboard_controller', '', '::1', 'Mozilla/5.0 (Windows NT 6.2; WOW64; rv:31.0) Gecko/20100101 Firefox/31.0'),
(1120, 0, 'init_notification_menu', 1408600670, 'notification/notification_controller/init_notification_menu', '', '::1', 'Mozilla/5.0 (Windows NT 6.2; WOW64; rv:31.0) Gecko/20100101 Firefox/31.0'),
(1121, 0, '%5Bobject%20Object%5D', 1408600670, 'dashboard/dashboard_controller/%5Bobject%20Object%5D', '', '::1', 'Mozilla/5.0 (Windows NT 6.2; WOW64; rv:31.0) Gecko/20100101 Firefox/31.0'),
(1122, 0, 'user_unseen_notification_count', 1408600672, 'notification/notified_users_controller/user_unseen_notification_count', '', '::1', 'Mozilla/5.0 (Windows NT 6.2; WOW64; rv:31.0) Gecko/20100101 Firefox/31.0'),
(1123, 0, 'view_profile', 1408600673, 'employee/employee_profile_controller/view_profile', '', '::1', 'Mozilla/5.0 (Windows NT 6.2; WOW64; rv:31.0) Gecko/20100101 Firefox/31.0'),
(1124, 0, '%5Bobject%20Object%5D', 1408600675, 'employee/employee_profile_controller/%5Bobject%20Object%5D', '', '::1', 'Mozilla/5.0 (Windows NT 6.2; WOW64; rv:31.0) Gecko/20100101 Firefox/31.0'),
(1125, 0, 'init_notification_menu', 1408600675, 'notification/notification_controller/init_notification_menu', '', '::1', 'Mozilla/5.0 (Windows NT 6.2; WOW64; rv:31.0) Gecko/20100101 Firefox/31.0'),
(1126, 0, 'user_unseen_notification_count', 1408600676, 'notification/notified_users_controller/user_unseen_notification_count', '', '::1', 'Mozilla/5.0 (Windows NT 6.2; WOW64; rv:31.0) Gecko/20100101 Firefox/31.0'),
(1127, 0, 'view_profile', 1408600698, 'employee/employee_profile_controller/view_profile', '', '::1', 'Mozilla/5.0 (Windows NT 6.2; WOW64; rv:31.0) Gecko/20100101 Firefox/31.0'),
(1128, 0, '%5Bobject%20Object%5D', 1408600701, 'employee/employee_profile_controller/%5Bobject%20Object%5D', '', '::1', 'Mozilla/5.0 (Windows NT 6.2; WOW64; rv:31.0) Gecko/20100101 Firefox/31.0'),
(1129, 0, 'init_notification_menu', 1408600701, 'notification/notification_controller/init_notification_menu', '', '::1', 'Mozilla/5.0 (Windows NT 6.2; WOW64; rv:31.0) Gecko/20100101 Firefox/31.0'),
(1130, 0, 'user_unseen_notification_count', 1408600702, 'notification/notified_users_controller/user_unseen_notification_count', '', '::1', 'Mozilla/5.0 (Windows NT 6.2; WOW64; rv:31.0) Gecko/20100101 Firefox/31.0');

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
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=2 ;

--
-- Dumping data for table `task`
--

INSERT INTO `task` (`task_id`, `task_name`, `task_descrption`, `task_priority`, `task_progress`, `task_deadline`, `task_status`, `project_id`, `del_ind`, `added_date`, `added_by`) VALUES
(1, 'task 1', 'fsfsfs', '1', 0, '2014-08-22 00:00:00', '0', 1, '1', '0000-00-00 00:00:00', '2');

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
