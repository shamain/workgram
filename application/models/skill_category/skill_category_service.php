<?php

class Skill_category_service extends CI_Model {

    function __construct() {
        parent::__construct();
        $this->load->model('skill_category/skill_category_model');
    }

    function add_new_skill_category($skill_category_model) {
        return $this->db->insert('skill_category', $skill_category_model);
    }

    function delete_skill_category($skill_cat_code) {
        $data = array('del_ind' => '0');
        $this->db->where('skill_cat_code', $skill_cat_code);
        return $this->db->update('skill_category', $data);
    }

    public function get_all_skillcategory() {


        $this->db->select('*');
        $this->db->from('skill_category');
        $this->db->join('skill_category', 'skill_category.skill_cat_code = skill.skill_cat_code');
        $this->db->order_by("skill.skill_cat_code", "desc");
        $query = $this->db->get();
        return $query->result();
    }

    function update_skill_category($skill_category_model) {

        $data = array(
            'skill_cat_name' => $skill_category_model->get_skill_cat_name()
        );


        $this->db->where('skill_cat_code', $skill_category_model->get_skill_cat_code());

        return $this->db->update('skill_category', $data);
    }

}
