<?php
defined('BASEPATH') or exit('No direct script access allowed');

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
|	https://codeigniter.com/user_guide/general/routing.html
|
| -------------------------------------------------------------------------
| RESERVED ROUTES
| -------------------------------------------------------------------------
|
| There are three reserved routes:
|
|	$route['default_controller'] = 'welcome';
|
| This route indicates which controller class should be loaded if the
| URI contains no data. In the above example, the "welcome" class
| would be loaded.
|
|	$route['404_override'] = 'errors/page_missing';
|
| This route will tell the Router which controller/method to use if those
| provided in the URL cannot be matched to a valid route.
|
|	$route['translate_uri_dashes'] = FALSE;
|
| This is not exactly a route, but allows you to automatically route
| controller and method names that contain dashes. '-' isn't a valid
| class or method name character, so it requires translation.
| When you set this option to TRUE, it will replace ALL dashes in the
| controller and method URI segments.
|
| Examples:	my-controller/index	-> my_controller/index
|		my-controller/my-method	-> my_controller/my_method
*/
$route['default_controller'] = 'welcome';
$route['404_override'] = '';
$route['translate_uri_dashes'] = FALSE;

$route['criteria']             = 'master/CriteriaController/index';
$route['criteria/create']             = 'master/CriteriaController/create';
$route['criteria/store']             = 'master/CriteriaController/store';
$route['criteria/(:any)/edit']   = 'master/CriteriaController/edit/$1';
$route['criteria/update']             = 'master/CriteriaController/update';
$route['criteria/(:any)/delete']   = 'master/CriteriaController/delete/$1';

$route['product']             = 'master/ProductController/index';
$route['product/create']             = 'master/ProductController/create';
$route['product/store']             = 'master/ProductController/store';
$route['product/(:any)/edit']   = 'master/ProductController/edit/$1';
$route['product/update']             = 'master/ProductController/update';
$route['product/(:any)/delete']   = 'master/ProductController/delete/$1';

$route['calculate']             = 'transaction/CalculateController/index';
$route['priority']             = 'transaction/CalculateController/priority';



// $route['candidate/(:any)/create'] = 'master/CandidateController/create/$1';
// $route['candidate/(:any)/delete'] = 'master/CandidateController/delete/$1';
// $route['candidate/store']       = 'master/CandidateController/store';
// $route['candidate/(:any)/show'] = 'master/CandidateController/show/$1';
// $route['candidate/edit/(:any)'] = 'master/CandidateController/editAjax/$1';
// $route['candidate/update']      = 'master/CandidateController/update';
