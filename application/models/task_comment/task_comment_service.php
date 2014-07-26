<?php

class Task_comment_service extends CI_Model {

    function __construct() {
        parent::__construct();
        $this->load->model('task_comment/task_comment_model');
    }

   

    public function get_task_comments($task_id) {

        $this->db->select('task_comment.*,employee.employee_fname,employee.employee_lname');
        $this->db->from('task_comment');
        $this->db->join('employee', 'employee.employee_code = task_comment.added_by');
        $this->db->where('task_comment.task_id', $task_id);
        $this->db->where('task_comment.del_ind', '1');
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

    function get_employee_task_by_project($employee_code) {
        $this->db->select('task.task_id,task.task_name,project.project_name,project.project_id');
        $this->db->from('task');
        $this->db->join('employee_tasks', 'employee_tasks.task_id = task.task_id');
        $this->db->join('project', 'task.project_id = project.project_id');
        $this->db->where('employee_tasks.employee_id', $employee_code);
        $this->db->where('task.task_status', '0');
        $this->db->where('project.del_ind', '1');
        $query = $this->db->get();
        return $query->result();
    }

    function get_task_by_id($task_id) {
        $this->db->select('task.*,employee.employee_fname,employee.employee_lname');
        $this->db->from('task');
        $this->db->join('employee', 'employee.employee_code = task.added_by');
        $this->db->where('task.task_id', $task_id);
        $query = $this->db->get();
        return $query->row();
    }

}
