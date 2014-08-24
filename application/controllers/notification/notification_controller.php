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
            
            $this->load->model('notified_users/notified_users_model');
            $this->load->model('notified_users/notified_users_service');
            
            $this->load->model('settings/system/system_model');
            $this->load->model('settings/system/system_service');
            
            $this->load->model('employee/employee_model');
            $this->load->model('employee/employee_service');
        }
    }
    
    function manage_notification() {

        $notification_service = new Notification_service();
        $employee_service = new Employee_service();
        $system_service = new System_service();
        $notified_users_service = new Notified_users_service();
        
        $data['heading'] = "Manage Notifications";

        $data['notifications'] = $notification_service->get_all_notifications();
        $data['systems'] = $system_service->get_all_systems();
        $data['employees'] = $employee_service->get_employees_by_company_id_manage($this->session->userdata('EMPLOYEE_COMPANY_CODE'));
        
        foreach($data['notifications'] as $notification){
           $data['userscount'][] = $notified_users_service->get_user_count_by_notification_id($notification->notification_id);
            
        }
        
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
        $notified_users_service = new Notified_users_service();

        echo $notification_service->delete_notification(trim($this->input->post('id', TRUE)));
        
        $notified_users=$notified_users_service->get_notified_users_by_notification(trim($this->input->post('id', TRUE)));
        foreach ($notified_users as $notified_user){
            $notified_users_service->delete_notified_user ($notified_user->notified_users_id);
        }
            
    }
    
    function add_new_notification() {

        $notification_service = new Notification_service();
        $notification_model = new Notification_model();
        
        $notified_users_service = new Notified_users_service();
        $notified_users_model = new Notified_users_model();
        
        $employee_service = new Employee_service();

        $notification_model->set_notification_id($this->input->post('notification_id', TRUE));
        $notification_model->set_system_id($this->input->post('system_code', TRUE));
        $notification_model->set_notification_msg($this->input->post('notification_msg', TRUE));
        $notification_model->set_notification_area_url($this->input->post('notification_area_url',TRUE));
        $notification_model->set_notification_added_date(date("Y-m-d H:i:s"));
                       
        echo $notification_service->add_new_notification($notification_model);
        
        $notifications=$notification_service->get_all_notifications();
        
        $all_employees = $employee_service->get_employees_by_company_id_manage($this->session->userdata('EMPLOYEE_COMPANY_CODE'));
        $ntype=$this->input->post('ntype', TRUE);
        
        
        if ($ntype == 'specific') {
            foreach ($this->input->post('notified_users') as $employee) {
                $notified_users_model->set_notified_users_id($this->input->post('notified_users_id', TRUE));
                $notified_users_model->set_employee_code($employee);
                $notified_users_model->set_notification_id($notifications[0]->notification_id);
                $notified_users_model->set_notified_user_is_seen('n');

                echo $notified_users_service->add_new_notified_user($notified_users_model);
            }
        }
        else{
            foreach ($all_employees as $employee) {
                $notified_users_model->set_notified_users_id($this->input->post('notified_users_id', TRUE));
                $notified_users_model->set_employee_code($employee->employee_code);
                $notified_users_model->set_notification_id($notifications[0]->notification_id);
                $notified_users_model->set_notified_user_is_seen('n');

                echo $notified_users_service->add_new_notified_user($notified_users_model);
            }
        }
    }
    
    function init_notification_menu(){
        $notified_users_service = new Notified_users_service();
        
        $data = $notified_users_service->get_all_notifications_by_user($this->session->userdata('EMPLOYEE_CODE'));
        echo json_encode($data);
    }
    
    
}