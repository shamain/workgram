<?php

class Employee_privilege_service extends CI_Model {

    function __construct() {
        parent::__construct();
        $this->load->model('employee_privilege/employee_privilege_model');
    }

    public function get_all_employee_privileges() {


        $this->db->select('*');
        $this->db->from('employee_privilege');
        $query = $this->db->get();
        return $query->result();
    }

    function get_assigned_privileges_by_employee_code($employee_code) {

        $query = $this->db->get_where('employee_privilege', array('employee_code' => $employee_code));
        return $query->result();
    }

    function add_new_employee_privilege($employee_privilege_model) {

        return $this->db->insert('employee_privilege', $employee_privilege_model);
    }

    function delete_employee_privilege($employee_privilege_code) {

        return $this->db->delete('employee_privilege', array('employee_privilege_code' => $employee_privilege_code));
    }

    function update_employee_privilege($employee_privilege_model) {

        $data = array(
            'employee_code' => $employee_privilege_model->get_employee_code(),
            'privilege_code' => $employee_privilege_model->get_privilege_code()
        );


        $this->db->where('employee_privilege_code', $employee_privilege_model->get_employee_privilege_code());

        return $this->db->update('employee_privilege', $data);
    }

}
