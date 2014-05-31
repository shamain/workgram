<?php


class Company_settings_service extends CI_Model {

    function __construct() {
        parent::__construct();
    }

    //put your code here

    function get_company_setting_by_id($company_settings_model) {


        $this->db->select('company_settings.setting_parameter_id');
        $this->db->from('company_settings');
        $this->db->where('company_settings.setting_id ', $company_settings_model->get_setting_id());
        $this->db->where('company_settings.company_id ', $company_settings_model->get_company_id());
        $query = $this->db->get();
        return $query->row();
    }

}

?>
