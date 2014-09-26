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

        $this->load->model('privilege_master/privilege_master_model');
        $this->load->model('privilege_master/privilege_master_service');

        $this->load->model('privilege/privilege_model');
        $this->load->model('privilege/privilege_service');

        $this->load->model('employee_privileges/employee_privileges_model');
        $this->load->model('employee_privileges/employee_privileges_service');


        $this->load->library('email');
    }

    /* manage_companies function
     * This will display all the companies
     */

    function manage_companies() {

        $company_service = new company_service();

        $data['heading'] = "Manage Company";
        $data['companies'] = $company_service->get_all_companies($this->session->userdata('COMPANY_CODE'));

        $parials = array('content' => 'company/manage_company_view');
        $this->template->load('template/main_template', $parials, $data);
    }

    function company_registration() {

        $company_model = new Company_model();
        $company_service = new Company_service();
        $privilege_master_service = new Privilege_master_service();
        $privilege_service = new Privilege_service();
        $employee_privilege_model = new Employee_privileges_model();
        $employee_privilege_service = new Employee_privileges_service();

        $company_model->set_company_name($this->input->post('txtCompanyName', TRUE));
        $company_model->set_company_address($this->input->post('txtCompanyAddress', TRUE));
        $company_model->set_company_contact($this->input->post('txtCompanyContact', TRUE));
        $company_model->set_company_email($this->input->post('txtCompanyEmail', TRUE));
        $company_model->set_company_desc($this->input->post('txtCompanyDesc', TRUE));
        $company_model->set_del_ind('1');




        $company_code = $company_service->add_new_company_registration($company_model);

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

        //assign default privileges in the beginning 
        $privilege_masters = $privilege_master_service->get_available_master_privileges();

        foreach ($privilege_masters as $privilege_master) {
            $privileges = $privilege_service->get_privileges_by_master_privilege_assigned_for($privilege_master->privilege_master_code, $this->config->item('COMPANY_OWNER'));
            foreach ($privileges as $privilege) {

                $employee_privilege_model->set_employee_code($emp_id);
                $employee_privilege_model->set_privilege_code($privilege->privilege_code);
                $employee_privilege_service->add_new_employee_privilege_system($employee_privilege_model);
            }
        }


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

    /*
     * This function is to add a new company using the method add_new_company 
     * in company service
     */

    function add_new_company() {
//        $perm = Access_controllerservice :: checkAccess('ADD_COMPANY');
//        if ($perm) {

        $company_model = new Company_model();
        $company_service = new Company_service();

        $company_model->set_company_code($this->input->post('company_code', TRUE));
        $company_model->set_company_name($this->input->post('company_name', TRUE));
        $company_model->set_company_email($this->input->post('company_email', TRUE));
        $company_model->set_company_address($this->input->post('company_address', TRUE));
        $company_model->set_company_contact(($this->input->post('company_contact', TRUE)));
        $company_model->set_company_desc($this->input->post('company_description', TRUE));
        $company_model->set_del_ind('1');


        echo $company_service->add_new_company($company_model);
    }

    /*
     * This is to represent the edit company view. This funtion is passing 
     * company_code as the parameter 
     */

    function edit_company_view($company_code) {
//        $perm = Access_controllerservice :: checkAccess('EDIT_COMPANY');
//        if ($perm) {

        $company_service = new Company_service();


        $data['heading'] = "Edit Company Deatils";
        $data['company'] = $company_service->get_company_by_id($company_code);


        $partials = array('content' => 'company/edit_company_view');
        $this->template->load('template/main_template', $partials, $data);
//        } else {
//            $this->template->load('template/access_denied_page');
//        }
    }

    /*
     * Edit company function using the update_company function in the 
     * company_service
     */

    function edit_company() {

//        $perm = Access_controllerservice :: checkAccess('EDIT_COMPANY');
//        if ($perm) {

        $company_model = new company_model();
        $company_service = new company_service();

        $company_model->set_company_code($this->input->post('company_code', TRUE));
        $company_model->set_company_name($this->input->post('company_name', TRUE));
        $company_model->set_company_email($this->input->post('company_email', TRUE));
        $company_model->set_company_address($this->input->post('company_address', TRUE));
        $company_model->set_company_contact($this->input->post('company_contact', TRUE));
        $company_model->set_company_desc($this->input->post('company_description', TRUE));






        echo $company_service->update_company($company_model);
//        } else {
//            $this->template->load('template/access_denied_page');
//        }
    }

    /*
     * Printing reports 
     */

    public function print_company_pdf_report() {
        $company_service = new Company_service();



        $current_companies = $company_service->get_all_companies();
        $data['companies'] = $current_companies;

        $data['title'] = 'Company Report';
        $SResultString = $this->load->view('reports/view_company_report', $data, TRUE);
        $footer = $this->load->view('reports/pdf_footer', $data, TRUE);
        $this->load->library('MPDF56/mpdf');
        $mpdf = new mPDF('utf-8', 'A4');
        $mpdf->SetDisplayMode('fullpage');
        $mpdf->SetFooter($footer);
        $mpdf->WriteHTML($SResultString);
        $mpdf->Output();
    }

    /*
     * This is to delete a company by checking the no. of employees assign to
     *  that company
     */

    function delete_company() {

//        $perm = Access_controllerservice :: checkAccess('DELETE_COMPANY');
//        if ($perm) {
        $company_service = new Company_service();
        $employee_service = new employee_service();

        $employees = $employee_service->get_employees_by_company_id_manage(trim($this->input->post('code', TRUE)));

        //if no employees in company we can delete otherwise we cant delete the company
        if (count($employees) == 0) {
            echo $company_service->delete_company(trim($this->input->post('code', TRUE)));
        } else {
            echo 2;
        }
//        } else {
//            $this->template->load('template/access_denied_page');
//        }
    }

}
