<?php
require_once $_SERVER["DOCUMENT_ROOT"] . "/app/admins/views/templates/header.php";
?>

<div>
    <table class="table" border="3">
        <thead>
            <th>Время</th>
            <th>Дата</th>
            <th>Специалист</th>
            <th>Статус</th>
            <th>Питомец</th>
            <th>Пользователь</th>
            <th>Услуга</th>
            <th>Цена</th>
            <th>Дата создания</th>
        </thead>
        <tbody>
            <?php foreach ($orders as $us) : ?>
                <tr>
                    <td><?= $us->time ?></td>
                    <td><?= $us->date ?></td>
                    <td><?= $us->fioSpec ?></td>
                    <td class="td-flex"><?= $us->status ?>
                        <form action="/app/admins/tables/orders/createStatus.php" method="post">
                            <input style="display: none;" name="status-now" type="text" value="<?= $us->status_id ?>">
                            <button class="btn-icons" name="createStatus" value="<?= $us->id ?>">
                                <img class="icons" src="/uploads/icons/create.png" alt="Изменить статус">
                            </button>
                        </form>
                    </td>
                    <td><?= $us->pet ?></td>
                    <td><?= $us->fioUser ?></td>
                    <td><?= $us->service ?></td>
                    <td><?= $us->price ?></td>
                    <td><?= $us->created_at ?></td>
                </tr>

            <?php endforeach ?>
        </tbody>
    </table>
</div>

<?php
require_once $_SERVER["DOCUMENT_ROOT"] . "/app/admins/views/templates/footer.php";
?>