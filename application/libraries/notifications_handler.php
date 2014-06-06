<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Notifications_handler extends CI_Controller {

    //Notifications_handler is extended from  CI_Controller
    // Reason to extend it from CI_Controller is to get load model functions

    public function __construct() {
        parent::__construct();

        $this->load->model('settings/notification/notification_model');
        $this->load->model('settings/notification/notification_service');

        $this->load->model('Main/Notified_users/Notified_usersmodel');
        $this->load->model('Main/Notified_users/Notified_usersservice');
    }

    function add_notification($msg, $url, $users) {


        $notificationsmodel = new Notificationsmodel();
        $notificationsservice = new Notificationsservice();

        $notified_usersmodel = new Notified_usersmodel();
        $notified_usersservice = new Notified_usersservice();

         //start : inserting to main_notifications table
         //
        //setting the notification table values
        $notificationsmodel->setNotification_added_date(time());
        $notificationsmodel->setNotification_area_url($url);
        $notificationsmodel->setNotification_msg($msg);
        $notificationsmodel->setSystem_id(0);

        $notification_id = $notificationsservice->add_new_notification($notificationsmodel);

        //end : inserting to main_notifications table
        
        
        //start : inserting to main_notified_users table

        $notified_usersmodel->setNotification_id($notification_id);
        $notified_usersmodel->setNotified_user_is_seen('n');

        //looping the users array and insert in to main_notified_users table
        /** start : */
        for ($x = 0; $x < count($users); $x++) {
            $notified_usersmodel->setEmployee_Code($users[$x]);
            $notified_usersservice->add_new_notified_user($notified_usersmodel);
        }
        /** end : */

        //end : inserting to main_notified_users table     
    }

}

?>