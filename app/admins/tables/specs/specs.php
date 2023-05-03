<?php
session_start(); 
if(!$_SESSION["admin"]){
    header("location: /");
}
use App\models\ServicesType;
use App\models\Specialist;


require_once $_SERVER["DOCUMENT_ROOT"] . "/bootstrap.php";

$types = ServicesType::getAll();
$freespecs = Specialist::getFreeSpecs();

require_once $_SERVER["DOCUMENT_ROOT"] . "/app/admins/views/specs/specs.view.php";