<?php

class Privilege_master_service extends CI_Model {

    function __construct() {
        parent::__construct();
        $this->load->model('privilege_master/privilege_master_model');
    }

    public function get_all_master_privileges() {

        $this->db->select('privilege_master.*,system.system');
        $this->db->from('privilege_master');
         $this->db->join('system', 'system.system_code = privilege_master.system_code');
        $query = $this->db->get();
        return $query->result();
    }

    public function get_privilege_master_by_system_code($system_code){

        $this->db->select('*');
        $this->db->from('privilege_master');
        $this->db->where('system_code',$system_code );
        $query = $this->db->get();
        return  $query->result();
    }

    public function get_available_master_privileges() {
        $this->db->select('*');
        $this->db->from('privilege_master');
        $query = $this->db->get();
        return $query->result();
    }

    function add_new_master_privilege($privilege_master_model) {

        return $this->db->insert('privilege_master', $privilege_master_model);
    }

    function delete_master_privilege($master_code) {

        return $this->db->delete('privilege_master', array('privilege_master_code' => $master_code));
    }

    function get_master_privilege_by_id($master_code) {

        $query = $this->db->get_where('privilege_master', array('privilege_master_code' => $master_code));
        return $query->row();
    }

    function update_master_privilege($privilege_master_model) {

        $data = array(
            'master_privilege' => $privilege_master_model->get_master_privilege(),
            'master_privilege_description' => $privilege_master_model->get_master_privilege_description(),
            'system_code'=>$privilege_master_model->get_system_code()
        );


        $this->db->where('privilege_master_code', $privilege_master_model->get_privilege_master_code());

        return $this->db->update('privilege_master', $data);
    }

}