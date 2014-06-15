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
}