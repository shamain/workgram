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

    function update_task($task_model) {

        $data = array(
            'task_name' => $task_model->get_task_name(),
            'task_descrption' => $task_model->get_task_description(),
            'task_priority' => $task_model->get_task_priority(),
            'task_progress' => $task_model->get_task_progress(),
            'task_deadline' => $task_model->get_task_deadline(),
            'project_id' => $task_model->get_project_id()
        );

        $this->db->where('task_id', $task_model->get_task_id());

        return $this->db->update('task', $data);
    }

}
