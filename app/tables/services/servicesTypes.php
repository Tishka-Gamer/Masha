<?php


use App\models\ServicesType;

require_once $_SERVER["DOCUMENT_ROOT"]."/bootstrap.php";

$services_types = ServicesType::getAll();


require_once $_SERVER["DOCUMENT_ROOT"]."/views/services/servicesTypes.view.php";
