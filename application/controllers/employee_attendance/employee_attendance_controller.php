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

    function manage_employee_attendance() {
        $employee_service = new employee_service();

        $data['heading'] = "Manage Employee Attendance";
        $data['employees'] = $employee_service->get_employees_by_company_id_manage($this->session->userdata('EMPLOYEE_COMPANY_CODE'));

        $partials = array('content' => 'employee_attendance/manage_employee_attendance_view');
        $this->template->load('template/main_template', $partials, $data);
    }

    function view_employee_attendance_report() {

        $employee_service = new employee_service();
        $employee_attendance_service = new Employee_attendance_service();

        $data['heading'] = "Attendance Summary";
        $data['attendance'] = '';
        $data['employees'] = $employee_service->get_employees_by_company_id_manage($this->session->userdata('EMPLOYEE_COMPANY_CODE'));


        $partials = array('content' => 'reports/employee_attendance_report');
        $this->template->load('template/main_template', $partials, $data);
    }

    function get_dates_for_employee_attendance_filter() {



        $employee_attendance_model = new Employee_attendance_model();
        $employee_attendance_service = new Employee_attendance_service();

        $emp_code = $this->input->post('emp_code');
        $att_filter_m_picker = $this->input->post('date');

        $num_of_days = date('t',  strtotime($att_filter_m_picker));

        $result =array();
        for ($i = 1; $i <= $num_of_days; $i++){
            $dates[] = date('Y',strtotime($att_filter_m_picker)) . "-" . date('m',strtotime($att_filter_m_picker)) . "-" . str_pad($i, 2, '0', STR_PAD_LEFT);
        }
        $data['dates']=$dates;

        $employee_attendance_model->set_employee_code($emp_code);

        $data[''] = '';

        $this->load->view('employee_attendance/employee_attendance_filter_view', $data);
    }

}

?>