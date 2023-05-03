<?php
session_start(); 
if(!$_SESSION["admin"]){
    header("location: /");
}
use App\models\ServicesType;
use App\models\Specialist;

require_once $_SERVER["DOCUMENT_ROOT"] . "/bootstrap.php";

$types = ServicesType::getAll();

if(isset($_POST["redacte-spec"])){
    $_SESSION["redacte-spec"] = $_POST["redacte-spec"];
}

$spec = Specialist::getSpecialistsById($_SESSION["redacte-spec"]);

require_once $_SERVER["DOCUMENT_ROOT"] . "/app/admins/views/specs/redacte.view.php";