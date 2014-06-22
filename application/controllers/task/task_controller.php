<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Task_controller extends CI_Controller {

    function __construct() {
        parent::__construct();

        if (!$this->session->userdata('EMPLOYEE_LOGGED_IN')) {
            redirect(site_url() . '/login/login_controller');
        } else {
            $this->load->model('project/project_model');
            $this->load->model('project/project_service');

            $this->load->model('task/task_model');
            $this->load->model('task/task_service');
        }
    }

    function view_task_for_projects($project_id) {

        $project_service = new Project_service();
        $task_service = new Task_service();

        $data['project'] = $project_service->get_project_by_id($project_id);
        $data['tasks'] = $task_service->get_tasks_for_project($project_id);

        $partials = array('content' => 'task/project_task_view');
        $this->template->load('template/main_template', $partials, $data);
    }

}
