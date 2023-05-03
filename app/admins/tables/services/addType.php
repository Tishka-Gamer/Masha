<?php
session_start(); 
if(!$_SESSION["admin"]){
    header("location: /");
}
require_once $_SERVER["DOCUMENT_ROOT"] . "/bootstrap.php";



require_once $_SERVER["DOCUMENT_ROOT"] . "/app/admins/views/services/addType.view.php";