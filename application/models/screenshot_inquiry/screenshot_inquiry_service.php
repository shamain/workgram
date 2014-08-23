<?php
class Screenshot_inquiry_service extends CI_Model {

    function __construct() {
        parent::__construct();
    }

    

    function add_screenshot_inquiry($screenshot_inquiry_model) {
        return $this->db->insert('screenshot_inquiry', $screenshot_inquiry_model);
    }

    function delete_screenshot_inquiry($inquiry_id) {
        return $this->db->delete('screenshot_inquiry', array('inquiry_id' => $inquiry_id));
    }

}






