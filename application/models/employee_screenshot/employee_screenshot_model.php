<?php

class Employee_screenshot_model extends CI_Model {
    
     var $employee_code;
    var $employee_screenshot_id;
    var $project_id;
    var $task_id;
    var $date;
    var $image;
    var $del_ind;
    
    
    
    function __construct() {
        parent::__construct();
    }
    
    public function get_employee_code() {
        return $this->employee_code;
    }

    public function get_employee_screenshot_id() {
        return $this->employee_screenshot_id;
    }

    public function get_project_id() {
        return $this->project_id;
    }

    public function get_task_id() {
        return $this->task_id;
    }

    public function get_date() {
        return $this->date;
    }

    public function get_image() {
        return $this->image;
    }

    public function get_del_ind() {
        return $this->del_ind;
    }

    public function set_employee_code($employee_code) {
        $this->employee_code = $employee_code;
    }

    public function set_employee_screenshot_id($employee_screenshot_id) {
        $this->employee_screenshot_id = $employee_screenshot_id;
    }

    public function set_project_id($project_id) {
        $this->project_id = $project_id;
    }

    public function set_task_id($task_id) {
        $this->task_id = $task_id;
    }

    public function set_date($date) {
        $this->date = $date;
    }

    public function set_image($image) {
        $this->image = $image;
    }

    public function set_del_ind($del_ind) {
        $this->del_ind = $del_ind;
    }


    
}

