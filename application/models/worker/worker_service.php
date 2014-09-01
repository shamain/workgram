<?php

class Worker_service extends CI_Model {

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

    function add_worker_detail($worker_model) {

        return $this->db->insert('worker', $worker_model);
    }

    public function get_screen_shotsfor_user($emp_code) {

        $this->db->select('worker.*,employee.employee_fname,employee.employee_lname,project.project_name,task.task_name');
        $this->db->from('worker');
        $this->db->join('employee', 'employee.employee_code = worker.emp_code');
        $this->db->join('project', 'worker.worker_project_id = project.project_id');
        $this->db->join('task', 'worker.worker_project_task_id = task.task_id');
        $this->db->where('worker.emp_code', $emp_code);
        $this->db->where('worker.del_ind', '1');
        $this->db->where('project.del_ind', '1');
        $this->db->where('task.del_ind', '1');
        $this->db->order_by("worker.worker_id", "desc");

        $query = $this->db->get();
        return $query->result();
    }

    public function filter_screen_shotsfor_user($worker_model) {

        $this->db->select('worker.*,employee.employee_fname,employee.employee_lname,project.project_name,task.task_name');
        $this->db->from('worker');
        $this->db->join('employee', 'employee.employee_code = worker.emp_code');
        $this->db->join('project', 'worker.worker_project_id = project.project_id');
        $this->db->join('task', 'worker.worker_project_task_id = task.task_id');
        if ($worker_model->get_emp_code() != '') {
            $this->db->where('worker.emp_code IN('. $worker_model->get_emp_code().')');
        }
        if ($worker_model->get_worker_project_id() != '') {
            $this->db->where('worker.worker_project_id IN('.$worker_model->get_worker_project_id().')');
        }

        if ($worker_model->get_worker_project_task_id() != '') {
            $this->db->where('worker.worker_project_task_id IN('. $worker_model->get_worker_project_task_id().')');
        }

        $this->db->where('worker.del_ind', '1');
        $this->db->where('project.del_ind', '1');
        $this->db->where('task.del_ind', '1');
        $this->db->order_by("worker.worker_id", "desc");

        $query = $this->db->get();
        return $query->result();
    }

}

