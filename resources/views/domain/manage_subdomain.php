<?php
use App\Classes\Messages;
$cPanel= new App\Classes\cPanel\cPanel();
if ($_SERVER['REQUEST_METHOD'] == 'POST') {

   function create($cPanel,$domain,$rootdomain) {
        $parameters = [
            'domain' => $domain,
            'rootdomain' => $rootdomain,
            'disallowdot' => 1,
        ];
        $result = $cPanel->execute('api2',"SubDomain", "addsubdomain" , $parameters);
        if (isset($result->cpanelresult->error)) {
            Messages::Error("Cannot add sub domain : {$result->cpanelresult->error} ");
            header("location: /subdomain");
            die();
        }
       Messages::Success("Sub domain added successfully");
        header("location: /subdomain");
        die();
    }

     function remove($cPanel,$sub){
        $parameters = [
            'domain' => $sub
        ];
        $result = $cPanel->execute('api2', 'SubDomain', 'delsubdomain', $parameters);

        if (isset($result->cpanelresult->error)) {
            Messages::Error($parameters['domain'] . "  is Not A Sub Domain ");
            header("location: /subdomain");
            die();
        }
         Messages::Success("Sub domain Deleted successfully");
        header("location: /subdomain");
        die();
    }
    $cPanel = new \App\Classes\cPanel\cPanel();
    if (isset($_POST['addsubdomain'])) $action="add";
    if (isset($_POST['remove'])) $action="remove";
    switch ($action){
        case 'add':
            if(isset($_POST['domain'])) {
                $sub = \App\Classes\DataCheck::check($_POST['domain'], 'escape');
                $rootdomain = $_SESSION['DomainName'];
                create($cPanel, $sub, $rootdomain);
            }else header("location: /subdomain");
            break;
        case 'remove':
            $sub= \App\Classes\DataCheck::check( $_POST['remove'],'escape');
            remove($cPanel,$sub);
            break;
        default:
            header("location: /subdomain");
            die();
    }
}