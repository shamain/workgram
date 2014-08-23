<?php

class Worker_model extends CI_Model {
    
    var $worker_id;
    var $emp_code;
    var $worker_date;
    var $worker_project_id;
    var $worker_project_task_id;
    var $worker_shot_name;
    var $del_ind;
    
    function __construct() {
        parent::__construct();
    }
    
    public function get_worker_id() {
        return $this->worker_id;
    }

    public function get_emp_code() {
        return $this->emp_code;
    }

    public function get_worker_date() {
        return $this->worker_date;
    }

    public function get_worker_project_id() {
        return $this->worker_project_id;
    }

    public function get_worker_project_task_id() {
        return $this->worker_project_task_id;
    }

    public function get_worker_shot_name() {
        return $this->worker_shot_name;
    }

    public function get_del_ind() {
        return $this->del_ind;
    }

    public function set_worker_id($worker_id) {
        $this->worker_id = $worker_id;
    }

    public function set_emp_code($emp_code) {
        $this->emp_code = $emp_code;
    }

    public function set_worker_date($worker_date) {
        $this->worker_date = $worker_date;
    }

    public function set_worker_project_id($worker_project_id) {
        $this->worker_project_id = $worker_project_id;
    }

    public function set_worker_project_task_id($worker_project_task_id) {
        $this->worker_project_task_id = $worker_project_task_id;
    }

    public function set_worker_shot_name($worker_shot_name) {
        $this->worker_shot_name = $worker_shot_name;
    }

    public function set_del_ind($del_ind) {
        $this->del_ind = $del_ind;
    }


}


