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
//        $this->load->model('IMS/Employee/Employeemodel');
//        $this->load->model('IMS/Employee/Employeeservice');
//        $this->load->model('IMS/EmployeeDepartments/Employeedepartmentsmodel');
//        $this->load->model('IMS/EmployeeDepartments/Employeedepartmentservice');
//
//        $this->load->model('IMS/Department/departmentmodel');
//        $this->load->model('IMS/Department/departmentservice');
        //Settings Options handling library - Custom library
//        $this->load->library("settings_option_handler");
        //}
    }

    function index() {
        if ($this->session->userdata('EMPLOYEE_LOGGED_IN')) {
            redirect(base_url() . 'index.php/TA/dashboard_controller/');
        } else {

            $this->template->load('template/login');
        }
    }

    //Login details checking function 
    function authenticateUser() {

        $setting_login_type_id = '1'; //setting id 1 = User Login Options , in main_settings table

        $employeemodel = new Employeemodel();
        $employeeservice = new Employeeservice();

        $email = $this->input->post('login_username', TRUE);

        // set user name with @lankacom.net
        $username_arr = explode('@', $email);
        if (!isset($username_arr[1])) {
            $email = $username_arr[0] . '@lankacom.net';
        }

        $employeemodel->setEmail($email);
        $employee_code_compnay_details = $employeeservice->getEmployeeCompanyandCodewithEmail($employeemodel);

        //calling settings_option_handler library's getOption(x,y,z) function to get the set option
        //parameters = setting_id,employee_code,company_id

        $login_option = $this->settings_option_handler->getOption($setting_login_type_id, $employee_code_compnay_details->Employee_Code, $employee_code_compnay_details->company_id);


        // 1 = Username & Password
        if ($login_option == 1) {

            //  $logged_user_result = '';
            $employeemodel->setEmail($email);
            $employeemodel->setPassword(md5($this->input->post('login_password', TRUE))); // password md 5 change 

            if (count($employeeservice->authenticateUserwithpassword($employeemodel)) == 0) {
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
            $employeemodel->setEmail($email);
            //$employeemodel->setPassword(md5($this->input->post('login_password', TRUE))); // password md 5 change 
        }

        // 3 = Corporate Email authentication
        if ($login_option == 3) {


            $employeemodel->setEmail($email);
            $employeemodel->setPassword($this->input->post('login_password', TRUE)); // password md 5 change

            $mailServer = $employeeservice->getServerByEmail($employeemodel);

            //$logged_user_result = $this->authenticateUserEmail($employeemodel,$this->config->item('MAILBOX'));// chamge
            //echo $logged_user_details->server;die;

            if ($mailServer == 1) {
                $logged_user_result = $this->authenticateUserEmail($employeemodel, $this->config->item('MAILBOX'));
            } else if ($mailServer == 2) {
                $logged_user_result = $this->authenticateUserEmail($employeemodel, $this->config->item('MAILBOX2'));
            } else {
                $logged_user_result = FALSE;
            }
        }




        /* Remove Imap authenticate error login with some machine */
        // $logged_user_result =  true;
        if ($logged_user_result) {// chamge
            $logged_user_details = $employeeservice->authenticateUser($employeemodel);
//print_r($logged_user_details);
            // get users employee departments
            Employeedepartmentsmodel :: setEmployee_Code($logged_user_details->Employee_Code);


            $employeedepartments = Employeedepartmentservice :: getEmployeedepartments();

            $asigned_departments = array();

            //loop 	 selected employees departments and aisgned department_id into an array
            foreach ($employeedepartments as $rowemployeedepartments) {
                array_push($asigned_departments, $rowemployeedepartments->Department_Code);
            }




            if (count($logged_user_details) == 0) {

                echo 0;
            } else {

                //Setting sessions		
                $this->session->set_userdata('EMPLOYEE_CODE', $logged_user_details->Employee_Code);
                $this->session->set_userdata('EMPLOYEE_WELCOME', $logged_user_details->preferred_welcome_sys);
                $this->session->set_userdata('EMPLOYEE_FIRST', '1'); //check first time log in and redirect to welcome page
                $this->session->set_userdata('EMPLOYEE_NAME', $logged_user_details->Employee_Name);
                $this->session->set_userdata('EMPLOYEE_EMAIL', $logged_user_details->Email);
                $this->session->set_userdata('EMPLOYEE_DEPARTMENTS', $asigned_departments);
                $this->session->set_userdata('EMPLOYEE_PROPIC', $logged_user_details->emp_image);
                $this->session->set_userdata('EMPLOYEE_COMPANY', $logged_user_details->company_id);


                //checking gor teh DOB and saving  a note in a session , LCS_EMPLOYEE_BD
                $bd = explode("-", $logged_user_details->birthday);

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

    function getEmailUser($employeemodel) {// change chamika
        $username_arr = explode('@', $employeemodel->getEmail());


        $this->username = $username_arr[0];
        return $this->username;
    }

    function logout() {

        $this->session->sess_destroy();
        redirect(site_url() . '/login_controller');
    }

    // chamge
    function authenticateUserEmail($employeemodel, $mailbox) {

        // imap_timeout(IMAP_OPENTIMEOUT,10);
        $conn = imap_open($mailbox, $this->getEmailUser($employeemodel), $employeemodel->getPassword(), null) or die();

        if ($conn) {
            $result = TRUE;
        } else {
            $result = FALSE;
        }


        imap_close($conn);

        return $result;
    }

    // chamge
    function getUserdepartments() {

        //echo $this->session->userdata('LCS_EMPLOYEE_CODE');die();
        Employeedepartmentsmodel :: setEmployee_Code($this->session->userdata('EMPLOYEE_CODE'));


        $employeedepartments = Employeedepartmentservice :: getEmployeedepartments_with_departmentstable();


        $this->session->set_userdata('LOGGED_EMPLOYEE_DEPARTMENTS', $employeedepartments);
        ?>
        <h1 class="nx-headline">  Hello,
            <span> <?php echo $this->session->userdata('EMPLOYEE_NAME') ?> </span></h1>
        <?php
        if (count($employeedepartments) == 0) {
            ?>

            You Have Not Assign Any Department.Please Contact Administrator
            <script type="text/javascript">
                setTimeout("location.href = site_url+'/login_controller/logout/'", 1000);
            </script>
            <?php
        } else if (count($employeedepartments) == 1) {
            ?>
            <div class="input-success success png_bg">Your Login successfull.You will be redirected..</div>

            <select class="nx-select" id="Department" name="Department" style="display: none;" >


                <?php foreach ($employeedepartments as $rowdepartments) {
                    ?> 
                    <option value="<?php echo $rowdepartments->Department_Code; ?>"><?php echo $rowdepartments->Department_Name; ?></option>
                <?php } ?>
            </select>

            <script type="text/javascript">
                window.onload = asigndepartment();
                // window.setInterval("asigndepartment()", 1000);
            </script>
            <?php
        } else { //if(count($employeedepartments) == 1)
            ?>

            <script type="text/javascript">
                window.onload = asigndepartment();
                // window.setInterval("asigndepartment()", 1000);
            </script>

            Please select a Department	<select class="nx-select" id="Department" name="Department" onchange="asigndepartment()">

                <!-- <option value="">Please Select</option>       -->
                <?php foreach ($employeedepartments as $rowdepartments) {
                    ?> 
                    <option value="<?php echo $rowdepartments->Department_Code; ?>"><?php echo $rowdepartments->Department_Name; ?></option>
                <?php } ?>
            </select>
            <?php
        }//if(count($employeedepartments) == 0) last else
    }

    function asigndepartment() {

        $department_code = $this->input->post('Department', TRUE);


        Departmentmodel :: setDepartment_Code($department_code);

        $departmentbyid = Departmentservice :: getDepartmentbyid();

        $this->session->set_userdata('EMPLOYEE_MAIN_DEPARTMENT_NAME', $departmentbyid->Department_Name);
        $this->session->set_userdata('EMPLOYEE_MAIN_DEPARTMENTS', $department_code);

        echo 1;
    }

}
