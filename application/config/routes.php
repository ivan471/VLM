<?php
defined('BASEPATH') OR exit('No direct script access allowed');

$route['sembahyang'] = 'Sembahyang';
$route['event'] = 'Event';
$route['login_page'] = 'VLM/login_page';
$route['register_page'] = 'VLM/register_page';
$route['sign_in'] = 'VLM/signin';
$route['req'] = 'VLM/req';
$route['upload/(:any)'] = 'VLM/upload/$1';
$route['logout'] = 'VLM/logout';
$route['member'] = 'Member';
$route['add_admin'] = 'Admin/add_admin';
$route['send'] = 'Admin/kirim';
$route['members'] = 'Admin/members';
$route['profil/(:any)'] = 'VLM/profil/$1';
$route['perubahan/(:any)'] = 'Admin/perubahan/$1';
$route['simpan'] = 'Event/gambar';
$route['simpan_pemberitahuan'] = 'Sembahyang/tambah';
$route['hapus/(:any)'] = 'Event/hapus/$1';
$route['edit/(:any)'] = 'Event/editevent/$1';
$route['edit_event/(:any)'] = 'Event/edit/$1';

$route['default_controller'] = 'VLM';
$route['404_override'] = '';
$route['translate_uri_dashes'] = FALSE;
