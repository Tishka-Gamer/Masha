<?php require_once $_SERVER["DOCUMENT_ROOT"] . "/app/admins/views/templates/header.php";
// session_unset();
?>

<div class=" div-center">
    <div class="insert-spec">

        <h1 class="div-center"><?= $_SESSION["res"] ?? "Заполните форму" ?></h1>
        <br>
        <form class="form-create-spec" action="/app/admins/tables/specs/insert-spec.php" method="post" enctype="multipart/form-data">
            <div class="spec-info">

                <div class="form-group div-flex">
                    <label for="image" class="form-label">Выберите картинку на аватар</label>
                    <input type="file" name="image" class="form-control" id="image">
                    <input style="display: none;" type="text" name="img" value="<?= $spec->image ?>">
                </div>
                <p class="right-p"><?= $_SESSION["error"] ?? "" ?></p>

                <div class="form-group div-flex">
                    <label for="name" class="form-label">Имя*</label>
                    <input value="<?= $_SESSION["name"] ?? $spec->name ?>" type="text" name="name" class="form-control" id="name">

                </div>
                <p class="right-p"><?= $_SESSION["errors"]["name"] ?? "" ?></p>

                <div class="form-group div-flex">
                    <label for="surname" class="form-label">Фамилия*</label>
                    <input value="<?= $_SESSION["surname"] ?? $spec->surname ?>" type="text" name="surname" class="form-control" id="surname">

                </div>
                <p class="right-p"><?= $_SESSION["errors"]["surname"] ?? "" ?></p>

                <div class="form-group div-flex">
                    <label for="patronymic" class="form-label">Отчество (если есть)</label>
                    <input value="<?= $_SESSION["patronymic"] ?? $spec->patronymic ?>" type="text" name="patronymic" class="form-control" id="patronymic">

                </div>
                <p class="right-p"><?= $_SESSION["errors"]["patronymic"] ?? "" ?></p>

                <div class="form-group div-flex">
                    <label for="birth" class="form-label">Дата рождения</label>
                    <input value="<?= $_SESSION["birth"] ?? $spec->birth_date ?>" type="date" name="birth" class="form-control" id="birth">

                </div>
                <p class="right-p"><?= $_SESSION["errors"]["birth"] ?? "" ?></p>


                <div class="form-group div-flex">
                    <label for="date-work" class="form-label">Дата начала работы</label>
                    <input value="<?= $_SESSION["date-work"] ?? $spec->date_start_work ?>" type="date" name="date-work" class="form-control" id="date-work">
                </div>
                <p class="right-p"><?= $_SESSION["errors"]["date-work"] ?? "" ?></p>

                <div class="form-group div-flex">
                    <label for="login" class="form-label">Логин</label>
                    <input value="<?= $_SESSION["login"] ?? $spec->login ?>" type="text" name="login" class="form-control" id="login">

                </div>
                <p class="right-p"><?= $_SESSION["errors"]["login"] ?? "" ?></p>


                <div class="form-group div-flex">
                    <label for="office" class="form-label">Офис</label>
                    <input value="<?= $_SESSION["office"] ?? $spec->office ?>" type="text" name="office" class="form-control" id="office">

                </div>
                <p class="right-p"><?= $_SESSION["errors"]["office"] ?? "" ?></p>

                <div class="form-group div-flex">
                    <label for="type" class="form-label">Тип предоставляемых услуг</label>
                    <select class="form-control" name="type" id="type">
                        <?php foreach ($types as $s) : ?>
                            <option <?= $s->id == $spec->type ? 'selected' : '' ?> value="<?= $s->id ?>"><?= $s->name ?></option>
                        <?php endforeach ?>
                    </select>


                </div>
                <p class="right-p"><?= $_SESSION["errors"]["type"] ?? "" ?></p>

                <div class="form-group div-flex">
                    <label for="password" class="form-label">Новый Пароль</label>
                    <input type="password" name="password" class="form-control" id="password">
                </div>
                <br>
                <div class="form-group div-flex">
                    <label for="password_confirmation" class="form-label">Подтверждение пароля</label>
                    <input type="password" name="password_confirmation" class="form-control" id="password_confirmation">
                </div>
                <p class="right-p"><?= $_SESSION["errors"]["password"] ?? "" ?></p>

            </div>
            <div>
                <div class="form-group div-flex">
                    <label for="diplom" class="form-label">Диплом</label>
                    <input value="<?= $_SESSION["diplom"] ?? $spec->diplom ?>" type="number" name="diplom" class="form-control" id="diplom">

                </div>
                <p class="right-p"><?= $_SESSION["errors"]["diplom"] ?? "" ?></p>

                <div class="form-group div-flex">
                    <label for="univer" class="form-label">Учебное заведение</label>
                    <input value="<?= $_SESSION["univer"] ?? $spec->univer ?>" type="text" name="univer" class="form-control" id="univer">

                </div>
                <p class="right-p"><?= $_SESSION["errors"]["univer"] ?? "" ?></p>

                <div class="form-group div-flex">
                    <label for="qualification" class="form-label">Квалификация</label>
                    <input value="<?= $_SESSION["qualification"] ?? $spec->qualification ?>" type="text" name="qualification" class="form-control" id="qualification">

                </div>
                <p class="right-p"><?= $_SESSION["errors"]["qualification"] ?? "" ?></p>

                <div class="form-group div-flex">
                    <label for="year_of_issue" class="form-label">Год поступления</label>
                    <input value="<?= $_SESSION["year_of_issue"] ?? $spec->year_of_issue ?>" type="number" name="year_of_issue" class="form-control" id="year_of_issue">

                </div>
                <p class="right-p"><?= $_SESSION["errors"]["year_of_issue"] ?? "" ?></p>

                <div class="form-group div-flex">
                    <label for="year_of_graduation" class="form-label">Год выпуска</label>
                    <input value="<?= $_SESSION["year_of_graduation"] ?? $spec->year_of_graduation ?>" type="number" name="year_of_graduation" class="form-control" id="year_of_graduation">

                </div>
                <p class="right-p"><?= $_SESSION["errors"]["year_of_graduation"] ?? "" ?></p>


            </div>

            <div class="form-group div-center">
                <button class="btn" name="redacte" value="<?= $spec->id ?>">Зарегистрироваться</button>
            </div>
        </form>

    </div>
    <br>
    <?php require_once $_SERVER["DOCUMENT_ROOT"] . "/app/admins/views/templates/footer.php"; ?>

    <?php

    unset($_SESSION["res"]);
    unset($_SESSION["error"]);
    unset($_SESSION["errors"]);
    ?>