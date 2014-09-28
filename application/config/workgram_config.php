<?php  if ( ! defined('BASEPATH')) exit('No direct script access allowed');
//Custon configuration file.

// function employeeservices->getEmployeeswithdep() ->  // designation 23 -> is managing director   not get report

//This is to set the site title
$config['APPLICATION_MAIN_TITLE']	= "WORKGRAM ";
$config['LOGIN_OPTION']	= 1;


//Employee Types
$config['ADMIN']= 1;
$config['COMPANY_OWNER']= 2;
$config['EMPLOYEE']= 3;
$config['ALL']= 4;

//Employee Contract
$config['FULL_TIME']= 'FULL_TIME';
$config['PART_TIME']= 'PART_TIME';

//Employee Attendance
$config['ABSENT']='A';
$config['HALF_DAY']='H';
$config['FULL_DAY']='F';
$config['HOLIDAY_DAY']='HO';

$config['ABSENT_C']='#f35958';
$config['HALF_DAY_C']='#0090d9';
$config['FULL_DAY_C']='#0aa699';
$config['HOLIDAY_DAY_C']='#e5cc26';








$config['MAILBOX']             = "{203.143.14.246:143/notls}";
$config['MAILBOX2']            = "{203.143.14.229:143/notls}";




//system codes where even if the user has no privileges the system default view should be shown
$config['DEFAULT_VIEW_SYSTEMS'] = array(5,6,7,15);
