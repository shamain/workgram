<?php

class Wages_category_service extends CI_Model {

    function __construct() {
        parent::__construct();
        $this->load->model('wages_category/wages_category_model');
    }

    function add_new_wages_category($wages_category_model) {
        return $this->db->insert('wages_category', $wages_category_model);
    }

    function add_wages_category($wages_category_model) {

        return $this->db->insert('wages_category', $wages_category_model);
    }

    function delete_wages_category($wages_category_id) {
        $data = array('del_ind' => '0');
        $this->db->where('wages_category_id', $wages_category_id);
        return $this->db->update('wages_category', $data);
    }
 
    public function get_all_wages_categories() {

        $this->db->select('*');
        $this->db->from('wages_category');

        $this->db->where('wages_category.del_ind', '1');
        $this->db->order_by("wages_category.wages_category_id", "desc");

        $query = $this->db->get();
        return $query->result();
    }

    function update_wages_category($wages_category_model) {

        $data = array('wages_category_id' => $wages_category_model->get_wages_category_id(),
            'category_name' => $wages_category_model->get_category_name(),
            'basic_salary' => $wages_category_model->get_basic_salary(),
            'ot_rate' => $wages_category_model->get_ot_rate(),
            'allowance' => $wages_category_model->get_allowance(),
            'bonus' => $wages_category_model->get_bonus(),
        );

        $this->db->where('wages_category_id', $wages_category_model->get_wages_category_id());
        return $this->db->update('wages_category', $data);
    }

    function get_wages_category_by_id($wages_category_id) {
        $query = $this->db->get_where('wages_category', array('wages_category_id' => $wages_category_id,'del_ind'=>'1'));
        return $query->row();
    }

}
