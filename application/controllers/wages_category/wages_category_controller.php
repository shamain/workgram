<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Skill_category_controller extends CI_Controller {

    function __construct() {
        parent::__construct();

        if (!$this->session->userdata('EMPLOYEE_LOGGED_IN')) {
            redirect(site_url() . '/login/login_controller');
        } else {
            $this->load->model('wages_category/wages_category_model');
            $this->load->model('wages_category/wages_category_service');
        }
    }

    function manage_wages_category() {

        $wages_category_service = new wages_category_service();

        $data['heading'] = "Manage wages category";
        $data['wages_categories'] = $wages_category_service->get_all_wages_categories();

        $parials = array('content' => 'wages_category/manage_wages_category_view');
        $this->template->load('template/main_template', $parials, $data);
    }
}
?>
