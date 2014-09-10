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
     public function get_pay_id() {
        return $this->pay_id;
    }

    public function get_employee_code() {
        return $this->employee_code;
    }

    public function get_company_code() {
        return $this->company_code;
    }

    public function get_wages_category_id() {
        return $this->wages_category_id;
    }

    public function get_amount() {
        return $this->amount;
    }

    public function get_year_month() {
        return $this->year_month;
    }

    public function get_is_paid() {
        return $this->is_paid;
    }

    public function set_pay_id($pay_id) {
        $this->pay_id = $pay_id;
    }

    public function set_employee_code($employee_code) {
        $this->employee_code = $employee_code;
    }

    public function set_company_code($company_code) {
        $this->company_code = $company_code;
    }

    public function set_wages_category_id($wages_category_id) {
        $this->wages_category_id = $wages_category_id;
    }

    public function set_amount($amount) {
        $this->amount = $amount;
    }

    public function set_year_month($year_month) {
        $this->year_month = $year_month;
    }

    public function set_is_paid($is_paid) {
        $this->is_paid = $is_paid;
    }
}
