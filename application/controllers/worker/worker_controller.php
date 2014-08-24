<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Worker_controller extends CI_Controller {

    function __construct() {
        parent::__construct();

        $this->load->model('employee_task/employee_task_model');
        $this->load->model('employee_task/employee_task_service');

        $this->load->model('worker/worker_model');
        $this->load->model('worker/worker_service');

        $this->load->model('task/task_model');
        $this->load->model('task/task_service');
    }

    /*
     * API method
     * get data from desktop client and save in database
     */

    function submit_shot_data() {

        $worker_model = new Worker_model();
        $worker_service = new Worker_service();

        $worker_model->set_emp_code($this->input->post('emp_code', TRUE));
        $worker_model->set_worker_date($this->input->post('worker_date', TRUE));
        $worker_model->set_worker_project_id($this->input->post('project_id', TRUE));
        $worker_model->set_worker_project_task_id($this->input->post('task_id', TRUE));
        $worker_model->set_worker_shot_name($this->input->post('shot_name', TRUE));
        $worker_model->set_del_ind('1');

        echo $worker_service->add_worker_detail($worker_model);
    }

    function set_task_status() {

        $task_model = new Task_model();
        $task_service = new Task_service();

        $task_model->set_task_id($this->input->post('task_id', TRUE));


//        echo $task_service->
    }

}

