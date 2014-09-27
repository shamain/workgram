<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Dashboard_controller extends CI_Controller {

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

        if (!$this->session->userdata('EMPLOYEE_LOGGED_IN')) {
            redirect(site_url() . '/login/login_controller');
        } else {

            $this->load->model('employee/employee_model');
            $this->load->model('employee/employee_service');

            $this->load->model('access_controll/access_controll_model');
            $this->load->model('access_controll/access_controll_service');
        }
    }

    function index() {
        $employee_service = new Employee_service();

        $data['company'] = $this->session->userdata('EMPLOYEE_COMPANY_NAME');
        $this->session->set_userdata('LCS_SYSTEM', 3);
        $this->session->set_userdata('LCS_PARENT_SYSTEM', 7);
        $data['employees'] = $employee_service->get_employees_by_company_id($this->session->userdata('EMPLOYEE_COMPANY_CODE'));

        $partials = array('content' => 'dashboard/dashboard_view');
        $this->template->load('template/main_template', $partials, $data);
    }

}