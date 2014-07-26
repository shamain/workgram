<?php

class Task_comment_model extends CI_Model {

    var $comment_id;
    var $task_id;
    var $comment;
    var $del_ind;
    var $added_by;
    var $added_date;

    function __construct() {
        parent::__construct();
    }

    public function get_comment_id() {
        return $this->comment_id;
    }

    public function set_comment_id($comment_id) {
        $this->comment_id = $comment_id;
    }

    public function get_task_id() {
        return $this->task_id;
    }

    public function set_task_id($task_id) {
        $this->task_id = $task_id;
    }

    public function get_comment() {
        return $this->comment;
    }

    public function set_comment($comment) {
        $this->comment = $comment;
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
