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
|	http://codeigniter.com/user_guide/general/routing.html
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
$route['default_controller'] = 'Login_Controller';
$route['404_override'] = '';
$route['translate_uri_dashes'] = FALSE;

//----------------------------- user defined routes --------------------

$route['login'] = 'Login_Controller';
$route['login/(:any)'] = 'Login_Controller/$1';

$route['home'] = 'Home_Controller';
$route['home/(:any)'] = 'Home_Controller/$1';

$route['customer'] = 'Customer_Controller';
$route['customer/(:any)'] = 'Customer_Controller/$1';
$route['customer/list'] = 'Customer_Controller/get_list';
$route['customer/list/(:any)'] = 'Customer_Controller/get_list/$1';
$route['customer/add/(:any)'] = 'Customer_Controller/add/$1';
$route['customer/edit/(:any)/(:any)'] = 'Customer_Controller/edit/$1/$2';
$route['customer/delete/(:any)'] = 'Customer_Controller/delete/$1';

$route['item'] = 'Item_Controller';
$route['item/(:any)'] = 'Item_Controller/$1';
$route['item/list'] = 'Item_Controller/get_list';
$route['item/list/(:any)'] = 'Item_Controller/get_list/$1';
$route['item/add/(:any)'] = 'Item_Controller/add/$1';
$route['item/edit/(:any)/(:any)'] = 'Item_Controller/edit/$1/$2';
$route['item/delete/(:any)'] = 'Item_Controller/delete/$1';

$route['supplier'] = 'Supplier_Controller';
$route['supplier/(:any)'] = 'Supplier_Controller/$1';
$route['supplier/list'] = 'Supplier_Controller/get_list';
$route['supplier/list/(:any)'] = 'Supplier_Controller/get_list/$1';
$route['supplier/add/(:any)'] = 'Supplier_Controller/add/$1';
$route['supplier/edit/(:any)/(:any)'] = 'Supplier_Controller/edit/$1/$2';
$route['supplier/delete/(:any)'] = 'Supplier_Controller/delete/$1';

$route['customer'] = 'Customer_Controller';
$route['customer/(:any)'] = 'Customer_Controller/$1';
$route['customer/list'] = 'Customer_Controller/get_list';
$route['customer/list/(:any)'] = 'Customer_Controller/get_list/$1';
$route['customer/add/(:any)'] = 'Customer_Controller/add/$1';
$route['customer/edit/(:any)/(:any)'] = 'Customer_Controller/edit/$1/$2';
$route['customer/delete/(:any)'] = 'Customer_Controller/delete/$1';

$route['user'] = 'User_Controller';
$route['user/(:any)'] = 'User_Controller/$1';
$route['user/list'] = 'User_Controller/get_list';
$route['user/list/(:any)'] = 'User_Controller/get_list/$1';
$route['user/add/(:any)'] = 'User_Controller/add/$1';
$route['user/edit/(:any)/(:any)'] = 'User_Controller/edit/$1/$2';
$route['user/delete/(:any)'] = 'User_Controller/delete/$1';

$route['item'] = 'Item_Controller';
$route['item/(:any)'] = 'Item_Controller/$1';
$route['item/list'] = 'Item_Controller/get_list';
$route['item/list/(:any)'] = 'Item_Controller/get_list/$1';
$route['item/add/(:any)'] = 'Item_Controller/add/$1';
$route['item/edit/(:any)/(:any)'] = 'Item_Controller/edit/$1/$2';
$route['item/delete/(:any)'] = 'Item_Controller/delete/$1';

$route['salesman'] = 'Salesman_Controller';
$route['salesman/(:any)'] = 'Salesman_Controller/$1';
$route['salesman/list'] = 'Salesman_Controller/get_list';
$route['salesman/list/(:any)'] = 'Salesman_Controller/get_list/$1';
$route['salesman/add/(:any)'] = 'Salesman_Controller/add/$1';
$route['salesman/edit/(:any)/(:any)'] = 'Salesman_Controller/edit/$1/$2';
$route['salesman/delete/(:any)'] = 'Salesman_Controller/delete/$1';


$route['receiving'] = 'Receiving_Controller';
$route['receiving/(:any)'] = 'Receiving_Controller/$1';
$route['receiving/list'] = 'Receiving_Controller/get_list';
$route['receiving/list/(:any)'] = 'Receiving_Controller/get_list/$1';
$route['receiving/add/(:any)'] = 'Receiving_Controller/add/$1';
$route['receiving/edit/(:any)/(:any)'] = 'Receiving_Controller/edit/$1/$2';
$route['receiving/delete/(:any)'] = 'Receiving_Controller/delete/$1';
$route['receiving/get_item/(:any)'] = 'Receiving_Controller/get_item/$1';
$route['receiving/rec_no_check/(:any)'] = 'Receiving_Controller/rec_no_check/$1';
$route['receiving/print_faktur/(:any)'] = 'Receiving_Controller/print_faktur/$1';

$route['sales'] = 'Sales_Controller';
$route['sales/(:any)'] = 'Sales_Controller/$1';
$route['sales/list'] = 'Sales_Controller/get_list';
$route['sales/list/(:any)'] = 'Sales_Controller/get_list/$1';
$route['sales/add/(:any)'] = 'Sales_Controller/add/$1';
$route['sales/edit/(:any)/(:any)'] = 'Sales_Controller/edit/$1/$2';
$route['sales/delete/(:any)'] = 'Sales_Controller/delete/$1';

$route['utang'] = 'Utang_Controller';
$route['utang/(:any)'] = 'Utang_Controller/$1';
$route['utang/list'] = 'Utang_Controller/get_list';
$route['utang/list/(:any)'] = 'Utang_Controller/get_list/$1';
$route['utang/add/(:any)'] = 'Utang_Controller/add/$1';
$route['utang/edit/(:any)/(:any)'] = 'Utang_Controller/edit/$1/$2';
$route['utang/delete/(:any)'] = 'Utang_Controller/delete/$1';

$route['piutang'] = 'Piutang_Controller';
$route['piutang/(:any)'] = 'Piutang_Controller/$1';
$route['piutang/list'] = 'Piutang_Controller/get_list';
$route['piutang/list/(:any)'] = 'Piutang_Controller/get_list/$1';
$route['piutang/add/(:any)'] = 'Piutang_Controller/add/$1';
$route['piutang/edit/(:any)/(:any)'] = 'Piutang_Controller/edit/$1/$2';
$route['piutang/delete/(:any)'] = 'Piutang_Controller/delete/$1';

