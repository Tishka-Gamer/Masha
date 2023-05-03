<?php
session_start(); 
if(!$_SESSION["admin"]){
    header("location: /");
}
use App\models\Specialist;

require_once $_SERVER["DOCUMENT_ROOT"] . "/bootstrap.php";

$specs = Specialist::getSpecialistsByServicesType($_POST["specByTypeService"]);

require_once $_SERVER["DOCUMENT_ROOT"] . "/app/admins/views/services/specsByService.view.php";