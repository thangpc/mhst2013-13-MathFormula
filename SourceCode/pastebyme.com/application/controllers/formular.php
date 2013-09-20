<?php  if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Formular extends Frontend_Controller {

	public function __construct() {

		parent::__construct();
		$this->load->model('formular_model');
		$this->load->model('user_model');
	}

	public function index() {
	}

	//save formular to database	
	public function save() {

		if (isset($_SESSION['time_post'])) $time_post = $_SESSION['time_post'];
		else $time_post = 0;
		$max_time = 60;
		$login = 1;
		if (!isset($_SESSION['username'])) {
			$max_time = 3 * 60;
			$login = 0;
		}

		if ( (time() - $time_post) < $max_time ) {
			$time = $max_time - (time() - $time_post);
			$data['status'] = 'timeout';			
			$data['time'] = $time;
			$data['login'] = $login;
            $data['message'] = 'Please wait '.$time.' seconds to next post. Thanks!';
		} else {

			$this->load->library('form_validation');
	        $this->form_validation->set_rules('latex-source', 'latex-source', 'trim|xss_clean|required|min_length[1]');
	        $this->form_validation->set_rules('title', 'title', 'trim|xss_clean');

	        $data = array();
	        
	        if ( $this->form_validation->run() !== false ) {
	            // then validation passed. Get from db
	            $title = $this->input->post('title');
	            if (strlen($title) < 1) $title = "Untitled";

	            //get user_id
	            if (isset($_SESSION['username'])) {
	            	$user_id = $_SESSION['user_id'];
	            }
	           	else $user_id = 0;

	            $formular = array(
	            	'user_id' => $user_id,
					'latex'	=> $this->input->post('latex-source'),
					'title' 		=> $title,
					'time_created'	=> time()
				);
	            
	            $id = $this->formular_model->save($formular);
	           	
	            if ( $id !== false ) {
	            	$_SESSION['time_post'] = time();
	                $data['status'] = 'success';
	                $data['id'] = alphaID($id);
	                $data['message'] = 'Saved.';
	            } else {
	                $data['status'] = 'failed';
	                $data['message'] = 'Lost connection. Please try again!';
	            }
	        } else {
	            $data['status'] = 'nodata';
	            $data['message'] = 'Validate failed. Please try again!';
	        }
    	}

        $this->output
            ->set_content_type('application/json')
            ->set_output(json_encode(array('data' => $data)));
	}

	//update formular to database	
	public function update() {

		$this->load->library('form_validation');
        $this->form_validation->set_rules('latex-source', 'latex-source', 'trim|xss_clean|required|min_length[1]');
        $this->form_validation->set_rules('title', 'title', 'trim|xss_clean');

        $data = array();
        
        if ( $this->form_validation->run() !== false ) {
            // then validation passed. Get from db
            $title = $this->input->post('title');
            if (strlen($title) < 1) $title = "Untitled";
            $formular_id = alphaID($this->input->post('formular_id'), true);
            $formular = array(
				'latex'	=> $this->input->post('latex-source'),
				'title' 		=> $title,
				'time_updated'	=> time()
			);
            $id = $this->formular_model->save($formular, $formular_id);
           	
            if ( $id !== false ) {
                $data['status'] = 'success';
                $data['id'] = alphaID($id);
                $data['message'] = 'Saved.';
            } else {
                $data['status'] = 'failed';
                $data['message'] = 'Lost connection. Please try again!';
            }
        } else {
            $data['status'] = 'nodata';
            $data['message'] = 'Validate failed. Please try again!';
        }

        $this->output
            ->set_content_type('application/json')
            ->set_output(json_encode(array('data' => $data)));
	}

	//view detail formular
	public function view($id = '') {
		$this->data['id'] = $id;
		$id = alphaID($id, true);
		$formular = $this->formular_model->get($id);
		//var_dump($formular->formular_id);die;
		$this->data['title'] = $formular->title;
		$this->data['latex'] = $formular->latex;
		$user_id = $formular->user_id;
		$this->data['author'] = 0;
		if ($user_id == 0) {
		} else {
			$user = $this->user_model->get($user_id);		
			if (isset($_SESSION['username']))
				if ($user->username == $_SESSION['username'])
					$this->data['author'] = 1;
		}
		$this->data['title_page'] = 'Formular detail';
		$this->data['content_view'] = 'formular/view';
		$this->load->view('_layout', $this->data);
	}

	//edit formular - view layer
	public function edit($aid = '') {
		$this->data['id'] = $aid;
		$id = alphaID($aid, true);
		$formular = $this->formular_model->get($id);
		if ($formular == null) {
			redirect('home', 'refresh');
			die;
		}
		$this->data['title'] = $formular->title;
		$this->data['latex'] = $formular->latex;

		$user_id = $formular->user_id;
		$this->data['user_id'] = alphaID($user_id);
		$this->data['author'] = 0;
		$user = $this->user_model->get($user_id);

		//check author
		if (isset($_SESSION['username']))
			if ($user->username == $_SESSION['username'])
				$this->data['author'] = 1;

		// not author can't edit
		if ($this->data['author'] == 0) {			
			redirect("formular/view-$aid", 'refresh');
			die;
		}		

		$this->data['title_page'] = 'Edit formular';
		$this->data['content_view'] = 'formular/edit';
		$this->load->view('_layout', $this->data);
	}

	//copy formular - view layer
	public function copy($aid = '') {
		$this->data['id'] = $aid;
		$id = alphaID($aid, true);

		$formular = $this->formular_model->get($id);
		if ($formular == null) {			
			redirect('home', 'refresh');
			die;
		}
		$this->data['title'] = $formular->title;
		$this->data['latex'] = $formular->latex;
		$this->data['title_page'] = 'Add new formular';
		$this->data['content_view'] = 'formular/copy';
		$this->load->view('_layout', $this->data);
	}

}