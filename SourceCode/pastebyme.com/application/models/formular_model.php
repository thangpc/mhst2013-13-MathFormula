<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Formular_model extends MY_Model {

	protected $_table_name = 'formulars';
	protected $_primary_key = 'formular_id';
	protected $_primary_filter = 'intval';
	protected $_order_by = 'formular_id DESC';
	protected $_rules = array();
	protected $_timetamps = FALSE;

	public function __construct() {

		parent::__construct();
	}

}