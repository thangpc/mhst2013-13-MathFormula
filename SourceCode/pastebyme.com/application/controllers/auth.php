<?php  if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Auth extends Frontend_Controller {

	public function __construct() {
		
		parent::__construct();
        $this->load->model('user_model');
	}

	public function index() {

	}

	public function checkSignUp() {

      	$this->load->library('form_validation');
      	$this->form_validation->set_rules('username', 'Username', 'trim|xss_clean|required|min_length[4]|max_length[25]');
     	$this->form_validation->set_rules('password', 'Password', 'trim|xss_clean|required|min_length[4]');
        $this->form_validation->set_rules('email', 'Email', 'trim|xss_clean|required|min_length[5]');

        $data = array();

      	if ( $this->form_validation->run() !== false ) {
         	// then validation passed. Get from db
         	$this->load->model('user_model');
         	$res = $this->user_model
                	->reg(
                    	$this->input->post('username'), 
                     	$this->input->post('email')
                  	);
         	if ( $res !== false ) {
           		$_SESSION['username'] = $this->input->post('username');                
            	$data['status'] = 'success';
                $data['user'] = $_SESSION['username'];
                $data['message'] = 'Register successfully.';

                $user = array(
                    'username' => $this->input->post('username'),
                    'password' => md5($this->input->post('password')),
                    'email' => 'tester@localhost'
                );
                $id = $this->user_model->save($user);
         	} else {
                $data['status'] = 'failed';
                $data['message'] = $this->input->post('username').' invalid. Re-enter username.';
            }
      	} else {
            $data['status'] = 'nodata';
            $data['message'] = 'Username & Password must be not null.';
        }

        $this->output
            ->set_content_type('application/json')
            ->set_output(json_encode(array('data' => $data)));
    }

    //auth login
    public function checkLogin() {

        $this->load->library('form_validation');
        $this->form_validation->set_rules('username', 'Username', 'trim|xss_clean|required|min_length[4]|max_length[25]');
        $this->form_validation->set_rules('password', 'Password', 'trim|xss_clean|required|min_length[4]');

        $data = array();
        
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
                $_SESSION['user_id'] = $res->user_id;
                $data['status'] = 'success';
                $data['user'] = $_SESSION['username'];
                $data['message'] = 'Login successfully.';
            } else {
                $data['status'] = 'failed';
                $data['message'] = 'Username or Password not available.';
            }
        } else {
            $data['status'] = 'nodata';
            $data['message'] = 'Username & Password must be not null.';
        }

        $this->output
            ->set_content_type('application/json')
            ->set_output(json_encode(array('data' => $data)));
    }

    public function logout() {
		
		session_destroy();
		redirect('home', 'refresh');
	}
}