<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Employee_privilage_controller extends CI_Controller {
   
    function __construct() {
        parent::__construct();

        if (!$this->session->userdata('EMPLOYEE_LOGGED_IN')) {
            redirect(site_url() . 'login/login_controller');
        } else {

            $this->load->model('employee_privilage/employee_privilage_model');
            $this->load->model('employee_privilage/employee_privilage_service');
        }
    }
    
    function manage_employee_privileges() {

        $employee_service = new employee_service();

        $data['heading'] = "Manage Employee Privileges";
        $data['employees_privileges'] = $employee_service->get_employee_by_id($this->session->userdata('EMPLOYEE_CODE'));
        $data['employee_detail'] = $employee_service->get_employee_by_id($this->session->userdata('EMPLOYEE_CODE'));

        $partials = array('content' => 'employee/manage_employee_privilege_view');
        $this->template->load('template/main_template', $partials, $data);
    }
    
   function add_employee_privilage() {
      
        $employee_privilage_model = new employee_privilage_model();
        $employee_privilage_service = new employee_privilage_service();
        
        $employee_privilage_model->set_employee_privilage_code($this->input->post('employee_privilage_code',TRUE));
        $employee_privilage_model->set_employee_code($this->input->post('employee_code', TRUE));
        $employee_privilage_model->set_privilage_code($this->input->post('privilage_code', TRUE));
        $employee_privilage_model->set_added_date(date("Y-m-d H:i:s"));
        
        echo $employee_service->add_new_employee_privilage($employee_privilage_model);
   }
}

