<?php


if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Employee_screen_shot_controller extends CI_Controller {

    function __construct() {
        parent::__construct();

        if (!$this->session->userdata('EMPLOYEE_LOGGED_IN')) {
            redirect(site_url() . 'login/login_controller');
        } else {
//
//            $this->load->model('employee_screen_shot/employee_screen_shot_model');
//            $this->load->model('employee_screen_shot/employee_screen_shot_service');
        }
    }
    function manage_employee_screen_shot() {

//        $employee_screen_shot_service = new employee_screen_shot_service();

        $data['heading'] = "Manage Employee_screen_shot_service";
//        $data['employee_screen_shot'] = $employee_screen_shot_service->get_employee_screen_shot_by_screen_shot_id($this->session->userdata(''));

        $partials = array('content' => 'employee_screen_shots/screen_shot_view');
        $this->template->load('template/main_template', $partials, $data);
    }

    
    
    
    

    
    
    
    
}

