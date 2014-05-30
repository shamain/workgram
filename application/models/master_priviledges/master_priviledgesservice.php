<?php

class Master_priviledges_service extends CI_Model {

    function __construct() {
        parent::__construct();
        $this->load->model('master_priviledges/master_priviledgesmodel');
    }

    public function get_all_master_priviledges() {
        $this->db->select('*');
        $this->db->from('lcs_privilege_master');
        $this->db->join('lcs_system', 'lcs_system.System_Code = lcs_privilege_master.main_system_code');
        $query = $this->db->get();
        return $query->result();
    }

    public function get_master_priviledges($main_system_code) {

        $this->db->select('*');
        $this->db->from('lcs_privilege_master');
        $this->db->where('main_system_code', $main_system_code);
        $query = $this->db->get();
        return $query->result();
        
    }

    public function get_available_master_priviledges() {

        $this->db->select('*');
        $this->db->from('lcs_privilege_master');
        $query = $this->db->get();
        return $query->result();
    }

    function add_new_master_priviledge($master_priviledges_model) {

        return $this->db->insert('lcs_privilege_master', $master_priviledges_model);
    }

    function delete_master_priviledge() {

        return $this->db->delete('lcs_privilege_master', array('privilege_master_code' => Master_priviledges_model:: get()));
    }

    function getmasterPriviledgebyid() {

        $query = $this->db->get_where('lcs_privilege_master', array('Privilege_Master_Code' => Master_priviledgesmodel:: getPrivilege_Master_Code()));
        return $query->row();
    }

    function updatemasterpriviledge($masterpriviledgesmodel) {

        $data = array(
            'Main_System_Code' => $masterpriviledgesmodel->getMain_System_Code(),
            'Master_Privilege' => $masterpriviledgesmodel->getMaster_Privilege(),
            'Master_Privilege_Description' => $masterpriviledgesmodel->getMaster_Privilege_Description()
        );


        $this->db->where('Privilege_Master_Code', $masterpriviledgesmodel->getPrivilege_Master_Code());

        return $this->db->update('lcs_privilege_master', $data);
    }

}
