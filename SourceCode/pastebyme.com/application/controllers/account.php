<?php  if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Account extends Frontend_Controller {

    private $__data = array();
     
	public function __construct() {
		
		parent::__construct();
        if ( isset($_SESSION['username']) ) {
            $this->data['user'] = $_SESSION['username'];
            $this->data['user_id'] = $_SESSION['user_id'];            
        }
	}

	public function index() {

	}

	public function login() {

    	if ( isset($_SESSION['username']) ) {
        	redirect('home', 'refresh');
      	}

        $this->data['title_page'] = "Login account";
		$this->data['content_view'] = 'account/login';
		$this->load->view('_layout', $this->data);
    }

    public function register() {

        if ( isset($_SESSION['username']) ) {
            redirect('home', 'refresh');
        }

        $this->data['title_page'] = "Resigter account";
        $this->data['content_view'] = 'account/signup';
        $this->load->view('_layout', $this->data);
    }

    public function info() {

        if (!isset($_SESSION['username'])) {
            redirect('home', 'refresh');
            die;
        }
        $this->load->model('formular_model');
        $user_id = $this->data['user_id'];

        $formulars = $this->formular_model->getBy('user_id', $user_id);
        
        if ($formulars == null) {
            $formulars = array();
        } else {
            foreach ($formular as $key => $val) {
                $t['f_id'] = alphaID($val->formular_id);
                $t['title'] = $val->title;
                $t['latex'] = $val->latex;
                $user_id = $val->user_id;
                $formulars[] = $t;
            }
        }
        $this->data['formulars'] = $formulars;
        
        $this->data['title_page'] = "Account Information";
        $this->data['content_view'] = 'account/info';
        $this->load->view('_layout', $this->data);
    }

    public function changeInfo() {

        $this->data['title_page'] = "Change Information";
        $this->data['content_view'] = 'account/changeInfo';
        $this->load->view('_layout', $this->data);
    }

    public function changePass() {

        $this->data['title_page'] = "Change Password";
        $this->data['content_view'] = 'account/changePass';
        $this->load->view('_layout', $this->data);
    }

}