<?php

class Project_stuff_service extends CI_Model {

    function __construct() {
        parent::__construct();
        $this->load->model('project_stuff/project_stuff_model');
    }

    public function get_projects_stuff_for_project($project_id) {

        $this->db->select('*');
        $this->db->from('project_stuff');
        $this->db->where('project_id', $project_id);
        $this->db->order_by("del_ind", "1");
        $query = $this->db->get();
        return $query->result();
    }

    function add_new_project_stuff($project_stuff_model) {
        return $this->db->insert('project_stuff', $project_stuff_model);
    }

    function delete_project($project_id) {
        $data = array('del_ind' => '0');
        $this->db->where('project_id', $project_id);
        return $this->db->update('project', $data);
    }

   

}
