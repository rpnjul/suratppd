<?php
defined('BASEPATH') OR exit('No direct script access allowed');

$route['default_controller'] = 'Welcome';
$route['daftar'] = 'Pegawai/daftar_admin';
$route['login'] = 'Pegawai/login';
$route['register/head-office'] = 'Pegawai/daftar_kepala_kantor';
$route['logout'] = 'Pegawai/logout';
$route['forgot'] = 'Pegawai/lupa_sandi';
$route['profile'] = 'Pegawai/profile';
$route['dash'] = 'Dashboard';
$route['pgw'] = 'Pegawai';
$route['nota'] = 'Nota_dinas';
$route['permohonan/post']['post'] = "permohonan/upload";
$route['permohonan/add'] = "permohonan/add";
//$route['permohonan/add'] = 'permohonan/add'; //form
$route['image-upload'] = 'ImageUpload';
$route['image-upload/post']['post'] = "ImageUpload/uploadImage";
$route['404_override'] = '';
$route['translate_uri_dashes'] = FALSE;
