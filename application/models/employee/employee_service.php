<?php

class Employee_service extends CI_Model {

    function __construct() {

        parent::__construct();
    }
   //update employee
      function update_employee($employee_model) {
        
        $data = array('employee_no' => $employee_model->get_employee_no(), 
                      'employee_fname' =>  $employee_model->get_employee_fname(),
                      'employee_lname' =>  $employee_model->get_employee_lname(),
                      'employee_password' =>  $employee_model->get_employee_password(),
                      'employee_email' =>  $employee_model->get_employee_email(),
                      'employee_type' => $employee_model->get_employee_type(), 
                      'employee_bday' =>  $employee_model->get_employee_bday(),
                      'employee_contact' =>  $employee_model->get_employee_contact(),
                      'employee_salary' =>  $employee_model->get_employee_salary(),
                      'employee_contract' =>  $employee_model->get_employee_contract(),
                      'employee_avatar' =>  $employee_model->get_employee_avatar(),
                      'account_activation_code' =>  $employee_model->get_account_activation_code(),
                      'company_code' =>  $employee_model->get_company_code(),
                      'del_ind' =>  $employee_model->get_del_ind(),
                      'added_by' =>  $employee_model->get_added_by(),
                      'added_date' =>  $employee_model->get_added_date(),
                      'updated_by' =>  $employee_model->get_updated_by(),
                      'updated_date' =>  $employee_model->get_updated_date(),
                      
            

       
           );
           
        $this->db->where('employee_Code', $employee_model->get_employee_code());
        return $this->db->update('employee', $data);
    }
  
    //get active employees in a company by company code
    function get_employees_by_company_id($company_code) {

        $query = $this->db->get_where('employee', array('company_code' => $company_code, 'del_ind' => '1'));
        return $query->result();
    }

    //get user details by employee code
    function get_employee_by_id($emp_code) {

        $query = $this->db->get_where('employee', array('employee_code' => $emp_code));
        return $query->row();
    }

    function authenticate_user($employee_model) {

        $data = array('employee_email' => $employee_model->get_employee_email() /* , 'Password'=>$employee_model->get_employee_password() */, 'del_ind' => '1');

        $this->db->select('employee.*,company.company_name');
        $this->db->from('employee');
        $this->db->join('company', 'employee.company_code = company.company_code');
        $this->db->where($data);
        $query = $this->db->get();

        return $query->row();
    }

    function authenticate_user_with_password($employee_model) {

        $data = array('employee_email' => $employee_model->get_employee_email(), 'employee_password' => $employee_model->get_employee_password(), 'del_ind' => '1');

        $this->db->select('employee.*,company.company_name');
        $this->db->from('employee');
        $this->db->join('company', 'employee.company_code = company.company_code');
        $this->db->where($data);
        $query = $this->db->get();
        return $query->row();
    }

    function get_server_by_email($employee_model) {

        $server = 0;
        $this->db->select('*');
        $this->db->from('employee');
        $this->db->where('employee.employee_email', $employee_model->get_employee_email());
        $this->db->where('del_ind', '1');
        $query = $this->db->get();
        foreach ($query->result() as $emp) {
//            $server = $emp->mail_server;
            $server = 1;
        }
        return $server;
    }

    //check token match for the actual one
    public function check_user_id_token_combination($employee_model) {
        $this->db->where('employee_code', $employee_model->get_employee_code());
        $this->db->where('account_activation_code', $employee_model->get_account_activation_code());
        $res = $this->db->get('employee');
        return $res->num_rows();
    }
    
    //check token match for the actual one
    function activate_employee_account($employee_model) {
        $data = array('del_ind' => $employee_model->get_del_ind());
        $this->db->where('employee_code', $employee_model->get_employee_code());
        return $this->db->update('employee', $data);
    }

    function get_employees($emp_status = 1) {

        $keywords = $this->input->post('keywords');
        if (trim($keywords) != "") {
            $this->db->like('CONCAT(Employee_Name," ",last_name )', $keywords);
        }
        $this->db->where('Status', '1');
        // 14Oct2013 Barathy
        if ($emp_status == 1) {
            $this->db->where("(resigned_date >=  '" . date('Y-m-d') . "'  or resigned_date = '0000-00-00')");
            //$this->db->or_where('resigned_date =', '0000-00-00');
            //change by chamika because function not work correctly
        } else {
            $this->db->where('resigned_date <', "date('Y-m-d')");
            $this->db->where('resigned_date !=', '0000-00-00');
        }
        $this->db->where('Employee_Code !=', '0');
        $this->db->order_by("Employee_Name");
        // 14Oct2013 Barathy End
        $query = $this->db->get('lcs_employee');
        //echo $this->db->last_query();
        //$this->db->order_by('Employee_Code',"desc");
        return $query->result();
    }

