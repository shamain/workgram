<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Employee_profile_controller extends CI_Controller {

    function __construct() {
        parent::__construct();

        if (!$this->session->userdata('EMPLOYEE_LOGGED_IN')) {
            redirect(site_url() . 'login/login_controller');
        } else {

            $this->load->model('employee/employee_model');
            $this->load->model('employee/employee_service');
        }
    }
    

    function view_profile() {

        $employee_service = new Employee_service();

        $data['heading'] = "My Profile";
        $data['employee_detail'] = $employee_service->get_employee_by_id($this->session->userdata('EMPLOYEE_CODE'));



        $partials = array('content' => 'employee/employee_profile_view');
        $this->template->load('template/main_template', $partials, $data);
    }
    
    function upload_employee_avatar() {

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
