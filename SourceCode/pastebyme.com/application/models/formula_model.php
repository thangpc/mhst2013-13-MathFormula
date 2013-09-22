<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class formula_model extends MY_Model {

	protected $_table_name = 'formulas';
	protected $_primary_key = 'formula_id';
	protected $_primary_filter = 'intval';
	protected $_order_by = 'formula_id DESC';
	protected $_rules = array();
	protected $_timetamps = FALSE;

	public function __construct() {

		parent::__construct();
	}

}