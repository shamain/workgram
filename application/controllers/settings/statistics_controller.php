<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Statistics_controller extends CI_Controller {

    /**
     * Index Page for this controller.
     *
     * Maps to the following URL
     * 		http://example.com/index.php/welcome
     * 	- or -  
     * 		http://example.com/index.php/welcome/index
     * 	- or -
     * Since this controller is set as the default controller in 
     * config/routes.php, it's displayed at http://example.com/
     *
     * So any other public methods not prefixed with an underscore will
     * map to /index.php/welcome/<method_name>
     * @see http://codeigniter.com/user_guide/general/urls.html
     */
    function __construct() {
        parent::__construct();

        if (!$this->session->userdata('EMPLOYEE_LOGGED_IN')) {
            redirect(site_url() . '/login_controller');
        } else {

            $this->load->model('settings/statistics/statistics_service');
        }
    }

    function index($offset = 0) {


//        $perm = Access_controllerservice :: checkAccess('USAGE_STATISTICS');
//        if ($perm) {


            $stats_service = new Statistics_service();
            //$statsmodel = new Statisticsservice();

            $this->load->library('table');

            // Load Pagination
            $this->load->library('pagination');

            // Config setup
            $config['base_url'] = site_url() . '/HRM/statistics_controller/index';
            $config['total_rows'] = $stats_service->get_statistics_count();
            $config['per_page'] = 20;
            // I added this extra one to control the number of links to show up at each page.
            $config['num_links'] = 10;
            $config["uri_segment"] = 4;
            // Initialize
            $this->pagination->initialize($config);

            $page = $offset;

            $data["results"] = $stats_service->get_all_stats($config["per_page"], $page);

            $data["links"] = $this->pagination->create_links();

            $data['heading'] = "System Usage Statistics";

//            $data['systems'] = $stats_service->get();
            $this->session->set_userdata('LCS_SYSTEM', 7);

            $partials = array('content' => 'statistics/manage_statistics_view');
            $this->template->load('template/main_template', $partials, $data);
//        } else {
//            $this->template->load('template/access_denied_page');
//        }
    }

}
