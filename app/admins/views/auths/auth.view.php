<?php
session_start();

?>
<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Админская</title>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-GLhlTQ8iRABdZLl6O3oVMWSktQOp6b7In1Zl3/Jr59b6EGGoI1aFkw7cmDA6j6gD" crossorigin="anonymous">
  <link rel="stylesheet" href="/app/admins/assets/css/style.css">
</head>

<body>
<div class="container div-center">
    <div class="auth">
        <form action="/app/admins/tables/auths/authCkeck.php" method="post" class="form">

            <h1>Введите логин и пароль</h1>

            <div class="form-group">
                <label for="login" class="form-label">Login</label>
                <input value="<?= $_SESSION["loginAdmin"] ?? "" ?>" type="text" name="loginAdmin" class="form-control" id="login">
            </div>
            <div class="form-group">
                <label for="password" class="form-label">Пароль</label>
                <input type="password" name="password" class="form-control" id="password">
            </div>

            <p class="error"><?= $_SESSION["error"] ?? "" ?></p>
            <div class="form-group div-center">
                <button class="btn_vhod" name="btn">Войти</button>

            </div>

        </form>
    </div>
</div>

<?php require_once $_SERVER["DOCUMENT_ROOT"] . "/app/admins/views/templates/footer.php"; ?>

<style>
    .error {
        color: red;
    }
</style>

<?php unset($_SESSION["error"]); ?>