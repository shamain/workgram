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
        }
    }
    
    function manage_skill_matrix() {

        $skill_matrix_service = new Skill_matrix_service();
        $skill_category_service = new Skill_category_service();
        $skill_service=new Skill_service();
        $data['heading'] = "Manage Skill Matrix";

        $data['skills'] = $skill_service->get_all_skills();

        $data['skill_categories'] = $skill_category_service->get_all_skill_categories();

        $partials = array('content' => 'skill_matrix/manage_skill_matrix_view');
        $this->template->load('template/main_template', $partials, $data);
    }
}
    
    
    