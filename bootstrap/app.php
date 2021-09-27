<?php
require_once BASE_URL . DS . "vendor" . DS . "autoload.php";
ini_set('session.cookie_httponly', 1);
if (!session_start()) session_start();

require_once BASE_URL . DS . "app" . DS . "config" . DS . "config.php";
require_once BASE_URL . DS . "app" . DS . "routes" . DS . "Main_Routes.php";

use App\Core\Router;
Router::to($router);