<?php

class Employee_attendance_model extends CI_Model {
    
    var $attendance_id;
    var $worker_id;
    var $emp_code;
    var $company_work_id;
    var $worker_date;
    var $type;
    var $del_ind;
    

    function __construct() {
        parent::__construct();
    }
    
    public function get_attendance_id() {
        return $this->attendance_id;
    }

    public function get_worker_id() {
        return $this->worker_id;
    }
    public function get_emp_code() {
        return $this->emp_code;
    }

    public function get_company_work_id() {
        return $this->company_work_id;
    }

    public function get_worker_date() {
        return $this->worker_date;
    }

    public function get_type() {
        return $this->type;
    }

    public function get_del_ind() {
        return $this->del_ind;
    }

    public function set_attendance_id($attendance_id) {
        $this->attendance_id = $attendance_id;
    }

    public function set_worker_id($worker_id) {
        $this->worker_id = $worker_id;
    }
    
    public function set_emp_code($emp_code) {
        $this->emp_code = $emp_code;
    }

    public function set_company_work_id($company_work_id) {
        $this->company_work_id = $company_work_id;
    }

    public function set_worker_date($worker_date) {
        $this->worker_date = $worker_date;
    }

    public function set_type($type) {
        $this->type = $type;
    }

    public function set_del_ind($del_ind) {
        $this->del_ind = $del_ind;
    }



}

