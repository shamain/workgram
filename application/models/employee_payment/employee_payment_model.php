<?php

class employee_payment_model extends CI_Model {

    var $pay_id;
    var $employee_code;
    var $company_code;
    var $wages_category_id;
    var $amount;
    var $year_month;
    var $is_paid;

    
      function __construct() {
        parent::__construct();
    }
     public function getPay_id() {
        return $this->pay_id;
    }

    public function getEmployee_code() {
        return $this->employee_code;
    }

    public function getCompany_code() {
        return $this->company_code;
    }

    public function getWages_category_id() {
        return $this->wages_category_id;
    }

    public function getAmount() {
        return $this->amount;
    }

    public function getYear_month() {
        return $this->year_month;
    }

    public function getIs_paid() {
        return $this->is_paid;
    }

    public function setPay_id($pay_id) {
        $this->pay_id = $pay_id;
    }

    public function setEmployee_code($employee_code) {
        $this->employee_code = $employee_code;
    }

    public function setCompany_code($company_code) {
        $this->company_code = $company_code;
    }

    public function setWages_category_id($wages_category_id) {
        $this->wages_category_id = $wages_category_id;
    }

    public function setAmount($amount) {
        $this->amount = $amount;
    }

    public function setYear_month($year_month) {
        $this->year_month = $year_month;
    }

    public function setIs_paid($is_paid) {
        $this->is_paid = $is_paid;
    }
}
