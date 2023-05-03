<?php require_once $_SERVER["DOCUMENT_ROOT"] . "/views/templates/header.php";



?>

<div class="container div-center">
    <div class="auth">


        <form action="/app/tables/pets/insert-pet.php" method="post" class="form" enctype="multipart/form-data">
            <h1><?= $_SESSION["res"] ?? "Заполните форму" ?></h1>
            <div class="form-group">
                <label for="image" class="form-label">Выберите фото питомца</label>
                <input name="image" style="display: none;" type="text" value="<?= $pet->image ?>">
                <input type="file" name="image" class="form-control" id="image">

            </div>
            <p class="right-p"><?= $_SESSION["error"] ?? "" ?></p>

            <div class="form-group">
                <label for="name" class="form-label">Кличка*</label>
                <input value="<?= $_SESSION["name"] ?? $pet->pet_name ?>" type="text" name="name" class="form-control" id="name">

            </div>
            <p class="right-p"><?= $_SESSION["errors"]["name"] ?? "" ?></p>

            <div class="form-group">
                <label for="breed" class="form-label">Порода*</label>
                <input value="<?= $_SESSION["breed"] ?? $pet->breed  ?>" type="text" name="breed" class="form-control" id="breed">

            </div>
            <p class="right-p"><?= $_SESSION["errors"]["breed"] ?? "" ?></p>




            <div class="form-group">
                <label for="birth" class="form-label">Дата рождения</label>
                <input value="<?= $_SESSION["birth"] ?? $pet->birth ?>" type="date" name="birth" class="form-control" id="birth">

            </div>
            <p class="right-p"><?= $_SESSION["errors"]["birth"] ?? "" ?></p>

            <div class="form-group">
            <label for="specie" class="form-label">Выберите вид питомца*</label>
                <select class="form-control" name="specie" id="specie">
                    <?php foreach($species as $s): ?>
                        <option <?= $pet->specie_id == $s->id?'selected':'' ?> value="<?= $s->id ?>"><?= $s->name ?></option>
                    <?php endforeach ?>
                </select>
            </div>
            

            <div class="form-group">
            <label for="gender" class="form-label">Выберите пол питомца*</label>
                <select class="form-control" name="gender" id="gender">
                   
                        <option <?= $pet->gender == "Мужской"?'selected':'' ?> value="Мужской">Мужской</option>
                        <option  <?= $pet->gender == "Женский"?'selected':'' ?> value="Женский">Женский</option>
                 
                </select>
            </div>
           <p></p>
            <div class="text-center form-group">
                <button class="btn_vhod" name="redacte" value="<?= $_SESSION["id-pet"] ?>">Сохранить</button>
            </div>
        </form>
    </div>
</div>

<?php require_once $_SERVER["DOCUMENT_ROOT"] . "/views/templates/footer.php"; ?>

<?php
unset($_SESSION["res"]);
unset($_SESSION["error"]);
unset($_SESSION["errors"]);
?>