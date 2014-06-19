<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');



class Mail_handler extends CI_Controller {

    public function __construct() {

        parent::__construct();
        // Do something with $params
    }

    public function send_mail_through_template($to, $email_subject, $msg_body, $lcs_system) {

        $data['lcs_system'] = $lcs_system; //System name , Ex : CCM , CRM , IMS , POLLS , TA etc.  

        $this->email->from('LocalTesting@workgram.net', 'Local Testing Workgram-'.$lcs_system);
        $this->email->to($to);
        $this->email->subject($email_subject.' Local Testing');
        $this->email->message($msg_body);

        return $this->email->send();
    }
    
    public function send_mail_through_template_with_cc($to, $email_subject, $msg_body, $lcs_system, $cc) {

        $data['lcs_system'] = $lcs_system; //System name , Ex : CCM , CRM , IMS , POLLS , TA etc.


        $this->email->from('LocalTesting@workgram.net', 'Local Testing Workgram-'.$lcs_system);
        $this->email->to($to);
        $this->email->cc($cc);
        $this->email->subject($email_subject.' Local Testing');
        $this->email->message($msg_body);

       return $this->email->send();
    }



}

?>