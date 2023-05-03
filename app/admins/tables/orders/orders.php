<?php
session_start(); 
if(!$_SESSION["admin"]){
    header("location: /");
}
use App\models\Order;

require_once $_SERVER["DOCUMENT_ROOT"] . "/bootstrap.php";

$orders = Order::getAll();

require_once $_SERVER["DOCUMENT_ROOT"] . "/app/admins/views/orders/orders.view.php";

