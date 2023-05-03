<?php
require_once $_SERVER["DOCUMENT_ROOT"] . "/app/admins/views/templates/header.php";
?>

<div>
    <table class="table users" border="3">
        <thead>
            <th>ФИО</th>
            <th>Логин</th>
            <th>Возраст</th>
            <th>Подтвержден?</th>
            <th>Дата регистрации</th> 
        </thead>
        <tbody>
            <?php foreach ($users as $us) : ?>
                <tr>
                    <td><?= $us->fio ?></td>
                    <td><?= $us->login ?></td>
                    <td><?= $us->age ?></td>
                    <td>
                        <form action="/app/admins/tables/users/check.php" method="post">
                            <input class="confirmed" name="confirmed" type="checkbox"  <?= $us->confirmed?"checked":"" ?> >
                            <button class="btn" name="create" value="<?= $us->id ?>" >Сохранить</button>
                    </form>
                </td>
                    <td><?= $us->created_at ?></td>
                </tr>

            <?php endforeach ?>
        </tbody>
    </table>
</div>
<!-- <script src="/app/admins/assets/js/fetch.js"></script>
<script src="/app/admins/assets/js/loadUsers.js"></script> -->
<?php
require_once $_SERVER["DOCUMENT_ROOT"] . "/app/admins/views/templates/footer.php";
?>