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
        $this->db->order_by("task_priority", "desc");
        $query = $this->db->get();
        return $query->result();
    }

    public function get_complete_task_count_for_project($project_id) {

        $this->db->select('*');
        $this->db->from('task');
        $this->db->where('project_id', $project_id);
        $this->db->where('task_status', '1');
        return $this->db->count_all_results();
    }
    
    public function get_not_complete_task_count_for_project($project_id) {

        $this->db->select('*');
        $this->db->from('task');
        $this->db->where('project_id', $project_id);
        $this->db->where('task_status', '0');
        return $this->db->count_all_results();
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

    function get_employee_task_by_project($project_id, $employee_code) {
        $this->db->select('task.*');
        $this->db->from('task');
        $this->db->join('employee_task', 'employee_task.task_id = task.task_id');
        $this->db->where('employee_task.employee_id', $employee_code);
        $this->db->where('task.project_id', $project_id);
        $query = $this->db->get();
        return $query->result();
    }

}
