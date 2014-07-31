<?php


if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Employee_screenshots_controller extends CI_Controller {

    function __construct() {
        parent::__construct();

        if (!$this->session->userdata('EMPLOYEE_LOGGED_IN')) {
            redirect(site_url() . '/login/login_controller');
        } else {
//
  //         $this->load->model('employee_screenshot/employee_screenshot_model');
//          $this->load->model('employee_screenshot/employee_screenshot_service');
        }
    }
    function manage_employee_screenshot() {

//        $employee_screenshot_service = new employee_screenshot_service();

        $data['heading'] = "Manage Employee_screenshot_service";
//        $data['employee_screenshot'] = $employee_screenshot_service->get_employee_screenshot_by_screenshot_id($this->session->userdata(''));

        $partials = array('content' => 'employee_screenshots/screenshot_view');
        $this->template->load('template/main_template', $partials, $data);
    }

    
    
    
    

    
    
    
    
}

