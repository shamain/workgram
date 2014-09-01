<?php

class Privilege_service extends CI_Model {

    function __construct() {
        parent::__construct();
        $this->load->model('privilege/privilege_model');
    }

    public function get_all_privileges() {


        $this->db->select('*');
        $this->db->from('privilege');
        $this->db->join('privilege_master', 'privilege_master.privilege_master_code = privilege.privilege_master_code');
        $this->db->order_by("privilege.privilege_code", "desc");
        $query = $this->db->get();
        return $query->result();
    }

    function get_privileges_by_master_privilege_assigned_for($id,$user) {

        $this->db->select('*');
        $this->db->from('privilege');
        $this->db->join('privilege_master', 'privilege_master.privilege_master_code = privilege.privilege_master_code');
        $this->db->where('privilege_master.privilege_master_code', $id);
        $this->db->where('privilege.assign_for', $this->session->userdata('ALL'));
        $this->db->or_where('privilege.assign_for', $user);
        $query = $this->db->get();
//        echo $this->db->last_query();die;
        return $query->result();
    }

    function add_new_privilege($priviledge_model) {

        return $this->db->insert('privilege', $priviledge_model);
    }

    function delete_privilege($privilege_code) {

        return $this->db->delete('privilege', array('privilege_code' => $privilege_code));
    }

    function get_privilege_by_id($privilege_code) {

        $query = $this->db->get_where('privilege', array('privilege_code' => $privilege_code));
        return $query->row();
    }

    function get_privilege_by_name($name) {


        $query = $this->db->get_where('privilege', array('priviledge_code_HF' => $name));
        return $query->row();
    }

    function update_privilege($priviledge_model) {

        $data = array(
            'privilege_master_code' => $priviledge_model->get_privilege_master_code(),
            'privilege' => $priviledge_model->get_privilege(),
            'privilege_description' => $priviledge_model->get_privilege_description(),
            'priviledge_code_HF' => $priviledge_model->get_priviledge_code_HF(),
            'assign_for' => $priviledge_model->get_assign_for()
        );


        $this->db->where('privilege_code', $priviledge_model->get_privilege_code());

        return $this->db->update('privilege', $data);
    }

    function get_employees_for_privilege($priviledge_model) {
        //method to get all the employees with a particular privilege.
        $this->db->select('*');
        $this->db->from('employee_privileges');
        $this->db->join('employee', 'employee_privileges.employee_code = employee.employee_code', 'inner');
        $this->db->join('privilege', 'privilege.privilege_code = employee_privileges.privilege_code', 'inner');
        $this->db->where('employee_privileges.privilege_code =' . $priviledge_model->get_privilege_code());

        return $this->db->get()->result();
    }

}