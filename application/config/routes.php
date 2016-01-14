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

$route['employee'] = 'Employee_Controller';
$route['employee/(:any)'] = 'Employee_Controller/$1';
$route['employee/list'] = 'Employee_Controller/all_list';
$route['employee/list/(:any)'] = 'Employee_Controller/all_list/$1';
$route['employee/add/(:any)'] = 'Employee_Controller/add_new/$1';
$route['employee/edit/(:any)/(:any)'] = 'Employee_Controller/edit/$1/$2';
$route['employee/delete/(:any)'] = 'Employee_Controller/delete/$1';
$route['employee/get_status_combo_edit/(:any)'] = 'Employee_Controller/get_status_combo_edit/$1';
$route['employee/get_unit_combo_edit/(:any)'] = 'Employee_Controller/get_unit_combo_edit/$1';
$route['employee/get_dir_combo_edit/(:any)'] = 'Employee_Controller/get_dir_combo_edit/$1';
$route['employee/get_dept_combo_edit/(:any)'] = 'Employee_Controller/get_dept_combo_edit/$1';
$route['employee/mutasi/(:any)/(:any)'] = 'Employee_Controller/mutasi/$1/$2';
$route['employee/get_penilai_combo_by_dir/(:any)'] = 'Employee_Controller/get_penilai_combo_by_dir/$1';
$route['employee/get_penilai_combo_by_dir2/(:any)'] = 'Employee_Controller/get_penilai_combo_by_dir2/$1';

$route['directorate'] = 'Directorate_Controller';
$route['directorate/(:any)'] = 'Directorate_Controller/$1';
$route['directorate/list'] = 'Directorate_Controller/all_list';
$route['directorate/list/(:any)'] = 'Directorate_Controller/all_list/$1';
$route['directorate/add/(:any)'] = 'Directorate_Controller/add_new/$1';
$route['directorate/edit/(:any)/(:any)'] = 'Directorate_Controller/edit/$1/$2';
$route['directorate/delete/(:any)'] = 'Directorate_Controller/delete/$1';

$route['department'] = 'Department_Controller';
$route['department/(:any)'] = 'Department_Controller/$1';
$route['department/list'] = 'Department_Controller/all_list';
$route['department/list/(:any)'] = 'Department_Controller/all_list/$1';
$route['department/add/(:any)'] = 'Department_Controller/add_new/$1';
$route['department/edit/(:any)/(:any)'] = 'Department_Controller/edit/$1/$2';
$route['department/delete/(:any)'] = 'Department_Controller/delete/$1';

$route['subdepartment'] = 'Subdepartment_Controller';
$route['subdepartment/(:any)'] = 'Subdepartment_Controller/$1';
$route['subdepartment/list'] = 'Subdepartment_Controller/all_list';
$route['subdepartment/list/(:any)'] = 'Subdepartment_Controller/all_list/$1';
$route['subdepartment/add/(:any)'] = 'Subdepartment_Controller/add_new/$1';
$route['subdepartment/edit/(:any)/(:any)'] = 'Subdepartment_Controller/edit/$1/$2';
$route['subdepartment/delete/(:any)'] = 'Subdepartment_Controller/delete/$1';

$route['s3'] = 'Structure3_Controller';
$route['s3/(:any)'] = 'Structure3_Controller/$1';
$route['s3/list'] = 'Structure3_Controller/all_list';
$route['s3/list/(:any)'] = 'Structure3_Controller/all_list/$1';
$route['s3/add/(:any)'] = 'Structure3_Controller/add_new/$1';
$route['s3/edit/(:any)/(:any)'] = 'Structure3_Controller/edit/$1/$2';
$route['s3/delete/(:any)'] = 'Structure3_Controller/delete/$1';
$route['s3/get_direct_list/(:any)'] = 'Structure3_Controller/get_direct_list/$1';
$route['s3/get_direct_list_edit/(:any)'] = 'Structure3_Controller/get_direct_list_edit/$1';

$route['s4'] = 'Structure4_Controller';
$route['s4/(:any)'] = 'Structure4_Controller/$1';
$route['s4/list'] = 'Structure4_Controller/all_list';
$route['s4/list/(:any)'] = 'Structure4_Controller/all_list/$1';
$route['s4/add/(:any)'] = 'Structure4_Controller/add_new/$1';
$route['s4/edit/(:any)/(:any)'] = 'Structure4_Controller/edit/$1/$2';
$route['s4/delete/(:any)'] = 'Structure4_Controller/delete/$1';

$route['s5'] = 'Structure5_Controller';
$route['s5/(:any)'] = 'Structure5_Controller/$1';
$route['s5/list'] = 'Structure5_Controller/all_list';
$route['s5/list/(:any)'] = 'Structure5_Controller/all_list/$1';
$route['s5/add/(:any)'] = 'Structure5_Controller/add_new/$1';
$route['s5/edit/(:any)/(:any)'] = 'Structure5_Controller/edit/$1/$2';
$route['s5/delete/(:any)'] = 'Structure5_Controller/delete/$1';

$route['job'] = 'Job_Controller';
$route['job/(:any)'] = 'Job_Controller/$1';
$route['job/list'] = 'Job_Controller/all_list';
$route['job/list/(:any)'] = 'Job_Controller/all_list/$1';
$route['job/add/(:any)'] = 'Job_Controller/add_new/$1';
$route['job/edit/(:any)/(:any)'] = 'Job_Controller/edit/$1/$2';
$route['job/delete/(:any)'] = 'Job_Controller/delete/$1';
$route['job/get_dir_combo_edit/(:any)'] = 'Job_Controller/get_dir_combo_edit/$1';
$route['job/get_job_combo_edit/(:any)'] = 'Job_Controller/get_job_combo_edit/$1';
$route['job/get_level_combo_edit/(:any)'] = 'Job_Controller/get_level_combo_edit/$1';
$route['job/cek_job_code/(:any)'] = 'Job_Controller/cek_job_code/$1';

$route['store'] = 'Store_Controller';
$route['store/(:any)'] = 'Store_Controller/$1';
$route['store/list'] = 'Store_Controller/all_list';
$route['store/list/(:any)'] = 'Store_Controller/all_list/$1';
$route['store/add/(:any)'] = 'Store_Controller/add_new/$1';
$route['store/edit/(:any)/(:any)'] = 'Store_Controller/edit/$1/$2';
$route['store/delete/(:any)'] = 'Store_Controller/delete/$1';

$route['target'] = 'Target_Controller';
$route['target/(:any)'] = 'Target_Controller/$1';
$route['target/list'] = 'Target_Controller/all_list';
$route['target/list/(:any)'] = 'Target_Controller/all_list/$1';
$route['target/add/(:any)'] = 'Target_Controller/add_new/$1';
$route['target/edit/(:any)/(:any)'] = 'Target_Controller/edit/$1/$2';
$route['target/delete/(:any)'] = 'Target_Controller/delete/$1';