<?php

class project_model extends CI_Model{
    
    var $project_id;
    var $project_name;
    var $project_vendor;
    var $project_duration;
    var $project_deadline;
    var $project_description;
    var $del_ind;
    var $added_by;
    var $added_date;
    
    
    function __construct(){
         parent::__construct();
        
       }
       
       public function get_project_id() {
           return $this->project_id;
           }
           
           public function set_project_id($project_id){
               $this->project_id=$project_id;
           }
           
           public function  get_project_name(){
               return $this->project_name;
               
           }
           
           public function set_project_name($project_name) {
               $this->project_name=$project_name;
               
           }
           
           public function get_project_vendor(){
                   return $this->project_vendor;
               
           }
           
           
           
           public function get_project_duration(){
                   return $this->project_duration;
               
           }
           
           public function set_project_duration($project_duration){
               $this->project_duration=$project_duration;
           }
           
           
           
           public function get_project_deadline(){
                   return $this->project_deadline;
               
           }
           
           public function set_project_deadline($project_deadline){
               $this->project_deadline=$project_deadline;
           }
           
           public function get_project_description(){
                   return $this->project_description;
               
           }
           
           public function set_project_description($project_description){
               $this->project_description=$project_description;
           }
           
           
           
           public function set_project_vendor($project_vendor){
               $this->project_vendor=$project_vendor;
           }
           
           
           
           
}

