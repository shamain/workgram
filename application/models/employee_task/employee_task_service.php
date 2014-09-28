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

    function update_employee_task_status($employee_task_model) {

        $data = array(
            'task_status' => $employee_task_model->get_task_status()
        );


        $this->db->where('task_id', $employee_task_model->get_task_id());
        $this->db->where('employee_id', $employee_task_model->get_employee_id());

        return $this->db->update('employee_tasks', $data);
    }
         //get assigned tasks in a employee by employee code
    function get_employees_by_employee_task_id_manage($employee_code) {

        $this->db->select('*');
        $this->db->from('employee_tasks');
        $this->db->where('employee_code', $employee_code);
//        $this->db->where('del_ind', '1');
        $this->db->order_by("employee_task_id",'desc');
        $query = $this->db->get();
        return $query->result();
    }

    
    public function get_not_complete_task_count_for_employee($employee_code) {

         $this->db->select('*');
        $this->db->from('employee_tasks');
        $this->db->where('employee_id', $employee_code);
        $this->db->where('task_status', '0');

        return $this->db->count_all_results();
    }
}
