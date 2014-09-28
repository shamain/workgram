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
            
             $this->load->model('wages_category/wages_category_model');
             $this->load->model('wages_category/wages_category_service');
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
    
/* 
 * this function use to get employee by company
 */
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
    
/* this function use to get filter data 
 * and dispay payment status on button
 */
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
            $months[] = date('M', strtotime("+$i month", $year));
        }
        foreach ($emp_array as $emp) {

            $temp['employee'] = ucfirst($emp->employee_fname . ' ' . $emp->employee_lname);
            $temp['employee_code'] = $emp->employee_code;
            $wage_array = array();
            $t_array = array();
            foreach ($months as $month) {
                $employee_payment_model->set_employee_code($emp->employee_code);
                $employee_payment_model->set_year_month($year.date('-m-01', strtotime($month)));
                $wages_details = $employee_payment_service->get_employee_payment($employee_payment_model);

                $wage_array['wage_month'] = date('Y-m-01', strtotime(date('M', strtotime($month)) . ' ' . $year));

                if (!empty($wages_details)) {
                    if ($wages_details->is_paid == 'Y') {
                        $wage_array['wage_status'] = 'PAID';
                    } else {
                        $wage_array['wage_status'] = 'NOT PAID';
                    }
                } else {
                    $wage_array['wage_status'] = 'NOT PAID';
                }
                $t_array[] = $wage_array;
            }
            $temp['wage'] = $t_array;
            $results[] = $temp;
        }

        $data['months'] = $months;
        $data['results'] = $results;

        $this->load->view('wages/wages_filter_view', $data);
    }

    
    function add_new_payments() {
//        $perm = Access_controllerservice :: checkAccess('ADD_COMPANY');
//        if ($perm) {

        $employee_payment_model = new employee_payment_model();
        $employee_payment_service = new employee_payment_service();

        $employee_payment_model->set_pay_id($this->input->post('pay_id', TRUE));
        $employee_payment_model->set_employee_code($this->input->post('employee_code', TRUE));
        $employee_payment_model->set_company_code($this->input->post('company_code', TRUE));
        $employee_payment_model->set_wages_category_id($this->input->post('wages_category_id', TRUE));
        $employee_payment_model->set_year_month(($this->input->post('year_month', TRUE)));
        $employee_payment_model->set_amount($this->input->post('amount', TRUE));
        $employee_payment_model->set_is_paid($this->input->post('is_paid', TRUE));

        echo $employee_payment_service->add_new_payment($employee_payment_model);
    }
/*this function use for get data 
 * to payment pop up model 
 *  */
    function get_wages_details_for_employee() {
        $employee_payment_model = new employee_payment_model();
        $employee_payment_service = new employee_payment_service();
        $employee_service = new Employee_service();
        $wages_category_service = new wages_category_service();

        $employee_payment_model->set_employee_code($this->input->post('employee_code', TRUE));
        $employee_payment_model->set_year_month(($this->input->post('year_month', TRUE)));

        $payment_detail = $employee_payment_service->get_payments_by_employee_id_and_month($employee_payment_model);
        $data['employee'] = $employee_service->get_employee_by_id($this->input->post('employee_code', TRUE));
        $data['year'] = $this->input->post('year_month', TRUE);
        $data['payment_detail'] = $payment_detail;
        if (!empty($payment_detail)) {
            $wages_detail=$wages_category_service->get_wages_category_by_id($payment_detail->wages_category_id);
            $data['wages_detail'] = $wages_detail;
        }

        $data['worked_hours']=0;
        $this->load->view('wages/wages_monthly_pop_up_view', $data);
    }

    
    /*
     * Printing reports 
     */
   
     public function print_wages_pdf_report() {
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
            $months[] = date('M', strtotime("+$i month", $year));
        }
        foreach ($emp_array as $emp) {

            $temp['employee'] = ucfirst($emp->employee_fname . ' ' . $emp->employee_lname);
            $temp['employee_code'] = $emp->employee_code;
            $wage_array = array();
            $t_array = array();
            foreach ($months as $month) {
                $employee_payment_model->set_employee_code($emp->employee_code);
                $employee_payment_model->set_year_month($year.date('-m-01', strtotime($month)));
                $wages_details = $employee_payment_service->get_employee_payment($employee_payment_model);

                $wage_array['wage_month'] = date('Y-m-01', strtotime(date('M', strtotime($month)) . ' ' . $year));

                if (!empty($wages_details)) {
                    if ($wages_details->is_paid == 'Y') {
                        $wage_array['wage_status'] = 'PAID';
                    } else {
                        $wage_array['wage_status'] = 'NOT PAID';
                    }
                } else {
                    $wage_array['wage_status'] = 'NOT PAID';
                }
                $t_array[] = $wage_array;
            }
            $temp['wage'] = $t_array;
            $results[] = $temp;
        }

        

        $data['year'] = $year;
        $data['results'] = $results;
        $data['year']=$year;
        
        $data['title'] = 'Wages Report';
        $SResultString = $this->load->view('reports/view_wages_report', $data, TRUE);
        $footer = $this->load->view('reports/pdf_footer', $data, TRUE);
        $this->load->library('MPDF56/mpdf');
        $mpdf=new mPDF('utf-8', 'A4-L');
        $mpdf->SetDisplayMode('fullpage');
        $mpdf->SetFooter($footer);
        $mpdf->WriteHTML($SResultString);
        $mpdf->Output();
    }



}
