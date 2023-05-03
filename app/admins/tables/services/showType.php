<?php
session_start(); 
if(!$_SESSION["admin"]){
    header("location: /");
}
use App\models\ServicesType;

require_once $_SERVER["DOCUMENT_ROOT"] . "/bootstrap.php";
$type = ServicesType::find($_POST["show-type"]);
require_once $_SERVER["DOCUMENT_ROOT"] . "/app/admins/views/services/showType.view.php";