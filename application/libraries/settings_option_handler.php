<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');


/*
 * Author : Viran
 * 2014-01-03 17:00
 * 
 * */

class Settings_option_handler extends CI_Controller {

    //Settings_option_handler is extended from  CI_Controller
    // Reason to extend it from CI_Controller is to get load model functions

    public function __construct() {
        //Main
        parent::__construct();
        $this->load->model('settings/settings/settings_model');
        $this->load->model('settings/settings/settings_service');

        $this->load->model('settings/setting_parameters/setting_parameters_model');
        $this->load->model('settings/setting_parameters/setting_parameters_service');

        $this->load->model('settings/company_settings/company_settings_model');
        $this->load->model('settings/company_settings/company_settings_service');

//        $this->load->model('Main/User_settings/User_settingsmodel');
//        $this->load->model('Main/User_settings/User_settingsservice');
    }

    public function get_option($setting_login_type_id, $emp_code, $company_code) {

        //parameters = setting_id,employee_code,company_id
//        $user_settingsmodel = new User_settingsmodel();
//        $user_settingsservice = new User_settingsservice();

        $company_settings_model = new Company_settings_model();
        $company_settings_service = new Company_settings_service();

        $setting_parameters_model = new Setting_parameters_model();
        $setting_parameters_service = new Setting_parameters_service();


        //get the employee settings
//        $user_settingsmodel->setEmployee_Code($emp_code);
//        $user_settingsmodel->setSetting_id($setting_login_type_id);
//
//        $user_setting = $user_settingsservice->getEmployeeSettingbyid($user_settingsmodel);

        $login_option = '';
        $logged_user_result = '';
//        if (count($user_setting) == 0) {
        //get the company settings
        $company_settings_model->set_company_id($company_code);
        $company_settings_model->set_setting_id($setting_login_type_id);

        $company_setting = $company_settings_service->get_company_setting_by_id($company_settings_model);


        
        if (count($company_setting) == 0) {

            //this will get the default option for login settings
            $setting_parameters_model->set_is_parameter_default_value('y');
            $setting_parameters_model->set_setting_id($setting_login_type_id);
            $default_setting = $setting_parameters_service->get_default_setting_option_by_setting_id($setting_parameters_model);

            $login_option = $default_setting->setting_parameter_id;
        } else {

            $login_option = $company_setting->setting_parameter_id;
        }
//        } else {
//            $login_option = $user_setting->setting_parameter_id;
//        }


        return $login_option;
    }

}

?>