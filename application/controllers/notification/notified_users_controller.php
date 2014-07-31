<?php



if (!defined('BASEPATH')) {
    exit('No direct script access allowed');
}

class Notified_users_controller extends CI_Controller {

    function __construct() {
        parent::__construct();

        if (!$this->session->userdata('EMPLOYEE_LOGGED_IN')) {
            redirect(site_url() . '/login/login_controller');
        } else {

            $this->load->model('notified_users/notified_users_model');
            $this->load->model('notified_users/notified_users_service');
        }
    }
    
    function manage_notified_users() {

        $notified_users_service = new notified_users_service();
        
        $data['heading'] = "Manage Notified Users";

        $data['notified_users'] = $notified_users_service->get_all_notified_users();

        $partials = array('content' => 'notified_users/manage_notified_users_view');
        $this->template->load('template/main_template',$partials, $data);
    }
    
    function edit_notified_users_view($notified_users_id) {


        $notified_users_service = new Notified_users_service();
        
        $data['heading'] = "Edit Notified Users";
        $data['notified_users'] = $notified_users_service->get_notified_users_by_id($notified_users_id);
        
        $partials = array('content' => 'notified_users/edit_notified_users_view');
        $this->template->load('template/main_template', $partials, $data);
    }
    
    function edit_notified_users() {

        $notified_users_model = new Notified_users_model();
        $notified_users_service = new Notified_users_service();

        $notified_users_model->set_employee_code($this->input->post('employee_code', TRUE));
        $notified_users_model->set_notification_id($this->input->post('notification_id', TRUE));
        $notified_users_model->set_notified_user_is_seen('n');
        
        $notified_users_model->set_notified_users_id($this->input->post('notified_users_id', TRUE));

        echo $notified_users_service->update_notified_user($notified_users_model);

    }
    
    function delete_notified_users() {

        $notified_users_service = new Notified_users_service();

        echo $notified_users_service->delete_notified_user(trim($this->input->post('id', TRUE)));
    }
    
    function add_new_notified_user() {

        $notified_users_service = new Notified_users_service();
        $notified_users_model = new Notified_users_model();

        $notified_users_model->set_notified_users_id($this->input->post('notified_users_id', TRUE));
        $notified_users_model->set_employee_code($this->input->post('employee_code', TRUE));
        $notified_users_model->set_notification_id($this->input->post('notification_id', TRUE));
        $notified_users_model->set_notified_user_is_seen('n');
        
        echo $notified_users_service->add_new_notified_user($notified_users_model);
    }
}