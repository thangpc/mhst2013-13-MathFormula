<?php  if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Formula extends Frontend_Controller {

	public function __construct() {

		parent::__construct();
		$this->load->model('formula_model');		
	}

	public function index() {
	}
	
	/*
    	@author: trunghieuhf@gmail.com
    	@description: save formula to database	
	    @route: /save-formula
	    @return JSON
    */
	public function save() {
		if (isset($this->session->userdata['time_post_formula'])) 
			$time_post_formula = $this->session->userdata['time_post_formula'];
		else $time_post_formula = 0;
				
		$max_time = 15;
		$login = 1;
		if ($this->user_model->loggedin('user') != 'public') {
			$max_time = 60;
			$login = 0;
		}		
		if ( (time() - $time_post_formula) < $max_time ) {
			$time = $max_time - (time() - $time_post_formula);
			$data['status'] = 'timeout';			
			$data['time'] = $time;
			$data['login'] = $login;
            $data['message'] = 'Please wait '.$time.' seconds to next post. Thanks!';
		} else {

			$this->load->library('form_validation');
	        $this->form_validation->set_rules('latex-source', 'latex-source', 'trim|xss_clean|required|min_length[1]');
	        $this->form_validation->set_rules('title', 'title', 'trim|xss_clean');

	        $data = array();
	        
	        if ( $this->form_validation->run() != FALSE ) {
	            // then validation passed. Get from db
	            $title = $this->input->post('title');
	            if (strlen($title) < 1) $title = "Untitled";

	            //get user_id
	            if ($this->user_model->loggedin('user') == 'public') {
	            	$user_id = $this->session->userdata['user_id'];
	            }
	           	else $user_id = 0;

	            $formula = array(
	            	'user_id' => $user_id,
					'latex'	=> $this->input->post('latex-source'),
					'title' 		=> $title,
					'time_created'	=> time()
				);
	            
	            $id = $this->formula_model->save($formula);
	           	
	            if ( $id != FALSE ) {
	            	$this->session->set_userdata('time_post_formula', time());
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

	/*
        @author: trunghieuhf@gmail.com
        @description: update formula to database
        @route: /update-formula
        @return JSON
    */
	public function update() {

		$this->load->library('form_validation');
        $this->form_validation->set_rules('latex-source', 'latex-source', 'trim|xss_clean|required|min_length[1]');
        $this->form_validation->set_rules('title', 'title', 'trim|xss_clean');

        $data = array();
        
        if ( $this->form_validation->run() !== false ) {
            // then validation passed. Get from db
            $title = $this->input->post('title');
            if (strlen($title) < 1) $title = "Untitled";
            $formula_id = alphaID($this->input->post('formula_id'), true);
            $formula = array(
				'latex'	=> $this->input->post('latex-source'),
				'title' 		=> $title,
				'time_updated'	=> time()
			);
            $id = $this->formula_model->save($formula, $formula_id);
           	
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

	/*
        @author: trunghieuhf@gmail.com
        @description: view detail formula
        @route: /formula/view/$1
        @return View
    */
	public function view($id = '') {

		$this->data['id'] = $id;
		$id = alphaID($id, true);
		$formula = $this->formula_model->get($id);		
		$this->data['title'] = $formula->title;
		$this->data['latex'] = $formula->latex;	
		$this->data['time_created'] = date('d-m-Y', $formula->time_created);
		$user_id = $formula->user_id;
		$this->data['author'] = 0;
		if ($user_id == 0) {
			$this->data['posted_by'] = 'Guest';
		} else {
			$user = $this->user_model->get($user_id);
			$this->data['posted_by'] = $user->username;
			if ($this->user_model->loggedin('user') == 'public')
				if ($user->username == $this->session->userdata('user'))
					$this->data['author'] = 1;
		}
		$this->data['title_page'] = 'Formula detail';
		$this->data['content_view'] = 'formula/view';
		$this->load->view('_layout', $this->data);
	}

	/*
        @author: trunghieuhf@gmail.com
        @description: edit formula
        @route: /formula/edit/$1
        @return View
    */
	public function edit($aid = '') {

		$this->data['id'] = $aid;
		$id = alphaID($aid, true);
		$formula = $this->formula_model->get($id);
		if ($formula == null) {
			redirect('home', 'refresh');
			die;
		}
		$this->data['title'] = $formula->title;
		$this->data['latex'] = $formula->latex;

		$user_id = $formula->user_id;
		$this->data['user_id'] = alphaID($user_id);
		$this->data['author'] = 0;
		$user = $this->user_model->get($user_id);

		//check author
		if ($this->user_model->loggedin('user') == 'public')
			if ($user->username == $this->session->userdata('user'))
				$this->data['author'] = 1;

		// not author can't edit
		if ($this->data['author'] == 0) {			
			redirect("formula/view-$aid", 'refresh');
			die;
		}		

		$this->data['title_page'] = 'Edit formula';
		$this->data['content_view'] = 'formula/edit';
		$this->load->view('_layout', $this->data);
	}

	/*
        @author: trunghieuhf@gmail.com
        @description: copy formula
        @route: /formula/copy/$1
        @return View
    */
	public function copy($aid = '') {
		$this->data['id'] = $aid;
		$id = alphaID($aid, true);

		$formula = $this->formula_model->get($id);
		if ($formula == null) {			
			redirect('home', 'refresh');
			die;
		}
		$this->data['title'] = $formula->title;
		$this->data['latex'] = $formula->latex;
		$this->data['title_page'] = 'Add new formula';
		$this->data['content_view'] = 'formula/copy';
		$this->load->view('_layout', $this->data);
	}

}