<?php
$cPanel= new App\Classes\cPanel\cPanel();
use App\Classes\Messages;
if ($_SERVER['REQUEST_METHOD'] == "POST") {

    function create($cPanel,$db)  {
        $db="workscra_".$_SESSION['DomainName'].".tech_".$db;
        $parameter = [ 'name' => $db ];
        $result = $cPanel->execute('uapi', 'Mysql', 'create_database', $parameter);
        if (!$result->status == 1) {
            Messages::Error("Cannot create database : {$result->errors[0]}");
            header("location: /db");
            die();
        }else {
            Messages::Success("Database creation successful.");
            header("location: /db");
            die();
        }
    }
    function remove($cPanel,$db){
        $parameter = [
            'name' => $db
        ];
        $result = $cPanel->execute('uapi', 'Mysql', 'delete_database', $parameter);
        if (!$result->status == 1) {
            Messages::Error("Cannot delete database : {$result->errors[0]}");
            header("location: /db");
            die();
        }
        Messages::Success("Database deletion successful.");
        header("location: /db");
        die();
    }
    function adduser($cPanel,$name,$pass){
        $parameter = [
            'name'       => $name,
            'password'   => $pass,
        ];
        $result = $cPanel->execute('uapi', 'Mysql', 'create_user', $parameter);
        if (!$result->status == 1) {
            Messages::Error("Cannot Add Users : {$result->errors[0]}");
            header("location: /db");
            die();
        }
        Messages::Success("User Added Sucessfully .");
        header("location: /db");
        die();
    }
    function removeuser($cPanel,$username) {
        $parameter = [
            'name'       => $username,
        ];
        $result = $cPanel->execute('uapi', 'Mysql', 'delete_user', $parameter);
        if (!$result->status == 1) {
            Messages::Error("Cannot Delete User : {$result->errors[0]}");
            header("location: /db");
            die();
        }
        Messages::Success("User Deleted Sucessfully .");
        header("location: /db");
        die();
    }
    function userpassword($cPanel,$username,$pass) {
        $parameter = [
            'user'           =>$username,
            'password'       =>$pass
        ];
        $result = $cPanel->execute('uapi', 'Mysql', 'set_password', $parameter);
 //       var_dump($result);
        if (!$result->status == 1) {
            Messages::Error("Cannot Change Database User Paswword : {$result->errors[0]}");
            header("location: /db");
            die();
        }
        Messages::Success("Database User Password Changed Sucessfully .");
        header("location: /db");
        die();
    }
    function userpermission($cPanel,$permission,$db_user,$db)    {
        $parameter = [
            'user'           =>$db_user,
            'database'       =>$db,
            'privileges'     =>$permission
        ];
        $result = $cPanel->execute('uapi', 'Mysql', 'set_privileges_on_database', $parameter);
   //     var_dump($result);
        if (!$result->status == 1) {
            Messages::Error("Can't Change Database User Privillages ");
            header("location: /db");
            die();
        }
        Messages::Success("Database User Privillages Changed Sucessfully .");
        header("location: /db");
        die();
    }

    $cPanel= new App\Classes\cPanel\cPanel();
    if(isset($_POST['createdb'])) $action ="create";
    elseif(isset($_POST['remove'])) $action ="remove";
    elseif(isset($_POST['adduser'])) $action="adduser";
    elseif(isset($_POST['user_remove'])) $action="user_remove";
    elseif(isset($_POST['change_user_password'])) $action="user_password";
    elseif(isset($_POST['change_user_permission'])) $action="user_permission";

    switch ($action) {
        case 'create':
            if (isset($_POST['database_name'])) {
                $db_name = \App\Classes\DataCheck::check($_POST['database_name'], 'escape');
                create($cPanel, $db_name);
            }else header("location: /db");
            break;
        case 'remove':
            if (isset($_POST['remove'])) {
                $db_name = \App\Classes\DataCheck::check($_POST['remove'], 'escape');
                remove($cPanel, $db_name);
            }else header("location: /db");
            break;
        case 'adduser':
            if (isset($_POST['user_name']) && isset($_POST['Password'])) {
                $name = \App\Classes\DataCheck::check($_POST['user_name'], 'escape');
                $pass = \App\Classes\DataCheck::check($_POST['Password'], 'escape');
                $name = "workscra_".$_SESSION['DomainName']."_".$name;
                adduser($cPanel, $name, $pass);
            }else header("location: /db");
            break;
        case 'user_remove':
            if (isset($_POST['user_remove'])){
                $username = \App\Classes\DataCheck::check($_POST['user_remove'], 'escape');
                removeuser($cPanel, $username);
            }else header("location: /db");
            break;
        case 'user_password':
            if (isset($_POST['User_Name']) && isset($_POST['pass'])) {
                $username = \App\Classes\DataCheck::check($_POST['User_Name'], 'escape');
                $pass = \App\Classes\DataCheck::check($_POST['pass'], 'escape');
                userpassword($cPanel, $username, $pass);
            }else header("location: /db");
            break;
        case 'user_permission':
            $per = array('ALTER' ,'CREATE','CREATE TEMPORARY TABLES','CREATE VIEW','DELETE','EVENT','DROP','EXECUTE','INDEX','INSERT','LOCK TABLES','REFERENCES','SELECT','SHOW VIEW','TRIGGER','UPDATE');
            $permission="";
            foreach ($per as $s) {
                if(isset($_POST[$s])){
                    $permission=$permission.$s.",";
                }
            }
            if (isset($_POST['database_user'])
                && isset($_POST['database'])) {
                $db_user = \App\Classes\DataCheck::check($_POST['database_user'], 'escape');
                $db = \App\Classes\DataCheck::check($_POST['database'], 'escape');
                userpermission($cPanel,$permission,$db_user,$db);
            }else// header("location: /db");
            break;
        default :
            Messages::clearMessages();
            header("location: /db");
            die();
    }
}
