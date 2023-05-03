<?php

use App\models\Recommend;

require_once $_SERVER["DOCUMENT_ROOT"] . "/bootstrap.php";

$recommends = Recommend::getAll();

require_once $_SERVER["DOCUMENT_ROOT"] . "/views/recommends.view.php";