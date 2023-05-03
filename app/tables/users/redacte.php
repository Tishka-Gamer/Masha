<?php

use App\models\User;
require_once $_SERVER['DOCUMENT_ROOT'] . '/bootstrap.php';

if(isset($_POST["redacte-user"])){
    $_SESSION["redacte-user"] = $_POST["redacte-user"];
}

$us = User::find($_SESSION["redacte-user"]);

require_once $_SERVER["DOCUMENT_ROOT"] . '/views/users/redacte.view.php';
