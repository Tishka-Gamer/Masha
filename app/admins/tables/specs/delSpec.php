<?php
session_start(); 
if(!$_SESSION["admin"]){
    header("location: /");
}
use App\models\Order;
use App\models\Specialist;

require_once $_SERVER['DOCUMENT_ROOT'] . '/bootstrap.php';

Order::delOrdersBySpec($_POST["del-spec"]);
Specialist::deleteEducation($_POST["del-spec"]);
Specialist::delSheduleBySpec($_POST["del-spec"]);
Specialist::deleteSpec($_POST["del-spec"]);

header("location: /app/admins/tables/specs/specs.php");
