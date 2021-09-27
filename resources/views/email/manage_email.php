<?php
$cPanel= new App\Classes\cPanel\cPanel();
use App\Classes\Messages;
if ($_SERVER['REQUEST_METHOD'] == "POST") {
    function  addemail($cPanel,$email,$pass,$domain,$quota) {
        $parameters = [
            'email' => $email,
            'password' => $pass,
            'domain' => $domain,
            'quota' => $quota,
        ];
        $result = $cPanel->execute('uapi', "Email", "add_pop", $parameters);
        if (!$result->status == 1) {
            Messages::Error("Cannot fetch domains list : {$result->messages[0]} | {$result->errors[0]}");
            header("location: /email");
            die();
        }else {
            Messages::Success("Email account creation successful");
            header("location: /email");
            die();
        }
    }
    function changepass($cPanel,$user,$domain,$pass){
        $parameters = [
            'email' => $user,
            'domain' => $domain,
            'password' => $pass,
        ];
        $result = $cPanel->execute('uapi', 'Email', 'passwd_pop', $parameters);
        if (!$result->status == 1) {
            Messages::Error("Cannot Change Password for Email account : {$result->messages[0]} | {$result->errors[0]}");
            header("location: /email");
            die();
        }
        Messages::Success("Email account password changed successfully");
            header("location: /email");
            die();
    }
    function deleteemail($cPanel,$user,$domain) {
        $parameters = [
            'email' => $user,
            'domain' => $domain,
        ];
        $result = $cPanel->execute('uapi', 'Email', 'delete_pop', $parameters);
        if (!$result->status == 1) {
            Messages::Error("Cannot Delete Email account : {$result->messages[0]} | {$result->errors[0]}");
            header("location: /");
            die();
        }
        Messages::Success("Email account deletion successful");
        header("location: /email");
        die();
    }
     function fwdemail($cPanel,$domain,$email,$fwdmail) {
        $parameters = [
            'domain' => $domain,
            'email' => $email,
            'fwdopt' => 'fwd',
            'fwdemail' => $fwdmail,
        ];
        $result = $cPanel->execute('uapi', 'Email', 'add_forwarder', $parameters);
        if (!$result->status == 1) {
            Messages::Error("Cannot forward Email account : {$result->messages[0]} | {$result->errors[0]}");
            header("location: /email");
            die();
        } else {
            Messages::Success("Email account successfully forwarded");
            header("location: /email");
            die();
        }
    }
    if (isset($_POST['addemail'])) $action="add";
    if (isset($_POST['change_password'])) $action="changepass";
    if(isset($_POST['delete'])) $action="delete";
    if(isset($_POST['Forward'])) $action="forward";
    switch ($action){
        case 'add':
            if (isset($_POST['name']) && isset($_POST['pass'])) {
                $email = \App\Classes\DataCheck::check($_POST['name'], 'escape');
                $pass = \App\Classes\DataCheck::check($_POST['pass'], 'escape');
                $domain = $_SESSION['DomainName'];
                $quota = '500';
                addemail($cPanel, $email, $pass, $domain, $quota);
            }else header("location: /email");
            break;
        case 'changepass':
            if (isset($_POST['email']) && isset($_POST['pass'])) {
                $email = \App\Classes\DataCheck::check($_POST['email'], 'escape');
                $pass = \App\Classes\DataCheck::check($_POST['pass'], 'escape');
                $user = explode("@", $email)[0];
                $domain=$_SESSION['DomainName'];
                //$domain = explode("@", $email)[1];
                changepass($cPanel,$user,$domain,$pass);
            }else header("location: /email");
            break;
        case 'delete':
            $email = \App\Classes\DataCheck::check($_POST['delete'],'escape');
            $user =explode("@", $email)[0];
            $domain=explode("@", $email)[1];
            deleteemail($cPanel,$user,$domain);
            break;
        case 'forward':
            if (isset($_POST['email']) && $_POST['fwdemail']) {
                $domain = $_SESSION['DomainName'];
                $email = \App\Classes\DataCheck::check($_POST['email'], 'escape');
                $fwdmail = \App\Classes\DataCheck::check($_POST['fwdemail'], 'escape');

                fwdemail($cPanel,$domain,$email,$fwdmail);
            }else header("location: /email");
            break;
        default:
            header("location: /email");
            break;
    }
}