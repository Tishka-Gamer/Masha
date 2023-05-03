<?php
session_start(); 
if(!$_SESSION["admin"]){
    header("location: /");
}
use App\models\Specialist;


require_once $_SERVER["DOCUMENT_ROOT"]."/bootstrap.php";
if(isset($_GET["date"])){
    $_SESSION["spec-by-date"] = $_GET["date"];
}
$shedules = Specialist::getSheduleatDate($_SESSION["spec-by-date"]);
$date =$_SESSION["spec-by-date"];
$shifts = Specialist::getShifts();
require_once $_SERVER["DOCUMENT_ROOT"]."/app/admins/views/shedules/sheduleAtDate.php";
