<?php


class Notified_users_service extends CI_Model {

    function __construct() {
        parent::__construct();
    }

    function get_user_unseen_notifications($notified_users_model) {

        $this->db->select('*, COUNT(main_notifications.notification_area_url) as count');
        $this->db->from('main_notifications');
        $this->db->join('main_notified_users', 'main_notified_users.notification_id = main_notifications.notification_id');
        $this->db->where('main_notified_users.employee_code', $notified_users_model->get_employee_code());
        $this->db->where('main_notified_users.notified_user_is_seen', $notified_users_model->get_notified_user_is_seen());
        $this->db->group_by('notification_area_url');
        $query = $this->db->get();
        return $query->result();
    }

    function get_user_all_notifications($notified_users_model) {

        $this->db->select('*, COUNT(main_notifications.notification_area_url) as count');
        $this->db->from('main_notifications');
        $this->db->join('main_notified_users', 'main_notified_users.notification_id = main_notifications.notification_id');
        $this->db->where('main_notified_users.employee_code', $notified_users_model->get_employee_code());
      //  $this->db->where('main_notified_users.notified_user_is_seen', $notified_usersmodel->getNotified_user_is_seen());
        $this->db->group_by('main_notifications.notification_area_url');
        $this->db->group_by('main_notified_users.notified_user_is_seen');
        $this->db->order_by('main_notified_users.notified_user_is_seen','DESC');
        $query = $this->db->get();
        return $query->result();
    }
    function get_user_all_notifications_cato($notified_users_model, $cato) {

        $this->db->select('*');
        $this->db->from('main_notifications');
        $this->db->join('main_notified_users', 'main_notified_users.notification_id = main_notifications.notification_id');
        $this->db->where('main_notified_users.employee_code', $notified_users_model->get_employee_code());
        $this->db->where('main_notified_users.notified_user_is_seen', $notified_users_model->get_notified_user_is_seen());
        $this->db->where('main_notifications.notification_area_url', $cato);
        $query = $this->db->get();
        return $query->result();
    }

    function mark_notification_as_seen($notified_users_model) {
        $data = array('notified_user_is_seen' => $notified_users_model->get_notified_user_is_seen());

        $this->db->where('notified_users_id', $notified_users_model->set_notified_users_id());

        return $this->db->update('main_notified_users', $data);
    }

    function add_new_notified_user($notified_users_model) {

        return $this->db->insert('main_notified_users', $notified_users_model);
    }

}

?>
