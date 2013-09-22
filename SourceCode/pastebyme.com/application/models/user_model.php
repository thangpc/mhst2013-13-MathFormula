<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class User_model extends MY_Model {

	protected $_table_name = 'users';
	protected $_primary_key = 'user_id';
	protected $_primary_filter = 'intval';
	protected $_order_by = 'user_id';
	protected $_rules = array();
	protected $_timetamps = FALSE;

	public function __construct() {

		parent::__construct();
	}

	public $rules_register = array(
		'user' => array(
			'field' => 'username', 
			'label' => 'Username', 
			'rules' => 'trim|required|xss_clean|min_length[4]|max_length[25]'
		),
		'email' => array(
			'field' => 'email', 
			'label' => 'Email', 
			'rules' => 'trim|required|valid_email|xss_clean'
		),
		'password' => array(
			'field' => 'password', 
			'label' => 'Password', 
			'rules' => 'trim|xss_clean|required|min_length[4]'
		)
	);	

	public $rules_login_public = array(
		'user' => array(
			'field' => 'username', 
			'label' => 'Username', 
			'rules' => 'trim|required|xss_clean|min_length[4]|max_length[25]'
		), 
		'password' => array(
			'field' => 'password', 
			'label' => 'Password', 
			'rules' => 'trim|xss_clean|required|min_length[4]'
		)
	);

	public $rules_login_admin = array(
		'email' => array(
			'field' => 'email', 
			'label' => 'Email', 
			'rules' => 'trim|required|valid_email|xss_clean'
		), 
		'password' => array(
			'field' => 'password', 
			'label' => 'Password', 
			'rules' => 'trim|required'
		)
	);

	/*
        @author: trunghieuhf@gmail.com
        @description: check user exist
        @return Boolean: TRUE if info correct / else FALSE
    */
	public function login() {

		$user = $this->getBy(array(
			'username' => $this->input->post('username'),
			'password' => $this->hash($this->input->post('password')),
		), TRUE);
		
		if (count($user)) {			
			$data = array(
				'user' => $user->username,
				'user_id' => $user->user_id,
				'user_loggedin' => 'public',
			);
			$this->session->set_userdata($data);
			return TRUE;
		} else
			return FALSE;
	}

	/*
        @author: trunghieuhf@gmail.com
        @description: check user available        
        @return Boolean: FALSE if user not register / TRUE if user registed
    */
	public function checkUser() {

		$user = $this->getBy(array(
			'username' => $this->input->post('username'),
			'email' => $this->input->post('email'),
		), TRUE);
		
		if (count($user)) {
			return TRUE;
		} else
			return FALSE;
	}

	public function loginAdmin() {

		$user = $this->getBy(array(
			'email' => $this->input->post('email'),
			'password' => $this->hash($this->input->post('password')),
		), TRUE);		
		if (count($user)) {
			if ($user->role == 'user') return FALSE;
			$data = array(
				'admin' => $user->username,
				'admin_id' => $user->user_id,
				'admin_loggedin' => 'admin',
			);
			$this->session->set_userdata($data);
			return TRUE;
		} else
			return FALSE;
	}

	/*
	@description: logout account
	*/
	public function logout($user = '') {

		$this->session->unset_userdata($user);
		$this->session->unset_userdata($user.'_id');
		$this->session->unset_userdata($user.'_loggedin');
	}

	/*
	@desccription: check user logged
	*/
	public function loggedin($user = '') {
		$area = $this->session->userdata($user.'_loggedin');
		if ($area == FALSE)
			return 'guest';
		return $area;
	}

	public function hash($string) {

		return hash('sha512', md5($string) . config_item('encryption_key'));
	}
}