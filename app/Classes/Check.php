<?php
namespace App\Classes;
class Check{
    public static function token($string,$action)
    {
        if ($action === "generate") {
            $encrypted_string = self::put($string);
            return $encrypted_string;
        } elseif ($action === "get") {
            $decrypted_string = self::get($string);
            return $decrypted_string;
        }
        elseif ($action==="check"){

        }
    }
    private static function ip(){
        require_once 'IpGet.php';
        $ip = IpGet::get_ip_address();
        return $ip;
    }
    private static function put($string){
        require_once 'TokenGen.php';
        $ip=self::ip();
        $encrypted_string = TokenGen::enc($string, $ip);
        return $encrypted_string;
    }
    private static function get($encrypted_string){
        require_once 'TokenGen.php';
        $ip= self::ip();
        $decrypted_string = TokenGen::dec($encrypted_string, $ip);
        return $decrypted_string;
    }
    private static function check(){

    }
}
