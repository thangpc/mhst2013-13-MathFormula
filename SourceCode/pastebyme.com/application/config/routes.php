<?php  if ( ! defined('BASEPATH')) exit('No direct script access allowed');


$route['default_controller'] = "welcome";
$route['404_override'] = '';

$route['admin/login'] = "admin/auth/login";
$route['admin/auth'] = "admin/auth/login_auth";
