<?php require_once $_SERVER["DOCUMENT_ROOT"] . "/views/templates/header.php";



?>

<div class="container div-center">
    <div class="auth">

    
    <form action="/app/tables/users/insert-user.php" method="post" class="form" enctype="multipart/form-data">
        <h1><?= $_SESSION["res"] ?? "Заполните форму" ?></h1>
        <div class="form-group">
            <label for="image" class="form-label">Выберите картинку на аватар</label>
            <input  type="file" name="image" class="form-control" id="image">
            <input style="display:none"  type="text" name="image" class="form-control" id="image" value="<?= $us->image ?>">
        </div>
        <p class="right-p"><?= $_SESSION["error"]?? "" ?></p>

        <div class="form-group">
            <label for="name" class="form-label">Ваше имя*</label>
            <input value="<?= $_SESSION["name"] ??$us->name  ?>" type="text" name="name" class="form-control" id="name">

        </div>
        <p class="right-p"><?= $_SESSION["errors"]["name"] ?? "" ?></p>

        <div class="form-group">
            <label for="surname" class="form-label">Фамилия*</label>
            <input value="<?= $_SESSION["surname"] ?? $us->surname  ?>" type="text" name="surname" class="form-control" id="surname">

        </div>
        <p class="right-p"><?= $_SESSION["errors"]["surname"] ?? "" ?></p>

        <div class="form-group">
            <label for="patronymic" class="form-label">Отчество (если есть)</label>
            <input value="<?= $_SESSION["patronymic"] ?? $us->patronymic  ?>" type="text" name="patronymic" class="form-control" id="patronymic">

        </div>
        <p class="right-p"><?= $_SESSION["errors"]["patronymic"] ?? "" ?></p>

        <div class="form-group">
            <label for="login" class="form-label">Login</label>
            <input value="<?= $_SESSION["login"] ?? $us->login ?>" type="text" name="login" class="form-control" id="login">

        </div>
        <p class="right-p"><?= $_SESSION["errors"]["login"] ?? "" ?></p>
        <div class="form-group">
            <label for="email" class="form-label">ваша почта</label>
            <input value="<?= $_SESSION["email"] ??  $us->email ?>" type="text" name="email" class="form-control" id="email">

        </div>
        <p class="right-p"><?= $_SESSION["errors"]["email"] ?? "" ?></p>
        <div class="form-group">
            <label for="birth" class="form-label">Дата рождения</label>
            <input value="<?= $_SESSION["birth"] ?? $us->birth ?>" type="date" name="birth" class="form-control" id="birth">

        </div>
        <!-- <p class="right-p"><?= $_SESSION["errors"]["email"] ?? "" ?></p> -->
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
            <input type="checkbox" name="agreement" id="agreement" checked>
        </div>
        <div class="form-group">
            <button name="btn-redacte" class="btn" value="<?= $us->id ?>">Сохранить</button>
        </div>
    </form>
</div>
</div>
<script>
    document.querySelector("#agreement").addEventListener("change", () => {
        document.querySelector("[name=btn]").disabled = !document.getElementById("agreement").checked
    })
</script>
<?php require_once $_SERVER["DOCUMENT_ROOT"] . "/views/templates/footer.php"; ?>

<?php
unset($_SESSION["res"]);
unset($_SESSION["error"]);
unset($_SESSION["errors"]);
?>