<?php

class System_model extends CI_Model {

    var $system_code;
    var $system;
    var $dashboard_url;

    function __construct() {
        parent::__construct();
    }

    public function get_system_code() {
        return $this->system_code;
    }

    public function get_system() {
        return $this->system;
    }

    public function get_dashboard_url() {
        return $this->dashboard_url;
    }

    public function set_system_code($system_code) {
        $this->system_code = $system_code;
    }

    public function set_system($system) {
        $this->system = $system;
    }

    public function set_dashboard_url($dashboard_url) {
        $this->dashboard_url = $dashboard_url;
    }

}
