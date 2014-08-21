<?php

class Project_stuff_temp_service extends CI_Model {

    function __construct() {
        parent::__construct();
        $this->load->model('project_stuff_temp/project_stuff_temp_model');
    }

    public function get_all_project_stuff_temp_for_company($company_code) {

        $this->db->select('*');
        $this->db->from('project_stuff_temp');
        $this->db->where('company_code', $company_code);
        $query = $this->db->get();
        return $query->result();
    }

    function add_new_project_stuff_temp($project_stuff_temp_model) {
        return $this->db->insert('project_stuff_temp', $project_stuff_temp_model);
    }

    function truncate_project_temp_stuff() {
        return $this->db->truncate('project_stuff_temp');
    }

   

}
