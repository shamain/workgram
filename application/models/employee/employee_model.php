<?php

class Employee_model extends CI_Model {

    var $employee_no; //11Oct2013 Barathy
    var $Employee_Code;
    var $Employee_Name;
    var $Designation;
    var $Email;
    //26Aug2013 Barathy var $username;
    var $Password;
    var $Confirmation_Code;
    var $Status;
    //26Aug2013 Barathy - Begin
    var $last_name;
    var $full_name;
    var $birthday;
    var $nic;
    var $gender;
    var $marital_status;
    var $address1;
    var $address2;
    var $city;
    var $mobile_no;
    var $phone_extension;
    var $joined_date;
    var $resigned_date;
    var $added_by;
    var $added_date;
    var $emp_image;
    var $mail_server;
    //26Aug2013 Barathy - End
    //var $LoginType; 
    var $preferred_welcome_sys; // edited 9_6
    //17Oct2013 Barathy 
    var $roster_id;
    //17Oct2013 Barathy
    var $contract_type;
    var $emp_cat_id;
    //2013-12-20 Viran 
    var $company_id;

    //17Oct2013 Barathy End

    function __construct() {
        parent::__construct();
    }

//getters

    function getEmployee_no() {
        return $this->employee_no;
    }

//11Oct2013 Barathy

    function getEmployee_Code() {
        return $this->Employee_Code;
    }

    function getEmployee_Name() {
        return $this->Employee_Name;
    }

    function getDesignation() {
        return $this->Designation;
    }

    function getEmail() {
        return $this->Email;
    }

    /* 26Aug2013 Barathy
      function getEmailUser(){// chamge chamika
      $username_arr = explode('@',$this->Email);


      $this->username = $username_arr[0];
      return $this->username;

      }
     */

    function getPassword() {
        return $this->Password;
    }

    function getConfirmation_Code() {
        return $this->Confirmation_Code;
    }

    function getStatus() {
        return $this->Status;
    }

    //26Aug2013 Barathy - Begin
    function getLast_name() {
        return $this->last_name;
    }

    function getBirthday() {
        return $this->birthday;
    }

    function getNic() {
        return $this->nic;
    }

    function getGender() {
        return $this->gender;
    }

    function getMarital_status() {
        return $this->marital_status;
    }

    function getAddress1() {
        return $this->address1;
    }

    function getAddress2() {
        return $this->address2;
    }

    function getCity() {
        return $this->city;
    }

    function getMobile_no() {
        return $this->mobile_no;
    }

    function getPhone_extension() {
        return $this->phone_extension;
    }

    function getJoined_date() {
        return $this->joined_date;
    }

    function getResigned_date() {
        return $this->resigned_date;
    }

    function getAdded_by() {
        return $this->added_by;
    }

    function getAdded_date() {
        return $this->added_date;
    }

    function getEmp_image() {
        return $this->emp_image;
    }

    function getMail_server() {
        return $this->mail_server;
    }

    function getRoster_id() {
        return $this->roster_id;
    }

    //26Aug2013 Barathy - End
    //17Oct2013 Barathy
    function getContract_type() {
        return $this->contract_type;
    }

    function getEmp_cat_id() {
        return $this->emp_cat_id;
    }

    //2013-12-20 Viran 
    function getCompany_id() {
        return $this->company_id;
    }

    function getFull_name(){return $this->full_name;}


    //17Oct2013 Barathy End
//setters
    function setEmployee_no($employee_no) {
        $this->employee_no = $employee_no;
    }

//11Oct2013 Barathy

    function setEmployee_Code($Employee_Code) {
        $this->Employee_Code = $Employee_Code;
    }

    function setEmployee_Name($Employee_Name) {
        $this->Employee_Name = $Employee_Name;
    }

    function setDesignation($Designation) {
        $this->Designation = $Designation;
    }

    function setEmail($Email) {
        $this->Email = $Email;
    }

    function setPassword($Password) {
        $this->Password = $Password;
    }

    function setConfirmation_Code($Confirmation_Code) {
        $this->Confirmation_Code = $Confirmation_Code;
    }

    function setStatus($Status) {
        $this->Status = $Status;
    }

    //26Aug2013 Barathy - Begin
    function setLast_name($x) {
        $this->last_name = $x;
    }

    function setBirthday($x) {
        $this->birthday = $x;
    }

    function setNic($x) {
        $this->nic = $x;
    }

    function setGender($x) {
        $this->gender = $x;
    }

    function setMarital_status($x) {
        $this->marital_status = $x;
    }

    function setAddress1($x) {
        $this->address1 = $x;
    }

    function setAddress2($x) {
        $this->address2 = $x;
    }

    function setCity($x) {
        $this->city = $x;
    }

    function setMobile_no($x) {
        $this->mobile_no = $x;
    }

    function setPhone_extension($x) {
        $this->phone_extension = $x;
    }

    function setJoined_date($x) {
        $this->joined_date = $x;
    }

    function setResigned_date($x) {
        $this->resigned_date = $x;
    }

    function setAdded_by($x) {
        $this->added_by = $x;
    }

    function setAdded_date($x) {
        $this->added_date = $x;
    }

    function setEmp_image($x) {
        $this->emp_image = $x;
    }

    function setMail_server($x) {
        $this->mail_server = $x;
    }

    //26Aug2013 Barathy - End

    function setRoster_id($x) {
        $this->roster_id = $x;
    }

    //17Oct2013 Barathy function setLoginType($type){$this->LoginType = $type;}
    //17Oct2013 Barathy function getLoginType(){return $this->LoginType;}
    function setpreferred_welcome_sys($welcome) {
        $this->preferred_welcome_sys = $welcome;
    }

    function getpreferred_welcome_sys() {
        return $this->preferred_welcome_sys;
    }

    //17Oct2013 Barathy
    function setContract_type($contract_type) {
        $this->contract_type = $contract_type;
    }

    function setEmp_cat_id($emp_cat_id) {
        $this->emp_cat_id = $emp_cat_id;
    }

    //2013-12-20 Viran 
    function setCompany_id($company_id) {
        $this->company_id = $company_id;
    }

    //17Oct2013 Barathy -End

    function setFull_name($full_name){$this->full_name = $full_name;}






}
