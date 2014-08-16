<?php

class Project_stuff_temp_service extends CI_Model {

    function __construct() {
        parent::__construct();
        $this->load->model('project_stuff_temp/project_stuff_temp_model');
    }

    public function get_all_projects_for_company($company_code) {

        $this->db->select('project.*,employee.employee_fname,employee.employee_lname');
        $this->db->from('project');
        $this->db->join('employee', 'employee.employee_code = project.added_by');
        $this->db->where('project.company_code', $company_code);
        $this->db->order_by("project.project_id", "desc");
        $query = $this->db->get();
        return $query->result();
    }

    function add_new_project_stuff_temp($project_stuff_temp_model) {
        return $this->db->insert('project_stuff_temp', $project_stuff_temp_model);
    }

    function delete_project($project_id) {
        $data = array('del_ind' => '0');
        $this->db->where('project_id', $project_id);
        return $this->db->update('project', $data);
    }

   

}
