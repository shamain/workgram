<?php

/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */
class Skillcategory_service extends CI_Model {

    function __construct() {
        parent::__construct();
         $this->load->model('skill_category/skillcategory_model');
    }  
    
    function add_new_skillcategory($skillcategory_model) {
        return $this->db->insert('skill_category', $skillcategory_model);
    }

    function delete_skillcategory($skill_cat_code) {
        $data = array('del_ind' => '0');
        $this->db->where('skill_cat_code', $skill_cat_code);
        return $this->db->update('skill_category', $data);
    }
}
    
    
    
    


