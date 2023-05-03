<?php

use App\models\Service;

require_once $_SERVER["DOCUMENT_ROOT"] . "/app/admins/views/templates/header.php";
?>

<div class="services">
    <div class="div-flex">
        <form action="/app/admins/tables/services/addServ.php" method="post">
            <button class="btn" name="addServ">Добавить услугу</button>
        </form>
        <form action="/app/admins/tables/services/addType.php" method="post">
            <button class="btn" name="addType">Добавить тип услуг</button>
        </form>
    </div>
    <br>
    <table class="table" border="3">
        <?php foreach ($types as $s) : ?>
            <?php $services = Service::getServicesByType($s->id) ?>
            <thead>
                <tr>
                    <td style="background-color: #9cbd94; color: white;">
                        <!-- <div class="div-flex"> -->
                        <h2><?= $s->name ?></h2>

                        <!-- </div> -->
                    </td>
                    <td style="background-color: #9cbd94; color: white;">
                        <h5><?= $s->description ?></h5>
                    </td>
                    <td style="background-color: #9cbd94;">

                    </td>
                    <td style="background-color: #9cbd94;">

                    </td>
                    <td style="background-color: #9cbd94;">
                        <form action="/app/admins/tables/services/showType.php" method="post">
                            <button class="btn" name="show-type" value="<?= $s->id ?>">Просмотр</button>
                        </form>
                    </td>
                    <td style="background-color: #9cbd94;">
                        <form action="/app/admins/tables/services/delType.php" method="post">
                            <button class="btn" name="del-type" value="<?= $s->id ?>">Удалить</button>
                        </form>
                    </td>
                </tr>
            </thead>
            <thead>
                <th>Услуга</th>
                <th>Описание</th>
                <th>Цена</th>
                <th></th>
                <th></th>
                <th></th>

            </thead>
            <tbody>
                <?php foreach ($services as $us) : ?>
                    <tr>
                        <td><?= $us->name ?></td>
                        <td><?= $us->descript_service ?></td>
                        <td><?= $us->price ?>₽</td>
                        <td class="">
                            <form action="/app/admins/tables/services/redacteService.php" method="post"><button class="btn" name="redacte-service" value="<?= $us->service_id ?>">Редактировать</button></form>
                        </td>
                        <td class="">
                            <form action="/app/admins/tables/services/delService.php" method="post">
                                <button class="btn" name="serv-del" value="<?= $us->service_id ?>">Удалить</button>
                            </form>
                        </td>
                        <td class="">
                            <form action="/app/admins/tables/services/specsByService.php" method="post"><button class="btn" name="specByTypeService" value="<?= $s->id ?>">Посмотреть специалистов</button></form>
                        </td>

                    </tr>

                <?php endforeach ?>
            </tbody>

        <?php endforeach ?>
    </table>
</div>
<div>
    <input id="input" type="time">
</div>
<script>
    document.addEventListener("click", (e) => {
        console.log(document.querySelector("#input").value)
    })
</script>
<?php
require_once $_SERVER["DOCUMENT_ROOT"] . "/app/admins/views/templates/footer.php";
?>