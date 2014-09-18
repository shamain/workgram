<?php

class Event_model extends CI_Model {

    var $event_id;
    var $event_title;
    var $event_description;
    var $start_date;
    var $end_date;
    var $del_ind;
    var $added_by;
    var $added_date;
    var $event_type;

    function __construct() {
        parent::__construct();
    }

    public function get_event_id() {
        return $this->event_id;
    }

    public function set_event_id($event_id) {
        $this->event_id = $event_id;
    }

    public function get_event_title() {
        return $this->event_title;
    }

    public function set_event_title($event_title) {
        $this->event_title = $event_title;
    }

    public function get_event_description() {
        return $this->event_description;
    }

    public function set_event_description($event_description) {
        $this->event_description = $event_description;
    }

    public function get_start_date() {
        return $this->start_date;
    }

    public function set_start_date($start_date) {
        $this->start_date = $start_date;
    }

    public function get_end_date() {
        return $this->end_date;
    }

    public function set_end_date($end_date) {
        $this->end_date = $end_date;
    }

    public function get_del_ind() {
        return $this->del_ind;
    }

    public function set_del_ind($del_ind) {
        $this->del_ind = $del_ind;
    }
    
     public function get_added_by() {
        return $this->added_by;
    }

    public function set_added_by($added_by) {
        $this->added_by = $added_by;
    }
    
    public function get_added_date() {
        return $this->added_date;
    }

    public function set_added_date($added_date) {
        $this->added_date = $added_date;
    }
    
    
     //event_type
    
       public function get_event_type() {
        return $this->event_type;
    }
    
   
      public function set_event_type($event_type) {
        $this->event_type = $event_type;
    }
    

}
