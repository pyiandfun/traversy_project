<?php
defined('BASEPATH') OR exit('No direct script access allowed');
$route['categories/create'] = 'categories/create';
$route['posts/update'] = 'posts/update';
$route['users/register'] = 'users/register';
$route['users/login'] = 'users/login';
$route['posts/create'] = 'posts/create';
$route['posts/(:any)'] = 'posts/view/$1';
$route['categories/posts/(:any)'] = 'categories/posts/$1';
$route['posts'] = 'posts/index';
$route['posts'] = 'posts/index';
$route['categories'] = 'categories/index';
$route['(:any)'] = 'pages/index/$1';
$route['default_controller'] = 'welcome';
$route['404_override'] = '';
$route['translate_uri_dashes'] = FALSE;
