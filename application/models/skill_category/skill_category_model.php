<?php

class Skill_category_model extends CI_Model {

    var $skill_cat_code;
    var $skill_cat_name;
    var $colour;
    var $del_ind;
    var $added_by;
    var $added_date;

    function __construct() {
        parent::__construct();
    }

    public function get_skill_cat_code() {
        return $this->skill_cat_code;
    }

    public function set_skill_cat_code($skill_cat_code) {
        $this->skill_cat_code = $skill_cat_code;
    }

    public function get_skill_cat_name() {
        return $this->skill_cat_name;
    }

    public function set_skill_cat_name($skill_cat_name) {
        $this->skill_cat_name = $skill_cat_name;
    }

    public function get_colour() {
        return $this->colour;
    }

    public function set_colour($colour) {
        $this->colour = $colour;
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
