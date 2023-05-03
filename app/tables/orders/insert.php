<?php
require_once $_SERVER["DOCUMENT_ROOT"] . "/bootstrap.php";
use App\models\Order;

if(isset($_POST["addOrder"])){

    // var_dump($_POST);
    Order::insert($_POST);
    header("location: /app/tables/users/profile.php");
}
