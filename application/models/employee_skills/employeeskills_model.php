<?php

/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

class Employeeskills_model extends CI_Model{
    
    var $skill_id;
    var $employee_id;
    var $skill_description;
    
    
    function __construct() {
        parent::__construct();
    }
    
    public function get_employee_skill_id(){
        return $this->skill_id ;
        
    }
    
    public function set_employee_skill_id($skill_id){
        $this->skill_id = $skill_id;  
    }
    
    public function get_employee_id(){
        return $this->employee_id;
    }
    
    public function set_employee_id($employee_id){
        $this->employee_id = $employee_id;  
    }
    
    
    public function get_skill_description(){
        return $this->skill_description;
    }
    
    public function set_skill_description($skill_description){
        $this->skill_description=$skill_description;
    }
       
}


