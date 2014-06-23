<?php

class Privilege_model extends CI_Model {

    var $privilege_code;
    var $privilege_master_code;
    var $privilege;
    var $privilege_description;
    var $priviledge_code_HF;
    var $assign_for;

    function __construct() {
        parent::__construct();
    }

    public function get_privilege_code() {
        return $this->privilege_code;
    }

    public function get_privilege_master_code() {
        return $this->privilege_master_code;
    }

    public function get_privilege() {
        return $this->privilege;
    }

    public function get_privilege_description() {
        return $this->privilege_description;
    }

    public function get_priviledge_code_HF() {
        return $this->priviledge_code_HF;
    }

    public function get_assign_for() {
        return $this->assign_for;
    }

    public function set_privilege_code($privilege_code) {
        $this->privilege_code = $privilege_code;
    }

    public function set_privilege_master_code($privilege_master_code) {
        $this->privilege_master_code = $privilege_master_code;
    }

    public function set_privilege($privilege) {
        $this->privilege = $privilege;
    }

    public function set_privilege_description($privilege_description) {
        $this->privilege_description = $privilege_description;
    }

    public function set_priviledge_code_HF($priviledge_code_HF) {
        $this->priviledge_code_HF = $priviledge_code_HF;
    }

    public function set_assign_for($assign_for) {
        $this->assign_for = $assign_for;
    }

}
