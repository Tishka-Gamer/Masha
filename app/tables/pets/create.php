<?php
session_start();
require_once $_SERVER["DOCUMENT_ROOT"]."/bootstrap.php";
use App\models\Specie;

$species = Specie::getAll();

require_once $_SERVER["DOCUMENT_ROOT"] . '/views/pets/create.view.php';
