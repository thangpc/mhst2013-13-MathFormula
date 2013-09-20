<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Frontend_Controller extends MY_Controller {

	function __construct() {
		
		session_start();
		parent::__construct();
		$this->load->helper('form');
		$this->load->library('form_validation');		
		$this->load->model('user_model');
		
		$this->load->helper('alphaID');
	}

}