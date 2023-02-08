<?php  if ( ! defined('BASEPATH')) exit('No direct script access allowed');
/*
| -------------------------------------------------------------------------
| URI ROUTING
| -------------------------------------------------------------------------
| This file lets you re-map URI requests to specific controller functions.
|
| Typically there is a one-to-one relationship between a URL string
| and its corresponding controller class/method. The segments in a
| URL normally follow this pattern:
|
|	example.com/class/method/id/
|
| In some instances, however, you may want to remap this relationship
| so that a different class/function is called than the one
| corresponding to the URL.
|
| Please see the user guide for complete details:
|
|	http://codeigniter.com/user_guide/general/routing.html
|
| -------------------------------------------------------------------------
| RESERVED ROUTES
| -------------------------------------------------------------------------
|
| There area two reserved routes:
|
|	$route['default_controller'] = 'welcome';
|
| This route indicates which controller class should be loaded if the
| URI contains no data. In the above example, the "welcome" class
| would be loaded.
|
|	$route['404_override'] = 'errors/page_missing';
|
| This route will tell the Router what URI segments to use if those provided
| in the URL cannot be matched to a valid route.
|
*/

//$route['default_controller'] = "pages/home";
$route['default_controller'] = "frontend/index";  
$route['404_override'] = '';

// Custom admin routing
$route['physioadmin'] = 'physioadmin/dashboard';
$route['physioadmin/login'] = 'physioadmin/dashboard/login';
$route['physioadmin/logout'] = 'physioadmin/dashboard/logout';
$route['physioadmin/dashboard'] = 'physioadmin/dashboard/home'; 

// Custom admin routing
$route['subadmin'] = 'subadmin/login';
$route['subadmin/login'] = 'subadmin/login';
$route['subadmin/logout'] = 'subadmin/dashboard/logout';
$route['subadmin/dashboard'] = 'subadmin/dashboard/home'; 


// Custom client routing
 $route['client'] = 'client/dashboard';
$route['client/login'] = 'client/dashboard/login';
$route['client/logout'] = 'client/dashboard/logout';
$route['client/dashboard'] = 'client/dashboard/home';
$route['newsletter'] = 'newsletter/newsletter';
$route['physioadmin'] = 'physioadmin/dashboard/login'; 
$route['patient/login'] = 'patient/patient/login';
$route['sign_up'] = 'registration/index_new';

/* End of file routes.php */
/* Location: ./application/config/routes.php */