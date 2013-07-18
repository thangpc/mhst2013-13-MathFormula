<?php

class User_model extends Model {

	public function __construct() {
        
        parent::__construct();
    }
    
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

    public function getById($id = '') {

        $data = array();

        $query = $this->db
            ->where('user_id', $id)
            ->get('users');

        if ( $query->num_rows() > 0 ) {
            foreach ($query->result_array() as $row) {
                $data = $row;
            }
        }
        $query->free_result();
        return $data;
    }

    public function checkPass($pass = '') {

        $query = $this->db->where('password', $pass)->get('users');
        if ($query->num_rows() > 0) { return TRUE; }
        else return FALSE;
    }
}

















