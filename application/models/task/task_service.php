<?php

class Task_service extends CI_Model {

    function __construct() {
        parent::__construct();
        $this->load->model('task/task_model');
    }

    public function get_tasks_for_project($project_id) {

        $this->db->select('*');
        $this->db->from('task');
        $this->db->where('project_id', $project_id);
        $query = $this->db->get();
        return $query->result();
    }

    function add_new_task($task_model) {
        return $this->db->insert('task', $task_model);
    }

    function delete_task($task_id) {
        $data = array('del_ind' => '0');
        $this->db->where('task_id', $task_id);
        return $this->db->update('task', $data);
    }

}
