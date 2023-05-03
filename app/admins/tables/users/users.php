<?php
session_start(); 
if(!$_SESSION["admin"]){
    header("location: /");
}
use App\models\User;

require_once $_SERVER["DOCUMENT_ROOT"] . "/bootstrap.php";

$users = User::getAll();

require_once $_SERVER["DOCUMENT_ROOT"] . "/app/admins/views/users/users.view.php";
 