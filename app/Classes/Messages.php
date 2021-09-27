<?php


namespace App\Classes;


class Messages
{
    public static function clearMessages(){
        $_SESSION['error_message'] = null;
        $_SESSION['success_message'] = null;
    }
    public static function Error($message) {
        $_SESSION['error_message'] = $message;
    }
    public static function Success($message) {
        $_SESSION['success_message'] = $message;
    }
}