<?php

class Company_service extends CI_Model {

    function __construct() {
        parent::__construct();
        $this->load->model('company/company_model');
    }

    function add_new_company($company_model) {
        return $this->db->insert('company', $company_model);
    }

    function add_new_company_registration($company_model) {

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

    //update company
    function update_company($company_model) {

        $data = array('company_code' => $company_model->get_company_code(),
            'company_name' => $company_model->get_company_name(),
            'company_email' => $company_model->get_company_email(),
            'company_address' => $company_model->get_company_address(),
            'company_contact' => $company_model->get_company_contact(),
            'company_desc' => $company_model->get_company_desc(),
        );

        $this->db->where('company_Code', $company_model->get_company_code());
        return $this->db->update('company', $data);
    }

    function get_company_by_id($company_code) {

        $query = $this->db->get_where('company', array('company_code' => $company_code));
        return $query->row();
    }
    
    function delete_company($company_code) {
        $data = array('del_ind' => '0');
        $this->db->where('company_code', $company_code);
        return $this->db->update('company', $data);
    }

}
