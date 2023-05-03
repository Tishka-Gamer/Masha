<?php

require_once $_SERVER["DOCUMENT_ROOT"] . "/app/admins/views/templates/header.php";
function ageWord($ageUs)
{
    $age = "лет";
    if (!($ageUs >= 5 && $ageUs <= 20)) {
        if ($ageUs == 1) {
            $age = "год";
        }
        if ($ageUs > 1 && $ageUs < 5) {
            $age = "года";
        }
        if ($ageUs % 10 == 1) {
            $age = "год";
        }
        if ($ageUs % 10 > 1 && $ageUs % 10 < 5) {
            $age = "года";
        }
    }
    return $age;
}
?>
<div class="container div-center">


    <div class="specialist ">
        <table class="table" border="3">
            <tbody>
                <tr>
                    <td class="div-center">
                        <img class="img-show" src="/uploads/specialists/<?= $spec->image ?>" alt="<?= $spec->image ?>">
                    </td>
                </tr>
                <tr>
                    <td>ФИО: <?= $spec->fio ?></td>
                </tr>
                <tr>
                    <td>Логин: <?= $spec->login ?></td>
                </tr>
                <tr>
                    <td class="td-flex">
                        <p>Дата рождения: <?= $spec->birth_date ?></p>
                        <p>Возраст: <?= $spec->age ?></p>
                    </td>
                </tr>
                <tr>
                    <td class="td-flex">
                        <p>Дата начала работы: <?= $spec->date_start_work ?></p>
                        <p>Стаж: <?= $spec->stag ?></p>
                    </td>
                </tr>
                <tr>
                    <td>
                        Кабинет: <?= $spec->office ?>
                    </td>
                </tr>
                <tr>
                    <td>
                        Предоставляемый тип услуг: <?= $spec->type??"Пока что нет" ?>
                    </td>
                </tr>
                <tr>
                    <td>
                        Диплом: <?= $spec->diplom ?>
                    </td>
                </tr>
                <tr>
                    <td>
                        Учебное учереждение: <?= $spec->univer ?>
                    </td>
                </tr>
                <tr>
                    <td>
                       Квалификация: <?= $spec->qualification ?>
                    </td>
                </tr>
                <tr>
                    <td>
                        Год поступления: <?= $spec->year_of_issue ?>
                    </td>
                </tr>
                <tr>
                    <td>
                        Год выпуска: <?= $spec->year_of_graduation ?>
                    </td>
                </tr>
                <tr>
                    <td class="div-center">
                        <form action="/app/admins/tables/specs/redacte.php" method="post">
                            <button name="redacte-spec" value="<?= $spec->id?>" class="btn">Изменить</button>
                        </form>
                    </td>
                </tr>
            </tbody>
        </table>
    </div>


</div>


<?php
require_once $_SERVER["DOCUMENT_ROOT"] . "/app/admins/views/templates/footer.php";
?>