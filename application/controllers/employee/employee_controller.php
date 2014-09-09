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

            $this->load->library('email');

            $this->load->model('wages_category/wages_category_model');
            $this->load->model('wages_category/wages_category_service');
        }
    }

    function manage_employees() {

        $employee_service = new employee_service();
        $wages_category_service = new wages_category_service();
        $data['heading'] = "Manage Employee";
        $data['employees'] = $employee_service->get_employees_by_company_id_manage($this->session->userdata('EMPLOYEE_COMPANY_CODE'));

        $data['wages_categories'] = $wages_category_service->get_all_wages_categories();


        $partials = array('content' => 'employee/manage_employee_view');
        $this->template->load('template/main_template', $partials, $data);
    }

    function add_new_employee() {
//        $perm = Access_controllerservice :: checkAccess('ADD_EMPLOYEE');
//        if ($perm) {

        $employee_model = new employee_model();
        $employee_service = new employee_service();

        $name = ucfirst($this->input->post('employee_fname', TRUE)) . ' ' . ucfirst($this->input->post('employee_lname', TRUE));
        $email = $this->input->post('employee_email', TRUE);
        $token = $this->generate_random_string(); //generate account activation token

        $employee_model->set_employee_no($this->input->post('employee_no', TRUE));
        $employee_model->set_employee_fname($this->input->post('employee_fname', TRUE));
        $employee_model->set_employee_lname($this->input->post('employee_lname', TRUE));
        $employee_model->set_employee_password(md5($this->input->post('employee_password', TRUE)));
        $employee_model->set_employee_email($this->input->post('employee_email', TRUE));
        $employee_model->set_employee_type($this->input->post('employee_type', TRUE));
        $employee_model->set_employee_wages_category($this->input->post('wages_category', TRUE));
        $employee_model->set_employee_contract($this->input->post('employee_contract', TRUE));
        $employee_model->set_employee_avatar('default_cover_pic.png');
        $employee_model->set_company_code($this->session->userdata('EMPLOYEE_COMPANY_CODE'));
        $employee_model->set_account_activation_code($this->config->item('EMPLOYEE'));
        $employee_model->set_del_ind('1');
        $employee_model->set_added_by($this->session->userdata('EMPLOYEE_CODE'));
        $employee_model->set_added_date(date("Y-m-d H:i:s"));


        $emp_id = $employee_service->add_employee($employee_model);


        $link = base_url() . "index.php/employee/employee_controller/account_activation/" . urlencode($emp_id) . "/" . md5($token);


        if ($emp_id) {

            $data['name'] = $name;
            $data['link'] = $link;



            $email_subject = "Workgram :Activate Your New Account ";


            $msg = $this->load->view('template/mail_template/body', $data, TRUE);

            $headers = 'MIME-Version: 1.0' . "\r\n";
            $headers .= 'Content-type: text/html; charset=iso-8859-1' . "\r\n";
            $headers .= 'From: Workgram <workgram@gmail.com>' . "\r\n";
            $headers .= 'Cc:kaumadi2014@gmail.com' . "\r\n";

            if (mail($email, $email_subject, $msg, $headers)) {
                echo "1";
            } else {
                echo "0";
            }
        } else {
            echo "0";
        }
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
        $wages_category_service = new wages_category_service();

        $data['heading'] = "Edit Employee Details";
        $data['employee'] = $employee_service->get_employee_by_id($employee_code);
        $data['wages_categories'] = $wages_category_service->get_all_wages_categories();


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
        $employee_model->set_employee_wages_category($this->input->post('employee_wages_category', TRUE));
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
    
    public function print_employee_pdf_report() {
        $employee_service = new Employee_service();

        

        $current_employees = $employee_service->get_employees_by_company_id_manage($this->session->userdata('EMPLOYEE_COMPANY_CODE'));
        $data['employees'] = $current_employees;
        
        $data['title'] = 'Employee Report';
        $SResultString = $this->load->view('reports/view_employee_report', $data, TRUE);

        $this->load->library('MPDF56/mpdf');
        $mpdf=new mPDF('utf-8', 'A4');
        $mpdf->SetDisplayMode('fullpage');

        $mpdf->WriteHTML($SResultString);
        $mpdf->Output();
    }

}

?>
