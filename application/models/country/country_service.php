<?php

class Country_service extends CI_Model
{
    function __construct()
    {
        parent::__construct();
    }


    public function get_all_countries()
    {
        $query = $this->db->get('country');

        return $query->result();
    }
	 
	
}