<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Skill_matrix_controller extends CI_Controller {

    function __construct() {
        parent::__construct();

        if (!$this->session->userdata('EMPLOYEE_LOGGED_IN')) {
            redirect(site_url() . '/login/login_controller');
        } else {
            $this->load->model('skill/skill_model');
            $this->load->model('skill/skill_service');

            $this->load->model('skill_category/skill_category_model');
            $this->load->model('skill_category/skill_category_service');

            $this->load->model('employee_skill/employee_skill_model');
            $this->load->model('employee_skill/employee_skill_service');
            
             $this->load->model('employee/employee_model');
            $this->load->model('employee/employee_service');
        }
    }

    function manage_skill_matrix() {

        $skill_category_service = new Skill_category_service();
        $skill_service = new Skill_service();
//        $employee_service = new employee_service();
        $employee_skill_service = new Employee_skill_service();
        $data['heading'] = "Skill Matrix";

        $data['skill_categories'] = $skill_category_service->get_all_skill_categories();
        $data['skills'] = $skill_service->get_all_skills();
//        $data['employee_detail'] = $employee_service->get_employee_by_id($id);
        $current_assigned_skills = $employee_skill_service->get_skills_for_employee($this->session->userdata('EMPLOYEE_CODE'));

        $data['assigned_skills'] = $current_assigned_skills;
        $data['employee_code'] = $this->session->userdata('EMPLOYEE_CODE');


        $partials = array('content' => 'skill_matrix/skill_matrix_view');
        $this->template->load('template/main_template', $partials, $data);
    }

    function add_new_skill_matrix() {

        $employee_skill_service = new Employee_skill_service();
        $employee_skill_model = new Employee_skill_model();

        $employee_skill_model->set_employee_skill_id($this->input->post('employee_skill_id', TRUE));
        $employee_skill_model->set_skill_code($this->input->post('skill_code', TRUE));
        $employee_skill_model->set_employee_code($this->session->userdata('EMPLOYEE_CODE'));
//        $employee_skill_model->set_employee_code($this->input->post('employee_code', TRUE));
        $employee_skill_model->set_expert_level($this->input->post('expert_level', TRUE));
        $employee_skill_model->set_reference($this->input->post('reference', TRUE));
//        $employee_skill_model->set_employee_code($this->session->userdata('EMPLOYEE_CODE'));
        $employee_skill_model->set_del_ind('1');
        $employee_skill_model->set_added_date(date("Y-m-d H:i:s"));


        echo $employee_skill_service->add_new_employee_skill($employee_skill_model);
    }

    function edit_employee_skill_matrix() {

        $employee_skill_model = new Employee_skill_model();
        $employee_skill_service = new Employee_skill_service();

        $employee_skill_model->set_skill_code($this->input->post('skill_code', TRUE));
//        $employee_skill_model->set_employee_code($this->input->post('employee_code', TRUE));
//        $employee_skill_model->set_employee_skill_id($this->input->post('employee_skill_id', TRUE));
//        $employee_skill_model->set_del_ind($this->input->post('del_ind', TRUE));
//        $employee_skill_model->set_added_date($this->input->post('added_by', TRUE));
//        $employee_skill_model->set_added_date($this->input->post('added_date', TRUE));


        echo $employee_skill_service->update_employee_skill($employee_skill_model);
    }

    function delete_employee_skill() {


        $employee_skill_service = new Employee_skill_service();

        echo $employee_skill_service->delete_employee_skill(trim($this->input->post('id', TRUE)));
    }

    function edit_skill_matrix_view() {

        $employee_skill_service = new Employee_skill_service();
        $skill_category_service = new Skill_category_service();
        $data['heading'] = "Edit Skill";

        $data['skill'] = $employee_skill_service->get_all_employee_skills();
        $data['skill_categories'] = $skill_category_service->get_all_skill_categories();


        $partials = array('content' => 'skill/edit_skill_view');
        $this->template->load('template/main_template', $partials, $data);
    }

    public function get_skills_for_employee() {

        $employee_skill_service = new Employee_skill_service();
        $result = $employee_skill_service->get_skills_for_employee($this->input->post('employee_code'));

        echo json_encode($result);
    }

}
