<?php if(!defined('BASEPATH')) exit('No direct script access allowed');
class Statistics {
	public function log_activity() {
		// We need an instance of CI as we will be using some CI classes
		$CI =& get_instance();

		// Start off with the session stuff we know
		$data = array();


		// Next up, we want to know what page we're on, use the router class
		$data['action'] = $CI->router->method;
		
		$data['browser'] = $_SERVER['HTTP_USER_AGENT'];

		
		$ipaddress = '';
		if (getenv('HTTP_CLIENT_IP'))
			$ipaddress = getenv('HTTP_CLIENT_IP');
		else if (getenv('HTTP_X_FORWARDED_FOR'))
			$ipaddress = getenv('HTTP_X_FORWARDED_FOR');
		else if (getenv('HTTP_X_FORWARDED'))
			$ipaddress = getenv('HTTP_X_FORWARDED');
		else if (getenv('HTTP_FORWARDED_FOR'))
			$ipaddress = getenv('HTTP_FORWARDED_FOR');
		else if (getenv('HTTP_FORWARDED'))
			$ipaddress = getenv('HTTP_FORWARDED');
		else if (getenv('REMOTE_ADDR'))
			$ipaddress = getenv('REMOTE_ADDR');
		else
			$ipaddress = 'UNKNOWN';
		
		$data['ip'] = $ipaddress;
		// Lastly, we need to know when this is happening
		$data['date'] = time();

		// We don't need it, but we'll log the URI just in case
		$data['uri'] = uri_string();
		
		if(!strpos($data['uri'],'statistics_controller'))
		{
			$post_data  = "";
			
			$post = $CI->input->post();

			if((count($post) > 0) && $post != null){
				
				
				$post_data = json_encode($CI->input->post());

			}
			$data['post_data'] = $post_data;
			
			
			// And write it to the database
			$CI->db->insert('statistics', $data);
		}


	
	}
}