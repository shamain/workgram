<?php

class System_service extends CI_Model {

    function __construct() {
        parent::__construct();
    }

    public function get_all_systems() {

        //  $this->db->get('lcs_system');
        $this->db->select('*');
        $this->db->from('system');
        $this->db->order_by('system_code', 'ASC');
        $query = $this->db->get();
        return $query->result();
    }

    public function get_systems_name_by_code($system_model) {

        $query = $this->db->get_where('lcs_system', array('System_Code' => $system_model->get_system_code()));

        return $query->row();
    }

}
