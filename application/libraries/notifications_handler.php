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

        $this->load->model('settings/notified_users/notified_users_model');
        $this->load->model('settings/notified_users/notified_users_service');
    }

    function add_notification($msg, $url, $users) {


        $notification_model = new Notification_model();
        $notification_service = new Notification_service();

        $notified_users_model = new Notified_users_model();
        $notified_users_service = new Notified_users_service();

         //start : inserting to main_notifications table
         //
        //setting the notification table values
        $notification_model->set_notification_added_date(time());
        $notification_model->set_notification_area_url($url);
        $notification_model->set_notification_msg($msg);

        $notification_id = $notification_service->add_new_notification($notification_model);

        //end : inserting to main_notifications table
        
        
        //start : inserting to main_notified_users table

        $notified_users_model->set_notification_id($notification_id);
        $notified_users_model->set_notified_user_is_seen('n');

        //looping the users array and insert in to main_notified_users table
        /** start : */
        for ($x = 0; $x < count($users); $x++) {
            $notified_users_model->set_employee_code($users[$x]);
            $notified_users_service->add_new_notified_user($notified_users_model);
        }
        /** end : */

        //end : inserting to main_notified_users table     
    }

}

?>