
<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class wages_category_controller extends CI_Controller {

    function __construct() {
        parent::__construct();


        $this->load->model('wages_category/wages_category_model');
        $this->load->model('wages_category/wages_category_service');

   
    }

    function manage_wages_category() {

        $wages_category_service = new wages_category_service();

        $data['heading'] = "Manage Wages Category";
        $data['wages_categorys'] = $wages_category_service->get_all_wages_category_for_company($this->session->userdata('wages_category_id'));

        $partials = array('content' => 'wages_categorys/Manage Wages Category');
        $this->template->load('template/main_template', $partials, $data);
    }


  

   

    
   

}
