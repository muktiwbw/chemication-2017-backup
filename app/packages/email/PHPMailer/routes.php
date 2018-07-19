<?php
require_once('../app/core/Route.php');

$route = new Route();

/*========================================================================================
||
||    Buat route disini!
||
||    $route->make('url', 'controller', 'controller method', 'request method');
||
||========================================================================================
*/

$route->make('/', 'HomeController', 'display_root_page', 'GET');

$route->make('/ceoindevelopment', 'HomeController', 'display_home_ceo', 'GET'); //ok

$route->make('/ec', 'HomeController', 'display_home_ec', 'GET');

// $route->make('/hsfc', 'HomeController', 'display_home_hsfc', 'GET');

/*========================================================================================
||  PERNDAFTARAN DAN AKTIVASI
||
||========================================================================================
*/

$route->make('/ceo/registrasi', 'RegistrationController', 'display_form', 'GET');

$route->make('/ceo/registrasi', 'RegistrationController', 'handle_registration', 'POST');


$route->make('/ceo/aktivasi', 'RegistrationController', 'display_activation_form', 'GET');

$route->make('/ceo/aktivasi', 'RegistrationController', 'handle_activation', 'POST');

/*========================================================================================
||  AUTENTIKASI (LOGIN)
||   - with working session feature
||========================================================================================
*/

$route->make('/ceo/login', 'AuthController', 'display_login_form', 'GET');

$route->make('/ceo/login', 'AuthController', 'handle_login', 'POST');
// 
$route->make('/ceo/logout', 'AuthController', 'handle_logout', 'GET');

/*========================================================================================
||  USER
||
||========================================================================================
*/

// $route->make('/profile', 'UserController', 'display_user_profile', 'GET');

// $route->make('/profile/edit', 'UserController', 'display_user_edit_page', 'GET');

// $route->make('/profile/edit', 'UserController', 'handle_user_edit', 'POST');


/*========================================================================================
||  PENGERJAAN
||
||========================================================================================
*/

// $route->make('/mulai/{num}', 'WorkingController', 'display_problems', 'GET');

// $route->make('/mulai/store', 'WorkingController', 'store_answer', 'POST');

// $route->make('/mulai/finish', 'WorkingController', 'store_finished_work', 'POST');

/*========================================================================================
||  ADMIN PAGES
||
||========================================================================================
*/

$route->make('/admin/portal', 'AdminController', 'display_admin_login_form', 'GET');

$route->make('/admin/portal', 'AdminController', 'handle_admin_login', 'POST');

$route->make('/admin/logout', 'AdminController', 'handle_admin_logout', 'GET');



$route->make('/admin/dashboard', 'AdminController', 'display_dashboard', 'GET');



$route->make('/admin/api/userlist', 'AdminController', 'display_user_list', 'GET');

$route->make('/admin/api/userdetail/{id}', 'AdminController', 'display_user_detail', 'GET');



// $route->make('/adminzone/user/aktivasi/{username}', 'AdminController', 'display_user_activation', 'GET');

$route->make('/admin/api/user/aktivasi/confirmed', 'AdminController', 'confirm_user_activation', 'POST');



// $route->make('/adminzone/soal', 'AdminController', 'display_problem_list', 'GET');

// $route->make('/adminzone/soal/{id}', 'AdminController', 'edit_problem', 'GET');


// $route->make('/adminzone/nilailist', 'AdminController', 'display_score_list', 'GET');