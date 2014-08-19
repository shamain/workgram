<?php

class Employee_model extends CI_Model {

    var $employee_code;
    var $employee_no;
    var $employee_fname;
    var $employee_lname;
    var $employee_password;
    var $employee_email;
    var $employee_type;
    var $employee_bday;
    var $employee_contact;
    var $employee_wages_category;
    var $employee_contract;
    var $employee_avatar;
    var $employee_cover_image;
    var $account_activation_code;
    var $company_code;
    var $is_online;
    var $del_ind;
    var $added_by;
    var $added_date;
    var $updated_by;
    var $updated_date;

    function __construct() {
        parent::__construct();
    }

    public function get_employee_code() {
        return $this->employee_code;
    }

    public function get_employee_no() {
        return $this->employee_no;
    }

    public function get_employee_fname() {
        return $this->employee_fname;
    }

    public function get_employee_lname() {
        return $this->employee_lname;
    }

    public function get_employee_password() {
        return $this->employee_password;
    }

    public function get_employee_email() {
        return $this->employee_email;
    }

    public function get_employee_type() {
        return $this->employee_type;
    }

    public function get_employee_bday() {
        return $this->employee_bday;
    }

    public function get_employee_contact() {
        return $this->employee_contact;
    }

    public function get_employee_wages_category() {
        return $this->employee_wages_category;
    }

    public function get_employee_contract() {
        return $this->employee_contract;
    }

    public function get_employee_avatar() {
        return $this->employee_avatar;
    }

    public function get_account_activation_code() {
        return $this->account_activation_code;
    }

    public function get_company_code() {
        return $this->company_code;
    }

    public function get_is_online() {
        return $this->is_online;
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

    public function get_updated_by() {
        return $this->updated_by;
    }

    public function get_updated_date() {
        return $this->updated_date;
    }

    public function set_employee_code($employee_code) {
        $this->employee_code = $employee_code;
    }

    public function set_employee_no($employee_no) {
        $this->employee_no = $employee_no;
    }

    public function set_employee_fname($employee_fname) {
        $this->employee_fname = $employee_fname;
    }

    public function set_employee_lname($employee_lname) {
        $this->employee_lname = $employee_lname;
    }

    public function set_employee_password($employee_password) {
        $this->employee_password = $employee_password;
    }

    public function set_employee_email($employee_email) {
        $this->employee_email = $employee_email;
    }

    public function set_employee_type($employee_type) {
        $this->employee_type = $employee_type;
    }

    public function set_employee_bday($employee_bday) {
        $this->employee_bday = $employee_bday;
    }

    public function set_employee_contact($employee_contact) {
        $this->employee_contact = $employee_contact;
    }

    public function set_employee_wages_category($employee_wages_category) {
        $this->eemployee_wages_category = $employee_wages_category;
    }

    public function set_employee_contract($employee_contract) {
        $this->employee_contract = $employee_contract;
    }

    public function set_employee_avatar($employee_avatar) {
        $this->employee_avatar = $employee_avatar;
    }

    public function set_account_activation_code($account_activation_code) {
        $this->account_activation_code = $account_activation_code;
    }

    public function set_company_code($company_code) {
        $this->company_code = $company_code;
    }

    public function set_is_online($is_online) {
        $this->is_online = $is_online;
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

    public function set_updated_by($updated_by) {
        $this->updated_by = $updated_by;
    }

    public function set_updated_date($updated_date) {
        $this->updated_date = $updated_date;
    }

}
