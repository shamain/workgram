<?php



if (!defined('BASEPATH')) {
    exit('No direct script access allowed');
}

class Notification_controller extends CI_Controller {

    function __construct() {
        parent::__construct();

        if (!$this->session->userdata('EMPLOYEE_LOGGED_IN')) {
            redirect(site_url() . '/login/login_controller');
        } else {

            $this->load->model('notification/notification_model');
            $this->load->model('notification/notification_service');
            
            $this->load->model('settings/system/system_model');
            $this->load->model('settings/system/system_service');
        }
    }
    
    function manage_notification() {

        $notification_service = new Notification_service();
        
        $system_service = new System_service();
        
        $data['heading'] = "Manage Notifications";

        $data['notifications'] = $notification_service->get_all_notifications();
        $data['systems'] = $system_service->get_all_systems();
        
        $partials = array('content' => 'notification/manage_notification_view');
        $this->template->load('template/main_template',$partials, $data);
    }
    
    function edit_notification_view($notification_id) {

        $notification_service = new Notification_service();
        $system_service = new System_service();
        
        $data['heading'] = "Edit Notifications";
        
        $data['notification'] = $notification_service->get_notification_by_id($notification_id);
        
        $data['systems'] = $system_service->get_all_systems();
        
        $partials = array('content' => 'notification/edit_notification_view');
        $this->template->load('template/main_template', $partials, $data);
    }
    
    function edit_notification() {

        $notification_model = new Notification_model();
        $notification_service = new Notification_service();

        $notification_model->set_system_id($this->input->post('system_id', TRUE));
        $notification_model->set_notification_msg($this->input->post('notification_msg', TRUE));
        $notification_model->set_notification_area_url($this->input->post('notification_area_url',TRUE));
        
        $notification_model->set_notification_id($this->input->post('notification_id', TRUE));

        echo $notification_service->update_notification($notification_model);

    }
    
    function delete_notification() {

        $notification_service = new Notification_service();

        echo $notification_service->delete_notification(trim($this->input->post('id', TRUE)));
    }
    
    function add_new_notification() {

        $notification_service = new Notification_service();
        $notification_model = new Notification_model();

        $notification_model->set_notification_id($this->input->post('notification_id', TRUE));
        $notification_model->set_system_id($this->input->post('system_id', TRUE));
        $notification_model->set_notification_msg($this->input->post('notification_msg', TRUE));
        $notification_model->set_notification_area_url($this->input->post('notification_area_url',TRUE));
        $notification_model->set_notification_added_date($this->input->post('notification_added_date',TRUE));
        
        echo $notification_service->add_new_notification($notification_model);
    }
}