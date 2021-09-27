<?php

namespace App\Core;

use AltoRouter;
use App\Classes\TwigLoader;
class Router
{

    protected static $match;

    public static function to(AltoRouter $router)
    {
        self::$match = $router->match();
        if (self::$match == false) {
            header($_SERVER['SERVER_PROTOCOL'].'404 Not Found');
            TwigLoader::load("error/404.twig");
            exit;
        }
        self::$match["params"] = (!empty(self::$match["params"])) ? self::$match["params"] : [];
        self::handleCommingRequest();
    }

    private static function handleCommingRequest()
    {
        list($controller, $method) = explode("@", self::$match["target"]);
        $dispatcher = new $controller();
        call_user_func([$dispatcher, $method], self::$match["params"]);
    }

}