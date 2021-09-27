<?php


namespace App\Classes;


class DataBase
{
    public static function connect(){ // Change Database Connections
        $host = 'DB.Host'; // Change Database host in DB.Host
        $user = 'DB.User'; // Change Database user in DB.User
        $pass = 'DB.Password';// Change password host in DB.Password
        $db = 'DB.Name';// Change Database Name in DB.Name
        $connection = mysqli_connect($host,$user,$pass,$db);
        return $connection;
    }
}