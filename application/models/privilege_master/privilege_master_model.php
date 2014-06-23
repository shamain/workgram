<?php

class Privilege_master_model extends CI_Model {

    var $privilege_master_code;
    var $master_privilege;
    var $master_privilege_description;
    var $system_code;

    function __construct() {
        parent::__construct();
    }

    public function get_privilege_master_code() {
        return $this->privilege_master_code;
    }

    public function get_master_privilege() {
        return $this->master_privilege;
    }

    public function get_master_privilege_description() {
        return $this->master_privilege_description;
    }

    public function get_system_code() {
        return $this->system_code;
    }

    public function set_privilege_master_code($privilege_master_code) {
        $this->privilege_master_code = $privilege_master_code;
    }

    public function set_master_privilege($master_privilege) {
        $this->master_privilege = $master_privilege;
    }

    public function set_master_privilege_description($master_privilege_description) {
        $this->master_privilege_description = $master_privilege_description;
    }

    public function set_system_code($system_code) {
        $this->system_code = $system_code;
    }

}
