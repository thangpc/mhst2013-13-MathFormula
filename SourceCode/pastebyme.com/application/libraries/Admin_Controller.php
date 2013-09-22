<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Admin_Controller extends MY_Controller {

	function __construct() {

		parent::__construct();
		$this->load->helper('form');
		$this->load->library('form_validation');
		$this->load->library('session');
		$this->load->model('user_model');
		$this->load->helper('alphaID');	

		// Login check
		$exception_uris = array(
			'admin/login',
			'admin/logout'
		);
		if (in_array(uri_string(), $exception_uris) == FALSE) {			
			if ($this->user_model->loggedin('admin') != 'admin') {
				redirect('admin/login');
			}
		}
	
	}

}