<?php

class Access_controll_service extends CI_Model {

    function __construct() {
        parent::__construct();
    }

    function check_access($HCODE) {

        $this->db->select('privilege.privilege_code');
        $this->db->from('employee_privileges');
        $this->db->join('privilege', 'privilege.privilege_code = employee_privileges.privilege_code');
        $this->db->where('privilege.priviledge_code_HF', $HCODE);
        $this->db->where('employee_privileges.employee_code', $this->session->userdata('EMPLOYEE_CODE'));
        $query = $this->db->get();
        return $query->num_rows();
    }

    function get_system_privileges_per_user() {
        //function will return all the systems that the user has privileges for
        $this->db->select('s.system_code');
        $this->db->from('employee_privileges e');
        $this->db->join('privilege p', 'e.privilege_code = p.privilege_code');
        $this->db->join('privilege_master pm', 'p.privilege_master_code = pm.privilege_master_code');
        $this->db->join('system s', 'pm.system_code = s.system_code');
        $this->db->where('e.employee_code', $this->session->userdata('EMPLOYEE_CODE'));
        $this->db->group_by('s.system_code');
        $query = $this->db->get();

        $systems = array();

        $results = $query->result();

        foreach ($query->result() as $row) {
            $systems[] = $row->system_code;
        }

        return $systems;
    }

}
