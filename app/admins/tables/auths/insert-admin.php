<?php

session_start(); 
if(!$_SESSION["admin"]){
    header("location: /");
}

unset($_SESSION["errors"]);

use App\models\Admin;

require_once $_SERVER['DOCUMENT_ROOT'] . '/bootstrap.php';

$names = [];
$surnames = [];
$patronymics = [];
$logins = [];

if (isset($_POST['btn'])) {

    $_SESSION["name"] = $_POST["name"];
    $_SESSION["surname"] = $_POST["surname"];
    $_SESSION["patronymic"] = $_POST["patronymic"];
    $_SESSION["login"] = $_POST["login"];
    
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
    if($_SESSION["patronymic"] != ""){
         if (!preg_match("/^[А-ЯЁа-яё][а-яё]*$/u", $_POST["patronymic"], $patronymics)) {
        $_SESSION["errors"]["patronymic"] = "некорректное отчество";
    } else $_SESSION["patronymic"] = $patronymics[0]; 
    }
  
    //проверка логина
    if (empty($_POST["loginAdmin"])) {
        $_SESSION["errors"]["loginAdmin"] = "login пустой";
    } elseif(Admin::findLogin($_POST["loginAdmin"])){
        $_SESSION["errors"]["loginAdmin"] = "Такая login существует";
    }
    elseif (!preg_match("/^[A-Za-z0-9]+$/u", $_POST["loginAdmin"], $logins)) {
        $_SESSION["errors"]["loginAdmin"] = "некорректный login";
    } else $_SESSION["loginAdmin"] = $logins[0];

    //проверка паролей
    if (empty($_POST["password"]) || empty($_POST["password_confirmation"])) {
        $_SESSION["errors"]["password"] = "пустой пароль";
    } elseif ($_POST["password"] != $_POST["password_confirmation"]) {
        $_SESSION["errors"]["password"] = "пароли не совпадают";
    }

    if (empty($_SESSION["errors"]) && empty($_SESSION["error"])) {

        $_SESSION["res"] = "Данные отправлены успешно";
        
        if (Admin::insert($_POST)) {
            var_dump($_POST);
            $admin = Admin::getAdmin($_POST['loginAdmin'], $_POST['password']);
            // $_SESSION["admin"] = true;
            // $_SESSION["id"] = $admin->id;
            // $_SESSION["loginAdmin"] = $_POST["loginAdmin"];
            
            header("Location: /app/admins/users/users.php");
            die();
        } else {
            header("Location: /app/admins/tables/auths/insert.php");
            die();
        }
    } else {        
        $_SESSION["res"] = "Имеются ошибки ввода";
        header("Location: /app/admins/tables/auths/insert.php");
    }
}

