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

$route->make('/ceo', 'HomeController', 'display_home_ceo', 'GET'); //ok

$route->make('/ceo/jadwal-pelaksanaan', 'HomeController', 'display_jadwal_pelaksanaan', 'GET'); //ok

$route->make('/ceo/mekanisme-pendaftaran', 'HomeController', 'display_mekanisme_pendaftaran', 'GET'); //ok

$route->make('/ceo/faq', 'HomeController', 'display_faq', 'GET'); //ok

$route->make('/ec', 'HomeController', 'display_home_ec', 'GET');

$route->make('/ec/lolos-abstrak', 'HomeController', 'display_ec_lolos_abstrak', 'GET');

$route->make('/ec/finalis', 'HomeController', 'display_ec_finalis', 'GET');

$route->make('/hsfc', 'HomeController', 'display_home_hsfc', 'GET');

/*========================================================================================
||  PERNDAFTARAN DAN AKTIVASI
||
||========================================================================================
*/

$route->make('/ceo/registrasi', 'RegistrationController', 'display_form', 'GET');

$route->make('/ceo/registrasi', 'RegistrationController', 'handle_registration', 'POST');

$route->make('/ceo/registrasi/verifikasi/{id}/{verification_token}', 'RegistrationController', 'email_verification', 'GET');


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

$route->make('/ceo/profile', 'UserController', 'display_user_profile', 'GET');

$route->make('/ceo/profile', 'UserController', 'store_user_profile', 'POST');

$route->make('/ceo/user/bukti_lolos/{user_id}', 'AdminController', 'bukti_lolos', 'GET');

// $route->make('/profile/edit', 'UserController', 'display_user_edit_page', 'GET');

// $route->make('/profile/edit', 'UserController', 'handle_user_edit', 'POST');


/*========================================================================================
||  PENGERJAAN
||
||========================================================================================
*/

$route->make('/ceo/mekanisme-pengerjaan', 'WorkingController', 'display_rules', 'GET');

$route->make('/ceo/mobile-warning', 'WorkingController', 'display_mobile_warning', 'GET');

$route->make('/ceo/mulai', 'WorkingController', 'display_workspace', 'GET');

$route->make('/ceo/mulai/api/store', 'WorkingController', 'store_lembar_jawab', 'POST');

$route->make('/ceo/mulai/api/nullify', 'WorkingController', 'nullify_lembar_jawab', 'POST');

$route->make('/ceo/mulai/api/soal/{paket}/{nomor}', 'WorkingController', 'get_soal', 'GET');

$route->make('/ceo/mulai/api/finish', 'WorkingController', 'finish', 'POST');

$route->make('/ceo/api/get_soal_detail/{id}', 'WorkingController', 'get_soal_detail', 'GET');

$route->make('/ceo/finish_page', 'WorkingController', 'display_finish_page', 'GET');

// $route->make('/mulai/finish', 'WorkingController', 'store_finished_work', 'POST');

/*========================================================================================
||  ADMIN PAGES
||
||========================================================================================
*/

$route->make('/admin/ceo/portal', 'AdminController', 'display_admin_login_form', 'GET');

$route->make('/admin/ceo/portal', 'AdminController', 'handle_admin_login', 'POST');

$route->make('/admin/ceo/logout', 'AdminController', 'handle_admin_logout', 'GET');



$route->make('/admin/ceo/dashboard', 'AdminController', 'display_dashboard', 'GET');



$route->make('/admin/ceo/api/userlist/{offset}/{amount}/{filter}', 'AdminController', 'display_user_list', 'GET');

$route->make('/admin/ceo/api/lembar_kerja_list/{type}/{order}/{order_type}', 'AdminController', 'display_lembar_kerja_list', 'GET');

$route->make('/admin/ceo/api/userdetail/{id}', 'AdminController', 'display_user_detail', 'GET');



// $route->make('/adminzone/user/aktivasi/{username}', 'AdminController', 'display_user_activation', 'GET');

$route->make('/admin/ceo/api/user/aktivasi/confirmed', 'AdminController', 'confirm_user_activation', 'POST');

$route->make('/admin/ceo/api/user/registrasi/confirmed', 'AdminController', 'confirm_user_registration', 'POST');

$route->make('/admin/ceo/api/user/reset/confirmed', 'AdminController', 'reset_user_status', 'POST');

$route->make('/admin/ceo/api/user/delete/confirmed', 'AdminController', 'delete_user', 'POST');

/////////////////////////////////////////////////////////////////////////////////////////////

$route->make('/admin/ceo/api/soal/list/{paket}', 'AdminController', 'list_soal', 'GET');

$route->make('/admin/ceo/soal/edit/{paket}/{nomor}', 'AdminController', 'edit_soal', 'GET');

$route->make('/admin/ceo/soal/update', 'AdminController', 'update_soal', 'POST');

$route->make('/admin/ceo/soal/nullify/{type}/{id}', 'AdminController', 'nullify_soal', 'GET');

$route->make('/admin/ceo/soal/generate/{type}', 'AdminController', 'generate_soal', 'GET');

$route->make('/admin/ceo/soal/generate_paket', 'AdminController', 'generate_paket_penyisihan', 'GET');

$route->make('/admin/ceo/soal/rollback_generate_paket', 'AdminController', 'rollback_generate_paket_penyisihan', 'GET');

$route->make('/admin/ceo/api/make_tester', 'AdminController', 'make_tester', 'POST');

$route->make('/admin/ceo/add_lembar_kerja_tryout', 'AdminController', 'add_lk_to', 'GET');

$route->make('/admin/ceo/create_tester/{qnt}', 'AdminController', 'create_tester', 'GET');

$route->make('/admin/ceo/tester/delete/{id}', 'AdminController', 'delete_tester', 'GET');

$route->make('/admin/ceo/update_sesi', 'AdminController', 'update_sesi', 'GET');

$route->make('/admin/ceo/rollback_lembar_kerja/{id}/{paket_id}/{status}', 'AdminController', 'rollback_lembar_kerja', 'GET');

$route->make('/admin/ceo/view_lembar_kerja/{id}/{paket}', 'AdminController', 'view_lembar_kerja', 'GET');


////////////////////// TESTING PURPOSE //////////////////

$route->make('/ceo/testing/isi_soal_penyisihan', 'AdminController', 'isi_soal_penyisihan', 'GET');


// $route->make('/adminzone/soal', 'AdminController', 'display_problem_list', 'GET');

// $route->make('/adminzone/soal/{id}', 'AdminController', 'edit_problem', 'GET');


// $route->make('/adminzone/nilailist', 'AdminController', 'display_score_list', 'GET');
