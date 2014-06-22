<?php

class Task_model extends CI_Model {

    var $task_id;
    var $task_name;
    var $task_descrption;
    var $task_priority;
    var $task_progress;
    var $task_deadline;
    var $task_task;
    var $project_id;
    var $del_ind;
    var $added_by;
    var $added_date;

    function __construct() {
        parent::__construct();
    }

    public function get_task_id() {
        return $this->task_id;
    }

    public function set_task_id($task_id) {
        $this->task_id = $task_id;
    }

    public function get_task_name() {
        return $this->task_name;
    }

    public function set_task_name($task_name) {
        $this->task_name = $task_name;
    }

    public function get_task_descrption() {
        return $this->task_descrption;
    }

    public function set_task_descrption($task_descrption) {
        $this->task_descrption = $task_descrption;
    }

    public function get_task_priority() {
        return $this->task_priority;
    }

    public function set_task_priority($task_priority) {
        $this->task_priority = $task_priority;
    }

    public function get_task_progress() {
        return $this->task_progress;
    }

    public function set_task_progress($task_progress) {
        $this->task_progress = $task_progress;
    }

    public function get_task_deadline() {
        return $this->task_deadline;
    }

    public function set_task_deadline($task_deadline) {
        $this->task_deadline = $task_deadline;
    }

    public function get_task_task() {
        return $this->task_task;
    }

    public function set_task_task($task_task) {
        $this->task_task = $task_task;
    }

    public function get_project_id() {
        return $this->project_id;
    }

    public function set_project_id($project_id) {
        $this->project_id = $project_id;
    }

    public function get_del_ind() {
        return $this->del_ind;
    }

    public function set_del_ind($del_ind) {
        $this->del_ind = $del_ind;
    }

    public function get_added_by() {
        return $this->added_by;
    }

    public function set_added_by($added_by) {
        $this->added_by = $added_by;
    }

    public function get_added_date() {
        return $this->added_date;
    }

    public function set_added_date($added_date) {
        $this->added_date = $added_date;
    }

}
