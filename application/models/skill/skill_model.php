<?php

class Skill_model extends CI_Model {

    var $skill_code;
    var $skill_name;
    var $skill_cat_code;
    var $del_ind;
    var $added_by;
    var $added_date;

    function __construct() {
        parent::__construct();
    }

    public function get_skill_code() {
        return $this->skill_code;
    }

    public function get_skill_name() {
        return $this->skill_name;
    }

    public function get_skill_cat_code() {
        return $this->skill_cat_code;
    }

    public function get_del_ind() {
        return $this->del_ind;
    }

    public function get_added_by() {
        return $this->added_by;
    }

    public function get_added_date() {
        return $this->added_date;
    }

    public function set_skill_code($skill_code) {
        $this->skill_code = $skill_code;
    }

    public function set_skill_name($skill_name) {
        $this->skill_name = $skill_name;
    }

    public function set_skill_cat_code($skill_cat_code) {
        $this->skill_cat_code = $skill_cat_code;
    }

    public function set_del_ind($del_ind) {
        $this->del_ind = $del_ind;
    }

    public function set_added_by($added_by) {
        $this->added_by = $added_by;
    }

    public function set_added_date($added_date) {
        $this->added_date = $added_date;
    }

}
