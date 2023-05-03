<?php
session_start(); 
if(!$_SESSION["admin"]){
    header("location: /");
}

if(!$_SESSION["privilege"]){
    header("location: /app/admins/index.php");
}
require_once $_SERVER["DOCUMENT_ROOT"] . "/bootstrap.php";

require_once $_SERVER["DOCUMENT_ROOT"] . "/app/admins/views/auths/insert.view.php";
