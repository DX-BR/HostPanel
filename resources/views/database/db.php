<?php
use App\Classes\TwigLoader;
use App\Classes\Messages;
TwigLoader::load("database/create.twig");
$cPanel= new App\Classes\cPanel\cPanel();
$result = $cPanel->execute("uapi", "Mysql", "list_databases");
if (!$result->status == 1) {
    Messages::Error("Cannot list database :{$result->messages[0]} | {$result->errors[0]}");
 //var_dump($result);
    header("location: /");
    die();
}else {
    $ite = 0;
    $database[0] = "Not Available";
    if (!$result->status == 1) {
    } else {
        $result2 = $result->data;
        foreach ($result2 as $sar1) {
            $result3 = $sar1->database;
            $database_name = substr(($result3), 0, strrpos(($result3), "_"));
            if ((($database_name)) === "workscra_".$_SESSION['DomainName'].".tech") {
                $database[$ite] = $sar1;
                $ite = $ite + 1;
            }
        }
        TwigLoader::load("database/list.twig", ['result' => $database]);
        $database2=$database;
        $result = $cPanel->execute("uapi", "Mysql", "list_users");
        if (!$result->status == 1) {
            Messages::Error("Cannot list database Users :{$result->messages[0]} | {$result->errors[0]}");
            header("location: /db_manage");
            die();
        } else {
            $ite = 0;
            $database[0] = "Not Available";
            if (!$result->status == 1) {
            } else {
                $result2 = $result->data;
                foreach ($result2 as $sar1) {
                    $result3 = $sar1->shortuser;
                    $database_name = substr(($result3), 0, strrpos(($result3), "_"));
                    if ((($database_name)) === $_SESSION['DomainName']) {
                        $database[$ite] = $sar1;
                        $ite = $ite + 1;
                    }
               }
            }
            TwigLoader::load("database/users.twig", ['result' => $database]);
            TwigLoader::load("database/changeuserpassword.twig");
            TwigLoader::load("database/changeuserpermission.twig",['result' => $database,'result2' => $database2]);
        }
    }
    Messages::clearMessages();
    die();
}
