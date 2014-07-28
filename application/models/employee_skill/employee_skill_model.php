<?php

class Employee_skill_model extends CI_Model {

    var $employee_skill_id;
    var $skill_code;
    var $employee_code;
    var $del_ind;
    var $added_date;

    function __construct() {
        parent::__construct();
    }
    
    public function get_employee_skill_id() {
        return $this->employee_skill_id;
    }

    public function get_skill_code() {
        return $this->skill_code;
    }

    public function get_employee_code() {
        return $this->employee_code;
    }

    public function get_del_ind() {
        return $this->del_ind;
    }

    public function get_added_date() {
        return $this->added_date;
    }

    public function set_employee_skill_id($employee_skill_id) {
        $this->employee_skill_id = $employee_skill_id;
    }

    public function set_skill_code($skill_code) {
        $this->skill_code = $skill_code;
    }

    public function set_employee_code($employee_code) {
        $this->employee_code = $employee_code;
    }

    public function set_del_ind($del_ind) {
        $this->del_ind = $del_ind;
    }

    public function set_added_date($added_date) {
        $this->added_date = $added_date;
    }

}
