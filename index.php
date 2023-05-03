<?php

use App\models\Pet;
use App\models\Service;
use App\models\Specialist;

session_start();
require_once $_SERVER["DOCUMENT_ROOT"] . "/bootstrap.php";
if (isset($_SESSION["auth"])) {
    $services = Service::getAll();
    $pets = Pet::getPetsUser($_SESSION["id"]);
    $specs = Specialist::getSpecsByServiceId($services[0]->service_id);
}
$services5 = Service::get5ByServices();




require_once $_SERVER["DOCUMENT_ROOT"] . "/views/index.view.php";
