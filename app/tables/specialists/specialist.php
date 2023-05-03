<?php



use App\models\Specialist;

require_once $_SERVER["DOCUMENT_ROOT"]."/bootstrap.php";
$id = $_POST["btn-spec-show"];
$spec = Specialist::getSpecialistsById($id);


require_once $_SERVER["DOCUMENT_ROOT"]."/views/specialists/specialist.view.php";