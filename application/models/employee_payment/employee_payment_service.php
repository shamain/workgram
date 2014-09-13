<?php

class employee_payment_service extends CI_Model {
    function __construct() {

        parent::__construct();
        $this->load->model('employee_payment/employee_payment_model');
    }
    
    public function get_all_employee_payment() {


        $this->db->select('*');
        $this->db->from('employee_payment');
        $query = $this->db->get();
        return $query->result();
    }
    
    public function get_employee_payment($employee_payment_model) {

        $query = $this->db->get_where('employee_payment', array('employee_code' => $employee_payment_model->get_employee_code(),'year_month'=>$employee_payment_model->get_year_month()));
        return $query->row();
        
    }
   
    function get_payments_by_employee_id($employee_code) {

        $this->db->select('*');
        $this->db->from('employee_payment');
        $this->db->where('employee_code', $employee_code);
        $this->db->order_by("payment_id",'desc');
        $query = $this->db->get();
        return $query->result();
    }

          function add_new_payment($employee_payment_model) {
        return $this->db->insert('employee_payment', $employee_payment_model);
    }

    }
