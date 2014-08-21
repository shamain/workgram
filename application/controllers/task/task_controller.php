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

            $this->load->model('task_comment/task_comment_model');
            $this->load->model('task_comment/task_comment_service');

            $this->load->model('employee_task/employee_task_model');
            $this->load->model('employee_task/employee_task_service');

            $this->load->model('employee/employee_model');
            $this->load->model('employee/employee_service');

            $this->load->model('project_stuff/project_stuff_model');
            $this->load->model('project_stuff/project_stuff_service');

            $this->load->helper('date');
        }
    }

    function view_task_for_projects($project_id) {

        $project_service = new Project_service();
        $task_service = new Task_service();
        $employee_service = new employee_service();
        $project_stuff_service = new Project_stuff_service();

        $project = $project_service->get_project_by_id($project_id);

        $data['project'] = $project;
        $data['project_admin'] = $employee_service->get_employee_by_id($project->added_by);
        $data['tasks'] = $task_service->get_tasks_for_project($project_id);
        $data['project_stuff'] = $project_stuff_service->get_projects_stuff_for_project($project_id);

        $partials = array('content' => 'task/project_task_view');
        $this->template->load('template/main_template', $partials, $data);
    }

    function view_task_detail_view($task_id) {

        $task_service = new Task_service();
        $task_comment_service = new Task_comment_service();
        $employee_task_service = new Employee_task_service();


        $data['task_id'] = $task_id;
        $task = $task_service->get_task_by_id($task_id);
        $data['task'] = $task;
        $data['task_comments'] = $task_comment_service->get_task_comments($task_id);
        $data['employees_for_task'] = $employee_task_service->get_employees_for_task($task_id);

        $remain_dates = '';

        if (!empty($task)) {
            $task_dead_line = strtotime($task->task_deadline);
            $now = time();
            $remain_dates = timespan($now, $task_dead_line);
        }

        $data['remain_dates'] = $remain_dates;


        $partials = array('content' => 'task/task_detail_view');
        $this->template->load('template/main_template', $partials, $data);
    }

    function add_task() {

        $task_model = new Task_model();
        $task_service = new Task_service();

        $task_model->set_task_name($this->input->post('task_name', TRUE));
        $task_model->set_task_description($this->input->post('task_description', TRUE));
        $task_model->set_project_id($this->input->post('project_id', TRUE));
        $task_model->set_task_deadline($this->input->post('task_deadline', TRUE));
        $task_model->set_task_priority($this->input->post('task_priority', TRUE));
        $task_model->set_task_progress($this->input->post('task_progress', TRUE));
        $task_model->set_del_ind('1');
        $task_model->set_added_date(date("Y-m-d H:i:s"));
        $task_model->set_added_by($this->session->userdata('EMPLOYEE_CODE'));

        echo $task_service->add_new_task($task_model);
    }

    function delete_task() {

        $task_service = new Task_service();

        echo $task_service->delete_task(trim($this->input->post('id', TRUE)));
    }

    function edit_task() {

        $task_model = new Task_model();
        $task_service = new Task_service();

        $task_model->set_task_name($this->input->post('task_name', TRUE));
        $task_model->set_task_description($this->input->post('task_description', TRUE));
        $task_model->set_project_id($this->input->post('project_id', TRUE));
        $task_model->set_task_deadline($this->input->post('task_deadline', TRUE));
        $task_model->set_task_priority($this->input->post('task_priority', TRUE));
        $task_model->set_task_progress($this->input->post('task_progress', TRUE));


        $task_model->set_task_id($this->input->post('task_id', TRUE));

        echo $task_service->update_task($task_model);
    }

    function add_task_comment() {

        $task_comment_model = new Task_comment_model();
        $task_comment_service = new Task_comment_service();

        $task_comment_model->set_comment($this->input->post('msg', TRUE));
        $task_comment_model->set_task_id($this->input->post('task_id', TRUE));
        $task_comment_model->set_del_ind('1');
        $task_comment_model->set_added_date(date("Y-m-d H:i:s"));
        $task_comment_model->set_added_by($this->input->post('employee_code', TRUE));

        echo $task_comment_service->add_new_task($task_comment_model);
    }

}
