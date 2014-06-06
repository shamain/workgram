<?php

/*
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of Notified_usersservice
 *
 * @author Viran
 */
class Notified_usersservice extends CI_Model {

    function __construct() {
        parent::__construct();
    }

    function getUserUnseenNotifications($notified_usersmodel) {

        $this->db->select('*, COUNT(main_notifications.notification_area_url) as count');
        $this->db->from('main_notifications');
        $this->db->join('main_notified_users', 'main_notified_users.notification_id = main_notifications.notification_id');
        $this->db->where('main_notified_users.Employee_Code', $notified_usersmodel->getEmployee_Code());
        $this->db->where('main_notified_users.notified_user_is_seen', $notified_usersmodel->getNotified_user_is_seen());
        $this->db->group_by('notification_area_url');
        $query = $this->db->get();
        return $query->result();
    }

    function getUserAllNotifications($notified_usersmodel) {

        $this->db->select('*, COUNT(main_notifications.notification_area_url) as count');
        $this->db->from('main_notifications');
        $this->db->join('main_notified_users', 'main_notified_users.notification_id = main_notifications.notification_id');
        $this->db->where('main_notified_users.Employee_Code', $notified_usersmodel->getEmployee_Code());
      //  $this->db->where('main_notified_users.notified_user_is_seen', $notified_usersmodel->getNotified_user_is_seen());
        $this->db->group_by('main_notifications.notification_area_url');
        $this->db->group_by('main_notified_users.notified_user_is_seen');
        $this->db->order_by('main_notified_users.notified_user_is_seen','DESC');
        $query = $this->db->get();
        return $query->result();
    }
    function getUserAllNotifications_cato($notified_usersmodel, $cato) {

        $this->db->select('*');
        $this->db->from('main_notifications');
        $this->db->join('main_notified_users', 'main_notified_users.notification_id = main_notifications.notification_id');
        $this->db->where('main_notified_users.Employee_Code', $notified_usersmodel->getEmployee_Code());
        $this->db->where('main_notified_users.notified_user_is_seen', $notified_usersmodel->getNotified_user_is_seen());
        $this->db->where('main_notifications.notification_area_url', $cato);
        $query = $this->db->get();
        return $query->result();
    }

    function mark_notification_as_seen($notified_usersmodel) {
        $data = array('notified_user_is_seen' => $notified_usersmodel->getNotified_user_is_seen());

        $this->db->where('notified_users_id', $notified_usersmodel->getNotified_users_id());

        return $this->db->update('main_notified_users', $data);
    }

    function add_new_notified_user($notified_usersmodel) {

        return $this->db->insert('main_notified_users', $notified_usersmodel);
    }

}

?>
