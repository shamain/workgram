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

    function manage_skill_category() {

        $skill_category_service = new skill_category_service();

        $data['heading'] = "Manage skill category";
        $data['skill_categories'] = $skill_category_service->get_all_skill_categories();

        $parials = array('content' => 'skill_category/manage_skill_category_view');
        $this->template->load('template/main_template', $parials, $data);
    }

    function edit_skill_category_view($skill_cat_code) {

        $skill_category_service = new Skill_category_service();
        $data['heading'] = "Edit Skill Category";
        $data['skill_category'] = $skill_category_service->get_skill_category_by_id($skill_cat_code);

        $partials = array('content' => 'skill_category/edit_skill_category_view');
        $this->template->load('template/main_template', $partials, $data);
    }

    function add_new_skill_category() {

        $skill_category_service = new Skill_category_service();
        $skill_category_model = new Skill_category_model();

        $skill_category_model->set_skill_cat_name($this->input->post('skill_cat_name', TRUE));
        $skill_category_model->set_colour($this->input->post('colour', TRUE));
        $skill_category_model->set_del_ind('1');
        $skill_category_model->set_added_by($this->session->userdata('EMPLOYEE_CODE'));
        $skill_category_model->set_added_date(date("Y-m-d H:i:s"));


        echo $skill_category_service->add_new_skill_category($skill_category_model);
    }

    function edit_skill_category() {

        $skill_category_model = new Skill_category_model();
        $skill_category_service = new Skill_category_service();

        $skill_category_model->set_skill_cat_code($this->input->post('skill_cat_code', TRUE));
        $skill_category_model->set_skill_cat_name($this->input->post('skill_cat_name', TRUE));
        $skill_category_model->set_colour($this->input->post('colour', TRUE));

        echo $skill_category_service->update_skill_category($skill_category_model);
    }

    function delete_skill_category() {


        $skill_category_service = new Skill_category_service();

        echo $skill_category_service->delete_skill_category(trim($this->input->post('id', TRUE)));
    }

}
