<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Fileupload extends CI_Controller {

    function __construct() {
        parent::__construct();
    }

    function index() {

        error_reporting(E_ALL | E_STRICT);
        $this->load->library("UploadHandler");
    }

    function custom_init($folder) {
        $_POST['last_project_id'] = $folder;
        error_reporting(E_ALL | E_STRICT);
        $this->load->library("UploadHandler");
    }

}