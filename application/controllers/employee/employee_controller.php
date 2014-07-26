<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Employee_controller extends CI_Controller {

    function __construct() {
        parent::__construct();

        if (!$this->session->userdata('EMPLOYEE_LOGGED_IN')) {
            redirect(site_url() . '/login/login_controller');
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
//        $perm = Access_controllerservice :: checkAccess('ADD_EMPLOYEE');
//        if ($perm) {

        $employee_model = new employee_model();
        $employee_service = new employee_service();

//        $employee_model->set_employee_code($this->input->post('employee_code', TRUE));
        $employee_model->set_employee_no($this->input->post('employee_no', TRUE));
        $employee_model->set_employee_fname($this->input->post('employee_fname', TRUE));
        $employee_model->set_employee_lname($this->input->post('employee_lname', TRUE));
        $employee_model->set_employee_password(md5($this->input->post('employee_password', TRUE)));
        $employee_model->set_employee_email($this->input->post('employee_email', TRUE));
        $employee_model->set_employee_type($this->input->post('employee_type', TRUE));
        $employee_model->set_employee_salary($this->input->post('employee_salary', TRUE));
        $employee_model->set_employee_contract($this->input->post('employee_contract', TRUE));
        $employee_model->set_company_code($this->session->userdata('EMPLOYEE_COMPANY_CODE'));
        $employee_model->set_account_activation_code($this->config->item('EMPLOYEE'));
        $employee_model->set_del_ind('1');
        $employee_model->set_added_by($this->session->userdata('EMPLOYEE_CODE'));
        $employee_model->set_added_date(date("Y-m-d H:i:s"));


        echo $employee_service->add_new_employee($employee_model);
    }

    function delete_employee() {

//        $perm = Access_controllerservice :: checkAccess('DELETE_EMPLOYEE');
//        if ($perm) {
        $employee_service = new employee_service();

        echo $employee_service->delete_employee(trim($this->input->post('code', TRUE)));
//        } else {
//            $this->template->load('template/access_denied_page');
//        }
    }

    function edit_employee_view($employee_code) {
//        $perm = Access_controllerservice :: checkAccess('EDIT_EMPLOYEE');
//        if ($perm) {

        $employee_service = new employee_service();


        $data['heading'] = "Edit Employee Details";
        $data['employee'] = $employee_service->get_employee_by_id($employee_code);


        $partials = array('content' => 'employee/edit_employee_view');
        $this->template->load('template/main_template', $partials, $data);
//        } else {
//            $this->template->load('template/access_denied_page');
//        }
    }

    function edit_employee() {

//        $perm = Access_controllerservice :: checkAccess('EDIT_EMPLOYEE');
//        if ($perm) {

        $employee_model = new employee_model();
        $employee_service = new employee_service();

        $employee_model->set_employee_no($this->input->post('employee_no', TRUE));
        $employee_model->set_employee_fname($this->input->post('employee_fname', TRUE));
        $employee_model->set_employee_lname($this->input->post('employee_lname', TRUE));
        $employee_model->set_employee_password(md5($this->input->post('employee_password', TRUE)));
        $employee_model->set_employee_email($this->input->post('employee_email', TRUE));
        $employee_model->set_employee_type($this->input->post('employee_type', TRUE));
        $employee_model->set_employee_bday($this->input->post('employee_bday', TRUE));
        $employee_model->set_employee_contact($this->input->post('employee_contact', TRUE));
        $employee_model->set_employee_salary($this->input->post('employee_salary', TRUE));
        $employee_model->set_employee_contract($this->input->post('employee_contract', TRUE));
        $employee_model->set_employee_avatar($this->input->post('employee_avatar', TRUE));
        $employee_model->set_company_code($this->session->userdata('EMPLOYEE_COMPANY_CODE'));
        $employee_model->set_updated_by($this->session->userdata('EMPLOYEE_CODE'));
        $employee_model->set_updated_date(date("Y-m-d H:i:s"));

        $employee_model->set_employee_code($this->input->post('employee_code', TRUE));

        if ($this->input->post('employee_code', TRUE) == $this->session->userdata('EMPLOYEE_CODE')) {
            $this->session->set_userdata('EMPLOYEE_PROPIC', $this->input->post('employee_avatar', TRUE));
        }


        echo $employee_service->update_employee($employee_model);
//        } else {
//            $this->template->load('template/access_denied_page');
//        }
    }

    function upload_image() {

        $uploaddir = './uploads/employee_avatar/';
        $unique_tag = 'emp_avatar';

        $filename = $unique_tag . time() . '-' . basename($_FILES['uploadfile']['name']); //this is the file name
        $file = $uploaddir . $filename; // this is the full path of the uploaded file

        if (move_uploaded_file($_FILES['uploadfile']['tmp_name'], $file)) {
            echo $filename;
        } else {
            echo "error";
        }
    }
 
}




?>
