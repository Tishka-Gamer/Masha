<?php

session_start(); 
if(!$_SESSION["admin"]){
    header("location: /");
}
use App\models\Specialist;

$extensions = ['jpeg', 'jpg', 'png', 'webp', 'jfif'];
$types = ["image/jpg", "image/png", "image/jpeg", "image/webp", "image/jfif"];

require_once $_SERVER['DOCUMENT_ROOT'] . '/bootstrap.php';



$_SESSION["name"] = $_POST["name"];
$_SESSION["surname"] = $_POST["surname"];
$_SESSION["patronymic"] = $_POST["patronymic"];
$_SESSION["login"] = $_POST["login"];
$_SESSION["office"] = $_POST["office"];
$_SESSION["birth"] = $_POST["birth"];
$_SESSION["date-work"] = $_POST["date-work"];
$_SESSION["diplom"] = $_POST["diplom"];
$_SESSION["univer"] = $_POST["univer"];
$_SESSION["qualification"] = $_POST["qualification"];
$_SESSION["year_of_issue"] = $_POST["year_of_issue"];
$_SESSION["year_of_graduation"] = $_POST["year_of_graduation"];
$_SESSION["login"] = $_POST["login"];

// //проверка имени
if (empty($_POST["name"])) {
    $_SESSION["errors"]["name"] = "имя пустое";
} elseif (!preg_match("/^[А-ЯЁа-яё][а-яё]+$/u", $_POST["name"])) {
    $_SESSION["errors"]["name"] = "некорректное имя";
}

// //проверка фамилии
if (empty($_POST["surname"])) {
    $_SESSION["errors"]["surname"] = "Фамилия не введена";
} elseif (!preg_match("/^[А-ЯЁа-яё][а-яё]+$/u", $_POST["surname"])) {
    $_SESSION["errors"]["surname"] = "некорректная фамилия";
}

// //проверка отчества
if ($_SESSION["patronymic"] != "") {
    if (!preg_match("/^[А-ЯЁа-яё][а-яё]*$/u", $_POST["patronymic"])) {
        $_SESSION["errors"]["patronymic"] = "некорректное отчество";
    }
}

// //проверка логина
if (empty($_POST["login"])) {
    $_SESSION["errors"]["login"] = "login пустой";
} elseif (Specialist::findLogin($_POST["login"]) && isset($_POST['btn'])) {
    $_SESSION["errors"]["login"] = "Такая login существует";
} elseif (!preg_match("/^[A-Za-z0-9]+$/u", $_POST["login"])) {
    $_SESSION["errors"]["login"] = "некорректный login";
}

//проерка диплома (7 цифр)
if (empty($_POST["diplom"])) {
    $_SESSION["errors"]["diplom"] = "Диплом не указан";
} elseif (!preg_match("/^[0-9]{13}$/u", $_POST["diplom"])) {
    $_SESSION["errors"]["diplom"] = "Диплом некорректен";
}

//проерка универа
if (empty($_POST["univer"])) {
    $_SESSION["errors"]["univer"] = "Учебное заведение не указано";
} elseif (!preg_match("/^([А-ЯЁа-яё]|[а-яё]|\.|\s|[0-9]|№)+$/u", $_POST["univer"])) {
    $_SESSION["errors"]["univer"] = "Название некорректно";
}

//проерка кабинета
if (empty($_POST["office"])) {
    $_SESSION["errors"]["office"] = "Кабинет не указан";
} elseif (!preg_match("/^([А-ЯЁа-яё]|[а-яё]|\.|\s|[0-9]|№)+$/u", $_POST["office"])) {
    $_SESSION["errors"]["office"] = "Кабинет указан некорректно";
}

//проерка года поступления
if (empty($_POST["year_of_issue"])) {
    $_SESSION["errors"]["year_of_issue"] = "Год не указан";
} elseif (!preg_match("/^(19[5-9][0-9]|20[0-9][0-9])$/u", $_POST["year_of_issue"])) {
    $_SESSION["errors"]["year_of_issue"] = "Год некорректен";
}

