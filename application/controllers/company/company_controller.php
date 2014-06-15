<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Company_controller extends CI_Controller {

    function __construct() {
        parent::__construct();
        /*
          if (!$this->session->userdata('EMPLOYEE_LOGGED_IN')) {
          redirect(site_url() . '/login/login_controller');
          } else {
          $this->load->model('project/project_model');
          $this->load->model('project/Project_service');
          } */
        $this->load->model('employee/employee_model');
        $this->load->model('employee/employee_service');
        $this->load->model('company/company_model');
        $this->load->model('company/company_service');
    }

    function company_registration() {

        $company_model = new Company_model();
        $company_service = new Company_service();

        $company_model->set_company_name($this->input->post('txtCompanyName', TRUE));
        $company_model->set_company_address($this->input->post('txtCompanyAddress', TRUE));
        $company_model->set_company_contact($this->input->post('txtCompanyContact', TRUE));
        $company_model->set_company_email($this->input->post('txtCompanyEmail', TRUE));
        $company_model->set_company_desc($this->input->post('txtCompanyDesc', TRUE));




        $company_code = $company_service->add_new_company($company_model);

        $employee_model = new Employee_model();
        $employee_service = new Employee_service();

        $employee_model->set_employee_fname($this->input->post('txtFirstName', TRUE));
        $employee_model->set_employee_lname($this->input->post('txtLastName', TRUE));
        $employee_model->set_employee_password($this->input->post('txtPassword', TRUE));
        $employee_model->set_employee_email($this->input->post('txtEmail', TRUE));
        $employee_model->set_employee_contact($this->input->post('txtContact', TRUE));
        $employee_model->set_company_code($company_code); 
        $employee_model->set_employee_type("admin");
         $employee_model->set_employee_contract("full time");
        $employee_model->set_employee_bday($this->input->post('birthdy', TRUE));
        $employee_model->set_del_ind('1');
        $employee_model->set_added_date(date("Y-m-d H:i:s"));

        echo $employee_service->add_employee($employee_model);
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
        $project_service = new Project_service();

        $project_model->set_project_name($this->input->post('project_name', TRUE));
        $project_model->set_project_vendor($this->input->post('project_vendor', TRUE));
        $project_model->set_project_start_date($this->input->post('project_start_date', TRUE));
        $project_model->set_project_end_date($this->input->post('project_end_date', TRUE));
        $project_model->set_project_description($this->input->post('project_description', TRUE));
        $project_model->set_del_ind('1');
        $project_model->set_added_date(date("Y-m-d H:i:s"));
        $project_model->set_added_by($this->session->userdata('EMPLOYEE_CODE'));



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

        $project_model = new project_model();
        $project_service = new Project_service();

        $project_model->set_project_name($this->input->post('project_name', TRUE));
        $project_model->set_project_vendor($this->input->post('project_vendor', TRUE));
        $project_model->set_project_start_date($this->input->post('project_start_date', TRUE));
        $project_model->set_project_end_date($this->input->post('project_end_date', TRUE));
        $project_model->set_project_description($this->input->post('project_description', TRUE));

        $project_model->set_project_id($this->input->post('project_id', TRUE));



        echo $project_service->update_project($project_model);
//        } else {
//            $this->template->load('template/access_denied_page');
//        }
    }

}
