<?php

use App\models\Order;
use App\models\Pet;
use App\models\User;

session_start();
//use App\models\User;

require_once $_SERVER['DOCUMENT_ROOT'] . '/bootstrap.php';

// $user = User::getUser($_SESSION['login'],$_SESSION['password']);



if(!isset($_SESSION["auth"]) || !$_SESSION["auth"]){
    header("location: /");
    die();
}

// if($user == null){
//    header("Location: /app/users/create.php");
//    die();
// }

$user = User::find($_SESSION["id"]);
$futureOrders = Order::getFutureOrdersByUser($_SESSION["id"]);
$lastOrders = Order::getLastOrdersByUser($_SESSION["id"]);
$pets = Pet::getPetsUser($_SESSION["id"]);

require_once $_SERVER['DOCUMENT_ROOT'] . '/views/users/profile.view.php';