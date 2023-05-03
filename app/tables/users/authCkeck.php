<?php
session_start();

use App\models\User;

unset($_SESSION["error"]);
require_once $_SERVER["DOCUMENT_ROOT"] . "/bootstrap.php";

$_SESSION["login"] = $_POST["login"];

if (assert($_POST["btn"])) {
   $user = User::getUser($_POST['login'], $_POST['password']);

   if ($user == null) {
      $_SESSION["error"] = "Пароль не подходит";
      $_SESSION["auth"] = false;
      if (!User::findLogin($_POST['login'])) {
         $_SESSION["error"] = "Пользователь не найден";
      }
      header("Location: /app/tables/users/auth.php");
      die();
   } else {
      $_SESSION["auth"] = true;
      $_SESSION["id"] = $user->id;
      $_SESSION["loginUs"] = $_POST["login"];
      unset($_SESSION["login"]);

      //var_dump($_SESSION["id"]);
      header("Location: /app/tables/users/profile.php");
   }
}
