<?php

use App\models\Order;
use App\models\Pet;
use App\models\Specialist;

require_once $_SERVER["DOCUMENT_ROOT"] . "/bootstrap.php";
 
if(isset($_GET["serv_id"])){
$serv_id = json_decode($_GET["serv_id"]);
$res = Specialist::getSpecsByServiceId($serv_id);   
}

if(isset($_GET["spec_id"])){
    $spec_id = json_decode($_GET["spec_id"]);
    $res = Specialist::getDateBySpec($spec_id);
}
 
if(isset($_GET["spec_id"]) && isset($_GET["date"])){
    $spec_id = json_decode($_GET["spec_id"]);
    $date = json_decode($_GET["date"]);
    //в асинхронку перенести 
    $timeClose = Order::getTimeBySpec($spec_id, $date); 
    $timeDate = Specialist::getTimeBySpec($spec_id, $date);
    $res = ["close" => $timeClose, "free" => $timeDate];
}

if(isset($_GET["pet_id"])){
    $pet_id = json_decode($_GET["pet_id"]);
    $res = Pet::getPetImg($pet_id);
}


echo json_encode($res, JSON_UNESCAPED_UNICODE);

