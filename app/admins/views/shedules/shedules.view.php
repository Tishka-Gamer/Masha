<?php

use App\models\Specialist;

require_once $_SERVER["DOCUMENT_ROOT"] . "/app/admins/views/templates/header.php";
?>

<div class="shedule-btns">

    <form action="/app/admins/tables/shedules/checkDate.php" method="post">
        <button class="btn" name="back" value="back">Предыдущая неделя</button>
    </form>
    <form action="/app/admins/tables/shedules/checkDate.php" method="post">
        <button class="btn" name="forward" value="forward">Следующая неделя</button>
    </form>
</div>

<div class="shedules-main">

    <?php foreach ($specs as $sp) : ?>
        <div>
            <h2><?= $sp->fio ?></h2>
        </div>
        <table class="table" border="3">
            <thead>
                <th>
                    День недели
                </th>
                <th>
                    Дата
                </th>
                <th>
                    Смена
                </th>
                <th>Время работы</th>
            </thead>
            <tbody>
                <?php for ($i = 0; $i < count($dayWeek); $i++) : ?>
                    <tr>
                        <td>
                            <?= $dayWeek[$i] ?>
                        </td>
                        <td>
                            <?php $shift = Specialist::getSheduleBySpec($sp->id, $weekDate[$i]) ?>
                            <?php $a = '/app/admins/tables/shedules/sheduleAtDate.php?date='. $weekDate[$i] ?>
                           <a href=<?= $a ?>> <?= $weekDate[$i] ?></a>
                        </td>
                        <td>
                            <!-- <?= $shift->shift ?? "Выходной" ?> -->
                            <p>
                            <form class="div-center" action="/app/admins/tables/shedules/saveShedule.php" method="post">
                                <input name="date" style="display: none;" type="text" value="<?= $weekDate[$i] ?>">
                                <input name="week" style="display: none;" type="text" value="<?= $dayWeek[$i] ?>">
                                <!-- <input name="spec" style="display: none;" type="text" value="<?= $sp->id ?>"> -->
                                <select class="form-control myselect" name="shedule" id="shedule">
                                    <option value="0">Выходной</option>
                                    <?php foreach ($shedules as $sh) : ?>
                                        <option <?= $shift ? ($shift->shift_id == $sh->id ? 'selected' : '') : '' ?> value="<?= $sh->id ?>"><?= $sh->name ?></option>
                                    <?php endforeach ?>

                                </select>
                                
                                    <button class="btn" name="<?= $shift?'update':'add'?>" value="<?= $shift?$shift->id: $sp->id ?>" >Сохранить</button>
                                
                            </form>
                            </p>
                        </td>
                        <td>
                            <?= $shift->time_start_work ?? "" ?> - <?= $shift->time_end_work ?? "" ?>
                        </td>
                    </tr>
                <?php endfor ?>
            </tbody>
        </table>
    <?php endforeach ?>

</div>








<?php
$_SESSION["click"] = 0;



require_once $_SERVER["DOCUMENT_ROOT"] . "/app/admins/views/templates/footer.php";
?>