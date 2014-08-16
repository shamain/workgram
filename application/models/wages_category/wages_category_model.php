<?php
class Wages_category_model extends CI_Model {

    var $wages_category_id;
    var $category_name;
    var $basic_salary;
    var $ot_rate;
    var $allowance;
    var $bonus;
    var $del_ind;
    var $added_by;
    var $added_date;
    var $updated_by;
    var $updated_date;
    
    
    
       function __construct() {
        parent::__construct();
    }

    public function get_wages_category_id() {
        return $this->wages_category_id;
    }

  

    public function get_category_name() {
        return $this->category_name;
    }

   

    public function get_basic_salary() {
        return $this->basic_salary;
    }

   

    public function get_ot_rate() {
        return $this->ot_rate;
    }

   

    public function get_allowance() {
        return $this->allowance;
    }


    public function get_bonus() {
        return $this->bonus;
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

    
    
     public function set_wages_category_id($wages_category_id) {
        $this->wages_category_id= $wages_category_id;
    }
    
     public function set_category_name($category_name) {
        $this->category_name = $category_name;
    }
    
     public function set_basic_salary($basic_salary) {
        $this->basic_salary = $basic_salary;
    }
    
     public function set_ot_rate($ot_rate) {
        $this->ot_rate = $ot_rate;
    }
    public function set_allowance($allowance) {
        $this->allowance = $allowance;
    }
     public function set_bonus($bonus) {
        $this->bonus = $bonus;
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
