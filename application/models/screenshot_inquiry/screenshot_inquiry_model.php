<?php

class Screenshot_inquiry_model extends CI_Model{
    
    var $inquiry_id;
    var $inquiry_name;
    var $inquiry_description;
    var $added_date;
    var $added_by;
    var $added_to;
    var $project;
    var $task;
    

 

        function __construct() {
        parent::__construct();
    }
    public function get_inquiry_id() {
        return $this->inquiry_id;
    }

    public function get_inquiry_name() {
        return $this->inquiry_name;
    }

    public function get_inquiry_description() {
        return $this->inquiry_description;
    }

    public function get_added_date() {
        return $this->added_date;
    }
    
       public function get_added_by() {
        return $this->added_by;
    }

    public function get_added_to() {
        return $this->added_to;
    }

    public function get_project() {
        return $this->project;
    }

    public function get_task() {
        return $this->task;
    }

    public function set_inquiry_id($inquiry_id) {
        $this->inquiry_id = $inquiry_id;
    }

    public function set_inquiry_name($inquiry_name) {
        $this->inquiry_name = $inquiry_name;
    }

    public function set_inquiry_description($inquiry_description) {
        $this->inquiry_description = $inquiry_description;
    }

    public function set_added_date($added_date) {
        $this->added_date = $added_date;
    }
    
        public function set_added_by($added_by) {
        $this->added_by = $added_by;
    }

    public function set_added_to($added_to) {
        $this->added_to = $added_to;
    }

    public function set_project($project) {
        $this->project = $project;
    }

    public function set_task($task) {
        $this->task = $task;
    }


}
    
    
    

