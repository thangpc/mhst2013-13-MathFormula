
<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

if ( ! function_exists('pagination')) {
    
    function pagination($base_url, $total_rows, $per_page, $cur_page, $uri_segment) {

    	$config['base_url'] = $base_url;
    	$config['total_rows'] = $total_rows;
    	$config['per_page'] = $per_page;
    	$config['uri_segment'] = $uri_segment;
    	$config['num_links'] = round($total_rows / $per_page);
		$config['full_tag_open'] = '<div class="pagination"><ul class="pagination-digg">';
		$config['full_tag_close'] = '</ul></div><!--pagination-->';
		$config['use_page_numbers'] = TRUE;
		$config['first_link'] = 'First';
		$config['first_tag_open'] = '<li>';
		$config['first_tag_close'] = '</li>';

		// Last Links
		$config['last_link'] = 'Last';
		$config['last_tag_open'] = '<li>';
		$config['last_tag_close'] = '</li>';

		// Next Link
		$config['next_link'] = '&raquo;';
		$config['next_tag_open'] = '<li>';
		$config['next_tag_close'] = '</li>';

		// Previous Link
		$config['prev_link'] = '&laquo;';
		$config['prev_tag_open'] = '<li>';
		$config['prev_tag_close'] = '</li>';

		// Current Link
		$config['cur_tag_open'] = '<li class="active">';
		$config['cur_tag_close'] = '</li>';

		// Digit Link
		$config['num_tag_open'] = '<li>';
		$config['num_tag_close'] = '</li>';

		return $config;
	}
}