<?php
session_start(); 
if(!$_SESSION["admin"]){
    header("location: /");
}
use App\models\Specialist;

require_once $_SERVER["DOCUMENT_ROOT"] . "/bootstrap.php";

if(isset($_POST["add"])){
    if($_POST["shedule"]!=0){
        Specialist::addShedule($_POST["date"],$_POST["week"],$_POST["add"], $_POST["shedule"]);
    }
}

if(isset($_POST["update"])){
    if($_POST["shedule"]!=0){
        Specialist::updateShedule($_POST["shedule"], $_POST["update"]);
    }else{
        Specialist::delShedule($_POST["update"]);
    }
}

if(isset($_POST["update-by-date"])){
    if($_POST["shedule"]!=0){
        Specialist::updateShedule($_POST["shedule"], $_POST["update-by-date"]);
    }else{
        Specialist::delShedule($_POST["update-by-date"]);
    }
}

if(!isset($_POST["update-by-date"])){
    header("location: /app/admins/tables/shedules/shedule.php");
}else{
    header("location: /app/admins/tables/shedules/sheduleAtDate.php");

}

