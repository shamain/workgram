<?php

class Employee_task_service extends CI_Model {

    function __construct() {
        parent::__construct();
    }

    public function get_employees_for_task($task_id) {
        $this->db->select('*');
        $this->db->from('employee_tasks');
        $this->db->join('employee', 'employee.employee_code = employee_tasks.employee_id');
        $this->db->where('employee_tasks.task_id', $task_id);
        $query = $this->db->get();
        return $query->result();
    }

    function add_employee_task($employee_task_model) {
        return $this->db->insert('employee_tasks', $employee_task_model);
    }

    function delete_employee_task($employee_task_id) {
        return $this->db->delete('employee_tasks', array('employee_task_id' => $employee_task_id));
    }

}
