<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */
if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Privilege_controller extends CI_Controller {

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

    function manage_skill() {

        $skill_service = new Skill_service();
        $skill_category_service = new Skill_category_service();
        $data['heading'] = "Manage Skills";

        $data['skills'] = $skill_service->get_all_skills();

        $data['skill_categories'] = $skill_category_service->get_all_skill_categories();

        $partials = array('content' => 'skill/manage_skill_view');
        $this->template->load('template/main_template', $partials, $data);
    }

    function edit_skill_view($skill_code) {
        if ($perm) {

            $skill_service = new Skill_service();
            $skill_category_service = new Skill_category_service();

            $data['heading'] = "Edit Skill";
            $data['skills'] = $skill_service->get_skill_by_code($skill_code);
            $data['skill_categories'] = $skill_category_service->get_all_skill_categories();

            $partials = array('content' => 'skills/edit_skill_view');
            $this->template->load('template/main_template', $partials, $data);
        }
    }

        function edit_skill() {

            $skill_model = new Skill_model();
            $skill_service = new Skill_service();

            $skill_model->set_skill_cat_code($this->input->post('skill_cat_code', TRUE));
            $skill_model->set_skill_code($this->input->post('skill_code', TRUE));
            $skill_model->set_skill_name($this->input->post('skill_name', TRUE));
            $skill_model->set_del_ind($this->input->post('del_ind', TRUE));
            $skill_model->set_added_by($this->input->post('added_by', TRUE));

            $skill_model->set_added_date($this->input->post('added_date', TRUE));


            echo $skill_service->update_skill($skill_model);
        }

        function delete_skill() {


            $skill_service = new skill_service();

            echo $skill_service->delete_skill(trim($this->input->post('skill_code', TRUE)));
        }

        function add_new_skill() {

            $skill_service = new Skill_service();
            $skill_model = new Skill_model();

            $skill_model->set_skill_code($this->input->post('skill_code', TRUE));
            $skill_model->set_skill_name($this->input->post('skill_name', TRUE));
            $skill_model->set_skill_cat_code($this->input->post('skill_cat_code', TRUE));
            $skill_model->set_del_ind('1');
            $skill_model->set_added_by($this->session->userdata('EMPLOYEE_CODE'));
            $skill_model->set_added_date(date("Y-m-d H:i:s"));

            echo $skill_service->add_new_skill($skill_model);
        }

    }
    