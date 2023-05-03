<?php
session_start();
require_once $_SERVER["DOCUMENT_ROOT"]."/bootstrap.php";

use App\models\Pet;
use App\models\Specie;

$species = Specie::getAll();
if(isset($_POST["redacte-pet"])){
    $_SESSION["id-pet"] = $_POST["redacte-pet"];
}
$pet = Pet::find($_SESSION["id-pet"]);

require_once $_SERVER["DOCUMENT_ROOT"] . '/views/pets/redacte.view.php'; 