<?php

/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

class Skillcategory_service extends CI_Model {

    function __construct() {
        parent::__construct();
        $this->load->model('skill/skill_model');
    }
    
    public function get_all_skills() {
        $this->db->select('*');
        $this->db->from('skill');
        $this->db->join('skill_category', 'skill_category.del_ind = skill.del_ind');
        $this->db->order_by("skill.skill_code", "desc");
        $query = $this->db->get();
        return $query->result();
    }
    
    function add_new_skill($skill_model) {

        return $this->db->insert('skill', $skill_model);
    }

    function delete_skill($skill_code) {

        return $this->db->delete('skill', array('skill_code' => $skill_code));
    }

    function get_skill_by_code($skill_code) {

        $query = $this->db->get_where('skill', array('skill_code' => $skill_code));
        return $query->row();
    }

    function update_skill($skill_model) {

        $data = array(
            'skill_name' => $skill_model->get_skill_name(),
            'del_ind' => $skill_model->get_del_ind(),
            'added_by' => $skill_model->get_added_by(),
            'added_date' => $skill_model->get_added_date()
        );


        $this->db->where('skill_code', $skill_model->get_skill_code());

        return $this->db->update('skill', $data);
    }

}

