<?php

/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

class Employeeskills_model extends CI_Model{
    
    var $employee_skill_id;
    var $employee_id;
    var $skill_description;
    
    
    function __construct() {
        parent::__construct();
    }
    
    public function get_employee_skill_id(){
        return $this->employee_skill_id ;
        
    }
    
    public function get_employee_id(){
        return $this->employee_id;
    }
    
    public function get_skill_description(){
        return $this->skill_description;
    }
       
}


