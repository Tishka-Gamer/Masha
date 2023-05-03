<?php

use App\models\Order;
use App\models\Pet;
use App\models\Service;
use App\models\Specialist;

session_start(); 

if(!$_SESSION["auth"]){
    $_SESSION["message"] = "Вы не авторизовались!";
    header("location: /app/tables/users/auth.php");
}
require_once $_SERVER["DOCUMENT_ROOT"]."/bootstrap.php";

$services = Service::getAll();
$pets = Pet::getPetsUser($_SESSION["id"]);
$specs = Specialist::getSpecsByServiceId($services[0]->service_id);   


require_once $_SERVER["DOCUMENT_ROOT"] . '/views/orders/order.view.php';
 