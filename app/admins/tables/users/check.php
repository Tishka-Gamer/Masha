<?php
session_start(); 
if(!$_SESSION["admin"]){
    header("location: /");
}
use App\models\Admin;

require_once $_SERVER["DOCUMENT_ROOT"] . "/bootstrap.php";
var_dump($_POST);
if(isset($_POST["create"])){
    if(isset($_POST["confirmed"]))
    {
        $conf = 1;
    }else
    {
        $conf = 0; 
    }
   
    $user_id = $_POST["create"];
   
    Admin::confirmed($conf, $user_id);
}

header("location: /app/admins/tables/users/users.php");


 