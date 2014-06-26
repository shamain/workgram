<?php

class Company_service extends CI_Model {

    function __construct() {
        parent::__construct();
        $this->load->model('company/company_model');
    }

 
    function add_new_company($company_model) {
         $this->db->insert('company', $company_model);
         return $this->db->insert_id();
    }
    
   public function get_all_companies() {


        $this->db->select('*');
        $this->db->from('company');
        $this->db->order_by("company.company_code", "desc");
        $query = $this->db->get();
        return $query->result();
    }

}
