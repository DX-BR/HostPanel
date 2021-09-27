<?php

$router->map('GET', '/dashboard', 'App\Controllers\Controller@dashboard', 'dashboard');
//Domain
$router->map('GET', '/subdomain', 'App\Controllers\Controller@subdomainview', 'subdomainview');
$router->map('POST', '/subdomain/manage', 'App\Controllers\Controller@subdomain_manage', 'subdomainmanage');
//Email
$router->map('GET', '/email', 'App\Controllers\Controller@email_view', 'emailview');
$router->map('POST', '/email/manage', 'App\Controllers\Controller@email_manage', 'emailmanage');
//Database
$router->map('GET', '/db', 'App\Controllers\Controller@db_view', 'dbview');
$router->map('POST', '/db/manage', 'App\Controllers\Controller@manage_db', 'db_manage');
//Ftp
$router->map('GET', '/ftp', 'App\Controllers\Controller@ftp_view', 'ftpview');
$router->map('POST', '/ftp/manage','App\Controllers\Controller@ftp_manage', 'ftpmanage');
//temp
$router->map('GET', '/secure','App\Controllers\Controller@secure', 'seccheck');
