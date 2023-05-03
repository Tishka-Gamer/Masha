<?php
// unset($_SESSION["res"]);
// session_unset();
session_start();
require_once $_SERVER["DOCUMENT_ROOT"] . "/app/admins/views/templates/header.php";
?>

    <?php var_dump($_SESSION) ?>

<div class="div-center">
    <form action="/app/admins/tables/services/saveType.php" method="post" enctype="multipart/form-data">
        <table class="table">
            <tbody>
                <tr>
                    <td class="div-center">
                        <?= $_SESSION["res"] ?? "" ?>
                    </td>
                </tr>
                <tr>
                    <td class="div-center">
                        <input class="form-control" type="file" name="image" id="image">
                    </td>
                </tr>
                <tr>
                    <td>
                        <p class="p-right">
                            <?= $_SESSION["error"] ?? "" ?>
                        </p>
                    </td>
                </tr>

                <tr>
                    <td>
                        <label for="name" class="form-label">Название</label>
                        <input class="form-control width100" type="text" name="name" id="" value="">
                    </td>
                </tr>
                <tr>
                    <td>
                        <p class="p-right">
                            <?= $_SESSION["errors"]["name"] ?? "" ?>
                        </p>
                    </td>
                </tr>
                <tr>
                   
                    <td >
                        <label for="login" class="form-label">Описание</label>
                        <textarea class="form-control" style="padding: 15px; width:90%" name="desc" id="" cols="30" rows="10"></textarea>
                    </td>
                <tr>
                    <td>
                        <p class="p-right">
                            <?= $_SESSION["errors"]["desc"] ?? "" ?>
                        </p>
                    </td>
                </tr>
                </tr>


                <tr>
                    <td class="div-center">
                        <form action="/app/admins/tables/services/saveType.php"></form>
                        <button class='btn' name="add-type" value="" class="btn">Сохранить</button>
                    </td>
                </tr>
            </tbody>
        </table>
    </form>
</div>


<?php
unset($_SESSION["error"]);
unset($_SESSION["errors"]);
unset($_SESSION["res"]);
require_once $_SERVER["DOCUMENT_ROOT"] . "/app/admins/views/templates/footer.php";
?>