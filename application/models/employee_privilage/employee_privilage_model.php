<?php

class Employee_privilage_model extends CI_Model {
    var $employee_privilage_code;
    var $employee_code;
    var $privilage_code;
    var $added_date;
    
     function __construct() {
        parent::__construct();
    }
    
    public function get_employee_privilage_code() {
        return $this->employee_privilage_code;
    }

    public function get_employee_code() {
        return $this->employee_code;
    }

    public function get_privilage_code() {
        return $this->privilage_code;
    }

    public function get_added_date() {
        return $this->added_date;
    }

    public function set_employee_privilage_code($employee_privilage_code) {
        $this->employee_privilage_code = $employee_privilage_code;
    }

    public function set_employee_code($employee_code) {
        $this->employee_code = $employee_code;
    }

    public function set_privilage_code($privilage_code) {
        $this->privilage_code = $privilage_code;
    }

    public function set_added_date($added_date) {
        $this->added_date = $added_date;
    }


    
}



