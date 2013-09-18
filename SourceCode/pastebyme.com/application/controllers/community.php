<?php  if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Community extends Frontend_Controller {

	public function __construct() {

		parent::__construct();
	}

	/**
	* List formulars
	**/
	public function index($page = 1) {
		
		$this->load->model('formular_model');
		$this->load->model('user_model');
		$this->load->library('pagination');		

		$limit = ($page - 1) * 5; 
		$total_rows = count($this->formular_model->get());
		$formular = $this->formular_model->get(NULL, FALSE, 5, $limit);		
        
        if ($formular == null) {
            $formulars = array();
        } else {
        	$config = array(
        		'base_url'		=> site_url("community"),
        		'total_rows' 	=> $total_rows,
        		'use_page_numbers' => TRUE,
        		'per_page'		=> 5,
        		'cur_page'		=> $page,
        		'num_links'		=> round($total_rows / 5),
        		'uri_segment'	=> 3,
        	);

			$this->pagination->initialize($config);
			$this->data['pages'] = $this->pagination->create_links();

        	foreach ($formular as $key => $val) {
        		$t['f_id'] = alphaID($val->formular_id);
        		$t['title'] = $val->title;
        		$t['latex'] = $val->latex;
        		$user_id = $val->user_id;
        		if ($user_id == 0) {
        			$t['user'] = '';
        		} else {
		    		$user = $this->user_model->get($user_id);
		    		$t['user'] = $user->username;
        		}
        		$formulars[] = $t;
        	}
        }
        $this->data['formulars'] = $formulars;
		$this->data['title_page'] = "Community";
		$this->data['content_view'] = 'community/list';
		$this->load->view('_layout', $this->data);
	}
}