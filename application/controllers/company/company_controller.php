<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Company_controller extends CI_Controller {

    function __construct() {
        parent::__construct();
        /*
          if (!$this->session->userdata('EMPLOYEE_LOGGED_IN')) {
          redirect(site_url() . '/login/login_controller');
          } else {
          $this->load->model('project/project_model');
          $this->load->model('project/Project_service');
          } */
        $this->load->model('employee/employee_model');
        $this->load->model('employee/employee_service');
        $this->load->model('company/company_model');
        $this->load->model('company/company_service');
    }

    function company_registration() {

        $company_model = new Company_model();
        $company_service = new Company_service();

        $company_model->set_company_name($this->input->post('txtCompanyName', TRUE));
        $company_model->set_company_address($this->input->post('txtCompanyAddress', TRUE));
        $company_model->set_company_contact($this->input->post('txtCompanyContact', TRUE));
        $company_model->set_company_email($this->input->post('txtCompanyEmail', TRUE));
        $company_model->set_company_desc($this->input->post('txtCompanyDesc', TRUE));




        $company_code = $company_service->add_new_company($company_model);

        $employee_model = new Employee_model();
        $employee_service = new Employee_service();

        $name = $this->input->post('txtFirstName', TRUE) . ' ' . $this->input->post('txtLastName', TRUE);
        $username = $this->input->post('txtEmail', TRUE);
        $password = $this->input->post('txtPassword', TRUE);
        $email = $this->input->post('txtEmail', TRUE);

        $employee_model->set_employee_lname($this->input->post('txtLastName', TRUE));
        $employee_model->set_employee_password(md5($this->input->post('txtPassword', TRUE)));
        $employee_model->set_employee_email($this->input->post('txtEmail', TRUE));
        $employee_model->set_employee_contact($this->input->post('txtContact', TRUE));
        $employee_model->set_company_code($company_code);
        $employee_model->set_employee_type($this->config->item('COMPANY_OWNER'));
        $employee_model->set_employee_contract($this->config->item('FULL_TIME'));
        $employee_model->set_employee_bday($this->input->post('birthdy', TRUE));
        $employee_model->set_del_ind('1');
        $employee_model->set_added_date(date("Y-m-d H:i:s"));

        if ($employee_service->add_employee($employee_model)) {
            $msg = "<h1 style='font-size:24px;margin:0px'> Dear $name ,</h1><br/><br/>Your registration is success.<br/>";
            $msg .= "Your Username - $username <br/>";
            $msg .= "Your Password - $password <br/><br/>";
            $msg .= "Thank you.<br/><br/>Administrator,<br/>Workgram.";

            $this->load->library('email');

            $subject = "Workgram - Registration Successful";
            $headers = 'MIME-Version: 1.0' . "\r\n";
            $headers .= 'Content-type: text/html; charset=iso-8859-1' . "\r\n";
            $headers .= 'From: Workgram Admin <workgram.net>' . "\r\n";


            if (mail($email, $subject, $msg, $headers)) {
                echo "1";
            } else {
                echo "0";
            }
        } else {
            echo "0";
        }
    }

}
