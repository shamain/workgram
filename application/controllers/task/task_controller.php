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

            $this->load->model('employee_task/employee_task_model');
            $this->load->model('employee_task/employee_task_service');
        }
    }

    function view_task_for_projects($project_id) {

        $project_service = new Project_service();
        $task_service = new Task_service();
        $employee_service = new employee_service();

        $project = $project_service->get_project_by_id($project_id);

        $data['project'] = $project;
        $data['project_admin'] = $employee_service->get_employee_by_id($project->added_by);
        $data['tasks'] = $task_service->get_tasks_for_project($project_id);

        $partials = array('content' => 'task/project_task_view');
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

}
