<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Screenshot_inquiry_controller extends CI_Controller {

    function __construct() {
        parent::__construct();

        if (!$this->session->userdata('EMPLOYEE_LOGGED_IN')) {
            redirect(site_url() . '/login/login_controller');
        } else {
            $this->load->model('screenshot_inquiry/screenshot_inquiry_model');
            $this->load->model('screenshot_inquiry/screenshot_inquiry_service');
        }
    }

    function manage_screenshot_inquiry() {


        $screenshot_inquiry_service = new Screenshot_inquiry_service();

        $data['heading'] = "Manage Screenshot Inquiry";
        $data['inquiries'] = $screenshot_inquiry_service->get_all_inquiries();

        $parials = array('content' => 'screenshot_inquiry/manage_screenshot_inquiry_view');
        $this->template->load('template/main_template', $parials, $data);
    }

    function add_screenshot_inquiry() {

        $screenshot_inquiry_service = new Screenshot_inquiry_service();
        $screenshot_inquiry_model = new Screenshot_inquiry_model();


        $screenshot_inquiry_model->set_inquiry_name($this->input->post('inquiry_name', TRUE));
        $screenshot_inquiry_model->set_inquiry_description($this->input->post('inquiry_description', TRUE));
        $screenshot_inquiry_model->set_added_date(date("Y-m-d H:i:s"));
        $screenshot_inquiry_model->set_added_by($this->session->userdata('EMPLOYEE_NAME'));
        $screenshot_inquiry_model->set_added_to($this->input->post('inquiry_added_to', TRUE));
        $screenshot_inquiry_model->set_project($this->input->post('inquiry_project', TRUE));
        $screenshot_inquiry_model->set_task($this->input->post('inquiry_task', TRUE));

        echo $screenshot_inquiry_service->add_screenshot_inquiry($screenshot_inquiry_model);
    }

}
