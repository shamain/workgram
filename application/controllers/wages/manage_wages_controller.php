<?php
if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class manage_wages_controller extends CI_Controller {

    function __construct() {
        parent::__construct();

        if (!$this->session->userdata('EMPLOYEE_LOGGED_IN')) {
            redirect(site_url() . '/login/login_controller');
        } else {
            $this->load->model('employee/employee_model');
            $this->load->model('employee/employee_service');

            $this->load->model('company/company_model');
            $this->load->model('company/company_service');

            $this->load->model('employee_payment/employee_payment_model');
            $this->load->model('employee_payment/employee_payment_service');
        }
    }

    function manage_wages() {

        $employee_service = new employee_service();
        $company_service = new company_service();


        $data['heading'] = "Wages Management";
        $data['employees'] = $employee_service->get_employees_by_company_id_manage($this->session->userdata('EMPLOYEE_COMPANY_CODE'));
        $data['companies'] = $company_service->get_all_companies($this->session->userdata('EMPLOYEE_COMPANY_CODE'));


        $partials = array('content' => 'wages/manage_wages_view');
        $this->template->load('template/main_template', $partials, $data);
    }

    function get_employee_by_company() {
        $employee_model = new employee_model();
        $employee_service = new employee_service();

        $company_code = $this->input->post('company_code');

        $employees = $employee_service->get_employees_by_company_id_manage($company_code);
        ?>
        <option value="">-- Select Employees --</option>
        <?php foreach ($employees as $employee) { ?>
            <option value="<?php echo $employee->employee_code ?>"><?php echo $employee->employee_fname . ' ' . $employee->employee_lname; ?></option>
            <?php
        }
        ?>
        <?php
    }

    function get_employee_payment() {


        $employee_service = new employee_service();
        $employee_payment_model = new employee_payment_model();
        $employee_payment_service = new employee_payment_service();

        $company_code = $this->input->post('company_code');
        $emp_code = $this->input->post('employee_code');
        $year = $this->input->post('year');

        $results = array();
        $emp_array = array();
        $num_of_months = 12;

        if ($emp_code != '') {
            $emp_array[] = $employee_service->get_employee($emp_code);
        } else {
            $emp_array = $employee_service->get_employees_by_company_id_manage($this->session->userdata('EMPLOYEE_COMPANY_CODE'));
        }

        for ($i = 0; $i < $num_of_months; $i++) {
            $months[] = date('M',strtotime("+$i month", $year));
        }
        foreach ($emp_array as $emp) {

            $temp['employee'] = ucfirst($emp->employee_fname . ' ' . $emp->employee_lname);
            $wage_array = array();
            foreach ($months as $month) {
                $employee_payment_model->set_employee_code($emp->employee_code); 
                $employee_payment_model->set_year_month($month);
                $wages_details= $employee_payment_service->get_employee_payment($employee_payment_model);
               
                if (!empty($wages_details)) {
                    $wage_array[] = $wages_details->type;
                }                  
                  else if ($wage_array[]=$this->config->item('is_paid')==true){
                             $wages_details = $this->config->item('PAID');
                } else if ($wage_array[]=$this->config->item('is_paid')==false){
                             $wages_details= $this->config->item('NOT_PAID');
                } 
            
            $temp['wage'] = $wage_array;
            $results[] = $temp;
        }

        $data['months'] = $months;
        $data['results'] = $results;

        $this->load->view('wages/wages_filter_view', $data);
    }

    }}