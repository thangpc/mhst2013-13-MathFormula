<?php

class Dashboard extends Admin_Controller {
	
	public function __construct() {

		parent::__construct();
	}

	public function index() {

		$this->data['title_page'] = "Dashboard";
		$this->data['content_view'] = 'dashboard';		
		$this->load->view('admin/_layout', $this->data);
	}
}