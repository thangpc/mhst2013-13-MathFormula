<?php  if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class User extends Admin_Controller {

    public function __construct(){
        parent::__construct();
    }

    public function login(){

    	$rules = $this->user_model->rules;
    	$this->form_validation->set_rules($rules);
    	if ($this->form_validation->run() == TRUE) {
    		// We can login and redirect
    	}
        $this->data['title_page'] = 'Login';
        $this->load->view('admin/user/login', $this->data);
    }

}