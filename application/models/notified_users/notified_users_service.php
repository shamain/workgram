<?php

class Notified_users_service extends CI_Model {

    function __construct() {
        parent::__construct();
        
        $this->load->model('notified_users/notified_users_model');
    }

    public function get_all_notified_users() {
        $this->db->select('notified_users.*,employee.employee_fname,employee.employee_lname,notification.notification_msg');
        $this->db->from('notified_users');
        $this->db->join('notified_users', 'notified_users.employee_code = employee.employee_code','left');
        $this->db->join('notified_users', 'notified_users.notification_id = notification.notification_id','left');
        $this->db->order_by("notified_users.notified_users_id", "desc");
        $query = $this->db->get();
        return $query->result();
    }
    
    function add_new_notified_user($notified_users_model) {

        return $this->db->insert('notified_users', $notified_users_model);
    }
    
    function delete_notified_user($notified_users_id) {

        return $this->db->delete('notified_users', array('notified_users_id' => $notified_users_id));
    }

    function get_notified_user_by_id($notified_users_id) {

        $query = $this->db->get_where('notified_users', array('notified_users_id' => $notified_users_id));
        return $query->row();
    }
    
    function update_notified_user($notified_users_model) {

        $data = array(
            'employee_code' => $notified_users_model->get_employee_code(),
            'notification_id' => $notified_users_model->get_notification_id(),
            'notified_user_is_seen' => $notified_users_model->get_notified_user_is_seen()
                
        );


        $this->db->where('notified_users_id', $notified_users_model->get_notified_users_id());

        return $this->db->update('notified_users', $data);
    }
}