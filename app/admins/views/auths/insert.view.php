<?php
require_once $_SERVER["DOCUMENT_ROOT"]."/app/admins/views/templates/header.php";
?>

<div class="container div-center">
    <div class="auth">
    <form action="/app/admins/tables/auths/insert-admin.php" method="post" class="form" enctype="multipart/form-data">
        <h1><?= $_SESSION["res"] ?? "Заполните форму" ?></h1>
        
        <div class="form-group">
            <label for="name" class="form-label">Имя*</label>
            <input value="<?= $_SESSION["name"] ?? "" ?>" type="text" name="name" class="form-control" id="name">

        </div>
        <p class="right-p"><?= $_SESSION["errors"]["name"] ?? "" ?></p>

        <div class="form-group">
            <label for="surname" class="form-label">Фамилия*</label>
            <input value="<?= $_SESSION["surname"] ?? "" ?>" type="text" name="surname" class="form-control" id="surname">
        </div>
        <p class="right-p"><?= $_SESSION["errors"]["surname"] ?? "" ?></p>

        <div class="form-group">
            <label for="patronymic" class="form-label">Отчество (если есть)</label>
            <input value="<?= $_SESSION["patronymic"] ?? "" ?>" type="text" name="patronymic" class="form-control" id="patronymic">

        </div>
        <p class="right-p"><?= $_SESSION["errors"]["patronymic"] ?? "" ?></p>

        <div class="form-group">
            <label for="login" class="form-label">Login</label>
            <input value="<?= $_SESSION["loginAdmin"] ?? "" ?>" type="text" name="login" class="form-control" id="login">

        </div>
        <p class="right-p"><?= $_SESSION["errors"]["loginAdmin"] ?? "" ?></p>
       <div class="form-group">
            <label for="password" class="form-label">Пароль</label>
            <input type="password" name="password" class="form-control" id="password">
        </div>

        <div class="form-group">
            <label for="password_confirmation" class="form-label">Подтверждение пароля</label>
            <input type="password" name="password_confirmation" class="form-control" id="password_confirmation">
        </div>
        <p class="right-p"><?= $_SESSION["errors"]["password"] ?? "" ?></p>
        <div class="form-group">
            <label for="agreement" class="form-label">Согласие на обработку данных:</label>
            <input  type="checkbox" name="agreement" id="agreement" checked>
        </div>
        <div class="form-group div-center">
            <button class="btn" name="btn">Зарегистрироваться</button>
        </div>
    </form>
</div>
</div>
<script>
    document.querySelector("#agreement").addEventListener("change", () => {
        document.querySelector("[name=btn]").disabled = !document.getElementById("agreement").checked
    })
</script>
<?php require_once $_SERVER["DOCUMENT_ROOT"] . "/app/admins/views/templates/footer.php"; ?>
<?php
unset($_SESSION["res"]);
unset($_SESSION["error"]);
unset($_SESSION["errors"]);
?>

