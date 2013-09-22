<?php  if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Account extends Frontend_Controller {

    private $__data = array();
     
	public function __construct() {
		
		parent::__construct();
        if ($this->user_model->loggedin('user') == 'public') {
            $user_id = $this->session->userdata['user_id'];
            $user = $this->session->userdata['user'];
            $this->data = array(
                'user_id' => $user_id,
                'user' => $user
            );
        }
	}

	public function index() {

	}

    /*
        @author: trunghieuhf@gmail.com
        @description: login account
        @route: /login
        @return View
    */
	public function login() {

    	$this->user_model->loggedin('user') != 'public' || redirect('home', 'refresh');      
        $this->data['title_page'] = "Login account";
		$this->data['content_view'] = 'account/login';
		$this->load->view('_layout', $this->data);
    }

    /*
        @author: trunghieuhf@gmail.com
        @description: check login account
        @route: /login-check
        @return JSON
    */
    public function checkLogin() {

        $rules = $this->user_model->rules_login_public;
        $this->form_validation->set_rules($rules);

        $data = array();

        if ( $this->form_validation->run() == TRUE ) {
                
            if ($this->user_model->login() == TRUE) {
                $data['status'] = 'success';
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

    /*
        @author: trunghieuhf@gmail.com
        @description: logout account
        @route: /logout
        @return User model
    */
    public function logout(){

        $this->user_model->loggedin('user') == 'public' || redirect('home', 'refresh');
        $this->user_model->logout('user');
        redirect('home');
    }

    /*
        @author: trunghieuhf@gmail.com
        @description: register new user
        @route: /sign-up
        @return View
    */
    public function register() {

        $this->user_model->loggedin('user') != 'public' || redirect('home', 'refresh');
        $this->data['title_page'] = "Resigter account";
        $this->data['content_view'] = 'account/signup';
        $this->load->view('_layout', $this->data);
    }

    /*
        @author: trunghieuhf@gmail.com
        @description: auth register new user
        @route: /check-sign-up
        @return JSON
    */
    public function checkSignUp() {

        $rules = $this->user_model->rules_register;
        $this->form_validation->set_rules($rules);

        $data = array();

        // check validate form input
        if ( $this->form_validation->run() == TRUE ) {

            // if user available
            if ($this->user_model->checkUser() == FALSE) {                
                $user = array(
                    'username' => $this->input->post('username'),
                    'password' => $this->user_model->hash($this->input->post('password')),
                    'email' => $this->input->post('email'),
                    'time_created' => time()
                );
                $user_id = $this->user_model->save($user);
                if ($user_id > 0) {
                    $data = array(
                        'user' => $this->input->post('username'),
                        'user_id' => $user_id,
                        'user_loggedin' => 'public',
                    );
                    $this->session->set_userdata($data);
                    $data['status'] = 'success';
                    $data['user'] = $this->input->post('username');
                    $data['message'] = 'Register successfully.';
                } else {
                    $data['status'] = 'failed';
                    $data['message'] = 'Connect server failed. Please try again!';
                }
            } else {
                $data['status'] = 'failed';
                $data['message'] = $this->input->post('username').' invalid. Re-enter username.';
            }

        } else {
            $data['status'] = 'nodata';
            $data['message'] = 'Please fill correct input value.';
        }

        $this->output
            ->set_content_type('application/json')
            ->set_output(json_encode(array('data' => $data)));       
    }

    /*
        @author: trunghieuhf@gmail.com
        @description: view user information
        @route: /account/$1
        @return View
    */
    public function info($user = '', $page = 1) {
            
        $r = $this->user_model->getBy( array('username' => $user), TRUE );
        $this->data['user'] = $user;
        $this->data['user_id'] = $r->user_id;
        $this->data['joined'] = date('d-m-Y', $r->time_created);
        
        $this->load->model('formular_model');
        $this->load->library('pagination');
        $this->load->helper('pagination');  

        $start = ($page - 1) * 8;
        $limit = 8;
        $total_rows = count($this->formular_model->getBy( array('user_id' => $this->data['user_id']) ));                  
        $formulars = $this->formular_model->getBy( array('user_id' => $this->data['user_id']), FALSE, $limit, $start);

        if ($formulars == null) {
            $formulars = array();
            $fors = array();
        } else {
            $config = pagination(site_url("account/$user"), $total_rows, 8, $page, 3);
            $this->pagination->initialize($config);
            $this->data['pages'] = array();
            $this->data['pages'] = $this->pagination->create_links();

            foreach ($formulars as $key => $val) {
                $t['f_id'] = alphaID($val->formular_id);
                $t['title'] = $val->title;
                $t['latex'] = $val->latex;
                $t['time_created'] = date('d-m-Y', $val->time_created);
                $user_id = $val->user_id;
                $fors[] = $t;
            }
        }        
        $this->data['formulars'] = $fors;        
        $this->data['title_page'] = "Account Information";
        $this->data['content_view'] = 'account/info';
        $this->data['col_left'] = $this->load->view('account/col_left', $this->data, TRUE);
        $this->load->view('_layout', $this->data);
    }

    /*
        @author: trunghieuhf@gmail.com
        @description: change user info
        @route: /change-info
        @return View
    */
    public function changeInfo() {

        $this->user_model->loggedin('user') == 'public' || redirect('home', 'refresh');
        $this->data['title_page'] = "Change Information";
        $this->data['col_left'] = $this->load->view('account/col_left', $this->data, TRUE);
        $this->data['content_view'] = 'account/changeInfo';
        $this->load->view('_layout', $this->data);
    }

    /*
        @author: trunghieuhf@gmail.com
        @description: change password
        @route: /change-pass
        @return View
    */
    public function changePass() {

        $this->user_model->loggedin('user') == 'public' || redirect('home', 'refresh');
        $this->data['title_page'] = "Change Password";
        $this->data['col_left'] = $this->load->view('account/col_left', $this->data, TRUE);
        $this->data['content_view'] = 'account/changePass';
        $this->load->view('_layout', $this->data);
    }

}