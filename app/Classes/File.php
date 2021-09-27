<?php


namespace App\Classes;


class File
{
    public static function view($path){
        if(isset($path)) return BASE_URL.DS."resources".DS."views".DS.$path;
    }
    public static function assets($path){
        return BASE_URL.DS."resources".DS."assets".DS.$path;
    }
    public static function bower($path){
        return BASE_URL.DS."resources".DS."assets".DS."bower".DS.$path;
    }
}