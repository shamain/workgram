<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Project_controller extends CI_Controller {

    function __construct() {
        parent::__construct();

        if (!$this->session->userdata('EMPLOYEE_LOGGED_IN')) {
            redirect(site_url() . '/login/login_controller');
        } else {
            $this->load->model('project/project_model');
            $this->load->model('project/project_service');
        }
    }

    function manage_projects() {
        $project_service = new Project_service();

        $data['heading'] = "Manage Projects";
        $data['projects'] = $project_service->get_all_projects();
        $partials = array('content' => 'projects/manage_projects_view');
        $this->template->load('template/main_template', $partials, $data);
    }

    function add_new_project() {
//        $perm = Access_controllerservice :: checkAccess('ADD_PRIVILEGES');
//        if ($perm) {

        $project_model = new project_model();
        $project_service = new project_service();

        $project_model->set_project_name($this->input->post('project_name', TRUE));
        $project_model->set_project_vendor($this->input->post('project_vendor', TRUE));
        //$project_model->set_project_duration($this->input->post('project_duration', TRUE));
        //$project_model->set_project_deadline($this->input->post('project_deadline', TRUE));
        $project_model->set_project_description($this->input->post('project_description', TRUE));




        echo $project_service->add_new_project($project_model);
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

}
