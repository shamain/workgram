<?php

class Company_settings_model extends CI_Model {

    //put your code here
    var $company_setting_id;
    var $company_id;
    var $setting_id;
    var $setting_parameter_id;
    var $added_date;

    function __construct() {
        parent::__construct();
    }

    public function get_company_setting_id() {
        return $this->company_setting_id;
    }

    public function set_company_setting_id($company_setting_id) {
        $this->company_setting_id = $company_setting_id;
    }

    public function get_company_id() {
        return $this->company_id;
    }

    public function set_company_id($company_id) {
        $this->company_id = $company_id;
    }

    public function get_setting_id() {
        return $this->setting_id;
    }

    public function set_setting_id($setting_id) {
        $this->setting_id = $setting_id;
    }

    public function get_setting_parameter_id() {
        return $this->setting_parameter_id;
    }

    public function set_setting_parameter_id($setting_parameter_id) {
        $this->setting_parameter_id = $setting_parameter_id;
    }

    public function get_added_date() {
        return $this->added_date;
    }

    public function set_added_date($added_date) {
        $this->added_date = $added_date;
    }

}

?>
