<?php
require_once $_SERVER["DOCUMENT_ROOT"] . "/app/admins/views/templates/header.php";
?>

<div class="container div-center">
    <form action="/app/admins/tables/orders/saveStatus.php" method="post">

        <div class="form-group">
        <label for="status" class="form-label">Новый статус записи ID <?= $_POST["createStatus"] ?></label>
            <select name="status" id="status" class="form-control">
                <?php foreach ($statuses as $s) : ?>
                    <option <?= $s->id == $_POST["status-now"] ? "selected": "" ?> value="<?= $s->id ?>"><?= $s->name ?></option>
                <?php endforeach ?>
            </select>           
        </div>
        <br>
        <div class="form-group div-center">
            <button class="btn" name="btn-createStatus" value="<?= $_POST["createStatus"] ?>">Изменить</button>

        </div>
    </form>
</div>

<?php
require_once $_SERVER["DOCUMENT_ROOT"] . "/app/admins/views/templates/footer.php";
?>