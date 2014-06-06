<?php

class Notification_service extends CI_Model {

    function __construct() {
        parent::__construct();
    }

    //put your code here
    function add_new_notification($notification_model) {

        $this->db->insert('notification', $notification_model);
        return $this->db->insert_id();
    }

}

?>
