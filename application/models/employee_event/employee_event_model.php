<?php

class Employee_event_model extends CI_Model {

    var $employee_event_id;
    var $event_id;
    var $employee_code;
    

    function __construct() {
        parent::__construct();
    }

    public function get_employee_event_id() {
        return $this->employee_event_id;
    }

    public function get_event_id() {
        return $this->event_id;
    }

    public function get_employee_code() {
        return $this->employee_code;
    }

    
    public function set_employee_event_id($employee_event_id) {
        $this->employee_event_id = $employee_event_id;
    }

    public function set_event_id($event_id) {
        $this->event_id = $event_id;
    }

    public function set_employee_code($employee_code) {
        $this->employee_code = $employee_code;
    }

    
}
