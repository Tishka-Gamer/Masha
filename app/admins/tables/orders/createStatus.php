<?php
session_start(); 
if(!$_SESSION["admin"]){
    header("location: /");
}
use App\models\Order;

require_once $_SERVER["DOCUMENT_ROOT"] . "/bootstrap.php";

$statuses = Order::getAllStatuses();

require_once $_SERVER["DOCUMENT_ROOT"] . "/app/admins/views/orders/createStatus.view.php";