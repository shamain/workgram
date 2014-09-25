<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Employee_attendance_controller extends CI_Controller {

    function __construct() {
        parent::__construct();

        if (!$this->session->userdata('EMPLOYEE_LOGGED_IN')) {
            redirect(site_url() . '/login/login_controller');
        } else {

            $this->load->model('employee/employee_model');
            $this->load->model('employee/employee_service');

            $this->load->model('employee_attendance/employee_attendance_model');
            $this->load->model('employee_attendance/employee_attendance_service');
        }
    }

    /*
     * This function is to display the attendance of employees
     */
    function manage_employee_attendance() {
        $employee_service = new employee_service();

        $data['heading'] = "Manage Employee Attendance";
        $data['employees'] = $employee_service->get_employees_by_company_id_manage($this->session->userdata('EMPLOYEE_COMPANY_CODE'));

        $partials = array('content' => 'employee_attendance/manage_employee_attendance_view');
        $this->template->load('template/main_template', $partials, $data);
    }

    
    /*
     * Viewing reports
     */
    function view_employee_attendance_report() {

        $employee_service = new employee_service();
        $employee_attendance_service = new Employee_attendance_service();

        $data['heading'] = "Attendance Summary";
        $data['attendance'] = '';
        $data['employees'] = $employee_service->get_employees_by_company_id_manage($this->session->userdata('EMPLOYEE_COMPANY_CODE'));


        $partials = array('content' => 'reports/employee_attendance_report');
        $this->template->load('template/main_template', $partials, $data);
    }

    
    /*
     * This function is to get dates for employee attendance
     */
    function get_dates_for_employee_attendance_filter() {


        $employee_service = new employee_service();
        $employee_attendance_model = new Employee_attendance_model();
        $employee_attendance_service = new Employee_attendance_service();

        $emp_code = $this->input->post('emp_code');
        $att_filter_m_picker = $this->input->post('date');



        $results = array();
        $emp_array = array();
        $num_of_days = date('t', strtotime($att_filter_m_picker));

        if ($emp_code != '') {
            $emp_array[] = $employee_service->get_employee($emp_code);
        } else {
            $emp_array = $employee_service->get_employees_by_company_id_manage($this->session->userdata('EMPLOYEE_COMPANY_CODE'));
        }

        for ($i = 1; $i <= $num_of_days; $i++) {
            $dates[] = date('Y', strtotime($att_filter_m_picker)) . "-" . date('m', strtotime($att_filter_m_picker)) . "-" . str_pad($i, 2, '0', STR_PAD_LEFT);
        }

        foreach ($emp_array as $emp) {

            $temp['employee'] = ucfirst($emp->employee_fname . ' ' . $emp->employee_lname);
            $atn_array = array();
            foreach ($dates as $date) {
                $employee_attendance_model->set_employee_code($emp->employee_code);
                $employee_attendance_model->set_date($date);
                $attendance = $employee_attendance_service->get_employee_attendance($employee_attendance_model);
                if (!empty($attendance)) {
                    $atn_array[] = $attendance->type;
                } else {
                    $atn_array[] = $this->config->item('ABSENT');
                }
            }
            $temp['atn'] = $atn_array;
            $results[] = $temp;
        }

        $data['dates'] = $dates;
        $data['results'] = $results;

        $this->load->view('employee_attendance/employee_attendance_filter_view', $data);
    }

    
    /*
     * This function is to print attendance report
     */
    public function print_attendance_pdf_report() {
        $employee_service = new employee_service();
        $employee_attendance_model = new Employee_attendance_model();
        $employee_attendance_service = new Employee_attendance_service();

        $emp_code = $this->input->get('emp_code');
        $att_filter_m_picker = $this->input->get('date');

        $results = array();
        $emp_array = array();
        $num_of_days = date('t', strtotime($att_filter_m_picker));

        if ($emp_code != '') {
            $emp_array[] = $employee_service->get_employee($emp_code);
        } else {
            $emp_array = $employee_service->get_employees_by_company_id_manage($this->session->userdata('EMPLOYEE_COMPANY_CODE'));
        }

        for ($i = 1; $i <= $num_of_days; $i++) {
            $dates[] = date('Y', strtotime($att_filter_m_picker)) . "-" . date('m', strtotime($att_filter_m_picker)) . "-" . str_pad($i, 2, '0', STR_PAD_LEFT);
        }

        foreach ($emp_array as $emp) {

            $temp['employee'] = ucfirst($emp->employee_fname . ' ' . $emp->employee_lname);
            $atn_array = array();
            foreach ($dates as $date) {
                $employee_attendance_model->set_employee_code($emp->employee_code);
                $employee_attendance_model->set_date($date);
                $attendance = $employee_attendance_service->get_employee_attendance($employee_attendance_model);
                if (!empty($attendance)) {
                    $atn_array[] = $attendance->type;
                } else {
                    $atn_array[] = $this->config->item('ABSENT');
                }
            }
            $temp['atn'] = $atn_array;
            $results[] = $temp;
        }

        $data['dates'] = $dates;
        $data['results'] = $results;
        
        $data['title'] = 'Attendance Report';
        $SResultString = $this->load->view('reports/view_attendance_report', $data, TRUE);
        $footer = $this->load->view('reports/pdf_footer', $data, TRUE);
        $this->load->library('MPDF56/mpdf');
        $mpdf=new mPDF('utf-8', 'A4-L');
        $mpdf->SetDisplayMode('fullpage');
        $mpdf->SetFooter($footer);
        $mpdf->WriteHTML($SResultString);
        $mpdf->Output();
    }

}

?>