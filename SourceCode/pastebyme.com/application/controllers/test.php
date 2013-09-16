<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Test extends Frontend_Controller {

	public function __construct() {
		parent::__construct();
		$this->load->model('user_model');
	}

	public function index()
	{	
		$users = $this->user_model->get();
		$data = array(
			'email' => 'tester@localhost'
		);

		//insert
		//$id = $this->user_model->save($data);

		//update
		//$id = $this->user_model->save($data, 2);

		//delete
		//$this->user_model->delete(2);

		var_dump($users);
	}
}

/* End of file welcome.php */
/* Location: ./application/controllers/welcome.php */