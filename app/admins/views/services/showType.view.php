<?php require_once $_SERVER["DOCUMENT_ROOT"] . "/app/admins/views/templates/header.php";
?>

<div class="div-center">
    <table class="table table-show">
        <tbody>
            <tr>
                <td class="div-center">
                    <img class="img-show" src="/uploads/bd/<?= $type->image ?>" alt="">
                </td>
            </tr>
            <tr>
                <td>
                    <?= $type->name ?>
                </td>
            </tr>
            <tr>
                <td>
                    <?= $type->description ?>
                </td>
            </tr>
            <tr>
                <td class="div-center">
                   <form action="/app/admins/tables/services/redacteType.php" method="post">
                    <button class="btn" name="redacte-type" value="<?= $type->id ?>">
                        Редактировать
                    </button>
                   </form>
                </td>
            </tr>
        </tbody>
    </table>
</div>

<?php require_once $_SERVER["DOCUMENT_ROOT"] . "/app/admins/views/templates/footer.php";
?>