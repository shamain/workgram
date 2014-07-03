<?php

class Access_controll_service extends CI_Model {

    function __construct() {
        parent::__construct();
    }

    function check_access($HCODE) {
        
        $this->db->select('lcs_privilege.Privilege_Code');
        $this->db->from('lcs_employeeuser_priviledges');
        $this->db->join('lcs_privilege', 'lcs_privilege.Privilege_Code = lcs_employeeuser_priviledges.Privilege_Code');
        $this->db->where('lcs_privilege.Priviledge_Code_HF', $HCODE);
        $this->db->where('lcs_employeeuser_priviledges.Employee_Code', $this->session->userdata('LCS_EMPLOYEE_CODE'));
        $query = $this->db->get();
        return $query->num_rows();
    }


    function get_system_privileges_per_user() {
        //function will return all the systems that the user has privileges for
        $this->db->select('s.System_Code');
        $this->db->from('lcs_employeeuser_priviledges e');
        $this->db->join('lcs_privilege p', 'e.Privilege_Code = p.Privilege_Code');
        $this->db->join('lcs_privilege_master pm', 'p.Privilege_Master_Code = pm.Privilege_Master_Code');
        $this->db->join('lcs_system s', 'pm.Main_System_Code = s.System_Code');
        $this->db->where('e.Employee_Code', $this->session->userdata('LCS_EMPLOYEE_CODE'));
        $this->db->group_by('s.System_Code');
        $query = $this->db->get();

        $systems = array();

        $results = $query->result();



        foreach ($query->result() as $row) {
            $systems[] = $row->System_Code;
        }

        return $systems;
    }

}
