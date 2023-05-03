<?php
session_start(); 
if(!$_SESSION["admin"]){
    header("location: /");
}
use App\models\Order;
use App\models\Service;
require_once $_SERVER["DOCUMENT_ROOT"] . "/bootstrap.php";

if(isset($_POST["serv-del"])){
    Order::delOrdersByService($_POST["serv-del"]);
    Service::del($_POST["serv-del"]);
}


header("location: /app/admins/tables/services/services.php");