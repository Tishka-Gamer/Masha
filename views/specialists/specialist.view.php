<?php
require_once $_SERVER["DOCUMENT_ROOT"] . "/views/templates/header.php";
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
        <div class="spec-photo">
            <img class="spec-photo-img" src="/uploads/specialists/<?= $spec->image ?>" alt="">
        </div>
        <div class="spec-information">
            <h2>
                <?= $spec->fio ?>
            </h2>
            <h2>
               Стаж работы: <?= $spec->stag ?> <?= ageWord($spec->stag) ?>
            </h2>
            <h2>
              <?= $spec->univer ?>
            </h2>
        </div>
    </div>


</div>

<?php
require_once $_SERVER["DOCUMENT_ROOT"] . "/views/templates/footer.php";
?>

