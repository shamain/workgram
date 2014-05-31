<?php

class Setting_parameters_service extends CI_Model {

    function __construct() {
        parent::__construct();
    }

    //put your code here


    function get_default_setting_option_by_setting_id($setting_parameters_model) {


        $this->db->select('setting_parameters.setting_parameter_id');
        $this->db->from('setting_parameters');
        $this->db->where('setting_parameters.setting_id ', $setting_parameters_model->get_setting_id());
        $this->db->where('setting_parameters.is_parameter_default_value ', $setting_parameters_model->get_is_parameter_default_value());
        $query = $this->db->get();
        return $query->row();
    }

    function get_setting_parameter_by_id($setting_parameters_model) {


        $this->db->select('setting_parameters.parameter_name');
        $this->db->from('setting_parameters');
        $this->db->where('setting_parameters.setting_parameter_id ', $setting_parameters_model->get_setting_parameter_id());
        $query = $this->db->get();
        return $query->row();
    }

    function get_parameters_by_setting_id($setting_parameters_model) {


        $this->db->select('setting_parameters.setting_parameter_id,setting_parameters.parameter_name,setting_parameters.parameter_description');
        $this->db->from('setting_parameters');
        $this->db->where('setting_parameters.setting_id ', $setting_parameters_model->get_setting_id());
        $query = $this->db->get();
        return $query->result();
    }

}

?>
