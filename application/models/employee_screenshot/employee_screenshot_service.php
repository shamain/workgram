<?php

class Employee_screenshot_service extends CI_Model {

    function __construct() {

        parent::__construct();
    }
    
    
     function get_employee_by_id($employee_code) {

        $query = $this->db->get_where('employee', array('employee_code' => $employee_code));
        return $query->row();
    }
    
    function get_employee_by_project_id($project_id){
        $query = $this->db->get_where('employee',array('project_id' => $project_id));
        return $query->row();
        
    }
    function get_employee_by_task_id($task_id){
        $query = $this->db->get_where('employee',array('task_id' => $task_id));
        return $query->row();
        
    }
    
    
     function get_employee_by_date($date){
        $query = $this->db->get_where('employee',array('date' => $task_id));
        return $query->row();
        
    }
    
    
    
    
}