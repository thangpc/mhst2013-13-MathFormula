<?php  if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Formula extends Admin_Controller {

	public function __construct() {

		parent::__construct();
		$this->load->model('formula_model');
	}

	/**
	* list all formula
	**/
	public function index($page = 1) {
		
		$this->load->library('pagination');
        $this->load->helper('pagination');

		$limit = ($page - 1) * 8; 
		$total_rows = count($this->formula_model->get());
		$formula = $this->formula_model->get(NULL, FALSE, 8, $limit);		
        
        if ($formula == null) {
            $formulas = array();
        } else {

            $config = pagination(site_url("admin/formula"), $total_rows, 8, $page, 3);
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
		$this->data['title_page'] = "List formulas";
		$this->data['content_view'] = 'formula/list';
		$this->load->view('admin/_layout', $this->data);
	}

	public function delete() {		
		$this->user_model->loggedin('user') != 'admin' || redirect('home', 'refresh');
		$aid = $this->input->post('aid');
		$id = alphaID($aid, TRUE);
		$ok = $this->formula_model->delete($id);
		if ($ok) {
			$data['status'] = 'success';			
		} else {
			$data['status'] = 'failed';
			$data['message'] = 'Connection db err.';
		}
        $this->output
            ->set_content_type('application/json')
            ->set_output(json_encode(array('data' => $data)));
	}
	
}