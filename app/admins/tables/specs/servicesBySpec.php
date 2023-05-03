<?php
session_start(); 
if(!$_SESSION["admin"]){
    header("location: /");
}
use App\models\Service;

require_once $_SERVER["DOCUMENT_ROOT"] . "/bootstrap.php";

$services = Service::getServicesBySpec($_POST["spec"]);

require_once $_SERVER["DOCUMENT_ROOT"] . "/app/admins/views/specs/servicesBySpec.view.php";