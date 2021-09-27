<?php
use App\Classes\TwigLoader;
$cPanel= new App\Classes\cPanel\cPanel();
use App\Classes\Messages;
if ($_SERVER['REQUEST_METHOD'] == "POST") {
    $parameters = [
        'user' => $_POST['user_name'],
        'pass' => $_POST['pass'],
        'domain' => $_SESSION['DomainName'],
        'quota' => '500',
    ];
    $result = $cPanel->execute('uapi', "Ftp", "add_ftp", $parameters);
    if (!$result->status == 1) {
        Messages::Error("Cannot Create Ftp User Account  : {$result->messages[0]} | {$result->errors[0]}");
        header("location: /ftp");
        die();
    }else {
        Messages::Success("Ftp User account creation successful");
        header("location: /ftp");
        die();
    }
}
else {
    TwigLoader::load("file/create.twig");
    $result = $cPanel->execute('uapi', 'Ftp', 'list_ftp');
    if (!$result->status == 1) {
        Messages::Error("Cannot fetch FTP Users list : {$result->messages[0]} | {$result->errors[0]}");
        header("location: /");
        die();
    }
    $ftp_user[0]="Not Available";
    $ite = 0;
    $result2 = $result->data;
     foreach ($result2 as $s) {
        $e = $s->user;
        $domain_ftp = substr(strrev($e), 0, strrpos(strrev($e), "@"));
        if (strrev(($domain_ftp)) === $_SESSION['DomainName']) {
            $ftp_user[$ite] = $e;
            $ite = $ite + 1;
        }
    }
     TwigLoader::load("file/list.twig", ['result' => $ftp_user]);
     TwigLoader::load("file/changepassword.twig");
     Messages::clearMessages();
    die();
}