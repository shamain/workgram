<?php

class Employee_privilege_model extends CI_Model {

    var $employee_privilege_code;
    var $employee_code;
    var $privilege_code;
    var $added_date;

    function __construct() {
        parent::__construct();
    }

    public function get_employee_privilege_code() {
        return $this->employee_privilege_code;
    }

    public function get_employee_code() {
        return $this->employee_code;
    }

    public function get_privilege_code() {
        return $this->privilege_code;
    }

    public function get_added_date() {
        return $this->added_date;
    }

    public function set_employee_privilege_code($employee_privilege_code) {
        $this->employee_privilege_code = $employee_privilege_code;
    }

    public function set_employee_code($employee_code) {
        $this->employee_code = $employee_code;
    }

    public function set_privilege_code($privilege_code) {
        $this->privilege_code = $privilege_code;
    }

    public function set_added_date($added_date) {
        $this->added_date = $added_date;
    }

}
