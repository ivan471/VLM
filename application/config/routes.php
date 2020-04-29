<?php
defined('BASEPATH') OR exit('No direct script access allowed');

//User
$route['login_page'] 							= 'VLM/login_page';
$route['register_page'] 					= 'VLM/register_page';
$route['sign_in']						 			= 'VLM/signin';
$route['req'] 										= 'VLM/req';
$route['upload/(:any)'] 					= 'VLM/upload/$1';
$route['logout'] 									= 'VLM/logout';
$route['profil/(:any)'] 					= 'VLM/profil/$1';
//Member
$route['members'] 								= 'Member';
$route['perubahan/(:any)'] 				= 'Member/perubahan/$1';
//Pemberitahuan
$route['sembahyang'] 							= 'Sembahyang';
$route['simpan_pemberitahuan'] 		= 'Sembahyang/tambah';
$route['delete_sembayang/(:any)'] = 'Sembahyang/delete/$1';
//Event
$route['event'] 									= 'Event';
$route['hapus/(:any)'] 						= 'Event/hapus/$1';
$route['edit/(:any)'] 						= 'Event/editevent/$1';
$route['edit_event/(:any)'] 			= 'Event/edit/$1';
$route['simpan'] 									= 'Event/gambar';
//Admin
$route['list_admin'] 							= 'Admin';
$route['add_admin'] 							= 'Admin/add_admin';
$route['proses_send'] 						= 'Admin/send';
//Belajar
$route['belajar'] 								= 'Belajar';
$route['download_file/(:any)'] 				= 'Belajar/download/$1';
$route['save'] 										= 'Belajar/save';
// $route['hapus/(:any)'] 						= 'Event/hapus/$1';
// $route['edit/(:any)'] 						= 'Event/editevent/$1';
// $route['edit_event/(:any)'] 			= 'Event/edit/$1';

$route['default_controller'] 			= 'VLM';
$route['404_override'] 						= '';
$route['translate_uri_dashes'] 		= FALSE;
