<?php
defined('BASEPATH') OR exit('No direct script access allowed');

$route['default_controller'] = 'resep';
$route['404_override'] = '';
$route['translate_uri_dashes'] = FALSE;


$route['resep'] = 'resep/index';
$route['resep/cetak/(:num)'] = 'resep/cetak/$1';
$route['resep/rekap'] = 'resep/rekap';
