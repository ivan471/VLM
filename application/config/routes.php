<?php
defined('BASEPATH') OR exit('No direct script access allowed');

//User
$route['login_page'] 							= 'VLM/login_page';
$route['lupa-password-page'] 					= 'VLM/lupa_password';
$route['change-password-page/(:any)'] 					= 'VLM/change_password/$1';
$route['get_link'] 								= 'VLM/send';
$route['register_page'] 					= 'VLM/register_page';
$route['sign_in']						 			= 'VLM/signin';
$route['req'] 										= 'VLM/req';
$route['upload/(:any)'] 					= 'VLM/upload/$1';
$route['logout'] 									= 'VLM/logout';
$route['profil/(:any)'] 					= 'VLM/profil/$1';
//Member
$route['members'] 								= 'Member';
$route['change/(:any)'] 					= 'Member/simpan/$1';
$route['ubah_status/(:any)'] 			= 'Member/ubah/$1';
//Pemberitahuan
$route['sembahyang'] 							= 'Sembahyang';
$route['simpan_pemberitahuan'] 		= 'Sembahyang/tambah';
$route['delete_sembayang/(:any)'] = 'Sembahyang/delete/$1';
//Event
$route['event'] 									= 'Event';
$route['add_event'] 							= 'Event/add_event';
$route['hapus/(:any)'] 						= 'Event/hapus/$1';
$route['edit/(:any)'] 						= 'Event/editevent/$1';
$route['edit_event/(:any)'] 			= 'Event/edit/$1';
$route['simpan'] 									= 'Event/gambar';
$route['detail/(:any)'] 					= 'Event/detail/$1';
//Admin
$route['list_admin'] 							= 'Admin';
$route['proses_send'] 						= 'Admin/save/$1';
$route['ubah/(:any)'] 						= 'Admin/ubah/$1';
//Belajar
$route['belajar'] 								= 'Belajar';
$route['download_file/(:any)'] 		= 'Belajar/download/$1';
$route['save'] 										= 'Belajar/save';
$route['delete_file/(:any)'] 			= 'Belajar/delete_file/$1';

$route['default_controller'] 			= 'VLM';
$route['404_override'] 						= '';
$route['translate_uri_dashes'] 		= FALSE;
