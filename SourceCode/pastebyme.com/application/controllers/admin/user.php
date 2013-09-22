<?php  if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class User extends Admin_Controller {

    public function __construct(){
        parent::__construct();
    }

    /*
    * route: admin/login
    * return: View
    */
    public function login(){
        
        $this->user_model->loggedin('admin') != 'admin' || redirect('admin/dashboard');
    	$rules = $this->user_model->rules_login_admin;
    	$this->form_validation->set_rules($rules);

    	if ($this->form_validation->run() == TRUE) {
    		if ($this->user_model->loginAdmin() == TRUE) {                

                redirect('admin');                
            }
            else {
                $this->session->set_flashdata('error', 'Access denied!');
                redirect('admin/login', 'refresh');
            }
    	}
        $this->data['title_page'] = 'Login';
        $this->load->view('admin/user/login', $this->data);
    }

    public function logout(){
        $this->user_model->logout('admin');
        redirect('admin/user/login');
    }

}