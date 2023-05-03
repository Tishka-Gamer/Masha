<?php

use App\models\Service;
use App\models\Specialist;

require_once $_SERVER["DOCUMENT_ROOT"] . "/app/admins/views/templates/header.php";
?>

<div class="services">
    <div class="div-flex">
        <div></div>
        <a href="/app/admins/tables/specs/insertSpec.php">Добавить специалиста</a>
    </div>
    <?php foreach ($types as $s) : ?>
        <?php $specs = Specialist::getSpecialistsByServicesType($s->id) ?>
        <div class="div-flex">
            <h2><?= $s->name ?></h2>

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
                <th></th>
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

                        <td>
                            <form action="/app/admins/tables/specs/servicesBySpec.php" method="post">
                                <button class="btn" name="spec" value="<?= $us->id ?>">
                                    Предоставляемые услуги
                                </button>
                            </form>
                        </td>
                        <!-- <td >
                            <form action="/app/admins/tables/specs/createSpec.php" method="post">
                                <button class="btn" name="create-spec" value="<?= $us->id ?>">
                                    Изменить
                                </button>
                            </form>
                        </td> -->
                        <td>
                            <form action="/app/admins/tables/specs/showSpec.php" method="post">
                                <button class="btn" name="show-spec" value="<?= $us->id ?>">
                                    Просмотр
                                </button>
                            </form>
                        </td>
                        <td>
                            <form action="/app/admins/tables/specs/delSpec.php" method="post">
                                <button class="btn" name="del-spec" value="<?= $us->id ?>">
                                    Удалить
                                </button>
                            </form>
                        </td>


                    </tr>

                <?php endforeach ?>
            </tbody>
        </table>

    <?php endforeach ?>

    <div class="div-flex">
        <h2>Свободные</h2>

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
            <th></th>
            <!-- <th></th> -->
            <!-- <?php var_dump($freespecs) ?> -->
        </thead>
        <tbody>
            <?php foreach ($freespecs as $us) : ?>
                <tr>
                    <td><img class="img-table" src="/uploads/specialists/<?= $us->image ?>" alt="<?= $us->id ?>"></td>
                    <td><?= $us->fio ?></td>
                    <td><?= $us->login ?></td>
                    <td><?= $us->age ?></td>
                    <td><?= $us->stag ?></td>
                    <td><?= $us->office ?></td>

                    <!-- <td>
                            <form action="/app/admins/tables/specs/servicesBySpec.php" method="post">
                                <button class="btn" name="spec" value="<?= $us->id ?>">
                                    Предоставляемые услуги
                                </button>
                            </form>
                        </td> -->
                    <!-- <td >
                            <form action="/app/admins/tables/specs/createSpec.php" method="post">
                                <button class="btn" name="create-spec" value="<?= $us->id ?>">
                                    Изменить
                                </button>
                            </form>
                        </td> -->
                    <td>
                        <form action="/app/admins/tables/specs/showSpec.php" method="post">
                            <button class="btn" name="show-spec-free" value="<?= $us->id ?>">
                                Просмотр
                            </button>
                        </form>
                    </td>
                    <td>
                        <form action="/app/admins/tables/specs/delSpec.php" method="post">
                            <button class="btn" name="del-spec" value="<?= $us->id ?>">
                                Удалить
                            </button>
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