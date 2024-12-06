<?php
defined('BASEPATH') OR exit('No direct script access allowed');

$route['About'] = 'Home/about';
$route['Services'] = 'Home/services';
$route['Packages'] = 'Home/packages';
$route['Blog'] = 'Home/blog';
$route['Contact'] = 'Home/contact';
$route['Booking'] = 'Home/form';

$route['Login'] = 'Login';
$route['Register'] = 'Register';

$route['default_controller'] = 'Home';
$route['(:any)'] = 'Page_Not_Found';

$route['404_override'] = 'Page_Not_Found';
$route['translate_uri_dashes'] = FALSE;