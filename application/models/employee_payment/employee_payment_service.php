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
/*this function use in get_employee_payment() function in wages controller*/
    public function get_employee_payment($employee_payment_model) {
        $this->db->select('*');
        $this->db->from('employee_payment');
        $this->db->where('employee_code', $employee_payment_model->get_employee_code());
        $this->db->where('year_month', $employee_payment_model->get_year_month());
        $query = $this->db->get();
//        echo $this->db->last_query();
        return $query->row();
    }

    function get_payments_by_employee_id($employee_code) {

        $this->db->select('*');
        $this->db->from('employee_payment');
        $this->db->where('employee_code', $employee_code);
        $this->db->order_by("payment_id", 'desc');
        $query = $this->db->get();
        return $query->result();
    }
/*this function use in get_wages_details_for_employee() function in wages controler*/
    function get_payments_by_employee_id_and_month($employee_payment_model) {

        $this->db->select('*');
        $this->db->from('employee_payment');
        $this->db->where('employee_code', $employee_payment_model->get_employee_code());
        $this->db->where('year_month', $employee_payment_model->get_year_month());
        $query = $this->db->get();
        return $query->row();
    }

    function add_new_payment($employee_payment_model) {
        return $this->db->insert('employee_payment', $employee_payment_model);
    }

}
