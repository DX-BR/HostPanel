<?php


namespace App\Classes;
use Twig;
class TwigLoader
{
public static function load($file,$parameter=[]){
    $loader = new Twig\Loader\FilesystemLoader(BASE_URL.DS."resources".DS."views".DS."Layouts");
    $cache = BASE_URL.DS."bootstrap".DS."cache";
    $twig = new Twig\Environment($loader,['cache' =>$cache]);
    if (isset($_SESSION['error_message'])) {
        $twig->addGlobal('error_message', $_SESSION['error_message']);
    }
    if (isset($_SESSION['success_message'])) {
        $twig->addGlobal('success_message', $_SESSION['success_message']);
    }
    $twig->display($file,$parameter);
}
}