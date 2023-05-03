<?php
session_start(); 
if(!$_SESSION["admin"]){
    header("location: /");
}
use App\models\Order;

require_once $_SERVER["DOCUMENT_ROOT"] . "/bootstrap.php";
// var_dump($_POST);
$s = Order::createStatusByOrder($_POST["btn-createStatus"],$_POST["status"]);
// var_dump($s);
header("location: /app/admins/tables/orders/orders.php");