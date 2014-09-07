<?php

class Employee_attendance_model extends CI_Model {
    
    var $employee_attendance_id;
    var $employee_code;
    var $date;
    var $login_time;
    var $login_out_time;
    var $type;

    function __construct() {
        parent::__construct();
    }
    
    public function get_employee_attendance_id() {
        return $this->employee_attendance_id;
    }

    public function get_employee_code() {
        return $this->employee_code;
    }

    public function get_date() {
        return $this->date;
    }

    public function get_login_time() {
        return $this->login_time;
    }

    public function get_login_out_time() {
        return $this->login_out_time;
    }

    public function get_type() {
        return $this->type;
    }

    public function set_employee_attendance_id($employee_attendance_id) {
        $this->employee_attendance_id = $employee_attendance_id;
    }

    public function set_employee_code($employee_code) {
        $this->employee_code = $employee_code;
    }

    public function set_date($date) {
        $this->date = $date;
    }

    public function set_login_time($login_time) {
        $this->login_time = $login_time;
    }

    public function set_login_out_time($login_out_time) {
        $this->login_out_time = $login_out_time;
    }

    public function set_type($type) {
        $this->type = $type;
    }

    
    

}
