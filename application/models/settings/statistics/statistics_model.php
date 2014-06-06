<?php

class Statistics_model extends CI_Model {

    var $id;
    var $user_id;
    var $section;
    var $action;
    var $date;
    var $uri;
    var $post_data;

    function __construct() {
        parent::__construct();
    }

    public function get_id() {
        return $this->id;
    }

    public function get_user_id() {
        return $this->user_id;
    }

    public function get_section() {
        return $this->section;
    }

    public function get_action() {
        return $this->action;
    }

    public function get_date() {
        return $this->date;
    }

    public function get_uri() {
        return $this->uri;
    }

    public function get_post_data() {
        return $this->post_data;
    }

    public function set_id($id) {
        $this->id = $id;
    }

    public function set_user_id($user_id) {
        $this->user_id = $user_id;
    }

    public function set_section($section) {
        $this->section = $section;
    }

    public function set_action($action) {
        $this->action = $action;
    }

    public function set_date($date) {
        $this->date = $date;
    }

    public function set_uri($uri) {
        $this->uri = $uri;
    }

    public function set_post_data($post_data) {
        $this->post_data = $post_data;
    }

}

?>
