<?php
session_start(); 
if(!$_SESSION["admin"]){
    header("location: /");
}
use App\models\Order;
use App\models\Service;
use App\models\ServicesType;
use App\models\Specialist;

require_once $_SERVER["DOCUMENT_ROOT"] . "/bootstrap.php";

if(isset($_POST["del-type"])){
    $services = Service::getServicesByType($_POST["del-type"]);
    foreach($services as $serv){
        Order::delOrdersByService($serv->service_id);
        Service::del($serv->service_id);
    }
    Specialist::delTypeBySpec($_POST["del-type"]);
    ServicesType::del($_POST["del-type"]);
}


header("location: /app/admins/tables/services/services.php");