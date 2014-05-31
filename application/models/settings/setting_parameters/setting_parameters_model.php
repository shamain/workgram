<?php

/*
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */

class Setting_parameters_model extends CI_Model {

    //put your code here
    var $setting_parameter_id;
    var $setting_id;
    var $parameter_name;
    var $parameter_description;
    var $is_parameter_default_value;
    var $added_date;

    function __construct() {
        parent::__construct();
    }

    public function get_setting_parameter_id() {
        return $this->setting_parameter_id;
    }

    public function set_setting_parameter_id($setting_parameter_id) {
        $this->setting_parameter_id = $setting_parameter_id;
    }

    public function get_setting_id() {
        return $this->setting_id;
    }

    public function set_setting_id($setting_id) {
        $this->setting_id = $setting_id;
    }

    public function get_parameter_name() {
        return $this->parameter_name;
    }

    public function set_parameter_name($parameter_name) {
        $this->parameter_name = $parameter_name;
    }

    public function get_parameter_description() {
        return $this->parameter_description;
    }

    public function set_parameter_description($parameter_description) {
        $this->parameter_description = $parameter_description;
    }

    public function get_is_parameter_default_value() {
        return $this->is_parameter_default_value;
    }

    public function set_is_parameter_default_value($is_parameter_default_value) {
        $this->is_parameter_default_value = $is_parameter_default_value;
    }

    public function get_added_date() {
        return $this->added_date;
    }

    public function set_added_date($added_date) {
        $this->added_date = $added_date;
    }

}

?>
