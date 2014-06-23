<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Employee_privilege_controller extends CI_Controller {

    function __construct() {
        parent::__construct();

        if (!$this->session->userdata('EMPLOYEE_LOGGED_IN')) {
            redirect(site_url() . 'login/login_controller');
        } else {

            $this->load->model('employee_privileges/employee_privileges_model');
            $this->load->model('employee_privileges/employee_privileges_service');

            $this->load->model('settings/system/system_model');
            $this->load->model('settings/system/system_service');
            
            $this->load->model('privilege_master/privilege_master_model');
            $this->load->model('privilege_master/privilege_master_service');
        }
    }

    function manage_employee_privileges($id) {

        $employee_service = new employee_service();
        $system_service = new System_service();
        $privilege_masters = new Privilege_master_service();
        $employee_privilege_service=new Employee_privilege_service();

        $data['heading'] = "Manage Employee Privileges";

        $data['systems'] = $system_service->get_all_systems();
        $data['privilege_masters'] = $privilege_masters->get_all_master_privileges();
        $data['employee_detail'] = $employee_service->get_employee_by_id($id);

        $current_assigned_privileges = $employee_privilege_service->get_assigned_privileges_by_employee_code($id);
        $privileges = array();
        foreach ($current_assigned_privileges as $current_assigned_privilege) {
            array_push($privileges, $current_assigned_privilege->privilege_code);
        }

        $data['assigned_privileges'] = $privileges;

        $partials = array('content' => 'employee/manage_employee_privilege_view');
        $this->template->load('template/main_template', $partials, $data);
    }

    function add_employee_privilage() {

        $employee_privilage_model = new employee_privilage_model();
        $employee_privilage_service = new employee_privilage_service();

        $employee_privilage_model->set_employee_privilage_code($this->input->post('employee_privilage_code', TRUE));
        $employee_privilage_model->set_employee_code($this->input->post('employee_code', TRUE));
        $employee_privilage_model->set_privilage_code($this->input->post('privilage_code', TRUE));
        $employee_privilage_model->set_added_date(date("Y-m-d H:i:s"));

        echo $employee_service->add_new_employee_privilage($employee_privilage_model);
    }

}
