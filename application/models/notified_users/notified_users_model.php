<?php
/*
 * Name: W.B.M.C. Fernando
 * ID  : IT08003416
 */
class Notified_users_model extends CI_Model{
    
    var $notified_users_id;
    var $employee_code;
    var $notification_id;
    var $notified_user_is_seen;
    
    function __construct() {
        parent::__construct();
    }
    
    public function get_notified_users_id(){
        return $this->notified_users_id;
    }
    
    public function set_notified_users_id($notified_users_id){
        $this->notified_users_id=$notified_users_id;
    }
    
    public function get_employee_code(){
        return $this->employee_code;
    }
    
    public function set_employee_code($employee_code){
        $this->employee_code=$employee_code;
    }
    
    public function get_notification_id(){
        return $this->notification_id;
    }
    
    public function set_notification_id($notification_id){
        $this->notification_id=$notification_id;
    }
    
    public function get_notified_user_is_seen(){
        return $this->notified_user_is_seen;
    }
    
    public function set_notified_user_is_seen($notified_user_is_seen){
        $this->notified_user_is_seen=$notified_user_is_seen;
    }
    
}
