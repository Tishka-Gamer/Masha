<?php

session_start();
session_start(); 
if(!$_SESSION["admin"]){
    header("location: /");
}

use App\models\Product;
use App\models\ServicesType;






$_SESSION["name"] = $_POST["name"];
$_SESSION["desc"] = $_POST["desc"];


if (isset($_POST["redacte-type"])) {
    $_SESSION["redacte-type"] = $_POST["redacte-type"];
}

require_once $_SERVER["DOCUMENT_ROOT"] . "/bootstrap.php";



$extensions = ['jpeg', 'jpg', 'png', 'webp', 'jfif'];
$types = ["image/jpg", "image/png", "image/jpeg", "image/webp", "image/jfif"];

echo ("<hr>");
var_dump($_SESSION);
echo ("<hr>");
var_dump($_POST);
echo ("<hr>");
var_dump($_FILES);
echo ("<hr>");

var_dump($_FILES["image"]);
echo ("<hr>");

if (isset($_FILES["image"]) && $_FILES["image"]["name"] != "") {

    $size = $_FILES["image"]["size"];
    $name = $_FILES["image"]["name"];
    $tmpName = $_FILES["image"]["tmp_name"];
    $error = $_FILES["image"]["error"];

    $path_parts = pathinfo("name");

    $newName = time() . "_" . $name;
    echo ("<br>");
    var_dump($_FILES);
    echo ("<br>");
    //header("location: /app/admin/tables/products/admin.create.product.php");

    if (in_array(mime_content_type($tmpName), $types)) {


        if ($size > 4097152) {
            $_SESSION["error"] = "Файл слишком большой";
        }
        if (!move_uploaded_file($tmpName, $_SERVER["DOCUMENT_ROOT"] . "/uploads/bd/$newName",)) {
            $_SESSION["error"] = "Не удалось переместить файл";
        }
    } else $_SESSION["error"] = "Неправильное расширение файла. Выберите файлы с расширением: " . implode(", ", $extensions);
} else {

    if(isset($_POST["redacte-type"])){
      $newName = $_POST["image"];  
    }

    if(isset($_POST["add-type"])){
        $_SESSION["error"] = "Файл не выбран";
    }
    
}

// // //проверка описания
if (empty($_POST["name"])) {
    $_SESSION["errors"]["name"] = "Название пустое";
}
elseif (!preg_match("/^([А-ЯЁа-яё]|\s)+$/u", $_POST["name"])) {
    $_SESSION["errors"]["name"] = "некорректное название";
}



// //проверка имени
if (empty($_POST["desc"])) {
    $_SESSION["errors"]["desc"] = "Описание не введено";
}elseif (!preg_match("/^([А-ЯЁа-яё]|\s|\.|,)*$/u", $_POST["desc"])) {
    $_SESSION["errors"]["desc"] = "некорректное описание";
}
echo ("dttttttdddddd");

if (empty($_SESSION["errors"]) && empty($_SESSION["error"])) {
    $_SESSION["res"] = "Данные отправлены успешно";
    echo ("ddddkkkkkkddd");
    if (isset($_POST["redacte-type"])) {
        echo ("ddddddd");
        // var_dump($_POST);
        // echo("br");
        // var_dump($_SESSION);

        ServicesType::redacte($_POST, $newName, $_POST["redacte-type"]);
        unset($_SESSION["error"]);
        unset($_SESSION["errors"]);
        unset($_SESSION["name"]);
        unset($_SESSION["desc"]);
       header("Location: /app/admins/tables/services/services.php");
        die();
    }

    if(isset($_POST["add-type"])){
        ServicesType::insert($_POST, $newName);
        unset($_SESSION["error"]);
        unset($_SESSION["errors"]);
        unset($_SESSION["name"]);
        unset($_SESSION["desc"]);
        header("Location: /app/admins/tables/services/services.php");
        die();
    }


} else {
    $_SESSION["res"] = "Имеются ошибки ввода";
  
    if (isset($_POST['redacte-type'])) {
      header("Location: /app/admins/tables/services/redacteType.php");
    }if(isset($_POST["add-type"])){
        header("Location: /app/admins/tables/services/addType.php");
    }
}
