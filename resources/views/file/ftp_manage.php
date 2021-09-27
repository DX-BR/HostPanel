<?php
use App\Classes\TwigLoader;
use App\Classes\Messages;
$cPanel= new App\Classes\cPanel\cPanel();
if ($_SERVER['REQUEST_METHOD'] == "POST") {
    function adduser($cPanel,$user,$pass,$quota,$domain){
        $parameters = [
            'user'    => $user,
            'pass'    => $pass,
            'quota'   => $quota,
            'domain'  => $domain
        ];
        $result = $cPanel->execute('uapi', "Ftp", "add_ftp", $parameters);
                if (!$result->status == 1) {
                    Messages::Error("Cannot fetch Ftp Users list : {$result->messages[0]} | {$result->errors[0]}");
                    header("location: /ftp");
                    die();
        }else {
            Messages::Success("Ftp User account creation successful");
            header("location: /ftp");
            die();
        }
    }
    function removeuser($cPanel,$user,$domain) {
        $parameters = [
            'user' => $user,
            'destroy'   => '1',
            'domain'  => $domain
        ];
        $result = $cPanel->execute('uapi', "Ftp", "delete_ftp", $parameters);
        if (!$result->status == 1) {
            Messages::Error("Cannot Remove user Account : {$result->messages[0]} | {$result->errors[0]}");
            header("location: /ftp");
            die();
        }else {
            Messages::Success("Ftp User account Deletion successful");
            header("location: /ftp");
            die();
        }
    }
    function changepass($cPanel,$user,$pass){
        $parameters = [
            'user'    => $user,
            'pass'    => $pass,
        ];
        $result = $cPanel->execute('uapi', "Ftp", "passwd", $parameters);
        if (!$result->status == 1) {
            Messages::Error("Cannot users password : {$result->messages[0]} | {$result->errors[0]}");
            header("location: /ftp");
            die();
        }else {
            Messages::Success("Ftp User password changed Sucessfully");
            header("location: /ftp");
            die();
        }
    }
    if(isset($_POST['adduser'])) $action ="adduser";
    if (isset($_POST['removeuser'])) $action="remove";
    if (isset($_POST['change_user_password'])) $action ="changepass";
    $cPanel = new \App\Classes\cPanel\cPanel();
    switch ($action){
        case 'adduser':
            if (isset($_POST['user_name']) && $_POST['password']) {
                $user = \App\Classes\DataCheck::check($_POST['user_name'], 'escape');
                $pass = \App\Classes\DataCheck::check($_POST['password'], 'escape');
                $quota = "5000";
                $domain = $_SESSION['DomainName'];
                adduser($cPanel,$user,$pass,$quota,$domain);
            }else header("location: /ftp");
            break;
        case 'remove':
            $user =\App\Classes\DataCheck::check($_POST['removeuser'],'escape');
            $user =explode("@", $user)[0];
            $domain =$_SESSION['DomainName'];
            removeuser($cPanel,$user,$domain);
            break;
        case 'changepass':
            if(isset($_POST['user']) && isset($_POST['pass'])) {
                $user = \App\Classes\DataCheck::check($_POST['user'], 'escape');
                $pass = \App\Classes\DataCheck::check($_POST['pass'], 'escape');
                changepass($cPanel,$user,$pass);
            }else header("location: /ftp");
            break;
        default:
            header("location: /ftp");
    }
}