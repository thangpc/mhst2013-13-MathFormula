<?php  if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Community extends Frontend_Controller {

	public function __construct() {

		parent::__construct();
	}

	/**
	* List formulas
	**/
	public function index($page = 1) {
		
		$this->load->model('formula_model');
		$this->load->model('user_model');
		$this->load->library('pagination');
        $this->load->helper('pagination');

		$limit = ($page - 1) * 8; 
		$total_rows = count($this->formula_model->get());
		$formula = $this->formula_model->get(NULL, FALSE, 8, $limit);		
        
        if ($formula == null) {
            $formulas = array();
        } else {

            $config = pagination(site_url("community"), $total_rows, 8, $page, 2);
			$this->pagination->initialize($config);
            $this->data['pages'] = array();
			$this->data['pages'] = $this->pagination->create_links();

        	foreach ($formula as $key => $val) {
        		$t['f_id'] = alphaID($val->formula_id);
        		$t['title'] = $val->title;
        		$t['latex'] = $val->latex;
                $t['time_created'] = date('d-m-Y',$val->time_created);
        		$user_id = $val->user_id;
        		if ($user_id == 0) {
        			$t['user'] = '';
        		} else {
		    		$user = $this->user_model->get($user_id);
		    		$t['user'] = $user->username;
        		}
        		$formulas[] = $t;
        	}
        }
        $this->data['formulas'] = $formulas;
		$this->data['title_page'] = "Community";
		$this->data['content_view'] = 'community/list';
		$this->load->view('_layout', $this->data);
	}
}