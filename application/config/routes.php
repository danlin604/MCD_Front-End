<?php
defined('BASEPATH') OR exit('No direct script access allowed');

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
$route['sales'] = 'sales_controller';
$route['sales/(:num)'] = 'sales_controller/get/$1';

$route['production'] = 'production_controller';
$route['production/(:num)'] = 'production_controller/get/$1';

$route['receiving'] = 'receiving_controller';

//Admin
$route['admin'] = 'administrator_controller';
$route['admin/edit/(:any)/(:num)'] = 'administrator_controller/edit/$1/$2';
$route['admin/cancel'] = 'administrator_controller/cancel';
$route['admin/save/(:any)'] = 'administrator_controller/save/$1';
$route['admin/delete/(:any)'] = 'administrator_controller/delete/$1';
$route['admin/add/(:any)'] = 'administrator_controller/add/$1';

//$route['admin/delete'] = 'administrator_controller/index_delete';
/*
$route['admin/recipeTable/edit/(:num)'] = 'administrator_controller/recipeEdit/$1';
$route['admin/recipeTable/delete']  = 'administrator_controller/recipeDel';
$route['admin/recipeTable/save']  = 'administrator_controller/recipeSave';

$route['admin/stockTable/edit/(:num)']  = 'administrator_controller/stockEdit/$1';
$route['admin/stockTable/delete']  = 'administrator_controller/stockDel';
$route['admin/stockTable/save']   = 'administrator_controller/stockSave';

$route['admin/suppliesTable/edit/(:num)']  = 'administrator_controller/suppliesEdit/$1';
$route['admin/suppliesTable/delete']  = 'administrator_controller/suppliesDel';
$route['admin/suppliesTable/save']   = 'administrator_controller/suppliesSave';
*/

$route['default_controller'] = 'homepage_controller';
$route['404_override'] = '';
$route['translate_uri_dashes'] = FALSE;


/*
$route['sleep'] = 'first/zzz';
$route['show/(:num)'] = 'first/gimme/$1';

$route['lock/(:any)/(:any)'] = 'welcome/shucks';
$route['comp(\d+)/(.*)'] = 'wise/bingo';
$route['dunno'] = function() {
	$source = './assets/images/surprise.jpg'; // an image you provide
	// set the mime type for that image
	header("Content-type: image/jpeg"); 
	header('Content-Disposition: inline');
	readfile($source); // dish it
	die(); // and we don't have to go any further
};                 
$route['^[a-zA-Z]{4}/bingo'] = 'bingo';
*/