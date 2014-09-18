<?php

class Event_service extends CI_Model {

    function __construct() {
        parent::__construct();
        $this->load->model('event/event_model');
    }

    function add_new_event($event_model) {
        return $this->db->insert('event', $event_model);
    }

    function delete_event($event_id) {
        $data = array('del_ind' => '0');
        $this->db->where('event_id', $event_id);
        return $this->db->update('event', $data);
    }

    public function get_all_events() {

        $this->db->select('*');
        $this->db->from('event');
        $this->db->join('employee', 'employee.employee_code = event.added_by');
        $this->db->where('event.del_ind', '1');
        $this->db->order_by("event.event_id", "desc");
        
        $query = $this->db->get();
        return $query->result();
    }
                //event_type
    function update_event($event_model) {

        $data = array(
            'event_title' => $event_model->get_event_title(),
            'event_description' => $event_model->get_event_description(),
            'start_date' => $event_model->get_start_date(),
              'event_type' => $event_model->get_event_type(),
            'end_date' => $event_model->get_end_date()
        );

        $this->db->where('event_id', $event_model->get_event_id());

        return $this->db->update('event', $data);
    }

    function get_event_by_id($event_id) {
        $query = $this->db->get_where('event', array('event_id' => $event_id));
        return $query->row();
    }

}
