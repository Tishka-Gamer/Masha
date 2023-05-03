<?php
session_start(); 
if(!$_SESSION["admin"]){
    header("location: /");
}
use App\models\ServicesType;

require_once $_SERVER["DOCUMENT_ROOT"] . "/bootstrap.php";
if(isset($_POST["redacte-type"])){
    $_SESSION["type_id"] = $_POST["redacte-type"];
}

$type = ServicesType::find($_SESSION["type_id"]);

require_once $_SERVER["DOCUMENT_ROOT"] . "/app/admins/views/services/redacteType.view.php";