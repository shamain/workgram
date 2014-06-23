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

            $this->load->model('privilege_master/privilege_master_model');
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

        $data['privileges'] = $privilege_service->get_all_privileges();

        $data['master_privileges'] = $privilege_master_service->get_all_master_privileges();

        $partials = array('content' => 'privileges/manage_privileges_view');
        $this->template->load('template/main_template', $partials, $data);
//        } else {
//            $this->template->load('template/access_denied_page');
//        }
    }

    function add_new_privilege() {
//        $perm = Access_controllerservice :: checkAccess('ADD_PRIVILEGES');
//        if ($perm) {

        $privilege_model = new Privilege_model();
        $privilege_service = new Privilege_service();

        $privilege_model->set_privilege_master_code($this->input->post('master_privilege_code', TRUE));
        $privilege_model->set_privilege($this->input->post('privilege', TRUE));
        $privilege_model->set_privilege_description($this->input->post('privilege_desc', TRUE));
        $privilege_model->set_priviledge_code_HF($this->input->post('privilege_hf', TRUE));
        $privilege_model->set_assign_for($this->input->post('assign_for', TRUE));



        echo $privilege_service->add_new_privilege($privilege_model);
//        } else {
//            $this->template->load('template/access_denied_page');
//        }
    }

    function delete_privilege() {
//        $perm = Access_controllerservice :: checkAccess('DELETE_PRIVILEGES');
//        if ($perm) {
        $privilege_service = new Privilege_service();
        echo $privilege_service->delete_privilege($this->input->post('id', TRUE));
//        } else {
//            $this->template->load('template/access_denied_page');
//        }
    }

    function edit_privileges_view($id) {
//        $perm = Access_controllerservice :: checkAccess('EDIT_PRIVILEGES');
//        if ($perm) {

        $privilege_service = new Privilege_service();
        $privilege_master_service = new Privilege_master_service();

        $data['heading'] = "Edit Privilege";
        $data['privilege'] = $privilege_service->get_privilege_by_id($id);
        $data['master_privileges'] = $privilege_master_service->get_all_master_privileges();

        $partials = array('content' => 'privileges/edit_privilege_view');
        $this->template->load('template/main_template', $partials, $data);
//        } else {
//            $this->template->load('template/access_denied_page');
//        }
    }

    function edit_privilege() {

//        $perm = Access_controllerservice :: checkAccess('EDIT_PRIVILEGES');
//        if ($perm) {

        $privileges_model = new Privilege_model();
        $privilege_service = new Privilege_service();

        $privileges_model->set_privilege_master_code($this->input->post('master_privilege_code', TRUE));
        $privileges_model->set_privilege($this->input->post('privilege', TRUE));
        $privileges_model->set_privilege_description($this->input->post('privilege_desc', TRUE));
        $privileges_model->set_priviledge_code_HF($this->input->post('privilege_hf', TRUE));
        $privileges_model->set_assign_for($this->input->post('assign_for', TRUE));

        $privileges_model->set_privilege_code($this->input->post('privilege_code', TRUE));


        echo $privilege_service->update_privilege($privileges_model);
//        } else {
//            $this->template->load('template/access_denied_page');
//        }
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
