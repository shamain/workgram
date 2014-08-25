<?php

class Skill_category_service extends CI_Model {

    function __construct() {
        parent::__construct();
        $this->load->model('skill_category/skill_category_model');
    }

    function add_new_skill_category($skill_category_model) {
        return $this->db->insert('skill_category', $skill_category_model);
    }

    function add_skill_category($skill_category_model) {

        $this->db->insert('skill_category', $skill_category_model);
        $this->db->last_query();
        return $this->db->insert_id();
    }

    function delete_skill_category($skill_cat_code) {
        $data = array('del_ind' => '0');
        $this->db->where('skill_cat_code', $skill_cat_code);
        return $this->db->update('skill_category', $data);
    }

    public function get_all_skill_categories() {

        $this->db->select('*');
        $this->db->from('skill_category');
        $this->db->join('employee', 'employee.employee_code = skill_category.added_by');
        $this->db->where('skill_category.del_ind', '1');
        $this->db->order_by("skill_category.skill_cat_code", "desc");
        
        $query = $this->db->get();
        return $query->result();
    }

    function update_skill_category($skill_category_model) {

        $data = array(
            'skill_cat_name' => $skill_category_model->get_skill_cat_name(),
            'colour' => $skill_category_model->get_colour()
        );

        $this->db->where('skill_cat_code', $skill_category_model->get_skill_cat_code());

        return $this->db->update('skill_category', $data);
    }

    function get_skill_category_by_id($skill_cat_code) {
        $query = $this->db->get_where('skill_category', array('skill_cat_code' => $skill_cat_code));
        return $query->row();
    }
    
     public function get_skill_cats() {

        $this->db->select('*');
        $this->db->from('skill_category');
        $this->db->where('del_ind', '1');
        
        $query = $this->db->get();
        return $query->result();
    }
    
    

}
