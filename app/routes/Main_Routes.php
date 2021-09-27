<?php

$router = new AltoRouter();

$router->map('GET', '/', 'App\Controllers\Controller@index', 'home');
$router->map('POST', '/', 'App\Controllers\Controller@index', 'home2');
$router->map('GET', '/mainstyle', 'App\Controllers\Controller@mainstyle', 'style');

$router->map('GET', '/jquery', 'App\Controllers\Controller@jquery', 'jquery');
$router->map('GET', '/mainscript', 'App\Controllers\Controller@mainscript', 'script');
$router->map('GET', '/bootstrapcss', 'App\Controllers\Controller@bootstrapcss', 'bootstrapcss');
$router->map('GET', '/fontawesome', 'App\Controllers\Controller@fontawesome', 'fontawesome');
$router->map('GET', '/bootstrapjs', 'App\Controllers\Controller@bootstrapjs', 'bootstrapjs');
$router->map('GET', '/zillaslab', 'App\Controllers\Controller@zillaslab', 'zillaslab');
$router->map('GET', '/login', 'App\Controllers\Controller@login', 'login');
$router->map('POST', '/login','App\Controllers\Controller@login', 'loginreq');
$router->map('GET', '/logout','App\Controllers\Controller@logout', 'logout');
$router->map('GET', '/register','App\Controllers\Controller@register', 'register');

require_once __DIR__.DS."domain_routes.php";


