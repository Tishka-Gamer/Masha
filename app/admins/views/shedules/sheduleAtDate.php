<?php

use App\models\Specialist;

require_once $_SERVER["DOCUMENT_ROOT"] . "/app/admins/views/templates/header.php";
?>
<div>
    <h1>Расписание на <?= $date ?></h1>
</div>
<table class="table shedule-by-date" border="3">
    <thead>
        <th>
            Специалист
        </th>
        <th>
            Смена
        </th>
       
        <th>Время работы</th>
    </thead>
    <tbody>
        <!-- <?php var_dump($shedules) ?> -->
        <?php foreach ($shedules as $s) : ?>
            <tr>
                
                <td>
                    <?= $s->fio ?>
                </td>
                <td>

                <!-- <?= $s->shift ?? "Выходной" ?>  -->
                    <p>
                    <form class="div-center" action="/app/admins/tables/shedules/saveShedule.php" method="post">
                        <input name="date" style="display: none;" type="text" value="<?= $weekDate[$i] ?>">
                        <input name="week" style="display: none;" type="text" value="<?= $dayWeek[$i] ?>">
                        <!-- <input name="spec" style="display: none;" type="text" value="<?= $sp->id ?>"> -->
                        <select class="form-control myselect" name="shedule" id="shedule">
                            <option value="0">Выходной</option>
                            <?php foreach ($shifts as $sh) : ?>
                                <option <?= $s ? ($s->shift_id == $sh->id ? 'selected' : '') : '' ?> value="<?= $sh->id ?>"><?= $sh->name ?></option>
                            <?php endforeach ?>

                        </select>

                        <button class="btn" name="update-by-date" value="<?= $s->id ?>">Сохранить</button>

                    </form>
                    </p>    

                </td>
              
                <td>
                    <?= $s->time_start_work ?? "" ?> - <?= $s->time_end_work ?? "" ?>
                </td>
            </tr>
        <?php endforeach ?>
    </tbody>
</table>
<?php




require_once $_SERVER["DOCUMENT_ROOT"] . "/app/admins/views/templates/footer.php";
?>