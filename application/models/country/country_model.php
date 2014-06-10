<?php

class Country_model extends CI_Model {

    var $country_code;
    var $country;

    function __construct() {
        parent::__construct();
    }

    public function get_country_code() {
        return $this->country_code;
    }

    public function get_country() {
        return $this->country;
    }

    public function set_country_code($country_code) {
        $this->country_code = $country_code;
    }

    public function set_country($country) {
        $this->country = $country;
    }

}
