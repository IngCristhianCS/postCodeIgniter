<?php
defined('BASEPATH') OR exit('No direct script access allowed');

$route['default_controller'] = 'login';
$route['404_override'] = '';
$route['translate_uri_dashes'] = FALSE;
$route['nuevo'] = 'post/create';
$route['posts'] = 'post/index';
$route['eliminar/(:num)']= 'post/destroy/$1';
$route['actualizar/(:num)']='post/edit/$1';
$route['cargar'] = 'post/all';
$route['salir'] = 'login/destroy';
$route['registrar'] = 'login/register';