//проерка года поступления
if (empty($_POST["year_of_graduation"])) {
    $_SESSION["errors"]["year_of_graduation"] = "Год не указан";
} elseif (!preg_match("/^(19[5-9][0-9]|20[0-9][0-9])$/u", $_POST["year_of_graduation"])) {
    $_SESSION["errors"]["year_of_graduation"] = "Год некорректен";
}


//проверка паролей
if (empty($_POST["password"]) || empty($_POST["password_confirmation"])) {
    $_SESSION["errors"]["password"] = "пустой пароль";
} elseif ($_POST["password"] != $_POST["password_confirmation"]) {
    $_SESSION["errors"]["password"] = "пароли не совпадают";
}

if (isset($_FILES["image"]) && $_FILES["image"]["name"] != "") {


    $size = $_FILES["image"]["size"];
    $name = $_FILES["image"]["name"];
    $tmpName = $_FILES["image"]["tmp_name"];
    $error = $_FILES["image"]["error"];

    $path_parts = pathinfo("name");

    $newName = time() . "_" . $name;

    if (in_array(mime_content_type($tmpName), $types)) {


        if ($size > 4097152) {
            $_SESSION["error"] = "Файл слишком большой";
        }
        if (!move_uploaded_file($tmpName, $_SERVER["DOCUMENT_ROOT"] . "/uploads/specialists/$newName",)) {
            $_SESSION["error"] = "Не удалось переместить файл";
        }
    } else $_SESSION["error"] = "Неправильное расширение файла. Выберите файлы с расширением: " . implode(", ", $extensions);
}



if (isset($_POST['btn'])) {


    //назначение аватара специалиста по умолчанию
    if ($_FILES["image"]["name"] == "") {
        $_POST["image"] = 'doctor.jpg';
    } else {
        $_POST["image"] = $newName;
    }

    if (empty($_SESSION["errors"]) && empty($_SESSION["error"])) {

        $_SESSION["res"] = "Данные отправлены успешно";

        Specialist::insert($_POST);
        unset($_SESSION["name"]);
        unset($_SESSION["surname"]);
        unset($_SESSION["patronymic"]);
        unset($_SESSION["login"] );
        unset($_SESSION["office"] );
        unset( $_SESSION["birth"]);
        unset( $_SESSION["date-work"] );
        unset( $_SESSION["diplom"]);
        unset( $_SESSION["univer"]);
        unset( $_SESSION["qualification"]);
        unset( $_SESSION["year_of_issue"]);
        unset( $_SESSION["year_of_graduation"]);
        unset( $_SESSION["login"] );
        unset( $_SESSION["btn"] );
        
        header("Location: /app/admins/tables/specs/specs.php");
        die();
    } else {
        header("Location: /app/admins/tables/specs/insertSpec.php");
        $_SESSION["res"] = "Имеются ошибки ввода";
    }
}

if (isset($_POST['redacte'])) {

    if ($_FILES["image"]["name"] == "") {
        $_POST["image"] = $_POST["img"];
    } else{
        $_POST["image"] = $newName;
    }

    if (empty($_SESSION["errors"]) && empty($_SESSION["error"])) {

        unset($_SESSION["name"]);
        unset($_SESSION["surname"]);
        unset($_SESSION["patronymic"]);
        unset($_SESSION["login"] );
        unset($_SESSION["office"] );
        unset( $_SESSION["birth"]);
        unset( $_SESSION["date-work"] );
        unset( $_SESSION["diplom"]);
        unset( $_SESSION["univer"]);
        unset( $_SESSION["qualification"]);
        unset( $_SESSION["year_of_issue"]);
        unset( $_SESSION["year_of_graduation"]);
        unset( $_SESSION["login"] );
        unset( $_SESSION["redacte-spec"] );
       
        // $_SESSION["res"] = "Данные отправлены успешно";
        Specialist::redacte($_POST, $_POST["redacte"]);

        header("Location: /app/admins/tables/specs/specs.php");
        die();
        //var_dump($_SESSION);
    } else {
        header("Location: /app/admins/tables/specs/redacte.php");
        $_SESSION["res"] = "Имеются ошибки ввода";
    }
}
