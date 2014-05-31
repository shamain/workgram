<?php

// function getEmployeeswithdep() ->  // designation 23 -> is managing director   not get report
class Employee_service extends CI_Model {

    function __construct() {

        parent::__construct();
    }

    function authenticateUser($employeemodel) {

        $parameters = array('Email' => $employeemodel->getEmail() /* , 'Password'=>$employeemodel->getPassword() */, 'Status' => '1');
        $query = $this->db->get_where('lcs_employee', $parameters);
        return $query->row();
    }

    function authenticateUserwithpassword($employeemodel) {

        $parameters = array('Email' => $employeemodel->getEmail(), 'Password' => $employeemodel->getPassword(), 'Status' => '1');
        $query = $this->db->get_where('lcs_employee', $parameters);
        return $query->row();
    }

    function getServerByEmail($employeemodel) {

        $server = 0;
        $this->db->select('*');
        $this->db->from('lcs_employee');
        $this->db->where('lcs_employee.Email', $employeemodel->getEmail());
        $this->db->where('Status', '1'); //)&NOV2013 Barathy
        $query = $this->db->get();
        foreach ($query->result() as $emp) {
            $server = $emp->mail_server;
        }
        return $server;
    }

    function getEmployees($emp_status = 1) {

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

    function getEmployeeswithdep($emp_status = 1, $date = '', $order = '', $notdep = array(), $md = TRUE) {

        if ($date == '') {
            $date = date('Y-m-d');
        }
        $this->db->select('lcs_employee.*, lcs_department.Department_Name,lcs_designations.Lcs_Designation_Name ');
        $this->db->from('lcs_employee');
        $this->db->join('lcs_employee_departments', 'lcs_employee.Employee_Code = lcs_employee_departments.Employee_Code', 'right');
        $this->db->join('lcs_department', 'lcs_department.Department_Code = lcs_employee_departments.Department_Code');
        $this->db->join('lcs_designations', 'lcs_designations.Lcs_Designation_Id = lcs_employee.Designation', 'Left');
        if (!empty($notdep)) {
            $this->db->where_in('lcs_department.Department_Code', $notdep);
        }
        $this->db->where('lcs_employee.Status', '1');
        if ($md) {
            $this->db->where('lcs_employee.Designation !=', '23');   // 23 is managing director not get report
        }

        $this->db->where('lcs_employee.Employee_Code !=', '0');
        $this->db->where('lcs_employee.employee_no !=', '');
        if ($emp_status == 1) {
            $this->db->where("(lcs_employee.resigned_date >=  '" . $date . "'  or lcs_employee.resigned_date = '0000-00-00')");
        }
        /* else {
          $this->db->where('lcs_employee.resigned_date <', $date);
          $this->db->where('lcs_employee.resigned_date !=', '0000-00-00');
          } */
        $this->db->group_by("lcs_employee.employee_no");
        if ($order != '') {
            $this->db->order_by($order);
        }
        $this->db->order_by('CAST(lcs_employee.employee_no as SIGNED INTEGER)');
        $query = $this->db->get();
        //echo $this->db->last_query();
        //$this->db->order_by('Employee_Code',"desc");
        return $query->result();
    }

    function getEmployeesOnCompany($company_id) {
        $this->db->select('Employee_Code, Employee_Name');
        $this->db->from('lcs_employee');
        $this->db->where('status', '1');
        $this->db->where('company_id', $company_id);
        $result = $this->db->get();
        return $result->result();
    }

    function getEmployeesWithEmpNo($emp_status = 1) {

        $this->db->where('Status', '1');
        if ($emp_status == 1) {
            $this->db->where('resigned_date >=', "date('Y-m-d')");
            $this->db->or_where('resigned_date =', '0000-00-00');
        } else {
            $this->db->where('resigned_date <', "date('Y-m-d')");
            $this->db->where('resigned_date !=', '0000-00-00');
        }
        $this->db->where('Employee_Code !=', '0');
        $this->db->where('employee_no !=', '');
        $this->db->order_by("Employee_Name");
        $query = $this->db->get('lcs_employee');
        //echo $this->db->last_query();
        return $query->result();
    }

    function getactiveEmployeescount() {

        $query = $this->db->get_where('lcs_employee', array('Status' => '1', 'Employee_Code !=' => '0'));
        return $query->num_rows();
    }

    function addEmployee($employeemodel) {

        //echo 1;
        $this->db->insert('lcs_employee', $employeemodel);
        $this->db->last_query();
        return $this->db->insert_id();
    }

    function deleteemployee() {

        //07Nov2013 Barathy return $this->db->delete('lcs_employee', array('Employee_Code' => Employeemodel:: getEmployee_Code()));
        //07Nov2013 Barathy Begin
        $data = array('Status' => '0');
        $this->db->where('Employee_Code', Employeemodel:: getEmployee_Code());
        return $this->db->update('lcs_employee', $data);
        //07Nov2013 Barathy END
    }

    function getEmployeebyid() {

        $query = $this->db->get_where('lcs_employee', array('Employee_Code' => Employeemodel:: getEmployee_Code()));
        return $query->row();
    }

    function max_empNo($below) {

        $this->db->select('employee_no');
        $this->db->from('lcs_employee');
        $this->db->where('CAST(employee_no as SIGNED INTEGER)<', $below);
        $this->db->order_by('CAST(employee_no as SIGNED INTEGER)', 'DESC');
        $this->db->limit(1);
        $query = $this->db->get();

        return $query->row();
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

    public function get_employee($employeemodel) {

        //07Nov2013 Barathy added 'Status' => '1' to where clause
        $query = $this->db->get_where('lcs_employee', array('Employee_Code' => $employeemodel->getEmployee_Code(), 'Status' => '1'));
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

    /*

      public function loadEmpDetails()
      {

      //return $this->db->query('SELECT Employee_Code,Employee_Name,Designation,Level_Code,Department_Code, Email FROM ta_ims_employee WHERE Employee_Code='.$this->session->userdata('emp_id'));
      return $this->db->query('
      SELECT
      ta_ims_employee.Employee_Code,
      ta_ims_employee.Employee_Name,
      ta_ims_employee.Designation,
      ta_ims_employee.Level_Code,
      ta_ims_employee.Department_Code,
      ta_ims_employee.Email,
      ta_ims_employee.Password,
      ta_ims_employee.Confirmation_Code,
      ta_ims_employee.Status,
      ta_ims_department.Department_Code,
      ta_ims_department.Department_ID,
      ta_ims_department.Department_Name,
      ta_ims_department.Active,
      ta_ims_level.Level_Code,
      ta_ims_level.Level,
      ta_ims_level.Description
      FROM ta_ims_employee
      INNER JOIN ta_ims_department ON ta_ims_department.Department_Code = ta_ims_employee.Department_Code
      INNER JOIN ta_ims_level ON ta_ims_level.Level_Code = ta_ims_employee.Level_Code
      WHERE ta_ims_employee.Employee_Code='.$this->session->userdata('emp_id'));

      }



      function saveNewPassword($userModel)
      {
      $query= $this->db->query('SELECT Password FROM ta_ims_employee WHERE Employee_Code='.$this->session->userdata('emp_id'));

      foreach ($query->result() as $row)
      {
      $row->Password;
      }



      if( $row->Password==$userModel->getPassword())
      {


      $result =$this->db->query("UPDATE ta_ims_employee SET Password = '" . $userModel->getConfirmpass() . "' WHERE Employee_Code = " . $this->session->userdata('emp_id'));
      if($result == 1)
      {
      return 'Password Changed # Password  inserted to the database successfully. # success';
      }
      else
      {
      return 'Error Changing Password # Password cannot be Changed. Please contact system administrator... # error';
      }

      }
      else
      {
      return 'Error in Changing Password # Password cannot be Changed. Please contact system administrator... # error';
      }




      }

      public function getEmployeeByCode($employeemodel)
      {

      $employeeCode = $employeemodel->getEmployee_Code();
      $query = $this->db->query('SELECT ta_ims_employee.Employee_Name , ta_ims_department.Department_Name FROM ta_ims_employee,ta_ims_department WHERE (ta_ims_employee.Department_Code=ta_ims_department.Department_Code) AND (ta_ims_employee.Employee_Code='.$employeeCode.')');

      $employeeModelArr=array();

      foreach($query->result() as $row)
      {
      $employeemodel = new Employeemodel();
      $departmentmodel = new Departmentmodel();

      $employeemodel->setEmployee_Name($row->Employee_Name);
      $departmentmodel->setDepartment_Name($row->Department_Name);

      $employeeModelArr[0]=$employeemodel;
      $employeeModelArr[1]=$departmentmodel;
      }
      return $employeeModelArr;
      }

      public function getEmployeeCodeDepartment()
      {

      //$employee = $employeemodel->getEmployee_Code();
      $query = $this->db->query('SELECT ta_ims_employee.Employee_Name , ta_ims_department.Department_Name , ta_ims_employee.Employee_Code  FROM ta_ims_employee,ta_ims_department WHERE (ta_ims_employee.Department_Code=ta_ims_department.Department_Code) ORDER BY ta_ims_employee.Employee_Name ASC');

      $name=array();
      //$employeeModelArr=array();
      //$departmentmodelArr=array();

      foreach($query->result() as $row)
      {
      $name[]=$row->Employee_Name._.$row->Department_Name._.$row->Employee_Code;
      }

      return $name;
      }

      public function insertEmployee()
      {

      }
     */

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
    function getEmployeeCompanyandCodewithEmail($employeemodel) {

        $this->db->select('lcs_employee.Employee_Code,lcs_employee.company_id');
        $this->db->from('lcs_employee');
        $this->db->where('lcs_employee.Email ', $employeemodel->getEmail());
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

    //end email and emp no checks
    function getACDDetails() {

        $this->db->select('lcs_employee.*');
        $this->db->from('lcs_employee');
        $this->db->where('lcs_employee.Designation', '5');
        $this->db->where('lcs_employee.Status ', '1');
        $query = $this->db->get();
        return $query->row();
    }

    function getMDDetails() {

        $this->db->select('lcs_employee.*');
        $this->db->from('lcs_employee');
        $this->db->where('lcs_employee.Designation', '23');
        $this->db->where('lcs_employee.Status ', '1');
        $query = $this->db->get();
        return $query->row();
    }

    //function to get employees with designation

    function getEmployeesFromDesignation($designation_id) {
        $this->db->select('*');
        $this->db->from('lcs_employee');
        $this->db->where('Designation', (int) $designation_id);
        $this->db->where('Status ', '1');

        $query = $this->db->get();

        return $query->result();
    }

    //end function
}