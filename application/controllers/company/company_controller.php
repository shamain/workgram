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
        $this->load->library('email');
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

        $name = ucfirst($this->input->post('txtFirstName', TRUE)) . ' ' . ucfirst($this->input->post('txtLastName', TRUE));
        $email = $this->input->post('txtEmail', TRUE);
        $token = $this->generate_random_string(); //generate account activation token

        $employee_model->set_employee_fname($this->input->post('txtFirstName', TRUE));
        $employee_model->set_employee_lname($this->input->post('txtLastName', TRUE));
        $employee_model->set_employee_password(md5($this->input->post('txtPassword', TRUE)));
        $employee_model->set_employee_email($this->input->post('txtEmail', TRUE));
        $employee_model->set_employee_contact($this->input->post('txtContact', TRUE));
        $employee_model->set_company_code($company_code);
        $employee_model->set_employee_type($this->config->item('COMPANY_OWNER'));
        $employee_model->set_employee_contract($this->config->item('FULL_TIME'));
        $employee_model->set_employee_bday($this->input->post('birthdy', TRUE));
        $employee_model->set_account_activation_code(md5($token));
        $employee_model->set_del_ind('2'); //account not activated
        $employee_model->set_added_date(date("Y-m-d H:i:s"));

        $emp_id = $employee_service->add_employee($employee_model);



        $link = base_url() . "index.php/company/company_controller/account_activation/" . urlencode($emp_id) . "/" . md5($token);


        if ($emp_id) {

            $data['name'] = $name;
            $data['link'] = $link;



            $email_subject = "Workgram : Activate Your New Account";


            $msg = $this->load->view('template/mail_template/body', $data, TRUE);

            $headers = 'MIME-Version: 1.0' . "\r\n";
            $headers .= 'Content-type: text/html; charset=iso-8859-1' . "\r\n";
            $headers .= 'From: Workgram <workgram@gmail.com>' . "\r\n";
            $headers .= 'Cc: gayathma3@gmail.com' . "\r\n";

            if (mail($email, $email_subject, $msg, $headers)) {
                echo "1";
            } else {
                echo "0";
            }
        } else {
            echo "0";
        }
    }

    //generate token
    public function generate_random_string($length = 10) {
        $characters = '0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ';
        $random_string = '';
        for ($i = 0; $i < $length; $i++) {
            $random_string .= $characters[rand(0, strlen($characters) - 1)];
        }
        return $random_string;
    }

    public function account_activation($emp_id, $token) {

        $employee_service = new Employee_service();
        $employee_model = new Employee_model();

        $employee_model->set_employee_code($emp_id);
        $employee_model->set_account_activation_code($token);

        $count = $employee_service->check_user_id_token_combination($employee_model);

        if ($count == 1) {
            $data['emp_id'] = $emp_id;
            $employee_model->set_del_ind('1');
            $employee_service->activate_employee_account($employee_model);

            echo $this->load->view('template/success_account_activated_view', $data);
        } else {
            $data['heading'] = "Invalid URL Request";

            echo $this->load->view('users/invalid_url', $data);
        }
    }

}
