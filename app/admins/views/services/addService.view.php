<?php

// session_unset();

require_once $_SERVER["DOCUMENT_ROOT"] . "/app/admins/views/templates/header.php";
$type = $_SESSION["type"]??"";
?>

<div class="div-center">
    <form action="/app/admins/tables/services/saveService.php" method="post">
        <table class="table">
            <tbody>
                <tr>
                    <td>
                       <h3> <?= $_SESSION["res"]??"" ?></h3>
                    </td>
                </tr>
                <tr>
                    <td>
                    <label for="name" class="form-label">Название</label>
                    <input class="form-control width100" type="text" name="name" id="" value="<?= $_SESSION["name"]??"" ?>">
                    <p class="p-right">
                            <?= $_SESSION["errors"]["name"] ?? "" ?>
                    </p>
                </td>
                </tr>
                <tr>
                    <td>
                        <label for="desc" class="form-label">Описание</label>
                        <input class="form-control width100" type="text" name="desc" id="" value="<?= $_SESSION["desc"]??""  ?>">
                        <p class="p-right">
                            <?= $_SESSION["errors"]["desc"] ?? "" ?>
                    </p>
                    </td>
                </tr>
                <tr>
                    <td>
                    <label for="type" class="form-label">Тип услуги</label>
                        <select class="form-control width100" name="type" id="type">
                            <?php foreach ($types as $t) : ?>
                                <option <?= $t->id == $type? "selected" : "" ?> value="<?= $t->id ?>"> <?= $t->name ?></option>
                            <?php endforeach ?>
                        </select>


                    </td>
                </tr>
                <tr>

                    <td>
                    <label for="price" class="form-label">Цена</label>
                    <input class="form-control width100" type="number" name="price" id="" value="<?= $_SESSION["price"]??"" ?>">
                    </td>
                </tr>
                <tr>

                    <td class="div-center">
                       
                            <button name="add"  class="btn">Сохранить</button>
                      
                    </td>
                </tr>
            </tbody>
        </table>
    </form>
</div>


<?php
require_once $_SERVER["DOCUMENT_ROOT"] . "/app/admins/views/templates/footer.php";

unset($_SESSION["res"]);
unset($_SESSION["price"]);
unset($_SESSION["type"]);
unset($_SESSION["error"]);
unset($_SESSION["errors"]);
?>