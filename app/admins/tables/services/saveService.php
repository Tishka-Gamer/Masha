<?php
session_start(); 
if(!$_SESSION["admin"]){
    header("location: /");
}
use App\models\Service;




require_once $_SERVER['DOCUMENT_ROOT'] . '/bootstrap.php';


if(isset($_POST["id"])){
    $_SESSION["id"] = $_POST["id"];
}

$_SESSION["name"] = $_POST["name"];
$_SESSION["desc"] = $_POST["desc"];
$_SESSION["price"] = $_POST["price"];
$_SESSION["type"] = $_POST["type"];

// //проверка имени
if (empty($_POST["name"])) {
    $_SESSION["errors"]["name"] = "Название пустое";
} elseif (!preg_match("/^([А-ЯЁа-яё]|\s|\.|,)+$/u", $_POST["name"])) {
    $_SESSION["errors"]["name"] = "некорректное название";
}

// //проверка фамилии
if (empty($_POST["desc"])) {
    $_SESSION["errors"]["desc"] = "Описание не введена";
} elseif (!preg_match("/^([А-ЯЁа-яё]|\s)+$/u", $_POST["desc"])) {
    $_SESSION["errors"]["desc"] = "некорректное описание";
}

// //проверка фамилии
if (empty($_POST["price"])) {
    $_SESSION["errors"]["price"] = "Цена не введена";
}




if (empty($_SESSION["errors"]) && empty($_SESSION["error"])) {
    if (isset($_POST['id'])) {
        $_SESSION["res"] = "Данные отправлены успешно";
        // var_dump($_POST);
        // echo("br");
        // var_dump($_SESSION);
        Service::redacte($_POST);
        session_unset();
        header("Location: /app/admins/tables/services/services.php");
        die();
    }

    if (isset($_POST['add'])) {
        $_SESSION["res"] = "Данные отправлены успешно";
        // var_dump($_POST);
        // echo("br");
        // var_dump($_SESSION);
        Service::insert($_POST);
        session_unset();
        header("Location: /app/admins/tables/services/services.php");
        die();
    }

} else {
    $_SESSION["res"] = "Имеются ошибки ввода";
    
    if (isset($_POST['add'])) {
        header("Location: /app/admins/tables/services/addServ.php");
    }

    if(isset($_POST['id'])){
        header("Location: /app/admins/tables/services/redacteService.php");
    }

    
    
}
