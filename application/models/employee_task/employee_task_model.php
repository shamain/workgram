<?php

class Employee_task_model extends CI_Model {

    var $employee_task_id;
    var $employee_id;
    var $task_id;
    var $task_status;
    var $added_date;

    function __construct() {
        parent::__construct();
    }

    public function get_employee_task_id() {
        return $this->employee_task_id;
    }

    public function set_employee_task_id($employee_task_id) {
        $this->employee_task_id = $employee_task_id;
    }

    public function get_employee_id() {
        return $this->employee_id;
    }

    public function set_employee_id($employee_id) {
        $this->employee_id = $employee_id;
    }

    public function get_task_id() {
        return $this->task_id;
    }

    public function set_task_id($task_id) {
        $this->task_id = $task_id;
    }

    public function get_task_status() {
        return $this->task_status;
    }

    public function set_task_status($task_status) {
        $this->task_status = $task_status;
    }

    public function get_added_date() {
        return $this->added_date;
    }

    public function set_added_date($added_date) {
        $this->added_date = $added_date;
    }

}
