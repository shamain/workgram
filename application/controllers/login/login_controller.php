<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Login_controller extends CI_Controller {

    /**
     * Index Page for this controller.
     *
     * Maps to the following URL
     * 		http://example.com/index.php/welcome
     * 	- or -  
     * 		http://example.com/index.php/welcome/index
     * 	- or -
     * Since this controller is set as the default controller in 
     * config/routes.php, it's displayed at http://example.com/
     *
     * So any other public methods not prefixed with an underscore will
     * map to /index.php/welcome/<method_name>
     * @see http://codeigniter.com/user_guide/general/urls.html


     */
    function __construct() {
        parent::__construct();

        // if ($this->session->userdata('LCS_EMPLOYEE_LOGGED_IN')) {
        //echo 1;die();
        // redirect(base_url() . 'index.php/IMS/dashboard_controller/');
        // } else {
        $this->load->model('employee/employee_model');
        $this->load->model('employee/employee_service');
//        $this->load->model('IMS/EmployeeDepartments/Employeedepartmentsmodel');
//        $this->load->model('IMS/EmployeeDepartments/Employeedepartmentservice');
//
//        $this->load->model('IMS/Department/departmentmodel');
//        $this->load->model('IMS/Department/departmentservice');
        //Settings Options handling library - Custom library
        $this->load->library("settings_option_handler");
        //}
    }

    function index() {
        if ($this->session->userdata('EMPLOYEE_LOGGED_IN')) {
            redirect(base_url() . 'index.php/dashboard/dashboard_controller/');
//            $this->template->load('template/main_template');
        } else {

            $this->template->load('template/login');
        }
    }

    //Login details checking function 
    function authenticate_user() {

        $setting_login_type_id = '1'; //setting id 1 = User Login Options , in main_settings table

        $employee_model = new Employee_model();
        $employee_service = new Employee_service();

        $email = $this->input->post('login_username', TRUE);

        // set user name with @lankacom.net
//        $username_arr = explode('@', $email);
//        if (!isset($username_arr[1])) {
//            $email = $username_arr[0] . '@gmail.com';
//        }
//        $employee_model->set_employee_email($email);
//        $employee_code_compnay_details = $employee_service->get_employee_company_and_code_with_email($employee_model);
        //calling settings_option_handler library's getOption(x,y,z) function to get the set option
        //parameters = setting_id,employee_code,company_id
//        $login_option = $this->settings_option_handler->get_option($setting_login_type_id, $employee_code_compnay_details->employee_code, $employee_code_compnay_details->company_code);

        $login_option =  $this->config->item('LOGIN_OPTION');
        // 1 = Username & Password
        if ($login_option == 1) {
            //  $logged_user_result = '';
            $employee_model->set_employee_email($email);
            $employee_model->set_employee_password(md5($this->input->post('login_password', TRUE))); // password md 5 change 

            if (count($employee_service->authenticate_user_with_password($employee_model)) == 0) {
                $logged_user_result = false;
            } else {
                $logged_user_result = true;
            }
            //  echo 'user '.$logged_user_result.'dd';
        }

        // 2 = Active Directory Authentication
        if ($login_option == 2) {
            // echo "ela";
            //echo $login_option;
            //die();

            $logged_user_result = true;
            $employee_model->set_employee_email($email);
            //$employeemodel->setPassword(md5($this->input->post('login_password', TRUE))); // password md 5 change 
        }

        // 3 = Corporate Email authentication
        if ($login_option == 3) {


            $employee_model->set_employee_email($email);
            $employee_model->set_employee_password($this->input->post('login_password', TRUE)); // password md 5 change

            $mailServer = $employee_service->get_server_by_email($employee_model);

            //$logged_user_result = $this->authenticateUserEmail($employeemodel,$this->config->item('MAILBOX'));// chamge
            //echo $logged_user_details->server;die;

            if ($mailServer == 1) {
                $logged_user_result = $this->authenticate_user_email($employee_model, $this->config->item('MAILBOX'));
            } else if ($mailServer == 2) {
                $logged_user_result = $this->authenticate_user_email($employee_model, $this->config->item('MAILBOX2'));
            } else {
                $logged_user_result = FALSE;
            }
        }




        /* Remove Imap authenticate error login with some machine */
        // $logged_user_result =  true;
        if ($logged_user_result) {// chamge
            $logged_user_details = $employee_service->authenticate_user($employee_model);
//print_r($logged_user_details);



            if (count($logged_user_details) == 0) {

                echo 0;
            } else {

                $emp_login_status_model = new Employee_model();
                $emp_login_status_model->set_is_online('Y');
                $emp_login_status_model->set_employee_code($logged_user_details->employee_code);
                $employee_service->update_online_status($emp_login_status_model);
                //Setting sessions		
                $this->session->set_userdata('EMPLOYEE_CODE', $logged_user_details->employee_code);
//                $this->session->set_userdata('EMPLOYEE_WELCOME', $logged_user_details->preferred_welcome_sys);
                $this->session->set_userdata('EMPLOYEE_FIRST', '1'); //check first time log in and redirect to welcome page
                $this->session->set_userdata('EMPLOYEE_NAME', $logged_user_details->employee_fname . ' ' . $logged_user_details->employee_lname);
                $this->session->set_userdata('EMPLOYEE_FNAME', $logged_user_details->employee_fname);
                $this->session->set_userdata('EMPLOYEE_LNAME', $logged_user_details->employee_lname);
                $this->session->set_userdata('EMPLOYEE_EMAIL', $logged_user_details->employee_email);
                $this->session->set_userdata('EMPLOYEE_PROPIC', $logged_user_details->employee_avatar);
                $this->session->set_userdata('EMPLOYEE_COVERPIC', $logged_user_details->employee_cover_image);
                $this->session->set_userdata('EMPLOYEE_COMPANY_CODE', $logged_user_details->company_code);
                $this->session->set_userdata('EMPLOYEE_COMPANY_NAME', $logged_user_details->company_name);
                $this->session->set_userdata('EMPLOYEE_TYPE', $logged_user_details->employee_type);
                $this->session->set_userdata('EMPLOYEE_ONLINE', 'Y');


                //checking gor teh DOB and saving  a note in a session , LCS_EMPLOYEE_BD
                $bd = explode("-", $logged_user_details->employee_bday);

                if ($bd[1] . '-' . $bd[2] == date('m-d')) {
                    $this->session->set_userdata('EMPLOYEE_BD', 'Y');
                }
                $this->session->set_userdata('EMPLOYEE_LOGGED_IN', 'TRUE');



                echo 1;
            }
        } else {
            echo 0;
        }// if($logged_user_result){
    }

    function get_email_user($employeemodel) {// change chamika
        $username_arr = explode('@', $employeemodel->getEmail());


        $this->username = $username_arr[0];
        return $this->username;
    }

    function logout() {

        $emp_login_status_model = new Employee_model();
        $employee_service = new Employee_service();

        $emp_login_status_model->set_is_online('N');
        $emp_login_status_model->set_employee_code($this->session->userdata('EMPLOYEE_CODE'));

        $employee_service->update_online_status($emp_login_status_model);

        $this->session->sess_destroy();
        redirect(site_url() . '/login/login_controller');
    }

    // chamge
    function authenticate_user_email($employee_model, $mail_box) {
//
//        // imap_timeout(IMAP_OPENTIMEOUT,10);
//        $conn = imap_open($mailbox, $this->getEmailUser($employeemodel), $employeemodel->getPassword(), null) or die();
//
//        if ($conn) {
//            $result = TRUE;
//        } else {
//            $result = FALSE;
//        }
//
//
//        imap_close($conn);
        $result = TRUE;

        return $result;
    }

    /*
     * Api Methods for User Login
     */

    /*
     * Login details checking function for desktop client
     * if username and password wrong
     * or there's no such user according to that username or pasword 
     * this function will return 0
     * otherwise return users' employee code 
     * as the correct authentication.
     */

    function authenticate_user_by_desktop_client() {

        $setting_login_type_id = '1'; //setting id 1 = User Login Options , in main_settings table

        $employee_model = new Employee_model();
        $employee_service = new Employee_service();

        $email = $this->input->post('login_username', TRUE);

        // set user name with @lankacom.net
        $username_arr = explode('@', $email);
        if (!isset($username_arr[1])) {
            $email = $username_arr[0] . '@gmail.com';
        }

        $employee_model->set_employee_email($email);
        $employee_code_compnay_details = $employee_service->get_employee_company_and_code_with_email($employee_model);

        //calling settings_option_handler library's getOption(x,y,z) function to get the set option
        //parameters = setting_id,employee_code,company_id
//        $login_option = $this->settings_option_handler->get_option($setting_login_type_id, $employee_code_compnay_details->employee_code, $employee_code_compnay_details->company_code);
        $login_option = 1;

        // 1 = Username & Password
        if ($login_option == 1) {


            $employee_model->set_employee_email($email);
            $employee_model->set_employee_password(md5($this->input->post('login_password', TRUE))); // password md 5 change 

            if (count($employee_service->authenticate_user_with_password($employee_model)) == 0) {
                $logged_user_result = false;
            } else {
                $logged_user_result = true;
            }
        }


        /* Remove Imap authenticate error login with some machine */
        // $logged_user_result =  true;
        if ($logged_user_result) {
            $logged_user_details = $employee_service->authenticate_user($employee_model);

            if (count($logged_user_details) == 0) {

                echo '0';
                die;
            } else {

                echo json_encode($logged_user_details);
            }
        } else {
            echo '0';
            die;
        }
    }

}
