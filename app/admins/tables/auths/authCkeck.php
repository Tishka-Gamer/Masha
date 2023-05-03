<?php
session_start(); 
if(!$_SESSION["admin"]){
    header("location: /");
}

use App\models\Admin;

unset($_SESSION["error"]);
require_once $_SERVER["DOCUMENT_ROOT"] . "/bootstrap.php";

$_SESSION["loginAdmin"] = $_POST["loginAdmin"];

if (assert($_POST["btn"])) {
  $user = Admin::getAdmin($_POST['loginAdmin'], $_POST['password']);

  if ($user == null) {
    $_SESSION["error"] = "Пароль не подходит";

    if (!Admin::findLogin($_POST['loginAdmin'])) {
      $_SESSION["error"] = "Админ не найден";
    }
    header("Location: /app/admins/tables/auths/auth.php");
    die();
  } else {
    if (isset($user->privilege)) {
      $_SESSION["privilege"] = true;
    } else {
      $_SESSION["privilege"] = false;
    }

    $_SESSION["admin"] = true;
    $_SESSION["idAdmin"] = $admin->id;
    $_SESSION["loginAdmin"] = $_POST["loginAdmin"];
    header("Location: /app/admins/tables/users/users.php");
  }
}
