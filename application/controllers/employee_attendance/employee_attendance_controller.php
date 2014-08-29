<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Employee_attendance_controller extends CI_Controller {

    function __construct() {
        parent::__construct();

        if (!$this->session->userdata('EMPLOYEE_LOGGED_IN')) {
            redirect(site_url() . '/login/login_controller');
        } else {

            $this->load->model('employee/employee_model');
            $this->load->model('employee/employee_service');
            
         }
    }

    function manage_employee_attendance() {
        
        
        $data['heading'] = "Manage Employee Attendance";
        $data['employee_attendances'] = '';
        $partials = array('content' => 'employee_attendance/manage_employee_attendance_view');
        $this->template->load('template/main_template', $partials, $data);
    }

}

?>