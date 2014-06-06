<?php

class Notification_model extends CI_Model {

    //put your code here
    var $notification_id;
    var $system_id;
    var $notification_msg;
    var $notification_area_url;
    var $notification_added_date;

    function __construct() {
        parent::__construct();
    }
    public function get_notification_id() {
        return $this->notification_id;
    }

    public function get_system_id() {
        return $this->system_id;
    }

    public function get_notification_msg() {
        return $this->notification_msg;
    }

    public function get_notification_area_url() {
        return $this->notification_area_url;
    }

    public function get_notification_added_date() {
        return $this->notification_added_date;
    }

    public function set_notification_id($notification_id) {
        $this->notification_id = $notification_id;
    }

    public function set_system_id($system_id) {
        $this->system_id = $system_id;
    }

    public function set_notification_msg($notification_msg) {
        $this->notification_msg = $notification_msg;
    }

    public function set_notification_area_url($notification_area_url) {
        $this->notification_area_url = $notification_area_url;
    }

    public function set_notification_added_date($notification_added_date) {
        $this->notification_added_date = $notification_added_date;
    }


    
}

?>
