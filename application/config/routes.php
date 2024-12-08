<?php
defined('BASEPATH') OR exit('No direct script access allowed');

$route['Home'] = 'Home/index';
$route['About'] = 'Home/about';
$route['Services'] = 'Home/services';
$route['Packages'] = 'Home/packages';
$route['Blog'] = 'Home/blog';
$route['Contact'] = 'Home/contact';
$route['Booking'] = 'Home/form';

$route['Login'] = 'Login';
$route['Logout'] = 'Login/logout';
$route['Register'] = 'Register';

$route['Profile'] = 'Profile/index';

$route['default_controller'] = 'Home';
$route['(:any)'] = 'Oops';

$route['404_override'] = 'Oops';
$route['translate_uri_dashes'] = FALSE;