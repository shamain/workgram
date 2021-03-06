<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Employee_screenshots_controller extends CI_Controller {

    function __construct() {
        parent::__construct();

        if (!$this->session->userdata('EMPLOYEE_LOGGED_IN')) {
            redirect(site_url() . '/login/login_controller');
        } else {
            $this->load->model('employee/employee_model');
            $this->load->model('employee/employee_service');

            $this->load->model('project/project_model');
            $this->load->model('project/project_service');

            $this->load->model('task/task_model');
            $this->load->model('task/task_service');

            $this->load->model('worker/worker_model');
            $this->load->model('worker/worker_service');
        }
    }

    function manage_employee_screenshot() {

        $employee_service = new employee_service();
        $project_service = new project_service();
        $task_service = new task_service();
        $worker_service = new Worker_service();

        $data['heading'] = "Work Snaps";
        $data['employees'] = $employee_service->get_employees_by_company_id_manage($this->session->userdata('EMPLOYEE_COMPANY_CODE'));
        $data['projects'] = $project_service->get_all_projects_for_company($this->session->userdata('EMPLOYEE_COMPANY_CODE'));
        $data['tasks'] = $task_service->get_employee_task_by_project($this->session->userdata('EMPLOYEE_CODE'));
        $data['my_screen_shots'] = $worker_service->get_screen_shotsfor_user($this->session->userdata('EMPLOYEE_CODE'));

        $username_arr = explode('@', $this->session->userdata('EMPLOYEE_EMAIL'));
        if (!isset($username_arr[1])) {
            $email = $username_arr[0] . '@gmail.com';
        }


        $data['user_name'] = $username_arr[0];

        $partials = array('content' => 'employee_screenshots/screenshot_view');
        $this->template->load('template/main_template', $partials, $data);
    }
    
    
 }

