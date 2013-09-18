<?php  if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Home extends Frontend_Controller {

	public function __construct() {

		parent::__construct();
	}

	/**
	* Home page
	**/
	public function index() {		

		$this->data['title_page'] = "Home";
		$this->data['content_view'] = 'home';
		$this->load->view('_layout', $this->data);
	}

	/**
	* Cheat sheet page
	**/
	public function cheatSheet() {

		$this->data['title_page'] = "Rapid typing math formular - Cheat Sheets";
		$this->data['content_view'] = 'cheatsheets';
		$this->load->view('_layout', $this->data);
	}

	/**
	* Contact us page
	**/
	public function contactUs() {
		$this->data['title_page'] = "Contact us";
		$this->data['content_view'] = 'contact-us';
		$this->load->view('_layout', $this->data);		
	}

	public function saveImage() {

	}
}