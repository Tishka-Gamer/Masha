<?php

session_start();

unset($_SESSION["errors"]);

use App\models\User;
// session_unset();
$extensions = ['jpeg', 'jpg', 'png', 'webp', 'jfif'];
$types = ["image/jpg", "image/png", "image/jpeg", "image/webp", "image/jfif"];

require_once $_SERVER['DOCUMENT_ROOT'] . '/bootstrap.php';

$names = [];
$surnames = [];
$patronymics = [];
$logins = [];
$emails = [];


if (isset($_POST["btn-redacte"])) {
    $us = User::find($_POST["btn-redacte"]);
}

$_SESSION["name"] = $_POST["name"];
$_SESSION["surname"] = $_POST["surname"];
$_SESSION["patronymic"] = $_POST["patronymic"];

$_SESSION["email"] = $_POST["email"];
$_SESSION["login"] = $_POST["login"];
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
if (empty($_POST["surname"])) {
    $_SESSION["errors"]["surname"] = "фамилия пустое";
} elseif (!preg_match("/^[А-ЯЁа-яё][а-яё]+$/u", $_POST["surname"], $surnames)) {
    $_SESSION["errors"]["surname"] = "некорректное имя";
} else $_SESSION["surname"] = $surnames[0];

//проверка отчества
if ($_SESSION["patronymic"] != "") {
    if (!preg_match("/^[А-ЯЁа-яё][а-яё]*$/u", $_POST["patronymic"], $patronymics)) {
        $_SESSION["errors"]["patronymic"] = "некорректное отчество";
    } else $_SESSION["patronymic"] = $patronymics[0];
}


//проверка почты
if (isset($_POST["btn"])) {
    if (empty($_POST["email"])) {
        $_SESSION["errors"]["email"] = "email пустой";
    } elseif (User::findEmail($_POST["email"])) {
        $_SESSION["errors"]["email"] = "Такая почта существует";
    } elseif (!preg_match("/([A-Za-z0-9]+@[a-z]+\.[a-z]+)/u", $_POST["email"], $emails)) {
        $_SESSION["errors"]["email"] = "некорректный email";
    } else $_SESSION["email"] = $emails[0];
}
if (isset($_POST["btn-redacte"])) {
    if (empty($_POST["email"])) {
        $_SESSION["errors"]["email"] = "email пустой";
    } elseif (User::findEmail($_POST["email"]) && $_POST["email"] != $us->email) {
        $_SESSION["errors"]["email"] = "Такая почта существует";
    } elseif (!preg_match("/([A-Za-z0-9]+@[a-z]+\.[a-z]+)/u", $_POST["email"], $emails)) {
        $_SESSION["errors"]["email"] = "некорректный email";
    } else $_SESSION["email"] = $emails[0];
}


//проверка логина
if (isset($_POST["btn"])) {
    if (empty($_POST["login"])) {
        $_SESSION["errors"]["login"] = "login пустой";
    } elseif (User::findLogin($_POST["login"])) {
        $_SESSION["errors"]["login"] = "Такая login существует";
    } elseif (!preg_match("/^[A-Za-z0-9]+$/u", $_POST["login"], $logins)) {
        $_SESSION["errors"]["login"] = "некорректный login";
    } else $_SESSION["login"] = $logins[0];
}

if (isset($_POST["btn-redacte"])) {
    if (empty($_POST["login"])) {
        $_SESSION["errors"]["login"] = "login пустой";
    } elseif (User::findLogin($_POST["login"]) && $_POST["login"] != $us->login) {
        $_SESSION["errors"]["login"] = "Такая login существует";
    } elseif (!preg_match("/^[A-Za-z0-9]+$/u", $_POST["login"], $logins)) {
        $_SESSION["errors"]["login"] = "некорректный login";
    } else $_SESSION["login"] = $logins[0];
   
}


//проверка паролей
if ((isset($_POST["btn-redacte"]) && (!empty($_POST["password"]) && !empty($_POST["password_confirmation"]))) || isset($_POST["btn"])) {
    if (empty($_POST["password"]) || empty($_POST["password_confirmation"])) {
        $_SESSION["errors"]["password"] = "пустой пароль";
    } elseif ($_POST["password"] != $_POST["password_confirmation"]) {
        $_SESSION["errors"]["password"] = "пароли не совпадают";
    }
}

//ааааааааааааааааааааааааааааааааааааааааааааааааааааааааааааааааааааааааааааааааааааааааааааааааааааа
if ($_FILES["image"]["name"] == "") {
    if (isset($_POST['btn'])) {
        $_POST["image"] = 'ava.jpg';
    }
} else {
    $_POST["image"] = $newName;
}

if (empty($_SESSION["errors"]) && empty($_SESSION["error"])) {

    $_SESSION["res"] = "Данные отправлены успешно";
    if (isset($_POST['btn'])) {
        if (User::insert($_POST)) {
            $user = User::getUser($_POST['login'], $_POST['password']);
            $_SESSION["auth"] = true;
            $_SESSION["id"] = $user->id;
            $_SESSION["loginUs"] = $_POST["login"];

            header("Location: /");
            die();
        } else {
            header("Location: /app/tables/users/create.php");
            die();
        }
    }
    if (isset($_POST['btn-redacte'])) {
        if (empty($_POST["password"]) || empty($_POST["password_confirmation"])) {
            if (User::redacteNotPassword($_POST, $us->id)) {
                $user = User::getUserByLogin($_POST['login']);
                $_SESSION["auth"] = true;
                $_SESSION["id"] = $user->id;
                $_SESSION["loginUs"] = $_POST["login"];

                header("Location: /");
                die();
            } else {
                header("Location: /app/tables/users/redacte.php");
                die();
            }
        } else {
            if (User::redacte($_POST, $us->id)) {
                $user = User::getUser($_POST['login'], $_POST['password']);
                $_SESSION["auth"] = true;
                $_SESSION["id"] = $user->id;
                $_SESSION["loginUs"] = $_POST["login"];

                header("Location: /");
                die();
            } else {
                header("Location: /app/tables/users/redacte.php");
                die();
            }
        }
    }
} else {
    $_SESSION["res"] = "Имеются ошибки ввода";
    if (isset($_POST['btn'])) {
        header("Location: /app/tables/users/create.php");
    }
    if (isset($_POST['btn-redacte'])) {
        header("Location: /app/tables/users/redacte.php");
    }
}
