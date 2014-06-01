<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Privilege_controller extends CI_Controller {

    function __construct() {
        parent::__construct();

        if (!$this->session->userdata('EMPLOYEE_LOGGED_IN')) {
            redirect(site_url() . '/login/login_controller');
        } else {
            $this->load->model('privilege/privilege_model');
            $this->load->model('privilege/privilege_service');
            $this->load->model('privilege_master/privilege_master_service');
//            $this->load->model('Employee_user_priviledges/Employeeuserpriviledgesmodel');
//            $this->load->model('Employee_user_priviledges/Employeeuserpriviledgesservice');
        }
    }

    function manage_privileges() {
//        $perm = Access_controllerservice :: checkAccess('MANAGE_PRIVILEGES');
//        if ($perm) {

        $privilege_service = new Privilege_service();
        $privilege_master_service = new Privilege_master_service();
        $data['heading'] = "Manage Privileges";

        $data['priviledges'] = $privilege_service->get_all_privileges();

        $data['master_priviledges'] = $privilege_master_service->get_all_master_provileges();

        $partials = array('content' => 'privileges/manage_privileges_view');
        $this->template->load('template/main_template', $partials, $data);
//        } else {
//            $this->template->load('template/access_denied_page');
//        }
    }

    function addnewpriviledge() {
        $perm = Access_controllerservice :: checkAccess('ADD_PRIVILEGES');
        if ($perm) {

            $priviledgesmodel = new Priviledgesmodel();

            $priviledgesmodel->setPrivilege_Master_Code($this->input->post('Privilege_Master_Code', TRUE));
            $priviledgesmodel->setPrivilege($this->input->post('Privilege', TRUE));
            $priviledgesmodel->setPrivilege_Description($this->input->post('Privilege_Description', TRUE));
            $priviledgesmodel->setPriviledge_Code_HF($this->input->post('Priviledge_Code_HF', TRUE));



            echo Priviledgesservice :: addnewpriviledge($priviledgesmodel);
        } else {
            $this->template->load('template/access_denied_page');
        }
    }

    function deletepriviledge() {
        $perm = Access_controllerservice :: checkAccess('DELETE_PRIVILEGES');
        if ($perm) {
            Priviledgesmodel :: setPrivilege_Code(trim($this->input->post('id', TRUE)));

            echo Priviledgesservice :: deletepriviledge();
        } else {
            $this->template->load('template/access_denied_page');
        }
    }

    function edit_priviledges_view($id) {
        $perm = Access_controllerservice :: checkAccess('EDIT_PRIVILEGES');
        if ($perm) {
            $data['title'] = "Edit Priviledge";

            Priviledgesmodel :: setPrivilege_Code($id);


            $data['priviledgebyid'] = Priviledgesservice :: getPriviledgebyid();
            $data['master_priviledges'] = Master_priviledgesservice :: getAllmasterproviledges();

            $partials = array('content' => 'Priviledges/edit_priviledges');
            $this->template->load('template/main_template', $partials, $data);
        } else {
            $this->template->load('template/access_denied_page');
        }
    }

    function editpriviledge() {

        $perm = Access_controllerservice :: checkAccess('EDIT_PRIVILEGES');
        if ($perm) {

            $priviledgesmodel = new Priviledgesmodel();

            $priviledgesmodel->setPrivilege_Master_Code($this->input->post('Privilege_Master_Code', TRUE));
            $priviledgesmodel->setPrivilege($this->input->post('Privilege', TRUE));
            $priviledgesmodel->setPrivilege_Description($this->input->post('Privilege_Description', TRUE));
            $priviledgesmodel->setPriviledge_Code_HF($this->input->post('Priviledge_Code_HF', TRUE));

            $priviledgesmodel->setPrivilege_Code($this->input->post('Privilege_Code', TRUE));


            echo Priviledgesservice :: updatepriviledge($priviledgesmodel);
        } else {
            $this->template->load('template/access_denied_page');
        }
    }

    function getEpmsPerPrivileges($priv_code) {
        //echo $priv_code;die;

        $perm = Access_controllerservice :: checkAccess('MANAGE_EMPLOYEE_PRIVILEDGES');
        if ($perm) {


            $priviledgesmodel = new Priviledgesmodel();
            $priviledgesmodel->setPrivilege_Code($priv_code);
            $privilegeservice = new Priviledgesservice();

            $data['employees'] = $privilegeservice->getEmployeesForPrivilege($priviledgesmodel);

            Priviledgesmodel :: setPrivilege_Code($priv_code);
            $data['title_priv'] = $privilegeservice->getPriviledgebyid();
            $data['title'] = "Employees with privileges";

            $partials = array('content' => 'Priviledges/employees_per_priv');
            $this->template->load('template/main_template', $partials, $data);
        } else {
            $this->template->load('template/access_denied_page');
        }
    }

}
