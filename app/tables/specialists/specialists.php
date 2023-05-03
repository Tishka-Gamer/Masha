<?php



use App\models\Specialist;

require_once $_SERVER["DOCUMENT_ROOT"]."/bootstrap.php";

$specs = Specialist::getAll();


require_once $_SERVER["DOCUMENT_ROOT"]."/views/specialists/specialists.view.php";