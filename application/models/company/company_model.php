<?php

class Company_model extends CI_Model {

    var $company_code;
    var $company_name;
    var $company_email;
    var $company_address;
    var $company_contact;
    var $company_desc;
    var $del_ind;
    var $added_date;
    
      function __construct() {
        parent::__construct();
    }

  
    public function get_company_code() {
        return $this->company_code;
    }

    public function set_company_code($company_code) {
        $this->company_code = $company_code;
    }

    public function get_company_name() {
        return $this->company_name;
    }

    public function set_company_name($company_name) {
        $this->company_name = $company_name;
    }

    public function get_company_email() {
        return $this->company_email;
    }

    public function set_company_email($company_email) {
        $this->company_email = $company_email;
    }

    public function get_company_address() {
        return $this->company_address;
    }

    public function set_company_address($company_address) {
        $this->company_address = $company_address;
    }

    public function get_company_contact() {
        return $this->company_contact;
    }

    public function set_company_contact($company_contact) {
        $this->company_contact = $company_contact;
    }

    public function get_company_desc() {
        return $this->company_desc;
    }

    public function set_company_desc($company_desc) {
        $this->company_desc = $company_desc;
    }

    public function get_del_ind() {
        return $this->del_ind;
    }

    public function set_del_ind($del_ind) {
        $this->del_ind = $del_ind;
    }

    public function get_added_date() {
        return $this->added_date;
    }

    public function set_added_date($added_date) {
        $this->added_date = $added_date;
    }



   
   
}
