<?php

class Notification_service extends CI_Model {

    function __construct() {
        parent::__construct();
        
        $this->load->model('notification/notification_model');
    }

    public function get_all_notifications() {
        $this->db->select('notification.*,system.system');
        $this->db->from('notification');
        $this->db->join('system', 'system.system_code = notification.system_id');
        $this->db->order_by("notification.notification_id", "asc");
        
        $query = $this->db->get();
        return $query->result();
    }
    
    function add_new_notification($notification_model) {

        return $this->db->insert('notification', $notification_model);
    }
    
    function delete_notification($notification_id) {

        return $this->db->delete('notification', array('notification_id' => $notification_id));
    }

    function get_notification_by_id($notification_id) {

        $query = $this->db->get_where('notification', array('notification_id' => $notification_id));
        return $query->row();
    }
    
    function update_notification($notification_model) {

        $data = array(
            'system_id' => $notification_model->get_system_id(),
            'notification_msg' => $notification_model->get_notification_msg(),
            'notification_area_url' => $notification_model->get_notification_area_url()
        );


        $this->db->where('notification_id', $notification_model->get_notification_id());

        return $this->db->update('notification', $data);
    }
}