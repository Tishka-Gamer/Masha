<?php
session_start(); 
if(!$_SESSION["admin"]){
    header("location: /");
}
use App\models\Service;
use App\models\ServicesType;

require_once $_SERVER["DOCUMENT_ROOT"] . "/bootstrap.php";
if(isset($_POST["redacte-service"])){
    $_SESSION["serv_id"] = $_POST["redacte-service"];
}
$types = ServicesType::getAll();
$serv = Service::find($_SESSION["serv_id"]);

require_once $_SERVER["DOCUMENT_ROOT"] . "/app/admins/views/services/redacteService.view.php";