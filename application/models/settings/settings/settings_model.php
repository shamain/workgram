<?php

/*
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */


class Settings_model extends CI_Model{
    //put your code here
    var $setting_id;
    var $setting_name;
    var $setting_description;
    var $setting_type;
    var $added_date;


    function __construct() {
        parent::__construct();
    }

    public function get_setting_id() {
        return $this->setting_id;
    }

    public function set_setting_id($setting_id) {
        $this->setting_id = $setting_id;
    }

    public function get_setting_name() {
        return $this->setting_name;
    }

    public function set_setting_name($setting_name) {
        $this->setting_name = $setting_name;
    }

    public function get_setting_description() {
        return $this->setting_description;
    }

    public function set_setting_description($setting_description) {
        $this->setting_description = $setting_description;
    }

    public function get_setting_type() {
        return $this->setting_type;
    }

    public function set_setting_type($setting_type) {
        $this->setting_type = $setting_type;
    }

    public function get_added_date() {
        return $this->added_date;
    }

    public function set_added_date($added_date) {
        $this->added_date = $added_date;
    }


}

?>
