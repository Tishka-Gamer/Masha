<?php
session_start(); 
if(!$_SESSION["admin"]){
    header("location: /");
}
use App\models\ServicesType;

require_once $_SERVER["DOCUMENT_ROOT"] . "/bootstrap.php";

$types = ServicesType::getAll();

require_once $_SERVER["DOCUMENT_ROOT"] . "/app/admins/views/services/addService.view.php";