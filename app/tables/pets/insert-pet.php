<?php

session_start();

unset($_SESSION["errors"]);

use App\models\Pet;
use App\models\User;
// session_unset();
$extensions = ['jpeg', 'jpg', 'png', 'webp', 'jfif'];
$types = ["image/jpg", "image/png", "image/jpeg", "image/webp", "image/jfif"];

require_once $_SERVER['DOCUMENT_ROOT'] . '/bootstrap.php';

$names = [];
$breeds = [];





$_SESSION["name"] = $_POST["name"];
$_SESSION["breed"] = $_POST["breed"];

$_SESSION["birth"] = $_POST["birth"];

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
        if (!move_uploaded_file($tmpName, $_SERVER["DOCUMENT_ROOT"] . "/uploads/users/$newName",)) {
            $_SESSION["error"] = "Не удалось переместить файл";
        }
    } else $_SESSION["error"] = "Неправильное расширение файла. Выберите файлы с расширением: " . implode(", ", $extensions);
}

//проверка имени
if (empty($_POST["name"])) {
    $_SESSION["errors"]["name"] = "имя пустое";
} elseif (!preg_match("/^[А-ЯЁа-яё][а-яё]+$/u", $_POST["name"], $names)) {
    $_SESSION["errors"]["name"] = "некорректное имя";
} else $_SESSION["name"] = $names[0];

//проверка фамилии
if (empty($_POST["breed"])) {
    $_SESSION["errors"]["breed"] = "порода не указана";
} elseif (!preg_match("/^[А-ЯЁа-яё][а-яё]+$/u", $_POST["breed"], $breed)) {
    $_SESSION["errors"]["breed"] = "некорректно";
} else $_SESSION["breed"] = $breeds[0];


//ааааааааааааааааааааааааааааааааааааааааааааааааааааааааааааааааааааааааааааааааааааааааааааааааааааа
if ($_FILES["image"]["name"] == "") {
    if(isset($_POST['user_id'])){
       $_POST["image"] = 'pet.jpg';  
    } 
   
} else {
    // if(isset($_POST['user_id'])){
        $_POST["image"] = $newName;
    // } 
   
}
if (isset($_POST['user_id'])) {
    if (empty($_SESSION["errors"]) && empty($_SESSION["error"])) {

        $_SESSION["res"] = "Данные отправлены успешно";

        if (Pet::insert($_POST)) {
            header("Location: /app/tables/users/profile.php");
            die();
        } else {
            header("Location: /app/tables/pets/create.php");
            die();
        }
    } else {
        header("Location: /app/tables/pets/create.php");
        $_SESSION["res"] = "Имеются ошибки ввода";
    }
}

if (isset($_POST['redacte'])) {
    if (empty($_SESSION["errors"]) && empty($_SESSION["error"])) {

        $_SESSION["res"] = "Данные отправлены успешно";

        if (Pet::redacte($_POST, $_POST["redacte"])) {
            header("Location: /app/tables/users/profile.php");
            die();
        } else {
            header("Location: /app/tables/pets/redacte.php");
            die();
        }
    } else {
        header("Location: /app/tables/pets/redacte.php");
        $_SESSION["res"] = "Имеются ошибки ввода";
    }
}
