<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Employee_controller extends CI_Controller {

    function __construct() {
        parent::__construct();

        if (!$this->session->userdata('EMPLOYEE_LOGGED_IN')) {
            redirect(site_url() . 'login/login_controller');
        } else {

            $this->load->model('employee/employee_model');
            $this->load->model('employee/employee_service');
        }
    }

    function manage_employees() {

        $employee_service = new employee_service();

        $data['heading'] = "Manage Employee";
        $data['employees'] = $employee_service->get_employees_by_company_id($this->session->userdata('EMPLOYEE_COMPANY_CODE'));

        $partials = array('content' => 'employee/manage_employee_view');
        $this->template->load('template/main_template', $partials, $data);
    }

    function add_new_employee() {
//        $perm = Access_controllerservice :: checkAccess('ADD_PRIVILEGES');
//        if ($perm) {

        $employee_model = new employee_model();
        $employee_service = new employee_service();

        $employee_model->set_employee_code($this->input->post('employee_code', TRUE));
        $employee_model->set_employee_no($this->input->post('employee_no', TRUE));
        $employee_model->set_employee_fname($this->input->post('employee_fname', TRUE));
        $employee_model->set_employee_lname($this->input->post('employee_lname', TRUE));
        $employee_model->set_employee_password($this->input->post('employee_password', TRUE));
        $employee_model->set_employee_email($this->input->post('employee_email', TRUE));
        $employee_model->set_employee_type($this->input->post('employee_type', TRUE));
        $employee_model->set_employee_bday($this->input->post('employee_bday', TRUE));
        $employee_model->set_employee_contact($this->input->post('employee_contact', TRUE));
        $employee_model->set_employee_salary($this->input->post('employee_salary', TRUE));
        $employee_model->set_employee_contract($this->input->post('employee_contract', TRUE));
        $employee_model->set_employee_avatar($this->input->post('employee_avatar', TRUE));
        $employee_model->set_company_code($this->input->post('company_code', TRUE));
        $employee_model->set_del_ind('1');
        $employee_model->set_added_by($this->session->userdata('employee_code'));
        $employee_model->set_added_date(date("Y-m-d H:i:s"));


        echo $employee_service->add_employee($employee_model);
    }

}

?>
