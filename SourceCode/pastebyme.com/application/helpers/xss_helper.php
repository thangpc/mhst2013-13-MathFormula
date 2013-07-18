<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

if ( ! function_exists('xss')) {
    
    function xss($str = '') {
    	//$str = strip_tags($str);
    	//$str = filter_var($str, FILTER_SANITIZE_STRING);
    	return htmlentities($str);
    }
}