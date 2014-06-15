<?php

if(!defined('BASEPATH'))
    exit('No direct script access allowed');

class Employee_profile_controller extends CI_Controller{
    
    function __construct(){
        parent::__construct();
        
    if (!$this->session->userdata('EMPLOYEE_LOGGED_IN')){
        redirect(site_url().'login/login_controller');
        
    }
    
 else {
     
        $this->load->model('employee/employee_model');
        $this->load->model('employee/employee_service');
        
    }
        
}

function view_profile(){
    
    $employee_service = new Employee_service();
    
    $data['heading']="View Profile";
    $data['employee_detail']= $employee_service->get_employee_by_id($this->session->userdata('EMPLOYEE_CODE'));



  $partials= array('content'=>'employee/manage_employee_view');
  $this->template->load('template/main_template',$partials,$data);
  
}
}

?>
