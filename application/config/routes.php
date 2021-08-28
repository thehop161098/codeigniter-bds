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
$route['default_controller'] = 'home';
$route['404_override'] = '';
$route['translate_uri_dashes'] = FALSE;
$route['404'] = 'home/page404';

//Admin
$route['(otadmin/login).html'] = "otadmin/auth/login/";
$route['(otadmin/dashboard|otadmin)'] = "otadmin/system/index";
$route['(otadmin/logout).html'] = "otadmin/auth/logout/";
//Frontend
//
$route['(tim-kiem).html']="route/search/$1";
$route['(tim-kiem-bds).html']="route/searchBDS/$1";
$route['(tim-kiem-project).html']="route/searchProject/$1";
// $route['(tim-kiem).html/page/(:num)']="route/search/$2";
$route['(lien-he).html']= "contact/index";

// Đăng nhập - đăng ký
$route['(kich-hoat).html']="auth/signupActive";
$route['(kich-hoat-thanh-cong).html']="auth/signupActived";
$route['(tai-khoan).html']="auth/infoUser";
$route['(doi-mat-khau).html']="auth/changPass";
$route['(dang-xuat).html']="auth/signout";
//Đăng tin
$route['(danh-sach-dang-tin).html']="newsLandUser/index";
$route['(dang-tin).html']="newsLandUser/newsPost";
$route['(dang-tin-cap-nhat/(:num))']= "newsLandUser/editPost/$2";
$route['(tin-bds-user/(:num))']= "newsLandUser/categoryUser/$2";


////////
$route['(tags)/(:any)']="route/tags/$2";

$route['(:any)']="route/index/$1";
$route['(:any).html/page/(:num)']="route/index/$1/$2";

$route['(:any)/tai/(:any)']="route/cateAtCity/$1/$2";

