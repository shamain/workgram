<?php

class Project_model extends CI_Model {

    var $project_id;
    var $project_logo;
    var $project_name;
    var $project_vendor;
    var $project_start_date;
    var $project_end_date;
    var $project_description;
    var $company_code;
    var $del_ind;
    var $added_by;
    var $added_date;

    function __construct() {
        parent::__construct();
    }

    public function get_project_id() {
        return $this->project_id;
    }

    public function set_project_id($project_id) {
        $this->project_id = $project_id;
    }

    public function get_project_logo() {
        return $this->project_logo;
    }

    public function set_project_logo($project_logo) {
        $this->project_logo = $project_logo;
    }

    public function get_project_name() {
        return $this->project_name;
    }

    public function set_project_name($project_name) {
        $this->project_name = $project_name;
    }

    public function get_project_vendor() {
        return $this->project_vendor;
    }

    public function set_project_vendor($project_vendor) {
        $this->project_vendor = $project_vendor;
    }

    public function get_project_start_date() {
        return $this->project_start_date;
    }

    public function set_project_start_date($project_start_date) {
        $this->project_start_date = $project_start_date;
    }

    public function get_project_end_date() {
        return $this->project_end_date;
    }

    public function set_project_end_date($project_end_date) {
        $this->project_end_date = $project_end_date;
    }

    public function get_project_description() {
        return $this->project_description;
    }

    public function set_project_description($project_description) {
        $this->project_description = $project_description;
    }

    public function get_company_code() {
        return $this->company_code;
    }

    public function set_company_code($company_code) {
        $this->company_code = $company_code;
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

