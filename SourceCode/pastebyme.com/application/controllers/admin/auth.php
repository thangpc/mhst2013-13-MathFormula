<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Auth extends Controller {

	public function __construct() {
		
		session_start();
		parent::__construct();
		
		$this->load->model('user_model');
	}

	// view control panel
	public function index() {

		if ( isset($_SESSION['username']) ) {
			$this->data['title_page'] = 'Hệ thống quản trị nội dung';
			$this->data['content_view'] = 'dashboard';
			$this->load->view('admin/template', $this->data);
		} else {
			redirect('admin/login', 'refresh');
		}
	}

	public function login() {
		
		if ( isset($_SESSION['username']) ) {
        	redirect('admin', 'refresh');
      	}
      	$this->load->library('form_validation');
      	$this->form_validation->set_rules('username', 'Username', 'required');
     	$this->form_validation->set_rules('password', 'Password', 'required|min_length[4]');

      	if ( $this->form_validation->run() !== false ) {
         // then validation passed. Get from db
         	//$this->load->model('user_model');
         	$res = $this->user_model
                	->auth(
                    	$this->input->post('username'), 
                     	$this->input->post('password')
                  	);
         	if ( $res !== false ) {
           		$_SESSION['username'] = $this->input->post('username');
            	redirect('admin', 'refresh');
         	}
      	}
      	$this->load->view('admin/auth/login');
	}

}











