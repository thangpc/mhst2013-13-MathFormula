<?php  if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Auth extends Frontend_Controller {

	public function __construct() {
		
		parent::__construct();
	}

	public function index() {

	}

	public function login() {

    	if ( isset($_SESSION['username']) ) {
        	redirect('/', 'refresh');
      	}

      	$this->load->library('form_validation');
      	$this->form_validation->set_rules('username', 'Username', 'required');
     	$this->form_validation->set_rules('password', 'Password', 'required|min_length[4]');

      	if ( $this->form_validation->run() !== false ) {
         	// then validation passed. Get from db
         	$this->load->model('user_model');
         	$res = $this->user_model
                	->auth(
                    	$this->input->post('username'), 
                     	$this->input->post('password')
                  	);
         	if ( $res !== false ) {
           		$_SESSION['username'] = $this->input->post('username');
            	redirect('/', 'refresh');
         	}
      	}

        $this->data['title_page'] = "Login Pastebyme";
		$this->data['content_view'] = 'login';
		$this->load->view('_layout', $this->data);
    }

    public function logout() {
		
		session_destroy();
		redirect('/', 'refresh');
	}
}