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
        $employee_privilege_service = new Employee_privilege_service();

        $data['heading'] = "Manage Employee Privileges";

        $data['systems'] = $system_service->get_all_systems();
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

    function add_employee_privileges() {

        $employee_privilege_model = new Employee_privilege_model();
        $employee_privilege_service = new Employee_privilege_service();


        $employee_privilege_model->set_employee_code($this->input->post('employee_code', TRUE));
        $employee_privilege_model->set_privilage_code($this->input->post('privilege_code', TRUE));
        $employee_privilege_model->set_added_date(date("Y-m-d H:i:s"));

        $employee_privilege_service->add_new_employee_privilege($employee_privilege_model);
        echo 1;
    }


}
