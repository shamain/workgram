<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */
if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Employee_event_controller extends CI_Controller {

    function __construct() {
        parent::__construct();

        if (!$this->session->userdata('EMPLOYEE_LOGGED_IN')) {
            redirect(site_url() . '/login/login_controller');
        } else {
            $this->load->model('employee_event/employee_event_model');
            $this->load->model('employee_event/employee_event_service');

            $this->load->model('event/event_model');
            $this->load->model('event/event_service');
            
            $this->load->model('employee/employee_service');
        }
    }

    function manage_employee_event() {

        $employee_event_service = new Employee_event_service();
        $event_service = new Event_service();
        $employee_service = new Employee_service();
        $data['employees'] = $employee_service->get_employees_by_company_id_manage($this->session->userdata('EMPLOYEE_COMPANY_CODE'));
        
        $data['heading'] = "Manage Employee Events";

        $data['employee_events'] = $employee_event_service->get_all_employee_events();

        $data['events'] = $event_service->get_all_events();

        $partials = array('content' => 'employee_event/manage_employee_event_view');
        $this->template->load('template/main_template', $partials, $data);
    }

    function edit_employee_event_view($employee_event_id) {


        $employee_event_service = new Employee_event_service();
        $event_service = new Event_service();
        $employee_service = new Employee_service();
        
        $data['heading'] = "Edit Employee Events";
        $data['employee_event'] = $employee_event_service->get_employee_event_by_id($employee_event_id);
        $data['events'] = $event_service->get_all_events();
        $data['employees'] = $employee_service->get_employees_by_company_id_manage($this->session->userdata('EMPLOYEE_COMPANY_CODE'));
        
        $partials = array('content' => 'employee_event/edit_employee_event_view');
        $this->template->load('template/main_template', $partials, $data);
    }

    function edit_employee_event() {

        $employee_event_model = new Employee_event_model();
        $employee_event_service = new Employee_event_service();

        $employee_event_model->set_employee_event_id($this->input->post('employee_event_id', TRUE));
        $employee_event_model->set_event_id($this->input->post('event_id', TRUE));
        $employee_event_model->set_employee_code($this->input->post('employee_code', TRUE));

        echo $employee_event_service->update_employee_event($employee_event_model);
    }

    function delete_employee_event() {


        $employee_event_service = new Employee_event_service();

        echo $employee_event_service->delete_employee_event(trim($this->input->post('id', TRUE)));
    }

    function add_new_employee_event() {

        $employee_event_service = new Employee_event_service();
        $employee_event_model = new Employee_event_model();

        $employee_event_model->set_employee_event_id($this->input->post('employee_event_id', TRUE));
        $employee_event_model->set_event_id($this->input->post('event_id', TRUE));
        $employee_event_model->set_employee_code($this->input->post('employee_code', TRUE));
        
        echo $employee_event_service->add_new_employee_event($employee_event_model);
    }

}
