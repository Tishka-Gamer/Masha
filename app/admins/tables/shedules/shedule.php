<?php
session_start(); 
if(!$_SESSION["admin"]){
    header("location: /");
}
use App\models\Specialist;

require_once $_SERVER["DOCUMENT_ROOT"] . "/bootstrap.php";

$_SESSION["click"] = 0;
$dayWeek = [
   "Понедельник",
   "Вторник",
   "Среда",
   "Четверг",
   "Пятница",
   "Суббота",
   "Воскресенье"
];

$shedules = Specialist::getShifts();
$specs = Specialist::getAll();

// if(isset($_SESSION["click"])){

// }
if(!isset($_POST["forward"]) && !isset($_POST["back"]) && $_SESSION["click"] == 0){
   $_SESSION["dateW"] = strtotime('monday this week');  
}

$weekDate = [];
 
// echo("<hr>");
// var_dump(date("Y-m-d", $_SESSION["dateW"]));
// echo("<hr>");
for ($i = 0; $i < 7; $i++) {
   array_push($weekDate, date("Y-m-d", $_SESSION["dateW"]));
   $_SESSION["dateW"] =  strtotime('+1 day', $_SESSION["dateW"]);
} ?>


<?php
// var_dump($weekDate);
// echo("<hr>");
// var_dump(date("Y-m-d", $_SESSION["dateW"]));


require_once $_SERVER["DOCUMENT_ROOT"] . "/app/admins/views/shedules/shedules.view.php";
?>

