<?php

class worker_service extends CI_Model {

    function __construct() {
        parent::__construct();
        $this->load->model('worker/worker_model');
    }
    
    public function get_all_workers() {

        $this->db->select('*');
        $this->db->from('worker');
        $this->db->join('employee', 'employee.employee_code = worker.emp_code');
        $this->db->where('worker.del_ind', '1');
        $this->db->order_by("worker.worker_id", "desc");
        
        $query = $this->db->get();
        return $query->result();
    }
    
    function delete_worker($worker_id) {
        $data = array('del_ind' => '0');
        $this->db->where('worker_id', $worker_id);
        return $this->db->update('worker', $data);
    }
}

