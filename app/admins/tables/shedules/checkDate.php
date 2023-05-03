<?php
session_start(); 
if(!$_SESSION["admin"]){
    header("location: /");
}
echo("<hr>");
var_dump(date("Y-m-d", $_SESSION["dateW"]));
echo("<hr>");
if (isset($_POST["forward"])) {
    $_SESSION["click"]++;
    //$date = $_SESSION["date"];
    $_SESSION["dateW"] =  strtotime('-1day', $_SESSION["dateW"]);
    $_SESSION["dateW"] =  strtotime('+1day', $_SESSION["dateW"]);
}

if (isset($_POST["back"])) {
    $_SESSION["click"]++;
    //$date = $_SESSION["date"];
    $_SESSION["dateW"] =  strtotime('-14 day', $_SESSION["dateW"]);
}

var_dump(date("Y-m-d", $_SESSION["dateW"]));
echo("<hr>");
header("location: /app/admins/tables/shedules/shedule.php");