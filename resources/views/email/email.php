<?php
use  App\Classes\TwigLoader;
use App\Classes\Messages;
$cPanel= new App\Classes\cPanel\cPanel();
$domain_name = [
    'domain' => $_SESSION['DomainName'],
];
TwigLoader::load("email/addemail.twig",['result' => $domain_name]);
    $result = $cPanel->execute('uapi', 'Email', 'list_pops');
    if (!$result->status == 1) {
        Messages::Error("Cannot fetch Email list : {$result->messages[0]} | {$result->errors[0]}");
        header("location: /");
        die();
    }
    $email_user[0]="Not Available";
    $domain_Email = " NOT AVAILABLE";
    $ite = 0;
    $result2 = $result->data;
    foreach ($result2 as $s) {
        $e = $s->email;
        $domain_Email = substr(strrev($e), 0, strrpos(strrev($e), "@"));;
        if (strrev(($domain_Email)) === $_SESSION['DomainName']) {
            $email_user[$ite] = $e;
            $ite = $ite + 1;
        }
    }
    TwigLoader::load("email/list.twig", ['result' => $email_user]);
    TwigLoader::load("email/changepassword.twig" );
    TwigLoader::load("email/forward.twig" );
    Messages::clearMessages();
    die();
