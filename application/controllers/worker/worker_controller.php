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

        $this->load->model('project/project_model');
        $this->load->model('project/project_service');
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

        $employee_task_model = new Employee_task_model();
        $employee_task_service = new Employee_task_service();

        $employee_task_model->set_employee_id($this->input->post('employee_code', TRUE));
        $employee_task_model->set_task_id($this->input->post('task_id', TRUE));
        $employee_task_model->set_task_status($this->input->post('task_status', TRUE));


        echo $employee_task_service->update_employee_task_status($employee_task_model);
    }

    function get_screenshot() {

        $worker_model = new Worker_model();
        $worker_service = new Worker_service();

        $employee = $this->input->post('employee', TRUE);
        $project = $this->input->post('project', TRUE);
        $task = $this->input->post('task', TRUE);

        $employee = str_replace(' ', ',', $employee);
        $project = str_replace(' ', ',', $project);
        $task = str_replace(' ', ',', $task);

        $worker_model->get_emp_code($employee);
        $worker_model->set_worker_project_id($project);
        $worker_model->set_worker_project_task_id($task);

        $data['my_screen_shots'] = $worker_service->filter_screen_shotsfor_user($worker_model);
        $username_arr = explode('@', $this->session->userdata('EMPLOYEE_EMAIL'));
        if (!isset($username_arr[1])) {
            $email = $username_arr[0] . '@gmail.com';
        }


        $data['user_name'] = $username_arr[0];

        echo $this->load->view('employee_screenshots/screenshot_filter_view', $data);
    }

    function get_employee_filter_data() {
        $project_service = new Project_service();

        $dimension = $this->input->post('dimension', TRUE);
        $filterString = $this->input->post('filterString', TRUE);
        $filterString = str_replace(' ', ',', $filterString);

        $projects = $project_service->get_projects_for_employee($filterString);
        ?>
        <li class="active" data-filter="all" data-dimension="project"><a href="#">All</a></li>

        <?php
        foreach ($projects as $project) {
            ?>
            <li data-filter = "<?php echo $project->project_id; ?>" data-dimension = "project"><a href = "#"><?php echo ucfirst($project->project_name); ?></a></li>
            <?php
        }
    }

    function get_project_filter_data() {
        $task_service = new Task_service();

        $dimension = $this->input->post('dimension', TRUE);
        $filterString = $this->input->post('filterString', TRUE);
        $filterString = str_replace(' ', ',', $filterString);

        $projects = $task_service->get_tasks_for_project_and_employee($filterString,'');
        ?>
        <li class="active" data-filter="all" data-dimension="project"><a href="#">All</a></li>

        <?php
        foreach ($projects as $project) {
            ?>
            <li data-filter = "<?php echo $project->project_id; ?>" data-dimension = "project"><a href = "#"><?php echo ucfirst($project->project_name); ?></a></li>
            <?php
        }
    }

}
