<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Privilege_master_controller extends CI_Controller {

    function __construct() {
        parent::__construct();

        if (!$this->session->userdata('EMPLOYEE_LOGGED_IN')) {
            redirect(site_url() . '/login/login_controller');
        } else {
            $this->load->model('privilege_master/privilege_master_model');
            $this->load->model('privilege_master/privilege_master_service');

            $this->load->model('Systems/Systemsservice');
        }
    }

    function manage_privilege_masters() {

//        $perm = Access_controllerservice :: checkAccess('MANAGE_MASTER_PRIVILEGES');
//        if ($perm) {

        $privilege_master_service = new Privilege_master_service();
        $data['title'] = "Manage Master Privileges";

        $data['master_privileges'] = $privilege_master_service->get_all_master_provileges();
//        $data['systems'] = Systemsservice :: getAllsystems();

        $partials = array('content' => 'privilege_master/manage_privilege_master_view');
        $this->template->load('template/main_template', $partials, $data);
//        } else {
//            $this->template->load('template/access_denied_page');
//        }
    }

    function addnewmasterpriviledge() {

        $perm = Access_controllerservice :: checkAccess('ADD_MASTER_PRIVILEGES');
        if ($perm) {

            $masterpriviledgesmodel = new Master_priviledgesmodel();

            $masterpriviledgesmodel->setMain_System_Code($this->input->post('Main_System_Code', TRUE));
            $masterpriviledgesmodel->setMaster_Privilege($this->input->post('Master_Privilege', TRUE));
            $masterpriviledgesmodel->setMaster_Privilege_Description($this->input->post('Master_Privilege_Description', TRUE));


            echo Master_priviledgesservice :: addnewmasterpriviledge($masterpriviledgesmodel);
        } else {
            $this->template->load('template/access_denied_page');
        }
    }

    function deletemasterpriviledge() {

        $perm = Access_controllerservice :: checkAccess('DELETE_MASTER_PRIVILEGES');
        if ($perm) {
            Master_priviledgesmodel :: setPrivilege_Master_Code(trim($this->input->post('id', TRUE)));

            echo Master_priviledgesservice :: deletemasterpriviledge();
        } else {
            $this->template->load('template/access_denied_page');
        }
    }

    function edit_master_priviledges_view($id) {

        $perm = Access_controllerservice :: checkAccess('EDIT_MASTER_PRIVILEGES');
        if ($perm) {
            $data['title'] = "Edit Master Priviledge";

            Master_priviledgesmodel :: setPrivilege_Master_Code($id);


            $data['masterpriviledgebyid'] = Master_priviledgesservice :: getmasterPriviledgebyid();
            $data['systems'] = Systemsservice :: getAllsystems();

            $partials = array('content' => 'Master_priviledges/edit_master_priviledges');
            $this->template->load('template/main_template', $partials, $data);
        } else {
            $this->template->load('template/access_denied_page');
        }
    }

    function editmasterpriviledge() {

        $perm = Access_controllerservice :: checkAccess('EDIT_MASTER_PRIVILEGES');
        if ($perm) {

            $masterpriviledgesmodel = new Master_priviledgesmodel();

            $masterpriviledgesmodel->setMain_System_Code($this->input->post('Main_System_Code', TRUE));
            $masterpriviledgesmodel->setMaster_Privilege($this->input->post('Master_Privilege', TRUE));
            $masterpriviledgesmodel->setMaster_Privilege_Description($this->input->post('Master_Privilege_Description', TRUE));
            $masterpriviledgesmodel->setPrivilege_Master_Code($this->input->post('Privilege_Master_Code', TRUE));

            echo Master_priviledgesservice :: updatemasterpriviledge($masterpriviledgesmodel);
        } else {
            $this->template->load('template/access_denied_page');
        }
    }

}