    function get_employees_on_company($company_code) {
        $this->db->select('employee_code, employee_no,employee_fname,employee_lname');
        $this->db->from('employee');
        $this->db->where('del_ind', '1');
        $this->db->where('company_code', $company_code);
        $result = $this->db->get();
        return $result->result();
    }

//    function getEmployeesWithEmpNo($emp_status = 1) {
//
//        $this->db->where('Status', '1');
//        if ($emp_status == 1) {
//            $this->db->where('resigned_date >=', "date('Y-m-d')");
//            $this->db->or_where('resigned_date =', '0000-00-00');
//        } else {
//            $this->db->where('resigned_date <', "date('Y-m-d')");
//            $this->db->where('resigned_date !=', '0000-00-00');
//        }
//        $this->db->where('Employee_Code !=', '0');
//        $this->db->where('employee_no !=', '');
//        $this->db->order_by("Employee_Name");
//        $query = $this->db->get('lcs_employee');
//        //echo $this->db->last_query();
//        return $query->result();
//    }
//    function getactiveEmployeescount() {
//
//        $query = $this->db->get_where('lcs_employee', array('Status' => '1', 'Employee_Code !=' => '0'));
//        return $query->num_rows();
//    }
    function add_new_employee($employee_model) {

        return $this->db->insert('employee', $employee_model);

    }

    function add_employee($employee_model) {

        $this->db->insert('employee', $employee_model);
        $this->db->last_query();
        return $this->db->insert_id();
    }

    function delete_employee($emp_code) {
        $data = array('del_ind' => '0');
        $this->db->where('employee_code', $emp_code);
        return $this->db->update('employee', $data);
    }

    function updateEmployee($employeemodel) {

        //setting the fields need to be update
        $data = array('employee_no' => $employeemodel->getEmployee_no(), //11Oct2013 Barathy
            'Employee_Name' => $employeemodel->getEmployee_Name(), 'Designation' => $employeemodel->getDesignation(), 'Email' => $employeemodel->getEmail(), 'last_name' => $employeemodel->getLast_name(), 'full_name' => $employeemodel->getFull_name(), 'birthday' => $employeemodel->getBirthday(), 'nic' => $employeemodel->getNic(), 'gender' => $employeemodel->getGender(), 'marital_status' => $employeemodel->getMarital_status(), 'address1' => $employeemodel->getAddress1(), 'address2' => $employeemodel->getAddress2(), 'city' => $employeemodel->getCity(), 'mobile_no' => $employeemodel->getMobile_no(), 'phone_extension' => $employeemodel->getPhone_extension(), 'contract_type' => $employeemodel->getContract_type(), //11Oct2013 Barathy
            'emp_cat_id' => $employeemodel->getEmp_cat_id(), //11Oct2013 Barathy
            'joined_date' => $employeemodel->getJoined_date(), 'resigned_date' => $employeemodel->getResigned_date(), 'roster_id ' => $employeemodel->getRoster_id(), 'emp_image' => $employeemodel->getEmp_image(), 'company_id' => $employeemodel->getCompany_id(), 'mail_server' => $employeemodel->getMail_server(), 'updated_by' => $this->session->userdata('LCS_EMPLOYEE_CODE'), 'updated_date' => date('Y-m-d H:i:s'));
        $this->db->where('Employee_Code', $employeemodel->getEmployee_Code());
        return $this->db->update('lcs_employee', $data);
    }

    public function get_employee($emp_code) {

        $query = $this->db->get_where('employee', array('employee_code' => $emp_code, 'del_ind' => '1'));
        return $query->row();
    }

    public function get_employeeByEmpNo($employeemodel) {

        //07Nov2013 Barathy added 'Status' => '1' to where clause
        $query = $this->db->get_where('lcs_employee', array('employee_no' => $employeemodel->getEmployee_no(), 'Status' => '1'));
        return $query->row();
    }

    public function get_employeesRoster($employeemodel) {

        //07Nov2013 Barathy added 'Status' => '1' to where clause
        $query = $this->db->get_where('lcs_employee', array('roster_id' => $employeemodel->getRoster_id(), 'Status' => '1', 'Employee_Code !=' => '0'));
        return $query->result();
    }

