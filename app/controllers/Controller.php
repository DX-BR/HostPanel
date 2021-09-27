<?php
namespace App\Controllers;
use App\Classes\File;
require_once "securitycheck.php";
class Controller
{
    public static function index(){
        if(securitycheck::secure()){
            include_once File::view('dashboard.php');
        }
        else{
            header("location: /login");
            die();
        }
    }
    public static function logout(){
       if(securitycheck::secure()){
           securitycheck::logot();
           header("location: /login");
           die();
       }
       else{
           header("location: /login");
           die();
       }
    }
    public function register(){
        header("location: /login");
        $_SESSION['error_message'] = "Contact Administrator for Registration";
        die();
    }
    public  function mainstyle(){
        header("Content-Type: text/css");
        include_once File::assets('/dist/style.css');
    }
    public function mainscript(){
        header("Content-Type: application/javascript");
        include_once File::assets('/dist/script.js');
    }
    public function bootstrapcss(){
        header("Content-Type: text/css");
        include_once File::bower('/bootstrap/dist/css/bootstrap.min.css');
    }
    public function fontawesome(){
        header("Content-Type: text/css");
        include_once File::bower('/fontawesome/css/fontawesome.css');
    }
    public function bootstrapjs(){
        header("Content-Type: application/javascript");
        include_once File::bower('/bootstrap/dist/css/bootstrap.min.js');
    }
    public function jquery(){
        header("Content-Type: application/javascript");
        include_once File::bower('/jquery/dist/jquery.min.js');
    }
    public function zillaslab(){
        header("Content-Type: application/octet-stream");
        include_once File::assets('fonts/zillaslab.ttf');
    }
    public function login(){
        include_once File::view('login.php');
    }
    public function dashboard(){
        if(securitycheck::secure()){
            include_once File::view('dashboard.php');
        }
        else{
            header("location: /login");
            die();
        }}
    public function subdomainview()
    {
        if(securitycheck::secure()){
            include_once File::view('domain/subdomain.php');
        }
        else{
            header("location: /login");
            die();
        }}
    public function subdomain_manage()
    {
        if(securitycheck::secure()){
            include_once File::view('domain/manage_subdomain.php');
        }
        else{
            header("location: /login");
            die();
        }}
    //EMAIL
    public function email_manage()
    {
        if(securitycheck::secure()){
            include_once File::view('email/manage_email.php');
        }
        else {
            header("location: /login");
            die();}}
    public function email_view()
    {
        if(securitycheck::secure()){
            include_once File::view('email/email.php');
        }
        else {
            header("location: /login");
            die();
        }}
    //DB
    public function db_view()
    {
        if(securitycheck::secure()){
            include_once File::view('database/db.php');
        }
        else {
            header("location: /login");
            die();
        }}
    public function manage_db()
    {
        if(securitycheck::secure()){
            include_once File::view('database/manage_db.php');
        }
        else {
            header("location: /login");
            die();
        }}
    //FTP
    public function ftp_view(){
        if(securitycheck::secure()){
            include_once File::view('file/ftp.php');
        }
        else {
            header("location: /login");
            die();
        }}
    public function ftp_manage(){
        if(securitycheck::secure()){
            include_once File::view('file/ftp_manage.php');
        }
        else {
            header("location: /login");
            die();
        }}

}