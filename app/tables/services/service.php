<?php


use App\models\Service;
use App\models\Specialist;

require_once $_SERVER["DOCUMENT_ROOT"]."/bootstrap.php";
if(isset($_POST["btn-service-show"])){
   $id_service = $_POST["btn-service-show"]; 
}

if(isset($_GET["id"])){
    $id_service = $_GET["id"]; 
}



$service = Service::find($id_service);
$type = Service::getIdTypeOfService($id_service);
$specs = Specialist::getSpecialistsByServicesType($type);

require_once $_SERVER["DOCUMENT_ROOT"]."/views/services/service.view.php";