    public function get_employeesNoRoster() {

        $this->db->where('resigned_date =', '0000-00-00');
        //07Nov2013 Barathy added 'Status' => '1' to where clause
        $query = $this->db->get_where('lcs_employee', array('roster_id !=' => '0', 'Status' => '1', 'Employee_Code !=' => '0'));
        return $query->result();
    }

    public function get_employeeByDepID($depid) {

        $this->db->select('lcs_employee.*, lcs_employee_departments.Department_Code');
        $this->db->from('lcs_employee');
        $this->db->join('lcs_employee_departments', 'lcs_employee.Employee_Code = lcs_employee_departments.Employee_Code');
        $this->db->where('lcs_employee.Employee_Code !=', '0');
        $this->db->where('lcs_employee.Status', '1');
        $this->db->where('lcs_employee.resigned_date =', '0000-00-00');
        $this->db->where('lcs_employee.Status =', '1'); //07Nov2013 Barathy
        $this->db->where('lcs_employee_departments.Department_Code ', $depid);
        $this->db->order_by('lcs_employee.Employee_Name');
        $query = $this->db->get();
        return $query->result();
    }

    public function get_employeeBysupidExclude($supid, $depid = 0) {

        $this->db->select('lcs_employee.*, lcs_employee_departments.Department_Code');
        $this->db->from('lcs_employee');
        $this->db->where('lcs_employee.Employee_Code !=', '0');
        $this->db->where('lcs_employee.Status', '1');
        $this->db->where('lcs_employee.resigned_date =', '0000-00-00');
        if (!empty($supid)) {
            $this->db->where_not_in('lcs_employee.Employee_Code', $supid);
        }
        $this->db->join('lcs_employee_departments', 'lcs_employee.Employee_Code = lcs_employee_departments.Employee_Code');
        if ($depid != 0) {
            $this->db->where('lcs_employee_departments.Department_Code ', $depid);
        }
        $this->db->order_by('lcs_employee.Employee_Name');
        $this->db->where('lcs_employee.employee_no !=', '');
        $query = $this->db->get();
        return $query->result();
    }

    public function get_employeeBysupidinclude($supid, $depid = 0) {

        if (!empty($supid)) {
            $this->db->select('lcs_employee.*, lcs_employee_departments.Department_Code');
            $this->db->from('lcs_employee');
            $this->db->where('lcs_employee.employee_no !=', '');
            $this->db->where('lcs_employee.Employee_Code !=', '0');
            $this->db->where('lcs_employee.Status', '1');
            $this->db->where('lcs_employee.resigned_date =', '0000-00-00');
            $this->db->where_in('lcs_employee.Employee_Code', $supid);
            $this->db->join('lcs_employee_departments', 'lcs_employee.Employee_Code = lcs_employee_departments.Employee_Code');
            $this->db->group_by('lcs_employee_departments.Employee_Code');
            if ($depid != 0) {
                $this->db->where('lcs_employee_departments.Department_Code ', $depid);
            }
            $this->db->order_by('CAST(lcs_employee.employee_no as SIGNED INTEGER)');
            $query = $this->db->get();
            return $query->result();
        } else {
            return array();
        }
    }

    public function get_employeeByDepIDWithRoster($depid) {

        $this->db->select('lcs_employee.*, lcs_employee_departments.Department_Code');
        $this->db->from('lcs_employee');
        $this->db->join('lcs_employee_departments', 'lcs_employee.Employee_Code = lcs_employee_departments.Employee_Code');
        $this->db->where('lcs_employee.resigned_date =', '0000-00-00');
        $this->db->where('lcs_employee_departments.Department_Code ', $depid);
        $this->db->where('lcs_employee.employee_no !=', '');
        $this->db->where('lcs_employee.roster_id !=', '0');
        $this->db->where('lcs_employee.Status =', '1'); //07Nov2013 Barathy
        $query = $this->db->get();
        return $query->result();
    }

    public function get_employeeByDepIDandRosterID($depid, $rosid) {

        $this->db->select('lcs_employee.*, lcs_employee_departments.Department_Code');
        $this->db->from('lcs_employee');
        $this->db->join('lcs_employee_departments', 'lcs_employee.Employee_Code = lcs_employee_departments.Employee_Code');
        $this->db->where('lcs_employee_departments.Department_Code ', $depid);
        $this->db->where('lcs_employee.resigned_date =', '0000-00-00');
        $this->db->where('lcs_employee.roster_id', $rosid);
        $this->db->where('lcs_employee.Status =', '1'); //07Nov2013 Barathy
        $query = $this->db->get();
        return $query->result();
    }

