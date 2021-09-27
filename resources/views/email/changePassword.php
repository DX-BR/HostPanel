<?php
$cPanel= new App\Classes\cPanel\cPanel();
use App\Classes\TwigLoader;
use App\Classes\Messages;
if ($_SERVER['REQUEST_METHOD'] == "POST") {
    $parameters = [
        'email'           => 'arun',
        'password'        => '12345luggage@Q',
        'domain'          => $_SESSION['DomainName'],
    ];
    $result = $cPanel->execute('uapi', 'Email', 'passwd_pop', $parameters);
    if (!$result->status == 1) {
        var_export($result);
        Messages::Error("Email Account Password Can't Change : {$result->messages[0]} | {$result->errors[0]}");
        header("location: /email_manage");
        die();
    }

    Messages::Success("Email Password changed");
    header("location: /email_manage");
    die();
}
TwigLoader::load("template/model.twig" );
