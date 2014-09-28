<?php

class Project_service extends CI_Model {

    function __construct() {
        parent::__construct();
        $this->load->model('project/project_model');
    }

    public function get_all_projects_for_company($company_code) {

        $this->db->select('project.*,employee.employee_fname,employee.employee_lname');
        $this->db->from('project');
        $this->db->join('employee', 'employee.employee_code = project.added_by');
        $this->db->where('project.company_code', $company_code);
        $this->db->order_by("project.project_end_date", "ASC");
        $query = $this->db->get();
        return $query->result();
    }

    function add_new_project($project_model) {
        $this->db->insert('project', $project_model);
        return $this->db->insert_id();
    }

    function delete_project($project_id) {
        $data = array('del_ind' => '0');
        $this->db->where('project_id', $project_id);
        return $this->db->update('project', $data);
    }

    function get_project_by_id($project_id) {
        $query = $this->db->get_where('project', array('project_id' => $project_id));
        return $query->row();
    }

    function get_project_by_name($name) {

        $query = $this->db->get_where('project', array('project_name' => $name));
        return $query->row();
    }

    function update_project($project_model) {

        $data = array(
            'project_name' => $project_model->get_project_name(),
            'project_vendor' => $project_model->get_project_vendor(),
            'project_start_date' => $project_model->get_project_start_date(),
            'project_end_date' => $project_model->get_project_end_date(),
            'project_description' => $project_model->get_project_description(),
            'project_logo' => $project_model->get_project_logo()
        );

        $this->db->where('project_id', $project_model->get_project_id());

        return $this->db->update('project', $data);
    }

    function get_projects_for_employee($emp_code) {

        $this->db->select('project.*');
        $this->db->from('project');
        $this->db->join('task', 'task.project_id = project.project_id');
        $this->db->join('employee_tasks', 'employee_tasks.task_id = task.task_id');
        $this->db->where('employee_tasks.task_status', '0');
        $this->db->where('employee_tasks.employee_id IN('. $emp_code.')');
        $this->db->group_by("task.project_id");
        $this->db->order_by("project.project_id", "desc");
        $query = $this->db->get();

        return $query->result();
    }
    
    function get_last_project_id(){
        $this->db->select('project_id');
        $this->db->from('project');
        $this->db->order_by("project_id", "desc");
        $this->db->limit(1);
        $query = $this->db->get();

        return $query->row();
    }
    
    

}