    function addwelcomepage($employeemodel) {

        $data = array('preferred_welcome_sys' => $employeemodel->getpreferred_welcome_sys());
        $this->db->where('Employee_Code', $employeemodel->getEmployee_Code());
        $result = $this->db->update('lcs_employee', $data);
        return $result;
    }

    //11Oct2013 Barathy check if employee number exists
    function checkEmpNoExists($emp_no) {

        $query = $this->db->get_where('lcs_employee', array('employee_no' => $emp_no));
        return $query->num_rows();
    }

    function addroster($employeemodel) {

        $data = array('roster_id' => $employeemodel->getRoster_id());
        $this->db->where('Employee_Code', $employeemodel->getEmployee_Code());
        return $this->db->update('lcs_employee', $data);
    }

    function removeroster($employeemodel) {

        $data = array('roster_id' => '0');
        $this->db->where('Employee_Code', $employeemodel->getEmployee_Code());
        return $this->db->update('lcs_employee', $data);
    }

    public function getMarketiers() {

        $this->db->select('lcs_employee.*');
        $this->db->from('lcs_employee');
        $this->db->join('lcs_employee_departments', 'lcs_employee.Employee_Code = lcs_employee_departments.Employee_Code');
        $this->db->where('lcs_employee.Employee_Code !=', '0');
        $this->db->where('lcs_employee.Status', '1');
        $this->db->where('lcs_employee.resigned_date =', '0000-00-00');
        $this->db->where('lcs_employee.Status =', '1');
        // $this->db->where('lcs_employee_departments.Department_Code ','2' );
        $this->db->order_by('lcs_employee.Employee_Name', 'ASC');
        $query = $this->db->get();
        return $query->result();
    }

    function getEmployeebyidwithoutgetters($id) {

        $query = $this->db->get_where('lcs_employee', array('Employee_Code' => $id));
        return $query->row();
    }

    public function getEmployeesbyCompanyIDandbyDepartment($employeemodel, $employeedepartmentsmodel) {

        $this->db->select('lcs_employee.Employee_Code,lcs_employee.Employee_Name,lcs_employee.last_name');
        $this->db->from('lcs_employee');
        $this->db->join('lcs_employee_departments', 'lcs_employee.Employee_Code = lcs_employee_departments.Employee_Code');
        $this->db->where('lcs_employee.Employee_Code !=', '0');
        $this->db->where('lcs_employee.Status', '1');
        $this->db->where('lcs_employee.resigned_date =', '0000-00-00');
        $this->db->where('lcs_employee.Status =', '1');
        $this->db->where('lcs_employee.company_id', $employeemodel->getCompany_id());
        $this->db->where('lcs_employee_departments.Department_Code', $employeedepartmentsmodel->getDepartment_Code());
        $this->db->order_by('lcs_employee.Employee_Name', 'ASC');
        $query = $this->db->get();
        return $query->result();
    }

    //viran
    function get_employee_company_and_code_with_email($employee_model) {

        $this->db->select('employee.employee_code,employee.company_code');
        $this->db->from('employee');
        $this->db->where('employee.employee_email ', $employee_model->get_employee_email());
        $query = $this->db->get();
        return $query->row();
    }

    //viran
    function getEmployeepasswordbyid($employeemodel) {

        $this->db->select('lcs_employee.Password');
        $this->db->from('lcs_employee');
        $this->db->where('lcs_employee.Employee_Code ', $employeemodel->getEmployee_Code());
        $query = $this->db->get();
        return $query->row()->Password;
    }

    //viran
    function setnewPassword($employeemodel) {

        $data = array('Password' => $employeemodel->getPassword());
        $this->db->where('Employee_Code', $employeemodel->getEmployee_Code());
        $result = $this->db->update('lcs_employee', $data);
        return $result;
    }

    function change_employee_pro_pic($employeemodel) {

        $data = array('emp_image' => $employeemodel->getEmp_image());
        $this->db->where('Employee_Code', $employeemodel->getEmployee_Code());
        $result = $this->db->update('lcs_employee', $data);
        return $result;
    }

    //functions to check email and employee number availability
    function checkEmail($employeemodel) {

        $this->db->select('*');
        $this->db->from('lcs_employee');
        $this->db->where('lcs_employee.Email ', $employeemodel->getEmail());
        if ((int) $employeemodel->getEmployee_Code() != 0) {
            $this->db->where('lcs_employee.Employee_Code !=', $employeemodel->getEmployee_Code());
        }
        $query = $this->db->get();
        //echo $this->db->last_query();die;
        //echo $query->num_rows();die;
        return $query->num_rows();
    }

}
