<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class manage_wages_controller extends CI_Controller {

    function __construct() {
        parent::__construct();

        if (!$this->session->userdata('EMPLOYEE_LOGGED_IN')) {
            redirect(site_url() . '/login/login_controller');
        } else {
            $this->load->model('employee/employee_model');
            $this->load->model('employee/employee_service');
            
            $this->load->model('company/company_model');
            $this->load->model('company/company_service');
           
        }
    }

    function manage_wages() {

        $employee_service = new employee_service();
        $company_service = new company_service();
       

        $data['heading'] = "Wages Management";
        $data['employees'] = $employee_service->get_employees_by_company_id_manage($this->session->userdata('EMPLOYEE_COMPANY_CODE'));
        $data['companies'] = $company_service->get_all_companies($this->session->userdata('EMPLOYEE_COMPANY_CODE'));
       
        
        $partials = array('content' => 'wages/manage_wages_view');
        $this->template->load('template/main_template', $partials, $data);
    }

    
    function get_employee_by_company(){
        $employee_model=new employee_model();
        $employee_service = new employee_service();
        
        $company_code = $this->input->post('company_code');
        $employee_model->set_company_code($company_code);
        
        $employees=$employee_service->get_employee_by_company_code($employee_model);
    
        ?>
        <option value="">-- Select Employees --</option>
        <?php  foreach ($employees as $employee){?>
         <option value="<?php echo $employee->employee_code ?>"><?php echo $employee->employee_name; ?></option>
            <?php
        }
        ?>
        <?php
    }
        
      function get_wages_details  (){
          
          
          
          
          
          
      }
      
    
        
    
 
 

}