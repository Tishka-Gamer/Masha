<?php


require_once $_SERVER["DOCUMENT_ROOT"] . "/app/admins/views/templates/header.php";
?>

<div class="services">
        <div class="div-flex">
            <h2>Специалисты </h2>
         
        </div>
        <table class="table" border="3">
            <thead>
                <th></th>
                <th>ФИО</th>
                <th>Логин</th>
                <th>Возраст</th>
                <th>Стаж работы</th>
                <th>Оффис</th>
                <th></th>
            </thead>
            <tbody>
                <?php foreach ($specs as $us) : ?>
                    <tr>
                        <td><img class="img-table" src="/uploads/specialists/<?= $us->image ?>" alt="<?= $us->id ?>"></td>
                        <td><?= $us->fio ?></td>
                        <td><?= $us->login ?></td>
                        <td><?= $us->age ?></td>
                        <td><?= $us->stag ?></td>
                        <td><?= $us->office ?></td>
                        <td class="right-p">
                            <form action="/app/admins/tables/specs/showSpec.php" method="post">
                                <button class = "btn" name="show-spec" value="<?= $us->id ?>">Подробнее</button>
                            </form>
                        </td>

                    </tr>

                <?php endforeach ?>
            </tbody>
        </table>

</div>

<?php
require_once $_SERVER["DOCUMENT_ROOT"] . "/app/admins/views/templates/footer.php";
?>