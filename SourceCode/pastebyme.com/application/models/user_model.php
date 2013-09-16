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

	public $rules = array(
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

	public function auth($username, $password) {

    	$query = $this->db
    		->select('user_id, username, password')
    		->where('username', $username)
    		->where('password', md5($password))
    		->limit(1)
    		->get('users');

      	if ( $query->num_rows > 0 ) {
        	return $query->row();
     	}
      	return false;
    }

}