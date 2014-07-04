<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */
if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Skill_category_controller extends CI_Controller {

    function __construct() {
        parent::__construct();

        if (!$this->session->userdata('EMPLOYEE_LOGGED_IN')) {
            redirect(site_url() . '/login/login_controller');
        } else {
            $this->load->model('skill_category/skill_category_model');
            $this->load->model('skill_category/skill_category_service');
        }
    }

    function manage_skillcategory() {

        $skill_category_service = new skill_category_service();

        $data['heading'] = "Manage skill category";
        $data['skill categories'] = $skill_category_service->get_all_skillcategory($this->session->userdata('SKILL_CAT_CODE'));

        $parials = array('content' => 'skill_category/manage_skillcategory.view');
        $this->template->load('template/main_template', $parials, $data);
    }

    function view_skillcategory($skill_cat_code) {

        $skillcategory_service = new Skillcategory_service();
        $skill_service = new Skill_service();

        $data['skill_category'] = $skillcategory_service->get_skillcategory_by_code($skill_cat_code);
        $data['skill'] = $skill_service->get_skills_for_skillcategory($skill_cat_code);
    }

    function add_new_skillcategory() {

        $skillcategory_model = new Skillcategory_model();
        $skillcategory_service = new Skillcategory_service();

        $skillcategory_model->set_skill_cat_code($this->input->post('skill_cat_code', TRUE));
        $skillcategory_model->set_skill_cat_name($this->input->post('skill_cat_name', TRUE));
        $skillcategory_model->set_del_ind('1');
        $skillcategory_model->set_added_by($this->session->userdata('EMPLOYEE_CODE'));
        $skillcategory_model->set_added_date(date("Y-m-d H:i:s"));

        echo $skillcategory_service->add_new_skillcategory($skillcategory_model);
    }

}
