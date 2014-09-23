<?php
class Screenshot_inquiry_service extends CI_Model {

    function __construct() {
        parent::__construct();
        $this->load->model('screenshot_inquiry/screenshot_inquiry_model');
    }

    

    function add_screenshot_inquiry($screenshot_inquiry_model) {
        return $this->db->insert('screenshot_inquiry', $screenshot_inquiry_model);
    }

    function delete_screenshot_inquiry($inquiry_id) {
        return $this->db->delete('screenshot_inquiry', array('inquiry_id' => $inquiry_id));
    }
    
    public function get_all_inquiries() {


        $this->db->select('*');
        $this->db->from('screenshot_inquiry');
        $this->db->order_by("screenshot_inquiry.inquiry_id", "desc");
        $query = $this->db->get();
        return $query->result();
    }


}






