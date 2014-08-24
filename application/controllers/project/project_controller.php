<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Project_controller extends CI_Controller {

    function __construct() {
        parent::__construct();

        
//        if (!$this->session->userdata('EMPLOYEE_LOGGED_IN')) {
//            redirect(site_url() . '/login/login_controller');
//        } else {
        $this->load->model('project/project_model');
        $this->load->model('project/project_service');

        $this->load->model('employee_task/employee_task_model');
        $this->load->model('employee_task/employee_task_service');

        $this->load->model('task/task_model');
        $this->load->model('task/task_service');

        $this->load->model('project_stuff/project_stuff_model');
        $this->load->model('project_stuff/project_stuff_service');

        $this->load->model('project_stuff_temp/project_stuff_temp_model');
        $this->load->model('project_stuff_temp/project_stuff_temp_service');

//        }
    }

    function manage_projects() {

        $project_service = new Project_service();


        $data['heading'] = "Manage Projects";
        $data['projects'] = $project_service->get_all_projects_for_company($this->session->userdata('EMPLOYEE_COMPANY_CODE'));

        $partials = array('content' => 'projects/manage_projects_view');
        $this->template->load('template/main_template', $partials, $data);
    }

    function add_project_view() {
//        $perm = Access_controllerservice :: checkAccess('EDIT_PROJECTS');
//        if ($perm) {


        $data['heading'] = "Add New Project";

        $project_stuff_temp_service = new Project_stuff_temp_service();
        $project_stuff_temp_service->truncate_project_temp_stuff();

        $partials = array('content' => 'projects/add_project_view');
        $this->template->load('template/main_template', $partials, $data);
//        } else {
//            $this->template->load('template/access_denied_page');
//        }
    }

    function add_new_project() {
//        $perm = Access_controllerservice :: checkAccess('ADD_PRIVILEGES');
//        if ($perm) {

        $project_model = new Project_model();
        $project_service = new Project_service();
        $project_stuff_temp_service = new Project_stuff_temp_service();
        $project_stuff_service = new Project_stuff_service();
        $project_stuff_model = new Project_stuff_model();

        $project_temp_stuff = $project_stuff_temp_service->get_all_project_stuff_temp_for_company($this->session->userdata('EMPLOYEE_COMPANY_CODE'));

        $project_model->set_project_name($this->input->post('project_name', TRUE));
        $project_model->set_project_vendor($this->input->post('project_vendor', TRUE));
        $project_model->set_project_start_date($this->input->post('project_start_date', TRUE));
        $project_model->set_project_end_date($this->input->post('project_end_date', TRUE));
        $project_model->set_project_description($this->input->post('project_description', TRUE));
        $project_model->set_project_logo($this->input->post('project_logo', TRUE));
        $project_model->set_company_code($this->session->userdata('EMPLOYEE_COMPANY_CODE'));
        $project_model->set_del_ind('1');
        $project_model->set_added_date(date("Y-m-d H:i:s"));
        $project_model->set_added_by($this->session->userdata('EMPLOYEE_CODE'));



        $project_id = $project_service->add_new_project($project_model);
        $msg = 1;

        foreach ($project_temp_stuff as $stuff) {
            $project_stuff_model->set_stuff_name($stuff->stuff_name);
            $project_stuff_model->set_company_code($stuff->company_code);
            $project_stuff_model->set_project_id($project_id);
            $project_stuff_model->set_del_ind('1');
            $project_stuff_model->set_added_date(date("Y-m-d H:i:s"));
            $project_stuff_model->set_added_by($this->session->userdata('EMPLOYEE_CODE'));

            $msg = $project_stuff_service->add_new_project_stuff($project_stuff_model);
        }

        echo $msg;



//        } else {
//            $this->template->load('template/access_denied_page');
//        }
    }

    function delete_project() {

//        $perm = Access_controllerservice :: checkAccess('DELETE_MASTER_PRIVILEGES');
//        if ($perm) {
        $project_service = new Project_service();

        echo $project_service->delete_project(trim($this->input->post('id', TRUE)));
//        } else {
//            $this->template->load('template/access_denied_page');
//        }
    }

    function edit_project_view($id) {
//        $perm = Access_controllerservice :: checkAccess('EDIT_PROJECTS');
//        if ($perm) {

        $project_service = new Project_service();


        $data['heading'] = "Edit Project";
        $data['project'] = $project_service->get_project_by_id($id);


        $partials = array('content' => 'projects/edit_project_view');
        $this->template->load('template/main_template', $partials, $data);
//        } else {
//            $this->template->load('template/access_denied_page');
//        }
    }

    function edit_project() {

//        $perm = Access_controllerservice :: checkAccess('EDIT_PROJECTS');
//        if ($perm) {

        $project_model = new Project_model();
        $project_service = new Project_service();

        $project_model->set_project_name($this->input->post('project_name', TRUE));
        $project_model->set_project_vendor($this->input->post('project_vendor', TRUE));
        $project_model->set_project_start_date($this->input->post('project_start_date', TRUE));
        $project_model->set_project_end_date($this->input->post('project_end_date', TRUE));
        $project_model->set_project_description($this->input->post('project_description', TRUE));
        $project_model->set_project_logo($this->input->post('project_logo', TRUE));

        $project_model->set_project_id($this->input->post('project_id', TRUE));



        echo $project_service->update_project($project_model);
//        } else {
//            $this->template->load('template/access_denied_page');
//        }
    }

    function upload_project_logo() {

        $uploaddir = './uploads/project_logo/';
        $unique_tag = 'prj_logo';

        $filename = $unique_tag . time() . '-' . basename($_FILES['uploadfile']['name']); //this is the file name
        $file = $uploaddir . $filename; // this is the full path of the uploaded file

        if (move_uploaded_file($_FILES['uploadfile']['tmp_name'], $file)) {
            echo $filename;
        } else {
            echo "error";
        }
    }

    function add_temp_project_stuff() {

        $project_stuff_temp_model = new Project_stuff_temp_model();
        $project_stuff_temp_service = new Project_stuff_temp_service();

        $files = $this->input->post('file_name', TRUE);
//        $files = explode(',', $files);

        foreach ($files as $file) {

            $project_stuff_temp_model->set_stuff_name($file);
            $project_stuff_temp_model->set_company_code($this->session->userdata('EMPLOYEE_COMPANY_CODE'));
            $project_stuff_temp_model->set_del_ind('1');
            $project_stuff_temp_model->set_added_date(date("Y-m-d H:i:s"));
            $project_stuff_temp_model->set_added_by($this->session->userdata('EMPLOYEE_CODE'));


            echo $project_stuff_temp_service->add_new_project_stuff_temp($project_stuff_temp_model);
        }
    }

    /*
     * Api Methods for Project
     */

    /*
     * @parameters employee code
     * Give all projects for particular emploee
     * return all project details as json object
     */

    public function get_projects_for_employee() {

        $project_service = new Project_service();
        $result = $project_service->get_projects_for_employee($this->input->post('employee_code'));

        echo json_encode($result);
    }

    /*
     * @parameters project id ,employee code 
     * Give all task for particular emploee and particular project
     * return all task details as json object
     */

    public function get_task_for_employee() {

        $task_service = new Task_service();
        $result = $task_service->get_employee_task_by_project($this->input->post('employee_code'));

        echo json_encode($result);
    }

}
