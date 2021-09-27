<?php

$cPanel= new App\Classes\cPanel\cPanel();
use App\Classes\TwigLoader;
use App\Classes\Messages;
$domain_name = [
    'domain' => $_SESSION['DomainName'],
];
TwigLoader::load('domain/addsub.twig',['result' => $domain_name]);
$cPanel = new \App\Classes\cPanel\cPanel();
$result = $cPanel->execute('uapi', 'DomainInfo', 'list_domains');
if (!$result->status == 1) {
}
else {
    $result2 = $result->data;
    $result3 = $result2->sub_domains;
    $ite = 0;
    $subdomain[0]="Not Available";
    foreach ($result3 as $s) {
        $domain_name = substr(strrev($s), 0, strrpos(strrev($s), "."));
        if (strrev(($domain_name)) === $_SESSION['DomainName']) {
            $subdomain[$ite] = $s;
            $ite = $ite + 1;
        }
    }
    TwigLoader::load('domain/list.twig', ['result' => $subdomain]);
    Messages::clearMessages();
    die();
}