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
        }
    }

    function manage_employee_screenshot() {

        $employee_service = new employee_service();
        $project_service = new project_service();
        $task_service = new task_service();

        $data['heading'] = "Work Snaps";
        $data['employees'] = $employee_service->get_employees_by_company_id_manage($this->session->userdata('EMPLOYEE_COMPANY_CODE'));
        $data['projects'] = $project_service->get_all_projects_for_company($this->session->userdata('EMPLOYEE_COMPANY_CODE'));
        $data['tasks'] = $task_service->get_employee_task_by_project($this->session->userdata('EMPLOYEE_COMPANY_CODE'));
        
        $partials = array('content' => 'employee_screenshots/screenshot_view');
        $this->template->load('template/main_template', $partials, $data);
    }
    
    
    
    /*
     * API method
     * get data from desktop client and save in database
     */
    function submit_shot_data(){
        $worker_model = new Worker_model();
        $worker_service = new Worker_service();
        
        $worker_model->set_emp_code($this->input->post('emp_code', TRUE));
        $worker_model->set_worker_date($this->input->post('worker_date', TRUE));
        $worker_model->set_worker_project_id($this->input->post('project_id', TRUE));
        $worker_model->set_worker_project_task_id($this->input->post('task_id', TRUE));
        $worker_model->set_worker_shot_name($this->input->post('shot_name', TRUE));
        $worker_model->set_del_ind('1');
        
        $worker_service->add_worker_detail($worker_model);
        
    }

}

