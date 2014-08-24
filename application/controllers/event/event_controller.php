<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */
if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Event_controller extends CI_Controller {

    function __construct() {
        parent::__construct();

        if (!$this->session->userdata('EMPLOYEE_LOGGED_IN')) {
            redirect(site_url() . '/login/login_controller');
        } else {
            $this->load->model('event/event_model');
            $this->load->model('event/event_service');
            
            $this->load->model('employee/employee_model');
            $this->load->model('employee/employee_service');
        }
    }

    function manage_event() {

        $event_service = new event_service();
        $employee_service = new Employee_service();

        $data['employees'] = $employee_service->get_employees_by_company_id_manage($this->session->userdata('EMPLOYEE_COMPANY_CODE'));
        $data['heading'] = "Add Event";
        $data['events'] = $event_service->get_all_events();

        $parials = array('content' => 'event/manage_event_view');
        $this->template->load('template/main_template', $parials, $data);
    }

    function edit_event_view($event_id) {

        $event_service = new Event_service();
        $data['heading'] = "Edit Event";
        $data['event'] = $event_service->get_event_by_id($event_id);

        $partials = array('content' => 'event/edit_event_view');
        $this->template->load('template/main_template', $partials, $data);
    }

    function add_new_event() {

        $event_service = new Event_service();
        $event_model = new Event_model();

        $event_model->set_event_title($this->input->post('event_title', TRUE));
        $event_model->set_event_description($this->input->post('event_description', TRUE));
        $event_model->set_start_date($this->input->post('start_date', TRUE));
        $event_model->set_end_date($this->input->post('end_date', TRUE));
        $event_model->set_del_ind('1');
        $event_model->set_added_by($this->session->userdata('EMPLOYEE_CODE'));
        $event_model->set_added_date(date("Y-m-d H:i:s"));


        echo $event_service->add_new_event($event_model);
        //add to employee_event table start
        
        $events=$event_service->get_all_events();
        $count=count($events);
        $all_employees = $employee_service->get_employees_by_company_id_manage($this->session->userdata('EMPLOYEE_COMPANY_CODE'));
        $etype=$this->input->post('etype', TRUE);
        
        
        if ($etype == 'specific') {
            foreach ($this->input->post('employee_events') as $employee) {
                $employee_event_model->set_employee_event_id($this->input->post('employee_event_id', TRUE));
                $employee_event_model->set_employee_code($employee);
                $employee_event_model->set_event_id($events[$count - 1]->event_id);
                //$employee_event_model->set_notified_user_is_seen('n');

                echo $employee_event_service->add_new_employee_event($employee_event_model);
            }
        }
        else{
            foreach ($all_employees as $employee) {
                $employee_event_model->set_employee_event_id($this->input->post('employee_event_id', TRUE));
                $employee_event_model->set_employee_code($employee->employee_code);
                $employee_event_model->set_event_id($events[$count - 1]->event_id);
               // $employee_event_model->set_notified_user_is_seen('n');

                echo $employee_event_service->add_new_employee_event($employee_event_model);
            }
        } 
         //add to employee_event table end
    
        
    }
    function edit_event() {

        $event_model = new Event_model();
        $event_service = new Event_service();

        $event_model->set_event_id($this->input->post('event_id', TRUE));
        $event_model->set_event_title($this->input->post('event_title', TRUE));
        $event_model->set_event_description($this->input->post('event_description', TRUE));
        $event_model->set_start_date($this->input->post('start_date', TRUE));
        $event_model->set_end_date($this->input->post('end_date', TRUE));
        echo $event_service->update_event($event_model);
    }

    function delete_event() {


        $event_service = new Event_service();

        echo $event_service->delete_event(trim($this->input->post('id', TRUE)));
    }


}

