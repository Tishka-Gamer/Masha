<?php
session_start();


require_once $_SERVER["DOCUMENT_ROOT"] . "/views/templates/header.php";


?>
<div class="div-center">
    <h2 style="color:#d88989"><?= $_SESSION["message"] ?? "" ?></h2>
</div>
<div class="h100 div-center">
    <div class="auth">

        <form action="/app/tables/users/authCkeck.php" method="post" class="form">

            <h1>Введите логин и пароль</h1>

            <div class="form-group">
                <label for="login" class="form-label">Login</label>
                <input value="<?= $_SESSION["login"] ?? "" ?>" type="text" name="login" class="form-control" id="login">
            </div>
            <div class="form-group">
                <label for="password" class="form-label">Пароль</label>
                <input type="password" name="password" class="form-control" id="password">
            </div>

            <p class="error"><?= $_SESSION["error"] ?? "" ?></p>
            <div class="form-group div-center">
                <button class="btn_vhod" name="btn">Войти</button>

            </div>
            <div class="div-center"><a href="/app/tables/users/create.php">Нет аккаунта? Зарегистрируйтесь</a></div>
        </form>
    </div>
</div>
<style>
    .error {
        color: red;
    }
</style>
<?php require_once $_SERVER["DOCUMENT_ROOT"] . "/views/templates/footer.php"; ?>



<?php
unset($_SESSION["error"]);
unset($_SESSION["message"]);
?>