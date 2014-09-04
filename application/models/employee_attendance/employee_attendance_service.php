<?php

class Employee_attendance_service extends CI_Model {

    function __construct() {

        parent::__construct();
        $this->load->model('employee_attendance/employee_attendance_model');
    }
    
    public function get_all_employee_attendance() {


        $this->db->select('*');
        $this->db->from('employee_attendance');
        $this->db->order_by("employee_attendance.attendance_id", "desc");
        $query = $this->db->get();
        return $query->result();
    }

    
    
}

