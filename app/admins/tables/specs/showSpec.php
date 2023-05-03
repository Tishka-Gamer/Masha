<?php
session_start(); 
if(!$_SESSION["admin"]){
    header("location: /");
}
use App\models\ServicesType;
use App\models\Specialist;

require_once $_SERVER["DOCUMENT_ROOT"] . "/bootstrap.php";


if(isset($_POST["show-spec"])){
    $spec = Specialist::getSpecialistsById($_POST["show-spec"]);  
}
if(isset($_POST["show-spec-free"])){
    $spec = Specialist::getFreeSpecialistsById($_POST["show-spec-free"]);  
}

require_once $_SERVER["DOCUMENT_ROOT"] . "/app/admins/views/specs/showSpec.view.php";