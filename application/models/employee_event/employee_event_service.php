<?php

class Employee_event_service extends CI_Model {

    function __construct() {
        parent::__construct();
        $this->load->model('employee_event/employee_event_model');
    }

    public function get_all_employee_events() {
        $this->db->select('employee_event.*,event.event_title,employee.employee_fname,employee.employee_lname');
        $this->db->from('employee_event');
        $this->db->join('event', 'event.event_id = employee_event.event_id');
        $this->db->join('employee', 'employee.employee_code = employee_event.employee_code','left');
        $this->db->where('event.del_ind', '1');
        
        $this->db->order_by("employee_event.employee_event_id", "desc");
        $query = $this->db->get();
        return $query->result();
    }

    function add_new_employee_event($employee_event_model) {

        return $this->db->insert('employee_event', $employee_event_model);
    }

    function delete_employee_event($employee_event_id) {
        return $this->db->delete('employee_event', array('employee_event_id' => $employee_event_id));
    }

    function get_employee_event_by_id($employee_event_id) {

        $query = $this->db->get_where('employee_event', array('employee_event_id' => $employee_event_id));
        return $query->row();
    }

    function update_employee_event($employee_event_model) {

        $data = array(
            'event_id' => $employee_event_model->get_event_id(),
            'employee_code' => $employee_event_model->get_employee_code()
        );


        $this->db->where('employee_event_id', $employee_event_model->get_employee_event_id());

        return $this->db->update('employee_event', $data);
    }

}
